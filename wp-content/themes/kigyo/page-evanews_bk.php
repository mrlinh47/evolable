<?php
/*
 * Author: NhanNV
 * Template Name: News
 *
 */
get_header();
global $post;
?>

	<div id="Blog-news-block" class="container-fluid section">
        <div class="container">
            <div class="row">
                <div class="section-block">
                    <div class="ttl-commom">
                        <h2>ブログ・ニュース</h2>
                    </div>
                    <?php
                        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
                        $args = array(
                            'post_type'         => 'news',
                            'posts_per_page'    => 9,
                            'orderby'           => 'date',
                            'order'             => 'DESC',
                            'depth'          => 1,
                            'post_status'    => 'publish',
                            'paged'          => $paged
                        );

                        $wp_query = new WP_Query( $args );
                    ?>
                    <?php if ( $wp_query->have_posts() ) : ?>
                    <div class="row blog-news-list">
                    	<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                        <div class="col-md-4 col-sm-4 blog-news-list__item">
                            <div class="item-info">
                                <a href="<?php the_permalink();?>">
                                    <?php
                                        if ( has_post_thumbnail( $post->ID ) ) {
                                            the_post_thumbnail("thumb-news-index");
                                        }
                                        else {
                                            echo '<img src="' . get_template_directory_uri() .'/images/branch_3.jpg" />';
                                        }
                                    ?>
                                    <span class="item-info__des">
                                        <span class="item-info__date"><?php echo get_the_date('Y.m.d', $post->ID); ?></span>
                                        <span class="item-info__title"><?php the_title();?></span>
                                    </span>
                                </a>
                            </div><!-- /.item-info -->
                        </div><!-- /.blog-news-list__item -->
                    	<?php endwhile; ?>
                    </div>
                    <!-- /.row .blog-news-list-->
                    <div class="pagination">
                        <?php if (function_exists('kigyo_pagenavi')) kigyo_pagenavi($wp_query); ?>
                    </div>
                    <?php wp_reset_postdata(); endif; ?>
                </div><!-- /.section-block -->
            </div>
        </div><!-- /.container -->
    </div>
    <!-- /.Profile-block /container-fluid -->

<?php
get_footer(); ?>