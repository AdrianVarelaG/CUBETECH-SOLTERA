<?php
App::uses('Impresione', 'Model');

/**
 * Impresione Test Case
 *
 */
class ImpresioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.impresione',
		'app.tipoimpresora'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Impresione = ClassRegistry::init('Impresione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Impresione);

		parent::tearDown();
	}

}
