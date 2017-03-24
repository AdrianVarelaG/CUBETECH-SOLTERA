<?php
App::uses('Tipocompra', 'Model');

/**
 * Tipocompra Test Case
 *
 */
class TipocompraTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tipocompra',
		'app.compra'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tipocompra = ClassRegistry::init('Tipocompra');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tipocompra);

		parent::tearDown();
	}

}
