<?php
/**
 * danfe Theme Customizer.
 *
 * @package danfe
 */
/**
 * Sidebar layout options
 *
 * @since danfe 1.0.0
 *
 * @param null
 * @return array $danfe_sidebar_layout
 *
 */
if ( !function_exists('danfe_sidebar_layout') ) :
   
    function danfe_sidebar_layout() {
        $danfe_sidebar_layout =  array(
            'right-sidebar' => __( 'Right Sidebar', 'danfe'),
            'left-sidebar'  => __( 'Left Sidebar' , 'danfe'),
            'no-sidebar'    => __( 'No Sidebar', 'danfe')
        );
        return apply_filters( 'danfe_sidebar_layout', $danfe_sidebar_layout );
    }
endif;

/**
 * Pagination options
 *
 * @since danfe 1.0.0
 *
 * @param null
 * @return array $danfe_pagination_option
 *
 */
if ( !function_exists('danfe_pagination_option') ) :
   
    function danfe_pagination_option() {
      
        $danfe_pagination_option =  array(
            'default'  => __( 'Default Pagination', 'danfe')
        );
      
        return apply_filters( 'danfe_pagination_option', $danfe_pagination_option );
    }
endif;
/**
 * content options
 *
 * @since danfe 1.0.0
 *
 * @param null
 * @return array $danfe_pagination_option
 *
 */
if ( !function_exists('danfe_content_option') ) :
   
    function danfe_content_option() {
      
        $danfe_content_option =  array(
            'excerpt'  => __( 'Excerpt', 'danfe'),
            'content'  => __( 'Content' , 'danfe')
        );
        return apply_filters( 'danfe_content_option', $danfe_content_option );
    }
endif;

/**
 * content options
 *
 * @since danfe 1.0.0
 *
 * @param null
 * @return array $danfe_pagination_option
 *
 */
if ( !function_exists('danfe_image_option') ) :
   
    function danfe_image_option() {
      
        $danfe_image_option =  array(
            'full'  => __( 'Full Image', 'danfe'),
            'small'  => __( 'Thumbnail' , 'danfe')
        );
        return apply_filters( 'danfe_image_option', $danfe_image_option );
    }
endif;

/**
 * header options
 *
 * @since danfe 1.0.0
 *
 * @param null
 * @return array $danfe_header
 *
 */
if ( !function_exists('danfe_header_option') ) :
   
    function danfe_header_option() {
      
        $danfe_header_option =  array(
            'default'  => __( 'Default', 'danfe'),
            'center'  => __( 'Logo Center' , 'danfe')
        );
        return apply_filters( 'danfe_header_option', $danfe_header_option );
    }
endif;

/**
 *  Default Theme options
 *
 * @since danfe 1.0.0
 *
 * @param null
 * @return array $danfe_theme_layout
 *
 */
if ( !function_exists('danfe_default_theme_options') ) :
    function danfe_default_theme_options() {

        $default_theme_options = array(
            'danfe-footer-copyright' => esc_html__('&copy; All Right Reserved','danfe'),
            'danfe-layout'          => 'right-sidebar',
            'danfe-font-family-url'              => esc_url('//fonts.googleapis.com/css?family=Merriweather', 'danfe'),
            'danfe-font-family-name'             => esc_html__('Merriweather, sans-serif','danfe'),
            'danfe-heading-font-family-url'      => esc_url('//fonts.googleapis.com/css?family=Oswald', 'danfe'),
            'danfe-heading-font-family-name'     => esc_html__('Oswald, sans-serif','danfe'),

            'danfe-menu-font-family-url'      => esc_url('//fonts.googleapis.com/css?family=Oswald', 'danfe'),
            'danfe-menu-font-family-name'     => esc_html__('Oswald, sans-serif','danfe'),            
            'danfe-footer-totop'                 => 1,
            'danfe-read-more-text'               => esc_html__('Continue Reading','danfe'),
            'danfe-header-social'                => 0,
            'danfe-header-search'                => 0,
            'danfe-header-disable'               => 1,
            'danfe-sticky-sidebar-option'        => 1,
            'danfe-blog-pagination-type-options' => 'default',
            'danfe-default-color'                => '#ff0000', 
            'danfe-title-tagline-color'          => '#222',
            'danfe-tagline-color'                => '#818181', 

            'danfe-related-title'          => esc_html__('Related Posts','danfe'),
            'danfe-enable-related-post'                => 0, 
            'danfe-hide-meta'                         => 1,
            'danfe-blog-hide-meta' => 1,
            'danfe-blog-excerpt-length' => 25,
            'danfe-show-content' => 'excerpt',
            'danfe-hide-image' => 1,
            'danfe-blog-featured-image'=> 'full',
            'danfe-header-types'=> 'default',
);
        return apply_filters( 'danfe_default_theme_options', $default_theme_options );
    }
endif;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function danfe_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'refresh';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'refresh';
    $wp_customize->get_setting( 'custom_logo' )->transport      = 'refresh';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    /*defaults options*/
    $defaults = danfe_get_theme_options();

    $wp_customize->add_panel( 'danfe_panel', array(
        'priority' => 30,
        'capability' => 'edit_theme_options',
        'title' => __( 'Danfe Theme Settings', 'danfe' ),
    ) );
    
    /**
     * Load customizer Design Layout section
     */
    require get_template_directory() . '/inc/customizer-inc/site-layout-section.php';

    /**
     * Load customizer Typography
     */
    require get_template_directory() . '/inc/customizer-inc/typography-section.php';
    /**
     * Load customizer Color
     */
    require get_template_directory() . '/inc/customizer-inc/color-section.php';
    /**
     * Load customizer custom-controls
     */
    require get_template_directory() . '/inc/customizer-inc/footer-section.php';
	
	   /**
     * Load customizer custom-controls
     */
    require get_template_directory() . '/inc/customizer-inc/header-section.php';


    /**
     * Load customizer single
     */
    require get_template_directory() . '/inc/customizer-inc/single-section.php';

}
add_action( 'customize_register', 'danfe_customize_register' );

/**
 * Load dynamic css file
*/
require get_template_directory() . '/inc/dynamic-css.php';


/**
 *  Get theme options
 *
 * @since danfe 1.0.0
 *
 * @param null
 * @return array danfe_theme_options
 *
 */
if ( !function_exists('danfe_get_theme_options') ) :
    function danfe_get_theme_options() {

        $danfe_default_theme_options = danfe_default_theme_options();
        

     $danfe_get_theme_options     = get_theme_mod( 'danfe_theme_options');
        
        if( is_array( $danfe_get_theme_options ))
        {
            return array_merge( $danfe_default_theme_options, $danfe_get_theme_options );
        }

        else
        {
            
            return $danfe_default_theme_options;
        }

    }
endif;

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function danfe_customize_preview_js() {
	
    wp_enqueue_script( 'danfe-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151216', true );
}
add_action( 'customize_preview_init', 'danfe_customize_preview_js' );
