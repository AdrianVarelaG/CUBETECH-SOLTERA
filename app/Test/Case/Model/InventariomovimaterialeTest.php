<?php
App::uses('Inventariomovimateriale', 'Model');

/**
 * Inventariomovimateriale Test Case
 *
 */
class InventariomovimaterialeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.inventariomovimateriale',
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
		'app.almacenmateriale',
		'app.usermovi',
		'app.inventariomovimiento'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Inventariomovimateriale = ClassRegistry::init('Inventariomovimateriale');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Inventariomovimateriale);

		parent::tearDown();
	}

}
