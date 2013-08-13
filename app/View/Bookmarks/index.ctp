<div class="bookmarks index">
	
	<h2>
		<?php 
		if(isset($this->params['named']['folder'])) {
			echo $this->params['named']['folder'];
		} else {
			echo __('Read later'); 
		}
		?>
	</h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('is_liked'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('notes'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($bookmarks as $bookmark): ?>
	<tr>
		<td><?php echo h($bookmark['Bookmark']['is_liked']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link(__('⇱'), $bookmark['Bookmark']['url'], array('style'=>'text-decoration:none','target'=>'_blank')); ?>&nbsp;
			<?php echo $this->Html->link($bookmark['Bookmark']['title'], $bookmark['Bookmark']['url']); ?>&nbsp;
		</td>
		<td><?php echo h($bookmark['Bookmark']['notes']); ?>&nbsp;</td>
		<td><?php echo h($bookmark['Bookmark']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Form->postLink(__('Archive'), array('action' => 'archive', $bookmark['Bookmark']['id'])); ?>
			<?php echo $this->Form->postLink(__('Like'), array('action' => 'like', $bookmark['Bookmark']['id'])); ?>
			<?php echo $this->Html->link(__('Text'), array('controller' => 'offline_websites', 'action' => 'view', $bookmark['OfflineWebsite']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bookmark['Bookmark']['id'])); ?>
			<?php echo $this->Html->link(__('Share'), array('action' => 'share', $bookmark['Bookmark']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $bookmark['Bookmark']['id']), null, __('Are you sure you want to delete # %s?', $bookmark['Bookmark']['id'])); ?>
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
<div class="folder actions">
	<h3>
		<?php echo __('Actions'); ?>
	</h3>
	<ul style="margin-bottom:30px">
		<li>
			<?php echo $this->Html->link(__('Add Bookmark'), array('controller' => 'bookmarks', 'action' => 'add')); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('Add Folder'), array('controller' => 'folders', 'action' => 'add')); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('Search'), array('action' => 'find')); ?>
		</li>
	</ul>
	<h3>
		<?php echo __('Folders'); ?>
	</h3>
	<ul>
		<li>
			<?php echo $this->Html->link(__('Liked'), array('action' => 'liked')); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('Archive'), array('action' => 'archive')); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('Read later'), array('action' => 'index'));?>
		</li>
		<?php foreach($folders as $id=>$name): ?>
		<li>
			<?php echo $this->Html->link($name, array('action' => 'index', 'folder' => $name));?>
		</li>
		<?php endforeach; ?>
	</ul>
</div>
