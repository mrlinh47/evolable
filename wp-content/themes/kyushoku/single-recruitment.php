<?php
	get_header();
	global $post;

?>
<div class="wr-breadcrumb-sub clearfix">
	<div class="container">
		<div class="row row-recrui">
			<div class="cont-breadcrumb-sub">
				<div class="breadcrumb-sub"><h3 class="text-uppercase"><?php echo __('[:ja]求人情報[:en]Recruitment[:vi]Tuyển dụng') ?></h3></div>
				<!--- LANGUAGE-->
				<div class="btn-group">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo do_shortcode('[get_name_lange_current]'); ?>  <span class="caret"></span>
                    </button>
                    <?php echo do_shortcode('[choose_lang_dropdown]'); ?>
                </div>
			</div>
		</div>
	</div>
</div>
<!--- /wr-breadcrumb-sub -->
<?php
    if(function_exists('qtranxf_getLanguage')){
        if(!qtranxf_isAvailableIn($post->ID, qtranxf_getLanguage())){ // no En content

            if($post->post_title_langs !== "" && $post->post_title_langs !== null && is_array($post->post_title_langs)){
                $post_title_available = $post->post_title_langs;

                if(isset($post_title_available[qtranxf_getLanguage()])){

                    if(count($post_title_available[qtranxf_getLanguage()]) > 0){

                        if($post_title_available[qtranxf_getLanguage()] != true){
                            echo "<div class='no-content' style='padding: 30px 0px'><p><img src='". get_template_directory_uri()."/images/no-content1-".__('[:ja]ja[:en]en[:vi]vi').".png'" ." style='margin:0 auto;' class='img-responsive'></p></div>";
                            get_footer();
                            return false;
                        }
                    }
                    else{

                    }
                }else{
                    echo "<div class='no-content'><p><img src='". get_template_directory_uri()."/images/no-content1-".__('[:ja]ja[:en]en[:vi]vi').".png'" ." style='margin:0 auto;' class='img-responsive pc-only'><img src='". get_template_directory_uri()."/images/no-content1-sp-".__('[:ja]ja[:en]en[:vi]vi').".png'" ." style='margin:0 auto;' class='img-responsive sp-only'></p></div>";
                    get_footer();
                    return false;
                }
            }else{
                if(qtranxf_getLanguage() != "ja"){
                    echo "<div class='no-content' style='padding: 30px 0px'><p><img src='". get_template_directory_uri()."/images/no-content1-".__('[:ja]ja[:en]en[:vi]vi').".png'" ." style='margin:0 auto;' class='img-responsive pc-only'><img src='". get_template_directory_uri()."/images/no-content1-sp-".__('[:ja]ja[:en]en[:vi]vi').".png'" ." style='margin:0 auto;' class='img-responsive sp-only'></p></div>";
                    get_footer();
                    return false;
                }
            }
        }
    }

