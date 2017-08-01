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

			$this->set('inventariomovimientos', $this->Inventariomovimiento->consultaTotales($empresa_id, $empresasurcusale_id, $rol_id, $user_id));

     }//fin
}
?>
