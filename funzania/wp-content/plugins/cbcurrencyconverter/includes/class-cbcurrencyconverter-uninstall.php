<?php
	// If this file is called directly, abort.
	if ( ! defined( 'WPINC' ) ) {
		die;
	}


	/**
	 * Fired during plugin uninstallation
	 *
	 * @link       http://codeboxr.com
	 * @since      1.0.0
	 *
	 * @package    Cbcurrencyconverter
	 * @subpackage Cbcurrencyconverter/includes
	 */

	/**
	 * Fired during plugin uninstallation.
	 *
	 * This class defines all code necessary to run during the plugin's deactivation.
	 *
	 * @since      1.0.0
	 * @package    Cbcurrencyconverter
	 * @subpackage Cbcurrencyconverter/includes
	 * @author     codeboxr <info@codeboxr.com>
	 */
	class Cbcurrencyconverter_Uninstall {

		/**
		 * Short Description. (use period)
		 *
		 * Long Description.
		 *
		 * @since    1.0.0
		 */
		public static function uninstall() {

			if ( ! current_user_can( 'activate_plugins' ) ) {
				return;
			}

			//check_admin_referer( 'bulk-plugins' );

			$settings             = new CBCurrencyconverterSetting( CBCURRENCYCONVERTER_NAME, CBCURRENCYCONVERTER_VERSION );
			$delete_global_config = $settings->get_option( 'cbcurrencyconverter_delete_options', 'cbcurrencyconverter_tools', '' );

			if ( $delete_global_config == 'on' ) {

				$option_prefix = 'cbcurrencyconverter_';

				//delete plugin global options


				$option_values = CBCurrencyConverterHelper::getAllOptionNames();

				foreach ( $option_values as $option_value ) {
					delete_option( $option_value );
				}


				/*
				//delete all option entries created by this plugin
				 delete_option('cbcurrencyconverter_global_settings');
				 delete_option('cbcurrencyconverter_calculator_settings');
				 delete_option('cbcurrencyconverter_list_settings');
				 delete_option('cbcurrencyconverter_tools');
				 delete_option('cbcurrencyconverter_integration');

				 //delete transient cache
				 delete_option('cbcurrencyconverter_alphavantage');
				*/


				do_action( 'cbcurrencyconverter_plugin_uninstall', $option_prefix );
			}

		}

	}
