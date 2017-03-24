<?php
App::uses('AppController', 'Controller');
/**
 * Almacenmateriales Controller
 *
 * @property Almacenmateriale $Almacenmateriale
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AlmacenmaterialesController extends AppController {

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
		//$this->Almacenmateriale->recursive = 0;
		//$this->set('almacenmateriales', $this->Paginator->paginate());
		  $empresa_id          = $this->Session->read('empresa_id');
     	  $empresasurcusale_id = $this->Session->read('empresasurcusale_id');
     	  $rol_id              = $this->Session->read('ROL');
     	  $user_id             = $this->Session->read('USUARIO_ID');
      	  $this->set('almacenmateriales', $this->Almacenmateriale->find('all', array('conditions'=>array('Almacenmateriale.activo'=>1, 'Almacenmateriale.empresa_id'=>$empresa_id))));
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
		if (!$this->Almacenmateriale->exists($id)) {
			throw new NotFoundException(__('Invalid almacenmateriale'));
		}
		$options = array('conditions' => array('Almacenmateriale.' . $this->Almacenmateriale->primaryKey => $id));
		$this->set('almacenmateriale', $this->Almacenmateriale->find('first', $options));
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
			$this->Almacenmateriale->create();
			if ($this->Almacenmateriale->save($this->request->data)) {
				$this->Flash->success(__('Registro Guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		}
		$empresas = $this->Almacenmateriale->Empresa->find('list', array('conditions'=>array('id'=>$empresa_id)));
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
		if (!$this->Almacenmateriale->exists($id)) {
			throw new NotFoundException(__('Invalid almacenmateriale'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Almacenmateriale->save($this->request->data)) {
				$this->Flash->success(__('Registro Guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('Almacenmateriale.' . $this->Almacenmateriale->primaryKey => $id));
			$this->request->data = $this->Almacenmateriale->find('first', $options);
		}
		$empresas = $this->Almacenmateriale->Empresa->find('list', array('conditions'=>array('id'=>$empresa_id)));
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
	    $empresa_id          = $this->Session->read('empresa_id');
     	$empresasurcusale_id = $this->Session->read('empresasurcusale_id');
     	$rol_id              = $this->Session->read('ROL');
     	$user_id             = $this->Session->read('USUARIO_ID');
		/*
			$this->Almacenmateriale->id = $id;
			if (!$this->Almacenmateriale->exists()) {
				throw new NotFoundException(__('Invalid almacenmateriale'));
			}
			$this->request->allowMethod('post', 'delete');
			if ($this->Almacenmateriale->delete()) {
									$this->Flash->success(__('El Registro fue eliminado.'));
					} else {
						$this->Flash->error(__('El Registro no fue eliminado. Por favor, inténtelo de nuevo.'));
					}
					return $this->redirect(array('action' => 'index'));
			        */
        $this->request->data['Almacenmateriale']['id']     = $id;
	    $this->request->data['Almacenmateriale']['activo'] = 2;
		if ($this->Almacenmateriale->save($this->request->data)) {
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
		$data = $this->Almacenmateriale->find('count', array('conditions'=>array('nombre'=>$id)));
		echo $data;

	}
}
?>
