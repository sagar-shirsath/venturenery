<script type="text/javascript">
    jQuery(function () {
        jQuery("#email_id").validate({
            expression:"if (VAL) return true; else return false;",
            message:"<div>Enter Email</div>"
        });
        jQuery("#email_id").validate({
            expression:"if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_-]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
            message:"<div>Enter valid email id</div>"
        });

        jQuery("#password").validate({
            expression:"if (VAL) return true; else return false;",
            message:"<div>Enter password</div>"
        });
        jQuery("#confirm_password").validate({
            expression:"if (VAL) return true; else return false;",
            message:"<div>Enter Confirm  password</div>"
        });

        jQuery("#first_name").validate({
            expression:"if (VAL) return true; else return false;",
            message:"<div>Enter First Name</div>"
        });

        jQuery("#last_name").validate({
            expression:"if (VAL) return true; else return false;",
            message:"<div>Enter Last Name</div>"
        });

//        jQuery(".type_class").validate({
//            expression:"if ()) return true; else return false;",
//            message:"<div>Please select type</div>"
//        });

//        function radioCheck(id){
//            alert(id);
//        }


    });
</script>
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
                    echo $this->Form->input('first_name', array('id'=>'first_name','label'=>false,'placeholder'=>"First Name"));
                    echo $this->Form->input('last_name', array('id'=>'last_name','label'=>false,'placeholder'=>"Last Name"));
                    echo $this->Form->input('email', array('id'=>'email_id','label'=>false,'placeholder'=>"Email"));
                    ?>

                    <div id="type_radio">
                     <?php
                    echo $this->Form->input('type', array('id'=>'type','class'=>'type_class','type' => 'radio', 'options' => array('Entrepreneur', 'Investor')));
                    ?>
                    </div>
                    <?php
                    echo $this->Form->input('password', array('id'=>'password','label'=>false,'placeholder'=>"Password"));
                    echo $this->Form->input('confirm_password', array('id'=>'confirm_password','type' => 'password','label'=>false,'placeholder'=>"Confirm Password"));
                    ?>

                <?php echo $this->Form->end(__('Submit'))?>

                </div>
                <!-- End circle below -->
            </div>
        </div><!--End of circle-wrapper-->

        <!-- End wrapper below -->
    </div>
    <!-- End of content id -->
</div>



