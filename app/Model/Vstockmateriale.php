<?php
App::uses('AppModel', 'Model');
/**
 * Vstockmateriale Model
 *
 * @property Almacene $Almacene
 * @property Almacenmateriale $Almacenmateriale
 */
class Vstockmateriale extends AppModel {

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
		)
	);
}
