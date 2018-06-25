<?php
// setup, ... themes
require get_template_directory() . '/inc/common.php';

// enqueue files
require get_template_directory() . '/inc/enqueue.php';
// faq
require get_template_directory() . '/inc/eaa_faq/index.php';
// why agent
require get_template_directory() . '/inc/why_agent/index.php';
// interviews
require get_template_directory() . '/inc/interviews/index.php';

// index
require get_template_directory() . '/inc/index/index.php';
// news
require get_template_directory() . '/inc/news/index.php';

// job-apply
require get_template_directory() . '/inc/job-apply.php';

// search-job
require get_template_directory() . '/inc/index/search-job.php';

// banner
require get_template_directory() . '/inc/banner/index.php';

// column
	require get_template_directory() . '/inc/columns/index.php';

//pagination
require get_template_directory() . '/AjaxPagination/ajax_pagination_wp.php';
	
/***Add colum for page recruitment****/
/*add_filter('manage_posts_columns', 'recruitment_columns');
function recruitment_columns($columns) {
	if (is_admin()) {
		$postType = $_GET['post_type'];
		switch ($postType) {
			case 'jobs':
				$columns['codeWork'] = '求人No';
				break;
			default:
				break;
		}
		return $columns;
	}
}
add_action('manage_posts_custom_column', 'recruitment_show_columns');
function recruitment_show_columns($name) {
	global $post;
	switch($name){
		case 'codeWork':
		$feat = get_field('job_no',$post->ID);
		echo '<strong>'.$feat.'</strong>';
	}
}
add_action('admin_head', 'recruitment_admin_custom_styles');
function recruitment_admin_custom_styles() {
    $output_css = '<style type="text/css">
       #codeWork { width:10%;}
    </style>';
    echo $output_css;
}*/
@ini_set( 'upload_max_size' , '200M' ); 
@ini_set( 'post_max_size', '200M');
@ini_set( 'max_execution_time', '300' );
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

	