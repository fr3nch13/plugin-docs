<?php
App::uses('AppModel', 'Model');

class Document extends AppModel 
{
	public $displayField = 'name';
	
	public $belongsTo = array(
		'DocumentState' => array(
			'className' => 'DocumentState',
			'foreignKey' => 'document_state_id',
		),
	);
	
	// define the fields that can be searched
	public $searchFields = array(
		'Document.name',
		'Document.filename',
		'DocumentState.name',
	);
	
	// fields that are boolean and can be toggled
	public $toggleFields = array('active');
	
	public $manageUploads = true;
}
