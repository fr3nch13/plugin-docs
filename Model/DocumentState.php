<?php
App::uses('AppModel', 'Model');

class DocumentState extends AppModel 
{
	public $displayField = 'name';
	public $hasMany = array(
		'Document' => array(
			'className' => 'Document',
			'foreignKey' => 'document_state_id',
			'dependent' => false,
		),
	);
}
