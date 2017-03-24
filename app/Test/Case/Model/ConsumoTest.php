<?php
App::uses('Consumo', 'Model');

/**
 * Consumo Test Case
 *
 */
class ConsumoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.consumo',
		'app.tipohabitacione',
		'app.habitacione',
		'app.reserindividuale',
		'app.tipocliente',
		'app.cliente',
		'app.tipoclientesub',
		'app.tarjetacredito',
		'app.tipotarjeta',
		'app.reserstatusindividuale',
		'app.resermultiple',
		'app.reserstatusmultiple',
		'app.resermulhabitacione',
		'app.consumoproducto'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Consumo = ClassRegistry::init('Consumo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Consumo);

		parent::tearDown();
	}

}
