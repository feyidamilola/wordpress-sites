<?php
/**
 * Map For Video & Sound
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Video & Sound */
/*-----------------------------------------------------------------------------------*/
 
vc_map( array(
  'name' => __('Video & Sound', 'brando-addons'),
  'description' => __( 'Add vimeo/youtube/sound cloud', 'brando-addons' ),
  'icon' => 'fa fa-video-camera brando-shortcode-icon',
  'base' => 'brando_video_sound',
  'category' => 'Brando',
  'params' => array(
    array(
      'type' => 'dropdown',
      'holder' => 'div',
      'class' => '',
      'heading' => __('Video Type', 'brando-addons'),
      'param_name' => 'brando_video_type',
      'value' => array(__('Select Video Type', 'brando-addons') => '',
                       __('Vimeo', 'brando-addons') => 'vimeo',
                       __('Youtube', 'brando-addons') => 'youtube',
                       __('Sound Cloud', 'brando-addons') => 'sound-cloud',
                       __('HTML5', 'brando-addons') => 'html5',
                      ),
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Vimeo ID', 'brando-addons'),
      'description' => __( 'Add VIMEO ID like xxxxxxxxx of vimeo url - https://vimeo.com/xxxxxxxxx', 'brando-addons' ),      
      'param_name' => 'brando_vimeo_id',
      'dependency'  => array( 'element' => 'brando_video_type', 'value' => array('vimeo') ),
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Youtube Embed URL', 'brando-addons'),
      'description' => __( 'Add YOUTUBE VIDEO EMBED URL like https://www.youtube.com/embed/xxxxxxxxxx, you will get this from youtube embed iframe src code', 'brando-addons' ),            
      'param_name' => 'brando_youtube_url',
      'dependency'  => array( 'element' => 'brando_video_type', 'value' => array('youtube') ),
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Track ID', 'brando-addons'),
      'description' => __( 'Add TRACK ID like XXXXXXXX, you will get it from embed code like api.soundcloud.com/tracks/XXXXXXXX','brando-addons'),                  
      'param_name' => 'brando_track_id',
      'dependency'  => array( 'element' => 'brando_video_type', 'value' => array('sound-cloud') ),
    ),
    array(
      'type' => 'textfield',
      'heading' => __('MP4 Video URL', 'brando-addons'),
      'param_name' => 'mp4_video',
      'dependency'  => array( 'element' => 'brando_video_type', 'value' => array('html5') ),
    ), 
    array(
      'type' => 'textfield',
      'heading' => __('OGG Video URL', 'brando-addons'),
      'param_name' => 'ogg_video',
      'dependency'  => array( 'element' => 'brando_video_type', 'value' => array('html5') ),
    ), 
    array(
      'type' => 'textfield',
      'heading' => __('WEBM Video URL', 'brando-addons'),
      'param_name' => 'webm_video',
      'dependency'  => array( 'element' => 'brando_video_type', 'value' => array('html5') ),
    ),
    array(
        'type' => 'brando_custom_switch_option',
        'holder' => 'div',
        'class' => '',
        'heading' => __('Autoplay', 'brando-addons'),
        'param_name' => 'video_autoplay',
        'value' => array(__('No', 'brando-addons') => '0', 
                         __('Yes', 'brando-addons') => '1'
                        ),
        'std' => '1',
        'dependency'  => array( 'element' => 'brando_video_type', 'value' => array('html5') ),
        'group' => 'Video Block',
    ),
    array(
        'type' => 'brando_custom_switch_option',
        'holder' => 'div',
        'class' => '',
        'heading' => __('Mute', 'brando-addons'),
        'param_name' => 'video_muted',
        'value' => array(__('No', 'brando-addons') => '0', 
                         __('Yes', 'brando-addons') => '1'
                        ),
        'std' => '1',
        'dependency'  => array( 'element' => 'brando_video_type', 'value' => array('html5') ),
        'group' => 'Video Block',
    ),
    array(
        'type' => 'brando_custom_switch_option',
        'holder' => 'div',
        'class' => '',
        'heading' => __('Loop', 'brando-addons'),
        'param_name' => 'video_loop',
        'value' => array(__('No', 'brando-addons') => '0', 
                         __('Yes', 'brando-addons') => '1'
                        ),
        'std' => '1',
        'dependency'  => array( 'element' => 'brando_video_type', 'value' => array('html5') ),
        'group' => 'Video Block',
    ), 
    array(
        'type' => 'brando_custom_switch_option',
        'holder' => 'div',
        'class' => '',
        'heading' => __('Controls', 'brando-addons'),
        'param_name' => 'video_controls',
        'value' => array(__('No', 'brando-addons') => '0', 
                         __('Yes', 'brando-addons') => '1'
                        ),
        'std' => '1',
        'dependency'  => array( 'element' => 'brando_video_type', 'value' => array('html5') ),
        'group' => 'Video Block',
    ), 
    array(
      'type'        => 'textfield',
      'heading'     => __('Width', 'brando-addons' ),
      'description' => __( 'Define IFRAME width like 500', 'brando-addons' ),                        
      'param_name'  => 'width',
      'dependency'  => array( 'element' => 'brando_video_type', 'value' => array('vimeo','youtube','sound-cloud') ),
      'group'       => 'Width & Height'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => __('Height', 'brando-addons' ),
      'param_name'  => 'height',
      'description' => __( 'Define IFRAME height like 400', 'brando-addons' ),                              
      'dependency'  => array( 'element' => 'brando_video_type', 'value' => array('vimeo','youtube','sound-cloud') ),
      'group'       => 'Width & Height'
    )
  )
) );