?>
<!-- CONTENT DETAIL -->
<section class="wr-detail">
    <div class="wr-title clearfix">
        <div class="container">
            <div class="row row-recrui-detail">
                <h3><?php the_title();?></h3>
                <div class="wr-btn-send-top">
                    <a class="btn-send-top" href="<?php echo site_url( '/'.qtranxf_getLanguage().'/job-apply/?id='.$post->ID ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/recruitment-detail/btn-send-top-<?php echo __('[:ja]ja[:en]en[:vi]vi'); ?>.png" alt=""/></a>
                </div>
                <div class="wr-btn-send-top-rs">
                    <a class="btn-send-top" href="<?php echo site_url( '/'.qtranxf_getLanguage().'/job-apply/?id='.$post->ID ); ?>"><?php echo __('[:ja]応募フォーム[:en]Apply job[:vi]Ứng tuyển'); ?> <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
     </div>
     <div class="container content-detail">
        <div class="row row-recrui-detail">
        <div class="breadcrumb-news-detail"><?php breadcrumbs(); ?></div>
            <div class="img-detail">
                <img src="<?php
					if ( get_field('default_image') ) {
						echo get_field('default_image');
					}
					else {
						echo get_template_directory_uri()."/images/recruitment/img-4.png";
					}
				?>" alt="" />
                <div style="clear: both"></div>
                <div class="row-recrui-detail title-rs">
                    <h3><?php the_title();?></h3>
                </div>
                 <div style="clear: both"></div>
                <div class="code-work code-work-rs">
                    <p><span><?php echo 'No.'.get_field('job_no') ?></span></p>
                </div>
            </div>
            <div class="info-detail">
                <div class="code-work code-work-rs-sm">
                    <p><span><?php echo 'No.'.get_field('job_no') ?></span></p>
                </div>
                <div style="clear: both"></div>
                <?php
                $term_locations = get_the_terms($post->ID, 'job-location');
                if( !empty( $term_locations ) ) : ?>
                <div class="row-dt-1">
                    <p>
                        <?php
                        if (is_array($term_locations)){
                            foreach($term_locations as $location) :
                                echo $location->name . ", ";
                            endforeach;
                        }
                        ?>
                    </p>
                </div>
                <?php endif; ?>

                <?php if( get_field('salary') != '' ) : ?>
                <div class="row-dt-2"><p><?php echo get_field('salary'); ?></p></div>
                <?php endif; ?>

                <?php if( get_field('timework') != '' ) : ?>
                <div class="row-dt-3"><p><?php echo get_field('timework');?></p></div>
                <?php endif; ?>

                <?php if( get_field('holiday') != '' ) : ?>
                <div class="row-dt-4"><p><?php echo __('[:ja]福利厚生[:en]Benefit[:vi]Phúc lợi'); ?> - <?php echo __('[:ja]休日/休暇[:en]Holiday/Vacation[:vi]Nghỉ lễ/Nghỉ phép'); ?></p>
                      <div class="toogle-benefit"><p><?php echo get_field('benefits');?><br><?php echo get_field('holiday');?></p>
                      </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="code-work">
                <p><span><?php echo 'No.'.get_field('job_no'); ?></span></p>
            </div>
        </div>

        <div class="row row-recrui-detail content-detail-main">
            <div data-wow-delay="0.4s" class="cate-wr-content wow fadeInUp animated">
                <div class="box-detail-1">
                    <div class="cate-box-title"><h4><?php echo __('[:ja]仕事内容[:en]Jobs Description[:vi]mô tả công việc'); ?></h4></div>
                </div>
                <div class="cate-box-content">
                	<p><?php echo get_post_meta( $post->ID, 'detail', true ); ?></p>
                </div>
            </div>
            <div data-wow-delay="0.4s" class="cate-wr-content wow fadeInUp animated">
                <div class="box-detail-1">
                    <div class="cate-box-title"><h4><?php echo __('[:ja]必要経験[:en]Experience[:vi]Yêu cầu kinh nghiệm'); ?></h4></div>
                </div>
                <div class="cate-box-content">
                	<p><?php echo get_post_meta( $post->ID, 'experience', true ); ?></p>
                </div>
            </div>
            <div data-wow-delay="0.4s" class="cate-wr-content wow fadeInUp animated">
                <div class="box-detail-1">
                    <div class="cate-box-title"><h4><?php echo __('[:ja]事業内容[:en]Company Information[:vi]Thông tin công ty') ?></h4></div>
                </div>
                <div class="cate-box-content">
                	<p><?php echo get_post_meta( $post->ID, 'content', true );?></p>
                </div>
            </div>
            <div data-wow-delay="0.4s" class="cate-wr-content wow fadeInUp animated">
                <div class="box-detail-1">
                    <div class="cate-box-title"><h4><?php echo __('[:ja]勤務地[:en]Working location[:vi]Nơi làm việc') ?></h4></div>
                </div>
                <div class="cate-box-content">
                	<p><?php echo get_post_meta( $post->ID, 'location', true );?></p>
                </div>
            </div>
        </div>

        <div style="clear: both"></div>

        <div class="wr-btn-send-bot">
            <a class="btn-send-bot" href="<?php echo site_url( '/'.qtranxf_getLanguage().'/job-apply/?id='.$post->ID ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/recruitment-detail/btn-send-bot-<?php echo __('[:ja]ja[:en]en[:vi]vi'); ?>.png" alt=""/></a>
        </div>
     </div>

</section>

