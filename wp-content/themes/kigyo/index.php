<?php 
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 * Template Name: Company-top
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header();
get_sidebar();
?>
    <div class="right-content">
    
    <div class="top-intro2">
        <div class="container">
        <div class="row">
        <div class="col-md-12">
        <?php if (qtrans_getLanguage()=='ja'){ ?>
            <h1>CREATE BORDERLESS</h1>
            <h1>WORKING OPPORTUNITY</h1>
            <p>日本国内の人材採用・グローバル人材 
            <br>日本国内での人材採用に加えグローバルマーケットで 
            <br>活躍いただける人材の採用についてもサポートいたします。 </p>
        <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
            <h1>CREATE BORDERLESS</h1>
            <h1>WORKING OPPORTUNITY</h1>
            <p>日本国内の人材採用・グローバル人材 
            <br>日本国内での人材採用に加えグローバルマーケットで 
            <br>活躍いただける人材の採用についてもサポートいたします。 </p>
        <?php }else if (qtrans_getLanguage()=='en'){ ?> 
            <h1>CREATE BORDERLESS</h1>
            <h1>WORKING OPPORTUNITY</h1>
            <p>日本国内の人材採用・グローバル人材 
            <br>日本国内での人材採用に加えグローバルマーケットで 
            <br>活躍いただける人材の採用についてもサポートいたします。 </p>
        <?php } ?>
        </div>
        </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <?php if ( has_nav_menu( 'topmenu' ) ) : ?>
                        <?php get_template_part( 'template-parts/navigation/navigation', 'topmenu' ); ?>
                    <?php endif; ?>
                    <!-- <li><a class="current" href="#">会社情報</a></li>
                    <li><a href="#">3つの強み</a></li>
                    <li><a href="#">INTERVIEW</a></li>
                    <li><a href="#">企業様向けコラム</a></li>
                    <li><a href="#">お問い合わせ</a></li> -->
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="special-p company-top">
                    <?php
                        global $post;

                        $posts = get_posts( array(
                            'posts_per_page' => 1,
                            'category'       => 11,
                            'orderby' => 'post_date',
                            'order' => 'DESC',
                        ) );

                        if ($posts) {
                            foreach ($posts as $post) : 
                                setup_postdata($post); ?>
                                
                                    
                                <div class="col-md-5 image-about">
                                <img src="<?php echo get_the_post_thumbnail_url( null, 'post-thumbnail' );?>" >
                            </div>
                            <div class="col-md-7">
                               <h2 class="title-top"><?php the_title(); ?></h2>
                                   <?php the_content();?>
                                   
                            </div>
                            
                            <?php
                            endforeach;
                            wp_reset_postdata();
                        }
                        ?>   
                   <!-- <?php //get_template_part( 'template-parts/company/company', 'top' ); ?> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="center">
                    <div class="sub-desc">
                        <?php if (qtrans_getLanguage()=='ja'){ ?>
                            どんな採用ニーズをお持ちですか？　まずはご相談ください。
                        <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                            どんな採用ニーズをお持ちですか？　まずはご相談ください。
                        <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                            どんな採用ニーズをお持ちですか？　まずはご相談ください。
                        <?php } ?>

                    </div>
                    <?php if (qtrans_getLanguage()=='ja'){ ?>
                        <a href="<?php echo get_site_url(); ?>/ja/contact" class="big-btn">お問い合わせ、ご相談はこちらからお願いいたします</a>
                    <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                        <a href="<?php echo get_site_url(); ?>/vi/contact" class="big-btn">Nếu cần thêm thông tin xin hãy liên hệ với chúng tôi</a>
                    <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                        <a href="<?php echo get_site_url(); ?>/en/contact" class="big-btn">For inquiries, consultation from here please.</a>
                    <?php } ?>
                    
                </div>
            </div>
        </div>
  </div>
   
   
    
    <div class="feature-top style2">
        <div class="container">
        <div clss="row">
        <div class="col-md-12">
            <div class="center">
                <h2 class="title-br"><?php echo get_field('title_service'); ?></h2>
            </div>
        </div>
        </div>
        <div clss="row">
            <div class="col-md-4">
                <div class="feature-blk">
                    <h3><?php echo get_field('title_service1'); ?></h3>
                    <?php
                         $image1 = get_field('image_service1');
                         $imageAlt = esc_attr($image1['alt']); 
                         $imageURL = esc_url($image1['url']); 
                         $imageThumbURL = esc_url($image1['sizes']['medium']); 
                    ?>
                <img src="<?php echo $imageThumbURL;?>">
                    <p><?php echo get_field('content_service1'); ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-blk">
                    <h3><?php echo get_field('title_service2'); ?></h3>
                    <?php
                         $image1 = get_field('image_service2');
                         $imageAlt = esc_attr($image1['alt']); 
                         $imageURL = esc_url($image1['url']); 
                         $imageThumbURL = esc_url($image1['sizes']['medium']); 
                    ?>
                <img src="<?php echo $imageThumbURL;?>">
                    <p><?php echo get_field('content_service2'); ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-blk">
                    <h3><?php echo get_field('title_service3'); ?></h3>
                    <?php
                         $image1 = get_field('image_service3');
                         $imageAlt = esc_attr($image1['alt']); 
                         $imageURL = esc_url($image1['url']); 
                         $imageThumbURL = esc_url($image1['sizes']['medium']); 
                    ?>
                <img src="<?php echo $imageThumbURL;?>">
                    <p><?php echo get_field('content_service3'); ?></p>
                </div>
            </div>
        </div>
        <div clss="row">
        <div class="col-md-12">
            <div class="center">
                <?php if (qtrans_getLanguage()=='ja'){ ?>
                    <a href="<?php echo get_site_url(); ?>/ja/about" class="view-more-btn">もっと詳しく</a>
                <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                    <a href="<?php echo get_site_url(); ?>/vi/about" class="view-more-btn">Tìm hiểu thêm</a>
                <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                    <a href="<?php echo get_site_url(); ?>/en/about" class="view-more-btn">Details</a>
                <?php } ?>
                
            </div>
        </div>
        </div>
        </div>
    </div>
    
    <div class="interview-top">
            
                    <?php
            global $post;
            $posts = array(
                'post_type'         => 'interviews',
                'posts_per_page'    => 1,
                'post_status'=>'publish',
                'orderby'           => 'date',
                'order'             => 'ASC',
                'meta_query' => array(
                    array(
                        'key'     => 'interviews-candidate',
                        'value'   => 'customer',
                    ),
                ),
            );
            $query = new WP_Query( $posts );
            if ( $query->have_posts() ) {
            $query->the_post();
                $thumb_id = get_post_thumbnail_id($post->ID);
                    $image_thumb1 = wp_get_attachment_image_src( $thumb_id, 'thumb-interview-page' );
                    $image_thumb2 = wp_get_attachment_image_src( $thumb_id, 'thumb-news-index' );
                    $image_full = wp_get_attachment_image_src( $thumb_id, 'medium' );

                    $image_src = "";
                    if($thumb_id != ""){
                        $image_src = $image_thumb1[0];
                    }else{
                        $image_src = get_template_directory_uri() ."/images/avatar_1.jpg";
                    }

                    $position = '';
                    if (get_field('position') !== false){
                        $position = get_field('position');
                    }
                     $termCompany = get_the_terms($post->ID, "interviews-company");
                    // print_r($termCompany);
                    $link = get_post_meta($post->ID, '_eaa_interview_link_value', true);
                    
                ?>
            <div class="inter-big" style="background:url(<?php echo $image_src ;?>) no-repeat top left;background-size:cover;">
                <div class="inter-big-overlay">
                    <a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a>
                    <p><?php echo mb_strimwidth(wp_strip_all_tags(get_the_content($post->ID)), 0, 80, '...'); ?></p>
                    <div class="inter-big-name">
                        <label><?php echo get_post_meta(get_the_ID(),'_eaa_interview_author_romanji_value',true);?></label>
                        <span><?php echo $termCompany[0]->name; ?></span>
                    </div>
                </div>
            </div>
                    <?php   
            wp_reset_postdata();
            }
        ?>
                
            
            <div class="inter-bg">
                <div class="title-blk">
                    <h2>Interview</h2>
                    <?php if (qtrans_getLanguage()=='ja'){ ?>
                        <a href="<?php echo get_site_url(); ?>/ja/interviews" class="view-more-btn no-bg">一覧を見る</a>
                    <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                        <a href="<?php echo get_site_url(); ?>/vi/interviews" class="view-more-btn no-bg">Xem danh sách</a>
                    <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                        <a href="<?php echo get_site_url(); ?>/en/interviews" class="view-more-btn no-bg">Details</a>
                    <?php } ?>
                
                </div>
                <div class="inter-list">
                <?php
                global $post;
            $posts = array(
                'post_type'         => 'interviews',
                'posts_per_page'    => 2,
                'post_status'=>'publish',
                'orderby'           => 'date',
                'order'             => 'DESC',
                'meta_query' => array(
                    array(
                        'key'     => 'interviews-candidate',
                        'value'   => 'customer',
                    ),
                ),
                
            );
            $query = new WP_Query( $posts );
            if ( $query->have_posts() ) {
            while ( $query->have_posts() ) : $query->the_post();
                $thumb_id = get_post_thumbnail_id($post->ID);
                    $image_thumb1 = wp_get_attachment_image_src( $thumb_id,"medium",true  );
                    $image_thumb2 = wp_get_attachment_image_src( $thumb_id, 'thumb-news-index' );
                    $image_full = wp_get_attachment_image_src( $thumb_id, 'full' );//array('250','150'),true 

                    $image_src = "";
                    if($thumb_id != ""){
                        $image_src = $image_thumb1[0];
                    }else{
                        $image_src = get_template_directory_uri() ."/images/avatar_1.jpg";
                    }
                   
                     $termCompany = get_the_terms($post->ID, "interviews-company");
                  
                    
                ?>
                <div class="inter-blk">
                    <img src="<?php echo $image_src; ?>" >
                    <a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a>

                    <div class="inter-name">
                        <label><?php echo get_post_meta(get_the_ID(),'_eaa_interview_author_romanji_value',true);?></label>
                        <span><?php echo $termCompany[0]->name; ?></span>
                    </div>
                </div>


                <?php   endwhile;
            wp_reset_postdata();
            }
        ?>
                
                
                </div>



            </div>
    </div>
    
      <div class="blog-section">
        <div class="container">
        <div clss="row">
            <div class="col-md-12">
                <div class="title-blk">
                <h2 class="title-h">
                <?php if (qtrans_getLanguage()=='ja'){ ?>
                    企業様向けコラム
                <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                    企業様向けコラム
                <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                    企業様向けコラム
                <?php } ?>
                    </h2>
                    <?php switch_to_blog(3); ?> 
                    <a href="<?php echo get_site_url().'/'.qtranxf_getLanguage().'/column'; ?>" class="view-more-btn">
                        <?php if (qtrans_getLanguage()=='ja'){ ?>
                        一覧を見る
                    <?php }else if (qtrans_getLanguage()=='vi'){ ?>
                        Xem danh sách
                    <?php }else if (qtrans_getLanguage()=='en'){ ?>
                        Details
                    <?php } ?>
                    </a>
                    <?php restore_current_blog();
                ?>
                
                </div>
            </div>
        </div>
        <div clss="row">
            <div class="col-md-12">
                <?php
                global $post;
             
                $posts = get_posts( array(
                    'posts_per_page' => 2,
                    'post_type' => 'columns',
                    'post_status'=>'publish',
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                ) );
             
                if ($posts) {
                    foreach ($posts as $post) : 
                        setup_postdata($post); ?>

                        <div class="blog-blk">
                
                        <img src="<?php echo get_the_post_thumbnail_url( null, 'post-thumbnail' );?>" >

                        <a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a>
                        
                        <ul class="tags-list">
                            <?php 
                        foreach((get_the_category()) as $key => $category) { 
                            $category_link = get_category_link($category->cat_ID); ?>
                            
                            <li>
                                <a href="<?php echo $category_link; ?>" class="catlink" data-id="<?php echo $category->cat_ID; ?>"><?php echo $category->cat_name; ?></a>
                    </li>
                            
                    <?php   } 
                    ?>

                           
                        </ul>
                        <p>
                        <?php echo mb_strimwidth(wp_strip_all_tags(get_the_content($post->post_content)), 0, 150, '...'); ?>
                           
                        </p>
                        <span class="blog-date">― <?php the_modified_time('Y.m.d'); ?> UPDATED</span>
                
                </div>


                        
                    <?php
                    endforeach;
                    wp_reset_postdata();
                }
            ?>
               
            </div>
        </div>
        
        
        
        
        </div>
   </div> 
    
    
    
    <div class="client-top">
        <div class="container">
        <div clss="row">
        <div class="col-md-12">
            <div class="center">
                <h2 class="title-h"><?php echo get_field('title_company'); ?></h2>
                <ul class="client-list">
                    <?php 
                        $images = acf_photo_gallery('logo_company', get_the_ID());
                        if( $images ):
                    ?>

                    <?php foreach( $images as $key => $image ): ?>
                        <li> 
                            <img src="<?php echo $image['full_image_url']; ?>"  >
                        </li>
                    <?php endforeach; 
                        endif; 
                    ?>
                </ul>
            </div>
        </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="center">
                    <div class="sub-desc">
                         <?php if (qtrans_getLanguage()=='ja'){ ?>
                            どんな採用ニーズをお持ちですか？　まずはご相談ください。
                        <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                            どんな採用ニーズをお持ちですか？　まずはご相談ください。
                        <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                            どんな採用ニーズをお持ちですか？　まずはご相談ください。
                        <?php } ?>
                    </div>
                    <?php if (qtrans_getLanguage()=='ja'){ ?>
                        <a href="<?php echo get_site_url(); ?>/ja/contact" class="big-btn">お問い合わせ、ご相談はこちらからお願いいたします</a>
                    <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                        <a href="<?php echo get_site_url(); ?>/vi/contact" class="big-btn">nếu cần thêm thông tin xin hãy liên hệ với chúng tôi</a>
                    <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                        <a href="<?php echo get_site_url(); ?>/en/contact" class="big-btn">For inquiries, consultation from here please.</a>
                    <?php } ?>
                </div>
            </div>
        </div>
        
        
        </div>
    </div>
<?php get_footer();?>