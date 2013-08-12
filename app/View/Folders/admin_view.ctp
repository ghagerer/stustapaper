<div class="tags view">
<h2><?php echo __('Folder'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tag['Folder']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tag['User']['email'], array('controller' => 'users', 'action' => 'view', $tag['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($tag['Folder']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($tag['Folder']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($tag['Folder']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Folder'), array('action' => 'edit', $tag['Folder']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Folder'), array('action' => 'delete', $tag['Folder']['id']), null, __('Are you sure you want to delete # %s?', $tag['Folder']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Folders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Folder'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookmarks'), array('controller' => 'bookmarks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bookmark'), array('controller' => 'bookmarks', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Bookmarks'); ?></h3>
	<?php if (!empty($tag['Bookmark'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tag['Bookmark'] as $bookmark): ?>
		<tr>
			<td><?php echo $bookmark['id']; ?></td>
			<td><?php echo $bookmark['user_id']; ?></td>
			<td><?php echo $bookmark['title']; ?></td>
			<td><?php echo $bookmark['url']; ?></td>
			<td><?php echo $bookmark['created']; ?></td>
			<td><?php echo $bookmark['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'bookmarks', 'action' => 'view', $bookmark['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'bookmarks', 'action' => 'edit', $bookmark['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'bookmarks', 'action' => 'delete', $bookmark['id']), null, __('Are you sure you want to delete # %s?', $bookmark['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Bookmark'), array('controller' => 'bookmarks', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
