<?php 
// File: app/View/DocumentStates/admin_add.ctp
?>
<div class="top">
	<h1><?php echo __('Add %s', __('Document State')); ?></h1>
</div>
<div class="center">
	<div class="form">
		<?php echo $this->Form->create('DocumentState');?>
		    <fieldset>
		        <legend><?php echo __('Add %s', __('Document State')); ?></legend>
		    	<?php
					echo $this->Form->input('name');
		    	?>
		    </fieldset>
		<?php echo $this->Form->end(__('Save %s', __('Document State'))); ?>
	</div>
</div>