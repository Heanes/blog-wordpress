<?php get_header(); ?>
	<div id="wrapper" class="clearfix">
 		<div id="art_container clearfix">
 			<div id="art_main" class="fl"> 
					<?php if (get_option('swt_slidershow') == 'Display') { ?>
					<?php include(TEMPLATEPATH . '/includes/slider.php'); ?>
					<?php } else {echo ''; } ?>

					<?php if (get_option('swt_new_p') == 'Display') { ?>
					<?php include(TEMPLATEPATH . '/includes/new_post.php'); ?>
					<?php } else { echo ''; } ?>

					<?php if (get_option('swt_styles') == 'CMS') { ?>
					<?php include(TEMPLATEPATH . '/includes/column.php'); ?>
					<?php } else { include(TEMPLATEPATH . '/includes/blog.php'); } ?>

			</div><!-- art_main end-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>