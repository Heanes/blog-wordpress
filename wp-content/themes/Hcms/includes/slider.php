<div id="slideshow">
<div class="slideshow">
	<div id="featured_tag"></div>
	<div id="tag_c"></div>
	<div id="slider_nav"></div>
	<div id="slider" class="clearfix">
		<?php if (get_option('swt_sliders') == '特定分类的文章') { ?>
		<?php include(TEMPLATEPATH . '/includes/cat_slider.php'); ?>
		<?php } else { include(TEMPLATEPATH . '/includes/sti_slider.php'); } ?>
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
		<div class="featured_post" >
			<div class="slider_image">			
			<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank" >
			<?php if ( get_post_meta($post->ID, 'show', true) ) : ?>
				<?php $image = get_post_meta($post->ID, 'show', true); ?>
				<img src="<?php echo $image; ?>"width="350" height="248" alt="<?php the_title(); ?>"/>
				<?php else: ?>
				<?php if (has_post_thumbnail()) { the_post_thumbnail('home-thumb' ,array( 'alt' => trim(strip_tags( $post->post_title )), 'title' => trim(strip_tags( $post->post_title )),'class' => 'home-thumb')); }
				else { ?>
					 <img src="<?php echo catch_first_image() ?>" alt="<?php the_title(); ?>" width="350" height="248" />
				<?php } ?>
				<?php endif; ?>
				</a>			</div>
			<div class="slider_post">
				<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="详细阅读 <?php the_title_attribute(); ?>"><?php echo cut_str($post->post_title,40); ?></a></h3> 
				<div class="archive_info">
					<span class="date"><?php the_time('Y年m月d日') ?></span>
					<span class="category"> | <?php the_category(', ') ?></span>&nbsp
					<span class="edit"><?php edit_post_link('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', '  ', '  '); ?></span>
				</div>    
				<p><?php echo dm_strimwidth(strip_tags($post->post_content),0,180,"..."); ?></p>
				<div class="clear"></div>
			</div>
		</div>
<?php endwhile; ?>
<?php endif; ?>	
	</div>
 </div>
 </div>