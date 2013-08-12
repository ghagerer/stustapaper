<div class="users form">
	<?php echo $this->Session->flash('auth'); ?>
	<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend>
			<?php echo __('Login'); ?>
		</legend>
		<p><?php echo __('Please enter your username and password'); ?></p>
		<?php echo $this->Form->input('username'); ?>
		<?php echo $this->Form->input('password'); ?>
	</fieldset>
	<?php echo $this->Form->end(__('Login')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Register'), array('action' => 'add')); ?></li>
	</ul>
</div>
