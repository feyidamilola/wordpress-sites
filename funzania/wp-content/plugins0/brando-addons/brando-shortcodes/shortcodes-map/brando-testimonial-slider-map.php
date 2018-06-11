<?php
/**
 * Map For Slider
 *
 * @package Brando
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Slider */
/*-----------------------------------------------------------------------------------*/

$testimonial_slider_class = 'brando_testimonial_slider_'.time() . '-2-' . rand( 0, 100 );
vc_map( 
  array(
      'name' => __( 'Testimonial Slider' , 'brando-addons' ), //Name of your shortcode for human reading inside element list
      'base' => 'brando_testimonial_slider', //Shortcode tag. For [my_shortcode] shortcode base is my_shortcode
      'description' => __( 'Create a testimonial slider', 'brando-addons' ), //Short description of your element, it will be visible in 'Add element' window
      'class' => '', //CSS class which will be added to the shortcode's content element in the page edit screen in Visual Composer backend edit mode
      'as_parent' => array('only' => 'brando_testimonial_slider_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
      'icon' => 'fa fa-arrows-h brando-shortcode-icon', //URL or CSS class with icon image.
      'js_view' => 'VcColumnView',
      'category' => 'Brando',
      'params' => array( //List of shortcode attributes. Array which holds your shortcode params, these params will be editable in shortcode settings page
        array(
            'type' => 'brando_custom_switch_option',
            'holder' => 'div',
            'class' => '',
            'heading' => __('Show Pagination', 'brando-addons'),
            'param_name' => 'show_pagination',
            'value' => array(__('OFF', 'brando-addons') => '0', 
                             __('ON', 'brando-addons') => '1'
                            ),
            'description' => __( 'Select ON to show pagination in slider', 'brando-addons' ),
          ),
          array(
            'type' => 'dropdown',
            'heading' => __('Pagination Style', 'brando-addons'),
            'param_name' => 'show_pagination_style',
            'admin_label' => true,
            'value' => array(__('Select Pagination Style', 'brando-addons') => '',
                           __('Dot Style', 'brando-addons') => '0',
                           __('Line Style', 'brando-addons') => '1',
                           __('Round Style', 'brando-addons') => '2',
                          ),
            'dependency' => array( 'element' => 'show_pagination', 'value' => array('1') ),
          ),
          array(
            'type' => 'dropdown',
            'heading' => __('Pagination Color Style', 'brando-addons'),
            'param_name' => 'show_pagination_color_style',
            'admin_label' => true,
            'value' => array(__('Select Pagination Color Style', 'brando-addons') => '',
                           __('Dark Style', 'brando-addons') => '0',
                           __('Light Style', 'brando-addons') => '1'
                          ),
            'dependency' => array( 'element' => 'show_pagination', 'value' => array('1') ),
          ),
          array(
            'type' => 'brando_custom_switch_option',
            'holder' => 'div',
            'class' => '',
            'heading' => __('Show Navigation', 'brando-addons'),
            'param_name' => 'show_navigation',
            'value' => array(__('OFF', 'brando-addons') => '0', 
                             __('ON', 'brando-addons') => '1'
                            ),
            'description' => __( 'Select ON to show navigation in slider', 'brando-addons' ),
          ),
          array(
            'type' => 'dropdown',
            'heading' => __('Navigation Style', 'brando-addons'),
            'param_name' => 'show_navigation_style',
            'admin_label' => true,
            'value' => array(__('Select Navigation Style', 'brando-addons') => '',
                           __('Next/Prev Black Arrow', 'brando-addons') => '0',
                           __('Next/Prev White Arrow', 'brando-addons') => '1'
                          ),
            'dependency' => array( 'element' => 'show_navigation', 'value' => array('1') ),
          ),
          array(
            'type' => 'dropdown',
            'heading' => __('Cursor Color Style', 'brando-addons'),
            'param_name' => 'show_cursor_color_style',
            'admin_label' => true,
            'value' => array(__('Select Cursor Color Style', 'brando-addons') => '',
                           __('White Cursor', 'brando-addons') => 'white-cursor',
                           __('Black Cursor', 'brando-addons') => 'black-cursor',
                           __('Default Cursor', 'brando-addons') => 'no-cursor',
                          ),
          ),
          array(
            'type' => 'dropdown',
            'heading' => __('Transition Style', 'brando-addons'),
            'param_name' => 'transition_style',
            'admin_label' => true,
            'value' => array(__('Select Transition Style', 'brando-addons') => '',
                           __('Slide Style', 'brando-addons') => 'slide',
                           __('Fade Style', 'brando-addons') => 'fade',
                           __('BackSlide Style', 'brando-addons') => 'backSlide',
                           __('GoDown Style', 'brando-addons') => 'goDown',
                           __('FadeUp Style', 'brando-addons') => 'fadeUp'
                           
                          ),
            'group' => 'Slider Configuration',
          ),
          array(
            'type' => 'brando_custom_switch_option',
            'holder' => 'div',
            'class' => '',
            'heading' => __('Single Item', 'brando-addons'),
            'param_name' => 'brando_single_item',
            'value' => array(__('False', 'brando-addons') => '0', 
                             __('True', 'brando-addons') => '1'
                            ),
            'std' => '1',
            'group' => 'Slider Configuration',
          ),
          array(
              'type' => 'textfield',
              'heading' => __('No. of Items Per Slide (For Desktop Device)', 'brando-addons'),
              'description' => __( 'Enter only numeric value like 3', 'brando-addons' ), 
              'param_name' => 'brando_image_carousel_itemsdesktop',
              'group'       => 'Slider Configuration',
              'value'     => '3',
              'dependency'  => array( 'element' => 'brando_single_item', 'value' => array('0') ),
          ),
          array(
            'type' => 'textfield',
            'heading' => __('No. of Post to Display (For Mini Desktop Device)', 'brando-addons'),
            'description' => __( 'Define value like 3', 'brando-addons' ),
            'param_name' => 'brando_image_carousel_desktop_mini',
            'group'       => 'Slider Configuration',
            'value' => '3',
            'dependency'  => array( 'element' => 'brando_single_item', 'value' => array('0') ),
          ),
          array(
              'type' => 'textfield',
              'heading' => __('No. of Items Per Slide (For iPad/Tablet Device)', 'brando-addons'),
              'description' => __( 'Enter only numeric value like 3', 'brando-addons' ),
              'param_name' => 'brando_image_carousel_itemstablet',
              'group'       => 'Slider Configuration',
              'value'     => '3',
              'dependency'  => array( 'element' => 'brando_single_item', 'value' => array('0') ),
          ),
          array(
              'type' => 'textfield',
              'heading' => __('No. of Items Per Slide (For Mobile Device)', 'brando-addons'),
              'description' => __( 'Enter only numeric value like 1', 'brando-addons' ), 
              'param_name' => 'brando_image_carousel_itemsmobile',
              'group'       => 'Slider Configuration',
              'value'     => '1',
              'dependency'  => array( 'element' => 'brando_single_item', 'value' => array('0') ),
          ),
          array(
            'type' => 'brando_custom_switch_option',
            'holder' => 'div',
            'class' => '',
            'heading' => __('Autoplay', 'brando-addons'),
            'param_name' => 'autoplay',
            'value' => array(__('False', 'brando-addons') => '0', 
                             __('True', 'brando-addons') => '1'
                            ),
            'description' => __( 'Select TRUE to autoplay slider', 'brando-addons' ),
            'group' => 'Slider Configuration',
          ),
          array(
            'type' => 'brando_custom_switch_option',
            'holder' => 'div',
            'class' => '',
            'heading' => __('Stop On Hover', 'brando-addons'),
            'param_name' => 'stoponhover',
            'value' => array(__('False', 'brando-addons') => '0', 
                             __('True', 'brando-addons') => '1'
                            ),
            'description' => __( 'Select TRUE to stop autoplay when hover on slider', 'brando-addons' ),
            'dependency'  => array( 'element' => 'autoplay', 'value' => array('1') ),
            'group' => 'Slider Configuration',
          ),
          
          array(
            'type' => 'dropdown',
            'heading' => __('Slide Delay Time', 'brando-addons'),
            'param_name' => 'slidespeed',
            'admin_label' => true,
            'value' => array(__('Select Slide Delay Time', 'brando-addons') => '',
                           __('500', 'brando-addons') => '500',
                           __('600', 'brando-addons') => '600',
                           __('700', 'brando-addons') => '700',
                           __('800', 'brando-addons') => '800',
                           __('900', 'brando-addons') => '900',
                           __('1000', 'brando-addons') => '1000',
                           __('2000', 'brando-addons') => '2000',
                           __('3000', 'brando-addons') => '3000',
                           __('4000', 'brando-addons') => '4000',
                           __('5000', 'brando-addons') => '5000',
                           __('6000', 'brando-addons') => '6000',
                           __('7000', 'brando-addons') => '7000',
                           __('8000', 'brando-addons') => '8000',
                           __('9000', 'brando-addons') => '9000',
                           __('10000', 'brando-addons') => '10000',
                          ),
            'description' => __('Select slide delay time (1ms = 100)', 'brando-addons'),
            'dependency'  => array( 'element' => 'autoplay', 'value' => array('1') ),
            'group' => 'Slider Configuration',
          ),
          array(
            'type' => 'dropdown',
            'heading' => __('Image Size', 'brando-addons'),
            'param_name' => 'brando_image_srcset',
            'value' => brando_image_size(),
            'std' => 'full',
            'group' => 'Image',
          ),
          array(
             'type'        => 'textfield',
             'heading'     => __('Slider ID', 'brando-addons' ),
             'description' => 'Optional - Define element id (The id attribute specifies a unique id for an HTML element)',
             'param_name'  => 'brando_slider_id',
             'group'       => 'Slider ID & Class'
          ),
          array(
             'type'        => 'textfield',
             'heading'     => __('Slider Extra Class', 'brando-addons' ),
             'description' => 'Optional - add additional CSS class to this element, you can define multiple CSS class with use of space like "Class1 Class2"',
             'param_name'  => 'brando_slider_class',
             'group'       => 'Slider ID & Class'
          ),
      ),
  )
);
vc_map( 
  array(
      'name' => __('Add Testimonial Block', 'brando-addons'),
      'base' => 'brando_testimonial_slider_content',
      'description' => __( 'Add block for the menu', 'brando-addons' ),
      'as_child' => array('only' => 'brando_testimonial_slider'), // Use only|except attributes to limit parent (separate multiple values with comma)
      'icon' => 'fa fa-picture-o brando-shortcode-icon', //URL or CSS class with icon image.
      'params' => array(
        array(
          'type' => 'hidden',
          'heading' => __('Text', 'brando-addons' ),
          'param_name' => 'brando_token_class',
          'value' => $testimonial_slider_class,
        ),
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
          'type' => 'textfield',
          'class' => '',
          'heading' => __( 'Separator Height', 'brando-addons' ),
          'param_name' => 'separator_height',
          'description' => __( 'Define Separator Height Like 8px', 'brando-addons' ),
          'dependency' => array( 'element' => 'show_separator', 'value' => array('1') ),
      ),
      array(
            'type' => 'brando_custom_switch_option',
            'holder' => 'div',
            'class' => '',
            'heading' => __('Show Stars', 'brando-addons'),
            'param_name' => 'show_stars',
            'value' => array(__('OFF', 'brando-addons') => '0', 
                             __('ON', 'brando-addons') => '1'
                            ),
            'description' => __( 'Select ON to show star icon in slider', 'brando-addons' ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Number of stars', 'brando-addons'),
            'param_name' => 'no_of_stars',
            'admin_label' => true,
            'value' => array(__('Select Stars', 'brando-addons') => '',
                           __('Star 1', 'brando-addons') => '1',
                           __('Star 2', 'brando-addons') => '2',
                           __('Star 3', 'brando-addons') => '3',
                           __('Star 4', 'brando-addons') => '4',
                           __('Star 5', 'brando-addons') => '5',
                          ),
            'dependency' => array( 'element' => 'show_stars', 'value' => array('1') ),
        ),
        array(
        'type' => 'dropdown',
        'heading' => __('Select Star Size', 'brando-addons'),
        'param_name' => 'brando_icon_size',
        'admin_label' => true,
        'value' => array(__('Default', 'brando-addons') => '',
                         __('Extra Large', 'brando-addons') => 'icon-extra-large', 
                         __('Large', 'brando-addons') => 'icon-large',
                         __('Medium', 'brando-addons') => 'icon-medium',
                         __('Small', 'brando-addons') => 'icon-small',
                         __('Extra Small', 'brando-addons') => 'icon-extra-small',
                        ),
      ),
      array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => __( 'Star Color', 'brando-addons' ),
        'param_name' => 'star_color',
        'description' => __( 'Choose Star Color', 'brando-addons' ),
        'dependency' => array( 'element' => 'show_stars', 'value' => array('1') ),
        'group' => 'Color',
      ),
      array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => __( 'Quote Icon Color', 'brando-addons' ),
        'param_name' => 'brando_quote_icon_color',
        'description' => __( 'Choose Quote Icon Color', 'brando-addons' ),
        'group' => 'Color',
      ),
      array(
        'type'        => 'responsive_font_settings',
        'param_name'  => 'title_settings',
        'heading'     => esc_html__( 'Font Settings For Title', 'hcode-addons' ),
        'group' => 'Font Settings',
      ),
      $brando_vc_extra_id,
      $brando_vc_extra_class,
    ),
  ) 
);
if(class_exists('WPBakeryShortCodesContainer')){ 
  class WPBakeryShortCode_brando_testimonial_slider extends WPBakeryShortCodesContainer { }
}
if(class_exists('WPBakeryShortCode')){
  class WPBakeryShortCode_brando_testimonial_slider_content extends WPBakeryShortCode { }
}