<?php
/**
 * Plugin Name: Shortlink & File URL Column
 * Plugin URI:
 * Description: Adds a shortlink column in post/page, taxonomy and media manage screens. Also retrieves inner post shortlink button as for WP earlier than 4.4.
 * Version: 1.5
 * Author: Harry Mandilas
 * Author URI:
 * License: GPL2
 *
 * Copyright 2015  Harry Mandilas (email : harman79 at gmail.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110, USA
 */

if (!defined('ABSPATH')) {
    die('Get outta here!');
}

/* Code runs only if in admin screen */
if (is_admin()) {


// Add the settings link
    add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'slc79_action_links');

    function slc79_action_links($links)
    {
        $mylinks = array(
            '<a href="' . admin_url('options-general.php?page=shortlink-column') . '">Settings</a>',
        );
        return array_merge($links, $mylinks);
    }


// Get the options
    $options = get_option('slc79_options_val');

// Load the options
    if (file_exists(dirname(__FILE__) . '/shortlink-col-options.php')) {
        require_once(dirname(__FILE__) . '/shortlink-col-options.php');
    }


// Shortlink column definition
    function slc79_define_column($columns)
    {
        $columns = array_slice($columns, 0, count($columns), true) + array('slc79_col' => __('Shortlink', 'shortlink-column')) + array_slice($columns, count($columns), NULL, true);
        return $columns;
    }


// Define CSS
    if (!function_exists('slc79_col_css')) {
        function slc79_col_css()
        {
            $options = get_option('slc79_options_val');
            if (!isset($options['slc79_hide_text']) || $options['slc79_hide_text'] === 'default') { ?>
                <style type="text/css">
                    #slc79_col {
                        width: 200px;
                    }
                </style>
            <?php } else { ?>
                <style type="text/css">
                    #slc79_col {
                        width: 100px;
                    }
                </style>
            <?php } ?>
            <style type="text/css">
                .slc79_btn {
                    padding: 0 4px 1px !important;
                    margin-bottom: 6px !important;
                    display: inline !important;
                }

                .slc79_p {
                    display: inline;
                }
            </style>
        <?php }
    }
    add_action('admin_head', 'slc79_col_css');


// Create values for shortlink column in pages and posts
    if (!isset($options['slc79_hide_posts']) || $options['slc79_hide_posts'] === 'default') {
        function slc79_values_post_type($column_name, $id)
        {
            if ($column_name == 'slc79_col') {
                $options = get_option('slc79_options_val');
                if (!isset($options['slc79_hide_text']) || $options['slc79_hide_text'] === 'default') { ?>
                    <p class="slc79_p" id="slc79-<?php echo $id; ?>"><?php echo wp_get_shortlink($id); ?></p>
                <?php } else { ?>
                    <p style="display:none;" id="slc79-<?php echo $id; ?>"><?php echo wp_get_shortlink($id); ?></p>
                <?php }
                if (!isset($options['slc79_hide_btn']) || $options['slc79_hide_btn'] === 'default') { ?>
                    <button class="slc79_btn button button-small" type="button"
                            onclick="slc79_copyToClipboard('slc79-<?php echo $id; ?>')">Copy
                    </button>
                <?php }
            }
        }
    }


// Create values for shortlink column in media
    if (!isset($options['slc79_hide_media']) || $options['slc79_hide_media'] === 'default') {
        function slc79_values_media($column_name, $id)
        {
            if ($column_name == 'slc79_col') {
                $options = get_option('slc79_options_val');
                if (!isset($options['slc79_hide_text']) || $options['slc79_hide_text'] === 'default') { ?>
                    <p class="slc79_p" id="slc79-<?php echo $id; ?>"><?php echo wp_get_shortlink($id); ?></p>
                    <?php if (!isset($options['slc79_hide_btn']) || $options['slc79_hide_btn'] === 'default') { ?>
                        <button class="slc79_btn button button-small" type="button"
                                onclick="slc79_copyToClipboard('slc79-<?php echo $id; ?>')">Copy Shortlink
                        </button>
                    <?php } ?>
                    <p class="slc79_p" id="slc79_f-<?php echo $id; ?>"><?php echo wp_get_attachment_url($id); ?></p>
                    <?php if (!isset($options['slc79_hide_btn']) || $options['slc79_hide_btn'] === 'default') { ?>
                        <button class="slc79_btn button button-small" type="button"
                                onclick="slc79_copyToClipboard('slc79_f-<?php echo $id; ?>')">Copy FileURL
                        </button>
                    <?php } ?>
                <?php } else { ?>
                    <p style="display:none;" id="slc79-<?php echo $id; ?>"><?php echo wp_get_shortlink($id); ?></p>
                    <?php if (!isset($options['slc79_hide_btn']) || $options['slc79_hide_btn'] === 'default') { ?>
                        <button class="slc79_btn button button-small" type="button"
                                onclick="slc79_copyToClipboard('slc79-<?php echo $id; ?>')">Copy Shortlink
                        </button>
                    <?php } ?>
                    <p style="display:none;"
                       id="slc79_f-<?php echo $id; ?>"><?php echo wp_get_attachment_url($id); ?></p>
                    <?php if (!isset($options['slc79_hide_btn']) || $options['slc79_hide_btn'] === 'default') { ?>
                        <button class="slc79_btn button button-small" type="button"
                                onclick="slc79_copyToClipboard('slc79_f-<?php echo $id; ?>')">Copy FileURL
                        </button>
                    <?php } ?>
                <?php }

            }
        }
    }


