<?php
/**
 * Dynamic css
 *
 * @since Markup 1.0.0
 *
 * @param null
 * @return null
 *
 */
if (!function_exists('markup_dynamic_css')) :

    function markup_dynamic_css()
    {
        global $markup_theme_options;

        /* Color Options Options */
        $markup_primary_color              = esc_attr($markup_theme_options['markup_primary_color']);
        $markup_logo_width              = absint($markup_theme_options['markup_logo_width_option']);
        
        $markup_header_overlay  = esc_attr($markup_theme_options['markup_slider_overlay_color']);
        $markup_header_transparent  = esc_attr($markup_theme_options['markup_slider_overlay_transparent']);
        $markup_header_min_height              = absint($markup_theme_options['markup_header_image_height']);

        $custom_css = '';

        //Primary  Background 
        if (!empty($markup_primary_color)) {
            $custom_css .= "
            #toTop,
            .comment-form #submit{ 
                background-color: ". $markup_primary_color."; 
            }";

        }
        //Primary Color
        if (!empty($markup_primary_color)) {
            $custom_css .= "
            .main-menu ul li.current-menu-item>a, 
            .main-menu ul li:hover>a,
            .widget a:hover, 
            .widget a:focus,
            .footer-menu li a:hover, 
            .footer-menu li a:focus,
            .site-footer a:hover, 
            .site-footer a:focus,
            ul.trail-items li a:hover span{
                color:".$markup_primary_color.";
            }";
         }
        //Primary Color
        if (!empty($markup_primary_color)) {
            $custom_css .= " 
            { 
                color : ". $markup_primary_color."; 
            }";
        }

        //Logo Width
        if (!empty($markup_logo_width)) {
            $custom_css .= "
            .header-1 .head_one .logo{ 
                max-width : ". $markup_logo_width."px; 
            }";
        }

        //Header Overlay
        if (!empty($markup_header_overlay)) {
            $custom_css .= "
            .header-image:before { 
                background-color : ". $markup_header_overlay."; 
            }";
        }

        //Header Tranparent
        if (!empty($markup_header_transparent)) {
            $custom_css .= "
            .header-image:before { 
                opacity : ". $markup_header_transparent."; 
            }";
        }

        //Header Min Height
        if (!empty($markup_header_min_height)) {
            $custom_css .= "
            .header-1 .header-image .head_one { 
                min-height : ". $markup_header_min_height."px; 
            }";
        }

        wp_add_inline_style('markup-style', $custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'markup_dynamic_css', 99);