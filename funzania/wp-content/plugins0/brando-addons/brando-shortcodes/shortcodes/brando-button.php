<?php
/**
 * Shortcode For Button
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Button */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'brando_button_shortcode' ) ) {
    function brando_button_shortcode( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'button_style' =>'',
            'button_type' => '',
            'button_version_type' => '',
            'button_icon' => '',
            'button_text' => '',
            'button_sub_text' => '',
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
            'brando_column_animation_style' => '',
            'class' => '',
            'id' => '',
            'custom_icon' => '',
            'custom_icon_image' => '',
            'brando_button_text_color' => '',
            'brando_button_text_hover_color' => '',
            'brando_button_background_color' => '',
            'brando_button_background_hover_color' => '',
            'brando_button_border_color' => '',
            'brando_token_class' => '',
            'brando_custom_image_srcset' => 'full',
            'button_settings' => ''
        ), $atts ) );

        global $tz_featured_array, $tz_featured_ipad_array, $tz_featured_mobile_array,$font_settings_array;
        $output =  $style_attr = $style = '';
        $classes = $style_array = array();
        $main_class = ($class) ? $classes[] = $class : '';
        $brando_token_class = $brando_token_class.$id;
        $id = ($id) ? 'id="'.$id.'"' : '';
        $first_button_parse_args = vc_parse_multi_attribute($button_text);
        $first_button_link = ( isset($first_button_parse_args['url']) ) ? $first_button_parse_args['url'] : '#';
        $first_button_title = ( isset($first_button_parse_args['title']) ) ? $first_button_parse_args['title'] : '';
        $first_button_target = ( isset($first_button_parse_args['target']) ) ? trim($first_button_parse_args['target']) : '_self';
        $brando_column_animation_style = ( $brando_column_animation_style ) ? $classes[] ='wow '.$brando_column_animation_style : '';
        $class= $icon='';

        // custom icon image
        $brando_custom_image_srcset = ($brando_custom_image_srcset) ? $brando_custom_image_srcset : 'full';
        $custom_image = wp_get_attachment_image_src($custom_icon_image, $brando_custom_image_srcset);
        $srcset_icon = $srcset_data_icon = '';
        $srcset_icon = wp_get_attachment_image_srcset( $custom_icon_image, $brando_custom_image_srcset );
        if( $srcset_icon ){
            $srcset_data_icon = ' srcset="'.esc_attr( $srcset_icon ).'"';
        }

        $sizes_icon = $sizes_data_icon = '';
        $sizes_icon = wp_get_attachment_image_sizes( $custom_icon_image, $brando_custom_image_srcset );
        if( $sizes_icon ){
            $sizes_data_icon = ' sizes="'.esc_attr( $sizes_icon ).'"';
        }

        // For text and background color setting
        ( $brando_button_text_color ) ? $tz_featured_array[] = '.'.$brando_token_class.',.'.$brando_token_class.' i{ color:'.$brando_button_text_color.';}' : '';
        ( $brando_button_text_hover_color ) ? $tz_featured_array[] = '.'.$brando_token_class.':hover,.'.$brando_token_class.':hover i{ color:'.$brando_button_text_hover_color.';}' : '';
        ( $brando_button_background_color ) ? $tz_featured_array[] = '.'.$brando_token_class.'{ background:'.$brando_button_background_color.';}' : '';
        ( $brando_button_background_hover_color ) ? $tz_featured_array[] = '.'.$brando_token_class.':hover{ background:'.$brando_button_background_hover_color.';}' : '';
        ( $brando_button_border_color ) ? $tz_featured_array[] = '.'.$brando_token_class.',.'.$brando_token_class.':hover{ border-color:'.$brando_button_border_color.';}' : '';
        $classes[] = $brando_token_class;
        
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
        
        $style_property_list = implode(" ", $style_array);
        $style_attr = ( $style_property_list ) ? ' style="'.$style_property_list.'"' : '';
        
        //Font Settings For Button
        $fontsettings_button_id = $responsive_style_button = $fontsettings_button_class = '';
        if( !empty( $button_settings ) ) {
            $fontsettings_button_id = uniqid('brando-font-setting-');
            $responsive_style_button = brando_Responsive_font_settings::generate_css( $button_settings, $fontsettings_button_id );
            $fontsettings_button_class = ' '.$fontsettings_button_id;
        }
        ( !empty( $responsive_style_button ) ) ? $font_settings_array[] = $responsive_style_button : '';

        // For Button Style
        switch ($button_style) {
            case 'style1':
            	$icon = $first_button_title;
                $classes[] = "highlight-button";
            break;

            case 'style2':
            	$icon = $first_button_title;
                $classes[]= "highlight-button-dark";
            break;

            case 'style3':
            	$icon = $first_button_title;
                $classes[] = "btn-small-white-background";
            break;

            case 'style4':
            	$icon = $first_button_title;
                $classes[] = "highlight-button btn-round";
            break;

            case 'style5':
            	$icon = $first_button_title;
                $classes[] = "highlight-button-dark btn-round";
            break;

            case 'style6':
            	$icon = $first_button_title;
                $classes[] = "btn-small-white-background btn-round";
            break;

            case 'style7':
            	$icon = $first_button_title;
                $classes[] = "highlight-button-black-border";
            break;

            case 'style8':
            	$icon = $first_button_title;
                $classes[] = "btn-small-white";
            break;

            case 'style9':
            	$icon = $first_button_title;
                $classes[] = "btn-small-white-dark";
            break;

            case 'style10':
            	$icon = $first_button_title;
                $classes[] = "btn-small-white btn-round";
            break;

            case 'style11':
            	$icon = $first_button_title;
                $classes[] = "btn-small-white-dark btn-round";
            break;

            case 'style12':
            	$icon = $first_button_title;
                $classes[] = "btn-small-black-border-light";
            break;

            case 'style13':
            	$icon = $first_button_title;
                $classes[] = "btn-small-black-border-light btn-round";
            break;

            case 'style14':
            	$icon = $first_button_title;
                $classes[] = "btn-very-small-white";
            break;

            case 'style15':
            	$icon = $first_button_title;
                $classes[] = "btn-very-small-white btn-round";
            break;

            case 'style16':
                if( $custom_icon == 1 && !empty( $custom_image ) ){
                    $icon .= '<img src="'.$custom_image[0].'" alt="" class="icon-image" width="'.$custom_image[1].'" height="'.$custom_image[2].'"'.$srcset_data_icon.$sizes_data_icon.' />'.$first_button_title;
                }else{
                    if($button_icon){
                        $icon = '<i class="'.$button_icon.'"></i>';
                    }
                    $icon .= $first_button_title;
                }
                $classes[] = "highlight-button";
            break;

            case 'style17':
            	if( $custom_icon == 1 && !empty( $custom_image ) ){
                    $icon .= '<img src="'.$custom_image[0].'" alt="" class="icon-image" width="'.$custom_image[1].'" height="'.$custom_image[2].'"'.$srcset_data_icon.$sizes_data_icon.' />'.$first_button_title;
                }else{
                    if($button_icon){
                        $icon = '<i class="'.$button_icon.'"></i>';
                    }
                    $icon .= $first_button_title;
                }
                $classes[] = "highlight-button-dark";
            break;

            case 'style18':
            	if( $custom_icon == 1 && !empty( $custom_image ) ){
                    $icon .= '<img src="'.$custom_image[0].'" alt="" class="icon-image" width="'.$custom_image[1].'" height="'.$custom_image[2].'"'.$srcset_data_icon.$sizes_data_icon.' />'.$first_button_title;
                }else{
                    if($button_icon){
                        $icon = '<i class="'.$button_icon.'"></i>';
                    }
                    $icon .= $first_button_title;
                }
                $classes[] = "btn-small-white-background";
            break;

            case 'style19':
                     $icon = $first_button_title;
            break;

            case 'style20':
                if( $custom_icon == 1 && !empty( $custom_image ) ){
                    $icon .= '<img src="'.$custom_image[0].'" alt="" class="icon-image" width="'.$custom_image[1].'" height="'.$custom_image[2].'"'.$srcset_data_icon.$sizes_data_icon.' />';
                }else{
                    if($button_icon){
                        $icon = '<i class="'.$button_icon.' btn-round"></i>';
                    }
                }
                $classes[] = "social-icon";
            break;

            case 'style21':
                if( $custom_icon == 1 && !empty( $custom_image ) ){
                    $icon .= '<img src="'.$custom_image[0].'" alt="" class="icon-image" width="'.$custom_image[1].'" height="'.$custom_image[2].'"'.$srcset_data_icon.$sizes_data_icon.' />';
                }else{
                    if( $button_icon ){
            	       $icon = '<i class="'.$button_icon.'"></i>';
                    }
                }
                $classes[] = "social-icon social-icon-large button";            
            break;

            case 'style22':
            	$icon = $first_button_title.'<span>'.$button_sub_text.'</span>';
                $classes[] = "button-3d btn-large button-desc";
            break;

            case 'style23':
            	$icon = $first_button_title;
                $classes[] = "button-3d btn-round";
            break;
            
        }
        // For Button Type
        switch ($button_type) {
            case 'large':
                $classes[] = "btn-large";
            break;

            case 'medium':
                $classes[] = "btn-medium ";
            break;

            case 'small':
                $classes[] = "btn-small ";
            break;

            case 'vsmall':
                $classes[] = "btn-very-small ";
            break;
        }
        // For Button Version
        switch ($button_version_type) {
            case 'primary':
                $classes[] = "btn-primary btn-round ";
                
            break;

            case 'success':
                $classes[] = "btn-success btn-round ";
            break;

            case 'info':
                $classes[] = "btn-info btn-round ";
            break;

            case 'warning':
                $classes[] = "btn-warning btn-round ";
            break;
            
            case 'danger':
                $classes[] = "btn-danger btn-round ";
            break;
        }

        $class_list = implode(" ", $classes);
        $btn_class = ( $class_list ) ? ' '.$class_list : '';

        $output .= '<a '.$id.' href="'.esc_url($first_button_link).'" target="'.esc_attr($first_button_target).'" class="inner-link'.$btn_class.' button btn alt-font'.$fontsettings_button_class.'"'.$style_attr.'>'.$icon.'</a>';
        
        return $output;
    }
}
add_shortcode( 'brando_button', 'brando_button_shortcode' );
?>