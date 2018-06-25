<?php
	add_action( 'wp_ajax_nopriv_eaa_search_job', 'eaa_search_job' );
	add_action( 'wp_ajax_eaa_search_job', 'eaa_search_job' );
	function eaa_search_job() {
		global $post;
		$title = "";
		if(isset($_POST['id'])){
			if(intVal($_POST['id']) > 0){
				$term_parent = get_term(intVal($_POST['id']));
				$title_key = $term_parent->name;
				$taxonamy_value = $term_parent->taxonomy;
				$term_children = get_term_children(intVal($_POST['id']), 'job-location');
				$termt_child_list = array();
				if(count($term_children) > 0 && is_array($term_children)){
					foreach ($term_children as $key => $value) {
						$termt_child_list[] = get_term(intVal($value));
					}
				}
				foreach($termt_child_list as $key =>  $value){
					$search_term = "[:".qtranxf_getLanguage()."]";
					$argsJobs=array(
				        'post_type' => "jobs",
				        'tax_query' => array(
					        array(
					            'taxonomy' => 'job-location',
					            'terms' => $value->term_id
					        )
					    ),
					    'posts_per_page' => -1,
				        'orderby'        => 'date',
						'order'            => 'DESC',
						'post_status'    => 'publish',
						'search_prod_title' => $search_term,
						'hide_empty'     => false
			        );
			        add_filter( 'posts_where', 'title_filter', 10, 2 );
					$wp_query1 = new WP_Query( $argsJobs );
					remove_filter( 'posts_where', 'title_filter', 10, 2 );
					$value->count = $wp_query1->post_count . " " .(($wp_query1->post_count > 1)?__('[:ja]件[:en]Jobs[:vi]Việc'):__('[:ja]件[:en]Job[:vi]Việc'));
					$termt_child_list[$key] = $value;
				}
				echo json_encode(array('has' => true, "data" => array("term_parent" => $term_parent, "term_children" => $termt_child_list)));
				die();
			}
		}
		echo json_encode(array('has' => false, "message" => "Data is empty!"));
		die();
	}
	add_action( 'wp_ajax_nopriv_eaa_search_mutil', 'eaa_search_mutil' );
	add_action( 'wp_ajax_eaa_search_mutil', 'eaa_search_mutil' );
	function eaa_search_mutil() {
		global $post;
		$title = "";
		if(isset($_POST['type_search'])){
			$type_search = $_POST['type_search'];
			if($type_search != "" && !empty($type_search)){
				if($type_search == "job-salary"){
					$salaries = array(100,150,200,250,300,350,400,450,500,550,600,650,700,750,800,850,900,950,1000);
					$terms_parent = array();
					$terms_parent["salary-1"] = array(
							"term_id" => "salary-1",
							"name" => __('[:ja]年収下限[:en]Salary[:vi]Mức Lương')
						);
					$termsChild = array();
					foreach ($salaries as $key => $value) {
						$termsChild["salary-1"]["salary-".$value] = array('lv1' => array(
								"term_id" => "salary-".$value,
								"name" => $value. "万円",
								"value" => $value
							));
					}
					echo json_encode(array('has' => true, "data" => array('term_parent' => $terms_parent, 'term_child' => $termsChild)));
					die();
				}else{
					$terms_parent = get_terms( 
						array( 
								'taxonomy' => $type_search,
								'parent'   => 0
							) 
						);
					$termsChild = array();
					foreach($terms_parent as $key => $value){
						$term_children1 = get_term_children(intVal($value->term_id), $type_search);
						foreach ($term_children1 as $key1 => $value1) {
							$termsChild[$value->term_id][$value1] = array( "lv1" => get_term(intVal($value1), $type_search));
							$term_children2 = get_term_children(intVal($value1), $type_search);
							// var_dump($term_children2);
							foreach ($term_children2 as $key2 => $value2) {
								$termsChild[$value->term_id][$value1]['lv2'][] = get_term(intVal($value2), $type_search);
							}
							unset($term_children1[$key1]);
						}
						// $termsChild[$value->id] = 
					}
					echo json_encode(array('has' => true, "data" => array('term_parent' => $terms_parent, 'term_child' => $termsChild)));
					die();
				}
			}
		}
		echo json_encode(array('has' => false, "message" => "Data is empty!"));
		die();
	}
?>