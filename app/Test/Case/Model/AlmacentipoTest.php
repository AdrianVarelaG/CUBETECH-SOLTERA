<?php
App::uses('Almacentipo', 'Model');

/**
 * Almacentipo Test Case
 *
 */
class AlmacentipoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.almacentipo',
		'app.resto',
		'app.direpai',
		'app.direprovincia',
		'app.restosurcusale',
		'app.user',
		'app.role',
		'app.rolemodulo',
		'app.modulo',
		'app.almacene'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Almacentipo = ClassRegistry::init('Almacentipo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Almacentipo);

		parent::tearDown();
	}

}
