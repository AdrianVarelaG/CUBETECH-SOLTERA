<?php
/**
 * TarjetacreditoFixture
 *
 */
class TarjetacreditoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'cliente_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'tipotarjeta_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'num_tajeta' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'vencimiento' => array('type' => 'date', 'null' => false, 'default' => null),
		'nombre_segun_tarjeta' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'cuatro_ultimos' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'cliente_id' => 1,
			'tipotarjeta_id' => 1,
			'num_tajeta' => 'Lorem ipsum dolor sit amet',
			'vencimiento' => '2016-10-21',
			'nombre_segun_tarjeta' => 'Lorem ipsum dolor sit amet',
			'cuatro_ultimos' => 'Lorem ip'
		),
	);

}
