<?php
App::uses('Ingredientetipo', 'Model');

/**
 * Ingredientetipo Test Case
 *
 */
class IngredientetipoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ingredientetipo',
		'app.resto',
		'app.direpai',
		'app.direprovincia',
		'app.restosurcusale',
		'app.user',
		'app.role',
		'app.rolemodulo',
		'app.modulo',
		'app.ingrediente',
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
		$this->Ingredientetipo = ClassRegistry::init('Ingredientetipo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ingredientetipo);

		parent::tearDown();
	}

}
