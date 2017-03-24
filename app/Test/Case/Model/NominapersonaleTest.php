<?php
App::uses('Nominapersonale', 'Model');

/**
 * Nominapersonale Test Case
 *
 */
class NominapersonaleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.nominapersonale',
		'app.nominamesero'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Nominapersonale = ClassRegistry::init('Nominapersonale');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Nominapersonale);

		parent::tearDown();
	}

}
