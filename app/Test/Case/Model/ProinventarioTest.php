<?php
App::uses('Proinventario', 'Model');

/**
 * Proinventario Test Case
 *
 */
class ProinventarioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.proinventario',
		'app.protipo',
		'app.promarca',
		'app.proproducto'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Proinventario = ClassRegistry::init('Proinventario');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Proinventario);

		parent::tearDown();
	}

}
