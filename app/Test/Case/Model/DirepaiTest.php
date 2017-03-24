<?php
App::uses('Direpai', 'Model');

/**
 * Direpai Test Case
 *
 */
class DirepaiTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.direpai',
		'app.direprovincia',
		'app.resto'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Direpai = ClassRegistry::init('Direpai');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Direpai);

		parent::tearDown();
	}

}
