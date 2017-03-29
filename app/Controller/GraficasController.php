<?php
App::uses('AppController', 'Controller');
/**
 * Almacenes Controller
 *
 * @property Almacene $Almacene
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class GraficasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

	public $uses = array(
		                 'Venta', 'Ventadetalle', 'Inventariomovimiento','Inventariomovimateriale', 'Almacenproductodetalle',
		                 'Almacenmarcadetalle', 'Almacenproducto', 'Almacene'
		                 );

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
		$this->checkSession(8);
	}



/**
 * grafica1 method
 *
 * @return void
 */
	public function grafica1($id=null){
		$empresa_id          = $this->Session->read('empresa_id');
 	    $empresasurcusale_id = $this->Session->read('empresasurcusale_id');
 	    $rol_id              = $this->Session->read('ROL');
 	    $user_id             = $this->Session->read('USUARIO_ID');
		if($id!=null){
		 $this->set('id',$id);
		 /*$fecha_a = $this->request->data['Grafica']['fecha_a'];
		 $fecha_b = $this->request->data['Grafica']['fecha_b'];
		 $this->set('fecha_a', cambiar_formato_fecha($this->request->data['Grafica']['fecha_a']));
		 $this->set('fecha_b', cambiar_formato_fecha($this->request->data['Grafica']['fecha_b']));*/

		 $this->set('year', $this->request->data['Grafica']['year']);
		 $year = $this->request->data['Grafica']['year'];


      		  if($empresa_id==0 && $empresasurcusale_id==0){
		    		$conditions = array('Venta.activo'=>1, 'year(Venta.fecha)'=>$year);
     	}else if($empresa_id!=0 && $empresasurcusale_id==0){
     				$conditions = array('Venta.activo'=>1, 'Venta.empresa_id'=>$empresa_id, 'year(Venta.fecha)'=>$year);
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==3){
      				$conditions = array('Venta.activo'=>1, 'Venta.empresa_id'=>$empresa_id, 'Venta.empresasurcusale_id'=>$empresasurcusale_id, 'year(Venta.fecha)'=>$year);
      	}else{
      				$conditions = array('Venta.activo'=>1, 'Venta.empresa_id'=>$empresa_id, 'Venta.empresasurcusale_id'=>$empresasurcusale_id, 'year(Venta.fecha)'=>$year);
      	}
         $this->set('ventadetalles', $this->Ventadetalle->find('all', array(
													            'conditions' => array($conditions),
													                 'order' => array('Venta.user_id, Venta.pagado, pago_ene, pago_feb, pago_mar, pago_abr, pago_may, pago_jun, pago_jul, pago_ago, pago_sep, pago_obc, pago_nov, pago_dic'=>'ASD'),
													                'fields' => array(' Venta.empresa_id,
													                 	                (select a.razon_social from empresas a where a.id=Venta.empresa_id) as deno_empresas,
													                 	               Venta.empresasurcusale_id,
													                 	                (select a.denominacion from empresasurcusales a where a.id=Venta.empresasurcusale_id) as deno_empresasurcusales,
													                 	               Ventadetalle.almacenproducto_id,
													                 	                (select a.nombre from almacenproductos a where a.id=Ventadetalle.almacenproducto_id) as deno_producto,
													                 	                (select COUNT(b.id) from  ventadetalles b, ventas a where b.venta_id=a.id and b.almacenproducto_id=Ventadetalle.almacenproducto_id and (a.pagado=1 or a.pagado=2) and a.activo=1 and month(Venta.fecha)=1 ) as pago_ene,
													                 	                (select COUNT(b.id) from  ventadetalles b, ventas a where b.venta_id=a.id and b.almacenproducto_id=Ventadetalle.almacenproducto_id and (a.pagado=1 or a.pagado=2) and a.activo=1 and month(Venta.fecha)=2 ) as pago_feb,
													                 	                (select COUNT(b.id) from  ventadetalles b, ventas a where b.venta_id=a.id and b.almacenproducto_id=Ventadetalle.almacenproducto_id and (a.pagado=1 or a.pagado=2) and a.activo=1 and month(Venta.fecha)=3 ) as pago_mar,
													                 	                (select COUNT(b.id) from  ventadetalles b, ventas a where b.venta_id=a.id and b.almacenproducto_id=Ventadetalle.almacenproducto_id and (a.pagado=1 or a.pagado=2) and a.activo=1 and month(Venta.fecha)=4 ) as pago_abr,
													                 	                (select COUNT(b.id) from  ventadetalles b, ventas a where b.venta_id=a.id and b.almacenproducto_id=Ventadetalle.almacenproducto_id and (a.pagado=1 or a.pagado=2) and a.activo=1 and month(Venta.fecha)=5 ) as pago_may,
													                 	                (select COUNT(b.id) from  ventadetalles b, ventas a where b.venta_id=a.id and b.almacenproducto_id=Ventadetalle.almacenproducto_id and (a.pagado=1 or a.pagado=2) and a.activo=1 and month(Venta.fecha)=6 ) as pago_jun,
													                 	                (select COUNT(b.id) from  ventadetalles b, ventas a where b.venta_id=a.id and b.almacenproducto_id=Ventadetalle.almacenproducto_id and (a.pagado=1 or a.pagado=2) and a.activo=1 and month(Venta.fecha)=7 ) as pago_jul,
													                 	                (select COUNT(b.id) from  ventadetalles b, ventas a where b.venta_id=a.id and b.almacenproducto_id=Ventadetalle.almacenproducto_id and (a.pagado=1 or a.pagado=2) and a.activo=1 and month(Venta.fecha)=8 ) as pago_ago,
													                 	                (select COUNT(b.id) from  ventadetalles b, ventas a where b.venta_id=a.id and b.almacenproducto_id=Ventadetalle.almacenproducto_id and (a.pagado=1 or a.pagado=2) and a.activo=1 and month(Venta.fecha)=9 ) as pago_sep,
													                 	                (select COUNT(b.id) from  ventadetalles b, ventas a where b.venta_id=a.id and b.almacenproducto_id=Ventadetalle.almacenproducto_id and (a.pagado=1 or a.pagado=2) and a.activo=1 and month(Venta.fecha)=10 ) as pago_obc,
													                 	                (select COUNT(b.id) from  ventadetalles b, ventas a where b.venta_id=a.id and b.almacenproducto_id=Ventadetalle.almacenproducto_id and (a.pagado=1 or a.pagado=2) and a.activo=1 and month(Venta.fecha)=11 ) as pago_nov,
													                 	                (select COUNT(b.id) from  ventadetalles b, ventas a where b.venta_id=a.id and b.almacenproducto_id=Ventadetalle.almacenproducto_id and (a.pagado=1 or a.pagado=2) and a.activo=1 and month(Venta.fecha)=12 ) as pago_dic
													                 	              '
													                 	            ),
													                 'group' => 'Venta.empresa_id, deno_empresas, Venta.empresasurcusale_id, deno_empresasurcusales, Ventadetalle.almacenproducto_id, deno_producto, pago_ene, pago_feb, pago_mar, pago_abr, pago_may, pago_jun, pago_jul, pago_ago, pago_sep, pago_obc, pago_nov, pago_dic'
												            )));
         //Ventadetalle
		}
	}

