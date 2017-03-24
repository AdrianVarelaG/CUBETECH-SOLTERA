<?php
App::uses('AppController', 'Controller');
/**
 * Almacenproductos Controller
 *
 * @property Almacenproducto $Almacenproducto
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AlmacenproductosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

	public $uses = array('Almacenproducto', 'Almacenproductodetalle', 'Almacenmateriale');

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
		$this->checkSession(5);
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Almacenproducto->recursive = 2;
		//$this->set('almacenproductos', $this->Paginator->paginate());
		  $empresa_id          = $this->Session->read('empresa_id');
     	  $empresasurcusale_id = $this->Session->read('empresasurcusale_id');
     	  $rol_id              = $this->Session->read('ROL');
     	  $user_id             = $this->Session->read('USUARIO_ID');
     	  $this->set('almacenproductos', $this->Almacenproducto->find('all', array('conditions'=>array('Almacenproducto.activo'=>1, 'Almacenproducto.empresa_id'=>$empresa_id))));
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
		if (!$this->Almacenproducto->exists($id)) {
			throw new NotFoundException(__('Invalid almacenproducto'));
		}
		$options = array('conditions' => array('Almacenproducto.' . $this->Almacenproducto->primaryKey => $id));
		$this->set('almacenproducto', $this->Almacenproducto->find('first', $options));
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
			$this->Almacenproducto->begin();
			$this->Almacenproducto->create();
			if ($this->Almacenproducto->save($this->request->data)) {
				$id   =  $this->Almacenproducto->id;
				$stop = 0;
				if(!empty($this->request->data["Almacenmarca"]["Materiales"])){
					foreach($this->request->data["Almacenmarca"]["Materiales"] as $material){
						$this->request->data["Almacenproductodetalle"]["almacenproducto_id"]  = $id;
						$this->request->data["Almacenproductodetalle"]["almacenmateriale_id"] = $material['pro'];
						$this->request->data["Almacenproductodetalle"]["cantidad"]            = $material['cant'];
						$this->Almacenproductodetalle->create();
						if ($this->Almacenproductodetalle->save($this->request->data)){

						}else{
							$stop = 1;
						}
						$i++;
					}
				}
				if($stop==0){
                    $this->Almacenproducto->commit();
                	$this->Flash->success(__('Registro Guardado.'));
					return $this->redirect(array('action' => 'index'));

                }else{
                	$this->Almacenproducto->rollback();
                    $this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
                }
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		}
	    $empresas          = $this->Almacenproducto->Empresa->find('list', array('conditions'=>array('id'=>$empresa_id)));
		$almacenmarcas     = $this->Almacenproducto->Almacenmarca->find('list', array('conditions'=>array('activo'=>1,  'empresa_id'=>$empresa_id)));
		$almacenmateriales = $this->Almacenmateriale->find('all', array('conditions'=>array('Almacenmateriale.tipo'=>1, 'Almacenmateriale.empresa_id'=>$empresa_id, 'Almacenmateriale.activo'=>1)));
		$this->set(compact('empresas', 'almacenmarcas', 'almacenmateriales'));
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
		if (!$this->Almacenproducto->exists($id)) {
			throw new NotFoundException(__('Invalid almacenproducto'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->Almacenproducto->begin();
			if ($this->Almacenproducto->save($this->request->data)) {
                $this->Almacenproductodetalle->deleteAll(array('Almacenproductodetalle.almacenproducto_id'=>$id));
				$stop = 0;
				if(!empty($this->request->data["Almacenmarca"]["Materiales"])){
					foreach($this->request->data["Almacenmarca"]["Materiales"] as $material){
						$this->request->data["Almacenproductodetalle"]["almacenproducto_id"]  = $id;
						$this->request->data["Almacenproductodetalle"]["almacenmateriale_id"] = $material['pro'];
						$this->request->data["Almacenproductodetalle"]["cantidad"]            = $material['cant'];
						$this->Almacenproductodetalle->create();
						if ($this->Almacenproductodetalle->save($this->request->data)){

						}else{
							$stop = 1;
						}
						$i++;
					}
				}
				if($stop==0){
                    $this->Almacenproducto->commit();
                	$this->Flash->success(__('Registro Guardado.'));
					return $this->redirect(array('action' => 'index'));

                }else{
                	$this->Almacenproducto->rollback();
                    $this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
                }


			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('Almacenproducto.' . $this->Almacenproducto->primaryKey => $id));
			$this->request->data = $this->Almacenproducto->find('first', $options);
		}
		$almacenproductodetalles = $this->Almacenproductodetalle->find('all', array('conditions'=>array('almacenproducto_id'=>$id)));
		$empresas          = $this->Almacenproducto->Empresa->find('list', array('conditions'=>array('id'=>$empresa_id)));
		$almacenmarcas     = $this->Almacenproducto->Almacenmarca->find('list', array('conditions'=>array('activo'=>1,  'empresa_id'=>$empresa_id)));
		$almacenmateriales = $this->Almacenmateriale->find('all', array('conditions'=>array('Almacenmateriale.tipo'=>1, 'Almacenmateriale.empresa_id'=>$empresa_id, 'Almacenmateriale.activo'=>1)));
		$this->set(compact('empresas', 'almacenmarcas', 'almacenmateriales', 'almacenproductodetalles'));
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
		/*
			$this->Almacenproducto->id = $id;
			if (!$this->Almacenproducto->exists()) {
				throw new NotFoundException(__('Invalid almacenproducto'));
			}
			$this->request->allowMethod('post', 'delete');
			if ($this->Almacenproducto->delete()) {
									$this->Flash->success(__('El Registro fue eliminado.'));
					} else {
						$this->Flash->error(__('El Registro no fue eliminado. Por favor, inténtelo de nuevo.'));
					}
					return $this->redirect(array('action' => 'index'));
		*/
        $this->request->data['Almacenproducto']['id']     = $id;
	    $this->request->data['Almacenproducto']['activo'] = 2;
		if ($this->Almacenproducto->save($this->request->data)) {
			$this->Flash->success(__('El Registro fue eliminado.'));
		} else {
			$this->Flash->error(__('El Registro no fue eliminado. Por favor, inténtelo de nuevo.'));
		}
		return $this->redirect(array('action' => 'index'));
	}




/**
 * nombre method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function nombre($id = null) {
		$this->layout="ajax";
		$id = $this->request->data['nombre'];
		$data = $this->Almacenproducto->find('count', array('conditions'=>array('Almacenproducto.nombre'=>$id)));
		echo $data;

	}
}
