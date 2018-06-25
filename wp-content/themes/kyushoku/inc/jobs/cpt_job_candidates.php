<?php

/**
 * Description of job-candidates sub menu
 *
 * @author haudv
 */
class jobs_candidates {

    private $dir;
    private $file;
    private $assets_dir;
    private $assets_url;
    private $settings_base;
    private $settings;

    public function __construct($file) {
        $this->file = $file;
        $this->dir = dirname($this->file);
        $this->assets_dir = trailingslashit(TEMPLATEPATH) . 'admin-assets';
        $this->assets_url = get_template_directory_uri().'/admin-assets/';
        $this->settings_base = 'wpt_job_';
        // Initialise settings
        add_action('admin_init', array($this, 'init'));
        // Register plugin settings
        add_action('admin_init', array($this, 'register_settings'));
        // Add settings page to menu
        add_action('admin_menu', array($this, 'add_menu_item'));
        // Add settings link to plugins page
        add_filter('plugin_action_links_' . plugin_basename($this->file), array($this, 'add_settings_link'));
    }

    /**
     * Initialise settings
     * @return void
     */
    public function init() {
        $this->settings = $this->settings_fields();
    }

    /**
     * 
     * @return string
     */
    public function get_tab() {
        global $pagenow;
        
        $query_string = $_SERVER['QUERY_STRING'];
        parse_str($query_string, $get_uri);

        $tab = '';
        if ($pagenow == 'edit.php' &&
                isset($get_uri['post_type']) && $get_uri['post_type'] == 'jobs' &&
                isset($get_uri['page']) && $get_uri['page'] == 'job_candidates') {
            if (isset($get_uri['tab'])){
                $tab = $get_uri['tab'];
            }else{
                $tab = 'list-cadidate';
            }
        }

        return $tab;
    }

    /**
     * Add settings page to admin menu
     * @return void
     */
    public function add_menu_item() {
        $page = add_submenu_page('edit.php?post_type=jobs', __('Job Candidates', 'job_candidates'), __('Job Candidates', 'job_candidates'), 'manage_options', 'job_candidates', array($this, 'settings_page'));
        add_action('admin_print_styles-' . $page, array($this, 'settings_assets'));
        add_action('load-' . $page, array($this, 'load_settings_plugin'));
    }

    /**
     * Load settings JS & CSS
     * @return void
     */
    public function settings_assets() {

        wp_register_style('job-style', $this->assets_url . 'css/job-style.css');
        wp_enqueue_style('job-style');
        wp_register_style('fancybox-style', $this->assets_url . 'fancybox/jquery.fancybox.css');
        wp_enqueue_style('fancybox-style');

// We're including the farbtastic script & styles here because they're needed for the colour picker
// If you're not including a colour picker field then you can leave these calls out as well as the farbtastic dependency for the wpt-admin-js script below
        wp_enqueue_style('farbtastic');
        wp_enqueue_script('farbtastic');
// We're including the WP media scripts here because they're needed for the image upload field
// If you're not including an image upload then you can leave this function call out
        wp_enqueue_media();
        wp_register_script('wpt-admin-js', $this->assets_url . 'js/settings.js', array('farbtastic', 'jquery'), '1.0.0');
        wp_enqueue_script('wpt-admin-js');
        //
        wp_register_script('fancybox-admin-js', $this->assets_url . 'fancybox/jquery.fancybox.pack.js', array('farbtastic', 'jquery'), '2.1.5');
        wp_enqueue_script('fancybox-admin-js');
    }

    public function load_settings_plugin() {
        if (isset($_POST['job-settings-submit']) && $_POST['job-settings-submit'] == 'Y') {
            $this->save_settings_plugin();
            $tab = $this->get_tab();
            $url_parameters = isset($tab) ? 'updated=true&tab=' . $tab : 'updated=true';
            wp_redirect(admin_url('edit.php?post_type=jobs&page=job_candidates&' . $url_parameters));
        }
    }

    public function save_settings_plugin() {
        if (is_array($this->settings)) {
            foreach ($this->settings as $section => $data) {
                // Add section to page
                $tab = $this->get_tab();

                if ($tab == $section) {
                    if (isset($data['fields'])) {
                        foreach ($data['fields'] as $field) {
                            $option_name = $this->settings_base . $field['id'];
                            $setting = get_option($option_name);
                            $tab = $this->get_tab();
                            switch ($tab) {
                                case 'top-define':
                                    $setting[$option_name] = $_POST[$option_name];
                                    break;
                            }
                            $updated = update_option($option_name, $setting);
                        }
                    }
                }
            }
        }
    }

    /**
     * Add settings link to plugin list table
     * @param  array $links Existing links
     * @return array 		Modified links
     */
    public function add_settings_link($links) {
        $settings_link = '<a href="edit.php?post_type=jobs&page=job_candidates">' . __('Settings', 'job_candidates') . '</a>';
//        $settings_link = '<a href="options-general.php?page=job_candidates">' . __('Settings', 'job_candidates') . '</a>';
        array_push($links, $settings_link);
        return $links;
    }

