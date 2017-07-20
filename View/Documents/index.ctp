<?php 
// File: app/View/Documents/index.ctp


$page_options = array(

);

// content
$th = array(
	'Document.name' => array('content' => __('Name'), 'options' => array('sort' => 'Document.name')),
	'Document.filename' => array('content' => __('Filename'), 'options' => array('sort' => 'Document.filename')),
	'Document.description' => array('content' => __('Description')),
	'DocumentState.name' => array('content' => __('State'), 'options' => array('sort' => 'DocumentState.name')),
//	'Document.created' => array('content' => __('Created'), 'options' => array('sort' => 'Document.created')),
	'actions' => array('content' => __('Actions'), 'options' => array('class' => 'actions')),
);

$td = array();
foreach ($documents as $i => $document)
{
	$ext = explode('.', $document['Document']['filename']);
	$ext = array_pop($ext);
	$ext = strtolower($ext);
	$td[$i] = array(
		$this->Html->link($document['Document']['name'], array('action' => 'download', $document['Document']['id'])),
		$this->Html->link($document['Document']['filename'], array('action' => 'download', $document['Document']['id']), array('class' => 'icon_'.$ext  )),
		$document['Document']['description'],
		$document['DocumentState']['name'],
//		$this->Wrap->niceTime($document['Document']['created']),
		array(
			$this->Html->link(__('Download'), array('action' => 'download', $document['Document']['id'])),
			array('class' => 'actions'),
		),
	);
}

echo $this->element('Utilities.page_index', array(
	'page_title' => __('Documents and Forms'),
	'search_placeholder' => __('Documents and Forms'),
	'page_options' => $page_options,
	'th' => $th,
	'td' => $td,
));