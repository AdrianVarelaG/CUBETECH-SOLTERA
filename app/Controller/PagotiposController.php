<?php
App::uses('AppController', 'Controller');
/**
 * Pagotipos Controller
 *
 * @property Pagotipo $Pagotipo
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PagotiposController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session','Flash');

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
		$this->checkSession(14);
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		//$this->Pagotipo->recursive = 0;
		//$this->set('pagotipos', $this->Paginator->paginate());
		$resto_id          = $this->Session->read('resto_id');
	    $restosurcusale_id = $this->Session->read('restosurcusale_id');
		  $this->set('pagotipos', $this->Pagotipo->find('all', array('conditions'=>array('Pagotipo.resto_id'=>$resto_id))));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Pagotipo->exists($id)) {
			throw new NotFoundException(__('Invalid pagotipo'));
		}
		$options = array('conditions' => array('Pagotipo.' . $this->Pagotipo->primaryKey => $id));
		$this->set('pagotipo', $this->Pagotipo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Pagotipo->create();
			if ($this->Pagotipo->save($this->request->data)) {
				$this->Flash->success(__('Registro Guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		}
		$resto_id          = $this->Session->read('resto_id');
	    $restosurcusale_id = $this->Session->read('restosurcusale_id');
		$restos = $this->Pagotipo->Resto->find('list', array('conditions'=>array('id'=>$resto_id)));
		$this->set(compact('restos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Pagotipo->exists($id)) {
			throw new NotFoundException(__('Invalid pagotipo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Pagotipo->save($this->request->data)) {
				$this->Flash->success(__('Registro Guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('Pagotipo.' . $this->Pagotipo->primaryKey => $id));
			$this->request->data = $this->Pagotipo->find('first', $options);
		}
		$resto_id          = $this->Session->read('resto_id');
	    $restosurcusale_id = $this->Session->read('restosurcusale_id');
		$restos = $this->Pagotipo->Resto->find('list', array('conditions'=>array('id'=>$resto_id)));
		$this->set(compact('restos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Pagotipo->id = $id;
		if (!$this->Pagotipo->exists()) {
			throw new NotFoundException(__('Invalid pagotipo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Pagotipo->delete()) {
			$this->Flash->success(__('El Registro fue eliminado.'));
		} else {
			$this->Flash->error(__('El Registro no fue eliminado. Por favor, inténtelo de nuevo.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
