<?php

/**
* 
*/
class pt_tgm
{
	
	function __construct()
	{
		require_once get_template_directory() . '/framework/lib/class-tgm-plugin-activation/class-tgm-plugin-activation.php';
		add_action( 'tgmpa_register', array(&$this, 'pt_framework_register_required_plugins' ) );

		/* Check PixelThrone plugin for updates */
		//pt_pixelthrone_plugin_check( $plugins[0]['version'] );
	}

	function pt_framework_register_required_plugins() 
    {
	    /*
		 * Array of plugin arrays. Required keys are name and slug.
		 * If the source is NOT from the .org repo, then source is also required.
		 */
	    $plugins = array(

		    // Within the theme
		    array(
			    'name'					=> 'Alma Framework',
			    'slug'					=> 'framework-alma',
			    'source'				=> get_stylesheet_directory() . '/plugins/framework-alma.zip',
			    'force_activation'		=> false,
			    'force_deactivation'	=> true,
			    'required'				=> true,
			    'version'				=> '1.1',
		    ),
		    array(
			    'name'					=> 'Advanced Custom Fields: Gallery Field',
			    'slug'					=> 'acf-gallery',
			    'source'				=> get_stylesheet_directory() . '/plugins/acf-gallery.zip',
			    'force_activation'		=> true,
			    'required'				=> true,
			    'version'				=> '1.1.0',
		    ),
		    array(
			    'name'					=> 'Revolution Slider',
			    'slug'					=> 'revslider',
			    'source'				=> get_stylesheet_directory() . '/plugins/revslider__5.4.6.1.zip',
			    'required'				=> false,
			    'version'				=> '5.4.6.1',
		    ),
		    array(
			    'name'					=> 'Visual Composer',
			    'slug'					=> 'js_composer',
			    'source'				=> get_stylesheet_directory() . '/plugins/js_composer_5.4.5.zip',
			    'required'				=> false,
			    'version'				=> '5.4.5',
		    ),

		    // WordPress Repository
		    array(
			    'name'					=> 'Advanced Custom Fields',
			    'slug'					=> 'advanced-custom-fields',
			    'force_activation'		=> true,
			    'required'				=> true,
		    ),
		    array(
			    'name'					=> 'WordPress Importer',
			    'slug'					=> 'wordpress-importer',
			    'required'				=> false,
		    ),
		    array(
			    'name'					=> 'Intuitive Custom Post Order',
			    'slug'					=> 'intuitive-custom-post-order',
			    'required'				=> false,
		    ),
		    array(
			    'name'					=> 'Redux Framework',
			    'slug'					=> 'redux-framework',
			    'required'				=> false,
		    ),
	    );

	    /*
		 * Array of configuration settings. Amend each line as needed.
		 *
		 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
		 * strings available, please help us make TGMPA even better by giving us access to these translations or by
		 * sending in a pull-request with .po file(s) with the translations.
		 *
		 * Only uncomment the strings in the config array if you want to customize the strings.
		 */
	    $config = array(
		    'id'           => 'pt_theme__alma',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		    'default_path' => '',                      // Default absolute path to bundled plugins.
		    'menu'         => 'tgmpa-install-plugins', // Menu slug.
		    'has_notices'  => true,                    // Show admin notices or not.
		    'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		    'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		    'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		    'message'      => '',                      // Message to output right before the plugins table.

		    /*
			'strings'      => array(
				'page_title'                      => __( 'Install Required Plugins', 'pt_theme__alma' ),
				'menu_title'                      => __( 'Install Plugins', 'pt_theme__alma' ),
				/* translators: %s: plugin name. * /
				'installing'                      => __( 'Installing Plugin: %s', 'pt_theme__alma' ),
				/* translators: %s: plugin name. * /
				'updating'                        => __( 'Updating Plugin: %s', 'pt_theme__alma' ),
				'oops'                            => __( 'Something went wrong with the plugin API.', 'pt_theme__alma' ),
				'notice_can_install_required'     => _n_noop(
					/* translators: 1: plugin name(s). * /
					'This theme requires the following plugin: %1$s.',
					'This theme requires the following plugins: %1$s.',
					'pt_theme__alma'
				),
				'notice_can_install_recommended'  => _n_noop(
					/* translators: 1: plugin name(s). * /
					'This theme recommends the following plugin: %1$s.',
					'This theme recommends the following plugins: %1$s.',
					'pt_theme__alma'
				),
				'notice_ask_to_update'            => _n_noop(
					/* translators: 1: plugin name(s). * /
					'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
					'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
					'pt_theme__alma'
				),
				'notice_ask_to_update_maybe'      => _n_noop(
					/* translators: 1: plugin name(s). * /
					'There is an update available for: %1$s.',
					'There are updates available for the following plugins: %1$s.',
					'pt_theme__alma'
				),
				'notice_can_activate_required'    => _n_noop(
					/* translators: 1: plugin name(s). * /
					'The following required plugin is currently inactive: %1$s.',
					'The following required plugins are currently inactive: %1$s.',
					'pt_theme__alma'
				),
				'notice_can_activate_recommended' => _n_noop(
					/* translators: 1: plugin name(s). * /
					'The following recommended plugin is currently inactive: %1$s.',
					'The following recommended plugins are currently inactive: %1$s.',
					'pt_theme__alma'
				),
				'install_link'                    => _n_noop(
					'Begin installing plugin',
					'Begin installing plugins',
					'pt_theme__alma'
				),
				'update_link' 					  => _n_noop(
					'Begin updating plugin',
					'Begin updating plugins',
					'pt_theme__alma'
				),
				'activate_link'                   => _n_noop(
					'Begin activating plugin',
					'Begin activating plugins',
					'pt_theme__alma'
				),
				'return'                          => __( 'Return to Required Plugins Installer', 'pt_theme__alma' ),
				'plugin_activated'                => __( 'Plugin activated successfully.', 'pt_theme__alma' ),
				'activated_successfully'          => __( 'The following plugin was activated successfully:', 'pt_theme__alma' ),
				/* translators: 1: plugin name. * /
				'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'pt_theme__alma' ),
				/* translators: 1: plugin name. * /
				'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'pt_theme__alma' ),
				/* translators: 1: dashboard link. * /
				'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'pt_theme__alma' ),
				'dismiss'                         => __( 'Dismiss this notice', 'pt_theme__alma' ),
				'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'pt_theme__alma' ),
				'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'pt_theme__alma' ),

				'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
			),
			*/
	    );

	    tgmpa( $plugins, $config );
 
    }
}

