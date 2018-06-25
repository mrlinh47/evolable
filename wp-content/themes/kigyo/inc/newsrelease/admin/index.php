<?php

	add_action('init', 'register_news_cpt');

	function register_news_cpt() {
		$labels = array(
	        "name" => "News",
	        "singular_name" => "News",
	    );

	    $args = array(
	        "labels" => $labels,
	        "description" => "",
	        "public" => true,
	        "show_ui" => true,
	        "has_archive" => false,
	        "show_in_menu" => true,
	        "exclude_from_search" => false,
	        "capability_type" => "post",
	        "map_meta_cap" => true,
	        "hierarchical" => false,
	        "rewrite" => array("slug" => "newsrelease", "with_front" => true),
	        "query_var" => true,
	        "supports" => array("title", "editor","thumbnail"),
	        'taxonomies' => array('category'),
	    );
	    register_post_type("newsrelease", $args);
	}

?>