<?php
/**
 * AlmacenproductoFixture
 *
 */
class AlmacenproductoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'empresa_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'descripcion' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1000, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'almacenmarca_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'fechaalta' => array('type' => 'date', 'null' => false, 'default' => null),
		'precio' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '26,2', 'unsigned' => false),
		'activo' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false),
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
			'empresa_id' => 1,
			'nombre' => 'Lorem ipsum dolor sit amet',
			'descripcion' => 'Lorem ipsum dolor sit amet',
			'almacenmarca_id' => 1,
			'fechaalta' => '2017-02-16',
			'precio' => '',
			'activo' => 1,
			'created' => '2017-02-16 23:33:37',
			'modified' => '2017-02-16 23:33:37'
		),
	);

}
