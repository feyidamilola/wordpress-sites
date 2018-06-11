<?php
/**
 * Map For Timer
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Timer */
/*-----------------------------------------------------------------------------------*/

vc_map( array(
      'name' => __( 'Countdown Timer', 'brando-addons' ),
      'base' => 'brando_timer',
      'category' => 'Brando',
      'icon' => 'fa fa-list-alt brando-shortcode-icon',
      'description' => __( 'Create a timer', 'brando-addons' ),
      'params' => array(
        array(
          'type' => 'textfield',
          'heading' => __('Enter Date', 'brando-addons'),
          'param_name' => 'brando_timer_date',
          'description' => __( 'Enter date like 2016/12/31 in date format yyyy/mm/dd', 'brando-addons' ),
        ),
        array(
          'type' => 'colorpicker',
          'heading' => __('Timer Color', 'brando-addons'),
          'param_name' => 'brando_timer_color',
        ),
        $brando_vc_extra_id,
        $brando_vc_extra_class, 
)));