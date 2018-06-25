<?php
if( !function_exists( 'home_scripts' ) ) {
	function home_scripts() {		
		// css
		wp_enqueue_style( 'home-style', get_stylesheet_uri() );
		wp_enqueue_style( 'home-animate-style', get_template_directory_uri().'/css/animate.css', array(), false, 'all' );
		wp_enqueue_style( 'home-index_styles-style', get_template_directory_uri().'/css/index_styles.css', array(), false, 'all' );
		wp_enqueue_style( 'home-myriad-style', get_template_directory_uri().'/css/myriad.css', array(), false, 'all' );
		wp_enqueue_style( 'home-style_home-style', get_template_directory_uri().'/css/style-home.css', array(), false, 'all' );
		/*wp_enqueue_style( 'home-owl_carousel-style', get_template_directory_uri().'/css/owl/owl.carousel.css', array(), false, 'all' );
		wp_enqueue_style( 'home-owl_theme_default-style', get_template_directory_uri().'/css/owl/owl.theme.default.css', array(), false, 'all' );*/
		wp_enqueue_style( 'home-responsive-style', get_template_directory_uri().'/css/responsive.css', array(), false, 'all' );
		wp_enqueue_style( 'home-fonts-style', 'https://fonts.googleapis.com/css?family=Roboto', array(), false, 'all' );

		// js
		wp_enqueue_script( 'combined', get_template_directory_uri().'/js/combined.js', array( 'jquery' ), false, true );
		/*wp_enqueue_script( 'main', get_template_directory_uri().'/js/main.js', array(), false, true );*/
		wp_enqueue_script( 'slimscroll', get_template_directory_uri().'/js/jquery.slimscroll.min.js', array(), false, true );
		wp_enqueue_script( 'recruit-detail', get_template_directory_uri().'/js/recrui-detail/script-recrui-detail.js', array(), false, true );
		/*wp_enqueue_script( 'recrui_detail-owl_carousel', get_template_directory_uri().'/js/recrui-detail/owl.carousel.min.js', array(), false, true );*/
		wp_enqueue_script( 'recruit-wow', get_template_directory_uri().'/js/recrui/wow.js', array(), false, true );
		wp_enqueue_script( 'recruit-wow_lib', get_template_directory_uri().'/js/recrui/wow-lib.js', array(), false, true );
		wp_enqueue_script( 'wow', get_template_directory_uri().'/js/wow.js', array(), false, true );
		wp_enqueue_script( 'wow_lib', get_template_directory_uri().'/js/wow-lib.js', array(), false, true );
	}
	add_action( 'wp_enqueue_scripts', 'home_scripts' );
}