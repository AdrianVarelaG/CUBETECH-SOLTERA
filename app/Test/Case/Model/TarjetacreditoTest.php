<?php
App::uses('Tarjetacredito', 'Model');

/**
 * Tarjetacredito Test Case
 *
 */
class TarjetacreditoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tarjetacredito',
		'app.cliente',
		'app.tipocliente',
		'app.tipoclientesub',
		'app.tipotarjeta'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tarjetacredito = ClassRegistry::init('Tarjetacredito');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tarjetacredito);

		parent::tearDown();
	}

}
