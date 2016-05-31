$(function(){
	//导航切换
	$('.d_mainbox:eq(0)').show();
	$('.d_tab a').each(function(i) {
		$(this).click(function(){
			$(this).addClass('d_tab_on').siblings().removeClass('d_tab_on');
			$($('.d_mainbox')[i]).show().siblings('.d_mainbox').hide();
		})
	});

	//主题换肤
	$('#d_skin').addClass('d_skin_random');
	for ( i=1;i<=5;i++ ) {
		$('#d_skin_random_'+[i]).addClass('d_skin_random');
	}
	
	for ( i=0;i<$('#d_skin option').length-1;i++ ) {
		var the_array = new Array( '284790','00634D','005E7C','900000','247600','111111','674600' );
		$('.d_skin_random').each(function(){
			$(this).find('option').eq([i]).css({'background-color':'#' + the_array[i] , 'color':'#fff'});
		})
	}
	
	if( $('#d_skin').val() == 'random' ){
		for( i=1;i<=5;i++ ){
			$('#d_skin_random_'+[i]).show().prev().show();
		}
	}
	
	$('#d_skin').change(function(){
		if( $(this).val() == 'random' ){
			for( i=1;i<=5;i++ ){
				$('#d_skin_random_'+[i]).show().prev().show();
			}
		}else{
			for( i=1;i<=5;i++ ){
				$('#d_skin_random_'+[i]).hide().prev().hide();
			}
		}
	})
	
	$('#d_home_recommended_01_btn_link_1,#d_home_recommended_02_btn_link_1,#d_home_recommended_01_tit,#d_home_recommended_02_tit,#d_home_recommended_01_sort,#d_home_recommended_02_sort,#d_home_recommended_01_desc,#d_home_recommended_02_desc,#d_homeb_tit_link').after('<br>');
	
	//广告系统实时预览
	$('.d_mainbox:last .d_tarea').each(function(i) {
		$(this).bind('keyup',function(){
			$(this).next().html( $(this).val() );
		}).bind('change',function(){
			$(this).next().html( $(this).val() );
		}).bind('click',function(){
			$(this).next().html( $(this).val() );
			if( $(this).next().attr('class') != 'd_adviewcon' ){
				$(this).after('<div class="d_adviewcon">' + $(this).val() + '</div>');
			}else{
				$(this).next().slideDown();
			}
		})
		
	});

	//导入导出
	$('body').append('<div class="d_popup_mask" style="display:none"></div>');
	var theday = new Date(),
		thetime = theday.getMonth()+1+'月'+theday.getDate()+'日 '+theday.toLocaleTimeString()+' '+theday.getFullYear()+'年';
	$('.d_export_btn').click(function() {
		$('.d_popup_mask,.d_export').show();
		if($('.d_export textarea').html('')){
			$('.d_export textarea').append('D4主题设置 - '+thetime+'\n');
			for ( i=0;i<$('.d_sel').length;i++ ){
				$('.d_export textarea').append('$'+$($('.d_sel')[i]).attr('id')+'='+$($('.d_sel')[i]).find('.d_sel_opt').html()+'=$'+$($('.d_sel')[i]).attr('id'));
			}
			for ( i=0;i<$('.d_inp').length;i++ ){
				$('.d_export textarea').append('$'+$($('.d_inp')[i]).attr('id')+'='+$($('.d_inp')[i]).val()+'=$'+$($('.d_inp')[i]).attr('id'));
			}
			for ( i=0;i<$('.d_tarea').length;i++ ){
				$('.d_export textarea').append('$'+$($('.d_tarea')[i]).attr('id')+'='+$($('.d_tarea')[i]).html()+'=$'+$($('.d_tarea')[i]).attr('id'));
			}
			$('.d_export textarea').append('\n妥善保管好您导出的数据，否则您就要一条条的添加！');
			$('.d_export textarea').select();
		}
	});		
	
	$('.d_export input').click(function(){
		$('.d_popup_mask,.d_export').hide();
	})
	
	$('.d_import_btn').click(function() {
		$('.d_popup_mask,.d_import').show();
		$('.d_import textarea').select();
	});
	
	$('.d_import input').click(function(){
		$('.d_popup_mask,.d_import').hide();
		if($('.d_import textarea').html()!=null){
			for ( i=0;i<$('.d_sel,.d_inp,.d_tarea').length;i++ ){
				var importText = $('.d_import textarea').val(),
					importDi= $($('.d_sel,.d_inp,.d_tarea')[i]),
					importId = importDi.attr('id'),
					importLi = importText.split( '$'+importId+'=' ),
					importLiInp = importLi[1].split( '=$'+importId );
				
				if( importLiInp.length = 2 ){
					importDi.val( importLiInp[0] );
				}else{
					alert('数据 "$'+importId+'" 损坏！')
				}
			}
		}
	})
	
	$('.donate-btn').attr('href',$('.donate-num a:eq(0)').attr('href')).attr('target','_blank');
	$('.donate-num a').each(function(){
		$(this).attr('rel',$(this).attr('href'));
		$(this).attr('href','javascript:;');
		$(this).click(function(){
			$(this).addClass('cur').siblings('a').removeClass('cur');
			$('.donate-btn').attr('href',$(this).attr('rel')).attr('target','_blank');
		})
	})
	
})