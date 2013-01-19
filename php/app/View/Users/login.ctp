<script type="text/javascript">
    jQuery(function () {
        jQuery("#email").validate({
            expression:"if (VAL) return true; else return false;",
            message:"<div>Enter Email</div>"
        });
        jQuery("#email").validate({
            expression:"if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_-]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
            message:"<div>Enter valid email id</div>"
        });

        jQuery("#password").validate({
            expression:"if (VAL) return true; else return false;",
            message:"<div>Enter password</div>"
        });


    });
</script>


<div id="content">
    <div class="wrapper">

        <div class="clear"></div>
        <div class="circle-wrapper">
            <div class="medium-circle blue" id="main">

                <div class="title">
                    <h2>Login</h2>
                </div>
                <div id="circle-body" class="left-align">
                    <?php echo $this->Form->create('User'); ?>
                    <?php
                    echo $this->Form->input('email', array('id' => 'email', 'label' => false));
                    echo $this->Form->input('password', array('id' => 'password', 'label' => false));
                    ?>
                    <?php echo $this->Form->end(__('Submit'));
//                    echo $this->Html->link('Forgot password', array('action' => 'forgot_password'));
//                    echo $this->Html->link('Register', array('action' => 'register'));
                    ?>
                </div>


                <!-- End circle body below-->
            </div>
            <!-- End circle below -->
        </div>
    </div>
    <!--End of circle-wrapper-->

    <!-- End wrapper below -->
</div>
<!-- End of content id -->

