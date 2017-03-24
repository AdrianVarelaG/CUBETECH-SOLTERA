<?php
App::uses('Inventario', 'Model');

/**
 * Inventario Test Case
 *
 */
class InventarioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.inventario',
		'app.resto',
		'app.direpai',
		'app.direprovincia',
		'app.restosurcusale',
		'app.user',
		'app.role',
		'app.rolemodulo',
		'app.modulo',
		'app.productotipo',
		'app.producto',
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
		$this->Inventario = ClassRegistry::init('Inventario');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Inventario);

		parent::tearDown();
	}

}
