<?php
App::uses('Caja', 'Model');

/**
 * Caja Test Case
 *
 */
class CajaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.caja'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Caja = ClassRegistry::init('Caja');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Caja);

		parent::tearDown();
	}

}
