<?php
App::uses('AppController', 'Controller');
/**
 * Almacenmarcas Controller
 *
 * @property Almacenmarca $Almacenmarca
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AlmacenmarcasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

	public $uses = array('Almacenmateriale', 'Almacenmarca', 'Almacenmarcadetalle');

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
		$this->Almacenmarca->recursive = 2;
		//$this->set('almacenmarcas', $this->Paginator->paginate());
		  $empresa_id          = $this->Session->read('empresa_id');
     	  $empresasurcusale_id = $this->Session->read('empresasurcusale_id');
     	  $rol_id              = $this->Session->read('ROL');
     	  $user_id             = $this->Session->read('USUARIO_ID');
     	  $this->set('almacenmarcas', $this->Almacenmarca->find('all', array('conditions'=>array('Almacenmarca.activo'=>1, 'Almacenmarca.empresa_id'=>$empresa_id))));
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
		if (!$this->Almacenmarca->exists($id)) {
			throw new NotFoundException(__('Invalid almacenmarca'));
		}
		$options = array('conditions' => array('Almacenmarca.' . $this->Almacenmarca->primaryKey => $id));
		$this->set('almacenmarca', $this->Almacenmarca->find('first', $options));
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
			$this->Almacenmarca->begin();
			$this->Almacenmarca->create();
			if ($this->Almacenmarca->save($this->request->data)) {
				$id   =  $this->Almacenmarca->id;
				$stop = 0;
				if(!empty($this->request->data["Almacenmarca"]["Materiales"])){
					$pre =$this->request->data["Almacenmarca"]["Materiales"][0]['pre'];
					$i   = 0;
					foreach($this->request->data["Almacenmarca"]["Materiales"] as $material){
						$this->request->data["Almacenmarcadetalle"]["almacenmarca_id"]     = $id;
						$this->request->data["Almacenmarcadetalle"]["almacenmateriale_id"] = $material['pro'];
						$this->request->data["Almacenmarcadetalle"]["cantidad"]            = $material['cant'];
						if(isset($material['valu'])){
							if($pre == $material['valu']){
	                              $default = 1;
							}else{
								  $default = 0;
							}
						}else{
							  $default = 0;
						}

						$this->request->data["Almacenmarcadetalle"]["default"]            = $default;
						$this->Almacenmarcadetalle->create();
						if ($this->Almacenmarcadetalle->save($this->request->data)){

						}else{
							$stop = 1;
						}
						$i++;
					}
				}
				if($stop==0){
                    $this->Almacenmarca->commit();
                	$this->Flash->success(__('Registro Guardado.'));
					return $this->redirect(array('action' => 'index'));

                }else{
                	$this->Almacenmarca->rollback();
                    $this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
                }
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		}
		$empresas = $this->Almacenmarca->Empresa->find('list', array('conditions'=>array('id'=>$empresa_id)));
		$marcas   = $this->Almacenmateriale->find('all', array('conditions'=>array('Almacenmateriale.tipo'=>2, 'Almacenmateriale.empresa_id'=>$empresa_id, 'Almacenmateriale.activo'=>1)));
		$this->set(compact('empresas', 'marcas'));
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
		if (!$this->Almacenmarca->exists($id)) {
			throw new NotFoundException(__('Invalid almacenmarca'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->Almacenmarca->begin();
			if ($this->Almacenmarca->save($this->request->data)){
				$this->Almacenmarcadetalle->deleteAll(array('Almacenmarcadetalle.almacenmarca_id'=>$id));
				$stop = 0;
				$pre  = $this->request->data["Almacenmarca"]["Materiales"][0]['pre'];
				$i    = 0;
				if(!empty($this->request->data["Almacenmarca"]["Materiales"])){
					foreach($this->request->data["Almacenmarca"]["Materiales"] as $material){
						$this->request->data["Almacenmarcadetalle"]["almacenmarca_id"]     = $id;
						$this->request->data["Almacenmarcadetalle"]["almacenmateriale_id"] = $material['pro'];
						$this->request->data["Almacenmarcadetalle"]["cantidad"]            = $material['cant'];
						if(isset($material['valu'])){
							if($pre == $material['valu']){
	                              $default = 1;
							}else{
								  $default = 0;
							}
						}else{
							  $default = 0;
						}
						$this->request->data["Almacenmarcadetalle"]["default"]            = $default;
						$this->Almacenmarcadetalle->create();
						if ($this->Almacenmarcadetalle->save($this->request->data)){

						}else{
							$stop = 1;
						}
					}
				}
				if($stop==0){
                    $this->Almacenmarcadetalle->commit();
                	$this->Flash->success(__('Registro Guardado.'));
					return $this->redirect(array('action' => 'index'));

                }else{
                	$this->Almacenmarcadetalle->rollback();
                    $this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
                }
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('Almacenmarca.' . $this->Almacenmarca->primaryKey => $id));
			$this->request->data = $this->Almacenmarca->find('first', $options);
		}
		$almacenmarcadetalles = $this->Almacenmarcadetalle->find('all', array('conditions'=>array('almacenmarca_id'=>$id)));
		$empresas = $this->Almacenmarca->Empresa->find('list', array('conditions'=>array('id'=>$empresa_id)));
		$marcas   = $this->Almacenmateriale->find('all', array('conditions'=>array('Almacenmateriale.tipo'=>2,'Almacenmateriale.empresa_id'=>$empresa_id,'Almacenmateriale.activo'=>1)));
		$this->set(compact('empresas', 'marcas', 'almacenmarcadetalles'));
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
			$this->Almacenmarca->id = $id;
			if (!$this->Almacenmarca->exists()) {
				throw new NotFoundException(__('Invalid almacenmarca'));
			}
			$this->request->allowMethod('post', 'delete');
			if ($this->Almacenmarca->delete()) {
									$this->Flash->success(__('El Registro fue eliminado.'));
					} else {
						$this->Flash->error(__('El Registro no fue eliminado. Por favor, inténtelo de nuevo.'));
					}
					return $this->redirect(array('action' => 'index'));
			        */
        $this->request->data['Almacenmarca']['id']     = $id;
	    $this->request->data['Almacenmarca']['activo'] = 2;
		if ($this->Almacenmarca->save($this->request->data)) {
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
		$data = $this->Almacenmarca->find('count', array('conditions'=>array('nombre'=>$id)));
		echo $data;

	}
}
