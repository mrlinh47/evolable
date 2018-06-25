<?php

function get_locations() {
    $args = array(
        'orderby' => 'count',
        'hide_empty' => 0
    );
    $locations = get_terms('job-location', $args);
    $plocations = array();
    foreach ($locations as $key => $location) {
        if ($location->parent == 0) {
            //if (!isset($plocations[$location->parent][1])) {
            //$plocations[$location->parent][1] = array();
            //}
            //$plocations[$location->parent][1][] = $location;
            $plocations[$location->term_id] = array($location);


            unset($locations[$key]);
            foreach ($locations as $key1 => $location1) {
                if($location1->parent === $location->term_id){
                    $plocations[$location1->term_id] = array($location1);
                    unset($locations[$key1]);
                }
            }
        }
    }
    // var_dump($plocations);
    return $plocations;
}

function get_positions() {
    $args = array(
        'orderby' => 'count',
        'hide_empty' => 0
    );
    $positions = get_terms('job-position', $args);
    $lPositions = array();
    foreach ($positions as $key => $position) {
        if ($position->parent == 0) {
            //if (!isset($plocations[$location->parent][1])) {
            //$plocations[$location->parent][1] = array();
            //}
            //$plocations[$location->parent][1][] = $location;
            $lPositions[$position->term_id] = array($position);


            unset($lPositions[$key]);
            foreach ($positions as $key1 => $position1) {
                if($position1->parent === $position->term_id){
                    $lPositions[$position1->term_id] = array($position1);
                    unset($positions[$key1]);
                }
            }
        }
    }
    // var_dump($plocations);
    return $lPositions;
}

/**
 *
 * @param type $string
 * @return type
 */
function isJSON($string) {
    return is_string($string) && is_object(json_decode($string)) ? true : false;
}

/**
 *
 * @param type $option_name
 * @return type
 */
function job_get_option($option_name) {
    $data = get_option($option_name);
    if (isset($data[$option_name])) {
        //
        return $data[$option_name];
    }
    return NULL;
}

/* Filter Tiny MCE Default Settings */
//add_filter('tiny_mce_before_init', 'my_switch_tinymce_p_br');

/**
 * Switch Default Behaviour in TinyMCE to use "<br>"
 * On Enter instead of "<p>"
 *
 * @link https://shellcreeper.com/?p=1041
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/tiny_mce_before_init
 * @link http://www.tinymce.com/wiki.php/Configuration:forced_root_block
 */
function my_switch_tinymce_p_br($settings) {
    $settings['forced_root_block'] = false;
    return $settings;
}

/**
 * Returns a inline CSS passage that resizes
 * wp_editor()'s width and height.
 *
 * @param int $width
 * @param int $height
 *
 * usage: Call the function  wp_editor_resize($width, $height); before wp_editor()  is being called.
 *
 */
function wp_editor_resize($width = 0, $height = 0) {
    $style = '<style type="text/css">';
    if ($width) {
        $style .= '.wp-editor-container { width:' . $width . 'px !important; }';
    }
    if ($height) {
        $style .= '.wp-editor-area { height:' . $height . 'px !important; }';
    }
    $style .= "</style>";
    echo $style;
}

/**
 *
 */
add_action('admin_head', 'my_admin_custom_styles');

function my_admin_custom_styles() {
    $output_css = '<style type="text/css">
        .column-post_views{ width: 70px; }
        .column-status{ width: 100px; }
        .column-location{ width: 150px; }
        .column-position{ width: 150px; }
    </style>';
    echo $output_css;
}

// add column for jobs
add_filter('manage_jobs_posts_columns', 'columns_jobs_head');
add_action('manage_jobs_posts_custom_column', 'columns_jobs_content', 10, 2);

// ADD NEW COLUMNS
function columns_jobs_head($defaults) {
    $new_defaults = array();
    foreach ($defaults as $key => $value) {
        if ($key == 'cb') {
            $new_defaults["$key"] = $value;
            $new_defaults['job_no'] = 'Job No';
        } else if ($key == 'date') {
            $new_defaults['post_modified'] = 'Date Modified';
            $new_defaults['date'] = $value;
        } else {
            $new_defaults["$key"] = $value;
        }

    }

    return $new_defaults;
}

