<?php
App::uses('AppModel', 'Model');
/**
 * Inventariomovimateriale Model
 *
 * @property Empresa $Empresa
 * @property Empresasurcusale $Empresasurcusale
 * @property Almacentipo $Almacentipo
 * @property Almacene $Almacene
 * @property Almacenmateriale $Almacenmateriale
 * @property Usermovi $Usermovi
 * @property Inventariomovimiento $Inventariomovimiento
 */
class Inventariomovimateriale extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'Inventariomovimateriales';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'almacene_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'empresa_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'empresasurcusale_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'almacentipo_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'almacene_id' => array(
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
		'tipo' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tipo' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Empresa' => array(
			'className' => 'Empresa',
			'foreignKey' => 'empresa_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Empresasurcusale' => array(
			'className' => 'Empresasurcusale',
			'foreignKey' => 'empresasurcusale_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Almacentipo' => array(
			'className' => 'Almacentipo',
			'foreignKey' => 'almacentipo_id',
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
		),
		'Almacenmateriale' => array(
			'className' => 'Almacenmateriale',
			'foreignKey' => 'almacenmateriale_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Usermovi' => array(
			'className' => 'Usermovi',
			'foreignKey' => 'usermovi_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Inventariomovimiento' => array(
			'className' => 'Inventariomovimiento',
			'foreignKey' => 'inventariomovimiento_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
