<?php
App::uses('Nominamesero', 'Model');

/**
 * Nominamesero Test Case
 *
 */
class NominameseroTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.nominamesero',
		'app.nominapersonale'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Nominamesero = ClassRegistry::init('Nominamesero');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Nominamesero);

		parent::tearDown();
	}

}
