<?php get_header();?>
    <div id="Breadcrumb" class="container-fluid">
        <div class="container">  
            <ul class="breadcrumb">
                <li><a href="#">HOME</a></li>
                <li><a href="#">News</a></li>
                <li><?php the_title() ?></li>
            </ul>
        </div>
    </div>

    <div id="News-detail-block" class="container-fluid section">
        <div class="container">
            <div class="row">
                <?php
                    global $post;
                    while ( have_posts() ) : the_post();
                        $thumb_id = get_post_thumbnail_id($post->ID);
                        $image_full = wp_get_attachment_image_src( $thumb_id, 'full' );
                        $classThumb = ($thumb_id != "") ? "has-thumb":"";
                ?>
                <div class="section-block">
                    <div class="col-md-10 col-md-offset-1 col-sm-offset-0">
                        <div class="news-detail">
                            <p class="news-detail__date">(<?php the_date('Y.m.d'); ?>)</p>
                            <h2 class="news-detail__ttl"><?php the_title() ?></h2>
                            <?php if($thumb_id !=""){ ?>
                            <p class="news-detail__img">
                                <img src="<?php echo $image_full[0] ?>" alt="<?php the_title() ?>" class="img-responsive">
                            </p>
                            <?php } ?>
                            <div class="box-news-content">
                                <?php the_content();?>
                            </div>
                        </div>
                    </div>
                </div><!-- /.section-block -->
                <?php endwhile; ?>
            </div>
        </div><!-- /.container -->
    </div>
    <!-- /.Profile-block /container-fluid -->
    <div id="News-block" class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="section-block">
                    <div class="row news-list">
                        <?php echo do_shortcode('[load_news_page_single]');?>
                    </div>
                    <!-- /.row .blog-news-list-->
                </div><!-- /.section-block -->
            </div>
        </div><!-- /.container -->
    </div>
    <!-- /.Profile-block /container-fluid -->

<?php get_footer(); ?>