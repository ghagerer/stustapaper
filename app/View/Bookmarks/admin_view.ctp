<div class="bookmarks view">
<h2><?php echo __('Bookmark'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bookmark['Bookmark']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bookmark['User']['email'], array('controller' => 'users', 'action' => 'view', $bookmark['User']['id'])); ?>
			&nbsp;
		</dd>
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
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($bookmark['Bookmark']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($bookmark['Bookmark']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bookmark'), array('action' => 'edit', $bookmark['Bookmark']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bookmark'), array('action' => 'delete', $bookmark['Bookmark']['id']), null, __('Are you sure you want to delete # %s?', $bookmark['Bookmark']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookmarks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Offline Websites'), array('controller' => 'offline_websites', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Offline Website'), array('controller' => 'offline_websites', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Folders'), array('controller' => 'folders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Folder'), array('controller' => 'folders', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Offline Websites'); ?></h3>
	<?php if (!empty($bookmark['OfflineWebsite'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $bookmark['OfflineWebsite']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Bookmark Id'); ?></dt>
		<dd>
	<?php echo $bookmark['OfflineWebsite']['bookmark_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Html Content'); ?></dt>
		<dd>
	<?php echo $bookmark['OfflineWebsite']['html_content']; ?>
&nbsp;</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
	<?php echo $bookmark['OfflineWebsite']['created']; ?>
&nbsp;</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
	<?php echo $bookmark['OfflineWebsite']['modified']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Offline Website'), array('controller' => 'offline_websites', 'action' => 'edit', $bookmark['OfflineWebsite']['id'])); ?></li>
			</ul>
		</div>
	</div>
	<div class="related">
	<h3><?php echo __('Related Folders'); ?></h3>
	<?php if (!empty($bookmark['Folder'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($bookmark['Folder'] as $Folder): ?>
		<tr>
			<td><?php echo $Folder['id']; ?></td>
			<td><?php echo $Folder['user_id']; ?></td>
			<td><?php echo $Folder['name']; ?></td>
			<td><?php echo $Folder['created']; ?></td>
			<td><?php echo $Folder['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'folders', 'action' => 'view', $Folder['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'folders', 'action' => 'edit', $Folder['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'folders', 'action' => 'delete', $Folder['id']), null, __('Are you sure you want to delete # %s?', $Folder['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Folder'), array('controller' => 'folders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
