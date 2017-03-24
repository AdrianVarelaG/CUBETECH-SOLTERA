<?php
/**
 * IngredientestockFixture
 *
 */
class IngredientestockFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'resto_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'restosurcusale_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'ingredientetipo_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'ingrediente_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'stock' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'cantidad_minimo' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'precio' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '26,2', 'unsigned' => false),
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
			'restosurcusale_id' => 1,
			'ingredientetipo_id' => 1,
			'ingrediente_id' => 1,
			'stock' => 1,
			'cantidad_minimo' => 1,
			'precio' => 1,
			'created' => '2017-01-18 19:29:49',
			'modified' => '2017-01-18 19:29:49'
		),
	);

}
