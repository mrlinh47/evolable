<?php
	get_header();
    get_sidebar();
	global $post;
    $search_term = "[:".qtranxf_getLanguage()."]";
    $langCode =  qtranxf_getLanguage();
    $langImg ='';
    if($langCode!='ja'):
        $langImg ='_'.$langCode;
    endif;
?>
<div class="right-content">
    <div class="breadcrumb-bg">
        
        
        <div class="container">
        <div class="row">
            <div class="col-md-12">
        
        <div class="head-details">
        <span class="details-date">― <?php the_modified_time('Y.m.d'); ?> UPDATED</span>
                <ul class="tags-list">
                    <?php 
                        $term_positions = get_the_terms($post->ID, "job-position"); 
                        if($term_positions){
                            foreach ($term_positions as $position) {
                             ?>
                                <form action="<?php echo site_url( '/'.qtranxf_getLanguage().'/jobs/'); ?>" method="get">
                                    <input type="hidden" name="position" value="<?php echo $position->term_id ?>">
                                    <li><button type="submit" class="sing-jobs"><?php echo $position->name ?></button></li>
                                </form>
                            <?php }
                        } 
                        ?>
                        </ul>
                <h2><?php the_title();?></h2>   
                
                    <a class="more" href="<?php echo site_url( '/'.qtranxf_getLanguage().'/job-apply/?id='.$post->ID ); ?>">
                        <?php if (qtrans_getLanguage()=='ja'){ ?>
                            この求人に応募する
                        <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                            この求人に応募する
                        <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                            この求人に応募する
                        <?php } ?>
                    </a>
            
        </div>  
        
        </div>
        </div>
        </div>
        
    </div>
    
    
  
 
  
  
  <div class="details-content">
        <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="details">
                <?php 
                $recruitmend_ended= get_post_meta(get_the_ID(), 'custom_element_grid_class_meta_box', true);
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
          
                <ul class="info-dt">
                    <li>
                    <img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-money.png" >
                    <?php if( get_field('salary') != '' ) : ?>
                    <h3><?php echo get_field('salary'); ?></h3>
                    <?php endif; ?>
                    </li>
                    <li>
                    <img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-map.png" >
                    <h3>
                    <?php
                    $term_locations = get_the_terms($post->ID, 'job-location');
                    if( !empty( $term_locations ) ) : ?>
                            <?php
                            if (is_array($term_locations)){
                                foreach($term_locations as $location) :
                                    echo $location->name . ", ";
                                endforeach;
                            }
                            ?>
                    <?php endif; ?>
                    </h3>
                    </li>
                    <li>
                    <img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-clock.png" >
                    <h3>
                    <?php if( get_field('timework') != '' ) : ?>
                        <?php echo get_field('timework');?>
                    <?php endif; ?>
                    </h3>
                    </li>
                    <li>
                    <img src="<?php echo get_template_directory_uri(); ?>/new/img/icon-gift.png" >
                    
                    <?php if( get_field('holiday') != '' ) : ?>
                <h3><?php echo __('[:ja]福利厚生[:en]Benefit[:vi]Phúc lợi'); ?> - <?php echo __('[:ja]休日/休暇[:en]Holiday/Vacation[:vi]Nghỉ lễ/Nghỉ phép'); ?></h3>
                      <p><?php echo get_field('benefits');?><br><?php echo get_field('holiday');?></p>
                      
                <?php endif; ?>
                   
                    </li>
                </ul>
                </div>
              </div>
             <div class="col-md-6">
             <div class="gray-bg details-info">
             <h2><?php echo __('[:ja]仕事内容[:en]Jobs Description[:vi]mô tả công việc'); ?></h2>
<?php echo get_post_meta( $post->ID, 'detail', true ); ?>
         
         <h2><?php echo __('[:ja]必要経験[:en]Experience[:vi]Yêu cầu kinh nghiệm'); ?></h2>
        <?php echo get_post_meta( $post->ID, 'experience', true ); ?>
         
          <h2><?php echo __('[:ja]事業内容[:en]Company Information[:vi]Thông tin công ty') ?></h2>
        <?php echo get_post_meta( $post->ID, 'content', true );?>
         
         <h2><?php echo __('[:ja]その他[:en]Other[:vi]Thông tin khác') ?></h2>
         <?php echo wpautop($description);?>

         <h2><?php echo __('[:ja]スキル[:en]Skill[:vi]Kỹ năng') ?></h2>
         <ul class="skill-list">
         <?php
         $term_skills = get_the_terms($post->ID, 'job-skill');
            if (is_array($term_skills)):
                foreach($term_skills as $skill_item) :
                    echo "<li>". $skill_item->name ."</li>";
                endforeach;
            endif;
        ?>
        </ul>
             </div>
              </div> 
              
        </div>
         </div>
  </div>
  
  <!-- <?php //get_template_part( 'template-parts/content/content', 'recruitment' ); ?> -->
  
<?php get_footer();?>