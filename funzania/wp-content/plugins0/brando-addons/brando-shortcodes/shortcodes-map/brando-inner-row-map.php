<?php
/**
 * Map For Inner Row
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Inner Row */
/*-----------------------------------------------------------------------------------*/

$inner_row_class = 'brando_inner_row_'.time() . '-2-' . rand( 0, 100 );
vc_map( 
  array(
      'name' => __( 'Inner Row' , 'brando-addons' ),
      'base' => 'vc_row_inner',
      'description' => __( 'Place content elements inside the section','brando-addons' ),
      'icon' => 'fa fa-columns brando-shortcode-icon',
      'is_container' => true,
      'content_element' => false,
      'js_view' => 'VcRowView',
      'category' => 'Brando',
      'params' => array(
          array(
            'type' => 'hidden',
            'heading' => __('Text', 'brando-addons' ),
            'param_name' => 'brando_token_class',
            'value' => $inner_row_class,
          ),
          array(
            'type' => 'checkbox',
            'heading' => __( 'Equal height', 'brando-addons' ),
            'param_name' => 'equal_height',
            'description' => __( 'If checked columns will be set to equal height.', 'brando-addons' ),
            'value' => array( __( 'Yes', 'brando-addons' ) => 'yes' )
          ),
          array(
            'type' => 'dropdown',
            'heading' => __( 'Content Position', 'brando-addons' ),
            'param_name' => 'content_placement',
            'value' => array(
              __( 'Default', 'brando-addons' ) => '',
              __( 'Top', 'brando-addons' ) => 'top',
              __( 'Middle', 'brando-addons' ) => 'middle',
              __( 'Bottom', 'brando-addons' ) => 'bottom',
            ),
            'description' => __( 'Select content position within columns.', 'brando-addons' ),
            'dependency' => array( 'element' => 'equal_height', 'value' => array('yes') ),
          ),
          array(
            'type' => 'dropdown',
            'param_name' => 'brando_row_style',
            'heading' => __( 'Please Select Row Style','brando-addons' ),
            'value' => array(__('Please select Row Style', 'brando-addons') => '',
                             __('Color', 'brando-addons') => 'color',
                             esc_html__('Image', 'brando-addons') => 'image',
                            
                            ),
          ),
          array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => __( 'Background Color', 'brando-addons' ),
            'param_name' => 'brando_row_bg_color',
            'dependency' => array( 'element' => 'brando_row_style', 'value' => array('color') ),
          ),
          array(
            'type' => 'attach_image',
            'heading' => __( 'Background Image', 'brando-addons' ),
            'param_name' => 'brando_row_bg_image',
            'dependency' => array( 'element' => 'brando_row_style', 'value' => array('image') ),
          ),
          array(
            'type' => 'dropdown',
            'heading' => __( 'Position X', 'brando-addons' ),
            'param_name' => 'brando_image_pos_x',
            'value' => array(
                      __( 'Default', 'brando-addons' ) => '',
                      __( 'Center', 'brando-addons' ) => 'center',
                      __( 'Left', 'brando-addons' ) => 'left',
                      __( 'Right', 'brando-addons' ) => 'right',
            ),
            'dependency' => array( 'element' => 'brando_row_style', 'value' => array('image') ),
          ),
          array(
            'type' => 'dropdown',
            'heading' => __( 'Position Y', 'brando-addons' ),
            'param_name' => 'brando_image_pos_y',
            'value' => array(
                      __( 'Default', 'brando-addons' ) => '',
                      __( 'Top', 'brando-addons' ) => 'top',
                      __( 'Bottom', 'brando-addons' ) => 'bottom',
            ),
            'dependency' => array( 'element' => 'brando_row_style', 'value' => array('image') ),
          ),
          array(
            'type' => 'dropdown',
            'param_name' => 'brando_row_image_type',
            'heading' => __( 'Background Image Type', 'brando-addons' ),
            'value' => array(__('Select Background Image Type', 'brando-addons') => '',
                            __('Parallax', 'brando-addons') => 'parallax',
                             __('Background Image', 'brando-addons') => 'background-image',
                            ),
            'dependency' => array( 'element' => 'brando_row_style', 'value' => array('image') ),
          ),
          array(
            'type' => 'dropdown',
            'param_name' => 'brando_bg_image_type', 
            'heading' => __( 'Background Property', 'brando-addons' ),
            'value' => array(__('Select Background Property', 'brando-addons') => '',
                             __('Fix Background', 'brando-addons') => 'fix-background',
                             __('Cover Background', 'brando-addons') => 'cover-background',
                             __('Fill Background', 'brando-addons') => 'fill',
                            ),
            'dependency' => array( 'element' => 'brando_row_image_type', 'value' => array('background-image') ),
          ),
          array(
            'type' => 'dropdown',
            'param_name' => 'brando_parallax_image_type',
            'heading' => __('Parallax Type', 'brando-addons' ),
            'value' => array(__('no parallax', 'brando-addons') => '',
                             __('Parallax1', 'brando-addons') => 'parallax1',
                             __('Parallax2', 'brando-addons') => 'parallax2',
                             __('Parallax3', 'brando-addons') => 'parallax3',
                             __('Parallax4', 'brando-addons') => 'parallax4',
                             __('Parallax5', 'brando-addons') => 'parallax5',
                             __('Parallax6', 'brando-addons') => 'parallax6',
                             __('Parallax7', 'brando-addons') => 'parallax7',
                             __('Parallax8', 'brando-addons') => 'parallax8',
                             __('Parallax9', 'brando-addons') => 'parallax9',
                             __('Parallax10', 'brando-addons') => 'parallax10',
                             __('Parallax11', 'brando-addons') => 'parallax11',
                             __('Parallax12', 'brando-addons') => 'parallax12',
                            ),
            'dependency' => array( 'element' => 'brando_row_image_type', 'value' => array('parallax') ),
          ),
          array(
                'type' => 'brando_custom_switch_option',
                'holder' => 'div',
                'class' => '',
                'heading' => __('Overlay Div', 'brando-addons'),
                'param_name' => 'show_overlay',
                'value' => array(__('OFF', 'brando-addons') => '0', 
                                 __('ON', 'brando-addons') => '1'
                                ),
                'dependency' => array( 'element' => 'brando_row_style', 'value' => array('image') ),
                'description' => __( 'Select ON to show overlay in row', 'brando-addons' ),
                'group' => 'Opacity',
          ),
          array(
                'type' => 'brando_custom_switch_option',
                'holder' => 'div',
                'class' => '',
                'heading' => __('Hide Background For iPad Device', 'brando-addons'),
                'param_name' => 'hide_background_ipad',
                'value' => array(__('NO', 'brando-addons') => '0', 
                                 __('YES', 'brando-addons') => '1'
                                ),
                'description' => __( 'Select Yes to hide background in iPad device', 'brando-addons' ),
                'dependency' => array( 'element' => 'brando_row_style', 'value' => array('image') ),
                'group' => 'Hide Background',
          ),
          array(
                'type' => 'brando_custom_switch_option',
                'holder' => 'div',
                'class' => '',
                'heading' => __('Hide Background For Mobile Device', 'brando-addons'),
                'param_name' => 'hide_background',
                'value' => array(__('NO', 'brando-addons') => '0', 
                                 __('YES', 'brando-addons') => '1'
                                ),
                'description' => __( 'Select Yes to hide background in mobile device', 'brando-addons' ),
                'dependency' => array( 'element' => 'brando_row_style', 'value' => array('image') ),
                'group' => 'Hide Background',
          ),
          array(
            'type' => 'dropdown',
            'param_name' => 'brando_overlay_opacity',
            'heading' => __('Overlay Opacity', 'brando-addons'),
            'value' => array(__('no opacity', 'brando-addons') => '',
                             __('0.1', 'brando-addons') => '0.1',
                             __('0.2', 'brando-addons') => '0.2',
                             __('0.3', 'brando-addons') => '0.3',
                             __('0.4', 'brando-addons') => '0.4',
                             __('0.5', 'brando-addons') => '0.5',
                             __('0.6', 'brando-addons') => '0.6',
                             __('0.7', 'brando-addons') => '0.7',
                             __('0.8', 'brando-addons') => '0.8',
                             __('0.9', 'brando-addons') => '0.9',
                             __('1.0', 'brando-addons') => '1.0',
                            ),
            'dependency' => array( 'element' => 'show_overlay', 'value' => array('1') ),
            'group' => 'Opacity',
          ),
          array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => __( 'Overlay Color', 'brando-addons' ),
            'param_name' => 'brando_row_overlay_color',
            'dependency' => array( 'element' => 'show_overlay', 'value' => array('1') ),
            'group' => 'Opacity',
          ),
          array(
            'type' => 'textfield',
            'heading' => __( 'Z Index', 'brando-addons'),
            'param_name' => 'brando_z_index',
            'dependency' => array( 'element' => 'show_overlay', 'value' => array('1') ),
            'group' => 'Opacity',
          ),
          array(
              'type' => 'brando_custom_switch_option',
              'holder' => 'div',
              'class' => '',
              'heading' => __('Position Relative', 'brando-addons'),
              'param_name' => 'position_relative',
              'value' => array(__('OFF', 'brando-addons') => '0', 
                               __('ON', 'brando-addons') => '1'
                              ),
          ),
          array(
              'type' => 'brando_custom_switch_option',
              'holder' => 'div',
              'class' => '',
              'heading' => __('Overflow Hidden', 'brando-addons'),
              'param_name' => 'overflow_hidden',
              'value' => array(__('OFF', 'brando-addons') => '0', 
                               __('ON', 'brando-addons') => '1'
                              ),
          ),
          array(
            'type' => 'textfield',
            'heading' => __('Min Height', 'brando-addons'),
            'param_name' => 'brando_min_height',
            'description' => __( 'Define min height like 500px', 'brando-addons' ),
            'group' => 'Style',
          ),
          array(
            'type' => 'dropdown',
            'param_name' => 'brando_row_border_position',
            'heading' => __('Row Border Position', 'brando-addons' ),
            'value' => array(__('No Border', 'brando-addons') => '',
                             __('Border Top', 'brando-addons') => 'border-top',
                             __('Border Bottom', 'brando-addons') => 'border-bottom',
                             __('Border Left', 'brando-addons') => 'border-left',
                             __('Border Right', 'brando-addons') => 'border-right',
                            ),
            'group' => 'Style',
          ),
          array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => __( 'Border Color', 'brando-addons' ),
            'param_name' => 'brando_row_border_color',
            'dependency' => array( 'element' => 'brando_row_border_position', 'value' => array('border-top','border-bottom','border-left','border-right') ),
            'group' => 'Style',
          ),
          array(
            'type' => 'textfield',
            'heading' => __( 'Border Size', 'brando-addons' ),
            'param_name' => 'brando_border_size',
            'dependency' => array( 'element' => 'brando_row_border_position', 'value' => array('border-top','border-bottom','border-left','border-right') ),
            'description' => __( 'Define border size like 2px', 'brando-addons' ),
            'group' => 'Style',
          ),
          array(
            'type' => 'dropdown',
            'param_name' => 'brando_border_type',
            'heading' => __( 'Border Type', 'brando-addons' ),
            'value' => array(__('no border', 'brando-addons') => '',
                             __('Dotted', 'brando-addons') => 'dotted',
                             __('Dashed', 'brando-addons') => 'dashed',
                             __('Solid', 'brando-addons') => 'solid',
                             __('Double', 'brando-addons') => 'double',
                            ),
            'dependency' => array( 'element' => 'brando_row_border_position', 'value' => array('border-top','border-bottom','border-left','border-right') ),
            'group' => 'Style',
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
            'type' => 'brando_custom_mini_desktop_padding',
            'param_name' => 'desktop_mini_padding',
            'heading' => __('Padding (For Desktop Mini Device)', 'brando-addons' ),
            'value' => '',
            'dependency' => array( 'element' => 'padding_setting', 'value' => array('1') ),
            'group' => 'Style',
          ),
          array(
            'type' => 'textfield',
            'heading' => __('Custom Padding (For Mini Desktop Device)', 'brando-addons' ),
            'param_name' => 'custom_mini_desktop_padding',
            'dependency' => array( 'element' => 'desktop_mini_padding', 'value' => array('custom-mini-desktop-padding') ),
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
            'type' => 'brando_custom_mini_desktop_margin',
            'param_name' => 'desktop_mini_margin',
            'heading' => __('Margin (For Desktop Mini Device)', 'brando-addons' ),
            'value' => '',
            'dependency' => array( 'element' => 'margin_setting', 'value' => array('1') ),
            'group' => 'Style',
          ),
          array(
            'type' => 'textfield',
            'heading' => __('Custom Margin (For Mini Desktop Device)', 'brando-addons' ),
            'param_name' => 'custom_mini_desktop_margin',
            'dependency' => array( 'element' => 'desktop_mini_margin', 'value' => array('custom-mini-desktop-margin') ),
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
          array(
            'type' => 'dropdown',
            'param_name' => 'brando_row_animation_style',
            'heading' => __('Animation Style', 'brando-addons' ),
            'value' => brando_animation_style(),
            'group' => 'Animation',
          ),
          array(
            'type' => 'dropdown',
            'heading' => __('Image Thumbnail Size', 'brando-addons'),
            'param_name' => 'brando_image_srcset',
            'value' => brando_image_size(),
            'std' => 'full',
            'dependency' => array( 'element' => 'brando_row_style', 'value' => array('image') ),
            'group' => 'Image',
          ),
          $brando_vc_extra_id,
          $brando_vc_extra_class,
      ),
  )
);