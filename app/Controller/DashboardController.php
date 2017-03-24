<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class DashboardController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	//public $uses = array('Compraingrediente', 'Ingredientestock');

	public $components = array('Paginator', 'Session', 'Flash');

	public $uses = array(
		                 'Venta', 'Ventadetalle', 'Inventariomovimiento','Inventariomovimateriale', 'Almacenproductodetalle', 
		                 'Almacenmarcadetalle', 'Almacenproducto', 'Almacene'
		                 );

	public function beforeFilter() {
		$this->checkSession(100);
	}

	function index(){
		$this->layout = "dashbord";
		$empresa_id          = $this->Session->read('empresa_id');
 	    $empresasurcusale_id = $this->Session->read('empresasurcusale_id');
 	    $rol_id              = $this->Session->read('ROL');
 	    $user_id             = $this->Session->read('USUARIO_ID');
		//if($id!=null){
 	    $mes     =  date("m")-1;
 	    $year    =  date("Y");
        if($mes==0){ 
        				$fecha_a = (date("Y")-1)."-1-1";
        }else{
                        $fecha_a = date("Y").".".$mes."-1";        
        }
		$fecha_b = date("Y-m-d");

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
		//}
         if($empresa_id==0 && $empresasurcusale_id==0){ 
		    		$conditions = array('Venta.activo'=>1, 'Venta.fecha >='=>$fecha_a,  'Venta.fecha <='=>$fecha_b);
     	}else if($empresa_id!=0 && $empresasurcusale_id==0){
     				$conditions = array('Venta.activo'=>1, 'Venta.empresa_id'=>$empresa_id, 'Venta.fecha >='=>$fecha_a, 'Venta.fecha <='=>$fecha_b);
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==3){
      				$conditions = array('Venta.activo'=>1, 'Venta.empresa_id'=>$empresa_id, 'Venta.empresasurcusale_id'=>$empresasurcusale_id, 'Venta.fecha >='=>$fecha_a,  'Venta.fecha <='=>$fecha_b);
      	}else{
      				$conditions = array('Venta.activo'=>1, 'Venta.empresa_id'=>$empresa_id, 'Venta.empresasurcusale_id'=>$empresasurcusale_id, 'Venta.fecha >='=>$fecha_a,  'Venta.fecha <='=>$fecha_b);
      	}
         $this->set('ventadetalles2', $this->Ventadetalle->find('all', array(
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


          if($empresa_id==0 && $empresasurcusale_id==0){ 
		    		$conditions = array('Venta.activo'=>1, 'Venta.fecha >='=>$fecha_a,  'Venta.fecha <='=>$fecha_b);
     	}else if($empresa_id!=0 && $empresasurcusale_id==0){
     				$conditions = array('Venta.activo'=>1, 'Venta.empresa_id'=>$empresa_id, 'Venta.fecha >='=>$fecha_a, 'Venta.fecha <='=>$fecha_b);
      	}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==3){
      				$conditions = array('Venta.activo'=>1, 'Venta.empresa_id'=>$empresa_id, 'Venta.empresasurcusale_id'=>$empresasurcusale_id, 'Venta.fecha >='=>$fecha_a,  'Venta.fecha <='=>$fecha_b);
      	}else{
      				$conditions = array('Venta.activo'=>1, 'Venta.empresa_id'=>$empresa_id, 'Venta.empresasurcusale_id'=>$empresasurcusale_id, 'Venta.fecha >='=>$fecha_a,  'Venta.fecha <='=>$fecha_b);
      	}
         $this->set('ventas3', $this->Venta->find('all', array(
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
?>