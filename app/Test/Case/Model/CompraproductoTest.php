<?php
App::uses('Compraproducto', 'Model');

/**
 * Compraproducto Test Case
 *
 */
class CompraproductoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.compraproducto',
		'app.compra',
		'app.proveedore',
		'app.tipocompra',
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
		$this->Compraproducto = ClassRegistry::init('Compraproducto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Compraproducto);

		parent::tearDown();
	}

}
