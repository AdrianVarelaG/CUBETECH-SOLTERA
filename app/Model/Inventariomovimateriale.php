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
	public $useTable = 'inventariomovimateriales';

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

	public function consultaTotales($empresa_id, $empresasurcusale_id, $rol_id, $user_id){
		if($empresa_id==0 && $empresasurcusale_id==0){
				return  $this->find('all', array(
																											'conditions' => array('Inventariomovimateriale.activo'=>1),
																													 'fields'=>array( 'Inventariomovimateriale.empresa_id,
																																						(select a.razon_social from empresas a where a.id=Inventariomovimateriale.empresa_id) as deno_empresas,
																																					 Inventariomovimateriale.empresasurcusale_id,
																																						(select a.denominacion from empresasurcusales a where a.id=Inventariomovimateriale.empresasurcusale_id) as deno_empresasurcusales,
																																					 Inventariomovimateriale.almacentipo_id,
																																						(select a.denominacion from almacentipos a where a.id=Inventariomovimateriale.almacentipo_id) as deno_almacentipos,
																																					 Inventariomovimateriale.almacene_id,
																																						(select a.nombre from almacenes a where a.id=Inventariomovimateriale.almacene_id) as deno_almacenes,
																																					 Inventariomovimateriale.almacenmateriale_id,
																																						(select a.nombre from almacenmateriales a where a.id=Inventariomovimateriale.almacenmateriale_id) as deno_almacenmateriales,
																																					 (select SUM(a.cantidad) from inventariomovimateriales a where a.activo=1 and (a.tipo=1) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS entrada,
																																					 (select SUM(a.cantidad) from inventariomovimateriales a where a.activo=1 and (a.tipo=2) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS salida
																																					 '
																																				),
																													 'group' => 'Inventariomovimateriale.empresa_id, deno_empresas, Inventariomovimateriale.empresasurcusale_id, deno_empresasurcusales, Inventariomovimateriale.almacentipo_id, deno_almacentipos, Inventariomovimateriale.almacene_id, deno_almacenes, Inventariomovimateriale.almacenmateriale_id, deno_almacenmateriales, entrada, salida'
																										));
		}else if($empresa_id!=0 && $empresasurcusale_id==0){
		 	return $this->find('all', array(
																											'conditions' => array('Inventariomovimateriale.activo'=>1, 'Inventariomovimateriale.empresa_id'=>$empresa_id),
																													 'fields'=>array( 'Inventariomovimateriale.empresa_id,
																																						(select a.razon_social from empresas a where a.id=Inventariomovimateriale.empresa_id) as deno_empresas,
																																					 Inventariomovimateriale.empresasurcusale_id,
																																						(select a.denominacion from empresasurcusales a where a.id=Inventariomovimateriale.empresasurcusale_id) as deno_empresasurcusales,
																																					 Inventariomovimateriale.almacentipo_id,
																																						(select a.denominacion from almacentipos a where a.id=Inventariomovimateriale.almacentipo_id) as deno_almacentipos,
																																					 Inventariomovimateriale.almacene_id,
																																						(select a.nombre from almacenes a where a.id=Inventariomovimateriale.almacene_id) as deno_almacenes,
																																					 Inventariomovimateriale.almacenmateriale_id,
																																						(select a.nombre from almacenmateriales a where a.id=Inventariomovimateriale.almacenmateriale_id) as deno_almacenmateriales,
																																					 (select SUM(a.cantidad) from inventariomovimateriales a where a.activo=1 and (a.tipo=1) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS entrada,
																																					 (select SUM(a.cantidad) from inventariomovimateriales a where a.activo=1 and (a.tipo=2) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS salida
																																					 '
																																				),
																													 'group' => 'Inventariomovimateriale.empresa_id, deno_empresas, Inventariomovimateriale.empresasurcusale_id, deno_empresasurcusales, Inventariomovimateriale.almacentipo_id, deno_almacentipos, Inventariomovimateriale.almacene_id, deno_almacenes, Inventariomovimateriale.almacenmateriale_id, deno_almacenmateriales, entrada, salida'
																										));
		}else if($empresa_id!=0 && $empresasurcusale_id!=0 && $rol_id==3){
			return $this->find('all', array(
																											'conditions' => array('Inventariomovimateriale.activo'=>1, 'Inventariomovimateriale.empresa_id'=>$empresa_id, 'Inventariomovimateriale.empresasurcusale_id'=>$empresasurcusale_id),
																													 'fields'=>array( '
																																					 Inventariomovimateriale.empresa_id,
																																						(select a.razon_social from empresas a where a.id=Inventariomovimateriale.empresa_id) as deno_empresas,
																																					 Inventariomovimateriale.empresasurcusale_id,
																																						(select a.denominacion from empresasurcusales a where a.id=Inventariomovimateriale.empresasurcusale_id) as deno_empresasurcusales,
																																					 Inventariomovimateriale.almacentipo_id,
																																						(select a.denominacion from almacentipos a where a.id=Inventariomovimateriale.almacentipo_id) as deno_almacentipos,
																																					 Inventariomovimateriale.almacene_id,
																																						(select a.nombre from almacenes a where a.id=Inventariomovimateriale.almacene_id) as deno_almacenes,
																																					 Inventariomovimateriale.almacenmateriale_id,
																																						(select a.nombre from almacenmateriales a where a.id=Inventariomovimateriale.almacenmateriale_id) as deno_almacenmateriales,
																																					 (select SUM(a.cantidad) from inventariomovimateriales a where a.activo=1 and (a.tipo=1) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS entrada,
																																					 (select SUM(a.cantidad) from inventariomovimateriales a where a.activo=1 and (a.tipo=2) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS salida
																																					 '
																																				),
																													 'group' => 'Inventariomovimateriale.empresa_id, deno_empresas, Inventariomovimateriale.empresasurcusale_id, deno_empresasurcusales, Inventariomovimateriale.almacentipo_id, deno_almacentipos, Inventariomovimateriale.almacene_id, deno_almacenes, Inventariomovimateriale.almacenmateriale_id, deno_almacenmateriales, entrada, salida'
																										));
		}else{
			return $this->find('all', array(
																											'conditions' => array('Inventariomovimateriale.activo'=>1, 'Inventariomovimateriale.empresa_id'=>$empresa_id, 'Inventariomovimateriale.empresasurcusale_id'=>$empresasurcusale_id),
																													 'fields'=>array( 'Inventariomovimateriale.empresa_id,
																																						(select a.razon_social from empresas a where a.id=Inventariomovimateriale.empresa_id) as deno_empresas,
																																					 Inventariomovimateriale.empresasurcusale_id,
																																						(select a.denominacion from empresasurcusales a where a.id=Inventariomovimateriale.empresasurcusale_id) as deno_empresasurcusales,
																																					 Inventariomovimateriale.almacentipo_id,
																																						(select a.denominacion from almacentipos a where a.id=Inventariomovimateriale.almacentipo_id) as deno_almacentipos,
																																					 Inventariomovimateriale.almacene_id,
																																						(select a.nombre from almacenes a where a.id=Inventariomovimateriale.almacene_id) as deno_almacenes,
																																					 Inventariomovimateriale.almacenmateriale_id,
																																						(select a.nombre from almacenmateriales a where a.id=Inventariomovimateriale.almacenmateriale_id) as deno_almacenmateriales,
																																					 (select SUM(a.cantidad) from inventariomovimateriales a where a.activo=1 and (a.tipo=1) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS entrada,
																																					 (select SUM(a.cantidad) from inventariomovimateriales a where a.activo=1 and (a.tipo=2) and a.empresa_id=Inventariomovimateriale.empresa_id and a.empresasurcusale_id=Inventariomovimateriale.empresasurcusale_id  and a.almacentipo_id=Inventariomovimateriale.almacentipo_id  and a.almacene_id=Inventariomovimateriale.almacene_id and a.almacenmateriale_id=Inventariomovimateriale.almacenmateriale_id) AS salida
																																					 '
																																				),
																													 'group' => 'Inventariomovimateriale.empresa_id, deno_empresas, Inventariomovimateriale.empresasurcusale_id, deno_empresasurcusales, Inventariomovimateriale.almacentipo_id, deno_almacentipos, Inventariomovimateriale.almacene_id, deno_almacenes, Inventariomovimateriale.almacenmateriale_id, deno_almacenmateriales, entrada, salida'
																										));
		}

	}

}
