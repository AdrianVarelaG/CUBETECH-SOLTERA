<?php
App::uses('Platoingre', 'Model');

/**
 * Platoingre Test Case
 *
 */
class PlatoingreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.platoingre',
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
		'app.proveedoreingre'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Platoingre = ClassRegistry::init('Platoingre');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Platoingre);

		parent::tearDown();
	}

}
