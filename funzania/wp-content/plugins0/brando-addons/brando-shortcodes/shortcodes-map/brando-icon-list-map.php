<?php
/**
 * Map For Icon List
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Icon List */
/*-----------------------------------------------------------------------------------*/
vc_map( array(
  'name' => __('Font Icons List', 'brando-addons'),
  'base' => 'brando_font_class_list',
  'category' => 'Brando',
  'description' => __( 'Add list of all font icons', 'brando-addons' ),
  'icon' => 'fa fa-flag-checkered brando-shortcode-icon', //URL or CSS class with icon image.
  'params' => array(
    array(
      'type' => 'dropdown',
      'holder' => 'div',
      'class' => '',
      'heading' => __('Icon List', 'brando-addons'),
      'param_name' => 'brando_font_icon_class_type',
      'value' => array(__('Select Icon List', 'brando-addons') => '',
                       __('Font Awesome Icons', 'brando-addons') => 'brando_font_awesome_icons',
                       __('Et-line Icons', 'brando-addons') => 'brando_et_line_icons',
                      ),
    ),
    $brando_vc_extra_id,
    $brando_vc_extra_class,
        ),
) );