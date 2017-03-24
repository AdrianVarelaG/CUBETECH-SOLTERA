<?php
App::uses('Ctacorriente', 'Model');

/**
 * Ctacorriente Test Case
 *
 */
class CtacorrienteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ctacorriente',
		'app.tipocliente',
		'app.cliente',
		'app.tipoclientesub',
		'app.tarjetacredito',
		'app.tipotarjeta'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ctacorriente = ClassRegistry::init('Ctacorriente');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ctacorriente);

		parent::tearDown();
	}

}
