<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package danfe
 */
get_header();

?>
<div id="primary" class="content-area col-sm-12">
	<main id="main" class="site-main" role="main">
		<section class="error-404 not-found">
			<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'danfe' ); ?></h1>
			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'danfe' ); ?></p>
				<a class="btn btn-back" href="<?php echo esc_url( home_url( '/' ) ); ?>"> <?php esc_html_e( 'Back to Home', 'danfe' ); ?></a>
			</div><!-- .page-content -->
		</section><!-- .error-404 -->
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();