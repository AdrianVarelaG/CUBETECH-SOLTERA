<?php
App::uses('Tipocliente', 'Model');

/**
 * Tipocliente Test Case
 *
 */
class TipoclienteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tipocliente',
		'app.cliente'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tipocliente = ClassRegistry::init('Tipocliente');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tipocliente);

		parent::tearDown();
	}

}
