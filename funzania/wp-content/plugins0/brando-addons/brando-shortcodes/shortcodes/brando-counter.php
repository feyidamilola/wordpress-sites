<?php
/**
 * Shortcode For Counter 
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Brando Counter  */
/*-----------------------------------------------------------------------------------*/
$count = 1;
if ( ! function_exists( 'brando_counter_or_skill_shortcode' ) ) {
    function brando_counter_or_skill_shortcode( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'counter_or_chart' => '',
            'counter_icon' =>'',
            'counter_number' => '',
            'counter_number_style' => '',
            'counter_number_color' => '',
            'brando_seperator' => '',
            'title' => '',
            'title_style' => '',
            'title_color' => '',
            'icon_color' => '',
            'counter_icon_size' => '',
            'counter_animation_duration' => '7000',
            'brando_row_animation_style' => '',
            'brando_show_separator' => '',
            'brando_sep_color' => '',
            'separator_height' => '',
            'custom_icon' => '',
            'custom_icon_image' => '',
            'brando_custom_image_srcset' => 'full',
            'title_settings' => '',
            'counter_settings' => '',
        ), $atts ) );

        $output = '';   

    	global $count,$font_settings_array;
    	
    	$counter_style_attr = $counter_class_attr = $title_style_attr = $title_class_attr = $sep_style = '';
        $classes_span1 = $classes_span2 = $classes_icon = $style_array = array();
    	$counter_icon = ( $counter_icon ) ? $classes_icon[] = $counter_icon : '' ;
    	$counter_icon_size = ( $counter_icon_size ) ? $classes_icon[] = $counter_icon_size : $classes_icon[] ='medium-icon';
    	$counter_animation_duration = ( $counter_animation_duration ) ? $counter_animation_duration : '7000';
    	$brando_row_animation_style = ( $brando_row_animation_style ) ? $classes_span1[] = 'wow '.$brando_row_animation_style : '';
    	$counter_number = ( $counter_number ) ? $counter_number : '';
    	$icon_color = ($icon_color) ? ' style ="color: '.$icon_color.'"' : '';
    	// For Counter Style
    	if($counter_number_style == 'custom'){
    		$style_array[] = ( $counter_number_color ) ? 'color: '.$counter_number_color.';' : '';
    	}else{
    		$classes_span1[]  = ( $counter_number_style ) ?  $counter_number_style : '';
    	}
    	// For Title Style
    	if($title_style == 'custom'){
    		$title_style_attr = ( $title_color ) ? ' style="color: '.$title_color.'"' : '';
    	}else{
    		 $classes_span2[] =  ( $title_style ) ? $title_style : '';
    	}
        $brando_sep_color = ( $brando_sep_color ) ? 'background:'.$brando_sep_color.' !important; ' : ''; 
        $brando_seperator_height = ( $separator_height ) ? 'height:'.$separator_height.' !important;' : ''; 
        if( $brando_sep_color || $brando_seperator_height){
            $sep_style .= ' style="'.$brando_sep_color.$brando_seperator_height.'"';
        }

        $class_list1 = implode(" ", $classes_span1);
        $counter_class_attr = ( $class_list1 ) ? ' '.$class_list1 : '';

        $class_list2 = implode(" ", $classes_span2);
        $title_class_attr = ( $class_list2 ) ? ' '.$class_list2 : '';

        $class_list3 = implode(" ", $classes_icon);
        $class_icon_attr = ( $class_list3 ) ? ' class="'.$class_list3.'"' : '';

        $style_property_list = implode(" ", $style_array);
        $counter_style_attr = ( $style_property_list ) ? ' style="'.$style_property_list.'"' : '';

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

        /* Image Alt, Title, Caption */
        $img_alt = brando_option_image_alt($custom_icon_image);
        $img_title = brando_option_image_title($custom_icon_image);
        $image_alt = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
        $image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

        //Font Settings For Title
        $fontsettings_title_id = $responsive_style_title = $fontsettings_title_class = $fontsettings_counter_id = $responsive_style_counter = $fontsettings_counter_class = "";
        if( !empty( $title_settings ) ) {
            $fontsettings_title_id = uniqid('brando-font-setting-');
            $responsive_style_title = brando_Responsive_font_settings::generate_css( $title_settings, $fontsettings_title_id );
            $fontsettings_title_class = ' '.$fontsettings_title_id;
        }
        ( !empty( $responsive_style_title ) ) ? $font_settings_array[] = $responsive_style_title : '';
        //Font Settings For counter number
        if( !empty( $counter_settings ) ) {
            $fontsettings_counter_id = uniqid('brando-font-setting-');
            $responsive_style_counter = brando_Responsive_font_settings::generate_css( $counter_settings, $fontsettings_counter_id );
            $fontsettings_counter_class = ' '.$fontsettings_counter_id;
        }
        ( !empty( $responsive_style_counter ) ) ? $font_settings_array[] = $responsive_style_counter : '';

        switch ($counter_or_chart) {
            case 'counter-style1':
                $count++;
                    if( $custom_icon == 1 && !empty( $custom_image ) ) {
                        $output .= '<div class="col-md-4 col-sm-5 col-xs-12 no-padding xs-margin-five-bottom">';
                            $output .= '<img src="'.$custom_image[0].'"'.$image_alt.$image_title.' class="icon-image" width="'.$custom_image[1].'" height="'.$custom_image[2].'"'.$srcset_data_icon.$sizes_data_icon.' />';
                        $output .= '</div>';
                        $output .= '<div class="col-md-8 col-sm-7 col-xs-12 text-left xs-text-center">';
                    }elseif( $counter_icon ){
		                $output .= '<div class="col-md-4 col-sm-5 col-xs-12 no-padding xs-margin-five-bottom">';
		                    $output .= '<i'.$class_icon_attr.$icon_color.'></i>';
		                $output .= '</div>';
		                $output .= '<div class="col-md-8 col-sm-7 col-xs-12 text-left xs-text-center">';
	            	}
	    			$output .= '<div class="counter-style1">';
	                    if( $counter_number ){
	                       $output .= '<span class="timer counter-number alt-font font-weight-600'.$counter_class_attr.''.$fontsettings_counter_class.'" data-to="'.$counter_number.'" data-speed="'.$counter_animation_duration.'"'.$counter_style_attr.'>'.$counter_number.'</span>';
                        }
	                    if( $title ){
	                       $output .= '<span class="text-small text-uppercase margin-three-top xs-margin-one-top display-block alt-font'.$title_class_attr.''.$fontsettings_title_class.'"'.$title_style_attr.'>'.$title.'</span>';
                        }
	                $output .= '</div>';
		            if( $counter_icon ){
	                	$output .= '</div>';
	            	}
            break;

            case 'counter-style2':
                $count++;
                $counter_id = '#counter_'.$count;
                $output .= ' <div class="counter-style1 text-center sm-margin-eleven sm-no-margin-lr sm-no-margin-top">';
                    if( $counter_number ){
                        $output .= ' <span class="timer counter-number font-weight-600 alt-font'.$counter_class_attr.''.$fontsettings_counter_class.'" data-to="'.$counter_number.'" data-speed="'.$counter_animation_duration.'"'.$counter_style_attr.'>'.$counter_number.'</span>';
                    }
                    if( $title ){
                        $output .= '<span class="text-small text-uppercase margin-four-tb xs-margin-two-tb display-block alt-font font-weight-600'.$title_class_attr.''.$fontsettings_title_class.'"'.$title_style_attr.'>'.$title.'</span>';
                    }
                    if( $custom_icon == 1 && !empty( $custom_image ) ) {
                        $output .= '<img src="'.$custom_image[0].'"'.$image_alt.$image_title.' class="icon-image" width="'.$custom_image[1].'" height="'.$custom_image[2].'"'.$srcset_data_icon.$sizes_data_icon.' />';
                    }elseif( $counter_icon ){
                        $output .= '<i'.$class_icon_attr.$icon_color.'></i>';
                    }
               $output .= '</div>';   
            break;

            case 'counter-style3':
                $count++;
                $counter_id = '#counter_'.$count;
                $output .= ' <div class="col-md-2 col-sm-3 no-padding xs-display-none">';
                    if( $brando_show_separator == 1 ){
                        $output .= '<div class="separator-line-medium-thick bg-black position-relative top9"'.$sep_style.'></div>';
                    }
                $output .= '</div>';
                $output .= '<div class="col-md-10 col-sm-9 no-padding counter-style1 xs-text-center">';
                    if( $counter_number ){
                        $output.= '<span class="timer counter-number alt-font title-medium font-weight-600'.$counter_class_attr.''.$fontsettings_counter_class.'" data-to="'.$counter_number.'" data-speed="'.$counter_animation_duration.'"'.$counter_style_attr.'>'.$counter_number.'</span>';
                    }
                    if( $title ){
                        $output.= '<span class="text-small text-uppercase display-block alt-font margin-two-all no-margin-lr'.$title_class_attr.''.$fontsettings_title_class.'"'.$title_style_attr.'>'.$title.'</span>';
                    }
                $output.= '</div>';
            break;
        }
        return $output;        
    }
}
add_shortcode( 'brando_counter_or_skill', 'brando_counter_or_skill_shortcode' );
?>