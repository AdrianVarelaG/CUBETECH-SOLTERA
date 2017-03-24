<?php
/**
 * FacturapagoFixture
 *
 */
class FacturapagoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'factura_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'facturatipopago_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'fecha_pago' => array('type' => 'date', 'null' => false, 'default' => null),
		'numero_pago' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'pago' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '26,2', 'unsigned' => false),
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
			'factura_id' => 1,
			'facturatipopago_id' => 1,
			'fecha_pago' => '2016-12-08',
			'numero_pago' => 'Lorem ipsum dolor sit amet',
			'pago' => 1,
			'created' => '2016-12-08 14:57:43',
			'modified' => '2016-12-08 14:57:43'
		),
	);

}
