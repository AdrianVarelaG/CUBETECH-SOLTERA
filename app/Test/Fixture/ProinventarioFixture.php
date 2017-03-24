<?php
/**
 * ProinventarioFixture
 *
 */
class ProinventarioFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'protipo_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'promarca_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'proproducto_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'protipopiso_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'proalmacene_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'cantidad' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '26,2', 'unsigned' => false),
		'cantidadminima' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '26,2', 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '',
			'protipo_id' => 1,
			'promarca_id' => 1,
			'proproducto_id' => 1,
			'protipopiso_id' => 1,
			'proalmacene_id' => 1,
			'cantidad' => 1,
			'cantidadminima' => 1,
			'created' => '2016-10-25 22:53:45',
			'modified' => '2016-10-25 22:53:45'
		),
	);

}
