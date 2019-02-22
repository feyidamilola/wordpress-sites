<?php
/**
 * PixelThrone — Alma — Main Functions
 */

if (!defined('ABSPATH')) die('-1');
if (!class_exists('throne_building')) {

	class throne_building{
		public static $lib_dir;
		public static $plugin_dir;
		public static $plugin_info;

	    public function __construct() {
	    	// Define variaveis chave
	    	self::$lib_dir 		= dirname( __FILE__ );
	    	self::$plugin_dir 	= PLUGIN_PATH;

	    	// Carrega classes
	    	require_once self::$lib_dir.'/notices.php';

	    	// Chama funções
	    	self::loads_if_not_exists();
		    add_action( 'plugins_loaded', array($this, 'composer_run') );

	    	// Carrega Variaveis que precisam das funções em cima.
	    	self::$plugin_info 	= get_plugin_data( PLUGIN_PATH.'index.php', $markup = true, $translate = true );
	    }

	    public function composer_run() {
	    	// Check if VC exist.
	    	if ( !defined('WPB_VC_VERSION')) {
	    		// If not
				add_action( 'admin_notices', 'pt_notices::custom_error_notice_vcomposer_already_instaled' );
	    	} else {
	    		vc_manager()->setIsAsTheme(true);
				vc_manager()->disableUpdater(true);

	    		/* Shortcodes */
	    		require_once self::$plugin_dir.'shortcodes/shortcodes.php';

	    		/* Remove Shortcodes */
	    		require_once self::$plugin_dir.'shortcodes/shortcodes-remove.php';

	    		/* VComposer Templates */
	    		require_once self::$plugin_dir.'shortcodes/vc_templates.php';
	    	}
	    }

	    public function loads_if_not_exists() {
	    	if(!function_exists('get_plugin_data')) {
	    		include(ABSPATH . "wp-admin/includes/plugin.php");
			}
	    }
	}

}