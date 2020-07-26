<?php 
/*adding sections for footer options*/
    $wp_customize->add_section( 'danfe-header-option', array(
        'priority'       => 150,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Header Option', 'danfe' ),
        'panel'          => 'danfe_panel',
    ) );

    /*Option Section Enable Disable*/
    $wp_customize->add_setting( 'danfe_theme_options[danfe-header-disable]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['danfe-header-disable'],
        'sanitize_callback' => 'danfe_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'danfe-header-disable', array(
        'label'       => __( 'Enable/Disable Header', 'danfe' ),
        'description' => __('Enable Header Section to show search and social', 'danfe'),
        'section'     => 'danfe-header-option',
        'settings'    => 'danfe_theme_options[danfe-header-disable]',
        'type'        => 'checkbox',
        'priority'    => 10
    ) );
    
    /*Search Option*/
    $wp_customize->add_setting( 'danfe_theme_options[danfe-header-search]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['danfe-header-search'],
        'sanitize_callback' => 'danfe_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'danfe-header-search', array(
        'label'       => __( 'Enable/Disable Search in Header', 'danfe' ),
        'description' => __('Enable Header Top Section First Above', 'danfe'),
        'section'     => 'danfe-header-option',
        'settings'    => 'danfe_theme_options[danfe-header-search]',
        'type'        => 'checkbox',
        'priority'    => 10
    ) );

    /*Social Options */
    $wp_customize->add_setting( 'danfe_theme_options[danfe-header-social]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['danfe-header-social'],
        'sanitize_callback' => 'danfe_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'danfe-header-social', array(
        'label'     => __( 'Enable/Disable Social in Header', 'danfe' ),
        'section'   => 'danfe-header-option',
        'settings'  => 'danfe_theme_options[danfe-header-social]',
        'type'      => 'checkbox',
        'priority'  => 10
    ) );

/* Header Options */
$danfe_choices = danfe_header_option();
$wp_customize->add_setting( 'danfe_theme_options[danfe-header-types]', array(
    'capability'        => 'edit_theme_options',
    'default'           => $defaults['danfe-header-types'],
    'sanitize_callback' => 'danfe_sanitize_select'
) );

$wp_customize->add_control('danfe_theme_options[danfe-header-types]',
            array(
            'choices'     => $danfe_choices,
            'label'       => __( 'Header Types', 'danfe'),
            'description' => __('Select the header Types', 'danfe'),
            'section'     => 'danfe-header-option',
            'settings'    => 'danfe_theme_options[danfe-header-types]',
            'type'        => 'select',
            'priority'    => 10
         )
    );
