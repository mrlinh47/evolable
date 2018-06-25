
<?php 
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 * Template Name: Company-newsrelease
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */


get_header();
get_sidebar();
?>
<div class="right-content">
    <div class="breadcrumb-bg search-column">
        <h2><?php if (qtrans_getLanguage()=='ja'){ ?>
                ニュースリリース
            <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                Tin tức mới
            <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                News Release
            <?php } ?></h2>
        <div class="container">
        <div class="row">
            <div class="col-md-12">
        <div class="bc-desc"><?php echo get_field('desc'); ?></div>
        </div>
        </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
           <?php echo do_shortcode( '[ajax_pagination post_type="newsrelease" posts_per_page="15" paged="1"]' ); ?>
        
            </div>
        </div>
        
        
        
  </div>
<?php get_footer();?>