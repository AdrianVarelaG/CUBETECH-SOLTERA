<?php
App::uses('Productotipo', 'Model');

/**
 * Productotipo Test Case
 *
 */
class ProductotipoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.productotipo',
		'app.resto',
		'app.direpai',
		'app.direprovincia',
		'app.restosurcusale',
		'app.user',
		'app.role',
		'app.rolemodulo',
		'app.modulo',
		'app.inventario',
		'app.producto',
		'app.productosubtipo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Productotipo = ClassRegistry::init('Productotipo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Productotipo);

		parent::tearDown();
	}

}
