<?php
App::uses('Reserstatusmultiple', 'Model');

/**
 * Reserstatusmultiple Test Case
 *
 */
class ReserstatusmultipleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.reserstatusmultiple'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Reserstatusmultiple = ClassRegistry::init('Reserstatusmultiple');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Reserstatusmultiple);

		parent::tearDown();
	}

}
