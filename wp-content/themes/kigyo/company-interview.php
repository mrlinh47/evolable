
<?php 
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 * Template Name: Interviews
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */


get_header();
get_sidebar();
?>
<div class="right-content">
    <div class="breadcrumb-bg">
        <h2>Interview
        </h2>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if ( has_nav_menu( 'topmenu' ) ) : ?>
                    <?php get_template_part( 'template-parts/navigation/navigation', 'topmenu' ); ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

        <p class="sub-desc">
            <?php if (qtrans_getLanguage()=='ja'){ ?>
                このページではご利用される全ての方への参考として エボラブルアジアエージェントで「採用された企業様」と「ご入社された方」に 実際にインタビューをとりました。
            <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                このページではご利用される全ての方への参考として エボラブルアジアエージェントで「採用された企業様」と「ご入社された方」に 実際にインタビューをとりました。
            <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                このページではご利用される全ての方への参考として エボラブルアジアエージェントで「採用された企業様」と「ご入社された方」に 実際にインタビューをとりました。
            <?php } ?>
        </p>
        </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">

            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#tab1"><?php if (qtrans_getLanguage()=='ja'){ ?>
                採用された企業様
            <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                Customer
            <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                Khách hàng
            <?php } ?>
        </a></li>
              <li><a data-toggle="tab" href="#tab2"><?php if (qtrans_getLanguage()=='ja'){ ?>
                ご入社された方
            <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                Candidate
            <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                Ứng cử viên
            <?php } ?>
        </a></li>
            </ul>
            
            <div class="tab-content">
              <div id="tab1" class="tab-pane fade in active">
                <?php
                global $post;
             
                $posts = array(
                'post_type'         => 'interviews',
                'posts_per_page'    => -1,
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
                    $image_thumb1 = wp_get_attachment_image_src( $thumb_id,"post-thumbnail",true  );
                    $image_thumb2 = wp_get_attachment_image_src( $thumb_id, 'thumb-news-index' );
                    $image_full = wp_get_attachment_image_src( $thumb_id, 'full' );//array('250','150'),true 

                    $image_src = "";
                    if($thumb_id != ""){
                        $image_src = $image_thumb1[0];
                    }else{
                        $image_src = get_template_directory_uri() ."/images/avatar_1.jpg";
                    }
                   
                     $termCompany = get_the_terms($post->ID, "interviews-company");
                 // print_r($termCompany);
                    
                ?>
                   
                        <div class="blog-blk">
                        <img src="<?php echo $image_src; ?>">
                        <a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a>
                        
                            
                    <?php   
                    ?>
                    <p class="inter-company"><?php echo get_post_meta(get_the_ID(),'_eaa_interview_author_romanji_value',true);?> - <?php echo $termCompany[0]->name; ?></p>
                        <p>
                        <?php echo mb_strimwidth(wp_strip_all_tags(get_the_content()), 0, 450, '...'); ?> 
                           
                        </p>
                        
              
            </div>

                        
                    <?php
                    endwhile;
                    wp_reset_postdata();
                }
            ?>
              </div>
              <div id="tab2" class="tab-pane fade">
                    <?php
                global $post;
             
                $posts = array(
                'post_type'         => 'interviews',
                'posts_per_page'    => 4,
                'post_status'=>'publish',
                'orderby'           => 'date',
                'order'             => 'DESC',
                'meta_query' => array(
                    array(
                        'key'     => 'interviews-candidate',
                        'value'   => 'candidate',
                    ),
                ),
                
            );

            $query = new WP_Query( $posts );
            if ( $query->have_posts() ) { 
            while ( $query->have_posts() ) : $query->the_post(); 
             
                     $thumb_id = get_post_thumbnail_id($post->ID);   
                    $image_thumb1 = wp_get_attachment_image_src( $thumb_id,"post-thumbnail",true  );
                    $image_thumb2 = wp_get_attachment_image_src( $thumb_id, 'thumb-news-index' );
                    $image_full = wp_get_attachment_image_src( $thumb_id, 'full' );//array('250','150'),true 

                    $image_src = "";
                    if($thumb_id != ""){
                        $image_src = $image_thumb1[0];
                    }else{
                        $image_src = get_template_directory_uri() ."/images/avatar_1.jpg";
                    }
                   
                     $termCompany = get_the_terms($post->ID, "interviews-company");
                 // print_r($termCompany);
                    
                ?>
                    
                        <div class="blog-blk">
                
                        <img src="<?php echo $image_src; ?>" >
                        <a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a>
                        <p class="inter-company"><?php echo get_post_meta(get_the_ID(),'_eaa_interview_author_romanji_value',true);?> - <?php echo $termCompany[0]->name; ?></p>
               
                    <?php   
                    ?>
                        <p>
                       <?php echo mb_strimwidth(wp_strip_all_tags(get_the_content()), 0, 450, '...'); ?> 
                           
                        </p>
                        
                
                </div>
           

                        
                    <?php
                    endwhile;
                    wp_reset_postdata();
                }
            ?>

     
              </div>
             
            </div>

        
            
        
                
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 center">
                <?php if (qtrans_getLanguage()=='ja'){ ?>
                <p class="sub-desc">どんな採用ニーズをお持ちですか？　まずはご相談ください</p>
                <a href="<?php echo get_site_url(); ?>/ja/contact" class="big-btn">お問い合わせ、ご相談はこちらからお願いいたします</a>
            <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                <p class="sub-desc">どんな採用ニーズをお持ちですか？　まずはご相談ください</p>
                <a href="<?php echo get_site_url(); ?>/vi/contact" class="big-btn">Nếu cần thêm thông tin xin hãy liên hệ với chúng tôi</a>
            <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                <p class="sub-desc">どんな採用ニーズをお持ちですか？　まずはご相談ください</p>
                <a href="<?php echo get_site_url(); ?>/en/contact" class="big-btn">For inquiries, consultation from here please.</a>
            <?php } ?>

                
            </div>
        </div>
        
  </div>
<?php get_footer();?>