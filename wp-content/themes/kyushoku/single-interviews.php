<?php
get_header(); ?>
<div id="job-seeker">
    
    <!--- wr-breadcrumb-sub -->
    <div class="wr-breadcrumb-sub clearfix">
        <div class="container">
            <div class="row row-recrui">
                <div class="cont-breadcrumb-sub">
                    <div class="breadcrumb-sub"><h3>面接</h3></div>
                    
                    <!--- LANGUAGE-->
                    <div class="btn-group">
                      <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo do_shortcode("[get_name_lange_current]"); ?> <span class="caret"></span>
                      </button>
                      <?php echo do_shortcode("[choose_lang_dropdown]"); ?>
                    </div>
                </div>  
            </div>
        </div>
    </div>
    <!--- /wr-breadcrumb-sub -->

    <!-- CONTENT -->
    <section class="container wr-business">
        <div class="row row-business">
            <div class="breadcrumb-news-detail"><a href="#"><i class="fa fa-home"></i></a> <span class="sep"> / </span> <a href="#">面接</a> <span class="sep"> </span> <span></span></div>
            <div class="box-first">
                <div class="col-lg-8 col-sm-12 box-business-info">
                    <span><img src="<?php echo get_template_directory_uri(); ?>/images/business/icon.png" alt="" /></span>
                    <br />
                    <h3>Hà Quang Vũ</h3>
                    <h5>Kỹ sư Công nghệ thông tin </h5>
                    <p>Sự khác nhau giữa tìm việc ở Nhật và Việt Nam?</p>
                    <p>Khác biệt mà mình thấy rõ nhất là ở Việt Nam, khi phỏng vấn trực tiếp mình có nhiều cơ hội để thể hiện và chứng minh với nhà tuyển dụng khả năng của mình, ví dụ như mình là 1 iOS developer, mình có thể đưa cho nhà tuyển dụng xem những sản phẩm mình làm trước đây để thuyết phục họ. Còn khi phỏng vấn tìm việc tại Nhật, chủ yếu là phỏng vấn qua Skype vì thế nó sẽ khó khăn hơn trong việc thể hiện năng lực thực sự của mình.</p>
                </div>
                <div class="col-lg-4 col-sm-12 box-business-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/business/business.png" alt=""/>
                </div>
            </div>
            <div class="row box-second">
                <div class="col-lg-8 col-sm-12 box-business-info">
                    <h3>>>> Tại sao bạn lại chọn làm việc tại Nhật?</h3>
                    <p>Bởi vì mình cảm thấy ngưỡng mộ những đức tính cần cù siêng năng cùng tinh thần đồng đội của người Nhật. Mình tin rằng với những đức tính ấy thì chắc hẳn môi trường làm việc của họ sẽ rất chuyên nghiệp và có tính kỷ luật cao. Ngoài ra, Nhật là một nước phát triển tại Châu Á vì thế môi trường sống và sinh hoạt cũng là một trong những lý do khiến mình muốn chuyển đến đây. Cuối cùng, mình chọn Nhật để phát triển sự nghiệp vì chế độ đãi ngộ lương bổng ở đây rất tốt, đó là yếu tố quyết định cho lựa chọn của mình.</p>
                </div>
                <div class="col-lg-4 col-sm-12 box-business-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/business/business2.png" alt=""/>
                </div>
            </div>

            <div class="col-sm-12 wr-btn-send-top">
               <a class="btn-send-top" href="apply_job.html"><img src="<?php echo get_template_directory_uri(); ?>/images/business/view-detail.png" alt=""/></a>
            </div>

        </div>

        <div style="clear: both"></div>



    </section>
    <!-- /CONTENT -->

</div>
<?php
get_footer();