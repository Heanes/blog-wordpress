<?php
/*
Plugin Name: auto-lazyload-and-auto-highslide
Plugin URI: http://blog.brunoxu.info/auto-lazyload-and-auto-highslide/
Description: This plugin contains four gadgets: max-width limitation for images, true lazyload realization, highslide view effect for images, tracking code setting.
Author: Bruno Xu 
Author URI: http://blog.brunoxu.info/
Version: 1.5
*/

define('AL_AH_VER', '1.5');


$default_max_width = "600";//in px

$set_css_js_in = "wp_footer";//wp_footer wp_head

$limit_width_selector = $add_effect_selector = "#content img,.content img,.archive img,.post img,.page img";

global $wpdb;


$lazyload_highslide_vars = $wpdb->get_results("
SELECT *
FROM ".$wpdb->options."
WHERE option_name LIKE 'lazyload_highslide_%'
",ARRAY_A);
if (! $lazyload_highslide_vars) {
	$lazyload_highslide_vars = array();
}

function find_in_lazyload_highslide_vars(& $lhvars,$find_name)
{
	$result = array(
		"finded" => FALSE,
		"value" => "",
	);

	foreach ($lhvars as $lhvar) {
		if ($lhvar["option_name"] == $find_name) {
			$result["finded"] = TRUE;
			$result["value"] = $lhvar["option_value"];
			break;
		}
	}

	return $result;
}


$max_width_result = find_in_lazyload_highslide_vars($lazyload_highslide_vars, "lazyload_highslide_max_width");
if ($max_width_result["finded"]) {
	$max_width = $max_width_result["value"];
} else {
	$max_width = $default_max_width;
	add_option('lazyload_highslide_max_width', $max_width);
}

$no_lazyload_result = find_in_lazyload_highslide_vars($lazyload_highslide_vars, "lazyload_highslide_no_lazyload");
if ($no_lazyload_result["finded"]) {
	$no_lazyload = $no_lazyload_result["value"];
} else {
	$no_lazyload = "0";
	add_option('lazyload_highslide_no_lazyload', $no_lazyload);
}

$no_highslide_result = find_in_lazyload_highslide_vars($lazyload_highslide_vars, "lazyload_highslide_no_highslide");
if ($no_highslide_result["finded"]) {
	$no_highslide = $no_highslide_result["value"];
} else {
	$no_highslide = "0";
	add_option('lazyload_highslide_no_highslide', $no_highslide);
}

$analysis_codes_result = find_in_lazyload_highslide_vars($lazyload_highslide_vars, "lazyload_highslide_analysis_codes");
if ($analysis_codes_result["finded"]) {
	$analysis_codes = $analysis_codes_result["value"];
} else {
	$analysis_codes = "";
	add_option('lazyload_highslide_analysis_codes', $analysis_codes);
}



if (! is_admin()) {
	if ($max_width) {
		add_action($set_css_js_in, 'lazyload_highslide_max_width_css');
	}

	if (! $no_lazyload) {
		lazyload_highslide_lazyload();
	}

	if (! $no_highslide) {
		lazyload_highslide_highslide();
	}

	if ((! $no_lazyload) || (! $no_highslide)) {
		add_action('wp_enqueue_scripts', 'lazyload_highslide_script');
		function lazyload_highslide_script()
		{
			wp_enqueue_script('jquery');
		}
	}

	if ($analysis_codes) {
		add_action($set_css_js_in, 'lazyload_highslide_analysis_codes');
	}
} else {
	add_action('admin_menu','lazyload_highslide_addmenu');

	add_filter('plugin_action_links', 'add_lazyload_highslide_settings_link', 10, 2);
	function add_lazyload_highslide_settings_link($links, $file) {
		static $this_plugin;
		if (!$this_plugin) $this_plugin = plugin_basename(__FILE__);

		if ($file == $this_plugin){
			$settings_link = '<a href="'.wp_nonce_url("options-general.php?page=auto-lazyload-and-auto-highslide/lazyload_and_highslide.php").'">设置</a>';
			array_unshift($links, $settings_link);
		}
		return $links;
	}
}

function lazyload_highslide_max_width_css()
{
	global $max_width,$limit_width_selector;

	if ($max_width) {
		print('
<!-- max_width css for images in the content -->
<style type="text/css">
'.$limit_width_selector.'{
margin-top:3px;
max-width:'.$max_width.'px;
_width:expression(this.width>'.$max_width.'?'.$max_width.':auto);
}
</style>
<!-- max_width css for images in the content end -->
');
	}
}

function lazyload_highslide_analysis_codes()
{
	global $analysis_codes;

	if ($analysis_codes) {
		print('
<!-- analysis codes -->
'.stripslashes($analysis_codes).'
<!-- analysis codes end -->
');
	}
}

function lazyload_highslide_lazyload()
{
	global $set_css_js_in;

	add_filter('the_content', 'lazyload_highslide_lazyload_filter');

	function lazyimg_str_handler($matches) {
		$alt_image_src = get_bloginfo('wpurl') . '/wp-content/plugins/auto-lazyload-and-auto-highslide/loading.gif';//blank.gif

		$lazyimg_str = $matches[0];

		if (stripos($lazyimg_str, "class=") === FALSE) {
			$lazyimg_str = preg_replace(
				"/<img(.*)>/i",
				'<img class="lh_lazyimg"$1>',
				$lazyimg_str
			);
		} else {
			$lazyimg_str = preg_replace(
				"/<img(.*)class=['\"]([\w\-\s]*)['\"](.*)>/i",
				'<img$1class="$2 lh_lazyimg"$3>',
				$lazyimg_str
			);
		}

		$lazyimg_str = preg_replace(
			"/<img([^<>]*)src=['\"]([^<>]*)\.(bmp|gif|jpeg|jpg|png)['\"]([^<>]*)>/i",
			'<img$1src="'.$alt_image_src.'" file="$2.$3"$4><noscript>'.$matches[0].'</noscript>',
			$lazyimg_str
		);

		return $lazyimg_str;
	}

	function lazyload_highslide_lazyload_filter($content)
	{
		$content = preg_replace_callback(
			"/<img([^<>]*)>/i",
			"lazyimg_str_handler",
			$content
		);

		return $content;
	}


	add_action($set_css_js_in, 'lazyload_highslide_lazyload_js');

	function lazyload_highslide_lazyload_js()
	{
		print('
<!-- hidden lazyload image -->
<noscript>
<style type="text/css">
.lh_lazyimg{display:none;}
</style>
</noscript>
<!-- hidden lazyload image end -->

<!-- lazyload js -->
<script type="text/javascript">
jQuery(document).ready(function($) {
	function lazyload(){
		$("img.lh_lazyimg").each(function(){
			_self = $(this);
			if (!_self.attr("lazyloadpass")
					&& _self.attr("file")
					&& (!_self.attr("src")
							|| (_self.attr("src") && _self.attr("file")!=_self.attr("src"))
						)
				) {
				if((_self.offset().top) < $(window).height()+$(document).scrollTop()
						&& (_self.offset().left) < $(window).width()+$(document).scrollLeft()
					) {
					_self.attr("src",_self.attr("file"));
					_self.attr("lazyloadpass", "1");
				}
			}
		});
	}
	lazyload();

	var itv;
	$(window).scroll(function(){clearTimeout(itv);itv=setTimeout(lazyload,500);});
	$(window).resize(function(){clearTimeout(itv);itv=setTimeout(lazyload,500);});
});
</script>
<!-- lazyload js end -->
');
	}
}

function lazyload_highslide_highslide()
{
	global $set_css_js_in;

	add_filter('the_content', 'lazyload_highslide_highslide_filter');

	function lazyload_highslide_highslide_filter($content)
	{
		$pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
		$replacement = '<a$1href=$2$3.$4$5 class="highslide" onclick="return hs.expand(this);"$6>$7</a>';
		$content = preg_replace($pattern, $replacement, $content);

		return $content;
	}

	add_action($set_css_js_in, 'lazyload_highslide_highslide_js');

	function lazyload_highslide_highslide_js()
	{
		global $add_effect_selector;

		print('
<!-- highslide js -->
<link rel="stylesheet" href="'.get_bloginfo('wpurl').'/wp-content/plugins/auto-lazyload-and-auto-highslide/highslide/highslide.css" type="text/css" />
<script type="text/javascript" src="'.get_bloginfo('wpurl').'/wp-content/plugins/auto-lazyload-and-auto-highslide/highslide/highslide.packed.js"></script>
<script type="text/javascript">
hs.graphicsDir = "'.get_bloginfo('wpurl').'/wp-content/plugins/auto-lazyload-and-auto-highslide/highslide/graphics/";
hs.showCredits = false;

jQuery(function($){
	$("'.$add_effect_selector.'").each(function(i){
		_self = $(this);

		if ((_self.width() && _self.width()<50)
				|| (_self.height() && _self.height()<50)) {
			return;
		}

		if (! this.parentNode.href) {
			imgsrc = "";
			if (_self.attr("src")) {
				imgsrc = _self.attr("src");
			}
			if (_self.attr("file")) {
				imgsrc = _self.attr("file");
			} else if (_self.attr("original")) {
				imgsrc = _self.attr("original");
			}

			if (imgsrc) {
				_self.wrap("<a href=\'"+imgsrc+"\' class=\'highslide\' onclick=\'return hs.expand(this)\'></a>");
			}
		}
	});
});
</script>
<!-- highslide js end -->
');
	}
}

// 添加后台菜单
function lazyload_highslide_addmenu()
{
	add_options_page('auto-lazyload-and-auto-highslide 设置', 'auto-lazyload-and-auto-highslide 设置', 8, __FILE__, 'lazyload_highslide_setoption');
}

// 设置页面
function lazyload_highslide_setoption()
{
	global $max_width,$no_lazyload,$no_highslide,$analysis_codes;

	if (isset($_POST['op_save_lazyload_highslide'])) {
		$max_width_post = "600";
		$no_lazyload_post = "0";
		$no_highslide_post = "0";
		$analysis_codes_post = "";
		if (isset($_POST['max_width'])) {
			$max_width_post = $_POST['max_width'];
		}
		if (isset($_POST['no_lazyload']) && $_POST['no_lazyload']) {
			$no_lazyload_post = $_POST['no_lazyload'];
		}
		if (isset($_POST['no_highslide']) && $_POST['no_highslide']) {
			$no_highslide_post = $_POST['no_highslide'];
		}
		if (isset($_POST['analysis_codes']) && $_POST['analysis_codes']) {
			$analysis_codes_post = $_POST['analysis_codes'];
		}

		update_option("lazyload_highslide_max_width", $max_width_post);
		update_option("lazyload_highslide_no_lazyload", $no_lazyload_post);
		update_option("lazyload_highslide_no_highslide", $no_highslide_post);
		update_option("lazyload_highslide_analysis_codes", $analysis_codes_post);

		$max_width = get_option("lazyload_highslide_max_width");
		$no_lazyload = get_option("lazyload_highslide_no_lazyload");
		$no_highslide = get_option("lazyload_highslide_no_highslide");
		$analysis_codes = get_option("lazyload_highslide_analysis_codes");

		echo '<div class="updated"><strong><p>保存成功</p></strong></div>';
	}
?>
	<div class="wrap">
		<style type="text/css">
		dt,dd{padding:5px 3px 0;}
		dt{float:left;width:172px;clear:both;}
		dd{float:left;*float:none;*display:inline-block;}
		</style>

		<h2>auto-lazyload-and-auto-highslide 设置</h2>

		<form method="post">
			<div style="clear: both;padding-top:10px;"></div>
			<p><strong>插件名称 :</strong> auto-lazyload-and-auto-highslide
			</p>
			<p><strong>插件版本 :</strong> <?php echo AL_AH_VER; ?>
			</p>
			<p><strong>插件作者 :</strong> <a href="http://blog.brunoxu.info/" target="_blank">Bruno Xu</a>
			</p>
			<p><strong>插件主页 :</strong> <a href="http://blog.brunoxu.info/auto-lazyload-and-auto-highslide/" target="_blank">http://blog.brunoxu.info/auto-lazyload-and-auto-highslide/</a>
			</p>
			<div style="clear: both;padding-top:10px;"></div>
			<hr/>

			<dl>
				<dt><strong>文章图片最大宽度：</strong></dt>
				<dd><input type="text" name="max_width" value="<?php echo $max_width; ?>" />px</dd>
			</dl>

			<dl>
				<dt><strong>不使用Lazyload：</strong></dt>
				<dd><input type="checkbox" name="no_lazyload" value="1" <?php if($no_lazyload) echo 'checked="true"'; ?> /></dd>
			</dl>

			<dl>
				<dt><strong>不使用Highslide：</strong></dt>
				<dd><input type="checkbox" name="no_highslide" value="1" <?php if($no_highslide) echo 'checked="true"'; ?> /></dd>
			</dl>

			<dl>
				<dt><strong>统计代码(支持html和js)：</strong></dt>
				<dd><textarea name="analysis_codes" style="width:500px;height:280px;"><?php if($analysis_codes) echo stripslashes($analysis_codes); ?></textarea></dd>
			</dl>
			<div style="clear: both;padding-top:10px;"></div>
			<hr/>

			<p class="submit" style="clear:both;"><input type="submit" name="op_save_lazyload_highslide" value=" 保存 " /></p>
		</form>
	</div>
<?php
}
?>