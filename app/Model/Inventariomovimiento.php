<?php
App::uses('AppModel', 'Model');
/**
 * Inventariomovimiento Model
 *
 * @property Empresa $Empresa
 * @property Empresasurcusale $Empresasurcusale
 * @property Almacentipo $Almacentipo
 * @property Almacene $Almacene
 * @property Almacenproducto $Almacenproducto
 * @property Almacentipofunte $Almacentipofunte
 * @property Almacenefunte $Almacenefunte
 * @property Ordenventa $Ordenventa
 * @property Userventa $Userventa
 * @property Inventariomovimateriale $Inventariomovimateriale
 */
class Inventariomovimiento extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'inventariomovimientos';

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
		'cantidad' => array(
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
		'Almacenproducto' => array(
			'className' => 'Almacenproducto',
			'foreignKey' => 'almacenproducto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Almacentipofunte' => array(
			'className' => 'Almacentipofunte',
			'foreignKey' => 'almacentipofunte_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Almacenefunte' => array(
			'className' => 'Almacenefunte',
			'foreignKey' => 'almacenefunte_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		/*'Ordenventa' => array(
			'className' => 'Ordenventa',
			'foreignKey' => 'ordenventa_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),*/
		'Userventa' => array(
			'className' => 'Userventa',
			'foreignKey' => 'userventa_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Inventariomovimateriale' => array(
			'className' => 'Inventariomovimateriale',
			'foreignKey' => 'inventariomovimiento_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
