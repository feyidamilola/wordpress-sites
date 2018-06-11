<?php
/**
 * H-Code Padding Settings For All Shortcode In VC.
 *
 * @package H-Code
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Brando Desktop Padding */
/*-----------------------------------------------------------------------------------*/

vc_add_shortcode_param( 'brando_custom_desktop_padding', 'brando_custom_desktop_padding_callback', BRANDO_ADDONS_ROOT_DIR . '/brando-shortcodes/js/custom.js' );
if ( ! function_exists( 'brando_custom_desktop_padding_callback' ) ) :
  function brando_custom_desktop_padding_callback( $settings, $value ) {

     $output = '';

     $brando_desktop_padding =array(
          __('Select Padding', 'brando-addons') => '',
          __('No Padding', 'brando-addons') => 'no-padding',
          __('No Padding Top', 'brando-addons') => 'no-padding-top',
          __('No Padding Bottom', 'brando-addons') => 'no-padding-bottom',
          __('No Padding Left', 'brando-addons') => 'no-padding-left',
          __('No Padding Right', 'brando-addons') => 'no-padding-right',
          __('No Padding Top Bottom', 'brando-addons') => 'no-padding-tb',
          __('No Padding Left Right', 'brando-addons') => 'no-padding-lr',
          __('Padding One All', 'brando-addons') => 'padding-one-all',
          __('Padding Two All', 'brando-addons') => 'padding-two-all',
          __('Padding Three All', 'brando-addons') => 'padding-three-all',
          __('Padding Four All', 'brando-addons') => 'padding-four-all',
          __('Padding Five All', 'brando-addons') => 'padding-five-all',
          __('Padding Six All', 'brando-addons') => 'padding-six-all',
          __('Padding Seven All', 'brando-addons') => 'padding-seven-all',
          __('Padding Eight All', 'brando-addons') => 'padding-eight-all',
          __('Padding Nine All', 'brando-addons') => 'padding-nine-all',
          __('Padding Ten All', 'brando-addons') => 'padding-ten-all',
          __('Padding Eleven All', 'brando-addons') => 'padding-eleven-all',
          __('Padding Twelve All', 'brando-addons') => 'padding-twelve-all',
          __('Padding Thirteen All', 'brando-addons') => 'padding-thirteen-all',
          __('Padding Fourteen All', 'brando-addons') => 'padding-fourteen-all',
          __('Padding Fifteen All','brando-addons') => 'padding-fifteen-all',
          __('Padding Sixteen All','brando-addons') => 'padding-sixteen-all',
          __('Padding Seventeen All','brando-addons') => 'padding-seventeen-all',
          __('Padding Eighteen All','brando-addons') => 'padding-eighteen-all',
          __('Padding One Top', 'brando-addons') => 'padding-one-top',
          __('Padding Two Top', 'brando-addons') => 'padding-two-top',
          __('Padding Three Top', 'brando-addons') => 'padding-three-top',
          __('Padding Four Top', 'brando-addons') => 'padding-four-top',
          __('Padding Five Top', 'brando-addons') => 'padding-five-top',
          __('Padding Six Top', 'brando-addons') => 'padding-six-top',
          __('Padding Seven Top', 'brando-addons') => 'padding-seven-top',
          __('Padding Eight Top', 'brando-addons') => 'padding-eight-top',
          __('Padding Nine Top', 'brando-addons') => 'padding-nine-top',
          __('Padding Ten Top', 'brando-addons') => 'padding-ten-top',
          __('Padding Eleven Top', 'brando-addons') => 'padding-eleven-top',
          __('Padding Twelve Top', 'brando-addons') => 'padding-twelve-top',
          __('Padding Thirteen Top', 'brando-addons') => 'padding-thirteen-top',
          __('Padding One Bottom', 'brando-addons') => 'padding-one-bottom',
          __('Padding Two Bottom', 'brando-addons') => 'padding-two-bottom',
          __('Padding Three Bottom', 'brando-addons') => 'padding-three-bottom',
          __('Padding Four Bottom', 'brando-addons') => 'padding-four-bottom',
          __('Padding Five Bottom', 'brando-addons') => 'padding-five-bottom',
          __('Padding Six Bottom', 'brando-addons') => 'padding-six-bottom',
          __('Padding Seven Bottom', 'brando-addons') => 'padding-seven-bottom',
          __('Padding Eight Bottom', 'brando-addons') => 'padding-eight-bottom',
          __('Padding Nine Bottom', 'brando-addons') => 'padding-nine-bottom',
          __('Padding Ten Bottom', 'brando-addons') => 'padding-ten-bottom',
          __('Padding Eleven Bottom', 'brando-addons') => 'padding-eleven-bottom',
          __('Padding Twelve Bottom', 'brando-addons') => 'padding-twelve-bottom',
          __('Padding Thirteen Bottom', 'brando-addons') => 'padding-thirteen-bottom',
          __('Padding One Left', 'brando-addons') => 'padding-one-left',
          __('Padding Two Left', 'brando-addons') => 'padding-two-left',
          __('Padding Three Left', 'brando-addons') => 'padding-three-left',
          __('Padding Four Left', 'brando-addons') => 'padding-four-left',
          __('Padding Five Left', 'brando-addons') => 'padding-five-left',
          __('Padding Six Left', 'brando-addons') => 'padding-six-left',
          __('Padding Seven Left', 'brando-addons') => 'padding-seven-left',
          __('Padding Eight Left', 'brando-addons') => 'padding-eight-left',
          __('Padding Nine Left', 'brando-addons') => 'padding-nine-left',
          __('Padding Ten Left', 'brando-addons') => 'padding-ten-left',
          __('Padding Eleven Left', 'brando-addons') => 'padding-eleven-left',
          __('Padding Twelve Left', 'brando-addons') => 'padding-twelve-left',
          __('Padding Thirteen Left', 'brando-addons') => 'padding-thirteen-left',
          __('Padding One Right', 'brando-addons') => 'padding-one-right',
          __('Padding Two Right', 'brando-addons') => 'padding-two-right',
          __('Padding Three Right', 'brando-addons') => 'padding-three-right',
          __('Padding Four Right', 'brando-addons') => 'padding-four-right',
          __('Padding Five Right', 'brando-addons') => 'padding-five-right',
          __('Padding Six Right', 'brando-addons') => 'padding-six-right',
          __('Padding Seven Right', 'brando-addons') => 'padding-seven-right',
          __('Padding Eight Right', 'brando-addons') => 'padding-eight-right',
          __('Padding Nine Right', 'brando-addons') => 'padding-nine-right',
          __('Padding Ten Right', 'brando-addons') => 'padding-ten-right',
          __('Padding Eleven Right', 'brando-addons') => 'padding-eleven-right',
          __('Padding Twelve Right', 'brando-addons') => 'padding-twelve-right',
          __('Padding Thirteen Right', 'brando-addons') => 'padding-thirteen-right',
          __('Padding One Top Bottom', 'brando-addons') => 'padding-one-tb',
          __('Padding Two Top Bottom', 'brando-addons') => 'padding-two-tb',
          __('Padding Three Top Bottom', 'brando-addons') => 'padding-three-tb',
          __('Padding Four Top Bottom', 'brando-addons') => 'padding-four-tb',
          __('Padding Five Top Bottom', 'brando-addons') => 'padding-five-tb',
          __('Padding Six Top Bottom', 'brando-addons') => 'padding-six-tb',
          __('Padding Seven Top Bottom', 'brando-addons') => 'padding-seven-tb',
          __('Padding Eight Top Bottom', 'brando-addons') => 'padding-eight-tb',
          __('Padding Nine Top Bottom', 'brando-addons') => 'padding-nine-tb',
          __('Padding Ten Top Bottom', 'brando-addons') => 'padding-ten-tb',
          __('Padding Eleven Top Bottom', 'brando-addons') => 'padding-eleven-tb',
          __('Padding Twelve Top Bottom', 'brando-addons') => 'padding-twelve-tb',
          __('Padding Thirteen Top Bottom', 'brando-addons') => 'padding-thirteen-tb',
          __('Padding One Left Right', 'brando-addons') => 'padding-one-lr',
          __('Padding Two Left Right', 'brando-addons') => 'padding-two-lr',
          __('Padding Three Left Right', 'brando-addons') => 'padding-three-lr',
          __('Padding Four Left Right', 'brando-addons') => 'padding-four-lr',
          __('Padding Five Left Right', 'brando-addons') => 'padding-five-lr',
          __('Padding Six Left Right', 'brando-addons') => 'padding-six-lr',
          __('Padding seven Left Right', 'brando-addons') => 'padding-seven-lr',
          __('Padding eight Left Right', 'brando-addons') => 'padding-eight-lr',
          __('Padding Nine Left Right', 'brando-addons') => 'padding-nine-lr',
          __('Padding Ten Left Right', 'brando-addons') => 'padding-ten-lr',
          __('Padding Eleven Left Right', 'brando-addons') => 'padding-eleven-lr',
          __('Padding Twelve Left Right', 'brando-addons') => 'padding-twelve-lr',
          __('Padding Thirteen Left Right', 'brando-addons') => 'padding-thirteen-lr',
          __('Padding 110px 90px', 'brando-addons') => 'padding-110px-90px',
          __('Padding Top Bottom 110px', 'brando-addons') => 'padding-110px-tb',
          __('Padding Top 15px', 'brando-addons') => 'padding-top-15px',
          __('Padding Bottom 15px', 'brando-addons') => 'padding-bottom-15px',
          __('Padding Left Right 15px', 'brando-addons') => 'padding-lr-15px',
          __('Padding Top 100px Bottom 0px', 'brando-addons') => 'padding-top-100px-bottom-0px',
          __('Custom', 'brando-addons') => 'custom-desktop-padding',
     );

      $output .= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value brando-desktop-custom-select-value wpb-textinput ' .
               esc_attr( $settings['param_name'] ) . ' ' .
               esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';

      $output .= '<select name="'. $settings['param_name']. '-custom" class="brando-desktop-custom-select wpb_vc_param_value wpb-input wpb-select '. $settings['param_name']
                 . ' ' . $settings['type']
                 . '">';
      foreach ( $brando_desktop_padding as $index => $data ) {
        $output .= '<option class="" value="' . $data . '" title="'.$index.'">'.$index.'</option>';
      }
      $output .= '</select>';

    return $output;
  }
