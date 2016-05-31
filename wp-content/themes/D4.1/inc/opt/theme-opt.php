<?php
/*
 * haozi / hao.chen@qq.com / www.daqianduan.com / t.qq.com/daqianduan && weibo.com/daqianduan / 2011.11.25
 * Theme D4 => 后台配置文件
*/

$n = "D4主题";
$d = "d_";

$options = array (
	//特别推荐
	array( "name" => "特别推荐","type" => "section","desc" => "首页导航下面的两大块特别推荐，最吸引读者的地方"),
	
	array( "name" => "特别推荐一","type" => "tit"),
	array( "id" => $d."home_recommended_01_sort","type" => "text","class" => "d_inp_short","desc" => "标语","std" => "打造国内最专业的免费Wordpress主题"),
	array( "id" => $d."home_recommended_01_tit","type" => "text","class" => "d_inp_short","desc" => "标题","std" => "大前端D4主题正式发布啦"),
	array( "id" => $d."home_recommended_01_desc","type" => "text","desc" => "说明","std" => "一键换肤、广告系统、读者墙、邮件列表、访客评论记录、友情链接页面、简易的安装过程等等，都是你选择的理由..."),
	array( "id" => $d."home_recommended_01_btn_1","type" => "text","class" => "d_inp_four","desc" => "按钮","std" => "进入官网查看"),
	array( "id" => $d."home_recommended_01_btn_link_1","type" => "text","class" => "d_inp_short","desc" => "链接","std" => "http://www.daqianduan.com/d4/"),
	array( "id" => $d."home_recommended_01_btn_2","type" => "text","class" => "d_inp_four","desc" => "按钮","std" => "300人在线预订"),
	array( "id" => $d."home_recommended_01_btn_link_2","type" => "text","class" => "d_inp_short","desc" => "链接","std" => "http://www.daqianduan.com/d4-beta-all/"),
	
	array( "name" => "特别推荐二","type" => "tit"),
	array( "id" => $d."home_recommended_02_sort","type" => "text","class" => "d_inp_short","desc" => "标语","std" => "打造国内最专业的免费Wordpress主题"),
	array( "id" => $d."home_recommended_02_tit","type" => "text","class" => "d_inp_short","desc" => "标题","std" => "D4主题一键换肤功能 超10种主题颜色 可设置随机"),
	array( "id" => $d."home_recommended_02_desc","type" => "text","desc" => "说明","std" => "为了进一步让大家了解D4主题的一些功能，这里先介绍下D4主题的一键换肤功能。目前设定的主题颜色为7种，预计到正式发布时超过10种..."),
	array( "id" => $d."home_recommended_02_btn_1","type" => "text","class" => "d_inp_four","desc" => "按钮","std" => "了解详情"),
	array( "id" => $d."home_recommended_02_btn_link_1","type" => "text","class" => "d_inp_short","desc" => "链接","std" => "http://www.daqianduan.com/d4-skin/"),
	array( "id" => $d."home_recommended_02_btn_2","type" => "text","class" => "d_inp_four","desc" => "按钮","std" => "11月28日正式发布"),
	array( "id" => $d."home_recommended_02_btn_link_2","type" => "text","class" => "d_inp_short","desc" => "链接","std" => "http://www.daqianduan.com/d4-beta-all/"),
	
	array( "type" => "endtag"),
	
	//首页设置
	array( "name" => "首页设置","type" => "section","desc" => "首页的专题和模块设置"),
	
	array( "name" => "置顶文章","type" => "tit"),	
	array( "id" => $d."sticky_b","type" => "select","std" => "Open","options" => array("Open", "Close")),
	array( "id" => $d."sticky_post_num","type" => "select","std" => "2","options" => array("2","4","6","8")),
	
	array( "name" => "专栏列表一","type" => "tit"),
	array( "id" => $d."column_01_b","type" => "select","std" => "Open","options" => array("Open", "Close")),
	array( "id" => $d."column_01_sort","type" => "select","std" => "tag","options" => array("tag", "category_name")),
	array( "id" => $d."column_01_show","type" => "text","class" => "d_inp_four","desc" => "显示","std" => ""),
	array( "id" => $d."column_01","type" => "text","class" => "d_inp_short","desc" => "别名","std" => ""),
	
	array( "name" => "专栏列表二","type" => "tit"),
	array( "id" => $d."column_02_b","type" => "select","std" => "Open","options" => array("Open", "Close")),
	array( "id" => $d."column_02_sort","type" => "select","std" => "tag","options" => array("tag", "category_name")),
	array( "id" => $d."column_02_show","type" => "text","class" => "d_inp_four","desc" => "显示","std" => ""),
	array( "id" => $d."column_02","type" => "text","class" => "d_inp_short","desc" => "别名","std" => ""),
	
	array( "name" => "专栏列表三","type" => "tit"),
	array( "id" => $d."column_03_b","type" => "select","std" => "Open","options" => array("Open", "Close")),
	array( "id" => $d."column_03_sort","type" => "select","std" => "tag","options" => array("tag", "category_name")),
	array( "id" => $d."column_03_show","type" => "text","class" => "d_inp_four","desc" => "显示","std" => ""),
	array( "id" => $d."column_03","type" => "text","class" => "d_inp_short","desc" => "别名","std" => ""),
	
	array( "name" => "专栏列表四","type" => "tit"),
	array( "id" => $d."column_04_b","type" => "select","std" => "Open","options" => array("Open", "Close")),
	array( "id" => $d."column_04_sort","type" => "select","std" => "tag","options" => array("tag", "category_name")),
	array( "id" => $d."column_04_show","type" => "text","class" => "d_inp_four","desc" => "显示","std" => ""),
	array( "id" => $d."column_04","type" => "text","class" => "d_inp_short","desc" => "别名","std" => ""),
	
	array( "name" => "最新文章条数","type" => "tit"),	
	array( "id" => $d."new_post_num","type" => "select","std" => "14","options" => array("14","2","4","6","8","10","12","16","18","20")),
	
	array( "name" => "底部特推","type" => "tit"),
	array( "id" => $d."homeb_tit","type" => "text","class" => "d_inp_short","desc" => "标题","std" => ""),
	array( "id" => $d."homeb_tit_link","type" => "text","class" => "d_inp_short","desc" => "链接","std" => ""),
			
	array( "name" => "低版本IE提示","type" => "tit"),
	array( "id" => $d."ie_b","type" => "select","std" => "Open","options" => array("Open", "Close")),
	array( "id" => $d."ie_version","type" => "select","std" => "lt IE 7","options" => array("lt IE 7","lt IE 8","lt IE 9","lt IE 10")),
	array( "id" => $d."ie","type" => "text","std" => "您的浏览器版本过低，升级您的浏览器，或使用Chrome或者Firefox能得到最佳浏览！"),
	
	array( "type" => "endtag"),

	//基本设置
	array( "name" => "基本设置","type" => "section","desc" => "主题的基本设置，包括模块是否开启等"),
	
	array( "name" => "主题风格","type" => "tit"),	
	array( "id" => $d."skin","type" => "select","std" => "normal","options" => array("normal", "cyan", "blue", "red", "green", "black", "coffee", "random")),
	array( "id" => $d."skin_random_1","type" => "select","desc" => "随机1","std" => "normal","options" => array("normal", "cyan", "blue", "red", "green", "black", "coffee")),
	array( "id" => $d."skin_random_2","type" => "select","desc" => "随机2","std" => "blue","options" => array("normal", "cyan", "blue", "red", "green", "black", "coffee")),
	array( "id" => $d."skin_random_3","type" => "select","desc" => "随机3","std" => "red","options" => array("normal", "cyan", "blue", "red", "green", "black", "coffee")),
	array( "id" => $d."skin_random_4","type" => "select","desc" => "随机4","std" => "white","options" => array("normal", "cyan", "blue", "red", "green", "black", "coffee")),
	array( "id" => $d."skin_random_5","type" => "select","desc" => "随机5","std" => "green","options" => array("normal", "cyan", "blue", "red", "green", "black", "coffee")),
	
	array( "name" => "升级/维护提醒","type" => "tit"),	
	array( "id" => $d."onlytip_b","type" => "select","std" => "Open","options" => array("Open", "Close")),
	array( "id" => $d."onlytip","type" => "text","std" => "友情提示：本站升级维护中，如给您带来不便，还望谅解！"),
	
	array( "name" => "网站描述","type" => "tit"),
	array( "id" => $d."description","type" => "textarea","std" => "输入你的网站描述，一般不超过200个字符"),
	
	array( "name" => "关键词","type" => "tit"),	
	array( "id" => $d."keywords","type" => "textarea","std" => "输入你的网站关键字，一般不超过100个字符。 关键字之间用 ',' 隔开"),
	
	array( "name" => "订阅地址","type" => "tit"),
	array( "id" => $d."rss","type" => "text","class" => "d_inp_short","std" => "http://www.daqianduan.com/feed"),
	
	array( "name" => "流量统计代码","type" => "tit"),	
	array( "id" => $d."track_b","type" => "select","std" => "Open","options" => array("Open", "Close")),
	array( "id" => $d."track","type" => "textarea","std" => "百度统计、CNZZ、51啦、量子统计等等"),
	
	array( "name" => "读者墙页面链接","type" => "tit"),	
	array( "id" => $d."readers_page_url","type" => "textarea","std" => "http://www.daqianduan.com/readers/"),
	
	array( "name" => "腾讯邮件列表","type" => "tit"),	
	array( "id" => $d."maillist_b","type" => "select","std" => "Open","options" => array("Open", "Close")),
	array( "id" => $d."maillist","type" => "text","class" => "d_inp_short","std" => "d7d1324f807337a7207f706466e3e97b1fbc7acbcc484b9f"),
	
	array( "name" => "热门标签个数","type" => "tit"),	
	array( "id" => $d."tags_num","type" => "select","std" => "24","options" => array("24","6","9","12","15","18","21","27","30")),
	
	array( "name" => "友情链接","type" => "tit"),
	array( "id" => $d."flinks_b","type" => "select","std" => "Open","options" => array("Open", "Close")),
	array( "id" => $d."flinks_num","type" => "select","std" => "12","options" => array("12","6","9","15","18","21","24","27","30")),
	
	array( "name" => "评论框底部标语","type" => "tit"),	
	array( "id" => $d."commentarea","type" => "text","class" => "d_inp_short","std" => "严重鄙视飘过不留毛的鸟"),
	array( "type" => "endtag"),

	//广告系统
	array( "name" => "广告系统","type" => "section","desc" => "站点的广告展示，包括图片广告、Google广告、百度联盟、淘宝联盟等，将代码贴入即可"),	
	
	array( "name" => "侧栏01","type" => "tit"),
	array( "id" => $d."adsid_01_b","type" => "select","std" => "Open","options" => array("Open", "Close")),
	array( "id" => $d."adsid_01","type" => "textarea"),
	
	array( "name" => "侧栏02","type" => "tit"),	
	array( "id" => $d."adsid_02_b","type" => "select","std" => "Open","options" => array("Open", "Close")),
	array( "id" => $d."adsid_02","type" => "textarea"),	
	
	array( "name" => "侧栏03","type" => "tit"),	
	array( "id" => $d."adsid_03_b","type" => "select","std" => "Open","options" => array("Open", "Close")),
	array( "id" => $d."adsid_03","type" => "textarea"),	
	
	array( "name" => "侧栏04","type" => "tit"),	
	array( "id" => $d."adsid_04_b","type" => "select","std" => "Open","options" => array("Open", "Close")),
	array( "id" => $d."adsid_04","type" => "textarea"),	
	
	array( "name" => "正文01","type" => "tit"),	
	array( "id" => $d."adpost_01_b","type" => "select","std" => "Open","options" => array("Open", "Close")),
	array( "id" => $d."adpost_01","type" => "textarea","std" => "打造国内最专业的免费Wordpress主题"),
	
	array( "name" => "正文02","type" => "tit"),	
	array( "id" => $d."adpost_02_b","type" => "select","std" => "Open","options" => array("Open", "Close")),
	array( "id" => $d."adpost_02","type" => "textarea"),
	
	array( "name" => "正文03","type" => "tit"),	
	array( "id" => $d."adpost_03_b","type" => "select","std" => "Open","options" => array("Open", "Close")),
	array( "id" => $d."adpost_03","type" => "textarea"),
	
	array( "name" => "自定义01","type" => "tit"),	
	array( "id" => $d."admy_01_b","type" => "select","std" => "Open","options" => array("Open", "Close")),
	array( "id" => $d."admy_01","type" => "textarea"),
	
	array( "name" => "自定义02","type" => "tit"),	
	array( "id" => $d."admy_02_b","type" => "select","std" => "Open","options" => array("Open", "Close")),
	array( "id" => $d."admy_02","type" => "textarea"),
	
	array( "name" => "自定义03","type" => "tit"),	
	array( "id" => $d."admy_03_b","type" => "select","std" => "Open","options" => array("Open", "Close")),
	array( "id" => $d."admy_03","type" => "textarea"),
	array( "type" => "endtag"),

);

