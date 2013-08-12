<div class="folders view">
<h2><?php echo __('Folder'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($folder['Folder']['name']); ?>
			&nbsp;
		</dd>
	</dl>
	<br/><br/>
	<div class="related">
		<h3><?php echo __('Contained Bookmarks'); ?></h3>
		<?php if (!empty($folder['Bookmark'])): ?>
			<table cellpadding = "0" cellspacing = "0">
			<tr>
				<th><?php echo __('Title'); ?></th>
				<th><?php echo __('Url'); ?></th>
				<th><?php echo __('Created'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			<?php
				$i = 0;
				foreach ($folder['Bookmark'] as $bookmark): ?>
				<tr>
					<td><?php echo $this->Html->link(h($bookmark['title']), $bookmark['url']); ?></td>
					<td><?php echo $bookmark['url']; ?></td>
					<td><?php echo $bookmark['created']; ?></td>
					<td class="actions">
						<?php echo $this->Html->link(__('View'), array('controller' => 'bookmarks', 'action' => 'view', $bookmark['id'])); ?>
						<?php echo $this->Html->link(__('Edit'), array('controller' => 'bookmarks', 'action' => 'edit', $bookmark['id'])); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'bookmarks', 'action' => 'delete', $bookmark['id']), null, __('Are you sure you want to delete # %s?', $bookmark['id'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
			</table>
		<?php endif; ?>
	</div>
	
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Rename Folder'), array('action' => 'edit', $folder['Folder']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Folder'), array('action' => 'delete', $folder['Folder']['id']), null, __('Are you sure you want to delete # %s?', $folder['Folder']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bookmarks'), array('controller' => 'bookmarks', 'action' => 'index')); ?> </li>
	</ul>
</div>


	

