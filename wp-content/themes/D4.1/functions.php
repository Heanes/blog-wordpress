<?php
/*
 * haozi / hao.chen@qq.com / www.daqianduan.com / t.qq.com/daqianduan && weibo.com/daqianduan / 2011.11.06
 * Theme D4 => 配置文件
*/
add_action( 'after_setup_theme', 'dtheme_setup' );

//主题后台配置文件
include('inc/opt/theme-opt.php');

function dtheme_setup(){

	require( dirname( __FILE__ ) . '/inc/function-opt.php' );
	
	//去除头部冗余代码
	remove_action( 'wp_head', 'feed_links_extra', 3 ); 
	remove_action( 'wp_head', 'rsd_link' ); 
	remove_action( 'wp_head', 'wlwmanifest_link' ); 
	remove_action( 'wp_head', 'index_rel_link' ); 
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); 
	remove_action( 'wp_head', 'wp_generator' ); 
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 ); 

	add_action('wp_head', 			'dtheme_keywords');			//关键字
	add_action('wp_head', 			'dtheme_description');		//页面描述
    add_action('pre_ping', 			'dtheme_noself_ping');		//阻止站内PingBack
	add_action('init', 				'dtheme_gzip');				//Gzip压缩
	add_action('login_head', 		'dtheme_login_logo');		//登陆页面Logo改造
	add_action('comment_post', 		'comment_mail_notify');		//评论回复邮件通知
	add_action('comment_form', 		'dtheme_add_checkbox');		//自动勾选评论回复邮件通知，不勾选则注释掉
	add_filter('smilies_src',		'dtheme_smilies_src',1,10);	//评论表情改造，如需更换表情，img/smilies/下替换	
	add_filter('the_content', 		'dtheme_copyright');		//文章末尾增加版权
	
	//移除自动保存和修订版本
	add_action('wp_print_scripts',	'dtheme_disable_autosave' );
	remove_action('pre_post_update','wp_save_post_revision' );
	//禁止代码标点转换
    remove_filter('the_content', 'wptexturize');
	//去除自带js
	wp_deregister_script( 'l10n' );	

	//缩略图设置
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(140, 98, true); 
	
	//修改默认发信地址
	add_filter('wp_mail_from', 'dtheme_res_from_email');
	add_filter('wp_mail_from_name', 'dtheme_res_from_name');
	//后台@用户名
	add_action( 'admin_print_styles', 'admin_reply_admin_enqueue_scripts' );
	
	//评论链接重定向	
	add_action('init', 'dtheme_redirect_comment_link');
	add_filter('get_comment_author_link', 'dtheme_add_redirect_comment_link', 5);
	add_filter('comment_text', 'dtheme_add_redirect_comment_link', 99);
	
	//定义菜单
	if (function_exists('register_nav_menus')){
		register_nav_menus( array(
		'nav' => __('站点导航'),
		'menu' => __('顶部菜单'),
		'footbar' => __('底部菜单')
		) );
	}

}

//自动生成版权时间
function comicpress_copyright() {
    global $wpdb;
    $copyright_dates = $wpdb->get_results("
    SELECT
    YEAR(min(post_date_gmt)) AS firstdate,
    YEAR(max(post_date_gmt)) AS lastdate
    FROM
    $wpdb->posts
    WHERE
    post_status = 'publish'
    ");
    $output = '';
    if($copyright_dates) {
    $copyright = "&copy; " . $copyright_dates[0]->firstdate;
    if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
    $copyright .= '-' . $copyright_dates[0]->lastdate;
    }
    $output = $copyright;
    }
    return $output;
    }

