<div id="sticky-cat">
	<?php
	query_posts(array(
		"category__in" => array(get_query_var("cat")),
		"post__in" => get_option("sticky_posts"),
		'showposts' =>  get_option('cx_sticky_cat_n')
		)
	);
	?>
	<?php while (have_posts()) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="sticky-box">
			<span class="sticky-ico">荐</span>
			<div class="sticky-main">
				<header class="sticky-header">
					<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="详细阅读 <?php the_title(); ?>"><?php the_title(); ?></a></h1>
				</header>
				<figure class="sticky-thumbnail">
					<?php get_template_part( 'inc/thumbnail' ); ?>
				</figure>
				<div class="sticky-entry">
					<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 106,"..."); ?>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</article>
<?php 
	endwhile;
	wp_reset_query();
?>
	<div class="clear"></div>
</div>