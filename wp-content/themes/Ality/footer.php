<?php get_template_part( 'inc/links' ); ?>

<footer id="footer">
	<div class="site-info">
		Copyright &copy; <?php bloginfo( 'name' ); ?>  保留所有权利.&nbsp;&nbsp;
		<span class="info-add">
			<a title="主题设计：知更鸟" href="http://zmingcx.com" target="_blank">Ality主题</a>
			<?php echo stripslashes(get_option('cx_track')); ?>
			<?php echo stripslashes(get_option('cx_icp')); ?>
		</span>
	</div>
	<!-- .site-info -->
<div id="sidr" style="display: none;"><a id="simple-menu-s" href="#sidr"><i class="icon-close"></i></a><?php wp_nav_menu( array( 'theme_location' => 'mini-menu' ) ); ?></div>

<?php get_template_part( 'inc/login' ); ?>

<?php get_template_part( 'inc/scroll' ); ?>

<?php if (get_option('cx_share') == 'true') { ?>
<?php get_template_part( 'inc/share' ); ?>
<?php } ?>

</footer>
<!-- #footer -->
<?php if ( ! is_home() ){ ?>
<script type="text/javascript">
$(".sidebar-roll").smartFloat();
</script>
<?php } ?>
</div><!-- #main -->
</div><!-- #page -->
<?php if (is_home() || is_archive() || is_search()) { ?>
<script type="text/javascript">
    document.onkeydown = chang_page;function chang_page(e) {
        var e = e || event,
        keycode = e.which || e.keyCode;
        if (keycode == 33 || keycode == 37) location = '<?php echo get_previous_posts_page_link(); ?>';
        if (keycode == 34 || keycode == 39) location = '<?php echo get_next_posts_page_link(); ?>';
    }
</script>
<?php } ?>
<?php wp_footer(); ?>
</body>
</html>