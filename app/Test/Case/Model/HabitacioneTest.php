<?php
App::uses('Habitacione', 'Model');

/**
 * Habitacione Test Case
 *
 */
class HabitacioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.habitacione',
		'app.tipohabitacione'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Habitacione = ClassRegistry::init('Habitacione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Habitacione);

		parent::tearDown();
	}

}
