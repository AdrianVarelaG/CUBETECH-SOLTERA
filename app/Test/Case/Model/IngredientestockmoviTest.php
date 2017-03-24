<?php
App::uses('Ingredientestockmovi', 'Model');

/**
 * Ingredientestockmovi Test Case
 *
 */
class IngredientestockmoviTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ingredientestockmovi',
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
		$this->Ingredientestockmovi = ClassRegistry::init('Ingredientestockmovi');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ingredientestockmovi);

		parent::tearDown();
	}

}