endif;


/*-----------------------------------------------------------------------------------*/
/* Brando Mini Desktop Padding */
/*-----------------------------------------------------------------------------------*/

vc_add_shortcode_param( 'brando_custom_mini_desktop_padding', 'brando_custom_mini_desktop_padding_callback', BRANDO_ADDONS_ROOT_DIR . '/brando-shortcodes/js/custom.js' );
if ( ! function_exists( 'brando_custom_mini_desktop_padding_callback' ) ) :
  function brando_custom_mini_desktop_padding_callback( $settings, $value ) {

     $output = '';

     $brando_desktop_mini_padding =array(
          __('Select Padding', 'brando-addons') => '',
          __('No Padding', 'brando-addons') => 'md-no-padding',
          __('No Padding Top', 'brando-addons') => 'md-no-padding-top',
          __('No Padding Bottom', 'brando-addons') => 'md-no-padding-bottom',
          __('No Padding Left', 'brando-addons') => 'md-no-padding-left',
          __('No Padding Right', 'brando-addons') => 'md-no-padding-right',
          __('No Padding Top Bottom', 'brando-addons') => 'md-no-padding-tb',
          __('No Padding Left Right', 'brando-addons') => 'md-no-padding-lr',
          __('Padding One All', 'brando-addons') => 'md-padding-one-all',
          __('Padding Two All', 'brando-addons') => 'md-padding-two-all',
          __('Padding Three All', 'brando-addons') => 'md-padding-three-all',
          __('Padding Four All', 'brando-addons') => 'md-padding-four-all',
          __('Padding Five All', 'brando-addons') => 'md-padding-five-all',
          __('Padding Six All', 'brando-addons') => 'md-padding-six-all',
          __('Padding Seven All', 'brando-addons') => 'md-padding-seven-all',
          __('Padding Eight All', 'brando-addons') => 'md-padding-eight-all',
          __('Padding Nine All', 'brando-addons') => 'md-padding-nine-all',
          __('Padding Ten All', 'brando-addons') => 'md-padding-ten-all',
          __('Padding Eleven All', 'brando-addons') => 'md-padding-eleven-all',
          __('Padding Twelve All', 'brando-addons') => 'md-padding-twelve-all',
          __('Padding Thirteen All', 'brando-addons') => 'md-padding-thirteen-all',
          __('Padding Fourteen All', 'brando-addons') => 'md-padding-fourteen-all',
          __('Padding Fifteen All','brando-addons') => 'md-padding-fifteen-all',
          __('Padding Sixteen All','brando-addons') => 'md-padding-sixteen-all',
          __('Padding Seventeen All','brando-addons') => 'md-padding-seventeen-all',
          __('Padding Eighteen All','brando-addons') => 'md-padding-eighteen-all',
          __('Padding One Top', 'brando-addons') => 'md-padding-one-top',
          __('Padding Two Top', 'brando-addons') => 'md-padding-two-top',
          __('Padding Three Top', 'brando-addons') => 'md-padding-three-top',
          __('Padding Four Top', 'brando-addons') => 'md-padding-four-top',
          __('Padding Five Top', 'brando-addons') => 'md-padding-five-top',
          __('Padding Six Top', 'brando-addons') => 'md-padding-six-top',
          __('Padding Seven Top', 'brando-addons') => 'md-padding-seven-top',
          __('Padding Eight Top', 'brando-addons') => 'md-padding-eight-top',
          __('Padding Nine Top', 'brando-addons') => 'md-padding-nine-top',
          __('Padding Ten Top', 'brando-addons') => 'md-padding-ten-top',
          __('Padding Eleven Top', 'brando-addons') => 'md-padding-eleven-top',
          __('Padding Twelve Top', 'brando-addons') => 'md-padding-twelve-top',
          __('Padding Thirteen Top', 'brando-addons') => 'md-padding-thirteen-top',
          __('Padding One Bottom', 'brando-addons') => 'md-padding-one-bottom',
          __('Padding Two Bottom', 'brando-addons') => 'md-padding-two-bottom',
          __('Padding Three Bottom', 'brando-addons') => 'md-padding-three-bottom',
          __('Padding Four Bottom', 'brando-addons') => 'md-padding-four-bottom',
          __('Padding Five Bottom', 'brando-addons') => 'md-padding-five-bottom',
          __('Padding Six Bottom', 'brando-addons') => 'md-padding-six-bottom',
          __('Padding Seven Bottom', 'brando-addons') => 'md-padding-seven-bottom',
          __('Padding Eight Bottom', 'brando-addons') => 'md-padding-eight-bottom',
          __('Padding Nine Bottom', 'brando-addons') => 'md-padding-nine-bottom',
          __('Padding Ten Bottom', 'brando-addons') => 'md-padding-ten-bottom',
          __('Padding Eleven Bottom', 'brando-addons') => 'md-padding-eleven-bottom',
          __('Padding Twelve Bottom', 'brando-addons') => 'md-padding-twelve-bottom',
          __('Padding Thirteen Bottom', 'brando-addons') => 'md-padding-thirteen-bottom',
          __('Padding One Left', 'brando-addons') => 'md-padding-one-left',
          __('Padding Two Left', 'brando-addons') => 'md-padding-two-left',
          __('Padding Three Left', 'brando-addons') => 'md-padding-three-left',
          __('Padding Four Left', 'brando-addons') => 'md-padding-four-left',
          __('Padding Five Left', 'brando-addons') => 'md-padding-five-left',
          __('Padding Six Left', 'brando-addons') => 'md-padding-six-left',
          __('Padding Seven Left', 'brando-addons') => 'md-padding-seven-left',
          __('Padding Eight Left', 'brando-addons') => 'md-padding-eight-left',
          __('Padding Nine Left', 'brando-addons') => 'md-padding-nine-left',
          __('Padding Ten Left', 'brando-addons') => 'md-padding-ten-left',
          __('Padding Eleven Left', 'brando-addons') => 'md-padding-eleven-left',
          __('Padding Twelve Left', 'brando-addons') => 'md-padding-twelve-left',
          __('Padding Thirteen Left', 'brando-addons') => 'md-padding-thirteen-left',
          __('Padding One Right', 'brando-addons') => 'md-padding-one-right',
          __('Padding Two Right', 'brando-addons') => 'md-padding-two-right',
          __('Padding Three Right', 'brando-addons') => 'md-padding-three-right',
          __('Padding Four Right', 'brando-addons') => 'md-padding-four-right',
          __('Padding Five Right', 'brando-addons') => 'md-padding-five-right',
          __('Padding Six Right', 'brando-addons') => 'md-padding-six-right',
          __('Padding Seven Right', 'brando-addons') => 'md-padding-seven-right',
          __('Padding Eight Right', 'brando-addons') => 'md-padding-eight-right',
          __('Padding Nine Right', 'brando-addons') => 'md-padding-nine-right',
          __('Padding Ten Right', 'brando-addons') => 'md-padding-ten-right',
          __('Padding Eleven Right', 'brando-addons') => 'md-padding-eleven-right',
          __('Padding Twelve Right', 'brando-addons') => 'md-padding-twelve-right',
          __('Padding Thirteen Right', 'brando-addons') => 'md-padding-thirteen-right',
          __('Padding One Top Bottom', 'brando-addons') => 'md-padding-one-tb',
          __('Padding Two Top Bottom', 'brando-addons') => 'md-padding-two-tb',
          __('Padding Three Top Bottom', 'brando-addons') => 'md-padding-three-tb',
          __('Padding Four Top Bottom', 'brando-addons') => 'md-padding-four-tb',
          __('Padding Five Top Bottom', 'brando-addons') => 'md-padding-five-tb',
          __('Padding Six Top Bottom', 'brando-addons') => 'md-padding-six-tb',
          __('Padding Seven Top Bottom', 'brando-addons') => 'md-padding-seven-tb',
          __('Padding Eight Top Bottom', 'brando-addons') => 'md-padding-eight-tb',
          __('Padding Nine Top Bottom', 'brando-addons') => 'md-padding-nine-tb',
          __('Padding Ten Top Bottom', 'brando-addons') => 'md-padding-ten-tb',
          __('Padding Eleven Top Bottom', 'brando-addons') => 'md-padding-eleven-tb',
          __('Padding Twelve Top Bottom', 'brando-addons') => 'md-padding-twelve-tb',
          __('Padding Thirteen Top Bottom', 'brando-addons') => 'md-padding-thirteen-tb',
          __('Padding One Left Right', 'brando-addons') => 'md-padding-one-lr',
          __('Padding Two Left Right', 'brando-addons') => 'md-padding-two-lr',
          __('Padding Three Left Right', 'brando-addons') => 'md-padding-three-lr',
          __('Padding Four Left Right', 'brando-addons') => 'md-padding-four-lr',
          __('Padding Five Left Right', 'brando-addons') => 'md-padding-five-lr',
          __('Padding Six Left Right', 'brando-addons') => 'md-padding-six-lr',
          __('Padding seven Left Right', 'brando-addons') => 'md-padding-seven-lr',
          __('Padding eight Left Right', 'brando-addons') => 'md-padding-eight-lr',
          __('Padding Nine Left Right', 'brando-addons') => 'md-padding-nine-lr',
          __('Padding Ten Left Right', 'brando-addons') => 'md-padding-ten-lr',
          __('Padding Eleven Left Right', 'brando-addons') => 'md-padding-eleven-lr',
          __('Padding Twelve Left Right', 'brando-addons') => 'md-padding-twelve-lr',
          __('Padding Thirteen Left Right', 'brando-addons') => 'md-padding-thirteen-lr',
          __('Padding 90px 60px', 'brando-addons') => 'md-padding-90px-60px',
          __('Padding Top Bottom 90px', 'brando-addons') => 'md-padding-90px-tb',
          __('Padding Top 15px', 'brando-addons') => 'md-padding-top-15px',
          __('Padding Bottom 15px', 'brando-addons') => 'md-padding-bottom-15px',
          __('Padding Left Right 15px', 'brando-addons') => 'md-padding-lr-15px',
          __('Custom', 'brando-addons') => 'custom-mini-desktop-padding',
     );

      $output .= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value brando-mini-desktop-custom-select-value wpb-textinput ' .
               esc_attr( $settings['param_name'] ) . ' ' .
               esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';

      $output .= '<select name="'. $settings['param_name']. '-custom" class="brando-mini-desktop-custom-select wpb_vc_param_value wpb-input wpb-select '. $settings['param_name']
                 . ' ' . $settings['type']
                 . '">';
      foreach ( $brando_desktop_mini_padding as $index => $data ) {
        $output .= '<option class="" value="' . $data . '" title="'.$index.'">'.$index.'</option>';
      }
      $output .= '</select>';

    return $output;
  }
