<?php 
/**
 * Include Scripts and CSS
 */
function custom_scripts() {
	wp_enqueue_style( 'reset-styles', 'https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css' );
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:400,700' );
	wp_enqueue_style( 'theme-styles', get_bloginfo('template_directory').'/style.css' );

	wp_enqueue_script( 'maps-api', '//maps.googleapis.com/maps/api/js?&libraries=places&key=AIzaSyDwodS8lQqB_hx2T-Hpq6sj_rn4k8xtq-4', array(), '1.0.0', false );
	wp_enqueue_script( 'jquery', '//code.jquery.com/jquery-3.3.1.slim.min.js', array(), '3.3.1', false );
	wp_enqueue_script( 'script-name', get_bloginfo('template_directory').'/js/app.js', array('jquery','maps-api'), '1.0', false );
}
add_action( 'wp_enqueue_scripts', 'custom_scripts' );