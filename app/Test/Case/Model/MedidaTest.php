<?php
App::uses('Medida', 'Model');

/**
 * Medida Test Case
 *
 */
class MedidaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.medida',
		'app.ingrediente'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Medida = ClassRegistry::init('Medida');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Medida);

		parent::tearDown();
	}

}