function mytheme_add_admin() {
	global $n, $d, $options;
	if ( $_GET['page'] == basename(__FILE__) ) {
		if ( 'save' == $_REQUEST['action'] ) {
			foreach ($options as $value) {
				update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 
			}
			foreach ($options as $value) {
				if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); }
				else { delete_option( $value['id'] ); } 
			}
			header("Location: admin.php?page=theme-opt.php&saved=true");
			die;
		}
		else if( 'reset' == $_REQUEST['action'] ) {
			foreach ($options as $value) {delete_option( $value['id'] ); }
			header("Location: admin.php?page=theme-opt.php&reset=true");
			die;
		}
	}
	add_theme_page($n." Options", $n."设置", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

function mytheme_admin() {
	global $n, $d, $options;
	$i=0;
	if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$n.' 主题修改已保存</strong></p></div>';
	if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$n.' 主题已恢复设置</strong></p></div>';
?>

<div class="wrap">
	<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/inc/opt/theme-opt.css"/>
	<h2><?php echo $n; ?>设置<span class="d_port_btn"><a class="d_export_btn">导出</a><a class="d_import_btn">导入</a></span></h2>
	<p>当前主题：<?php echo $n; ?> | 设计师：<a href="http://www.daqianduan.com/" target="_blank">浩子</a> | <a href="http://www.daqianduan.com/d4/" target="_blank"><?php echo $n; ?>更新说明及问题提交</a></p>
	<iframe class="dthemetip" width="400" height="24" src="http://www.daqianduan.com/wp-content/themes/d4/tip/index.html" allowtransparency="true" frameborder="0" scrolling="no"></iframe>
	<form method="post">
		<div class="d_tab"><a class="d_tab_on">特别推荐</a><a>首页配置</a><a>基本配置</a><a>广告系统</a></div>
		<?php foreach ($options as $value) { switch ( $value['type'] ) { case "": ?>
			<?php break; case "tit": ?>
			<div class="d_line"></div>
			</li><li class="d_li">
			<h4><?php echo $value['name']; ?>：</h4>
			
			<?php break; case 'text': ?>
			<?php if ( $value['desc'] != "") { ?><label class="d_the_desc"><?php echo $value['desc']; ?></label><?php } ?><input class="d_inp <?php echo $value['class']; ?>" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
			
			<?php break; case 'textarea': ?>
			<textarea class="d_tarea" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
			
			<?php break; case 'select': ?>
			<?php if ( $value['desc'] != "") { ?><span class="d_the_desc" id="<?php echo $value['id']; ?>_desc"><?php echo $value['desc']; ?></span><?php } ?><select class="d_sel" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
				<?php foreach ($value['options'] as $option) { ?>
				<option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected" class="d_sel_opt"'; } ?>><?php echo $option; ?></option>
				<?php } ?>
			</select>
			
			<?php break; case "checkbox": ?>
			<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
			<input class="d_inp" type="checkbox" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
			
			<?php break; case "section": $i++; ?>
			<div class="d_mainbox" id="d_mainbox_<?php echo $i; ?>">
				<div class="d_desc"><input class="button-primary" name="save<?php echo $i; ?>" type="submit" value="保存设置" /><?php echo $value['desc']; ?></div>
				<ul class="d_inner">
					<li class="d_li">
				
			<?php break; case "endtag": ?>
			</li></ul>
			<div class="d_desc d_desc_b"><input class="button-primary" name="save<?php echo $i; ?>" type="submit" value="保存设置" /></div>
			</div>
			
		<?php break; }} ?>
		<input type="hidden" name="action" value="save" />
		
		<div class="d_popup d_export">
			<h3><input class="button-primary" type="button" value="关闭" /><?php echo $n; ?>设置-导出：</h3>
			<h4>妥善保管好您导出的数据，否则您就要一条条的添加！</h4>
			<p><textarea onmouseover="this.focus();this.select();" disabled="true" name="" id="" cols="30" rows="10"></textarea></p>
		</div>
		<div class="d_popup d_import">
			<h3><input class="button-primary" type="button" value="立即导入" /><?php echo $n; ?>设置-导入：</h3>
			<h4>贴入您之前保存的导出数据，点击“立即导入”，确定导入成功后再保存！</h4>
			<p><textarea onmouseover="this.focus();this.select();" name="" id="" cols="30" rows="10"></textarea></p>
		</div>
	</form>
	<div class="donate">
			<a class="donate-btn" title="非常感谢您的支持！">支持这个主题，欢迎捐助我 </a>
			<p style="border-top:1px solid #dedede;padding-top:20px">
			</p>
			<a href="http://me.alipay.com/dreamxyt110"> <img src="https://img.alipay.com/sys/personalprod/style/mc/btn-index.png" alt=""> </a>
			<p></p>
		</div>
<script src="<?php bloginfo('template_url') ?>/js/jquery.min.js"></script>
<script src="<?php bloginfo('template_url') ?>/inc/opt/theme-opt.js"></script>
</div>
<?php } ?>
<?php add_action('admin_menu', 'mytheme_add_admin');?>