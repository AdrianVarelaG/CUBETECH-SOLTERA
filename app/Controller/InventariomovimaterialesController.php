<?php
App::uses('AppController', 'Controller');
/**
 * Inventariomovimateriales Controller
 *
 * @property Inventariomovimateriale $Inventariomovimateriale
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class InventariomovimaterialesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash'); 

	public $uses = array('Inventariomovimateriale','Almacenuser');

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
		//$this->Inventariomovimateriale->recursive = 0;
		//$this->set('inventariomovimateriales', $this->Paginator->paginate());
		  $empresa_id          = $this->Session->read('empresa_id');
     	  $empresasurcusale_id = $this->Session->read('empresasurcusale_id');
     	  $rol_id              = $this->Session->read('ROL');
     	  $user_id             = $this->Session->read('USUARIO_ID');
     	      if($empresa_id==0 && $empresasurcusale_id==0){ 
     		  	$this->set('inventariomovimateriales', $this->Inventariomovimateriale->find('all', array('conditions'=>array('Inventariomovimateriale.activo'=>1))));
     	}else if($empresa_id!=0 && $empresasurcusale_id==0){
     		$this->set('inventariomovimateriales', $this->Inventariomovimateriale->find('all', array('conditions'=>array('Inventariomovimateriale.activo'=>1, 'Inventariomovimateriale.empresa_id'=>$empresa_id))));
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==3){
      		$this->set('inventariomovimateriales', $this->Inventariomovimateriale->find('all', array('conditions'=>array('Inventariomovimateriale.activo'=>1, 'Inventariomovimateriale.empresa_id'=>$empresa_id, 'Inventariomovimateriale.empresasurcusale_id'=>$empresasurcusale_id))));
      	}else{
      		//$this->set('inventariomovimateriales', $this->Inventariomovimateriale->find('all', array('conditions'=>array('Inventariomovimateriale.activo'=>1, 'Inventariomovimateriale.empresa_id'=>$empresa_id, 'Inventariomovimateriale.empresasurcusale_id'=>$empresasurcusale_id, 'Almacene.user_id'=>$user_id))));
      		$this->set('inventariomovimateriales', $this->Inventariomovimateriale->find('all', array('conditions'=>array('Inventariomovimateriale.activo'=>1, 'Inventariomovimateriale.empresa_id'=>$empresa_id, 'Inventariomovimateriale.empresasurcusale_id'=>$empresasurcusale_id))));
      	}
		  //$this->set('inventariomovimateriales', $this->Inventariomovimateriale->find('all'));
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
		if (!$this->Inventariomovimateriale->exists($id)) {
			throw new NotFoundException(__('Invalid inventariomovimateriale'));
		}
		$options = array('conditions' => array('Inventariomovimateriale.' . $this->Inventariomovimateriale->primaryKey => $id));
		$this->set('inventariomovimateriale', $this->Inventariomovimateriale->find('first', $options));
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
			$this->Inventariomovimateriale->create();
			if ($this->Inventariomovimateriale->save($this->request->data)) {
				$this->Flash->success(__('Registro Guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		}
		$empresas = $this->Inventariomovimateriale->Empresa->find('list', array('conditions'=>array('id'=>$empresa_id) ));
			   if($empresa_id==0 && $empresasurcusale_id==0){ 
            	$empresasurcusales = $this->Inventariomovimateriale->Empresasurcusale->find('list');
     	 }else if($empresa_id!=0 && $empresasurcusale_id==0){
                $empresasurcusales = $this->Inventariomovimateriale->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id)));
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0){
                $empresasurcusales = $this->Inventariomovimateriale->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id,'Empresasurcusale.id'=>$empresasurcusale_id)));
      	}
		$almacentipos = $this->Inventariomovimateriale->Almacentipo->find('list', array('conditions'=>array('empresa_id'=>$empresa_id, 'activo'=>1) ) );
		$almacenes = array();
		$almacenmateriales = $this->Inventariomovimateriale->Almacenmateriale->find('list', array('conditions'=>array('empresa_id'=>$empresa_id, 'activo'=>1)));
		$usermovis = $this->Inventariomovimateriale->Usermovi->find('list', array('conditions'=>array('id'=>$user_id)));
		$inventariomovimientos = array();
		$this->set(compact('empresas', 'empresasurcusales', 'almacentipos', 'almacenes', 'almacenmateriales', 'usermovis', 'inventariomovimientos'));
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
		if (!$this->Inventariomovimateriale->exists($id)) {
			throw new NotFoundException(__('Invalid inventariomovimateriale'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Inventariomovimateriale->save($this->request->data)) {
				$this->Flash->success(__('Registro Guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('Inventariomovimateriale.' . $this->Inventariomovimateriale->primaryKey => $id));
			$this->request->data = $this->Inventariomovimateriale->find('first', $options);
		}
		$empresas = $this->Inventariomovimateriale->Empresa->find('list', array('conditions'=>array('id'=>$empresa_id) ));
			   if($empresa_id==0 && $empresasurcusale_id==0){ 
            	$empresasurcusales = $this->Inventariomovimateriale->Empresasurcusale->find('list');
     	 }else if($empresa_id!=0 && $empresasurcusale_id==0){
                $empresasurcusales = $this->Inventariomovimateriale->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id)));
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0){
                $empresasurcusales = $this->Inventariomovimateriale->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id,'Empresasurcusale.id'=>$empresasurcusale_id)));
      	}
		$almacentipos = $this->Inventariomovimateriale->Almacentipo->find('list', array('conditions'=>array('empresa_id'=>$empresa_id, 'activo'=>1) ) );
		$almacenes = $this->Inventariomovimateriale->Almacene->find('list', array('conditions'=>array('almacentipo_id'=>$this->request->data['Inventariomovimateriale']['almacentipo_id'])));
		$almacenmateriales = $this->Inventariomovimateriale->Almacenmateriale->find('list', array('conditions'=>array('empresa_id'=>$empresa_id, 'activo'=>1)));
		$usermovis = $this->Inventariomovimateriale->Usermovi->find('list', array('conditions'=>array('id'=>$this->request->data['Inventariomovimateriale']['usermovi_id'] )));
		$inventariomovimientos = array();
		$this->set(compact('empresas', 'empresasurcusales', 'almacentipos', 'almacenes', 'almacenmateriales', 'usermovis', 'inventariomovimientos'));
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
			$this->Inventariomovimateriale->id = $id;
			if (!$this->Inventariomovimateriale->exists()) {
				throw new NotFoundException(__('Invalid inventariomovimateriale'));
			}
			$this->request->allowMethod('post', 'delete');
			if ($this->Inventariomovimateriale->delete()) {
									$this->Flash->success(__('El Registro fue eliminado.'));
					} else {
						$this->Flash->error(__('El Registro no fue eliminado. Por favor, inténtelo de nuevo.'));
					}
					return $this->redirect(array('action' => 'index'));
			        */
        $this->request->data['Inventariomovimateriale']['id']     = $id;
	    $this->request->data['Inventariomovimateriale']['activo'] = 2;
		if ($this->Inventariomovimateriale->save($this->request->data)) {
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
		$empresa_id          = $this->Session->read('empresa_id');
     	$empresasurcusale_id = $this->Session->read('empresasurcusale_id');
     	$rol_id              = $this->Session->read('ROL');
     	$user_id             = $this->Session->read('USUARIO_ID');
		$data_ = $this->Almacenuser->find('all', array('conditions'=>array('user_id'=>$user_id)));
		//pr($data_);
		foreach($data_ as $key) {
			$almacen[] = $key['Almacenuser']['almacene_id'];
		}
		if(!isset($almacen)){

		}else{
			$data = $this->Inventariomovimateriale->Almacene->find('list', array('conditions'=>array('almacentipo_id'=>$id, 'Almacene.id'=>$almacen)));
		}
		if(!isset($data)){$data=array();}
		$this->set('almacenes',$data);
	}		
}
