<?php

include 'admin/index.php';

if( !function_exists( 'get_banner_index' ) ) {
	function get_banner_index() {
		$banner = '';

		$query_args = array(
			'posts_per_page'    => -1,
			'post_type'         => 'banner',			
			'post_status'		=> 'publish',
			'orderby'			=> 'menu_order',
			'order'				=> 'ASC'
		);		
		$wp_query = new WP_Query( $query_args );

		if( $wp_query->have_posts() ) :
			while( $wp_query->have_posts() ) : $wp_query->the_post();
				$link = get_post_meta( get_the_ID(), '_banner_link', true );
				$banner .= '<a href="'.$link.'" target="_blank">'.get_the_post_thumbnail( null, 'full', array( 'class' => 'img-responsive' ) ).'</a>';
			endwhile;
			wp_reset_postdata();			
		endif;

		return $banner;
	}
	add_shortcode( 'load_banner_index', 'get_banner_index' );
}

?>