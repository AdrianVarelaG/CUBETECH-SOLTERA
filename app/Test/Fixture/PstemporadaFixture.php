<?php
/**
 * PstemporadaFixture
 *
 */
class PstemporadaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'tipotemporada_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'tipohabitacione_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'precio' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '26,2', 'unsigned' => false),
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
			'tipotemporada_id' => 1,
			'tipohabitacione_id' => 1,
			'precio' => 1,
			'created' => '2016-10-23 22:19:34',
			'modified' => '2016-10-23 22:19:34'
		),
	);

}
