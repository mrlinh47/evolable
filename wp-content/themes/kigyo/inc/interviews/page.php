<?php

	if(!function_exists('load_customer_interview')){

		function load_customer_interview(){
			global $post;
			$args = array(
				'post_type'         => 'interviews',
				'posts_per_page'    => -1,
				'orderby'           => 'date',
				'order'             => 'DESC',
				'meta_query' => array(
			        array(
			            'key'     => 'interviews-candidate',
			            'value'   => 'customer',
			        ),
			    ),
			);

			$query = new WP_Query( $args );

			$htmlRender = "";

			$htmlRenderCustomer = "";

			if ( $query->have_posts() ) {
				$htmlRender = '<div class="list-interview clearfix">';
				while ( $query->have_posts() ) : $query->the_post();
					$thumb_id = get_post_thumbnail_id($post->ID);
					$image_thumb = wp_get_attachment_image_src( $thumb_id, 'thumb-interview-index-md' );
					$image_full = wp_get_attachment_image_src( $thumb_id, 'full' );

					$termCompany = get_the_terms($post->ID, "interviews-company");

					$img_src = "";

					if($thumb_id != ""){
						$img_src = $image_thumb[0];
					}else{
						$img_src = $image_full[0];
					}

					$NameRomanji = get_post_meta($post->ID, '_eaa_interview_author_romanji_value', true);
					$link = get_post_meta($post->ID, '_eaa_interview_link_value', true);

					if(!empty($NameRomanji)){
						$NameRomanji = '<br>（'. $NameRomanji.')';
					}

					$htmlRender .= '<div class="box-int clearfix">';
				        $htmlRender .= '<div class="int-img">';
				        	if( $link != '#' ) :
				            $htmlRender .= '<a href="'. $link .'" target="_blank"><img src="'. $img_src .'" alt="'. get_the_title($post->ID) .'" /></a>';
				        	else :
				        	$htmlRender .= '<img src="'. $img_src .'" alt="'. get_the_title($post->ID) .'" />';
				       		endif;
				            $htmlRender .= '<div class="int-cmt">';
				                $htmlRender .= '<p>'. get_the_title($post->ID) .'</p>';
				                $htmlRender .= '<span>'. $termCompany[0]->name .'</span>';
				            $htmlRender .= '</div>';
				        $htmlRender .= '</div>';
				        $htmlRender .= '<div class="int-cont">';
				            $htmlRender .= get_the_content( $post->ID );
				        $htmlRender .= '</div>';
				        if( $link != '#' ) :
				        $htmlRender .= '<a class="int-view-dt" href="'. $link .'" target="_blank">続きを読む</a>';
				    	endif;
				    $htmlRender .= '</div>';
				endwhile;
        		wp_reset_postdata();
        		$htmlRender .= '</div>';
			}


			return $htmlRender;
		}

		add_shortcode('load_customer_interview', 'load_customer_interview');
	}

	if(!function_exists('load_candidate_interview')){
		// $interviews_candidate = $filter_type[0];

		function load_candidate_interview(){

			global $post;
			$args = array(
				'post_type'         => 'interviews',
				'posts_per_page'    => -1,
				'orderby'           => 'date',
				'order'             => 'DESC',
				'meta_query' => array(
			        array(
			            'key'     => 'interviews-candidate',
			            'value'   => 'candidate',
			        ),
			    ),
			);

			$query = new WP_Query( $args );

			$htmlRender = "";

			$htmlRenderCustomer = "";

			if ( $query->have_posts() ) {
				$htmlRender = '<div class="list-interview clearfix">';
				while ( $query->have_posts() ) : $query->the_post();
					$thumb_id = get_post_thumbnail_id($post->ID);
					$image_thumb = wp_get_attachment_image_src( $thumb_id, 'thumb-interview-index-md' );
					$image_full = wp_get_attachment_image_src( $thumb_id, 'full' );

					$termCompany = get_the_terms($post->ID, "interviews-company");

					$img_src = "";

					if($thumb_id != ""){
						$img_src = $image_thumb[0];
					}else{
						$img_src = $image_full[0];
					}

					$NameRomanji = get_post_meta($post->ID, '_eaa_interview_author_romanji_value', true);
					$link = get_post_meta($post->ID, '_eaa_interview_link_value', true);

					if(!empty($NameRomanji)){
						$NameRomanji = '<br>（'. $NameRomanji.')';
					}

					$htmlRender .= '<div class="box-int clearfix">';
				        $htmlRender .= '<div class="int-img">';
				        	if( $link != '#' ) :
				            $htmlRender .= '<a href="'. $link .'" target="_blank"><img src="'. $img_src .'" alt="'. get_the_title($post->ID) .'" /></a>';
				        	else :
				        	$htmlRender .= '<img src="'. $img_src .'" alt="'. get_the_title($post->ID) .'" />';
				       		endif;
				            $htmlRender .= '<div class="int-cmt">';
				                $htmlRender .= '<p>'. get_the_title($post->ID) .'</p>';
				                $htmlRender .= '<span>'. $termCompany[0]->name .'</span>';
				            $htmlRender .= '</div>';
				        $htmlRender .= '</div>';
				        $htmlRender .= '<div class="int-cont">';
				            $htmlRender .= get_the_content( $post->ID );
				        $htmlRender .= '</div>';
				        if( $link != '#' ) :
				        $htmlRender .= '<a class="int-view-dt" href="'. $link .'" target="_blank">続きを読む</a>';
				    	endif;
				    $htmlRender .= '</div>';
				endwhile;
        		wp_reset_postdata();
        		$htmlRender .= '</div>';
			}


			return $htmlRender;
		}

		add_shortcode('load_candidate_interview', 'load_candidate_interview');
	}
?>