<?php 

	add_action('init', 'register_client_cpt');

	function register_client_cpt() {
		$labels = array(
	        "name" => "Our Client",
	        "singular_name" => "Our Client",
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
	        "rewrite" => array("slug" => "client", "with_front" => true),
	        "query_var" => true,
	        "supports" => array("title","thumbnail"),
	    );
	    register_post_type("client", $args);
	}

?>