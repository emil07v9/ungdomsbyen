<?php
/**
 * Markup Theme Customizer
 *
 * @package Markup
 */

if ( !function_exists('markup_default_theme_options_values') ) :

    function markup_default_theme_options_values() {

        $default_theme_options = array(

          /*Logo Options*/
          'markup_logo_width_option' => '600',
          'markup_logo_position_option'=> 'center-logo',

            /*Header Image*/
            'markup_enable_header_image_overlay'=> 0,
            'markup_slider_overlay_color'=> '#000000',
            'markup_slider_overlay_transparent'=> '0.1',
            'markup_header_image_height'=> '100',

           /*Header Options*/
           'markup_enable_top_header_social'=> 0,
            'markup_enable_search'  => 0,
            'markup_search_placeholder'=> esc_html__('Search','markup'),
            'markup_enable_advertisement'  => '',
            'markup_link_advertisement'=>'',

            /*Colors Options*/
            'markup_primary_color'              => '#ec407a',

            /*Slider Options*/
            'markup_enable_slider'      => 1,
            'markup-select-category'    => 0,
    
            /*Boxes Section */
            'markup_enable_promo'       => 0,
            'markup-promo-select-category'=> 0,
            
            /*Blog Page*/
            'markup-sidebar-blog-page' => 'no-sidebar',
            'markup-column-blog-page'  => 'masonry-post',
            'markup-blog-image-layout' => 'full-image',
            'markup-content-show-from' => 'excerpt',
            'markup-excerpt-length'    => 25,
            'markup-pagination-options'=> 'ajax',
            'markup-blog-exclude-category'=> '',
            'markup-read-more-text'    => '',
            'markup-show-hide-share'   => 1,
            'markup-show-hide-category'=> 1,
            'markup-show-hide-date'=> 1,
            'markup-show-hide-author'=> 1,

            /*Single Page */
            'markup-single-page-featured-image' => 1,
            'markup-single-page-related-posts'  => 0,
            'markup-single-page-related-posts-title' => esc_html__('Related Posts','markup'),
            'markup-sidebar-single-page'=> 'single-right-sidebar',
            'markup-single-social-share' => 1,


            /*Sticky Sidebar*/
            'markup-enable-sticky-sidebar' => 0,

            /*Footer Section*/
            'markup-footer-copyright'  => esc_html__('Copyright All Rights Reserved 2021','markup'),

            /*Breadcrumb Options*/
            'markup-extra-breadcrumb' => 1,
            'markup-breadcrumb-selection-option'=> 'theme',

        );
return apply_filters( 'markup_default_theme_options_values', $default_theme_options );
}
endif;
/**
 *  Markup Theme Options and Settings
 *
 * @since Markup 1.0.0
 *
 * @param null
 * @return array markup_get_options_value
 *
 */
if ( !function_exists('markup_get_options_value') ) :
    function markup_get_options_value() {
        $markup_default_theme_options_values = markup_default_theme_options_values();
        $markup_get_options_value = get_theme_mod( 'markup_options');
        if( is_array( $markup_get_options_value )){
            return array_merge( $markup_default_theme_options_values, $markup_get_options_value );
        }
        else{
            return $markup_default_theme_options_values;
        }
    }
endif;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function markup_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
    if ( isset( $wp_customize->selective_refresh ) ) {
      $wp_customize->selective_refresh->add_partial( 'blogname', array(
         'selector'        => '.site-title a',
         'render_callback' => 'markup_customize_partial_blogname',
     ) );
      $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
         'selector'        => '.site-description',
         'render_callback' => 'markup_customize_partial_blogdescription',
     ) );
  }
  $default = markup_default_theme_options_values();

  require get_template_directory() . '/templatesell/theme-settings/theme-settings.php';

}
add_action( 'customize_register', 'markup_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function markup_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function markup_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function markup_customize_preview_js() {
	wp_enqueue_script( 'markup-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20200412', true );
}
add_action( 'customize_preview_init', 'markup_customize_preview_js' );

/*
** Customizer Styles
*/
function markup_panels_css() {
     wp_enqueue_style('markup-customizer-css', get_template_directory_uri() . '/css/customizer-style.css', array(), '4.5.0');
}
add_action( 'customize_controls_enqueue_scripts', 'markup_panels_css' );