<?php
// post type
include( 'jobs/cpt_register.php' );
// end

// setup themes
if( !function_exists( 'kyushoku_setup' ) ) {
	function kyushoku_setup() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'default_image_job', 275, 134, true );

		register_nav_menus( array(
			'menu-header' => esc_html__( 'Primary', 'kyushoku' ),
			'menu-footer' => esc_html__( 'Secondary', 'kyushoku' ),
		) );

		add_image_size( 'thumb-recruit-index', 144, 72, true );
        add_image_size( 'thumb-recruit-index-sp', 500, 237, true );
		add_image_size( 'thumb-whyagent-index', 384, 192, false );
		add_image_size( 'thumb-news-index', 334, 93, false );
		add_image_size( 'thumb-interview1-index', 390, 420, false );
		add_image_size( 'thumb-interview2-index', 185, 187, false );
		add_image_size( 'thumb-interview-page', 357, 432, false );
		add_image_size( 'thumb-interview-company-page', 357, 432, true );
	}
	add_action( 'after_setup_theme', 'kyushoku_setup' );
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

// get Choose shortcode
if( !function_exists( 'getChooseLanguageEAA' ) ) {
	function getChooseLanguageEAA() {
		if(function_exists('qtranxf_generateLanguageSelectCode')){
			ob_start();
			// echo '<ul class="dropdown-menu dropdown-menu-pc">';
            qtranxf_generateLanguageSelectCode(array(
                'format' => 'custom',
                'id' => 'qtranslate-language-index',
                'class' => 'dropdown-menu'
            ));
            // echo '</ul>';
            $content = ob_get_clean();
            return $content;
        }
	}
	add_shortcode( 'choose_lang_dropdown', 'getChooseLanguageEAA' );
}
// end shortcode

// get Choose shortcode
if( !function_exists( 'getNameLanguageEAA' ) ) {
	function getNameLanguageEAA() {
		if(function_exists('qtranxf_getLanguageName')){
            return qtranxf_getLanguageName();
        }
	}
	add_shortcode( 'get_name_lange_current', 'getNameLanguageEAA' );
}
// end shortcode

if( !function_exists('kyushoku_getMenu') ) {
	/**
	* The function to getting the menu depend on name of menu
	* @param array config
	* @return array menu
	**/
	function kyushoku_getMenu($menu) {
		wp_nav_menu($menu);
	}
}

//Filter image source and change link if use source start "images/"
function kumano_the_content_filter( $content ) {
	preg_match_all('/<img[^>]+>/i',$content, $results);
	// var_dump($results);
	foreach($results[0] as $key => $result){

		preg_match_all('/src="([^"]+)/i', $result, $imgage);
		if(isset($imgage[1][0])){

			if(!empty($imgage[1][0])){

				$get_src = explode("/", trim($imgage[1][0], "/"));
				if(isset($get_src[0])){
					if($get_src[0] == "images"){
						$new_url = 'src="' . get_template_directory_uri() . "/" .trim($imgage[1][0], "/") . '';
						$content = str_replace($imgage[0][0], $new_url, $content);
					}
				}
			}

		}

	}

    return $content;
}
add_filter( 'the_content', 'kumano_the_content_filter');


//Hide visual editor if screen page admin
function wpse_58501_page_can_richedit( $can ) {
    global $post;
    if($post->post_type == "page")
        return false;

    return $can;
}
add_filter( 'user_can_richedit', 'wpse_58501_page_can_richedit' );

// sắp xếp lại menu
function arrange_menu () {
    global $menu;
    unset( $menu[5] );
}
add_action( 'admin_menu', 'arrange_menu' );

function landingpage_remove_plugin_filters() {
	global $post;
	if($post != null){
		if($post->post_type == "page"){
			remove_filter('the_content', 'wpautop');
		}
	}
}
add_action('wp','landingpage_remove_plugin_filters');

