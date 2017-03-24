<?php
App::uses('AppController', 'Controller');
/**
 * Rolemodulos Controller
 *
 * @property Rolemodulo $Rolemodulo
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RolemodulosController extends AppController {

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
		$resto_id          = $this->Session->read('resto_id');
	    $restosurcusale_id = $this->Session->read('restosurcusale_id');
	    //if($resto_id==0 && $restosurcusale_id==0){
            $this->checkSession(1);
	   // }else{
	   // 	$this->checkSession(50);
	    //}
		
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		//$this->Rolemodulo->recursive = 0;
		//$this->set('rolemodulos', $this->Paginator->paginate());
		  $this->set('rolemodulos', $this->Rolemodulo->find('all'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Rolemodulo->exists($id)) {
			throw new NotFoundException(__('Invalid rolemodulo'));
		}
		$options = array('conditions' => array('Rolemodulo.' . $this->Rolemodulo->primaryKey => $id));
		$this->set('rolemodulo', $this->Rolemodulo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Rolemodulo->create();
			if ($this->Rolemodulo->save($this->request->data)) {
				$this->Flash->success(__('Registro Guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		}
		$roles = $this->Rolemodulo->Role->find('list');
		$modulos = $this->Rolemodulo->Modulo->find('list');
		$this->set(compact('roles', 'modulos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Rolemodulo->exists($id)) {
			throw new NotFoundException(__('Invalid rolemodulo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Rolemodulo->save($this->request->data)) {
				$this->Flash->success(__('Registro Guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('Rolemodulo.' . $this->Rolemodulo->primaryKey => $id));
			$this->request->data = $this->Rolemodulo->find('first', $options);
		}
		$roles = $this->Rolemodulo->Role->find('list');
		$modulos = $this->Rolemodulo->Modulo->find('list');
		$this->set(compact('roles', 'modulos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Rolemodulo->id = $id;
		if (!$this->Rolemodulo->exists()) {
			throw new NotFoundException(__('Invalid rolemodulo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Rolemodulo->delete()) {
			$this->Flash->success(__('El Registro fue eliminado.'));
		} else {
			$this->Flash->error(__('El Registro no fue eliminado. Por favor, inténtelo de nuevo.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
