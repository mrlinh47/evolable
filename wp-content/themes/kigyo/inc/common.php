<?php

// setup themes
if( !function_exists( 'kigyo_setup' ) ) {
	function kigyo_setup() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main Menu', 'kigyo' ),
			'second-menu' => esc_html__( 'Secondary', 'kigyo' ),
		));

		add_image_size( 'thumb-news-index', 375, 248, false );
        add_image_size( 'thumb-interview-index', 390, 472, true );
        add_image_size( 'thumb-interview-index-md', 357, 432, true );
		add_image_size( 'thumb-client-index', 120, 66, false );
	}
	add_action( 'after_setup_theme', 'kigyo_setup' );
}
// end setup

// shortcode
if( !function_exists( 'getUrl' ) ) {
	function getUrl() {
		return esc_url( home_url() );
	}
	add_shortcode( 'url', 'getUrl' );
}

if( !function_exists( 'getTemplateUrl' ) ) {
	function getTemplateUrl() {
		return get_template_directory_uri();
	}
	add_shortcode( 'template_url', 'getTemplateUrl' );
}
// end shortcode

if( !function_exists('kigyo_getMenu') ) {
	/**
	* The function to getting the menu depend on name of menu
	* @param array config
	* @return array menu
	**/
	function kigyo_getMenu($menu) {
		wp_nav_menu($menu);
	}
}

// remove br and p
function filter_content_wp() {
	global $post;
    if($post->post_type == "page"){
    	remove_filter('the_content', 'wpautop');
    }
}

add_action('wp','filter_content_wp');

// add custom icon menu admin
function font_admin_init() {
   wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'); 
}
function custom_post_css() {
   	echo "<style type='text/css' media='screen'>
       #adminmenu .menu-icon-news div.wp-menu-image:before{
            content:'\\f1ea' !important;
            font-family: fontawesome !important;
        }
        #adminmenu .menu-icon-interviews div.wp-menu-image:before{
            content:'\\f0c0' !important;
            font-family: fontawesome !important;
        }
        #adminmenu .menu-icon-client div.wp-menu-image:before{
            content:'\\f2bb' !important;
            font-family: fontawesome !important;
        }
    </style>";
}

add_action('admin_head', 'custom_post_css');
add_action('admin_init', 'font_admin_init');

// page navi
function kigyo_pagenavi($custom_query = null, $paged = null) {
    global $wp_query;
    if($custom_query) $main_query = $custom_query;
    else $main_query = $wp_query;
    $paged = ($paged) ? $paged : get_query_var('paged');
    $big = 999999999;
    $total = isset($main_query->max_num_pages)?$main_query->max_num_pages:'';
    if($total > 1) echo '<div class="pagination-info">';
    echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, $paged ),
        'total' => $total,
        'mid_size' => '2',
        'prev_text'    => __('&lt; Prev','kigyo'),
        'next_text'    => __('Next &gt;','kigyo'),
    ) );
    if($total > 1) echo '</div>';
}