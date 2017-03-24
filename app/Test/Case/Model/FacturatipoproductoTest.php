<?php
App::uses('Facturatipoproducto', 'Model');

/**
 * Facturatipoproducto Test Case
 *
 */
class FacturatipoproductoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facturatipoproducto',
		'app.facturadetalle'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Facturatipoproducto = ClassRegistry::init('Facturatipoproducto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Facturatipoproducto);

		parent::tearDown();
	}

}
