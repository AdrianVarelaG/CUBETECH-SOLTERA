<?php
App::uses('Compratipopago', 'Model');

/**
 * Compratipopago Test Case
 *
 */
class CompratipopagoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.compratipopago'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Compratipopago = ClassRegistry::init('Compratipopago');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Compratipopago);

		parent::tearDown();
	}

}
