<?php 
// File: app/View/DocumentStates/admin_edit.ctp
?>
<div class="top">
	<h1><?php echo __('Edit %s', __('Document State')); ?></h1>
</div>
<div class="center">
	<div class="form">
		<?php echo $this->Form->create('DocumentState');?>
		    <fieldset>
		        <legend><?php echo __('Edit %s', __('Document State')); ?></legend>
		    	<?php
					echo $this->Form->input('id');
					echo $this->Form->input('name');
		    	?>
		    </fieldset>
		<?php echo $this->Form->end(__('Save %s', __('Document State'))); ?>
	</div>
</div>