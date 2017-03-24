<?php
App::uses('Reserindividuale', 'Model');

/**
 * Reserindividuale Test Case
 *
 */
class ReserindividualeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.reserindividuale',
		'app.tipocliente',
		'app.cliente',
		'app.tipoclientesub',
		'app.tarjetacredito',
		'app.tipotarjeta',
		'app.tipohabitacione',
		'app.habitacione',
		'app.reserstatusindividuale',
		'app.resermultiple'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Reserindividuale = ClassRegistry::init('Reserindividuale');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Reserindividuale);

		parent::tearDown();
	}

}
