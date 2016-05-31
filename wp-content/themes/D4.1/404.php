<?php 
/*
 * haozi / hao.chen@qq.com / www.daqianduan.com / t.qq.com/daqianduan && weibo.com/daqianduan / 2011.11.06
 * Theme D4 => 404
*/
get_header(); 
?>
<div class="main">
	<div class="unfind">
        <h2 class="tit">抱歉，沒有找到您需要的文章！！</h2>
		<h3>或许您喜欢：</h3>
		<ul class="some-post"><?php dtheme_posts_list( 'comment_count','','6' ); ?></ul>
    </div>
</div> 
<?php get_footer(); ?>