<?php
/**
 * Map For Text Block
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Text Block */
/*-----------------------------------------------------------------------------------*/

$textblock_class = 'brando_text_'.time() . '-2-' . rand( 0, 100 );
vc_map( array(
  'name' => __( 'Text Block', 'brando-addons' ),
  'base' => 'vc_column_text',
  'icon' => 'fa fa-text-width brando-shortcode-icon',
  'wrapper_class' => 'clearfix',
  'category' => 'Brando',
  'description' => __( 'A block of text with WYSIWYG editor', 'js_composer' ),
  'params' => array(
                  array(
                    'type' => 'hidden',
                    'heading' => __('Text', 'brando-addons' ),
                    'param_name' => 'brando_token_class',
                    'value' => $textblock_class,
                  ),
                  array(
                    'type' => 'textarea_html',
                    'holder' => 'div',
                    'heading' => __( 'Text', 'brando-addons' ),
                    'param_name' => 'content',
                    'value' => __( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'js_composer' )
                  ),
                  array(
                    'type' => 'brando_custom_switch_option',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => __('Required Padding Setting?', 'brando-addons'),
                    'param_name' => 'padding_setting',
                    'value' => array(__('No', 'brando-addons') => '0', 
                                     __('Yes', 'brando-addons') => '1'
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
                $brando_vc_extra_id,
                $brando_vc_extra_class,
  )
) );