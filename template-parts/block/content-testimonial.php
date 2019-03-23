<?php
/**
 * Block Name: Testimonial
 *
 * This is the template that displays the testimonial block.
 */

// get image field (array)
$avatar = get_field('avatar');


// create id attribute for specific styling
$id = 'testimonial-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>
<blockquote id="<?php echo $id; ?>" class="testimonial <?php echo $align_class; ?>">
    <h3><?php the_field('testimonial'); ?></h3>
    <cite>
    	<img src="<?php echo $avatar['url']; ?>" alt="<?php echo $avatar['alt']; ?>" />
    	<span><?php the_field('author'); ?></span>
    	<?php the_field('content'); ?>
<?php
	$file = get_field('file_upload');

	if( $file ):

		echo '<a class="button" href="',$file['url'],'" target="_blank">Download File »</a>';

	endif;
?>


<!-- ACF Page Link -->
<?php if (get_field('page_link')):?>

<ul>
	<li>ACF Page Link: <a href="<?php the_field('page_link'); ?>">Read this!</a></li>
</ul>
<?php endif;?>




<?php $relationship = get_field( 'relationship' ); ?>
<?php if ( $relationship ): ?>
	<?php foreach ( $relationship as $p ): ?>
		<a href="<?php echo get_permalink( $p ); ?>"><?php echo get_the_title( $p ); ?></a>
		<?php echo get_the_excerpt( $p ); ?>
		<?php echo get_the_post_thumbnail( $p,'thumbnail' ); ?>
	<?php endforeach; ?>
<?php endif; ?>


<?php // checkbox ( value )
$checkbox_array = get_field( 'checkbox' );
if ( $checkbox_array ):
	echo '<ul>';
	foreach ( $checkbox_array as $checkbox_item ):
	 	echo '<li>' , $checkbox_item , '</li>';
	endforeach;
	echo '</ul>';
endif; ?>



<?php the_field( 'radio' ); ?>


<?php if ( have_rows( 'repeater' ) ) : ?>
	<?php while ( have_rows( 'repeater' ) ) : the_row(); ?>
		<?php the_sub_field( 'topic' ); ?>
	<?php endwhile; ?>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>


    </cite>
</blockquote>



<?php // Customized display (Object)

	$image = get_field('custom_image');

	if( !empty($image) ):

		// vars
		$url = $image['url'];
		$title = $image['title'];
		$alt = $image['alt'];
		$caption = $image['caption'];

		// thumbnail
		$size = 'large';
		$thumb = $image['sizes'][ $size ];
		$width = $image['sizes'][ $size . '-width' ];
		$height = $image['sizes'][ $size . '-height' ];
?>

	<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />

<?php endif; ?>










<style type="text/css">
	#<?php echo $id; ?> {
		background: <?php the_field('background_color'); ?>;
		color: <?php the_field('text_color'); ?>;
	}
</style>






