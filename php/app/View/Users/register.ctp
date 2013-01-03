
<div id="content">
    <div class="wrapper">

        <div class="clear"></div>
        <div class="circle-wrapper">
            <div class="square blue" id="main">

                <div class="title">
                    <h2>Register</h2>
                </div>



                <div id="circle-body" class="left-align">
                <?php echo $this->Form->create('User'); ?>
                <?php
                    echo $this->Form->input('first_name', array('label'=>false,'placeholder'=>"First Name"));
                    echo $this->Form->input('last_name', array('label'=>false,'placeholder'=>"Last Name"));
                    echo $this->Form->input('email', array('label'=>false,'placeholder'=>"Email"));
                    ?>


                     <?php
                    echo $this->Form->input('type', array('type' => 'radio', 'options' => array('Entrepreneur', 'Investor')));
                    echo $this->Form->input('password', array('label'=>false,'placeholder'=>"Password"));
                    echo $this->Form->input('confirm_password', array('type' => 'password','label'=>false,'placeholder'=>"Confirm Password"));
                    ?>

                <?php echo $this->Form->end(__('Submit'))?>

<!--                    <form method="post" action="">-->
<!--                        <input type="text" name="fname" value="First Name" />-->
<!--                        <input type="text" name="lname" value="Last Name" />-->
<!--                        <br class="clear">-->
<!--                        <div style="width: 50%; text-align: center; float: left;">-->
<!--                            Entrepreneur<br>-->
<!--                            <input type="radio" name="entrepreneur" value="">-->
<!--                        </div>-->
<!--                        <div style="width: 50%; text-align: center; float: left;">-->
<!--                            Investor<br>-->
<!--                            <input type="radio" name="investor" value="" vertical-align="middle">-->
<!--                        </div>-->
<!---->
<!--                        <br>-->
<!--                        <input type="email" name="email" value="email" />-->
<!--                        <br>-->
<!--                        <input type="password" name="password" value="password" />-->
<!--                        <br>-->
<!--                        <input type="password" name="password" value="password" />-->
<!--                    </form>-->

                    <!-- End circle body below-->
                </div>
                <!-- End circle below -->
            </div>
        </div><!--End of circle-wrapper-->

        <!-- End wrapper below -->
    </div>
    <!-- End of content id -->
</div>




<!--<div class="row">-->
<!--    --><?php //echo $this->Html->link('FB Login', array('action' => 'facebook_login'))?>
<!--    --><?php //echo $this->Form->create('User'); ?>
<!--       --><?php
//        echo $this->Form->input('first_name', array());
//        echo $this->Form->input('last_name', array());
//        echo $this->Form->input('email', array());
//        echo $this->Form->input('type', array('type' => 'radio', 'options' => array('Entrepreneur', 'Investor')));
//        echo $this->Form->input('password', array());
//        echo $this->Form->input('confirm_password', array('type' => 'password'));
//        ?>
<!---->
<!--    --><?php //echo $this->Form->end(__('Submit'));
//
//    //echo $this->Html->link('Register Here', array('action' => 'register'));
//
//    ?>
<!--</div>-->