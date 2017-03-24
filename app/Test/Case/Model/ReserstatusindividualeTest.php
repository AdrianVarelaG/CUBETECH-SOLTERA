<?php
App::uses('Reserstatusindividuale', 'Model');

/**
 * Reserstatusindividuale Test Case
 *
 */
class ReserstatusindividualeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.reserstatusindividuale'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Reserstatusindividuale = ClassRegistry::init('Reserstatusindividuale');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Reserstatusindividuale);

		parent::tearDown();
	}

}
