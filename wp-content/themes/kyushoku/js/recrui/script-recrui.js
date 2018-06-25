// $(document).ready(function(){
// 	$('.list-work').each(function() {
// 	    // startListHeight( $('figcaption', $(this)) );
// 	    startListHeight( $('.cmt-work .bx-cmt-sal', $(this)) );
// 	});
// 	function startListHeight($tag) {

// 	    function setHeight(s) {
// 	        var max = 0;
// 	        s.each(function() {
// 	            var h = $(this).height();
// 	            max = Math.max(max, h);
// 	        }).height('').height(max);
// 	    }
// 	    $(window).on('ready load resize', setHeight($tag));
// 	}
// })

// $('.cmt-sal').wrap('<div class="bx-cmt-sal"></div>');
(function($) {
	$('.recrui-pagination a.prev img').hover(function(){
        $(this).attr('src', template_url+'/images/recruitment/icon-prev-hv.png');
	},function(){
		$(this).attr('src', template_url+'/images/recruitment/icon-prev.png');
	});

	$('.recrui-pagination a.next img').hover(function(){
	    $(this).attr('src', template_url+'/images/recruitment/icon-next-hv.png');
	},function(){
		$(this).attr('src', template_url+'/images/recruitment/icon-next.png');
	});
})(jQuery);