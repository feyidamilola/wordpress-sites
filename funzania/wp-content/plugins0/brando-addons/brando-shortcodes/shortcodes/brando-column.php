<?php
/**
 * Shortcode For Column
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Column */
/*-----------------------------------------------------------------------------------*/
function vc_column( $atts, $content = '', $id = '' ) {
	extract( shortcode_atts( array(
		'column_style' => '',
		'column_bg_color' => '',
		'column_bg_image' => '',
		'column_image_border' => '',
		'column_image_border_color' => '',
		'column_image_type' => '',
		'column_bg_image_type' => '',
		'column_parallax_image_type' => '',
		'column_full' => '',
    	'centralized_div' => '',
    	'min_height' => '',
        'alignment_setting' => '',
        'border_setting' => '',
        'desktop_show_border' => '',
        'desktop_border_type' => '',
        'column_border_color' => '',
        'column_border_size' => '',
        'column_border_type' => '',
        'ipad_border' => '',
        'mobile_border' => '',
        'desktop_alignment' => '',
        'desktop_mini_alignment' => '',
        'ipad_alignment' => '',
        'mobile_alignment' => '',
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
        'display_setting' => '',
        'desktop_display' => '',
        'ipad_display' => '',
        'mobile_display' => '',
        'enable_clear_both' => '',
        'desktop_clear_both' => '',
        'desktop_mini_clear_both' => '',
        'ipad_clear_both' => '',
        'mobile_clear_both' => '',
        'pull_right' => '',
        'width' => '',
        'offset' => '',
        'brando_column_animation_style' => '',
        'brando_column_animation_duration' => '',
        'fullscreen' => '',
        'id' => '',
		'class' => '',
		'position_relative' => '',
		'overflow_hidden' => '',
		'show_overlay' => '',
		'brando_overlay_opacity' => '',
		'brando_column_overlay_color' => '',
		'brando_image_srcset' => 'full',
		'brando_token_class' => '',
	), $atts ) );
	// Define Empty Variables.
	global $tz_featured_array, $tz_featured_mini_desktop_array, $tz_featured_ipad_array, $tz_featured_mobile_array;
	$output = $class_list = $style_property = $column_border_pos = $style_attr = $min_height_class = $srcset = $srcset_data = $data_style_attr = $front_border_pos = '';
	$classes = $style_array = $front_classes = array();
	$brando_image_srcset = ($brando_image_srcset) ? $brando_image_srcset : 'full';
	// Specify Column default class
	$classes[] = 'wpb_column brando-column-container';
	$front_classes[] = 'brando-column-container';
	$classes[] = $front_classes[] = $brando_token_class;
	$position_relative = ( $position_relative == 1 ) ? $classes[] = $front_classes[] = 'position-relative' : '';
	$overflow_hidden = ( $overflow_hidden == 1 ) ? $classes[] = $front_classes[] = 'overflow-hidden' : '';
	$fullscreen = ( $fullscreen == 1 ) ? $classes[] = $front_classes[] = 'full-screen' : '';
	// Column Offset and sm width

	$offset = ( $offset ) ? str_replace( 'vc_', '', $offset ) : '';
	if(strchr($offset,'col-xs')){
		$classes[] = $front_classes[] = $offset;
	}else{
		$classes[] = $front_classes[] = $offset." col-xs-mobile-fullwidth";
	}

	if($width != ''){
		$width = explode('/', $width);
    	$width = ( $width[0] != '1' ) ? $classes[] = $front_classes[] = 'col-sm-'.$width[0] * floor(12 / $width[1]) : $classes[] = $front_classes[] = 'col-sm-'.floor(12 / $width[1]);
	}

	$brando_classes = '';
	if( $width ){
		$brando_classes = ' front-column-class';
	} else {
		if( strchr( $offset,'col-lg-1' ) || strchr( $offset,'col-lg-2' ) || strchr( $offset,'col-lg-3' ) || strchr( $offset,'col-lg-4' ) || strchr( $offset,'col-lg-5' ) || strchr( $offset,'col-lg-6' ) || strchr( $offset,'col-lg-7' ) || strchr( $offset,'col-lg-8' ) || strchr( $offset,'col-lg-9' ) || strchr( $offset,'col-lg-10' ) ||  strchr( $offset,'col-lg-11' ) || strchr( $offset,'col-lg-12' ) ) {
			$brando_classes = ' front-column-class';
		} else if( strchr( $offset,'col-md-1' ) || strchr( $offset,'col-md-2' ) || strchr( $offset,'col-md-3' ) || strchr( $offset,'col-md-4' ) || strchr( $offset,'col-md-5' ) || strchr( $offset,'col-md-6' ) || strchr( $offset,'col-md-7' ) || strchr( $offset,'col-md-8' ) || strchr( $offset,'col-md-9' ) || strchr( $offset,'col-md-10' ) ||  strchr( $offset,'col-md-11' ) || strchr( $offset,'col-md-12' ) ) {
			$brando_classes = ' front-column-class';
		} else if( strchr( $offset,'col-xs-1' ) || strchr( $offset,'col-xs-2' ) || strchr( $offset,'col-xs-3' ) || strchr( $offset,'col-xs-4' ) || strchr( $offset,'col-xs-5' ) || strchr( $offset,'col-xs-6' ) || strchr( $offset,'col-xs-7' ) || strchr( $offset,'col-xs-8' ) || strchr( $offset,'col-xs-9' ) || strchr( $offset,'col-xs-10' ) ||  strchr( $offset,'col-xs-11' ) || strchr( $offset,'col-xs-12' ) ) {
			$brando_classes = ' front-column-class';
		}
	}

	// Column Id And Class.
	$id = ( $id ) ? ' id="'.$id.'"' : '';
	$class = ( $class ) ? $classes[] = $front_classes[] = $class : '';

	if( $enable_clear_both == 1 ){
		$desktop_clear_both = ( $desktop_clear_both ) ? $classes[] = $front_classes[] = $desktop_clear_both : '';
		$desktop_mini_clear_both = ( $desktop_mini_clear_both ) ? $classes[] = $front_classes[] = $desktop_mini_clear_both : '';
		$ipad_clear_both = ( $ipad_clear_both ) ? $classes[] = $front_classes[] = $ipad_clear_both : '';
		$mobile_clear_both = ( $mobile_clear_both ) ? $classes[] = $front_classes[] = $mobile_clear_both : '';
	}
	$centralized_div = ( $centralized_div == 1 ) ? $classes[] = $front_classes[] = 'center-col' : '';
	$pull_right = ( $pull_right ) ? $classes[] = $front_classes[] = 'pull-right': ''; 
	// Column without container
	$column_full = ( $column_full ) ? $column_full : '';

	// Column Animation 
	$brando_column_animation_style = ( $brando_column_animation_style ) ? $classes[] = $front_classes[] = ' wow '.$brando_column_animation_style : '';
	$brando_column_animation_duration = ( $brando_column_animation_duration ) ? ' data-wow-duration= '.$brando_column_animation_duration.'ms' : '';

	// Column Allignment settings
	$alignment_setting = ( $alignment_setting ) ? $alignment_setting : '';
	if( $alignment_setting ){
		$desktop_alignment = ( $desktop_alignment ) ? $classes[] = $front_classes[] = $desktop_alignment : '';
		$desktop_mini_alignment = ( $desktop_mini_alignment ) ? $classes[] = $front_classes[] = $desktop_mini_alignment : '';
		$ipad_alignment = ( $ipad_alignment ) ? $classes[] = $front_classes[] = $ipad_alignment : '';
		$mobile_alignment = ( $mobile_alignment ) ? $classes[] = $front_classes[] = $mobile_alignment : '';
	}

	// Set min-height
		$min_height = ( $min_height ) ? $min_height : '';
		if( $min_height ){
			$style_array[] = 'min-height:'.$min_height.';';
			$data_style_attr .= ' data-min-height="'.$min_height.'"';
			$min_height_class .= ' column-min-height';
		}

	// Column Border Settings

	$border_setting = ( $border_setting ) ? $border_setting : '';
	if( $border_setting == 1 ){
	    $desktop_show_border = ( $desktop_show_border ) ? $desktop_show_border : '';
	    $desktop_border_type = ( $desktop_border_type ) ? $desktop_border_type : '';
	    if( $desktop_show_border && $desktop_border_type && $desktop_border_type != 'no-border' ){
		    $column_border_pos .= $desktop_border_type.': ';
			if( $desktop_border_type ){
			    $border_size = ( $column_border_size ) ? $column_border_pos .= $column_border_size : $column_border_pos .= '1px';
			    $border_type = ( $column_border_type ) ? $column_border_pos .= ' '.$column_border_type : $column_border_pos .= ' solid';
			    $border_color = ( $column_border_color ) ? $column_border_pos .= ' '.$column_border_color.';' : $column_border_pos .= ' #e5e5e5;';

			    $border_size_front = ( $column_border_size ) ? $front_border_pos .= $column_border_size : $front_border_pos .= '1px';
			    $border_type = ( $column_border_type ) ? $front_border_pos .= ' '.$column_border_type : $front_border_pos .= ' solid';
			    $border_color = ( $column_border_color ) ? $front_border_pos .= ' '.$column_border_color.'' : $front_border_pos .= ' #e5e5e5';
			}
			$style_array[] = $column_border_pos;
			$data_style_attr .= ' data-'.$desktop_border_type.'="'.$front_border_pos.'"';
		}else{
			if( $desktop_border_type ){
				$classes[] = $front_classes[] = $desktop_border_type;
			}
		}
	    $ipad_border = ( $ipad_border != 1 ) ? $classes[] = $front_classes[] = 'sm-no-border': '';
	    $mobile_border = ( $mobile_border != 1 ) ? $classes[] = $front_classes[] = 'xs-no-border' : '';
	}

	// Section Padding Settings
	$padding_setting = ( $padding_setting ) ? $padding_setting : '';
	if( $padding_setting ){
		$desktop_padding_setting = ( $desktop_padding && $desktop_padding != 'custom-desktop-padding' ) ?  $classes[] = $front_classes[] = $desktop_padding : '';
		$desktop_mini_padding_setting = ( $desktop_mini_padding && $desktop_mini_padding != 'custom-mini-desktop-padding' ) ?  $classes[] = $front_classes[] = $desktop_mini_padding : '';
    	$ipad_padding_setting = ( $ipad_padding && $ipad_padding != 'custom-ipad-padding' ) ? $classes[] = $front_classes[] = $ipad_padding : '';
    	$mobile_padding_setting = ( $mobile_padding && $mobile_padding != 'custom-mobile-padding' ) ? $classes[] = $front_classes[] = $mobile_padding : '';
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
		$desktop_margin_setting = ( $desktop_margin && $desktop_margin != 'custom-desktop-margin' ) ? $classes[] = $front_classes[] = $desktop_margin : '';
		$desktop_mini_margin_setting = ( $desktop_mini_margin && $desktop_mini_margin != 'custom-desktop-margin' ) ? $classes[] = $front_classes[] = $desktop_mini_margin : '';
    	$ipad_margin_setting = ( $ipad_margin && $ipad_margin != 'custom-ipad-margin' ) ? $classes[] = $front_classes[] = $ipad_margin : '';
    	$mobile_margin_setting = ( $mobile_margin && $mobile_margin != 'custom-mobile-margin' ) ? $classes[] = $front_classes[] = $mobile_margin : '';
    	$custom_desktop_margin = ( $custom_desktop_margin ) ? $custom_desktop_margin : '';
        $custom_ipad_margin = ( $custom_ipad_margin ) ? $custom_ipad_margin : '';
        $custom_mobile_margin = ( $custom_mobile_margin ) ? $custom_mobile_margin : '';
        $custom_mini_desktop_margin = ( $custom_mini_desktop_margin ) ? $custom_mini_desktop_margin : '';

        ( $custom_desktop_margin && $desktop_margin == 'custom-desktop-margin' ) ? $tz_featured_array[] = '.'.$brando_token_class.'{ margin:'.$custom_desktop_margin.' !important; }' : '';
        ( $custom_mini_desktop_margin && $desktop_mini_margin == 'custom-mini-desktop-margin' ) ? $tz_featured_mini_desktop_array[] =  '.'.$brando_token_class.'{ margin:'.$custom_mini_desktop_margin.' !important; }' : '';
        ( $custom_ipad_margin && $ipad_margin == 'custom-ipad-margin' ) ? $tz_featured_ipad_array[] = '.'.$brando_token_class.'{ margin:'.$custom_ipad_margin.' !important;}' : '';
        ( $custom_mobile_margin && $mobile_margin == 'custom-mobile-margin' ) ? $tz_featured_mobile_array[] = '.'.$brando_token_class.'{ margin:'.$custom_mobile_margin.' !important;}' : '';
	}

	// Column Display setting
	$display_setting = ($display_setting) ? $display_setting : '';
	if( $display_setting ){
	    $desktop_display = ($desktop_display) ? $classes[] = $front_classes[] = $desktop_display : '';
	    $ipad_display = ($ipad_display) ? $classes[] = $front_classes[] = $ipad_display : '';
	    $mobile_display = ($mobile_display) ? $classes[] = $front_classes[] = $mobile_display : '';
	}

	// Check Column Type .
	$column_style = ( $column_style ) ? $column_style : '';

	switch ( $column_style ) {
		case 'color':
			$column_back_color = ( $column_bg_color ) ? $style_array[] = 'background-color:'.$column_bg_color.';' : '';
			if( $column_bg_color ){
				$data_style_attr .= ' data-background-color="'.$column_bg_color.'"';
			}
		break;
		case 'image':
            $srcset = wp_get_attachment_image_srcset( $column_bg_image, $brando_image_srcset );
            if( $srcset ){
                $srcset_data = ' data-bg-srcset="'.esc_attr( $srcset ).'"';
                $classes[] = $front_classes[] = 'bg-image-srcset';
            }
			$image_url = wp_get_attachment_url( $column_bg_image );
			$brando_overlay_opacity_att = ($brando_overlay_opacity) ? ' opacity:'.$brando_overlay_opacity.';' : '';
			$brando_column_overlay_color_att = ($brando_column_overlay_color) ? ' background-color:'.$brando_column_overlay_color.';' : '';
			$column_bg_image_property = ($image_url) ? $style_array[] = 'background: url('.$image_url.');' : '';
			if( $image_url ){
				$data_style_attr .= ' data-background="'.$image_url.'"';
			}
			$column_image_type = ( $column_image_type == 'parallax' ) ? $classes[] = $front_classes[] = 'parallax-fix' : '';
			$column_parallax_image_type = ( $column_parallax_image_type ) ? $classes[] = $front_classes[] = $column_parallax_image_type : '';
			$column_bg_image_type = ( $column_bg_image_type ) ? $classes[] = $front_classes[] = $column_bg_image_type : '';
		break;
	}

	// Class List
	$class_list = implode(" ", $classes);
	$column_class = ( $class_list ) ? ' class="'.$class_list.'"' : '';

	// Front End Class List
	$front_class_list = implode(" ", $front_classes);
	$front_column_class = ( $front_class_list ) ? ' data-front-class="'.$front_class_list.'"' : '';

	// Style Property List
	$style_property_list = implode(" ", $style_array);
	$style_property = ( $style_property_list ) ? ' style="'.$style_property_list.'"' : '';

	if( $column_full ){
		$output .= do_shortcode( $content );
	}else{
		// Baground Image Border
		$column_image_border_color = ( $column_image_border_color ) ? ' style="border-color:'.$column_image_border_color.' !important"' : '';
		$column_border = ( $column_image_border == 1 ) ? '<div class="img-border img-border-medium border-color-white z-index-0"'.$column_image_border_color.'></div>' : '';

		$output .= '<div'.$id.$column_class.$front_column_class.$style_property.$brando_column_animation_duration.$srcset_data.$data_style_attr.'>';
			if($show_overlay=='1'){
				$output .= '<div class="opacity-full" style="'.$brando_overlay_opacity_att.$brando_column_overlay_color_att.'"></div>';
			}
			$output .= $column_border;
			$output .= '<div class="vc-column-innner-wrapper">';
				$output .= '<div class="wpd-innner-wrapper">';
					$output .= do_shortcode( $content );
				$output .= '</div>';
			$output .= '</div>';
		$output .= '</div>';
	}

	return $output;
}
add_shortcode( 'vc_column', 'vc_column' );
add_shortcode( 'vc_column_inner', 'vc_column' );