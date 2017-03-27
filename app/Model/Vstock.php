<?php
App::uses('AppModel', 'Model');
/**
 * Vstock Model
 *
 * @property Almacenproducto $Almacenproducto
 * @property Almacene $Almacene
 */
class Vstock extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'n';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Almacenproducto' => array(
			'className' => 'Almacenproducto',
			'foreignKey' => 'almacenproducto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Almacene' => array(
			'className' => 'Almacene',
			'foreignKey' => 'almacene_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
