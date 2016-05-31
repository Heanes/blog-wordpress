<?php
/*
 * haozi / hao.chen@qq.com / www.daqianduan.com / t.qq.com/daqianduan && weibo.com/daqianduan / 2011.11.06
 * Theme D4 => 首页特别推荐
*/
?>
<ul class="home-header">
	<?php for ($i=1; $i<=2; $i++)  { ?>
	<li>
		<div class="col0<?php echo $i ?>">
			<p class="sort"><?php echo stripslashes(get_option('d_home_recommended_0'.$i.'_sort')) ?></p>
			<h2 class="tit"><?php echo stripslashes(get_option('d_home_recommended_0'.$i.'_tit')) ?></h2>
			<p class="desc"><strong>简要说明：</strong><?php echo stripslashes(get_option('d_home_recommended_0'.$i.'_desc')) ?></p>
			<p class="link"><a class="btn primary" href="<?php echo stripslashes(get_option('d_home_recommended_0'.$i.'_btn_link_1')) ?>"><?php echo stripslashes(get_option('d_home_recommended_0'.$i.'_btn_1')) ?></a><a class="btn" href="<?php echo stripslashes(get_option('d_home_recommended_0'.$i.'_btn_link_2')) ?>"><?php echo stripslashes(get_option('d_home_recommended_0'.$i.'_btn_2')) ?></a></p>
		</div>
	</li>
	<?php } ?>
</ul>
<?php if (get_option('d_ie_b') == 'Open') { ?>
<!--[if <?php echo stripslashes(get_option('d_ie_version')); ?>]><div class="header-tips"><?php echo stripslashes(get_option('d_ie')); ?></div><![endif]-->
<?php } ?>