<div class="companies index">
    <h2><?php echo __('Companies'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th>Comapny Name</th>
            <th>company Logo</th>
        <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php
        foreach ($companies as $company): ?>
            <tr>
                <td><?php echo h($company['Company']['name']); ?>&nbsp;</td>
                <td><?php
                    if(!empty($company['Company']['logo_url']))
                        echo $this->Html->image($company['Company']['logo_url'], array(
                            "alt" => "Logo",
                            'url' => array('action' => 'view', $company['Company']['id'])
                        )); ?>&nbsp;
                </td>
                <td><?php echo h($company['Company']['created']); ?>&nbsp;</td>
                <td><?php echo h($company['Company']['modified']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $company['Company']['id'])); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $company['Company']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $company['Company']['id']), null, __('Are you sure you want to delete # %s?', $company['Company']['id'])); ?>
                </td>
            </tr>
            <?php endforeach; ?>
    </table>

</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Company'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('more...'), array('action' => 'get_all_searched_companies','?'=>array('search'=>$search_query))); ?></li>
    </ul>
</div>










<div class="companies index">
    <h2><?php echo __('Employees'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th>Employee Name</th>
            <th>Eployee Photo</th>
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

</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Employee'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('more...'), array('action' => 'get_all_searched_employees','?'=>array('search'=>$search_query))); ?></li>
    </ul>
</div>

<div style="padding-bottom: 100px;"></div>
