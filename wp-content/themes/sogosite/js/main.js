(jQuery)(function( $ ) {

    var evAgent = {};
    var _hScreen = $(window).height();
    var _hFooter = $(".footer-info").height() + $(".footer-copyright").height() - 30;

    function eventGotoTopPage() {
        $(".toppage span").bind('click', function() {
            $('html, body').animate({
                scrollTop : 0
            }, 500);
        });
    }

    function calcAdv() {
        var _height = $("#work-block .content-blo").height() - parseInt($(".advertiment-block").closest(".right-content").css("padding-top").replace("px", ""));
        $(".advertiment-block").css({
            "height" : _height  + "px"
        });
    }
    $("document").ready(function() {
        eventGotoTopPage();
    });

    $(window).resize(function() {
        _hScreen = $(window).height();
        _hFooter = $(".footer-info").height() + $(".footer-copyright").height() - 30;
        scrll();
    });
    scrll();
    function scrll(){
        $(window).on('scroll',function(){
            console.log('scroll');
            var _pos2 = $(window).scrollTop();
            var ftTop = $('#nav-footer').offset().top;
            var footerHeight = $('#nav-footer').height();
            var wH = window.innerHeight;
            if(_pos2<=100){
                $('.toppage').fadeOut();
            }else{
                $('.toppage').fadeIn();
                if(_pos2+wH>=ftTop+10){
                    $('.toppage span').css({'position':'absolute'});
                }else{
                    $('.toppage span').removeAttr('style');
                }
            }
        });
    }
});