//日志归档
	class hacklog_archives
{
	function GetPosts() 
	{
		global  $wpdb;
		if ( $posts = wp_cache_get( 'posts', 'ihacklog-clean-archives' ) )
			return $posts;
		$query="SELECT DISTINCT ID,post_date,post_date_gmt,comment_count,comment_status,post_password FROM $wpdb->posts WHERE post_type='post' AND post_status = 'publish' AND comment_status = 'open'";
		$rawposts =$wpdb->get_results( $query, OBJECT );
		foreach( $rawposts as $key => $post ) {
			$posts[ mysql2date( 'Y.m', $post->post_date ) ][] = $post;
			$rawposts[$key] = null; 
		}
		$rawposts = null;
		wp_cache_set( 'posts', $posts, 'ihacklog-clean-archives' );;
		return $posts;
	}
	function PostList( $atts = array() ) 
	{
		global $wp_locale;
		global $hacklog_clean_archives_config;
		$atts = shortcode_atts(array(
			'usejs'        => $hacklog_clean_archives_config['usejs'],
			'monthorder'   => $hacklog_clean_archives_config['monthorder'],
			'postorder'    => $hacklog_clean_archives_config['postorder'],
			'postcount'    => '1',
			'commentcount' => '1',
		), $atts);
		$atts=array_merge(array('usejs'=>1,'monthorder'   =>'new','postorder'    =>'new'),$atts);
		$posts = $this->GetPosts();
		( 'new' == $atts['monthorder'] ) ? krsort( $posts ) : ksort( $posts );
		foreach( $posts as $key => $month ) {
			$sorter = array();
			foreach ( $month as $post )
				$sorter[] = $post->post_date_gmt;
			$sortorder = ( 'new' == $atts['postorder'] ) ? SORT_DESC : SORT_ASC;
			array_multisort( $sorter, $sortorder, $month );
			$posts[$key] = $month;
			unset($month);
		}
		$html = '<div class="car-container';
		if ( 1 == $atts['usejs'] ) $html .= ' car-collapse';
		$html .= '">'. "\n";
		if ( 1 == $atts['usejs'] ) $html .= '<a href="#" class="car-toggler">展开所有月份'."</a>\n\n";
		$html .= '<ul class="car-list">' . "\n";
		$firstmonth = TRUE;
		foreach( $posts as $yearmonth => $posts ) {
			list( $year, $month ) = explode( '.', $yearmonth );
			$firstpost = TRUE;
			foreach( $posts as $post ) {
				if ( TRUE == $firstpost ) {
					$html .= '	<li><span class="car-yearmonth">+ ' . sprintf( __('%1$s %2$d'), $wp_locale->get_month($month), $year );
					if ( '0' != $atts['postcount'] ) 
					{
						$html .= ' <span title="文章数量">(共' . count($posts) . '篇文章)</span>';
					}
					$html .= "</span>\n		<ul class='car-monthlisting'>\n";
					$firstpost = FALSE;
				}
				$html .= '			<li>' .  mysql2date( 'd', $post->post_date ) . '日: <a target="_blank" href="' . get_permalink( $post->ID ) . '">' . get_the_title( $post->ID ) . '</a>';
				if ( '0' != $atts['commentcount'] && ( 0 != $post->comment_count || 'closed' != $post->comment_status ) && empty($post->post_password) )
					$html .= ' <span title="评论数量">(' . $post->comment_count . '条评论)</span>';
				$html .= "</li>\n";
			}
			$html .= "		</ul>\n	</li>\n";
		}
		$html .= "</ul>\n</div>\n";
		return $html;
	}
	function PostCount() 
	{
		$num_posts = wp_count_posts( 'post' );
		return number_format_i18n( $num_posts->publish );
	}
}
if(!empty($post->post_content))
{
	$all_config=explode(';',$post->post_content);
	foreach($all_config as $item)
	{
		$temp=explode('=',$item);
		$hacklog_clean_archives_config[trim($temp[0])]=htmlspecialchars(strip_tags(trim($temp[1])));
	}
}
else
{
	$hacklog_clean_archives_config=array('usejs'=>1,'monthorder'   =>'new','postorder'    =>'new');	
}
$hacklog_archives=new hacklog_archives();
?>
