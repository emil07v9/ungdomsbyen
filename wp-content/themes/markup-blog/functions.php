<?php
/**
 * Recommended way to include parent theme styles.
 * (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
 *
 */
/**
 * Loads the child theme textdomain.
 */
function markup_blog_load_language() {
    load_child_theme_textdomain( 'markup-blog' );
}
add_action( 'after_setup_theme', 'markup_blog_load_language' );

/**
 * Enqueue Style for child theme.
 */
function markup_blog_enqueue_scripts() {
    // Fonts
    wp_enqueue_style('markup-body', '//fonts.googleapis.com/css2?family=Domine:wght@400;500;600;700&display=swap" rel="stylesheet"', array(), null);

    wp_enqueue_style( 'grid-css', get_template_directory_uri() . '/css/bootstrap.css', array(), '4.5.0' );

   wp_enqueue_style( 'markup-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'markup-blog-style',get_stylesheet_directory_uri() . '/style.css',array('markup-style'));
}
add_action( 'wp_enqueue_scripts', 'markup_blog_enqueue_scripts');

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
            'markup_search_placeholder'=> esc_html__('Search','markup-blog'),
            'markup_enable_advertisement'  => '',
            'markup_link_advertisement'=>'',

            /*Colors Options*/
            'markup_primary_color'              => '#F39887',

            /*Slider Options*/
            'markup_enable_slider'      => 1,
            'markup-select-category'    => 0,
    
            /*Boxes Section */
            'markup_enable_promo'       => 0,
            'markup-promo-select-category'=> 0,
            
            /*Blog Page*/
            'markup-sidebar-blog-page' => 'right-sidebar',
            'markup-column-blog-page'  => 'one-column',
            'markup-blog-image-layout' => 'left-image',
            'markup-content-show-from' => 'excerpt',
            'markup-excerpt-length'    => 25,
            'markup-pagination-options'=> 'numeric',
            'markup-blog-exclude-category'=> '',
            'markup-read-more-text'    => '',
            'markup-show-hide-share'   => 1,
            'markup-show-hide-category'=> 1,
            'markup-show-hide-date'=> 1,
            'markup-show-hide-author'=> 1,

            /*Single Page */
            'markup-single-page-featured-image' => 1,
            'markup-single-page-related-posts'  => 0,
            'markup-single-page-related-posts-title' => esc_html__('Related Posts','markup-blog'),
            'markup-sidebar-single-page'=> 'single-right-sidebar',
            'markup-single-social-share' => 1,


            /*Sticky Sidebar*/
            'markup-enable-sticky-sidebar' => 1,

            /*Footer Section*/
            'markup-footer-copyright'  => esc_html__('Copyright All Rights Reserved 2021','markup-blog'),

            /*Breadcrumb Options*/
            'markup-extra-breadcrumb' => 1,
            'markup-breadcrumb-selection-option'=> 'theme',

        );
return apply_filters( 'markup_default_theme_options_values', $default_theme_options );
}
endif;

/* Word read count */
if (!function_exists('markup_blog_read_time')) :
    /**
     * @param $content
     *
     * @return string
     */
    function markup_blog_read_time()
    {
        $content = apply_filters('the_content', get_post_field('post_content'));
        $read_words = 200;
        $decode_content = html_entity_decode($content);
        $filter_shortcode = do_shortcode($decode_content);
        $strip_tags = wp_strip_all_tags($filter_shortcode, true);
        $count = str_word_count($strip_tags);
        $word_per_min = (absint($count) / $read_words);
        $word_per_min = ceil($word_per_min);

        if (absint($word_per_min) > 0) {
            $word_count_strings = sprintf(_n('%s Min Reading', '%s Min Reading', number_format_i18n($word_per_min), 'markup-blog'), number_format_i18n($word_per_min));
            if ('post' == get_post_type()):
                echo '<span class="min-read">';
                echo esc_html($word_count_strings);
                echo '</span>';
            endif;

        }
    }
endif;

