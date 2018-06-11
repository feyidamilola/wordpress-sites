<?php
/**
 * Shortcode For Section Heading
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Section Heading */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'brando_section_heading' ) ) {
	function brando_section_heading( $atts, $content = null ) 
	{
		extract( shortcode_atts( array(
	            'brando_heading_type' => '',
	        	'brando_heading' => '',
	        	'brando_text_color' => '',
	        	'brando_heading_tag' => '',
	        	'brando_heading_text_color' => '',
	        	'margin_setting' => '',
		        'desktop_margin' => '',
		        'custom_desktop_margin' => '',
		        'ipad_margin' => '',
		        'custom_ipad_margin' => '',
		        'mobile_margin' => '',
		        'custom_mobile_margin' => '',
		        'padding_setting' => '',
	        	'desktop_padding' => '',
	        	'ipad_padding' => '',
	        	'custom_ipad_padding' => '',
	        	'mobile_padding' => '',
	        	'custom_mobile_padding' => '',
	        	'custom_desktop_padding' => '',
	        	'font_size' => '',
	        	'line_height' => '',
	        	'font_weight' => '',
	        	'text_transform' => '',
	        	'brando_enable_seperator' => '',
	        	'brando_sep_color' => '',
	        	'separator_height' => '',
		        'id' => '',
		        'class' => '',
		        'brando_heading_separator_color' => '',
		        'brando_heading_left_border_color' => '',
		        'brando_token_class' => '',
		        'title_settings' => '',
	        ), $atts ) );
		global $tz_featured_array, $tz_featured_ipad_array, $tz_featured_mobile_array,$font_settings_array;
		$output = $style = $sep_style = '';
		$classes = $style_array = array();
		switch ($brando_text_color) {
			case 'black-text':
					$classes[] = ' black-text';
				break;

			case 'white-text':
					$classes[] = ' white-text';
				break;

			case 'custom':
	                $classes[] = '';
					$style_array[] = 'color:'.$brando_heading_text_color.' !important;';
				break;
			
			default:
				break;
		}

		$brando_token_class = $brando_token_class.$id;
		$id = ( $id ) ? ' id="'.$id.'"' : '';
		$class = ( $class ) ? $classes[] = $class : '';
		$brando_heading_tag = ( $brando_heading_tag ) ? $brando_heading_tag : 'h1';
		// Custom css
		if( $brando_heading_type == 'heading-style8' ){
			( $brando_heading_separator_color ) ? $tz_featured_array[] = '.'.$brando_token_class.'::before, .'.$brando_token_class.'::after { border-color:'.$brando_heading_separator_color.';}' : '';
		}else{
			$brando_heading_separator_color = ( $brando_heading_separator_color ) ? $style_array[] = 'border-color:'.$brando_heading_separator_color.' !important;' : '';
		}

		if( $brando_heading_type == 'heading-style11' ){
			( $brando_heading_left_border_color ) ? $tz_featured_array[] = $brando_heading_tag.'.'.$brando_token_class.'::before { border-color:'.$brando_heading_left_border_color.';}' : '';
		}else{
			$brando_heading_left_border_color = ( $brando_heading_left_border_color ) ? ' style="color:'.$brando_heading_left_border_color.'"' : '';
		}

		$font_weight = ($font_weight) ? $style_array[] = 'font-weight:'.$font_weight.' !important;;' : '';
		$font_size = ($font_size) ? $style_array[] = 'font-size:'.$font_size.' !important;' : '';
		$line_height = ($line_height) ? $style_array[] = 'line-height:'.$line_height.' !important;' : '';
		$line_height = ($text_transform) ? $style_array[] = 'text-transform:'.$text_transform.' !important;' : '';
		
		$brando_heading_type = ( $brando_heading_type ) ? $classes[] = $brando_heading_type : '';

	    $brando_sep_color = ( $brando_sep_color ) ? 'background:'.$brando_sep_color.' !important; ' : ''; 
        $brando_seperator_height = ( $separator_height ) ? 'height:'.$separator_height.' !important;' : ''; 
        if( $brando_sep_color || $brando_seperator_height){
            $sep_style .= ' style="'.$brando_sep_color.$brando_seperator_height.'"';
        }
	        
	    /* Replace || to br in title */
	    $brando_heading = ( $brando_heading ) ? str_replace('||', '<br />',$brando_heading) : '';

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
        
		$classes[] = $brando_token_class;
		$style_property_list = implode(" ", $style_array);
        $style = ( $style_property_list ) ? ' style="'.$style_property_list.'"' : '';
		$class_attr = implode(" ", $classes);
		$cl_list = ( $class_attr ) ? ' '.$class_attr : '';

		//Font Settings For Title
        $fontsettings_title_class = $fontsettings_title_id = $responsive_style = '';
        if( !empty( $title_settings ) ) {
            $fontsettings_title_id = uniqid('brando-font-setting-');
            $responsive_style = brando_Responsive_font_settings::generate_css( $title_settings, $fontsettings_title_id );
            $fontsettings_title_class = ' '.$fontsettings_title_id;
        }
        ( !empty( $responsive_style ) ) ? $font_settings_array[] = $responsive_style : '';
       	
		switch ($brando_heading_type) 
		{
			case 'heading-style1':
		        $output .='<div class="margin-ten no-margin-lr clearfix">';
					$output .='<'.$brando_heading_tag.$id.' class="alt-font font-weight-600'.$fontsettings_title_class.$cl_list.'"'.$style.'>';
						$output .= $brando_heading;
		            $output .='</'.$brando_heading_tag.'>';
	            $output .= '</div>';
	        break;

			case 'heading-style2':
		        $output .='<span '.$id.' class="alt-font text-uppercase font-weight-600 element-title'.$fontsettings_title_class.$cl_list.'"'.$style.'>'.$brando_heading.'</span>';
	            if($brando_enable_seperator == 1){
	            	$output .='<div class="bg-fast-yellow separator-line-thick center-col no-margin-top"'.$sep_style.'></div>';
	            }
            break;

            case 'heading-style3':
            case 'heading-style5':
            case 'heading-style6':
            case 'heading-style9':
            case 'heading-style10':
            case 'heading-style11':
            case 'heading-style13':
				$output .='<'.$brando_heading_tag.$id.' class="alt-font'.$fontsettings_title_class.$cl_list.'"'.$style.'>';
					$output .= $brando_heading;
	            $output .='</'.$brando_heading_tag.'>';
			break;

			case 'heading-style4':
				$output .='<'.$brando_heading_tag.$id.' class="alt-font font-weight-700 title-thick-underline border-color-fast-yellow display-inline-block'.$fontsettings_title_class.$cl_list.'"'.$style.'>';
					$output .= $brando_heading;
	            $output .='</'.$brando_heading_tag.'>';
			break;

			case 'heading-style7':
				$output .='<'.$brando_heading_tag.$id.' class="alt-font'.$fontsettings_title_class.$cl_list.'"'.$style.'>';
					$output .= '<span class="crimson-red-text"'.$brando_heading_left_border_color.'>/</span> '.$brando_heading;
	            $output .='</'.$brando_heading_tag.'>';
			break;

			case 'heading-style8':
				$output .='<span '.$id.' class="title-medium deep-pink-dark-text text-uppercase alt-font title-dividers font-weight-700 position-relative'.$fontsettings_title_class.$cl_list.'"'.$style.'>'.$brando_heading.'</span>';
			break;

			case 'heading-style12':
				$output .='<'.$brando_heading_tag.$id.' class="alt-font'.$cl_list.'"'.$style.'>';
					if($brando_enable_seperator == 1){
						$output .= '<span class="bg-deep-green event-title-separator'.$fontsettings_title_class.'"'.$sep_style.'></span>';
					}
					$output .= $brando_heading;
	            $output .='</'.$brando_heading_tag.'>';
			break;

			case 'heading-style14':
				$output .='<'.$brando_heading_tag.$id.' class="alt-font'.$fontsettings_title_class.''.$cl_list.'"'.$style.'>';
					if($brando_enable_seperator == 1){
						$output .= '<span class="bg-deep-blue corporate-title-separator"'.$sep_style.'></span>';
					}
					$output .= $brando_heading;
	            $output .='</'.$brando_heading_tag.'>';
			break;
		}

	  return $output;
	}
}
add_shortcode("brando_section_heading","brando_section_heading");