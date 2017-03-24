<?php
App::uses('AppModel', 'Model');
/**
 * Ventadetalle Model
 *
 * @property Venta $Venta
 * @property Almacenproducto $Almacenproducto
 */
class Ventadetalle extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'venta_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'venta_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
		'embalaje' => array(
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
		'Venta' => array(
			'className' => 'Venta',
			'foreignKey' => 'venta_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Almacenproducto' => array(
			'className' => 'Almacenproducto',
			'foreignKey' => 'almacenproducto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Almacenmateriale' => array(
			'className' => 'Almacenmateriale',
			'foreignKey' => 'embalaje',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
