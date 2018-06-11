<?php
// For Slider Preview Image.
require_once( BRANDO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/brando-preview-image.php' );
// For Switch Option.
require_once( BRANDO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/switch-option.php' );
// For Icons List.
require_once( BRANDO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/icons-shortcode.php' );
// For Font Awesome Icons List.
require_once( BRANDO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/font-awesome-icons.php' );
// For ET-Line Icons List.
require_once( BRANDO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/et-line-icons.php' );
// For Post Featurebox.
require_once( BRANDO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/brando-posts-list.php' );
// For Multi-select Option In Post Category.
require_once( BRANDO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/brando-multiple-select-option.php' );
// For Multi-select Option In Portfolio Category.
require_once( BRANDO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/brando-multiple-portfolio-categories.php' );
// For Animation.
require_once( BRANDO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/animation-style.php' );
// For Custom Padding And Margin.
require_once( BRANDO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/padding-margin.php' );
// For Custom Padding.
require_once( BRANDO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/brando-padding-settings.php' );
// For Custom Margin.
require_once( BRANDO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/brando-margin-settings.php' );
// For Font Settings.
require_once( BRANDO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/font-setting.php' );

/*-----------------------------------------------------------------------------------*/
/* Map Element Id And Class And Column Start */
/*-----------------------------------------------------------------------------------*/

$brando_vc_extra_id = array(
  'type'        => 'textfield',
  'heading'     => 'Extra ID',
  'description' => 'Optional - Define element id (The id attribute specifies a unique id for an HTML element)',
  'param_name'  => 'id',
  'group'       => 'Extras'
);

$brando_vc_extra_class = array(
  'type'        => 'textfield',
  'heading'     => 'Extra Class',
  'description' => 'Optional - add additional CSS class to this element, you can define multiple CSS class with use of space like "Class1 Class2"',
  'param_name'  => 'class',
  'group'       => 'Extras'
);

$brando_vc_column =array(
  __('inherit from smaller', 'brando-addons') => '',
  __('1 column - 1/12', 'brando-addons')      => '1/12',
  __('2 columns - 1/6', 'brando-addons')      => '1/6',
  __('3 columns - 1/4', 'brando-addons')      => '1/4',
  __('4 columns - 1/3', 'brando-addons')      => '1/3',
  __('5 columns - 5/12', 'brando-addons')     => '5/12',
  __('6 columns - 1/2', 'brando-addons')      => '1/2',
  __('7 columns - 7/12', 'brando-addons')     => '7/12',
  __('8 columns - 2/3', 'brando-addons')      => '2/3',
  __('9 columns - 3/4', 'brando-addons')      => '3/4',
  __('10 columns - 5/6', 'brando-addons')     => '5/6',
  __('11 columns - 11/12', 'brando-addons')   => '11/12',
  __('12 columns - 1/1', 'brando-addons')     => '1/1'
);

$cf7 = get_posts( 'post_type=wpcf7_contact_form&numberposts=-1' );

$contact_forms = array();
if ( $cf7 ) {
  foreach ( $cf7 as $cform ) {
    $contact_forms[ $cform->post_title ] = $cform->ID;
  }
} else {
  $contact_forms[ __( 'No contact forms found', 'brando-addons' ) ] = 0;
}
/*-----------------------------------------------------------------------------------*/
/* Map Element Id And Class And Column End */
/*-----------------------------------------------------------------------------------*/

if (class_exists('Vc_Manager')) {

/*-----------------------------------------------------------------------------------*/
/* Vc_row change Start */
/*-----------------------------------------------------------------------------------*/

$cf7 = get_posts( 'post_type=wpcf7_contact_form&numberposts=-1' );

$contact_forms = array();
if ( $cf7 ) {
  foreach ( $cf7 as $cform ) {
    $contact_forms[ $cform->post_title ] = $cform->ID;
  }
} else {
  $contact_forms[ __( 'No contact forms found', 'js_composer' ) ] = 0;
}

  // Include all shortcode map files
  $fileName = array('row', 'inner-row', 'column','inner-column','image-slider','accordion','progressbar','portfolio','button','feature-box','blog','section-heading','icons','icon-list','alert-massage','tab','tab-content','video-sound','counter','image-gallery','popup','content-block','coming-soon','team-member','image','text-block','blockquote','post-slider','separator','single-image-block','restaurant-menu','testimonial-slider','testimonial','timer','award-box','portfolio-filter');

  foreach($fileName as $name) {
      require_once( BRANDO_SHORTCODE_ADDONS_MAP_URI.'/brando-'.$name.'-map.php' );
  }
}
?>