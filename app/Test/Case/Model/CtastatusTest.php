<?php
App::uses('Ctastatus', 'Model');

/**
 * Ctastatus Test Case
 *
 */
class CtastatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ctastatus'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ctastatus = ClassRegistry::init('Ctastatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ctastatus);

		parent::tearDown();
	}

}
