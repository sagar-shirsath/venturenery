<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <!--    <link href="style.css" rel="stylesheet" type="text/css">-->
    <?php
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    echo $this->Html->css(array('style'));
    echo $this->Html->script('flexcroll');
    ?>
    <!--    <script type='text/javascript' src="flexcroll.js"></script>-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type='text/javascript'>
        function showMore() {
            {
                more = document.getElementById("more");
                more.style.visibility = (more.style.visibility == "visible") ? "hidden" : "visible";
            }
            {
                more = document.getElementById("more");
                more.style.visibility = (more.style.display == "block") ? "none" : "block";
            }
// 	{	main = document.getElementById("main");
// 		main.style.visibility = (main.style.visibility == "visible") ? "hidden" : "visible";
// 	}
        }

        function overlay() {
            el = document.getElementById("overlay");
            el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";

        }
    </script>
</head>

<body>
<div id="container">
    <div id="header">
        <div class="wrapper">
            <a href="/users/dashboard">
                <div id="logo">
                </div>
            </a>


            <!-- 		Searchbar -->
            <div class="search-wrapper">
                <form action="#" name="search">
                    <div class="search-box">
                        <input name="seach" type="text" value="Search..."/>
                    </div>
                    <input class="submit-button" name="Go" type="submit"/>
                </form>
            </div>

            <!-- 		Dropdown menu -->
            <ul id="navbar">
                <!-- The strange spacing herein prevents an IE6 whitespace bug. -->
                <li><?php echo $this->Html->link('Company',array('controller'=>'companies','action'=>'index'))?>
                <li>
                <li><?php echo $this->Html->link('Person',array('controller'=>'employees','action'=>'index'))?>
                <li>
                <li><a href="#">Menu</a>
                    <ul>
                        <li><?php echo $this->Html->link('Home',array('controller'=>"users",'action'=>'dashboard'));?></li>
                        <?php if(empty($email)){ ?>
                        <li><?php echo $this->Html->link('Register',array('controller'=>"users",'action'=>'register'));?> </li>
                        <li><?php echo $this->Html->link('Login',array('controller'=>"users",'action'=>'login'));?></li>
                        <?php }else{?>
                        <li><?php echo $this->Html->link('Logout',array('controller'=>"users",'action'=>'logout'));?></li>
                        <?php }?>
                        <li><a href="">My Watchlist</a></li>
                    </ul>
                </li>
            </ul>
<!--            --><?php //if(!empty($email)){
//                echo "Welcome ".$email;
//
//
//        }?>
        </div>
    </div>

    <?php echo $this->Session->flash(); ?>
    <?php echo $this->fetch('content'); ?>
<div id="footer">
    <div class="wrapper">
    </div>
    <!-- End of footer id -->
</div>
</div>
<!-- 2 -->
</body>

<?php echo $this->element('sql_dump'); ?>

</html>
