<?php
/**
 * HabitacioneFixture
 *
 */
class HabitacioneFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'tipohabitacione_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'numhabitacion' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'descripcion' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 300, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'capacidad' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			
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
			'tipohabitacione_id' => 1,
			'numhabitacion' => 1,
			'descripcion' => 'Lorem ipsum dolor sit amet',
			'capacidad' => 1,
			'created' => '2016-10-23 21:27:55',
			'modified' => '2016-10-23 21:27:55'
		),
	);

}
