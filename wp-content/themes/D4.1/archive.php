<?php
/*
 * haozi / hao.chen@qq.com / www.daqianduan.com / t.qq.com/daqianduan && weibo.com/daqianduan / 2011.11.06
 * Theme D4 => 分类列表页
*/
get_header();
?>
<div class="main">
	<div class="submain thelist">
		<?php dtheme_queryinfo(); ?>
		<div class="excerpt">
        <?php if (have_posts()) : ?><?php else : ?><br />&nbsp;&nbsp;&nbsp;此分类暂无内容
<?php endif; ?>
			<?php while (have_posts()) : the_post(); ?>
			<ul>
				<li>
					<?php dm_the_thumbnail(); ?><span><?php comments_popup_link('抢沙发', '+1', '+%'); ?></span>
					<h2 class="tit">
						<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>-<?php bloginfo('name'); ?>"><?php the_title(); ?></a>
					</h2>
                    <p class="time" style="font-size: 13px;"><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerpt', $post->post_content)), 0, 220,"..."); ?></p>					
                    <p class="time" style="font-size: 13px;">时间：<strong><?php the_date_xml(); ?></strong>  分类：<?php the_category('、'); ?> 浏览次数：<strong><?php dtheme_views(); ?></strong></p>
				</li>
			</ul>
           <?php endwhile; ?>
		</div>
		<?php dtheme_pagenav(); ?></div>
    </div>
</div>
<?php get_sidebar(); get_footer(); ?>