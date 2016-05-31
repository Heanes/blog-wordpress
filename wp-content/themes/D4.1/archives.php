<?php
/*
Template Name: Archives
*/
get_header(); ?>	
<div class="main">
	<div class="submain">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="article page">			
			<div class="entry">	
            <h2>文章归档</h2>			
		<p class="articles_all"><strong><?php bloginfo('name'); ?></strong>目前共有文章：  <?php echo $hacklog_archives->PostCount();?>篇	</p>
	<?php echo $hacklog_archives->PostList();?>
			</div>
		</div>
		<?php endwhile; else: ?>
	<?php endif; ?>
    </div>
</div>
<?php get_sidebar(); get_footer(); ?>
<script type="text/javascript">
		/* <![CDATA[ */
			jQuery(document).ready(function() {
				jQuery('.car-collapse').find('.car-monthlisting').hide();
				jQuery('.car-collapse').find('.car-monthlisting:first').show();
				jQuery('.car-collapse').find('.car-yearmonth').click(function() {
					jQuery(this).next('ul').slideToggle('fast');
				});
				jQuery('.car-collapse').find('.car-toggler').click(function() {
					if ( '展开所有月份' == jQuery(this).text() ) {
						jQuery(this).parent('.car-container').find('.car-monthlisting').show();
						jQuery(this).text('折叠所有月份');
					}
					else {
						jQuery(this).parent('.car-container').find('.car-monthlisting').hide();
						jQuery(this).text('展开所有月份');
					}
					return false;
				});
			});
		/* ]]> */
	</script>