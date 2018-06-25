<?php
	include("page.php");

	if(!function_exists('load_news_index')){
		function load_news_index(){
			global $post;
			$args = array(
				'post_type'         => 'news',
				'posts_per_page'    => 3,
				'orderby'           => 'date', 
				'order'             => 'DESC'
			);
			
			$query = new WP_Query( $args );
			$htmlRender = "";
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) : $query->the_post();

					$thumb_id = get_post_thumbnail_id($post->ID);
					$image_thumb = wp_get_attachment_image_src( $thumb_id, 'thumb-news-index' );
					$image_full = wp_get_attachment_image_src( $thumb_id, 'full' );

					$image_src = "";
					if($thumb_id != ""){
						$image_src = $image_thumb[0];
					}else{
						$image_src = get_template_directory_uri() ."/images/branch_5.png";
					}

					$htmlRender .= '<div class="col-xs-12 col-sm-4 col-md-4 news-element">';
					    $htmlRender .= '<div class="inner">';
					        $htmlRender .= '<a href="'. get_the_permalink($post->ID) .'">';
					            $htmlRender .= '<img class="img-responsive" src="'.$image_src.'" alt="'. get_the_title($post->ID) .'">';
					            $htmlRender .= '<div class="info">';
					                $htmlRender .= '<p class="post-date">'. get_the_date('Y.m.d', $post->ID ) .'</p>';
					                $htmlRender .= '<p class="title">'. get_the_title($post->ID) .'</p>';
					            $htmlRender .= '</div>';
					        $htmlRender .= '</a>';
					    $htmlRender .= '</div>';
					$htmlRender .= '</div>';
					endwhile;
        		wp_reset_postdata();
			}

			return $htmlRender;
		}

		add_shortcode('load_news_index', 'load_news_index');
	}

	if(!function_exists('load_news_single')){
		function load_news_single(){
			global $post;
			$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
			
			if(isset($_GET['page'])){
				$paged = intVal($_GET['page']);
				if($paged  == 0){
					$paged =1;
				}
			}
			$args = array(
				'post_type'         => 'news',
				'posts_per_page'    => 9,
				'orderby'           => 'date', 
				'order'             => 'DESC',
				"paged"				=> $paged
			);
			
			$query = new WP_Query( $args );

			$pageName = strtolower(get_the_title(get_the_ID()));

			$postTotal = intVal($query->found_posts);
			$postItemPage = intVal($query->post_count);
			$max_page = intVal($query->max_num_pages);
			$max_range_page = 3;
			$currentPage = $paged;

			$htmlRender = "";
			if ( $query->have_posts() ) {
				$htmlRender .= '<div class="row blog-news-list">';
				while ( $query->have_posts() ) : $query->the_post();

					$thumb_id = get_post_thumbnail_id($post->ID);
					$image_thumb = wp_get_attachment_image_src( $thumb_id, 'thumb-news-index' );
					$image_full = wp_get_attachment_image_src( $thumb_id, 'full' );

					$image_src = "";
					if($thumb_id != ""){
						$image_src = $image_thumb[0];
					}else{
						$image_src = get_template_directory_uri() ."/images/branch_3.jpg";
					}

					$htmlRender .= '<div class="col-md-4 col-sm-4 blog-news-list__item">';
					    $htmlRender .= '<div class="item-info">';
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
				$htmlRender .= '</div>';
        		wp_reset_postdata();
			}

			$htmlPagination = "";
			$htmlPagination .= '<div class="pagination">';
			$htmlPagination .= '<ul class="pagination-info">';

			if($max_page > 1 ){
				if($currentPage == 1){
					$htmlPagination .= '<li>';
					$htmlPagination .= '<a>&lt; PREV</a>';
					$htmlPagination .= '</li>';
				}else{
					$htmlPagination .= '<li>';
					$htmlPagination .= '<a href="'. home_url($pageName.'?page='. (intVal($currentPage)-1)) .'" class="prev">&lt; PREV</span></a>';
					$htmlPagination .= '</li>';
				}

				if($max_page > $max_range_page){
					$minMaxPage = intVal(floor($max_range_page/2));
					$maxPage = $currentPage+$minMaxPage;
					$minPage = $currentPage-$minMaxPage;


					if($maxPage >= $max_page){
						$maxPage = $max_page;
						$minPage = intVal($maxPage-$max_range_page)+1;
					}

					if($minPage <= 1){
						$minPage = 1;
						$maxPage = intVal($max_range_page);
					}
					for($i = $minPage; $i <= $maxPage; $i++){
						if(intVal($currentPage) === $i){
							$htmlPagination .= '<li class="active">';
							$htmlPagination .= '<a href="'. home_url($pageName.'?page='.$i) .'">'.$i.'</a>';
							$htmlPagination .= '</li>';
						}else{
							$htmlPagination .= '<li>';
							$htmlPagination .= '<a href="'. home_url($pageName.'?page='.$i) .'">'.$i.'</a>';
							$htmlPagination .= '</li>';
						}
					}
				}else{
					for($i = 1; $i <= $max_page; $i++){
						if($currentPage === $i){
							$htmlPagination .= '<li class="active">';
							$htmlPagination .= '<a href="'. home_url($pageName.'?page='.$i) .'">'.$i.'</a>';
							$htmlPagination .= '</li>';
						}else{
							$htmlPagination .= '<li>';
							$htmlPagination .= '<a href="'. home_url($pageName.'?page='.$i) .'">'.$i.'</a>';
							$htmlPagination .= '</li>';
						}
					}
				}

				if($currentPage == $max_page){
					$htmlPagination .= '<li>';
					$htmlPagination .= '<a>NEXT &gt;</a>';
					$htmlPagination .= '</li>';
				}else{
					$htmlPagination .= '<li>';
					$htmlPagination .= '<a href="'. home_url($pageName.'?page='. (intVal($currentPage)+1)) .'" class="next">NEXT &gt;</span></a>';
					$htmlPagination .= '</li>';
				}
			}

			$htmlPagination .= '</ul>';
			$htmlPagination .= '</div>';


			return $htmlRender.$htmlPagination;
		}

		add_shortcode('load_news_single', 'load_news_single');
	}
?>
