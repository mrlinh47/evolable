<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage eaa
 * @since 1.0
 * @version 1.0
 */



?>
<div class="left-menu">
<div class="left-menu-scroll">
<div class="left-menu-content">
  <div id="navwrap">
      <nav class="transparent-white navbar navbar-transparent" role="navigation">
            <div class="navbar-header page-scroll">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
               <i class="fa fa-bars"></i>
               </button>
               <?php switch_to_blog(1); theme_custom_logo(); restore_current_blog(); ?>
            </div>
          <?php  
             if (function_exists('qtrans_generateLanguageSelectCode')) {
                //print_r(qtrans_generateLanguageSelectCode('hreflang'));
                  echo qtrans_generateLanguageSelectCode('short');
              }
            ?>
            <div class="collapse navbar-collapse navbar-main-collapse">
              <?php get_template_part( 'template-parts/navigation/navigation', 'leftmenu' ); ?>
               
            </div>

        <?php
                  switch_to_blog(3); ?> 
                  <a href="<?php echo get_site_url(); ?>" class="employ-btn"><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-building.png" >
                   <?php if (qtrans_getLanguage()=='ja'){ ?>
                      採用企業の皆さまへ
                  <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                      Nhà tuyển dụng
                  <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                      For employers
                  <?php } ?>
                </a>
                  <?php restore_current_blog();
                ?>
      </nav>
   </div>
        <div class="banner">
          <a href="http://asenavi.com/archives/9603" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/new/img/banner1.jpg" ></a>
          <a href="http://asenavi.com/archives/7005" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/new/img/banner2.jpg" ></a>
          <a href="http://asenavi.com" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/new/img/banner3.jpg" ></a>
        </div>               
   
  </div>                
</div>
</div>
