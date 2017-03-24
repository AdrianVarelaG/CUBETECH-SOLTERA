<?php
App::uses('AppController', 'Controller');
/**
 * Almacenusers Controller
 *
 * @property Almacenuser $Almacenuser
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AlmacenusersController extends AppController {

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
		//$this->Almacenuser->recursive = 0;
		//$this->set('almacenusers', $this->Paginator->paginate());
		//$this->set('almacenusers', $this->Almacenuser->find('all'));
		$empresa_id          = $this->Session->read('empresa_id');
     	$empresasurcusale_id = $this->Session->read('empresasurcusale_id');
     	$rol_id              = $this->Session->read('ROL');
     	$user_id             = $this->Session->read('USUARIO_ID');
     		  if($empresa_id==0 && $empresasurcusale_id==0){ 
     		$this->set('almacenusers', $this->Almacenuser->find('all'));
     	}else if($empresa_id!=0 && $empresasurcusale_id==0){
     		$this->set('almacenusers', $this->Almacenuser->find('all', array('conditions'=>array('Almacenuser.empresa_id'=>$empresa_id))));
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==3){
      		$this->set('almacenusers', $this->Almacenuser->find('all', array('conditions'=>array('Almacenuser.empresa_id'=>$empresa_id, 'Almacenuser.empresasurcusale_id'=>$empresasurcusale_id))));
      	}else{
      		$this->set('almacenusers', $this->Almacenuser->find('all', array('conditions'=>array('Almacenuser.empresa_id'=>$empresa_id, 'Almacenuser.empresasurcusale_id'=>$empresasurcusale_id, 'Almacenuser.user_id'=>$user_id))));
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
		if (!$this->Almacenuser->exists($id)) {
			throw new NotFoundException(__('Invalid almacenuser'));
		}
		$options = array('conditions' => array('Almacenuser.' . $this->Almacenuser->primaryKey => $id));
		$this->set('almacenuser', $this->Almacenuser->find('first', $options));
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
			$this->Almacenuser->create();
			if ($this->Almacenuser->save($this->request->data)) {
				$this->Flash->success(__('Registro Guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		}
		$empresas = $this->Almacenuser->Empresa->find('list', array('conditions'=>array('id'=>$empresa_id)));
		      if($empresa_id==0 && $empresasurcusale_id==0){ 
            	$empresasurcusales = $this->Almacenuser->Empresasurcusale->find('list');
     	}else if($empresa_id!=0 && $empresasurcusale_id==0){
                $empresasurcusales = $this->Almacenuser->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id)));
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0){
                $empresasurcusales = $this->Almacenuser->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id,'Empresasurcusale.id'=>$empresasurcusale_id)));
      	}
		$almacentipos = $this->Almacenuser->Almacentipo->find('list', array('conditions'=>array('empresa_id'=>$empresa_id)));
		$almacenes    = array();
		      if($empresa_id==0 && $empresasurcusale_id==0){ 
            	$users    = $this->Almacenuser->User->find('list');
     	}else if($empresa_id!=0 && $empresasurcusale_id==0){
                $users    = $this->Almacenuser->User->find('list', array('conditions'=>array('empresa_id'=>$empresa_id)));
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0){
                $users    = $this->Almacenuser->User->find('list', array('conditions'=>array('empresa_id'=>$empresa_id, 'empresasurcusale_id'=>$empresasurcusale_id)));
      	}
		$this->set(compact('almacentipos', 'almacenes', 'users', 'empresas', 'empresasurcusales'));
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
		if (!$this->Almacenuser->exists($id)) {
			throw new NotFoundException(__('Invalid almacenuser'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Almacenuser->save($this->request->data)) {
				$this->Flash->success(__('Registro Guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('Almacenuser.' . $this->Almacenuser->primaryKey => $id));
			$this->request->data = $this->Almacenuser->find('first', $options);
		}
		$empresas = $this->Almacenuser->Empresa->find('list', array('conditions'=>array('id'=>$empresa_id)));
		      if($empresa_id==0 && $empresasurcusale_id==0){ 
            	$empresasurcusales = $this->Almacenuser->Empresasurcusale->find('list');
     	}else if($empresa_id!=0 && $empresasurcusale_id==0){
                $empresasurcusales = $this->Almacenuser->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id)));
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0){
                $empresasurcusales = $this->Almacenuser->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id,'Empresasurcusale.id'=>$empresasurcusale_id)));
      	}
		$almacentipos = $this->Almacenuser->Almacentipo->find('list', array('conditions'=>array('empresa_id'=>$empresa_id)));
		$almacenes    = $this->Almacenuser->Almacene->find('list', array('conditions'=>array('almacentipo_id'=>$this->request->data['Almacenuser']['almacentipo_id'])));
		      if($empresa_id==0 && $empresasurcusale_id==0){ 
            	$users    = $this->Almacenuser->User->find('list');
     	}else if($empresa_id!=0 && $empresasurcusale_id==0){
                $users    = $this->Almacenuser->User->find('list', array('conditions'=>array('empresa_id'=>$empresa_id)));
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0){
                $users    = $this->Almacenuser->User->find('list', array('conditions'=>array('empresa_id'=>$empresa_id, 'empresasurcusale_id'=>$empresasurcusale_id)));
      	}
		$this->set(compact('almacentipos', 'almacenes', 'users', 'empresas', 'empresasurcusales'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Almacenuser->id = $id;
		if (!$this->Almacenuser->exists()) {
			throw new NotFoundException(__('Invalid almacenuser'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Almacenuser->delete()) {
			$this->Flash->success(__('El Registro fue eliminado.'));
		} else {
			$this->Flash->error(__('El Registro no fue eliminado. Por favor, inténtelo de nuevo.'));
		}
		return $this->redirect(array('action' => 'index'));
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
		$data = $this->Almacenuser->Almacene->find('list', array('conditions'=>array('almacentipo_id'=>$id)));
		$this->set('almacenes',$data);
	}	
}
