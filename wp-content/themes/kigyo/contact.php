<?php 
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 * Template Name: Contact
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
                お問い合わせ
            <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                Liên hệ
            <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                CONTACT FORM
            <?php } ?>
        </h2>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="btn-section btn-3">
                    <li>
                         <?php switch_to_blog(2); ?> 
                         <a class="current" href="<?php echo get_site_url().'/'.qtranxf_getLanguage(); ?>">
                    <?php if (qtrans_getLanguage()=='ja'){ ?>
                求人情報
            <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                Công việc
            <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                Search job
            <?php } ?>
         </a>
         <?php restore_current_blog(); ?></li>
                    <li><a href="<?php echo get_site_url();?>/column""><?php if (qtrans_getLanguage()=='ja'){ ?>
                コラム
            <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                Column
            <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                Column
            <?php } ?></a></li>
                    <li><a href="<?php echo get_site_url();?>/interviews">INTERVIEW</a></li>
                    
                </ul>
            </div>
        </div>
    
        
        
    </div>  
   
   <div class="form-content gray-bg">
        <div class="container">
        <?php echo do_shortcode('[contact-form-7 id="597" title="Contact-form"]'); ?>
        
        </div>
   </div>
    <?php get_footer();?>
