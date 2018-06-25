<?php

/*
 * Author: haudv
 * Template Name: Candidate CSV File Download
 * 
 */

$LIMIT = 100;
global $wp_query;
global $wpdb;
$lang = qtranxf_getLanguage();
if (current_user_can('manage_options')) {
    global $wp_query;
    global $wpdb;
    $table_name = $wpdb->prefix . 'job_candidates';
    if (empty($_POST['start_id']) && empty($_POST['end_id'])) {
        $list_candidates = $wpdb->get_results(
                ""
                . " SELECT * "
                . " FROM  $table_name "
                . " WHERE language = '".$lang."'"
                . " ORDER BY id DESC"
                . " LIMIT 0," . $LIMIT
        );
        $list_candidates = array_reverse($list_candidates);
    } else if (is_numeric($_POST['start_id']) && $_POST['start_id'] > 0 && empty($_POST['end_id'])) {
        $list_candidates = $wpdb->get_results($wpdb->prepare(
                ""
                . " SELECT * "
                . " FROM  $table_name "
                . " WHERE id BETWEEN %d AND %d "
                . " AND language = '".$lang."'"
                , $_POST['start_id'], $_POST['start_id']+$LIMIT-1));
    } else if (empty($_POST['start_id']) && is_numeric($_POST['end_id']) && $_POST['end_id'] > 0) {
        $list_candidates = $wpdb->get_results($wpdb->prepare(
                ""
                . " SELECT * "
                . " FROM  $table_name "
                . " WHERE id BETWEEN %d AND %d "
                . " AND language = '".$lang."'"
                , $_POST['end_id'] - $LIMIT+1, $_POST['end_id']));
    } else {
        $list_candidates = $wpdb->get_results($wpdb->prepare(
                        ""
                        . " SELECT * "
                        . " FROM  $table_name "
                        . " WHERE id BETWEEN %d AND %d "
                        . " AND language = '".$lang."'"
                        , $_POST['start_id'], $_POST['end_id']));
    }
    $filename = "candidates.csv";
    $fp = fopen('php://output', 'w');

    header('Content-Type: text/csv; charset=utf-8');
     //header("Content-Transfer-Encoding: binary");
    header('Content-Disposition: csv; filename=' . $filename);
     header("Content-type: application/x-msdownload");
    foreach ($list_candidates as $candidate) {
        $array = (array) $candidate;
        fputcsv($fp, array_values($array));
    }

    exit;
}
