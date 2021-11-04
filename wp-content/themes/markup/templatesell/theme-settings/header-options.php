<?php
/*Header Options*/
$wp_customize->add_section('markup_header_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Header Settings', 'markup'),
    'panel' => 'markup_panel',
));

/*Enable Social Icons In Header*/
$wp_customize->add_setting( 'markup_options[markup_enable_top_header_social]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['markup_enable_top_header_social'],
   'sanitize_callback' => 'markup_sanitize_checkbox'
) );

$wp_customize->add_control( 'markup_options[markup_enable_top_header_social]', array(
   'label'     => __( 'Enable Social Icons', 'markup' ),
   'description' => __('You can show the social icons here. Manage social icons from Appearance > Menus. Social Menu will display here.', 'markup'),
   'section'   => 'markup_header_section',
   'settings'  => 'markup_options[markup_enable_top_header_social]',
   'type'      => 'checkbox',
   'priority'  => 5,
) );


/*Header Search Enable Option*/
$wp_customize->add_setting( 'markup_options[markup_enable_search]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['markup_enable_search'],
    'sanitize_callback' => 'markup_sanitize_checkbox'
) );

$wp_customize->add_control( 'markup_options[markup_enable_search]', array(
    'label'     => __( 'Enable Search', 'markup' ),
    'description' => __('It will help to display the search in Menu.', 'markup'),
    'section'   => 'markup_header_section',
    'settings'  => 'markup_options[markup_enable_search]',
    'type'      => 'checkbox',
    'priority'  => 5,

) );
/*Search Placeholder*/
$wp_customize->add_setting( 'markup_options[markup_search_placeholder]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['markup_search_placeholder'],
    'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( 'markup_options[markup_search_placeholder]', array(
    'label'     => __( 'Search form Placeholder', 'markup' ),
    'description' => __('Enter Search Placeholder Text here.', 'markup'),
    'section'   => 'markup_header_section',
    'settings'  => 'markup_options[markup_search_placeholder]',
    'type'      => 'text',
    'priority'  => 5,

) );


/*Advertisement*/
$wp_customize->add_setting( 'markup_options[markup_enable_advertisement]', array(
    'capability'    => 'edit_theme_options',
    'default'     => $default['markup_enable_advertisement'],
    'sanitize_callback' => 'markup_sanitize_image'
) );
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'markup_options[markup_enable_advertisement]',
        array(
            'label'   => __( 'Header Advertisement Image', 'markup' ),
            'section'   => 'markup_header_section',
            'settings'  => 'markup_options[markup_enable_advertisement]',
            'type'      => 'image',
            'priority'  => 10,
            'description' => __( 'Recommended image size of 728*90', 'markup' )
        )
    )
);

/*Ads Link*/
$wp_customize->add_setting( 'markup_options[markup_link_advertisement]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['markup_link_advertisement'],
    'sanitize_callback' => 'esc_url_raw'
) );

$wp_customize->add_control( 'markup_options[markup_link_advertisement]', array(
    'label'     => __( 'Advertisement Link', 'markup' ),
    'description' => __('Enter the link for the ads.', 'markup'),
    'section'   => 'markup_header_section',
    'settings'  => 'markup_options[markup_link_advertisement]',
    'type'      => 'url',
    'priority'  => 10,

) );