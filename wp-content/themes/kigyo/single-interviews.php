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
    <div class="breadcrumb-bg">
        <h2>Interview
        </h2>
        <div class="container">
        <div class="row">
            <div class="col-md-12">
       
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
            </div>
        </div>
    
  </div>
    <div class="interviews-details">
        <?php
        $taxonomies = array('interviews-company');
                    
                    $check_later = array();
                    global $wp_taxonomies;
                    foreach($taxonomies as $taxonomy){
                        if (isset($wp_taxonomies[$taxonomy])){
                            $check_later[$taxonomy] = false;
                        } else {
                            $wp_taxonomies[$taxonomy] = true;
                            $check_later[$taxonomy] = true;
                        }
                    }

                    $args       = array('hide_empty' => false);
                    $terms      = get_terms($taxonomies, $args );

                  $ter ='';
                    foreach ($terms as $key => $term) {
                        $ter = $term->name;
                    }

        $categories = get_the_terms( get_the_ID(), 'interviews-company' );
        //print_r($categories);
        ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="title-interviews"><?php echo the_title();?></h2>
                <ul class="categories-list">
                    <?php 
                        foreach(get_the_category() as $key => $category) { 
                            $category_link = get_category_link($category->cat_ID); ?>
                        <li>
                            <a class="<?php echo ($key%2) ? "blue" : "pink"; ?>" href="<?php echo str_replace("/en/top/","/top/en/",$category_link); ?>"><?php echo $category->name; ?></a>
                        </li>   
                    <?php   } ?>
                </ul>
                
                <img src="<?php echo get_the_post_thumbnail_url( null, 'medium' );?>" >
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                the_content();
                endwhile; else: ?>
                <p>Sorry, no posts matched your criteria.</p>
                <?php endif; ?>
                
            </div>

           <!--  <div class="col-md-3">
                <div class="categories-column">
                    <h2>Categories</h2>
                    <ul>
                        <?php
               $categories = get_the_terms( get_the_ID(), 'interviews-company' );
             
?>

                        
                       
                            <?php 
                        foreach($categories as $key => $category) { 
                            $category_link = get_category_link($category->term_id); ?>
                            
                            <li>
                                <a href="<?php echo $category_link; ?>"><?php echo $category->name; ?></a>
                    </li>
                            
                    <?php   } 
                    ?>
             

                        
                    <?php
                    wp_reset_postdata();
                
            ?>

                    </ul>
                </div>
            </div> -->
            
        </div>
    </div>  
        
        
  </div>
<?php get_footer();?>