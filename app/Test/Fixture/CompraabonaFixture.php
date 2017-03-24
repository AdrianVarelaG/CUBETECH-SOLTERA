<?php
/**
 * CompraabonaFixture
 *
 */
class CompraabonaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'compra_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'num_pago' => array('type' => 'date', 'null' => false, 'default' => null),
		'fecha_pago' => array('type' => 'date', 'null' => false, 'default' => null),
		'num_cheque' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'fecha_cobro_cheque' => array('type' => 'date', 'null' => false, 'default' => null),
		'descripcion' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'cancelado' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '26,2', 'unsigned' => false),
		'deuda' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '26,2', 'unsigned' => false),
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
			'compra_id' => 1,
			'num_pago' => '2016-11-19',
			'fecha_pago' => '2016-11-19',
			'num_cheque' => 'Lorem ipsum dolor sit amet',
			'fecha_cobro_cheque' => '2016-11-19',
			'descripcion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'cancelado' => 1,
			'deuda' => 1,
			'created' => '2016-11-19 22:25:47',
			'modified' => '2016-11-19 22:25:47'
		),
	);

}