endif;

/*-----------------------------------------------------------------------------------*/
/* Brando Ipad Padding */
/*-----------------------------------------------------------------------------------*/

vc_add_shortcode_param( 'brando_custom_ipad_padding', 'brando_custom_ipad_padding_callback', BRANDO_ADDONS_ROOT_DIR . '/brando-shortcodes/js/custom.js' );
if ( ! function_exists( 'brando_custom_ipad_padding_callback' ) ) :
  function brando_custom_ipad_padding_callback( $settings, $value ) {

     $output = '';

     $brando_ipad_padding =array(
          __('Select Padding', 'brando-addons') => '',
          __('No Padding', 'brando-addons') => 'sm-no-padding',
          __('No Padding Top', 'brando-addons') => 'sm-no-padding-top',
          __('No Padding Bottom', 'brando-addons') => 'sm-no-padding-bottom',
          __('No Padding Left', 'brando-addons') => 'sm-no-padding-left',
          __('No Padding Right', 'brando-addons') => 'sm-no-padding-right',
          __('No Padding Top Bottom', 'brando-addons') => 'sm-no-padding-tb',
          __('No Padding Left Right', 'brando-addons') => 'sm-no-padding-lr',
          __('Padding One All', 'brando-addons') => 'sm-padding-one-all',
          __('Padding Two All', 'brando-addons') => 'sm-padding-two-all',
          __('Padding Three All', 'brando-addons') => 'sm-padding-three-all',
          __('Padding Four All', 'brando-addons') => 'sm-padding-four-all',
          __('Padding Five All', 'brando-addons') => 'sm-padding-five-all',
          __('Padding Six All', 'brando-addons') => 'sm-padding-six-all',
          __('Padding Seven All', 'brando-addons') => 'sm-padding-seven-all',
          __('Padding Eight All', 'brando-addons') => 'sm-padding-eight-all',
          __('Padding Nine All', 'brando-addons') => 'sm-padding-nine-all',
          __('Padding Ten All', 'brando-addons') => 'sm-padding-ten-all',
          __('Padding Eleven All', 'brando-addons') => 'sm-padding-eleven-all',
          __('Padding Twelve All', 'brando-addons') => 'sm-padding-twelve-all',
          __('Padding Thirteen All', 'brando-addons') => 'sm-padding-thirteen-all',
          __('Padding Fourteen All', 'brando-addons') => 'sm-padding-fourteen-all',
          __('Padding Fifteen All','brando-addons') => 'sm-padding-fifteen-all',
          __('Padding Sixteen All','brando-addons') => 'sm-padding-sixteen-all',
          __('Padding Seventeen All','brando-addons') => 'sm-padding-seventeen-all',
          __('Padding Eighteen All','brando-addons') => 'sm-padding-eighteen-all',
          __('Padding One Top', 'brando-addons') => 'sm-padding-one-top',
          __('Padding Two Top', 'brando-addons') => 'sm-padding-two-top',
          __('Padding Three Top', 'brando-addons') => 'sm-padding-three-top',
          __('Padding Four Top', 'brando-addons') => 'sm-padding-four-top',
          __('Padding Five Top', 'brando-addons') => 'sm-padding-five-top',
          __('Padding Six Top', 'brando-addons') => 'sm-padding-six-top',
          __('Padding Seven Top', 'brando-addons') => 'sm-padding-seven-top',
          __('Padding Eight Top', 'brando-addons') => 'sm-padding-eight-top',
          __('Padding Nine Top', 'brando-addons') => 'sm-padding-nine-top',
          __('Padding Ten Top', 'brando-addons') => 'sm-padding-ten-top',
          __('Padding Eleven Top', 'brando-addons') => 'sm-padding-eleven-top',
          __('Padding Twelve Top', 'brando-addons') => 'sm-padding-twelve-top',
          __('Padding Thirteen Top', 'brando-addons') => 'sm-padding-thirteen-top',
          __('Padding One Bottom', 'brando-addons') => 'sm-padding-one-bottom',
          __('Padding Two Bottom', 'brando-addons') => 'sm-padding-two-bottom',
          __('Padding Three Bottom', 'brando-addons') => 'sm-padding-three-bottom',
          __('Padding Four Bottom', 'brando-addons') => 'sm-padding-four-bottom',
          __('Padding Five Bottom', 'brando-addons') => 'sm-padding-five-bottom',
          __('Padding Six Bottom', 'brando-addons') => 'sm-padding-six-bottom',
          __('Padding Seven Bottom', 'brando-addons') => 'sm-padding-seven-bottom',
          __('Padding Eight Bottom', 'brando-addons') => 'sm-padding-eight-bottom',
          __('Padding Nine Bottom', 'brando-addons') => 'sm-padding-nine-bottom',
          __('Padding Ten Bottom', 'brando-addons') => 'sm-padding-ten-bottom',
          __('Padding Eleven Bottom', 'brando-addons') => 'sm-padding-eleven-bottom',
          __('Padding Twelve Bottom', 'brando-addons') => 'sm-padding-twelve-bottom',
          __('Padding Thirteen Bottom', 'brando-addons') => 'sm-padding-thirteen-bottom',
          __('Padding One Left', 'brando-addons') => 'sm-padding-one-left',
          __('Padding Two Left', 'brando-addons') => 'sm-padding-two-left',
          __('Padding Three Left', 'brando-addons') => 'sm-padding-three-left',
          __('Padding Four Left', 'brando-addons') => 'sm-padding-four-left',
          __('Padding Five Left', 'brando-addons') => 'sm-padding-five-left',
          __('Padding Six Left', 'brando-addons') => 'sm-padding-six-left',
          __('Padding Seven Left', 'brando-addons') => 'sm-padding-seven-left',
          __('Padding Eight Left', 'brando-addons') => 'sm-padding-eight-left',
          __('Padding Nine Left', 'brando-addons') => 'sm-padding-nine-left',
          __('Padding Ten Left', 'brando-addons') => 'sm-padding-ten-left',
          __('Padding Eleven Left', 'brando-addons') => 'sm-padding-eleven-left',
          __('Padding Twelve Left', 'brando-addons') => 'sm-padding-twelve-left',
          __('Padding Thirteen Left', 'brando-addons') => 'sm-padding-thirteen-left',
          __('Padding One Right', 'brando-addons') => 'sm-padding-one-right',
          __('Padding Two Right', 'brando-addons') => 'sm-padding-two-right',
          __('Padding Three Right', 'brando-addons') => 'sm-padding-three-right',
          __('Padding Four Right', 'brando-addons') => 'sm-padding-four-right',
          __('Padding Five Right', 'brando-addons') => 'sm-padding-five-right',
          __('Padding Six Right', 'brando-addons') => 'sm-padding-six-right',
          __('Padding Seven Right', 'brando-addons') => 'sm-padding-seven-right',
          __('Padding Eight Right', 'brando-addons') => 'sm-padding-eight-right',
          __('Padding Nine Right', 'brando-addons') => 'sm-padding-nine-right',
          __('Padding Ten Right', 'brando-addons') => 'sm-padding-ten-right',
          __('Padding Eleven Right', 'brando-addons') => 'sm-padding-eleven-right',
          __('Padding Twelve Right', 'brando-addons') => 'sm-padding-twelve-right',
          __('Padding Thirteen Right', 'brando-addons') => 'sm-padding-thirteen-right',
          __('Padding One Top Bottom', 'brando-addons') => 'sm-padding-one-tb',
          __('Padding Two Top Bottom', 'brando-addons') => 'sm-padding-two-tb',
          __('Padding Three Top Bottom', 'brando-addons') => 'sm-padding-three-tb',
          __('Padding Four Top Bottom', 'brando-addons') => 'sm-padding-four-tb',
          __('Padding Five Top Bottom', 'brando-addons') => 'sm-padding-five-tb',
          __('Padding Six Top Bottom', 'brando-addons') => 'sm-padding-six-tb',
          __('Padding Seven Top Bottom', 'brando-addons') => 'sm-padding-seven-tb',
          __('Padding Eight Top Bottom', 'brando-addons') => 'sm-padding-eight-tb',
          __('Padding Nine Top Bottom', 'brando-addons') => 'sm-padding-nine-tb',
          __('Padding Ten Top Bottom', 'brando-addons') => 'sm-padding-ten-tb',
          __('Padding Eleven Top Bottom', 'brando-addons') => 'sm-padding-eleven-tb',
          __('Padding Twelve Top Bottom', 'brando-addons') => 'sm-padding-twelve-tb',
          __('Padding Thirteen Top Bottom', 'brando-addons') => 'sm-padding-thirteen-tb',
          __('Padding One Left Right', 'brando-addons') => 'sm-padding-one-lr',
          __('Padding Two Left Right', 'brando-addons') => 'sm-padding-two-lr',
          __('Padding Three Left Right', 'brando-addons') => 'sm-padding-three-lr',
          __('Padding Four Left Right', 'brando-addons') => 'sm-padding-four-lr',
          __('Padding Five Left Right', 'brando-addons') => 'sm-padding-five-lr',
          __('Padding Six Left Right', 'brando-addons') => 'sm-padding-six-lr',
          __('Padding seven Left Right', 'brando-addons') => 'sm-padding-seven-lr',
          __('Padding eight Left Right', 'brando-addons') => 'sm-padding-eight-lr',
          __('Padding Nine Left Right', 'brando-addons') => 'sm-padding-nine-lr',
          __('Padding Ten Left Right', 'brando-addons') => 'sm-padding-ten-lr',
          __('Padding Eleven Left Right', 'brando-addons') => 'sm-padding-eleven-lr',
          __('Padding Twelve Left Right', 'brando-addons') => 'sm-padding-twelve-lr',
          __('Padding Thirteen Left Right', 'brando-addons') => 'sm-padding-thirteen-lr',
          __('Padding 70px 70px', 'brando-addons') => 'sm-padding-70px-70px',
          __('Padding 70px 10px', 'brando-addons') => 'sm-padding-70px-10px',
          __('Padding Top Bottom 70px', 'brando-addons') => 'padding-70px-tb',
          __('Padding Top 15px', 'brando-addons') => 'sm-padding-top-15px',
          __('Padding Bottom 15px', 'brando-addons') => 'sm-padding-bottom-15px',
          __('Padding Left Right 15px', 'brando-addons') => 'sm-padding-lr-15px',
          __('Custom', 'brando-addons') => 'custom-ipad-padding',
     );

      $output .= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value brando-ipad-custom-select-value wpb-textinput ' .
               esc_attr( $settings['param_name'] ) . ' ' .
               esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';

      $output .= '<select name="'. $settings['param_name']. '-custom" class="brando-ipad-custom-select wpb_vc_param_value wpb-input wpb-select '. $settings['param_name']
                 . ' ' . $settings['type']
                 . '">';
      foreach ( $brando_ipad_padding as $index => $data ) {
        $output .= '<option class="" value="' . $data . '" title="'.$index.'">'.$index.'</option>';
      }
      $output .= '</select>';

    return $output;
  }
