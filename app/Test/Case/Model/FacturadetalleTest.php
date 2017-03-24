<?php
App::uses('Facturadetalle', 'Model');

/**
 * Facturadetalle Test Case
 *
 */
class FacturadetalleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facturadetalle',
		'app.factura',
		'app.tipocliente',
		'app.cliente',
		'app.tipoclientesub',
		'app.tarjetacredito',
		'app.tipotarjeta',
		'app.facturatipoproducto'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Facturadetalle = ClassRegistry::init('Facturadetalle');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Facturadetalle);

		parent::tearDown();
	}

}
