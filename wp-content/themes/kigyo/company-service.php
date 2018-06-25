
<?php 
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 * Template Name: Service
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
                        サービス
                    <?php }else if (qtrans_getLanguage()=='vi'){ ?>
                        Dịch vụ
                    <?php }else if (qtrans_getLanguage()=='en'){ ?>
                        Service
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
                <a href="#tab1" class="link-croll"><div class="feature-blk">
                    <h3><?php echo get_field('title_service1'); ?></h3>
                    <?php
                         $image1 = get_field('image_service1');
                         $imageAlt = esc_attr($image1['alt']); 
                         $imageURL = esc_url($image1['url']); 
                         $imageThumbURL = esc_url($image1['sizes']['medium']); 
                    ?>
                <img src="<?php echo $imageThumbURL;?>">
                    <p><?php echo get_field('content_service1'); ?></p>
                </div></a>
            </div>
            <div class="col-md-4">
                <a href="#tab2" class="link-croll"><div class="feature-blk">
                    <h3><?php echo get_field('title_service2'); ?></h3>
                    <?php
                         $image1 = get_field('image_service2');
                         $imageAlt = esc_attr($image1['alt']); 
                         $imageURL = esc_url($image1['url']); 
                         $imageThumbURL = esc_url($image1['sizes']['medium']); 
                    ?>
                <img src="<?php echo $imageThumbURL;?>">
                    <p><?php echo get_field('content_service2'); ?></p>
                </div></a>
            </div>
            <div class="col-md-4">
                <a href="#tab3" class="link-croll"><div class="feature-blk">
                    <h3><?php echo get_field('title_service3'); ?></h3>
                    <?php
                         $image1 = get_field('image_service3');
                         $imageAlt = esc_attr($image1['alt']); 
                         $imageURL = esc_url($image1['url']); 
                         $imageThumbURL = esc_url($image1['sizes']['medium']); 
                    ?>
                <img src="<?php echo $imageThumbURL;?>">
                    <p><?php echo get_field('content_service3'); ?></p>
                </div></a>
            </div>
        </div>
        
        </div>
    </div>
    </div>
    
    
    <div class="content gray-bg" id="tab1">
        <div class="container">
        <div class="row">
            <div class="col-md-12">
        <div class="head-f">
            <?php if (qtrans_getLanguage()=='ja'){ ?>
                <label class="green1">人材紹介事業 </label>
                <?php
                         $image1 = get_field('image_service1');
                         $imageAlt = esc_attr($image1['alt']); 
                         $imageURL = esc_url($image1['url']); 
                         $imageThumbURL = esc_url($image1['sizes']['medium']); 
                    ?>
                <div class="img-service"><img src="<?php echo $imageThumbURL;?>" class="img-responsive"></div>
                    <p class="des-service">即戦力としてご活躍いただける人材紹介はもちろんのこと、 
                    <br>ポテンシャルの高い育成人材の採用についてもお手伝いさせていただきます。</p>
            <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                <label class="green1">人材紹介事業 </label>
                <?php
                         $image1 = get_field('image_service1');
                         $imageAlt = esc_attr($image1['alt']); 
                         $imageURL = esc_url($image1['url']); 
                         $imageThumbURL = esc_url($image1['sizes']['medium']); 
                    ?>
                <div class="img-service"><img src="<?php echo $imageThumbURL;?>" class="img-responsive"></div>
                    <p class="des-service">即戦力としてご活躍いただける人材紹介はもちろんのこと、 
                    <br>ポテンシャルの高い育成人材の採用についてもお手伝いさせていただきます。</p>
            <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                <label class="green1">人材紹介事業 </label>
                <?php
                         $image1 = get_field('image_service1');
                         $imageAlt = esc_attr($image1['alt']); 
                         $imageURL = esc_url($image1['url']); 
                         $imageThumbURL = esc_url($image1['sizes']['medium']); 
                    ?>
                <div class="img-service"><img src="<?php echo $imageThumbURL;?>" class="img-responsive"></div>
                    <p class="des-service">即戦力としてご活躍いただける人材紹介はもちろんのこと、 
                    <br>ポテンシャルの高い育成人材の採用についてもお手伝いさせていただきます。</p>
            <?php } ?>
            
        </div>
        
    
        </div>
        </div>
        
      <!--   <div class="row">
            <div class="col-md-12">
                <h2 class="title-h" >
                <?php if (qtrans_getLanguage()=='ja'){ ?>
                    エージェントを選ぶポイント
                <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                    エージェントを選ぶポイント
                <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                    エージェントを選ぶポイント
                <?php } ?>
                </h2>
            </div>
        </div> -->
        <div class="row sv1">
            <div class="col-md-6 col-sm-6">
                <div class="f-blk" >
                    <div class="col-lg-6">
                    <?php
                         $image1 = get_field('img_point1');
                         $imageAlt = esc_attr($image1['alt']); 
                         $imageURL = esc_url($image1['url']); 
                         $imageThumbURL = esc_url($image1['sizes']['medium']); 
                    ?>
                <img src="<?php echo $imageThumbURL;?>">
            </div>
            <div class="col-lg-6">
                    <h3 class="title-serv"><?php echo get_field('title_point1'); ?></h3>
                    <p><?php echo get_field('content_point1'); ?></p>
                </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="f-blk">
                    <div class="col-lg-6">
                    <?php
                         $image2 = get_field('img_point2');
                         $imageAlt = esc_attr($image2['alt']); 
                         $imageURL = esc_url($image2['url']); 
                         $imageThumbURL = esc_url($image1['sizes']['medium']); 
                    ?>
                <img src="<?php echo $imageThumbURL;?>">
            </div>
            <div class="col-lg-6">
                    <h3 class="title-serv"><?php echo get_field('title_point2'); ?></h3>
                    <p><?php echo get_field('content_point2'); ?></p>
                </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <h2 class="title-br">
                    <?php if (qtrans_getLanguage()=='ja'){ ?>
                        豊富な人材
                    <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                        豊富な人材
                    <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                        豊富な人材
                    <?php } ?>
                </h2>
                <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/new/img/o1.png" >
            </div>
        </div>
        
    </div>
    </div>
    
        <div class="content " id="tab2">
        <div class="container">
        <div class="row">
            <div class="col-md-12">
        <div class="head-f">
            <?php if (qtrans_getLanguage()=='ja'){ ?>
                <label class="green2">採用支援事業</label>
                <?php
                         $image1 = get_field('image_service2');
                         $imageAlt = esc_attr($image1['alt']); 
                         $imageURL = esc_url($image1['url']); 
                         $imageThumbURL = esc_url($image1['sizes']['medium']); 
                    ?>
                <div class="img-service"><img src="<?php echo $imageThumbURL;?>" class="img-responsive"></div>
                <p class="des-service">採用業務代行、採用コンサルティングなど 
                <br>御社の事業ニーズにあった提案をさせていただきます。 
                <br>事業を拡大させるためにはどのような人事施策・人材採用・組織づくりがよいかなどの 
                <br>お悩みについてもご相談承ります。</p>
            <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                <label class="green2">採用支援事業</label>
                <?php
                         $image1 = get_field('image_service2');
                         $imageAlt = esc_attr($image1['alt']); 
                         $imageURL = esc_url($image1['url']); 
                         $imageThumbURL = esc_url($image1['sizes']['medium']); 
                    ?>
                <div class="img-service"><img src="<?php echo $imageThumbURL;?>" class="img-responsive"></div>
                <p class="des-service">採用業務代行、採用コンサルティングなど 
                <br>御社の事業ニーズにあった提案をさせていただきます。 
                <br>事業を拡大させるためにはどのような人事施策・人材採用・組織づくりがよいかなどの 
                <br>お悩みについてもご相談承ります。</p>
            <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                <label class="green2">採用支援事業</label>
                <?php
                         $image1 = get_field('image_service2');
                         $imageAlt = esc_attr($image1['alt']); 
                         $imageURL = esc_url($image1['url']); 
                         $imageThumbURL = esc_url($image1['sizes']['medium']); 
                    ?>
                <div class="img-service"><img src="<?php echo $imageThumbURL;?>" class="img-responsive"></div>
                <p class="des-service">採用業務代行、採用コンサルティングなど 
                <br>御社の事業ニーズにあった提案をさせていただきます。 
                <br>事業を拡大させるためにはどのような人事施策・人材採用・組織づくりがよいかなどの 
                <br>お悩みについてもご相談承ります。</p>
            <?php } ?>
           
        </div>
        
    
        </div>
        </div>
        
       <!--  <div class="row">
            <div class="col-md-12">
                <h2 class="title-h">
                <?php if (qtrans_getLanguage()=='ja'){ ?>
                    エージェントを選ぶポイント
                <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                    エージェントを選ぶポイント
                <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                    エージェントを選ぶポイント
                <?php } ?>
                </h2>
            </div>
        </div> -->
        <div class="row sv1">
            <div class="col-md-6 col-sm-6">
                <div class="f-blk">
                    <div class="col-lg-6">
                        <?php
                         $image3 = get_field('img_point3');
                         $imageAlt = esc_attr($image3['alt']); 
                         $imageURL = esc_url($image3['url']); 
                         $imageThumbURL = esc_url($image1['sizes']['medium']); 
                    ?>
                <img src="<?php echo $imageThumbURL;?>">
            </div>
            <div class="col-lg-6">
                    <h3><?php echo get_field('title_point3'); ?></h3>
                    <p><?php echo get_field('content_point3'); ?></p>
                </div>
            </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="f-blk">
                <div class="col-lg-6">
                    <?php
                         $image4 = get_field('img_point4');
                         $imageAlt = esc_attr($image4['alt']); 
                         $imageURL = esc_url($image4['url']); 
                         $imageThumbURL = esc_url($image1['sizes']['medium']); 
                    ?>
                <img src="<?php echo $imageThumbURL;?>">
            </div>
            <div class="col-lg-6">
                    <h3><?php echo get_field('title_point4'); ?></h3>
                    <p><?php echo get_field('content_point4'); ?></p>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    
        <div class="content gray-bg" id="tab3">
        <div class="container">
        <div class="row">
            <div class="col-md-12">
        <div class="head-f">
            <?php if (qtrans_getLanguage()=='ja'){ ?>
                    <label class="green3">IT事業サポート</label>
                    <?php
                         $image1 = get_field('image_service3');
                         $imageAlt = esc_attr($image1['alt']); 
                         $imageURL = esc_url($image1['url']); 
                         $imageThumbURL = esc_url($image1['sizes']['medium']); 
                    ?>
                <div class="img-service"><img src="<?php echo $imageThumbURL;?>" class="img-responsive"></div>
                    <p class="des-service">弊社はベトナムでITオフショア開発を手がける 
                    <br>エボラブルアジアグループの一員です。 
                    <br>お客様のご要望、潜在的なニーズなどを加味した上で必要に応じて 
                    <br>オフショア開発、受託開発、BPO、Web製作など人材紹介以外の分野の 
                    <br>ご提案もさせていただきます。 
                    <br>また、実習生受け入れをお考えの企業様へ向けたご提案、 
                    <br>海外採用ツアーなどの企画も行っております。</p>
                <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                    <label class="green3">IT事業サポート</label>
                    <?php
                         $image1 = get_field('image_service3');
                         $imageAlt = esc_attr($image1['alt']); 
                         $imageURL = esc_url($image1['url']); 
                         $imageThumbURL = esc_url($image1['sizes']['medium']); 
                    ?>
                <div class="img-service"><img src="<?php echo $imageThumbURL;?>" class="img-responsive"></div>
                    <p class="des-service">弊社はベトナムでITオフショア開発を手がける 
                    <br>エボラブルアジアグループの一員です。 
                    <br>お客様のご要望、潜在的なニーズなどを加味した上で必要に応じて 
                    <br>オフショア開発、受託開発、BPO、Web製作など人材紹介以外の分野の 
                    <br>ご提案もさせていただきます。 
                    <br>また、実習生受け入れをお考えの企業様へ向けたご提案、 
                    <br>海外採用ツアーなどの企画も行っております。</p>
                <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                    <label class="green3">IT事業サポート</label>
                    <?php
                         $image1 = get_field('image_service3');
                         $imageAlt = esc_attr($image1['alt']); 
                         $imageURL = esc_url($image1['url']); 
                         $imageThumbURL = esc_url($image1['sizes']['medium']); 
                    ?>
                <div class="img-service"><img src="<?php echo $imageThumbURL;?>" class="img-responsive"></div>
                    <p class="des-service">弊社はベトナムでITオフショア開発を手がける 
                    <br>エボラブルアジアグループの一員です。 
                    <br>お客様のご要望、潜在的なニーズなどを加味した上で必要に応じて 
                    <br>オフショア開発、受託開発、BPO、Web製作など人材紹介以外の分野の 
                    <br>ご提案もさせていただきます。 
                    <br>また、実習生受け入れをお考えの企業様へ向けたご提案、 
                    <br>海外採用ツアーなどの企画も行っております。</p>
                <?php } ?>
            
        </div>
        
    
        </div>
        </div>
        
       <!--  <div class="row">
            <div class="col-md-12">
                <h2 class="title-h">
                <?php if (qtrans_getLanguage()=='ja'){ ?>
                    エージェントを選ぶポイント
                <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                    エージェントを選ぶポイント
                <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                    エージェントを選ぶポイント
                <?php } ?>
            </h2>
            </div>
        </div> -->
        <div class="row sv1">
            <div class="col-md-6 col-sm-6">
                <div class="f-blk">
                    <div class="col-lg-6">
                    <?php
                         $image5 = get_field('img_point5');
                         $imageAlt = esc_attr($image5['alt']); 
                         $imageURL = esc_url($image5['url']); 
                         $imageThumbURL = esc_url($image1['sizes']['medium']); 
                    ?>
                <img src="<?php echo $imageThumbURL;?>">
            </div>
            <div class="col-lg-6">
                    <h3><?php echo get_field('title_point5'); ?></h3>
                    <p><?php echo get_field('content_point5'); ?></p>
                </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="f-blk">
                    <div class="col-lg-6">
                    <?php
                         $image6 = get_field('img_point6');
                         $imageAlt = esc_attr($image6['alt']); 
                         $imageURL = esc_url($image6['url']); 
                         $imageThumbURL = esc_url($image1['sizes']['medium']); 
                    ?>
                <img src="<?php echo $imageThumbURL;?>">
            </div>
            <div class="col-lg-6">
                    <h3><?php echo get_field('title_point6'); ?></h3>
                    <p><?php echo get_field('content_point6'); ?></p>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    
    
    
    <div class="container">
    <div class="step-section ">
        <div class="row">
            <div class="col-md-12">
                <?php if (qtrans_getLanguage()=='ja'){ ?>
                    <div class="head-bg">ご相談・ご面談・候補者ご紹介など、ご入社が確定するまで無料で対応させて頂きます。</div>
                
                <ul class="step-list">
                    <li>
                        <div class="number-step">1</div>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/new/img/icon-step1.png" >
                        <label>お問い合わせ
                        / 打ち合わせ</label>
                    </li>
                    <li>
                        <div class="number-step">2</div>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/new/img/icon-step2.png" >
                        <label>候補者選定 / 紹介</label>
                    </li>
                    <li>
                        <div class="number-step">3</div>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/new/img/icon-step3.png" >
                        <label>面接 </label>
                    </li>
                    <li>
                        <div class="number-step">4</div>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/new/img/icon-step4.png" >
                        <label>内定</label>
                    </li>
                    <li>
                        <div class="number-step">5</div>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/new/img/icon-step5.png" >
                        <label>渡航準備 / 入社</label>
                    </li>
                </ul>
                
                <div class="sub-desc">
                    急募求人から通期採用の求人、「良い人がいれば採用したい」という<br>
                    求あらゆる採用ニーズに対応いたします。<br>
                    経験者の求人や難易度の高い求人、ニッチな求人まで<br>
                    いくらでも掛け捨てのリスクなく ご利用いただけます。
                </div>
            </div>
                <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                    <div class="head-bg">ご相談・ご面談・候補者ご紹介など、ご入社が確定するまで無料で対応させて頂きます。</div>
                
                <ul class="step-list">
                    <li>
                        <div class="number-step">1</div>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/new/img/icon-step1.png" >
                        <label>お問い合わせ
                        / 打ち合わせ</label>
                    </li>
                    <li>
                        <div class="number-step">2</div>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/new/img/icon-step2.png" >
                        <label>候補者選定 / 紹介</label>
                    </li>
                    <li>
                        <div class="number-step">3</div>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/new/img/icon-step3.png" >
                        <label>面接 </label>
                    </li>
                    <li>
                        <div class="number-step">4</div>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/new/img/icon-step4.png" >
                        <label>内定</label>
                    </li>
                    <li>
                        <div class="number-step">5</div>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/new/img/icon-step5.png" >
                        <label>渡航準備 / 入社</label>
                    </li>
                </ul>
                
                <div class="sub-desc">
                    急募求人から通期採用の求人、「良い人がいれば採用したい」という<br>
                    求あらゆる採用ニーズに対応いたします。<br>
                    経験者の求人や難易度の高い求人、ニッチな求人まで<br>
                    いくらでも掛け捨てのリスクなく ご利用いただけます。
                </div>
            </div>
                <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                    <div class="head-bg">ご相談・ご面談・候補者ご紹介など、ご入社が確定するまで無料で対応させて頂きます。</div>
                
                <ul class="step-list">
                    <li>
                        <div class="number-step">1</div>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/new/img/icon-step1.png" >
                        <label>お問い合わせ
                        / 打ち合わせ</label>
                    </li>
                    <li>
                        <div class="number-step">2</div>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/new/img/icon-step2.png" >
                        <label>候補者選定 / 紹介</label>
                    </li>
                    <li>
                        <div class="number-step">3</div>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/new/img/icon-step3.png" >
                        <label>面接 </label>
                    </li>
                    <li>
                        <div class="number-step">4</div>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/new/img/icon-step4.png" >
                        <label>内定</label>
                    </li>
                    <li>
                        <div class="number-step">5</div>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/new/img/icon-step5.png" >
                        <label>渡航準備 / 入社</label>
                    </li>
                </ul>
                
                <div class="sub-desc">
                    急募求人から通期採用の求人、「良い人がいれば採用したい」という<br>
                    求あらゆる採用ニーズに対応いたします。<br>
                    経験者の求人や難易度の高い求人、ニッチな求人まで<br>
                    いくらでも掛け捨てのリスクなく ご利用いただけます。
                </div>
            </div>
                <?php } ?>
                
            
        </div>
    </div>
        
  </div>
<?php get_footer();?>