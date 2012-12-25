

<div class="row">
    <?php echo $this->Html->link('FB Login', array('action' => 'facebook_login'))?>
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('User Registration'); ?></legend>
        <?php
        echo $this->Form->input('first_name', array());
        echo $this->Form->input('last_name', array());
        echo $this->Form->input('email', array());
        echo $this->Form->input('type', array('type' => 'radio', 'options' => array('Entrepreneur', 'Investor')));
        echo $this->Form->input('password', array());
        echo $this->Form->input('confirm_password', array('type'=>'password'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit'));

    //echo $this->Html->link('Register Here', array('action' => 'register'));

    ?>
</div>