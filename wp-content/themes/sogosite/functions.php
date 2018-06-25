<?php
// setup themes
if( !function_exists( 'home_setup' ) ) {
	function home_setup() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menus( array(
			'menu-header' => esc_html__( 'Primary', 'home' ),
			'menu-footer' => esc_html__( 'Secondary', 'home' ),
		) );		
	}
	add_action( 'after_setup_theme', 'home_setup' );
}
// end setup

// enqueue files
require get_template_directory().'/inc/enqueue.php';

// module banner
require get_template_directory().'/inc/banner/index.php';

// column
require get_template_directory() . '/inc/columns/index.php';

//register sidebar
	register_sidebar(array(
	    'name' => 'Block after content',
	    'id' => 'sidebar-1',
	    'description' => 'Khu vực sidebar hiển thị dưới mỗi bài viết',
	    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	    'after_widget' => '</aside>',
	    'before_title' => '<h1 class="widget-title">',
	    'after_title' => '</h1>'
	));


	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_theme_support( 'site-logo', '' );
	//custom logo
	function theme_custom_logo() {
		if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		}
	}
	add_filter('get_custom_logo','change_logo_class');
	 
	 
	function change_logo_class($html)
	{
		$html = str_replace('custom-logo-link', 'navbar-brand', $html);
		$html = str_replace('custom-logo', '', $html);
		return $html;
	}