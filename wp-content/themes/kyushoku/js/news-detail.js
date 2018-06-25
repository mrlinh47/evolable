
$(document).ready(function() {
  var owl = $('.owl-carousel');
  owl.owlCarousel({
    items: 4,
    loop: true,
    autoplay: false,
    nav: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    smartSpeed:450,
    dots:false,
    responsive: {
      1: {
        items: 1,
        nav:true,
        dots:true,
        margin: 15,
      },
      768: {
        items: 2,
        nav:true,
        margin: 20,
        dots:true
      },
      992: {
        items: 3,
        nav:true,
        margin: 20,
        dots:true
      }
    }
  });
})
