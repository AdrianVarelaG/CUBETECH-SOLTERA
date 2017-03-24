<?php
App::uses('Conftipopago', 'Model');

/**
 * Conftipopago Test Case
 *
 */
class ConftipopagoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.conftipopago'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Conftipopago = ClassRegistry::init('Conftipopago');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Conftipopago);

		parent::tearDown();
	}

}
