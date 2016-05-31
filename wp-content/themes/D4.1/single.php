<?php 
/*
 * haozi / hao.chen@qq.com / www.daqianduan.com / t.qq.com/daqianduan && weibo.com/daqianduan / 2011.11.06
 * Theme D4 => 文章页
*/
get_header();
?>
<div class="main">
	<div class="submain">
		<?php while (have_posts()) : the_post(); ?>
		<div class="article single">
			<div class="postmeta">
				<p class="time"><?php the_date_xml(); ?>　By <?php the_author_posts_link(); ?>　<?php edit_post_link('[编辑]'); ?></p>
				<h1 class="tit"><?php the_title(); ?><span><?php comments_popup_link('抢沙发', '+1', '+%'); ?></span></h1>
				<p class="tag">分类：<?php the_category('、'); ?>　<?php the_tags(__('标签：'), "、") ?>　<?php dtheme_views(); ?>(浏览)</p>
			</div>
			<?php if (get_option('d_adpost_01_b') == 'Open') { ?>
				<div id="aside2" style="display: none; "><div id="aside-loader2" style="display: none; "><center><?php echo stripslashes(get_option('d_adpost_01')) ?></center></div></div>
			<?php }; ?>
			<div class="entry">
				<?php the_content(); ?>
                <?php   $custom_fields = get_post_custom_keys($post_id);
				if (!in_array ('copyright', $custom_fields)) : ?>
     		<p><strong> 原创文章转载请注明出处: </strong>: <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_permalink() ?> | <?php bloginfo('name');?></a></p>
				<?php else: ?>
			    <?php  $custom = get_post_custom($post_id);
$custom_value = $custom['copyright']; ?>
				<p><strong> 声明: </strong> 本文参考自 <a rel="nofollow" target="_blank" href="/go.php?url=<?php echo $custom_value[0] ?>"><?php echo $custom_value[0] ?></a> ，由(<a href="<?php bloginfo('home'); ?>"> <?php the_author(); ?> </a>) 整编。</p>
                <p>本文固定链接: <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_permalink() ?> | <?php bloginfo('name');?></a></p>
			<?php endif; ?>
			</div>
		</div>
		<?php dtheme_post_related(); ?>
		<?php endwhile; comments_template('', true); ?>
       </div>
</div>
<?php get_sidebar(); get_footer(); ?>