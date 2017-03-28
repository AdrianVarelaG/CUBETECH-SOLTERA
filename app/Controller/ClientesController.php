<?php
App::uses('AppController', 'Controller');
/**
 * Clientes Controller
 *
 * @property Cliente $Cliente
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ClientesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');
	public $uses       = array('Cliente', 'Venta');

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
		$this->checkSession(4);
	}


/**
 * nombre method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function rfc($id = null) {
		$this->layout="ajax";
		$variable = $this->request->data['rfc'];
	    if(ereg("[A-Z,Ñ,&]{3,4}[0-9]{2}[0-1][0-9][0-3][0-9][A-Z,0-9]?[A-Z,0-9]?[0-9,A-Z]?", $variable)){
	        echo "0";
	    } else{
	        echo "1";
	    }
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		//$this->Cliente->recursive = 0;
		//$this->set('clientes', $this->Paginator->paginate());
		$empresa_id          = $this->Session->read('empresa_id');
     	$empresasurcusale_id = $this->Session->read('empresasurcusale_id');
     	$rol_id              = $this->Session->read('ROL');
     	$user_id             = $this->Session->read('USUARIO_ID');
     		  if($empresa_id==0 && $empresasurcusale_id==0){ 
     		  	$this->set('clientes', $this->Cliente->find('all', array('conditions'=>array('Cliente.activo'=>1))));
     	}else if($empresa_id!=0 && $empresasurcusale_id==0){
     		$this->set('clientes', $this->Cliente->find('all', array('conditions'=>array('Cliente.activo'=>1, 'Cliente.empresa_id'=>$empresa_id))));
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==3){
      		$this->set('clientes', $this->Cliente->find('all', array('conditions'=>array('Cliente.activo'=>1, 'Cliente.empresa_id'=>$empresa_id, 'Cliente.empresasurcusale_id'=>$empresasurcusale_id))));
      	}else{
      		$this->set('clientes', $this->Cliente->find('all', array('conditions'=>array('Cliente.activo'=>1, 'Cliente.empresa_id'=>$empresa_id, 'Cliente.empresasurcusale_id'=>$empresasurcusale_id, 'Cliente.user_id'=>$user_id))));
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
		if (!$this->Cliente->exists($id)) {
			throw new NotFoundException(__('Invalid cliente'));
		}
		$options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id));
		$this->set('cliente', $this->Cliente->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cliente->create();
			if ($this->Cliente->save($this->request->data)) {
				$this->Flash->success(__('Registro Guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		}
		$empresa_id          = $this->Session->read('empresa_id');
     	$empresasurcusale_id = $this->Session->read('empresasurcusale_id');
     	$rol_id              = $this->Session->read('ROL');
     	$user_id             = $this->Session->read('USUARIO_ID');
		$empresas = $this->Cliente->Empresa->find('list', array('conditions'=>array('id'=>$empresa_id)));
		//$empresasurcusales = $this->Cliente->Empresasurcusale->find('list');
               if($empresa_id==0 && $empresasurcusale_id==0){ 
            	$empresasurcusales = $this->Cliente->Empresasurcusale->find('list');
     	 }else if($empresa_id!=0 && $empresasurcusale_id==0){
                $empresasurcusales = $this->Cliente->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id)));
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0){
                $empresasurcusales = $this->Cliente->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id,'Empresasurcusale.id'=>$empresasurcusale_id)));
      	}
      	       if($empresa_id==0 && $empresasurcusale_id==0){ 
            	$users    = $this->Cliente->User->find('list', array('conditions'=>array('or'=>array('role_id'=>array(4, 3)))));
     	 }else if($empresa_id!=0 && $empresasurcusale_id==0){
                $users    = $this->Cliente->User->find('list', array('conditions'=>array('or'=>array('role_id'=>array(4, 3)), 'empresa_id'=>$empresa_id)));
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==3){
                $users    = $this->Cliente->User->find('list', array('conditions'=>array('or'=>array('role_id'=>array(4, 3)), 'empresa_id'=>$empresa_id, 'empresasurcusale_id'=>$empresasurcusale_id)));
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0){
                $users    = $this->Cliente->User->find('list', array('conditions'=>array('or'=>array('role_id'=>array(4, 3)), 'empresa_id'=>$empresa_id, 'empresasurcusale_id'=>$empresasurcusale_id, 'User.id'=>$user_id)));
      	}
		$direpais = $this->Cliente->Direpai->find('list');
		$direprovincias = array();
		$dirmunicipios  = array();
		$this->set(compact('empresas', 'empresasurcusales', 'users', 'direpais', 'direprovincias', 'dirmunicipios'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$rol_id              = $this->Session->read('ROL');
     	$user_id             = $this->Session->read('USUARIO_ID');
		if (!$this->Cliente->exists($id)) {
			throw new NotFoundException(__('Invalid cliente'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cliente->save($this->request->data)) {
				$this->Flash->success(__('Registro Guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id));
			$this->request->data = $this->Cliente->find('first', $options);
		}
		$empresa_id          = $this->Session->read('empresa_id');
     	$empresasurcusale_id = $this->Session->read('empresasurcusale_id');
		$empresas = $this->Cliente->Empresa->find('list', array('conditions'=>array('id'=>$empresa_id)));
		//$empresasurcusales = $this->Cliente->Empresasurcusale->find('list');
               if($empresa_id==0 && $empresasurcusale_id==0){ 
            	$empresasurcusales = $this->Cliente->Empresasurcusale->find('list');
     	 }else if($empresa_id!=0 && $empresasurcusale_id==0){
                $empresasurcusales = $this->Cliente->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id)));
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0){
                $empresasurcusales = $this->Cliente->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id,'Empresasurcusale.id'=>$empresasurcusale_id)));
      	}
		       if($empresa_id==0 && $empresasurcusale_id==0){ 
            	$users    = $this->Cliente->User->find('list', array('conditions'=>array('or'=>array('role_id'=>array(4, 3)))));
     	 }else if($empresa_id!=0 && $empresasurcusale_id==0){
                $users    = $this->Cliente->User->find('list', array('conditions'=>array('or'=>array('role_id'=>array(4, 3)), 'empresa_id'=>$empresa_id)));
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==3){
                $users    = $this->Cliente->User->find('list', array('conditions'=>array('or'=>array('role_id'=>array(4, 3)), 'empresa_id'=>$empresa_id, 'empresasurcusale_id'=>$empresasurcusale_id)));
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0 ){
                $users    = $this->Cliente->User->find('list', array('conditions'=>array('or'=>array('role_id'=>array(4, 3)), 'empresa_id'=>$empresa_id, 'empresasurcusale_id'=>$empresasurcusale_id, 'User.id'=>$user_id)));
      	}
		$direpais = $this->Cliente->Direpai->find('list');
		$direprovincias = $this->Cliente->Direprovincia->find('list', array('conditions'=>array('Direprovincia.direpai_id'=>$this->request->data['Cliente']['direpai_id'])));
		$dirmunicipios  = $this->Cliente->Dirmunicipio->find('list', array('conditions'=>array('Dirmunicipio.direpai_id'=>$this->request->data['Cliente']['direpai_id'], 'Dirmunicipio.direprovincia_id'=>$this->request->data['Cliente']['direprovincia_id'])));
		$this->set(compact('empresas', 'empresasurcusales', 'users', 'direpais', 'direprovincias', 'dirmunicipios'));
	}




/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
	    $this->request->data['Cliente']['id']     = $id;
	    $this->request->data['Cliente']['activo'] = 2;
		if ($this->Cliente->save($this->request->data)) {
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
		$direprovincias = $this->Cliente->Direprovincia->find('list', array('conditions'=>array('Direprovincia.direpai_id'=>$id)));
		$this->set('direprovincias', $direprovincias);
		$this->set('id', $id);
	}	

/**
 * municipio method
 *
 * @return void
 */
	public function municipio($id=null,$id2=null) {
		$this->layout="ajax";
		$dirmunicipios = $this->Cliente->Dirmunicipio->find('list', array('conditions'=>array('Dirmunicipio.direpai_id'=>$id, 'Dirmunicipio.direprovincia_id'=>$id2)));
		$this->set('dirmunicipios', $dirmunicipios);
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
		$data = $this->Cliente->find('count', array('conditions'=>array('nombre'=>$id)));
		echo $data;

	}

}
?>
