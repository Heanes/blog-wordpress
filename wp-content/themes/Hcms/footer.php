<!-- //底部模板 -->
<div id="footer" class="clearfix">
    <div class="con_box ">
	<?php wp_reset_query();if ( is_home()){ ?>
    	<div class="flink">
			<strong>友情链接:</strong>
		<?php Hcms_links("txt",24) ?>
		<a target="_blank" title="点击此处申请链接" href="/links" class="curflink">申请链接</a>
      </div>
	  <?php } ?>
          <div class="footer_bug">
			<a rel="nofollow" href="/about" target="_blank">关于Heanes</a>  |
            <a href="/sitemap.html" target="_blank">Sitemap</a> | 
            <a href="/sitemap_baidu.xml" target="_blank">百度地图</a> | 
            <a href="/sitemap.xml" target="_blank">谷歌地图</a>   
          </div>

    </div>
    	<div class="copyright">
      	<p>   挨挨踢网站为个人站点，本站内容仅供观摩学习交流之用，将不对任何资源负法律责任。<br/>如有侵犯您的版权，请及时联系Heanes，Heanes将尽快处理。<br/></p>
<p class="powered">Copyright&copy; 2010-2012  <a href="http://iit.heanes.com/" title="挨挨踢">IIT</a>. <?php echo stripslashes(get_option('swt_track_code')); ?>  <?php echo get_num_queries(); ?>次查询</p>        

<!-- /powered -->
   </div>
   <div class="footer_right">
   <img src="<?php bloginfo('template_url'); ?>/images/footer_logo.jpg" width="166" height="67" alt="挨挨踢" />
   <p>Powered by <a href="http://wordpress.org" title="WordPress博客程序" target="_blank">WordPress</a> 
   </div>
   <?php wp_footer(); ?>
		<div id="shangxia"><div id="shang" title="↑ 返回顶部"></div>
		<?php if ( is_singular() ){ ?>
		<div id="comt" title="查看评论"></div>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/comments-ajax.js"></script>
		<?php } ?>
		<div id="xia" title="↓ 移至底部"></div>
		<div id="myrss" title="<?php echo get_option('swt_rss'); ?>" onClick="window.open('<?php echo get_option('swt_rsssub'); ?>','_blank');"></div></div>
</div>
</body>
</html>
