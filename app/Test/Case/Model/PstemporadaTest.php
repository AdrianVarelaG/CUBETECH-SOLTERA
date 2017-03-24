<?php
App::uses('Pstemporada', 'Model');

/**
 * Pstemporada Test Case
 *
 */
class PstemporadaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pstemporada',
		'app.tipotemporada',
		'app.tipohabitacione',
		'app.habitacione'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Pstemporada = ClassRegistry::init('Pstemporada');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Pstemporada);

		parent::tearDown();
	}

}
