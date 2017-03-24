<?php
App::uses('Inventariomovi', 'Model');

/**
 * Inventariomovi Test Case
 *
 */
class InventariomoviTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.inventariomovi',
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
		'app.producto',
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
		$this->Inventariomovi = ClassRegistry::init('Inventariomovi');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Inventariomovi);

		parent::tearDown();
	}

}
