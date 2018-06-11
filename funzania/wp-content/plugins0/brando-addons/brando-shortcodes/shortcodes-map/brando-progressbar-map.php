<?php
/**
 * Map For Progressbar
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Progressbar */
/*-----------------------------------------------------------------------------------*/

vc_map(array(
  'icon' => 'brando-shortcode-icon fa fa-ellipsis-h',
  'name' => __( 'ProgressBar' , 'brando-addons' ),
  'base' => 'brando_progress',
  'category' => 'Brando',
  'description' => __( 'Place a ProgressBar', 'brando-addons' ),
  'as_parent' => array('only' => 'brando_progress_content'),
  'content_element' => true,
  'show_settings_on_create' => true,
  'params' => array(
    array(
      'type' => 'checkbox',
      'heading' => __('Show Width', 'brando-addons'),
      'param_name' => 'progress_show_width',
      'value'      => array( 'Show Width of ProgressBar' => '1', )
    ),
    array(
      'type' => 'checkbox',
      'heading' => __('Title Inside ProgressBar', 'brando-addons'),
      'param_name' => 'progress_show_inside_title',
      'value' => array( 'Show Title Inside ProgressBar' => '1', )
    ),
  ),
  'js_view' => 'VcColumnView'
) );

vc_map(array(
  'icon' => 'brando-shortcode-icon fa fa-ellipsis-h',
  'name' => __('Add ProgressBar', 'brando-addons'),
  'description' => __( 'Add new ProgressBar', 'brando-addons'),
  'base' => 'brando_progress_content',
  'content_element' => true,
  'as_child' => array('only' => 'brando_progress'),
  'params' => array(
    array(
      'type' => 'textfield',
      'heading' => __( 'Title', 'brando-addons'),
      'param_name' => 'progress_title',
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Subtitle', 'brando-addons'),
      'param_name' => 'progress_subtitle'
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Height', 'brando-addons'),
      'description' => __( 'Define Height of Progressbar in numeric value like 2', 'brando-addons'),
      'param_name' => 'progress_height'
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Width', 'brando-addons'),
      'description' => __( 'Define Width of Progressbar in numeric value like 80', 'brando-addons'),
      'param_name' => 'progress_width'
    ),
    array(
      'type' => 'colorpicker',
      'class' => '',
      'heading' => __( 'ProgressBar Color', 'brando-addons'),
      'param_name' => 'progress_color',
    ),
    array(
      'type' => 'checkbox',
      'heading' => __('Gradient', 'brando-addons'),
      'param_name' => 'progress_show_gradient',
      'value'       => array( 'Show Gradient in ProgressBar' => '1', )
    ),
    array(
      'type'        => 'responsive_font_settings',
      'param_name'  => 'title_settings',
      'heading'     => esc_html__( 'Font Settings For Title', 'hcode-addons' ),
      'group' => 'Font Settings',
    ),
    array(
      'type'        => 'responsive_font_settings',
      'param_name'  => 'subtitle_settings',
      'heading'     => esc_html__( 'Font Settings For Sub Title', 'hcode-addons' ),
      'group' => 'Font Settings',
    ),
  )  
  ) );
if(class_exists('WPBakeryShortCodesContainer')){
    class WPBakeryShortCode_brando_progress extends WPBakeryShortCodesContainer {}
}
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_brando_progress_content extends WPBakeryShortCode {}
}