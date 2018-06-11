<?php
/**
 * Map For Award Box
 *
 * @package Brando
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Award Box */
/*-----------------------------------------------------------------------------------*/

vc_map( 
  array(
      'name' => __( 'Award Box' , 'brando-addons' ), //Name of your shortcode for human reading inside element list
      'base' => 'brando_award_box', //Shortcode tag. For [my_shortcode] shortcode base is my_shortcode
      'description' => __( 'Create a award box', 'brando-addons' ), //Short description of your element, it will be visible in 'Add element' window
      'class' => '', //CSS class which will be added to the shortcode's content element in the page edit screen in Visual Composer backend edit mode
      'as_parent' => array('only' => 'brando_award_box_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
      'icon' => 'fa fa-gift brando-shortcode-icon', //URL or CSS class with icon image.
      'js_view' => 'VcColumnView',
      'category' => 'Brando',
      'params' => array( //List of shortcode attributes. Array which holds your shortcode params, these params will be editable in shortcode settings page
        array(
            'type' => 'textfield',
            'heading' => __('Year', 'brando-addons'),
            'param_name' => 'brando_year',
        ),
        array(
            'type' => 'colorpicker',
            'heading' => __( 'Year Text Color', 'brando-addons' ),
            'param_name' => 'brando_year_color',
        ),
      ),
  )
);
vc_map( 
  array(
      'name' => __('Add Award Box', 'brando-addons'),
      'base' => 'brando_award_box_content',
      'description' => __( 'Add block for the award', 'brando-addons' ),
      'as_child' => array('only' => 'brando_award_box'), // Use only|except attributes to limit parent (separate multiple values with comma)
      'icon' => 'fa fa-picture-o brando-shortcode-icon', //URL or CSS class with icon image.
      'params' => array(
        array(
            'type' => 'attach_image',
            'heading' => __( 'Image', 'brando-addons' ),
            'param_name' => 'brando_image',
        ),
        array(
          'type' => 'textfield',
          'heading' => __('Title', 'brando-addons'),
          'param_name' => 'brando_title',
        ),
        array(
          'type' => 'textarea_html',
          'heading' => __('Content', 'brando-addons'),
          'param_name' => 'content'
        ),
        array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => __( 'Title Color', 'brando-addons' ),
            'param_name' => 'brando_title_color',
            'group' => 'Color',
        ),
        array(
            'type' => 'brando_custom_switch_option',
            'holder' => 'div',
            'class' => '',
            'heading' => __('Show Separator', 'brando-addons'),
            'param_name' => 'show_separator',
            'value' => array(__('OFF', 'brando-addons') => '0', 
                             __('ON', 'brando-addons') => '1'
                            ),
            'description' => __( 'Select ON to show separator in slider', 'brando-addons' ),
        ),
        array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => __( 'Separator Color', 'brando-addons' ),
            'param_name' => 'separator_color',
            'description' => __( 'Choose Separator Color', 'brando-addons' ),
            'dependency' => array( 'element' => 'show_separator', 'value' => array('1') ),
            'group' => 'Color',
        ),
        array(
            'type'        => 'responsive_font_settings',
            'param_name'  => 'title_settings',
            'heading'     => esc_html__( 'Font Settings For Title', 'hcode-addons' ),
            'group' => 'Font Settings',
        ),
        array(
            'type' => 'textfield',
            'class' => '',
            'heading' => __( 'Separator Height', 'brando-addons' ),
            'param_name' => 'separator_height',
            'description' => __( 'Define Separator Height Like 8px', 'brando-addons' ),
            'dependency' => array( 'element' => 'show_separator', 'value' => array('1') ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Image Thumbnail Size', 'brando-addons'),
            'param_name' => 'brando_image_srcset',
            'value' => brando_image_size(),
            'std' => 'full',
            'group' => 'Image',
        ),
    ),
  ) 
);
if(class_exists('WPBakeryShortCodesContainer')){ 
  class WPBakeryShortCode_brando_award_box extends WPBakeryShortCodesContainer { }
}
if(class_exists('WPBakeryShortCode')){
  class WPBakeryShortCode_brando_award_box_content extends WPBakeryShortCode { }
}