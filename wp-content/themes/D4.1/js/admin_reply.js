jQuery(document).ready(function($){
	$('.vim-r').click(function(){
		var $submitted_on=$(this).parent().parent().parent().children('.submitted-on');
		if ($submitted_on.children('a').length == 2) {
			var parentID=$submitted_on.find('a:last').attr('href').split('#')[1].split('-')[1];
			$('#replyrow').find('#comment_ID').attr('value',parentID);
		}
		var atid = '"#' + $submitted_on.children('a:first').attr('href').split('#')[1] + '"';
		var atname = $submitted_on.parent().prev('td.author').find('strong').text().replace(/^(\s|\xA0)+|(\s|\xA0)+$/g, '');
		$("#replycontent").attr('value','<a href=' + atid + '>@' + atname + ' </a>\n').focus();
		$("#replycontent").attr('onkeydown','if(event.ctrlKey){if(event.keyCode==13){document.getElementById(\'replybtn\').click();return false}};');
		$('#replybtn').click(function(){
			$("#replycontent").attr('onkeydown','');
		})
	})
});