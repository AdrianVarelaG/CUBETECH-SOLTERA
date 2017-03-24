<?php
App::uses('Promarca', 'Model');

/**
 * Promarca Test Case
 *
 */
class PromarcaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.promarca',
		'app.protipo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Promarca = ClassRegistry::init('Promarca');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Promarca);

		parent::tearDown();
	}

}
