<?php
/**
 * Map For Blockquote
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Blockquote */
/*-----------------------------------------------------------------------------------*/

$blockquote_class = 'brando_blockquote_'.time() . '-2-' . rand( 0, 100 );
vc_map( array(
  'name' => __('Blockquote', 'brando-addons'),
  'description' => __( 'Create a blockquote', 'brando-addons' ),  
  'icon' => 'brando-shortcode-icon fa fa-quote-left',
  'base' => 'brando_blockquote',
  'category' => 'Brando',
  'params' => array(
    array(
      'type' => 'hidden',
      'heading' => __('Text', 'brando-addons' ),
      'param_name' => 'brando_token_class',
      'value' => $blockquote_class,
    ),
    array(
      'type' => 'textarea_html',
      'heading' => __('Content', 'brando-addons'),
      'param_name' => 'content',
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Heading Title', 'brando-addons'),
      'param_name' => 'brando_blockquote_heading',
    ),
    array(
      'type' => 'brando_custom_switch_option',
      'holder' => 'div',
      'class' => '',
      'heading' => __('Show Blockquote Icon', 'brando-addons'),
      'param_name' => 'blockquote_icon',
      'value' => array(__('No', 'brando-addons') => '0', 
                       __('Yes', 'brando-addons') => '1'
                      ),
    ),
    array(
      'type' => 'colorpicker',
      'class' => '',
      'heading' => __( 'Blockquote Background Color', 'brando-addons' ),
      'param_name' => 'brando_blockquote_bg_color',
      'group' => 'Blockquote Style',
    ),
    array(
      'type' => 'colorpicker',
      'class' => '',
      'heading' => __( 'Blockquote Text Color', 'brando-addons' ),
      'param_name' => 'brando_blockquote_color',
      'group' => 'Blockquote Style',
    ),
    array(
      'type' => 'colorpicker',
      'class' => '',
      'heading' => __( 'Blockquote Icon Color', 'brando-addons' ),
      'param_name' => 'brando_blockquote_icon_color',
      'dependency' => array( 'element' => 'blockquote_icon', 'value' => array('1') ),
      'group' => 'Blockquote Style',
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Font Size', 'brando-addons'),
      'description' => __( 'Define font size like 12px', 'brando-addons' ),
      'param_name' => 'brando_blockquote_font_size',
      'group' => 'Blockquote Style',
    ),
      array(
      'type' => 'textfield',
      'heading' => __('Line Height', 'brando-addons'),
      'description' => __( 'Define line height like 20px', 'brando-addons' ),
      'param_name' => 'brando_blockquote_line_height',
      'group' => 'Blockquote Style',
    ),
    array(
      'type' => 'brando_custom_desktop_padding',
      'param_name' => 'desktop_padding',
      'heading' => __('Padding (For Desktop Device)', 'brando-addons' ),
      'value' => '',
      'group' => 'Blockquote Style',
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Custom Padding (For Desktop Device)', 'brando-addons' ),
      'param_name' => 'custom_desktop_padding',
      'dependency' => array( 'element' => 'desktop_padding', 'value' => array('custom-desktop-padding') ),
      'description' => __( 'Specify padding like (10px 12px 10px 12px or 10px or 10%...)', 'brando-addons' ),
      'group' => 'Blockquote Style',
    ),
    array(
      'type' => 'brando_custom_desktop_margin',
      'param_name' => 'desktop_margin',
      'heading' => __('Margin (For Desktop Device)', 'brando-addons' ),
      'value' => '',
      'group' => 'Blockquote Style',
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Custom Margin (For Desktop Device)', 'brando-addons' ),
      'param_name' => 'custom_desktop_margin',
      'dependency' => array( 'element' => 'desktop_margin', 'value' => array('custom-desktop-margin') ),
      'description' => __( 'Specify margin like (10px 12px 10px 12px or 10px or 10%...)', 'brando-addons' ),
      'group' => 'Blockquote Style',
    ),
    array(
      'type'        => 'responsive_font_settings',
      'param_name'  => 'title_settings',
      'heading'     => esc_html__( 'Font Settings For Title', 'hcode-addons' ),
      'group' => 'Font Settings',
    ),
    $brando_vc_extra_id,
    $brando_vc_extra_class,
    )
) );