<?php 
/*
 * haozi / hao.chen@qq.com / www.daqianduan.com / t.qq.com/daqianduan && weibo.com/daqianduan / 2011.11.06
 * Theme D4 => 页面
*/
get_header();
?>
<div class="main">
	<div class="submain">
		<?php while (have_posts()) : the_post(); ?>
		<div class="article page">
			<div class="postmeta">
				<h1 class="tit"><?php the_title(); ?><span><?php comments_popup_link('抢沙发', '+1', '+%'); ?></span></h1>
			</div>
			<div class="entry">
				<?php the_content(); ?>
			</div>
		</div>
		<?php endwhile; comments_template('', true); ?>
    </div>
</div>
<?php get_sidebar(); get_footer(); ?>