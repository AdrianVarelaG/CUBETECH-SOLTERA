<?php
App::uses('Compraingrediente', 'Model');

/**
 * Compraingrediente Test Case
 *
 */
class CompraingredienteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.compraingrediente',
		'app.resto',
		'app.restosurcusale',
		'app.user',
		'app.role',
		'app.rolemodulo',
		'app.modulo',
		'app.proveedore',
		'app.compratipopago',
		'app.compraabona',
		'app.compra',
		'app.compratipo',
		'app.compraproducto',
		'app.ingredientetipo',
		'app.ingrediente',
		'app.medida',
		'app.ingredientestock',
		'app.platoingre',
		'app.proveedoreingre',
		'app.compraingredientedetalle'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Compraingrediente = ClassRegistry::init('Compraingrediente');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Compraingrediente);

		parent::tearDown();
	}

}
