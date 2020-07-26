<?php
/*adding sections for category selection for promo section in homepage*/
$wp_customize->add_section( 'danfe-site-layout', array(
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'title'          => __( 'Blog Options', 'danfe' ),
    'panel'          => 'danfe_panel',
) );

/* feature cat selection */
$wp_customize->add_setting( 'danfe_theme_options[danfe-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['danfe-layout'],
    'sanitize_callback' => 'danfe_sanitize_select'
) );

$danfe_choices = danfe_sidebar_layout();
$wp_customize->add_control('danfe_theme_options[danfe-layout]',
            array(
            'choices'   => $danfe_choices,
            'label'		=> __( 'Select Sidebar Layout', 'danfe'),
            'section'   => 'danfe-site-layout',
            'settings'  => 'danfe_theme_options[danfe-layout]',
            'type'	  	=> 'select',
            'priority'  => 10
         )
    );

/* Read More Option */
$wp_customize->add_setting( 'danfe_theme_options[danfe-read-more-text]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['danfe-read-more-text'],
    'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control('danfe_theme_options[danfe-read-more-text]',
            array(
            'label'       => __( 'Read More Text', 'danfe'),
            'description' => __('Continue Reading >> default text change section', 'danfe'),
            'section'     => 'danfe-site-layout',
            'settings'    => 'danfe_theme_options[danfe-read-more-text]',
            'type'        => 'text',
            'priority'    => 10
         )
    );
/* Sticky Sidebar Option */
$wp_customize->add_setting( 'danfe_theme_options[danfe-sticky-sidebar-option]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['danfe-sticky-sidebar-option'],
    'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control('danfe_theme_options[danfe-sticky-sidebar-option]',
            array(
            'label'       => __( 'Enable/Disable Sticky Sidebar', 'danfe'),
            'description' => __('Checked to enable sticky sidebar', 'danfe'),
            'section'     => 'danfe-site-layout',
            'settings'    => 'danfe_theme_options[danfe-sticky-sidebar-option]',
            'type'        => 'checkbox',
            'priority'    => 10
         )
    );

/* Pagination Options */
$danfe_choices = danfe_pagination_option();
$wp_customize->add_setting( 'danfe_theme_options[danfe-blog-pagination-type-options]', array(
    'capability'        => 'edit_theme_options',
    'default'           => $defaults['danfe-blog-pagination-type-options'],
    'sanitize_callback' => 'danfe_sanitize_select'
) );

$wp_customize->add_control('danfe_theme_options[danfe-blog-pagination-type-options]',
            array(
            'choices'     => $danfe_choices,
            'label'       => __( 'Pagination Type', 'danfe'),
            'description' => __('Select Pagination Type From Below', 'danfe'),
            'section'     => 'danfe-site-layout',
            'settings'    => 'danfe_theme_options[danfe-blog-pagination-type-options]',
            'type'        => 'select',
            'priority'    => 10
         )
    );


    //hide meta on single page
    $wp_customize->add_setting( 'danfe_theme_options[danfe-blog-hide-meta]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['danfe-blog-hide-meta'],
        'sanitize_callback' => 'danfe_sanitize_checkbox'
    ) );

    $wp_customize->add_control( 'danfe-blog-hide-meta', array(
        'label'     => __( 'Show Meta Fields', 'danfe' ),
        'section'   => 'danfe-site-layout',
        'settings'  => 'danfe_theme_options[danfe-blog-hide-meta]',
        'type'      => 'checkbox',
        'priority'  => 10
    ) );


 //Excerpt Length
    $wp_customize->add_setting( 'danfe_theme_options[danfe-blog-excerpt-length]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['danfe-blog-excerpt-length'],
        'sanitize_callback' => 'absint'
    ) );

    $wp_customize->add_control( 'danfe-blog-excerpt-length', array(
        'label'     => __( 'Enter Excerpt Length', 'danfe' ),
        'section'   => 'danfe-site-layout',
        'settings'  => 'danfe_theme_options[danfe-blog-excerpt-length]',
        'type'      => 'number',
        'priority'  => 10
    ) );
/* Pagination Options */
$danfe_choices = danfe_content_option();
$wp_customize->add_setting( 'danfe_theme_options[danfe-show-content]', array(
    'capability'        => 'edit_theme_options',
    'default'           => $defaults['danfe-show-content'],
    'sanitize_callback' => 'danfe_sanitize_select'
) );

$wp_customize->add_control('danfe_theme_options[danfe-show-content]',
            array(
            'choices'     => $danfe_choices,
            'label'       => __( 'Show Content From', 'danfe'),
            'description' => __('Select content Type From Below', 'danfe'),
            'section'     => 'danfe-site-layout',
            'settings'    => 'danfe_theme_options[danfe-show-content]',
            'type'        => 'select',
            'priority'    => 10
         )
    );

/* Image Options */
$danfe_choices = danfe_image_option();
$wp_customize->add_setting( 'danfe_theme_options[danfe-blog-featured-image]', array(
    'capability'        => 'edit_theme_options',
    'default'           => $defaults['danfe-blog-featured-image'],
    'sanitize_callback' => 'danfe_sanitize_select'
) );

$wp_customize->add_control('danfe_theme_options[danfe-blog-featured-image]',
            array(
            'choices'     => $danfe_choices,
            'label'       => __( 'Show Image Layout', 'danfe'),
            'description' => __('Select Image Type From Below', 'danfe'),
            'section'     => 'danfe-site-layout',
            'settings'    => 'danfe_theme_options[danfe-blog-featured-image]',
            'type'        => 'select',
            'priority'    => 10
         )
    );