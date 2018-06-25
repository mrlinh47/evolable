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

$('.recrui-pagination ul li.prev a img').hover(function(){
        $(this).attr('src','images/recruitment/icon-prev-hv.png');
    },function(){
        $(this).attr('src','images/recruitment/icon-prev.png');
});

$('.recrui-pagination ul li.next a img').hover(function(){
        $(this).attr('src','images/recruitment/icon-next-hv.png');
    },function(){
        $(this).attr('src','images/recruitment/icon-next.png');
});