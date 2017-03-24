<?php
App::uses('Dirmunicipio', 'Model');

/**
 * Dirmunicipio Test Case
 *
 */
class DirmunicipioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.dirmunicipio',
		'app.direpai',
		'app.direprovincia',
		'app.empresa',
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
		$this->Dirmunicipio = ClassRegistry::init('Dirmunicipio');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Dirmunicipio);

		parent::tearDown();
	}

}
