<?php
App::uses('Comandaplato', 'Model');

/**
 * Comandaplato Test Case
 *
 */
class ComandaplatoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.comandaplato',
		'app.resto',
		'app.restosurcusale',
		'app.user',
		'app.role',
		'app.rolemodulo',
		'app.modulo',
		'app.platotipo',
		'app.plato'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Comandaplato = ClassRegistry::init('Comandaplato');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Comandaplato);

		parent::tearDown();
	}

}
