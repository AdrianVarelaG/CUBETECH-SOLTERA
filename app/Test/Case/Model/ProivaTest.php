<?php
App::uses('Proiva', 'Model');

/**
 * Proiva Test Case
 *
 */
class ProivaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.proiva'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Proiva = ClassRegistry::init('Proiva');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Proiva);

		parent::tearDown();
	}

}
