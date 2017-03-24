<?php
App::uses('Almacenmarca', 'Model');

/**
 * Almacenmarca Test Case
 *
 */
class AlmacenmarcaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.almacenmarca'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Almacenmarca = ClassRegistry::init('Almacenmarca');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Almacenmarca);

		parent::tearDown();
	}

}
