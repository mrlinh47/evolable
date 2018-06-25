<div class="latest-column gray-bg">
  	
  	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="title-blk">
				<h2 class="title-h">
				<?php if (qtrans_getLanguage()=='ja'){ ?>
                	最新コラム
	            <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
	                Column mới
	            <?php }else if (qtrans_getLanguage()=='en'){ ?> 
	                Latest column
	            <?php } ?>
	        </h2>
	        <?php switch_to_blog(3); ?> 
			  <a href="<?php echo get_site_url().'/'.qtranxf_getLanguage().'/column'; ?>" class="view-more-btn">
			   <?php if (qtrans_getLanguage()=='ja'){ ?>
			          一覧を見る
			      <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
			          Xem danh sách
			      <?php }else if (qtrans_getLanguage()=='en'){ ?> 
			          Details
			      <?php } ?>
			      </a>
			  <?php restore_current_blog();
			?>

			</div>
			
			
			</div>
		</div>
		<div class="row">

			<?php
				switch_to_blog(3);
			    	global $post;
			 
				    $posts = get_posts( array(
				        'posts_per_page' => 4,
				        'post_type' => 'columns',
				        'post_status'=>'publish',
				        'orderby' => 'post_date',
		 				'order' => 'DESC',
				    ) );
				 	
				    if ($posts) {
				        foreach ($posts as $post) :
				?>
				<div class="col-md-3">
				<div class="column-blk">
						<?php if ( has_post_thumbnail()) :
							the_post_thumbnail(array(218, 130));
						 endif; ?>
						<a href="<?php echo get_permalink(); ?>" class="news-title"><?php echo mb_strimwidth(get_the_title(), 0, 30, '...'); ?></a>
						<p><?php echo mb_strimwidth(wp_strip_all_tags($post->post_content), 0, 75, '...'); ?></p>
						<span class="column-date">― <?php the_modified_time('Y.m.d'); ?> UPDATE</span>
					</div>
			</div>




				
			        <?php
			        endforeach;
			        wp_reset_postdata();
			    }
			    restore_current_blog();
		    ?>

		</div>
	 </div>
  </div>
  
  <div class="interview-top">

					<?php
  		switch_to_blog(3);
  			global $post;
			$posts = array(
				'post_type'         => 'interviews',
				'posts_per_page'    => 1,
				'post_status'=>'publish',
				'orderby'           => 'date',
				'order'             => 'ASC',
				'meta_query' => array(
			        array(
			            'key'     => 'interviews-candidate',
			            'value'   => 'candidate',
			        ),
			    ),
			);
			$query = new WP_Query( $posts );
			if ( $query->have_posts() ) {
			$query->the_post();
				$thumb_id = get_post_thumbnail_id($post->ID);
					$image_thumb1 = wp_get_attachment_image_src( $thumb_id, 'thumb-interview-page' );
					$image_thumb2 = wp_get_attachment_image_src( $thumb_id, 'thumb-news-index' );
					$image_full = wp_get_attachment_image_src( $thumb_id, 'medium' );

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
		             $termCompany = get_the_terms($post->ID, "interviews-company");
		            // print_r($termCompany);
		            
				?>
				<div class="inter-big" style="background:url(<?php echo $image_src ;?>) no-repeat top left;background-size:cover;">
				<div class="inter-big-overlay">
					<a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a>
					<p><?php echo mb_strimwidth(wp_strip_all_tags(get_the_content($post->ID)), 0, 80, '...'); ?></p>
					<div class="inter-name">
						<label><?php echo get_post_meta(get_the_ID(),'_eaa_interview_author_romanji_value',true);?></label>
						<span><?php echo $termCompany[0]->name;?></span>
					</div>
				</div>
</div>

				<?php	
			wp_reset_postdata();
			}
			restore_current_blog();
  		?>

  			
			<div class="inter-bg">
				<div class="title-blk">
					<h2>Interview</h2>
			    <?php switch_to_blog(3); ?> 
			  <a href="<?php echo get_site_url().'/'.qtranxf_getLanguage().'/interviews'; ?>" class="view-more-btn no-bg">
			   <?php if (qtrans_getLanguage()=='ja'){ ?>
			          一覧を見る
			      <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
			          Xem danh sách
			      <?php }else if (qtrans_getLanguage()=='en'){ ?> 
			          Details
			      <?php } ?>
			      </a>
			  <?php restore_current_blog();
			?>
				
				</div>
				
				
				<div class="inter-list">
				
					<?php
  		switch_to_blog(3);
  			global $post;
			$posts = array(
				'post_type'         => 'interviews',
				'posts_per_page'    => 2,
				'post_status'=>'publish',
				'orderby'           => 'date',
				'order'             => 'DESC',
				'meta_query' => array(
			        array(
			            'key'     => 'interviews-candidate',
			            'value'   => 'candidate',
			        ),
			    ),
			    
			);
			$query = new WP_Query( $posts );
			if ( $query->have_posts() ) {
			while ( $query->have_posts() ) : $query->the_post();
				$thumb_id = get_post_thumbnail_id($post->ID);
					$image_thumb1 = wp_get_attachment_image_src( $thumb_id, array('250','150'),true  );
					$image_thumb2 = wp_get_attachment_image_src( $thumb_id, 'thumb-news-index' );
					$image_full = wp_get_attachment_image_src( $thumb_id, 'full' );//array('250','150'),true 

					$image_src = "";
					if($thumb_id != ""){
						$image_src = $image_thumb1[0];
					}else{
						$image_src = get_template_directory_uri() ."/images/avatar_1.jpg";
					}
					
		             $termCompany = get_the_terms($post->ID, "interviews-company");
		           // print_r($termCompany);
		            
				?>
				<div class="inter-blk">
					<img src="<?php echo $image_src; ?>" >
					<a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a>

					<div class="inter-name">
						<label><?php echo get_post_meta(get_the_ID(),'_eaa_interview_author_romanji_value',true);?></label>
						<span><?php echo $termCompany[0]->name;?></span>
					</div>
				</div>


				<?php	endwhile;
			wp_reset_postdata();
			}
			restore_current_blog();
  		?>
				</div>
			</div>
  	</div>
  	
  	 <div class="recommend-job">
   	<div class="container">
   		<div class="row">
   			<div class="col-md-12">
   				<h2>
   				<?php if (qtrans_getLanguage()=='ja'){ ?>
	            	おすすめの求人
		        <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
		            おすすめの求人
		        <?php }else if (qtrans_getLanguage()=='en'){ ?> 
		            おすすめの求人
		        <?php } ?>
		    </h2>
   			</div>
   		</div>
   		<div class="row">
   			<?php
                global $post;
             
                $posts = get_posts( array(
                    'posts_per_page' => 8,
                    'post_type' => 'jobs',
                    'post_status'=>'publish',
                    'orderby'   => 'rand',
                ) );
             
                if ($posts) {
                    foreach ($posts as $post) : 
                        setup_postdata($post); 
                        $term_positions = get_the_terms($post->ID, "job-position");
                        $term_locations = get_the_terms($post->ID, 'job-location');
                       // print_r($termCompany);
                        ?>



                        <div class="col-md-3 col-sm-6 recruit">
   				<div class="job-blk">
   					<img src="<?php
							if ( get_field('default_image') ) {
								echo get_field('default_image');
							}
							else {
								echo get_template_directory_uri()."/images/recruitment/hinh-1.jpg";
							}
						?>" alt="<?php the_title();?>" />
   					<a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a>
  					<div class="job-if"><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-money.png" >
  						<?php
							 if ( !is_null(get_field('salary')) ) :
								echo mb_strimwidth(wp_strip_all_tags(get_field('salary')), 0, 20, '...');
							endif; ?></div>
  					<div class="job-if map-location"><img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-map.png" >
	  					<?php 
							if($term_locations){
							foreach ($term_locations as $location) { 
								$loca = $location->name . ", ";
								echo mb_strimwidth(wp_strip_all_tags($loca), 0, 12, '...');
							//echo $location->name . ", ";
						} } ?>
					</div>
  					<span class="job-date">― <?php the_modified_time('Y.m.d'); ?> UPDATE</span>
   				</div>
   			</div>  
                    <?php
                    endforeach;
                    wp_reset_postdata();
                }
            ?>

   			</div>
   		</div>
   	</div>