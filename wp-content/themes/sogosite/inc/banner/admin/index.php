<?php
function banner_init() {
	// post_type
	$labels_post_type = array(
		'name' => __( 'Banners' ),
		'singular_name' => 'Banners'
	);

	$args_post_type = array(
		'labels' => $labels_post_type,
		'public' => true,
		'publicly_queryable' => false, // show/hide permalink add/edit post_type
		'capability_type' => 'post',
		'supports' => array(
			'title',
			'thumbnail'
		)
	);

	register_post_type( 'banner', $args_post_type );
	// end post_type
}
add_action( 'init', 'banner_init' );