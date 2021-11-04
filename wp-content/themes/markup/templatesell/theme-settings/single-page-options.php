<?php
$GLOBALS['markup_theme_options'] = markup_get_options_value();

/*Single Page Options*/
$wp_customize->add_section('markup_single_page_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Single Page Settings', 'markup'),
    'panel' => 'markup_panel',
));

/*Featured Image Option*/
$wp_customize->add_setting('markup_options[markup-single-page-featured-image]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['markup-single-page-featured-image'],
    'sanitize_callback' => 'markup_sanitize_checkbox'
));

$wp_customize->add_control('markup_options[markup-single-page-featured-image]', array(
    'label' => __('Enable Featured Image on Single Posts', 'markup'),
    'description' => __('You can hide images on single post from here.', 'markup'),
    'section' => 'markup_single_page_section',
    'settings' => 'markup_options[markup-single-page-featured-image]',
    'type' => 'checkbox',
    'priority' => 15,
));

/*Single Page Sidebar Layout*/
$wp_customize->add_setting('markup_options[markup-sidebar-single-page]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['markup-sidebar-single-page'],
    'sanitize_callback' => 'markup_sanitize_select'
));

$wp_customize->add_control( 
    new Markup_Radio_Image_Control(
        $wp_customize,
    'markup_options[markup-sidebar-single-page]', array(
    'choices' => markup_sidebar_position_array(),
    'label' => __('Select Sidebar', 'markup'),
    'description' => __('From Appearance > Customize > Widgets and add the widgets on the respected widget areas.', 'markup'),
    'section' => 'markup_single_page_section',
    'settings' => 'markup_options[markup-sidebar-single-page]',
    'type' => 'select',
    'priority' => 15,
)));

/*Related Post Options*/
$wp_customize->add_setting('markup_options[markup-single-page-related-posts]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['markup-single-page-related-posts'],
    'sanitize_callback' => 'markup_sanitize_checkbox'
));

$wp_customize->add_control('markup_options[markup-single-page-related-posts]', array(
    'label' => __('Related Posts', 'markup'),
    'description' => __('2 posts of same category will appear.', 'markup'),
    'section' => 'markup_single_page_section',
    'settings' => 'markup_options[markup-single-page-related-posts]',
    'type' => 'checkbox',
    'priority' => 15,
));


/*callback functions related posts*/
if (!function_exists('markup_related_post_callback')) :
    function markup_related_post_callback()
    {
        global $markup_theme_options;
        $related_posts = absint($markup_theme_options['markup-single-page-related-posts']);
        if (1 == $related_posts) {
            return true;
        } else {
            return false;
        }
    }
endif;

/*Related Post Title*/
$wp_customize->add_setting('markup_options[markup-single-page-related-posts-title]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['markup-single-page-related-posts-title'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('markup_options[markup-single-page-related-posts-title]', array(
    'label' => __('Related Posts Title', 'markup'),
    'description' => __('Enter the suitable title.', 'markup'),
    'section' => 'markup_single_page_section',
    'settings' => 'markup_options[markup-single-page-related-posts-title]',
    'type' => 'text',
    'priority' => 15,
    'active_callback' => 'markup_related_post_callback'
));

/*Social Share Options*/
$wp_customize->add_setting('markup_options[markup-single-social-share]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['markup-single-social-share'],
    'sanitize_callback' => 'markup_sanitize_checkbox'
));

$wp_customize->add_control('markup_options[markup-single-social-share]', array(
    'label' => __('Social Sharing', 'markup'),
    'description' => __('Enable Social Sharing on Single Posts.', 'markup'),
    'section' => 'markup_single_page_section',
    'settings' => 'markup_options[markup-single-social-share]',
    'type' => 'checkbox',
    'priority' => 15,
));
