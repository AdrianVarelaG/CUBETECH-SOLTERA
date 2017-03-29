<?php
App::uses('AppController', 'Controller');
/**
 * Ventas Controller
 *
 * @property Venta $Venta
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ConsultaController extends AppController {
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');
	public $uses       = array('Inventariomovimiento','Inventariomovimateriale', 'Almacenproductodetalle', 'Almacenmarcadetalle', 'Almacenproducto', 'Almacene');
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
 * materiales method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function materiales() {
	    $empresa_id          = $this->Session->read('empresa_id');
     	$empresasurcusale_id = $this->Session->read('empresasurcusale_id');
     	$rol_id              = $this->Session->read('ROL');
     	$user_id             = $this->Session->read('USUARIO_ID');
     	      if($empresa_id==0 && $empresasurcusale_id==0){
     		  	$this->set('inventariomovimateriales', $this->Inventariomovimateriale->find('all', array(
																							            'conditions' => array('Inventariomovimateriale.activo'=>1),
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
																							            'conditions' => array('Inventariomovimateriale.activo'=>1, 'Inventariomovimateriale.empresa_id'=>$empresa_id),
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
																							            'conditions' => array('Inventariomovimateriale.activo'=>1, 'Inventariomovimateriale.empresa_id'=>$empresa_id, 'Inventariomovimateriale.empresasurcusale_id'=>$empresasurcusale_id),
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
																							            'conditions' => array('Inventariomovimateriale.activo'=>1, 'Inventariomovimateriale.empresa_id'=>$empresa_id, 'Inventariomovimateriale.empresasurcusale_id'=>$empresasurcusale_id),
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



     }//fin
/**
 * productos method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function productos() {
	    $empresa_id          = $this->Session->read('empresa_id');
     	$empresasurcusale_id = $this->Session->read('empresasurcusale_id');
     	$rol_id              = $this->Session->read('ROL');
     	$user_id             = $this->Session->read('USUARIO_ID');
     	      if($empresa_id==0 && $empresasurcusale_id==0){
     		  	$this->set('inventariomovimientos', $this->Inventariomovimiento->find('all', array(
																						            'conditions' => array('Inventariomovimiento.activo'=>1),
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
     		    $this->set('inventariomovimientos', $this->Inventariomovimiento->find('all', array(
																						            'conditions' => array('Inventariomovimiento.activo'=>1, 'Inventariomovimiento.empresa_id'=>$empresa_id),
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
      		    $this->set('inventariomovimientos', $this->Inventariomovimiento->find('all', array(
																						            'conditions' => array('Inventariomovimiento.activo'=>1, 'Inventariomovimiento.empresa_id'=>$empresa_id, 'Inventariomovimiento.empresasurcusale_id'=>$empresasurcusale_id),
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
      		    $this->set('inventariomovimientos', $this->Inventariomovimiento->find('all', array(
																						            'conditions' => array('Inventariomovimiento.activo'=>1, 'Inventariomovimiento.empresa_id'=>$empresa_id, 'Inventariomovimiento.empresasurcusale_id'=>$empresasurcusale_id),
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
     }//fin
}
?>