/**
 * grafica2 method
 *
 * @return void
 */
	public function grafica2($id=null){
		$empresa_id          = $this->Session->read('empresa_id');
 	    $empresasurcusale_id = $this->Session->read('empresasurcusale_id');
 	    $rol_id              = $this->Session->read('ROL');
 	    $user_id             = $this->Session->read('USUARIO_ID');
		if($id!=null){
		 $this->set('id',$id);
		 $fecha_a = $this->request->data['Grafica']['fecha_a'];
		 $fecha_b = $this->request->data['Grafica']['fecha_b'];
		 $this->set('fecha_a', cambiar_formato_fecha($this->request->data['Grafica']['fecha_a']));
		 $this->set('fecha_b', cambiar_formato_fecha($this->request->data['Grafica']['fecha_b']));
		 	 if($empresa_id==0 && $empresasurcusale_id==0){
		    		$conditions = array('Venta.activo'=>1, 'Venta.fecha >='=>$fecha_a,  'Venta.fecha <='=>$fecha_b);
     	}else if($empresa_id!=0 && $empresasurcusale_id==0){
     				$conditions = array('Venta.activo'=>1, 'Venta.empresa_id'=>$empresa_id, 'Venta.fecha >='=>$fecha_a, 'Venta.fecha <='=>$fecha_b);
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==3){
      				$conditions = array('Venta.activo'=>1, 'Venta.empresa_id'=>$empresa_id, 'Venta.empresasurcusale_id'=>$empresasurcusale_id, 'Venta.fecha >='=>$fecha_a,  'Venta.fecha <='=>$fecha_b);
      	}else{
      				$conditions = array('Venta.activo'=>1, 'Venta.empresa_id'=>$empresa_id, 'Venta.empresasurcusale_id'=>$empresasurcusale_id, 'Venta.fecha >='=>$fecha_a,  'Venta.fecha <='=>$fecha_b);
      	}
         $this->set('ventadetalles', $this->Ventadetalle->find('all', array(
													            'conditions' => array($conditions),
													                 'order' => array('Venta.user_id, Venta.pagado'=>'ASD'),
													                'fields' => array(' Venta.empresa_id,
													                 	                (select a.razon_social from empresas a where a.id=Venta.empresa_id) as deno_empresas,
													                 	               Venta.empresasurcusale_id,
													                 	                (select a.denominacion from empresasurcusales a where a.id=Venta.empresasurcusale_id) as deno_empresasurcusales,
													                 	               Ventadetalle.almacenproducto_id,
													                 	                (select a.nombre from almacenproductos a where a.id=Ventadetalle.almacenproducto_id) as deno_producto,

													                 	                (select COUNT(b.id) from  ventadetalles b, ventas a where b.venta_id=a.id and b.almacenproducto_id=Ventadetalle.almacenproducto_id and a.pagado=1 and a.activo=1) as pago,
													                 	                (select COUNT(b.id) from  ventadetalles b, ventas a where b.venta_id=a.id and b.almacenproducto_id=Ventadetalle.almacenproducto_id and a.pagado=2 and a.activo=1) as nopago
													                 	              '
													                 	            ),
													                 'group' => 'Venta.empresa_id, deno_empresas, Venta.empresasurcusale_id, deno_empresasurcusales, Ventadetalle.almacenproducto_id, deno_producto, pago, nopago'
												            )));

         //Ventadetalle
		}
	}

	/**
 * grafica3 method
 *
 * @return void
 */
	public function grafica3($id=null){
		$empresa_id          = $this->Session->read('empresa_id');
 	    $empresasurcusale_id = $this->Session->read('empresasurcusale_id');
 	    $rol_id              = $this->Session->read('ROL');
 	    $user_id             = $this->Session->read('USUARIO_ID');
		if($id!=null){
		 $this->set('id',$id);
		 $fecha_a = $this->request->data['Grafica']['fecha_a'];
		 $fecha_b = $this->request->data['Grafica']['fecha_b'];

		 $this->set('fecha_a', cambiar_formato_fecha($this->request->data['Grafica']['fecha_a']));
		 $this->set('fecha_b', cambiar_formato_fecha($this->request->data['Grafica']['fecha_b']));

		 	 if($empresa_id==0 && $empresasurcusale_id==0){
		    		$conditions = array('Venta.activo'=>1, 'Venta.fecha >='=>$fecha_a,  'Venta.fecha <='=>$fecha_b);
     	}else if($empresa_id!=0 && $empresasurcusale_id==0){
     				$conditions = array('Venta.activo'=>1, 'Venta.empresa_id'=>$empresa_id, 'Venta.fecha >='=>$fecha_a, 'Venta.fecha <='=>$fecha_b);
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==3){
      				$conditions = array('Venta.activo'=>1, 'Venta.empresa_id'=>$empresa_id, 'Venta.empresasurcusale_id'=>$empresasurcusale_id, 'Venta.fecha >='=>$fecha_a,  'Venta.fecha <='=>$fecha_b);
      	}else{
      				$conditions = array('Venta.activo'=>1, 'Venta.empresa_id'=>$empresa_id, 'Venta.empresasurcusale_id'=>$empresasurcusale_id, 'Venta.fecha >='=>$fecha_a,  'Venta.fecha <='=>$fecha_b);
      	}
         $this->set('ventas', $this->Venta->find('all', array(
													            'conditions' => array($conditions),
													            'order'      => array('Venta.user_id, Venta.pagado'=>'ASD'),
													                 'fields'=> array('Venta.empresa_id,
													                 	                (select a.razon_social from empresas a where a.id=Venta.empresa_id) as deno_empresas,
													                 	               Venta.empresasurcusale_id,
													                 	                (select a.denominacion from empresasurcusales a where a.id=Venta.empresasurcusale_id) as deno_empresasurcusales,
													                 	               Venta.user_id,
													                 	                (select a.username from users a where a.id=Venta.user_id) as deno_user,
													                 	                (select COUNT(a.id) from  ventas a where a.user_id=Venta.user_id and a.pagado=1 and a.activo=1) as pago,
													                 	                (select COUNT(a.id) from  ventas a where a.user_id=Venta.user_id and a.pagado=2 and a.activo=1) as nopago
													                 	              '
													                 	            ),
													                 'group' => 'Venta.empresa_id, deno_empresas, Venta.empresasurcusale_id, deno_empresasurcusales, Venta.user_id, deno_user, pago, nopago'
												            )));
		}
	}

