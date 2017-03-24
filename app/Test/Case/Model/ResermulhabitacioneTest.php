<?php
App::uses('Resermulhabitacione', 'Model');

/**
 * Resermulhabitacione Test Case
 *
 */
class ResermulhabitacioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.resermulhabitacione',
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
		'app.reserstatusindividuale'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Resermulhabitacione = ClassRegistry::init('Resermulhabitacione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Resermulhabitacione);

		parent::tearDown();
	}

}
