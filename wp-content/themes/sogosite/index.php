<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 * Template Name: Home
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
get_header();
get_sidebar();
?>
<div class="right-content">
	<div class="top-intro">
		<div class="container">
		<div class="row">
		<div class="col-md-12">
		<?php if (qtrans_getLanguage()=='ja'){ ?>
            <h2>あなたの "パートナー" として</h2>
			<h1>あなたと企業が輝ける世界</h1>
			<h2>の実現を目指して</h2>
        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
            <h2>Là "đối tác" của bạn, </h2>
			<h1>chúng tôi mong muốn tạo ra một thế giới </h1>
			<h2>mà bạn và doanh nghiệp có thể tỏa sáng</h2>
        <?php }else if (qtrans_getLanguage()=='en'){ ?>
            <h2>As your "partner"</h2>
			<h1>The world where you and the company shine</h1>
			<h2>Aiming to realize</h2>
        <?php } ?>

			<ul class="flag-list">
				<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/new/img/flag-jp.png" ><a href="<?php echo get_site_url(); ?>/ja"> 日本語</a></li>
				<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/new/img/flag-en.png" ><a href="<?php echo get_site_url(); ?>/en"> English</a></li>
				<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/new/img/flag-vn.png" ><a href="<?php echo get_site_url(); ?>/vi"> Vietnamese</a></li>
			</ul>
			<?php if (qtrans_getLanguage()=='ja'){ ?>
            <p>当サイトでは、世界の様々な求人情報を取り扱っております。</p>
        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
            <p>Trang web này liên quan đến thông tin việc làm khác nhau của thế giới.</p>
        <?php }else if (qtrans_getLanguage()=='en'){ ?>
            <p>This site deals with various job information of the world.</p>
        <?php } ?>

	<div class="search-intro">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/new/img/search-w.png" >
		<?php if (qtrans_getLanguage()=='ja'){ ?>
            求人情報を検索する
        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
            Tìm kiếm thông tin công việc
        <?php }else if (qtrans_getLanguage()=='en'){ ?>
            Search job
        <?php } ?>
		<ul class="search-list-btn">
			<li><a href="#place-box" class="fancybox">
				<?php if (qtrans_getLanguage()=='ja'){ ?>
	            	勤務地から探す
		        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
		            Nơi làm việc
		        <?php }else if (qtrans_getLanguage()=='en'){ ?>
		            Workplace
		        <?php } ?>
	        </a></li>
			<li><a href="#job" class="fancybox">
				<?php if (qtrans_getLanguage()=='ja'){ ?>
	            	職種から探す
		        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
		            Nghề nghiệp
		        <?php }else if (qtrans_getLanguage()=='en'){ ?>
		            Occupation
		        <?php } ?>
		    </a></li>
			<li><a href="#key-word" class="fancybox">
				<?php if (qtrans_getLanguage()=='ja'){ ?>
	            	キーワードから探す
		        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
		            Từ khóa
		        <?php }else if (qtrans_getLanguage()=='en'){ ?>
		            Keyword
		        <?php } ?>
		    </a></li>
		</ul>
	</div>

		</div>
		</div>
		</div>
	</div>

	<div class="news-top">
		<div class="container">
		<div clss="row">
		<div class="col-md-12">
		<div class="title-blk">
			<h2 class="title-h">
				<?php if (qtrans_getLanguage()=='ja'){ ?>
	            	ニュースリリース
		        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
		            Tin tức mới
		        <?php }else if (qtrans_getLanguage()=='en'){ ?>
		            News release
		        <?php } ?>
		    </h2>

		    <?php
				switch_to_blog(3); ?> 
				<a href="<?php echo get_site_url().'/'.qtranxf_getLanguage().'/newsrelease'; ?> " class="view-more-btn">
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
		<ul class="news-list">
			<?php
				switch_to_blog(3);
				global $post;
						    $posts = get_posts( array(
						        'posts_per_page' => 3,
						        'post_type' => 'newsrelease',
						        'post_status'=>'publish',
						        'orderby' => 'post_date',
				 				'order' => 'DESC',
						    ) );
			if ($posts) {
						        foreach ($posts as $post) :
						            setup_postdata($post);
						?>
			    <li>
				<label class="news-date"><?php echo get_the_date('Y.m.d'); ?></label>
				<ul class="categories-list">
					<?php
						foreach((get_the_category()) as $key => $category) {
							$category_link = get_category_link($category->cat_ID); ?>

						    <li>
						    	<?php if (qtrans_getLanguage()=='en'){ ?>
						<a class="<?php echo ($key%2) ? "blue" : "pink"; ?>" href="<?php echo str_replace("/en/company/blog/","/company/en/",$category_link); ?>"><?php echo $category->cat_name; ?></a>

			        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
			            <a class="<?php echo ($key%2) ? "blue" : "pink"; ?>" href="<?php echo str_replace("/vi/company/blog/","/company/vi/",$category_link); ?>"><?php echo $category->cat_name; ?></a>
			        <?php }else if (qtrans_getLanguage()=='ja'){ ?>
			            <a class="<?php echo ($key%2) ? "blue" : "pink"; ?>" href="<?php echo str_replace("/ja/company/blog/","/company/ja/",$category_link); ?>"><?php echo $category->cat_name; ?></a>
			        <?php } ?>
					</li>

					<?php	}
					?>
					</ul>
				

					<?php if (qtrans_getLanguage()=='en'){ ?>
						<a href="<?php echo str_replace("/en/company/","/company/en/newsrelease/",get_permalink()); ?>" class="news-title"><?php echo get_the_title(); ?></a>

			        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
			            <a href="<?php echo str_replace("/vi/company/","/company/vi/newsrelease/",get_permalink()); ?>" class="news-title"><?php echo get_the_title(); ?></a>
			        <?php }else if (qtrans_getLanguage()=='ja'){ ?>
			            <a href="<?php echo str_replace("/ja/company/","/company/ja/newsrelease/",get_permalink()); ?>" class="news-title"><?php echo get_the_title(); ?></a>
			        <?php } ?>


			</li>
		<?php
		endforeach;
		wp_reset_postdata();
		}
		restore_current_blog();

		?>
		</ul>
		</div>
		</div>
		</div>
	</div>


	<div class="column-top">
		<div class="container">
		<div clss="row">
		<div class="col-md-12">
			<div class="title-blk">
				<h2 class="title-h">
					<?php if (qtrans_getLanguage()=='ja'){ ?>
		            	最新コラム
			        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
			            Articles mới
			        <?php }else if (qtrans_getLanguage()=='en'){ ?>
			            Latest articles
			        <?php } ?>
		    	</h2>

					
			         <?php
				switch_to_blog(3); ?> 
				<a href="<?php echo get_site_url().'/'.qtranxf_getLanguage().'/column'; ?> " class="view-more-btn">
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
<div class="owl-carousel owl-theme column-carousel">
<?php 
if(is_multisite()){
    global $wpdb;
    $blogs = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->blogs WHERE spam = '0' AND deleted = '0' and archived = '0' and public='1'"));
    if(!empty($blogs)){
        ?><?php
        foreach($blogs as $blog){
            switch_to_blog($blog->blog_id);
            $details = get_blog_details($blog->blog_id);
             $q = new WP_Query(
        array(
            'posts_per_page' => 6,
	        'post_type' => 'columns',
	        'post_status'=>'publish',
	        'orderby' => 'post_date',
				'order' => 'DESC',
        )
    );
            // print_r($q);
            if($q->have_posts()){
                while($q->have_posts()){
                    $q->the_post(); 
                    $postURI = get_permalink( $post->ID );
                    if(qtranxf_getLanguage().'/search'){
                    	$linkPost= str_replace("/".qtranxf_getLanguage()."/search/","/search/".qtranxf_getLanguage()."/",$postURI);
                    }elseif(qtranxf_getLanguage().'/company'){
                    	$linkPost= str_replace("/".qtranxf_getLanguage()."/company/","/company/".qtranxf_getLanguage()."/",$postURI);
                    }else{
                    	$linkPost =$postURI;
                    }
                    
                   
						 	$post_id = $post->ID;
						 	if(qtranxf_isAvailableIn($post_id, 'vi') && qtranxf_getLanguage() == 'vi'){ // no En content
							   
					?>	 
                   <div class="item">
					<div class="column-blk">
						<?php if ( has_post_thumbnail()) :
							the_post_thumbnail('medium');
						 endif; ?>
						 <a href="<?php echo $linkPost; ?>" class="news-title"><?php echo mb_strimwidth(get_the_title(), 0, 30, '...'); ?></a>
						 <h3>

						 </h3>

						<?php echo mb_strimwidth(wp_strip_all_tags($post->post_content), 0, 75, '...'); ?>
						<span class="column-date">― <?php the_modified_time('Y.m.d'); ?> UPDATE</span>
					</div>
				</div> 

				<?php }
				if(qtranxf_isAvailableIn($post_id, 'ja') && qtranxf_getLanguage() == 'ja'){ ?>
					 <div class="item">
					<div class="column-blk">
						<?php if ( has_post_thumbnail()) :
							the_post_thumbnail('medium');
						 endif; ?>
						 <a href="<?php echo $linkPost; ?>" class="news-title"><?php echo mb_strimwidth(get_the_title(), 0, 30, '...'); ?></a>
						 <h3>

						 </h3>

						<?php echo mb_strimwidth(wp_strip_all_tags($post->post_content), 0, 75, '...'); ?>
						<span class="column-date">― <?php the_modified_time('Y.m.d'); ?> UPDATE</span>
					</div>
				</div> 


				<?php } 
				if(qtranxf_isAvailableIn($post_id, 'en') && qtranxf_getLanguage() == 'en'){?>
					 <div class="item">
					<div class="column-blk">
						<?php if ( has_post_thumbnail()) :
							the_post_thumbnail('medium');
						 endif; ?>
						 <a href="<?php echo $linkPost; ?>" class="news-title"><?php echo mb_strimwidth(get_the_title(), 0, 30, '...'); ?></a>
						 <h3>

						 </h3>

						<?php echo mb_strimwidth(wp_strip_all_tags($post->post_content), 0, 75, '...'); ?>
						<span class="column-date">― <?php the_modified_time('Y.m.d'); ?> UPDATE</span>
					</div>
				</div>
			<?php } ?>
                 <?php   break;
                }
           
            }
            wp_reset_query();
            restore_current_blog();
        }
    }
}
?>


			</div>
		</div>
		</div>
		</div>
	</div>

  	<div class="why-top">
  		<div class="container">
		<div clss="row">
		<div class="col-md-12">
			<div class="center">
				<h2 class="title-br"><?php echo get_field('title_eaa'); ?></h2>
			</div>
			<?php echo get_field('content_eaa'); ?>
		</div>
		</div>
		</div>
  	</div>

  	<div class="feature-top">
  		<div class="container">
		<div clss="row">
		<div class="col-md-12">
			<div class="center">
				<h2 class="title-br"><?php echo get_field('3_strengths'); ?></h2>
			</div>
		</div>
		</div>
		<div clss="row">
			<div class="col-md-4">
				<div class="feature-blk">
					<h3><?php echo get_field('title_strength1'); ?></h3>
					<?php
						$image1 = get_field('image_strength1');
						$imageAlt = esc_attr($image1['alt']);
						$imageURL = esc_url($image1['url']);
						$imageThumbURL = esc_url($image1['sizes']['medium']);
					 ?>
			    	<img src="<?php echo $imageThumbURL;?>">
					<p><?php echo get_field('content_strength1'); ?></p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="feature-blk">
					<h3><?php echo get_field('title_strength2'); ?></h3>
					<?php
						$image1 = get_field('image_strength2');
						$imageAlt = esc_attr($image1['alt']);
						$imageURL = esc_url($image1['url']);
						$imageThumbURL = esc_url($image1['sizes']['medium']);
					 ?>
			    	<img src="<?php echo $imageThumbURL;?>">
					<p><?php echo get_field('content_strength2'); ?></p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="feature-blk">
					<h3><?php echo get_field('title_strength3'); ?></h3>
					<?php
						$image1 = get_field('image_strength3');
						$imageAlt = esc_attr($image1['alt']);
						$imageURL = esc_url($image1['url']);
						$imageThumbURL = esc_url($image1['sizes']['medium']);
					 ?>
			    	<img src="<?php echo $imageThumbURL;?>">
					<p><?php echo get_field('content_strength3'); ?></p>
				</div>
			</div>
		</div>
		<div clss="row">
		<div class="col-md-12">
			<div class="center">
				<?php switch_to_blog(3); ?> 
					<a href="<?php echo get_site_url().'/'.qtranxf_getLanguage().'/about'; ?>" class="view-more-btn">
						<?php if (qtrans_getLanguage()=='ja'){ ?>
		            	もっと詳しく
			        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
			            Tìm hiểu thêm
			        <?php }else if (qtrans_getLanguage()=='en'){ ?>
			            Details
			        <?php } ?>
					</a>
					<?php restore_current_blog();
				?>
			</div>
		</div>
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
			            'value'   => 'customer',
			        ),
			    ),
			);
			$query = new WP_Query( $posts );
			if ( $query->have_posts() ) {

				$taxonomies = array('interviews-company');
				$check_later = array();
				    global $wp_taxonomies;
				    foreach($taxonomies as $taxonomy){
				        if (isset($wp_taxonomies[$taxonomy])){
				            $check_later[$taxonomy] = false;
				        } else {
				            $wp_taxonomies[$taxonomy] = true;
				            $check_later[$taxonomy] = true;
				        }
				    }

				    $args       = array('hide_empty' => false);
				    $terms      = get_terms($taxonomies, $args );


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
					<?php if (qtrans_getLanguage()=='ja'){ ?>
                        <a href="<?php echo str_replace("/ja/company/","/company/ja/interview/",get_permalink($post->ID)); ?>"><?php echo get_the_title($post->ID); ?></a>
                    <?php }else if (qtrans_getLanguage()=='vi'){ ?>
                        <a href="<?php echo str_replace("/vi/company/","/company/vi/interview/",get_permalink($post->ID)); ?>"><?php echo get_the_title($post->ID); ?></a>
                    <?php }else if (qtrans_getLanguage()=='en'){ ?>
                        <a href="<?php echo str_replace("/en/company/","/company/en/interview/",get_permalink($post->ID)); ?>"><?php echo get_the_title($post->ID); ?></a>
                    <?php } ?>
					<p><?php echo mb_strimwidth(wp_strip_all_tags(get_the_content($post->ID)), 0, 80, '...'); ?></p>
					<div class="inter-name">
						<label><?php echo get_post_meta(get_the_ID(),'_eaa_interview_author_romanji_value',true);?></label>
						<span><?php
							foreach ($termCompany as $key => $term) {
								echo $term->name;
							 }
							?></span>
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
			            'value'   => 'customer',

			        ),
			    ),

			   // 'taxonomies' => array('interviews-company'),

			);
			$query = new WP_Query( $posts );
			//print_r($query);
			if ( $query->have_posts() ) {
				$taxonomies = array('interviews-company');
				$check_later = array();
				    global $wp_taxonomies;
				    foreach($taxonomies as $taxonomy){
				        if (isset($wp_taxonomies[$taxonomy])){
				            $check_later[$taxonomy] = false;
				        } else {
				            $wp_taxonomies[$taxonomy] = true;
				            $check_later[$taxonomy] = true;
				        }
				    }

				    $args       = array('hide_empty' => false);
				    $terms      = get_terms($taxonomies, $args );
				//print_r($terms);
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
					////////////////////////////////////////////////////////////////////////
					/*$taxonomies = array('interviews-company');

				    $check_later = array();
				    global $wp_taxonomies;
				    foreach($taxonomies as $taxonomy){
				        if (isset($wp_taxonomies[$taxonomy])){
				            $check_later[$taxonomy] = false;
				        } else {
				            $wp_taxonomies[$taxonomy] = true;
				            $check_later[$taxonomy] = true;
				        }
				    }

				    $args       = array('hide_empty' => false);
				    $terms      = get_terms($taxonomies, $args );

				  $ter ='';
				    foreach ($terms as $key => $term) {
				    	$ter = $term->name;
				    }
*/

					/////////////////////////////////////////////////////////////////////////////////////////
		             $termCompany = get_the_terms($post->ID, "interviews-company");

				?>
				<div class="inter-blk">
					<img src="<?php echo $image_src; ?>" >
					<?php if (qtrans_getLanguage()=='ja'){ ?>
                        <a href="<?php echo str_replace("/ja/company/","/company/ja/interview/",get_permalink($post->ID)); ?>"><?php echo get_the_title($post->ID); ?></a>
                    <?php }else if (qtrans_getLanguage()=='vi'){ ?>
                        <a href="<?php echo str_replace("/vi/company/","/company/vi/interview/",get_permalink($post->ID)); ?>"><?php echo get_the_title($post->ID); ?></a>
                    <?php }else if (qtrans_getLanguage()=='en'){ ?>
                        <a href="<?php echo str_replace("/en/company/","/company/en/interview/",get_permalink($post->ID)); ?>"><?php echo get_the_title($post->ID); ?></a>
                    <?php } ?>


					<div class="inter-name">
						<label><?php echo get_post_meta(get_the_ID(),'_eaa_interview_author_romanji_value',true);?></label>
						<span>
							<?php
							foreach ($termCompany as $key => $term) {
								echo $term->name;
							 }
							?></span>
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



  	<div class="client-top">
  		<div class="container">
		<div clss="row">
		<div class="col-md-12">
			<div class="center">
				<h2 class="title-h"><?php echo get_field('title_company'); ?></h2>
				<ul class="client-list">
					<?php
						$images = acf_photo_gallery('logo_company', get_the_ID());
						if( $images ):
					?>

				    <?php foreach( $images as $key => $image ): ?>
				        <li>
				            <img src="<?php echo $image['full_image_url']; ?>"  >
				        </li>
				    <?php endforeach;
				  		endif;
				  	?>
				</ul>
			</div>
		</div>
		</div>
		</div>
  	</div>
<?php
get_footer();
