<div class="watchlists view">
<h2><?php  echo __('Watchlist'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($watchlist['Watchlist']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo $this->Html->link($watchlist['Company']['name'], array('controller' => 'companies', 'action' => 'view', $watchlist['Company']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($watchlist['User']['name'], array('controller' => 'users', 'action' => 'view', $watchlist['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Active'); ?></dt>
		<dd>
			<?php echo h($watchlist['Watchlist']['is_active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($watchlist['Watchlist']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($watchlist['Watchlist']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Watchlist'), array('action' => 'edit', $watchlist['Watchlist']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Watchlist'), array('action' => 'delete', $watchlist['Watchlist']['id']), null, __('Are you sure you want to delete # %s?', $watchlist['Watchlist']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Watchlists'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Watchlist'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
