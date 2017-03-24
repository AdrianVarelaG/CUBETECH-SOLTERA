<?php
App::uses('Compraingredientedetalle', 'Model');

/**
 * Compraingredientedetalle Test Case
 *
 */
class CompraingredientedetalleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.compraingredientedetalle',
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
		'app.proveedoreingre'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Compraingredientedetalle = ClassRegistry::init('Compraingredientedetalle');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Compraingredientedetalle);

		parent::tearDown();
	}

}
