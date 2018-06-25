(jQuery)(function($) {
    $(document).ready(function(){
        $('.content-detail-main .cate-wr-content').each(function() {
            var $this = $('.box-detail-1', $(this));
            $this.click(function() {
                $(this).toggleClass('active');
                $(this).next().toggle();
           })
        })
    })

    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 162) {
                $('.wr-title').addClass('fixed');
            } else {
                $('.wr-title').removeClass('fixed');
            }
        });
    });

    $(document).ready(function(){
        $('.row-dt-4 > p').click(function() {
            $('.row-dt-4').toggleClass('active');
            $('.toogle-benefit').toggle();
        })
    });
});