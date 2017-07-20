<?php 
// File: app/View/Documents/index.ctp


$page_options = array(
	$this->Html->link(__('Upload New %s', __('Document')), array('action' => 'add')),
);

// content
$th = array(
	'Document.name' => array('content' => __('Name'), 'options' => array('sort' => 'Document.name')),
	'Document.filename' => array('content' => __('Filename'), 'options' => array('sort' => 'Document.filename')),
	'Document.description' => array('content' => __('Description')),
	'DocumentState.name' => array('content' => __('State'), 'options' => array('sort' => 'DocumentState.name')),
	'Document.active' => array('content' => __('Active'), 'options' => array('sort' => 'Document.active')),
	'Document.created' => array('content' => __('Created'), 'options' => array('sort' => 'Document.created')),
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
		$this->Html->link($document['Document']['filename'], array('action' => 'download', $document['Document']['id']), array('data-ext' => $ext  )),
		$document['Document']['description'],
		$document['DocumentState']['name'],
		array(
			$this->Form->postLink($this->Wrap->yesNo($document['Document']['active']),array('action' => 'toggle', 'active', $document['Document']['id']),array('confirm' => 'Are you sure?')), 
			array('class' => 'actions'),
		),
		$this->Wrap->niceTime($document['Document']['created']),
		array(
			$this->Html->link(__('Edit'), array('action' => 'edit', $document['Document']['id'])).
			$this->Html->link(__('Delete'), array('action' => 'delete', $document['Document']['id']),array('confirm' => 'Are you sure?')), 
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