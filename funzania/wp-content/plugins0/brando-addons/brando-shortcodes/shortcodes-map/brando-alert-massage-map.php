<?php
/**
 * Map For Alert Message
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Alert Message */
/*-----------------------------------------------------------------------------------*/

vc_map( array(
  'name' => __('Alert Message', 'brando-addons'),
  'base' => 'brando_alert_massage',
  'category' => 'Brando',
  'description' => __( 'Create an alert message','brando-addons'),
  'icon' => 'fa fa-exclamation-triangle brando-shortcode-icon', //URL or CSS class with icon image.
  'params' => array(
    array(
      'type' => 'dropdown',
      'holder' => 'div',
      'class' => '',
      'heading' => __('Alert Message Style', 'brando-addons'),
      'param_name' => 'brando_alert_massage_premade_style',
      'value' => array(__('Select Alert Message Style', 'brando-addons') => '',
                       __('Select Alert Style1', 'brando-addons') => 'alert-massage-style-1',
                       __('Select Alert Style2', 'brando-addons') => 'alert-massage-style-2',
                       __('Select Alert Style3', 'brando-addons') => 'alert-massage-style-3',
                       __('Select Alert Style4', 'brando-addons') => 'alert-massage-style-4',
                       __('Select Alert Style5', 'brando-addons') => 'alert-massage-style-5',
                      ),
    ),
    array(
      'type' => 'brando_preview_image',
      'heading' => __('Style for tab', 'brando-addons'),
      'param_name' => 'alert_massage_preview_image',
      'admin_label' => true,
      'value' => array(__('Alert image', 'brando-addons') => '',
                       __('Alert image1', 'brando-addons') => 'alert-massage-style-1',
                       __('Alert image2', 'brando-addons') => 'alert-massage-style-2',
                       __('Alert image3', 'brando-addons') => 'alert-massage-style-3',
                       __('Alert image4', 'brando-addons') => 'alert-massage-style-4',
                       __('Alert image5', 'brando-addons') => 'alert-massage-style-5',
                      ),
    ),
    array(
      'type' => 'dropdown',
      'heading' => __('Alert Message Type', 'brando-addons'),
      'param_name' => 'brando_alert_massage_type',
      'admin_label' => true,
      'value' => array(__('Select Alert Message Type', 'brando-addons') => '',
                       __('Success Message', 'brando-addons') => 'success',
                       __('Info Message', 'brando-addons') => 'info',
                       __('Warning Message', 'brando-addons') => 'warning',
                       __('Danger Message', 'brando-addons') => 'danger',
                      ),
      'dependency'  => array( 'element' => 'brando_alert_massage_premade_style', 'value' => array('alert-massage-style-1','alert-massage-style-2','alert-massage-style-3','alert-massage-style-4','alert-massage-style-5')),
    ),
    array(
      'type' => 'brando_custom_switch_option',
      'heading' => __('Custom Icon', 'brando-addons'),
      'param_name' => 'custom_icon',
      'value' => array(__('NO', 'brando-addons') => '0',
                       __('YES', 'brando-addons') => '1'
                      ),
      'dependency'  => array( 'element' => 'brando_alert_massage_premade_style', 'value' => array('alert-massage-style-1','alert-massage-style-2')),
    ),
    array(
      'type' => 'attach_image',
      'heading' => __('Custom Icon Image', 'brando-addons'),
      'param_name' => 'custom_icon_image',
      'dependency' => array( 'element' => 'custom_icon', 'value' => '1' ),
      'description' => __( 'Recommended size: Extra Large - 60px X 60px, Large - 50px X 50px, Medium - 40px X 40px, Small - 25px X 25px, Extra Small - 18px X 18px', 'brando-addons' ),
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
    array(
      'type' => 'brando_icon',
      'heading' => __('Select Icon', 'brando-addons'),
      'param_name' => 'brando_message_icon',
      'admin_label' => true,
      'dependency' => array( 'element' => 'custom_icon', 'value' => '0' ),
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Title (Highlighted in bold)', 'brando-addons'),
      'param_name' => 'brando_highlight_title',
      'admin_label' => true,
      'dependency'  => array( 'element' => 'brando_alert_massage_premade_style', 'value' => array('alert-massage-style-1','alert-massage-style-2','alert-massage-style-3','alert-massage-style-4','alert-massage-style-5')),
    ),
    array(
      'type' => 'textarea',
      'heading' => __('Subtitle', 'brando-addons'),
      'param_name' => 'brando_subtitle',
      'admin_label' => true,
      'dependency'  => array( 'element' => 'brando_alert_massage_premade_style', 'value' => array('alert-massage-style-1','alert-massage-style-2','alert-massage-style-3','alert-massage-style-4','alert-massage-style-5')),
    ),
    array(
      'type' => 'brando_custom_switch_option',
      'holder' => 'div',
      'class' => '',
      'heading' => __('Show Close Button', 'brando-addons'),
      'param_name' => 'show_close_button',
      'value' =>   array(__('No', 'brando-addons') => '0', 
                         __('Yes', 'brando-addons') => '1'
                        ),
      'description' => __( 'Select YES to show close button in Message', 'brando-addons' ),
      'dependency'  => array( 'element' => 'brando_alert_massage_premade_style', 'value' => array('alert-massage-style-2','alert-massage-style-3','alert-massage-style-4','alert-massage-style-5')),
    ),
    array(
      'type'        => 'responsive_font_settings',
      'param_name'  => 'title_settings',
      'heading'     => esc_html__( 'Font Settings For Title', 'hcode-addons' ),
      'group' => 'Font Settings',
      'dependency'  => array( 'element' => 'brando_alert_massage_premade_style', 'value' => array('alert-massage-style-1','alert-massage-style-2','alert-massage-style-3','alert-massage-style-4','alert-massage-style-5')),
    ),
    array(
      'type'        => 'responsive_font_settings',
      'param_name'  => 'subtitle_settings',
      'heading'     => esc_html__( 'Font Settings For SubTitle', 'hcode-addons' ),
      'group' => 'Font Settings',
      'dependency'  => array( 'element' => 'brando_alert_massage_premade_style', 'value' => array('alert-massage-style-1','alert-massage-style-2','alert-massage-style-3','alert-massage-style-4','alert-massage-style-5')),
    ),
    $brando_vc_extra_id,
    $brando_vc_extra_class,
    ),
  ) 
);