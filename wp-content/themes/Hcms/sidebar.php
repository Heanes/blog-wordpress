<div id="sider" class="fr">
	<?php if (get_option('swt_email') == 'Hide') { ?>
		<?php { echo ''; } ?>
		<?php } else { include(TEMPLATEPATH . '/includes/feed_email.php'); } ?>
<div class="clear"></div>
	<div class="con_box htabs_art clearfix"> 
		<ul class="cooltab_nav sj_nav clearfix">
			<li><a href="#" class="active" title="new_art">最新文章</a></li>
			<li><a href="#" title="hot_art">热门文章</a></li>
			<li><a href="#" title="rand_art">随机推荐</a></li>
		</ul>   
		<div id="new_art" class="com_cont">   
			<ul>
				<?php query_posts('posts_per_page=10&caller_get_posts=1'); ?>
				<?php while (have_posts()) : the_post(); ?>
				<li>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="title"><?php echo cut_str($post->post_title,36); ?></a>
				</li>
				<?php endwhile; ?>
			</ul>                    
		</div>
        <div id="hot_art" class="com_cont">  
            <ul>
				<?php query_posts('posts_per_page=10&caller_get_posts=1&orderby=comment_count'); ?>
				<?php while (have_posts()) : the_post(); ?>
				<li>
				<a href="<?php the_permalink(); ?>" class="title" title="<?php the_title(); ?>"><?php echo cut_str($post->post_title,36); ?></a>
				</li>
				<?php endwhile; ?>
			</ul>      
		</div>
		<div id="rand_art" class="com_cont">  
			<ul>
				<?php query_posts('posts_per_page=10&caller_get_posts=1&orderby=rand'); ?>
				<?php while (have_posts()) : the_post(); ?>
				<li>
				<a href="<?php the_permalink(); ?>" class="title" title="<?php the_title(); ?>"><?php echo cut_str($post->post_title,36); ?></a>
				</li>
				<?php endwhile; ?>
			</ul>
		</div>   
	</div>
	<div class="con_box hot_box">
		<h3>热门标签</h3>
			<ul class="tagcloudy">
				<li>
				<?php wp_tag_cloud('number=30&largest=18&smallest=12&unit=px'); ?>
				</li>
				</ul>
	</div> 
	<?php wp_reset_query(); if (is_home()||is_singular()) : ?>
	<div class="con_box hot_box">
		<h3>读者排行</h3>
		<div class="readers clearfix">
			<?php hcms_readers($out=get_option('swt_outer'),$timer=get_option('swt_timer'),$limit=get_option('swt_limit')); ?>
		</div>
	</div> 
	<div class="con_box hot_box">
		<h3>最新评论</h3>
		<div class="r_comments">
			<ul>
			<?php r_comments($outer=get_option('swt_outer')); ?>
			</ul>
		</div>				
	</div>
	<?php endif; ?>
	<div id="rollstart"></div>
	<?php wp_reset_query(); if (is_singular()) : ?>
		<?php if (get_option('swt_ads') == 'Hide') { ?>
		<?php { echo ''; } ?>
		<?php } else { include(TEMPLATEPATH . '/includes/ad_s.php'); } ?>
		<div class="clear"></div>
	<?php endif; ?>
	</div>
</div> 
</div><!-- //wrapper -->