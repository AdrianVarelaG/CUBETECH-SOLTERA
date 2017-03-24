<?php
App::uses('Cuentacorriente', 'Model');

/**
 * Cuentacorriente Test Case
 *
 */
class CuentacorrienteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cuentacorriente',
		'app.resto',
		'app.restosurcusale',
		'app.user',
		'app.role',
		'app.rolemodulo',
		'app.modulo',
		'app.cliente'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cuentacorriente = ClassRegistry::init('Cuentacorriente');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cuentacorriente);

		parent::tearDown();
	}

}
