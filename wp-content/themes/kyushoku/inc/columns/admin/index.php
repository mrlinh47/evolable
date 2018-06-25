<?php

	add_action('init', 'register_column_cpt');

	function register_column_cpt() {
		$labels = array(
	        "name" => "Column",
	        "singular_name" => "Column",
	    );

	    $args = array(
	        "labels" => $labels,
	        "description" => "",
	        "public" => true,
	        "show_ui" => true,
	        "has_archive" => true,
	        "show_in_menu" => true,
	        "exclude_from_search" => false,
	        "capability_type" => "post",
	        "map_meta_cap" => true,
	        "hierarchical" => false,
	        "rewrite" => array("slug" => "columns", "with_front" => true),
	        "query_var" => true,
	        "supports" => array("title", "editor","thumbnail"),
	        'taxonomies' => array('category'),
	    );
	    register_post_type("columns", $args);

		
	}

?>