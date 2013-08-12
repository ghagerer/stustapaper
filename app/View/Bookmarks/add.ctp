<div class="bookmarks form">
<?php echo $this->Form->create('Bookmark'); ?>
	<fieldset>
		<legend><?php echo __('Add Bookmark'); ?></legend>
	<?php
		echo $this->Form->input('url', array('autofocus'=>'autofocus'));
		echo $this->Form->input('title',array('required'=>false,'between'=>__('(optional, leave blank to auto-fill)')));
		echo $this->Form->input('notes');
		echo $this->Form->input('folder_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Bookmarks'), array('action' => 'index')); ?></li>
	</ul>
</div>
