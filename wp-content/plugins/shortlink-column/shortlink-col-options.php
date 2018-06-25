<?php

class ShortlinkColumnOptions
{
    private $slc79_options;

    public function __construct()
    {
        add_action('admin_menu', array($this, 'slc79_add_plugin_page'));
        add_action('admin_init', array($this, 'slc79_page_init'));
    }

    public function slc79_add_plugin_page()
    {
        add_options_page(
            'Shortlink Column', // Page Title
            'Shortlink Column', // Menu Title
            'manage_options', // Capability Required
            'shortlink-column', // Menu Slug
            array($this, 'slc79_create_admin_page') // Function Name
        );
    }

    public function slc79_create_admin_page()
    {
        /* Define the default options */
        $defaults = array(
            'slc79_hide_btn' => 'default',
            'slc79_hide_text' => 'default',
            'slc79_hide_posts' => 'default',
            'slc79_hide_tax' => 'default',
            'slc79_hide_media' => 'default',
            'slc79_hide_inner' => 'default'
        );
        // If option does not exist add it with default values
        if (!get_option('slc79_options_val')) {
            add_option('slc79_options_val', $defaults);
            $this->slc79_options = get_option('slc79_options_val');
        } else { // Option exists
            $current_op = get_option('slc79_options_val');
            $this->slc79_options = wp_parse_args($current_op, $this->slc79_options);
            update_option('slc79_options_val', $this->slc79_options);
        } ?>

        <div class="wrap">
            <h2>Shortlink Column Settings</h2>

            <form method="post" action="options.php">
                <?php settings_fields('slc79_option_group');
                do_settings_sections('shortlink-column-admin');
                submit_button(); ?>
            </form>
        </div>
    <?php }

    public function slc79_page_init()
    {
        register_setting(
            'slc79_option_group', // Option Group
            'slc79_options_val', // Option Name
            array($this, 'slc79_sanitize') // Sanitize Output
        );

        add_settings_section(
            'slc79_setting_section', // ID
            '', // Title
            '', // Callback
            'shortlink-column-admin' // Page
        );

        add_settings_field(
            'slc79_hide_btn', // ID
            'Hide Copy Button', // Title
            array($this, 'slc79_hide_btn_callback'), // Callback
            'shortlink-column-admin', // Page
            'slc79_setting_section' // Section
        );

        add_settings_field(
            'slc79_hide_text', // ID
            'Hide Shortlink Text', // Title
            array($this, 'slc79_hide_text_callback'), // Callback
            'shortlink-column-admin', // Page
            'slc79_setting_section' // Section
        );

        add_settings_field(
            'slc79_hide_posts', // ID
            'Hide Column for Posts/Pages', // Title
            array($this, 'slc79_hide_posts_callback'), // Callback
            'shortlink-column-admin', // Page
            'slc79_setting_section' // Section
        );

        add_settings_field(
            'slc79_hide_tax', // ID
            'Hide Column for Taxonomies', // Title
            array($this, 'slc79_hide_tax_callback'), // Callback
            'shortlink-column-admin', // Page
            'slc79_setting_section' // Section
        );

        add_settings_field(
            'slc79_hide_media', // ID
            'Hide Column for Media', // Title
            array($this, 'slc79_hide_media_callback'), // Callback
            'shortlink-column-admin', // Page
            'slc79_setting_section' // Section
        );

        add_settings_field(
            'slc79_hide_inner', // ID
            'Hide Inner Post Button', // Title
            array($this, 'slc79_hide_inner_callback'), // Callback
            'shortlink-column-admin', // Page
            'slc79_setting_section' // Section
        );
    }