endif;

/*-----------------------------------------------------------------------------------*/
/* Brando Mobile Padding */
/*-----------------------------------------------------------------------------------*/

vc_add_shortcode_param( 'brando_custom_mobile_padding', 'brando_custom_mobile_padding_callback', BRANDO_ADDONS_ROOT_DIR . '/brando-shortcodes/js/custom.js' );
if ( ! function_exists( 'brando_custom_mobile_padding_callback' ) ) :
  function brando_custom_mobile_padding_callback( $settings, $value ) {

     $output = '';

     $brando_mobile_padding =array(
          __('Select Padding', 'brando-addons') => '',
          __('No Padding', 'brando-addons') => 'xs-no-padding',
          __('No Padding Top', 'brando-addons') => 'xs-no-padding-top',
          __('No Padding Bottom', 'brando-addons') => 'xs-no-padding-bottom',
          __('No Padding Left', 'brando-addons') => 'xs-no-padding-left',
          __('No Padding Right', 'brando-addons') => 'xs-no-padding-right',
          __('No Padding Top Bottom', 'brando-addons') => 'xs-no-padding-tb',
          __('No Padding Left Right', 'brando-addons') => 'xs-no-padding-lr',
          __('Padding One All', 'brando-addons') => 'xs-padding-one-all',
          __('Padding Two All', 'brando-addons') => 'xs-padding-two-all',
          __('Padding Three All', 'brando-addons') => 'xs-padding-three-all',
          __('Padding Four All', 'brando-addons') => 'xs-padding-four-all',
          __('Padding Five All', 'brando-addons') => 'xs-padding-five-all',
          __('Padding Six All', 'brando-addons') => 'xs-padding-six-all',
          __('Padding Seven All', 'brando-addons') => 'xs-padding-seven-all',
          __('Padding Eight All', 'brando-addons') => 'xs-padding-eight-all',
          __('Padding Nine All', 'brando-addons') => 'xs-padding-nine-all',
          __('Padding Ten All', 'brando-addons') => 'xs-padding-ten-all',
          __('Padding Eleven All', 'brando-addons') => 'xs-padding-eleven-all',
          __('Padding Twelve All', 'brando-addons') => 'xs-padding-twelve-all',
          __('Padding Thirteen All', 'brando-addons') => 'xs-padding-thirteen-all',
          __('Padding Fourteen All', 'brando-addons') => 'xs-padding-fourteen-all',
          __('Padding Fifteen All','brando-addons') => 'xs-padding-fifteen-all',
          __('Padding Sixteen All','brando-addons') => 'xs-padding-sixteen-all',
          __('Padding Seventeen All','brando-addons') => 'xs-padding-seventeen-all',
          __('Padding Eighteen All','brando-addons') => 'xs-padding-eighteen-all',
          __('Padding One Top', 'brando-addons') => 'xs-padding-one-top',
          __('Padding Two Top', 'brando-addons') => 'xs-padding-two-top',
          __('Padding Three Top', 'brando-addons') => 'xs-padding-three-top',
          __('Padding Four Top', 'brando-addons') => 'xs-padding-four-top',
          __('Padding Five Top', 'brando-addons') => 'xs-padding-five-top',
          __('Padding Six Top', 'brando-addons') => 'xs-padding-six-top',
          __('Padding Seven Top', 'brando-addons') => 'xs-padding-seven-top',
          __('Padding Eight Top', 'brando-addons') => 'xs-padding-eight-top',
          __('Padding Nine Top', 'brando-addons') => 'xs-padding-nine-top',
          __('Padding Ten Top', 'brando-addons') => 'xs-padding-ten-top',
          __('Padding Eleven Top', 'brando-addons') => 'xs-padding-eleven-top',
          __('Padding Twelve Top', 'brando-addons') => 'xs-padding-twelve-top',
          __('Padding Thirteen Top', 'brando-addons') => 'xs-padding-thirteen-top',
          __('Padding One Bottom', 'brando-addons') => 'xs-padding-one-bottom',
          __('Padding Two Bottom', 'brando-addons') => 'xs-padding-two-bottom',
          __('Padding Three Bottom', 'brando-addons') => 'xs-padding-three-bottom',
          __('Padding Four Bottom', 'brando-addons') => 'xs-padding-four-bottom',
          __('Padding Five Bottom', 'brando-addons') => 'xs-padding-five-bottom',
          __('Padding Six Bottom', 'brando-addons') => 'xs-padding-six-bottom',
          __('Padding Seven Bottom', 'brando-addons') => 'xs-padding-seven-bottom',
          __('Padding Eight Bottom', 'brando-addons') => 'xs-padding-eight-bottom',
          __('Padding Nine Bottom', 'brando-addons') => 'xs-padding-nine-bottom',
          __('Padding Ten Bottom', 'brando-addons') => 'xs-padding-ten-bottom',
          __('Padding Eleven Bottom', 'brando-addons') => 'xs-padding-eleven-bottom',
          __('Padding Twelve Bottom', 'brando-addons') => 'xs-padding-twelve-bottom',
          __('Padding Thirteen Bottom', 'brando-addons') => 'xs-padding-thirteen-bottom',
          __('Padding One Left', 'brando-addons') => 'xs-padding-one-left',
          __('Padding Two Left', 'brando-addons') => 'xs-padding-two-left',
          __('Padding Three Left', 'brando-addons') => 'xs-padding-three-left',
          __('Padding Four Left', 'brando-addons') => 'xs-padding-four-left',
          __('Padding Five Left', 'brando-addons') => 'xs-padding-five-left',
          __('Padding Six Left', 'brando-addons') => 'xs-padding-six-left',
          __('Padding Seven Left', 'brando-addons') => 'xs-padding-seven-left',
          __('Padding Eight Left', 'brando-addons') => 'xs-padding-eight-left',
          __('Padding Nine Left', 'brando-addons') => 'xs-padding-nine-left',
          __('Padding Ten Left', 'brando-addons') => 'xs-padding-ten-left',
          __('Padding Eleven Left', 'brando-addons') => 'xs-padding-eleven-left',
          __('Padding Twelve Left', 'brando-addons') => 'xs-padding-twelve-left',
          __('Padding Thirteen Left', 'brando-addons') => 'xs-padding-thirteen-left',
          __('Padding One Right', 'brando-addons') => 'xs-padding-one-right',
          __('Padding Two Right', 'brando-addons') => 'xs-padding-two-right',
          __('Padding Three Right', 'brando-addons') => 'xs-padding-three-right',
          __('Padding Four Right', 'brando-addons') => 'xs-padding-four-right',
          __('Padding Five Right', 'brando-addons') => 'xs-padding-five-right',
          __('Padding Six Right', 'brando-addons') => 'xs-padding-six-right',
          __('Padding Seven Right', 'brando-addons') => 'xs-padding-seven-right',
          __('Padding Eight Right', 'brando-addons') => 'xs-padding-eight-right',
          __('Padding Nine Right', 'brando-addons') => 'xs-padding-nine-right',
          __('Padding Ten Right', 'brando-addons') => 'xs-padding-ten-right',
          __('Padding Eleven Right', 'brando-addons') => 'xs-padding-eleven-right',
          __('Padding Twelve Right', 'brando-addons') => 'xs-padding-twelve-right',
          __('Padding Thirteen Right', 'brando-addons') => 'xs-padding-thirteen-right',
          __('Padding One Top Bottom', 'brando-addons') => 'xs-padding-one-tb',
          __('Padding Two Top Bottom', 'brando-addons') => 'xs-padding-two-tb',
          __('Padding Three Top Bottom', 'brando-addons') => 'xs-padding-three-tb',
          __('Padding Four Top Bottom', 'brando-addons') => 'xs-padding-four-tb',
          __('Padding Five Top Bottom', 'brando-addons') => 'xs-padding-five-tb',
          __('Padding Six Top Bottom', 'brando-addons') => 'xs-padding-six-tb',
          __('Padding Seven Top Bottom', 'brando-addons') => 'xs-padding-seven-tb',
          __('Padding Eight Top Bottom', 'brando-addons') => 'xs-padding-eight-tb',
          __('Padding Nine Top Bottom', 'brando-addons') => 'xs-padding-nine-tb',
          __('Padding Ten Top Bottom', 'brando-addons') => 'xs-padding-ten-tb',
          __('Padding Eleven Top Bottom', 'brando-addons') => 'xs-padding-eleven-tb',
          __('Padding Twelve Top Bottom', 'brando-addons') => 'xs-padding-twelve-tb',
          __('Padding Thirteen Top Bottom', 'brando-addons') => 'xs-padding-thirteen-tb',
          __('Padding Twenty Top Bottom', 'brando-addons') => 'xs-padding-twenty-tb',
          __('Padding Thirty Top Bottom', 'brando-addons') => 'xs-padding-thirty-tb',
          __('Padding Forty Top Bottom', 'brando-addons') => 'xs-padding-forty-tb',
          __('Padding Fifty Top Bottom', 'brando-addons') => 'xs-padding-fifty-tb',
          __('Padding Sixty Top Bottom', 'brando-addons') => 'xs-padding-sixty-tb',
          __('Padding Seventy Top Bottom', 'brando-addons') => 'xs-padding-seventy-tb',
          __('Padding Eighty Top Bottom', 'brando-addons') => 'xs-padding-eighty-tb',
          __('Padding Ninety Top Bottom', 'brando-addons') => 'xs-padding-ninety-tb',
          __('Padding One Hundred Top Bottom', 'brando-addons') => 'xs-padding-one-hundred-tb',    
          __('Padding One Left Right', 'brando-addons') => 'xs-padding-one-lr',
          __('Padding Two Left Right', 'brando-addons') => 'xs-padding-two-lr',
          __('Padding Three Left Right', 'brando-addons') => 'xs-padding-three-lr',
          __('Padding Four Left Right', 'brando-addons') => 'xs-padding-four-lr',
          __('Padding Five Left Right', 'brando-addons') => 'xs-padding-five-lr',
          __('Padding Six Left Right', 'brando-addons') => 'xs-padding-six-lr',
          __('Padding seven Left Right', 'brando-addons') => 'xs-padding-seven-lr',
          __('Padding eight Left Right', 'brando-addons') => 'xs-padding-eight-lr',
          __('Padding Nine Left Right', 'brando-addons') => 'xs-padding-nine-lr',
          __('Padding Ten Left Right', 'brando-addons') => 'xs-padding-ten-lr',
          __('Padding Eleven Left Right', 'brando-addons') => 'xs-padding-eleven-lr',
          __('Padding Twelve Left Right', 'brando-addons') => 'xs-padding-twelve-lr',
          __('Padding Thirteen Left Right', 'brando-addons') => 'xs-padding-thirteen-lr',
          __('Padding 40px 15px', 'brando-addons') => 'xs-padding-40px-15px',
          __('Padding Top Bottom 40px', 'brando-addons') => 'xs-padding-40px-tb',
          __('padding Bottom 40px Left Right 15px', 'brando-addons') => 'xs-padding-bottom-40px-lr-15px',
          __('Padding Top 15px', 'brando-addons') => 'xs-padding-top-15px',
          __('Padding Bottom 15px', 'brando-addons') => 'xs-padding-bottom-15px',
          __('Padding Left Right 15px', 'brando-addons') => 'xs-padding-lr-15px',
          __('Custom', 'brando-addons') => 'custom-mobile-padding',
     );

      $output .= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value brando-mobile-custom-select-value wpb-textinput ' .
               esc_attr( $settings['param_name'] ) . ' ' .
               esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';

      $output .= '<select name="'. $settings['param_name']. '-custom" class="brando-mobile-custom-select wpb_vc_param_value wpb-input wpb-select '. $settings['param_name']
                 . ' ' . $settings['type']
                 . '">';
      foreach ( $brando_mobile_padding as $index => $data ) {
        $output .= '<option class="" value="' . $data . '" title="'.$index.'">'.$index.'</option>';
      }
      $output .= '</select>';

    return $output;
  }
endif;