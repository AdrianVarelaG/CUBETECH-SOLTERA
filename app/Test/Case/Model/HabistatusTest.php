<?php
App::uses('Habistatus', 'Model');

/**
 * Habistatus Test Case
 *
 */
class HabistatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.habistatus'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Habistatus = ClassRegistry::init('Habistatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Habistatus);

		parent::tearDown();
	}

}
