<?php
get_header();
get_sidebar();
$search_term = "[:".qtranxf_getLanguage()."]";
    $langCode =  qtranxf_getLanguage();
    $langImg ='';
    if($langCode!='ja'):
        $langImg ='_'.$langCode;
    endif;
global $wpdb;
global $q_config;
$lang_slug = '_qts_slug_'.$q_config['language'];
$langCode =  qtranxf_getLanguage();
$terms = get_terms(array(
    'taxonomy' => 'job-skill',
    'meta_key' , $lang_slug,
    'orderby'    => 'meta_value',
));
$arrTerm = array();
foreach ( $terms as $term ) {
	$arrTerm[strtolower($term->name)] = $term->term_taxonomy_id;
}

?>

<?php
	$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

	$search_term = "[:".qtranxf_getLanguage()."]";

	if(isset($_GET['id'])){
		$terms_position = get_the_terms(intVal($_GET['id']), "job-position");
	    $id_terms_position = array();
	    if(is_array($terms_position)){
	    	foreach($terms_position as $key => $term){
	    		$id_terms_position[] = $term->term_id;
	    	}
	    }

	    $term_locations = get_the_terms(intVal($_GET['id']), 'job-location');
	    $id_terms_location = array();
	    if(is_array($term_locations)){
	    	foreach($term_locations as $key => $term){
	    		$id_terms_location[] = $term->term_id;
	    	}
	    }

		$term_skills = get_the_terms(intVal($_GET['id']), 'job-skill');
	    $id_terms_skills = array();
	    if(is_array($term_skills)){
	    	foreach($term_skills as $key => $term){
	    		$id_terms_skills[] = $term->term_id;
	    	}
	    }
		$argsJobs=array(
	        'post_type' => "jobs",
	        'tax_query' => array(

		        array(
		            'taxonomy' => 'job-position',
		            'terms' => $id_terms_position
		        ),
		        array(
		            'taxonomy' => 'job-location',
		            'terms' => $id_terms_location
		        ),
		        array(
		            'taxonomy' => 'job-skill',
		            'terms' => $id_terms_skills
		        )
		    ),
	        'posts_per_page' => 12,
	        'caller_get_posts' => 1,
	        'orderby'        => 'modified',
			'order'            => 'ASC',
			'post_status'    => 'publish',
			'search_prod_title' => $search_term,
			'hide_empty'     => false,
			'paged'			 => $paged
        );
	}else if(isset($_GET['location']) || isset($_GET['position']) || isset($_GET['salary']) || isset($_GET['keyword'])){
			if($_GET['location'] == "" && $_GET['position'] == "" && $_GET['salary'] == "" && $_GET['keyword'] == ""){
				$argsJobs = array(
					'post_type'      => 'jobs',
					'orderby'        => 'modified',
					'order'            => 'ASC',
					'hide_empty'     => false,
					'depth'          => 1,
					'post_status'    => 'publish',
					'search_prod_title' => $search_term,
					'posts_per_page' => 12,
					'paged'			 => $paged
				);
			}if($_GET['location'] == "" && $_GET['position'] == "" && $_GET['salary'] == "" && $_GET['keyword'] != ""){
				$keyword = $_GET['keyword'];
				$termIdSkill =  $arrTerm[strtolower($keyword)];
				if($termIdSkill>0){
					$argsJobs = array(
						'post_type' => 'jobs',
						'orderby'        => 'modified',
						'order'            => 'ASC',
						'hide_empty'     => false,
						'depth'          => 1,
						'post_status'    => 'publish',
						'search_prod_title' => $search_term,
						'posts_per_page' => 12,
						'paged'			 => $paged,
						'tax_query' => array(
					        array(
					            'taxonomy' => 'job-skill',
					            'terms' => $termIdSkill
					        ))
					);
				}else{
					$argsJobs = array(
						'post_type'      => 'jobs',
						'orderby'        => 'modified',
						'order'            => 'ASC',
						'hide_empty'     => false,
						'depth'          => 1,
						'post_status'    => 'publish',
						'search_prod_title_keyword' => $keyword,
						'search_prod_title' => $search_term,
						'posts_per_page' => 12,
						'paged'			 => $paged
					);
				}
			}else{
				if(is_array($_GET['location']) || is_array($_GET['position']) || is_array($_GET['skill']) ){

				    $id_terms_position = array();
				    if(is_array($_GET['location'])){
				    	foreach($_GET['location'] as $key => $term){
				    		$id_terms_position[] = $term;
				    	}
				    }

				    $id_terms_location = array();
				    if(is_array($_GET['position'])){
				    	foreach($_GET['position'] as $key => $term){
				    		$id_terms_location[] = $term;
				    	}
				    }

				    $id_terms_skills = array();
				    if(is_array($_GET['skill'])){
				    	foreach($_GET['skill'] as $key => $term){
				    		$id_terms_skills[] = $term;
				    	}
				    }

				    $tax_query = array();
				    if(count($id_terms_position) > 0){
				    	$tax_query[] = array(
					            'taxonomy' => 'job-location',
					            'terms' => $id_terms_position,
					            'field' => 'term_id'
					        );
				    }

				    if(count($id_terms_location) > 0){
				    	$tax_query[] = array(
					            'taxonomy' => 'job-position',
					            'terms' => $id_terms_location,
					            'field' => 'term_id'
					        );
				    }

				    if(count($id_terms_skills) > 0){
				    	$tax_query[] = array(
					            'taxonomy' => 'job-skill',
					            'terms' => $id_terms_skills,
					            'field' => 'term_id'
					        );
				    }

					$argsJobs=array(
				        'post_type' => "jobs",
				        'tax_query' => $tax_query,
				        'posts_per_page' => 12,
				        'caller_get_posts' => 1,
				        'orderby'        => 'modified',
						'order'            => 'ASC',
						'post_status'    => 'publish',
						'search_prod_title' => $search_term,
						'hide_empty'     => false,
						'paged'			 => $paged
			        );
				}else{
					$tax_query = array();

					$meta_query = array();
					if($_GET['location'] !=""){
						$tax_query[] = array(
							    'taxonomy' => 'job-location',
							    'field' => 'term_id',
							    'terms' => intVal($_GET['location'])
						     );
					}

					if($_GET['position'] !=""){
						$tax_query[] = array(
							    'taxonomy' => 'job-position',
							    'field' => 'term_id',
							    'terms' => intVal($_GET['position'])
						     );
					}

					if($_GET['salary'] !=""){
						$meta_query = array('relation' => 'AND',array(
							    'key' => 'min_salary',
							    'value' => intVal($_GET['salary']),
							    'compare' => '>='
						     ));
					}

					$keyword = "";
					if($_GET['keyword'] !=""){
						$keyword = $_GET['keyword'];
					}
					$argsJobs=array(
				        'post_type' => "jobs",
				        'tax_query' => $tax_query,
				        'meta_query' => $meta_query,
				        'posts_per_page' => 12,
				        'caller_get_posts' => 1,
				        'orderby'        => 'modified',
						'order'            => 'DESC',
						'post_status'    => 'publish',
						'search_prod_title_keyword' => $keyword,
						'search_prod_title' => $search_term,
						'hide_empty'     => false,
						'paged'			 => $paged
			        );
				}

			}
		}else{
			$argsJobs = array(
				'post_type'      => 'jobs',
				'orderby'        => 'modified',
				'order'            => 'ASC',
				'hide_empty'     => false,
				'depth'          => 1,
				'post_status'    => 'publish',
				'posts_per_page' => 12,
				'search_prod_title' => $search_term,
				'paged'			 => $paged,

			);
		}
	add_filter( 'posts_where', 'title_filter', 10, 2 );
	$wp_query1 = new WP_Query( $argsJobs );
	//remove_filter( 'posts_where', 'title_filter', 10, 2 );
