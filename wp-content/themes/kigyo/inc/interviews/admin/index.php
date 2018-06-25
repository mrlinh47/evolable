<?php

//die('aaa');

/*
 * This file is custom post type, custom taxonomy and custom fields
 * definition file.
 * 
 * Exported from CPT UI & Advanced Custom Fields
 */

/* ---------------------------------------------------------------------------- */
/* post type definitions */
/* ---------------------------------------------------------------------------- */
add_action('init', 'interviews_post');
add_action('init', 'interviews_post_field');
add_action('init', 'interviews_tax');
add_theme_support( 'post-thumbnails', array( 'post', 'interviews' ) );
function interviews_post() {
    $labels = array(
        "name" => "Interviews",
        "singular_name" => "Interviews",
    );
    $args = array(
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_ui" => true,
        "has_archive" => true,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "page",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array("slug" => "interview", "with_front" => true),
        "query_var" => true,
        "menu_icon" => get_template_directory_uri() . '/images/ad-ico/h7.png',
        'supports'=> array( 'title', 'editor', 'thumbnail'),

    );
    register_post_type("interviews", $args);
}


function interviews_tax() {
    $labels = array(
        "name" => "Company",
        "label" => "Company",
    );

    $args = array(
        "labels" => $labels,
        "hierarchical" => true,
        "label" => "Company",
        "show_ui" => true,
        "query_var" => true,
        "rewrite" => array('slug' => 'interviews-company', 'with_front' => true),
        'with_thumbnail' => true,
        "show_admin_column" => false,
    );
    register_taxonomy("interviews-company", array("interviews"), $args); 
}

function interviews_post_field(){
    if (function_exists("register_field_group")) {
        register_field_group(array(
            'id' => 'acf_interviews',
            'title' => 'Interviews',
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'interviews',
                        'order_no' => 0,
                        'group_no' => 0,
                    ),
                ),
            ),
            'options' => array(
                'position' => 'normal',
                'layout' => 'no_box',
                'hide_on_screen' => array(
                ),
            ),
            'menu_order' => 0,
            'fields' => array(
                array (
                        'key' => 'field_interviews_position',
                        'label' => 'Position',
                        'name' => 'position',
                        'type' => 'text',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'none',
                        'maxlength' => '',
                ),
                array (
                    'key' => 'field_interviews_block_info',
                    'label' => 'Interviews Information',
                    'name' => 'interviews_block_info',
                    'type' => 'repeater',
                    'row_min' => '',
                    'row_limit' => '',
                    'layout' => 'row',
                    'button_label' => 'Add new [Question - Answer]',
                    'sub_fields' => array(
                        array (
                                'key' => 'field_interviews_block_info_image',
                                'label' => 'Default Image',
                                'name' => 'image',
                                'type' => 'image',
                                'save_format' => 'url',
                                'preview_size' => 'thumbnail',
                                'library' => 'all',
                        ),
                        array (
                                'key' => 'field_interviews_block_info_question',
                                'label' => 'Question',
                                'name' => 'question',
                                'type' => 'text',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                        ),
                        array (
                                'key' => 'field_interviews_block_info_description',
                                'label' => 'Description',
                                'name' => 'description',
                                'type' => 'wysiwyg',
                                'default_value' => '',
                                'toolbar' => 'full',
                                'media_upload' => 'no',
                        )

                    )
                )



            )
        ));
    }
}



