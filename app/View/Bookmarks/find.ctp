<div class="bookmarks form">
	<?php
	echo $this->Form->create('Bookmark', array(
			'url' => array_merge(array('action' => 'find'), $this->params['pass'])
	));
	echo $this->Form->input('title');
	echo $this->Form->input('userid', array('div' => false, 'label' => false, 'hidden' => true, 'value' => $this->Session->read('Auth.User.id')));
	echo $this->Form->submit(__('Search'));
	echo $this->Form->end();
	?>
</div>

<div class="folder actions">
	<h3>
		<?php echo __('Actions'); ?>
	</h3>
	<ul style="margin-bottom:30px">
		<li>
			<?php echo $this->Html->link(__('Back'), array('controller' => 'bookmarks', 'action' => 'index')); ?>
		</li>
	</ul>
</div>
