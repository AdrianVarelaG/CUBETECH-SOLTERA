<?php
App::uses('Ingredientestock', 'Model');

/**
 * Ingredientestock Test Case
 *
 */
class IngredientestockTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ingredientestock',
		'app.resto',
		'app.direpai',
		'app.direprovincia',
		'app.restosurcusale',
		'app.user',
		'app.role',
		'app.rolemodulo',
		'app.modulo',
		'app.ingredientetipo',
		'app.ingrediente',
		'app.medida',
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
		$this->Ingredientestock = ClassRegistry::init('Ingredientestock');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ingredientestock);

		parent::tearDown();
	}

}
