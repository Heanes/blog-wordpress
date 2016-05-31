<?php get_header(); ?>
	<div id="wrapper" class="clearfix">
	<?php
		wp_reset_query();
		if (!is_home()) :
	?>
	<div id="breadcrumbs" class="con_box clearfix">
		<div class="bcrumbs"><strong><a href="<?php bloginfo('url'); ?>" title="返回首页">home</a></strong>
		<?php if ( get_category($cat)->category_parent ) : ?>
							<?php echo '<a>'; the_category('</a>', 'multiple'); ?>
						<?php elseif ( is_tag() ): ?>
							<a>包含标签 <?php single_cat_title(); ?> 的文章</a>
						<?php else : ?>
							<a><?php single_cat_title(); ?></a>
						<?php endif; ?>
		</div>
		<div class="caterss">
			<a href="<?php echo curPageURL(); ?>/feed" title="订阅该分类更新" target="_blank">分类订阅</a>
		</div> 
	</div>
	<?php endif; ?>
 		<div id="art_container clearfix">
 			<div id="art_main" class="fl"> 
		<?php if (get_option('swt_list') == '缩略图样式') { ?>
		<?php include(TEMPLATEPATH . '/includes/thumb_list.php');?>
		<?php } else { include(TEMPLATEPATH . '/includes/title_list.php'); } ?>
            </div><!--内容-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>