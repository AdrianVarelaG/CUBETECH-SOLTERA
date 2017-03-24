<?php
App::uses('Producto', 'Model');

/**
 * Producto Test Case
 *
 */
class ProductoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.producto',
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
		'app.productosubtipo',
		'app.medida',
		'app.ingrediente',
		'app.ingredientetipo',
		'app.ingredientestock',
		'app.platoingre',
		'app.proveedoreingre',
		'app.proveedore'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Producto = ClassRegistry::init('Producto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Producto);

		parent::tearDown();
	}

}
