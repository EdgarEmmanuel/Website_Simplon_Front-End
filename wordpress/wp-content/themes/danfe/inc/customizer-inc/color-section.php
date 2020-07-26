<?php 
/*adding sections for color Option*/
    $wp_customize->add_section( 'danfe-color-option', array(

        'priority'       => 170,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Color Options', 'danfe' ),
        'panel'          => 'danfe_panel',
    ) );

    /*Default Color Option */
    $wp_customize->add_setting( 'danfe_theme_options[danfe-default-color]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['danfe-default-color'],
        'sanitize_callback' => 'sanitize_hex_color'
    ) );

    $wp_customize->add_control( 'danfe-default-color', array(
        'label'       => __( 'Primary Color', 'danfe' ),
        'section'     => 'danfe-color-option',
        'settings'    => 'danfe_theme_options[danfe-default-color]',
        'type'        => 'color',
        'priority'    => 10,
    ) );

    /*Site title and Tagline Color Option */
    $wp_customize->add_setting( 'danfe_theme_options[danfe-title-tagline-color]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['danfe-title-tagline-color'],
        'sanitize_callback' => 'sanitize_hex_color'
    ) );

    $wp_customize->add_control( 'danfe-title-tagline-color', array(
        'label'       => __( 'Site Title Color', 'danfe' ),
        'section'     => 'danfe-color-option',
        'settings'    => 'danfe_theme_options[danfe-title-tagline-color]',
        'type'        => 'color',
        'priority'    => 10,
    ) );
    /*Site Tagline Color Option */
    $wp_customize->add_setting( 'danfe_theme_options[danfe-tagline-color]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['danfe-tagline-color'],
        'sanitize_callback' => 'sanitize_hex_color'
    ) );

    $wp_customize->add_control( 'danfe-tagline-color', array(
        'label'       => __( 'Site Tagline Color', 'danfe' ),
        'section'     => 'danfe-color-option',
        'settings'    => 'danfe_theme_options[danfe-tagline-color]',
        'type'        => 'color',
        'priority'    => 10,
    ) );