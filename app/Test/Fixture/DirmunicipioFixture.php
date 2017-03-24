<?php
/**
 * DirmunicipioFixture
 *
 */
class DirmunicipioFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'direpai_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'direprovincia_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'denominacion' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'direpai_id' => 1,
			'direprovincia_id' => 1,
			'denominacion' => 'Lorem ipsum dolor sit amet',
			'created' => '2017-02-13 11:54:14',
			'modified' => '2017-02-13 11:54:14'
		),
	);

}
