<?php
/**
 * PlatoFixture
 *
 */
class PlatoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'resto_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'restosurcusale_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'platotipo_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 300, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'porcion' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'precio' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'id' => 1,
			'resto_id' => 1,
			'restosurcusale_id' => 1,
			'platotipo_id' => 1,
			'nombre' => 'Lorem ipsum dolor sit amet',
			'porcion' => 1,
			'precio' => 1,
			'created' => '2017-01-18 19:32:18',
			'modified' => '2017-01-18 19:32:18'
		),
	);

}
