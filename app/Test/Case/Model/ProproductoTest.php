<?php
App::uses('Proproducto', 'Model');

/**
 * Proproducto Test Case
 *
 */
class ProproductoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.proproducto',
		'app.protipo',
		'app.promarca',
		'app.proinventario'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Proproducto = ClassRegistry::init('Proproducto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Proproducto);

		parent::tearDown();
	}

}
