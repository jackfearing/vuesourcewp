<?php
/**
 * Proper way to enqueue scripts and styles
 */
function vuesource_scripts() {


	// Adding scripts file in the footer
	wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/scripts/scripts.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/scripts'), true );

	// Register main stylesheet
	wp_enqueue_style('main-styles', get_template_directory_uri() . '/assets/styles/style.css', array(), filemtime(get_template_directory() . '/source'), 'all');

    // Comment reply script for threaded comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vuesource_scripts' );