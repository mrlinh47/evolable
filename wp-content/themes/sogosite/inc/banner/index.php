<?php
// backend
include 'admin/index.php';

// font-end
function get_banner() {
	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'banner',
		'post_status' => 'publish'
	);
	$data = get_posts( $args );

	return $data;
}