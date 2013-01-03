<!--						<div id="overlay">
                            <div style="position: relative; margin: 0 auto; width: 840px;">
                                <div class="small-circle red left-top"><h2>Share</h2></div>
                                <div class="small-circle yellow left-bottom"><h2>Financials</h2></div>
                                <div class="small-circle green right-bottom"><h2>News</h2></div>
                                <div class="small-circle blue right-top"><h2>Watchlist</h2></div>
                                <div class="clear"></div>
                            <a href='#' onclick='overlay()'><h3>Close</h3></a>
                            </div>
                        </div>-->


<!--  Sample searchbar for active jquery states

<form>
    <input name="status" id="status" value="Type something here" type="text"/>
    <input value="Submit" type="submit"/>
</form>
 -->



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
                    echo $this->Form->input('email', array('id' => 'email','label'=>false));
                    echo $this->Form->input('password', array('id' => 'password','label'=>false));
                    ?>
                    <?php echo $this->Form->end(__('Submit'));
                    echo $this->Html->link('Forgot password', array('action' => 'forgot_password'));
                    echo $this->Html->link('Register', array('action' => 'register'));
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

