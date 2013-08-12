<div class="offlineWebsites index">
	<h2><?php echo __('Offline Websites'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('bookmark_id'); ?></th>
			<th><?php echo $this->Paginator->sort('html_content'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($offlineWebsites as $offlineWebsite): ?>
	<tr>
		<td><?php echo h($offlineWebsite['OfflineWebsite']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($offlineWebsite['Bookmark']['title'], array('controller' => 'bookmarks', 'action' => 'view', $offlineWebsite['Bookmark']['id'])); ?>
		</td>
		<td><?php echo h($offlineWebsite['OfflineWebsite']['html_content']); ?>&nbsp;</td>
		<td><?php echo h($offlineWebsite['OfflineWebsite']['created']); ?>&nbsp;</td>
		<td><?php echo h($offlineWebsite['OfflineWebsite']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $offlineWebsite['OfflineWebsite']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $offlineWebsite['OfflineWebsite']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $offlineWebsite['OfflineWebsite']['id']), null, __('Are you sure you want to delete # %s?', $offlineWebsite['OfflineWebsite']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Offline Website'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Bookmarks'), array('controller' => 'bookmarks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark'), array('controller' => 'bookmarks', 'action' => 'add')); ?> </li>
	</ul>
</div>
