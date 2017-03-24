<?php
App::uses('Proalmacene', 'Model');

/**
 * Proalmacene Test Case
 *
 */
class ProalmaceneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.proalmacene',
		'app.protipopiso'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Proalmacene = ClassRegistry::init('Proalmacene');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Proalmacene);

		parent::tearDown();
	}

}
