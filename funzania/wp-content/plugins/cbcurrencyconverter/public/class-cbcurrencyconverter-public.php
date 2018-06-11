<?php
	// If this file is called directly, abort.
	if ( ! defined( 'WPINC' ) ) {
		die;
	}

	/**
	 * The public-facing functionality of the plugin.
	 *
	 * @link       http://codeboxr.com
	 * @since      1.0.0
	 *
	 * @package    Cbcurrencyconverter
	 * @subpackage Cbcurrencyconverter/public
	 */

	/**
	 * The public-facing functionality of the plugin.
	 *
	 * Defines the plugin name, version, and two examples hooks for how to
	 * enqueue the admin-specific stylesheet and JavaScript.
	 *
	 * @package    Cbcurrencyconverter
	 * @subpackage Cbcurrencyconverter/public
	 * @author     codeboxr <info@codeboxr.com>
	 */
	class CBCurrencyConverter_Public {

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

		/**
		 * Initialize the class and set its properties.
		 *
		 * @since    1.0.0
		 *
		 * @param      string $plugin_name The name of the plugin.
		 * @param      string $version     The version of this plugin.
		 */
		public function __construct( $plugin_name, $version ) {

			$this->plugin_name = $plugin_name;
			$this->version     = $version;

		}

		public function cbcurrencyconverter_init() {

			do_action( 'cbcurrencyconverter_public', $this );
		}

		/**
		 * Register the stylesheets for the public-facing side of the site.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_styles() {
			wp_register_style( 'chosen.min', plugin_dir_url( __FILE__ ) . '../admin/css/chosen.min.css', array() );
			wp_register_style( 'cbcurrencyconverter-public', plugin_dir_url( __FILE__ ) . 'css/cbcurrencyconverter-public.css', array( 'chosen.min' ), $this->version, 'all' );

			wp_enqueue_style( 'chosen.min' );
			wp_enqueue_style( 'cbcurrencyconverter-public' );

		}

		/**
		 * Register the JavaScript for the public-facing side of the site.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_scripts() {

			$ajax_nonce = wp_create_nonce( "cbcurrencyconverter_nonce" );
			wp_register_script( 'chosen.jquery.min', plugin_dir_url( __FILE__ ) . '../admin/js/chosen.jquery.min.js', array( 'jquery' ) );
			wp_register_script( 'cbcurrencyconverter-public', plugin_dir_url( __FILE__ ) . 'js/cbcurrencyconverter-public.js', array(
				'chosen.jquery.min',
				'jquery'
			), $this->version, true );

			wp_localize_script( 'cbcurrencyconverter-public', 'cbcurrencyconverter', array(
				'ajaxurl'         => admin_url( 'admin-ajax.php' ),
				'nonce'           => $ajax_nonce,
				'empty_selection' => esc_html__( 'Please choose from or to currency properly', 'cbcurrencyconverter' ),
				'same_selection'  => esc_html__( 'From and to currency both are same!', 'cbcurrencyconverter' ),
			) );

			wp_enqueue_script( 'chosen.jquery.min' );
			wp_enqueue_script( 'cbcurrencyconverter-public' );

		}


		/**
		 * @return string
		 */
		public function cbcurrencyconverter_shortcode( $atts ) {

			$instance = array();

			$setting_api      = get_option( 'cbcurrencyconverter_global_settings' );
			$setting_api_list = get_option( 'cbcurrencyconverter_list_settings' );
			$setting_api_cal  = get_option( 'cbcurrencyconverter_calculator_settings' );


			//general setting
			$layout       = ( isset( $setting_api['cbcurrencyconverter_defaultlayout'] ) ) ? $setting_api['cbcurrencyconverter_defaultlayout'] : 'cal';
			$decimalpoint = ( isset( $setting_api['cbcurrencyconverter_decimalpoint'] ) ) ? $setting_api['cbcurrencyconverter_decimalpoint'] : 2;


			//list setting
			$list_title          = ( isset( $setting_api_list['cbcurrencyconverter_title_list'] ) ) ? $setting_api_list['cbcurrencyconverter_title_list'] : esc_html__( 'List of Currency', 'cbcurrencyconverter' ); //list title
			$list_from_currency  = ( isset( $setting_api_list['cbcurrencyconverter_defaultcurrency_list'] ) ) ? $setting_api_list['cbcurrencyconverter_defaultcurrency_list'] : 'USD'; //we need to set something as default currency to make the list work
			$list_to_currency    = ( isset( $setting_api_list['cbcurrencyconverter_tocurrency_list'] ) ) ? $setting_api_list['cbcurrencyconverter_tocurrency_list'] : array(
				'GBP',
				'CAD',
				'AUD'
			); //list of currency
			$list_default_amount = ( isset( $setting_api_list['cbcurrencyconverter_defaultamount_forlist'] ) ) ? $setting_api_list['cbcurrencyconverter_defaultamount_forlist'] : 1; //default amount


			//calculator setting
			$calc_title          = ( isset( $setting_api_cal['cbcurrencyconverter_title_cal'] ) ) ? $setting_api_cal['cbcurrencyconverter_title_cal'] : esc_html__( 'Currency Calculator', 'cbcurrencyconverter' );
			$calc_from_currency  = ( isset( $setting_api_cal['cbcurrencyconverter_fromcurrency'] ) ) ? $setting_api_cal['cbcurrencyconverter_fromcurrency'] : 'USD';
			$calc_to_currency    = ( isset( $setting_api_cal['cbcurrencyconverter_tocurrency'] ) ) ? $setting_api_cal['cbcurrencyconverter_tocurrency'] : 'CAD';
			$calc_default_amount = ( isset( $setting_api_cal['cbcurrencyconverter_defaultamount_for_calculator'] ) ) ? $setting_api_cal['cbcurrencyconverter_defaultamount_for_calculator'] : 1;
			//$calc_currencies           = (isset($setting_api_cal['cbcurrencyconverter_enabledcurrencies_calculator'])) ? $setting_api_cal['cbcurrencyconverter_enabledcurrencies_calculator'] : array_keys(CBCurrencyConverterHelper::getCurrencyList());
			$calc_currencies = ( isset( $setting_api_cal['cbcurrencyconverter_enabledcurrencies_calculator'] ) ) ? $setting_api_cal['cbcurrencyconverter_enabledcurrencies_calculator'] : array(
				'USD',
				'GBP',
				'CAD',
				'AUD'
			);


			$instance = shortcode_atts( array(
				'layout'              => $layout,
				//cal, list, calwithlisttop, calwithlistbottom
				'decimalpoint'        => $decimalpoint,
				//this is common for cal and list both
				'calc_currencies'     => implode( ',', $calc_currencies ),
				//list of currency, comma separated user input, example USD,GBP
				'calc_title'          => $calc_title,
				//string any title
				'calc_from_currency'  => $calc_from_currency,
				//example USD
				'calc_to_currency'    => $calc_to_currency,
				//example GBP
				'calc_default_amount' => $calc_default_amount,
				//numeric value
				'list_title'          => $list_title,
				// string
				'list_from_currency'  => $list_from_currency,
				//USD
				'list_to_currency'    => implode( ',', $list_to_currency ),
				//comma separated, example  GBP,BDT
				'list_default_amount' => $list_default_amount,
				//numeric value

			), $atts );

			$instance['calc_currencies']  = explode( ',', $instance['calc_currencies'] );
			$instance['list_to_currency'] = explode( ',', $instance['list_to_currency'] );


			extract( $instance );

			if ( $layout == 'list' ) {
				return CBCurrencyConverterHelper::cbxcclistview( 'shortcode', $instance );
			} elseif ( $layout == 'cal' ) {
				return CBCurrencyConverterHelper::cbxcccalcview( 'shortcode', $instance );
			} elseif ( $layout == 'calwithlistbottom' ) {
				return CBCurrencyConverterHelper::cbxcccalcview( 'shortcode', $instance ) . cbxcclistview( 'shortcode', $instance );
			} elseif ( $layout == 'calwithlisttop' ) {
				return CBCurrencyConverterHelper::cbxcclistview( 'shortcode', $instance ) . cbxcccalcview( 'shortcode', $instance );
			}

		}//end method codeboxrcurrencyconverter_shortcode


		/**
		 * Google finannce method for showing the converstion value
		 *
		 * @param     $convertion_value
		 * @param     $price
		 * @param     $convertfrom
		 * @param     $convertto
		 * @param int $decimalpoint
		 *
		 * @return  rating value
		 */
		/*public function cbxconvertcurrency_method_google( $convertion_value, $price, $convertfrom, $convertto, $decimalpoint = 2 ) {
			$ch = curl_init();

			curl_setopt( $ch, CURLOPT_URL, "https://www.google.com/finance/converter?a=" . $price . "&from=" . $convertfrom . "&to=" . $convertto . " " );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt( $ch, CURLOPT_HEADER, 0 );
			curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
			$output = curl_exec( $ch );

			curl_close( $ch );

			$data = explode( '<div id=currency_converter_result>', $output );

			$data2 = explode( '<div id=currency_converter_result>', $data['1'] );

			$data3 = explode( '<span class=bld>', $data2['0'] );

			if ( array_key_exists( '1', $data3 ) ) {
				$data4            = explode( '</span>', $data3['1'] );
				$data5            = explode( ' ', $data4['0'] );
				$convertion_value = number_format_i18n( $data5[0], $decimalpoint );
			}

			return $convertion_value;
		}*/


		/**
		 * Yahoo finannce method for showing the converstion value
		 *
		 * @param     $convertion_value
		 * @param     $price
		 * @param     $convertfrom
		 * @param     $convertto
		 * @param int $decimalpoint
		 *
		 * @return  rating value
		 */
		/*public function cbxconvertcurrency_method_yahoo( $convertion_value, $price, $convertfrom, $convertto, $decimalpoint = 2 ) {


			$url = 'http://download.finance.yahoo.com/d/quotes.csv?s=' . urlencode( $convertfrom ) . urlencode( $convertto ) . '=X&f=nl1d1t1';
			$ch  = curl_init();

			curl_setopt( $ch, CURLOPT_URL, $url );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt( $ch, CURLOPT_HEADER, 0 );
			curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
			$body = curl_exec( $ch );

			curl_close( $ch );

			$ta               = explode( ',', $body );
			$ta               = ( is_array( $ta ) && isset( $ta[1] ) ) ? number_format_i18n( $ta[1] ) : 0;
			$convertion_value = $ta * $price;

			return $convertion_value;
		}*/

		/**
		 * alphavantage.con finance api method for showing the converstion value
		 *
		 * @param     $convertion_value
		 * @param     $price
		 * @param     $convertfrom
		 * @param     $convertto
		 * @param int $decimalpoint
		 *
		 * @return  rating value
		 */
		public function cbxconvertcurrency_method_alphavantage( $convertion_value, $price, $convertfrom, $convertto, $decimalpoint = 2 ) {
			// Get any existing copy of our transient data
			if ( false === ( $convertion_cache = get_transient( 'cbcurrencyconverter_alphavantage' ) ) ) {
				$convertion_cache                                    = array();
				$convertion_value                                    = $this->alphavantage_api_get( $convertfrom, $convertto );
				$convertion_cache[ $convertfrom . '-' . $convertto ] = $convertion_value;
				$convertion_cache                                    = maybe_serialize( $convertion_cache );

				//https://codex.wordpress.org/Transients_API
				set_transient( 'cbcurrencyconverter_alphavantage', $convertion_cache, 2 * HOUR_IN_SECONDS );

				return number_format_i18n( ( $convertion_value * $price ), $decimalpoint );
			}

			$convertion_cache = maybe_unserialize( $convertion_cache );
			if ( isset( $convertion_cache[ $convertfrom . '-' . $convertto ] ) ) {
				$convertion_value = $convertion_cache[ $convertfrom . '-' . $convertto ];
			} else {
				$convertion_value                                    = $this->alphavantage_api_get( $convertfrom, $convertto );
				$convertion_cache[ $convertfrom . '-' . $convertto ] = $convertion_value;
				$convertion_cache                                    = maybe_serialize( $convertion_cache );

				//https://codex.wordpress.org/Transients_API
				set_transient( 'cbcurrencyconverter_alphavantage', $convertion_cache, 2 * HOUR_IN_SECONDS );
			}

			return number_format_i18n( ( $convertion_value * $price ), $decimalpoint );


		}

		/**
		 * api request to alphavantage
		 *
		 * @param $convertfrom
		 * @param $convertto
		 *
		 * @return int
		 */
		public function alphavantage_api_get( $convertfrom, $convertto ) {
			// It wasn't there, so regenerate the data and save the transient
			$setting_api = get_option( 'cbcurrencyconverter_global_settings' );
			$api_key     = ( isset( $setting_api['apikey'] ) && $setting_api['apikey'] != '' ) ? $setting_api['apikey'] : '2WJ4BTFMAH6SCZVC';

			$url = 'https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency=' . urlencode( $convertfrom ) . '&to_currency=' . urlencode( $convertto ) . '&apikey=' . $api_key;
			$ch  = curl_init();

			curl_setopt( $ch, CURLOPT_URL, $url );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt( $ch, CURLOPT_HEADER, 0 );
			curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
			$body = curl_exec( $ch );

			curl_close( $ch );

			$result = json_decode( $body, true );
			$result = array_values( $result );

			if(is_array($result[0])){
				$result = array_values( $result[0] );
				$from_currency = $result[0];
				$to_currency   = $result[1];
				$value         = $result[4];
				return $value;
			}

			return 0;


		}

		/**
		 * Convert Currency ajax based main method
		 *
		 * @param     $price
		 * @param     $convertfrom
		 * @param     $convertto
		 * @param int $decimalpoint
		 *
		 * @return string
		 */
		public function cbxconvertcurrency( $price, $convertfrom, $convertto, $decimalpoint = 2 ) {

			$convertion_value = '';

			$convertion_value = apply_filters( 'cbxcc_convertion_method', $convertion_value, $price, $convertfrom, $convertto, $decimalpoint );

			return $convertion_value;

		}

		/**
		 * cbcurrencyconverter_ajax_cur_convert
		 */
		public function cbcurrencyconverter_ajax_cur_convert() {

			//security check
			if ( ! wp_verify_nonce( $_POST['cbcurrencyconverter_data']['nonce'], 'cbcurrencyconverter_nonce' ) ) {
				die( 'Security check' );
			}

			$cbcurrencyconverter_cur_data = $_POST['cbcurrencyconverter_data'];

			if ( $cbcurrencyconverter_cur_data['cbcurconvert_error'] == '' ) {
				$cbcurrencyconverter_result_cur = $this->cbxconvertcurrency( $cbcurrencyconverter_cur_data['cbcurconvert_amount'], $cbcurrencyconverter_cur_data['cbcurconvert_from'], $cbcurrencyconverter_cur_data['cbcurconvert_to'], $cbcurrencyconverter_cur_data['decimal'] );
			} else {
				$cbcurrencyconverter_result_cur = $cbcurrencyconverter_cur_data['cbcurconvert_error'];
			}
			echo( json_encode( $cbcurrencyconverter_result_cur ) );
			die();
		}

		/**
		 * Registering Widgets
		 */
		public function register_widgets() {
			register_widget( 'CbCurrencyConverterWidget' );
		}

	}
