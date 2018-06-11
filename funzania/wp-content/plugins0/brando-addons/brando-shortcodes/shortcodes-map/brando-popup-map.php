<?php
/**
 * Map For Popup
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Popup */
/*-----------------------------------------------------------------------------------*/

$date = date('Y-m-d H:i:s'); ## Get current date
$time = strtotime($date); ## Get timestamp of current date
vc_map( array(
  'name' => __('Popup', 'brando-addons'),
  'description' => __('Add a popup with content ', 'brando-addons'),
  'icon' => 'fa fa-files-o brando-shortcode-icon',
  'base' => 'brando_popup',
  'category' => 'Brando',
  'params' => array(
    array(
      'type' => 'dropdown',
      'heading' => __('Popup Type', 'brando-addons'),
      'param_name' => 'popup_type',
      'value' => array(__('Select Popup Type', 'brando-addons') => '',
                       __('Popup Form', 'brando-addons') => 'popup-form-1',
                       __('Ajax Popup', 'brando-addons') => 'simple-ajax-popup-align-top',
                       __('Youtube Video', 'brando-addons') => 'youtube-video-1',
                       __('Vimeo Video', 'brando-addons') => 'vimeo-video-1',
                       __('Google Map', 'brando-addons') => 'google-map-1',
                      ),
    ),
    array(
      'type' => 'dropdown',
      'heading' => __( 'Select Contact Form', 'brando-addons' ),
      'param_name' => 'contact_forms_shortcode',
      'value' => $contact_forms,
      'description' => __( 'Choose previously created contact form from the drop down list.', 'brando-addons' ),
      'dependency'  => array( 'element' => 'popup_type', 'value' => array('popup-form-1') ),
    ),
    array(
      'type' => 'textarea_html',
      'heading' => __('Content', 'brando-addons'),
      'param_name' => 'content',
      'dependency'  => array( 'element' => 'popup_type', 'value' => array('popup-form-1','youtube-video-1','vimeo-video-1','google-map-1','simple-ajax-popup-align-top') ),
    ),
    array(
      'type'        => 'vc_link',
      'heading'     => __('Button Config', 'brando-addons'),
      'param_name'  => 'popup_button_config',
      'dependency'  => array( 'element' => 'popup_type', 'value' => array('popup-form-1','simple-ajax-popup-align-top','vimeo-video-1','google-map-1') ),
    ),
    array(
      'type'        => 'vc_link',
      'heading'     => __('Button Config', 'brando-addons'),
      'param_name'  => 'popup_button_config_youtube',
      'description' => __( 'Add YOUTUBE VIDEO URL like https://www.youtube.com/watch?v=xxxxxxxxxx, you will get this from youtube.', 'brando-addons' ),            
      'dependency'  => array( 'element' => 'popup_type', 'value' => array('youtube-video-1') ),
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Form Id', 'brando-addons'),
      'param_name' => 'popup_form_id',
      'value' => $time,
      'dependency' => array('element' => 'popup_type', 'value' => array('popup-form-1') ),
    ),
  )
) );