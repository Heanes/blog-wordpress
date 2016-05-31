<?php
/*
 * haozi / hao.chen@qq.com / www.daqianduan.com / t.qq.com/daqianduan && weibo.com/daqianduan / 2011.11.25
 * Theme D4 => 全站底部
*/
?>	
	</div>
</div>
<div class="footer">
	<div class="footer-sub">
		<p class="manage">
			<?php if (get_option('d_track_b') == 'Open') { echo stripslashes(get_option('d_track')); } ?> | <?php wp_loginout(); ?>
		</p>
		<p class="copyright">
			<?php dtheme_menu('footbar'); ?>
			版权所有，保留一切权利！Copyright <?php echo comicpress_copyright(); ?> <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a> Theme D4 By <a href="http://www.daqianduan.com/" target="_blank" >大前端</a> <a href="http://www.dreamxyt.net/" target="_blank" >象牙塔</a>优化 |备案号<?php //哥们，要厚道，请尊重开发者的版权，谢谢！ ?>
		</p>
	</div>
	<script src="<?php bloginfo('template_url') ?>/js/jquery.min.js"></script> 
	<script src="<?php bloginfo('template_url') ?>/js/common.js"></script>
	<?php if(is_single() || is_page()){ ?>
	<script src="<?php bloginfo('template_url') ?>/js/article.js"></script>
	<?php } ?>
	<?php dtheme_style_script( $post -> ID , 'script' ); ?>
</div>
<?php wp_footer(); ?>
</body>
</html>