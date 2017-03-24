<?php
App::uses('AppModel', 'Model');
/**
 * Almacenmarcadetalle Model
 *
 * @property Almacenmateriale $Almacenmateriale
 */
class Almacenmarcadetalle extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'almacenmateriale_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
		'default' => array(
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
		'Almacenmarca' => array(
			'className' => 'Almacenmarca',
			'foreignKey' => 'almacenmarca_id',
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
