<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vuesource
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<!--
<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
<?php

$posts = get_field('relationship_pages');

if( $posts ): ?>
    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
        <article>

<?php if (get_field('sidebar_title')) :?>
	<h2><?php the_field('sidebar_title'); ?></h2>
<?php else : ?>
	<p>No Content for this field</p>
<?php endif; ?>

<?php if( has_post_thumbnail() ):?>
	<?php echo get_the_post_thumbnail();?>
<?php endif; ?>

            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <?php the_content(); ?>
            <p>This post was written by <?php the_author(); ?></p>
        </article>
    <?php endforeach; ?>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
