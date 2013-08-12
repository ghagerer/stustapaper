<div class="tags form">
<?php echo $this->Form->create('Folder'); ?>
	<fieldset>
		<legend><?php echo __('Rename Folder'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('View Folder'), array('action' => 'view', $this->Form->value('Folder.id'))); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Folder'), array('action' => 'delete', $this->Form->value('Folder.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Folder.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Bookmarks'), array('controller' => 'bookmarks', 'action' => 'index')); ?> </li>
	</ul>
</div>
