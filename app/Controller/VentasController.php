<?php
App::uses('AppController', 'Controller');
/**
* Ventas Controller
*
* @property Venta $Venta
* @property PaginatorComponent $Paginator
* @property SessionComponent $Session
*/
class VentasController extends AppController {

	const REGISTRADO = 1;
	const PENAUT 		 = 2;
	const ENTREGADO  = 3;
	/**
	* Components
	*
	* @var array
	*/
	public $components = array('Paginator', 'Session', 'Flash', 'RequestHandler');




	public $uses = array('Venta', 'Almacenproducto', 'Almacenmarcadetalle', 'Inventariomovimiento', 'Ventadetalle', 'Almacene',
	                     'Inventariomovimateriale', 'Almacenuser','Vstock', 'Vstockmateriale');


	/*
	** var de layout
	*
	*/
	public $layout = "dashbord";

	/*
	*  *  beforeFilter check de session
	*
	*/
	public function beforeFilter() {
		$this->checkSession(6);
	}


	protected function validaEdicion($rol, $estado, $pagado){
		return ($rol == 3 || ($rol == 4 && ($estado==1 || $estado==2) && $pagado == 2));
	}
/*
const REGISTRADO = 'REG';
const PENAUT 		 = 'PENAUT';
const ENTREGADO  = 'ENT';
*/
	protected function cambioEstado($rol, $estadoActual){
		$ret = array();
		switch ($estadoActual) {
			case  self::REGISTRADO:
				if($rol >= 1 and $rol <=3){
					$ret[] = self::PENAUT ;
				}
				if(($rol >= 1 and $rol <=3) || $rol = 5 ){
					$ret[] = self::ENTREGADO;
				}
			break;
			case self::PENAUT:
			if($rol >= 1 and $rol <=3){
				$ret[] = self::REGISTRADO;
				$ret[] = self::ENTREGADO;
			}
			break;
			case self::ENTREGADO:
				if(($rol >= 1 and $rol <=3) ){
					$ret[] = self::PENAUT ;
					$ret[] = self::REGISTRADO;
				}
			break;
		}
		return $ret;
	}

