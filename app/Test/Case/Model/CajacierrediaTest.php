<?php
App::uses('Cajacierredia', 'Model');

/**
 * Cajacierredia Test Case
 *
 */
class CajacierrediaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cajacierredia',
		'app.caja',
		'app.user',
		'app.role',
		'app.personale'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cajacierredia = ClassRegistry::init('Cajacierredia');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cajacierredia);

		parent::tearDown();
	}

}
