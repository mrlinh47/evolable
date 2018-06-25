<?php
	include('admin/index.php');
	include('page.php');

	if(!function_exists('load_customer_index')){

		function load_customer_index(){
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

			if ( $query->have_posts() ) {

				while ( $query->have_posts() ) : $query->the_post();


					$thumb_id = get_post_thumbnail_id($post->ID);
					$image_thumb = wp_get_attachment_image_src( $thumb_id, 'thumb-interview-index' );
					$image_full = wp_get_attachment_image_src( $thumb_id, 'full' );

					$image_src = "";
					if($thumb_id != ""){
						$image_src = $image_full[0];
					}else{
						$image_src = get_template_directory_uri() ."/images/avatar_1.jpg";
					}

					$position = '';
					if (get_field('position') !== false){
		                $position = get_field('position');
		            }

		            $term_company = get_the_terms($post->ID, 'interviews-company');
		            $companyName = "";
		            if (is_array($term_company)) {
		            	$countCom = 1;
		                foreach ($term_company as $company) {
		                    if($countCom == 1){
		                       	$companyName = $company->name;
		                    }
		                    $countCom++;
		                }
		            }

		            $htmlRender .= '<div class="col-md-4 col-sm-4 inter-list__item">';
						$htmlRender .= '<div class="item-info">';
							$htmlRender .= '<a href="#" data-toggle="modal">';
								$htmlRender .= '<img src="'. $image_src .'" alt="'. get_the_title($post->ID) .'" class="img-responsive">';
								$htmlRender .= '<span class="item-info__des">';
									$htmlRender .= '<span class="item-info__txt">'. get_the_content($post->ID) .'</span>';
									$htmlRender .= '<span class="item-info__title">'. $companyName .'<br>'. get_the_title($post->ID) .'</span>';
								$htmlRender .= '</span>';
							$htmlRender .= '</a>';
						$htmlRender .= '</div>';
					$htmlRender .= '</div>';

				endwhile;
        		wp_reset_postdata();
			}


			return $htmlRender;
		}

		add_shortcode('load_customer_index', 'load_customer_index');
	}

	if(!function_exists('load_candidate_index')){

		function load_candidate_index(){
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

			if ( $query->have_posts() ) {

				while ( $query->have_posts() ) : $query->the_post();


					$thumb_id = get_post_thumbnail_id($post->ID);
					$image_thumb = wp_get_attachment_image_src( $thumb_id, 'thumb-interview-index' );
					$image_full = wp_get_attachment_image_src( $thumb_id, 'full' );

					$image_src = "";
					if($thumb_id != ""){
						$image_src = $image_full[0];
					}else{
						$image_src = get_template_directory_uri() ."/images/avatar_1.jpg";
					}

					$position = '';
					if (get_field('position') !== false){
		                $position = get_field('position');
		            }

		            $term_company = get_the_terms($post->ID, 'interviews-company');
		            $companyName = "";
		            if (is_array($term_company)) {
		            	$countCom = 1;
		                foreach ($term_company as $company) {
		                    if($countCom == 1){
		                       	$companyName = $company->name;
		                    }
		                    $countCom++;
		                }
		            }

		            $htmlRender .= '<div class="col-md-4 col-sm-4 inter-list__item">';
						$htmlRender .= '<div class="item-info">';
							$htmlRender .= '<a href="#" data-toggle="modal">';
								$htmlRender .= '<img src="'. $image_src .'" alt="'. get_the_title($post->ID) .'" class="img-responsive">';
								$htmlRender .= '<span class="item-info__des">';
									$htmlRender .= '<span class="item-info__txt">'. get_the_content($post->ID) .'</span>';
									$htmlRender .= '<span class="item-info__title">'. $companyName .'<br>'. get_the_title($post->ID) .'</span>';
								$htmlRender .= '</span>';
							$htmlRender .= '</a>';
						$htmlRender .= '</div>';
					$htmlRender .= '</div>';

				endwhile;
        		wp_reset_postdata();
			}


			return $htmlRender;
		}

		add_shortcode('load_candidate_index', 'load_candidate_index');
	}


?>