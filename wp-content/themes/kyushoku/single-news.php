<?php
get_header(); ?>
<div id="news-detail">
    <!--- wr-breadcrumb-sub -->
    <div class="wr-breadcrumb-sub clearfix">
        <div class="container">
            <div class="row row-recrui">
                <div class="cont-breadcrumb-sub">
                    <div class="breadcrumb-sub"><h3>ニュース</h3></div>
                   
                    <!--- LANGUAGE-->
                    <div class="btn-group">
                      <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo do_shortcode('[get_name_lange_current]'); ?> <span class="caret"></span>
                      </button>
                      <?php echo do_shortcode('[choose_lang_dropdown]'); ?>
                    </div>
                </div>  
            </div>
        </div>
    </div>
    <!--- /wr-breadcrumb-sub -->
   
    <!--CONTENT-->
    <section class="container wr-recrui wr-news-detail">
 	<?php
		global $post;
		while ( have_posts() ) : the_post();
			$thumb_id = get_post_thumbnail_id($post->ID);
			$image_full = wp_get_attachment_image_src( $thumb_id, 'full' );
			$classThumb = ($thumb_id != "") ? "has-thumb":"";
	?>
        <div class="row row-recrui row-news-detail">
            <div class="breadcrumb-news-detail"><a href="<?php echo home_url("/"); ?>"><i class="fa fa-home"></i></a> <span class="sep"> / </span> <a href="<?php echo do_shortcode("[url]")."/" . __('[:ja]ニュース[:en]News[:vi]tin-tuc', 'kyushoku'); ?>"><?php echo __('[:ja]ニュース[:en]News[:vi]Tin Tức', 'kyushoku'); ?></a> <span class="sep"> / </span> <span><?php the_title() ?></span></div>
            <div class="wr-news-detail-content">
                <p class="date-news">(<?php the_date('Y.m.d', $post->ID ) ?>)</p>
                <h1><?php the_title() ?></h1>
                <?php if($thumb_id !=""){
                	?>
               	<div class="avt-news-detail">
	                <img src="<?php echo $image_full[0] ?>" alt="<?php the_title() ?>">
	            </div>
                	<?php
                } ?>
               
                <div class="box-content">
                	<?php the_content(); ?>
                </div>
            </div>
        </div>
<?php
		// the_content();
	endwhile;
?>
        <div class="container wr-recrui wr-list-news-other">
             <div class="row row-recrui">
                <div class="owl-carousel owl-theme row blog-news-list">
                    <?php echo do_shortcode("[load_news_page_single]") ?>
                </div>
            </div>
        </div>

    </section>
    <!--/CONTENT-->
</div>

<?php
get_footer();