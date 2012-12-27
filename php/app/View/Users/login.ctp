

<div class="row">
    <?php echo $this->Html->link('FB Login', array('action' => 'facebook_login'))?>
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('User Login'); ?></legend>
        <?php
        echo $this->Form->input('email', array('id' => 'email'));
        echo $this->Form->input('password', array('id' => 'password'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit'));

    //echo $this->Html->link('Register Here', array('action' => 'register'));
    echo $this->Html->link('Forgot password', array('action' => 'forgot_password'));
    echo "<br />";
    echo $this->Html->link('Register', array('action' => 'register'));
    ?>
</div>