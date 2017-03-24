<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');


	/**
 * helpers
 *
 * @var array
 */
//	var $helpers = array('Html');

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
		$this->checkSession(2);
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		//$this->User->recursive = 0;
		//$this->set('users', $this->Paginator->paginate());
		  $empresa_id          = $this->Session->read('empresa_id');
	      $empresasurcusale_id = $this->Session->read('empresasurcusale_id');
                if($empresa_id==0 && $empresasurcusale_id==0){ 
                	$this->set('users', $this->User->find('all', array('conditions'=>array('User.activo'=>1))));
          }else if($empresa_id!=0 && $empresasurcusale_id==0){
                    $this->set('users', $this->User->find('all', array('conditions'=>array('User.activo'=>1, 'User.empresa_id'=>$empresa_id))));
          }else if($empresa_id!=0 && $empresasurcusale_id!=0){
                    $this->set('users', $this->User->find('all', array('conditions'=>array('User.activo'=>1, 'User.empresa_id'=>$empresa_id,'User.empresasurcusale_id'=>$empresasurcusale_id))));
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			$this->request->data["User"]["password"] = md5($this->request->data["User"]["password"]);
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('Registro Guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		}
		$empresa_id          = $this->Session->read('empresa_id');
	    $empresasurcusale_id = $this->Session->read('empresasurcusale_id');
              if($empresa_id==0 && $empresasurcusale_id==0){
               $roles             = $this->User->Role->find('list');
		       $empresas          = $this->User->Empresa->find('list'); 
		       $empresasurcusales = array();
        }else if($empresa_id!=0 && $empresasurcusale_id==0){
        	   $roles             = $this->User->Role->find('list', array('conditions'=>array('Role.id !='=>array(1,2))));
		       $empresas          = $this->User->Empresa->find('list', array('conditions'=>array('id'=>$empresa_id)));
		       $empresasurcusales = $this->User->Empresasurcusale->find('list', array('conditions'=>array('empresa_id'=>$empresa_id)));
        }else if($empresa_id!=0 && $empresasurcusale_id!=0){
        	   $roles             = $this->User->Role->find('list', array('conditions'=>array('Role.id !='=>array(1,2,3))));
		       $empresas          = $this->User->Empresa->find('list', array('conditions'=>array('id'=>$empresa_id)));
		       $empresasurcusales = $this->User->Empresasurcusale->find('list', array('conditions'=>array('empresa_id'=>$empresa_id, 'id'=>$empresasurcusale_id)));
        }
		$this->set(compact('roles', 'empresas', 'empresasurcusales'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if($this->request->data["User"]["password2"]!=$this->request->data["User"]["password"]){
			   $this->request->data['User']['password'] = md5(trim(strtoupper($this->request->data['User']['password'])));
			}
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('Registro Guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$empresa_id          = $this->Session->read('empresa_id');
	    $empresasurcusale_id = $this->Session->read('empresasurcusale_id');
              if($empresa_id==0 && $empresasurcusale_id==0){
               $roles           = $this->User->Role->find('list');
		       $empresas          = $this->User->Empresa->find('list'); 
		       $empresasurcusales = array();
        }else if($empresa_id!=0 && $empresasurcusale_id==0){
        	   $roles           = $this->User->Role->find('list', array('conditions'=>array('Role.id !='=>array(1,2))));
		       $empresas          = $this->User->Empresa->find('list', array('conditions'=>array('id'=>$empresa_id)));
		       $empresasurcusales = $this->User->Empresasurcusale->find('list', array('conditions'=>array('empresa_id'=>$empresa_id)));
        }else if($empresa_id!=0 && $empresasurcusale_id!=0){
        	   $roles           = $this->User->Role->find('list', array('conditions'=>array('Role.id !='=>array(1,2,3))));
		       $empresas          = $this->User->Empresa->find('list', array('conditions'=>array('id'=>$empresa_id)));
		       $empresasurcusales = $this->User->Empresasurcusale->find('list', array('conditions'=>array('empresa_id'=>$empresa_id, 'id'=>$empresasurcusale_id)));
        }
		$this->set(compact('roles', 'empresas', 'empresasurcusales'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Flash->success(__('El Registro fue eliminado.'));
		} else {
			$this->Flash->error(__('El Registro no fue eliminado. Por favor, inténtelo de nuevo.'));
		}
		return $this->redirect(array('action' => 'index'));
	}*/




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

        $this->request->data['User']['id']     = $id;
	    $this->request->data['User']['activo'] = 2;
	    $this->request->data['User']['status'] = 2;
		if ($this->User->save($this->request->data)) {
			$this->Flash->success(__('El Registro fue eliminado.'));
		} else {
			$this->Flash->error(__('El Registro no fue eliminado. Por favor, inténtelo de nuevo.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

}
