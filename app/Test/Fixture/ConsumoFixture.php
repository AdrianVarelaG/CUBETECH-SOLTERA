<?php
/**
 * ConsumoFixture
 *
 */
class ConsumoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'tipohabitacione_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'habitacione_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'reserindividuale_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'ano_consumo' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'num_consumo' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'fecha_consumo' => array('type' => 'date', 'null' => false, 'default' => null),
		'observaciones' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'total' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '26,2', 'unsigned' => false),
		'pagado' => array('type' => 'float', 'null' => false, 'default' => '0.00', 'length' => '26,2', 'unsigned' => false),
		'deuda' => array('type' => 'float', 'null' => false, 'default' => '0.00', 'length' => '26,2', 'unsigned' => false),
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
			'tipohabitacione_id' => 1,
			'habitacione_id' => 1,
			'reserindividuale_id' => 1,
			'ano_consumo' => 'Lorem ip',
			'num_consumo' => 'Lorem ipsum dolor sit amet',
			'fecha_consumo' => '2016-11-10',
			'observaciones' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'total' => 1,
			'pagado' => 1,
			'deuda' => 1,
			'created' => '2016-11-10 23:32:46',
			'modified' => '2016-11-10 23:32:46'
		),
	);

}
