<?php
	// If this file is called directly, abort.
	if ( ! defined( 'WPINC' ) ) {
		die;
	}


	/**
	 * The file that defines the core plugin class
	 *
	 * A class definition that includes attributes and functions used across both the
	 * public-facing side of the site and the admin area.
	 *
	 * @link       http://codeboxr.com
	 * @since      1.0.0
	 *
	 * @package    Cbcurrencyconverter
	 * @subpackage Cbcurrencyconverter/includes
	 */

	/**
	 * The core plugin class.
	 *
	 * This is used to define internationalization, admin-specific hooks, and
	 * public-facing site hooks.
	 *
	 * Also maintains the unique identifier of this plugin as well as the current
	 * version of the plugin.
	 *
	 * @since      1.0.0
	 * @package    Cbcurrencyconverter
	 * @subpackage Cbcurrencyconverter/includes
	 * @author     codeboxr <info@codeboxr.com>
	 */
	class CBCurrencyConverter {

		/**
		 * The loader that's responsible for maintaining and registering all hooks that power
		 * the plugin.
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      Cbcurrencyconverter_Loader $loader Maintains and registers all hooks for the plugin.
		 */
		protected $loader;

		/**
		 * The unique identifier of this plugin.
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      string $plugin_name The string used to uniquely identify this plugin.
		 */
		protected $plugin_name;

		public $plugin_basename;

		/**
		 * The current version of the plugin.
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      string $version The current version of the plugin.
		 */
		protected $version;

		/**
		 * Define the core functionality of the plugin.
		 *
		 * Set the plugin name and the plugin version that can be used throughout the plugin.
		 * Load the dependencies, define the locale, and set the hooks for the admin area and
		 * the public-facing side of the site.
		 *
		 * @since    1.0.0
		 */
		public function __construct() {

			$this->plugin_name = CBCURRENCYCONVERTER_NAME;
			$this->version     = CBCURRENCYCONVERTER_VERSION;

			$this->plugin_basename = plugin_basename( plugin_dir_path( __DIR__ ) . $this->plugin_name . '.php' );

			$this->load_dependencies();
			$this->set_locale();
			$this->define_admin_hooks();
			$this->define_public_hooks();

		}

		/**
		 * Get currency list
		 *
		 * @return mixed|void
		 */
		public static function getCurrencyList() {

			cbcurrencyconverter_deprecated_function( 'getCurrencyList function', '2.2', 'CBCurrencyConverterHelper::getCurrencyList' );

			return CBCurrencyConverterHelper::getCurrencyList();

		}

		/**
		 * Load the required dependencies for this plugin.
		 *
		 * Include the following files that make up the plugin:
		 *
		 * - Cbcurrencyconverter_Loader. Orchestrates the hooks of the plugin.
		 * - Cbcurrencyconverter_i18n. Defines internationalization functionality.
		 * - Cbcurrencyconverter_Admin. Defines all hooks for the admin area.
		 * - Cbcurrencyconverter_Public. Defines all hooks for the public side of the site.
		 *
		 * Create an instance of the loader which will be used to register the hooks
		 * with WordPress.
		 *
		 * @since    1.0.0
		 * @access   private
		 */
		private function load_dependencies() {

			/**
			 * The class responsible for orchestrating the actions and filters of the
			 * core plugin.
			 */
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-cbcurrencyconverter-loader.php';

			/**
			 * The class responsible for defining internationalization functionality
			 * of the plugin.
			 */
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-cbcurrencyconverter-i18n.php';


			/**
			 * The class responsible for settings in admin area.
			 */
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-cbcurrencyconvertersetting.php';


			/**
			 * Includer helper function
			 */
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/cbcurrencyconverter-helper.php';

			/**
			 * The class responsible for defining all actions that occur in the admin area.
			 */
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-cbcurrencyconverter-admin.php';

			/**
			 * The class responsible for defining all actions that occur in the public-facing
			 * side of the site.
			 */
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-cbcurrencyconverter-public.php';

			/**
			 * Register Widget
			 */
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'widgets/cbcurrencyconverterwidget.php';

			$this->loader = new Cbcurrencyconverter_Loader();

		}

		/**
		 * Define the locale for this plugin for internationalization.
		 *
		 * Uses the Cbcurrencyconverter_i18n class in order to set the domain and to register the hook
		 * with WordPress.
		 *
		 * @since    1.0.0
		 * @access   private
		 */
		private function set_locale() {

			$plugin_i18n = new Cbcurrencyconverter_i18n();

			$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

		}

		/**
		 * Register all of the hooks related to the admin area functionality
		 * of the plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 */
		private function define_admin_hooks() {

			$plugin_admin = new CBCurrencyConverter_Admin( $this->get_plugin_name(), $this->get_version() );

			$this->loader->add_filter( 'plugin_action_links_' . $this->plugin_basename, $plugin_admin, 'cbcurrencyconverter_action_links', 10, 4 );

			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

			$this->loader->add_action( 'admin_menu', $plugin_admin, 'cbcurrencyconverter_admin_menu' );
			$this->loader->add_action( 'admin_init', $plugin_admin, 'setting_init' );

			if ( isset( $_REQUEST['page'] ) && $_REQUEST['page'] == 'cbcurrencyconverter' && isset( $_REQUEST['cbcurrencyconverter_fullreset'] ) && $_REQUEST['cbcurrencyconverter_fullreset'] == 1 ) {
				$this->loader->add_action( 'admin_init', $plugin_admin, 'plugin_fullreset' );
			}

			do_action( 'cbcurrencyconverter_admin', $plugin_admin );
		}

		/**
		 * Register all of the hooks related to the public-facing functionality
		 * of the plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 */
		private function define_public_hooks() {

			global $plugin_public;


			$plugin_public = new Cbcurrencyconverter_Public( $this->get_plugin_name(), $this->get_version() );

			$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
			$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

			//init widget
			$this->loader->add_action( 'widgets_init', $plugin_public, 'register_widgets' );

			//shortcode
			add_shortcode( 'cbcurrencyconverter', array( $plugin_public, 'cbcurrencyconverter_shortcode' ) );


			$this->loader->add_filter( 'cbxcc_convertion_method', $plugin_public, 'cbxconvertcurrency_method_alphavantage', 10, 5 );

			$this->loader->add_action( 'wp_ajax_currrency_convert', $plugin_public, 'cbcurrencyconverter_ajax_cur_convert' );
			$this->loader->add_action( 'wp_ajax_nopriv_currrency_convert', $plugin_public, 'cbcurrencyconverter_ajax_cur_convert' );

			$this->loader->add_action( 'init', $plugin_public, 'cbcurrencyconverter_init' );

		}

		/**
		 * Run the loader to execute all of the hooks with WordPress.
		 *
		 * @since    1.0.0
		 */
		public function run() {
			$this->loader->run();
		}

		/**
		 * The name of the plugin used to uniquely identify it within the context of
		 * WordPress and to define internationalization functionality.
		 *
		 * @since     1.0.0
		 * @return    string    The name of the plugin.
		 */
		public function get_plugin_name() {
			return $this->plugin_name;
		}

		/**
		 * The reference to the class that orchestrates the hooks with the plugin.
		 *
		 * @since     1.0.0
		 * @return    Cbcurrencyconverter_Loader    Orchestrates the hooks of the plugin.
		 */
		public function get_loader() {
			return $this->loader;
		}

		/**
		 * Retrieve the version number of the plugin.
		 *
		 * @since     1.0.0
		 * @return    string    The version number of the plugin.
		 */
		public function get_version() {
			return $this->version;
		}


	}