?>
<div class="right-content">
	<div class="breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="search-intro">
						<?php if (qtrans_getLanguage()=='ja'){ ?>
		                    <img src="<?php echo get_template_directory_uri(); ?>/new/img/search-w.png" > 求人情報を検索する
						<ul class="search-list-btn">
							<li><a href="#place-box" class="fancybox">勤務地から探す</a></li>
							<li><a href="#job" class="fancybox">職種から探す</a></li>
							<li><a href="#key-word" class="fancybox">キーワードから探す</a></li>
						</ul>
		                <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
		                    <img src="<?php echo get_template_directory_uri(); ?>/new/img/search-w.png" > Tìm kiếm thông tin công việc
						<ul class="search-list-btn">
							<li><a href="#place-box" class="fancybox">Nơi làm việc</a></li>
							<li><a href="#job" class="fancybox">Nghề nghiệp</a></li>
							<li><a href="#key-word" class="fancybox">Từ khóa</a></li>
						</ul>
		                <?php }else if (qtrans_getLanguage()=='en'){ ?> 
		                   <img src="<?php echo get_template_directory_uri(); ?>/new/img/search-w.png" > Search job
						<ul class="search-list-btn">
							<li><a href="#place-box" class="fancybox">Workplace</a></li>
							<li><a href="#job" class="fancybox">Occupation</a></li>
							<li><a href="#key-word" class="fancybox">Keyword</a></li>
						</ul>
		                <?php } ?>

						
					</div>
				</div>
			</div>
		</div>
	</div>



<div class="group-link">
	<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul>
				<?php get_template_part( 'template-parts/navigation/navigation', 'grouplink' ); ?>
			</ul>
		 </div>
	</div>
 </div>
