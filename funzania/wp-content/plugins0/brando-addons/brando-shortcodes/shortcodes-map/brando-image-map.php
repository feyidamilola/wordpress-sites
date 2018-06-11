<?php
/**
 * Map For Simple Image
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Simple Image */
/*-----------------------------------------------------------------------------------*/

$image_class = 'brando_image_'.time() . '-2-' . rand( 0, 100 );
vc_map( array(
  'name' => __( 'Simple Image', 'brando-addons' ),
  'base' => 'brando_simple_image',
  'category' => 'Brando',
  'icon' => 'brando-shortcode-icon fa fa-picture-o',
  'description' => __( 'Add an image with different options', 'brando-addons' ),
  'params' => array(
    array(
      'type' => 'hidden',
      'heading' => __('Text', 'brando-addons' ),
      'param_name' => 'brando_token_class',
      'value' => $image_class,
    ),
    array(
      'type' => 'attach_image',
      'heading' => __('Block Image', 'brando-addons' ),
      'param_name' => 'brando_image',
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Url', 'brando-addons' ),
      'param_name' => 'brando_url',
      'description' => __( 'Define url of image', 'brando-addons' ),
    ),
    array(
      'type' => 'brando_custom_switch_option',
      'holder' => 'div',
      'class' => '',
      'heading' => __('Target Blank', 'brando-addons'),
      'param_name' => 'brando_target_blank',
      'value' => array(__('No', 'brando-addons') => '0', 
                       __('Yes', 'brando-addons') => '1'
                      ),
    ),
    array(
      'type' => 'brando_custom_switch_option',
      'holder' => 'div',
      'class' => '',
      'heading' => __('Show Full Image in Mobile Device', 'brando-addons'),
      'param_name' => 'brando_mobile_full_image',
      'value' => array(__('No', 'brando-addons') => '0', 
                       __('Yes', 'brando-addons') => '1'
                      ),
    ),
    array(
      'type' => 'brando_custom_switch_option',
      'holder' => 'div',
      'class' => '',
      'heading' => __( 'Show Image Caption', 'brando-addons'),
      'param_name' => 'brando_show_image_caption',
      'value' => array(__('NO', 'brando-addons') => '0', 
                       __('YES', 'brando-addons') => '1'
                      ),
    ),
    array(
      'type' => 'dropdown',
      'heading' => __( 'Image Caption Position', 'brando-addons' ),
      'param_name' => 'brando_image_caption_position',
      'value' => array(__( 'Select Caption Position', 'brando-addons' ) => '',
                       __( 'Top', 'brando-addons' ) => 'image-caption-top',
                       __( 'Bottom', 'brando-addons' ) => 'image-caption-bottom',
                      ),
      'dependency' => array( 'element' => 'brando_show_image_caption', 'value' => array('1') ),
    ),
    array(
      'type' => 'dropdown',
      'heading' => __( 'Caption Text Alignment', 'brando-addons' ),
      'param_name' => 'brando_image_caption_text_alignment',
      'value' => array(__( 'None', 'brando-addons' ) => '',
                       __( 'Left', 'brando-addons' ) => 'text-left',
                       __( 'Center', 'brando-addons' ) => 'text-center',
                       __( 'Right', 'brando-addons' ) => 'text-right',
                      ),
      'dependency' => array( 'element' => 'brando_show_image_caption', 'value' => array('1') ),
    ),
    array(
      'type' => 'brando_custom_switch_option',
      'holder' => 'div',
      'class' => '',
      'heading' =>__('Required Padding Setting?', 'brando-addons'),
      'param_name' => 'padding_setting',
      'value' => array(__('No','brando-addons') => '0', 
                       __('Yes','brando-addons') => '1'
                      ),
      'group' => 'Style',
    ),
    array(
      'type' => 'brando_custom_desktop_padding',
      'param_name' => 'desktop_padding',
      'heading' => __('Padding (For Desktop Device)', 'brando-addons' ),
      'value' => '',
      'dependency' => array( 'element' => 'padding_setting', 'value' => array('1') ),
      'group' => 'Style',
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Custom Padding (For Desktop Device)', 'brando-addons' ),
      'param_name' => 'custom_desktop_padding',
      'dependency' => array( 'element' => 'desktop_padding', 'value' => array('custom-desktop-padding') ),
      'description' => __( 'Specify padding like (10px 12px 10px 12px or 10px or 10%...)', 'brando-addons' ),

      'group' => 'Style',
    ),
    array(
      'type' => 'brando_custom_ipad_padding',
      'param_name' => 'ipad_padding',
      'heading' => __('Padding (For iPad Device)', 'brando-addons' ),
      'value' => '',
      'dependency' => array( 'element' => 'padding_setting', 'value' => array('1') ),
      'group' => 'Style',
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Custom Padding (For iPad Device)', 'brando-addons' ),
      'param_name' => 'custom_ipad_padding',
      'dependency' => array( 'element' => 'ipad_padding', 'value' => array('custom-ipad-padding') ),
      'description' => __('Specify padding like (10px 12px 10px 12px or 10px or 10%...)', 'brando-addons' ),
      'group' => 'Style',
    ),
    array(
      'type' => 'brando_custom_mobile_padding',
      'param_name' => 'mobile_padding',
      'heading' => __('Padding (For Mobile Device)', 'brando-addons' ),
      'value' => '',
      'dependency' => array( 'element' => 'padding_setting', 'value' => array('1') ),
      'group' => 'Style',
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Custom Padding (For Mobile Device)', 'brando-addons' ),
      'param_name' => 'custom_mobile_padding',
      'dependency' => array( 'element' => 'mobile_padding', 'value' => array('custom-mobile-padding') ),
      'description' => __('Specify padding like (10px 12px 10px 12px or 10px or 10%...)', 'brando-addons' ),
      'group' => 'Style',
    ),
    array(
      'type' => 'brando_custom_switch_option',
      'holder' => 'div',
      'class' => '',
      'heading' => __('Required Margin Setting?', 'brando-addons'),
      'param_name' => 'margin_setting',
      'value' => array(__('No', 'brando-addons') => '0', 
                       __('Yes', 'brando-addons') => '1'
                      ),
      'group' => 'Style',
    ),
    array(
      'type' => 'brando_custom_desktop_margin',
      'param_name' => 'desktop_margin',
      'heading' => __('Margin (For Desktop Device)', 'brando-addons' ),
      'value' => '',
      'dependency' => array( 'element' => 'margin_setting', 'value' => array('1') ),
      'group' => 'Style',
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Custom Margin (For Desktop Device)', 'brando-addons' ),
      'param_name' => 'custom_desktop_margin',
      'dependency' => array( 'element' => 'desktop_margin', 'value' => array('custom-desktop-margin') ),
      'description' => __( 'Specify margin like (10px 12px 10px 12px or 10px or 10%...)', 'brando-addons' ),
      'group' => 'Style',
    ),
    array(
      'type' => 'brando_custom_ipad_margin',
      'param_name' => 'ipad_margin',
      'heading' => __('Margin (For iPad Device)', 'brando-addons' ),
      'value' => '',
      'dependency' => array( 'element' => 'margin_setting', 'value' => array('1') ),
      'group' => 'Style',
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Custom Margin (For iPad Device)', 'brando-addons'),
      'param_name' => 'custom_ipad_margin',
      'dependency' => array( 'element' => 'ipad_margin', 'value' => array('custom-ipad-margin') ),
      'description' => __( 'Specify margin like (10px 12px 10px 12px or 10px or 10%...)', 'brando-addons' ),
      'group' => 'Style',
    ),
    array(
      'type' => 'brando_custom_mobile_margin',
      'param_name' => 'mobile_margin',
      'heading' =>__('Margin (For Mobile Device)', 'brando-addons' ),
      'value' => '',
      'dependency' => array( 'element' => 'margin_setting', 'value' => array('1') ),
      'group' => 'Style',
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Custom Margin (For Mobile Device)', 'brando-addons'),
      'param_name' => 'custom_mobile_margin',
      'dependency' => array( 'element' => 'mobile_margin', 'value' => array('custom-mobile-margin') ),
      'description' => __( 'Specify margin like (10px 12px 10px 12px or 10px or 10%...)', 'brando-addons' ),
      'group' => 'Style',
    ),
    array(
        'type' => 'dropdown',
        'heading' => __('Image Size', 'brando-addons'),
        'param_name' => 'brando_image_srcset',
        'value' => brando_image_size(),
        'std' => 'full',
        'group' => 'Image',
    ),
    $brando_vc_extra_id,
    $brando_vc_extra_class,
  )
) );