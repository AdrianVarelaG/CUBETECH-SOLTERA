<?php
App::uses('Personale', 'Model');

/**
 * Personale Test Case
 *
 */
class PersonaleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.personale'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Personale = ClassRegistry::init('Personale');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Personale);

		parent::tearDown();
	}

}
