<?php get_header(); ?>
<div id="wrapper" class="clearfix">
	<div id="breadcrumbs" class="con_box clearfix">
		<div class="bcrumbs"><strong><a href="<?php bloginfo('home'); ?>" title="返回首页">home</a></strong>
		<?php the_category(multiple); ?>
		<a><?php the_title(); ?></a>
		</div>
	</div>
 	<div id="art_container clearfix">
 		<div id="art_main1" class="art_white_bg fl"> 
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
            <div class="art_title clearfix">
            <span class="face_img"><?php echo get_avatar( get_the_author_email(), '50' ); ?></span>
				<h1><?php the_title(); ?></h1>
				<p class="info">
				<small>时间:</small><?php the_time('y-m-d'); ?> 
				<small>栏目:</small><?php the_category(', ') ?> 
				<small>作者:</small><?php the_author(); ?> 
				<small>评论:</small><?php comments_number('0','1','%'); ?>
				<small>点击:</small><?php post_views(' ', ' 次'); ?>
				<?php edit_post_link( __('[编辑文章]')); ?>
				</p><!-- /info -->  
			</div>
			<div class="article_content">
				<div class="article-tag">
				<?php the_tags('<p><strong>本文标签</strong>： ', ' , ','</p>' ); ?>
				</div>
				<?php if (get_option('swt_adr') == 'Hide') { ?>
				<?php { echo ''; } ?>
				<?php } else { include(TEMPLATEPATH . '/includes/adr.php'); } ?>
				<div class="clear"></div>
				<?php the_content(); ?> 
				<?php if (get_option('swt_adt') == 'Hide') { ?>
				<?php { echo ''; } ?>
				<?php } else { include(TEMPLATEPATH . '/includes/adt.php'); } ?>
				<div class="clear"></div>
            			<?php   $custom_fields = get_post_custom_keys($post_id);
				if (!in_array ('copyright', $custom_fields)) : ?>

				<div class="postcopyright">
					<p><strong> 声明: </strong> 本文由(<a href="<?php bloginfo('home'); ?>"> <?php the_author(); ?> </a>)原创编译，转载请保留链接: <a href="<?php the_permalink()?>" title=<?php the_title(); ?>><?php the_title(); ?></a></p>
				</div>
			<?php else: ?>
			<?php  $custom = get_post_custom($post_id);
$custom_value = $custom['copyright']; ?>
				<div class="postcopyright">
					<p><strong> 声明: </strong> 本文参考自 <a rel="nofollow" target="_blank" href="/go.php?url=<?php echo $custom_value[0] ?>"><?php echo $custom_value[0] ?></a> ，由(<a href="<?php bloginfo('home'); ?>"> <?php the_author(); ?> </a>) 整编。</p>
					<p><strong> 本文链接: </strong><a href="<?php the_permalink()?>" title=<?php the_title(); ?>><?php the_title(); ?></a> .</p>
</div>
			<?php endif; ?>
				</div><!--正文--> 
			<div class="con_pretext clearfix">
					<ul>
						<li class="first">上一篇：<?php previous_post_link('%link') ?> </li>
						<li class="last">下一篇：<?php next_post_link('%link') ?></li>
					</ul>
			</div><!--上一页 下一页-->              
			<?php if (comments_open()) comments_template( '', true ); ?>
				<?php if (get_option('swt_adc') == 'Hide') { ?>
				<?php { echo ''; } ?>
				<?php } else { include(TEMPLATEPATH . '/includes/ad_c.php'); } ?>
				<div class="clear"></div>
		</div><!--内容-->

			<?php endwhile; ?>

	</div>
		<div class="clear"></div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>