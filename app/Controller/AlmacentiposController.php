<?php
App::uses('AppController', 'Controller');
/**
 * Almacentipos Controller
 *
 * @property Almacentipo $Almacentipo
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AlmacentiposController extends AppController {

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
		//$this->Almacentipo->recursive = 0;
		//$this->set('almacentipos', $this->Paginator->paginate());
		$this->set('almacentipos', $this->Almacentipo->find('all', array('conditions'=>array('activo'=>1,'empresa_id'=>$empresa_id)) ));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Almacentipo->exists($id)) {
			throw new NotFoundException(__('Invalid almacentipo'));
		}
		$options = array('conditions' => array('Almacentipo.' . $this->Almacentipo->primaryKey => $id));
		$this->set('almacentipo', $this->Almacentipo->find('first', $options));
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
			$this->Almacentipo->create();
			if ($this->Almacentipo->save($this->request->data)) {
				$this->Flash->success(__('Registro Guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		}
		$empresas = $this->Almacentipo->Empresa->find('list', array('conditions'=>array('id'=>$empresa_id)));
		$this->set(compact('empresas'));
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
		if (!$this->Almacentipo->exists($id)) {
			throw new NotFoundException(__('Invalid almacentipo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Almacentipo->save($this->request->data)) {
				$this->Flash->success(__('Registro Guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('Almacentipo.' . $this->Almacentipo->primaryKey => $id));
			$this->request->data = $this->Almacentipo->find('first', $options);
		}
		$empresas = $this->Almacentipo->Empresa->find('list', array('conditions'=>array('id'=>$empresa_id)));
		$this->set(compact('empresas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->request->data['Almacentipo']['id']     = $id;
	    $this->request->data['Almacentipo']['activo'] = 2;
		if ($this->Almacentipo->save($this->request->data)) {
			$this->Flash->success(__('El Registro fue eliminado.'));
		} else {
			$this->Flash->error(__('El Registro no fue eliminado. Por favor, inténtelo de nuevo.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
