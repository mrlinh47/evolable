<?php
	include('admin/index.php');
	include('page.php');

	if(!function_exists('load_customer_index')){

		function load_customer_index(){
			global $post;
			$args = array(
				'post_type'         => 'interviews',
				'posts_per_page'    => 4,
				'orderby'           => 'date',
				'order'             => 'DESC',
				'meta_query' => array(
			        array(
			            'key'     => 'interviews-candidate',
			            'value'   => 'customer',
			        ),
			    ),
			);

			$languv = "詳細を見る";
		    if(function_exists('qtranxf_getLanguage')){
		        if (qtranxf_getLanguage() == "ja"){
		            $languv = "詳細を見る";
		        } elseif (qtranxf_getLanguage() == "en"){
		            $languv = "View detail";
		        } else {
		            $languv = "Xem chi tiết";
		        }
		    }

			$query = new WP_Query( $args );

			$htmlWrap = "";

			$htmlRender = "";

			$htmlWrap1 = "";
			$htmlRender1 = "";

			$htmlWrap2 = "";
			$htmlRender2 = "";

			if ( $query->have_posts() ) {

				$htmlWrap1 .= '<div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 left-content">';
				$htmlWrap1 .= '<div class="inner">';
				$htmlWrap1 .= '<div class="main-interview">';
				$htmlWrap1 .= '<div class="row">';

				$htmlWrap2 .= '<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 right-content">';
				$htmlWrap2 .= '<div class="inner">';
				$htmlWrap2 .= '<div class="sub-element">';
				$htmlWrap2 .= '<div class="row list-td">';

				while ( $query->have_posts() ) : $query->the_post();


					$thumb_id = get_post_thumbnail_id($post->ID);
					$image_thumb1 = wp_get_attachment_image_src( $thumb_id, 'thumb-interview-page' );
					$image_thumb2 = wp_get_attachment_image_src( $thumb_id, 'thumb-news-index' );
					$image_full = wp_get_attachment_image_src( $thumb_id, 'full' );

					$image_src = "";
					if($thumb_id != ""){
						$image_src = $image_thumb1[0];
					}else{
						$image_src = get_template_directory_uri() ."/images/avatar_1.jpg";
					}

					$position = '';
					if (get_field('position') !== false){
		                $position = get_field('position');
		            }

		            $term_company = get_the_terms($post->ID, 'interviews-company');
		            $link = get_post_meta($post->ID, '_eaa_interview_link_value', true);
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
		            $htmlRender1 .= '<div class="box-interview-content">';
						$htmlRender1 .= '<div class="col-xs-12 col-sm-6 col-md-8 col-lg-6 img-profile">';
							$htmlRender1 .= '<img src="'. $image_src .'" alt="Avartar1" title="'. get_the_title($post->ID) .'" class="img-responsive">';
						$htmlRender1 .= '</div>';
						$htmlRender1 .= '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-6 content-interview">';
							$htmlRender1 .= '<div class="text-left">'. get_the_content($post->ID) .'</div>';
							$htmlRender1 .= '<p class="text-left name"><em>'. get_the_title($post->ID) .' – '. $position .' ('. $companyName .')</em></p>';
							if( $link != '#' ) {
							$htmlRender1 .= '<a class="view-dt-left" href="'.$link.'" target="_blank">'.$languv.'</a>';
							}
						$htmlRender1 .= '</div>';
						$htmlRender1 .= '<div class="slide-pager"><div class="slide-control-prev"></div><div class="slide-control-next"></div></div>';
					$htmlRender1 .= '</div>';

					$htmlRender2 .= '<div class="col-xs-12 col-sm-4 col-md-12 col-lg-12 sub-element-item">';
						$htmlRender2 .= '<div class="sub-interview">';
							$htmlRender2 .= '<div class="bg-sub-interview">';
								$htmlRender2 .= '<img src="'. $image_src .'" class="img-responsive" alt="'. get_the_title($post->ID) .'">';
							$htmlRender2 .= '</div>';
							$htmlRender2 .= '<div class="info-sub-interview">';
								$htmlRender2 .= '<em class="text-uppercase">'. get_the_title($post->ID) .'</em>';
								$htmlRender2 .= '<em>'. $position .' ('. $companyName .')</em>';
							$htmlRender2 .= '</div>';
							$htmlRender2 .= '<div class="avatar-interview img-circle">';
								$htmlRender2 .= '<img src="'. $image_src .'" alt="'. get_the_title($post->ID) .'" class="img-responsive">';
							$htmlRender2 .= '</div>';
						$htmlRender2 .= '</div>';
					$htmlRender2 .= '</div>';

				endwhile;
        		wp_reset_postdata();
        		$htmlWrap1 .= $htmlRender1;
        		$htmlWrap1 .= '</div>';
				$htmlWrap1 .= '</div>';
				$htmlWrap1 .= '</div>';
				$htmlWrap1 .= '</div>';

				$htmlWrap2 .= $htmlRender2;
				$htmlWrap2 .= '</div>';
				$htmlWrap2 .= '</div>';
				$htmlWrap2 .= '</div>';
				$htmlWrap2 .= '</div>';

				$htmlRender = $htmlWrap1.$htmlWrap2;
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
				'posts_per_page'    => 4,
				'orderby'           => 'date',
				'order'             => 'DESC',
				'meta_query' => array(
			        array(
			            'key'     => 'interviews-candidate',
			            'value'   => 'candidate',
			        ),
			    ),
			);

			$languv = "詳細を見る";
		    if(function_exists('qtranxf_getLanguage')){
		        if (qtranxf_getLanguage() == "ja"){
		            $languv = "詳細を見る";
		        } elseif (qtranxf_getLanguage() == "en"){
		            $languv = "View detail";
		        } else {
		            $languv = "Xem chi tiết";
		        }
		    }

			$query = new WP_Query( $args );

			$htmlWrap = "";

			$htmlRender = "";

			$htmlWrap1 = "";
			$htmlRender1 = "";

			$htmlWrap2 = "";
			$htmlRender2 = "";

			if ( $query->have_posts() ) {

				$htmlWrap1 .= '<div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 left-content">';
				$htmlWrap1 .= '<div class="inner">';
				$htmlWrap1 .= '<div class="main-interview">';
				$htmlWrap1 .= '<div class="row">';

				$htmlWrap2 .= '<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 right-content">';
				$htmlWrap2 .= '<div class="inner">';
				$htmlWrap2 .= '<div class="sub-element">';
				$htmlWrap2 .= '<div class="row list-uv">';

				while ( $query->have_posts() ) : $query->the_post();


					$thumb_id = get_post_thumbnail_id($post->ID);
					$image_thumb1 = wp_get_attachment_image_src( $thumb_id, 'thumb-interview-page' );
					$image_thumb2 = wp_get_attachment_image_src( $thumb_id, 'thumb-news-index' );
					$image_full = wp_get_attachment_image_src( $thumb_id, 'full' );

					$image_src = "";
					if($thumb_id != ""){
						$image_src = $image_thumb1[0];
					}else{
						$image_src = get_template_directory_uri() ."/images/avatar_1.jpg";
					}

					$position = '';
					if (get_field('position') !== false){
		                $position = get_field('position');
		            }

		            $term_company = get_the_terms($post->ID, 'interviews-company');
		            $link = get_post_meta($post->ID, '_eaa_interview_link_value', true);
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
		            $htmlRender1 .= '<div class="box-interview-content">';
						$htmlRender1 .= '<div class="col-xs-12 col-sm-6 col-md-8 col-lg-6 img-profile">';
							$htmlRender1 .= '<img src="'. $image_src .'" alt="Avartar1" title="'. get_the_title($post->ID) .'" class="img-responsive">';
						$htmlRender1 .= '</div>';
						$htmlRender1 .= '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-6 content-interview">';
							$htmlRender1 .= '<div class="text-left">'. get_the_content($post->ID) .'</div>';
							$htmlRender1 .= '<p class="text-left name"><em>'. get_the_title($post->ID) .' – '. $position .' ('. $companyName .')</em></p>';
							if( $link != '#' ) {
							$htmlRender1 .= '<a class="view-dt-left" href="'.$link.'" target="_blank">'.$languv.'</a>';
							}							
						$htmlRender1 .= '</div>';
						$htmlRender1 .= '<div class="slide-pager"><div class="slide-control-prev"></div><div class="slide-control-next"></div></div>';
					$htmlRender1 .= '</div>';

					$htmlRender2 .= '<div class="col-xs-12 col-sm-4 col-md-12 col-lg-12 sub-element-item">';
						$htmlRender2 .= '<div class="sub-interview">';
							$htmlRender2 .= '<div class="bg-sub-interview">';
								$htmlRender2 .= '<img src="'. $image_src .'" class="img-responsive" alt="'. get_the_title($post->ID) .'">';
							$htmlRender2 .= '</div>';
							$htmlRender2 .= '<div class="info-sub-interview">';
								$htmlRender2 .= '<em class="text-uppercase">'. get_the_title($post->ID) .'</em>';
								$htmlRender2 .= '<em>'. $position .' ('. $companyName .')</em>';
							$htmlRender2 .= '</div>';
							$htmlRender2 .= '<div class="avatar-interview img-circle">';
								$htmlRender2 .= '<img src="'. $image_src .'" alt="'. get_the_title($post->ID) .'" class="img-responsive">';
							$htmlRender2 .= '</div>';
						$htmlRender2 .= '</div>';
					$htmlRender2 .= '</div>';

				endwhile;
        		wp_reset_postdata();
        		$htmlWrap1 .= $htmlRender1;
        		$htmlWrap1 .= '</div>';
				$htmlWrap1 .= '</div>';
				$htmlWrap1 .= '</div>';
				$htmlWrap1 .= '</div>';

				$htmlWrap2 .= $htmlRender2;
				$htmlWrap2 .= '</div>';
				$htmlWrap2 .= '</div>';
				$htmlWrap2 .= '</div>';
				$htmlWrap2 .= '</div>';

				$htmlRender = $htmlWrap1.$htmlWrap2;
			}


			return $htmlRender;
		}

		add_shortcode('load_candidate_index', 'load_candidate_index');
	}


?>