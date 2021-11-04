<?php
$GLOBALS['markup_theme_options'] = markup_get_options_value();

/* Header Image Additional Options */
/*Enable Overlay on the Header Image Part*/
$wp_customize->add_setting( 'markup_options[markup_enable_header_image_overlay]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['markup_enable_header_image_overlay'],
   'sanitize_callback' => 'markup_sanitize_checkbox'
) );

$wp_customize->add_control(
    'markup_options[markup_enable_header_image_overlay]', 
    array(
       'label'     => __( 'Enable Header Image Overlay Color Height', 'markup' ),
       'description' => __('This option will add colors over the header image.', 'markup'),
       'section'   => 'header_image',
       'settings'  => 'markup_options[markup_enable_header_image_overlay]',
        'type'      => 'checkbox',
       'priority'  => 15,
   )
 );

/*callback functions header overlay*/
if ( !function_exists('markup_header_overlay_color_active_callback') ) :
  function markup_header_overlay_color_active_callback(){
      global $markup_theme_options;
      $slider_overlay = absint($markup_theme_options['markup_enable_header_image_overlay']);
      if( $slider_overlay == 1 ){
          return true;
      }
      else{
          return false;
      }
  }
endif;  

/*Header Image Height*/
$wp_customize->add_setting( 'markup_options[markup_header_image_height]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['markup_header_image_height'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'markup_options[markup_header_image_height]', array(
   'label'     => __( 'Header Image Min Height', 'markup' ),
   'description' => __('Adjust the header image min height height. Minimum is 50px and maximum is 500px.', 'markup'),
   'section'   => 'header_image',
   'settings'  => 'markup_options[markup_header_image_height]',
   'type'      => 'range',
   'priority'  => 15,
   'input_attrs' => array(
          'min' => 50,
          'max' => 500,
        ),
    'active_callback'=> 'markup_header_overlay_color_active_callback',
) ); 

/* Select the color for the Overlay */
$wp_customize->add_setting( 'markup_options[markup_slider_overlay_color]',
    array(
        'default'           => $default['markup_slider_overlay_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(                 
        $wp_customize,
        'markup_options[markup_slider_overlay_color]',
        array(
            'label'       => esc_html__( 'Header Image Overlay Color', 'markup' ),
            'description' => esc_html__( 'It will add the color overlay of the Header image. To make it transparent, use the below option.', 'markup' ),
            'section'     => 'header_image', 
            'priority'  => 15, 
            'active_callback'=> 'markup_header_overlay_color_active_callback',
        )
    )
);

/*Overlay Range for transparent*/
$wp_customize->add_setting( 'markup_options[markup_slider_overlay_transparent]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['markup_slider_overlay_transparent'],
    'sanitize_callback' => 'markup_sanitize_number'
) );
$wp_customize->add_control( 'markup_options[markup_slider_overlay_transparent]', array(
   'label'     => __( 'Header Image Overlay Color Transparent', 'markup' ),
   'description' => __('You can make the overlay transparent using this option. Add range from 0.1 to 1.', 'markup'),
   'section'   => 'header_image',
   'settings'  => 'markup_options[markup_slider_overlay_transparent]',
   'type'      => 'number',
   'priority'  => 15,
   'input_attrs' => array(
        'min' => '0.1',
        'max' => '1',
        'step' => '0.1',
    ),
   'active_callback' => 'markup_header_overlay_color_active_callback',
) );