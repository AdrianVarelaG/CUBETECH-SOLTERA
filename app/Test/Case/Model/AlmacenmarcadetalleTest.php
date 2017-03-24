<?php
App::uses('Almacenmarcadetalle', 'Model');

/**
 * Almacenmarcadetalle Test Case
 *
 */
class AlmacenmarcadetalleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.almacenmarcadetalle',
		'app.almacenmateriale',
		'app.empresa',
		'app.direpai',
		'app.direprovincia',
		'app.empresasurcusale',
		'app.user',
		'app.role',
		'app.rolemodulo',
		'app.modulo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Almacenmarcadetalle = ClassRegistry::init('Almacenmarcadetalle');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Almacenmarcadetalle);

		parent::tearDown();
	}

}
