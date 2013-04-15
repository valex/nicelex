<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Nicelex
 * @since Nicelex 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php edit_post_link( __( 'Edit', 'nicelex' ), '<span class="edit-link">', '</span>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
        <?php
        if ( has_post_thumbnail() ) : // check if the post has a Post Thumbnail assigned to it.
            ?>
            <div class="thumb-wrapper">
                <?php the_post_thumbnail('thumbnail', array('class'=>'alignleft')); ?>
            </div>
        <?php endif; ?>
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'nicelex' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
