<?php
App::uses('Protipopiso', 'Model');

/**
 * Protipopiso Test Case
 *
 */
class ProtipopisoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.protipopiso'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Protipopiso = ClassRegistry::init('Protipopiso');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Protipopiso);

		parent::tearDown();
	}

}
