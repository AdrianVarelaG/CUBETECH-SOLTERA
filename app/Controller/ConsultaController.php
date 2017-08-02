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



			$this->set('inventariomovimateriales',  $this->Inventariomovimateriale->consultaTotales($empresa_id, $empresasurcusale_id, $rol_id, $user_id));

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
			
			$datos = $this->Inventariomovimiento->consultaTotales($empresa_id, $empresasurcusale_id, $rol_id, $user_id);
			$ret = array();

			for($i = 0; $i < count($datos) ; $i++ ){
				$band = true;
				if(isset($datos[$i][0]['entrada']) && ($datos[$i][0]['salida'] - $datos[$i][0]['entrada']) == 0 ){
					$producto = $this->Almacenproducto->find("first", array('conditions'=>array('Almacenproducto.id'=> $datos[$i]['Inventariomovimiento']['almacenproducto_id'] )));

					$band = $producto['Almacenproducto']['activo'] == 1;
				}
				if($band){
					$ret[$i] = $datos[$i];
				}
			}
			$this->set('inventariomovimientos', $ret);
     }//fin
}
?>