if ( !function_exists('kyushoku_custom_navClassActive') ) {
	/**
	 * Function custom class active for Menu
	 **/
	function kyushoku_custom_navClassActive ($classes, $item) {
		$current_post_type = get_post_type_object(get_post_type(get_the_ID()));
		$current_post_type_slug = $current_post_type->rewrite["slug"];
		$menu_slug = strtolower(trim($item->url));
		if (strpos($menu_slug,$current_post_type_slug) !== false || in_array('current-menu-item', $classes) ) {
			$classes[] = 'active';

		}
		return $classes;

		// if (in_array('current-menu-item', $classes) ){
		// 	$classes[] = 'active ';
		// }
		// return $classes;
	}
	add_filter('nav_menu_css_class' , 'kyushoku_custom_navClassActive' , 10 , 2);
}

// page navi
function agent_pagenavi($custom_query = null, $paged = null) {
    global $wp_query;
    if($custom_query) $main_query = $custom_query;
    else $main_query = $wp_query;
    $paged = ($paged) ? $paged : get_query_var('paged');
    $big = 999999999;
    $total = isset($main_query->max_num_pages)?$main_query->max_num_pages:'';
    if($total > 1) echo '<div class=" pagination-circle">';
    echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, $paged ),
        'total' => $total,
        'mid_size' => '2',
        /*'prev_text'    => __('<img src="'.get_template_directory_uri().'/images/recruitment/icon-prev.png" alt=""/>','agent'),
        'next_text'    => __('<img src="'.get_template_directory_uri().'/images/recruitment/icon-next.png" alt=""/>','agent'),*/
        'prev_text'    => '',
        'next_text'    => ''
    ) );
    if($total > 1) echo '</div>';
}

// Breadcrumbs
function breadcrumbs() {
    $separator          = '/';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = '<i class="fa fa-home"></i>';
    $custom_taxonomy    = 'product_cat';

    global $post,$wp_query;

    if ( !is_front_page() ) {
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';

        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
            $post_type = get_post_type();
            if($post_type != 'post') {
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
            }
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
        } else if ( is_single() ) {
            $post_type = get_post_type();
            if($post_type != 'post') {
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
            }
            $category = get_the_category();
            if(!empty($category)) {
                $last_category = end(array_values($category));
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }
            }
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
            }
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
            } else if(!empty($cat_id)) {
                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
            } else {
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
            }
        } else if ( is_category() ) {
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
        } else if ( is_page() ) {
            if( $post->post_parent ){
                $anc = get_post_ancestors( $post->ID );
                $anc = array_reverse($anc);
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
                echo $parents;
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
            } else {
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
            }
        } else if ( is_tag() ) {
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
        } elseif ( is_day() ) {
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
        } else if ( is_month() ) {
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
        } else if ( is_year() ) {
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
        } else if ( is_author() ) {
            global $author;
            $userdata = get_userdata( $author );
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
        } else if ( get_query_var('paged') ) {
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
        } else if ( is_search() ) {
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
        } elseif ( is_404() ) {
            echo '<li>' . 'Error 404' . '</li>';
        }
        echo '</ul>';
    }
}
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

/** filter post title **/
function title_filter( $where, &$wp_query )
{
    global $wpdb;
    $search_keyword = $wp_query->get( 'search_prod_title_keyword');
    $search_term = $wp_query->get( 'search_prod_title');
    if ($search_term!='' && $search_keyword!='' ) {
    	if(function_exists('qtranxf_getLanguage')){
    		$where .= ' AND ' . $wpdb->posts . '.post_title LIKE "%'.$search_term.'%" AND ' . $wpdb->posts . '.post_title LIKE "%'.$search_keyword  . '%"';

    	}
    }else{
        if(function_exists('qtranxf_getLanguage')){
                $where .= ' AND ' . $wpdb->posts . '.post_title LIKE "%'.$search_term.'%"';
        }
    }
    return $where;
}

?>
