<?php
/**
 * The header section of Danfe.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package danfe
 */
    global $danfe_theme_options;
	$danfe_theme_options = danfe_get_theme_options();
	$danfe_header_disable = $danfe_theme_options['danfe-header-disable'];

?>
<?php
	/**
	 * Hook - danfe_doctype.
	 *
	 * @hooked danfe_doctype_action - 10
	 */
	do_action( 'danfe_doctype' );
?>

<head>

<?php
	/**
	 * Hook - danfe_head.
	 *
	 * @hooked danfe_head_action - 10
	 */
	do_action( 'danfe_head' );


	wp_head(); ?>

</head>

<body <?php body_class('at-sticky-sidebar');?>>
	<?php wp_body_open(); ?>
	<div class="site_layout">

<?php

	/**
	 * Hook - danfe_header_start_wrapper_action.
	 *
	 * @hooked danfe_header_start_wrapper - 10
	 */
	do_action( 'danfe_header_start_wrapper_action' );


	/**
	 * Hook - danfe_skip_link.
	 *
	 * @hooked danfe_skip_link_action - 10
	 */
	do_action( 'danfe_skip_link_action' );


	/**
	 * Hook - danfe_header_section.
	 *
	 * @hooked danfe_header_section_action - 10
	 */
	if($danfe_header_disable == 1 ){ 
	 do_action( 'danfe_header_section_action' );
	}


	/**
	 * Hook - danfe_header_lower_section.
	 *
	 * @hooked danfe_header_lower_section_action - 10
	 */
	do_action( 'danfe_header_lower_section_action' );

	/**
	 * Hook - danfe_header_end_wrapper.
	 *
	 * @hooked danfe_header_end_wrapper_action - 10
	 */
	do_action( 'danfe_header_end_wrapper_action' );

?>
		