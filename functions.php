<?php
/**
 * vuesource functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package vuesource
 */

//Register scripts and stylesheets
require_once(get_template_directory().'/functions/enqueue-scripts.php');

// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu.php');

//Customizer additions.
require get_template_directory() . '/functions/customizer.php';

//Implement the Custom Header feature.
require get_template_directory() . '/functions/custom-header.php';

//Custom template tags for this theme.
require get_template_directory() . '/functions/template-tags.php';

//Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/functions/template-functions.php';

//Register sidebars/widget areas
require_once(get_template_directory().'/functions/sidebar.php');

//Load Jetpack compatibility file.
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/functions/jetpack.php';
}



//Register custom functions
require_once(get_template_directory().'/functions/custom-functions.php');

// Adds custom profile Post Type
require_once(get_template_directory().'/functions/custom-post-type-sidebar.php');

// Adds Advanced Custom Field Template to Gutenberg
require_once(get_template_directory().'/functions/custom-block-testimonial.php');





function mytheme_post_thumbnails() {
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'mytheme_post_thumbnails' );




/**
 * Enqueue block editor style
 */
function legit_block_editor_styles() {
    //wp_enqueue_style( 'legit-editor-styles', get_theme_file_uri( '/assets/styles/style-editor.css' ), false, '1.0', 'all' );
    wp_enqueue_style( 'legit-editor-styles', get_theme_file_uri( '/assets/styles/style.css' ), false, '1.0', 'all' );

}
add_action( 'enqueue_block_editor_assets', 'legit_block_editor_styles' );











