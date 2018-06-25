
<?php 
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 * Template Name: About
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
        <h2>
        <?php if (qtrans_getLanguage()=='ja'){ ?>
            企業概要
        <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
            Giới thiệu
        <?php }else if (qtrans_getLanguage()=='en'){ ?> 
            About
        <?php } ?>
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
                <div class="special-p">
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
            <div class="special-p">
                <h2><?php the_title(); ?></h2>
            <div class="col-md-5">
            <img src="<?php echo get_the_post_thumbnail_url( null, 'post-thumbnail' );?>" >
        </div>
        <div class="col-md-7">
           
               <?php the_content();?>
               
        </div>
        </div>
        <?php
        endforeach;
        wp_reset_postdata();
    }
    ?>   
                    <!-- <?php get_template_part( 'template-parts/company/company', 'top' ); ?> -->
                </div>
            </div>
        </div>
    
  </div>
  
  <div class="gray-bg pd-50">
    <div class="container">
        <div class="row">
            
                    <?php
    global $post;

    $posts = get_posts( array(
        'posts_per_page' => 1,
        'category'       => 12,
        'orderby' => 'post_date',
        'order' => 'DESC',
    ) );

    if ($posts) {
        foreach ($posts as $post) : 
            setup_postdata($post); ?>

            <div class="col-md-7">
                <div class="person-m">
            <h2><?php the_title(); ?></h2>
            <?php the_content();?>
            

             </div>
            </div>
            <div class="col-md-5">
                <div class="person-if">
                 <img src="<?php echo get_the_post_thumbnail_url( null, 'post-thumbnail' );?>" >
                <span class="position-s"><?php echo get_field('position'); ?></span>
                <span class="name-s"><?php echo get_field('name'); ?></span>

            <?php echo get_field('description'); ?> 
            </div>

            </div>
        <?php
        endforeach;
        wp_reset_postdata();
    }
    ?>  
                
               
               
        </div>
    </div>
  </div>
   
   <div class="feature-details">
        <div class="container">
        <div clss="row">
        <div class="col-md-12">
            <h2 class="title-br"><?php echo get_field('title_service'); ?></h2>
            <div class="feature-blk2">
                <?php
                         $image1 = get_field('image_service1');
                         $imageAlt = esc_attr($image1['alt']); 
                         $imageURL = esc_url($image1['url']); 
                         $imageThumbURL = esc_url($image1['sizes']['medium']); 
                    ?>
                <img src="<?php echo $imageThumbURL;?>">
                <h3><?php echo get_field('title_service1'); ?></h3>
                <p><?php echo get_field('content_service1'); ?></p>
            </div>
            <div class="feature-blk2">
                <?php
                         $image2 = get_field('image_service2');
                         $imageAlt = esc_attr($image2['alt']); 
                         $imageURL = esc_url($image2['url']); 
                         $imageThumbURL = esc_url($image2['sizes']['medium']); 
                    ?>
                <img src="<?php echo $imageThumbURL;?>">
                <h3><?php echo get_field('title_service2'); ?></h3>
                <p><?php echo get_field('content_service2'); ?></p>
            </div>
            <div class="feature-blk2">
                <?php
                         $image3 = get_field('image_service3');
                         $imageAlt = esc_attr($image3['alt']); 
                         $imageURL = esc_url($image3['url']); 
                         $imageThumbURL = esc_url($image3['sizes']['medium']); 
                    ?>
                <img src="<?php echo $imageThumbURL;?>">
                <h3><?php echo get_field('title_service3'); ?></h3>
                <p><?php echo get_field('content_service3'); ?></p>
            </div>
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
        </div>
    </div>
    
    <div class="location gray-bg">
        <div class="container">
        <div clss="row">
        <div class="col-md-12">
            <h2 class="title-h">
                <?php if (qtrans_getLanguage()=='ja'){ ?>
                    会社情報
                <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                    会社情報
                <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                    会社情報
                <?php } ?>
            </h2>
        </div>
        </div>
        <div clss="row">
        <div class="col-md-5">
            
            <div class="gg-map">
                <label>アクセス </label>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1511.1007977508048!2d106.70041481040066!3d10.787508375817607!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f4aa024e72d%3A0x7baa416644918413!2sSaigon+Finance+Center!5e0!3m2!1sen!2s!4v1526264620294"  frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-md-7">
            <?php if (qtrans_getLanguage()=='ja'){ ?>
                    <div class="location-info-blk">
                    <label>会社名</label>
                    株式会社エボラブルアジアエージェント</div>
                    <div class="location-info-blk">
                    <label>所在地</label>
                    〒103-0025  東京都中央区日本橋茅場町3-5-3<br> 日宝茅場町ビル7F2号</div>
                    <div class="location-info-blk">
                    <label>電話番号</label>
                    03-6316-4865</div>
                    <div class="location-info-blk">
                    <label>メール</label>
                    agent@evolable.asia</div>
                    <div class="location-info-blk">
                    <label>設立 </label>
                    平成27年5月27日</div>
                    <div class="location-info-blk">
                    <label>資本金</label>
                    500万円</div>
                    <div class="location-info-blk">
                    <label>株主</label>
                    <a href="https://evolable.asia/" target="_blank">EVOLABLE ASIA CO.,LTD.</a></div>
                    <div class="location-info-blk">
                    <label>役員 </label>
                    代表取締役社長 金 明正　 </div>
                    <div class="location-info-blk">
                    <label>事業内容</label>
                    人事・採用コンサルティング事業 人事アウトソーシング事業 <br>
                    有料職業紹介事業（厚生労働大臣許可番号13-ユ-307300） 

                </div>
                <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                    <div class="location-info-blk">
                    <label>会社名</label>
                    株式会社エボラブルアジアエージェント</div>
                    <div class="location-info-blk">
                    <label>所在地</label>
                    〒103-0025  東京都中央区日本橋茅場町3-5-3<br> 日宝茅場町ビル7F2号</div>
                    <div class="location-info-blk">
                    <label>電話番号</label>
                    03-6316-4865</div>
                    <div class="location-info-blk">
                    <label>メール</label>
                    agent@evolable.asia</div>
                    <div class="location-info-blk">
                    <label>設立 </label>
                    平成27年5月27日</div>
                    <div class="location-info-blk">
                    <label>資本金</label>
                    500万円</div>
                    <div class="location-info-blk">
                    <label>株主</label>
                    <a href="https://evolable.asia/" target="_blank">EVOLABLE ASIA CO.,LTD.</a></div>
                    <div class="location-info-blk">
                    <label>役員 </label>
                    代表取締役社長 金 明正　 </div>
                    <div class="location-info-blk">
                    <label>事業内容</label>
                    人事・採用コンサルティング事業 人事アウトソーシング事業 <br>
                    有料職業紹介事業（厚生労働大臣許可番号13-ユ-307300） 

                </div>
                <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                    <div class="location-info-blk">
                    <label>会社名</label>
                    株式会社エボラブルアジアエージェント</div>
                    <div class="location-info-blk">
                    <label>所在地</label>
                    〒103-0025  東京都中央区日本橋茅場町3-5-3<br> 日宝茅場町ビル7F2号</div>
                    <div class="location-info-blk">
                    <label>電話番号</label>
                    03-6316-4865</div>
                    <div class="location-info-blk">
                    <label>メール</label>
                    agent@evolable.asia</div>
                    <div class="location-info-blk">
                    <label>設立 </label>
                    平成27年5月27日</div>
                    <div class="location-info-blk">
                    <label>資本金</label>
                    500万円</div>
                    <div class="location-info-blk">
                    <label>株主</label>
                    <a href="https://evolable.asia/" target="_blank">EVOLABLE ASIA CO.,LTD.</a></div>
                    <div class="location-info-blk">
                    <label>役員 </label>
                    代表取締役社長 金 明正　 </div>
                    <div class="location-info-blk">
                    <label>事業内容</label>
                    人事・採用コンサルティング事業 人事アウトソーシング事業 <br>
                    有料職業紹介事業（厚生労働大臣許可番号13-ユ-307300） 

                </div>
                <?php } ?>
            
        </div>
        </div>
        </div>
    </div>
    
    <div class="container">
        <div clss="row">
        <div class="col-md-12">
            <div class="center">
                <h2 class="title-h">
                <?php if (qtrans_getLanguage()=='ja'){ ?>
                    関連会社
                <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                    関連会社
                <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                    関連会社
                <?php } ?>
            </h2>
            <div class="logo-eaa">
            <a href="http://www.evolableasia.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/new/img/6.png" alt=""></a>
            <a href="http://vn.evolableasia.com/oneasia/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/new/img/logo16.jpg" alt=""></a>
            <a href="http://eas.evolable.asia/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/new/img/logo17.jpg" alt=""></a>
            <a href="http://punch.vn/en/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/new/img/7.png" alt=""></a>
            <a href="http://sbc.evolable.asia/ja/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/new/img/8.png" alt=""></a>
            </div>
            </div>
        </div>
        </div>
    </div>


    <div class="container">
        <div clss="row">
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
                        <a href="<?php echo get_site_url(); ?>/en/contact" class="big-btn">For inquiries, consultation from here please.</a>。
                    <?php } ?>
            </div>
        </div>
        </div>
    </div>
<?php get_footer();?>