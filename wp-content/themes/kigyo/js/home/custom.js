(function($) {

	// slick custom
	$('.inter-list--interviewer, .inter-list--candidate').slick({
		dots: false,
		infinite: false,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
				infinite: true,
				dots: false
			}
		},
		{
			breakpoint: 991,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}
		]
	});

	$("div[id^='myModal']").each(function(){          
        var currentModal = $(this);                 
        //click next
        currentModal.find('.btn-next').click(function(){
          currentModal.modal('hide');
          if(currentModal.closest("div[id^='myModal']").nextAll("div[id^='myModal']").length > 0){
            currentModal.closest("div[id^='myModal']").nextAll("div[id^='myModal']").first().modal('show'); 
          }else{
            $("div[id^='myModal']").first().modal('show');
          }
        });
              
        //click prev
        currentModal.find('.btn-prev').click(function(){
          currentModal.modal('hide');
          if(currentModal.closest("div[id^='myModal']").prevAll("div[id^='myModal']").length > 0){
            currentModal.closest("div[id^='myModal']").prevAll("div[id^='myModal']").first().modal('show'); 
          }else{
            $("div[id^='myModal']").last().modal('show');
          }
        });
      });

      $("div[id^='candidate-tab']").each(function(){          
        var currentModal = $(this);                 
        //click next
        currentModal.find('.btn-next').click(function(){
        currentModal.modal('hide');
          if(currentModal.closest("div[id^='candidate-tab']").nextAll("div[id^='candidate-tab']").length > 0){
            currentModal.closest("div[id^='candidate-tab']").nextAll("div[id^='candidate-tab']").first().modal('show'); 
          }else{
            $("div[id^='candidate-tab']").first().modal('show');
          }
        });
              
        //click prev
        currentModal.find('.btn-prev').click(function(){
          currentModal.modal('hide');
          if(currentModal.closest("div[id^='candidate-tab']").prevAll("div[id^='candidate-tab']").length > 0){
            currentModal.closest("div[id^='candidate-tab']").prevAll("div[id^='candidate-tab']").first().modal('show'); 
          }else{
            $("div[id^='candidate-tab']").last().modal('show');
          }
        });
      });
      $(".modal-wide").on("show.bs.modal", function() {
        $('html,body').addClass('popup-show');         
      });
      $(".modal-wide").on("hide.bs.modal", function() {
        $('html,body').removeClass('popup-show');
      });

  $('.customer-modal .modal.modal-wide').each(function(k, v){
    k++;
    $(this).attr('id','myModal'+k);
  });
  $('.candidate-modal .modal.modal-wide').each(function(k, v){
    k++;
    $(this).attr('id','candidate-tab'+k);
  });
  $('#Interviewer .inter-list__item .item-info a').each(function(k, v){
    k++;
    $(this).attr('data-target','#myModal'+k);
  });

  $('#Candidate .inter-list__item .item-info a').each(function(k, v){
    k++;
    $(this).attr('data-target','#candidate-tab'+k);
  });

})(jQuery);