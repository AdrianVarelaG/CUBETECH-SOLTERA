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

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');


	public $uses = array('Venta', 'Almacenproducto', 'Almacenmarcadetalle', 'Inventariomovimiento', 'Ventadetalle', 'Almacene', 'Inventariomovimateriale');

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
     		  	$this->set('ventas', $this->Venta->find('all', array('conditions'=>array('Venta.activo'=>1))));
     	}else if($empresa_id!=0 && $empresasurcusale_id==0){
     		$this->set('ventas', $this->Venta->find('all', array('conditions'=>array('Venta.activo'=>1, 'Venta.empresa_id'=>$empresa_id))));
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==3){
      		$this->set('ventas', $this->Venta->find('all', array('conditions'=>array('Venta.activo'=>1, 'Venta.empresa_id'=>$empresa_id, 'Venta.empresasurcusale_id'=>$empresasurcusale_id))));
      	}else{
      		$this->set('ventas', $this->Venta->find('all', array('conditions'=>array('Venta.activo'=>1, 'Venta.empresa_id'=>$empresa_id, 'Venta.empresasurcusale_id'=>$empresasurcusale_id, 'Venta.user_id'=>$user_id))));
      		//$this->set('ventas', $this->Venta->find('all', array('conditions'=>array('Venta.activo'=>1, 'Venta.empresa_id'=>$empresa_id, 'Venta.empresasurcusale_id'=>$empresasurcusale_id))));
      	}
		  //$this->set('ventas', $this->Venta->find('all'));
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
			}else{
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
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
			$this->Flash->success(__('El Registro fue eliminado.'));
		} else {
			$this->Flash->error(__('El Registro no fue eliminado. Por favor, inténtelo de nuevo.'));
		}
		return $this->redirect(array('action' => 'index'));
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
		$data = $this->Venta->Almacene->find('list', array('conditions'=>array('almacentipo_id'=>$id)));
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
        
        $data2 = $this->Almacenmarcadetalle->find('all', array('conditions'=>array('Almacenmarcadetalle.almacenmarca_id'=>$almacenmarca_id)));
        
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
}
?>
