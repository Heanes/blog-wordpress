<?php
/*
 * haozi / hao.chen@qq.com / www.daqianduan.com / t.qq.com/daqianduan && weibo.com/daqianduan / 2011.11.24
 * Theme D4 => 全站头部
*/
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8" />
<title><?php wp_title('|', true, 'right'); echo get_option('blogname'); if (is_home ()) echo "|", get_option('blogdescription'); if ($paged > 1) echo '-Page ', $paged; ?></title>
<?php wp_head(); dtheme_style(); ?>
</head>
<body>
<div class="header">
	<div class="header-bg"></div>
	<div class="header-sub">
		<?php dtheme_logo(); dtheme_menu('nav'); dtheme_menu('menu'); ?>
	</div>
</div>
<div class="wrap">
	<div class="content">
		<?php if( is_home() ){ 
			include('inc/home-header.php');
		}else{ 
			dtheme_crumbs();
		} ?>