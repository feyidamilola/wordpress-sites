<?php
/**
 * Map For Tab Content
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Tab Content */
/*-----------------------------------------------------------------------------------*/

vc_map( array(
  'name' =>  __('Tab Content Block', 'brando-addons'),
  'description' => __( 'Create a tab content block', 'brando-addons' ),    
  'icon' => 'fa fa-list-alt brando-shortcode-icon',
  'base' => 'brando_tab_content',
  'category' => 'Brando',
  'params' => array(
    array(
      'type' => 'dropdown',
      'heading' => __('Tab Content Style', 'brando-addons'),
      'param_name' => 'brando_tab_content_premade_style',
      'value' => array(__('Select Tab Content Style', 'brando-addons') => '',
                       __('Tab Content1', 'brando-addons') => 'tab-content1',
                       __('Tab Content2', 'brando-addons') => 'tab-content2',
                       __('Tab Content3', 'brando-addons') => 'tab-content3',
                       __('Tab Content4', 'brando-addons') => 'tab-content4',
                      ),
    ),
    array(
      'type' => 'brando_preview_image',
      'heading' => __('Select pre-made style', 'brando-addons'),
      'param_name' => 'brando_tab_content_preview_image',
      'admin_label' => true,
      'value' => array(__('Tab content image', 'brando-addons') => '',
                       __('Tab content image1', 'brando-addons') => 'tab-content1',
                       __('Tab content image2', 'brando-addons') => 'tab-content2',
                       __('Tab content image3', 'brando-addons') => 'tab-content3',
                       __('Tab content image4', 'brando-addons') => 'tab-content4',
                      ),
    ),
    
   
   /* Tab content left part */
   
    array(
      'type' => 'textfield',
      'heading' => __('Title', 'brando-addons'),
      'param_name' => 'brando_tab_content_left_title',
      'dependency' => array( 'element' => 'brando_tab_content_premade_style', 'value' => array('tab-content1','tab-content2','tab-content3','tab-content4') ),
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Enter Number', 'brando-addons'),
      'param_name' => 'brando_number',
      'dependency' => array( 'element' => 'brando_tab_content_premade_style', 'value' => array('tab-content3') ),
    ), 
    array(
      'type' => 'brando_custom_switch_option',
      'holder' => 'div',
      'class' => '',
      'heading' => __('Show Separator', 'brando-addons'),
      'param_name' => 'brando_tab_content_left_title_show_separator',
      'value' => array(__('Off','brando-addons') => '0', 
                       __('On','brando-addons') => '1'
                      ),
      'dependency' => array( 'element' => 'brando_tab_content_premade_style', 'value' => array('tab-content1') ),
    ),
    array(
      'type' => 'colorpicker',
      'class' => '',
      'heading' => __( 'Separator Color', 'brando-addons' ),
      'param_name' => 'brando_sep_color',
      'dependency' => array( 'element' => 'brando_tab_content_left_title_show_separator', 'value' => array('1') ),
    ),  
    array(
      'type' => 'textfield',
      'heading' => __('Separator Height', 'brando-addons' ),
      'param_name' => 'separator_height',
      'dependency' => array( 'element' => 'brando_tab_content_left_title_show_separator', 'value' => array('1') ),
      'description' => __( 'Define custom separator height in px like 2px', 'brando-addons' ),
    ),
    array(
      'type' => 'textfield',
      'heading' => __( 'Sub Title', 'brando-addons' ),
      'param_name' => 'brando_tab_sub_title',
      'dependency' => array( 'element' => 'brando_tab_content_premade_style', 'value' => array('tab-content4') ),
    ),
    array(
      'type' => 'textfield',
      'heading' => __( 'Location', 'brando-addons' ),
      'param_name' => 'brando_tab_location',
      'dependency' => array( 'element' => 'brando_tab_content_premade_style', 'value' => array('tab-content2') ),
    ),
    array(
      'type' => 'attach_image',
      'heading' => __('Image', 'brando-addons' ),
      'param_name' => 'brando_feature_image',
      'dependency' => array( 'element' => 'brando_tab_content_premade_style', 'value' => array('tab-content2','tab-content3') ),
    ), 
    array(
      'type' => 'attach_image',
      'heading' => __('Left Image', 'brando-addons' ),
      'param_name' => 'brando_left_image',
      'dependency' => array( 'element' => 'brando_tab_content_premade_style', 'value' => array('tab-content3') ),
    ), 
    array(
      'type' => 'attach_image',
      'heading' => __('Right Image', 'brando-addons' ),
      'param_name' => 'brando_right_image',
      'dependency' => array( 'element' => 'brando_tab_content_premade_style', 'value' => array('tab-content3') ),
    ), 
    array(
      'type' => 'dropdown',
      'heading' => __('Stars', 'brando-addons'),
      'param_name' => 'brando_stars',
      'admin_label' => true,
      'value' => array(__('Select Stars', 'brando-addons') => '',
                       __('Star 1', 'brando-addons') => '1',
                       __('Star 2', 'brando-addons') => '2', 
                       __('Star 3', 'brando-addons') => '3',
                       __('Star 4', 'brando-addons') => '4',
                       __('Star 5', 'brando-addons') => '5',
                      ),
      'dependency' => array( 'element' => 'brando_tab_content_premade_style', 'value' => array('tab-content2') ),
    ), 
    array(
      'type' => 'textarea',
      'heading' => __('Left Content', 'brando-addons'),
      'param_name' => 'brando_tab_content_left_content',
      'dependency' => array( 'element' => 'brando_tab_content_premade_style', 'value' => array('tab-content1') ),
    ),
    array(
      'type' => 'textfield',
      'heading' => __( 'Right Title', 'brando-addons' ),
      'param_name' => 'brando_tab_content_right_title',
      'dependency' => array( 'element' => 'brando_tab_content_premade_style', 'value' => array('tab-content1') ),
    ),
    array(
      'type' => 'textarea_html',
      'heading' => __( 'Content', 'brando-addons' ),
      'param_name' => 'content',
      'dependency' => array( 'element' => 'brando_tab_content_premade_style', 'value' => array('tab-content1','tab-content2','tab-content3','tab-content4') ),
    ),
    array(
          'type'        => 'textfield',
          'heading'     => __('Link (full url with http)', 'brando-addons' ),
          'param_name'  => 'brando_link',
          'dependency' => array( 'element' => 'brando_tab_content_premade_style', 'value' => array('tab-content1','tab-content2','tab-content3') ),
        ),
    array(
      'type'        => 'dropdown',
      'heading'     => __('Link Target', 'brando-addons' ),
      'param_name'  => 'brando_link_target',
      'value' => array(__('Self', 'brando-addons') => '_self', 
                       __('New tab / window', 'brando-addons') => '_blank'
                      ),
      'dependency' => array( 'element' => 'brando_tab_content_premade_style', 'value' => array('tab-content1','tab-content2','tab-content3') ),
    ),
    array(
      'type'        => 'vc_link',
      'heading'     => __('Button Config', 'brando-addons' ),
      'param_name'  => 'brando_button_text',
      'admin_label' => true,
      'dependency' => array( 'element' => 'brando_tab_content_premade_style', 'value' => array('tab-content2') ),
    ),    
    array(
      'type' => 'brando_custom_switch_option',
      'holder' => 'div',
      'class' => '',
      'heading' => __('Show Separator Line', 'brando-addons'),
      'param_name' => 'brando_tab_content_left_title_show_separator_line',
      'value' => array(__('Off', 'brando-addons') => '0', 
                       __('On', 'brando-addons') => '1'
                      ),
      'dependency' => array( 'element' => 'brando_tab_content_premade_style', 'value' => array('tab-content1') ),
    ),
    array(
      'type' => 'textfield',
      'heading' => __( 'Bottom Title', 'brando-addons' ),
      'param_name' => 'brando_tab_content_bottom_title',
      'dependency' => array( 'element' => 'brando_tab_content_premade_style', 'value' => array('tab-content1') ),
    ),
    array(
      'type' => 'colorpicker',
      'class' => '',
      'heading' => __( 'Title Color', 'brando-addons' ),
      'param_name' => 'brando_title_color',
      'dependency' => array( 'element' => 'brando_tab_content_premade_style', 'value' => array('tab-content2','tab-content3','tab-content4') ),
      'group' => 'Color',
    ), 
    array(
      'type' => 'colorpicker',
      'class' => '',
      'heading' => __( 'Subtitle Color', 'brando-addons' ),
      'param_name' => 'brando_subtitle_color',
      'dependency' => array( 'element' => 'brando_tab_content_premade_style', 'value' => array('tab-content2','tab-content4') ),
      'group' => 'Color',
    ), 
    array(
      'type' => 'colorpicker',
      'class' => '',
      'heading' => __( 'Number Color', 'brando-addons' ),
      'param_name' => 'brando_number_color',
      'dependency' => array( 'element' => 'brando_tab_content_premade_style', 'value' => array('tab-content3') ),
      'group' => 'Color',
    ),
    array(
      'type' => 'colorpicker',
      'class' => '',
      'heading' => __( 'Separator Color', 'brando-addons' ),
      'param_name' => 'brando_separator_color',
      'dependency' => array( 'element' => 'brando_tab_content_premade_style', 'value' => array('tab-content3') ),
      'group' => 'Color',
    ),
    array(
      'type' => 'dropdown',
      'heading' => __('Image Thumbnail Size', 'brando-addons'),
      'param_name' => 'brando_image_srcset',
      'value' => brando_image_size(),
      'std' => 'full',
      'dependency' => array( 'element' => 'brando_tab_content_premade_style', 'value' => array('tab-content2','tab-content3') ),
      'group' => 'Image',
    ),


    array(
      'type'        => 'responsive_font_settings',
      'param_name'  => 'title_settings',
      'heading'     => esc_html__( 'Font Settings For Title', 'hcode-addons' ),
      'dependency' => array( 'element' => 'brando_tab_content_premade_style', 'value' => array('tab-content1','tab-content2','tab-content3','tab-content4') ),
      'group' => 'Font Settings',
    ),
    array(
      'type'        => 'responsive_font_settings',
      'param_name'  => 'number_settings',
      'heading'     => esc_html__( 'Font Settings For Number', 'hcode-addons' ),
      'dependency' => array( 'element' => 'brando_tab_content_premade_style', 'value' => array('tab-content3') ),
      'group' => 'Font Settings',
    ),
    array(
      'type'        => 'responsive_font_settings',
      'param_name'  => 'sub_title_settings',
      'heading'     => esc_html__( 'Font Settings For Sub Title', 'hcode-addons' ),
      'dependency' => array( 'element' => 'brando_tab_content_premade_style', 'value' => array('tab-content4') ),
      'group' => 'Font Settings',
    ),
    array(
      'type'        => 'responsive_font_settings',
      'param_name'  => 'location_settings',
      'heading'     => esc_html__( 'Font Settings For Location', 'hcode-addons' ),
      'dependency' => array( 'element' => 'brando_tab_content_premade_style', 'value' => array('tab-content2') ),
      'group' => 'Font Settings',
    ),
    array(
      'type'        => 'responsive_font_settings',
      'param_name'  => 'right_title_settings',
      'heading'     => esc_html__( 'Font Settings For Right Title', 'hcode-addons' ),
      'dependency' => array( 'element' => 'brando_tab_content_premade_style', 'value' => array('tab-content1') ),
      'group' => 'Font Settings',
    ),
    array(
      'type'        => 'responsive_font_settings',
      'param_name'  => 'bottom_title_settings',
      'heading'     => esc_html__( 'Font Settings For Bottom Title', 'hcode-addons' ),
      'dependency' => array( 'element' => 'brando_tab_content_premade_style', 'value' => array('tab-content1') ),
      'group' => 'Font Settings',
    ),
    ),
) );