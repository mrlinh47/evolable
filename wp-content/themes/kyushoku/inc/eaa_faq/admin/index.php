<?php
// create post_type, taxonomy, tag document
if(!function_exists('eaa_faq_init')){
	function eaa_faq_init() {
		// post_type
		$labels_post_type = array(
			'name' => __( 'FAQ', 'eaa' ),
			'add_new' => __( 'Add New', 'eaa' ),
			'add_new_item' => __( 'Add New FAQ', 'eaa' ),
			'edit_item' => __( 'Edit FAQ', 'eaa' ),
			'search_items' => __( 'Search FAQ', 'eaa' ),
			'not_found' => __( 'No document found.', 'eaa' ),
			'not_found_in_trash' => __( 'No FAQ found in Trash.', 'eaa' ),
			'all_items' => __( 'All FAQ', 'eaa' ),
			'attributes' => __( 'FAQ Attributes', 'eaa' ),
			'insert_into_item' => __( 'Insert into document', 'eaa' ),
			'uploaded_to_this_item' => __( 'Uploaded to this document', 'eaa' ),
			'filter_items_list' => __( 'Filter FAQ list', 'eaa' ),
			'items_list_navigation' => __( 'FAQ list navigation', 'eaa' ),
			'items_list' => __( 'FAQ list', 'eaa' )
		);

		$args_post_type = array(
			'labels' => $labels_post_type,
			'public' => true,
			'menu_position' => 8,
			'capability_type' => 'post',
			'publicly_queryable' => true,
			'query_var' => true,
			'exclude_from_search' => false,
			'has_archive' => true,
			'hierarchical' => false,
			'supports' => array(
				'title',
				'editor',
				'author'		
			)
		);

		register_post_type( 'eaa_faq', $args_post_type );
		// end post_type
	}
	add_action( 'init', 'eaa_faq_init' );
	// end
}

//add metabox
add_action('add_meta_boxes', 'eaa_fag_add_meta_box');
add_action('save_post', 'eaa_fag_author_save_meta_box');

//Add meta boxes for Skill
function eaa_fag_add_meta_box(){
	add_meta_box('eaa_fag_author', 'Author Question', 'eaa_fag_author_callback', 'eaa_faq', 'advanced');
}


//document file meta box
function eaa_fag_author_callback($post){

	wp_nonce_field( 'eaa_fag_author_save_meta_box', 'eaa_fag_author_meta_box_nonce');
	$value = get_post_meta($post->ID, '_eaa_fag_author_value', true);
	echo '<input type="text" id="eaa_fag_author_field" name="eaa_fag_author_field" value="'. esc_attr($value) .'" />';
	
}

function eaa_fag_author_save_meta_box($post_id){
	if(!isset($_POST['eaa_fag_author_meta_box_nonce'])){
		return;
	}

	if(!wp_verify_nonce($_POST['eaa_fag_author_meta_box_nonce'], 'eaa_fag_author_save_meta_box')){
		return;
	}

	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return;
	}

	if(!current_user_can('edit_post', $post_id)){
		return;
	}

	if(!isset($_POST['eaa_fag_author_field'])){
		return;
	}

	$mydata = sanitize_text_field($_POST['eaa_fag_author_field']);
	update_post_meta( $post_id, '_eaa_fag_author_value', $mydata);
}

if(!function_exists('convertSize') ){
	function convertSize($file){
		if(file_exists($file)){
			$bytes = filesize($file);
			$s = array('B', 'KB', 'MB', 'GB');
			$e = floor(log($bytes)/log(1024));
			return sprintf('%.2f '.$s[$e], ($bytes/pow(1024, floor($e))));
		}
		return 0;
	}
}
?>