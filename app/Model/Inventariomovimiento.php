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

	public function consultaTotales($empresa_id, $empresasurcusale_id, $rol_id, $user_id){
		if($empresa_id==0 && $empresasurcusale_id==0){
					return $this->find('all', array(
																											'conditions' => array('Inventariomovimiento.activo'=>1),
																													 'fields'=>array( 'Inventariomovimiento.empresa_id,
																																						(select a.razon_social from empresas a where a.id=Inventariomovimiento.empresa_id) as deno_empresas,
																																					 Inventariomovimiento.empresasurcusale_id,
																																						(select a.denominacion from empresasurcusales a where a.id=Inventariomovimiento.empresasurcusale_id) as deno_empresasurcusales,
																																					 Inventariomovimiento.almacentipo_id,
																																						(select a.denominacion from almacentipos a where a.id=Inventariomovimiento.almacentipo_id) as deno_almacentipos,
																																					 Inventariomovimiento.almacene_id,
																																						(select a.nombre from almacenes a where a.id=Inventariomovimiento.almacene_id) as deno_almacenes,
																																					 Inventariomovimiento.almacenproducto_id,
																																						(select a.nombre from almacenproductos a where a.id=Inventariomovimiento.almacenproducto_id) as deno_almacenproductos,
																																					 (select SUM(a.cantidad) from inventariomovimientos a where a.activo=1 and (a.tipo=1 or a.tipo_transferencia=1) and a.empresa_id=Inventariomovimiento.empresa_id and a.empresasurcusale_id=Inventariomovimiento.empresasurcusale_id  and a.almacentipo_id=Inventariomovimiento.almacentipo_id  and a.almacene_id=Inventariomovimiento.almacene_id and a.almacenproducto_id=Inventariomovimiento.almacenproducto_id) AS entrada,
																																					 (select SUM(a.cantidad) from inventariomovimientos a where a.activo=1 and (a.tipo=2 or a.tipo_transferencia=2) and a.empresa_id=Inventariomovimiento.empresa_id and a.empresasurcusale_id=Inventariomovimiento.empresasurcusale_id  and a.almacentipo_id=Inventariomovimiento.almacentipo_id  and a.almacene_id=Inventariomovimiento.almacene_id and a.almacenproducto_id=Inventariomovimiento.almacenproducto_id) AS salida
																																					 '
																																				),
																													 'group' => 'Inventariomovimiento.empresa_id, deno_empresas, Inventariomovimiento.empresasurcusale_id, deno_empresasurcusales, Inventariomovimiento.almacentipo_id, deno_almacentipos, Inventariomovimiento.almacene_id, deno_almacenes, Inventariomovimiento.almacenproducto_id, deno_almacenproductos, entrada, salida'
																										));
		}else if($empresa_id!=0 && $empresasurcusale_id==0){
					return $this->find('all', array(
																											'conditions' => array('Inventariomovimiento.activo'=>1, 'Inventariomovimiento.empresa_id'=>$empresa_id),
																													 'fields'=>array( 'Inventariomovimiento.empresa_id,
																																						(select a.razon_social from empresas a where a.id=Inventariomovimiento.empresa_id) as deno_empresas,
																																					 Inventariomovimiento.empresasurcusale_id,
																																						(select a.denominacion from empresasurcusales a where a.id=Inventariomovimiento.empresasurcusale_id) as deno_empresasurcusales,
																																					 Inventariomovimiento.almacentipo_id,
																																						(select a.denominacion from almacentipos a where a.id=Inventariomovimiento.almacentipo_id) as deno_almacentipos,
																																					 Inventariomovimiento.almacene_id,
																																						(select a.nombre from almacenes a where a.id=Inventariomovimiento.almacene_id) as deno_almacenes,
																																					 Inventariomovimiento.almacenproducto_id,
																																						(select a.nombre from almacenproductos a where a.id=Inventariomovimiento.almacenproducto_id) as deno_almacenproductos,
																																					 (select SUM(a.cantidad) from inventariomovimientos a where a.activo=1 and (a.tipo=1 or a.tipo_transferencia=1) and a.empresa_id=Inventariomovimiento.empresa_id and a.empresasurcusale_id=Inventariomovimiento.empresasurcusale_id  and a.almacentipo_id=Inventariomovimiento.almacentipo_id  and a.almacene_id=Inventariomovimiento.almacene_id and a.almacenproducto_id=Inventariomovimiento.almacenproducto_id) AS entrada,
																																					 (select SUM(a.cantidad) from inventariomovimientos a where a.activo=1 and (a.tipo=2 or a.tipo_transferencia=2) and a.empresa_id=Inventariomovimiento.empresa_id and a.empresasurcusale_id=Inventariomovimiento.empresasurcusale_id  and a.almacentipo_id=Inventariomovimiento.almacentipo_id  and a.almacene_id=Inventariomovimiento.almacene_id and a.almacenproducto_id=Inventariomovimiento.almacenproducto_id) AS salida
																																					 '
																																				),
																													 'group' => 'Inventariomovimiento.empresa_id, deno_empresas, Inventariomovimiento.empresasurcusale_id, deno_empresasurcusales, Inventariomovimiento.almacentipo_id, deno_almacentipos, Inventariomovimiento.almacene_id, deno_almacenes, Inventariomovimiento.almacenproducto_id, deno_almacenproductos, entrada, salida'
																										));
			}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==3){
						return  $this->find('all', array(
																											'conditions' => array('Inventariomovimiento.activo'=>1, 'Inventariomovimiento.empresa_id'=>$empresa_id, 'Inventariomovimiento.empresasurcusale_id'=>$empresasurcusale_id),
																													 'fields'=>array( 'Inventariomovimiento.empresa_id,
																																						(select a.razon_social from empresas a where a.id=Inventariomovimiento.empresa_id) as deno_empresas,
																																					 Inventariomovimiento.empresasurcusale_id,
																																						(select a.denominacion from empresasurcusales a where a.id=Inventariomovimiento.empresasurcusale_id) as deno_empresasurcusales,
																																					 Inventariomovimiento.almacentipo_id,
																																						(select a.denominacion from almacentipos a where a.id=Inventariomovimiento.almacentipo_id) as deno_almacentipos,
																																					 Inventariomovimiento.almacene_id,
																																						(select a.nombre from almacenes a where a.id=Inventariomovimiento.almacene_id) as deno_almacenes,
																																					 Inventariomovimiento.almacenproducto_id,
																																						(select a.nombre from almacenproductos a where a.id=Inventariomovimiento.almacenproducto_id) as deno_almacenproductos,
																																					 (select SUM(a.cantidad) from inventariomovimientos a where a.activo=1 and (a.tipo=1 or a.tipo_transferencia=1) and a.empresa_id=Inventariomovimiento.empresa_id and a.empresasurcusale_id=Inventariomovimiento.empresasurcusale_id  and a.almacentipo_id=Inventariomovimiento.almacentipo_id  and a.almacene_id=Inventariomovimiento.almacene_id and a.almacenproducto_id=Inventariomovimiento.almacenproducto_id) AS entrada,
																																					 (select SUM(a.cantidad) from inventariomovimientos a where a.activo=1 and (a.tipo=2 or a.tipo_transferencia=2) and a.empresa_id=Inventariomovimiento.empresa_id and a.empresasurcusale_id=Inventariomovimiento.empresasurcusale_id  and a.almacentipo_id=Inventariomovimiento.almacentipo_id  and a.almacene_id=Inventariomovimiento.almacene_id and a.almacenproducto_id=Inventariomovimiento.almacenproducto_id) AS salida
																																					 '
																																				),
																													 'group' => 'Inventariomovimiento.empresa_id, deno_empresas, Inventariomovimiento.empresasurcusale_id, deno_empresasurcusales, Inventariomovimiento.almacentipo_id, deno_almacentipos, Inventariomovimiento.almacene_id, deno_almacenes, Inventariomovimiento.almacenproducto_id, deno_almacenproductos, entrada, salida'
																										));
			}else{
						return  $this->find('all', array(
																											'conditions' => array('Inventariomovimiento.activo'=>1, 'Inventariomovimiento.empresa_id'=>$empresa_id, 'Inventariomovimiento.empresasurcusale_id'=>$empresasurcusale_id),
																													 'fields'=>array( 'Inventariomovimiento.empresa_id,
																																						(select a.razon_social from empresas a where a.id=Inventariomovimiento.empresa_id) as deno_empresas,
																																					 Inventariomovimiento.empresasurcusale_id,
																																						(select a.denominacion from empresasurcusales a where a.id=Inventariomovimiento.empresasurcusale_id) as deno_empresasurcusales,
																																					 Inventariomovimiento.almacentipo_id,
																																						(select a.denominacion from almacentipos a where a.id=Inventariomovimiento.almacentipo_id) as deno_almacentipos,
																																					 Inventariomovimiento.almacene_id,
																																						(select a.nombre from almacenes a where a.id=Inventariomovimiento.almacene_id) as deno_almacenes,
																																					 Inventariomovimiento.almacenproducto_id,
																																						(select a.nombre from almacenproductos a where a.id=Inventariomovimiento.almacenproducto_id) as deno_almacenproductos,
																																					 (select SUM(a.cantidad) from inventariomovimientos a where a.activo=1 and (a.tipo=1 or a.tipo_transferencia=1) and a.empresa_id=Inventariomovimiento.empresa_id and a.empresasurcusale_id=Inventariomovimiento.empresasurcusale_id  and a.almacentipo_id=Inventariomovimiento.almacentipo_id  and a.almacene_id=Inventariomovimiento.almacene_id and a.almacenproducto_id=Inventariomovimiento.almacenproducto_id) AS entrada,
																																					 (select SUM(a.cantidad) from inventariomovimientos a where a.activo=1 and (a.tipo=2 or a.tipo_transferencia=2) and a.empresa_id=Inventariomovimiento.empresa_id and a.empresasurcusale_id=Inventariomovimiento.empresasurcusale_id  and a.almacentipo_id=Inventariomovimiento.almacentipo_id  and a.almacene_id=Inventariomovimiento.almacene_id and a.almacenproducto_id=Inventariomovimiento.almacenproducto_id) AS salida
																																					 '
																																				),
																													 'group' => 'Inventariomovimiento.empresa_id, deno_empresas, Inventariomovimiento.empresasurcusale_id, deno_empresasurcusales, Inventariomovimiento.almacentipo_id, deno_almacentipos, Inventariomovimiento.almacene_id, deno_almacenes, Inventariomovimiento.almacenproducto_id, deno_almacenproductos, entrada, salida'
																										));
		}
	}

}
