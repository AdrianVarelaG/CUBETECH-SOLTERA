<?php
App::uses('Inventariomovimiento', 'Model');

/**
 * Inventariomovimiento Test Case
 *
 */
class InventariomovimientoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.inventariomovimiento',
		'app.empresa',
		'app.direpai',
		'app.direprovincia',
		'app.empresasurcusale',
		'app.user',
		'app.role',
		'app.rolemodulo',
		'app.modulo',
		'app.almacentipo',
		'app.almacene',
		'app.almacenproducto',
		'app.almacenmarca',
		'app.almacenmarcadetalle',
		'app.almacenmateriale',
		'app.almacenproductodetalle',
		'app.almacentipofunte',
		'app.almacenefunte',
		'app.ordenventa',
		'app.userventa',
		'app.inventariomovimateriale',
		'app.usermovi'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Inventariomovimiento = ClassRegistry::init('Inventariomovimiento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Inventariomovimiento);

		parent::tearDown();
	}

}
