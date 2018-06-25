<?php
if( !function_exists( 'kigyo_scripts' ) ) {
	function kigyo_scripts() {
		// css style
		wp_enqueue_style('kigyo-style', get_stylesheet_uri());

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		/**
		 * style and script for page
		 **/

		wp_enqueue_style('kigyo-recruitment-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', array(), '1.0', 'all');
		wp_enqueue_style('kigyo-style-min', get_template_directory_uri() . '/css/styles.min.css', array(), '1.0', 'all');
		wp_enqueue_style('kigyo-style-animate', get_template_directory_uri() . '/css/animation.min.css', array(), '1.0', 'all');

		wp_enqueue_script( 'kigyo-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'kigyo-onscreen-custom', get_template_directory_uri() . '/js/jquery.onscreen.custom.min.js', array(), '', true );

		if(is_home() || is_front_page()){
			wp_enqueue_style('kigyo-home-custom', get_template_directory_uri() . '/css/index.css', array(), '1.0', 'all');
			wp_enqueue_style('kigyo-slick-css', get_template_directory_uri() . '/css/slick.css', array(), '1.0', 'all');
			wp_enqueue_style('kigyo-slick-theme', get_template_directory_uri() . '/css/slick-theme.css', array(), '1.0', 'all');

			wp_enqueue_script( 'kigyo-slick-js', get_template_directory_uri() . '/js/slick.js', array(), '', true );
			wp_enqueue_script( 'kigyo-script-customjs', get_template_directory_uri() . '/js/home/custom.js', array(), '', true );

		}

		if (is_page('service') ){
			wp_enqueue_style('kigyo-service-css', get_template_directory_uri() . '/css/service.css', array(), '1.0', 'all');
		}

		if (is_page('company') ){
			wp_enqueue_style('kigyo-company-css', get_template_directory_uri() . '/css/company.css', array(), '1.0', 'all');
			wp_enqueue_script( 'kigyo-company-map', get_template_directory_uri() . '/js/map.js', array(), '', true );
			wp_enqueue_script( 'kigyo-company-map-lib', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCB7WuiQYTMDnnpmkmfhGWU4eYULyFkRow&callback=initMap', array(), '', true );
		}

		if (is_page('evanews') ){
			wp_enqueue_style('kigyo-news-css', get_template_directory_uri() . '/css/news.css', array(), '1.0', 'all');
		}

		if (is_page('interviews') ){
			wp_enqueue_style('kigyo-interviews-css', get_template_directory_uri() . '/css/interviews.css', array(), '1.0', 'all');
			wp_enqueue_style('kigyo-slick-css', get_template_directory_uri() . '/css/slick.css', array(), '1.0', 'all');
			wp_enqueue_style('kigyo-slick-theme', get_template_directory_uri() . '/css/slick-theme.css', array(), '1.0', 'all');

			wp_enqueue_script( 'kigyo-interviews-js', get_template_directory_uri() . '/js/jquery.slimscroll.min.js', array(), '', true );
			wp_enqueue_script( 'kigyo-interviews-customjs', get_template_directory_uri() . '/js/interviews/custom.js', array(), '', true );
		}

		if (is_singular('news') ){
			wp_enqueue_style('kigyo-news-detail-css', get_template_directory_uri() . '/css/news_detail.css', array(), '1.0', 'all');
			wp_enqueue_style('kigyo-slick-css', get_template_directory_uri() . '/css/slick.css', array(), '1.0', 'all');
			wp_enqueue_style('kigyo-slick-theme', get_template_directory_uri() . '/css/slick-theme.css', array(), '1.0', 'all');

			wp_enqueue_script( 'kigyo-slick-js', get_template_directory_uri() . '/js/slick.js', array(), '', true );
			wp_enqueue_script( 'kigyo-script-news-detail', get_template_directory_uri() . '/js/news-detail/custom.js', array(), '', true );
		}

		wp_enqueue_script( 'kigyo-script-mainjs', get_template_directory_uri() . '/js/main.js', array(), '', true );



	}
}
add_action( 'wp_enqueue_scripts', 'kigyo_scripts' );