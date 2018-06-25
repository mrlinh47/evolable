<?php
	include('admin/index.php');
	if(!function_exists('load_whyagent_index')){
		function load_whyagent_index(){
			global $post;
			$args = array(
				'post_type'         => 'eaa_whyagent',
				'posts_per_page'    => 3,
				'orderby'           => 'date', 
				'order'             => 'DESC'
			);
			
			$query = new WP_Query( $args );
			$htmlRender = "";
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) : $query->the_post();
					
					$thumb_id = get_post_thumbnail_id($post->ID);
					$image_thumb = wp_get_attachment_image_src( $thumb_id, 'thumb-whyagent-index' );
					$image_full = wp_get_attachment_image_src( $thumb_id, 'full' );

					$image_src = "";
					if($thumb_id != ""){
						$image_src = $image_thumb[0];
					}else{
						$image_src = get_template_directory_uri() ."/images/img_agent.png";
					}

					$htmlRender .= '<div class="why-agent-element">';
					    $htmlRender .= '<div class="inner">';
					        $htmlRender .= '<div class="why-agent-img">';
					        	// $htmlRender .= '<a href="'.get_the_permalink($post->ID).'">';
					            $htmlRender .= '<img src="'.$image_src.'" alt="'. get_the_title($post->ID) .'" class="why-img-responsive">';
				            	// $htmlRender .= '</a>';
					        $htmlRender .= '</div>';
					        $htmlRender .= '<div class="why-agent-content">';
					            $htmlRender .= '<p class="title-why-agent">';
					            	// if(trim(get_the_title($post->ID), " ") != ""){
					            		// if( $post->post_title_langs[qtrans_getLanguage()] ) {
					            			$htmlRender .= get_the_content($post->ID);
					            		// }					            		
					            	// }
					            $htmlRender .= '</p>';
					            /*$htmlRender .= '<p class="why-content-agent">';
					            	$htmlRender .= get_the_content($post->ID);
					            $htmlRender .= '</p>';*/
					        $htmlRender .= '</div>';
					    $htmlRender .= '</div>';
					$htmlRender .= '</div>';
				endwhile;
        		wp_reset_postdata();
			}

			return $htmlRender;
		}

		add_shortcode('load_why_agent_index', 'load_whyagent_index');
	}
?>
