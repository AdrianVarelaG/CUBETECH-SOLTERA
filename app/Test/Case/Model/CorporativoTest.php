<?php
App::uses('Corporativo', 'Model');

/**
 * Corporativo Test Case
 *
 */
class CorporativoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.corporativo',
		'app.cliente',
		'app.tarjetacredito',
		'app.tipotarjeta',
		'app.agencia'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Corporativo = ClassRegistry::init('Corporativo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Corporativo);

		parent::tearDown();
	}

}
