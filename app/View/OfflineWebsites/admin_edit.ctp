<div class="offlineWebsites form">
<?php echo $this->Form->create('OfflineWebsite'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Offline Website'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('bookmark_id');
		echo $this->Form->input('html_content');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('OfflineWebsite.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('OfflineWebsite.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Offline Websites'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Bookmarks'), array('controller' => 'bookmarks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark'), array('controller' => 'bookmarks', 'action' => 'add')); ?> </li>
	</ul>
</div>
