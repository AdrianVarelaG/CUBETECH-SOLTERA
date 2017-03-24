<?php
App::uses('Cajaapertura', 'Model');

/**
 * Cajaapertura Test Case
 *
 */
class CajaaperturaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cajaapertura',
		'app.caja',
		'app.cajaturno',
		'app.cajaacierreturno',
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
		$this->Cajaapertura = ClassRegistry::init('Cajaapertura');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cajaapertura);

		parent::tearDown();
	}

}
