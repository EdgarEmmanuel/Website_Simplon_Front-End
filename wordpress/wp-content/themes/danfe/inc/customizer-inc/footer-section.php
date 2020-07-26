<?php 
/*adding sections for footer options*/
    $wp_customize->add_section( 'danfe-footer-option', array(
        'priority'       => 170,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Footer Option', 'danfe' ),
        'panel'          => 'danfe_panel',
    ) );
    /*copyright*/

    $wp_customize->add_setting( 'danfe_theme_options[danfe-footer-copyright]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['danfe-footer-copyright'],
        'sanitize_callback' => 'wp_kses_post'
    ) );

    $wp_customize->add_control( 'danfe-footer-copyright', array(
        'label'     => __( 'Copyright Text', 'danfe' ),
        'section'   => 'danfe-footer-option',
        'settings'  => 'danfe_theme_options[danfe-footer-copyright]',
        'type'      => 'text',
        'priority'  => 10

    ) );

    /*go to top*/

    $wp_customize->add_setting( 'danfe_theme_options[danfe-footer-totop]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['danfe-footer-totop'],
        'sanitize_callback' => 'danfe_sanitize_checkbox'
    ) );

    $wp_customize->add_control( 'danfe-footer-totop', array(
        'label'     => __( 'Go To Top Option', 'danfe' ),
        'section'   => 'danfe-footer-option',
        'settings'  => 'danfe_theme_options[danfe-footer-totop]',
        'type'      => 'checkbox',
        'priority'  => 10
    ) );