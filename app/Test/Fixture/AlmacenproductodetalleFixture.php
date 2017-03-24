<?php
/**
 * AlmacenproductodetalleFixture
 *
 */
class AlmacenproductodetalleFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'almacenproducto_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'almacenmateriale_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'cantidad' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '26,2', 'unsigned' => false),
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
			'almacenproducto_id' => 1,
			'almacenmateriale_id' => 1,
			'cantidad' => '',
			'created' => '2017-02-16 23:33:52',
			'modified' => '2017-02-16 23:33:52'
		),
	);

}
