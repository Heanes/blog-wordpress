<?php
/*
Template Name: 文章归档
*/
?>
<?php get_header(); ?>

<?php get_template_part( 'inc/functions/archives' ); ?>
<div id="primary" class="site-content">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<section class="content"><div class="expand_collapse">展开收缩</div>
			<?php while ( have_posts() ) : the_post(); ?>
			<header class="single-header">
				<h1 class="single-title"><?php the_title(); ?></h1>
				<div class="single-meta">
					<?php echo $count_categories = wp_count_terms('category'); ?>个分类&nbsp;&nbsp;
					<?php echo $count_tags = wp_count_terms('post_tag'); ?>个标签&nbsp;&nbsp;
					<?php $count_posts = wp_count_posts(); echo $published_posts = $count_posts->publish;?> 篇文章&nbsp;&nbsp;
					<?php echo $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments");?>条留言&nbsp;&nbsp;
					更新时间：<?php $last = $wpdb->get_results("SELECT MAX(post_modified) AS MAX_m FROM $wpdb->posts WHERE (post_type = 'post' OR post_type = 'page') AND (post_status = 'publish' OR post_status = 'private')");$last = date('Y年n月j日', strtotime($last[0]->MAX_m));echo $last; ?>
				</div>
			</header>
			<div class="archives"><?php archives_list_cx(); ?></div>
		</section>
		<!-- #content -->
		<?php endwhile; ?>
	</article>
</div>
<!-- #primary -->
<style type="text/css">
.expand_collapse {
	float: right;
	background: #04a4cc;
	width: 80px;
	color: #fff;
	text-align: center;
	margin: 10px 0;
	padding: 4px 0;
	border: 1px solid #04a4cc;
	border-radius: 2px;
}
.archives-yearmonth  {
	margin: 5px 0 5px 5px;
	padding: 0 0 0 8px;
	border-left: 8px solid #04a4cc;
}
.archives-monthlisting li {
	margin: 5px 0 5px 5px;
	padding: 0 0 0 16px;
}
</style>
<script type="text/javascript">
jQuery(function($){
	$('.expand_collapse,.archives-yearmonth').css({cursor:"pointer"});
	$('.archives ul li ul.archives-monthlisting').hide();
	$('.archives ul li ul.archives-monthlisting:first').show();
	$('.archives ul li span.archives-yearmonth').click(function(){$(this).next().slideToggle('fast');return false;});
	//以下是全局的操作
	$('.expand_collapse').toggle(
	function(){
		$('.archives ul li ul.archives-monthlisting').slideDown('fast');
	},
	function(){
		$('.archives ul li ul.archives-monthlisting').slideUp('fast');
	});
});
</script>
<?php get_sidebar(); ?>
<?php get_footer(); ?>