<?php
/**
 * Shortcode For Separator
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Separator */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'brando_separator' ) ) {
    function brando_separator( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'padding_setting' => '',
            'desktop_padding' => '',
            'custom_desktop_padding' => '',
            'ipad_padding' => '',
            'custom_ipad_padding' => '',
            'mobile_padding' => '',
            'custom_mobile_padding' => '',
            'margin_setting' => '',
            'desktop_margin' => '',
            'custom_desktop_margin' => '',
            'ipad_margin' => '',
            'custom_ipad_margin' => '',
            'mobile_margin' => '',
            'custom_mobile_margin' => '',
            'brando_sep_bg_color' => '',
            'brando_height' => '',
            'brando_token_class' => '',
        ), $atts ) );
        
        global $tz_featured_array, $tz_featured_ipad_array, $tz_featured_mobile_array;
        $output = $style = '';
        $classes = $style_array = array();
        $id = ($id) ? ' id='.$id : '';
        $class = ($class) ? $classes[] = $class : ''; 
        $classes[] = $brando_token_class;
        $brando_sep_bg_color = ($brando_sep_bg_color) ? $style_array[] = 'background:'.$brando_sep_bg_color.';' : '';
        $brando_height = ($brando_height) ? $style_array[] = 'height:'.$brando_height.';' : '';

        // Column Padding settings
        $padding_setting = ( $padding_setting ) ? $padding_setting : '';
        $desktop_padding_setting = ( $desktop_padding && $desktop_padding != 'custom-desktop-padding' ) ?  $classes[] = $desktop_padding : '';
        $ipad_padding_setting = ( $ipad_padding && $ipad_padding != 'custom-ipad-padding' ) ? $classes[] = $ipad_padding : '';
        $mobile_padding_setting = ( $mobile_padding && $mobile_padding != 'custom-mobile-padding' ) ? $classes[] = $mobile_padding : '';
        $custom_desktop_padding = ( $custom_desktop_padding ) ? $custom_desktop_padding : '';
        $custom_ipad_padding = ( $custom_ipad_padding ) ? $custom_ipad_padding : '';
        $custom_mobile_padding = ( $custom_mobile_padding ) ? $custom_mobile_padding : '';

        ( $custom_desktop_padding && $desktop_padding == 'custom-desktop-padding' ) ? $tz_featured_array[] = '.'.$brando_token_class.'{ padding:'.$custom_desktop_padding.' !important; }' : '';
        ( $custom_ipad_padding && $ipad_padding == 'custom-ipad-padding' ) ? $tz_featured_ipad_array[] = '.'.$brando_token_class.'{ padding:'.$custom_ipad_padding.' !important;}' : '';
        ( $custom_mobile_padding && $mobile_padding == 'custom-mobile-padding' ) ? $tz_featured_mobile_array[] = '.'.$brando_token_class.'{ padding:'.$custom_mobile_padding.' !important;}' : '';
        
        // Column Margin settings
        $margin_setting = ( $margin_setting ) ? $margin_setting : '';
        $desktop_margin_setting = ( $desktop_margin && $desktop_margin != 'custom-desktop-margin' ) ? $classes[] = $desktop_margin : '';
        $ipad_margin_setting = ( $ipad_margin && $ipad_margin != 'custom-ipad-margin' ) ? $classes[] = $ipad_margin : '';
        $mobile_margin_setting = ( $mobile_margin && $mobile_margin != 'custom-mobile-margin' ) ? $classes[] = $mobile_margin : '';
        $custom_desktop_margin = ( $custom_desktop_margin ) ? $custom_desktop_margin : '';
        $custom_ipad_margin = ( $custom_ipad_margin ) ? $custom_ipad_margin : '';
        $custom_mobile_margin = ( $custom_mobile_margin ) ? $custom_mobile_margin : '';

        ( $custom_desktop_margin && $desktop_margin == 'custom-desktop-margin' ) ? $tz_featured_array[] = '.'.$brando_token_class.'{ margin:'.$custom_desktop_margin.' !important; }' : '';
        ( $custom_ipad_margin && $ipad_margin == 'custom-ipad-margin' ) ? $tz_featured_ipad_array[] = '.'.$brando_token_class.'{ margin:'.$custom_ipad_margin.' !important;}' : '';
        ( $custom_mobile_margin && $mobile_margin == 'custom-mobile-margin' ) ? $tz_featured_mobile_array[] = '.'.$brando_token_class.'{ margin:'.$custom_mobile_margin.' !important;}' : '';
        
        $class_list = implode(" ", $classes);
        $class_attr = ( $class_list ) ? ' class="'.$class_list.'"' : '';

        $style_property_list = implode(" ", $style_array);
        $style = ( $style_property_list ) ? ' style="'.$style_property_list.'"' : '';

        $output .= '<div'.$id.$class_attr.$style.'></div>';
        return $output;
    }
}
add_shortcode( 'brando_separator', 'brando_separator' );
?>