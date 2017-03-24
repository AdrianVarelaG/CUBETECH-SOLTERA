<?php
App::uses('Resermultiple', 'Model');

/**
 * Resermultiple Test Case
 *
 */
class ResermultipleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		'app.resermulhabitacione'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Resermultiple = ClassRegistry::init('Resermultiple');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Resermultiple);

		parent::tearDown();
	}

}
