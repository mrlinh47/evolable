<?php
if( !function_exists( 'kyushoku_scripts' ) ) {
	function kyushoku_scripts() {
		// css style
		wp_enqueue_style('kyushoku-style', get_stylesheet_uri());
		// wp_enqueue_style('kyushoku-styles-min', get_template_directory_uri() . '/css/styles.css', array(), '1.0', 'all');	

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		/**
		 * style and script for page/archive recruitment
		 **/
		if ( is_page('jobs') || is_archive('jobs') ) {
			wp_enqueue_style('kyushoku-recruitment-animate', get_template_directory_uri() . '/css/recrui/animate.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-recruitment-page', get_template_directory_uri() . '/css/recrui/recruitment.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-recruitment-responsive', get_template_directory_uri() . '/css/recrui/responsive.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-recruitment-myriad', get_template_directory_uri() . '/css/recrui/myriad.css', array(), '1.0', 'all');			
			wp_enqueue_script( 'kyushoku-recruitment-script-slimscroll', get_template_directory_uri() . '/js/recrui/jquery.slimscroll.min.js', array(), '', true );
			wp_enqueue_script( 'kyushoku-recruitment-script-wow', get_template_directory_uri() . '/js/recrui/wow.js', array(), '', true );
			wp_enqueue_script( 'kyushoku-recruitment-script-wow-sc', get_template_directory_uri() . '/js/recrui/wow-lib.js', array(), '', true );
			wp_enqueue_script( 'kyushoku-recruitment-script', get_template_directory_uri() . '/js/recrui/script-recrui.js', array(), '', true );
			wp_enqueue_script( 'kyushoku-recruitment-script-custom', get_template_directory_uri() . '/js/recrui/custom.js', array(), '', true );
			// register ajax processing for recruitment
			wp_localize_script( 'kyushoku-recruitment-script', 'ajax', array( 'ajaxRecruitment' => admin_url( 'admin-ajax.php' ) ) );
		}

		if ( is_page('jobs') || is_singular('jobs') ) {
			wp_enqueue_style('kyushoku-recruitment-animate', get_template_directory_uri() . '/css/recrui/animate.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-recruitment-page', get_template_directory_uri() . '/css/recrui/recruitment.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-recruitment-responsive', get_template_directory_uri() . '/css/recrui/responsive.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-recruitment-myriad', get_template_directory_uri() . '/css/recrui/myriad.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-recruitment-1', get_template_directory_uri() . '/css/recrui-detail/recruitment-detail.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-recruitment-2', get_template_directory_uri() . '/css/recrui-detail/recruitment-detail-responsive.css', array(), '1.0', 'all');

			wp_enqueue_style('kyushoku-recruitment-3', get_template_directory_uri() . '/css/recrui-detail/owl.carousel.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-recruitment-4', get_template_directory_uri() . '/css/recrui-detail/owl.theme.default.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-recruitment-5', get_template_directory_uri() . '/css/recrui-detail/detail-responsive.css', array(), '1.0', 'all');

			wp_enqueue_script( 'kyushoku-recruitment-script-wow', get_template_directory_uri() . '/js/recrui/wow.js', array(), '', true );
			wp_enqueue_script( 'kyushoku-recruitment-script-wow-sc', get_template_directory_uri() . '/js/recrui/wow-lib.js', array(), '', true );
			wp_enqueue_script( 'kyushoku-recruitment-script-owl-sc', get_template_directory_uri() . '/js/recrui-detail/owl.carousel.min.js', array(), '', true );
			wp_enqueue_script( 'kyushoku-recruitment-script', get_template_directory_uri() . '/js/recrui-detail/script-recrui-detail.js', array(), '', true );
		}

		if ( is_singular('jobs') ) {
			wp_enqueue_script( 'kyushoku-recruitment-script-slimscroll', get_template_directory_uri() . '/js/recrui/jquery.slimscroll.min.js', array(), '', true );
			// wp_enqueue_script( 'kyushoku-recruitment-script-wow-sc', get_template_directory_uri() . '/js/recrui-detail/owl.carousel.min.js', array(), '', true );
			wp_enqueue_script( 'kyushoku-recruitment-custom-detail', get_template_directory_uri() . '/js/recrui-detail/custom-detail.js', array(), '', true );
		}

		if(is_home() || is_page("top-page")){	
			//add pagination	
			wp_enqueue_style('kyushoku-recruitment-page', get_template_directory_uri() . '/css/recrui/recruitment.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-recruitment-responsive', get_template_directory_uri() . '/css/recrui/responsive.css', array(), '1.0', 'all');


			wp_enqueue_style('kyushoku-home-custom', get_template_directory_uri() . '/css/home.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-index-style', get_template_directory_uri() . '/css/index_styles.css', array(), '1.0', 'all');

			wp_enqueue_style('kyushoku-index-modal', get_template_directory_uri() . '/css/index_styles_modal.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-index-carousels', get_template_directory_uri() . '/css/carousels.slider.css', array(), '1.0', 'all');
			wp_enqueue_script( 'kyushoku-searchjob', get_template_directory_uri() . '/js/search-job.js', array(), '', true );
			wp_localize_script( 'kyushoku-searchjob', 'search_job', array(
				'ajax_url' => admin_url( 'admin-ajax.php' )
			));
			wp_enqueue_script( 'kyushoku-carousels', get_template_directory_uri() . '/js/jquery.carousels-slider.min.js', array(), '', true );
			wp_enqueue_script( 'kyushoku-slimscroll-index', get_template_directory_uri() . '/js/jquery.slimscroll.min.js', array(), '', true );
			wp_enqueue_script( 'kyushoku-js-index', get_template_directory_uri() . '/js/index.js', array(), '', true );



		}

		if(is_page("company")){
			wp_enqueue_style('kyushoku-interview', get_template_directory_uri() . '/assets/news-interviews/css/styles.min.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-interview', get_template_directory_uri() . '/assets/news-interviews/css/blog-news.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-recruitment-page', get_template_directory_uri() . '/css/recrui/recruitment.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-company', get_template_directory_uri() . '/css/company/company.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-recruitment-responsive', get_template_directory_uri() . '/css/recrui/responsive.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-index-style', get_template_directory_uri() . '/css/index_styles.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-style-other', get_template_directory_uri() . '/css/styles-other.css', array(), '1.0', 'all');			
		}

		if(is_page("interviews")){
			wp_enqueue_style('kyushoku-styles', get_template_directory_uri() . '/css/styles.min.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-recruitment-page', get_template_directory_uri() . '/css/recrui/recruitment.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-recruitment-responsive', get_template_directory_uri() . '/css/recrui/responsive.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-interviews', get_template_directory_uri() . '/css/interview.css', array(), '1.0', 'all');

			wp_enqueue_style('kyushoku-style-other', get_template_directory_uri() . '/css/styles-other.css', array(), '1.0', 'all');

			wp_enqueue_script( 'kyushoku-jquery-script', get_template_directory_uri() . '/js/jquery-3.2.1.min.js', array(), '', true );
			wp_enqueue_script( 'kyushoku-slimscroll', get_template_directory_uri() . '/js/jquery.slimscroll.min.js', array(), '', true );
			wp_enqueue_script( 'kyushoku-recruitment-script', get_template_directory_uri() . '/js/interviews.js', array(), '', true );
		}

		if(is_page("job-seeker")){
			wp_enqueue_style('kyushoku-interview', get_template_directory_uri() . '/assets/news-interviews/css/interview.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-bussiness-page', get_template_directory_uri() . '/css/business/style.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-recruitment-page', get_template_directory_uri() . '/css/recrui/recruitment.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-recruitment-responsive', get_template_directory_uri() . '/css/recrui/responsive.css', array(), '1.0', 'all');
		}

		if(is_page("news") || is_archive("news")){
			// wp_enqueue_style('kyushoku-news-interviews-styles', get_template_directory_uri() . '/assets/news-interviews/css/styles.min.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-news-interviews-blog-news', get_template_directory_uri() . '/assets/news-interviews/css/blog-news.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-recruitment-page', get_template_directory_uri() . '/css/recrui/recruitment.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-recruitment-responsive', get_template_directory_uri() . '/css/recrui/responsive.css', array(), '1.0', 'all');
		}

		if(is_singular("news")){
			wp_enqueue_style('kyushoku-news-detail', get_template_directory_uri() . '/assets/news-interviews/css/news-detail.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-blog-news-page', get_template_directory_uri() . '/assets/news-interviews/css/blog-news.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-recruitment-page', get_template_directory_uri() . '/css/recrui/recruitment.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-recruitment-responsive', get_template_directory_uri() . '/css/recrui/responsive.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-recruitment-3', get_template_directory_uri() . '/css/recrui-detail/owl.carousel.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-recruitment-4', get_template_directory_uri() . '/css/recrui-detail/owl.theme.default.css', array(), '1.0', 'all');

			wp_enqueue_script( 'kyushoku-recruitment-script-wow-sc', get_template_directory_uri() . '/js/recrui-detail/owl.carousel.min.js', array(), '', true );
			wp_enqueue_script( 'kyushoku-recruitment-script', get_template_directory_uri() . '/js/news-detail.js', array(), '', true );
		}

		if(is_singular("interviews")){
			wp_enqueue_style('kyushoku-interview', get_template_directory_uri() . '/assets/news-interviews/css/interview.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-bussiness-page', get_template_directory_uri() . '/css/business/style.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-recruitment-page', get_template_directory_uri() . '/css/recrui/recruitment.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-recruitment-responsive', get_template_directory_uri() . '/css/recrui/responsive.css', array(), '1.0', 'all');
		}

		if( is_page( 'job-apply' ) ) {
			wp_enqueue_style('kyushoku-job-apply', get_template_directory_uri() . '/css/apply_styles.min.css', array(), '1.0', 'all');
			wp_enqueue_style('kyushoku-job-apply-modal', get_template_directory_uri() . '/css/index_styles_modal.css', array(), '1.0', 'all');
			wp_enqueue_script( 'kyushoku-job-apply', get_template_directory_uri() . '/js/job-apply.js', array(), '', true );
			wp_localize_script( 'kyushoku-job-apply', 'ajax', array( 'url' => admin_url( 'admin-ajax.php' ) ) ); 
		}

		// css common		
		wp_enqueue_style('kyushoku-recruitment-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', array(), '1.0', 'all');
		wp_enqueue_style('kyushoku-style-other', get_template_directory_uri() . '/css/styles-other.css', array(), '1.0', 'all');

		// js common
		wp_enqueue_script( 'kyushoku-lib-bootstrap', get_template_directory_uri() . '/js/lib/combined.js', array(), '', true );
		/*wp_enqueue_script( 'kyushoku-script-mainjs', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true );*/


	}
}
add_action( 'wp_enqueue_scripts', 'kyushoku_scripts' );