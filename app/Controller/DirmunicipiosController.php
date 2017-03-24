<?php
App::uses('AppController', 'Controller');
/**
 * Dirmunicipios Controller
 *
 * @property Dirmunicipio $Dirmunicipio
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DirmunicipiosController extends AppController {

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
		//$this->Dirmunicipio->recursive = 0;
		//$this->set('dirmunicipios', $this->Paginator->paginate());
		  $this->set('dirmunicipios', $this->Dirmunicipio->find('all'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Dirmunicipio->exists($id)) {
			throw new NotFoundException(__('Invalid dirmunicipio'));
		}
		$options = array('conditions' => array('Dirmunicipio.' . $this->Dirmunicipio->primaryKey => $id));
		$this->set('dirmunicipio', $this->Dirmunicipio->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Dirmunicipio->create();
			if ($this->Dirmunicipio->save($this->request->data)) {
				$this->Flash->success(__('Registro Guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		}
		$direpais = $this->Dirmunicipio->Direpai->find('list');
		//$direprovincias = $this->Dirmunicipio->Direprovincia->find('list');
		$direprovincias = array();
		$this->set(compact('direpais', 'direprovincias'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Dirmunicipio->exists($id)) {
			throw new NotFoundException(__('Invalid dirmunicipio'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Dirmunicipio->save($this->request->data)) {
				$this->Flash->success(__('Registro Guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('Dirmunicipio.' . $this->Dirmunicipio->primaryKey => $id));
			$this->request->data = $this->Dirmunicipio->find('first', $options);
		}
		$direpais = $this->Dirmunicipio->Direpai->find('list');
		$direprovincias = $this->Dirmunicipio->Direprovincia->find('list', array('conditions'=>array('Direprovincia.direpai_id'=>$this->request->data['Dirmunicipio']['direpai_id']) ));
		$this->set(compact('direpais', 'direprovincias'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Dirmunicipio->id = $id;
		if (!$this->Dirmunicipio->exists()) {
			throw new NotFoundException(__('Invalid dirmunicipio'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Dirmunicipio->delete()) {
			$this->Flash->success(__('El Registro fue eliminado.'));
		} else {
			$this->Flash->error(__('El Registro no fue eliminado. Por favor, inténtelo de nuevo.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * estado method
 *
 * @return void
 */
	public function estado($id=null) {
		$this->layout="ajax";
		$direprovincias = $this->Dirmunicipio->Direprovincia->find('list', array('conditions'=>array('Direprovincia.direpai_id'=>$id)));
		$this->set('direprovincias', $direprovincias);
	}



}
