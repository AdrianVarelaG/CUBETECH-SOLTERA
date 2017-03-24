<?php
App::uses('Tipotemporada', 'Model');

/**
 * Tipotemporada Test Case
 *
 */
class TipotemporadaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tipotemporada'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tipotemporada = ClassRegistry::init('Tipotemporada');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tipotemporada);

		parent::tearDown();
	}

}
