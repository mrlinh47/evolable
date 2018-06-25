<?php

function banner_init() {
    $labels = array(
        "name" => "Banner",
        "singular_name" => "Banner",
    );

    $args = array(
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_ui" => true,
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "publicly_queryable" => false,
        "menu_position" => 20,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array("slug" => "banner", "with_front" => true),
        "query_var" => true,
        "supports" => array("title", "thumbnail"),
    );
    register_post_type("banner", $args);
}
add_action( 'init', 'banner_init' );

// metabox
function banner_add_meta_box() {
    add_meta_box( 'attributediv', __( 'Attribute', 'xxx' ), 'banner_attribute_meta_box', 'banner', 'normal', 'low' );
}
add_action( 'add_meta_boxes', 'banner_add_meta_box' );

function banner_attribute_meta_box( $post ) {
    $link = get_post_meta( $post->ID, '_banner_link', true ); ?>
    <input type="text" id="banner_link" name="_banner_link" value="<?php echo isset( $link ) ? $link : ''; ?>" style="width:100%;">
<?php
}

function banner_attribute_save( $post_id ) {
    if( isset( $_POST['_banner_link'] ) && $_POST['_banner_link'] != '' ) {
        $link = sanitize_text_field( $_POST['_banner_link'] );
        update_post_meta( $post_id, '_banner_link', $link );
    } else {
        delete_post_meta( $post_id, '_banner_link', '' );
    }        
}
add_action( 'save_post', 'banner_attribute_save' );
// end metabox

?>