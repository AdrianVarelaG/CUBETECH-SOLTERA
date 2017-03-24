<?php
/**
 * ProductoFixture
 *
 */
class ProductoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'resto_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'productotipo_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'productosubtipo_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'denominacion' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 300, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'medida_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'productotipo_id' => 1,
			'productosubtipo_id' => 1,
			'denominacion' => 'Lorem ipsum dolor sit amet',
			'medida_id' => 1,
			'created' => '2017-01-18 20:28:41',
			'modified' => '2017-01-18 20:28:41'
		),
	);

}
