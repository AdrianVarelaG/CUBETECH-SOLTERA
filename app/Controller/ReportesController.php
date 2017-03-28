<?php
App::uses('AppController', 'Controller');
/**
 * Almacenes Controller
 *
 * @property Almacene $Almacene
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ReportesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

	public $uses = array('Inventariomovimiento','Inventariomovimateriale', 'Almacenproductodetalle', 'Almacenmarcadetalle', 'Almacenmarca', 'Almacenproducto', 'Almacene', 'Ventadetalle', 'Venta');

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
		$this->checkSession(7);
	}



/**
 * reporte1 method
 *
 * @return void
 */
	public function reporte1($id=null) {
		$empresa_id          = $this->Session->read('empresa_id');
 	    $empresasurcusale_id = $this->Session->read('empresasurcusale_id');
 	    $rol_id              = $this->Session->read('ROL');
 	    $user_id             = $this->Session->read('USUARIO_ID');
		if($id!=null){
				 $this->set('id',$id);
		         $this->layout = 'pdf';
				 App::import('Vendor', 'Fpdf', array('file' => 'fpdf181/fpdf.php'));
				 $this->set('name', "stock_total_".date('d_m_Y').".pdf");
				 $empresa_id          = $this->Session->read('empresa_id');
		     	 $empresasurcusale_id = $this->Session->read('empresasurcusale_id');
		     	 $rol_id              = $this->Session->read('ROL');
		     	 $user_id             = $this->Session->read('USUARIO_ID');
		     	 $almacentipo_id      = $this->request->data['Reporte']['almacentipo_id'];
			     $almacene_id         = $this->request->data['Reporte']['almacene_id'];
			     $this->Inventariomovimiento->recursive = 3;
		     	      if($empresa_id==0 && $empresasurcusale_id==0){ 
		     		  	$this->set('inventariomovimientos', $this->Inventariomovimiento->find('all', array(
																								            'conditions' => array('Inventariomovimiento.almacentipo_id'=>$almacentipo_id, 'Inventariomovimiento.almacene_id'=>$almacene_id, 'Inventariomovimiento.activo'=>1),
																								                 'fields'=> array('Inventariomovimiento.empresa_id, 
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
																							            )));
		     	}else if($empresa_id!=0 && $empresasurcusale_id==0){
		     		    $this->set('inventariomovimientos', $this->Inventariomovimiento->find('all', array(
																								            'conditions' => array('Inventariomovimiento.almacentipo_id'=>$almacentipo_id, 'Inventariomovimiento.almacene_id'=>$almacene_id,'Inventariomovimiento.activo'=>1, 'Inventariomovimiento.empresa_id'=>$empresa_id),
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
																							            )));
		      	}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==3){
		      		    $this->set('inventariomovimientos', $this->Inventariomovimiento->find('all', array(
																								            'conditions' => array('Inventariomovimiento.almacentipo_id'=>$almacentipo_id, 'Inventariomovimiento.almacene_id'=>$almacene_id,'Inventariomovimiento.activo'=>1, 'Inventariomovimiento.empresa_id'=>$empresa_id, 'Inventariomovimiento.empresasurcusale_id'=>$empresasurcusale_id),
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
																							            )));
		      	}else{
		      		    $this->set('inventariomovimientos', $this->Inventariomovimiento->find('all', array(
																								            'conditions' => array('Inventariomovimiento.almacentipo_id'=>$almacentipo_id, 'Inventariomovimiento.almacene_id'=>$almacene_id,'Inventariomovimiento.activo'=>1, 'Inventariomovimiento.empresa_id'=>$empresa_id, 'Inventariomovimiento.empresasurcusale_id'=>$empresasurcusale_id),
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
																							            )));
		      	}



				      	if($empresa_id==0 && $empresasurcusale_id==0){ 
				    		$conditions = array('Venta.activo'=>1, 'Venta.estado'=>1, 'Venta.almacentipo_id'=>$almacentipo_id, 'Venta.almacene_id'=>$almacene_id);
		     	}else if($empresa_id!=0 && $empresasurcusale_id==0){
		     				$conditions = array('Venta.activo'=>1, 'Venta.estado'=>1, 'Venta.empresa_id'=>$empresa_id, 'Venta.almacentipo_id'=>$almacentipo_id, 'Venta.almacene_id'=>$almacene_id);
		      	}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==3){
		      				$conditions = array('Venta.activo'=>1, 'Venta.estado'=>1, 'Venta.empresa_id'=>$empresa_id, 'Venta.empresasurcusale_id'=>$empresasurcusale_id, 'Venta.almacentipo_id'=>$almacentipo_id, 'Venta.almacene_id'=>$almacene_id);
		      	}else{
		      				$conditions = array('Venta.activo'=>1, 'Venta.estado'=>1, 'Venta.empresa_id'=>$empresa_id, 'Venta.empresasurcusale_id'=>$empresasurcusale_id, 'Venta.almacentipo_id'=>$almacentipo_id, 'Venta.almacene_id'=>$almacene_id);
		      	}
		         $this->set('ventadetalles', $this->Ventadetalle->find('all', array(
															            'conditions' => array($conditions),
															                'fields' => array(' Venta.empresa_id, 
															                 	                (select a.razon_social from empresas a where a.id=Venta.empresa_id) as deno_empresas, 
															                 	               Venta.empresasurcusale_id, 
															                 	                (select a.denominacion from empresasurcusales a where a.id=Venta.empresasurcusale_id) as deno_empresasurcusales,
															                 	               Venta.almacentipo_id,
															                 	               Venta.almacene_id,
															                 	               Ventadetalle.almacenproducto_id,
															                 	                (select a.nombre from almacenproductos a where a.id=Ventadetalle.almacenproducto_id) as deno_producto,
															                 	                (select a.almacenmarca_id from almacenproductos a where a.id=Ventadetalle.almacenproducto_id) as almacenmarca_id,
															                 	                (SUM(Ventadetalle.cantidad)) AS cantidad
															                 	              '
															                 	            ),
															                 'group' => 'Venta.empresa_id, deno_empresas, Venta.empresasurcusale_id, deno_empresasurcusales, Venta.almacentipo_id, Venta.almacene_id, Ventadetalle.almacenproducto_id, deno_producto, almacenmarca_id, cantidad'
														            )));
		         $this->set('almacenmarcas', $this->Almacenmarca->find('all', array('conditions'=>array('Almacenmarca.activo'=>1, 'Almacenmarca.empresa_id'=>$empresa_id))));




		}
      


		$empresas = $this->Inventariomovimiento->Empresa->find('list', array('conditions'=>array('id'=>$empresa_id) ));
		       if($empresa_id==0 && $empresasurcusale_id==0){ 
            	$empresasurcusales = $this->Inventariomovimiento->Empresasurcusale->find('list');
     	 }else if($empresa_id!=0 && $empresasurcusale_id==0){
                $empresasurcusales = $this->Inventariomovimiento->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id)));
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0){
                $empresasurcusales = $this->Inventariomovimiento->Empresasurcusale->find('list', array('conditions'=>array('Empresasurcusale.empresa_id'=>$empresa_id,'Empresasurcusale.id'=>$empresasurcusale_id)));
      	}
		$almacentipos      = $this->Inventariomovimiento->Almacentipo->find('list', array('conditions'=>array('empresa_id'=>$empresa_id, 'activo'=>1) ));
		$almacenes         = array();
		$almacenproductos  = $this->Inventariomovimiento->Almacenproducto->find('list', array('conditions'=>array('empresa_id'=>$empresa_id, 'activo'=>1) ));
		$almacentipofuntes = $this->Inventariomovimiento->Almacentipofunte->find('list', array('conditions'=>array('empresa_id'=>$empresa_id, 'activo'=>1) ));
		$almacenefuntes    = array();
		$ordenventas       = array();
		$userventas        = array();


		$this->set(compact('empresas', 'empresasurcusales', 'almacentipos', 'almacenes', 'almacenproductos', 'almacentipofuntes', 'almacenefuntes', 'ordenventas', 'userventas'));
	

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
		$data = $this->Inventariomovimiento->Almacene->find('list', array('conditions'=>array('almacentipo_id'=>$id)));
		$this->set('almacenes',$data);
	}	



}
?>