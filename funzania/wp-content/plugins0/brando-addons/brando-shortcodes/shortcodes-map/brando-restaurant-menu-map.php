<?php
/**
 * Map For Restaurant Menu
 *
 * @package Brando
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Restaurant Menu */
/*-----------------------------------------------------------------------------------*/

vc_map( 
  array(
      'name' => __( 'Restaurant Menu' , 'brando-addons' ), //Name of your shortcode for human reading inside element list
      'base' => 'brando_restaurant_menu', //Shortcode tag. For [my_shortcode] shortcode base is my_shortcode
      'description' => __( 'Create a restaurant menu block', 'brando-addons' ), //Short description of your element, it will be visible in 'Add element' window
      'class' => '', //CSS class which will be added to the shortcode's content element in the page edit screen in Visual Composer backend edit mode
      'as_parent' => array('only' => 'brando_restaurant_menu_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
      'icon' => 'fa fa-list-alt brando-shortcode-icon', //URL or CSS class with icon image.
      'js_view' => 'VcColumnView',
      'category' => 'Brando',
      'params' => array( //List of shortcode attributes. Array which holds your shortcode params, these params will be editable in shortcode settings page
        array(
            'type' => 'attach_image',
            'heading' => __( 'Background Image', 'brando-addons' ),
            'param_name' => 'brando_menu_bg_image',
        ),
        array(
            'type' => 'attach_image',
            'heading' => __( 'Menu Item Background Image', 'brando-addons' ),
            'param_name' => 'brando_menuitem_bg_image',
        ),
        array(
            'type' => 'attach_image',
            'heading' => __( 'Image', 'brando-addons' ),
            'param_name' => 'brando_menu_image',
        ),
        array(
          'type' => 'textfield',
          'heading' => __('Title', 'brando-addons'),
          'param_name' => 'brando_title',
        ),
        array(
          'type' => 'textfield',
          'heading' => __('SubTitle', 'brando-addons'),
          'param_name' => 'brando_subtitle',
        ),
        array(
            'type' => 'attach_image',
            'heading' => __( 'Separator Image', 'brando-addons' ),
            'param_name' => 'brando_menu_sep_image',
        ),
        array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => __( 'Title Color', 'brando-addons' ),
            'param_name' => 'brando_title_color',
            'group' => 'Color',
        ),
        array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => __( 'SubTitle Color', 'brando-addons' ),
            'param_name' => 'brando_subtitle_color',
            'group' => 'Color',
        ),
        array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => __( 'Menu Border Color', 'brando-addons' ),
            'param_name' => 'brando_menu_border_color',
            'group' => 'Color',
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
            'heading' => __('Menu Image Thumbnail Size', 'brando-addons'),
            'param_name' => 'brando_menu_image_srcset',
            'value' => brando_image_size(),
            'std' => 'full',
            'group' => 'Image',
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
        $brando_vc_extra_id,
        $brando_vc_extra_class,
      ),
  )
);
vc_map( 
  array(
      'name' => __('Add Block', 'brando-addons'),
      'base' => 'brando_restaurant_menu_content',
      'description' => __( 'Add block for the menu', 'brando-addons' ),
      'as_child' => array('only' => 'brando_restaurant_menu'), // Use only|except attributes to limit parent (separate multiple values with comma)
      'icon' => 'fa fa-picture-o brando-shortcode-icon', //URL or CSS class with icon image.
      'params' => array(
        array(
            'type' => 'attach_image',
            'heading' => __( 'Image', 'brando-addons' ),
            'param_name' => 'brando_menuitem_image',
        ),
        array(
          'type' => 'textfield',
          'heading' => __('Menu Title', 'brando-addons'),
          'param_name' => 'brando_menuitem_title',
        ),
        array(
          'type' => 'textarea_html',
          'heading' => __('Content', 'brando-addons'),
          'param_name' => 'content'
        ),
        array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => __( 'Menu Title Color', 'brando-addons' ),
            'param_name' => 'brando_menuitem_title_color',
        ),
        array(
            'type'        => 'responsive_font_settings',
            'param_name'  => 'title_settings',
            'heading'     => esc_html__( 'Font Settings For Title', 'hcode-addons' ),
            'group' => 'Font Settings',
        ),
        ),
    ) 
);
if(class_exists('WPBakeryShortCodesContainer')){ 
  class WPBakeryShortCode_brando_restaurant_menu extends WPBakeryShortCodesContainer { }
}
if(class_exists('WPBakeryShortCode')){
  class WPBakeryShortCode_brando_restaurant_menu_content extends WPBakeryShortCode { }
}