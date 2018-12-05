<?php

/*
Plugin Name: Contempo Payment Gateways
Plugin URI: http://contempothemes.com
Description: Loads payment gateways for WP Pro Real Estate 7 when using the front end submission system.
Version: 1.0.0
Author: Chris Robinson
Author URI: http://contempothemes.com
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/*-----------------------------------------------------------------------------------*/
/* Load Plugin Textdomain */
/*-----------------------------------------------------------------------------------*/

add_action( 'plugins_loaded', 'ct_recp_load_textdomain' );

function ct_recpg_load_textdomain() {
  load_plugin_textdomain( 'contempo', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 
}

/*-----------------------------------------------------------------------------------*/
/* Load Gateways */
/*-----------------------------------------------------------------------------------*/

require plugin_dir_path( __FILE__ ) . 'OAuth.php';
require plugin_dir_path( __FILE__ ) . 'gateways/paypal/paypalnow.php';

?>