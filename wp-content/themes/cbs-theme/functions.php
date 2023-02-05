<?php
// Bootstrap CSS

function jquery_js() {
	wp_enqueue_script( 'jquery_js', 
    get_template_directory_uri() . '/assets/js/jquery.js', 
  					array(), 
  					'1.0', 
  					true); 
}
add_action( 'wp_enqueue_scripts', 'jquery_js');

function table_ex_js() {
	wp_enqueue_script( 'table_ex_js', 
    get_template_directory_uri() . '/assets/js/table.js', 
  					array(), 
  					'1.0', 
  					true); 
}
add_action( 'wp_enqueue_scripts', 'table_ex_js');

function bootstrap_css() {
	wp_enqueue_style( 'bootstrap_css', 
    get_template_directory_uri() . '/assets/css/bootstrap.min.css', 
  					array(), 
  					'4.1.3'
  					); 
}
add_action( 'wp_enqueue_scripts', 'bootstrap_css');


function jquery_table_css() {
	wp_enqueue_style( 'table_css', 
    get_template_directory_uri() . '/assets/jquery-table/datatables.min.css', 
  					array(), 
  					'1.0'
  					); 
}
add_action( 'wp_enqueue_scripts', 'jquery_table_css');


function jquery_table_js() {
	wp_enqueue_script( 'table_js', 
    get_template_directory_uri() . '/assets/jquery-table/datatables.min.js', 
  					array(), 
  					'1.0', 
  					true); 
}
add_action( 'wp_enqueue_scripts', 'jquery_table_js');

?>