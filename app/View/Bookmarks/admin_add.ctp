<div class="bookmarks form">
<?php echo $this->Form->create('Bookmark'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Bookmark'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('title');
		echo $this->Form->input('url');
		echo $this->Form->input('Folder');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Bookmarks'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Offline Websites'), array('controller' => 'offline_websites', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Offline Website'), array('controller' => 'offline_websites', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Folders'), array('controller' => 'folders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Folder'), array('controller' => 'folders', 'action' => 'add')); ?> </li>
	</ul>
</div>
