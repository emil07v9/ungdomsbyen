<?php
/*Footer Options*/
$wp_customize->add_section('markup_footer_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Footer Settings', 'markup'),
    'panel' => 'markup_panel',
));


/*Copyright Setting*/
$wp_customize->add_setting('markup_options[markup-footer-copyright]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['markup-footer-copyright'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('markup_options[markup-footer-copyright]', array(
    'label' => __('Copyright Text', 'markup'),
    'description' => __('Enter your own copyright text.', 'markup'),
    'section' => 'markup_footer_section',
    'settings' => 'markup_options[markup-footer-copyright]',
    'type' => 'text',
    'priority' => 15,
));
