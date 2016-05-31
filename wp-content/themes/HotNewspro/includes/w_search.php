<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
	<input type="text" onfocus="if (this.value == '保证你神马都搜不到') {this.value = '';}" onblur="if (this.value == '') {this.value = '保证你神马都搜不到';}" value="保证你神马都搜不到" onclick="this.value='';" name="s" id="s" class="swap_value" />
	<input type="image" src="<?php bloginfo('template_directory'); ?>/images/go.gif" id="go" alt="Search" title="搜索" />
</form>