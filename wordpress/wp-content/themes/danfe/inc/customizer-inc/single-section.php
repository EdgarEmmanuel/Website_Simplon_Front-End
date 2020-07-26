<?php 
/*adding sections for single options*/
    $wp_customize->add_section( 'danfe-single-option', array(
        'priority'       => 170,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Single Page', 'danfe' ),
        'panel'          => 'danfe_panel',
    ) );
       /*Enable Related Post*/

    $wp_customize->add_setting( 'danfe_theme_options[danfe-enable-related-post]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['danfe-enable-related-post'],
        'sanitize_callback' => 'danfe_sanitize_checkbox'
    ) );

    $wp_customize->add_control( 'danfe-enable-related-post', array(
        'label'     => __( 'Enable Related Post', 'danfe' ),
        'section'   => 'danfe-single-option',
        'settings'  => 'danfe_theme_options[danfe-enable-related-post]',
        'type'      => 'checkbox',
        'priority'  => 10

    ) );
    /*Related Post*/

    $wp_customize->add_setting( 'danfe_theme_options[danfe-related-title]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['danfe-related-title'],
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'danfe-related-title', array(
        'label'     => __( 'Related Post Title', 'danfe' ),
        'section'   => 'danfe-single-option',
        'settings'  => 'danfe_theme_options[danfe-related-title]',
        'type'      => 'text',
        'priority'  => 10

    ) );

    //hide meta on single page
    $wp_customize->add_setting( 'danfe_theme_options[danfe-hide-meta]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['danfe-hide-meta'],
        'sanitize_callback' => 'danfe_sanitize_checkbox'
    ) );

    $wp_customize->add_control( 'danfe-hide-meta', array(
        'label'     => __( 'Show Meta Fields', 'danfe' ),
        'section'   => 'danfe-single-option',
        'settings'  => 'danfe_theme_options[danfe-hide-meta]',
        'type'      => 'checkbox',
        'priority'  => 10
    ) );

    //hide featured image on single page
    $wp_customize->add_setting( 'danfe_theme_options[danfe-hide-image]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['danfe-hide-image'],
        'sanitize_callback' => 'danfe_sanitize_checkbox'
    ) );

    $wp_customize->add_control( 'danfe-hide-image', array(
        'label'     => __( 'Show Featured Image', 'danfe' ),
        'section'   => 'danfe-single-option',
        'settings'  => 'danfe_theme_options[danfe-hide-image]',
        'type'      => 'checkbox',
        'priority'  => 10
    ) );