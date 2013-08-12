<div class="offlineWebsites view">
<h2><?php echo __('Offline Website'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($offlineWebsite['OfflineWebsite']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bookmark'); ?></dt>
		<dd>
			<?php echo $this->Html->link($offlineWebsite['Bookmark']['title'], array('controller' => 'bookmarks', 'action' => 'view', $offlineWebsite['Bookmark']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Html Content'); ?></dt>
		<dd>
			<?php echo h($offlineWebsite['OfflineWebsite']['html_content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($offlineWebsite['OfflineWebsite']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($offlineWebsite['OfflineWebsite']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Offline Website'), array('action' => 'edit', $offlineWebsite['OfflineWebsite']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Offline Website'), array('action' => 'delete', $offlineWebsite['OfflineWebsite']['id']), null, __('Are you sure you want to delete # %s?', $offlineWebsite['OfflineWebsite']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Offline Websites'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Offline Website'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookmarks'), array('controller' => 'bookmarks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark'), array('controller' => 'bookmarks', 'action' => 'add')); ?> </li>
	</ul>
</div>
