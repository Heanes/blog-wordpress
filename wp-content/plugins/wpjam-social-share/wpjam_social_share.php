<?php
/*
Plugin Name: WPJAM Social Share
Plugin URI: http://fairyfish.net
Description: 社交化分享
Version: 1.0
Author: Denis
*/

$share_share_auto = 1;
$share_share_type = 'l';

add_action('wp_head','social_share_head');
function social_share_head(){
	global $share_share_type;
?>
<style type="text/css">

<?php	if($share_share_type == 's'){?>
	#social-share { margin:20px 0;height:16px;line-height:16px;}
	#social-share p { width:70px;float:left;font-size: 14px; }
	#social-share .social-share-left {width:16px;height:21px;background:url("<?php echo WP_PLUGIN_URL.'/'.dirname(plugin_basename (__FILE__));?>/shadow-side.png") left bottom no-repeat;float:left;}
	#social-share .social-share-right {width:16px;height:21px;background:url("<?php echo WP_PLUGIN_URL.'/'.dirname(plugin_basename (__FILE__));?>/shadow-side.png") right bottom no-repeat;float:left;}
	#social-share .social-share-center {height:21px;background:url(""<?php echo WP_PLUGIN_URL.'/'.dirname(plugin_basename (__FILE__));?>/shadow-center.png") left bottom repeat-x;float:left;}
	#social-share a {margin:0 2px;padding:0 9px;height:32px;width:16px;float:left;display:block;zoom:1;background:url("blank.gif");}
	#social-share .share-icon-wrapper, #social-share .share-shadow-wrapper {width:16px;height:16px;display:block;float:left;overflow:hidden;position:relative;cursor:pointer;}
	#social-share .share-icon-wrapper {padding-top:5px;}
	#social-share .share-shadow-wrapper {padding-bottom:5px;}
	#social-share .share-icon, #social-share .share-shadow { background:url("<?php echo WP_PLUGIN_URL.'/'.dirname(plugin_basename (__FILE__));?>/s.png") no-repeat;width:16px;height:16px;display:inline-block;position:relative;left:0;top:0;-webkit-transition:top 200ms;-moz-transition:top 200ms;-o-transition:top 200ms;transition:top 200ms;filter:progid:DXImageTransform.Microsoft.Alpha(opacity=100);-ms-filter:progid:DXImageTransform.Microsoft.Alpha(opacity=100);filter:alpha(opacity=100);}
	#social-share .share-shadow {-webkit-transform:scaleY(-1);-moz-transform:scaleY(-1);-o-transform:scaleY(-1);transform:scaleY(-1);opacity:.1;filter:FlipV;filter:progid:DXImageTransform.Microsoft.Alpha(opacity=10);-ms-filter:progid:DXImageTransform.Microsoft.Alpha(opacity=10);filter:alpha(opacity=10);}
	#social-share a:link .share-icon, #social-share a:visited .share-icon {top:0;}
	#social-share a:link .share-shadow, #social-share a:visited .share-shadow {top:0;}
	#social-share a:hover .share-icon, #social-share a:active .share-icon {top:-5px;}
	#social-share a:hover .share-shadow, #social-share a:active .share-shadow {top:5px;}
	#social-share .sina-share .share-icon, #social-share .sina-share .share-shadow { background-position:0 0;}
	#social-share .renren-share .share-icon, #social-share .renren-share .share-shadow { background-position:0 -20px;}
	#social-share .kaixin001-share .share-icon, #social-share .kaixin001-share .share-shadow { background-position:0 -40px;}
	#social-share .douban-share .share-icon, #social-share .douban-share .share-shadow { background-position:0 -60px;}
	#social-share .qq-share .share-icon, #social-share .qq-share .share-shadow { background-position:0 -80px;}
	#social-share .qzone-share .share-icon, #social-share .qzone-share .share-shadow { background-position:0 -100px;}
	#social-share .yunbiji-share .share-icon, #social-share .yunbiji-share .share-shadow { background-position:0 -120px;}
<?php }else{?>

	#social-share { margin:20px 0;height:32px;line-height:32px;}
	#social-share p { width:70px;float:left;font-size: 14px; }
	#social-share .social-share-left {width:16px;height:42px;background:url("<?php echo WP_PLUGIN_URL.'/'.dirname(plugin_basename (__FILE__));?>/shadow-side.png") left bottom no-repeat;float:left;}
	#social-share .social-share-right {width:16px;height:42px;background:url("<?php echo WP_PLUGIN_URL.'/'.dirname(plugin_basename (__FILE__));?>/shadow-side.png") right bottom no-repeat;float:left;}
	#social-share .social-share-center {height:42px;background:url("<?php echo WP_PLUGIN_URL.'/'.dirname(plugin_basename (__FILE__));?>/shadow-center.png") left bottom repeat-x;float:left;}
	#social-share a {margin:0 5px;padding:0 2px;height:64px;width:32px;float:left;display:block;zoom:1;background:url("blank.gif");}
	#social-share .share-icon-wrapper, #social-share .share-shadow-wrapper {width:32px;height:32px;display:block;float:left;overflow:hidden;position:relative;cursor:pointer;}
	#social-share .share-icon-wrapper {padding-top:10px;}
	#social-share .share-shadow-wrapper {padding-bottom:10px;}
	#social-share .share-icon, #social-share .share-shadow { background:url("<?php echo WP_PLUGIN_URL.'/'.dirname(plugin_basename (__FILE__));?>/s32.png") no-repeat;width:32px;height:32px;display:inline-block;position:relative;left:0;top:0;-webkit-transition:top 200ms;-moz-transition:top 200ms;-o-transition:top 200ms;transition:top 200ms;filter:progid:DXImageTransform.Microsoft.Alpha(opacity=100);-ms-filter:progid:DXImageTransform.Microsoft.Alpha(opacity=100);filter:alpha(opacity=100);}
	#social-share .share-shadow {-webkit-transform:scaleY(-1);-moz-transform:scaleY(-1);-o-transform:scaleY(-1);transform:scaleY(-1);opacity:.1;filter:FlipV;filter:progid:DXImageTransform.Microsoft.Alpha(opacity=10);-ms-filter:progid:DXImageTransform.Microsoft.Alpha(opacity=10);filter:alpha(opacity=10);}
	#social-share a:hover .share-icon, #social-share a:active .share-icon {top:-10px;}
	#social-share a:hover .share-shadow, #social-share a:active .share-shadow {top:10px;}
	#social-share .sina-share .share-icon, #social-share .sina-share .share-shadow { background-position:0 0;}
	#social-share .renren-share .share-icon, #social-share .renren-share .share-shadow { background-position:0 -36px;}
	#social-share .kaixin001-share .share-icon, #social-share .kaixin001-share .share-shadow { background-position:0 -72px;}
	#social-share .douban-share .share-icon, #social-share .douban-share .share-shadow { background-position:0 -108px;}
	#social-share .qq-share .share-icon, #social-share .qq-share .share-shadow { background-position:0 -144px;}
	#social-share .qzone-share .share-icon, #social-share .qzone-share .share-shadow { background-position:0 -180px;}
	#social-share .yunbiji-share .share-icon, #social-share .yunbiji-share .share-shadow { background-position:0 -216px;}

<?php }?>

</style>

<script type="text/javascript">
function social_share(post_id,share){
	if(typeof(_gap)!='undefined'){
		alert('111');
		_gaq.push(["_trackSocial",share, "Share",post_id]);
	}
	window.open('<?php bloginfo('wpurl');?>?share='+share+','+post_id,share,"width=600,height=400,left=150,top=100,scrollbar=no,resize=no");
}
</script>
<?php
}
function social_share(){
	if(is_single()){
		global $post;
		$share_array = array("sina"=>"新浪微博","qzone"=>"QQ空间","yunbiji"=>"云笔记","qq"=>"腾讯微博","renren"=>"人人网","douban"=>"豆瓣","kaixin001"=>"开心网");//,"mail"=>"邮件");
?>
<div id="social-share">
	<p>分享到：</p>
	<div class="social-share-left"></div>
	<div class="social-share-center">
	<?php foreach($share_array as $share_key => $share_value){?>
		<a class="<?php echo $share_key;?>-share" rel="nofollow" href="javascript:social_share('<?php echo $post->ID; ?>','<?php echo $share_key;?>')">
			<span class="share-icon-wrapper">
				<span class="share-icon"></span>
			</span>
			<span class="share-shadow-wrapper">
				<span class="share-shadow"></span>
			</span>
		</a>
<?php } ?>
	</div>
	<div class="social-share-right"></div>
</div>
<?php 
	}
}
if($share_share_auto){
	add_filter('the_content','social_share_content');
	function social_share_content($text){
		ob_start();
		social_share();
		$social_share = ob_get_contents();
		ob_end_clean();
		return $text.$social_share;
	}
}
?>
<?php
if(!function_exists('get_post_excerpt')){
	function get_post_excerpt($post){
		$post_excerpt = strip_tags($post->post_excerpt); 
		if(!$post_excerpt){
			$post_excerpt = mb_substr(strip_tags($post->post_content),0,100);
		}
		$post_excerpt = trim(strip_tags($post_excerpt));
		$post_excerpt = str_replace('"', '', $post_excerpt);	
		$post_excerpt = str_replace("\r\n", ' ', $post_excerpt);
		$post_excerpt = str_replace("\n", ' ', $post_excerpt);
		return $post_excerpt;
	}
}
if(!function_exists('get_post_first_image')){
	function get_post_first_image($post_content){
		preg_match_all('|<img.*?src=[\'"](.*?)[\'"].*?>|i', $post_content, $matches);			
		return $matches[1][0];
	}
}
add_action('init', 'social_share_redirect', 5);
function social_share_redirect(){
	$share = $_GET['share'];
	if(!$share){
		return;
	}
	
	$share = explode(",", $share);
	$post_id = $share[1];
	$share = $share[0];	
	
	$post = get_post($post_id);
	
	$post_link = get_permalink($post_id).'?utm_campaign=Share&utm_medium=share&utm_source='.$share;
	$post_title = $post->post_title;
	$post_excerpt =  get_post_excerpt($post).' '.$post_link;
	$pic = get_post_first_image($post->post_content);


	
	switch($share){
		case "sina":
			$link = 'http://v.t.sina.com.cn/share/share.php?appkey=3279848611&url='.urlencode($post_link).'&title='.
urlencode('【'.$post_title.'】'.$post_excerpt) .'&source=&sourceUrl=&content=utf-8&pic='.urlencode($pic);
			break;
		case "yunbiji":
			$link = 'http://yunbiji.com/saveto/?appkey=f8db62bee376290f2e9e7d92d42a4f4404ef459c8&url='.urlencode($post_link).'&title='.urlencode($post_title) .'&content='.urlencode($post_excerpt);
			break;
		case "qq":
			$link = 'http://v.t.qq.com/share/share.php?appkey=b7720f12ccef4164a9013b2edd899e6f&url='.urlencode($post_link).'&title='.urlencode($post_title) .'&site=&pic='.urlencode($pic);
			break;
		case "douban":
			$link = 'http://www.douban.com/recommend/?url='.urlencode($post_link).'&title='.urlencode($post_title).'&sel=&v=1';
			break;
		case "kaixin001":
			$link ='http://www.kaixin001.com/repaste/share.php?rurl='.urlencode($post_link).'&rtitle='.urlencode($post_title).'&rcontent='.$post_excerpt;
			break;
		case "renren":
			$link ='http://share.renren.com/share/buttonshare.do?link='.urlencode($post_link).'&title='.urlencode($post_title);
			break;
		case "qzone":
			$link = "http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=".urlencode($post_link);
			break;
		case "mail":
			$link = 'mailto:?subject='.urlencode($post_title).'&body='.urlencode($post_excerpt);
			break;
		default:
			break;
	}
	
	Header( "HTTP/1.1 301 Moved Permanently" );
	Header( "Location: $link" );
	exit;
}
