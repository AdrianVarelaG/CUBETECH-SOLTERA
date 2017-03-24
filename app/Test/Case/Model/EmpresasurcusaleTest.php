<?php
App::uses('Empresasurcusale', 'Model');

/**
 * Empresasurcusale Test Case
 *
 */
class EmpresasurcusaleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.empresasurcusale',
		'app.empresa',
		'app.direpai',
		'app.direprovincia',
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
		$this->Empresasurcusale = ClassRegistry::init('Empresasurcusale');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Empresasurcusale);

		parent::tearDown();
	}

}
