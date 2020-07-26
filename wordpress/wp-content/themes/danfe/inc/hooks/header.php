<?php
/*
* Header Hook Section 
* @since 1.0.0
*/
/* ------------------------------
* Doctype hook of the theme
* @since 1.0.0
* @package Danfe
------------------------------ */
if ( ! function_exists( 'danfe_doctype_action' ) ) :
    /**
     * Doctype declaration of the theme.
     *
     * @since 1.0.0
     */
    function danfe_doctype_action() {
    ?>
    <!DOCTYPE html>
		<html <?php language_attributes(); ?> class="boxed">
    <?php
    }
endif;
add_action( 'danfe_doctype', 'danfe_doctype_action', 10 );

/* --------------------------
* Header hook of the theme.
* @since 1.0.0
* @package Danfe
-------------------------- */
if ( ! function_exists( 'danfe_head_action' ) ) :
    /**
     * Header hook of the theme.
     *
     * @since 1.0.0
     */
    function danfe_head_action() {
    ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <?php
    }
endif;
add_action( 'danfe_head', 'danfe_head_action', 10 );

/* -----------------------
* Header skip link hook of the theme.
* @since 1.0.0
* @package Danfe
----------------------- */
if ( ! function_exists( 'danfe_skip_link_head' ) ) :
    /**
     * Header skip link hook of the theme.
     *
     * @since 1.0.0
     */
    function danfe_skip_link_head() {
    ?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'danfe' ); ?></a>
	<?php
    }
	endif;
add_action( 'danfe_skip_link_action', 'danfe_skip_link_head', 10 );

/* -------------------------
* Header section start wrapper theme.
* @since 1.0.0
* @package Danfe
------------------------- */
if ( ! function_exists( 'danfe_header_start_wrapper' ) ) :
    /**
     * Header section start wrapper theme.
     *
     * @since 1.0.0
     */
    function danfe_header_start_wrapper() {
    ?>
		<div id="page">
	<?php
    }
	endif;
add_action( 'danfe_header_start_wrapper_action', 'danfe_header_start_wrapper', 10 );


/* -------------------------
* Header section hook of the theme.
* @since 1.0.0
* @package Danfe
------------------------- */
if ( ! function_exists( 'danfe_header_section' ) ) :
    /**
     * Header section hook of the theme.
     *
     * @since 1.0.0
     */
    function danfe_header_section() {
    ?>

	<header role="header">
		<?php
		global $danfe_theme_options;
		$danfe_theme_options        = danfe_get_theme_options();
		$danfe_header_search        = $danfe_theme_options['danfe-header-search'];
		$danfe_header_social        = $danfe_theme_options['danfe-header-social'];
		?>
			<div class="top-header">
				<div class="container">
					<div class="row">
						<div class="col-sm-4">
							<div class="social-links">
								<?php 
								if (has_nav_menu('social') && $danfe_header_social == 1 )
								 {
								wp_nav_menu( array( 'theme_location' => 'social', 'menu_class
										' => 'nav navbar-social' ) ); 
								 }
								?>
								
							</div>
						</div>
						<div class="col-sm-8">
							<?php
								$danfe_header_search  = $danfe_theme_options['danfe-header-search'];
								if ($danfe_header_search == 1 ): 
							?>
							<div id="search-form">
								<div class="top-search-wrapper">
							        <?php 
										get_search_form();
									?>
								</div>
						    </div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</header>
		<?php
	    }
	endif;
	add_action( 'danfe_header_section_action', 'danfe_header_section', 10 );


/* ----------------------
* Header Lower section hook of the theme.
* @since 1.0.0
* @package Danfe
----------------------- */
if ( ! function_exists( 'danfe_header_lower_section' ) ) :
    /**
     * Header section hook of the theme.
     *
     * @since 1.0.0
     */
    function danfe_header_lower_section() {

    	global $danfe_theme_options;
		$danfe_theme_options        = danfe_get_theme_options();
		$danfe_header_types        = $danfe_theme_options['danfe-header-types'];
		$header_class = ($danfe_header_types == 'default') ? '' : 'center-logo';

    ?>

	<div class="header-lower">
    	<div class="container">
    		<!-- Main Menu -->
            <nav class="main-menu <?php echo $header_class; ?>">
    			<div class="logo-header-inner">
                   <?php
                      if (has_custom_logo()) { ?>
                   
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> 
                    	<?php  the_custom_logo();?>
                    </a>
                  <?php } 
                  	else {
                  ?>  
                    <div class="togo-text">
                    	<?php
						if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
						endif;
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
							<?php
						endif; ?>
                    </div>
                 <?php } ?>   
				</div>
            	<div class="navbar-header">
                    <!-- Toggle Button -->    	
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    	<span class="sr-only"><?php _e('Toggle navigation', 'danfe');?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse clearfix">
                	<div class="navbar-right">
						<?php 
							if ( has_nav_menu('primary'))
								{
									wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'navigation' ) ); 
								}
							  else
							  { ?>
							  	<ul class="navigation">
				                    <li class="menu-item">
				                        <a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?> "> <?php esc_html_e('Add a menu','danfe'); ?></a>
				                    </li>
				                </ul>
						<?php }		
						?>
					</div>
				</div><!-- /.navbar-collapse -->
				
			</nav>
		</div>
	</div>
	<?php
    }
	endif;
add_action( 'danfe_header_lower_section_action', 'danfe_header_lower_section', 10 );

/* ----------------------
* Header end wrapper section hook of the theme.
* @since 1.0.0
* @package Danfe
---------------------- */
if ( ! function_exists( 'danfe_header_end_wrapper' ) ) :
    /**
     * Header end wrapper section hook of the theme.
     *
     * @since 1.0.0
     */
    function danfe_header_end_wrapper() { ?>
	<div id="content" class="site-content">
		<?php if( !is_page_template('elementor_header_footer') ){ ?>
			<div class="container">
			<div class="row">
		
		<?php
		}
    }
	endif;
add_action( 'danfe_header_end_wrapper_action', 'danfe_header_end_wrapper', 10 );

//=============================================================
// Body open hook
//=============================================================
if ( ! function_exists( 'wp_body_open' ) ) {
    /**
     * Body open hook.
     */
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}