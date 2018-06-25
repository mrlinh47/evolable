<?php
// get data news
if( isset( $_GET['action'] ) && $_GET['action'] == 'news' ) {
	$args = array(
		'posts_per_page' => 4,
		'post_type' => 'news',
		'post_status' => 'publish'
	);
	$wp_query = new WP_Query( $args );

	$data = array();

	if( $wp_query->have_posts() ) :
		while( $wp_query->have_posts() ) :
			$wp_query->the_post();

			$data[] = array(
				'date' => get_the_date( 'Y.m.d' ),
				'title' => get_the_title()
			);
		endwhile;
		wp_reset_postdata();
	endif;

	// print_r($data); die();
	echo json_encode( $data );
}

// get data recruiment
if( isset( $_GET['action'] ) && $_GET['action'] == 'jobs' ) {
	$args = array(
		'posts_per_page' => 6,
		'post_type' => 'jobs',
		'post_status' => 'publish'
	);
	$wp_query = new WP_Query( $args );

	$data = array();

	if( $wp_query->have_posts() ) :
		while( $wp_query->have_posts() ) :
			$wp_query->the_post();

			$data[] = array(
				'link' => get_the_permalink(),
				'image' => get_field( 'default_image' ) ? get_field( 'default_image' ) : get_template_directory_uri().'/images/recruitment/img-4.png',
				'title' => get_the_title(),
				'location' => wp_get_post_terms( get_the_ID(), 'job-location', array( 'fields' => 'names' ) ),
				'salary' => get_field( 'salary' ),
				'skills' => wp_get_post_terms( get_the_ID(), 'job-skill', array( 'fields' => 'names' ) )
			);
		endwhile;
		wp_reset_postdata();
	endif;

	// print_r($data); die();
	echo json_encode( $data );
}