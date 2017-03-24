<?php
App::uses('Almacenproductodetalle', 'Model');

/**
 * Almacenproductodetalle Test Case
 *
 */
class AlmacenproductodetalleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.almacenproductodetalle',
		'app.almacenproducto',
		'app.empresa',
		'app.direpai',
		'app.direprovincia',
		'app.empresasurcusale',
		'app.user',
		'app.role',
		'app.rolemodulo',
		'app.modulo',
		'app.almacenmarca',
		'app.almacenmarcadetalle',
		'app.almacenmateriale'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Almacenproductodetalle = ClassRegistry::init('Almacenproductodetalle');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Almacenproductodetalle);

		parent::tearDown();
	}

}
