<?php 
	include('admin/index.php');

	if(!function_exists('load_client_index')){

		function load_client_index(){
			global $post;
			$args = array(
				'post_type'         => 'client',
				'posts_per_page'    => -1,
				'orderby'           => 'date',
				'order'             => 'DESC'
			);
			$query = new WP_Query( $args );
			$htmlRender ="";
			if ( $query->have_posts() ) {
				$htmlRender .= '<div class="ourclient">';
				$htmlRender .= '<ul class="ourclient-list oS-fadeLand cf">';
				while ( $query->have_posts() ) : $query->the_post();
					$thumb_client_id = get_post_thumbnail_id($post->ID);
					$image_client_thumb = wp_get_attachment_image_src( $thumb_client_id, 'thumb-client-index' );
					$image_client_full = wp_get_attachment_image_src( $thumb_client_id, 'full' );

					$thumb_client = "";
					if($thumb_client_id != ""){
						$thumb_client = $image_client_thumb[0];
					} else {
						$thumb_client = get_template_directory_uri() ."/images/index/logo07.png";
					}
						$htmlRender .= '<li>';
							$htmlRender .= '<img src="'.$thumb_client.'" alt="'.get_the_title($post->ID).'" class="img-responsive">';
						$htmlRender .= '</li>';

				endwhile;
        		wp_reset_postdata();
        		$htmlRender .='</ul>';
				$htmlRender .='</div>';
			}
			return $htmlRender;
		}
		add_shortcode('load_client_index', 'load_client_index');
	}

?>