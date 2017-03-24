<?php
App::uses('Tipotarjeta', 'Model');

/**
 * Tipotarjeta Test Case
 *
 */
class TipotarjetaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tipotarjeta',
		'app.tarjetacredito'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tipotarjeta = ClassRegistry::init('Tipotarjeta');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tipotarjeta);

		parent::tearDown();
	}

}
