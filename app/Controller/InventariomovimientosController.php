<?php
App::uses('AppController', 'Controller');
/**
 * Inventariomovimientos Controller
 *
 * @property Inventariomovimiento $Inventariomovimiento
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class InventariomovimientosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');


	public $uses = array('Inventariomovimiento','Inventariomovimateriale', 'Almacenproductodetalle', 'Almacenmarcadetalle', 'Almacenproducto', 'Almacene', 'Almacenuser');

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
		//$this->Inventariomovimiento->recursive = 0;
		//$this->set('inventariomovimientos', $this->Paginator->paginate());
		  $empresa_id          = $this->Session->read('empresa_id');
     	  $empresasurcusale_id = $this->Session->read('empresasurcusale_id');
     	  $rol_id              = $this->Session->read('ROL');
     	  $user_id             = $this->Session->read('USUARIO_ID');
     	  
     	      if($empresa_id==0 && $empresasurcusale_id==0){ 
     		  	$this->set('inventariomovimientos', $this->Inventariomovimiento->find('all', array('conditions'=>array('Inventariomovimiento.activo'=>1))));
     	}else if($empresa_id!=0 && $empresasurcusale_id==0){
     		    $this->set('inventariomovimientos', $this->Inventariomovimiento->find('all', array('conditions'=>array('Inventariomovimiento.activo'=>1, 'Inventariomovimiento.empresa_id'=>$empresa_id))));
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==3){
      		    $this->set('inventariomovimientos', $this->Inventariomovimiento->find('all', array('conditions'=>array('Inventariomovimiento.activo'=>1, 'Inventariomovimiento.empresa_id'=>$empresa_id, 'Inventariomovimiento.empresasurcusale_id'=>$empresasurcusale_id))));
      	}else{
      		//$this->set('inventariomovimientos', $this->Inventariomovimiento->find('all', array('conditions'=>array('Inventariomovimiento.activo'=>1, 'Inventariomovimiento.empresa_id'=>$empresa_id, 'Inventariomovimiento.empresasurcusale_id'=>$empresasurcusale_id, 'Almacene.user_id'=>$user_id))));
      		    $this->set('inventariomovimientos', $this->Inventariomovimiento->find('all', array('conditions'=>array('Inventariomovimiento.activo'=>1, 'Inventariomovimiento.empresa_id'=>$empresa_id, 'Inventariomovimiento.empresasurcusale_id'=>$empresasurcusale_id))));
      	}
		  //$this->set('inventariomovimientos', $this->Inventariomovimiento->find('all'));
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
		if (!$this->Inventariomovimiento->exists($id)) {
			throw new NotFoundException(__('Invalid inventariomovimiento'));
		}
		$options = array('conditions' => array('Inventariomovimiento.' . $this->Inventariomovimiento->primaryKey => $id));
		$this->set('inventariomovimiento', $this->Inventariomovimiento->find('first', $options));
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
     	$stop                = 1;
     	$producto            = 0;
		if ($this->request->is('post')) {
			$this->Inventariomovimiento->begin();
			$this->Inventariomovimiento->create();
			if($this->request->data['Inventariomovimiento']['tipo']==3){
               $this->request->data['Inventariomovimiento']['tipo_transferencia']=2;
			}
			if ($this->Inventariomovimiento->save($this->request->data)) {
                      $almacenes = $this->Inventariomovimiento->Almacene->find('all', array('conditions'=>array('Almacene.almacentipo_id'=>$this->request->data['Inventariomovimiento']['almacentipo_id'], 'Almacene.id'=>$this->request->data['Inventariomovimiento']['almacene_id'])));
                      $maquila   = $almacenes[0]['Almacene']['maquila'];
                      $foraneo   = $almacenes[0]['Almacene']['foraneo'];
                      $id        =  $this->Inventariomovimiento->id;
                      $almacenproductodetalles = $this->Almacenproductodetalle->find('all', array('conditions'=>array('Almacenproductodetalle.almacenproducto_id'=>$this->request->data['Inventariomovimiento']['almacenproducto_id'])));
                      $almacenproductos        = $this->Almacenproducto->find('all', array('conditions'=>array('Almacenproducto.id'=>$this->request->data['Inventariomovimiento']['almacenproducto_id'])));
                      //echo $this->request->data['Inventariomovimiento']['tipo'];
                      if($this->request->data['Inventariomovimiento']['tipo']==1){//ENTRADA
                      	      if($maquila==1 && $foraneo==2){
                      	      	foreach($almacenproductodetalles as $almacenproductodetalle){
									    $this->request->data['Inventariomovimateriale']['empresa_id']              = $empresa_id;
									    $this->request->data['Inventariomovimateriale']['empresasurcusale_id']     = $empresasurcusale_id;
									    $this->request->data['Inventariomovimateriale']['almacentipo_id']          = $this->request->data['Inventariomovimiento']['almacentipo_id'];
									    $this->request->data['Inventariomovimateriale']['almacene_id']             = $this->request->data['Inventariomovimiento']['almacene_id'];
									    $this->request->data['Inventariomovimateriale']['almacenmateriale_id']     = $almacenproductodetalle['Almacenproductodetalle']['almacenmateriale_id'];
									    $this->request->data['Inventariomovimateriale']['tipo']                    = 2;
									    $this->request->data['Inventariomovimateriale']['cantidad']                = ($almacenproductodetalle['Almacenproductodetalle']['cantidad']*$this->request->data['Inventariomovimiento']['cantidad']);
									    $this->request->data['Inventariomovimateriale']['fechaalta']               = $this->request->data['Inventariomovimiento']['fechaalta'];
									    $this->request->data['Inventariomovimateriale']['usermovi_id']             = $user_id;
									    $this->request->data['Inventariomovimateriale']['inventariomovimiento_id'] = $id ;
									    $inventariomovimateriales = $this->Inventariomovimateriale->find('all', array(
																									            'conditions' => array('Inventariomovimateriale.almacenmateriale_id'=>$this->request->data['Inventariomovimateriale']['almacenmateriale_id'],     'Inventariomovimateriale.almacene_id'=>$this->request->data['Inventariomovimiento']['almacene_id'],    'Inventariomovimateriale.almacentipo_id'=>$this->request->data['Inventariomovimiento']['almacentipo_id'],       'Inventariomovimateriale.activo'=>1, 'Inventariomovimateriale.empresa_id'=>$empresa_id, 'Inventariomovimateriale.empresasurcusale_id'=>$empresasurcusale_id),
																									                 'fields'=>array( 'Inventariomovimateriale.empresa_id, 
																									                 	                (select a.razon_social from empresas a where a.id=Inventariomovimateriale.empresa_id) as deno_empresas, 
																									                 	               Inventariomovimateriale.empresasurcusale_id, 
																									                 	                (select a.denominacion from empresasurcusales a where a.id=Inventariomovimateriale.empresasurcusale_id) as deno_empresasurcusales,
																									                 	               Inventariomovimateriale.almacentipo_id, 
																									                 	                (select a.denominacion from almacentipos a where a.id=Inventariomovimateriale.almacentipo_id) as deno_almacentipos,
																									                 	               Inventariomovimateriale.almacene_id, 
																									                 	                (select a.nombre from almacenes a where a.id=Inventariomovimateriale.almacene_id) as deno_almacenes,
																									                 	               Inventariomovimateriale.almacenmateriale_id,
																									                 	                (select a.nombre from almacenmateriales a where a.id=Inventariomovimateriale.almacenmateriale_id) as deno_almacenmateriales,
																									                 	               (select SUM(a.cantidad) from Inventariomovimateriales a where a.activo=1 and (a.tipo=1) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS entrada,
																									                 	               (select SUM(a.cantidad) from Inventariomovimateriales a where a.activo=1 and (a.tipo=2) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS salida
																									                 	               '
																									                 	            ),
																									                 'group' => 'Inventariomovimateriale.empresa_id, deno_empresas, Inventariomovimateriale.empresasurcusale_id, deno_empresasurcusales, Inventariomovimateriale.almacentipo_id, deno_almacentipos, Inventariomovimateriale.almacene_id, deno_almacenes, Inventariomovimateriale.almacenmateriale_id, deno_almacenmateriales, entrada, salida'
																								            ));
									    if(isset($inventariomovimateriales[0][0]['entrada'])){
                                                 $cantidad = $inventariomovimateriales[0][0]['entrada'] - $inventariomovimateriales[0][0]['salida'];
                                        }else{
                                                 $cantidad = 0;
                                                 //pr($inventariomovimateriales);
                                        }
                                        //echo "cantidad: ".$cantidad." * ".($almacenproductodetalle['Almacenproductodetalle']['cantidad']*$this->request->data['Inventariomovimiento']['cantidad']) ;
									    if($cantidad>=($almacenproductodetalle['Almacenproductodetalle']['cantidad']*$this->request->data['Inventariomovimiento']['cantidad'])){
										}else{
                                                $stop = 0;
										}
									}
									if($stop!=0){
					                                foreach($almacenproductodetalles as $almacenproductodetalle){
													    $this->request->data['Inventariomovimateriale']['empresa_id']              = $empresa_id;
													    $this->request->data['Inventariomovimateriale']['empresasurcusale_id']     = $empresasurcusale_id;
													    $this->request->data['Inventariomovimateriale']['almacentipo_id']          = $this->request->data['Inventariomovimiento']['almacentipo_id'];
													    $this->request->data['Inventariomovimateriale']['almacene_id']             = $this->request->data['Inventariomovimiento']['almacene_id'];
													    $this->request->data['Inventariomovimateriale']['almacenmateriale_id']     = $almacenproductodetalle['Almacenproductodetalle']['almacenmateriale_id'];
													    $this->request->data['Inventariomovimateriale']['tipo']                    = 2;
													    $this->request->data['Inventariomovimateriale']['cantidad']                = ($almacenproductodetalle['Almacenproductodetalle']['cantidad'] * $this->request->data['Inventariomovimiento']['cantidad']);
													    $this->request->data['Inventariomovimateriale']['fechaalta']               = $this->request->data['Inventariomovimiento']['fechaalta'];
													    $this->request->data['Inventariomovimateriale']['usermovi_id']             = $user_id;
													    $this->request->data['Inventariomovimateriale']['inventariomovimiento_id'] = $id ;
				                                        $inventariomovimateriales = $this->Inventariomovimateriale->find('all', array(
																													            'conditions' => array('Inventariomovimateriale.almacenmateriale_id'=>$this->request->data['Inventariomovimateriale']['almacenmateriale_id'],     'Inventariomovimateriale.almacene_id'=>$this->request->data['Inventariomovimiento']['almacene_id'],    'Inventariomovimateriale.almacentipo_id'=>$this->request->data['Inventariomovimiento']['almacentipo_id'],       'Inventariomovimateriale.activo'=>1, 'Inventariomovimateriale.empresa_id'=>$empresa_id, 'Inventariomovimateriale.empresasurcusale_id'=>$empresasurcusale_id),
																													                 'fields'=>array( 'Inventariomovimateriale.empresa_id, 
																													                 	                (select a.razon_social from empresas a where a.id=Inventariomovimateriale.empresa_id) as deno_empresas, 
																													                 	               Inventariomovimateriale.empresasurcusale_id, 
																													                 	                (select a.denominacion from empresasurcusales a where a.id=Inventariomovimateriale.empresasurcusale_id) as deno_empresasurcusales,
																													                 	               Inventariomovimateriale.almacentipo_id, 
																													                 	                (select a.denominacion from almacentipos a where a.id=Inventariomovimateriale.almacentipo_id) as deno_almacentipos,
																													                 	               Inventariomovimateriale.almacene_id, 
																													                 	                (select a.nombre from almacenes a where a.id=Inventariomovimateriale.almacene_id) as deno_almacenes,
																													                 	               Inventariomovimateriale.almacenmateriale_id,
																													                 	                (select a.nombre from almacenmateriales a where a.id=Inventariomovimateriale.almacenmateriale_id) as deno_almacenmateriales,
																													                 	               (select SUM(a.cantidad) from Inventariomovimateriales a where a.activo=1 and (a.tipo=1) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS entrada,
																													                 	               (select SUM(a.cantidad) from Inventariomovimateriales a where a.activo=1 and (a.tipo=2) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS salida
																													                 	               '
																													                 	            ),
																													                 'group' => 'Inventariomovimateriale.empresa_id, deno_empresas, Inventariomovimateriale.empresasurcusale_id, deno_empresasurcusales, Inventariomovimateriale.almacentipo_id, deno_almacentipos, Inventariomovimateriale.almacene_id, deno_almacenes, Inventariomovimateriale.almacenmateriale_id, deno_almacenmateriales, entrada, salida'
																												            ));
				                                        if(isset($inventariomovimateriales[0][0]['entrada'])){
		                                                         $cantidad = $inventariomovimateriales[0][0]['entrada'] - $inventariomovimateriales[0][0]['salida'];
				                                        }else{
		                                                         $cantidad = 0;
		                                                         //pr($inventariomovimateriales);
				                                        }
				                                        //echo "cantidad: ".$cantidad." * ".($almacenproductodetalle['Almacenproductodetalle']['cantidad']*$this->request->data['Inventariomovimiento']['cantidad']) ;
														if($cantidad>=($almacenproductodetalle['Almacenproductodetalle']['cantidad']*$this->request->data['Inventariomovimiento']['cantidad'])){
				                                                $this->Inventariomovimateriale->create();
																$this->Inventariomovimateriale->save($this->request->data);
														}else{
				                                                $stop = 0;
														}
													}
									}
                      	}else if($maquila==2 && $foraneo==1){
                      		            $this->request->data['Inventariomovimiento']['empresa_id']              = $empresa_id;
									    $this->request->data['Inventariomovimiento']['empresasurcusale_id']     = $empresasurcusale_id;
									    $this->request->data['Inventariomovimiento']['almacentipo_id']          = $almacenes[0]['Almacene']['almacentipo_id'];
									    $this->request->data['Inventariomovimiento']['almacene_id']             = $almacenes[0]['Almacene']['id'];
									    $this->request->data['Inventariomovimiento']['almacenproducto_id']      = $this->request->data['Inventariomovimiento']['almacenproducto_id'];
									    $this->request->data['Inventariomovimiento']['tipo']                    = 2;
									    $this->request->data['Inventariomovimiento']['cantidad']                = $this->request->data['Inventariomovimiento']['cantidad'];
									    $this->request->data['Inventariomovimiento']['fechaalta']               = $this->request->data['Inventariomovimiento']['fechaalta'];
									    $this->request->data['Inventariomovimiento']['almacentipofunte_id']     = $this->request->data['Inventariomovimiento']['almacentipofunte_id'];
									    $this->request->data['Inventariomovimiento']['almacenefunte_id']        = $this->request->data['Inventariomovimiento']['almacenefunte_id'];
									    $this->request->data['Inventariomovimiento']['referencia']              = $this->request->data['Inventariomovimiento']['referencia'];
									    $this->request->data['Inventariomovimiento']['ordenventa_id']           = 0;
									    $this->request->data['Inventariomovimiento']['userventa_id']            = 0;
										$this->Inventariomovimiento->create();
										$this->Inventariomovimiento->save($this->request->data);
										$id2  =  $this->Inventariomovimiento->id;
										$almacenmarca_id      = $almacenproductos[0]['Almacenproducto']['almacenmarca_id'];
										$almacenmarcadetalles = $this->Almacenmarcadetalle->find('all', array('conditions'=>array('almacenmarca_id'=>$almacenmarca_id, 'default'=>1)));
										foreach($almacenmarcadetalles as $datos){
                                                $this->request->data['Inventariomovimateriale']['empresa_id']              = $empresa_id;
											    $this->request->data['Inventariomovimateriale']['empresasurcusale_id']     = $empresasurcusale_id;
											    $this->request->data['Inventariomovimateriale']['almacentipo_id']          = $this->request->data['Inventariomovimiento']['almacentipo_id'];
											    $this->request->data['Inventariomovimateriale']['almacene_id']             = $this->request->data['Inventariomovimiento']['almacene_id'];
											    $this->request->data['Inventariomovimateriale']['almacenmateriale_id']     = $datos['Almacenmarcadetalle']['almacenmateriale_id'];
											    $this->request->data['Inventariomovimateriale']['tipo']                    = 2;
											    $this->request->data['Inventariomovimateriale']['cantidad']                = ($datos['Almacenmarcadetalle']['cantidad'] * $this->request->data['Inventariomovimiento']['cantidad']);
											    $this->request->data['Inventariomovimateriale']['fechaalta']               = $this->request->data['Inventariomovimiento']['fechaalta'];
											    $this->request->data['Inventariomovimateriale']['usermovi_id']             = $user_id;
											    $this->request->data['Inventariomovimateriale']['inventariomovimiento_id'] = $id ;
												$inventariomovimateriales = $this->Inventariomovimateriale->find('all', array(
																										            'conditions' => array('Inventariomovimateriale.almacenmateriale_id'=>$datos['Almacenmarcadetalle']['almacenmateriale_id'],     'Inventariomovimateriale.almacene_id'=>$this->request->data['Inventariomovimiento']['almacene_id'],    'Inventariomovimateriale.almacentipo_id'=>$this->request->data['Inventariomovimiento']['almacentipo_id'],       'Inventariomovimateriale.activo'=>1, 'Inventariomovimateriale.empresa_id'=>$empresa_id, 'Inventariomovimateriale.empresasurcusale_id'=>$empresasurcusale_id),
																										                 'fields'=>array( 'Inventariomovimateriale.empresa_id, 
																										                 	                (select a.razon_social from empresas a where a.id=Inventariomovimateriale.empresa_id) as deno_empresas, 
																										                 	               Inventariomovimateriale.empresasurcusale_id, 
																										                 	                (select a.denominacion from empresasurcusales a where a.id=Inventariomovimateriale.empresasurcusale_id) as deno_empresasurcusales,
																										                 	               Inventariomovimateriale.almacentipo_id, 
																										                 	                (select a.denominacion from almacentipos a where a.id=Inventariomovimateriale.almacentipo_id) as deno_almacentipos,
																										                 	               Inventariomovimateriale.almacene_id, 
																										                 	                (select a.nombre from almacenes a where a.id=Inventariomovimateriale.almacene_id) as deno_almacenes,
																										                 	               Inventariomovimateriale.almacenmateriale_id,
																										                 	                (select a.nombre from almacenmateriales a where a.id=Inventariomovimateriale.almacenmateriale_id) as deno_almacenmateriales,
																										                 	               (select SUM(a.cantidad) from Inventariomovimateriales a where a.activo=1 and (a.tipo=1) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS entrada,
																										                 	               (select SUM(a.cantidad) from Inventariomovimateriales a where a.activo=1 and (a.tipo=2) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS salida
																										                 	               '
																										                 	            ),
																										                 'group' => 'Inventariomovimateriale.empresa_id, deno_empresas, Inventariomovimateriale.empresasurcusale_id, deno_empresasurcusales, Inventariomovimateriale.almacentipo_id, deno_almacentipos, Inventariomovimateriale.almacene_id, deno_almacenes, Inventariomovimateriale.almacenmateriale_id, deno_almacenmateriales, entrada, salida'
																									            ));
		                                        if(isset($inventariomovimateriales[0][0]['entrada'])){
                                                         $cantidad = $inventariomovimateriales[0][0]['entrada'] - $inventariomovimateriales[0][0]['salida'];
		                                        }else{
                                                         $cantidad = 0;
                                                         //pr($inventariomovimateriales);
		                                        }
												if($cantidad>=($datos['Almacenmarcadetalle']['cantidad'] * $this->request->data['Inventariomovimiento']['cantidad'])){
		                                                //$this->Inventariomovimateriale->create();
														//$this->Inventariomovimateriale->save($this->request->data);
												}else{
		                                                $stop = 0;
												}
										}
                                        if($stop!=0){
												foreach($almacenmarcadetalles as $datos){
		                                            $this->request->data['Inventariomovimateriale']['empresa_id']              = $empresa_id;
													    $this->request->data['Inventariomovimateriale']['empresasurcusale_id']     = $empresasurcusale_id;
													    $this->request->data['Inventariomovimateriale']['almacentipo_id']          = $this->request->data['Inventariomovimiento']['almacentipo_id'];
													    $this->request->data['Inventariomovimateriale']['almacene_id']             = $this->request->data['Inventariomovimiento']['almacene_id'];
													    $this->request->data['Inventariomovimateriale']['almacenmateriale_id']     = $datos['Almacenmarcadetalle']['almacenmateriale_id'];
													    $this->request->data['Inventariomovimateriale']['tipo']                    = 2;
													    $this->request->data['Inventariomovimateriale']['cantidad']                = ($datos['Almacenmarcadetalle']['cantidad'] * $this->request->data['Inventariomovimiento']['cantidad']);
													    $this->request->data['Inventariomovimateriale']['fechaalta']               = $this->request->data['Inventariomovimiento']['fechaalta'];
													    $this->request->data['Inventariomovimateriale']['usermovi_id']             = $user_id;
													    $this->request->data['Inventariomovimateriale']['inventariomovimiento_id'] = $id ;
														$inventariomovimateriales = $this->Inventariomovimateriale->find('all', array(
																												            'conditions' => array('Inventariomovimateriale.almacenmateriale_id'=>$datos['Almacenmarcadetalle']['almacenmateriale_id'],     'Inventariomovimateriale.almacene_id'=>$this->request->data['Inventariomovimiento']['almacene_id'],    'Inventariomovimateriale.almacentipo_id'=>$this->request->data['Inventariomovimiento']['almacentipo_id'],       'Inventariomovimateriale.activo'=>1, 'Inventariomovimateriale.empresa_id'=>$empresa_id, 'Inventariomovimateriale.empresasurcusale_id'=>$empresasurcusale_id),
																												                 'fields'=>array( 'Inventariomovimateriale.empresa_id, 
																												                 	                (select a.razon_social from empresas a where a.id=Inventariomovimateriale.empresa_id) as deno_empresas, 
																												                 	               Inventariomovimateriale.empresasurcusale_id, 
																												                 	                (select a.denominacion from empresasurcusales a where a.id=Inventariomovimateriale.empresasurcusale_id) as deno_empresasurcusales,
																												                 	               Inventariomovimateriale.almacentipo_id, 
																												                 	                (select a.denominacion from almacentipos a where a.id=Inventariomovimateriale.almacentipo_id) as deno_almacentipos,
																												                 	               Inventariomovimateriale.almacene_id, 
																												                 	                (select a.nombre from almacenes a where a.id=Inventariomovimateriale.almacene_id) as deno_almacenes,
																												                 	               Inventariomovimateriale.almacenmateriale_id,
																												                 	                (select a.nombre from almacenmateriales a where a.id=Inventariomovimateriale.almacenmateriale_id) as deno_almacenmateriales,
																												                 	               (select SUM(a.cantidad) from Inventariomovimateriales a where a.activo=1 and (a.tipo=1) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS entrada,
																												                 	               (select SUM(a.cantidad) from Inventariomovimateriales a where a.activo=1 and (a.tipo=2) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS salida
																												                 	               '
																												                 	            ),
																												                 'group' => 'Inventariomovimateriale.empresa_id, deno_empresas, Inventariomovimateriale.empresasurcusale_id, deno_empresasurcusales, Inventariomovimateriale.almacentipo_id, deno_almacentipos, Inventariomovimateriale.almacene_id, deno_almacenes, Inventariomovimateriale.almacenmateriale_id, deno_almacenmateriales, entrada, salida'
																											            ));
				                                        
				                                        if(isset($inventariomovimateriales[0][0]['entrada'])){
		                                                         $cantidad = $inventariomovimateriales[0][0]['entrada'] - $inventariomovimateriales[0][0]['salida'];
				                                        }else{
		                                                         $cantidad = 0;
		                                                         //pr($inventariomovimateriales);
				                                        }
														if($cantidad>=($datos['Almacenmarcadetalle']['cantidad'] * $this->request->data['Inventariomovimiento']['cantidad'])){
				                                                $this->Inventariomovimateriale->create();
																$this->Inventariomovimateriale->save($this->request->data);
														}else{
				                                                $stop = 0;
														}
												}
										}
                      	}else if($maquila==2 && $foraneo==2){
                                         $almacene = $this->Almacene->find('all', array('conditions'=>array('Almacene.empresa_id'=>$empresa_id, 'Almacene.empresasurcusale_id'=>$empresasurcusale_id, 'Almacene.foraneo'=>2, 'Almacene.maquila'=>1)));
			                      		 $this->request->data['Inventariomovimiento']['empresa_id']              = $empresa_id;
									     $this->request->data['Inventariomovimiento']['empresasurcusale_id']     = $empresasurcusale_id;
									     $this->request->data['Inventariomovimiento']['almacentipo_id']          = $almacene[0]['Almacene']['almacentipo_id'];
									     $this->request->data['Inventariomovimiento']['almacene_id']             = $almacene[0]['Almacene']['id'];
									     $this->request->data['Inventariomovimiento']['almacenproducto_id']      = $this->request->data['Inventariomovimiento']['almacenproducto_id'];
									     $this->request->data['Inventariomovimiento']['tipo']                    = 2;
									     $this->request->data['Inventariomovimiento']['cantidad']                = $this->request->data['Inventariomovimiento']['cantidad'];
									     $this->request->data['Inventariomovimiento']['fechaalta']               = $this->request->data['Inventariomovimiento']['fechaalta'];
									     $this->request->data['Inventariomovimiento']['almacentipofunte_id']     = $this->request->data['Inventariomovimiento']['almacentipofunte_id'];
									     $this->request->data['Inventariomovimiento']['almacenefunte_id']        = $this->request->data['Inventariomovimiento']['almacenefunte_id'];
									     $this->request->data['Inventariomovimiento']['referencia']              = $this->request->data['Inventariomovimiento']['referencia'];
									     $this->request->data['Inventariomovimiento']['ordenventa_id']           = 0;
									     $this->request->data['Inventariomovimiento']['userventa_id']            = 0;
									     $this->Inventariomovimiento->create();
										 $this->Inventariomovimiento->save($this->request->data);
                      	}
                }else if($this->request->data['Inventariomovimiento']['tipo']==2){//SALIDA
                			  if($maquila==1 && $foraneo==2){//ADMINISTRADOR

                      	}else if($maquila==2 && $foraneo==1){//ADMINISTRADOR

                      	}else if($maquila==2 && $foraneo==2){//ADMINISTRADOR

                      	}
                        $inventariomovimientos = $this->Inventariomovimiento->find('all', array(
																					            'conditions' => array('Inventariomovimiento.almacene_id'=>$this->request->data['Inventariomovimiento']['almacene_id'], 'Inventariomovimiento.almacentipo_id'=>$this->request->data['Inventariomovimiento']['almacentipo_id'], 'Inventariomovimiento.activo'=>1, 'Inventariomovimiento.empresa_id'=>$empresa_id, 'Inventariomovimiento.empresasurcusale_id'=>$empresasurcusale_id),
																					                 'fields'=>array( 'Inventariomovimiento.empresa_id, 
																					                 	                (select a.razon_social from empresas a where a.id=Inventariomovimiento.empresa_id) as deno_empresas, 
																					                 	               Inventariomovimiento.empresasurcusale_id, 
																					                 	                (select a.denominacion from empresasurcusales a where a.id=Inventariomovimiento.empresasurcusale_id) as deno_empresasurcusales,
																					                 	               Inventariomovimiento.almacentipo_id, 
																					                 	                (select a.denominacion from almacentipos a where a.id=Inventariomovimiento.almacentipo_id) as deno_almacentipos,
																					                 	               Inventariomovimiento.almacene_id, 
																					                 	                (select a.nombre from almacenes a where a.id=Inventariomovimiento.almacene_id) as deno_almacenes,
																					                 	               Inventariomovimiento.almacenproducto_id,
																					                 	                (select a.nombre from almacenproductos a where a.id=Inventariomovimiento.almacenproducto_id) as deno_almacenproductos,
																					                 	               (select SUM(a.cantidad) from Inventariomovimientos a where a.activo=1 and (a.tipo=1 or a.tipo_transferencia=1) and a.empresa_id=Inventariomovimiento.empresa_id and a.empresasurcusale_id=Inventariomovimiento.empresasurcusale_id  and a.almacentipo_id=Inventariomovimiento.almacentipo_id  and a.almacene_id=Inventariomovimiento.almacene_id and a.almacenproducto_id=Inventariomovimiento.almacenproducto_id) AS entrada,
																					                 	               (select SUM(a.cantidad) from Inventariomovimientos a where a.activo=1 and (a.tipo=2 or a.tipo_transferencia=2) and a.empresa_id=Inventariomovimiento.empresa_id and a.empresasurcusale_id=Inventariomovimiento.empresasurcusale_id  and a.almacentipo_id=Inventariomovimiento.almacentipo_id  and a.almacene_id=Inventariomovimiento.almacene_id and a.almacenproducto_id=Inventariomovimiento.almacenproducto_id) AS salida
																					                 	               '
																					                 	            ),
																					                 'group' => 'Inventariomovimiento.empresa_id, deno_empresas, Inventariomovimiento.empresasurcusale_id, deno_empresasurcusales, Inventariomovimiento.almacentipo_id, deno_almacentipos, Inventariomovimiento.almacene_id, deno_almacenes, Inventariomovimiento.almacenproducto_id, deno_almacenproductos, entrada, salida'
																					            ));
                        if(isset($inventariomovimientos[0][0]['entrada'])){
                                 $cantidad = $inventariomovimientos[0][0]['entrada'] - $inventariomovimientos[0][0]['salida'];
                        }else{
                                 $cantidad = 0;
                        }
						if($cantidad>=$this->request->data['Inventariomovimiento']['cantidad']){
						}else{
                                $stop = 0;
						}
                }else if($this->request->data['Inventariomovimiento']['tipo']==3){//TRANSFERENCIA
	                	$inventariomovimientos = $this->Inventariomovimiento->find('all', array(
																						            'conditions' => array('Inventariomovimiento.almacene_id'=>$this->request->data['Inventariomovimiento']['almacene_id'], 'Inventariomovimiento.almacentipo_id'=>$this->request->data['Inventariomovimiento']['almacentipo_id'], 'Inventariomovimiento.activo'=>1, 'Inventariomovimiento.empresa_id'=>$empresa_id, 'Inventariomovimiento.empresasurcusale_id'=>$empresasurcusale_id),
																						                 'fields'=>array( 'Inventariomovimiento.empresa_id, 
																						                 	                (select a.razon_social from empresas a where a.id=Inventariomovimiento.empresa_id) as deno_empresas, 
																						                 	               Inventariomovimiento.empresasurcusale_id, 
																						                 	                (select a.denominacion from empresasurcusales a where a.id=Inventariomovimiento.empresasurcusale_id) as deno_empresasurcusales,
																						                 	               Inventariomovimiento.almacentipo_id, 
																						                 	                (select a.denominacion from almacentipos a where a.id=Inventariomovimiento.almacentipo_id) as deno_almacentipos,
																						                 	               Inventariomovimiento.almacene_id, 
																						                 	                (select a.nombre from almacenes a where a.id=Inventariomovimiento.almacene_id) as deno_almacenes,
																						                 	               Inventariomovimiento.almacenproducto_id,
																						                 	                (select a.nombre from almacenproductos a where a.id=Inventariomovimiento.almacenproducto_id) as deno_almacenproductos,
																						                 	               (select SUM(a.cantidad) from Inventariomovimientos a where a.activo=1 and (a.tipo=1 or a.tipo_transferencia=1) and a.empresa_id=Inventariomovimiento.empresa_id and a.empresasurcusale_id=Inventariomovimiento.empresasurcusale_id  and a.almacentipo_id=Inventariomovimiento.almacentipo_id  and a.almacene_id=Inventariomovimiento.almacene_id and a.almacenproducto_id=Inventariomovimiento.almacenproducto_id) AS entrada,
																						                 	               (select SUM(a.cantidad) from Inventariomovimientos a where a.activo=1 and (a.tipo=2 or a.tipo_transferencia=2) and a.empresa_id=Inventariomovimiento.empresa_id and a.empresasurcusale_id=Inventariomovimiento.empresasurcusale_id  and a.almacentipo_id=Inventariomovimiento.almacentipo_id  and a.almacene_id=Inventariomovimiento.almacene_id and a.almacenproducto_id=Inventariomovimiento.almacenproducto_id) AS salida
																						                 	               '
																						                 	            ),
																						                 'group' => 'Inventariomovimiento.empresa_id, deno_empresas, Inventariomovimiento.empresasurcusale_id, deno_empresasurcusales, Inventariomovimiento.almacentipo_id, deno_almacentipos, Inventariomovimiento.almacene_id, deno_almacenes, Inventariomovimiento.almacenproducto_id, deno_almacenproductos, entrada, salida'
																						            ));
                	     $this->request->data['Inventariomovimiento']['empresa_id']              = $empresa_id;
					     $this->request->data['Inventariomovimiento']['empresasurcusale_id']     = $empresasurcusale_id;
					     $this->request->data['Inventariomovimiento']['almacentipo_id']          = $this->request->data['Inventariomovimiento']['almacentipofunte_id'];
					     $this->request->data['Inventariomovimiento']['almacene_id']             = $this->request->data['Inventariomovimiento']['almacenefunte_id'];
					     $this->request->data['Inventariomovimiento']['almacenproducto_id']      = $this->request->data['Inventariomovimiento']['almacenproducto_id'];
					     $this->request->data['Inventariomovimiento']['tipo']                    = 3;
					     $this->request->data['Inventariomovimiento']['cantidad']                = $this->request->data['Inventariomovimiento']['cantidad'];
					     $this->request->data['Inventariomovimiento']['fechaalta']               = $this->request->data['Inventariomovimiento']['fechaalta'];
					     $this->request->data['Inventariomovimiento']['almacentipofunte_id']     = 0;
					     $this->request->data['Inventariomovimiento']['almacenefunte_id']        = 0;
					     $this->request->data['Inventariomovimiento']['referencia']              = $this->request->data['Inventariomovimiento']['referencia'];
					     $this->request->data['Inventariomovimiento']['ordenventa_id']           = 0;
					     $this->request->data['Inventariomovimiento']['userventa_id']            = 0;
					     if($this->request->data['Inventariomovimiento']['tipo']==3){
			                $this->request->data['Inventariomovimiento']['tipo_transferencia']=1;
						 }
                        //pr($inventariomovimientos);
                        if(isset($inventariomovimientos[0][0]['entrada'])){
                                 $cantidad = $inventariomovimientos[0][0]['entrada'] - $inventariomovimientos[0][0]['salida'];
                        }else{
                                 $cantidad = 0;
                        }
                        //echo $cantidad." - ".$this->request->data['Inventariomovimiento']['cantidad'];
						if($cantidad>=$this->request->data['Inventariomovimiento']['cantidad']){
								$this->Inventariomovimiento->create();
						 		$this->Inventariomovimiento->save($this->request->data);
						}else{
                                $stop = 0;
                                $producto = 1;
						}
                }
                if($stop==1){
                                $this->Flash->success(__('Registro Guardado.'));
								return $this->redirect(array('action' => 'index'));
                }else{
                                $this->Inventariomovimiento->delete($id);
                            	if(isset($id2)){$this->Inventariomovimiento->delete($id2);}
                                $this->Inventariomovimiento->rollback();
                                if($producto==1){
                                	$this->Flash->error(__('Registro no Guardado. Por favor, verificar disponibilidad de productos.'));
                                }else{
                                	$this->Flash->error(__('Registro no Guardado. Por favor, verificar disponibilidad de materiales.'));
                                }
                                
                                return $this->redirect(array('action' => 'index'));
                }
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		}
		$empresas = $this->Inventariomovimiento->Empresa->find('list', array('conditions'=>array('id'=>$empresa_id) ));
		       if($empresa_id==0 && $empresasurcusale_id==0){ 
            	$empresasurcusales = $this->Inventariomovimiento->Empresasurcusale->find('list');
     	 }else if($empresa_id!=0 && $empresasurcusale_id==0){
                $empresasurcusales = $this->Inventariomovimiento->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id)));
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0){
                $empresasurcusales = $this->Inventariomovimiento->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id,'Empresasurcusale.id'=>$empresasurcusale_id)));
      	}
		$almacentipos = $this->Inventariomovimiento->Almacentipo->find('list', array('conditions'=>array('empresa_id'=>$empresa_id, 'activo'=>1) ));
		$almacenes = array();
		$almacenproductos = $this->Inventariomovimiento->Almacenproducto->find('list', array('conditions'=>array('empresa_id'=>$empresa_id, 'activo'=>1) ));
		$almacentipofuntes = $this->Inventariomovimiento->Almacentipofunte->find('list', array('conditions'=>array('empresa_id'=>$empresa_id, 'activo'=>1) ));
		$almacenefuntes = array();
		$ordenventas = array();
		$userventas  = array();
		$this->set(compact('empresas', 'empresasurcusales', 'almacentipos', 'almacenes', 'almacenproductos', 'almacentipofuntes', 'almacenefuntes', 'ordenventas', 'userventas'));
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
     	$stop                = 1;
     	$producto            = 0;
		if (!$this->Inventariomovimiento->exists($id)) {
			throw new NotFoundException(__('Invalid inventariomovimiento'));
		}
		if ($this->request->is(array('post', 'put'))) {
            //OPTENER DATOS ANTERIORES//
            $options = array('conditions' => array('Inventariomovimiento.' . $this->Inventariomovimiento->primaryKey => $id));
		    //$this->request->data = $this->Inventariomovimiento->find('first', $options);
		    $data = $this->Inventariomovimiento->find('first', $options);
		    //pr($this->request->data);
		    if($this->request->data['Inventariomovimiento']['tipo']==3){
               $this->request->data['Inventariomovimiento']['tipo_transferencia']=1;
			}
			if ($this->Inventariomovimiento->save($this->request->data)) {
				unset($this->request->data['Inventariomovimiento']['id']);
                      $almacenes = $this->Inventariomovimiento->Almacene->find('all', array('conditions'=>array('Almacene.almacentipo_id'=>$this->request->data['Inventariomovimiento']['almacentipo_id'], 'Almacene.id'=>$this->request->data['Inventariomovimiento']['almacene_id'])));
                      $maquila   = $almacenes[0]['Almacene']['maquila'];
                      $foraneo   = $almacenes[0]['Almacene']['foraneo'];
                      $id        =  $this->Inventariomovimiento->id;
                      $almacenproductodetalles = $this->Almacenproductodetalle->find('all', array('conditions'=>array('almacenproducto_id'=>$this->request->data['Inventariomovimiento']['almacenproducto_id'])));
                      $almacenproductos        = $this->Almacenproducto->find('all', array('conditions'=>array('Almacenproducto.id'=>$this->request->data['Inventariomovimiento']['almacenproducto_id'])));
                      if($this->request->data['Inventariomovimiento']['tipo']==1){//ENTRADA
                      	      if($maquila==1 && $foraneo==2){
                      	      		foreach($almacenproductodetalles as $almacenproductodetalle){
									    $this->request->data['Inventariomovimateriale']['empresa_id']              = $empresa_id;
									    $this->request->data['Inventariomovimateriale']['empresasurcusale_id']     = $empresasurcusale_id;
									    $this->request->data['Inventariomovimateriale']['almacentipo_id']          = $this->request->data['Inventariomovimiento']['almacentipo_id'];
									    $this->request->data['Inventariomovimateriale']['almacene_id']             = $this->request->data['Inventariomovimiento']['almacene_id'];
									    $this->request->data['Inventariomovimateriale']['almacenmateriale_id']     = $almacenproductodetalle['Almacenproductodetalle']['almacenmateriale_id'];
									    $this->request->data['Inventariomovimateriale']['tipo']                    = 2;
									    $this->request->data['Inventariomovimateriale']['cantidad']                = ($almacenproductodetalle['Almacenproductodetalle']['cantidad']*$this->request->data['Inventariomovimiento']['cantidad']);
									    $this->request->data['Inventariomovimateriale']['fechaalta']               = $this->request->data['Inventariomovimiento']['fechaalta'];
									    $this->request->data['Inventariomovimateriale']['usermovi_id']             = $user_id;
									    $this->request->data['Inventariomovimateriale']['inventariomovimiento_id'] = $id ;
									    $inventariomovimateriales = $this->Inventariomovimateriale->find('all', array(
																									            'conditions' => array('Inventariomovimateriale.almacenmateriale_id'=>$this->request->data['Inventariomovimateriale']['almacenmateriale_id'],     'Inventariomovimateriale.almacene_id'=>$this->request->data['Inventariomovimiento']['almacene_id'],    'Inventariomovimateriale.almacentipo_id'=>$this->request->data['Inventariomovimiento']['almacentipo_id'],       'Inventariomovimateriale.activo'=>1, 'Inventariomovimateriale.empresa_id'=>$empresa_id, 'Inventariomovimateriale.empresasurcusale_id'=>$empresasurcusale_id),
																									                 'fields'=>array( 'Inventariomovimateriale.empresa_id, 
																									                 	                (select a.razon_social from empresas a where a.id=Inventariomovimateriale.empresa_id) as deno_empresas, 
																									                 	               Inventariomovimateriale.empresasurcusale_id, 
																									                 	                (select a.denominacion from empresasurcusales a where a.id=Inventariomovimateriale.empresasurcusale_id) as deno_empresasurcusales,
																									                 	               Inventariomovimateriale.almacentipo_id, 
																									                 	                (select a.denominacion from almacentipos a where a.id=Inventariomovimateriale.almacentipo_id) as deno_almacentipos,
																									                 	               Inventariomovimateriale.almacene_id, 
																									                 	                (select a.nombre from almacenes a where a.id=Inventariomovimateriale.almacene_id) as deno_almacenes,
																									                 	               Inventariomovimateriale.almacenmateriale_id,
																									                 	                (select a.nombre from almacenmateriales a where a.id=Inventariomovimateriale.almacenmateriale_id) as deno_almacenmateriales,
																									                 	               (select SUM(a.cantidad) from Inventariomovimateriales a where a.activo=1 and (a.tipo=1) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS entrada,
																									                 	               (select SUM(a.cantidad) from Inventariomovimateriales a where a.activo=1 and (a.tipo=2) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS salida
																									                 	               '
																									                 	            ),
																									                 'group' => 'Inventariomovimateriale.empresa_id, deno_empresas, Inventariomovimateriale.empresasurcusale_id, deno_empresasurcusales, Inventariomovimateriale.almacentipo_id, deno_almacentipos, Inventariomovimateriale.almacene_id, deno_almacenes, Inventariomovimateriale.almacenmateriale_id, deno_almacenmateriales, entrada, salida'
																								            ));
									    if(isset($inventariomovimateriales[0][0]['entrada'])){
                                                 $cantidad = $inventariomovimateriales[0][0]['entrada'] - $inventariomovimateriales[0][0]['salida'];
                                        }else{
                                                 $cantidad = 0;
                                                 //pr($inventariomovimateriales);
                                        }
									    if($cantidad>=($almacenproductodetalle['Almacenproductodetalle']['cantidad']*$this->request->data['Inventariomovimiento']['cantidad'])){
										}else{
                                                $stop = 0;
										}
									}
									if($stop!=0){
					                                foreach($almacenproductodetalles as $almacenproductodetalle){
													    $this->request->data['Inventariomovimateriale']['empresa_id']              = $empresa_id;
													    $this->request->data['Inventariomovimateriale']['empresasurcusale_id']     = $empresasurcusale_id;
													    $this->request->data['Inventariomovimateriale']['almacentipo_id']          = $this->request->data['Inventariomovimiento']['almacentipo_id'];
													    $this->request->data['Inventariomovimateriale']['almacene_id']             = $this->request->data['Inventariomovimiento']['almacene_id'];
													    $this->request->data['Inventariomovimateriale']['almacenmateriale_id']     = $almacenproductodetalle['Almacenproductodetalle']['almacenmateriale_id'];
													    $this->request->data['Inventariomovimateriale']['tipo']                    = 2;
													    $this->request->data['Inventariomovimateriale']['cantidad']                = ($almacenproductodetalle['Almacenproductodetalle']['cantidad']*$this->request->data['Inventariomovimiento']['cantidad']);
													    $this->request->data['Inventariomovimateriale']['fechaalta']               = $this->request->data['Inventariomovimiento']['fechaalta'];
													    $this->request->data['Inventariomovimateriale']['usermovi_id']             = $user_id;
													    $this->request->data['Inventariomovimateriale']['inventariomovimiento_id'] = $id ;
													    $inventariomovimateriales = $this->Inventariomovimateriale->find('all', array(
																													            'conditions' => array('Inventariomovimateriale.almacenmateriale_id'=>$this->request->data['Inventariomovimateriale']['almacenmateriale_id'],     'Inventariomovimateriale.almacene_id'=>$this->request->data['Inventariomovimiento']['almacene_id'],    'Inventariomovimateriale.almacentipo_id'=>$this->request->data['Inventariomovimiento']['almacentipo_id'],       'Inventariomovimateriale.activo'=>1, 'Inventariomovimateriale.empresa_id'=>$empresa_id, 'Inventariomovimateriale.empresasurcusale_id'=>$empresasurcusale_id),
																													                 'fields'=>array( 'Inventariomovimateriale.empresa_id, 
																													                 	                (select a.razon_social from empresas a where a.id=Inventariomovimateriale.empresa_id) as deno_empresas, 
																													                 	               Inventariomovimateriale.empresasurcusale_id, 
																													                 	                (select a.denominacion from empresasurcusales a where a.id=Inventariomovimateriale.empresasurcusale_id) as deno_empresasurcusales,
																													                 	               Inventariomovimateriale.almacentipo_id, 
																													                 	                (select a.denominacion from almacentipos a where a.id=Inventariomovimateriale.almacentipo_id) as deno_almacentipos,
																													                 	               Inventariomovimateriale.almacene_id, 
																													                 	                (select a.nombre from almacenes a where a.id=Inventariomovimateriale.almacene_id) as deno_almacenes,
																													                 	               Inventariomovimateriale.almacenmateriale_id,
																													                 	                (select a.nombre from almacenmateriales a where a.id=Inventariomovimateriale.almacenmateriale_id) as deno_almacenmateriales,
																													                 	               (select SUM(a.cantidad) from Inventariomovimateriales a where a.activo=1 and (a.tipo=1) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS entrada,
																													                 	               (select SUM(a.cantidad) from Inventariomovimateriales a where a.activo=1 and (a.tipo=2) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS salida
																													                 	               '
																													                 	            ),
																													                 'group' => 'Inventariomovimateriale.empresa_id, deno_empresas, Inventariomovimateriale.empresasurcusale_id, deno_empresasurcusales, Inventariomovimateriale.almacentipo_id, deno_almacentipos, Inventariomovimateriale.almacene_id, deno_almacenes, Inventariomovimateriale.almacenmateriale_id, deno_almacenmateriales, entrada, salida'
																												            ));
													    if(isset($inventariomovimateriales[0][0]['entrada'])){
		                                                         $cantidad = $inventariomovimateriales[0][0]['entrada'] - $inventariomovimateriales[0][0]['salida'];
				                                        }else{
		                                                         $cantidad = 0;
		                                                         //pr($inventariomovimateriales);
				                                        }
													    if($cantidad>=($almacenproductodetalle['Almacenproductodetalle']['cantidad']*$this->request->data['Inventariomovimiento']['cantidad'])){
				                                                $this->Inventariomovimateriale->create();
																$this->Inventariomovimateriale->save($this->request->data);
														}else{
				                                                $stop = 0;
														}
													}
									}
                      	}else if($maquila==2 && $foraneo==1){
                      		            $this->request->data['Inventariomovimiento']['empresa_id']              = $empresa_id;
									    $this->request->data['Inventariomovimiento']['empresasurcusale_id']     = $empresasurcusale_id;
									    $this->request->data['Inventariomovimiento']['almacentipo_id']          = $almacenes[0]['Almacene']['almacentipo_id'];
									    $this->request->data['Inventariomovimiento']['almacene_id']             = $almacenes[0]['Almacene']['id'];
									    $this->request->data['Inventariomovimiento']['almacenproducto_id']      = $this->request->data['Inventariomovimiento']['almacenproducto_id'];
									    $this->request->data['Inventariomovimiento']['tipo']                    = 2;
									    $this->request->data['Inventariomovimiento']['cantidad']                = $this->request->data['Inventariomovimiento']['cantidad'];
									    $this->request->data['Inventariomovimiento']['fechaalta']               = $this->request->data['Inventariomovimiento']['fechaalta'];
									    $this->request->data['Inventariomovimiento']['almacentipofunte_id']     = $this->request->data['Inventariomovimiento']['almacentipofunte_id'];
									    $this->request->data['Inventariomovimiento']['almacenefunte_id']        = $this->request->data['Inventariomovimiento']['almacenefunte_id'];
									    $this->request->data['Inventariomovimiento']['referencia']              = $this->request->data['Inventariomovimiento']['referencia'];
									    $this->request->data['Inventariomovimiento']['ordenventa_id']           = 0;
									    $this->request->data['Inventariomovimiento']['userventa_id']            = 0;
									    $this->Inventariomovimiento->create();
										$this->Inventariomovimiento->save($this->request->data);
										$id2  =  $this->Inventariomovimiento->id;
										$almacenmarca_id      = $almacenproductos[0]['Almacenproducto']['almacenmarca_id'];
										$almacenmarcadetalles = $this->Almacenmarcadetalle->find('all', array('conditions'=>array('almacenmarca_id'=>$almacenmarca_id, 'default'=>1)));
										foreach($almacenmarcadetalles as $datos){
                                                $this->request->data['Inventariomovimateriale']['empresa_id']              = $empresa_id;
											    $this->request->data['Inventariomovimateriale']['empresasurcusale_id']     = $empresasurcusale_id;
											    $this->request->data['Inventariomovimateriale']['almacentipo_id']          = $this->request->data['Inventariomovimiento']['almacentipo_id'];
											    $this->request->data['Inventariomovimateriale']['almacene_id']             = $this->request->data['Inventariomovimiento']['almacene_id'];
											    $this->request->data['Inventariomovimateriale']['almacenmateriale_id']     = $datos['Almacenmarcadetalle']['almacenmateriale_id'];
											    $this->request->data['Inventariomovimateriale']['tipo']                    = 2;
											    $this->request->data['Inventariomovimateriale']['cantidad']                = ($datos['Almacenmarcadetalle']['cantidad']*$this->request->data['Inventariomovimiento']['cantidad']);
											    $this->request->data['Inventariomovimateriale']['fechaalta']               = $this->request->data['Inventariomovimiento']['fechaalta'];
											    $this->request->data['Inventariomovimateriale']['usermovi_id']             = $user_id;
											    $this->request->data['Inventariomovimateriale']['inventariomovimiento_id'] = $id ;
												$inventariomovimateriales = $this->Inventariomovimateriale->find('all', array(
																										            'conditions' => array('Inventariomovimateriale.almacenmateriale_id'=>$datos['Almacenmarcadetalle']['almacenmateriale_id'],     'Inventariomovimateriale.almacene_id'=>$this->request->data['Inventariomovimiento']['almacene_id'],    'Inventariomovimateriale.almacentipo_id'=>$this->request->data['Inventariomovimiento']['almacentipo_id'],       'Inventariomovimateriale.activo'=>1, 'Inventariomovimateriale.empresa_id'=>$empresa_id, 'Inventariomovimateriale.empresasurcusale_id'=>$empresasurcusale_id),
																										                 'fields'=>array( 'Inventariomovimateriale.empresa_id, 
																										                 	                (select a.razon_social from empresas a where a.id=Inventariomovimateriale.empresa_id) as deno_empresas, 
																										                 	               Inventariomovimateriale.empresasurcusale_id, 
																										                 	                (select a.denominacion from empresasurcusales a where a.id=Inventariomovimateriale.empresasurcusale_id) as deno_empresasurcusales,
																										                 	               Inventariomovimateriale.almacentipo_id, 
																										                 	                (select a.denominacion from almacentipos a where a.id=Inventariomovimateriale.almacentipo_id) as deno_almacentipos,
																										                 	               Inventariomovimateriale.almacene_id, 
																										                 	                (select a.nombre from almacenes a where a.id=Inventariomovimateriale.almacene_id) as deno_almacenes,
																										                 	               Inventariomovimateriale.almacenmateriale_id,
																										                 	                (select a.nombre from almacenmateriales a where a.id=Inventariomovimateriale.almacenmateriale_id) as deno_almacenmateriales,
																										                 	               (select SUM(a.cantidad) from Inventariomovimateriales a where a.activo=1 and (a.tipo=1) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS entrada,
																										                 	               (select SUM(a.cantidad) from Inventariomovimateriales a where a.activo=1 and (a.tipo=2) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS salida
																										                 	               '
																										                 	            ),
																										                 'group' => 'Inventariomovimateriale.empresa_id, deno_empresas, Inventariomovimateriale.empresasurcusale_id, deno_empresasurcusales, Inventariomovimateriale.almacentipo_id, deno_almacentipos, Inventariomovimateriale.almacene_id, deno_almacenes, Inventariomovimateriale.almacenmateriale_id, deno_almacenmateriales, entrada, salida'
																									            ));
		                                        if(isset($inventariomovimateriales[0][0]['entrada'])){
		                                                         $cantidad = $inventariomovimateriales[0][0]['entrada'] - $inventariomovimateriales[0][0]['salida'];
				                                        }else{
		                                                         $cantidad = 0;
		                                                         //pr($inventariomovimateriales);
				                                        }
												if($cantidad>=($datos['Almacenmarcadetalle']['cantidad']*$this->request->data['Inventariomovimiento']['cantidad'])){
		                                                //$this->Inventariomovimateriale->create();
														//$this->Inventariomovimateriale->save($this->request->data);
												}else{
		                                                $stop = 0;
												}
										}
                                        if($stop!=0){
													foreach($almacenmarcadetalles as $datos){
			                                            $this->request->data['Inventariomovimateriale']['empresa_id']              = $empresa_id;
													    $this->request->data['Inventariomovimateriale']['empresasurcusale_id']     = $empresasurcusale_id;
													    $this->request->data['Inventariomovimateriale']['almacentipo_id']          = $this->request->data['Inventariomovimiento']['almacentipo_id'];
													    $this->request->data['Inventariomovimateriale']['almacene_id']             = $this->request->data['Inventariomovimiento']['almacene_id'];
													    $this->request->data['Inventariomovimateriale']['almacenmateriale_id']     = $datos['Almacenmarcadetalle']['almacenmateriale_id'];
													    $this->request->data['Inventariomovimateriale']['tipo']                    = 2;
													    $this->request->data['Inventariomovimateriale']['cantidad']                = ($datos['Almacenmarcadetalle']['cantidad']*$this->request->data['Inventariomovimiento']['cantidad']);
													    $this->request->data['Inventariomovimateriale']['fechaalta']               = $this->request->data['Inventariomovimiento']['fechaalta'];
													    $this->request->data['Inventariomovimateriale']['usermovi_id']             = $user_id;
													    $this->request->data['Inventariomovimateriale']['inventariomovimiento_id'] = $id ;
													    $inventariomovimateriales = $this->Inventariomovimateriale->find('all', array(
																													            'conditions' => array('Inventariomovimateriale.almacenmateriale_id'=>$datos['Almacenmarcadetalle']['almacenmateriale_id'],     'Inventariomovimateriale.almacene_id'=>$this->request->data['Inventariomovimiento']['almacene_id'],    'Inventariomovimateriale.almacentipo_id'=>$this->request->data['Inventariomovimiento']['almacentipo_id'],       'Inventariomovimateriale.activo'=>1, 'Inventariomovimateriale.empresa_id'=>$empresa_id, 'Inventariomovimateriale.empresasurcusale_id'=>$empresasurcusale_id),
																													                 'fields'=>array( 'Inventariomovimateriale.empresa_id, 
																													                 	                (select a.razon_social from empresas a where a.id=Inventariomovimateriale.empresa_id) as deno_empresas, 
																													                 	               Inventariomovimateriale.empresasurcusale_id, 
																													                 	                (select a.denominacion from empresasurcusales a where a.id=Inventariomovimateriale.empresasurcusale_id) as deno_empresasurcusales,
																													                 	               Inventariomovimateriale.almacentipo_id, 
																													                 	                (select a.denominacion from almacentipos a where a.id=Inventariomovimateriale.almacentipo_id) as deno_almacentipos,
																													                 	               Inventariomovimateriale.almacene_id, 
																													                 	                (select a.nombre from almacenes a where a.id=Inventariomovimateriale.almacene_id) as deno_almacenes,
																													                 	               Inventariomovimateriale.almacenmateriale_id,
																													                 	                (select a.nombre from almacenmateriales a where a.id=Inventariomovimateriale.almacenmateriale_id) as deno_almacenmateriales,
																													                 	               (select SUM(a.cantidad) from Inventariomovimateriales a where a.activo=1 and (a.tipo=1) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS entrada,
																													                 	               (select SUM(a.cantidad) from Inventariomovimateriales a where a.activo=1 and (a.tipo=2) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS salida
																													                 	               '
																													                 	            ),
																													                 'group' => 'Inventariomovimateriale.empresa_id, deno_empresas, Inventariomovimateriale.empresasurcusale_id, deno_empresasurcusales, Inventariomovimateriale.almacentipo_id, deno_almacentipos, Inventariomovimateriale.almacene_id, deno_almacenes, Inventariomovimateriale.almacenmateriale_id, deno_almacenmateriales, entrada, salida'
																												            ));
					                                        if(isset($inventariomovimateriales[0][0]['entrada'])){
			                                                         $cantidad = $inventariomovimateriales[0][0]['entrada'] - $inventariomovimateriales[0][0]['salida'];
					                                        }else{
			                                                         $cantidad = 0;
			                                                         //pr($inventariomovimateriales);
					                                        }
															if($cantidad>=($datos['Almacenmarcadetalle']['cantidad']*$this->request->data['Inventariomovimiento']['cantidad'])){
					                                                $this->Inventariomovimateriale->create();
																	$this->Inventariomovimateriale->save($this->request->data);
															}else{
					                                                $stop = 0;
															}
													}
										}//FIN IF
                      	}else if($maquila==2 && $foraneo==2){
                                         $almacene = $this->Almacene->find('all', array('conditions'=>array('Almacene.empresa_id'=>$empresa_id, 'Almacene.empresasurcusale_id'=>$empresasurcusale_id, 'Almacene.foraneo'=>2, 'Almacene.maquila'=>1)));
			                      		 $this->request->data['Inventariomovimiento']['empresa_id']              = $empresa_id;
									     $this->request->data['Inventariomovimiento']['empresasurcusale_id']     = $empresasurcusale_id;
									     $this->request->data['Inventariomovimiento']['almacentipo_id']          = $almacene[0]['Almacene']['almacentipo_id'];
									     $this->request->data['Inventariomovimiento']['almacene_id']             = $almacene[0]['Almacene']['id'];
									     $this->request->data['Inventariomovimiento']['almacenproducto_id']      = $this->request->data['Inventariomovimiento']['almacenproducto_id'];
									     $this->request->data['Inventariomovimiento']['tipo']                    = 2;
									     $this->request->data['Inventariomovimiento']['cantidad']                = $this->request->data['Inventariomovimiento']['cantidad'];
									     $this->request->data['Inventariomovimiento']['fechaalta']               = $this->request->data['Inventariomovimiento']['fechaalta'];
									     $this->request->data['Inventariomovimiento']['almacentipofunte_id']     = $this->request->data['Inventariomovimiento']['almacentipofunte_id'];
									     $this->request->data['Inventariomovimiento']['almacenefunte_id']        = $this->request->data['Inventariomovimiento']['almacenefunte_id'];
									     $this->request->data['Inventariomovimiento']['referencia']              = $this->request->data['Inventariomovimiento']['referencia'];
									     $this->request->data['Inventariomovimiento']['ordenventa_id']           = 0;
									     $this->request->data['Inventariomovimiento']['userventa_id']            = 0;
									     $this->Inventariomovimiento->create();
										 $this->Inventariomovimiento->save($this->request->data);
                      	}
                }else if($this->request->data['Inventariomovimiento']['tipo']==2){//SALIDA
                			  if($maquila==1 && $foraneo==2){//ADMINISTRADOR

                      	}else if($maquila==2 && $foraneo==1){//ADMINISTRADOR

                      	}else if($maquila==2 && $foraneo==2){//ADMINISTRADOR

                      	}
                      	$inventariomovimientos = $this->Inventariomovimiento->find('all', array(
																					            'conditions' => array('Inventariomovimiento.almacene_id'=>$this->request->data['Inventariomovimiento']['almacene_id'], 'Inventariomovimiento.almacentipo_id'=>$this->request->data['Inventariomovimiento']['almacentipo_id'], 'Inventariomovimiento.activo'=>1, 'Inventariomovimiento.empresa_id'=>$empresa_id, 'Inventariomovimiento.empresasurcusale_id'=>$empresasurcusale_id),
																					                 'fields'=>array( 'Inventariomovimiento.empresa_id, 
																					                 	                (select a.razon_social from empresas a where a.id=Inventariomovimiento.empresa_id) as deno_empresas, 
																					                 	               Inventariomovimiento.empresasurcusale_id, 
																					                 	                (select a.denominacion from empresasurcusales a where a.id=Inventariomovimiento.empresasurcusale_id) as deno_empresasurcusales,
																					                 	               Inventariomovimiento.almacentipo_id, 
																					                 	                (select a.denominacion from almacentipos a where a.id=Inventariomovimiento.almacentipo_id) as deno_almacentipos,
																					                 	               Inventariomovimiento.almacene_id, 
																					                 	                (select a.nombre from almacenes a where a.id=Inventariomovimiento.almacene_id) as deno_almacenes,
																					                 	               Inventariomovimiento.almacenproducto_id,
																					                 	                (select a.nombre from almacenproductos a where a.id=Inventariomovimiento.almacenproducto_id) as deno_almacenproductos,
																					                 	               (select SUM(a.cantidad) from Inventariomovimientos a where a.activo=1 and (a.tipo=1 or a.tipo_transferencia=1) and a.empresa_id=Inventariomovimiento.empresa_id and a.empresasurcusale_id=Inventariomovimiento.empresasurcusale_id  and a.almacentipo_id=Inventariomovimiento.almacentipo_id  and a.almacene_id=Inventariomovimiento.almacene_id and a.almacenproducto_id=Inventariomovimiento.almacenproducto_id) AS entrada,
																					                 	               (select SUM(a.cantidad) from Inventariomovimientos a where a.activo=1 and (a.tipo=2 or a.tipo_transferencia=2) and a.empresa_id=Inventariomovimiento.empresa_id and a.empresasurcusale_id=Inventariomovimiento.empresasurcusale_id  and a.almacentipo_id=Inventariomovimiento.almacentipo_id  and a.almacene_id=Inventariomovimiento.almacene_id and a.almacenproducto_id=Inventariomovimiento.almacenproducto_id) AS salida
																					                 	               '
																					                 	            ),
																					                 'group' => 'Inventariomovimiento.empresa_id, deno_empresas, Inventariomovimiento.empresasurcusale_id, deno_empresasurcusales, Inventariomovimiento.almacentipo_id, deno_almacentipos, Inventariomovimiento.almacene_id, deno_almacenes, Inventariomovimiento.almacenproducto_id, deno_almacenproductos, entrada, salida'
																					            ));
                        if(isset($inventariomovimientos[0][0]['entrada'])){
                                 $cantidad = $inventariomovimientos[0][0]['entrada'] - $inventariomovimientos[0][0]['salida'];
                        }else{
                                 $cantidad = 0;
                        }
						if($cantidad>=$this->request->data['Inventariomovimiento']['cantidad']){
						}else{
                                $stop = 0;
						}
                }else if($this->request->data['Inventariomovimiento']['tipo']==3){//TRANSFERENCIA
                	     $this->request->data['Inventariomovimiento']['empresa_id']              = $empresa_id;
					     $this->request->data['Inventariomovimiento']['empresasurcusale_id']     = $empresasurcusale_id;
					     $this->request->data['Inventariomovimiento']['almacentipo_id']          = $this->request->data['Inventariomovimiento']['almacentipofunte_id'];
					     $this->request->data['Inventariomovimiento']['almacene_id']             = $this->request->data['Inventariomovimiento']['almacenefunte_id'];
					     $this->request->data['Inventariomovimiento']['almacenproducto_id']      = $this->request->data['Inventariomovimiento']['almacenproducto_id'];
					     $this->request->data['Inventariomovimiento']['tipo']                    = 3;
					     $this->request->data['Inventariomovimiento']['cantidad']                = $this->request->data['Inventariomovimiento']['cantidad'];
					     $this->request->data['Inventariomovimiento']['fechaalta']               = $this->request->data['Inventariomovimiento']['fechaalta'];
					     $this->request->data['Inventariomovimiento']['almacentipofunte_id']     = 0;
					     $this->request->data['Inventariomovimiento']['almacenefunte_id']        = 0;
					     $this->request->data['Inventariomovimiento']['referencia']              = $this->request->data['Inventariomovimiento']['referencia'];
					     $this->request->data['Inventariomovimiento']['ordenventa_id']           = 0;
					     $this->request->data['Inventariomovimiento']['userventa_id']            = 0;
					     if($this->request->data['Inventariomovimiento']['tipo']==3){
				            $this->request->data['Inventariomovimiento']['tipo_transferencia']=1;
						 }
					     
						 $inventariomovimientos = $this->Inventariomovimiento->find('all', array(
																					            'conditions' => array('Inventariomovimiento.almacene_id'=>$this->request->data['Inventariomovimiento']['almacene_id'], 'Inventariomovimiento.almacentipo_id'=>$this->request->data['Inventariomovimiento']['almacentipo_id'], 'Inventariomovimiento.activo'=>1, 'Inventariomovimiento.empresa_id'=>$empresa_id, 'Inventariomovimiento.empresasurcusale_id'=>$empresasurcusale_id),
																					                 'fields'=>array( 'Inventariomovimiento.empresa_id, 
																					                 	                (select a.razon_social from empresas a where a.id=Inventariomovimiento.empresa_id) as deno_empresas, 
																					                 	               Inventariomovimiento.empresasurcusale_id, 
																					                 	                (select a.denominacion from empresasurcusales a where a.id=Inventariomovimiento.empresasurcusale_id) as deno_empresasurcusales,
																					                 	               Inventariomovimiento.almacentipo_id, 
																					                 	                (select a.denominacion from almacentipos a where a.id=Inventariomovimiento.almacentipo_id) as deno_almacentipos,
																					                 	               Inventariomovimiento.almacene_id, 
																					                 	                (select a.nombre from almacenes a where a.id=Inventariomovimiento.almacene_id) as deno_almacenes,
																					                 	               Inventariomovimiento.almacenproducto_id,
																					                 	                (select a.nombre from almacenproductos a where a.id=Inventariomovimiento.almacenproducto_id) as deno_almacenproductos,
																					                 	               (select SUM(a.cantidad) from Inventariomovimientos a where a.activo=1 and (a.tipo=1 or a.tipo_transferencia=1) and a.empresa_id=Inventariomovimiento.empresa_id and a.empresasurcusale_id=Inventariomovimiento.empresasurcusale_id  and a.almacentipo_id=Inventariomovimiento.almacentipo_id  and a.almacene_id=Inventariomovimiento.almacene_id and a.almacenproducto_id=Inventariomovimiento.almacenproducto_id) AS entrada,
																					                 	               (select SUM(a.cantidad) from Inventariomovimientos a where a.activo=1 and (a.tipo=2 or a.tipo_transferencia=2) and a.empresa_id=Inventariomovimiento.empresa_id and a.empresasurcusale_id=Inventariomovimiento.empresasurcusale_id  and a.almacentipo_id=Inventariomovimiento.almacentipo_id  and a.almacene_id=Inventariomovimiento.almacene_id and a.almacenproducto_id=Inventariomovimiento.almacenproducto_id) AS salida
																					                 	               '
																					                 	            ),
																					                 'group' => 'Inventariomovimiento.empresa_id, deno_empresas, Inventariomovimiento.empresasurcusale_id, deno_empresasurcusales, Inventariomovimiento.almacentipo_id, deno_almacentipos, Inventariomovimiento.almacene_id, deno_almacenes, Inventariomovimiento.almacenproducto_id, deno_almacenproductos, entrada, salida'
																					            ));
                        if(isset($inventariomovimientos[0][0]['entrada'])){
                                 $cantidad = $inventariomovimientos[0][0]['entrada'] - $inventariomovimientos[0][0]['salida'];
                        }else{
                                 $cantidad = 0;
                        }
						if($cantidad>=$this->request->data['Inventariomovimiento']['cantidad']){
							$this->Inventariomovimiento->create();
						 	$this->Inventariomovimiento->save($this->request->data);
						}else{
                                $stop = 0;
                                $producto = 1;
						}
                }
                ////////////////////REVERSAR ANTERIOR//////////////////////
                if($stop==1){
                unset($data['Inventariomovimiento']['id']);
                $this->request->data = $data;
               // $this->Inventariomovimiento->create();
                //if ($this->Inventariomovimiento->save($this->request->data)) {
	                      $almacenes = $this->Inventariomovimiento->Almacene->find('all', array('conditions'=>array('Almacene.almacentipo_id'=>$this->request->data['Inventariomovimiento']['almacentipo_id'], 'Almacene.id'=>$this->request->data['Inventariomovimiento']['almacene_id'])));
	                      $maquila   = $almacenes[0]['Almacene']['maquila'];
	                      $foraneo   = $almacenes[0]['Almacene']['foraneo'];
	                      $id        = $this->Inventariomovimiento->id;
	                      $almacenproductodetalles = $this->Almacenproductodetalle->find('all', array('conditions'=>array('almacenproducto_id'=>$this->request->data['Inventariomovimiento']['almacenproducto_id'])));
	                      $almacenproductos        = $this->Almacenproducto->find('all', array('conditions'=>array('Almacenproducto.id'=>$this->request->data['Inventariomovimiento']['almacenproducto_id'])));
	                      if($this->request->data['Inventariomovimiento']['tipo']==1){//ENTRADA
	                      	      if($maquila==1 && $foraneo==2){
			                                foreach($almacenproductodetalles as $almacenproductodetalle){
											    $this->request->data['Inventariomovimateriale']['empresa_id']              = $empresa_id;
											    $this->request->data['Inventariomovimateriale']['empresasurcusale_id']     = $empresasurcusale_id;
											    $this->request->data['Inventariomovimateriale']['almacentipo_id']          = $this->request->data['Inventariomovimiento']['almacentipo_id'];
											    $this->request->data['Inventariomovimateriale']['almacene_id']             = $this->request->data['Inventariomovimiento']['almacene_id'];
											    $this->request->data['Inventariomovimateriale']['almacenmateriale_id']     = $almacenproductodetalle['Almacenproductodetalle']['almacenmateriale_id'];
											    $this->request->data['Inventariomovimateriale']['tipo']                    = 1;
											    $this->request->data['Inventariomovimateriale']['cantidad']                = ($almacenproductodetalle['Almacenproductodetalle']['cantidad']*$this->request->data['Inventariomovimiento']['cantidad']);
											    $this->request->data['Inventariomovimateriale']['fechaalta']               = $this->request->data['Inventariomovimiento']['fechaalta'];
											    $this->request->data['Inventariomovimateriale']['usermovi_id']             = $user_id;
											    $this->request->data['Inventariomovimateriale']['inventariomovimiento_id'] = $id ;
											    $this->Inventariomovimateriale->create();
												$this->Inventariomovimateriale->save($this->request->data);
											}
	                      	}else if($maquila==2 && $foraneo==1){
	                      		            $this->request->data['Inventariomovimiento']['empresa_id']              = $empresa_id;
										    $this->request->data['Inventariomovimiento']['empresasurcusale_id']     = $empresasurcusale_id;
										    $this->request->data['Inventariomovimiento']['almacentipo_id']          = $almacenes[0]['Almacene']['almacentipo_id'];
										    $this->request->data['Inventariomovimiento']['almacene_id']             = $almacenes[0]['Almacene']['id'];
										    $this->request->data['Inventariomovimiento']['almacenproducto_id']      = $this->request->data['Inventariomovimiento']['almacenproducto_id'];
										    $this->request->data['Inventariomovimiento']['tipo']                    = 1;
										    $this->request->data['Inventariomovimiento']['cantidad']                = $this->request->data['Inventariomovimiento']['cantidad'];
										    $this->request->data['Inventariomovimiento']['fechaalta']               = $this->request->data['Inventariomovimiento']['fechaalta'];
										    $this->request->data['Inventariomovimiento']['almacentipofunte_id']     = $this->request->data['Inventariomovimiento']['almacentipofunte_id'];
										    $this->request->data['Inventariomovimiento']['almacenefunte_id']        = $this->request->data['Inventariomovimiento']['almacenefunte_id'];
										    $this->request->data['Inventariomovimiento']['referencia']              = $this->request->data['Inventariomovimiento']['referencia'];
										    $this->request->data['Inventariomovimiento']['ordenventa_id']           = 0;
										    $this->request->data['Inventariomovimiento']['userventa_id']            = 0;
										    $this->Inventariomovimiento->create();
											$this->Inventariomovimiento->save($this->request->data);
											$almacenmarca_id      = $almacenproductos[0]['Almacenproducto']['almacenmarca_id'];
											$almacenmarcadetalles = $this->Almacenmarcadetalle->find('all', array('conditions'=>array('almacenmarca_id'=>$almacenmarca_id, 'default'=>1)));
											foreach($almacenmarcadetalles as $datos){
	                                            $this->request->data['Inventariomovimateriale']['empresa_id']              = $empresa_id;
											    $this->request->data['Inventariomovimateriale']['empresasurcusale_id']     = $empresasurcusale_id;
											    $this->request->data['Inventariomovimateriale']['almacentipo_id']          = $this->request->data['Inventariomovimiento']['almacentipo_id'];
											    $this->request->data['Inventariomovimateriale']['almacene_id']             = $this->request->data['Inventariomovimiento']['almacene_id'];
											    $this->request->data['Inventariomovimateriale']['almacenmateriale_id']     = $datos['Almacenmarcadetalle']['almacenmateriale_id'];
											    $this->request->data['Inventariomovimateriale']['tipo']                    = 1;
											    $this->request->data['Inventariomovimateriale']['cantidad']                = ($datos['Almacenmarcadetalle']['cantidad'] * $this->request->data['Inventariomovimiento']['cantidad']);
											    $this->request->data['Inventariomovimateriale']['fechaalta']               = $this->request->data['Inventariomovimiento']['fechaalta'];
											    $this->request->data['Inventariomovimateriale']['usermovi_id']             = $user_id;
											    $this->request->data['Inventariomovimateriale']['inventariomovimiento_id'] = $id ;
											    $this->Inventariomovimateriale->create();
												$this->Inventariomovimateriale->save($this->request->data);
											}
	                      	}else if($maquila==2 && $foraneo==2){
	                                         $almacene = $this->Almacene->find('all', array('conditions'=>array('Almacene.empresa_id'=>$empresa_id, 'Almacene.empresasurcusale_id'=>$empresasurcusale_id, 'Almacene.foraneo'=>2, 'Almacene.maquila'=>1)));
				                      		 $this->request->data['Inventariomovimiento']['empresa_id']              = $empresa_id;
										     $this->request->data['Inventariomovimiento']['empresasurcusale_id']     = $empresasurcusale_id;
										     $this->request->data['Inventariomovimiento']['almacentipo_id']          = $almacene[0]['Almacene']['almacentipo_id'];
										     $this->request->data['Inventariomovimiento']['almacene_id']             = $almacene[0]['Almacene']['id'];
										     $this->request->data['Inventariomovimiento']['almacenproducto_id']      = $this->request->data['Inventariomovimiento']['almacenproducto_id'];
										     $this->request->data['Inventariomovimiento']['tipo']                    = 1;
										     $this->request->data['Inventariomovimiento']['cantidad']                = $this->request->data['Inventariomovimiento']['cantidad'];
										     $this->request->data['Inventariomovimiento']['fechaalta']               = $this->request->data['Inventariomovimiento']['fechaalta'];
										     $this->request->data['Inventariomovimiento']['almacentipofunte_id']     = $this->request->data['Inventariomovimiento']['almacentipofunte_id'];
										     $this->request->data['Inventariomovimiento']['almacenefunte_id']        = $this->request->data['Inventariomovimiento']['almacenefunte_id'];
										     $this->request->data['Inventariomovimiento']['referencia']              = $this->request->data['Inventariomovimiento']['referencia'];
										     $this->request->data['Inventariomovimiento']['ordenventa_id']           = 0;
										     $this->request->data['Inventariomovimiento']['userventa_id']            = 0;
										     $this->Inventariomovimiento->create();
											 $this->Inventariomovimiento->save($this->request->data);
	                      	}
	                }else if($this->request->data['Inventariomovimiento']['tipo']==2){//SALIDA
	                			  if($maquila==1 && $foraneo==2){//ADMINISTRADOR

	                      	}else if($maquila==2 && $foraneo==1){//ADMINISTRADOR

	                      	}else if($maquila==2 && $foraneo==2){//ADMINISTRADOR

	                      	}
	                }else if($this->request->data['Inventariomovimiento']['tipo']==3){//TRANSFERENCIA
	                	     $this->request->data['Inventariomovimiento']['empresa_id']              = $empresa_id;
						     $this->request->data['Inventariomovimiento']['empresasurcusale_id']     = $empresasurcusale_id;
						     $this->request->data['Inventariomovimiento']['almacentipo_id']          = $this->request->data['Inventariomovimiento']['almacentipofunte_id'];
						     $this->request->data['Inventariomovimiento']['almacene_id']             = $this->request->data['Inventariomovimiento']['almacenefunte_id'];
						     $this->request->data['Inventariomovimiento']['almacenproducto_id']      = $this->request->data['Inventariomovimiento']['almacenproducto_id'];
						     $this->request->data['Inventariomovimiento']['tipo']                    = 3;
						     $this->request->data['Inventariomovimiento']['cantidad']                = $this->request->data['Inventariomovimiento']['cantidad'];
						     $this->request->data['Inventariomovimiento']['fechaalta']               = $this->request->data['Inventariomovimiento']['fechaalta'];
						     $this->request->data['Inventariomovimiento']['almacentipofunte_id']     = 0;
						     $this->request->data['Inventariomovimiento']['almacenefunte_id']        = 0;
						     $this->request->data['Inventariomovimiento']['referencia']              = $this->request->data['Inventariomovimiento']['referencia'];
						     $this->request->data['Inventariomovimiento']['ordenventa_id']           = 0;
						     $this->request->data['Inventariomovimiento']['userventa_id']            = 0;
						     if($this->request->data['Inventariomovimiento']['tipo']==3){
				                $this->request->data['Inventariomovimiento']['tipo_transferencia']=2;
							 }
						     $this->Inventariomovimiento->create();
							 $this->Inventariomovimiento->save($this->request->data);
	                }
	            //}//fin if
							$this->Flash->success(__('Registro Guardado.'));
							return $this->redirect(array('action' => 'index'));
				}else{
                            //$this->Inventariomovimiento->delete($id);
                            //$this->Inventariomovimiento->delete($id2);
                            if(isset($id2)){$this->Inventariomovimiento->delete($id2);}
                            $this->Inventariomovimiento->Rollback();
                            if($producto==1){
                            	$this->Flash->error(__('Registro no Guardado. Por favor, verificar disponibilidad de productos.'));
                            }else{
                            	$this->Flash->error(__('Registro no Guardado. Por favor, verificar disponibilidad de materiales.'));
                            }
                            return $this->redirect(array('action' => 'index'));
                }
			} else {
				$this->Flash->error(__('Registro no Guardado. Por favor, inténtelo de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('Inventariomovimiento.' . $this->Inventariomovimiento->primaryKey => $id));
			$this->request->data = $this->Inventariomovimiento->find('first', $options);
		}
		$empresas = $this->Inventariomovimiento->Empresa->find('list', array('conditions'=>array('id'=>$empresa_id) ));
		       if($empresa_id==0 && $empresasurcusale_id==0){ 
            	$empresasurcusales = $this->Inventariomovimiento->Empresasurcusale->find('list');
     	 }else if($empresa_id!=0 && $empresasurcusale_id==0){
                $empresasurcusales = $this->Inventariomovimiento->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id)));
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0){
                $empresasurcusales = $this->Inventariomovimiento->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id,'Empresasurcusale.id'=>$empresasurcusale_id)));
      	}
		$almacentipos = $this->Inventariomovimiento->Almacentipo->find('list', array('conditions'=>array('empresa_id'=>$empresa_id, 'activo'=>1) ));
		$almacenes    = $this->Inventariomovimiento->Almacene->find('list', array('conditions'=>array('almacentipo_id'=>$this->request->data['Inventariomovimiento']['almacentipo_id'])));
		$almacenproductos  = $this->Inventariomovimiento->Almacenproducto->find('list', array('conditions'=>array('empresa_id'=>$empresa_id, 'activo'=>1) ));
		$almacentipofuntes = $this->Inventariomovimiento->Almacentipofunte->find('list', array('conditions'=>array('empresa_id'=>$empresa_id, 'activo'=>1) ));
		$almacenefuntes    = $this->Inventariomovimiento->Almacenefunte->find('list', array('conditions'=>array('id'=>$this->request->data['Inventariomovimiento']['almacenefunte_id'])));
		//pr($almacenefuntes );
		$ordenventas = array();
		$userventas  = array();
		$this->set(compact('empresas', 'empresasurcusales', 'almacentipos', 'almacenes', 'almacenproductos', 'almacentipofuntes', 'almacenefuntes', 'ordenventas', 'userventas'));
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
		    $options = array('conditions' => array('Inventariomovimiento.' . $this->Inventariomovimiento->primaryKey => $id));
		    $this->request->data = $this->Inventariomovimiento->find('first', $options);
            $this->request->data['Inventariomovimiento']['id']     = $id;
		    $this->request->data['Inventariomovimiento']['activo'] = 2;
		          if($this->request->data['Inventariomovimiento']['tipo']==3){
              		 $this->request->data['Inventariomovimiento']['tipo_transferencia']=1;
			}else if($this->request->data['Inventariomovimiento']['tipo']==2){
           			 $this->request->data['Inventariomovimiento']['tipo_transferencia']=1;
			}else if($this->request->data['Inventariomovimiento']['tipo']==1){
               		 $this->request->data['Inventariomovimiento']['tipo_transferencia']=2;
			}
			if ($this->Inventariomovimiento->save($this->request->data)) {
				      unset($this->request->data['Inventariomovimiento']['id']);
				      unset($this->request->data['Inventariomovimiento']['activo']);
				      $this->request->data['Inventariomovimiento']['activo'] = 1;
                      $almacenes = $this->Inventariomovimiento->Almacene->find('all', array('conditions'=>array('Almacene.almacentipo_id'=>$this->request->data['Inventariomovimiento']['almacentipo_id'], 'Almacene.id'=>$this->request->data['Inventariomovimiento']['almacene_id'])));
                      $maquila   = $almacenes[0]['Almacene']['maquila'];
                      $foraneo   = $almacenes[0]['Almacene']['foraneo'];
                      $id        =  $this->Inventariomovimiento->id;
                      $almacenproductodetalles = $this->Almacenproductodetalle->find('all', array('conditions'=>array('almacenproducto_id'=>$this->request->data['Inventariomovimiento']['almacenproducto_id'])));
                      $almacenproductos        = $this->Almacenproducto->find('all', array('conditions'=>array('Almacenproducto.id'=>$this->request->data['Inventariomovimiento']['almacenproducto_id'])));
                      if($this->request->data['Inventariomovimiento']['tipo']==1){//ENTRADA
                      	      if($maquila==1 && $foraneo==2){
	                                foreach($almacenproductodetalles as $almacenproductodetalle){
									    $this->request->data['Inventariomovimateriale']['empresa_id']              = $empresa_id;
									    $this->request->data['Inventariomovimateriale']['empresasurcusale_id']     = $empresasurcusale_id;
									    $this->request->data['Inventariomovimateriale']['almacentipo_id']          = $this->request->data['Inventariomovimiento']['almacentipo_id'];
									    $this->request->data['Inventariomovimateriale']['almacene_id']             = $this->request->data['Inventariomovimiento']['almacene_id'];
									    $this->request->data['Inventariomovimateriale']['almacenmateriale_id']     = $almacenproductodetalle['Almacenproductodetalle']['almacenmateriale_id'];
									    $this->request->data['Inventariomovimateriale']['tipo']                    = 1;
									    $this->request->data['Inventariomovimateriale']['cantidad']                = ($almacenproductodetalle['Almacenproductodetalle']['cantidad']*$this->request->data['Inventariomovimiento']['cantidad']);
									    $this->request->data['Inventariomovimateriale']['fechaalta']               = $this->request->data['Inventariomovimiento']['fechaalta'];
									    $this->request->data['Inventariomovimateriale']['usermovi_id']             = $user_id;
									    $this->request->data['Inventariomovimateriale']['inventariomovimiento_id'] = $id ;
									    $this->Inventariomovimateriale->create();
										$this->Inventariomovimateriale->save($this->request->data);
									}
                      	}else if($maquila==2 && $foraneo==1){
                      		            $this->request->data['Inventariomovimiento']['empresa_id']              = $empresa_id;
									    $this->request->data['Inventariomovimiento']['empresasurcusale_id']     = $empresasurcusale_id;
									    $this->request->data['Inventariomovimiento']['almacentipo_id']          = $almacenes[0]['Almacene']['almacentipo_id'];
									    $this->request->data['Inventariomovimiento']['almacene_id']             = $almacenes[0]['Almacene']['id'];
									    $this->request->data['Inventariomovimiento']['almacenproducto_id']      = $this->request->data['Inventariomovimiento']['almacenproducto_id'];
									    $this->request->data['Inventariomovimiento']['tipo']                    = 1;
									    $this->request->data['Inventariomovimiento']['cantidad']                = $this->request->data['Inventariomovimiento']['cantidad'];
									    $this->request->data['Inventariomovimiento']['fechaalta']               = $this->request->data['Inventariomovimiento']['fechaalta'];
									    $this->request->data['Inventariomovimiento']['almacentipofunte_id']     = $this->request->data['Inventariomovimiento']['almacentipofunte_id'];
									    $this->request->data['Inventariomovimiento']['almacenefunte_id']        = $this->request->data['Inventariomovimiento']['almacenefunte_id'];
									    $this->request->data['Inventariomovimiento']['referencia']              = $this->request->data['Inventariomovimiento']['referencia'];
									    $this->request->data['Inventariomovimiento']['ordenventa_id']           = 0;
									    $this->request->data['Inventariomovimiento']['userventa_id']            = 0;
									    $this->Inventariomovimiento->create();
										$this->Inventariomovimiento->save($this->request->data);
										$almacenmarca_id      = $almacenproductos[0]['Almacenproducto']['almacenmarca_id'];
										$almacenmarcadetalles = $this->Almacenmarcadetalle->find('all', array('conditions'=>array('almacenmarca_id'=>$almacenmarca_id, 'default'=>1)));
										foreach($almacenmarcadetalles as $datos){
                                            $this->request->data['Inventariomovimateriale']['empresa_id']              = $empresa_id;
										    $this->request->data['Inventariomovimateriale']['empresasurcusale_id']     = $empresasurcusale_id;
										    $this->request->data['Inventariomovimateriale']['almacentipo_id']          = $this->request->data['Inventariomovimiento']['almacentipo_id'];
										    $this->request->data['Inventariomovimateriale']['almacene_id']             = $this->request->data['Inventariomovimiento']['almacene_id'];
										    $this->request->data['Inventariomovimateriale']['almacenmateriale_id']     = $datos['Almacenmarcadetalle']['almacenmateriale_id'];
										    $this->request->data['Inventariomovimateriale']['tipo']                    = 1;
										    $this->request->data['Inventariomovimateriale']['cantidad']                = ($datos['Almacenmarcadetalle']['cantidad']*$this->request->data['Inventariomovimiento']['cantidad']);
										    $this->request->data['Inventariomovimateriale']['fechaalta']               = $this->request->data['Inventariomovimiento']['fechaalta'];
										    $this->request->data['Inventariomovimateriale']['usermovi_id']             = $user_id;
										    $this->request->data['Inventariomovimateriale']['inventariomovimiento_id'] = $id ;
										    $this->Inventariomovimateriale->create();
											$this->Inventariomovimateriale->save($this->request->data);
										}
                      	}else if($maquila==2 && $foraneo==2){
                                         $almacene = $this->Almacene->find('all', array('conditions'=>array('Almacene.empresa_id'=>$empresa_id, 'Almacene.empresasurcusale_id'=>$empresasurcusale_id, 'Almacene.foraneo'=>2, 'Almacene.maquila'=>1)));
			                      		 $this->request->data['Inventariomovimiento']['empresa_id']              = $empresa_id;
									     $this->request->data['Inventariomovimiento']['empresasurcusale_id']     = $empresasurcusale_id;
									     $this->request->data['Inventariomovimiento']['almacentipo_id']          = $almacene[0]['Almacene']['almacentipo_id'];
									     $this->request->data['Inventariomovimiento']['almacene_id']             = $almacene[0]['Almacene']['id'];
									     $this->request->data['Inventariomovimiento']['almacenproducto_id']      = $this->request->data['Inventariomovimiento']['almacenproducto_id'];
									     $this->request->data['Inventariomovimiento']['tipo']                    = 1;
									     $this->request->data['Inventariomovimiento']['cantidad']                = $this->request->data['Inventariomovimiento']['cantidad'];
									     $this->request->data['Inventariomovimiento']['fechaalta']               = $this->request->data['Inventariomovimiento']['fechaalta'];
									     $this->request->data['Inventariomovimiento']['almacentipofunte_id']     = $this->request->data['Inventariomovimiento']['almacentipofunte_id'];
									     $this->request->data['Inventariomovimiento']['almacenefunte_id']        = $this->request->data['Inventariomovimiento']['almacenefunte_id'];
									     $this->request->data['Inventariomovimiento']['referencia']              = $this->request->data['Inventariomovimiento']['referencia'];
									     $this->request->data['Inventariomovimiento']['ordenventa_id']           = 0;
									     $this->request->data['Inventariomovimiento']['userventa_id']            = 0;
									     $this->Inventariomovimiento->create();
										 $this->Inventariomovimiento->save($this->request->data);
                      	}
                }else if($this->request->data['Inventariomovimiento']['tipo']==2){//SALIDA
                			  if($maquila==1 && $foraneo==2){//ADMINISTRADOR

                      	}else if($maquila==2 && $foraneo==1){//ADMINISTRADOR

                      	}else if($maquila==2 && $foraneo==2){//ADMINISTRADOR

                      	}
                }else if($this->request->data['Inventariomovimiento']['tipo']==3){//TRANSFERENCIA
                	     $this->request->data['Inventariomovimiento']['empresa_id']              = $empresa_id;
					     $this->request->data['Inventariomovimiento']['empresasurcusale_id']     = $empresasurcusale_id;
					     $this->request->data['Inventariomovimiento']['almacentipo_id']          = $this->request->data['Inventariomovimiento']['almacentipofunte_id'];
					     $this->request->data['Inventariomovimiento']['almacene_id']             = $this->request->data['Inventariomovimiento']['almacenefunte_id'];
					     $this->request->data['Inventariomovimiento']['almacenproducto_id']      = $this->request->data['Inventariomovimiento']['almacenproducto_id'];
					     $this->request->data['Inventariomovimiento']['tipo']                    = 3;
					     $this->request->data['Inventariomovimiento']['cantidad']                = $this->request->data['Inventariomovimiento']['cantidad'];
					     $this->request->data['Inventariomovimiento']['fechaalta']               = $this->request->data['Inventariomovimiento']['fechaalta'];
					     $this->request->data['Inventariomovimiento']['almacentipofunte_id']     = 0;
					     $this->request->data['Inventariomovimiento']['almacenefunte_id']        = 0;
					     $this->request->data['Inventariomovimiento']['referencia']              = $this->request->data['Inventariomovimiento']['referencia'];
					     $this->request->data['Inventariomovimiento']['ordenventa_id']           = 0;
					     $this->request->data['Inventariomovimiento']['userventa_id']            = 0;
					     if($this->request->data['Inventariomovimiento']['tipo']==3){
			               $this->request->data['Inventariomovimiento']['tipo_transferencia']=2;
						 }
					     $this->Inventariomovimiento->create();
						 $this->Inventariomovimiento->save($this->request->data);
                }
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
		$data  = $this->Inventariomovimiento->Almacene->find('list', array('conditions'=>array('almacentipo_id'=>$id, 'Almacene.id'=>$almacen)));
		$this->set('almacenes',$data);
	}		


	/**
 * almacen method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function almacenfuente($id = null) {
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
		$data = $this->Inventariomovimiento->Almacene->find('list', array('conditions'=>array('almacentipo_id'=>$id, 'Almacene.id'=>$almacen)));
		$this->set('almacenefuntes',$data);
	}		
}
