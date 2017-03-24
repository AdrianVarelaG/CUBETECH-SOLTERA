<?php
App::uses('Tipoimpresora', 'Model');

/**
 * Tipoimpresora Test Case
 *
 */
class TipoimpresoraTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tipoimpresora'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tipoimpresora = ClassRegistry::init('Tipoimpresora');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tipoimpresora);

		parent::tearDown();
	}

}
