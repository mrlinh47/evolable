<?php
	include('admin/index.php');
	if(!function_exists('load_faq_index')){
		function load_faq_index(){
			global $post;
			$args = array(
				'post_type'         => 'eaa_faq',
				'posts_per_page'    => 3,
				'orderby'           => 'date', 
				'order'             => 'DESC'
			);
			
			$query = new WP_Query( $args );
			$htmlRender = "";
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) : $query->the_post();
					$valueAuthor = get_post_meta($post->ID, '_eaa_fag_author_value', true);
					$htmlRender .= '<div class="quest-element">';
					    $htmlRender .= '<div class="quest-blo">';
					        $htmlRender .= '<div class="quest-img">';
					            $htmlRender .= '<img src="'. get_template_directory_uri() .'/images/icon_quest.png" alt="'. get_the_title($post->ID) .'" title="'. get_the_title($post->ID) .'" class="img-responsive">';
					        $htmlRender .= '</div>';
					        $htmlRender .= '<div class="quest-content">';
					            $htmlRender .= '<div class="quest-author">Tác giả: '. $valueAuthor .'</div>';
					            $htmlRender .= '<h4 class="quest-title">'. get_the_title($post->ID) .'</h4>';
					        $htmlRender .= '</div>';
					    $htmlRender .= '</div>';
					    $htmlRender .= '<div class="answer-blo">';
					        $htmlRender .= '<div class="answer-img">';
					            $htmlRender .= '<img src="'. get_template_directory_uri() .'/images/icon_answer.png" alt="'. get_the_title($post->ID) .'" title="'. get_the_title($post->ID) .'" class="img-responsive">';
					        $htmlRender .= '</div>';
					        $htmlRender .= '<div class="answer-content">'. get_the_content($post->ID) .'</div>';
					    $htmlRender .= '</div>';
					$htmlRender .= '</div>';
				endwhile;
        		wp_reset_postdata();
			}

			return $htmlRender;
		}

		add_shortcode('load_faq_index', 'load_faq_index');
	}
?>