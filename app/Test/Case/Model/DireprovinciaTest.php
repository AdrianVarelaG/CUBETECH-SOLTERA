<?php
App::uses('Direprovincia', 'Model');

/**
 * Direprovincia Test Case
 *
 */
class DireprovinciaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.direprovincia',
		'app.direpai',
		'app.resto'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Direprovincia = ClassRegistry::init('Direprovincia');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Direprovincia);

		parent::tearDown();
	}

}
