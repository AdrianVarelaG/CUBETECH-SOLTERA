<?php
App::uses('AppController', 'Controller');
/**
 * Almacenes Controller
 *
 * @property Almacene $Almacene
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AlmacenesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

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
		$empresa_id          = $this->Session->read('empresa_id');
     	$empresasurcusale_id = $this->Session->read('empresasurcusale_id');
     	$rol_id              = $this->Session->read('ROL');
     	$user_id             = $this->Session->read('USUARIO_ID');
		//$this->Almacene->recursive = 0;
		//$this->set('almacenes', $this->Paginator->paginate());
		  //$this->set('almacenes', $this->Almacene->find('all'));
		      if($empresa_id==0 && $empresasurcusale_id==0){ 
     		  	$this->set('almacenes', $this->Almacene->find('all', array('conditions'=>array('Almacene.activo'=>1))));
     	}else if($empresa_id!=0 && $empresasurcusale_id==0){
     		$this->set('almacenes', $this->Almacene->find('all', array('conditions'=>array('Almacene.activo'=>1, 'Almacene.empresa_id'=>$empresa_id))));
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==3){
      		$this->set('almacenes', $this->Almacene->find('all', array('conditions'=>array('Almacene.activo'=>1, 'Almacene.empresa_id'=>$empresa_id, 'Almacene.empresasurcusale_id'=>$empresasurcusale_id))));
      	}else{
      		$this->set('almacenes', $this->Almacene->find('all', array('conditions'=>array('Almacene.activo'=>1, 'Almacene.empresa_id'=>$empresa_id, 'Almacene.empresasurcusale_id'=>$empresasurcusale_id, 'Almacene.user_id'=>$user_id))));
      	}
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
		if (!$this->Almacene->exists($id)) {
			throw new NotFoundException(__('Invalid almacene'));
		}
		$options = array('conditions' => array('Almacene.' . $this->Almacene->primaryKey => $id));
		$this->set('almacene', $this->Almacene->find('first', $options));
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
			$this->Almacene->create();
			if ($this->Almacene->save($this->request->data)) {
				$this->Flash->success(__('Registro Guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		}
		$empresas     = $this->Almacene->Empresa->find('list', array('conditions'=>array('id'=>$empresa_id)));
		$almacentipos = $this->Almacene->Almacentipo->find('list', array('conditions'=>array('activo'=>1, 'empresa_id'=>$empresa_id)));
		      if($empresa_id==0 && $empresasurcusale_id==0){ 
            	$empresasurcusales = $this->Almacene->Empresasurcusale->find('list');
     	}else if($empresa_id!=0 && $empresasurcusale_id==0){
                $empresasurcusales = $this->Almacene->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id)));
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0){
                $empresasurcusales = $this->Almacene->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id,'Empresasurcusale.id'=>$empresasurcusale_id)));
      	}
		$this->set(compact('empresas', 'empresasurcusales','almacentipos'));
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
		if (!$this->Almacene->exists($id)) {
			throw new NotFoundException(__('Invalid almacene'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Almacene->save($this->request->data)) {
				$this->Flash->success(__('Registro Guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('Almacene.' . $this->Almacene->primaryKey => $id));
			$this->request->data = $this->Almacene->find('first', $options);
		}
		$empresas     = $this->Almacene->Empresa->find('list', array('conditions'=>array('id'=>$empresa_id)));
		$almacentipos = $this->Almacene->Almacentipo->find('list', array('conditions'=>array('activo'=>1, 'empresa_id'=>$empresa_id)));
		      if($empresa_id==0 && $empresasurcusale_id==0){ 
            	$empresasurcusales = $this->Almacene->Empresasurcusale->find('list');
     	}else if($empresa_id!=0 && $empresasurcusale_id==0){
                $empresasurcusales = $this->Almacene->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id)));
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0){
                $empresasurcusales = $this->Almacene->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id,'Empresasurcusale.id'=>$empresasurcusale_id)));
      	}
		$this->set(compact('empresas', 'empresasurcusales', 'almacentipos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->request->data['Almacene']['id']     = $id;
	    $this->request->data['Almacene']['activo'] = 2;
		if ($this->Almacene->save($this->request->data)) {
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
		$data = $this->Almacene->find('count', array('conditions'=>array('nombre'=>$id)));
		echo $data;

	}




	
}
