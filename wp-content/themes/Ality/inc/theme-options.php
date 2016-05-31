<?php
$themename = "Ality";
$shortname = "cx";
$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}

$number_entries = array("选择数量","1","2","3","4","5","6","7","8","9","10", "12","14", "16", "18", "20" );
$options = array ( 
array( "name" => $themename." Options",
       "type" => "title"),

// 常规设置

    array( "name" => "常规设置",
           "type" => "section"),
    array( "type" => "open"),

	array(  "name" => "站点标题",
			"desc" => "说明：默认文字标题",
            "id" => $shortname."_title",
            "type" => "select",
            "std" => "文字标题",
            "options" => array("文字", "logo"),
			"section" => '<div class="part"></div>'),

	array(	"name" => "首页置顶文章",
			"desc" => "说明：默认显示4篇",
			"id" => $shortname."_sticky_n",
			"std" => "4",
			 "type" => "text",
			"options" => $number_entries,
			"section" => '<div class="part"></div>'),

	array(  "name" => "显示分类置顶文章",
            "id" => $shortname."_sticky_cat",
            "type" => "checkbox",
			"std" => "false"),

	array(	"name" => "分类置顶文章篇数",
			"desc" => "说明：默认显示2篇",
			"id" => $shortname."_sticky_cat_n",
			"std" => "2",
			 "type" => "text",
			"options" => $number_entries,
			"section" => '<div class="part"></div>'),

	array(  "name" => "显示公告",
            "id" => $shortname."_bulletin",
            "type" => "checkbox",
			"std" => "false"),

	array(	"name" => "公告显示条数",
			"desc" => "说明：默认显示2条",
			"id" => $shortname."_bulletin_n",
			"std" => "2",
			 "type" => "text",
			"options" => $number_entries,
			"section" => '<div class="part"></div>'),

	array(	"name" => "首页排除分类",
            "desc" => "说明：分类ID前面带“-”号排除该分类，否则只显示该分类文章，多个分类用半角逗号隔开",
            "id" => $shortname."_cat_s",
            "type" => "text",
            "std" => "-801, -802",
			"section" => '<div class="part"></div>'),

	array(  "name" => "关闭正文摘要显示",
            "id" => $shortname."_abstract",
            "type" => "checkbox",
			"std" => "false",
			"section" => '<div class="part"></div>'),

	array(  "name" => "显示正文底部小工具",
            "id" => $shortname."_single_w",
            "type" => "checkbox",
			"std" => "false",
			"section" => '<div class="part"></div>'),

	array(  "name" => "开启特色图像",
            "desc" => "说明：如不使用特色图像功能，不要勾选该项",
            "id" => $shortname."_thumbnails",
            "type" => "checkbox",
			"std" => "false",
			"section" => '<div class="part"></div>'),

	array(  "name" => "不显示缩略图",
            "desc" => "说明：默认显示",
            "id" => $shortname."_thumbnail",
            "type" => "checkbox",
			"std" => "false",
			"section" => '<div class="part"></div>'),

	array(	"name" => "最新文章图标",
            "desc" => "说明：默认一周（168小时）内发表的文章显示",
            "id" => $shortname."_date",
            "type" => "text",
            "std" => "168",
			"section" => '<div class="part"></div>'),

// 辅助功能

    array( "type" => "close"),
	array( "name" => "辅助功能",
       "type" => "section"),
	array( "type" => "open"),

	array(	"name" => "百度站内搜索，输入域名",
            "desc" => "",
            "id" => $shortname."_baidu_s",
            "type" => "text",
            "std" => "zmingcx.com",
			"section" => '<div class="part"></div>'),

	array(  "name" => "显示百度分享",
            "id" => $shortname."_share",
            "type" => "checkbox",
			"std" => "false",
			"section" => '<div class="part"></div>'),

	array(  "name" => "显示百度推荐",
            "id" => $shortname."_bdtj",
            "type" => "checkbox",
			"std" => "false"),

	array(	"name" => "输入百度推荐异步代码",
            "desc" => "说明：必须是异步代码",
            "id" => $shortname."_bdtj_s",
            "type" => "text",
            "std" => "hm_t_14725"),

// SEO设置

    array( "type" => "close"),
	array( "name" => "SEO设置",
       "type" => "section"),
	array( "type" => "open"),

	array(	"name" => "首页描述（Description）",
			"desc" => "",
			"id" => $shortname."_description",
			"type" => "textarea",
            "std" => "说明：输入你的网站描述，一般不超过200个字符"),

	array(	"name" => "首页关键词（KeyWords）",
            "desc" => "",
            "id" => $shortname."_keywords",
            "type" => "textarea",
            "std" => "说明：输入你的网站关键字，一般不超过100个字符"),

	array("name" => "流量统计代码",
            "desc" => "",
            "id" => $shortname."_track",
            "type" => "textarea",
            "std" => ""),

	array("name" => "ICP备案号",
            "desc" => "",
            "id" => $shortname."_icp",
            "type" => "text",
            "std" => ""),

// 广告设置

    array( "type" => "close"),
	array( "name" => "广告设置",
       "type" => "section"),
	array( "type" => "open"),

	array(  "name" => "关闭导航下面广告位",
            "id" => $shortname."_g-nav",
            "type" => "checkbox",
			"std" => "false"),

	array(	"name" => "输入导航下面广告代码",
            "desc" => "",
            "id" => $shortname."_nav-ad",
            "type" => "textarea",
            "std" => '<a href="http://idc.wopus.org/" target="_blank"><img src="' . get_bloginfo('template_directory') . '/img/gg/1080.png" alt="博客主机" /></a>',
			"section" => '<div class="part"></div>'),

	array(  "name" => "关闭文章列表广告位",
            "id" => $shortname."_g-posts",
            "type" => "checkbox",
			"std" => "false"),

	array(	"name" => "输入文章列表广告代码",
            "desc" => "",
            "id" => $shortname."_posts-ad",
            "type" => "textarea",
            "std" => '<a href="http://idc.wopus.org/" target="_blank"><img src="' . get_bloginfo('template_directory') . '/img/gg/760.png" alt="博客主机" /></a>',
			"section" => '<div class="part"></div>'),

	array(  "name" => "关闭正文标题广告位",
            "id" => $shortname."_g-single",
            "type" => "checkbox",
			"std" => "false"),

	array(	"name" => "输入正文标题广告代码",
            "desc" => "",
            "id" => $shortname."_single-ad",
            "type" => "textarea",
            "std" => '<a href="http://idc.wopus.org/" target="_blank"><img src="' . get_bloginfo('template_directory') . '/img/gg/760.png" alt="博客主机" /></a>',
			"section" => '<div class="part"></div>'),

	array(  "name" => "关闭评论广告位",
            "id" => $shortname."_g-comment",
            "type" => "checkbox",
			"std" => "false"),

	array(	"name" => "输入评论广告代码",
            "desc" => "",
            "id" => $shortname."_comment-ad",
            "type" => "textarea",
            "std" => '<a href="http://idc.wopus.org/" target="_blank"><img src="' . get_bloginfo('template_directory') . '/img/gg/760.png" alt="博客主机" /></a>',
			"section" => '<div class="part"></div>'),

	array(	"name" => "输入下载弹窗广告代码",
            "desc" => "",
            "id" => $shortname."_file-ad",
            "type" => "textarea",
            "std" => '<a href="http://idc.wopus.org/" target="_blank"><img src="' . get_bloginfo('template_directory') . '/img/gg/500.jpg" alt="博客主机" width="500" height="200" /></a>'),

	array(	"type" => "close")
);
// 定义管理面板
function mytheme_add_admin() {
global $themename, $shortname, $options;
if ( $_GET['page'] == basename(__FILE__) ) {
	if ( 'save' == $_REQUEST['action'] ) {
		foreach ($options as $value) {
		update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
foreach ($options as $value) {
	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
	header("Location: admin.php?page=theme-options.php&saved=true");
die;
}
else if( 'reset' == $_REQUEST['action'] ) {
	foreach ($options as $value) {
		delete_option( $value['id'] ); }
	header("Location: admin.php?page=theme-options.php&reset=true");
die;
}
} 
add_theme_page($themename."主题选项", "主题选项", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

function mytheme_add_init() {
$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/inc/options/options.css", false, "1.0", "all");
wp_enqueue_script("rm_script", $file_dir."/inc/options/rm_script.js", false, "1.0");
}
function mytheme_admin() { 
global $themename, $shortname, $options;
$i=0; 
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' 主题设置已保存</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' 主题已重新设置</strong></p></div>';
?>
<div class="wrap rm_wrap">
<h2><?php echo $themename; ?>主题选项</h2>
<p>
	<font style="font-size:20px;"color=#ff0000><strong> &hearts; </strong></font>支持主题设计者：<a href="http://zmingcx.com" target="_blank">知更鸟</a>，支付宝：robin5988@gmail.com
	&nbsp;<span class="switch" onclick="openShutManager(this,'box',false,'关闭分类ID','显示分类ID')">显示分类ID</span>
	&nbsp;<a href="http://zmingcx.com/Wordpress-theme-ality.html" target="_blank">查看更新</a>

	<div class="open">
		<div class="odiv" id="box" style="display:none">
			<b>分类ID</b>
			<ul class="catid">
				<?php
				$category_ids = get_all_category_ids();
				foreach($category_ids as $cat_id) {
				  $cat_name = get_cat_name($cat_id);
				  echo  '<li>'. $cat_name . '：' . $cat_id .'</li>';
				}
				?>
				<div class="clear"></div>
			</ul>
		</div>
	</div>

</p>
<div class="rm_opts">
<form method="post">
  <?php foreach ($options as $value) { switch ( $value['type'] ) { case "open": ?>
  <?php break; case "close": ?>
</div>
</div>

<?php break; case "title": ?>
<?php break; case 'text': ?>

<div class="rm_input rm_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
	<small><?php echo $value['desc']; ?></small>
	<small><?php echo $value['section']; ?></small>
	<div class="clearfix"></div>
</div>

<?php break; case 'textarea': ?>

<div class="rm_input rm_textarea">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
	<small><?php echo $value['desc']; ?></small>
	<small><?php echo $value['section']; ?></small>
 	 <div class="clearfix"></div> 
</div>
  
<?php break; case 'select': ?>

<div class="rm_input rm_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>	
	<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
		<?php foreach ($value['options'] as $option) { ?>
		<option <?php if (get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
	</select>
	<small><?php echo $value['desc']; ?></small>
	<small><?php echo $value['section']; ?></small>
	<div class="clearfix"></div>
</div>

<?php break; case "checkbox": ?>

<div class="rm_input rm_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>	
	<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
	<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
	<small><?php echo $value['desc']; ?></small>
	<small><?php echo $value['section']; ?></small>
	<div class="clearfix"></div>
</div>

<?php break; case "section": $i++ ?>

<div class="rm_section">
	<div class="rm_title">
		<h3><?php echo $value['name']; ?></h3>
		<span class="submit"><input type="submit" value="保存设置" class="button" id="newmeta-submit" name="save<?php echo $i; ?>"></span>
		<div class="clearfix"></div>
	</div>
<div class="rm_options">
<?php break;
}
}
?>

<span class="submit"><input type="submit" value="保存设置" class="button" id="newmeta-submit" name="save<?php echo $i; ?>"></span>
<input type="hidden" name="action" value="save" />
</form>
<form method="post">
	<p class="submit">
		<input type="submit" class="button-primary" name="reset" value="恢复默认设置" />
		<input type="hidden" name="action" value="reset" />
	</p>
</form>
</div>
<?php }?>
<?php
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');
?>