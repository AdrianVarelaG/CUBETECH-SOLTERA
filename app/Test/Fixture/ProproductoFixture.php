<?php
/**
 * ProproductoFixture
 *
 */
class ProproductoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'protipo_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'promarca_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'cod_producto' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'denominacion' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 300, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'plan_cuenta' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 300, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'precio_compra' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '26,2', 'unsigned' => false),
		'ganancia' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '26,2', 'unsigned' => false),
		'precio_neto' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '26,2', 'unsigned' => false),
		'iva' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '26,2', 'unsigned' => false),
		'pvp' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '26,2', 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modifed' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'cod_producto' => 'Lorem ipsum dolor sit amet',
			'denominacion' => 'Lorem ipsum dolor sit amet',
			'plan_cuenta' => 'Lorem ipsum dolor sit amet',
			'precio_compra' => 1,
			'ganancia' => 1,
			'precio_neto' => 1,
			'iva' => 1,
			'pvp' => 1,
			'created' => '2016-10-25 17:34:43',
			'modifed' => '2016-10-25 17:34:43'
		),
	);

}
