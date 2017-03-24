<?php
App::uses('Restosurcusale', 'Model');

/**
 * Restosurcusale Test Case
 *
 */
class RestosurcusaleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.restosurcusale',
		'app.resto',
		'app.direpai',
		'app.direprovincia',
		'app.user',
		'app.role',
		'app.rolemodulo',
		'app.modulo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Restosurcusale = ClassRegistry::init('Restosurcusale');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Restosurcusale);

		parent::tearDown();
	}

}