</div>


<div class="recruit-list">
  	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2 class="left">
					<?php $count_posts = wp_count_posts( 'jobs' )->publish; if (qtrans_getLanguage()=='ja'){ ?>
	                    検索結果 <span>（ <strong class="red-txt"><?php echo $wp_query1->found_posts; ?></strong> 件見つかりました ）</span>
	                <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
	                    検索結果 <span>（ <strong class="red-txt"><?php echo $wp_query1->found_posts; ?></strong> 件見つかりました ）</span>
	                <?php }else if (qtrans_getLanguage()=='en'){ ?> 
	                   検索結果 <span>（ <strong class="red-txt"><?php echo $wp_query1->found_posts; ?></strong> 件見つかりました ）</span>
	                <?php } ?>
				</h2>
				<?php if( $wp_query1->have_posts() ) : ?>
					<?php $types = array();  while( $wp_query1->have_posts() ) : $wp_query1->the_post(); 
						 $term_locations = get_the_terms($post->ID, 'job-location');
						 $recruitmend_ended = get_post_meta($post->ID, 'custom_element_grid_class_meta_box', true);
						 ?>
						<div class="recruit-blk">
							<?php 
							if($recruitmend_ended =='recruitment ended'){
				                echo '<p class="re-ended">'.$recruitmend_ended.'</p>';
				             }
							?>
							<img src="<?php
			                    if ( get_field('detail_image'.$langImg,$post_id) ) {
			                        echo get_field('detail_image'.$langImg,$post_id);
			                    }else if(get_field('detail_image', $post_id)){
			                       echo get_field('detail_image',$post_id);
			                    }else if(get_field('default_image'.$langImg,$post_id) ){
			                        echo get_field('default_image'.$langImg,$post_id);
			                    }else if(get_field('default_image', $post_id)){
			                        echo get_field('default_image', $post_id);
			                    }
			                    else {
			                        echo get_template_directory_uri()."/images/recruitment/img-4.png";
			                    }
			                ?>" alt="<?php the_title();?>" />
							<a href="<?php echo get_permalink($post->ID); ?>"><?php the_title();?></a>
							<ul class="tags-list">
								<?php 
								$term_positions = get_the_terms($post->ID, "job-position");
								if($term_positions){
								foreach ($term_positions as $position) {
								 //$cate_link = get_term_link( $position->term_id );
								 ?>
									<form action="<?php echo site_url( '/'.qtranxf_getLanguage().'/jobs/'); ?>" method="get">
			                        <input type="hidden" name="position" value="<?php echo $position->term_id ?>">
			                        <li><button type="submit" class="cate-jobs"><?php echo $position->name ?></button></li>
			                    </form>
								<?php } } ?>
							</ul>
							<ul class="recruit-if">
								<li>
									<img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-money.png">
									<?php
									 if ( !is_null(get_field('salary')) ) :
										echo mb_strimwidth(wp_strip_all_tags(get_field('salary')), 0, 80, '...');
									endif; ?>
								</li>
								<li>
									<img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-map.png"> 
									<?php 
									if($term_locations){
									foreach ($term_locations as $location) { 
									echo $location->name . ", ";
									} } ?>
								</li>
							</ul>
							<p>
								<?php
									 if ( !is_null(get_field('description')) ) :
										echo mb_strimwidth(wp_strip_all_tags(get_field('description')), 0, 150, '...');
									endif; ?>
							</p>
							<span class="recruit-date">― <?php the_modified_time('Y.m.d'); ?> UPDATED</span>
							<a href="<?php echo get_permalink($post->ID); ?>" class="view-more-btn">
								<?php if (qtrans_getLanguage()=='ja'){ ?>
				                	詳細を見る
					            <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
					                詳細を見る
					            <?php }else if (qtrans_getLanguage()=='en'){ ?> 
					                詳細を見る
					            <?php } ?>
		        			</a>
						</div>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>

					<div class="center">
						<?php if (function_exists('agent_pagenavi')) agent_pagenavi($wp_query1); ?>
						<!-- /PAGINATION -->
					</div>
				<?php else: ?>
					<div class='no-content' style="padding: 10px 0px 30px">
						<p>
							<img src="<?php echo get_template_directory_uri() ?>/images/no-content-<?php echo __('[:ja]ja[:en]en[:vi]vi'); ?>.png" ." style='margin:0 auto;' class='img-responsive pc-only'>
							<img src="<?php echo get_template_directory_uri() ?>/images/no-content-sp-<?php echo __('[:ja]ja[:en]en[:vi]vi'); ?>.png" ." style='margin:0 auto;' class='img-responsive sp-only'>
						</p>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
  </div>

  <?php get_template_part( 'template-parts/content/content', 'recruitment' ); ?>
<?php get_footer(); ?>
