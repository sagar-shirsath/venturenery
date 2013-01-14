<div class="companies view">
<h2><?php  echo __('Company'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($company['Company']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($company['Company']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Industry'); ?></dt>
		<dd>
			<?php echo h($company['Company']['industry']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($company['Company']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logo Url'); ?></dt>
		<dd>
			<?php echo h($company['Company']['logo_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slogan'); ?></dt>
		<dd>
			<?php echo h($company['Company']['slogan']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Twitter Url'); ?></dt>
		<dd>
			<?php echo h($company['Company']['twitter_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fb Url'); ?></dt>
		<dd>
			<?php echo h($company['Company']['fb_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Linkedin Url'); ?></dt>
		<dd>
			<?php echo h($company['Company']['linkedin_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Blog Url'); ?></dt>
		<dd>
			<?php echo h($company['Company']['blog_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Video Url'); ?></dt>
		<dd>
			<?php echo h($company['Company']['video_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Active'); ?></dt>
		<dd>
			<?php echo h($company['Company']['is_active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($company['Company']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($company['Company']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Company'), array('action' => 'edit', $company['Company']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Company'), array('action' => 'delete', $company['Company']['id']), null, __('Are you sure you want to delete # %s?', $company['Company']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('action' => 'add')); ?> </li>
	</ul>
</div>









<div id="overlay">
    <div style="position: relative; margin: 0 auto; width: 840px;">
        <div class="small-circle red left-top"><h2>Share</h2></div>
        <div class="small-circle yellow left-bottom"><h2>Financials</h2></div>
        <div class="small-circle green right-bottom"><h2>News</h2></div>
        <div class="small-circle blue right-top"><h2>Watchlist</h2></div>
        <div class="clear"></div>
        <a href='#' onclick='overlay()'><h3>Close</h3></a>
    </div>
</div>


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
            <div id="more">
                <div class="circle gray" style="position: relative; margin: 0 auto; overflow: hidden; height: 522px; width:522px; padding: 2px 0px 0px 2px;">
                    <div class="top-left">
                        <h2><a href="#">Financials</a></h2>
                    </div>
                    <div class="top-right">
                        <h2><a href="#">Companies</a></h2>
                    </div>
                    <div class="bottom-left">
                        <h2><a href="#">People</a></h2>
                    </div>
                    <div class="bottom-right">
                        <h2><a href="#">Press</a></h2>
                    </div>
                </div>
            </div>
            <div class="circle blue" id="main">

                <div id="circle-header" class="blue-header">
                    <div class="title">
                        <h2>About</h2>
                        <h3><?php echo $company['Company']['description']?></h3>
                    </div>

                    <div class="name">
                        <h3>Company Name</h3>
                        <h2><?php echo $company['Company']['name']?></h2>
                    </div>
                    <!-- End Circle-top is below -->
                </div>

                <div id="circle-body" class="left-align">
                    <h3>Founders</h3>
                    <!-- End circle body below-->
                </div>
                <!-- End circle below -->
            </div>

        </div>
        <div class="extra-small-circle white center-bottom" onmouseover='showMore()' onclick='overlay()'>
            <h6>more</h6>
        </div>

        <!-- End wrapper below -->
    </div>

    <!-- End of content id -->
</div>