// Create values for shortlink column in taxonomies
    if (!isset($options['slc79_hide_tax']) || $options['slc79_hide_tax'] === 'default') {
        function slc79_values_tax($value, $column_name, $term_id)
        {
            if ($column_name == 'slc79_col') {
                $screen = get_current_screen();
                $term = get_term($term_id, $screen->taxonomy);
                $options = get_option('slc79_options_val');
                if (!isset($options['slc79_hide_text']) || $options['slc79_hide_text'] === 'default') {
                    if ($term->taxonomy == 'category') { ?>
                        <p class="slc79_p"
                           id="slc79-<?php echo $term_id; ?>"><?php echo site_url() . '/?cat=' . $term_id; ?> </p>
                    <?php } elseif ($term->taxonomy == 'post_tag') { ?>
                        <p class="slc79_p"
                           id="slc79-<?php echo $term_id; ?>"><?php echo site_url() . '/?tag=' . $term->slug; ?> </p>
                    <?php } else { ?>
                        <p class="slc79_p"
                           id="slc79-<?php echo $term_id; ?>"><?php echo site_url() . '/?' . $term->taxonomy . '=' . $term->slug; ?> </p>
                    <?php }
                } else { ?>
                    <p style="display:none;"
                       id="slc79-<?php echo $term_id; ?>"><?php echo site_url() . '/?' . $term->taxonomy . '=' . $term->slug; ?> </p>
                <?php }
                if (!isset($options['slc79_hide_btn']) || $options['slc79_hide_btn'] === 'default') { ?>
                    <button class="slc79_btn button button-small" type="button"
                            onclick="slc79_copyToClipboard('slc79-<?php echo $term_id; ?>')">Copy
                    </button>
                <?php }
            }


        }
    }


// Add column and values to standard and custom posts
    if (!isset($options['slc79_hide_posts']) || $options['slc79_hide_posts'] === 'default') {
        add_action('init', 'slc79_posts', 100);
        function slc79_posts()
        {
            $post_types = get_post_types();
            foreach ($post_types as $post_type) {
                add_action("manage_${post_type}_posts_columns", 'slc79_define_column', 10, 1);
                add_filter("manage_edit-${post_type}_sortable_columns", 'slc79_define_column', 10, 1);
                add_filter("manage_${post_type}_posts_custom_column", 'slc79_values_post_type', 10, 2);
            }
        }
    }

// Add extra column to media
    if (!isset($options['slc79_hide_media']) || $options['slc79_hide_media'] === 'default') {
        add_action('manage_media_columns', 'slc79_define_column', 10, 1);
        add_filter('manage_upload_sortable_columns', 'slc79_define_column', 10, 1);
        add_filter('manage_media_custom_column', 'slc79_values_media', 10, 2);
    }


// Add extra column and values to standard and custom categories
    if (!isset($options['slc79_hide_tax']) || $options['slc79_hide_tax'] === 'default') {
        add_action('init', 'slc79_taxonomies', 100);
        function slc79_taxonomies()
        {
            $taxonomies = get_taxonomies();
            foreach ($taxonomies as $taxonomy) {
                add_action("manage_edit-${taxonomy}_columns", 'slc79_define_column', 10, 1);
                add_filter("manage_edit-${taxonomy}_sortable_columns", 'slc79_define_column', 10, 1);
                add_filter("manage_${taxonomy}_custom_column", 'slc79_values_tax', 10, 3);
            }
        }
    }

// Reveal old-style get shortlink functionality inside the posts/pages
    if (!isset($options['slc79_hide_inner']) || $options['slc79_hide_inner'] === 'default') {
        if (get_bloginfo('version') >= 4.4) {
            add_filter('get_shortlink', function ($shortlink) {
                return $shortlink;
            });
        }
    }


// Load JS for copying the shortlinks
    if (!isset($options['slc79_hide_btn']) || $options['slc79_hide_btn'] === 'default') {

        if (file_exists(dirname(__FILE__) . '/shortlink-col-js.js')) {
            function load_shortlink_script($hook)
            {
                if ($hook != 'edit.php' && $hook != 'upload.php' && $hook != 'edit-tags.php') {
                    return;
                }
                wp_enqueue_script('shortlink-col-js', plugins_url('shortlink-column/shortlink-col-js.js', dirname(__FILE__)));
            }

            add_action('admin_enqueue_scripts', 'load_shortlink_script');
        }
    }

}