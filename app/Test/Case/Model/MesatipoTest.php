<?php
App::uses('Mesatipo', 'Model');

/**
 * Mesatipo Test Case
 *
 */
class MesatipoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.mesatipo',
		'app.mesa'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Mesatipo = ClassRegistry::init('Mesatipo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Mesatipo);

		parent::tearDown();
	}

}
