<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

//		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
        echo $this->Html->css(array('bootstrap','bootstrap.min','bootstrap-responsive','bootstrap-responsive.min.css','style'));
        echo $this->Html->css('bootstrap.min');
        echo $this->Html->script('bootstrap-buttons');
        echo $this->Html->script('bootstrap-alerts');
        echo $this->Html->script('bootstrap-dropdown');
        echo $this->Html->script('bootstrap-modal');
        echo $this->Html->script('bootstrap-popover');
        echo $this->Html->script('bootstrap-scrollspy');
        echo $this->Html->script('bootstrap-tabs');
        echo $this->Html->script('bootstrap-twipsy');

	?>
</head>
<body class="preview" data-spy="scroll" data-target=".subnav" data-offset="80">
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <?php echo $this->Html->link('Vebturenary',array('controller'=>'users','action'=>'dashboard'),array('class'=>"brand"));?>
            <!--            <a class="brand" href="/">Feedback</a/>-->
            <div class="nav-collapse" id="main-menu">
                <ul class="nav" id="main-menu-left">
                    <!--                    <li><a onclick="pageTracker._link(this.href); return false;" href="http://news.bootswatch.com">News</a></li>-->
                    <!--                    <li><a id="swatch-link" href="/#gallery">Gallery</a></li>-->
                    <!--                    <li class="dropdown">-->
                    <!--                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Preview <b class="caret"></b></a>-->
                    <!--                        <ul class="dropdown-menu" id="swatch-menu">-->
                    <!--                            <li><a href="../default">Default</a></li>-->
                    <!--                            <li class="divider"></li>-->
                    <!--                            <li><a href="../amelia">Amelia</a></li>-->
                    <!--                            <li><a href="../cerulean">Cerulean</a></li>-->
                    <!--                            <li><a href="../cosmo">Cosmo</a></li>-->
                    <!--                            <li><a href="../cyborg">Cyborg</a></li>-->
                    <!--                            <li><a href="../journal">Journal</a></li>-->
                    <!--                            <li><a href="../readable">Readable</a></li>-->
                    <!--                            <li><a href="../simplex">Simplex</a></li>-->
                    <!--                            <li><a href="../slate">Slate</a></li>-->
                    <!--                            <li><a href="../spacelab">Spacelab</a></li>-->
                    <!--                            <li><a href="../spruce">Spruce</a></li>-->
                    <!--                            <li><a href="../superhero">Superhero</a></li>-->
                    <!--                            <li><a href="../united">United</a></li>-->
                    <!--                        </ul>-->
                    <!--                    </li>-->
                    <!--                    <li class="dropdown" id="preview-menu">-->
                    <!--                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Download <b class="caret"></b></a>-->
                    <!--                        <ul class="dropdown-menu">-->
                    <!--                            <li><a target="_blank" href="bootstrap.min.css">bootstrap.min.css</a></li>-->
                    <!--                            <li><a target="_blank" href="bootstrap.css">bootstrap.css</a></li>-->
                    <!--                            <li class="divider"></li>-->
                    <!--                            <li><a target="_blank" href="variables.less">variables.less</a></li>-->
                    <!--                            <li><a target="_blank" href="bootswatch.less">bootswatch.less</a></li>-->
                    <!--                        </ul>-->
                    <!--                    </li>-->
                </ul>
                <?php if(!empty($username)){?>
                <ul class="nav pull-right" id="main-menu-right">
                    <li><a href="">Welcome <?php echo $username?> </a></li>
                    <li><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'))?></li>
                </ul>
                <?php }?>
            </div>
        </div>
    </div>
</div>

	<div id="container">
		<div id="header">
		</div>
		<div id="content" class="container">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">


		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
