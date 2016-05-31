<?php 
/*
 * haozi / hao.chen@qq.com / www.daqianduan.com / t.qq.com/daqianduan && weibo.com/daqianduan / 2011.11.06
 * Theme D4 => 友情链接页面
 * template name: Tags
*/
get_header();
?>
<div class="main">
	<div class="submain">
		<?php while (have_posts()) : the_post(); ?>
		<div class="article page">
			<div class="postmeta">
				<h1 class="tit"><?php the_title(); ?></h1>
			</div>
			<div class="entry">
				<?php wp_tag_cloud('number=500&orderby=count&order=DESC&smallest=18&largest=12&unit=px'); ?>
			</div>
		</div>
		<?php endwhile; ?>
    </div>
</div>
<?php get_sidebar(); get_footer(); ?>