<?php
/*Blog Page Options*/
$wp_customize->add_section('markup_blog_page_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Blog Settings', 'markup'),
    'panel' => 'markup_panel',
));
/*Blog Page Sidebar Layout*/

$wp_customize->add_setting('markup_options[markup-sidebar-blog-page]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['markup-sidebar-blog-page'],
    'sanitize_callback' => 'markup_sanitize_select'
));

$wp_customize->add_control( new Markup_Radio_Image_Control(
        $wp_customize,
    'markup_options[markup-sidebar-blog-page]', array(
    'choices' => markup_blog_sidebar_position_array(),
    'label' => __('Blog and Archive Sidebar', 'markup'),
    'description' => __('This sidebar will work blog and archive pages.', 'markup'),
    'section' => 'markup_blog_page_section',
    'settings' => 'markup_options[markup-sidebar-blog-page]',
    'type' => 'select',
    'priority' => 15,
)));


/*Blog Page column number*/
$wp_customize->add_setting('markup_options[markup-column-blog-page]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['markup-column-blog-page'],
    'sanitize_callback' => 'markup_sanitize_select'
));

$wp_customize->add_control('markup_options[markup-column-blog-page]', array(
    'choices' => array(
        'one-column' => __('Single Layout', 'markup'),
        'masonry-post' => __('Masonry Layout', 'markup'),
    
    ),
    'label' => __('Blog Layout Options', 'markup'),
    'description' => __('Change your blog or archive page layout.', 'markup'),
    'section' => 'markup_blog_page_section',
    'settings' => 'markup_options[markup-column-blog-page]',
    'type' => 'select',
    'priority' => 15,
));


/*Image Layout Options For Blog Page*/
$wp_customize->add_setting('markup_options[markup-blog-image-layout]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['markup-blog-image-layout'],
    'sanitize_callback' => 'markup_sanitize_select'
));

$wp_customize->add_control('markup_options[markup-blog-image-layout]', array(
    'choices' => array(
        'full-image' => __('Full Layout', 'markup'),
        'left-image' => __('Grid Layout', 'markup'),
    
    ),
    'label' => __('Blog Page Layout', 'markup'),
    'description' => __('This will work only on Full layout Option', 'markup'),
    'section' => 'markup_blog_page_section',
    'settings' => 'markup_options[markup-blog-image-layout]',
    'type' => 'select',
    'priority' => 15,
));

/*Blog Page Show content from*/
$wp_customize->add_setting('markup_options[markup-content-show-from]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['markup-content-show-from'],
    'sanitize_callback' => 'markup_sanitize_select'
));

$wp_customize->add_control('markup_options[markup-content-show-from]', array(
    'choices' => array(
        'excerpt' => __('Show from Excerpt', 'markup'),
        'content' => __('Show from Content', 'markup'),
    ),
    'label' => __('Select Content Display From', 'markup'),
    'description' => __('You can enable excerpt from Screen Options inside post section of dashboard', 'markup'),
    'section' => 'markup_blog_page_section',
    'settings' => 'markup_options[markup-content-show-from]',
    'type' => 'select',
    'priority' => 15,
));


/*Blog Page excerpt length*/
$wp_customize->add_setting('markup_options[markup-excerpt-length]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['markup-excerpt-length'],
    'sanitize_callback' => 'absint'

));

$wp_customize->add_control('markup_options[markup-excerpt-length]', array(
    'label' => __('Excerpt Length', 'markup'),
    'description' => __('Enter the number per Words to show the content in blog page.', 'markup'),
    'section' => 'markup_blog_page_section',
    'settings' => 'markup_options[markup-excerpt-length]',
    'type' => 'number',
    'priority' => 15,
));

/*Exclude Category in Blog Page*/
$wp_customize->add_setting('markup_options[markup-blog-exclude-category]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['markup-blog-exclude-category'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('markup_options[markup-blog-exclude-category]', array(
    'label' => __('Exclude categories in Blog Listing', 'markup'),
    'description' => __('Enter categories ids with comma separated eg: 2,7,14,47.', 'markup'),
    'section' => 'markup_blog_page_section',
    'settings' => 'markup_options[markup-blog-exclude-category]',
    'type' => 'text',
    'priority' => 15,
));

/*Blog Page Pagination Options*/
$wp_customize->add_setting('markup_options[markup-pagination-options]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['markup-pagination-options'],
    'sanitize_callback' => 'markup_sanitize_select'

));

$wp_customize->add_control('markup_options[markup-pagination-options]', array(
    'choices' => array(
        'numeric' => __('Numeric Pagination', 'markup'),
        'ajax' => __('Ajax Pagination', 'markup'),
    ),
    'label' => __('Pagination Types', 'markup'),
    'description' => __('Choose Required Pagination Type', 'markup'),
    'section' => 'markup_blog_page_section',
    'settings' => 'markup_options[markup-pagination-options]',
    'type' => 'select',
    'priority' => 15,
));

/*Blog Page read more text*/
$wp_customize->add_setting('markup_options[markup-read-more-text]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['markup-read-more-text'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('markup_options[markup-read-more-text]', array(
    'label' => __('Read More Text', 'markup'),
    'description' => __('Read more text for blog and archive page.', 'markup'),
    'section' => 'markup_blog_page_section',
    'settings' => 'markup_options[markup-read-more-text]',
    'type' => 'text',
    'priority' => 15,
));


/*Social Share in blog page*/
$wp_customize->add_setting('markup_options[markup-show-hide-share]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['markup-show-hide-share'],
    'sanitize_callback' => 'markup_sanitize_checkbox'
));

$wp_customize->add_control('markup_options[markup-show-hide-share]', array(
    'label' => __('Show Social Share', 'markup'),
    'description' => __('Options to Enable Social Share in blog and archive page.', 'markup'),
    'section' => 'markup_blog_page_section',
    'settings' => 'markup_options[markup-show-hide-share]',
    'type' => 'checkbox',
    'priority' => 15,
));

/*Category Show hide*/
$wp_customize->add_setting('markup_options[markup-show-hide-category]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['markup-show-hide-category'],
    'sanitize_callback' => 'markup_sanitize_checkbox'
));

$wp_customize->add_control('markup_options[markup-show-hide-category]', array(
    'label' => __('Show Category', 'markup'),
    'description' => __('Option to hide the category on the blog page.', 'markup'),
    'section' => 'markup_blog_page_section',
    'settings' => 'markup_options[markup-show-hide-category]',
    'type' => 'checkbox',
    'priority' => 15,
));
/*Date Show hide*/
$wp_customize->add_setting('markup_options[markup-show-hide-date]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['markup-show-hide-date'],
    'sanitize_callback' => 'markup_sanitize_checkbox'
));

$wp_customize->add_control('markup_options[markup-show-hide-date]', array(
    'label' => __('Show Date', 'markup'),
    'description' => __('Option to hide the date on the blog page.', 'markup'),
    'section' => 'markup_blog_page_section',
    'settings' => 'markup_options[markup-show-hide-date]',
    'type' => 'checkbox',
    'priority' => 15,
));
/*Author Show hide*/
$wp_customize->add_setting('markup_options[markup-show-hide-author]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['markup-show-hide-author'],
    'sanitize_callback' => 'markup_sanitize_checkbox'
));

$wp_customize->add_control('markup_options[markup-show-hide-author]', array(
    'label' => __('Show Author', 'markup'),
    'description' => __('Option to hide the author on the blog page.', 'markup'),
    'section' => 'markup_blog_page_section',
    'settings' => 'markup_options[markup-show-hide-author]',
    'type' => 'checkbox',
    'priority' => 15,
));