<div style="clear: both"></div>

<!-- /CONTENT DETAIL -->

<!-- LIST OTHER -->
<section data-wow-delay="0.4s" class="wr-list-other wow fadeInUp animated">
    <div class="clearfix">
        <div class="container">
            <div class="row row-recrui-detail">
                <div class="title-view-other">
                    <h3><a href="#"><?php echo __('[:ja]似ている求人[:en]Related jobs[:vi]Các công việc tương tự') ?></a></h3>
                        <div class="more-other">
                            <a class="btn-more-other" href="<?php echo site_url( '/'.qtranxf_getLanguage().'/recruitment/?id='.$post->ID ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/recruitment-detail/other.png" alt=""/></a>
                        </div>
                </div>
            </div>
            <div class="row row-list-slider">
                <div class="owl-carousel owl-theme list-work">
					<?php
					    $terms_position = get_the_terms($post->ID, "job-position");
					    $id_terms_position = array();
					    if(is_array($terms_position)){
					    	foreach($terms_position as $key => $term){
					    		$id_terms_position[] = $term->term_id;
					    	}
					    }

					    $term_locations = get_the_terms($post->ID, 'job-location');
					    $id_terms_location = array();
					    if(is_array($term_locations)){
					    	foreach($term_locations as $key => $term){
					    		$id_terms_location[] = $term->term_id;
					    	}
					    }

						$term_skills = get_the_terms($post->ID, 'job-skill');
					    $id_terms_skills = array();
					    if(is_array($term_skills)){
					    	foreach($term_skills as $key => $term){
					    		$id_terms_skills[] = $term->term_id;
					    	}
					    }
				        $args=array(
					        'post_type' => "recruitment",
					        'post__not_in' => array($post->ID),
					        'tax_query' => array(
						        array(
						            'taxonomy' => 'job-position',
						            'terms' => $id_terms_position
						        ),
						        array(
						            'taxonomy' => 'job-location',
						            'terms' => $id_terms_location
						        ),
						        array(
						            'taxonomy' => 'job-skill',
						            'terms' => $id_terms_skills
						        )
						    ),
					        'showposts'=> 12,
					        'caller_get_posts' => 1
				        );
				        $wp_query = new WP_Query($args);
				        if( $wp_query->have_posts() ) {
				            while ($wp_query->have_posts()) {
			                	$wp_query->the_post(); ?>
			                	<div class="item list-work-item wow fadeInUp animated" data-wow-delay="0.4s">
			                        <a href="<?php the_permalink();?>" class="box-work" title="">
			                            <div class="box-work-img">
			                            	<img src="<?php
												if ( get_field('default_image') ) {
													echo get_field('default_image');
												}
												else {
													echo get_template_directory_uri()."/images/recruitment/img-4.png";
												}
											?>" alt="<?php the_title();?>" />
			                            </div>
			                            <div class="figcaption"><span class="dl-out"><span class="dl-in"><?php the_title();?></span></span></div>
			                            <div class="cmt-work">
			                            	<div class="box-map-sal">
				                                <p class="cmt-map"><?php
													if (is_array($term_locations)):
														foreach($term_locations as $location) :
															echo $location->name . ", ";
														endforeach;
													endif;
												?></p>
				                                <p class="cmt-sal"><?php
													if ( !is_null(get_field('salary')) ) :
														echo get_field('salary');
													endif;
												?></p>
											</div>
			                                <div class="tit-skill">
			                                    <span><?php echo __('[:ja]スキル[:en]Skills[:vi]Kỹ năng', 'kyushoku'); ?></span>
			                                </div>
			                                <div class="list-skill inner-content-div">
			                                    <?php
													if (is_array($term_skills)):
														foreach($term_skills as $skill_item) :
															echo "<span>". $skill_item->name ."</span>";
														endforeach;
													endif;
												?>
			                                </div>
			                                <span class="readmore"><?php echo __('[:ja]詳細を見る >>[:en]Detail >>[:vi]Xem chi tiết >>'); ?></span>
			                            </div>
			                        </a>
			                    </div>
				                <?php
				            }
				        }
					?>
                </div>
            </div>

        </div>
    </div>
</section>
<?php get_footer();?>