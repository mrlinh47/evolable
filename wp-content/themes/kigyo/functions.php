<?php 

	// setup kigy0 themes
	require get_template_directory() . '/inc/common.php';

	// enqueue files
	require get_template_directory() . '/inc/enqueue.php';

	// newsrelease
	require get_template_directory() . '/inc/newsrelease/index.php';

	// interviews
	require get_template_directory() . '/inc/interviews/index.php';

	// our client
	require get_template_directory() . '/inc/client/index.php';

	// column
	require get_template_directory() . '/inc/columns/index.php';

	//pagination
	require get_template_directory() . '/AjaxPagination/ajax_pagination_wp.php';


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
	
//register menu top
	function register_top_menu() {
	    register_nav_menu('topmenu',__( 'Menu top' ));
	}
	add_action( 'init', 'register_top_menu' );


	class Menu_Nav_Walker extends Walker_Nav_Menu {
 
 /**
 * Phương thức start_lvl()
 * Được sử dụng để hiển thị các thẻ bắt đầu cấu trúc của một cấp độ mới trong menu. (ví dụ: <ul class="sub-menu">)
 * @param string $output | Sử dụng để thêm nội dung vào những gì hiển thị ra bên ngoài
 * @param interger $depth | Cấp độ hiện tại của menu. Cấp độ 0 là lớn nhất.
 * @param array $args | Các tham số trong hàm wp_nav_menu()
 **/
 public function start_lvl( &$output, $depth = 0, $args = array() )
 {
 	$indent = str_repeat("\t", $depth);
  //$output .= "<span class=\"sub-intro\">Menu con</span>";
  $output .= "\n$indent<ul class=\"sub-nav\">\n";
 }
 
 /**
 * Phương thức end_lvl()
 * Được sử dụng để hiển thị đoạn kết thúc của một cấp độ mới trong menu. (ví dụ: </ul> )
 * @param string $output | Sử dụng để thêm nội dung vào những gì hiển thị ra bên ngoài
 * @param interger $depth | Cấp độ hiện tại của menu. Cấp độ 0 là lớn nhất.
 * @param array $args | Các tham số trong hàm wp_nav_menu()
 **/
 public function end_lvl( &$output, $depth = 0, $args = array() )
 {
 	$indent = str_repeat("\t", $depth);
  $output .= "$indent</ul>\n";
 }
 
 /**
 * Phương thức start_el()
 * Được sử dụng để hiển thị đoạn bắt đầu của một phần tử trong menu. (ví dụ: <li id="menu-item-5"> )
 * @param string $output | Sử dụng để thêm nội dung vào những gì hiển thị ra bên ngoài
 * @param string $item | Dữ liệu của các phần tử trong menu
 * @param interger $depth | Cấp độ hiện tại của menu. Cấp độ 0 là lớn nhất.
 * @param array $args | Các tham số trong hàm wp_nav_menu()
 * @param interger $id | ID của phần tử hiện tại
 **/
 function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$has_children = get_posts(array('post_type' => 'nav_menu_item', 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID)); /* Does the current item have any children? */

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';
		$class_names = $has_children ? rtrim($class_names, '"').' nav-parrent"' : $class_names; /* If there are children, add the has-flyout class to the class= */

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$prepend = '<strong>';
		$append = '</strong>';
		$description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

		if($depth != 0)
		{
		         $description = $append = $prepend = "";
		}

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= $description.$args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
 
 /**
 * Phương thức end_el()
 * Được sử dụng để hiển thị đoạn kết thúc của một phần tử trong menu. (ví dụ: </li> )
 * @param string $output | Sử dụng để thêm nội dung vào những gì hiển thị ra bên ngoài
 * @param string $item | Dữ liệu của các phần tử trong menu
 * @param interger $depth | Cấp độ hiện tại của menu. Cấp độ 0 là lớn nhất.
 * @param array $args | Các tham số trong hàm wp_nav_menu()
 * @param interger $id | ID của phần tử hiện tại
 **/
 public function end_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
 {
 	$output .= "</li>\n";
 }
} 


add_filter('nav_menu_css_class', 'add_active_class', 10, 2 );

function add_active_class($classes, $item) {
  if( $item->menu_item_parent == 0 && in_array('current-menu-item', $classes) ) {
    $classes[] = "active";
  }

  return $classes;
}
