<?php
/**
 * Dynamic css
 *
 * @since Danfe 1.0.0
 *
 * @param null
 * @return null
 *
 */
if (!function_exists('danfe_dynamic_css')) :
 function danfe_dynamic_css()
    {
   global $danfe_theme_options;
        $danfe_font_family = esc_attr( $danfe_theme_options['danfe-font-family-name'] );

        $h1_h6_font_family = esc_attr( $danfe_theme_options['danfe-heading-font-family-name'] );

         $menu_font_family = esc_attr( $danfe_theme_options['danfe-menu-font-family-name'] );  

        $danfe_default_color = esc_attr( $danfe_theme_options['danfe-default-color'] );        
        $danfe_title_color = esc_attr( $danfe_theme_options['danfe-title-tagline-color'] );
        $danfe_tagline_color = esc_attr( $danfe_theme_options['danfe-tagline-color'] );
       
        $custom_css = '';
        /* Typography Section */

        if (!empty($danfe_font_family)) {
            
            $custom_css .= "body { font-family: {$danfe_font_family}; }";
        }

        if (!empty($h1_h6_font_family)) {
            
            $custom_css .= "h1,h1 a, h2, h2 a, h3, h3 a, h4, h4 a, h5, h5 a, h6, h6 a, .widget .widget-title, .entry-header h2.entry-title a, .site-title a { font-family: {$h1_h6_font_family}; }";
        }
        if (!empty($menu_font_family)) {
            
            $custom_css .= ".main-menu .navigation > li > a, .main-menu .navigation > li > ul > li > a { font-family: {$menu_font_family}; }";
        }        

        if(!empty($danfe_default_color)){

            $custom_css .=".nav-links .nav-previous a, .nav-links .nav-next a, .pagination .page-numbers.current, .scrolltop, .btn-more, .site-info, .widget_search form input[type='submit'], .comment-form #submit {background-color: $danfe_default_color; }"; 
        }

        if(!empty($danfe_title_color)){

            $custom_css .= ".site-title a {color: $danfe_title_color;}"; 
        }

        if(!empty($danfe_tagline_color)){

            $custom_css .= ".site-description {color: $danfe_tagline_color; }"; 
        }

        wp_add_inline_style('danfe-style', $custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'danfe_dynamic_css', 99);