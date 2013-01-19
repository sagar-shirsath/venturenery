    <div class="companies index">
    <h2><?php echo __('Companies'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('name','Employee Name'); ?></th>
            <th><?php echo $this->Paginator->sort('poto_url','Photo'); ?></th>

            <th><?php echo $this->Paginator->sort('created'); ?></th>
            <th><?php echo $this->Paginator->sort('modified'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php
        foreach ($employees as $employee): ?>
            <tr>
                <td><?php echo h($employee['Employee']['name']); ?>&nbsp;</td>
                <td><?php
                    if(!empty($employee['Employee']['photo_url']))
                        echo $this->Html->image($employee['Employee']['photo_url'], array(
                            "alt" => "Logo",
                            'url' => array('action' => 'view', $employee['Employee']['id'])
                        )); ?>&nbsp;
                </td>
                <td><?php echo h($employee['Employee']['created']); ?>&nbsp;</td>
                <td><?php echo h($employee['Employee']['modified']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('controller'=>'employees','action' => 'view', $employee['Employee']['id'])); ?>
                    <?php echo $this->Html->link(__('Edit'), array('controller'=>'employees','action' => 'edit', $employee['Employee']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('controller'=>'employees','action' => 'delete', $employee['Employee']['id']), null, __('Are you sure you want to delete # %s?', $employee['Employee']['id'])); ?>
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
        <li><?php echo $this->Html->link(__('New Company'), array('action' => 'add')); ?></li>
    </ul>
</div>