    public function slc79_sanitize($input)
    {
        $sanitary_values = array();
        if (isset($input['slc79_hide_btn'])) {
            $sanitary_values['slc79_hide_btn'] = esc_attr($input['slc79_hide_btn']);
        }

        if (isset($input['slc79_hide_text'])) {
            $sanitary_values['slc79_hide_text'] = esc_attr($input['slc79_hide_text']);
        }

        if (isset($input['slc79_hide_posts'])) {
            $sanitary_values['slc79_hide_posts'] = esc_attr($input['slc79_hide_posts']);
        }

        if (isset($input['slc79_hide_tax'])) {
            $sanitary_values['slc79_hide_tax'] = esc_attr($input['slc79_hide_tax']);
        }

        if (isset($input['slc79_hide_media'])) {
            $sanitary_values['slc79_hide_media'] = esc_attr($input['slc79_hide_media']);
        }

        if (isset($input['slc79_hide_inner'])) {
            $sanitary_values['slc79_hide_inner'] = esc_attr($input['slc79_hide_inner']);
        }

        return $sanitary_values;
    }

    public function slc79_hide_btn_callback()
    {
        printf(
            '
		<input type="checkbox" name="slc79_options_val[slc79_hide_btn]" id="slc79_hide_btn" value="slc79_hide_btn" %s>
		<label for="slc79_hide_btn">Checking this will hide the copy buttons</label>	
		',
            (isset($this->slc79_options['slc79_hide_btn']) && $this->slc79_options['slc79_hide_btn'] === 'slc79_hide_btn') ? 'checked' : ''
        );
    }

    public function slc79_hide_text_callback()
    {
        printf(
            '
		<input type="checkbox" name="slc79_options_val[slc79_hide_text]" id="slc79_hide_text" value="slc79_hide_text" %s>
		<label for="slc79_hide_text">Checking this will hide the shortlink text for all columns (i.e. you will only have copy buttons active)</label>	
		',
            (isset($this->slc79_options['slc79_hide_text']) && $this->slc79_options['slc79_hide_text'] === 'slc79_hide_text') ? 'checked' : ''
        );
    }

    public function slc79_hide_posts_callback()
    {
        printf(
            '
		<input type="checkbox" name="slc79_options_val[slc79_hide_posts]" id="slc79_hide_posts" value="slc79_hide_posts" %s>
		<label for="slc79_hide_posts">Checking this will hide the column for posts and pages</label>	
		',
            (isset($this->slc79_options['slc79_hide_posts']) && $this->slc79_options['slc79_hide_posts'] === 'slc79_hide_posts') ? 'checked' : ''
        );
    }

    public function slc79_hide_tax_callback()
    {
        printf(
            '
		<input type="checkbox" name="slc79_options_val[slc79_hide_tax]" id="slc79_hide_tax" value="slc79_hide_tax" %s>
		<label for="slc79_hide_tax">Checking this will hide the column for taxonomies</label>	
		',
            (isset($this->slc79_options['slc79_hide_tax']) && $this->slc79_options['slc79_hide_tax'] === 'slc79_hide_tax') ? 'checked' : ''
        );
    }

    public function slc79_hide_media_callback()
    {
        printf(
            '
		<input type="checkbox" name="slc79_options_val[slc79_hide_media]" id="slc79_hide_media" value="slc79_hide_media" %s>
		<label for="slc79_hide_media">Checking this will hide the column for media</label>	
		',
            (isset($this->slc79_options['slc79_hide_media']) && $this->slc79_options['slc79_hide_media'] === 'slc79_hide_media') ? 'checked' : ''
        );
    }

    public function slc79_hide_inner_callback()
    {
        printf(
            '
		<input type="checkbox" name="slc79_options_val[slc79_hide_inner]" id="slc79_hide_inner" value="slc79_hide_inner" %s>
		<label for="slc79_hide_inner">Checking this will hide the inner shortlink buttons for posts/pages</label>	
		',
            (isset($this->slc79_options['slc79_hide_inner']) && $this->slc79_options['slc79_hide_inner'] === 'slc79_hide_inner') ? 'checked' : ''
        );
    }

}

if (is_admin())
    $slc79 = new ShortlinkColumnOptions();