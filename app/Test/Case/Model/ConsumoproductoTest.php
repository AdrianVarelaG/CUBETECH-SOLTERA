<?php
App::uses('Consumoproducto', 'Model');

/**
 * Consumoproducto Test Case
 *
 */
class ConsumoproductoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.consumoproducto',
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
		'app.proproducto',
		'app.protipo',
		'app.promarca',
		'app.proinventario',
		'app.protipopiso',
		'app.proalmacene'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Consumoproducto = ClassRegistry::init('Consumoproducto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Consumoproducto);

		parent::tearDown();
	}

}
