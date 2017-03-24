<?php
/**
 * InventariomovimientoFixture
 *
 */
class InventariomovimientoFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'Inventariomovimientos';

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
		'almacenproducto_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'tipo' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'cantidad' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '26,2', 'unsigned' => false),
		'almacentipofunte_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'almacenefunte_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'fechaalta' => array('type' => 'date', 'null' => false, 'default' => null),
		'referencia' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1000, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ordenventa_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'userventa_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'almacenproducto_id' => 1,
			'tipo' => 1,
			'cantidad' => '',
			'almacentipofunte_id' => 1,
			'almacenefunte_id' => 1,
			'fechaalta' => '2017-02-17',
			'referencia' => 'Lorem ipsum dolor sit amet',
			'ordenventa_id' => 1,
			'userventa_id' => 1,
			'created' => '2017-02-17 11:37:35',
			'modified' => '2017-02-17 11:37:35'
		),
	);

}
