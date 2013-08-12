<div class="bookmarks view">
<h2><?php echo __('Bookmark'); ?></h2>
	<dl>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($bookmark['Bookmark']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($bookmark['Bookmark']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($bookmark['Bookmark']['notes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Folder'); ?></dt>
		<dd>
			<?php echo h($bookmark['Folder']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text Version'); ?></dt>
		<dd>
			<?php echo $this->Html->link(__('Link'), array('controller' => 'offline_websites', 'action' => 'view', $bookmark['OfflineWebsite']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($bookmark['Bookmark']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li>
			<?php echo $this->Html->link(__('Edit Bookmark'), array('action' => 'edit', $bookmark['Bookmark']['id'])); ?>
		</li>
		<li>
			<?php echo $this->Form->postLink(__('Delete Bookmark'), array('action' => 'delete', $bookmark['Bookmark']['id']), null, __('Are you sure you want to delete # %s?', $bookmark['Bookmark']['id'])); ?>
		</li>
		<li>
			<?php echo $this->Form->postLink(__('List Bookmarks'), array('action' => 'index')); ?>
		</li>
	</ul>
</div>