//add meta custom 
add_action( 'add_meta_boxes', 'interviews_custom_meta' );
function interviews_custom_meta() {
    add_meta_box( 'interviewsMeta','Interviews Filter Type', 'interviews_filter', 'interviews','side' );
}
function interviews_filter( $post ) {
    $featured = get_post_meta( $post->ID );
    ?>

        <h4>Interview type</h4>
        <div>
            <label for="interviews-candidate">
                <input type="radio" name="interviews-candidate" id="interviews-candidate" value="candidate" <?php if ( isset ( $featured['interviews-candidate'] ) ) checked( $featured['interviews-candidate'][0], 'candidate' ); else echo 'checked'; ?> />
                Candidate</label>
        </div>
        <p></p>
        <div>
            <label for="interviews-customer">
                <input type="radio" name="interviews-candidate" id="interviews-customer" value="customer" <?php if ( isset ( $featured['interviews-candidate'] ) ) checked( $featured['interviews-candidate'][0], 'customer' ); ?> />
                Customer
            </label>
        </div>

        <div>
            
        </div>

<?php $related = get_posts(array( 
        'numberposts' => -1,
        'post_type' => 'interviews',
        'meta_query' => array(
            array(
                'key'   => 'interviews-candidate',
                'value' => 'customer',
            )
        )
    ));
    if( $related ){ ?>

    <div class="candidate_by_customer" style="display:none;">
        <h4>Interview by</h4>
        <select name="candidate_by_customer">
            <option disabled value <?php if(!isset ( $featured['candidate_by_customer'])) echo 'selected="selected"';?> > -- select an Customer -- </option>

            <?php foreach( $related as $post ) {
                setup_postdata($post); 
            ?>

            <option value="<?php echo $post->ID;?>" <?php if ( isset ( $featured['candidate_by_customer'] ) && ($featured['candidate_by_customer'][0] == $post->ID )  ) echo 'selected="selected"' ?>><?php echo $post->post_title; ?></option>
            <?php } ?>
        </select>
    </div>

<?php } ?>
   
<script>
    jQuery(function($){
        //trick for custom field cover Image create by acf
        var html = '<div id="interview_customfield" class="postbox">';
            html += '<div class="handlediv" title="Click to toggle"><br></div>';
            html += '<h3 class="hndle ui-sortable-handle">';
            html += '    <span>Interview Option</span>';
            html += '</h3>';
            html += '</div>';
            html += '<style>.add-row-interview{background: #00a0d2;color: #fff !important;font-weight: bold;padding: 10px;text-decoration: none;display:inline-block;}#side-sortables #interview_customfield label{font-weight:bold;}#side-sortables #interview_customfield .inside{border-bottom:1px dotted #ededed;padding-bottom:10px; padding-bottom: 25px;}</style>';
            $('#side-sortables').prepend(html);
            $('[data-field_key="field_interviews_cover_image"]').appendTo($('#side-sortables #interview_customfield')).wrap('<div class="inside"></div>');            
            $('#side-sortables #interviewsMeta .inside').appendTo($('#side-sortables #interview_customfield'));

            $('[data-field_key="field_interviews_position"]').appendTo($('#side-sortables #interview_customfield')).wrap('<div class="inside"></div>');
            $('[data-field_key="field_interviews_position"]').closest('.inside').hide();


            $('[data-field_name="interviews_block_info"]').find('.repeater-footer').hide();
            $('<a href="javascript:;" class="btn add-row-interview">Add more [Question - Answer]</a>').appendTo($('#side-sortables #interview_customfield')).wrap('<div class="inside"></div>');;
            $('#side-sortables #interview_customfield').on('click','.add-row-interview',function(){
                $('[data-field_name="interviews_block_info"]').find('.acf-button').trigger('click');
                

                $('html, body').animate({
                    scrollTop: $('[data-field_name="interviews_block_info"]').find('table .row').last().offset().top - 50
                }, 500);
                $('[data-field_name="interviews_block_info"]').find('.repeater-footer').show();


            });




            //
            if($("input[name='interviews-candidate'][value='candidate']:checked").length > 0) {
                $('.candidate_by_customer').fadeIn(500);
                $('[data-field_key="field_interviews_position"]').closest('.inside').fadeIn(500);
            }
            $("input[name='interviews-candidate']").on("change",function(){
                var value = $(this).val();
                if(value ==='candidate'){
                    $('.candidate_by_customer').fadeIn(500);
                    $('[data-field_key="field_interviews_position"]').closest('.inside').fadeIn(500);
                }
                else{
                    $('.candidate_by_customer').fadeOut(500);
                    $('[data-field_key="field_interviews_position"]').closest('.inside').fadeOut(500);
                }
            });



        




    });
    
</script>
 
<?php
}


