<?php 
// File: plugins/Docs/View/Documents/admin_edit.ctp
?>
<div class="top">
	<h1><?php echo __('Edit %s', __('Document')); ?></h1>
</div>
<div class="center">
	<div class="form">
		<?php echo $this->Form->create('Document', array('type' => 'file'));?>
		    <fieldset>
		    	<?php
					echo $this->Form->input('id');
					echo $this->Form->input('name', array(
						'label' => __('Name of this %s', __('Document')),
						'div' => array('class' => 'half'),
					));
					
					echo $this->Form->input('document_state_id', array(
						'options' => $document_states,
						'label' => __('The %s %s', __('Document'), __('State')),
						'div' => array('class' => 'half'),
					));
					
					echo $this->Form->input('file', array(
						'type' => 'file',
						'label' => __('%s File', __('Document')),
					));
					
					echo $this->Form->input('description', array(
						'type' => 'textarea',
						'label' => __('A description of this %s', __('Document')),
					));
		    	?>
		    </fieldset>
		<?php echo $this->Form->end(__('Update %s', __('Document'))); ?>
	</div>
</div>