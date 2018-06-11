<?php
/**
 * Map For Coming soon
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Coming soon */
/*-----------------------------------------------------------------------------------*/

$coming_soon_class = 'brando_coming_soon_'.time() . '-2-' . rand( 0, 100 );
vc_map( array(
  'name' => __('Coming Soon Block', 'brando-addons'),
  'description' => __( 'Create a coming soon content block', 'brando-addons' ),
  'icon' => 'fa fa-list-alt brando-shortcode-icon',
  'base' => 'brando_coming_soon',
  'category' => 'Brando',
  'params' => array(
    array(
      'type' => 'hidden',
      'heading' => __('Text', 'brando-addons' ),
      'param_name' => 'brando_token_class',
      'value' => $coming_soon_class,
    ),
    array(
      'type' => 'attach_image',
      'heading' => __('Logo image', 'brando-addons' ),
      'param_name' => 'brando_coming_soon_logo',
    ),  
    array(
      'type' => 'textfield',
      'heading' => __('Title', 'brando-addons'),
      'param_name' => 'brando_coming_soon_title',
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Enter Date', 'brando-addons'),
      'param_name' => 'brando_coming_soon_date',
      'description' => __( 'Enter date like 2016/12/31 in date format yyyy/mm/dd', 'brando-addons' ),
    ),
    array(
      'type' => 'textarea_html',
      'heading' => __('Notify Me Content', 'brando-addons'),
      'param_name' => 'content',
    ),
    array(
      'type' => 'brando_custom_switch_option',
      'holder' => 'div',
      'class' => '',
      'heading' => __('Show Newsletter', 'brando-addons'),
      'param_name' => 'brando_coming_soon_notify_me_show_form',
      'value' => array(__('No', 'brando-addons') => '0', 
                       __('Yes', 'brando-addons') => '1'
                      ),
    ),
    array(
        'type' => 'brando_custom_switch_option',
        'holder' => 'div',
        'class' => '',
        'heading' => __('Do you want to show custom newsletter?', 'brando-addons'),
        'param_name' => 'brando_coming_soon_custom_newsletter',
        'value' => array(__('NO', 'brando-addons') => '0', 
                         __('YES', 'brando-addons') => '1'
                        ),
        'dependency' => array( 'element' => 'brando_coming_soon_notify_me_show_form', 'value' => array('1') ),
    ),
    array(
        'type' => 'textarea',
        'heading' => __('Add Custom Newsletter Shortcode', 'brando-addons'),
        'param_name' => 'brando_custom_newsletter',
        'dependency' => array( 'element' => 'brando_coming_soon_custom_newsletter', 'value' => array('1') ),
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Newsletter Placeholder Text', 'brando-addons'),
      'param_name' => 'brando_coming_soon_notify_placeholder',
      'dependency' => array( 'element' => 'brando_coming_soon_custom_newsletter', 'value' => array('0') ),
    ),
    array(
      'type' => 'brando_custom_switch_option',
      'holder' => 'div',
      'class' => '',
      'heading' => __('Show Facebook Icon', 'brando-addons'),
      'param_name' => 'brando_coming_soon_notify_me_fb',
      'value' => array(__('No', 'brando-addons') => '0', 
                       __('Yes', 'brando-addons') => '1'
                      ),
      'group' => 'Social',
    ),
    array(
      'type' => 'textfield',
      'heading' => __( 'Facebook URL', 'brando-addons' ),
      'param_name' => 'brando_coming_soon_notify_me_fb_url',
      'dependency' => array( 'element' => 'brando_coming_soon_notify_me_fb', 'value' => array('1') ),
      'group' => 'Social',
    ),
    array(
      'type' => 'brando_custom_switch_option',
      'holder' => 'div',
      'class' => '',
      'heading' => __('Show Twitter Icon', 'brando-addons'),
      'param_name' => 'brando_coming_soon_notify_me_tw',
      'value' => array(__('No', 'brando-addons') => '0', 
                       __('Yes', 'brando-addons') => '1'
                      ),
      'group' => 'Social',
    ),
    array(
      'type' => 'textfield',
      'heading' => __( 'Twitter URL', 'brando-addons' ),
      'param_name' => 'brando_coming_soon_notify_me_tw_url',
      'dependency' => array( 'element' => 'brando_coming_soon_notify_me_tw', 'value' => array('1') ),
      'group' => 'Social',
    ),
    array(
      'type' => 'brando_custom_switch_option',
      'holder' => 'div',
      'class' => '',
      'heading' => __('Show Google-plus Icon', 'brando-addons'),
      'param_name' => 'brando_coming_soon_notify_me_gp',
      'value' => array(__('No', 'brando-addons') => '0', 
                       __('Yes', 'brando-addons') => '1'
                      ),
      'group' => 'Social',
    ),
    array(
      'type' => 'textfield',
      'heading' => __( 'Google-plus URL', 'brando-addons' ),
      'param_name' => 'brando_coming_soon_notify_me_gp_url',
      'dependency' => array( 'element' => 'brando_coming_soon_notify_me_gp', 'value' => array('1') ),
      'group' => 'Social',
    ),
    array(
      'type' => 'brando_custom_switch_option',
      'holder' => 'div',
      'class' => '',
      'heading' => __('Show Dribbble Icon', 'brando-addons'),
      'param_name' => 'brando_coming_soon_notify_me_dr',
      'value' => array(__('No', 'brando-addons') => '0', 
                       __('Yes', 'brando-addons') => '1'
                      ),
      'group' => 'Social',
    ),
    array(
      'type' => 'textfield',
      'heading' => __( 'Dribbble URL', 'brando-addons' ),
      'param_name' => 'brando_coming_soon_notify_me_dr_url',
      'dependency' => array( 'element' => 'brando_coming_soon_notify_me_dr', 'value' => array('1') ),
      'group' => 'Social',
    ),
    array(
      'type' => 'brando_custom_switch_option',
      'holder' => 'div',
      'class' => '',
      'heading' => __('Show Youtube Icon', 'brando-addons'),
      'param_name' => 'brando_coming_soon_notify_me_yt',
      'value' => array(__('No', 'brando-addons') => '0', 
                       __('Yes', 'brando-addons') => '1'
                      ),
      'group' => 'Social',
    ),
    array(
      'type' => 'textfield',
      'heading' => __( 'Youtube URL', 'brando-addons' ),
      'param_name' => 'brando_coming_soon_notify_me_yt_url',
      'dependency' => array( 'element' => 'brando_coming_soon_notify_me_yt', 'value' => array('1') ),
      'group' => 'Social',
    ),
    array(
      'type' => 'brando_custom_switch_option',
      'holder' => 'div',
      'class' => '',
      'heading' => __('Show Linkedin Icon', 'brando-addons'),
      'param_name' => 'brando_coming_soon_notify_me_li',
      'value' => array(__('No', 'brando-addons') => '0', 
                       __('Yes', 'brando-addons') => '1'
                      ),
      'group' => 'Social',
    ),
    array(
      'type' => 'textfield',
      'heading' => __( 'Linkedin URL', 'brando-addons' ),
      'param_name' => 'brando_coming_soon_notify_me_li_url',
      'dependency' => array( 'element' => 'brando_coming_soon_notify_me_li', 'value' => array('1') ),
      'group' => 'Social',
    ),
    array(
      'type'        => 'brando_custom_switch_option',
      'holder' => 'div',
      'heading'     => __('Show Pinterest Url', 'brando-addons' ),
      'param_name'  => 'brando_coming_soon_notify_me_pi',
      'value' => array(__('No', 'brando-addons') => '0', 
                       __('Yes', 'brando-addons') => '1'
                      ),
      'group' => 'Social',
    ),
    array(
      'type' => 'textfield',
      'heading' => __( 'Pinterest URL', 'brando-addons' ),
      'param_name' => 'brando_coming_soon_notify_me_pi_url',
      'dependency' => array( 'element' => 'brando_coming_soon_notify_me_pi', 'value' => array('1') ),
      'group' => 'Social',
    ),
    array(
      'type'        => 'brando_custom_switch_option',
      'holder' => 'div',
      'heading'     => __('Show Behance Url', 'brando-addons' ),
      'param_name'  => 'brando_coming_soon_notify_me_be',
      'value' => array(__('No', 'brando-addons') => '0', 
                       __('Yes', 'brando-addons') => '1'
                      ),
      'dependency' => array( 'element' => 'brando_coming_soon_notify_me_li', 'value' => array('1') ),
      'group' => 'Social',
    ),
    array(
      'type' => 'textfield',
      'heading' => __( 'Behance URL', 'brando-addons' ),
      'param_name' => 'brando_coming_soon_notify_me_be_url',
      'dependency' => array( 'element' => 'brando_coming_soon_notify_me_be', 'value' => array('1') ),
      'group' => 'Social',
    ),
    array(
      'type' => 'textarea_raw_html',
      'heading' => __( 'Custom Icon & Link Code', 'brando-addons' ),
      'param_name' => 'brando_coming_soon_custom_link',
      'group' => 'Social',
    ),
    array(
      'type' => 'colorpicker',
      'class' => '',
      'heading' => __( 'Title Color', 'brando-addons' ),
      'param_name' => 'brando_coming_soon_title_color',
      'group' => 'Style',
    ),
    array(
      'type' => 'colorpicker',
      'class' => '',
      'heading' => __( 'Notify Me Counter Color', 'brando-addons' ),
      'param_name' => 'brando_coming_soon_notify_me_counter_color',
      'group' => 'Style',
    ),
    array(
      'type' => 'colorpicker',
      'class' => '',
      'heading' => __( 'Social Icon Color', 'brando-addons' ),
      'param_name' => 'brando_coming_soon_social_icon_color',
      'group' => 'Style',
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