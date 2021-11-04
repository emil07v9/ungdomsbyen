<?php 
/*Sticky Sidebar*/
$wp_customize->add_section( 'markup_sticky_sidebar', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Sticky Sidebar Settings', 'markup' ),
   'panel' 		 => 'markup_panel',
) );

/*Sticky Sidebar Setting*/
$wp_customize->add_setting( 'markup_options[markup-enable-sticky-sidebar]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['markup-enable-sticky-sidebar'],
    'sanitize_callback' => 'markup_sanitize_checkbox'
) );

$wp_customize->add_control( 'markup_options[markup-enable-sticky-sidebar]', array(
    'label'     => __( 'Enable Sticky Sidebar', 'markup' ),
    'description' => __('Enable and Disable sticky sidebar from this section.', 'markup'),
    'section'   => 'markup_sticky_sidebar',
    'settings'  => 'markup_options[markup-enable-sticky-sidebar]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );