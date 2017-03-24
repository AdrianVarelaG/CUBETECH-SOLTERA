<?php
App::uses('Conftipopagoreserva', 'Model');

/**
 * Conftipopagoreserva Test Case
 *
 */
class ConftipopagoreservaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.conftipopagoreserva'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Conftipopagoreserva = ClassRegistry::init('Conftipopagoreserva');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Conftipopagoreserva);

		parent::tearDown();
	}

}
