<?php
/**
 * Recommended plugins
 *
 * @package danfe
 */
if ( ! function_exists( 'danfe_recommended_plugins' ) ) :
	/**
	 * Recommend plugins.
	 *
	 * @since 1.0.0
	 */
	function danfe_recommended_plugins() {
		
		$plugins = array(			
			array(
				'name'     => esc_html__( 'Everest Forms', 'danfe' ),
				'slug'     => 'everest-forms',
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'Elementor', 'danfe' ),
				'slug'     => 'elementor',
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'Envato Elements', 'danfe' ),
				'slug'     => 'envato-elements',
				'required' => false,
			),
		   
		);
		tgmpa( $plugins );
	}
endif;
add_action( 'tgmpa_register', 'danfe_recommended_plugins' );