add_action( 'save_post', 'interviews_meta_save' );
function interviews_meta_save( $post_id ) {
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'interviews_nonce' ] ) && wp_verify_nonce( $_POST[ 'interviews_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
    if( isset( $_POST[ 'interviews-candidate' ] ) ) {
        update_post_meta( $post_id, 'interviews-candidate', $_POST[ 'interviews-candidate' ] );
        if($_POST['interviews-candidate'] == 'candidate'){
            update_post_meta( $post_id, 'candidate_by_customer', $_POST[ 'candidate_by_customer' ] );
        }
    }

 
}

//rename default category 
// wp_update_term(1, 'category', array(
//   'name' => 'Prepare For Working',
//   'slug' => 'prepare-for-working', 
//   'description' => 'Default category'
// ));

function update_slug() {
    define('slug_recruitment', 'recruitment');
}
add_action( 'init', 'update_slug' );


//add metabox
add_action('add_meta_boxes', 'eaa_interview_add_meta_box');
add_action('save_post', 'eaa_interview_author_romanji_save_meta_box');
add_action('save_post', 'eaa_interview_link_save_meta_box');

//Add meta boxes for Skill
function eaa_interview_add_meta_box(){
    add_meta_box('eaa_interview_author_romanji', 'Name Romanji', 'eaa_interview_author_romanji_callback', 'interviews', 'advanced');
    add_meta_box('eaa_interview_link', 'Link', 'eaa_interview_link_callback', 'interviews', 'advanced');
}


//document file meta box
function eaa_interview_author_romanji_callback($post){

    wp_nonce_field( 'eaa_interview_author_romanji_save_meta_box', 'eaa_interview_author_romanji_meta_box_nonce');
    $value = get_post_meta($post->ID, '_eaa_interview_author_romanji_value', true);
    echo '<input type="text" class="widefat" id="eaa_interview_author_romanji_field" name="eaa_interview_author_romanji_field" value="'. esc_attr($value) .'" />';
    
}

function eaa_interview_author_romanji_save_meta_box($post_id){
    if(!isset($_POST['eaa_interview_author_romanji_meta_box_nonce'])){
        return;
    }

    if(!wp_verify_nonce($_POST['eaa_interview_author_romanji_meta_box_nonce'], 'eaa_interview_author_romanji_save_meta_box')){
        return;
    }

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
        return;
    }

    if(!current_user_can('edit_post', $post_id)){
        return;
    }

    if(!isset($_POST['eaa_interview_author_romanji_field'])){
        return;
    }

    $mydata = sanitize_text_field($_POST['eaa_interview_author_romanji_field']);
    update_post_meta( $post_id, '_eaa_interview_author_romanji_value', $mydata);
}

//document file meta box
function eaa_interview_link_callback($post){

    wp_nonce_field( 'eaa_interview_link_save_meta_box', 'eaa_interview_link_meta_box_nonce');
    $value = get_post_meta($post->ID, '_eaa_interview_link_value', true);
    if(empty($value)){
        $value = "#";
    }
    echo '<input type="text" class="widefat" id="eaa_interview_link_field" name="eaa_interview_link_field" value="'. esc_attr($value) .'" />';
    
}

function eaa_interview_link_save_meta_box($post_id){
    if(!isset($_POST['eaa_interview_link_meta_box_nonce'])){
        return;
    }

    if(!wp_verify_nonce($_POST['eaa_interview_link_meta_box_nonce'], 'eaa_interview_link_save_meta_box')){
        return;
    }

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
        return;
    }

    if(!current_user_can('edit_post', $post_id)){
        return;
    }

    if(!isset($_POST['eaa_interview_author_romanji_field'])){
        return;
    }

    $mydata = sanitize_text_field($_POST['eaa_interview_link_field']);
    update_post_meta( $post_id, '_eaa_interview_link_value', $mydata);
}

?>