<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package danfe
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('boxed'); ?>>
	<div class="post-wrapper">
		<div class="post-content-wrapper">
			<div class="post-title">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				<?php if ( 'post' === get_post_type() ) : ?>
				<?php endif; ?>
			</div><!-- .entry-header -->

			<div class="post-content">
					<?php the_excerpt(); ?>
			</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->

