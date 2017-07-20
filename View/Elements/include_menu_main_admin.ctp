<?php ?>
<li>
	<?php echo $this->Html->link(__('Documents and Forms'), '#'); ?>
	<ul>
		<li><?php echo $this->Html->link(__('Documents'), array('controller' => 'documents', 'action' => 'index', 'admin' => true, 'plugin' => 'docs')); ?></li> 
		<li><?php echo $this->Html->link(__('Document States'), array('controller' => 'document_states', 'action' => 'index', 'admin' => true, 'plugin' => 'docs')); ?></li> 
	</ul>
</li>