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
	        <div class="col-md-5 image-about">
	        <img src="<?php echo get_the_post_thumbnail_url( null, 'post-thumbnail' );?>" >
	    </div>
	    <div class="col-md-7">
	       <h2><?php the_title(); ?></h2>
	           <?php the_content();?>
	           
	    </div>
	    <?php
	    endforeach;
	    wp_reset_postdata();
	}
	?>   