<?php
/*Promo Section Options*/
$GLOBALS['markup_theme_options'] = markup_get_options_value();
$wp_customize->add_section( 'markup_promo_section', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Boxes Below Slider Settings', 'markup' ),
    'panel'          => 'markup_panel',
) );

/*callback functions slider*/
if ( !function_exists('markup_promo_active_callback') ) :
    function markup_promo_active_callback(){
        global $markup_theme_options;
        $enable_promo = absint($markup_theme_options['markup_enable_promo']);
        if( 1 == $enable_promo ){
            return true;
        }
        else{
            return false;
        }
    }
endif;

/*Boxes Enable Option*/
$wp_customize->add_setting( 'markup_options[markup_enable_promo]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['markup_enable_promo'],
    'sanitize_callback' => 'markup_sanitize_checkbox'
) );

$wp_customize->add_control( 'markup_options[markup_enable_promo]', array(
    'label'     => __( 'Enable Boxes', 'markup' ),
    'description' => __('Enable and select the category to show the boxes below slider.', 'markup'),
    'section'   => 'markup_promo_section',
    'settings'  => 'markup_options[markup_enable_promo]',
    'type'      => 'checkbox',
    'priority'  => 5,

) );

/*Promo Category Selection*/
$wp_customize->add_setting( 'markup_options[markup-promo-select-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['markup-promo-select-category'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new Markup_Customize_Category_Dropdown_Control(
        $wp_customize,
        'markup_options[markup-promo-select-category]',
        array(
            'label'     => __( 'Category For Boxes', 'markup' ),
            'description' => __('From the dropdown select the category for the boxes. Category having post will display in below boxes section.', 'markup'),
            'section'   => 'markup_promo_section',
            'settings'  => 'markup_options[markup-promo-select-category]',
            'type'      => 'category_dropdown',
            'priority'  => 5,
            'active_callback'=>'markup_promo_active_callback'
        )
    )
);