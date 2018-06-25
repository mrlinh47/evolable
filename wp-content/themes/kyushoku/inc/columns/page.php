<?php
	if(!function_exists('load_column_page_single')){
		function load_column_page_single(){
			global $post;
			$args = array(
				'post_type'         => 'columns',
				'posts_per_page'    => 6,
				'orderby'           => 'date', 
				'order'             => 'DESC'
			);
			
			$query = new WP_Query( $args );
			$htmlRender = "";
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) : $query->the_post();
					
					$thumb_id = get_post_thumbnail_id($post->ID);
					$image_thumb = wp_get_attachment_image_src( $thumb_id, 'thumb-column-index' );
					$image_full = wp_get_attachment_image_src( $thumb_id, 'full' );

					$image_src = "";
					if($thumb_id != ""){
						$image_src = $image_thumb[0];
					}else{
						$image_src = get_template_directory_uri() ."/images/branch_3.jpg";
					}

					$htmlRender .= '<div class="col-md-4 col-sm-4 column-list__item">';
					    $htmlRender .= '<div class="item-info elm-icon">';
					        $htmlRender .= '<a href="'. get_the_permalink($post->ID) .'">';
					            $htmlRender .= '<img class="img-responsive" src="'.$image_src.'" alt="'. get_the_title($post->ID) .'">';
					            $htmlRender .= '<span class="item-info__des">';
					                $htmlRender .= '<span class="item-info__date">'. get_the_date('Y.m.d', $post->ID ) .'</span>';
					                $htmlRender .= '<span class="item-info__title">'. get_the_title($post->ID) .'</span>';
					            $htmlRender .= '</span>';
					        $htmlRender .= '</a>';
					    $htmlRender .= '</div>';
					$htmlRender .= '</div>';
				endwhile;
        		wp_reset_postdata();
			}

			return $htmlRender;
		}

		add_shortcode('load_column_page_single', 'load_column_page_single');
	}
?>