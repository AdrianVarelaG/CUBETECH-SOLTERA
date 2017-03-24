<?php
App::uses('Tipoclientesub', 'Model');

/**
 * Tipoclientesub Test Case
 *
 */
class TipoclientesubTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tipoclientesub',
		'app.tipocliente',
		'app.cliente',
		'app.agencia',
		'app.tarjetacredito',
		'app.tipotarjeta',
		'app.corporativo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tipoclientesub = ClassRegistry::init('Tipoclientesub');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tipoclientesub);

		parent::tearDown();
	}

}
