




//*****************************************************************************
// Remove p tags from images and/or iframes
//*****************************************************************************

jQuery(document).ready(function($) {
    // Unwrap images
    //$('p img').unwrap();
    $('p > img').unwrap();

     // Unwrap images and iframes
    //$('p img, p .fluid-width-video-wrapper').unwrap();

});
