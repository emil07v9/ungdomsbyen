<?php 
/*Extra Options*/

$wp_customize->add_section( 'markup_extra_options', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Breadcrumb Settings', 'markup' ),
    'panel'          => 'markup_panel',
) );



/*Breadcrumb Enable*/
$wp_customize->add_setting( 'markup_options[markup-extra-breadcrumb]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['markup-extra-breadcrumb'],
    'sanitize_callback' => 'markup_sanitize_checkbox'
) );

$wp_customize->add_control( 'markup_options[markup-extra-breadcrumb]', array(
    'label'     => __( 'Enable Breadcrumb', 'markup' ),
    'description' => __( 'Breadcrumb will appear on all pages except home page. More settings will be on the premium version.', 'markup' ),
    'section'   => 'markup_extra_options',
    'settings'  => 'markup_options[markup-extra-breadcrumb]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );

/*callback functions related posts*/
if (!function_exists('markup_breadcrumb_callback')) :
    function markup_breadcrumb_callback()
    {
        global $markup_theme_options;
        $breadcrumb = absint($markup_theme_options['markup-extra-breadcrumb']);
        if (1 == $breadcrumb) {
            return true;
        } else {
            return false;
        }
    }
endif;

/*Select Breadcrumb From*/
$wp_customize->add_setting('markup_options[markup-breadcrumb-selection-option]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['markup-breadcrumb-selection-option'],
    'sanitize_callback' => 'markup_sanitize_select'
));

$wp_customize->add_control('markup_options[markup-breadcrumb-selection-option]', array(
    'choices' => array(
        'theme' => __('Theme Default', 'markup'),
        'yoast' => __('Yoast Plugin', 'markup'),
        'rankmath' => __('Rank Math Plugin', 'markup'),
        'navxt' => __('NavXT Plugin', 'markup'),
    ),
    'label' => __('Select Breadcrumb From', 'markup'),
    'description' => __('You need to install and activate the respected plugin to show their Breadcrumb. Otherwise, your default theme Breadcrumb will appear. If you see error in search console, then we recommend to use plugin Breadcrumb.', 'markup'),
    'section' => 'markup_extra_options',
    'settings' => 'markup_options[markup-breadcrumb-selection-option]',
    'type' => 'select',
    'priority' => 15,
    'active_callback'=>'markup_breadcrumb_callback',
));