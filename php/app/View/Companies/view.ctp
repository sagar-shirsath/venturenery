<div class="companies view">
<h2><?php  echo __('Company'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($company['Company']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($company['Company']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($company['Company']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Industry'); ?></dt>
		<dd>
			<?php echo h($company['Company']['industry']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($company['Company']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logo Url'); ?></dt>
		<dd>
			<?php echo h($company['Company']['logo_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slogan'); ?></dt>
		<dd>
			<?php echo h($company['Company']['slogan']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Twitter Url'); ?></dt>
		<dd>
			<?php echo h($company['Company']['twitter_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fb Url'); ?></dt>
		<dd>
			<?php echo h($company['Company']['fb_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Linkedin Url'); ?></dt>
		<dd>
			<?php echo h($company['Company']['linkedin_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Blog Url'); ?></dt>
		<dd>
			<?php echo h($company['Company']['blog_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Video Url'); ?></dt>
		<dd>
			<?php echo h($company['Company']['video_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Active'); ?></dt>
		<dd>
			<?php echo h($company['Company']['is_active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($company['Company']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($company['Company']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Company'), array('action' => 'edit', $company['Company']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Company'), array('action' => 'delete', $company['Company']['id']), null, __('Are you sure you want to delete # %s?', $company['Company']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('action' => 'add')); ?> </li>
	</ul>
</div>
