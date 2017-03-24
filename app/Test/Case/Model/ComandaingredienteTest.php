<?php
App::uses('Comandaingrediente', 'Model');

/**
 * Comandaingrediente Test Case
 *
 */
class ComandaingredienteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.comandaingrediente',
		'app.resto',
		'app.restosurcusale',
		'app.user',
		'app.role',
		'app.rolemodulo',
		'app.modulo',
		'app.ingredientetipo',
		'app.ingrediente',
		'app.medida',
		'app.ingredientestock',
		'app.platoingre',
		'app.proveedoreingre',
		'app.proveedore'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Comandaingrediente = ClassRegistry::init('Comandaingrediente');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Comandaingrediente);

		parent::tearDown();
	}

}
