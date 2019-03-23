<?php
// Define the width of the WP editor
function custom_admin_css() {
echo '<style type="text/css">
.wp-block { max-width: 100%; }
</style>';
}
add_action('admin_head', 'custom_admin_css');




//*****************************************************************************
// Replace jQuery with Google CDN jQuery
//*****************************************************************************

/*
	if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
	function my_jquery_enqueue() {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js", false, null);
	   wp_enqueue_script('jquery');
	}
*/

// include custom jQuery
function shapeSpace_include_custom_jquery() {

	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);

}
add_action('wp_enqueue_scripts', 'shapeSpace_include_custom_jquery');





//********************************************************************************
// ADD RESPONSIVE CONTAINER TO EMBEDS
//********************************************************************************

	function alx_embed_html( $html ) {
	    return '<div class="video-container">' . $html . '</div>';
	}

	add_filter( 'embed_oembed_html', 'alx_embed_html', 10, 3 );

	add_filter( 'video_embed_html', 'alx_embed_html' ); // Jetpack