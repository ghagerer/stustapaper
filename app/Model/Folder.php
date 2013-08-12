<?php
App::uses('AppModel', 'Model');
/**
 * Tag Model
 *
 * @property User $User
 * @property Bookmark $Bookmark
 */
class Folder extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	public $actsAs = array('Containable');
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'uuid' => array(
				'rule' => array('uuid')
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty')
			),
		),
	);
	
	public $belongsTo = 'User';
	public $hasMany = 'Bookmark';

}