/**
 * grafica4 method
 *
 * @return void
 */
	public function grafica4($id=null){
		 $empresa_id          = $this->Session->read('empresa_id');
 	     $empresasurcusale_id = $this->Session->read('empresasurcusale_id');
 	     $rol_id              = $this->Session->read('ROL');
 	     $user_id             = $this->Session->read('USUARIO_ID');
		 if($id!=null){
			 $this->set('id',$id);
			 $almacentipo_id = $this->request->data['Grafica']['almacentipo_id'];
			 $almacene_id    = $this->request->data['Grafica']['almacene_id'];
			 if($empresa_id==0 && $empresasurcusale_id==0){
	     		  	$this->set('inventariomovimateriales', $this->Inventariomovimateriale->find('all', array(
																								            'conditions' => array('Inventariomovimateriale.almacentipo_id'=>$almacentipo_id, 'Inventariomovimateriale.almacene_id'=>$almacene_id,  'Inventariomovimateriale.activo'=>1),
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
																								                 	               (select SUM(a.cantidad) from inventariomovimateriales a where a.activo=1 and (a.tipo=1) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS entrada,
																								                 	               (select SUM(a.cantidad) from inventariomovimateriales a where a.activo=1 and (a.tipo=2) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS salida
																								                 	               '
																								                 	            ),
																								                 'group' => 'Inventariomovimateriale.empresa_id, deno_empresas, Inventariomovimateriale.empresasurcusale_id, deno_empresasurcusales, Inventariomovimateriale.almacentipo_id, deno_almacentipos, Inventariomovimateriale.almacene_id, deno_almacenes, Inventariomovimateriale.almacenmateriale_id, deno_almacenmateriales, entrada, salida'
																							            )));
	     	}else if($empresa_id!=0 && $empresasurcusale_id==0){
	     		$this->set('inventariomovimateriales', $this->Inventariomovimateriale->find('all', array(
																								            'conditions' => array('Inventariomovimateriale.almacentipo_id'=>$almacentipo_id, 'Inventariomovimateriale.almacene_id'=>$almacene_id,  'Inventariomovimateriale.activo'=>1, 'Inventariomovimateriale.empresa_id'=>$empresa_id),
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
																								                 	               (select SUM(a.cantidad) from inventariomovimateriales a where a.activo=1 and (a.tipo=1) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS entrada,
																								                 	               (select SUM(a.cantidad) from inventariomovimateriales a where a.activo=1 and (a.tipo=2) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS salida
																								                 	               '
																								                 	            ),
																								                 'group' => 'Inventariomovimateriale.empresa_id, deno_empresas, Inventariomovimateriale.empresasurcusale_id, deno_empresasurcusales, Inventariomovimateriale.almacentipo_id, deno_almacentipos, Inventariomovimateriale.almacene_id, deno_almacenes, Inventariomovimateriale.almacenmateriale_id, deno_almacenmateriales, entrada, salida'
																							            )));
	      	}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==3){
	      		$this->set('inventariomovimateriales', $this->Inventariomovimateriale->find('all', array(
																								            'conditions' => array('Inventariomovimateriale.almacentipo_id'=>$almacentipo_id, 'Inventariomovimateriale.almacene_id'=>$almacene_id,  'Inventariomovimateriale.activo'=>1, 'Inventariomovimateriale.empresa_id'=>$empresa_id, 'Inventariomovimateriale.empresasurcusale_id'=>$empresasurcusale_id),
																								                 'fields'=>array( '
																								                 	               Inventariomovimateriale.empresa_id,
																								                 	                (select a.razon_social from empresas a where a.id=Inventariomovimateriale.empresa_id) as deno_empresas,
																								                 	               Inventariomovimateriale.empresasurcusale_id,
																								                 	                (select a.denominacion from empresasurcusales a where a.id=Inventariomovimateriale.empresasurcusale_id) as deno_empresasurcusales,
																								                 	               Inventariomovimateriale.almacentipo_id,
																								                 	                (select a.denominacion from almacentipos a where a.id=Inventariomovimateriale.almacentipo_id) as deno_almacentipos,
																								                 	               Inventariomovimateriale.almacene_id,
																								                 	                (select a.nombre from almacenes a where a.id=Inventariomovimateriale.almacene_id) as deno_almacenes,
																								                 	               Inventariomovimateriale.almacenmateriale_id,
																								                 	                (select a.nombre from almacenmateriales a where a.id=Inventariomovimateriale.almacenmateriale_id) as deno_almacenmateriales,
																								                 	               (select SUM(a.cantidad) from inventariomovimateriales a where a.activo=1 and (a.tipo=1) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS entrada,
																								                 	               (select SUM(a.cantidad) from inventariomovimateriales a where a.activo=1 and (a.tipo=2) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS salida
																								                 	               '
																								                 	            ),
																								                 'group' => 'Inventariomovimateriale.empresa_id, deno_empresas, Inventariomovimateriale.empresasurcusale_id, deno_empresasurcusales, Inventariomovimateriale.almacentipo_id, deno_almacentipos, Inventariomovimateriale.almacene_id, deno_almacenes, Inventariomovimateriale.almacenmateriale_id, deno_almacenmateriales, entrada, salida'
																							            )));
	      	}else{
	      		$this->set('inventariomovimateriales', $this->Inventariomovimateriale->find('all', array(
																								            'conditions' => array('Inventariomovimateriale.almacentipo_id'=>$almacentipo_id, 'Inventariomovimateriale.almacene_id'=>$almacene_id,  'Inventariomovimateriale.activo'=>1, 'Inventariomovimateriale.empresa_id'=>$empresa_id, 'Inventariomovimateriale.empresasurcusale_id'=>$empresasurcusale_id),
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
																								                 	               (select SUM(a.cantidad) from inventariomovimateriales a where a.activo=1 and (a.tipo=1) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS entrada,
																								                 	               (select SUM(a.cantidad) from inventariomovimateriales a where a.activo=1 and (a.tipo=2) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS salida
																								                 	               '
																								                 	            ),
																								                 'group' => 'Inventariomovimateriale.empresa_id, deno_empresas, Inventariomovimateriale.empresasurcusale_id, deno_empresasurcusales, Inventariomovimateriale.almacentipo_id, deno_almacentipos, Inventariomovimateriale.almacene_id, deno_almacenes, Inventariomovimateriale.almacenmateriale_id, deno_almacenmateriales, entrada, salida'
																							            )));
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
 * grafica5 method
 *
 * @return void
 */
	public function grafica5($id=null){
		$empresa_id          = $this->Session->read('empresa_id');
 	    $empresasurcusale_id = $this->Session->read('empresasurcusale_id');
 	    $rol_id              = $this->Session->read('ROL');
 	    $user_id             = $this->Session->read('USUARIO_ID');
		if($id!=null){
		 		 $this->set('id',$id);
		 		 $almacentipo_id = $this->request->data['Grafica']['almacentipo_id'];
		 		 $almacene_id    = $this->request->data['Grafica']['almacene_id'];
		         if($empresa_id==0 && $empresasurcusale_id==0){
		     		  	$this->set('inventariomovimientos', $this->Inventariomovimiento->find('all', array('conditions' => array('Inventariomovimiento.almacentipo_id'=>$almacentipo_id, 'Inventariomovimiento.almacene_id'=>$almacene_id,  'Inventariomovimiento.activo'=>1),
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
																								                 	               (select SUM(a.cantidad) from inventariomovimientos a where a.activo=1 and (a.tipo=1 or a.tipo_transferencia=1) and a.empresa_id=Inventariomovimiento.empresa_id and a.empresasurcusale_id=Inventariomovimiento.empresasurcusale_id  and a.almacentipo_id=Inventariomovimiento.almacentipo_id  and a.almacene_id=Inventariomovimiento.almacene_id and a.almacenproducto_id=Inventariomovimiento.almacenproducto_id) AS entrada,
																								                 	               (select SUM(a.cantidad) from inventariomovimientos a where a.activo=1 and (a.tipo=2 or a.tipo_transferencia=2) and a.empresa_id=Inventariomovimiento.empresa_id and a.empresasurcusale_id=Inventariomovimiento.empresasurcusale_id  and a.almacentipo_id=Inventariomovimiento.almacentipo_id  and a.almacene_id=Inventariomovimiento.almacene_id and a.almacenproducto_id=Inventariomovimiento.almacenproducto_id) AS salida
																								                 	               '
																								                 	            ),
																								                 'group' => 'Inventariomovimiento.empresa_id, deno_empresas, Inventariomovimiento.empresasurcusale_id, deno_empresasurcusales, Inventariomovimiento.almacentipo_id, deno_almacentipos, Inventariomovimiento.almacene_id, deno_almacenes, Inventariomovimiento.almacenproducto_id, deno_almacenproductos, entrada, salida'
																							            )));
		     	}else if($empresa_id!=0 && $empresasurcusale_id==0){
		     		    $this->set('inventariomovimientos', $this->Inventariomovimiento->find('all', array('conditions' => array('Inventariomovimiento.almacentipo_id'=>$almacentipo_id, 'Inventariomovimiento.almacene_id'=>$almacene_id,  'Inventariomovimiento.activo'=>1, 'Inventariomovimiento.empresa_id'=>$empresa_id),
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
																								                 	               (select SUM(a.cantidad) from inventariomovimientos a where a.activo=1 and (a.tipo=1 or a.tipo_transferencia=1) and a.empresa_id=Inventariomovimiento.empresa_id and a.empresasurcusale_id=Inventariomovimiento.empresasurcusale_id  and a.almacentipo_id=Inventariomovimiento.almacentipo_id  and a.almacene_id=Inventariomovimiento.almacene_id and a.almacenproducto_id=Inventariomovimiento.almacenproducto_id) AS entrada,
																								                 	               (select SUM(a.cantidad) from inventariomovimientos a where a.activo=1 and (a.tipo=2 or a.tipo_transferencia=2) and a.empresa_id=Inventariomovimiento.empresa_id and a.empresasurcusale_id=Inventariomovimiento.empresasurcusale_id  and a.almacentipo_id=Inventariomovimiento.almacentipo_id  and a.almacene_id=Inventariomovimiento.almacene_id and a.almacenproducto_id=Inventariomovimiento.almacenproducto_id) AS salida
																								                 	               '
																								                 	            ),
																								                 'group' => 'Inventariomovimiento.empresa_id, deno_empresas, Inventariomovimiento.empresasurcusale_id, deno_empresasurcusales, Inventariomovimiento.almacentipo_id, deno_almacentipos, Inventariomovimiento.almacene_id, deno_almacenes, Inventariomovimiento.almacenproducto_id, deno_almacenproductos, entrada, salida'
																							            )));
		      	}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==3){
		      		    $this->set('inventariomovimientos', $this->Inventariomovimiento->find('all', array('conditions' => array('Inventariomovimiento.almacentipo_id'=>$almacentipo_id, 'Inventariomovimiento.almacene_id'=>$almacene_id,  'Inventariomovimiento.activo'=>1, 'Inventariomovimiento.empresa_id'=>$empresa_id, 'Inventariomovimiento.empresasurcusale_id'=>$empresasurcusale_id),
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
																								                 	               (select SUM(a.cantidad) from inventariomovimientos a where a.activo=1 and (a.tipo=1 or a.tipo_transferencia=1) and a.empresa_id=Inventariomovimiento.empresa_id and a.empresasurcusale_id=Inventariomovimiento.empresasurcusale_id  and a.almacentipo_id=Inventariomovimiento.almacentipo_id  and a.almacene_id=Inventariomovimiento.almacene_id and a.almacenproducto_id=Inventariomovimiento.almacenproducto_id) AS entrada,
																								                 	               (select SUM(a.cantidad) from inventariomovimientos a where a.activo=1 and (a.tipo=2 or a.tipo_transferencia=2) and a.empresa_id=Inventariomovimiento.empresa_id and a.empresasurcusale_id=Inventariomovimiento.empresasurcusale_id  and a.almacentipo_id=Inventariomovimiento.almacentipo_id  and a.almacene_id=Inventariomovimiento.almacene_id and a.almacenproducto_id=Inventariomovimiento.almacenproducto_id) AS salida
																								                 	               '
																								                 	            ),
																								                 'group' => 'Inventariomovimiento.empresa_id, deno_empresas, Inventariomovimiento.empresasurcusale_id, deno_empresasurcusales, Inventariomovimiento.almacentipo_id, deno_almacentipos, Inventariomovimiento.almacene_id, deno_almacenes, Inventariomovimiento.almacenproducto_id, deno_almacenproductos, entrada, salida'
																							            )));
		      	}else{
		      		    $this->set('inventariomovimientos', $this->Inventariomovimiento->find('all', array('conditions' => array('Inventariomovimiento.almacentipo_id'=>$almacentipo_id, 'Inventariomovimiento.almacene_id'=>$almacene_id,  'Inventariomovimiento.activo'=>1, 'Inventariomovimiento.empresa_id'=>$empresa_id, 'Inventariomovimiento.empresasurcusale_id'=>$empresasurcusale_id),
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
																								                 	               (select SUM(a.cantidad) from inventariomovimientos a where a.activo=1 and (a.tipo=1 or a.tipo_transferencia=1) and a.empresa_id=Inventariomovimiento.empresa_id and a.empresasurcusale_id=Inventariomovimiento.empresasurcusale_id  and a.almacentipo_id=Inventariomovimiento.almacentipo_id  and a.almacene_id=Inventariomovimiento.almacene_id and a.almacenproducto_id=Inventariomovimiento.almacenproducto_id) AS entrada,
																								                 	               (select SUM(a.cantidad) from inventariomovimientos a where a.activo=1 and (a.tipo=2 or a.tipo_transferencia=2) and a.empresa_id=Inventariomovimiento.empresa_id and a.empresasurcusale_id=Inventariomovimiento.empresasurcusale_id  and a.almacentipo_id=Inventariomovimiento.almacentipo_id  and a.almacene_id=Inventariomovimiento.almacene_id and a.almacenproducto_id=Inventariomovimiento.almacenproducto_id) AS salida
																								                 	               '
																								                 	            ),
																								                 'group' => 'Inventariomovimiento.empresa_id, deno_empresas, Inventariomovimiento.empresasurcusale_id, deno_empresasurcusales, Inventariomovimiento.almacentipo_id, deno_almacentipos, Inventariomovimiento.almacene_id, deno_almacenes, Inventariomovimiento.almacenproducto_id, deno_almacenproductos, entrada, salida'
																							            )));
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