function columns_jobs_content($column_name) {
    if ($column_name == 'job_no') {
        $job_no = esc_html(get_post_meta(get_the_ID(), 'job_no', true));
        echo $job_no;
    }

    if ($column_name == 'post_modified') {
        $date = get_post_field('post_modified',  get_post());
        $date_modified = esc_html(date("Y/m/d H:i:s", strtotime($date)));
        echo $date_modified;
    }
}

add_filter('manage_edit-jobs_sortable_columns', 'sort_me');

function sort_me($defaults) {
    $defaults['job_no'] = 'job_no';
    $defaults['post_modified'] = 'post_modified';
    return $defaults;
}

add_filter('request', 'column_orderby');

function column_orderby($vars) {

    if (!is_admin()) {
        return $vars;
    }
    if (isset($vars['orderby']) && 'job_no' == $vars['orderby']) {

        $vars = array_merge($vars, array('meta_key' => 'job_no', 'orderby' => 'meta_value'));
    }
    return $vars;
}

// search custom field
if (is_admin()) {

    add_filter('posts_join', 'jobs_search_join');

    function jobs_search_join($join) {
        global $pagenow, $wpdb;
        // I want the filter only when performing a search on edit page of Custom Post Type named "segnalazioni"
        if(isset($_GET['s']) && isset($_GET['post_type'])){
            if (is_admin() && $pagenow == 'edit.php' && $_GET['post_type'] == 'jbos' && $_GET['s'] != '') {
                $join =' LEFT JOIN ' . $wpdb->postmeta . ' ON ' . $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
            }
        }
        return $join;
    }

    add_filter('posts_where', 'jobs_search_where');

    function jobs_search_where($where) {
        global $pagenow, $wpdb;

        // I want the filter only when performing a search on edit page of Custom Post Type named "segnalazioni"
        if(isset($_GET['s']) && isset($_GET['post_type'])){
            if (is_admin() && $pagenow == 'edit.php' && $_GET['post_type'] == 'jobs' && $_GET['s'] != '') {
                if (strlen(strstr($where, 'wp_posts.post_title')) > 0) {
                    $where = str_replace('wp_posts.post_title', '(wp_posts.post_title', $where);
                }
                if (strlen(strstr($where, "AND wp_posts.post_type = 'jobs'")) > 0) {
                    $where = str_replace("AND wp_posts.post_type = 'jobs'", ") AND wp_posts.post_type = 'jobs'", $where);
                }

                $where_arr = explode('AND', $where);
                if(is_array($where_arr) && !empty($where_arr)) {
                    $where_last = '';
                    foreach ($where_arr as $key => $condition) {
                        $relation_text = 'AND';
                        if ($key == 1) {
                            $relation_text = 'OR';
                        } else if($key == ( count($where_arr) - 1 )){
                            $relation_text = '';
                        }

                        if (strlen(strstr($condition, "wp_posts.post_type = 'jobs'")) > 0) {
                            $where_last .= $condition . $relation_text;
                        } else {
                            $where_last .= $condition . $relation_text;
                        }

                    }
                    $where = $where_last;
                }
            }
        }

        return $where;
    }

    function custom_search_query($query) {

        $custom_fields = array(
            // put all the meta fields you want to search for here
            'job_no'
        );
        $searchterm = $query->query_vars['s'];

        // we have to remove the "s" parameter from the query, because it will prevent the posts from being found
//        $query->query_vars['s'] = "";

        if ($searchterm != "") {
            $meta_query = array('relation' => 'OR');
            foreach ($custom_fields as $cf) {
                array_push($meta_query, array(
                    'key' => $cf,
                    'value' => $searchterm,
                    'compare' => 'LIKE'
                ));
            }
            $query->set("meta_query", $meta_query);
        };

    }

    add_filter("pre_get_posts", "custom_search_query");

    function jobs_search_distinct($where) {
        global $pagenow, $wpdb;
        if(isset($_GET['s']) && isset($_GET['post_type'])){
            if (is_admin() && $pagenow == 'edit.php' && $_GET['post_type'] == 'jobs' && $_GET['s'] != '') {
                return "DISTINCT";
            }
        }
        return $where;
    }

    add_filter('posts_distinct', 'jobs_search_distinct');
}
