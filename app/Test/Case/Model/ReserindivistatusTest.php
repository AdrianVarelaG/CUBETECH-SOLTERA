<?php
App::uses('Reserindivistatus', 'Model');

/**
 * Reserindivistatus Test Case
 *
 */
class ReserindivistatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.reserindivistatus',
		'app.reserindividuale',
		'app.tipocliente',
		'app.cliente',
		'app.tipoclientesub',
		'app.tarjetacredito',
		'app.tipotarjeta',
		'app.tipohabitacione',
		'app.habitacione',
		'app.reserstatusindividuale',
		'app.resermultiple',
		'app.reserstatusmultiple',
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
		$this->Reserindivistatus = ClassRegistry::init('Reserindivistatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Reserindivistatus);

		parent::tearDown();
	}

}
