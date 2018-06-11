<?php
/**
 * Map For Accordian
 *
 * @package Brando
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Accordian */
/*-----------------------------------------------------------------------------------*/

$current_date = date('Y-m-d H:i:s'); ## Get current date
$timestamp = strtotime($current_date); ## Get timestamp of current date
$acc_id = $timestamp;
vc_map( 
array(
    'icon' => 'brando-shortcode-icon fa fa-indent',
    'name' => __( 'Accordion' , 'brando-addons' ),
    'base' => 'brando_accordian',
    'category' => 'Brando',
    'description' => __( 'Create an accordion', 'brando-addons' ),
    'as_parent' => array('only' => 'brando_accordian_content'),
    'content_element' => true,
    'show_settings_on_create' => true,
    'params'   => array(
        array(
            'type' => 'dropdown',
            'heading' => __( 'Accordion Style', 'brando-addons' ),
            'param_name' => 'accordian_pre_define_style',
            'value' => array(__('Select Accordion Style', 'brando-addons') => '',
                      __('Accordion Style 1', 'brando-addons') => 'accordion-style1',
                      __('Accordion Style 2', 'brando-addons') => 'accordion-style2',
                      __('Accordion Style 3', 'brando-addons') => 'accordion-style3',
                      __('Toggle Style 1', 'brando-addons') => 'toggles-style1',
                      __('Toggle Style 2', 'brando-addons') => 'toggles-style2',
                    ),
            
        ),
        array(
              'type' => 'brando_preview_image',
              'heading' => __('Select pre-made style', 'brando-addons'),
              'param_name' => 'accordion_preview_image',
              'admin_label' => true,
              'value' => array(__('Accordion image', 'brando-addons') => '',
                               __('Accordion image1', 'brando-addons') => 'accordion-style1',
                               __('Accordion image2', 'brando-addons') => 'accordion-style2',
                               __('Accordion Style 3', 'brando-addons') => 'accordion-style3',
                               __('Toggle image1', 'brando-addons') => 'toggles-style1',
                               __('Toggle image2', 'brando-addons') => 'toggles-style2',
                              ),
        ),
        array(
          'type' => 'textfield',
          'heading' => __( 'Id', 'brando-addons' ),
          'param_name' => 'accordian_id',
          'value' => $acc_id,
        ),
    ),
    'js_view' => 'VcColumnView'
) );
vc_map( 
array(
    'icon' => 'brando-shortcode-icon fa fa-indent',
    'name' => __('Add Accordion slides', 'brando-addons'),
    'base' => 'brando_accordian_content',
    'description' => __( 'A slide for the Accordion.', 'brando-addons' ),
    'content_element' => true,
    'as_child' => array('only' => 'brando_accordian'),
    'params' => array(
        array(
            'type' => 'dropdown',
            'heading' => __('Active Slide', 'brando-addons'),
            'param_name' => 'accordian_active',
            'value' => array(__('Select Active Slide', 'brando-addons') => '',
                      __('No', 'brando-addons') => '0',
                      __('Yes', 'brando-addons') => '1',
          ),
        ),
        array(
          'type' => 'brando_custom_switch_option',
          'heading' => __('Custom Icon', 'brando-addons'),
          'param_name' => 'etline_custom_icon',
          'value' => array(__('NO', 'brando-addons') => '0',
                           __('YES', 'brando-addons') => '1'
                          ),
        ),
        array(
          'type' => 'attach_image',
          'heading' => __('Custom Icon Image', 'brando-addons'),
          'param_name' => 'etline_custom_icon_image',
          'dependency' => array( 'element' => 'etline_custom_icon', 'value' => '1' ),
          'description' => __( 'Recommended size: Extra Large - 60px X 60px, Large - 50px X 50px, Medium - 40px X 40px, Small - 25px X 25px, Extra Small - 18px X 18px', 'brando-addons' ),
        ),
        array(
          'type' => 'brando_etline_icon',
          'heading' => __('Title Icon', 'brando-addons' ),
          'param_name' => 'accordian_title_icon',
          'description' => __( 'select icon then it shows', 'brando-addons' ),
          'dependency' => array( 'element' => 'etline_custom_icon', 'value' => '0' ),
        ),
        array(
          'type' => 'textfield',
          'heading' => __( 'Title', 'brando-addons' ),
          'param_name' => 'accordian_title',
        ),
        array(
            'type' => 'textarea_html',
            'heading' => __('Description', 'brando-addons'),
            'param_name' => 'content'
        ),
        array(
            'type' => 'attach_image',
            'heading' => __('Image', 'brando-addons' ),
            'param_name' => 'accordian_bg_image',
        ),
        array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => __( 'Icon Color', 'brando-addons' ),
            'param_name' => 'brando_icon_color',
            'description' => __( 'Choose Icon Color', 'brando-addons' ),
            'group' => 'Color Style',
        ),
        array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => __( 'Title Color', 'brando-addons' ),
            'param_name' => 'brando_title_color',
            'description' => __( 'Choose Title Color', 'brando-addons' ),
            'group' => 'Color Style',
        ),
        array(
            'type'        => 'responsive_font_settings',
            'param_name'  => 'title_settings',
            'heading'     => esc_html__( 'Font Settings For Title', 'hcode-addons' ),
            'group' => 'Font Settings',
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Image Thumbnail Size', 'brando-addons'),
            'param_name' => 'brando_image_srcset',
            'value' => brando_image_size(),
            'std' => 'full',
            'group' => 'Image',
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Custom Image Size', 'brando-addons'),
            'param_name' => 'brando_custom_image_srcset',
            'value' => brando_image_size(),
            'std' => 'full',
            'dependency' => array( 'element' => 'etline_custom_icon', 'value' => '1' ),
            'group' => 'Image',
        ),
      )  
  ) );
if(class_exists('WPBakeryShortCodesContainer')){
    class WPBakeryShortCode_brando_accordian extends WPBakeryShortCodesContainer {}
}
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_brando_accordian_content extends WPBakeryShortCode {}
}