<?php
/**
 * Functions to manage breadcrumbs
 */
if (!function_exists('markup_breadcrumb_options')) :
    function markup_breadcrumb_options()
    {
        global $markup_theme_options;
        $breadcrumbs = absint($markup_theme_options['markup-extra-breadcrumb']);
        $breadcrumb_from = esc_attr($markup_theme_options['markup-breadcrumb-selection-option']);        

        if ( $breadcrumbs == 1 && $breadcrumb_from == 'theme' ) {
            markup_breadcrumbs();
        }elseif($breadcrumbs == 1 &&  $breadcrumb_from == 'yoast' && (function_exists('yoast_breadcrumb'))){
            yoast_breadcrumb();
        }elseif($breadcrumbs == 1 && 'rankmath' == $breadcrumb_from && (function_exists('rank_math_the_breadcrumbs'))) {
          rank_math_the_breadcrumbs();
        }elseif($breadcrumbs == 1 && 'navxt' == $breadcrumb_from && (function_exists('bcn_display'))){
            bcn_display();
        }else{
            //do nothing
        }
    }
endif;
add_action('markup_breadcrumb_options_hook', 'markup_breadcrumb_options');

/**
 * BreadCrumb Settings
 */
if (!function_exists('markup_breadcrumbs')):
    function markup_breadcrumbs()
    {
        if (!function_exists('markup_breadcrumb_trail')) {
            require get_template_directory() . '/templatesell/breadcrumbs/breadcrumbs.php';
        }
        $breadcrumb_args = array(
            'container' => 'div',
            'show_browse' => false
        );        
        markup_breadcrumb_trail($breadcrumb_args);
    }
endif;
add_action('markup_breadcrumbs_hook', 'markup_breadcrumbs');