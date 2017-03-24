<?php
App::uses('AppController', 'Controller');
/**
 * Direprovincias Controller
 *
 * @property Direprovincia $Direprovincia
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DireprovinciasController extends AppController {

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
		$this->checkSession(1);
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		//$this->Direprovincia->recursive = 0;
		//$this->set('direprovincias', $this->Paginator->paginate());
		  $this->set('direprovincias', $this->Direprovincia->find('all'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Direprovincia->exists($id)) {
			throw new NotFoundException(__('Invalid direprovincia'));
		}
		$options = array('conditions' => array('Direprovincia.' . $this->Direprovincia->primaryKey => $id));
		$this->set('direprovincia', $this->Direprovincia->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Direprovincia->create();
			if ($this->Direprovincia->save($this->request->data)) {
				$this->Flash->success(__('Registro Guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		}
		$direpais = $this->Direprovincia->Direpai->find('list');
		$this->set(compact('direpais'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Direprovincia->exists($id)) {
			throw new NotFoundException(__('Invalid direprovincia'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Direprovincia->save($this->request->data)) {
				$this->Flash->success(__('Registro Guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('Direprovincia.' . $this->Direprovincia->primaryKey => $id));
			$this->request->data = $this->Direprovincia->find('first', $options);
		}
		$direpais = $this->Direprovincia->Direpai->find('list');
		$this->set(compact('direpais'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Direprovincia->id = $id;
		if (!$this->Direprovincia->exists()) {
			throw new NotFoundException(__('Invalid direprovincia'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Direprovincia->delete()) {
			$this->Flash->success(__('El Registro fue eliminado.'));
		} else {
			$this->Flash->error(__('El Registro no fue eliminado. Por favor, inténtelo de nuevo.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
