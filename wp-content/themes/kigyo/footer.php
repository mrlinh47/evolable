<style type="text/css">
    .error,#inquiry-sp.error{
        border:1px solid red !important;
    }
    #btnMySuccess{
        position: relative;
        overflow: hide;
    }
    #btnMySuccess .btn-waiting{
        position: absolute;
        padding-top: 5px;
        right: 0;
        color: #fff;
        width: calc(100% - 10px);
        text-align: center;
        height: 100%;
        border-radius: 4px;
        -webkit-border-radius: 4px;
        -ms-border-radius: 4px;
        -moz-border-radius: 4px;
        background: -moz-linear-gradient(top, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0.5) 100%);
        background: -webkit-linear-gradient(top, rgba(0,0,0,0.5) 0%,rgba(0,0,0,0.5) 100%);
        background: linear-gradient(to bottom, rgba(0,0,0,0.5) 0%,rgba(0,0,0,0.5) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#80000000', endColorstr='#80000000',GradientType=0 );
    }
</style>
<script type="text/javascript">
(function($) {
    $('form[name="contact_form_kigyo"] input.required').keyup(function(){
        if($(this).val()!=''){
            $(this).css({'background':'#fff'});
        }else{
            $(this).css({'background':''});
        }
    });
    $('body').on('click','#btnContactFormKigyo',function(event){
        $('form[name="contact_form_kigyo"] input, .inquiry-box button').removeClass('error');
        $('#myConfirm .btn-waiting').remove();
        $('#btnMySuccess').removeAttr('disabled');
        event.preventDefault();
        var validate = validateForm();
    });
    $('body').on('click','#mySuccess .close',function () {
        window.location.href = "<?php echo esc_url( home_url( '/' ) ); ?>";
    });
    function validateForm(){
        var status ='';
        var inquiryContent='';
        var inquirySp='';
        var numberReg =  /^[0-9]+$/;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var name = $('#name').val();
        var company = $('#company_name').val();
        var department = $('#department').val();
        var email = $('#email').val();
        var inquiryContent = $('#inquiry').val();
        var inquirySp = $('#inquiry-sp').val();
        var detailRequest = $('#detail_request').val();
        var phone = $('#phone').val();
        var detailRequest = $('#detail_request').val().replace(/\n/gi,"<br>");
        var otherContent = $('#other_content_text').val();
        var inputOthterContent='';
            $('.iput-other-content input:checked').each(function(){
                inputOthterContent+=$(this).val()+'<br>';
            });
            inputOthterContent+=otherContent;
        var inputVal = new Array(name,company,department,email, inquiryContent, phone);
            if(inputVal[0] == ""){
                $('#name').addClass('error');
                status='error';
            }
            if(inputVal[1] == ""){
                $('#company_name').addClass('error');
                status='error';
            }
            if(inputVal[2] == ""){
                $('#department').addClass('error');
                status='error';
            }
            if(inputVal[3] ==""){
                $('#email').addClass('error');
                status='error';
            }
            else if(!emailReg.test(email)){
                $('#email').addClass('error');
                status='error';
            }
            if($('#inquiry-sp').val() =='' && $('#inquiry').val()==''){
                $('.inquiry-box button').addClass('error');
                $('#inquiry-sp').addClass('error');
                status='error';
            } 
            if(inputVal[5] !='' && !numberReg.test(phone)){
                $('#phone').addClass('error');
                status='error';
            }
            if(status=='error'){
                return status
            }else{
                if(inquirySp!=''){
                    inquiryContent= inquirySp;
                }
                $('#myConfirm').modal();
                $('#myConfirm .name_val').text(name);
                $('#myConfirm .department_val').text(department);
                $('#myConfirm .phone_val').text(phone);
                $('#myConfirm .company_val').text(company);
                $('#myConfirm .email_val').text(email);
                $('#myConfirm .inquiry_content_val').text(inquiryContent);
                $('#myConfirm .detail_request_val').html(detailRequest);
                $('#myConfirm .other_content_val').html(inputOthterContent);
                $('body').on('click','#btnMySuccess',function(event){
                    event.preventDefault();
                    var ajaxurl = "<?php echo admin_url( 'admin-ajax.php');?>";
                    $.ajax({
                        url: ajaxurl,
                        type:"post",
                        data: {
                            'action':'contact_frm_action',
                            'name' :name,
                            'department':department,
                            'phone':phone,
                            'company':company,
                            'email':email,
                            'inquiry_content':inquiryContent,
                            'detail_request':detailRequest,
                            'other_content':inputOthterContent
                        },
                        success:function(data) {
                           if(data=='true'){
                            $('#contact_form_kigyo input, #contact_form_kigyo textarea').val('');
                            $('#myConfirm').modal("hide");
                            $('#mySuccess').modal();
                           }
                        }
                    });
                    $(this).append('<span class="btn-waiting"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i></span>');
                    $(this).attr('disabled','disabled');
                });
            }
    }
})(jQuery);


