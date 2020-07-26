<?php 
/*adding sections for Typography Option*/
    $wp_customize->add_section( 'danfe-typography-option', array(

        'priority'       => 170,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Typography Option', 'danfe' ),
        'panel'          => 'danfe_panel',
    ) );

    /*Typography Option For URL*/
    $wp_customize->add_setting( 'danfe_theme_options[danfe-font-family-url]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['danfe-font-family-url'],
        'sanitize_callback' => 'esc_url_raw'
    ) );

    $wp_customize->add_control( 'danfe-font-family-url', array(
        'label'       => __( 'Paragraph Font Family URL Text', 'danfe' ),
        'section'     => 'danfe-typography-option',
        'settings'    => 'danfe_theme_options[danfe-font-family-url]',
        'type'        => 'url',
        'priority'    => 10,
        'description' => sprintf('%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
                __( 'Insert', 'danfe' ),
                esc_url('https://www.google.com/fonts'),
                __('Enter Google Font URL' , 'danfe'),
                __('to add google Font.' ,'danfe')
                ),
    ) );



    /*Font Family Name*/

    $wp_customize->add_setting( 'danfe_theme_options[danfe-font-family-name]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['danfe-font-family-name'],
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'danfe-font-family-name', array(
        'label'       => __( 'Paragraph Font Family Name', 'danfe' ),
        'section'     => 'danfe-typography-option',
        'settings'    => 'danfe_theme_options[danfe-font-family-name]',
        'type'        => 'text',
        'priority'    => 10,
        'description' => __( 'Insert Google Font Family Name.', 'danfe' ),
    ) );


    /*Heading Typography Option For URL*/
    $wp_customize->add_setting( 'danfe_theme_options[danfe-heading-font-family-url]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['danfe-heading-font-family-url'],
        'sanitize_callback' => 'esc_url_raw'
    ) );

    $wp_customize->add_control( 'danfe-heading-font-family-url', array(
        'label'       => __( 'Heading(H1 - H6) Font Family URL Text', 'danfe' ),
        'section'     => 'danfe-typography-option',
        'settings'    => 'danfe_theme_options[danfe-heading-font-family-url]',
        'type'        => 'url',
        'priority'    => 10,
        'description' => sprintf('%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
                __( 'Insert', 'danfe' ),
                esc_url('https://www.google.com/fonts'),
                __('Enter Google Font URL' , 'danfe'),
                __('to add google Font.' ,'danfe')
                ),
    ) );



    /*Heading Font Family Name*/

    $wp_customize->add_setting( 'danfe_theme_options[danfe-heading-font-family-name]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['danfe-heading-font-family-name'],
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'danfe-heading-font-family-name', array(
        'label'       => __( 'Headings (H1- H6) Font Family Name', 'danfe' ),
        'section'     => 'danfe-typography-option',
        'settings'    => 'danfe_theme_options[danfe-heading-font-family-name]',
        'type'        => 'text',
        'priority'    => 10,
        'description' => __( 'Insert Google Font Family Name.', 'danfe' ),
    ) );



    /*Menu font Option For URL*/
    $wp_customize->add_setting( 'danfe_theme_options[danfe-menu-font-family-url]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['danfe-menu-font-family-url'],
        'sanitize_callback' => 'esc_url_raw'
    ) );

    $wp_customize->add_control( 'danfe-menu-font-family-url', array(
        'label'       => __( 'Menu Font Family URL Text', 'danfe' ),
        'section'     => 'danfe-typography-option',
        'settings'    => 'danfe_theme_options[danfe-menu-font-family-url]',
        'type'        => 'url',
        'priority'    => 10,
        'description' => sprintf('%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
                __( 'Insert', 'danfe' ),
                esc_url('https://www.google.com/fonts'),
                __('Enter Google Font URL' , 'danfe'),
                __('to add google Font.' ,'danfe')
                ),
    ) );



    /*Menu Font Family Name*/

    $wp_customize->add_setting( 'danfe_theme_options[danfe-menu-font-family-name]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['danfe-menu-font-family-name'],
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'danfe-menu-font-family-name', array(
        'label'       => __( 'Menu Font Family Name', 'danfe' ),
        'section'     => 'danfe-typography-option',
        'settings'    => 'danfe_theme_options[danfe-menu-font-family-name]',
        'type'        => 'text',
        'priority'    => 10,
        'description' => __( 'Insert Google Font Family Name.', 'danfe' ),
    ) );