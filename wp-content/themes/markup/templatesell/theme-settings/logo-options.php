<?php 

/*Logo Position*/
$wp_customize->add_setting('markup_options[markup_logo_position_option]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['markup_logo_position_option'],
    'sanitize_callback' => 'markup_sanitize_select'
));

$wp_customize->add_control('markup_options[markup_logo_position_option]', array(
    'choices' => array(
        'center-logo' => __('Center Logo & Below Advertisement', 'markup'),
        'left-logo' => __('Left Logo & Right Advertisement', 'markup'),
    
    ),
    'label' => __('Logo Position Options', 'markup'),
    'description' => __('You can either center the logo or left logo.', 'markup'),
    'section' => 'title_tagline',
    'settings' => 'markup_options[markup_logo_position_option]',
    'type' => 'select',
    'priority' => 15,
));


/*Logo Width*/
$wp_customize->add_setting( 'markup_options[markup_logo_width_option]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['markup_logo_width_option'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'markup_options[markup_logo_width_option]', array(
   'label'     => __( 'Logo Width', 'markup' ),
   'description' => __('Adjust the logo width. Minimum is 100px and maximum is 600px.', 'markup'),
   'section'   => 'title_tagline',
   'settings'  => 'markup_options[markup_logo_width_option]',
   'type'      => 'range',
   'priority'  => 15,
   'input_attrs' => array(
          'min' => 100,
          'max' => 600,
        ),
) );