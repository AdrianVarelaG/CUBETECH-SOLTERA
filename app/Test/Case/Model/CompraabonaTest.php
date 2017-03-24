<?php
App::uses('Compraabona', 'Model');

/**
 * Compraabona Test Case
 *
 */
class CompraabonaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.compraabona',
		'app.compra',
		'app.proveedore',
		'app.tipocompra'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Compraabona = ClassRegistry::init('Compraabona');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Compraabona);

		parent::tearDown();
	}

}
