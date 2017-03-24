<?php
App::uses('Almacenproducto', 'Model');

/**
 * Almacenproducto Test Case
 *
 */
class AlmacenproductoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		'app.almacenmateriale',
		'app.almacenproductodetalle'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Almacenproducto = ClassRegistry::init('Almacenproducto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Almacenproducto);

		parent::tearDown();
	}

}
