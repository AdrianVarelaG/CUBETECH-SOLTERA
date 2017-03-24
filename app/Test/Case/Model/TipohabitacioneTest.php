<?php
App::uses('Tipohabitacione', 'Model');

/**
 * Tipohabitacione Test Case
 *
 */
class TipohabitacioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tipohabitacione',
		'app.habitacione'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tipohabitacione = ClassRegistry::init('Tipohabitacione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tipohabitacione);

		parent::tearDown();
	}

}
