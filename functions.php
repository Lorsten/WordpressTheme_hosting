<?php

/**
 * Register menu
 * Register three for menus, header, footer and userpage
 */

function register_my_menus(){
   register_nav_menus(array(
      'main-menu' => 'top menu',
	  'footer_menu' => 'Footer menu',
	  'user-menu' => 'user control panel'
   ));
}
add_action('init','register_my_menus');


/*
 * Load script
 * Function for adding jquery to the theme used for the hamburgermenu and animations
 */

function add_script(){
   wp_enqueue_script( 'menu_script', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), true );
}
add_action( 'wp_enqueue_scripts', 'add_script' ); 

/**
 * Add Custom widgets area 
 * Header, footer and for front page
 */

function header_widgets_init() {

	register_sidebar( array(
		'name'          => 'header-widget',
		'id'            => 'header-widget',
		'before_widget' => ' <div class="widget-header">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'header_widgets_init' );

function page_widgets_init() {

	register_sidebar( array(
		'name'          => 'page-widget',
		'id'            => 'page-widget',
		'before_widget' => '<div class="circle">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'page_widgets_init' );

/*Register the footer widget area*/ 
function footer_widgets_init() {

	register_sidebar( array(
		'name'          => 'footer-widget',
		'id'            => 'footer-widget',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'footer_widgets_init' );

function Custom_header_image(){
	$args = array(
		'flex-width' => 'true',
		'flex-height' => 'true',
		'width'  => '1600',
		'height'  => '900',
	);
	add_theme_support('custom-header', $args );
}
add_action( 'after_setup_theme', 'Custom_header_image');

/*add the thumbnail support*/
add_theme_support( 'post-thumbnails' );

/**
 * Change excerpt settings
 * Changing the length aswell as the text to dots
 */
function wpdocs_custom_excerpt_length($lenght){
	return 20;
}
add_filter('excerpt_length','wpdocs_custom_excerpt_length',100);

function wpdocs_custom_excerpt_more($more){
	return '.';
};
add_filter('excerpt_more','wpdocs_custom_excerpt_more');

/*
 * Create custom image sizes
 * Create custom images for featured images setting the width and height and cropping from left and top
 */
function wpdocs_theme_setup() {
	//Post category
	add_image_size( 'custom-size', 350, 250, array( 'left', 'top' ) );
	//For sidebar in post page
	add_image_size( 'small-size', 250, 200, array( 'left', 'top' ) );
	//For background in post page
	add_image_size( 'large-post', 1350, 900, array( 'left', 'top' ) );
}
add_action( 'after_setup_theme', 'wpdocs_theme_setup' );

/*
 * Custom logo
 * Adding function to allow user to use a custom logo
 */

function custom_logo(){
   $args_logo = array(
      'width'             =>400,
      'height'            => 100,
      'flex-height' => true,
      'flex-width'  => true,
      'default-image'     => get_template_directory_uri() .  '/images/logo.png',
      'uploads'           => true,
   );
   add_theme_support( 'custom-logo', $args_logo); 
}

add_action('after_setup_theme','custom_logo');





?>