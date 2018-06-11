<?php
/**
 * Shortcode For Row
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Row */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'brando_inner_row' ) ) {
	function brando_inner_row($atts, $content = null){
		extract( shortcode_atts( array(
			'equal_height' => '',
			'content_placement' => '',
	        'brando_row_style' => '',
	        'brando_row_bg_color' =>'',
	        'brando_row_bg_image' => '',
	        'brando_row_image_type' => '',
	        'brando_bg_image_type' => '',
	        'brando_parallax_image_type' => '',
	        'fullscreen' => '',
	        'show_overlay' => '',
	        'brando_overlay_opacity' => '',
	        'brando_row_overlay_color' => '',
	        'brando_z_index' => '',
	        'show_navigation' => '',
	        'brando_row_border_position' => '',
	        'brando_row_border_color' => '',
	        'brando_border_size' => '',
	        'brando_border_type' => '',
	        'padding_setting' => '',
	        'desktop_padding' => '',
	        'custom_desktop_padding' => '',
	        'desktop_mini_padding' => '',
	        'custom_mini_desktop_padding' => '',
	        'ipad_padding' => '',
	        'custom_ipad_padding' => '',
	        'mobile_padding' => '',
	        'custom_mobile_padding' => '',
	        'margin_setting' => '',
	        'desktop_margin' => '',
	        'custom_desktop_margin' => '',
	        'desktop_mini_margin' => '',
	        'custom_mini_desktop_margin' => '',
	        'ipad_margin' => '',
	        'custom_ipad_margin' => '',
	        'mobile_margin' => '',
	        'custom_mobile_margin' => '',
	        'brando_row_animation_style' => '',
	        'brando_row_mobile_padding' => '',
	        'brando_row_ipad_padding' => '',
	        'id' => '',
	        'class' => '',
	        'position_relative' => '',
	        'overflow_hidden' => '',
	        'hide_background' => '',
	        'hide_background_ipad' => '',
	        'brando_min_height' => '',
	        'brando_image_pos_x' => '',
	        'brando_image_pos_y' => '',
	        'brando_image_srcset' => 'full',
	        'brando_token_class' => '',
	    ), $atts ) );

		global $tz_featured_array, $tz_featured_mini_desktop_array, $tz_featured_ipad_array, $tz_featured_mobile_array;
		$output = $padding = $padding_style = $margin = $margin_style = $style_attr = $overlay_style = '';
		$classes = $style_array = array();

		$id = ( $id ) ? ' id="'.$id.'"' : '';
		$class = ( $class ) ? $classes[] = $class : '';
		$equal_height = ( $equal_height ) ? $classes[] = 'row-equal-height' : '';
		$classes[] = $brando_token_class;
		$content_placement = ( $content_placement ) ? $classes[] = 'row-content-' . $content_placement : '';
		$position_relative = ($position_relative == 1) ? $classes[] = 'position-relative' : '';
		$overflow_hidden = ($overflow_hidden == 1) ? $classes[] = 'overflow-hidden' : '';
		$fullscreen = ($fullscreen) ? $classes[] = 'full-screen' : '';
		$hide_background = ($hide_background == 1) ? $classes[] = 'xs-no-background' : '';
		$hide_background_ipad = ($hide_background_ipad == 1) ? $classes[] = 'sm-no-background' : '';
		$brando_row_mobile_padding = ( $brando_row_mobile_padding ) ? $brando_row_mobile_padding : '';
		$brando_row_ipad_padding = ($brando_row_ipad_padding) ? $brando_row_ipad_padding : '';
		$brando_min_height = ( $brando_min_height ) ? $style_array[] = 'min-height:'.$brando_min_height.';' : '';
		$brando_image_srcset = ($brando_image_srcset) ? $brando_image_srcset : 'full';

		$brando_image_pos_x = ( $brando_image_pos_x ) ? $brando_image_pos_x : '';
		$brando_image_pos_y = ( $brando_image_pos_y ) ? ' '.$brando_image_pos_y : '';

		// For Border
		$brando_row_border_pos = ($brando_row_border_position) ? $brando_row_border_position.': ' : '';
		if($brando_row_border_pos){
			$brando_row_border_pos .= ($brando_border_size) ? $brando_border_size : '';
			$brando_row_border_pos .= ($brando_border_type) ? ' '.$brando_border_type : '';
			$brando_row_border_pos .= ($brando_row_border_color) ? ' '.$brando_row_border_color : '';
			$brando_row_border_pos .= ';';
		}
		$style_array[] = $brando_row_border_pos;

		// Section Padding Settings
		$padding_setting = ( $padding_setting ) ? $padding_setting : '';
		if( $padding_setting ){
			$desktop_padding_setting = ( $desktop_padding && $desktop_padding != 'custom-desktop-padding' ) ?  $classes[] = $desktop_padding : '';
			$desktop_mini_padding_setting = ( $desktop_mini_padding && $desktop_mini_padding != 'custom-mini-desktop-padding' ) ?  $classes[] = $desktop_mini_padding : '';
	    	$ipad_padding_setting = ( $ipad_padding && $ipad_padding != 'custom-ipad-padding' ) ? $classes[] = $ipad_padding : '';
	    	$mobile_padding_setting = ( $mobile_padding && $mobile_padding != 'custom-mobile-padding' ) ? $classes[] = $mobile_padding : '';
	    	$custom_desktop_padding = ( $custom_desktop_padding ) ? $custom_desktop_padding : '';
	        $custom_ipad_padding = ( $custom_ipad_padding ) ? $custom_ipad_padding : '';
	        $custom_mobile_padding = ( $custom_mobile_padding ) ? $custom_mobile_padding : '';
	        $custom_mini_desktop_padding = ( $custom_mini_desktop_padding ) ? $custom_mini_desktop_padding : '';

	        ( $custom_desktop_padding && $desktop_padding == 'custom-desktop-padding' ) ? $tz_featured_array[] = '.'.$brando_token_class.'{ padding:'.$custom_desktop_padding.' !important; }' : '';
	        ( $custom_mini_desktop_padding && $desktop_mini_padding == 'custom-mini-desktop-padding' ) ? $tz_featured_mini_desktop_array[] =  '.'.$brando_token_class.'{ padding:'.$custom_mini_desktop_padding.' !important; }' : '';
	        ( $custom_ipad_padding && $ipad_padding == 'custom-ipad-padding' ) ? $tz_featured_ipad_array[] = '.'.$brando_token_class.'{ padding:'.$custom_ipad_padding.' !important;}' : '';
	        ( $custom_mobile_padding && $mobile_padding == 'custom-mobile-padding' ) ? $tz_featured_mobile_array[] = '.'.$brando_token_class.'{ padding:'.$custom_mobile_padding.' !important;}' : '';
		}

		// Section Margin Settings
		$margin_setting = ( $margin_setting ) ? $margin_setting : '';
		if( $margin_setting ){
			$desktop_margin_setting = ( $desktop_margin && $desktop_margin != 'custom-desktop-margin' ) ? $classes[] = $desktop_margin : '';
			$desktop_mini_margin_setting = ( $desktop_mini_margin && $desktop_mini_margin != 'custom-desktop-margin' ) ? $classes[] = $desktop_mini_margin : '';
	    	$ipad_margin_setting = ( $ipad_margin && $ipad_margin != 'custom-ipad-margin' ) ? $classes[] = $ipad_margin : '';
	    	$mobile_margin_setting = ( $mobile_margin && $mobile_margin != 'custom-mobile-margin' ) ? $classes[] = $mobile_margin : '';
	    	$custom_desktop_margin = ( $custom_desktop_margin ) ? $custom_desktop_margin : '';
	        $custom_ipad_margin = ( $custom_ipad_margin ) ? $custom_ipad_margin : '';
	        $custom_mobile_margin = ( $custom_mobile_margin ) ? $custom_mobile_margin : '';
	        $custom_mini_desktop_margin = ( $custom_mini_desktop_margin ) ? $custom_mini_desktop_margin : '';

	        ( $custom_desktop_margin && $desktop_margin == 'custom-desktop-margin' ) ? $tz_featured_array[] = '.'.$brando_token_class.'{ margin:'.$custom_desktop_margin.' !important; }' : '';
	        ( $custom_mini_desktop_margin && $desktop_mini_margin == 'custom-mini-desktop-margin' ) ? $tz_featured_mini_desktop_array[] =  '.'.$brando_token_class.'{ margin:'.$custom_mini_desktop_margin.' !important; }' : '';
	        ( $custom_ipad_margin && $ipad_margin == 'custom-ipad-margin' ) ? $tz_featured_ipad_array[] = '.'.$brando_token_class.'{ margin:'.$custom_ipad_margin.' !important;}' : '';
	        ( $custom_mobile_margin && $mobile_margin == 'custom-mobile-margin' ) ? $tz_featured_mobile_array[] = '.'.$brando_token_class.'{ margin:'.$custom_mobile_margin.' !important;}' : '';
		}

		/* For Animation*/
		$brando_row_animation_style_att = ($brando_row_animation_style) ? $classes[] = 'wow '.$brando_row_animation_style.'' : '';
	        
		$brando_row_section_style = $brando_row_section_class  = $brando_row_section_class_att = $brando_row_section_id = '';
		$srcset = $srcset_data = '';
        $srcset = wp_get_attachment_image_srcset( $brando_row_bg_image, $brando_image_srcset );
        if( $srcset ){
            $srcset_data = ' data-bg-srcset="'.esc_attr( $srcset ).'"';
            $classes[] = 'bg-image-srcset';
        }
		// Class List
		$class_list = implode(" ", $classes);
		$row_class = ( $class_list ) ? ' class="'.$class_list.'"' : '';

		// Style Property List
		$style_property_list = implode(" ", $style_array);
		$style_property = ( $style_property_list ) ? ' style="'.$style_property_list.'"' : '';

		if(empty($brando_row_style)){
			$output .= '<div'.$id.$row_class.$style_property.'>';
		        $output .=  do_shortcode($content);
		    $output .= '</div>';
		}else{
			switch ($brando_row_style) {
				case 'color':
					$output .= '<div'.$id.$row_class.$style_property.'>';
		                    $output .=  do_shortcode($content);
	                $output .= '</div>';
	            break;
				case 'image':
					$brando_overlay_opacity_att = ($brando_overlay_opacity) ? ' opacity:'.$brando_overlay_opacity.';' : '';
					$brando_row_overlay_color_att = ($brando_row_overlay_color) ? ' background-color:'.$brando_row_overlay_color.';' : '';
					$brando_z_index = ($brando_z_index) ? ' z-index:'.$brando_z_index.';' : '';
					if( $brando_overlay_opacity_att || $brando_row_overlay_color_att || $brando_z_index ){
						$overlay_style = ' style="'.$brando_overlay_opacity_att.$brando_row_overlay_color_att.$brando_z_index.'"';
					}

					$output .= '<div'.$id.$row_class.$style_property.$srcset_data.'>';

						if($show_overlay=='1'){
							$output .= '<div class="opacity-full"'.$overlay_style.'></div>';
						}
						if( $content ){
		                	$output .=  do_shortcode($content);
		            	}
		            	
	                $output .= '</div>';
			    break;
			}
		}
		return $output;
	}
}
add_shortcode( 'vc_row_inner', 'brando_inner_row' );
?>