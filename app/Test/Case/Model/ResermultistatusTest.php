<?php
App::uses('Resermultistatus', 'Model');

/**
 * Resermultistatus Test Case
 *
 */
class ResermultistatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.resermultistatus',
		'app.resermultiple',
		'app.tipocliente',
		'app.cliente',
		'app.tipoclientesub',
		'app.tarjetacredito',
		'app.tipotarjeta',
		'app.tipohabitacione',
		'app.habitacione',
		'app.reserstatusmultiple',
		'app.reserindividuale',
		'app.reserstatusindividuale',
		'app.resermulhabitacione',
		'app.conftipopagoreserva'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Resermultistatus = ClassRegistry::init('Resermultistatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Resermultistatus);

		parent::tearDown();
	}

}
