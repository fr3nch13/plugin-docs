<?php 
// File: app/View/DocumentStates/index.ctp

$page_options = array(
	$this->Html->link(__('Add %s', __('Document State')), array('action' => 'add')),
);

// content
$th = array(
	'DocumentState.name' => array('content' => __('Name'), 'options' => array('sort' => 'DocumentState.name')),
	'actions' => array('content' => __('Actions'), 'options' => array('class' => 'actions')),
);

$td = array();
foreach ($document_states as $i => $document_state)
{
	$td[$i] = array(
		$document_state['DocumentState']['name'],
		array(
			$this->Html->link(__('Edit'), array('action' => 'edit', $document_state['DocumentState']['id'])).
			$this->Html->link(__('Delete'), array('action' => 'delete', $document_state['DocumentState']['id']),array('confirm' => 'Are you sure?')), 
			array('class' => 'actions'),
		),
	);
}

echo $this->element('Utilities.page_index', array(
	'page_title' => __('Document States'),
	'page_options' => $page_options,
	'th' => $th,
	'td' => $td,
));