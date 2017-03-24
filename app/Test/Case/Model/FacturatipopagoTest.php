<?php
App::uses('Facturatipopago', 'Model');

/**
 * Facturatipopago Test Case
 *
 */
class FacturatipopagoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facturatipopago',
		'app.facturapago'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Facturatipopago = ClassRegistry::init('Facturatipopago');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Facturatipopago);

		parent::tearDown();
	}

}
