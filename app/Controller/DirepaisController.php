<?php
App::uses('AppController', 'Controller');
/**
 * Direpais Controller
 *
 * @property Direpai $Direpai
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DirepaisController extends AppController {

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
		//$this->Direpai->recursive = 0;
		//$this->set('direpais', $this->Paginator->paginate());
		  $this->set('direpais', $this->Direpai->find('all'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Direpai->exists($id)) {
			throw new NotFoundException(__('Invalid direpai'));
		}
		$options = array('conditions' => array('Direpai.' . $this->Direpai->primaryKey => $id));
		$this->set('direpai', $this->Direpai->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Direpai->create();
			if ($this->Direpai->save($this->request->data)) {
				$this->Flash->success(__('Registro Guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Direpai->exists($id)) {
			throw new NotFoundException(__('Invalid direpai'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Direpai->save($this->request->data)) {
				$this->Flash->success(__('Registro Guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('Direpai.' . $this->Direpai->primaryKey => $id));
			$this->request->data = $this->Direpai->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Direpai->id = $id;
		if (!$this->Direpai->exists()) {
			throw new NotFoundException(__('Invalid direpai'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Direpai->delete()) {
			$this->Flash->success(__('El Registro fue eliminado.'));
		} else {
			$this->Flash->error(__('El Registro no fue eliminado. Por favor, inténtelo de nuevo.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
