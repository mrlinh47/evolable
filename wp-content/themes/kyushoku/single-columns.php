<?php 
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
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
            人事コラム
        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
            Column
        <?php }else if (qtrans_getLanguage()=='en'){ ?>
            Column
        <?php } ?>
    </h2>
    </div>



<div class="group-link">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul>
                <?php get_template_part( 'template-parts/navigation/navigation', 'grouplink' ); ?>
            </ul>
         </div>
    </div>
 </div>
</div>
    
    <div class="column-details">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2 class="title-column"><?php echo the_title();?></h2>
                <ul class="categories-list">
                    <?php 
                        foreach((get_the_category()) as $key => $category) { 
                            $category_link = get_category_link($category->cat_ID); ?>
                        <li>
                            <a class="<?php echo ($key%2) ? "blue" : "pink"; ?>" href="<?php echo str_replace("/en/top/","/top/en/",$category_link); ?>"><?php echo $category->cat_name; ?></a>
                        </li>   
                    <?php   } ?>
                </ul>
                <span class="date-column"><?php echo get_the_date('Y.m.d'); ?></span>
                <img src="<?php echo get_the_post_thumbnail_url( null, 'medium' );?>" >
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                the_content();
                endwhile; else: ?>
                <p>Sorry, no posts matched your criteria.</p>
                <?php endif; ?>
                
            </div>
            <div class="col-md-3">
                <div class="categories-column">
                    <h2>Categories</h2>
                    <ul>
                        <?php
                global $post;
             
                $posts = get_posts( array(
                    'post_type' => 'column',
                    'post_status'=>'publish',
                    'order' => 'DESC',
                ) );
             
?>

                        
                       
                            <?php 
                        foreach((get_the_category()) as $key => $category) { 
                            $category_link = get_category_link($category->term_id); ?>
                            
                            <li>
                                <a href="<?php echo $category_link; ?>"><?php echo $category->cat_name; ?></a>
                    </li>
                            
                    <?php   } 
                    ?>
             

                        
                    <?php
                    wp_reset_postdata();
                
            ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>  
        
        
  </div>
<?php get_footer();?>