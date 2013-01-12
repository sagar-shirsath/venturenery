<div class="watchlists index">
	<h2><?php echo __('Watchlists'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('company_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('is_active'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($watchlists as $watchlist): ?>
	<tr>
		<td><?php echo h($watchlist['Watchlist']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($watchlist['Company']['name'], array('controller' => 'companies', 'action' => 'view', $watchlist['Company']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($watchlist['User']['name'], array('controller' => 'users', 'action' => 'view', $watchlist['User']['id'])); ?>
		</td>
		<td><?php echo h($watchlist['Watchlist']['is_active']); ?>&nbsp;</td>
		<td><?php echo h($watchlist['Watchlist']['created']); ?>&nbsp;</td>
		<td><?php echo h($watchlist['Watchlist']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $watchlist['Watchlist']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $watchlist['Watchlist']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $watchlist['Watchlist']['id']), null, __('Are you sure you want to delete # %s?', $watchlist['Watchlist']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Watchlist'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
