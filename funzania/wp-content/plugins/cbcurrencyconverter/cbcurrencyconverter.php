<?php

	/**
	 * @link              http://codeboxr.com
	 * @since             1.0.0
	 * @package           cbcurrencyconverter
	 *
	 * @wordpress-plugin
	 * Plugin Name:       CBX Currency Converter
	 * Plugin URI:        http://codeboxr.com/product/cbx-currency-converter-for-wordpress/
	 * Description:       Currency Converter widget and rate display.
	 * Version:           2.5
	 * Author:            codeboxr
	 * Author URI:        http://codeboxr.com
	 * License:           GPL-2.0+
	 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
	 * Text Domain:       cbcurrencyconverter
	 * Domain Path:       /languages
	 * @copyright         2015-17 codeboxr
	 */

	// If this file is called directly, abort.
	if ( ! defined( 'WPINC' ) ) {
		die;
	}

	defined( 'CBCURRENCYCONVERTER_NAME' ) or define( 'CBCURRENCYCONVERTER_NAME', 'cbcurrencyconverter' );
	defined( 'CBCURRENCYCONVERTER_VERSION' ) or define( 'CBCURRENCYCONVERTER_VERSION', '2.5' );
	defined( 'CBCURRENCYCONVERTER_ROOT_PATH' ) or define( 'CBCURRENCYCONVERTER_ROOT_PATH', plugin_dir_path( __FILE__ ) );
	defined( 'CBCURRENCYCONVERTER_ROOT_URL' ) or define( 'CBCURRENCYCONVERTER_ROOT_URL', plugin_dir_url( __FILE__ ) );
	defined( 'CBCURRENCYCONVERTER_BASE_NAME' ) or define( 'CBCURRENCYCONVERTER_BASE_NAME', plugin_basename( __FILE__ ) );


	/**
	 * The code that runs during plugin activation.
	 * This action is documented in includes/class-cbcurrencyconverter-activator.php
	 */
	function activate_cbcurrencyconverter() {
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-cbcurrencyconverter-activator.php';
		Cbcurrencyconverter_Activator::activate();
	}

	/**
	 * The code that runs during plugin deactivation.
	 * This action is documented in includes/class-cbcurrencyconverter-deactivator.php
	 */
	function deactivate_cbcurrencyconverter() {
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-cbcurrencyconverter-deactivator.php';
		Cbcurrencyconverter_Deactivator::deactivate();
	}

	/**
	 * The code that runs during plugin uninstallatiom.
	 * This action is documented in includes/class-cbcurrencyconverter-.php
	 */
	function uninstall_cbcurrencyconverter() {
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-cbcurrencyconverter-uninstall.php';
		Cbcurrencyconverter_Uninstall::uninstall();
	}

	register_activation_hook( __FILE__, 'activate_cbcurrencyconverter' );
	register_deactivation_hook( __FILE__, 'deactivate_cbcurrencyconverter' );
	register_uninstall_hook( __FILE__, 'uninstall_cbcurrencyconverter' );

	/**
	 * The core plugin class that is used to define internationalization,
	 * admin-specific hooks, and public-facing site hooks.
	 */
	require plugin_dir_path( __FILE__ ) . 'includes/class-cbcurrencyconverter.php';

	/**
	 * Wrapper for deprecated functions so we can apply some extra logic.
	 *
	 * @since  2.2.0
	 *
	 * @param  string $function
	 * @param  string $version
	 * @param  string $replacement
	 */
	function cbcurrencyconverter_deprecated_function( $function, $version, $replacement = null ) {
		if ( defined( 'DOING_AJAX' ) ) {
			do_action( 'deprecated_function_run', $function, $replacement, $version );
			$log_string = "The {$function} function is deprecated since version {$version}.";
			$log_string .= $replacement ? " Replace with {$replacement}." : '';
			error_log( $log_string );
		} else {
			_deprecated_function( $function, $version, $replacement );
		}
	}

	/**
	 * Begins execution of the plugin.
	 *
	 * Since everything within the plugin is registered via hooks,
	 * then kicking off the plugin from this point in the file does
	 * not affect the page life cycle.
	 *
	 * @since    1.0.0
	 */
	function run_cbcurrencyconverter() {

		$plugin = new Cbcurrencyconverter();
		$plugin->run();

	}

	run_cbcurrencyconverter();