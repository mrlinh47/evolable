<?php
// create post_type, taxonomy, tag document
if(!function_exists('eaa_whyagent_init')){
	function eaa_whyagent_init() {
		// post_type
		$labels_post_type = array(
			'name' => __( 'Why Agent?', 'eaa' ),
			'add_new' => __( 'Add New', 'eaa' ),
			'add_new_item' => __( 'Add New Why Agent?', 'eaa' ),
			'edit_item' => __( 'Edit Why Agent?', 'eaa' ),
			'search_items' => __( 'Search Why Agent?', 'eaa' ),
			'not_found' => __( 'No document found.', 'eaa' ),
			'not_found_in_trash' => __( 'No Why Agent? found in Trash.', 'eaa' ),
			'all_items' => __( 'All Why Agent?', 'eaa' ),
			'attributes' => __( 'Why Agent? Attributes', 'eaa' ),
			'insert_into_item' => __( 'Insert into document', 'eaa' ),
			'uploaded_to_this_item' => __( 'Uploaded to this document', 'eaa' ),
			'filter_items_list' => __( 'Filter Why Agent? list', 'eaa' ),
			'items_list_navigation' => __( 'Why Agent? list navigation', 'eaa' ),
			'items_list' => __( 'Why Agent? list', 'eaa' )
		);

		$args_post_type = array(
			'labels' => $labels_post_type,
			'public' => true,
			'menu_position' => 11,
			'capability_type' => 'post',
			'publicly_queryable' => true,
			'query_var' => true,
			'exclude_from_search' => false,
			'has_archive' => true,
			'hierarchical' => false,
			"rewrite" => array("slug" => "whyagent", "with_front" => false),
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'author'		
			)
		);

		register_post_type( 'eaa_whyagent', $args_post_type );
		// end post_type
	}
	add_action( 'init', 'eaa_whyagent_init' );
	// end
}