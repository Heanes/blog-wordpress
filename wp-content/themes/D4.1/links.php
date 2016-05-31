<?php 
/*
 * haozi / hao.chen@qq.com / www.daqianduan.com / t.qq.com/daqianduan && weibo.com/daqianduan / 2011.11.22
 * Theme D4 => 友情链接页面
 * template name: links
*/
get_header();
?>
<style type="text/css">
.links{clear:both}
.links h2{font-size:14px;color:#090;margin-bottom:12px}
.links ul{margin-bottom:15px;overflow:auto;zoom:-1;border-top:#D6DBE0 1px solid;border-left:#D6DBE0 1px solid; margin-right:-1px;}
.links ul li{width:25%;float:left}
.links ul li a{display:block;border-right:#D6DBE0 1px solid;border-bottom:#D6DBE0 1px solid;padding:6px 5px;height:22px;overflow:hidden}
.links ul li a:hover{border-bottom:#009900 2px solid;color:#090;font-weight:bold;height:21px}
.links ul li img{position:relative;top:3px;margin:0 10px 0 5px}
</style>
<div class="main">
	<div class="submain">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="article page">
			<div class="postmeta">
				<h1 class="tit"><?php the_title(); ?><span><?php comments_popup_link('抢沙发', '+1', '+%'); ?></span></h1>
			</div>
			<div class="entry">
<p>在您申请本站友情链接之前请先做好本站链接，否则不会通过，谢谢！(首页导出已30，目前暂停交换首页链接)</p>
<p>在做链接前我希望的是交流，博客与博客的交流，而不是一上来就是交换链接。</p>
<p>想要添加友链的朋友可以在下面留言，要求时常更新网站内容，另外如果你的网站被K，我这会暂时删除你的友链，待恢复后，可以再联系我添加链接。
本站目前还是新站，本站长目前也是菜鸟，说实话我的技术不高，但人总有个学习成长的过程，没有一步登天的。我在此诚挚地向大家提出邀请，欢迎志同道合的朋友和新手菜鸟们经常光顾本站，并提出宝贵建议。有什么疑难也可以找我，只要是我会的，我都尽量帮大家解决。</p>
<p>本人联系方式：QQ：907484364 Email：jsxh@dreamxyt.net或QQ邮箱。</p>
			</div>
			<div class="links mblog"><?php my_list_bookmarks('category_before=&category_after=&category=119&title_li=友情链接：&categorize=0&show_name=1'); ?></div><?php /*?>&show_description=1&between= - - - <?php */?>
		</div>
		<?php comments_template('', true); ?>
		<?php endwhile; endif; ?>
	</div>
</div>
<?php
function my_bookmarks($bookmarks, $args = '' ) {
	$defaults = array(
		'show_updated' => 0, 'show_description' => 0,
		'show_images' => 1, 'show_name' => 0,
		'before' => '<li>', 'after' => '</li>', 'between' => "\n",
		'show_rating' => 0, 'link_before' => '', 'link_after' => '','nofollow' =>0
	);
	$r = wp_parse_args( $args, $defaults );
	extract( $r, EXTR_SKIP );
	$output = ''; // Blank string to start with.
	foreach ( (array) $bookmarks as $bookmark ) {
		if ( !isset($bookmark->recently_updated) )
			$bookmark->recently_updated = false;
		$output .= $before;
		if ( $show_updated && $bookmark->recently_updated )
			$output .= get_option('links_recently_updated_prepend');
		$the_link = '#';
		if ( !empty($bookmark->link_url) )
			$the_link = esc_url($bookmark->link_url);
		$rel = ' rel="external';
		if ($nofollow)
			$rel .= ' nofollow';
		if ( '' != $bookmark->link_rel )
			$rel .= ' ' . $bookmark->link_rel;
		$rel .= '"';
		$desc = esc_attr(sanitize_bookmark_field('link_description', $bookmark->link_description, $bookmark->link_id, 'display'));
		$name = esc_attr(sanitize_bookmark_field('link_name', $bookmark->link_name, $bookmark->link_id, 'display'));
 		$title = $desc;
		if ( $show_updated )
			if ( '00' != substr($bookmark->link_updated_f, 0, 2) ) {
				$title .= ' (';
				$title .= sprintf(__('Last updated: %s'), date(get_option('links_updated_date_format'), $bookmark->link_updated_f + (get_option('gmt_offset') * 3600)));
				$title .= ')';
			}
		if ( '' != $title )
			$title = ' title="' . $title . '"';
		$alt = ' alt="' . $name . '"';
		$target = $bookmark->link_target;
		if ( '' != $target )
			$target = ' target="' . $target . '"';
		$output .= '<a href="' . $the_link . '"' . $rel . $title . $target. '>';
		$output .= $link_before;
		if ( $show_images ) {
			if ( $bookmark->link_image != null) {
				if ( strpos($bookmark->link_image, 'http') !== false )
					$output .= "<img src=\"$bookmark->link_image\" $alt $title />";
				else // If it's a relative path
					$output .= "<img src=\"" . get_option('siteurl') . "$bookmark->link_image\" $alt $title />";
			} else {//否则显示网站的Favicon
				if (preg_match('/^(https?:\/\/)?([^\/]+)/i',$the_link,$URI)) {//提取域名
					$domains = $URI[2];
				}else{//域名提取失败，显示默认小地球
					$domains = "example.com";
				}
				$output .= "<img src=\"http://www.google.com/s2/favicons?domain=$domains\" $alt $title />";
			}
		}
		$output .= $name;
		$output .= $link_after;
		$output .= '</a>';
		if ( $show_updated && $bookmark->recently_updated )
			$output .= get_option('links_recently_updated_append');
		if ( $show_description && '' != $desc )
			$output .= $between . $desc;
		if ($show_rating) {
			$output .= $between . sanitize_bookmark_field('link_rating', $bookmark->link_rating, $bookmark->link_id, 'display');
		}
		$output .= "$after\n";
	} // end while
	return $output;
}
function my_list_bookmarks($args = '') {
	$defaults = array(
		'orderby' => 'name',
		'order' => 'ASC',
		'limit' => -1,
		'category' => '',
		'exclude_category' => '',
		'category_name' => '',
		'hide_invisible' => 1,
		'show_updated' => 0,
		'echo' => 1,
		'categorize' => 1,
		'title_li' => __('Bookmarks'),
		'title_before' => '<h2 class="post-title">',
		'title_after' => '</h2>',
		'category_orderby' => 'name',
		'category_order' => 'ASC',
		'class' => 'linkcat',
		'category_before' => '<li id="%id" class="%class">',
		'category_after' => '</li>',
		'nofollow' => 0
	);
	$r = wp_parse_args( $args, $defaults );
	extract( $r, EXTR_SKIP );
	$output = '';
	if ( $categorize ) {
		//Split the bookmarks into ul's for each category
		$cats = get_terms('link_category', array('name__like' => $category_name, 'include' => $category, 'exclude' => $exclude_category, 'orderby' => $category_orderby, 'order' => $category_order, 'hierarchical' => 0));
		foreach ( (array) $cats as $cat ) {
			$params = array_merge($r, array('category'=>$cat->term_id));
			$bookmarks = get_bookmarks($params);
			if ( empty($bookmarks) )
				continue;
			$output .= str_replace(array('%id', '%class'), array("linkcat-$cat->term_id", $class), $category_before);
			$catname = apply_filters( "link_category", $cat->name );
			$output .= "$title_before$catname$title_after\n\t<ul>\n";
			$output .= my_bookmarks($bookmarks, $r);
			$output .= "\n\t</ul>\n$category_after\n";
		}
	} else {
		//output one single list using title_li for the title
		$bookmarks = get_bookmarks($r);
		if ( !empty($bookmarks) ) {
			if ( !empty( $title_li ) ){
				$output .= str_replace(array('%id', '%class'), array("linkcat-$category", $class), $category_before);
				$output .= "$title_before$title_li$title_after\n\t<ul>\n";
				$output .= my_bookmarks($bookmarks, $r);
				$output .= "\n\t</ul>\n$category_after\n";
			} else {
				$output .= my_bookmarks($bookmarks, $r);
			}
		}
	}
	$output = apply_filters( 'wp_list_bookmarks', $output );
	if ( !$echo )
		return $output;
	echo $output;
}
?>
<?php get_sidebar(); get_footer(); ?>