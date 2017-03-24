<?php
App::uses('Almacenmateriale', 'Model');

/**
 * Almacenmateriale Test Case
 *
 */
class AlmacenmaterialeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		$this->Almacenmateriale = ClassRegistry::init('Almacenmateriale');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Almacenmateriale);

		parent::tearDown();
	}

}
