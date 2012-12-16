<div class="companies form">
<?php echo $this->Form->create('Company'); ?>
	<fieldset>
		<legend><?php echo __('Add Company'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('industry');
		echo $this->Form->input('url');
		echo $this->Form->input('logo_url');
		echo $this->Form->input('slogan');
		echo $this->Form->input('twitter_url');
		echo $this->Form->input('fb_url');
		echo $this->Form->input('linkedin_url');
		echo $this->Form->input('blog_url');
		echo $this->Form->input('video_url');
		echo $this->Form->input('is_active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Companies'), array('action' => 'index')); ?></li>
	</ul>
</div>
