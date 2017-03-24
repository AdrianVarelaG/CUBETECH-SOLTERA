<?php
App::uses('AppModel', 'Model');
/**
 * Almacenproductodetalle Model
 *
 * @property Almacenproducto $Almacenproducto
 * @property Almacenmateriale $Almacenmateriale
 */
class Almacenproductodetalle extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'almacenproducto_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'almacenproducto_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'almacenmateriale_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

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
		'Almacenmateriale' => array(
			'className' => 'Almacenmateriale',
			'foreignKey' => 'almacenmateriale_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
