<?php
App::uses('Productosubtipo', 'Model');

/**
 * Productosubtipo Test Case
 *
 */
class ProductosubtipoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.productosubtipo',
		'app.resto',
		'app.direpai',
		'app.direprovincia',
		'app.restosurcusale',
		'app.user',
		'app.role',
		'app.rolemodulo',
		'app.modulo',
		'app.productotipo',
		'app.inventario',
		'app.producto'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Productosubtipo = ClassRegistry::init('Productosubtipo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Productosubtipo);

		parent::tearDown();
	}

}
