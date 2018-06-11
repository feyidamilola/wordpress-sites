<?php
	// If this file is called directly, abort.
	if ( ! defined( 'WPINC' ) ) {
		die;
	}


	/**
	 * The admin-specific functionality of the plugin.
	 *
	 * @link       http://codeboxr.com
	 * @since      1.0.0
	 *
	 * @package    Cbcurrencyconverter
	 * @subpackage Cbcurrencyconverter/admin
	 */

	/**
	 * The admin-specific functionality of the plugin.
	 *
	 * Defines the plugin name, version, and two examples hooks for how to
	 * enqueue the admin-specific stylesheet and JavaScript.
	 *
	 * @package    Cbcurrencyconverter
	 * @subpackage Cbcurrencyconverter/admin
	 * @author     codeboxr <info@codeboxr.com>
	 */
	class Cbcurrencyconverter_Admin {

		/**
		 * The ID of this plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string $plugin_name The ID of this plugin.
		 */
		private $plugin_name;


		/**
		 * The version of this plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string $version The current version of this plugin.
		 */
		private $version;

		//for setting
		private $settings_api;

		/**
		 * Initialize the class and set its properties.
		 *
		 * @since    1.0.0
		 *
		 * @param      string $plugin_name The name of this plugin.
		 * @param      string $version     The version of this plugin.
		 */
		public function __construct( $plugin_name, $version ) {

			$this->plugin_name = $plugin_name;
			$this->version     = $version;

			$this->settings_api = new CBCurrencyconverterSetting( $this->plugin_name, $this->version );

		}

		/**
		 * Register the stylesheets for the admin area.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_styles( $hook ) {
			if ( $hook == 'settings_page_cbcurrencyconverter' || $hook == 'widgets.php' ) {
				wp_register_style( 'chosen.min', plugin_dir_url( __FILE__ ) . 'css/chosen.min.css', array(), CBCURRENCYCONVERTER_VERSION );
				wp_enqueue_style( 'wp-color-picker' );
				wp_register_style( 'cbcurrencyconverter_admin', plugin_dir_url( __FILE__ ) . 'css/cbcurrencyconverter_admin.css', array( 'chosen.min' ), CBCURRENCYCONVERTER_VERSION );

				wp_enqueue_style( 'chosen.min' );
				wp_enqueue_style( 'cbcurrencyconverter_admin' );
			}
		}

		/**
		 * Register the JavaScript for the admin area.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_scripts( $hook ) {

			if ( $hook == 'settings_page_cbcurrencyconverter' || $hook == 'widgets.php' ) {

				wp_enqueue_media();
				wp_enqueue_script( 'wp-color-picker' );
				wp_enqueue_script( 'jquery' );

				wp_register_script( 'chosen.jquery.min', plugin_dir_url( __FILE__ ) . 'js/chosen.jquery.min.js', array( 'jquery' ), CBCURRENCYCONVERTER_VERSION, true );
				wp_register_script( 'cbcurrencyconverter_admin', plugin_dir_url( __FILE__ ) . 'js/cbcurrencyconverter_admin.js', array(
					'wp-color-picker',
					'chosen.jquery.min',
					'jquery'
				), CBCURRENCYCONVERTER_VERSION, true );

				// Localize the script with new data
				$translation_array = array(
					'chosennoresults' => esc_html__( 'Oops, nothing found!', 'cbcurrencyconverter' )

				);
				wp_localize_script( 'cbcurrencyconverter_admin', 'wpcbcurrencyconverter', $translation_array );


				wp_enqueue_script( 'chosen.jquery.min' );
				wp_enqueue_script( 'cbcurrencyconverter_admin' );
			}
		}


		public function cbcurrencyconverter_admin_menu() {
			$this->plugin_screen_hook_suffix = add_submenu_page( 'options-general.php', esc_html__( 'Currency Converter', 'cbcurrencyconverter' ), esc_html__( 'Currency Converter', 'cbcurrencyconverter' ), 'manage_options', 'cbcurrencyconverter', array(
					$this,
					'display_plugin_admin_settings'
				)
			);
		}


		/**
		 * Render the settings page for this plugin.
		 *
		 * @since    1.0.0
		 */
		public function display_plugin_admin_settings() {

			global $wpdb;

			$plugin_data = get_plugin_data( plugin_dir_path( __DIR__ ) . $this->plugin_name . '.php' );

			include( 'partials/admin-settings-display.php' );

		}


		/**
		 * Settings Initilized
		 */
		public function setting_init() {
			//set the settings
			$this->settings_api->set_sections( $this->get_settings_sections() );
			$this->settings_api->set_fields( $this->get_settings_fields() );
			//initialize settings
			$this->settings_api->admin_init();
		}

		/**
		 * Settings Sections
		 */
		public function get_settings_sections() {

			$sections = array(
				array(
					'id'    => 'cbcurrencyconverter_global_settings',
					'title' => esc_html__( 'General Settings', 'cbcurrencyconverter' )
				),
				array(
					'id'    => 'cbcurrencyconverter_calculator_settings',
					'title' => esc_html__( 'Calculator Layout Default', 'cbcurrencyconverter' ),

				),
				array(
					'id'    => 'cbcurrencyconverter_list_settings',
					'title' => esc_html__( 'List Layout Default', 'cbcurrencyconverter' ),

				),
				array(
					'id'    => 'cbcurrencyconverter_tools',
					'title' => esc_html__( 'Tools', 'cbcurrencyconverter' )
				)
			);

			return apply_filters( 'cbcurrencyconverter_section', $sections );

		}

		/**
		 * Settings fields
		 */
		public function get_settings_fields() {

			$cbcurrencyconverter_currency_list = $cal_from_to_list_currency = CBCurrencyConverterHelper::getCurrencyList();


			$setting_api_cal = get_option( 'cbcurrencyconverter_calculator_settings' );
			$reset_data_link = add_query_arg( 'cbcurrencyconverter_fullreset', 1, admin_url( 'options-general.php?page=cbcurrencyconverter' ) );

			$table_html = '<p><strong>' . esc_html__( 'Following option values created by this plugin(including addon) from wordpress core option table', 'cbcurrencyconverter' ) . '</strong></p>';


			$option_values = CBCurrencyConverterHelper::getAllOptionNames();
			$table_counter = 1;
			foreach ( $option_values as $key => $value ) {
				$table_html .= '<p>' . str_pad( $table_counter, 2, '0', STR_PAD_LEFT ) . '. ' . $value['option_name'] . ' - ' . $value['option_id'] . ' - (<code style="overflow-wrap: break-word; word-break: break-all;">' . $value['option_value'] . '</code>)</p>';
				$table_counter ++;
			}


			if ( isset( $setting_api_cal['cbcurrencyconverter_enabledcurrencies_calculator'] ) && $setting_api_cal['cbcurrencyconverter_enabledcurrencies_calculator'] != null ) {
				$cbcurrencyconverter_currency_list = CBCurrencyConverterHelper::getCurrencyList();

				foreach ( $cal_from_to_list_currency as $key => $value ) {
					if ( ! in_array( $key, $setting_api_cal['cbcurrencyconverter_enabledcurrencies_calculator'] ) ) {
						unset( $cal_from_to_list_currency[ $key ] );
					}
				}
			}


			foreach ( $cbcurrencyconverter_currency_list as $key => $value ) {
				$cbcurrencyconverter_currency_list[ $key ] = $value . ' - ' . $key . '';
			}

			foreach ( $cal_from_to_list_currency as $key => $value ) {
				$cal_from_to_list_currencyp[ $key ] = $value . ' - ' . $key;
			}

			foreach ( $cal_from_to_list_currency as $key => $value ) {
				$cal_from_to_list_currency[ $key ] = $value . ' - ' . $key;
			}

			$cbcurrencyconverter_tocurrency_list              = array( 'GBP', 'CAD', 'AUD' );
			$cbcurrencyconverter_enabledcurrencies_calculator = array( 'USD', 'GBP', 'CAD', 'AUD' );

			$cbcurrencyconverter_global_settings = array(

				'apikey'                            => array(
					'name'    => 'apikey',
					'label'   => esc_html__( 'Api Key', 'cbcurrencyconverter' ),
					'desc'    => __( 'We privide a default api key but please use(<strong>highly recommended</strong>) your own api key for better performance. <a href="https://www.alphavantage.co/support/#api-key" target="_blank">To claim your key visit the url</a>, it\'s <strong>free</strong>', 'cbcurrencyconverter' ),
					'type'    => 'text',
					'default' => '2WJ4BTFMAH6SCZVC',
				),
				'cbcurrencyconverter_defaultlayout' => array(
					'name'    => 'cbcurrencyconverter_defaultlayout',
					'label'   => esc_html__( 'Layout', 'cbcurrencyconverter' ),
					'desc'    => esc_html__( 'Select layout', 'cbcurrencyconverter' ),
					'type'    => 'select',
					'default' => 'cal',
					'options' => array(
						'cal'               => esc_html__( 'Calculator', 'cbcurrencyconverter' ),
						'list'              => esc_html__( 'List', 'cbcurrencyconverter' ),
						'calwithlistbottom' => esc_html__( 'Calculator with List at bottom', 'cbcurrencyconverter' ),
						'calwithlisttop'    => esc_html__( 'Calculator with List at top', 'cbcurrencyconverter' )
					)
				),
				'cbcurrencyconverter_decimalpoint'  => array(
					'name'    => 'cbcurrencyconverter_decimalpoint',
					'label'   => esc_html__( 'Decimal Point', 'cbcurrencyconverter' ),
					'desc'    => esc_html__( 'decimal point position', 'cbcurrencyconverter' ),
					'type'    => 'number',
					'default' => '2'

				)
			);

			$cbcurrencyconverter_calculator_settings = array(
				'cbcurrencyconverter_enabledcurrencies_calculator' => array(
					'name'    => 'cbcurrencyconverter_enabledcurrencies_calculator',
					'label'   => esc_html__( 'Enable Currencies', 'cbcurrencyconverter' ),
					'desc'    => esc_html__( 'Currency list to convert and show in Calculator Dropdown', 'cbcurrencyconverter' ),
					'type'    => 'multiselect',
					'default' => $cbcurrencyconverter_enabledcurrencies_calculator,
					'options' => $cbcurrencyconverter_currency_list
				),
				'cbcurrencyconverter_fromcurrency'                 => array(
					'name'    => 'cbcurrencyconverter_fromcurrency',
					'label'   => esc_html__( 'From', 'cbcurrencyconverter' ),
					'desc'    => esc_html__( 'What Will Be Your Default  Currency To Convert From', 'cbcurrencyconverter' ),
					'type'    => 'select',
					'default' => 'USD',
					'options' => $cal_from_to_list_currency
				),
				'cbcurrencyconverter_tocurrency'                   => array(
					'name'    => 'cbcurrencyconverter_tocurrency',
					'label'   => esc_html__( 'To', 'cbcurrencyconverter' ),
					'desc'    => esc_html__( 'What Will Be Your Default To  Currency', 'cbcurrencyconverter' ),
					'type'    => 'select',
					'default' => 'CAD',
					'options' => $cal_from_to_list_currency
				),
				'cbcurrencyconverter_defaultamount_for_calculator' => array(
					'name'    => 'cbcurrencyconverter_defaultamount_for_calculator',
					'label'   => esc_html__( 'Default Amount', 'cbcurrencyconverter' ),
					'desc'    => esc_html__( 'What Will Be Your Default Amount of Currency For Calculating', 'cbcurrencyconverter' ),
					'type'    => 'number',
					'default' => '1'

				),

				'cbcurrencyconverter_title_cal' => array(
					'name'    => 'cbcurrencyconverter_title_cal',
					'label'   => esc_html__( 'Currency Calculator', 'cbcurrencyconverter' ),
					'desc'    => esc_html__( 'Title to show in calculator', 'cbcurrencyconverter' ),
					'type'    => 'text',
					'default' => esc_html__( 'Currency Calculator', 'cbcurrencyconverter' ),
				),
			);

			$cbcurrencyconverter_tools = array(
				'cbcurrencyconverter_delete_options' => array(
					'name'    => 'cbcurrencyconverter_delete_options',
					'label'   => esc_html__( 'Remove Data on Uninstall?', 'cbcurrencyconverter' ),
					'desc'    => __( 'Check this box if you would like <strong>CBX Currency Converter</strong> to completely remove all of its data when the plugin is deleted.', 'cbcurrencyconverter' ),
					'type'    => 'checkbox',
					'default' => '',

				),
				'reset_data'                         => array(
					'name'     => 'reset_data',
					'label'    => esc_html__( 'Reset all data', 'cbcurrencyconverter' ),
					'desc'     => sprintf( __( 'Reset option values created by this plugin. 
<a class="button button-primary" onclick="return confirm(\'%s\')" href="%s">Reset Data</a>', 'cbcurrencyconverter' ), esc_html__( 'Are you sure to reset all data, this process can not be undone?', 'cbcurrencyconverter' ), $reset_data_link ) . $table_html,
					'type'     => 'html',
					'default'  => 'off',
					'desc_tip' => true,
				)
			);

			$cbcurrencyconverter_list_settings = array(
				array(
					'name'    => 'cbcurrencyconverter_defaultcurrency_list',
					'label'   => esc_html__( 'From Currency', 'cbcurrencyconverter' ),
					'desc'    => esc_html__( 'What Will Be Your Default Currency For Listing', 'cbcurrencyconverter' ),
					'type'    => 'select',
					'default' => 'USD',
					'options' => $cbcurrencyconverter_currency_list
				),
				array(
					'name'    => 'cbcurrencyconverter_tocurrency_list',
					'label'   => esc_html__( 'To Currency', 'cbcurrencyconverter' ),
					'desc'    => esc_html__( 'Currency list to convert and show in listing', 'cbcurrencyconverter' ),
					'type'    => 'multiselect',
					'default' => $cbcurrencyconverter_tocurrency_list,
					'options' => $cbcurrencyconverter_currency_list
				),
				array(
					'name'    => 'cbcurrencyconverter_defaultamount_forlist',
					'label'   => esc_html__( 'Default Amount', 'cbcurrencyconverter' ),
					'desc'    => esc_html__( 'Default amount for listing', 'cbcurrencyconverter' ),
					'type'    => 'number',
					'default' => 1,
				),
				array(
					'name'    => 'cbcurrencyconverter_decimalpoint',
					'label'   => esc_html__( 'Decimal Point', 'cbcurrencyconverter' ),
					'desc'    => esc_html__( 'decimal point position', 'cbcurrencyconverter' ),
					'type'    => 'number',
					'default' => '2',

				),
				array(
					'name'    => 'cbcurrencyconverter_title_list',
					'label'   => esc_html__( 'Title', 'cbcurrencyconverter' ),
					'desc'    => esc_html__( 'Title to  show in listing', 'cbcurrencyconverter' ),
					'type'    => 'text',
					'default' => esc_html__( 'List of Currency', 'cbcurrencyconverter' ),
				),
			);

			$fields = array(
				'cbcurrencyconverter_global_settings'     => $cbcurrencyconverter_global_settings,
				'cbcurrencyconverter_calculator_settings' => $cbcurrencyconverter_calculator_settings,
				'cbcurrencyconverter_list_settings'       => $cbcurrencyconverter_list_settings,
				'cbcurrencyconverter_tools'               => $cbcurrencyconverter_tools,
			);

			return apply_filters( 'cbcurrencyconverter_fields', $fields );
		}

		/**
		 * Full plugin reset and redirect
		 */
		public function plugin_fullreset() {
			global $wpdb;

			$option_prefix = 'cbcurrencyconverter_';

			$option_values = CBCurrencyConverterHelper::getAllOptionNames();

			foreach ( $option_values as $key => $accounting_option_value ) {
				delete_option( $accounting_option_value['option_name'] );
			}

			do_action( 'cbcurrencyconverter_plugin_option_delete' );


			// create plugin's core table tables
			activate_cbcurrencyconverter();

			//please note that, the default options will be created by default

			//3rd party plugin's table creation
			do_action( 'cbcurrencyconverter_plugin_reset', $option_prefix );


			$this->settings_api->set_sections( $this->get_settings_sections() );
			$this->settings_api->set_fields( $this->get_settings_fields() );
			$this->settings_api->admin_init();

			wp_safe_redirect( admin_url( 'options-general.php?page=cbcurrencyconverter#cbcurrencyconverter_tools' ) );
			exit();
		}


		/**
		 * @param array $links Default settings links
		 *
		 * @return array
		 */
		public function cbcurrencyconverter_action_links( $links ) {

			$new_links['settings'] = '<a href="' . admin_url( 'options-general.php?page=cbcurrencyconverter' ) . '">' . esc_html__( 'Settings', 'cbcurrencyconverter' ) . '</a>';

			return array_merge( $new_links, $links );

		}

	}
