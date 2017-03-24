<?php
/**
 * InventariomovimaterialeFixture
 *
 */
class InventariomovimaterialeFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'Inventariomovimateriales';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'empresa_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'empresasurcusale_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'almacentipo_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'almacene_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'almacenmateriale_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'tipo' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'cantidad' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '26,2', 'unsigned' => false),
		'fechaalta' => array('type' => 'date', 'null' => false, 'default' => null),
		'usermovi_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'inventariomovimiento_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'empresasurcusale_id' => 1,
			'almacentipo_id' => 1,
			'almacene_id' => 1,
			'almacenmateriale_id' => 1,
			'tipo' => 1,
			'cantidad' => '',
			'fechaalta' => '2017-02-17',
			'usermovi_id' => 1,
			'inventariomovimiento_id' => 1,
			'activo' => 1,
			'created' => '2017-02-17 10:49:26',
			'modified' => '2017-02-17 10:49:26'
		),
	);

}
