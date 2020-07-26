<?php
/**
 * Goto Top functions
 *
 * @since Danfe 1.0.0
 *
 */
if (!function_exists('danfe_go_to_top')) :
    function danfe_go_to_top()
    {
        ?>
        <a id="toTop" href="#" class="scrolltop" title="<?php esc_attr_e('Go to Top', 'danfe'); ?>">
            <i class="fa fa-angle-double-up"></i>
        </a>
    <?php
    } endif;

/**
 * Post Navigation Function
 *
 * @since Danfe 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('danfe_posts_navigation') ) :
    function danfe_posts_navigation() {
        global $danfe_theme_options;
        $danfe_pagination_option = $danfe_theme_options['danfe-blog-pagination-type-options'];
        if( 'default' == $danfe_pagination_option ){
            the_posts_navigation();
        }
    }
endif;
add_action( 'danfe_action_navigation', 'danfe_posts_navigation', 10 );

/*
* Remove [...] from default fallback excerpt content
*
*/
function danfe_excerpt_more( $more ) {
  if(is_admin())
  {
    return $more;
  }
  return '&hellip';
}
add_filter( 'excerpt_more', 'danfe_excerpt_more');


/*
* Widget Enqueue 
*/
if (!function_exists('danfe_widgets_backend_enqueue')) : 
function danfe_widgets_backend_enqueue($hook){  

  if ( 'widgets.php' != $hook )
   {
            return;
        
   }
    wp_register_script( 'danfe-custom-widgets', get_template_directory_uri().'/assets/js/widgets.js', array( 'jquery' ), true );
    wp_enqueue_media();
    wp_enqueue_script( 'danfe-custom-widgets' );
}

add_action( 'admin_enqueue_scripts', 'danfe_widgets_backend_enqueue' );

endif;

/**
 * Sanitizing the select callback example
 *
 * @since danfe 1.0.0
 *
 * @see sanitize_key()https://developer.wordpress.org/reference/functions/sanitize_key/
 * @see $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
 *
 * @param $input
 * @param $setting
 * @return sanitized output
 *
 */
if ( !function_exists('danfe_sanitize_select') ) :
   
    function danfe_sanitize_select( $input, $setting ) {

        // Ensure input is a slug.
        $input = sanitize_key( $input );

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }
endif;

/**
 * Sanitize checkbox field
 *
 *  @since Danfe 1.0.0
 */
if (!function_exists('danfe_sanitize_checkbox')) :
    function danfe_sanitize_checkbox($checked)
    {
        // Boolean check.
        return ((isset($checked) && true == $checked) ? true : false);
    }
endif;


    /**
 * Filter to change excerpt lenght size
 *
 * @since 1.0.0
 */
if ( !function_exists('danfe_alter_excerpt') ) :
    function danfe_alter_excerpt( $length ){
        if(is_admin() ){
            return $length;
        }
        global $danfe_theme_options;
        $excerpt_length = $danfe_theme_options['danfe-blog-excerpt-length'];
        if( !empty( $excerpt_length ) ){
            return $excerpt_length;
        }
        return 50;
    }
endif;
add_filter('excerpt_length', 'danfe_alter_excerpt');


/**
 * Post Thumbnail
 *
 *  @since Danfe 1.0.0
 */
if (!function_exists('danfe_post_thumbnail')) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function danfe_post_thumbnail()
    {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }

        if (is_singular()) :
            ?>

            <div class="post-thumbnail">
                <?php the_post_thumbnail( 'full' ); ?>
            </div><!-- .post-thumbnail -->

        <?php else : ?>
            <?php
            $image_size = 'thumbnail';
            global $danfe_theme_options;
            $image_location = $danfe_theme_options['danfe-blog-featured-image'];
            if( $image_location == 'full' ){
                $image_size = 'full';
            }
            if ($image_location != 'hide-image'):
                ?>
                <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                    <?php

                    the_post_thumbnail( $image_size, array(
                        'class' => $image_location,
                        'alt' => the_title_attribute(array(
                                'echo' => false,
                            )
                        )
                    ));
                    ?>
                </a>
            <?php
            endif;
            ?>

        <?php endif; // End is_singular().
    }
endif;