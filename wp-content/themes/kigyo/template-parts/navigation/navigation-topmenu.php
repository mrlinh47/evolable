<?php
/**
 * Displays navleft navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>
 <?php 
    $menu_walker = new Menu_Nav_Walker;
    	wp_nav_menu( array(
	        'theme_location' => 'topmenu',
	        'menu_id'        => '',
	        'menu_class'=> 'btn-section',
	        'walker' => $menu_walker
    ) ); 
?>


