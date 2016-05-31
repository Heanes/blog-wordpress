<?php $display_categories = explode(',', get_option('swt_cat') ); $i = 1; foreach ($display_categories as $category) { ?>   
<div class="con_box fl resouse_artile qd_aritle" id="cat-<?php echo $i; ?>"  >
		<?php query_posts("cat=$category")?>
			  <h2><span><a class="more fr" rel="nofollow" href="<?php echo get_category_link($category);?>" target="_blank">更多 <?php single_cat_title(); ?> 文章</a></span><?php single_cat_title(); ?></h2>
	<div>	
		<ul class="column list clearfix"> 
		<?php query_posts( array('showposts' => 1,'cat' => $category,'post__not_in' => $do_not_duplicate));?>
		<?php while (have_posts()) : the_post(); ?>
			<li class="post-1"> 	
			<cite>
	  <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank">
			<?php if ( get_post_meta($post->ID, 'show', true) ) : ?>
				<?php $image = get_post_meta($post->ID, 'show', true); ?>
				<img src="<?php echo $image; ?>"width="100" height="80" alt="<?php the_title(); ?>"/>
				<?php else: ?>
				<?php if (has_post_thumbnail()) { the_post_thumbnail('home-thumb' ,array( 'alt' => trim(strip_tags( $post->post_title )), 'title' => trim(strip_tags( $post->post_title )),'class' => 'home-thumb')); }
				else { ?>
					 <img src="<?php echo catch_first_image() ?>" alt="<?php the_title(); ?>" width="100" height="80" />
				<?php } ?>
				<?php endif; ?>
				</a>
			</cite>
			<em><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>" ><?php echo cut_str($post->post_title,28); ?></a></em>
			<br/>
			<em class="excerpt"> <?php echo dm_strimwidth(strip_tags($post->post_content),0,50,"..."); ?></em>
			</li>
		<?php endwhile; ?>
		</ul>
		<ul class="index_resourse_list qd_list clearfix"> 
		<?php query_posts( array('showposts' => get_option('swt_column_post'),'cat' => $category,'offset' => 1,'post__not_in' => $do_not_duplicate));?>
		<?php while (have_posts()) : the_post(); ?>
			<li> <span class="fr"><?php the_time('m-d'); ?></span>			
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo cut_str($post->post_title,40); ?></a>
			</li>
		<?php endwhile; ?>
		</ul>
	</div> 
</div>
	<?php $i++; ?>
	<?php } ?>
