<?php
/*Slider Options*/
$GLOBALS['markup_theme_options'] = markup_get_options_value();

$wp_customize->add_section( 'markup_slider_section', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Slider Settings', 'markup' ),
   'panel' 		 => 'markup_panel',
) );

/*callback functions slider*/
if ( !function_exists('markup_slider_active_callback') ) :
  function markup_slider_active_callback(){
      global $markup_theme_options;
      $enable_slider = absint($markup_theme_options['markup_enable_slider']);
      if( 1 == $enable_slider ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Slider Enable Option*/
$wp_customize->add_setting( 'markup_options[markup_enable_slider]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['markup_enable_slider'],
   'sanitize_callback' => 'markup_sanitize_checkbox'
) );

$wp_customize->add_control(
    'markup_options[markup_enable_slider]', 
    array(
       'label'     => __( 'Enable Slider', 'markup' ),
       'description' => __('You can select the category for the slider below. More Options are available on premium version.', 'markup'),
       'section'   => 'markup_slider_section',
       'settings'  => 'markup_options[markup_enable_slider]',
        'type'      => 'checkbox',
       'priority'  => 15,
   )
 );        

/*Slider Category Selection*/
$wp_customize->add_setting( 'markup_options[markup-select-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['markup-select-category'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new Markup_Customize_Category_Dropdown_Control(
        $wp_customize,
        'markup_options[markup-select-category]',
        array(
            'label'     => __( 'Select Category For Slider', 'markup' ),
            'description' => __('Choose one category to show the slider. More settings are in pro version.', 'markup'),
            'section'   => 'markup_slider_section',
            'settings'  => 'markup_options[markup-select-category]',
            'type'      => 'category_dropdown',
            'priority'  => 15,
            'active_callback'=> 'markup_slider_active_callback',
        )
    )

);