    /**
     * Build settings fields
     * @return array Fields to be displayed on settings page
     */
    private function settings_fields() {
        $settings['list-cadidate'] = array(
            'title' => __('List Candidates', 'job_candidates'),
            'description' => __('List Cadidates', 'job_candidates'),
        );
        /*
        $settings['top-define'] = array(
            'title' => __('Settings', 'job_candidates'),
            'description' => __('', 'job_candidates'),
            'fields' => array(
                array(
                    'id' => 'text_item_per_page',
                    'label' => __('Items Per Page (Top)', 'job_candidates'),
                    'description' => __('', 'job_candidates'),
                    'type' => 'text',
                    'default' => '10',
                    'placeholder' => __('', 'job_candidates')
                ),
                array(
                    'id' => 'text_item_per_page_job',
                    'label' => __('Items Per Page (Job)', 'job_candidates'),
                    'description' => __('', 'job_candidates'),
                    'type' => 'text',
                    'default' => '10',
                    'placeholder' => __('', 'job_candidates')
                ),
            )
        );*/

        $settings = apply_filters('job_candidates_fields', $settings);
        return $settings;
    }

    /**
     * Register plugin settings
     * @return void
     */
    public function register_settings() {
        if (is_array($this->settings)) {
            foreach ($this->settings as $section => $data) {
                // Add section to page
                $tab = $this->get_tab();

                if ($tab == $section) {
                    if (isset($data['fields'])) {
                        add_settings_section($section, $data['title'], array($this, 'settings_section'), 'job_candidates');
                        foreach ($data['fields'] as $field) {
                            // Validation callback for field
                            $validation = '';
                            if (isset($field['callback'])) {
                                $validation = $field['callback'];
                            }
                            // Register field
                            $option_name = $this->settings_base . $field['id'];
                            register_setting('job_candidates', $option_name, $validation);
                            // Add field to page
                            add_settings_field($field['id'], $field['label'], array($this, 'display_field'), 'job_candidates', $section, array('field' => $field));
                        }
                    }
                }
            }
        }
    }

    public function settings_section($section) {
        $html = '<p> ' . $this->settings[$section['id']]['description'] . '</p>' . "\n";
        echo $html;
    }

    /**
     * Generate HTML for displaying fields
     * @param  array $args Field data
     * @return void
     */
    public function display_field($args) {

        $field = $args['field'];
        $html = '';
        $option_name = $this->settings_base . $field['id'];
        $option = get_option($option_name);
        $data = '';
        $lang = qtranxf_getLanguage();
        if (isset($field['default'])) {
            $data = $field['default'];
            if ($option) {
                $data = $option;
            }
        }
        $tab = $this->get_tab();

        switch ($tab) {

            case 'list-cadidate':
                global $wpdb;

                $html .= '<h3>List of Candidates</h3>';
                $html .= '<p></p>';

                $table_name = $wpdb->prefix . 'job_candidates';
                $total = $wpdb->get_var("SELECT COUNT(*) FROM  $table_name WHERE language='$lang'");
                $opt_name = $this->settings_base.'text_item_per_page_job';
                $opt = get_option($opt_name);
                /*
                $items_per_page = intval($opt[$opt_name]);
                if($items_per_page <= 0){                    
                    $items_per_page = 1;
                }*/
                $items_per_page = 20;
                $page = isset($_GET['cpage']) ? abs((int) $_GET['cpage']) : 1;
                $offset = ( $page * $items_per_page ) - $items_per_page;
                $list_candidates = $wpdb->get_results(
                        ""
                        . " SELECT * "
                        . " FROM  $table_name "
                        . " WHERE language='$lang' "
                        . " ORDER BY apply_date DESC "
                        . " LIMIT ${offset}, ${items_per_page} "
                );

                $html .= '<div class="pagination">';
                $html .= paginate_links(array(
                    'base' => add_query_arg('cpage', '%#%'),
                    'format' => '',
                    'prev_text' => __('&laquo;'),
                    'next_text' => __('&raquo;'),
                    'total' => ceil($total / $items_per_page),
                    'current' => $page
                ));

                $html .= '</div>';
                $html .= '<form action="'.home_url().'/csv-download" method="post">'
                        . '<div style="text-align:right">'
                        . 'Start ID: <input type="text" name="start_id">  End ID: <input type="text" name="end_id"><input type="submit" value="Download CSV"></input>'
                        . '</div></form><br/>';

                $html .= '<div class="job-table">';
                $html .= '<table>';
                $html .= '<tr>';
                $html .= '<td width="3%">ID</td>';
                $html .= '<td width="135">Applied Date</td>';                
                $html .= '<td width="200">Name</td>';
                $html .= '<td width="200">Email & Phone</td>';
                $html .= '<td width="115">Resume</td>';
                $html .= '<td width="115">CV</td>';
                $html .= '<td width="115">Other file</td>';
                $html .= '<td width="100">Salary</td>';
                $html .= '<td width="250">Request</td>';
                $html .= '<td width="">Job Title</td>';
                $html .= '<td width="250">Inquiry</td>';
                $html .= '</tr>';
                if ($list_candidates) {
                    foreach ($list_candidates as $post) {
                        $inquiry = $post->inquiry;
                        $inquiry_str = str_replace(',', ' <br/> ', $inquiry);
                        
                        $html .= '<tr>';
                        $html .= '<td>' . $post->ID . '</td>';
                        $html .= '<td>' . date_format(new DateTime($post->apply_date), 'd-m-Y H:i:s') . '</td>';                        
                        $html .= '<td>' . $post->name .' ('.$post->phonetic_name.')'. '</td>';
                        $html .= '<td>' . $post->email . '<br/>' . $post->phone_number . '</td>';  
                        if(!empty($post->resume_file)){
                        $html .= '<td>'
                                . '<a class="btn button" href="'.$post->resume_file.'" download>Download Resume</a>'
                                . '</td>';
                        }else{
                            $html .= '<td></td>';
                        }
                        if(!empty($post->cv_file)){
                        $html .= '<td>'
                                . '<a class="btn button" href="'.$post->cv_file.'" download>Download CV</a>'
                                . '</td>';
                        }else{
                            $html .= '<td></td>';
                        }
                        if(!empty($post->other_file)){
                        $html .= '<td>'
                                . '<a class="btn button" href="'.$post->other_file.'" download>Download Other</a>'
                                . '</td>';
                        }else{
                            $html .= '<td></td>';
                        }
                        $html .= '<td>' . ($post->expected_salary > 0?$post->expected_salary.' 万円':'') . '</td>';
                        $html .= '<td>' . nl2br($post->request) . '</td>';
                        $html .= '<td><a class="pop-job" href="'.admin_url('post.php?post='.$post->job_id.'&action=edit').'">' . $post->job_title . '</a></td>';
                        $html .= '<td>' . $inquiry_str . '</td>';
                        
                        $html .= '</tr>';
                    }
                }
                $html .= '</table>';
                $html .= '</div>';

                $html .= '<div class="pagination">';
                $html .= paginate_links(array(
                    'base' => add_query_arg('cpage', '%#%'),
                    'format' => '',
                    'prev_text' => __('&laquo;'),
                    'next_text' => __('&raquo;'),
                    'total' => ceil($total / $items_per_page),
                    'current' => $page
                ));
                $html .= '</div>';

                break;

            case 'top-define':

                switch ($field['type']) {
                    case 'text':
                        $_data = isset($data[$option_name]) ? $data[$option_name] : '';
                        $html .= '<input id="' . esc_attr($field['id']) . '" type="text" name="' . esc_attr($option_name) . '" placeholder="' . esc_attr($field['placeholder']) . '" value="' . $_data . '"/>' . "\n";
                        break;
                }

                break;
        }

        echo $html;
    }

