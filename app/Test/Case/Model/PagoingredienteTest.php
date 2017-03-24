<?php
App::uses('Pagoingrediente', 'Model');

/**
 * Pagoingrediente Test Case
 *
 */
class PagoingredienteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pagoingrediente',
		'app.resto',
		'app.restosurcusale',
		'app.user',
		'app.role',
		'app.rolemodulo',
		'app.modulo',
		'app.pago',
		'app.comanda',
		'app.mesa',
		'app.mesatipo',
		'app.comandaingrediente',
		'app.ingredientetipo',
		'app.ingrediente',
		'app.medida',
		'app.ingredientestock',
		'app.platoingre',
		'app.plato',
		'app.platotipo',
		'app.proveedoreingre',
		'app.proveedore',
		'app.comandaplato',
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
		$this->Pagoingrediente = ClassRegistry::init('Pagoingrediente');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Pagoingrediente);

		parent::tearDown();
	}

}
