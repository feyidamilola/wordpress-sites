<?php
/**
 * Map For Button
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Button */
/*-----------------------------------------------------------------------------------*/

$button_class = 'brando_button_'.time() . '-2-' . rand( 0, 100 );
vc_map( array(
  'icon' => 'brando-shortcode-icon fa fa-stop',
  'name' => __('Button', 'brando-addons'),
  'description' => __( 'Add an awesome button', 'brando-addons' ),  
  'base' => 'brando_button',
  'category' => 'Brando',
  'content_element' => true,
  'params' => array(
    array(
      'type' => 'hidden',
      'heading' => __('Text', 'brando-addons' ),
      'param_name' => 'brando_token_class',
      'value' => $button_class,
    ),
    array(
      'type' => 'dropdown',
      'heading' => __('Button Style', 'brando-addons'),
      'param_name' => 'button_style',
      'value' => array( __('Select Button Style', 'brando-addons') => '',
                        __('Style 1', 'brando-addons') => 'style1',
                        __('Style 2', 'brando-addons') => 'style2',
                        __('Style 3', 'brando-addons') => 'style3',
                        __('Style 4', 'brando-addons') => 'style4',
                        __('Style 5', 'brando-addons') => 'style5',
                        __('Style 6', 'brando-addons') => 'style6',
                        __('Style 7', 'brando-addons') => 'style7',
                        __('Style 8', 'brando-addons') => 'style8',
                        __('Style 9', 'brando-addons') => 'style9',
                        __('Style 10','brando-addons') => 'style10',
                        __('Style 11', 'brando-addons') => 'style11',
                        __('Style 12', 'brando-addons') => 'style12',
                        __('Style 13', 'brando-addons') => 'style13',
                        __('Style 14', 'brando-addons') => 'style14',
                        __('Style 15', 'brando-addons') => 'style15',
                        __('Style 16', 'brando-addons') => 'style16',
                        __('Style 17', 'brando-addons') => 'style17',
                        __('Style 18', 'brando-addons') => 'style18',
                        __('Style 19', 'brando-addons') => 'style19',
                        __('Style 20', 'brando-addons') => 'style20',
                        __('Style 21', 'brando-addons') => 'style21',
                        __('Style 22', 'brando-addons') => 'style22',
                        __('Style 23', 'brando-addons') => 'style23',
                      ),
    ),  
    array(
      'type' => 'brando_preview_image',
      'heading' => __('Select pre-made style', 'brando-addons'),
      'param_name' => 'brando_button_preview_image',
      'admin_label' => true,
      'value' => array( __('Please select style', 'brando-addons') => '',
                        __('Style 1', 'brando-addons') => 'style1',
                        __('Style 2', 'brando-addons') => 'style2',
                        __('Style 3', 'brando-addons') => 'style3',
                        __('Style 4', 'brando-addons') => 'style4',
                        __('Style 5', 'brando-addons') => 'style5',
                        __('Style 6', 'brando-addons') => 'style6',
                        __('Style 7', 'brando-addons') => 'style7',
                        __('Style 8', 'brando-addons') => 'style8',
                        __('Style 9', 'brando-addons') => 'style9',
                        __('Style 10', 'brando-addons') => 'style10',
                        __('Style 11', 'brando-addons') => 'style11',
                        __('Style 12', 'brando-addons') => 'style12',
                        __('Style 13', 'brando-addons') => 'style13',
                        __('Style 14', 'brando-addons') => 'style14',
                        __('Style 15', 'brando-addons') => 'style15',
                        __('Style 16', 'brando-addons') => 'style16',
                        __('Style 17', 'brando-addons') => 'style17',
                        __('Style 18', 'brando-addons') => 'style18',
                        __('Style 19', 'brando-addons') => 'style19',
                        __('Style 20', 'brando-addons') => 'style20',
                        __('Style 21', 'brando-addons') => 'style21',
                        __('Style 22', 'brando-addons') => 'style22',
                        __('Style 23', 'brando-addons') => 'style23',
                      ),
    ),
    array(
      'type' => 'dropdown',
      'heading' => __('Button Size', 'brando-addons'),
      'param_name' => 'button_type',
      'value' => array( __('Select Button Size', 'brando-addons') => '',
                        __('Large', 'brando-addons')  => 'large',
                        __('Medium', 'brando-addons') => 'medium',
                        __('Small', 'brando-addons')  => 'small',
                        __('Very Small', 'brando-addons') => 'vsmall',
                      ),
      'dependency'  => array( 'element' => 'button_style', 'value' => array('style1','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13','style14','style15','style16','style17','style18','style19','style22','style23') ),
    ),
    array(
      'type' => 'dropdown',
      'heading' => __('Button Version Type', 'brando-addons'),
      'param_name' => 'button_version_type',
      'value' => array( __('Select Button Version Type', 'brando-addons') => '',
                        __('Primary', 'brando-addons') => 'primary',
                        __('Success', 'brando-addons') => 'success',
                        __('Info', 'brando-addons') => 'info',
                        __('Warning', 'brando-addons') => 'warning',
                        __('Danger', 'brando-addons') => 'danger',
                      ),
      'dependency'  => array( 'element' => 'button_style', 'value' => array('style19','style22','style23') ),
    ),
    array(
      'type' => 'brando_custom_switch_option',
      'heading' => __('Custom Icon', 'brando-addons'),
      'param_name' => 'custom_icon',
      'value' => array(__('NO', 'brando-addons') => '0',
                       __('YES', 'brando-addons') => '1'
                      ),
      'dependency'  => array( 'element' => 'button_style', 'value' => array('style16','style17','style18','style20','style21') ),
    ),
    array(
      'type' => 'attach_image',
      'heading' => __('Custom Icon Image', 'brando-addons'),
      'param_name' => 'custom_icon_image',
      'dependency' => array( 'element' => 'custom_icon', 'value' => '1' ),
      'description' => __( 'Recommended size: Extra Large - 60px X 60px, Large - 50px X 50px, Medium - 40px X 40px, Small - 25px X 25px, Extra Small - 18px X 18px', 'brando-addons' ),
    ),
    array(
      'type' => 'brando_icon',
      'heading' => __('Select Font Awesome Icon Type', 'brando-addons'),
      'param_name' => 'button_icon',
      'admin_label' => true,
      'dependency' => array( 'element' => 'custom_icon', 'value' => '0' ),
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Button Sub Text', 'brando-addons'),
      'param_name' => 'button_sub_text',
      'dependency'  => array( 'element' => 'button_style', 'value' => array('style22') ),
    ),
    array(
      'type' => 'vc_link',
      'heading' => __('Button Config', 'brando-addons'),
      'param_name' => 'button_text',
      'admin_label' => true,
      'dependency' => array( 'element' => 'button_style', 'value' => array('style1','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13','style14','style15','style16','style17','style18','style19','style20','style21','style22','style23') ),
    ),
    array(
          'type' => 'colorpicker',
          'class' => '',
          'heading' => esc_html__( 'Button Text Color', 'brando-addons' ),
          'param_name' => 'brando_button_text_color',
          'dependency' => array( 'element' => 'button_style', 'value' => array('style1','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13','style14','style15','style16','style17','style18','style20','style21','style22') ),
          'group' => 'Color',
    ),
    array(
          'type' => 'colorpicker',
          'class' => '',
          'heading' => esc_html__( 'Button Text Hover Color', 'brando-addons' ),
          'param_name' => 'brando_button_text_hover_color',
          'dependency' => array( 'element' => 'button_style', 'value' => array('style1','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13','style14','style15','style16','style17','style18','style20','style21','style22') ),
          'group' => 'Color',
    ),
    array(
          'type' => 'colorpicker',
          'class' => '',
          'heading' => esc_html__( 'Button Background Color', 'brando-addons' ),
          'param_name' => 'brando_button_background_color',
          'dependency' => array( 'element' => 'button_style', 'value' => array('style1','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13','style14','style15','style16','style17','style18','style20','style21','style22') ),
          'group' => 'Color',
    ),
    array(
          'type' => 'colorpicker',
          'class' => '',
          'heading' => esc_html__( 'Button Background Hover Color', 'brando-addons' ),
          'param_name' => 'brando_button_background_hover_color',
          'dependency' => array( 'element' => 'button_style', 'value' => array('style1','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13','style14','style15','style16','style17','style18','style20','style21','style22') ),
          'group' => 'Color',
    ),
    array(
          'type' => 'colorpicker',
          'class' => '',
          'heading' => esc_html__( 'Button Border Color', 'brando-addons' ),
          'param_name' => 'brando_button_border_color',
          'dependency' => array( 'element' => 'button_style', 'value' => array('style1','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13','style14','style15','style16','style17','style18','style20','style21','style22') ),
          'group' => 'Color',
    ),
    array(
          'type'        => 'responsive_font_settings',
          'param_name'  => 'button_settings',
          'heading'     => esc_html__( 'Font Settings For Button', 'hcode-addons' ),
          'group' => 'Font Settings',
          'hide_font_settings_element_lg' => array('text-align'),
          'hide_font_settings_element_md' => array('text-align'),
          'hide_font_settings_element_sm' => array('text-align'),
          'hide_font_settings_element_xs' => array('text-align'),
          'dependency'  => array( 'element' => 'button_style', 'value' => array('style1','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13','style14','style15','style16','style17','style18','style19','style20','style21','style22','style23') ),
    ),
    array(
      'type' => 'brando_custom_switch_option',
      'holder' => 'div',
      'class' => '',
      'heading' => __('Required Padding Setting?', 'brando-addons'),
      'param_name' => 'padding_setting',
      'value' => array( __('No', 'brando-addons') => '0', 
                        __('Yes', 'brando-addons') => '1'
                      ),
      'dependency'  => array( 'element' => 'button_style', 'value' => array('style1','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13','style14','style15','style16','style17','style18','style19','style20','style21','style22','style23') ),
      'group' => 'Style',
    ),
    array(
      'type' => 'brando_custom_desktop_padding',
      'param_name' => 'desktop_padding',
      'heading' => __('Padding (For Desktop Device)', 'brando-addons'),
      'value' => '',
      'dependency' => array( 'element' => 'padding_setting', 'value' => array('1') ),
      'group' => 'Style',
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Custom Padding (For Desktop Device)', 'brando-addons' ),
      'param_name' => 'custom_desktop_padding',
      'dependency' => array( 'element' => 'desktop_padding', 'value' => array('custom-desktop-padding') ),
      'description' => __('Specify padding like (10px 12px 10px 12px or 10px or 10%...)', 'brando-addons' ),
      'group' => 'Style',
    ),
    array(
      'type' => 'brando_custom_ipad_padding',
      'param_name' => 'ipad_padding',
      'heading' => __('Padding (For iPad Device)', 'brando-addons'),
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
      'heading' => __('Padding (For Mobile Device)', 'brando-addons'),
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
      'value' => array(__('No', 'brando-addons')  => '0', 
                       __('Yes', 'brando-addons') => '1'
                      ),
      'dependency'  => array( 'element' => 'button_style', 'value' => array('style1','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13','style14','style15','style16','style17','style18','style19','style20','style21','style22','style23') ),
      'group' => 'Style',
    ),
    array(
      'type' => 'brando_custom_desktop_margin',
      'param_name' => 'desktop_margin',
      'heading' => __('Margin (For Desktop Device)', 'brando-addons'),
      'value' => '',
      'dependency' => array( 'element' => 'margin_setting', 'value' => array('1') ),
      'group' => 'Style',
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Custom Margin (For Desktop Device)', 'brando-addons'),
      'param_name' => 'custom_desktop_margin',
      'dependency' => array( 'element' => 'desktop_margin', 'value' => array('custom-desktop-margin') ),
      'description' => __( 'Specify margin like (10px 12px 10px 12px or 10px or 10%...)', 'brando-addons' ),
      'group' => 'Style',
    ),
    array(
      'type' => 'brando_custom_ipad_margin',
      'param_name' => 'ipad_margin',
      'heading' => __('Margin (For iPad Device)', 'brando-addons'),
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
      'heading' => __('Margin (For Mobile Device)', 'brando-addons' ),
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
      'param_name' => 'brando_column_animation_style',
      'heading' => __('Animation Style', 'brando-addons'),
      'value' => brando_animation_style(),
      'dependency'  => array( 'element' => 'button_style', 'value' => array('style1','style2','style3','style4','style5','style6','style7','style8','style9','style10','style11','style12','style13','style14','style15','style16','style17','style18','style19','style20','style21','style22','style23') ),
      'group' => 'Animation',
    ),
    array(
        'type' => 'dropdown',
        'heading' => __('Custom Image Size', 'brando-addons'),
        'param_name' => 'brando_custom_image_srcset',
        'value' => brando_image_size(),
        'std' => 'full',
        'dependency' => array( 'element' => 'custom_icon', 'value' => '1' ),
        'group' => 'Image',
    ),
    $brando_vc_extra_id,
    $brando_vc_extra_class, 
  )
) );