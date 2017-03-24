<?php
App::uses('Facturapago', 'Model');

/**
 * Facturapago Test Case
 *
 */
class FacturapagoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facturapago',
		'app.factura',
		'app.tipocliente',
		'app.cliente',
		'app.tipoclientesub',
		'app.tarjetacredito',
		'app.tipotarjeta',
		'app.facturadetalle',
		'app.facturatipoproducto',
		'app.facturatipopago'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Facturapago = ClassRegistry::init('Facturapago');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Facturapago);

		parent::tearDown();
	}

}
