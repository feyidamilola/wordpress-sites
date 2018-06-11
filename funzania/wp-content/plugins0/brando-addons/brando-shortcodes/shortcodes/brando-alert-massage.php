<?php
/**
 * Shortcode For Alert Message
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Alert Message */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'brando_alert_massage_shortcode' ) ) {
	function brando_alert_massage_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
	        	'id' => '',
	        	'class' => '',
	        	'brando_alert_massage_premade_style' => '',
	        	'brando_alert_massage_type' => '',
	        	'brando_message_icon' => '',
	        	'brando_highlight_title' => '',
	        	'brando_subtitle' => '',
	        	'show_close_button' => '',
	        	'custom_icon' => '',
                'custom_icon_image' => '',
                'brando_custom_image_srcset' => 'full',
                'title_settings' => '',
                'subtitle_settings' => ''
	        ), $atts ) );
		$output = $fontsettings_title_id = $fontsettings_title_class = $fontsettings_subtitle_id = $fontsettings_subtitle_class = '';
		global $font_settings_array;
		$id = ($id) ? ' id="'.$id.'"' : '';
		$class = ( $class ) ? ' '.$class : '';
		$brando_alert_massage_premade_style = ( $brando_alert_massage_premade_style ) ? $brando_alert_massage_premade_style : '';
		$brando_alert_massage_type = ( $brando_alert_massage_type ) ? ' alert-'.$brando_alert_massage_type : '';
		$brando_message_icon = ( $brando_message_icon ) ? $brando_message_icon : '';
		$brando_highlight_title = ( $brando_highlight_title ) ? $brando_highlight_title : '';
		$brando_subtitle = ( $brando_subtitle ) ? $brando_subtitle : '';
		$show_close_button = ( $show_close_button ) ? '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' : '';

		//Font Settings For Title
		if( !empty( $title_settings ) ) {
		    $fontsettings_title_id = uniqid('brando-font-setting-');
		    $responsive_style_title = brando_Responsive_font_settings::generate_css( $title_settings, $fontsettings_title_id );
		    $fontsettings_title_class = ' '.$fontsettings_title_id;
		}
		( !empty( $responsive_style_title ) ) ? $font_settings_array[] = $responsive_style_title : '';
		//Font Settings For Sub Title
		if( !empty( $subtitle_settings ) ) {
		    $fontsettings_subtitle_id = uniqid('brando-font-setting-');
		    $responsive_style_subtitle = brando_Responsive_font_settings::generate_css( $title_settings, $fontsettings_subtitle_id );
		    $fontsettings_subtitle_class = ' '.$fontsettings_subtitle_id;
		}
		( !empty( $responsive_style_subtitle ) ) ? $font_settings_array[] = $responsive_style_subtitle : '';

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

		switch ($brando_alert_massage_premade_style) 
		{
			case 'alert-massage-style-1':

			   $output .= ' <div class="alert-style1">';
	                $output .= '<div'.$id.' class="alert'.$brando_alert_massage_type.$class.'" role="alert">';
	                	if( $custom_icon == 1 && !empty( $custom_image ) ) {
		                    $output .= '<img src="'.$custom_image[0].'"'.$image_alt.$image_title.' class="icon-image" width="'.$custom_image[1].'" height="'.$custom_image[2].'"'.$srcset_data_icon.$sizes_data_icon.' />';
		                }elseif($brando_message_icon){
                           $output .= '<i class="'.$brando_message_icon.'"></i>';
                        }
                        if($brando_highlight_title || $brando_subtitle){
                 	        $output .= '<span class="'.$fontsettings_subtitle_class.'">';
	                 	       	if($brando_highlight_title){
	                           		$output .= '<strong class="'.$fontsettings_title_class.'">'.$brando_highlight_title.'</strong> ';
	                       		}
	                           $output .= $brando_subtitle;
                            $output .= '</span>';
                        }        
                    $output .= '</div>';
                $output .= '</div>';
                
            break;

            case 'alert-massage-style-2':

		        $output .= '<div'.$id.' role="alert" class="alert'.$brando_alert_massage_type.$class.' fade in">';
		        	if( $custom_icon == 1 && !empty( $custom_image ) ) {
		                    $output .= '<img src="'.$custom_image[0].'"'.$image_alt.$image_title.' class="icon-image'.$brando_alert_massage_type.'" width="'.$custom_image[1].'" height="'.$custom_image[2].'"'.$srcset_data_icon.$sizes_data_icon.' />';
		            }elseif($brando_message_icon){
						$output .= '<i class="'.$brando_message_icon.$brando_alert_massage_type.'"></i>';
					}
					if($brando_highlight_title || $brando_subtitle){
		                $output .= ' <span class="'.$fontsettings_subtitle_class.'">';
			                $output .= '<strong class="'.$fontsettings_title_class.'">'.$brando_highlight_title.'</strong> ';
			                $output .= $brando_subtitle;
		                $output .= '</span>';
	                }
	                $output .= $show_close_button;
	            $output .= '</div>';

            break;

			case 'alert-massage-style-3':

			   $output .= '<div'.$id.' role="alert" class="alert'.$brando_alert_massage_type.$class.' fade in">';
					if($brando_highlight_title || $brando_subtitle){
						$output .= '<span class="'.$fontsettings_subtitle_class.'">';
							if($brando_highlight_title){
								$output .= '<strong class="'.$fontsettings_title_class.'">'.$brando_highlight_title.'</strong> ';
							}
							$output .= $brando_subtitle;
						$output .= '</span>';
					}
					$output .= $show_close_button;
	            $output .= '</div>';

			break;

            case 'alert-massage-style-4':

				$output .= '<div class="alert-style2">';
					$output .= '<div'.$id.' role="alert" class="alert'.$brando_alert_massage_type.$class.'">';
						if($brando_highlight_title || $brando_subtitle){
							$output .= '<span class="'.$fontsettings_subtitle_class.'">';
								if($brando_highlight_title){
									$output .= '<strong class="'.$fontsettings_title_class.'">'.$brando_highlight_title.'</strong> ';
								}
								$output .= $brando_subtitle;
							$output .= '</span>';
						}
						$output .= $show_close_button;
		            $output .= '</div>';
		        $output .= '</div>';

		    break;

			case 'alert-massage-style-5':

				$output .= '<div'.$id.' role="alert" class="alert alert-block fade in'.$brando_alert_massage_type.$class.'">';
					$output .= $show_close_button;
					if($brando_highlight_title){
						$output .= '<span class="margin-two no-margin-top no-margin-lr alt-font font-weight-700 text-medum text-uppercase'.$brando_alert_massage_type.''.$fontsettings_title_class.'">'.$brando_highlight_title.'</span>';
					}
					if($brando_subtitle){
						$output .= '<p class="'.$fontsettings_subtitle_class.'">'.$brando_subtitle.'</p>';
					}
		        $output .= '</div>';

			break;
		}
	    return $output;
	}
}
add_shortcode('brando_alert_massage','brando_alert_massage_shortcode');
?>