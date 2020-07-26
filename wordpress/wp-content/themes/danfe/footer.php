<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package danfe
 */
  	/**
	 * Hook - danfe_container_closing_action.
	 *
	 * @hooked danfe_container_closing_action - 10
	 */
	do_action( 'danfe_container_closing_action' );


  	/**
	 * Hook - danfe_site_footer_start_action.
	 *
	 * @hooked danfe_site_footer_start_action - 10
	 */
	do_action( 'danfe_site_footer_start_action' );


	/**
	 * Hook - danfe_site_footer_widget_action.
	 *
	 * @hooked danfe_site_footer_widget_action - 10
	 */
	do_action( 'danfe_site_footer_widget_action' );

	/**
	 * Hook - danfe_footer_site_info_action.
	 *
	 * @hooked danfe_footer_site_info_action - 10
	 */
	do_action( 'danfe_footer_site_info_action' );

	/**
	 * Hook - danfe_footer_closing_action.
	 *
	 * @hooked danfe_footer_closing - 10
	 */
	do_action( 'danfe_footer_closing_action' );


    wp_footer(); ?>
</div>

</body>
</html>
