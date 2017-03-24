<?php
App::uses('Almacene', 'Model');

/**
 * Almacene Test Case
 *
 */
class AlmaceneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.almacene',
		'app.resto',
		'app.direpai',
		'app.direprovincia',
		'app.restosurcusale',
		'app.user',
		'app.role',
		'app.rolemodulo',
		'app.modulo',
		'app.almacentipo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Almacene = ClassRegistry::init('Almacene');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Almacene);

		parent::tearDown();
	}

}
