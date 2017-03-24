<?php
App::uses('Protipo', 'Model');

/**
 * Protipo Test Case
 *
 */
class ProtipoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.protipo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Protipo = ClassRegistry::init('Protipo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Protipo);

		parent::tearDown();
	}

}
