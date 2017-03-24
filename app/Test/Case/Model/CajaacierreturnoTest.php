<?php
App::uses('Cajaacierreturno', 'Model');

/**
 * Cajaacierreturno Test Case
 *
 */
class CajaacierreturnoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cajaacierreturno',
		'app.caja',
		'app.cajaturno',
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
		$this->Cajaacierreturno = ClassRegistry::init('Cajaacierreturno');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cajaacierreturno);

		parent::tearDown();
	}

}
