<?php
/**
 * Add sidebar class in body
 *
 * @since Markup 1.0.0
 *
 */

add_filter('body_class', 'markup_body_class');
function markup_body_class($classes)
{
    $classes[] = 'at-sticky-sidebar';
    global $markup_theme_options;
    
    if (is_singular()) {
        $sidebar = $markup_theme_options['markup-sidebar-single-page'];
        if ($sidebar == 'single-no-sidebar') {
            $classes[] = 'single-no-sidebar';
        } elseif ($sidebar == 'single-left-sidebar') {
            $classes[] = 'single-left-sidebar';
        } elseif ($sidebar == 'single-middle-column') {
            $classes[] = 'single-middle-column';
        } else {
            $classes[] = 'single-right-sidebar';
        }
    }
    
    $sidebar = $markup_theme_options['markup-sidebar-blog-page'];
    if ($sidebar == 'no-sidebar') {
        $classes[] = 'no-sidebar';
    } elseif ($sidebar == 'left-sidebar') {
        $classes[] = 'left-sidebar';
    } elseif ($sidebar == 'middle-column') {
        $classes[] = 'middle-column';
    } else {
        $classes[] = 'right-sidebar';
    }
    return $classes;
}

/**
 * Add layout class in body
 *
 * @since Markup 1.0.0
 *
 */

add_filter('body_class', 'markup_layout_body_class');
function markup_layout_body_class($classes)
{
    global $markup_theme_options;
    $layout = $markup_theme_options['markup-column-blog-page'];
    if ($layout == 'masonry-post') {
        $classes[] = 'masonry-post';
    } else {
        $classes[] = 'one-column';
    }    
    return $classes;
}


/**
 * Filter to hide text Category from category page
 *
 * @since Markup 1.0.9
 *
 */
add_filter( 'get_the_archive_title', function ( $title ) {
    if( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
});