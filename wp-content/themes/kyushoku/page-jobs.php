<?php
get_header();
global $wpdb;
global $q_config;
$lang_slug = '_qts_slug_'.$q_config['language'];
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
<!--- wr-breadcrumb-sub -->
<div class="wr-breadcrumb-sub clearfix">
	<div class="container">
		<div class="row row-recrui">
			<div class="cont-breadcrumb-sub">
				<div class="breadcrumb-sub"><h3 class="text-uppercase"><?php echo __('[:ja]求人情報[:en]Recruitment[:vi]Tuyển dụng') ?></h3></div>
				<!--- LANGUAGE-->
				<div class="btn-group">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo do_shortcode('[get_name_lange_current]'); ?>  <span class="caret"></span>
                    </button>
                    <?php echo do_shortcode('[choose_lang_dropdown]'); ?>
                </div>
			</div>
		</div>
	</div>
</div>
<!--- /wr-breadcrumb-sub -->

<!--- CONTENT -->
<section class="container wr-recrui">
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
	<div class="row row-recrui">
		<!--- SEARCH ADVANCED -->
		<div class="breadcrumb-news-detail">
			<?php breadcrumbs(); ?>
		</div>
		<div class="wr-select-adv">
			<?php get_template_part('search','form'); ?>
		</div>
		<!--- /SEARCH ADVANCED -->
	</div>
<?php
		if( $wp_query1->have_posts() ) :

	?>
	

	<div class="list-work row row-recrui">
		<?php
		  while( $wp_query1->have_posts() ) : $wp_query1->the_post();

		?>
		<div class="list-work-item col-lg-3 col-md-4 col-sm-6 col-xs-6 col-full wow fadeInUp animated" data-wow-delay="0.4s">
			<a href="<?php the_permalink(); ?>" class="box-work" title="<?php the_title();?>">
				<div class="box-work-img">
					<img src="<?php
							if ( get_field('default_image') ) {
								echo get_field('default_image');
							}
							else {
								echo get_template_directory_uri()."/images/recruitment/img-4.png";
							}
						?>" alt="<?php the_title();?>" />
				</div>
				<div class="figcaption"><span class="dl-out"><span class="dl-in"><?php the_title();?></span></span></div>
				<?php
					$term_locations = get_the_terms($post->ID, 'job-location');
					$term_positions = get_the_terms($post->ID, 'job-position');
					$term_skills = get_the_terms($post->ID, 'job-skill');
				?>
				<div class="cmt-work">
					<div class="box-map-sal">
						<p class="cmt-map"><?php
							if (is_array($term_locations)):
								foreach($term_locations as $location) :
									echo $location->name . ", ";
								endforeach;
							endif;
						?></p>
						<p class="cmt-sal"><?php
							if ( !is_null(get_field('salary')) ) :
								echo get_field('salary');
							endif;
						?></p>
					</div>
					<div class="tit-skill">
						<span><?php echo __('[:ja]スキル[:en]Skills[:vi]Kỹ năng', 'kyushoku'); ?></span>
					</div>
					<div class="list-skill inner-content-div">
						<?php
							if (is_array($term_skills)):
								foreach($term_skills as $skill_item) :
									echo "<span>". $skill_item->name ."</span>";
								endforeach;
							endif;
						?>
					</div>
					<span class="readmore"><?php echo __('[:ja]詳細を見る >>[:en]Detail >>[:vi]Xem chi tiết >>'); ?></span>
				</div>
			</a>
		</div>
		<?php endwhile; wp_reset_postdata(); ?>
	</div>

	<div class="row row-recrui">
		<?php if (function_exists('agent_pagenavi')) agent_pagenavi($wp_query1); ?>
		<!-- /PAGINATION -->
	</div>
<?php else:
?>
	<div class='no-content' style="padding: 10px 0px 30px">
		<p>
			<img src="<?php echo get_template_directory_uri() ?>/images/no-content-<?php echo __('[:ja]ja[:en]en[:vi]vi'); ?>.png" ." style='margin:0 auto;' class='img-responsive pc-only'>
			<img src="<?php echo get_template_directory_uri() ?>/images/no-content-sp-<?php echo __('[:ja]ja[:en]en[:vi]vi'); ?>.png" ." style='margin:0 auto;' class='img-responsive sp-only'>
		</p>
	</div>
<?php
	endif;
 ?>



</section>
<!--- /CONTENT -->
<?php if( $wp_query1->have_posts() ) : ?>
<!-- SEARCH BOTTOM -->
<div class="search-bottom">
	<div class="container">
		<div class="wr-select-adv row row-recrui">
			<?php get_template_part('search','form'); ?>
		</div>
	</div>
</div>
<?php endif; ?>
<!-- /SEARCH BOTTOM -->
<?php get_footer(); ?>
