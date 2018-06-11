<?php
/**
 * Map For Image gallery
 *
 * @package Brando
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Image gallery */
/*-----------------------------------------------------------------------------------*/

$gallery_class = 'brando_gallery_'.time() . '-2-' . rand( 0, 100 );
vc_map( array(
  'name' => __('Image Gallery', 'brando-addons'),
  'description' => __( 'Simple/lightbox/zoom image gallery', 'brando-addons' ),  
  'icon' => 'brando-shortcode-icon fa fa-picture-o',
  'base' => 'brando_image_gallery',
  'category' => 'Brando',
  'params' => array(
    array(
      'type' => 'hidden',
      'heading' => __('Text', 'brando-addons' ),
      'param_name' => 'brando_token_class',
      'value' => $gallery_class,
    ),
    array(
      'type' => 'dropdown',
      'heading' => __('Image Gallery Type', 'brando-addons'),
      'param_name' => 'image_gallery_type',
      'value' => array(__('Select Image Gallery Type', 'brando-addons') => '',
                       __('Simple Image Lightbox', 'brando-addons') => 'simple-image-lightbox',
                       __('Lightbox Gallery', 'brando-addons') => 'lightbox-gallery',
                       __('Zoom Gallery', 'brando-addons') => 'zoom-gallery',
                      ),
    ),
    array(
      'type' => 'brando_preview_image',
      'heading' => __('Select pre-made style for gallery', 'brando-addons'),
      'param_name' => 'brando_gallery_preview_image',
      'admin_label' => true,
      'value' => array(__('Select Image Gallery Type', 'brando-addons') => '',
                       __('Simple Image Lightbox', 'brando-addons') => 'simple-image-lightbox',
                       __('Lightbox Gallery', 'brando-addons') => 'lightbox-gallery',
                       __('Zoom Gallery', 'brando-addons') => 'zoom-gallery',
                      ),
    ),
    array(
      'type' => 'dropdown',
      'heading' => __('Column Type', 'brando-addons'),
      'param_name' => 'column',
      'value' => array(__('Select Column Type', 'brando-addons') => '',
                       __('1 column', 'brando-addons') => '1',
                       __('2 columns', 'brando-addons') => '2',
                       __('3 columns', 'brando-addons') => '3',
                       __('4 columns', 'brando-addons') => '4',
                       __('5 columns', 'brando-addons') => '5',
                       __('6 columns', 'brando-addons') => '6',
                      ),
      'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('lightbox-gallery','simple-image-lightbox','zoom-gallery') )
    ),
    array(
      'type' => 'attach_images',
      'heading' => __('Image', 'brando-addons'),
      'param_name' => 'image_gallery',
      'holder' => 'div',
      'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('simple-image-lightbox','lightbox-gallery','zoom-gallery')),
    ),
    array(
      'type' => 'brando_custom_switch_option',
      'holder' => 'div',
      'class' => '',
      'heading' => __('Required Padding Setting?', 'brando-addons'),
      'param_name' => 'padding_setting',
      'value' => array(__('No','brando-addons') => '0', 
                       __('Yes','brando-addons') => '1'
                      ),
      'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('simple-image-lightbox','lightbox-gallery','zoom-gallery')),
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
      'heading' => __('Custom Padding (For Desktop Device)', 'brando-addons'),
      'param_name' => 'custom_desktop_padding',
      'dependency' => array( 'element' => 'desktop_padding', 'value' => array('custom-desktop-padding') ),
      'description' => __( 'Specify padding like (10px 12px 10px 12px or 10px or 10%...)', 'brando-addons' ),
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
      'value' => array(__('No','brando-addons') => '0', 
                       __('Yes','brando-addons') => '1'
                      ),
      'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('simple-image-lightbox','lightbox-gallery','zoom-gallery')),
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
      'heading' => __('Margin (For Mobile Device)', 'brando-addons'),
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
      'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('simple-image-lightbox','lightbox-gallery','zoom-gallery')),
      'group' => 'Animation',
    ),
    array(
      'type' => 'dropdown',
      'heading' => __('Image Thumbnail Size', 'brando-addons'),
      'param_name' => 'brando_image_srcset',
      'value' => brando_image_size(),
      'std' => 'full',
      'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('simple-image-lightbox','lightbox-gallery','zoom-gallery')),
      'group' => 'Image',
    ),
    $brando_vc_extra_id,
    $brando_vc_extra_class,
  )
) );