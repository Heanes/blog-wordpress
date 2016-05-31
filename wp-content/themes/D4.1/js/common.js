(function($) {
	
	//边栏鼠标覆盖样式
	$('.sider li').hover(function() {
		$(this).find('a').css('color', '#090');
	},function() {
		$(this).find('a').css('color', '#305999');
	});
	
	//点击文章标题时预加载提示
	$('.excerpt .tit a').click(function() {
		myloadoriginal = this.text;
		$(this).text('正在努力加载中...');
		var myload = this;
		setTimeout(function() {
			$(myload).text(myloadoriginal);
		},2011);
	});
	//预加载广告
function speed_ads(loader, ad) {
var ad = document.getElementById(ad),
loader = document.getElementById(loader);
if (ad && loader) {
ad.appendChild(loader);
loader.style.display='block';
ad.style.display='block';
}
}
window.onload=function() {
speed_ads('aside-loader1', 'aside1');
speed_ads('aside-loader2', 'aside2');
speed_ads('aside-loader3', 'aside3');
speed_ads('aside-loader4', 'aside4');
};
	// 文字滚动
    (function($){
    $.fn.extend({
    Scroll:function(opt,callback){
    if(!opt) var opt={};
    var _this=this.eq(0).find("ul:first");
    var        lineH=_this.find("li:first").height(),
    line=opt.line?parseInt(opt.line,10):parseInt(this.height()/lineH,10),
    speed=opt.speed?parseInt(opt.speed,10):7000, //卷动速度，数值越大，速度越慢（毫秒）
    timer=opt.timer?parseInt(opt.timer,10):7000; //滚动的时间间隔（毫秒）
    if(line==0) line=1;
    var upHeight=0-line*lineH;
    scrollUp=function(){
    _this.animate({
    marginTop:upHeight
    },speed,function(){
    for(i=1;i<=line;i++){
    _this.find("li:first").appendTo(_this);
    }
    _this.css({marginTop:0});
    });
    }
    _this.hover(function(){
    clearInterval(timerID);
    },function(){
    timerID=setInterval("scrollUp()",timer);
    }).mouseout();
    }
    })
    })(jQuery);
    $(document).ready(function(){
    $(".crumbs-tip").Scroll({line:1,speed:1000,timer:5000});//修改此数字调整滚动时间
    });
	//侧栏文章列表选项卡
	$('.post-list:eq(0) .tit strong').each(function(i){
		$(this).click(function(){
			$(this).addClass('on').siblings('strong').removeClass('on');
			$($('.post-list:eq(0) ul')[i]).fadeIn().siblings('ul').hide();
		})
	})
	
	$('.site-nav a').each(function(i){
		$(this).click(function(){
			$(this).parent().addClass('on').siblings('li').removeClass('on');
			$($('.site-links')[i]).addClass('on').siblings('.site-links').removeClass('on');
		})
	})
	
	$('.tools-nav a').each(function(i){
		$(this).click(function(){
			$(this).addClass('on').siblings('a').removeClass('on');
			$(this).prev().addClass('on-prev').siblings('a').removeClass('on-prev');
			$(this).next().addClass('on-next').siblings('a').removeClass('on-next');
			$('.tools').load('/wp-content/themes/d4/tools/'+ $(this).attr('id') +'.php');
		})
	})	
$('.reply').click(function() {
	var atid = '"#' + $(this).parent().parent().attr("id") + '"';
        var atname = $(this).parent().parent().find(".c-author").text();
	$("#comment").attr("value","<a href=" + atid + ">@" + atname + " </a>").focus();
});
	$('.cancel-comment-reply a').click(function() {	//点击取消回复评论清空评论框的内容
	$("#comment").attr("value",'');
});
})(jQuery);