</script>
<!--MODAL CONFIRM-->
<div id="myConfirm" class="container-fluid modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">以下の内容がメールで送信されます。</h4>
        </div>
        <div class="modal-body">
                <div class="panel-body body-apply-form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-horizontal">
                                <div class="row form-group">
                                    <label class="col-full col-md-offset-1 col-xs-4 col-sm-4 col-md-4  required" for="nameInput">
                                    <span>お名前</span>
                                    </label>
                                    <div class="col-xs-8 col-sm-8 col-md-7">
                                       <span class="name_val">例）〇〇 △△</span>
                                    </div>
                                </div>
                                <div class="row form-group email-confirm">
                                    <label class="col-full col-md-offset-1 col-xs-4 col-sm-4 col-md-4  required" for="branchInput">
                                    <span>所属部署</span>
                                    </label>
                                    <div class="col-xs-8 col-sm-8 col-md-7">
                                        <span class="department_val">例）〇〇部○○課</span>
                                    </div>
                                </div>
                                <div class="row form-group have-fileupload">
                                    <label class="col-full col-md-offset-1 col-xs-4 col-sm-4 col-md-4 " for="phoneInput">
                                    <span>電話番号</span>
                                    </label>
                                    <div class="col-xs-8 col-sm-8 col-md-7">
                                        <span class="phone_val">例）0312345678</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-horizontal">
                                <div class="row form-group">
                                    <label class="col-full col-xs-4 col-sm-4 col-md-4 control-label required" for="corporateNameInput">
                                    <span>法人名</span>
                                    </label>
                                    <div class="col-xs-8 col-sm-8 col-md-7">
                                       <span class="company_val">例）株式会社〇〇〇〇</span>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-full col-xs-4 col-sm-4 col-md-4 control-label" for="emailInput"> <span>E-mail</span></label>
                                    <div class="col-xs-8 col-sm-8 col-md-7">
                                        <span class="email_val">例）example@example.co.jp</span>
                                    </div>
                                </div>
                                <div class="row form-group have-fileupload">
                                    <label class="col-full col-xs-4 col-sm-4 col-md-4 control-label" for="whyyouknow">
                                    <span>当社をどこで、<br>知りましたか？</span>
                                    </label>
                                    <div class="col-xs-8 col-sm-8 col-md-7">
                                        <span class="other_content_val">インターネット検索<br>Facebook<br>その他</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="col-md-12 cmt-other">
                            <div class="form-horizontal">
                                <div class="row form-group form-group-comment">
                                    <label class="col-full col-xs-12 col-sm-4 col-md-2 lb-comment" for="txt-content"><span>お問合せ内容</span></label>
                                    <div class="col-xs-12 col-sm-8 col-md-10 ">
                                        <p class="inquiry_content_val">xyz</p>
                                    </div>
                                    <label class="col-full col-xs-12 col-sm-4 col-md-2 lb-comment" for="txt-comment"><span>ご依頼の詳細</span></label>
                                    <div class="col-xs-12 col-sm-8 col-md-10 ">
                                        <p class="detail_request_val">であればご紹介させていただきます」と言われたのが今回の採用につながったきっかけです。 今回の採用が初めてだったので、生産性に関してはまだ発展途上ですが、間違いなく社内は和みよい影響を与えてくれていると思います。今後</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 box-confirm-btn">
                            <div class="confirm-btn">
                                  <button type="button" id="btnMySuccess" class="btn btn-default text-uppercase"><img src="<?php echo get_template_directory_uri(); ?>/images/common/form_contact/confirm-btn.png" alt=""></button>
                            </div>
                            <div class="confirm-btn">
                                  <button type="button" data-toggle="modal" data-dismiss="modal" class="btn btn-default text-uppercase"><img src="<?php echo get_template_directory_uri(); ?>/images/common/form_contact/confirm-return.png" alt=""></button>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
      </div>
    </div>
</div>
<!--/MODAL CONFIRM-->
<!--MODAL SUCCESS-->
<div id="mySuccess" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">送信が完了いたしました。</h4>
        </div>
        <div class="modal-body">
          <p>弊社で確認後、折り返しご連絡させていただきます。</p>
        </div>
        <div class="modal-footer">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-default" ><img src="<?php echo get_template_directory_uri(); ?>/images/common/form_contact/close-popup.png" /></a>
        </div>
      </div>
    </div>
</div>
<!--/MODAL SUCCESS-->



  <div class="footer">
        <p>©2018 EVOLABLE ASIA AGENT Co,. Ltd. </p>
   </div>
    
</div>

<a id="back_to_top" href="#">
            <span class="fa-stack">
                <i class="fa  fa-angle-up"></i>
            </span>
</a>

<script src="<?php echo get_template_directory_uri(); ?>/new/js/jquery.min.js"></script><!-- 
<script src="<?php echo get_template_directory_uri(); ?>/new/js/bootstrap.min.js"></script> -->
<script src="<?php echo get_template_directory_uri(); ?>/new/js/twitter-bootstrap-hover-dropdown.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/new/js/waypoints.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/new/js/jquery.easing.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/new/js/TweenLite.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/new/js/smoothPageScroll.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/new/js/jquery.nicescroll.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/new/js/owl.carousel.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/new/js/scripts.js"></script>
<script type="text/javascript">
$(document).ready(function() {
   
       
});
</script>
<script src="<?php echo get_template_directory_uri(); ?>/new/js/wow.min.js"></script>
<script>new WOW().init();</script>   


<?php wp_footer(); ?>
<script type="text/javascript">
    $(document).ready(function($) {
        // Select all links with hashes
$('a.link-croll[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
      &&
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });
    });
</script>
</body>
</html>