    /**
     * Validate individual settings field
     * @param  string $data Inputted value
     * @return string       Validated value
     */
    public function validate_field($data) {
        if ($data && strlen($data) > 0 && $data != '') {
            $data = urlencode(strtolower(str_replace(' ', '-', $data)));
        }
        return $data;
    }

    /**
     * Load settings page content
     * @return void
     */
    public function settings_page() {
        $tab = $this->get_tab();

        // Build page HTML
        $html = '<div class="wrap" id="job_candidates">' . "\n";
        $html .= '<h2>' . __('Job Candidates', 'job_candidates') . '</h2>' . "\n";
        // Setup navigation
        $html .= '<div class="cssmenu">' . "\n";
        $html .= '<ul id="settings-sections" class="hide-if-no-js">' . "\n";
        foreach ($this->settings as $section => $data) {
            $active = '';
            if ($tab == $section) {
                $active = 'active';
            }
            $html .= '<li class=" ' . $active . '"><a class="tab" href="edit.php?post_type=jobs&page=job_candidates&tab=' . $section . '">' . $data['title'] . '</a></li>' . "\n";
        }
        $html .= '</ul>' . "\n";
        $html .= '</div>' . "\n";
        $html .= '<div class="clear"></div>' . "\n";

        if ($tab == 'list-cadidate') {
            ob_start();
            $html .= $this->display_field(array('field' => array('id' => 'list-candidate', 'type' => 'list-candidate')));
            $html .= ob_get_clean();
        } else {
            $html .= '<form method="post" action="' . admin_url('edit.php?post_type=jobs&page=job_candidates&tab=' . $tab) . '" enctype="multipart/form-data">' . "\n";
            // Get settings fields
            ob_start();
            settings_fields('job_candidates');
            do_settings_sections('job_candidates');
            $html .= ob_get_clean();
            $html .= '<p class="submit">' . "\n";
            $html .= '<input name="Submit" type="submit" class="button-primary" value="' . esc_attr(__('Save Settings', 'job_candidates')) . '" />' . "\n";
            $html .= '<input type="hidden" name="job-settings-submit" value="Y" />' . "\n";
            $html .= '</p>' . "\n";
            $html .= '</form>' . "\n";
        }
        $html .= '</div>' . "\n";
        echo $html;
    }

}

new jobs_candidates(__FILE__);
