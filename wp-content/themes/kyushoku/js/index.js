(function($){

	var objSlider = $(".tab_content .content-blo");
	var objTab = $('.list-tab a');
	var current = 0;

	objSlider.each(function(){
		$(this).find('.box-interview-content').first().addClass("box-show-itv");
	});

	init();

	function init(){
		/*----update1109----*/
		tabClick();
		$(".slide-control-prev").bind("click", function(e){
			e.preventDefault();
			prevSlider(current);
		});
		/*----/update1109----*/
		$(".slide-control-next").bind("click", function(e){
			e.preventDefault();
			nextSlider(current);
		});
	}

	/*----update1109----*/
	function prevSlider(cur){
		current = cur;
		current--;
		var objectSlider = $(".tab_content .content-blo.active-box");
		objectSlider.each(function(){
			var length = $(this).find(".box-interview-content").length;
			if(current <= -length){
				current = 0;
			}
			$(this).find(".box-interview-content").removeClass("box-show-itv").css({"opacity": "0"});
			$(this).find(".box-interview-content").eq(current).addClass("box-show-itv").animate({"opacity":"1"}, 200);
		});
	}
	/*----/update1109----*/

	function nextSlider(cur){
		current = cur;
		current++;
		var objectSlider = $(".tab_content .content-blo.active-box");
		objectSlider.each(function(){
			var length = $(this).find(".box-interview-content").length;
			if(current >= length){
				current = 0;
			}
			$(this).find(".box-interview-content").removeClass("box-show-itv").css({"opacity": "0"});
			$(this).find(".box-interview-content").eq(current).addClass("box-show-itv").animate({"opacity":"1"}, 200);
		});
	}

	function tabClick(){
		$('.list-tab > div').first().children().addClass("active");
		$(".tab_content > div").addClass("active-box");
		$(".tab_content > div").not(":first").removeClass("active-box").hide();

		objTab.unbind("click").bind("click", function(e){
			e.preventDefault();
			var tabName = $(this).attr("href");

			if(!$(this).hasClass("active")){
				objTab.removeClass("active");
				$(this).addClass("active");
				$(".tab_content > div").removeClass("active-box").hide();
				$(tabName).addClass("active-box").fadeIn(300);

				$(document).ready(function(){
					$('#tab-2 .list-td').bxSlider({
						mode: 'vertical',
						slideWidth: 300,
						maxSlides: 3,
						minSlides: 3,
						pager: false,
						slideMargin: 10
					});
					$('.sub-element-item').unbind("click").bind("click", function(e){
						var target = $(this).attr('data-target');
						$(this).closest(".content-blo").find('.box-interview-content').removeClass("box-show-itv").css({"opacity": "0"});
						$(target).addClass("box-show-itv").animate({"opacity":"1"}, 200);
					});
		        });

			}

		});
	}

	$('.interview-block-content .content-blo .row .box-interview-content').each(function(k, v){
		k++;
		$(this).addClass('box-content-'+k);
	});
	$('.interview-block-content .content-blo .right-content .row .sub-element-item').each(function(k, v){
		k++;
		$(this).attr('data-target','.box-content-'+k);
	});

    $(document).ready(function(){
		$('#tab-1 .list-uv').bxSlider({
			mode: 'vertical',
			loop: false,
			maxSlides: 3,
			minSlides: 3,
			pager: false,
			slideMargin: 10
		});
		$('.sub-element-item').unbind("click").bind("click", function(e){
			var target = $(this).attr('data-target');
			$(this).closest(".content-blo").find('.box-interview-content').removeClass("box-show-itv").css({"opacity": "0"});
			$(target).addClass("box-show-itv").animate({"opacity":"1"}, 200);
		});
    });

	$('div.text-left').not('.name').slimScroll({
        color: '#ff9912',
        size: '5px',
        height: '290px'
    });


})(jQuery);
