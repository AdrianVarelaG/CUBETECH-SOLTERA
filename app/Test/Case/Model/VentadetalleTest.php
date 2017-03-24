<?php
App::uses('Ventadetalle', 'Model');

/**
 * Ventadetalle Test Case
 *
 */
class VentadetalleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ventadetalle',
		'app.venta',
		'app.empresa',
		'app.direpai',
		'app.direprovincia',
		'app.empresasurcusale',
		'app.user',
		'app.role',
		'app.rolemodulo',
		'app.modulo',
		'app.cliente',
		'app.dirmunicipio',
		'app.almacentipo',
		'app.almacene',
		'app.almacenproducto',
		'app.almacenmarca',
		'app.almacenmarcadetalle',
		'app.almacenmateriale',
		'app.almacenproductodetalle'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ventadetalle = ClassRegistry::init('Ventadetalle');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ventadetalle);

		parent::tearDown();
	}

}
