<?php
App::uses('Rolemodulo', 'Model');

/**
 * Rolemodulo Test Case
 *
 */
class RolemoduloTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.rolemodulo',
		'app.role',
		'app.user',
		'app.modulo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Rolemodulo = ClassRegistry::init('Rolemodulo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Rolemodulo);

		parent::tearDown();
	}

}
