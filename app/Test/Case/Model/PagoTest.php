<?php
App::uses('Pago', 'Model');

/**
 * Pago Test Case
 *
 */
class PagoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pago',
		'app.resto',
		'app.restosurcusale',
		'app.user',
		'app.role',
		'app.rolemodulo',
		'app.modulo',
		'app.comanda',
		'app.mesa',
		'app.mesatipo',
		'app.cliente',
		'app.pagotipo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Pago = ClassRegistry::init('Pago');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Pago);

		parent::tearDown();
	}

}
