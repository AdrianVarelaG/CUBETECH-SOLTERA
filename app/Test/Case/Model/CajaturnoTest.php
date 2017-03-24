<?php
App::uses('Cajaturno', 'Model');

/**
 * Cajaturno Test Case
 *
 */
class CajaturnoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cajaturno',
		'app.cajaacierreturno'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cajaturno = ClassRegistry::init('Cajaturno');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cajaturno);

		parent::tearDown();
	}

}
