<?php
App::uses('AppModel', 'Model');
/**
 * Dirmunicipio Model
 *
 * @property Direpai $Direpai
 * @property Direprovincia $Direprovincia
 */
class Dirmunicipio extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'denominacion';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'direpai_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'direprovincia_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'denominacion' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
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
		'Direpai' => array(
			'className' => 'Direpai',
			'foreignKey' => 'direpai_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Direprovincia' => array(
			'className' => 'Direprovincia',
			'foreignKey' => 'direprovincia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
