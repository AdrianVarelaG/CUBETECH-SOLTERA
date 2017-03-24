<?php
App::uses('Comanda', 'Model');

/**
 * Comanda Test Case
 *
 */
class ComandaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.comanda',
		'app.user',
		'app.role',
		'app.rolemodulo',
		'app.modulo',
		'app.resto',
		'app.restosurcusale',
		'app.mesa',
		'app.mesatipo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Comanda = ClassRegistry::init('Comanda');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Comanda);

		parent::tearDown();
	}

}
