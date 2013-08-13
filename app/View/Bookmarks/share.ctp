<div class="bookmarks form">
<?php echo $this->Form->create('Bookmark'); ?>
	<fieldset>
		<legend><?php echo __('Share Bookmark'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title',array('hidden'=>'hidden','label'=>false,'div'=>false));
		echo $this->Form->input('url',array('hidden'=>'hidden','label'=>false,'div'=>false));
		echo $this->Form->input('User.name',array('label'=>__('Friend Username')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Bookmark.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Bookmark.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Bookmarks'), array('action' => 'index')); ?></li>
	</ul>
</div>
