<?php
/**
 * VentaFixture
 *
 */
class VentaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'empresa_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'empresasurcusale_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'cliente_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'almacentipo_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'almacene_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'pagado' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => 'Es un campo con valores permitidos [SI|NO] no puede editarse y el valor inicial es NO.'),
		'total' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '26,2', 'unsigned' => false),
		'estado' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => 'Registrado Si el campo Tipo Pedido Tiene el valor venta, Pendiente Autorizar Si el campo Tipo Pedido Tiene el valor Cortesia'),
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
			'empresasurcusale_id' => 1,
			'cliente_id' => 1,
			'user_id' => 1,
			'almacentipo_id' => 1,
			'almacene_id' => 1,
			'pagado' => 1,
			'total' => '',
			'estado' => 1,
			'created' => '2017-02-20 16:56:57',
			'modified' => '2017-02-20 16:56:57'
		),
	);

}