	/**
	* index method
	*
	* @return void
	*/
	public function index() {

		//$this->Venta->recursive = 0;
		//$this->set('ventas', $this->Paginator->paginate());
		$empresa_id          = $this->Session->read('empresa_id');
		$empresasurcusale_id = $this->Session->read('empresasurcusale_id');
		$rol_id              = $this->Session->read('ROL');
		$user_id             = $this->Session->read('USUARIO_ID');

		if($empresa_id==0 && $empresasurcusale_id==0){
			$options = array(
				'conditions'=>array('Venta.activo'=>1)
			);
		}else if($empresa_id!=0 && $empresasurcusale_id==0){
			$options = array(
				'conditions'=>array(
					'Venta.activo'=>1,
					'Venta.empresa_id'=>$empresa_id
				)
			);
		}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==3){
			$options =array(
				'conditions'=>array(
					'Venta.activo'=>1,
					'Venta.empresa_id'=>$empresa_id,
					'Venta.empresasurcusale_id'=>$empresasurcusale_id
				)
			);
		}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==5){
			$options = array(
				'joins' => array(
					array(
						'conditions' => array(
							'Almacenuser.almacene_id = Almacene.id',
							'Almacenuser.user_id' => $user_id,
						),
						'table' => 'almacenusers',
						'alias' => 'Almacenuser',
						'type' => 'inner',
					),
				),
				'conditions' => array(
					'Venta.activo' => 1,
				),
			);
		}else{
			$options =  array(
				'conditions'=>array(
					'Venta.activo'=>1,
					'Venta.empresa_id'=>$empresa_id,
					'Venta.empresasurcusale_id'=>$empresasurcusale_id,
					'Venta.user_id'=>$user_id
				)
			);
		}
		$consulta = $this->Venta->find('all', $options);
		for ($i=0; $i < count($consulta); $i++) {
			$consulta[$i]['Venta']['edicion'] = $this->validaEdicion($rol_id,$consulta[$i]['Venta']['estado'], $consulta[$i]['Venta']['pagado']);
			$consulta[$i]['Venta']['cambioEstado'] = $this->cambioEstado($rol_id, $consulta[$i]['Venta']['estado']);
		}
		$this->set('ventas', $consulta);
	}

	/**
	* view method
	*
	* @throws NotFoundException
	* @param string $id
	* @return void
	*/
	public function view($id = null) {
		$empresa_id          = $this->Session->read('empresa_id');
		$empresasurcusale_id = $this->Session->read('empresasurcusale_id');
		$rol_id              = $this->Session->read('ROL');
		$user_id             = $this->Session->read('USUARIO_ID');
		if (!$this->Venta->exists($id)) {
			throw new NotFoundException(__('Invalid venta'));
		}
		$options = array('conditions' => array('Venta.' . $this->Venta->primaryKey => $id));
		$this->set('venta', $this->Venta->find('first', $options));
	}

	/**
	* add method
	*
	* @return void
	*/
	public function add() {
		$empresa_id          = $this->Session->read('empresa_id');
		$empresasurcusale_id = $this->Session->read('empresasurcusale_id');
		$rol_id              = $this->Session->read('ROL');
		$user_id             = $this->Session->read('USUARIO_ID');
		if ($this->request->is('post')) {
			if(!empty($this->request->data["Venta"]["total"])){

				$validacionInventario = $this->validaEmbalajeCompleto($this->request->data);
				if(empty($validacionInventario)){
					$this->Venta->create();
					if($this->request->data['Venta']['tipo']==1){
						$this->request->data['Venta']['estado']=1; //Registrado
					}else{
						$this->request->data['Venta']['estado']=2; //Pendiente Autorizar
					}
					if($this->Venta->save($this->request->data)) {
						$id   =  $this->Venta->id;
						$stop = 0;
						if(!empty($this->request->data["Venta"]["Productos"])){
							foreach($this->request->data["Venta"]["Productos"] as $producto){
								$this->request->data["Ventadetalle"]["venta_id"]           = $id;
								$this->request->data["Ventadetalle"]["almacenproducto_id"] = $producto['pro'];
								$this->request->data["Ventadetalle"]["cantidad"]           = $producto['cant'];
								$this->request->data["Ventadetalle"]["existencia"]         = $producto['exist'];
								$this->request->data["Ventadetalle"]["precio"]             = $producto['pre'];
								$this->request->data["Ventadetalle"]["total"]              = $producto['total'];
								$this->request->data["Ventadetalle"]["embalaje"]           = $producto['emb'];
								$this->Ventadetalle->create();
								if ($this->Ventadetalle->save($this->request->data)){

								}else{
									$stop = 1;
								}
							}
						}
						if($stop==0){
							$this->Venta->commit();
							$this->Flash->success(__('Registro Guardado.'));
							return $this->redirect(array('action' => 'index'));

						}else{
							$this->Venta->rollback();
							$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
						}
					}else{
						$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
					}
				}else {
					//$this->Session->setFlash(__($validacionInventario, true));
					$this->Flash->error(__($validacionInventario));

					//return $this->render('edit');
				}
			}else {
				$this->Flash->error(__('No se pueden registar ventas sin productos'));
			}
		}
		$empresas = $this->Venta->Empresa->find('list', array('conditions'=>array('id'=>$empresa_id) ));
		if($empresa_id==0 && $empresasurcusale_id==0){
			$empresasurcusales = $this->Venta->Empresasurcusale->find('list');
		}else if($empresa_id!=0 && $empresasurcusale_id==0){
			$empresasurcusales = $this->Venta->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id)));
		}else if($empresa_id!=0 && $empresasurcusale_id!=0){
			$empresasurcusales = $this->Venta->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id,'Empresasurcusale.id'=>$empresasurcusale_id)));
		}
		if($empresa_id==0 && $empresasurcusale_id==0){
			$users    = $this->Venta->User->find('list', array('conditions'=>array('or'=>array('role_id'=>array(3,4)))));
		}else if($empresa_id!=0 && $empresasurcusale_id==0){
			$users    = $this->Venta->User->find('list', array('conditions'=>array('or'=>array('role_id'=>array(3,4)), 'empresa_id'=>$empresa_id)));
		}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==3){
			$users    = $this->Venta->User->find('list', array('conditions'=>array('or'=>array('role_id'=>array(3,4)), 'empresa_id'=>$empresa_id, 'empresasurcusale_id'=>$empresasurcusale_id)));
		}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==4){
			$users    = $this->Venta->User->find('list', array('conditions'=>array('or'=>array('role_id'=>array(3,4)), 'User.empresa_id'=>$empresa_id, 'User.empresasurcusale_id'=>$empresasurcusale_id, 'User.id'=>$user_id)));
		}
		if($empresa_id==0 && $empresasurcusale_id==0){
			$clientes    = $this->Venta->Cliente->find('list', array('conditions'=>array('activo'=>1)));
		}else if($empresa_id!=0 && $empresasurcusale_id==0){
			$clientes    = $this->Venta->Cliente->find('list', array('conditions'=>array('activo'=>1, 'empresa_id'=>$empresa_id)));
		}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==3){
			$clientes    = $this->Venta->Cliente->find('list', array('conditions'=>array('activo'=>1, 'empresa_id'=>$empresa_id, 'empresasurcusale_id'=>$empresasurcusale_id)));
		}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==4){
			$clientes    = $this->Venta->Cliente->find('list', array('conditions'=>array('activo'=>1, 'empresa_id'=>$empresa_id, 'empresasurcusale_id'=>$empresasurcusale_id, 'user_id'=>$user_id)));
		}
		$almacentipos = $this->Venta->Almacentipo->find('list', array('conditions'=>array('empresa_id'=>$empresa_id)));
		$almacenes = array();
		//$almacenproductos = $this->Almacenproducto->find('all', array('conditions'=>array('Almacenproducto.empresa_id'=>$empresa_id) ));
		$almacenproductos = array();
		$this->set(compact('almacenproductos', 'empresas', 'empresasurcusales', 'clientes', 'users', 'almacentipos', 'almacenes'));
	}

	/**
	* edit method
	*
	* @throws NotFoundException
	* @param string $id
	* @return void
	*/
	public function edit($id = null) {
		$empresa_id          = $this->Session->read('empresa_id');
		$empresasurcusale_id = $this->Session->read('empresasurcusale_id');
		$rol_id              = $this->Session->read('ROL');
		$user_id             = $this->Session->read('USUARIO_ID');
		if (!$this->Venta->exists($id)) {
			throw new NotFoundException(__('Invalid venta'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if($this->request->data['Venta']['tipo']==1){
				$this->request->data['Venta']['estado']=1; //Registrado
			}else{
				$this->request->data['Venta']['estado']=2; //Pendiente Autorizar
			}
			if ($this->Venta->save($this->request->data)) {
				$this->Ventadetalle->deleteAll(array('Ventadetalle.venta_id'=>$id));
				$stop = 0;
				//pr($this->request->data["Venta"]["Productos"]);
				if(!empty($this->request->data["Venta"]["Productos"])){
					foreach($this->request->data["Venta"]["Productos"] as $producto){
						$this->request->data["Ventadetalle"]["venta_id"]           = $id;
						$this->request->data["Ventadetalle"]["almacenproducto_id"] = $producto['pro'];
						$this->request->data["Ventadetalle"]["cantidad"]           = $producto['cant'];
						$this->request->data["Ventadetalle"]["existencia"]         = $producto['exist'];
						$this->request->data["Ventadetalle"]["precio"]             = $producto['pre'];
						$this->request->data["Ventadetalle"]["total"]              = $producto['total'];
						$this->request->data["Ventadetalle"]["embalaje"]           = $producto['emb'];
						$this->Ventadetalle->create();
						if ($this->Ventadetalle->save($this->request->data)){

						}else{
							$stop = 1;
						}
						//$i++;
					}
				}
				if($stop==0){
					$this->Venta->commit();
					$this->Flash->success(__('Registro Guardado.'));
					return $this->redirect(array('action' => 'index'));

				}else{
					$this->Venta->rollback();
					$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
				}
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('Venta.' . $this->Venta->primaryKey => $id));
			$this->request->data = $this->Venta->find('first', $options);
		}
		$empresas = $this->Venta->Empresa->find('list', array('conditions'=>array('id'=>$empresa_id) ));
		if($empresa_id==0 && $empresasurcusale_id==0){
			$empresasurcusales = $this->Venta->Empresasurcusale->find('list');
		}else if($empresa_id!=0 && $empresasurcusale_id==0){
			$empresasurcusales = $this->Venta->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id)));
		}else if($empresa_id!=0 && $empresasurcusale_id!=0){
			$empresasurcusales = $this->Venta->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id,'Empresasurcusale.id'=>$empresasurcusale_id)));
		}
		if($empresa_id==0 && $empresasurcusale_id==0){
			$users    = $this->Venta->User->find('list', array('conditions'=>array('or'=>array('role_id'=>array(3,4)))));
		}else if($empresa_id!=0 && $empresasurcusale_id==0){
			$users    = $this->Venta->User->find('list', array('conditions'=>array('or'=>array('role_id'=>array(3,4)), 'empresa_id'=>$empresa_id)));
		}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==3){
			$users    = $this->Venta->User->find('list', array('conditions'=>array('or'=>array('role_id'=>array(3,4)), 'empresa_id'=>$empresa_id, 'empresasurcusale_id'=>$empresasurcusale_id)));
		}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==4){
			$users    = $this->Venta->User->find('list', array('conditions'=>array('or'=>array('role_id'=>array(3,4)), 'User.empresa_id'=>$empresa_id, 'User.empresasurcusale_id'=>$empresasurcusale_id, 'User.id'=>$user_id)));
		}
		if($empresa_id==0 && $empresasurcusale_id==0){
			$clientes    = $this->Venta->Cliente->find('list', array('conditions'=>array('activo'=>1)));
		}else if($empresa_id!=0 && $empresasurcusale_id==0){
			$clientes    = $this->Venta->Cliente->find('list', array('conditions'=>array('activo'=>1, 'empresa_id'=>$empresa_id)));
		}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==3){
			$clientes    = $this->Venta->Cliente->find('list', array('conditions'=>array('activo'=>1, 'empresa_id'=>$empresa_id, 'empresasurcusale_id'=>$empresasurcusale_id)));
		}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==4){
			$clientes    = $this->Venta->Cliente->find('list', array('conditions'=>array('activo'=>1, 'empresa_id'=>$empresa_id, 'empresasurcusale_id'=>$empresasurcusale_id, 'user_id'=>$user_id)));
		}
		$almacentipos     = $this->Venta->Almacentipo->find('list', array('conditions'=>array('empresa_id'=>$empresa_id)));
		$almacenes        = $this->Venta->Almacene->find('list',    array('conditions'=>array('almacentipo_id'=>$this->request->data['Venta']['almacentipo_id'])));
		$almacenproductos = $this->Almacenproducto->find('all',     array('conditions'=>array('Almacenproducto.empresa_id'=>$empresa_id)));
		$ventadetalles    = $this->Ventadetalle->find('all',        array('conditions'=>array('Ventadetalle.venta_id'=>$this->request->data['Venta']['id'])));
		$this->set(compact('ventadetalles', 'almacenproductos', 'empresas', 'empresasurcusales', 'clientes', 'users', 'almacentipos', 'almacenes'));
		$this->set('id1',$this->request->data['Venta']['almacentipo_id']);
		$this->set('id2',$this->request->data['Venta']['almacene_id']);
		//$this->Almacenmarcadetalle->recursive = 3;
		$almacenmarcadetalles = $this->Almacenmarcadetalle->find('all', array('conditions'=>array('Almacenmarca.empresa_id'=>$empresa_id)));
		$this->set('almacenmarcadetalles',$almacenmarcadetalles);
		//pr($data2);
	}

	/**
	* delete method
	*
	* @throws NotFoundException
	* @param string $id
	* @return void
	*/
	public function delete($id = null) {
		$empresa_id          = $this->Session->read('empresa_id');
		$empresasurcusale_id = $this->Session->read('empresasurcusale_id');
		$rol_id              = $this->Session->read('ROL');
		$user_id             = $this->Session->read('USUARIO_ID');
		$this->request->data['Venta']['id']     = $id;
		$this->request->data['Venta']['activo'] = 2;
		if ($this->Venta->save($this->request->data)) {
			if($this->request->data['Venta']['activo']==3){
				$ventadetalles = $this->Ventadetalle->find('all', array('conditions' =>array('Ventadetalle.venta_id'=>$id)));
				// pr($ventadetalles);
				foreach($ventadetalles as $ventadetalle){
					$this->request->data['Inventariomovimiento']['empresa_id']              = $ventadetalle['Venta']['empresa_id'];
					$this->request->data['Inventariomovimiento']['empresasurcusale_id']     = $ventadetalle['Venta']['empresasurcusale_id'];
					$this->request->data['Inventariomovimiento']['almacentipo_id']          = $ventadetalle['Venta']['almacentipo_id'];
					$this->request->data['Inventariomovimiento']['almacene_id']             = $ventadetalle['Venta']['almacene_id'];
					$this->request->data['Inventariomovimiento']['almacenproducto_id']      = $ventadetalle['Venta']['almacenproducto_id'];
					$this->request->data['Inventariomovimiento']['tipo']                    = 1;
					$this->request->data['Inventariomovimiento']['cantidad']                = $ventadetalle['Ventadetalle']['cantidad'];
					$this->request->data['Inventariomovimiento']['fechaalta']               = $ventadetalle['Venta']['fecha'];
					$this->request->data['Inventariomovimiento']['almacentipofunte_id']     = 0;
					$this->request->data['Inventariomovimiento']['almacenefunte_id']        = 0;
					$this->request->data['Inventariomovimiento']['referencia']              = 0;
					$this->request->data['Inventariomovimiento']['ordenventa_id']           = 0;
					$this->request->data['Inventariomovimiento']['userventa_id']            = 0;
					$this->Inventariomovimiento->save($this->request->data);
					$almacenmarca_id  = $ventadetalle['Venta']['almacenmarca_id'];
					$almacene_id      = $ventadetalle['Venta']['almacene_id'];
					$almacenes            = $this->Almacene->find('all', array('conditions'=>array('id'=>$almacene_id)));
					$almacenmarcadetalles = $this->Almacenmarcadetalle->find('all', array('conditions'=>array('almacenmarca_id'=>$almacenmarca_id, 'default'=>1)));
					if($almacenes[0]['Almacene']['foraneo']==2){
						foreach($almacenmarcadetalles as $datos){
							$cantidad =  $datos['Almacenmarcadetalle']['cantidad']/$ventadetalle['Ventadetalle']['cantidad'];
							$this->request->data['Inventariomovimateriale']['empresa_id']              = $empresa_id;
							$this->request->data['Inventariomovimateriale']['empresasurcusale_id']     = $empresasurcusale_id;
							$this->request->data['Inventariomovimateriale']['almacentipo_id']          = $this->request->data['Inventariomovimiento']['almacentipo_id'];
							$this->request->data['Inventariomovimateriale']['almacene_id']             = $this->request->data['Inventariomovimiento']['almacene_id'];
							$this->request->data['Inventariomovimateriale']['almacenmateriale_id']     = $datos['Almacenmarcadetalle']['almacenmateriale_id'];
							$this->request->data['Inventariomovimateriale']['tipo']                    = 2;
							$this->request->data['Inventariomovimateriale']['cantidad']                = $cantidad;
							$this->request->data['Inventariomovimateriale']['fechaalta']               = $this->request->data['Inventariomovimiento']['fechaalta'];
							$this->request->data['Inventariomovimateriale']['usermovi_id']             = $user_id;
							$this->request->data['Inventariomovimateriale']['inventariomovimiento_id'] = $id ;
							$this->Inventariomovimateriale->save($this->request->data);
						}
					}
				}
			}
			$this->Flash->success(__('El Registro fue eliminado.'));
		} else {
			$this->Flash->error(__('El Registro no fue eliminado. Por favor, inténtelo de nuevo.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	/**
	* pagar method
	*
	* @throws NotFoundException
	* @param string $id
	* @return void
	*/
	public function pagar($id = null) {

		$empresa_id          = $this->Session->read('empresa_id');
		$empresasurcusale_id = $this->Session->read('empresasurcusale_id');
		$rol_id              = $this->Session->read('ROL');
		$user_id             = $this->Session->read('USUARIO_ID');

		$this->request->data['Venta']['id']     = $id;
		$this->request->data['Venta']['pagado'] = 1;
		$this->request->data['Venta']['fecha_pagado'] = date("Y-m-d");
		if ($this->Venta->save($this->request->data)) {
			$this->Flash->success(__('El Registro fue Actualizado.'));
		} else {
			$this->Flash->error(__('El Registro no fue Actualizado. Por favor, inténtelo de nuevo.'));
	    $empresa_id          = $this->Session->read('empresa_id');
     	$empresasurcusale_id = $this->Session->read('empresasurcusale_id');
     	$rol_id              = $this->Session->read('ROL');
     	$user_id             = $this->Session->read('USUARIO_ID');
		if (!$this->Venta->exists($id)) {
			throw new NotFoundException(__('Invalid venta'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if($this->request->data['Venta']['tipo']==1){
			   $this->request->data['Venta']['estado']=1; //Registrado
			}else{
               $this->request->data['Venta']['estado']=2; //Pendiente Autorizar
			}
			if ($this->Venta->save($this->request->data)) {
                $this->Ventadetalle->deleteAll(array('Ventadetalle.venta_id'=>$id));
				$stop = 0;
				if(!empty($this->request->data["Venta"]["Productos"])){
					foreach($this->request->data["Venta"]["Productos"] as $producto){
						$this->request->data["Ventadetalle"]["venta_id"]           = $id;
						$this->request->data["Ventadetalle"]["almacenproducto_id"] = $producto['pro'];
						$this->request->data["Ventadetalle"]["cantidad"]           = $producto['cant'];
						$this->request->data["Ventadetalle"]["existencia"]         = $producto['exist'];
						$this->request->data["Ventadetalle"]["precio"]             = $producto['pre'];
						$this->request->data["Ventadetalle"]["total"]              = $producto['total'];
						$this->request->data["Ventadetalle"]["embalaje"]           = $producto['emb'];
						$this->Ventadetalle->create();
						if ($this->Ventadetalle->save($this->request->data)){

						}else{
							$stop = 1;
						}
						$i++;
					}
				}
				if($stop==0){
                    $this->Venta->commit();
                	$this->Flash->success(__('Registro Guardado.'));
					return $this->redirect(array('action' => 'index'));

                }else{
                	$this->Venta->rollback();
                    $this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
                }



			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('Venta.' . $this->Venta->primaryKey => $id));
			$this->request->data = $this->Venta->find('first', $options);
		}
		$empresas = $this->Venta->Empresa->find('list', array('conditions'=>array('id'=>$empresa_id) ));
			  if($empresa_id==0 && $empresasurcusale_id==0){
            	$empresasurcusales = $this->Venta->Empresasurcusale->find('list');
     	}else if($empresa_id!=0 && $empresasurcusale_id==0){
                $empresasurcusales = $this->Venta->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id)));
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0){
                $empresasurcusales = $this->Venta->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id,'Empresasurcusale.id'=>$empresasurcusale_id)));
      	}
              if($empresa_id==0 && $empresasurcusale_id==0){
            	$users    = $this->Venta->User->find('list', array('conditions'=>array('or'=>array('role_id'=>array(3,4)))));
     	}else if($empresa_id!=0 && $empresasurcusale_id==0){
                $users    = $this->Venta->User->find('list', array('conditions'=>array('or'=>array('role_id'=>array(3,4)), 'empresa_id'=>$empresa_id)));
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==3){
                $users    = $this->Venta->User->find('list', array('conditions'=>array('or'=>array('role_id'=>array(3,4)), 'empresa_id'=>$empresa_id, 'empresasurcusale_id'=>$empresasurcusale_id)));
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==4){
                $users    = $this->Venta->User->find('list', array('conditions'=>array('or'=>array('role_id'=>array(3,4)), 'User.empresa_id'=>$empresa_id, 'User.empresasurcusale_id'=>$empresasurcusale_id, 'User.id'=>$user_id)));
      	}
      	     if($empresa_id==0 && $empresasurcusale_id==0){
            	$clientes    = $this->Venta->Cliente->find('list', array('conditions'=>array('activo'=>1)));
     	}else if($empresa_id!=0 && $empresasurcusale_id==0){
                $clientes    = $this->Venta->Cliente->find('list', array('conditions'=>array('activo'=>1, 'empresa_id'=>$empresa_id)));
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==3){
                $clientes    = $this->Venta->Cliente->find('list', array('conditions'=>array('activo'=>1, 'empresa_id'=>$empresa_id, 'empresasurcusale_id'=>$empresasurcusale_id)));
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==4){
                $clientes    = $this->Venta->Cliente->find('list', array('conditions'=>array('activo'=>1, 'empresa_id'=>$empresa_id, 'empresasurcusale_id'=>$empresasurcusale_id, 'user_id'=>$user_id)));
      	}
		$almacentipos     = $this->Venta->Almacentipo->find('list', array('conditions'=>array('empresa_id'=>$empresa_id)));
		$almacenes        = $this->Venta->Almacene->find('list',    array('conditions'=>array('almacentipo_id'=>$this->request->data['Venta']['almacentipo_id'])));
		$almacenproductos = $this->Almacenproducto->find('all',     array('conditions'=>array('Almacenproducto.empresa_id'=>$empresa_id)));
		$ventadetalles    = $this->Ventadetalle->find('all',        array('conditions'=>array('Ventadetalle.venta_id'=>$this->request->data['Venta']['id'])));
		$this->set(compact('ventadetalles', 'almacenproductos', 'empresas', 'empresasurcusales', 'clientes', 'users', 'almacentipos', 'almacenes'));
		$this->set('id1',$this->request->data['Venta']['almacentipo_id']);
		$this->set('id2',$this->request->data['Venta']['almacene_id']);
      //$this->Almacenmarcadetalle->recursive = 3;
		$almacenmarcadetalles = $this->Almacenmarcadetalle->find('all', array('conditions'=>array('Almacenmarca.empresa_id'=>$empresa_id)));
		$this->set('almacenmarcadetalles',$almacenmarcadetalles);
		//pr($data2);
	}
}
	/**
 * pagar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function pagar2($id = null) {
		  $this->layout="ajax";
			if(!$this->Session->check('usuario_valido')==false){
				$rol_id              = $this->Session->read('ROL');
				$response = array();
				if($rol_id  == 1 || $rol_id == 2 || $rol_id  == 3){
					$venta = $this->Venta->findAllById($this->request->data['venta']);
					$venta[0]['Venta']['pagado'] = 1;
					$venta[0]['Venta']['fecha_pagado'] = $this->request->data['fecha'];

					if($this->Venta->save($venta[0]['Venta'])){
						$response['status'] = 'OK';
						$response['venta'] = $venta[0]['Venta'];
					}
				}else{
					$response['status'] = 'ERROR';
					$response['message'] = 'Usted no tiene acceso para realizar esta operacion';
				}
				$this->set('response', $response);
			}
	}

	/**
	* cambiar method
	*
	* @throws NotFoundException
	* @param string $id
	* @return void
	*/
	public function cambiar($id = null) {
		$empresa_id          = $this->Session->read('empresa_id');
		$empresasurcusale_id = $this->Session->read('empresasurcusale_id');
		$rol_id              = $this->Session->read('ROL');
		$user_id             = $this->Session->read('USUARIO_ID');
		if (!$this->Venta->exists($id)) {
			throw new NotFoundException(__('Invalid venta'));
		}
		if ($this->request->is(array('post', 'put'))) {

			    $this->request->data['Venta']['id']     = $id;
			    //$this->request->data['Venta']['activo'] = 2;
				if ($this->Venta->save($this->request->data)) {
                   if($this->request->data['Venta']['estado']==3){
                   	        $ventadetalles = $this->Ventadetalle->find('all', array('conditions' =>array('Ventadetalle.venta_id'=>$id)));
                   	      // pr($ventadetalles);
                            foreach($ventadetalles as $ventadetalle){
	       						$this->request->data['Inventariomovimiento']['empresa_id']              = $ventadetalle['Venta']['empresa_id'];
							    $this->request->data['Inventariomovimiento']['empresasurcusale_id']     = $ventadetalle['Venta']['empresasurcusale_id'];
							    $this->request->data['Inventariomovimiento']['almacentipo_id']          = $ventadetalle['Venta']['almacentipo_id'];
							    $this->request->data['Inventariomovimiento']['almacene_id']             = $ventadetalle['Venta']['almacene_id'];
							    $this->request->data['Inventariomovimiento']['almacenproducto_id']      = $ventadetalle['Ventadetalle']['almacenproducto_id'];
							    $this->request->data['Inventariomovimiento']['tipo']                    = 2;
							    $this->request->data['Inventariomovimiento']['cantidad']                = $ventadetalle['Ventadetalle']['cantidad'];
							    $this->request->data['Inventariomovimiento']['fechaalta']               = $ventadetalle['Venta']['fecha'];
							    $this->request->data['Inventariomovimiento']['almacentipofunte_id']     = 0;
							    $this->request->data['Inventariomovimiento']['almacenefunte_id']        = 0;
							    $this->request->data['Inventariomovimiento']['referencia']              = 0;
							    $this->request->data['Inventariomovimiento']['ordenventa_id']           = $id;
							    $this->request->data['Inventariomovimiento']['userventa_id']            = $user_id;
							    $this->Inventariomovimiento->create();
								$this->Inventariomovimiento->save($this->request->data);
								$almacenmarca_id  = $ventadetalle['Almacenproducto']['almacenmarca_id'];
								$almacene_id      = $ventadetalle['Venta']['almacene_id'];
								$almacenes            = $this->Almacene->find('all', array('conditions'=>array('Almacene.id'=>$almacene_id)));
								$almacenmarcadetalles = $this->Almacenmarcadetalle->find('all', array('conditions'=>array('almacenmarca_id'=>$almacenmarca_id, 'default'=>1)));
								if($almacenes[0]['Almacene']['foraneo']==2){
									foreach($almacenmarcadetalles as $datos){
                                        $cantidad =  $datos['Almacenmarcadetalle']['cantidad']/$ventadetalle['Ventadetalle']['cantidad'];
		                                $this->request->data['Inventariomovimateriale']['empresa_id']              = $empresa_id;
									    $this->request->data['Inventariomovimateriale']['empresasurcusale_id']     = $empresasurcusale_id;
									    $this->request->data['Inventariomovimateriale']['almacentipo_id']          = $this->request->data['Inventariomovimiento']['almacentipo_id'];
									    $this->request->data['Inventariomovimateriale']['almacene_id']             = $this->request->data['Inventariomovimiento']['almacene_id'];
									    $this->request->data['Inventariomovimateriale']['almacenmateriale_id']     = $datos['Almacenmarcadetalle']['almacenmateriale_id'];
									    $this->request->data['Inventariomovimateriale']['tipo']                    = 2;
									    $this->request->data['Inventariomovimateriale']['cantidad']                = $cantidad;
									    $this->request->data['Inventariomovimateriale']['fechaalta']               = $this->request->data['Inventariomovimiento']['fechaalta'];
									    $this->request->data['Inventariomovimateriale']['usermovi_id']             = $user_id;
									    $this->request->data['Inventariomovimateriale']['inventariomovimiento_id'] = $id ;
										$this->Inventariomovimateriale->create();
										$this->Inventariomovimateriale->save($this->request->data);
									}
								}
					}
				}
				$this->Flash->success(__('El Registro fue actualizadp.'));
			} else {
				$this->Flash->error(__('El Registro no fue actualizado. Por favor, inténtelo de nuevo.'));
			}
			return $this->redirect(array('action' => 'index'));
		} else {
			$options = array('conditions' => array('Venta.' . $this->Venta->primaryKey => $id));
			$this->request->data = $this->Venta->find('first', $options);
		}
		$empresas = $this->Venta->Empresa->find('list', array('conditions'=>array('id'=>$empresa_id) ));
		if($empresa_id==0 && $empresasurcusale_id==0){
			$empresasurcusales = $this->Venta->Empresasurcusale->find('list');
		}else if($empresa_id!=0 && $empresasurcusale_id==0){
			$empresasurcusales = $this->Venta->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id)));
		}else if($empresa_id!=0 && $empresasurcusale_id!=0){
			$empresasurcusales = $this->Venta->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id,'Empresasurcusale.id'=>$empresasurcusale_id)));
		}
		$users            = $this->Venta->User->find('list',    array('conditions'=>array('User.id'=>$this->request->data['Venta']['user_id'])));
		$clientes         = $this->Venta->Cliente->find('list', array('conditions'=>array('Cliente.id'=>$this->request->data['Venta']['cliente_id'])));
		$almacentipos     = $this->Venta->Almacentipo->find('list', array('conditions'=>array('Almacentipo.id'=>$this->request->data['Venta']['almacentipo_id'])));
		$almacenes        = $this->Venta->Almacene->find('list',    array('conditions'=>array('almacentipo_id'=>$this->request->data['Venta']['almacentipo_id'], 'id'=>$this->request->data['Venta']['almacene_id'])));
		$almacenproductos = $this->Almacenproducto->find('all',     array('conditions'=>array('Almacenproducto.empresa_id'=>$empresa_id)));
		$ventadetalles    = $this->Ventadetalle->find('all',        array('conditions'=>array('Ventadetalle.venta_id'=>$this->request->data['Venta']['id'])));
		$this->set(compact('ventadetalles', 'almacenproductos', 'empresas', 'empresasurcusales', 'clientes', 'users', 'almacentipos', 'almacenes'));
		$this->set('id1',$this->request->data['Venta']['almacentipo_id']);
		$this->set('id2',$this->request->data['Venta']['almacene_id']);
		//$this->Almacenmarcadetalle->recursive = 3;
		$almacenmarcadetalles = $this->Almacenmarcadetalle->find('all', array('conditions'=>array('Almacenmarca.empresa_id'=>$empresa_id)));
		$this->set('almacenmarcadetalles',$almacenmarcadetalles);
		//pr($data2);

	}
	/**
	* almacen method
	*
	* @throws NotFoundException
	* @param string $id
	* @return void
	*/
	public function almacen($id = null) {
		$this->layout="ajax";
		$empresa_id          = $this->Session->read('empresa_id');
     	$empresasurcusale_id = $this->Session->read('empresasurcusale_id');
     	$rol_id              = $this->Session->read('ROL');
     	$user_id             = $this->Session->read('USUARIO_ID');
		$data_ = $this->Almacenuser->find('all', array('conditions'=>array('user_id'=>$user_id)));
		//pr($data_);
		foreach($data_ as $key) {
			$almacen[] = $key['Almacenuser']['almacene_id'];
		}
		if(!isset($almacen)){

		}else{
			$data  = $this->Inventariomovimiento->Almacene->find('list', array('conditions'=>array('almacentipo_id'=>$id, 'Almacene.id'=>$almacen)));
		}
		if(!isset($data)){$data=array();}
		$this->set('almacenes',$data);
		$this->set('id',$id);
	}

	/**
	* listproductos method
	*
	* @throws NotFoundException
	* @param string $id
	* @return void
	*/
	public function listproductos($id1 = null,$id2 = null,$id3 = null) {
		$this->layout="ajax";
		$empresa_id          = $this->Session->read('empresa_id');
		$empresasurcusale_id = $this->Session->read('empresasurcusale_id');
		$rol_id              = $this->Session->read('ROL');
		$user_id             = $this->Session->read('USUARIO_ID');
		$almacenproductos = $this->Almacenproducto->find('all', array('conditions'=>array('Almacenproducto.empresa_id'=>$empresa_id)));
		$this->set('almacenproductos',$almacenproductos);
		$this->set('id1',$id1);
		$this->set('id2',$id2);
	}


	/**
	* producto method
	*
	* @throws NotFoundException
	* @param string $id
	* @return void
	*/
	public function producto($id1 = null, $id2 = null, $id3 = null, $id4 = null) {
		$this->layout="ajax";
		$empresa_id          = $this->Session->read('empresa_id');
		$empresasurcusale_id = $this->Session->read('empresasurcusale_id');
		$rol_id              = $this->Session->read('ROL');
		$user_id             = $this->Session->read('USUARIO_ID');

		$data = $this->Almacenproducto->find('all', array('conditions'=>array('Almacenproducto.id'=>$id4)));

		$almacenmarca_id = isset($data[0]['Almacenproducto']['almacenmarca_id'])?$data[0]['Almacenproducto']['almacenmarca_id']:0;

		$data2 = $this->Almacenmarcadetalle->find('all', array('conditions'=>array('Almacenmarcadetalle.almacenmarca_id'=>$almacenmarca_id),
																												 'order' => array('Almacenmarcadetalle.default DESC')
																									   )
																							);


		$existencia = 0;

		$stock = $this->consultaInventario($id4, $id2 );
		$existencia = $stock['totalFisico'] - $stock['totalTransito'];

		/*
		array(
	'totalFisico' => (int) 400,
	'totalTransito' => (float) 466
)

		$data3 = $this->Inventariomovimiento->find('all', array('conditions'=>array('Inventariomovimiento.activo'=>1, 'Inventariomovimiento.empresa_id'=>$empresa_id, 'Inventariomovimiento.empresasurcusale_id'=>$empresasurcusale_id, 'Inventariomovimiento.almacentipo_id'=>$id1, 'Inventariomovimiento.almacene_id'=>$id2, 'Inventariomovimiento.almacenproducto_id'=>$id4)));
		$data4 = $this->Venta->Ventadetalle->find( 'all', array('conditions'=>array('Venta.estado'=>3, 'Venta.activo'=>1, 'Venta.empresa_id'=>$empresa_id, 'Venta.empresasurcusale_id'=>$empresasurcusale_id, 'Venta.almacentipo_id'=>$id1, 'Venta.almacene_id'=>$id2, 'Ventadetalle.almacenproducto_id'=>$id4)));
		$entrada    = 0;
		$salida     = 0;
		$registrado = 0;
		$existencia = 0;
		foreach ($data3 as $value) {
			if($value['Inventariomovimiento']['tipo']==1){
				$entrada += $value['Inventariomovimiento']['cantidad'];
			}else if($value['Inventariomovimiento']['tipo']==2){
				$salida  += $value['Inventariomovimiento']['cantidad'];
			}else if($value['Inventariomovimiento']['tipo']==3){
				if($value['Inventariomovimiento']['tipo_transferencia']==1){
					$entrada  += $value['Inventariomovimiento']['cantidad'];
				}else if($value['Inventariomovimiento']['tipo_transferencia']==2){
					$salida  += $value['Inventariomovimiento']['cantidad'];
				}
			}
		}
		foreach ($data4 as $value2) {
			$registrado  += $value2['Ventadetalle']['cantidad'];
		}
		$existencia = $entrada - ($salida + $registrado);
		*/
		// pr($data3);
		$this->set('num',$id3);
		$this->set('precio',isset($data[0]['Almacenproducto']['precio'])?$data[0]['Almacenproducto']['precio']:0);
		$this->set('existencia',$existencia);
		$this->set('almacenmarcadetalles',$data2);
	}



	/**
	* cliente method
	*
	* @throws NotFoundException
	* @param string $id
	* @return void
	*/
	public function cliente($id = null) {
		$this->layout="ajax";
		$datas = $this->Venta->Cliente->find('all', array('conditions'=>array('Cliente.id'=>$id)));
		if(isset($datas[0]['Cliente']['nombre'])){
			$data  = "Id:".$datas[0]['Cliente']['id'].", Nombre: ".$datas[0]['Cliente']['nombre'].", Teléfono: ".$datas[0]['Cliente']['telefono'].", Celular: ".$datas[0]['Cliente']['celular'];
			$data .= ", Nombre contacto: ".$datas[0]['Cliente']['nombre_contacto'];
			$data .= ", Email: ".$datas[0]['Cliente']['email'];
			$data .= ", Fecha alta: ".$datas[0]['Cliente']['fecha_alta'];
			if($datas[0]['Cliente']['razon_social']!=""){
				$data .= ", Razon social: ".$datas[0]['Cliente']['razon_social'];
				$data .= ", Calle: ".$datas[0]['Cliente']['calle'];
				$data .= ", Número exterior: ".$datas[0]['Cliente']['numero_exterior'];
				$data .= ", Número interior: ".$datas[0]['Cliente']['numero_interior'];
				$data .= ", Código postal: ".$datas[0]['Cliente']['cod_postal'];
				$data .= ", Colonia: ".$datas[0]['Cliente']['colonia'];
				$data .= ", Rfc: ".$datas[0]['Cliente']['rfc'];
				$data .= ", Pais: ".$datas[0]['Direpai']['denominacion'];
				$data .= ", Estado: ".$datas[0]['Direprovincia']['denominacion'];
				$data .= ", Municipio: ".$datas[0]['Dirmunicipio']['denominacion'];

			}
		}else{
			$data = "";
		}
		//$data .= "Fecha: ".$datas[0]['Cliente']['fecha_alta'];
		$this->set('data',$data);
	}

	/**
	* reporte1 method
	*
	* @return void
	*/
	public function reporte1($id=null) {
		$empresa_id          = $this->Session->read('empresa_id');
		$empresasurcusale_id = $this->Session->read('empresasurcusale_id');
		$rol_id              = $this->Session->read('ROL');
		$user_id             = $this->Session->read('USUARIO_ID');
		$this->set('id',$id);
		$this->layout = 'pdf';

		App::import('Vendor', 'Fpdf', array('file' => 'fpdf181/fpdf.php'));
		$this->set('name', "venta_".$id."_".date('d_m_Y').".pdf");

		$this->Venta->recursive = 2;

		$datas = $this->Venta->find('all', array('conditions'=>array('Venta.id'=>$id)));
		$this->set('datas', $datas);
	}

	public function estado(){
		$this->autoRender = false;
		$rol_id= $this->Session->read('ROL');
		if($rol_id ==1 || $rol_id ==2 || $rol_id ==3 || $rol_id ==5){
			$id= $this->request->params['named']['id'];
			$estado = (int)$this->request->params['named']['estado'];
			$data = $this->Venta->findAllById($id);
			$ok = true;
			if(count($data) > 0){
				$estadosValidos = $this->cambioEstado($rol_id, $data[0]['Venta']['estado']);
				if(in_array($estado, $estadosValidos , true)){
					$estadoAnte = $data[0]['Venta']['estado'];
					$data[0]['Venta']['estado'] = $estado;
					if($this->Venta->save($data[0]['Venta'])){
						if($estado == self::ENTREGADO){
							$materiales = $this->calculaMateriales($data[0]);
							if($this->validaMateriales($data[0], $materiales)){
								if($this->generaMovimientosInventario($data[0], 2)){
									if(!$this->generaMovimientosMateriales($data[0], $materiales, 2)){
										$this->generaMovimientosInventario($data[0], 1);
										$data[0]['Venta']['estado'] = $estadoAnte;
										$this->Venta->save($data[0]['Venta']);
										$ok = false;
										$this->Flash->error(__('Error al afectar el inventario de materiales'));
									}
								}else{
									$data[0]['Venta']['estado'] = $estadoAnte;
									$this->Venta->save($data[0]['Venta']);
									$ok = false;
									$this->Flash->error(__('Error al afectar el inventario de productos'));
								}
							}else{
								$data[0]['Venta']['estado'] = $estadoAnte;
								$this->Venta->save($data[0]['Venta']);
								$ok = false;
								$this->Flash->error(__('Error No hay materiales suficientes'));
							}
						}else if($estadoAnte == self::ENTREGADO){
							$materiales = $this->calculaMateriales($data[0]);
							if($this->generaMovimientosInventario($data[0], 1)){
								if(!$this->generaMovimientosMateriales($data[0], $materiales, 1)){
									$this->generaMovimientosInventario($data[0], 2);
									$data[0]['Venta']['estado'] = $estadoAnte;
									$this->Venta->save($data[0]['Venta']);
									$ok = false;
									$this->Flash->error(__('Error al afectar el inventario de materiales'));
								}
							}
							else {
								$data[0]['Venta']['estado'] = $estadoAnte;
								$this->Venta->save($data[0]['Venta']);
								$this->Flash->error(__('Error al afectar el inventario de productos'));
								$ok = false;
							}
						}
					}else{
						//marca error de actualizacion de estado
						$this->Flash->error(__('Error al tratar de actualizar el estado'));
						$ok = false;
					}
				}else{
					$this->Flash->error(__('Cambio de estado Invalido'));
					$ok = false;
					//Error cambio de estado
				}
				if($ok == true){
					$this->Flash->success(__('Cambio de Estado realizado con exito'));
				}
			}else{
				$this->Flash->error(__('No se encontraron los datos de la venta'));
			}
		}else{
			$this->Flash->error(__('Usuario Invalido para esta opcion.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	/*
	$tipo = 1 Entrada
				= 2 Salida
	*/
	protected function generaMovimientosInventario($venta, $tipo){
		$user_id             = $this->Session->read('USUARIO_ID');
		$valido = true;
		$data[] = array();

		for ($i=0, $j=0; $i < count($venta['Ventadetalle']) && $valido; $i++) {
			if ($tipo == 2) {
					$valido =  $this->validaInventario($venta['Ventadetalle'][$i], $venta['Venta']['almacene_id'] );
			}
			if($valido){
				$movimientoProducto = array(
					'empresa_id' 						=> $venta['Venta']['empresa_id'],
					'empresasurcusale_id' 	=> $venta['Venta']['empresasurcusale_id'],
					'almacentipo_id'      	=> $venta['Venta']['almacentipo_id'],
					'almacene_id'         	=> $venta['Venta']['almacene_id'],
					'almacenproducto_id'  	=> $venta['Ventadetalle'][$i]['almacenproducto_id'],
					'tipo'                	=> $tipo,
					'cantidad'            	=> $venta['Ventadetalle'][$i]['cantidad'],
					'fechaalta'           	=> $venta['Venta']['fecha'],
					'almacentipofunte_id' 	=> 0,
					'almacenefunte_id'    	=> 0,
					'referencia'          	=> 0,
					'ordenventa_id'	       	=> $venta['Venta']['id'],
					'userventa_id'        	=> $user_id,
				);
				$data[$j] = array('Inventariomovimiento' => $movimientoProducto);
				$j++;
			}
		}
		if($valido == false){
			return false;
		}
		else {
			return ($this->Inventariomovimiento->saveMany($data));
		}
	}

	protected function generaMovimientosMateriales($venta, $materiales, $tipo){
		$user_id             = $this->Session->read('USUARIO_ID');
		$data[]  = array();
		$ret = true;

		if($venta['Almacene']['foraneo'] == 2){
			$ret = false;
			for ($i=0; $i < count($materiales) ; $i++) {
				$movimentosMateriales = array(
					'empresa_id'          		=> $venta['Venta']['empresa_id'],
					'empresasurcusale_id' 		=> $venta['Venta']['empresasurcusale_id'],
					'almacentipo_id'      		=> $venta['Venta']['almacentipo_id'],
					'almacene_id'         		=> $venta['Venta']['almacene_id'],
					'almacenmateriale_id' 		=> $materiales[$i]['almacenmateriale_id'],
					'tipo'                		=> $tipo,
					'cantidad'            		=> $materiales[$i]['cantidadMaterial'],
					'fechaalta'           		=> $venta['Venta']['fecha'],
					'usermovi_id'         		=> $user_id,
					'inventariomovimiento_id' => $venta['Venta']['id']
				);
				$data[$i] = array('Inventariomovimateriale' =>  $movimentosMateriales);
			}
			$ret = $this->Inventariomovimateriale->saveMany($data);
		}
		return ($ret);
	}

  protected function validaInventario($ventadetalle, $almacene_id, $banTransito = false){
		$ret = false;
		$dis = 0;
		$stock = $this->consultaInventario($ventadetalle['almacenproducto_id'], $almacene_id);
		if(count($stock) > 0){
			$dis = $stock['totalFisico'];
			$dis = $dis - $ventadetalle['cantidad'];
			$ret = $dis >= 1;
		}
		return $ret;
	}
	protected function consultaInventario($productoID, $almacene_id ){
		$ret = null;
		$options =  array(
			'conditions'=>array(
				'Vstock.almacenproducto_id'=> $productoID,
				'Vstock.almacene_id'=> $almacene_id,
			));
		$stock = $this->Vstock->find('all',$options);
		if(count($stock) > 0){
			$fisico = 0;
			$transito = 0;
			for ($i=0; $i < count($stock) ; $i++) {
				$fisico = $fisico + $stock[$i]['Vstock']['entradas'] - $stock[$i]['Vstock']['salidas'];
				if(!empty($stock[$i]['Vstock']['transito'])){
					$transito = $transito + $stock[$i]['Vstock']['transito'];
				}
			}
			$ret = array('totalFisico' => $fisico,
									'totalTransito' => $transito);
		}
		return $ret;
	}
	protected function validaMateriales($venta, $materiales){
		$ret = true;
		$materiales_id[] =  array();

		if($venta['Almacene']['foraneo'] == 2){
			$ret = false;
			for ($i=0; $i < count($materiales); $i++) {
				$materiales_id[$i] =  $materiales[$i]['almacenmateriale_id'];
			}
			$options =  array(
				'conditions'=>array(
					'Vstockmateriale.almacenmateriale_id'=> $materiales_id,
					'Vstockmateriale.almacene_id'=> $venta['Venta']['almacene_id'],
				));
			$stock = $this->Vstockmateriale->find('all',$options);
			$ret = true;
			for ($i=0; $i < count($materiales) && $ret ; $i++) {
				$found = false;
				$j=0;
				while($j < count($stock) && !$found) {
					if($stock[$j]['Vstockmateriale']['almacenmateriale_id'] == $materiales[$i]['almacenmateriale_id']){
						$found = true;
					}
					else {
						$j++;
					}
				}
				if($found){
					$disponible = $stock[$j]['Vstockmateriale']['entradas']
								  -  $stock[$j]['Vstockmateriale']['salidas']
									-  $materiales[$i]['cantidadMaterial'];
					$ret = ((int)$disponible >= 0);
				}
				else{
					$ret = false;
				}
			}
		}
		return($ret);
	}
	protected function calculaMateriales($venta){
	 	$ret[] = array();

		$options = array(
			'fields' => array(
				'Ventadetalle.embalaje', 'Almacenproducto.almacenmarca_id', 'SUM(`Ventadetalle`.`cantidad`) as `cantidad`'
			),
			'group'			=> array(
				'`Ventadetalle`.`embalaje`','`Almacenproducto`.`almacenmarca_id`'
			),
			'conditions'=>array(
				'Ventadetalle.venta_id'=> $venta['Venta']['id'],
			),

		);
		$embalajesMarca = $this->Ventadetalle->find('all', $options);
		$j = 0;
		foreach ($embalajesMarca as $aux) {
			if($aux[0]['cantidad'] > 0){
				$options = array(
					'conditions'=>array(
					'Almacenmarcadetalle.almacenmarca_id'=> $aux['Almacenproducto']['almacenmarca_id'],
					'Almacenmarcadetalle.almacenmateriale_id' => $aux['Ventadetalle']['embalaje']
					)
				);
				$configMarca = $this->Almacenmarcadetalle->find('first', $options);
				if(!empty($configMarca['Almacenmarcadetalle']['cantidad']) ){
					$totalmaterial = $aux[0]['cantidad']/$configMarca['Almacenmarcadetalle']['cantidad'];
					$totalmaterialInt = ceil ($totalmaterial);
					if($totalmaterial > 0){
						$ret[$j] = array('almacenmarca_id' => $aux['Almacenproducto']['almacenmarca_id'],
														'almacenmateriale_id' =>	$aux['Ventadetalle']['embalaje'],
														'productos' => $aux[0]['cantidad'],
														'cantidadMaterial' => (int)$totalmaterialInt,
														'cantidadNoentera' => $totalmaterial
												);
						$j++;
					}
				}
			}
		}
		return $ret;
	}
	function validaEmbalajeCompleto($venta){
		$tpe =array();
		$productosId = array();
		$totMarcaEmb = array();
		$marcas = array();
		$embalajes = array();
		$message = '';

		//Se suma el total por producto y embalaje
		//Se genera un array para la consulta de los productos [Producto][Embalaje]
		foreach ( $venta['Venta']['Productos'] as $detalle) {
			if(empty($tpe[$detalle['pro']][$detalle['emb']])){
				$tpe[$detalle['pro']][$detalle['emb']] = (int)$detalle['cant'];
			}
			else {
				$tpe[$detalle['pro']][$detalle['emb']] = $tpe[$detalle['pro']][$detalle['emb']] + (int) $detalle['cant'];
			}
			if(!in_array($detalle['pro'], $productosId , true)){
				$productosId[] = $detalle['pro'];
			}
		}
		$options =  array(
			'conditions'=>array(
				'Almacenproducto.id'=> $productosId,
			));
		$productos = $this->Almacenproducto->find('all',$options);
		//Se recorre la salida de los productos para generar una estructira de marca
		//embalaje los valores ya vienen totalizados
		//[Marca][Embalaje]
		foreach ($productos as $producto) {

			if(!in_array((int)$producto['Almacenmarca']['id'], $marcas , true)){
				$marcas[] = (int)$producto['Almacenmarca']['id'];
			}
			foreach ($tpe[$producto['Almacenproducto']['id']] as $embalaje => $valor) {

				if(!in_array($embalaje, $embalajes , true)){
					$embalajes[] = $embalaje;
				}
				if(empty($totMarcaEmb[$producto['Almacenmarca']['id']][$embalaje])){
					$totMarcaEmb[$producto['Almacenmarca']['id']][$embalaje] = $valor;
				}else{
					$totMarcaEmb[$producto['Almacenmarca']['id']][$embalaje] = $totMarcaEmb[$producto['Almacenmarca']['id']][$embalaje] + $valor;
				}
			}
		}
		$options =  array(
			'conditions'=>array(
				'Almacenmarcadetalle.almacenmarca_id'=> $marcas,
				'Almacenmarcadetalle.almacenmateriale_id'=> $embalajes,
			));
		$congEmbalajesMarca = $this->Almacenmarcadetalle->find('all',$options);
		$valido = true;
		$message = '';
		for ($i=0; $i < count($congEmbalajesMarca) && $valido = true; $i++) {
			if(!empty($totMarcaEmb[(int)$congEmbalajesMarca[$i]['Almacenmarcadetalle']['almacenmarca_id']][$congEmbalajesMarca[$i]['Almacenmarcadetalle']['almacenmateriale_id']])){
				$unidades = $totMarcaEmb[(int)$congEmbalajesMarca[$i]['Almacenmarcadetalle']['almacenmarca_id']][$congEmbalajesMarca[$i]['Almacenmarcadetalle']['almacenmateriale_id']];
				$unidades = $unidades / (int)$congEmbalajesMarca[$i]['Almacenmarcadetalle']['cantidad'];
				$entero = ceil($unidades);
				if(($entero - $unidades) > 0){
					$valido = false;
					$message = 'hacen falta ' . ($entero - $unidades) * (int)$congEmbalajesMarca[$i]['Almacenmarcadetalle']['cantidad'] . ' Productos para la marca: '  . $congEmbalajesMarca[$i]['Almacenmarca']['nombre'] . ' y el embalaje ' .  $congEmbalajesMarca[$i]['Almacenmateriale']['nombre'];
				}
			}else{
				$valido = false;
				$message = 'No se encontro la configuracion de la marca ' . $congEmbalajesMarca[$i]['Almacenmarca']['nombre'] . ' y el embalaje ' .  $congEmbalajesMarca[$i]['Almacenmateriale']['nombre'];
			}
		}
		if($valido == true){
			return null;
		}
		else{
			return $message;
		}
	}

}
?>
