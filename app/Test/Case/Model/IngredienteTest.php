<?php
App::uses('Ingrediente', 'Model');

/**
 * Ingrediente Test Case
 *
 */
class IngredienteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ingrediente',
		'app.resto',
		'app.direpai',
		'app.direprovincia',
		'app.restosurcusale',
		'app.user',
		'app.role',
		'app.rolemodulo',
		'app.modulo',
		'app.ingredientetipo',
		'app.ingredientestock',
		'app.platoingre',
		'app.proveedoreingre',
		'app.medida'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ingrediente = ClassRegistry::init('Ingrediente');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ingrediente);

		parent::tearDown();
	}

}
