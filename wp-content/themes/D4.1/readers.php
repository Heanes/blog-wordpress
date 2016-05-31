<?php 
/*
 * haozi / hao.chen@qq.com / www.daqianduan.com / t.qq.com/daqianduan && weibo.com/daqianduan / 2011.11.21
 * Theme D4 => 读者墙
 * template name: readers
*/
get_header();
/* 
 * 读者墙
 * 页面形式	dtheme_readers( $outer='name', $timer='3', $limit='80' );
 * $outer 不显示某人
 * $timer 几个月时间内
 * $limit 显示条数
*/
function dtheme_page_readers($outer,$timer,$limit){
	global $wpdb;
	$counts = $wpdb->get_results("select count(comment_author) as cnt, comment_author, comment_author_url, comment_author_email from (select * from $wpdb->comments left outer join $wpdb->posts on ($wpdb->posts.id=$wpdb->comments.comment_post_id) where comment_date > date_sub( now(), interval $timer month ) and user_id='0' and comment_author != '".$outer."' and post_password='' and comment_approved='1' and comment_type='') as tempcmt group by comment_author order by cnt desc limit $limit");
	foreach ($counts as $count) {
		$c_url = $count->comment_author_url;
		if ($c_url == '') $c_url = '';
		$type .= '<li><a target="_blank" rel="nofollow" href="'. $c_url . '">'.get_avatar($count->comment_author_email, 36,$default = get_bloginfo('template_directory') . '/img/default.png').'<em>' . $count->comment_author . '</em><strong>+'. $count->cnt . '</strong><br>'.substr( $c_url , 7 ).'</a></li>';
	}
	echo $type;
}
?>
<style type="text/css">
.readers{line-height:18px;text-align:left;overflow:hidden;_zoom:1}
.readers li{width:200px;float:left;*margin-right:-1px}
.readers a,.readers a:hover strong{background-color:#f2f2f2;background-image:-webkit-linear-gradient(#f8f8f8,#f2f2f2);background-image:-moz-linear-gradient(#f8f8f8,#f2f2f2);background-image:linear-gradient(#f8f8f8,#f2f2f2)}
.readers a{position:relative;display:block;height:36px;margin:4px;padding:4px 4px 4px 44px;color:#999;overflow:hidden;border:#ccc 1px solid;border-radius:2px;box-shadow:#eee 0 0 2px}
.readers img,.readers em,.readers strong{-webkit-transition:all .2s ease-out;-moz-transition:all .2s ease-out;transition:all .2s ease-out}
.readers img{width:36px;height:36px;float:left;margin:0 8px 0 -40px;border-radius:2px}
.readers em{color:#666;font-style:normal;margin-right:10px}
.readers strong{color:#ddd;width:40px;text-align:right;position:absolute;right:6px;top:5px;font:bold 14px/16px microsoft yahei}
.readers a:hover{border-color:#bbb;box-shadow:#ccc 0 0 2px;background-color:#fff;background-image:none}
.readers a:hover img{opacity:.6;margin-left:0}
.readers a:hover em{color:#EE8B17;font:bold 12px/36px microsoft yahei}
.readers a:hover strong{color:#EE8B17;right:150px;top:0;text-align:center;border-right:#ccc 1px solid;height:44px;line-height:40px}
</style>
<div class="main">
	<div class="submain">
		<?php while (have_posts()) : the_post(); ?>
		<div class="article page">
			<div class="postmeta">
				<h1 class="tit"><?php the_title(); ?><span><?php comments_popup_link('抢沙发', '+1', '+%'); ?></span></h1>
			</div>
			<div class="entry">
				<?php the_content(); ?>
			</div>
			<div class="readers">
				<?php dtheme_page_readers($outer='浩子',$timer='30',$limit='36'); ?>
			</div>
		</div>
		<?php endwhile; comments_template('', true); ?>
	</div>
</div>
<?php get_sidebar(); get_footer(); ?>