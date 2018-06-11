<?php
/**
 * Shortcode For Tab Content
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Tab Content */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'brando_tab_content_shortcode' ) ) {
    function brando_tab_content_shortcode( $atts, $content = null ) {
    	extract( shortcode_atts( array(
            	'brando_tab_content_premade_style' => '',
            	'brando_tab_content_left_title' => '',
                'brando_feature_image' =>'',
            	'brando_tab_content_left_title_show_separator' => '',
            	'brando_tab_content_left_content' => '',
            	'brando_tab_content_right_title' => '',
            	'brando_tab_content_left_title_show_separator_line' => '',
                'brando_tab_sub_title' =>'',
                'brando_tab_location'=>'',
                'brando_stars' => '',
                'brando_link' => '',
                'brando_link_target' => '',
                'brando_button_text' =>'',
            	'brando_tab_content_bottom_title' => '',
                'brando_left_image' => '',
                'brando_right_image' => '',
                'brando_number' => '',
                'brando_sep_color' => '',
                'separator_height' => '',
                'brando_title_color' => '',
                'brando_subtitle_color' => '',
                'brando_number_color' => '',
                'brando_separator_color' => '',
                'brando_image_srcset' => 'full',
                'title_settings' => '',
                'number_settings' => '',
                'sub_title_settings' => '',
                'location_settings' => '',
                'right_title_settings' => '',
                'bottom_title_settings' => '',
            ), $atts ) );
        global $font_settings_array;
    	$output = $button_color = $button_class = $sep_style = '';
        $brando_image_srcset = ($brando_image_srcset) ? $brando_image_srcset : 'full';
    	$brando_tab_content_premade_style = ( $brando_tab_content_premade_style ) ? $brando_tab_content_premade_style : '';
        $brando_tab_sub_title = ( $brando_tab_sub_title ) ? $brando_tab_sub_title : '';
        $brando_tab_location = ( $brando_tab_location ) ? $brando_tab_location : '';
        $brando_stars = ( $brando_stars ) ? $brando_stars : '';
    	$brando_tab_content_left_title = ( $brando_tab_content_left_title ) ? $brando_tab_content_left_title : '';
    	$brando_tab_content_left_title_show_separator = ($brando_tab_content_left_title_show_separator) ? $brando_tab_content_left_title_show_separator : '';
    	$brando_tab_content_left_content = ( $brando_tab_content_left_content ) ? $brando_tab_content_left_content : '';
    	$brando_tab_content_right_title = ( $brando_tab_content_right_title ) ? $brando_tab_content_right_title : '';
    	$brando_tab_content_left_title_show_separator_line = ( $brando_tab_content_left_title_show_separator_line ) ? $brando_tab_content_left_title_show_separator_line : '';
    	$brando_tab_content_bottom_title = ( $brando_tab_content_bottom_title ) ? $brando_tab_content_bottom_title : '';
        $brando_link = ( $brando_link ) ? ' href="'.$brando_link.'"' : '';
        $brando_link_target = ( $brando_link_target ) ? ' target="'.$brando_link_target.'"' : '';
        $brando_button_text = ( $brando_button_text ) ? $brando_button_text : '';
        $first_button_parse_args = vc_parse_multi_attribute($brando_button_text);
        $first_button_link = (isset($first_button_parse_args['url'])) ? $first_button_parse_args['url'] : '#';
        $first_button_title = (isset($first_button_parse_args['title'])) ? $first_button_parse_args['title'] : '';

        $brando_title_color = ( $brando_title_color ) ? ' style="color:'.$brando_title_color.' !important;"' : '';
        $brando_subtitle_color = ( $brando_subtitle_color ) ? ' style="color:'.$brando_subtitle_color.' !important;"' : '';
        $brando_number_color = ( $brando_number_color ) ? ' style="color:'.$brando_number_color.' !important;"' : '';
        $brando_separator_color = ( $brando_separator_color ) ? ' style="background:'.$brando_separator_color.' !important;"' : '';

        $brando_sep_color = ( $brando_sep_color ) ? 'background:'.$brando_sep_color.';' : '';
        $brando_seperator_height = ( $separator_height ) ? 'height:'.$separator_height.';' : '';

        if( $brando_sep_color || $brando_seperator_height ){
            $sep_style .= ' style="'.$brando_sep_color.$brando_seperator_height.'"';
        }

        /* Image Alt, Title, Caption */
        $img_alt = brando_option_image_alt($brando_feature_image);
        $img_title = brando_option_image_title($brando_feature_image);
        $image_alt = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
        $image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

        /* Image Alt, Title, Caption  For Left Image */
        $img_alt_left = brando_option_image_alt($brando_left_image);
        $img_title_left = brando_option_image_title($brando_left_image);
        $image_alt_left = ( isset($img_alt_left['alt']) && !empty($img_alt_left['alt']) ) ? ' alt="'.$img_alt_left['alt'].'"' : ' alt=""' ; 
        $image_title_left = ( isset($img_title_left['title']) && !empty($img_title_left['title']) ) ? ' title="'.$img_title_left['title'].'"' : '';

        /* Image Alt, Title, Caption For Right Image */
        $img_alt_right = brando_option_image_alt($brando_right_image);
        $img_title_right = brando_option_image_title($brando_right_image);
        $image_alt_right = ( isset($img_alt_right['alt']) && !empty($img_alt_right['alt']) ) ? ' alt="'.$img_alt_right['alt'].'"' : ' alt=""' ; 
        $image_title_right = ( isset($img_title_right['title']) && !empty($img_title_right['title']) ) ? ' title="'.$img_title_right['title'].'"' : '';

        $thumb = wp_get_attachment_image_src($brando_feature_image, $brando_image_srcset);
        $thumb_left = wp_get_attachment_image_src($brando_left_image, $brando_image_srcset);
        $thumb_right = wp_get_attachment_image_src($brando_right_image, $brando_image_srcset);

// 'title_settings'
// 'number_settings'
// 'sub_title_settings'
// 'location_settings'
// 'right_title_settings'
// 'bottom_title_settings'

        //Font Settings For Title
        $fontsettings_title_class = $fontsettings_title_id = $responsive_style_title = '';
        if( !empty( $title_settings ) ) {
            $fontsettings_title_id = uniqid('brando-font-setting-');
            $responsive_style_title = brando_Responsive_font_settings::generate_css( $title_settings, $fontsettings_title_id );
            $fontsettings_title_class = ' '.$fontsettings_title_id;
        }
        ( !empty( $responsive_style_title ) ) ? $font_settings_array[] = $responsive_style_title : '';

        //Font Settings For Number
        $fontsettings_number_class = $fontsettings_number_id = $responsive_style_number = '';
        if( !empty( $number_settings ) ) {
            $fontsettings_number_id = uniqid('brando-font-setting-');
            $responsive_style_number = brando_Responsive_font_settings::generate_css( $number_settings, $fontsettings_number_id );
            $fontsettings_number_class = ' '.$fontsettings_number_id;
        }
        ( !empty( $responsive_style_number ) ) ? $font_settings_array[] = $responsive_style_number : '';

        //Font Settings For Sub Title
        $fontsettings_subtitle_class = $fontsettings_subtitle_id = $responsive_style_subtitle = '';
        if( !empty( $sub_title_settings ) ) {
            $fontsettings_subtitle_id = uniqid('brando-font-setting-');
            $responsive_style_subtitle = brando_Responsive_font_settings::generate_css( $sub_title_settings, $fontsettings_subtitle_id );
            $fontsettings_subtitle_class = ' '.$fontsettings_subtitle_id;
        }
        ( !empty( $responsive_style_subtitle ) ) ? $font_settings_array[] = $responsive_style_subtitle : '';

        //Font Settings For location
        $fontsettings_location_class = $fontsettings_location_id = $responsive_style_location = '';
        if( !empty( $location_settings ) ) {
            $fontsettings_location_id = uniqid('brando-font-setting-');
            $responsive_style_location = brando_Responsive_font_settings::generate_css( $location_settings, $fontsettings_location_id );
            $fontsettings_location_class = ' '.$fontsettings_location_id;
        }
        ( !empty( $responsive_style_location ) ) ? $font_settings_array[] = $responsive_style_location : '';

        //Font Settings For Right Title
        $fontsettings_right_title_class = $fontsettings_right_title_id = $responsive_style_right_title = '';
        if( !empty( $right_title_settings ) ) {
            $fontsettings_right_title_id = uniqid('brando-font-setting-');
            $responsive_style_right_title = brando_Responsive_font_settings::generate_css( $right_title_settings, $fontsettings_right_title_id );
            $fontsettings_right_title_class = ' '.$fontsettings_right_title_id;
        }
        ( !empty( $responsive_style_right_title ) ) ? $font_settings_array[] = $responsive_style_right_title : '';

        //Font Settings For Bottom Title
        $fontsettings_bottom_title_class = $fontsettings_bottom_title_id = $responsive_style_bottom_title = '';
        if( !empty( $bottom_title_settings ) ) {
            $fontsettings_bottom_title_id = uniqid('brando-font-setting-');
            $responsive_style_bottom_title = brando_Responsive_font_settings::generate_css( $bottom_title_settings, $fontsettings_bottom_title_id );
            $fontsettings_bottom_title_class = ' '.$fontsettings_bottom_title_id;
        }
        ( !empty( $responsive_style_bottom_title ) ) ? $font_settings_array[] = $responsive_style_bottom_title : '';


    	  
    	switch ($brando_tab_content_premade_style) 
        {
    		case 'tab-content1':

                $output .= '<div class="row">';
    				if( $brando_tab_content_left_title || $brando_tab_content_left_title_show_separator || $brando_tab_content_left_content ){
    	                $output .= '<div class="col-md-6 col-sm-12 text-left gray-text xs-no-padding-lr">';
    	                	if( $brando_tab_content_left_title ){
    	                        if( $brando_link ){
                                    $output .= '<a'.$brando_link.''.$brando_link_target.'>';
                                } 
                                    $output .= '<span class="text-medium text-uppercase black-text'.$fontsettings_title_class.'">'.$brando_tab_content_left_title.'</span>';

                                if( $brando_link ){
                                    $output .= '</a>';
                                }
                            }
    	                    if( $brando_tab_content_left_title_show_separator ){
    	                    	$output .= '<div class="separator-line bg-yellow no-margin-lr sm-margin-five"'.$sep_style.'></div>';
                            }
    	                    if( $brando_tab_content_left_content ){
    	                    	$output .= '<p class="text-medium text-uppercase">'.$brando_tab_content_left_content.'</p>';
                            }
    	                $output .= '</div>';
    	            }
    	            if( $brando_tab_content_right_title || $content ){
    	                $output .= '<div class="col-md-6 col-sm-12 text-left text-med gray-text xs-no-padding-lr">';
    	                	if( $brando_tab_content_right_title ){
    	                    	$output .= '<p class="margin-fifteen no-margin-lr no-margin-top text-uppercase text-medium'.$fontsettings_right_title_class.'">'.$brando_tab_content_right_title.'</p>';
                            }
    	                    if( $content ){
    	                    	$output .= do_shortcode( brando_remove_wpautop( $content ) );
                            }
    	                $output .= '</div>';
    	            }
                $output .= '</div>';
               
                if( $brando_tab_content_left_title_show_separator_line == 1 ){
    	            $output .= '<div class="row"> ';
    	                $output .= '<div class="wide-separator-line"></div>';
    	            $output .= '</div>';
                }
                if( $brando_tab_content_bottom_title ){
    	            $output .= '<div class="row">';
    	                $output .= '<div class="text-extra-large text-uppercase'.$fontsettings_bottom_title_class.'">'.$brando_tab_content_bottom_title.'</div>';
    	            $output .= '</div>';
                }
                if( $brando_tab_content_left_title_show_separator_line == 1 ){
                    $output .= '<div class="row"> ';
                        $output .= '<div class="wide-separator-line"></div>';
                    $output .= '</div>';
                }
                
    		break;

            case 'tab-content2':

                $output .= '<div class="col-md-6 col-sm-6 col-xs-12 xs-text-center no-padding-left position-relative xs-margin-thirteen-bottom xs-no-padding-right">';
                    if($thumb[0]){
                        $srcset = $srcset_data = '';
                        $srcset = wp_get_attachment_image_srcset( $brando_feature_image, $brando_image_srcset );
                        if( $srcset ){
                            $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                        }

                        $sizes = $sizes_data = '';
                        $sizes = wp_get_attachment_image_sizes( $brando_feature_image, $brando_image_srcset );
                        if( $sizes ){
                            $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                        }
                        if( $brando_link ){
                            $output .= '<a'.$brando_link.''.$brando_link_target.'>';
                        }
                            $output .= '<img src="'.$thumb[0].'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'>';
                            
                        if( $brando_link ){
                            $output .= '</a>';
                        }
                    }
                    if( $brando_stars ){
                        $output .= '<div class="hotel-review position-absolute bg-dark-blue">';
                            for($j=1; $j <= $brando_stars; $j++)
                            {
                                $output.='<i class="fa fa-star deep-yellow-text icon-extra-small"> </i>';
                            }
                        $output .= '</div>';
                    }
                    $output .= '<div>';
                    if( $brando_tab_content_left_title ){                        
                        $output .= '<span class="text-extra-large alt-font margin-eight-top display-block light-gray-text'.$fontsettings_title_class.'"'.$brando_title_color.'>';
                            if( $brando_link ){
                                $output .= '<a'.$brando_link.''.$brando_link_target.''.$brando_title_color.'>';
                            }
                                $output .= $brando_tab_content_left_title;
                            if( $brando_link ){
                                $output .= '</a>';
                            }
                        $output .= '</span>';                       
                    }
                    if( $brando_tab_location ){
                        $output .= '<span class="text-small alt-font display-block'.$fontsettings_location_class.'"'.$brando_subtitle_color.'>'.$brando_tab_location.'</span>';
                    }
                    $output .= '</div>';
                $output .= '</div>';
                $output .= '<div class="col-md-6 col-sm-6 col-xs-12 no-padding-right position-relative top-minus7 xs-no-padding-left">';
                    if( $content ){
                        $output .= do_shortcode( brando_remove_wpautop( $content ) );
                    }
                    if( $first_button_title ){
                        $output .= '<a href="'.$first_button_link.'" class="highlight-button-gray-border btn btn-small margin-nine-top inner-link">'.$first_button_title.'</a>';
                    }
                $output .= '</div>';

            break;

            case 'tab-content3':

                $output .= '<div role="tabpanel" class="tab-pane fade in">';
                    $output .= '<div class="col-md-12 col-sm-12 treatments-box position-relative">';
                        if( $thumb_left[0] )
                        {
                            $srcset = $srcset_data = '';
                            $srcset = wp_get_attachment_image_srcset( $brando_left_image, $brando_image_srcset );
                            if( $srcset ){
                                $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                            }
                            $sizes = $sizes_data = '';
                            $sizes = wp_get_attachment_image_sizes( $brando_feature_image, $brando_image_srcset );
                            if( $sizes ){
                                $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                            }
                            $output .= '<div class="col-md-4 col-sm-6 col-xs-12 treatments-box-img text-right sm-no-padding-left xs-no-padding-lr">';
                                $output .= '<img src="'.$thumb_left[0].'"'.$image_alt_left.$image_title_left.$srcset_data.$sizes_data.' class="position-right"/>';
                            $output .= '</div>';
                        }
                        if( $thumb_right[0] )
                        {
                            $srcset = $srcset_data = '';
                            $srcset = wp_get_attachment_image_srcset( $brando_right_image, $brando_image_srcset );
                            if( $srcset ){
                                $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                            }
                            $output .= '<div class="col-md-4 col-sm-6 col-xs-12 treatments-box-img pull-right sm-no-padding-right xs-no-padding-lr xs-margin-top-30px">';
                                $output .= '<img src="'.$thumb_right[0].'"'.$image_alt_right.$image_title_right.$srcset_data.' class="position-left"/>';
                            $output .= '</div>';
                        }
                        $output .= '<div class="col-md-4 col-sm-12 col-xs-12 treatments-box-text bg-gray sm-margin-top-30px">';
                            $output .= '<div class="treatments-box-text-sub padding-ten-all sm-padding-eight-all text-center">';
                                if( $thumb[0] )
                                {
                                    $srcset = $srcset_data = '';
                                    $srcset = wp_get_attachment_image_srcset( $brando_feature_image, $brando_image_srcset );
                                    if( $srcset ){
                                        $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                                    }
                                    $output .= '<img src="'.$thumb[0].'"'.$image_alt.$image_title.$srcset_data.' class="position-relative round-border margin-fifteen-bottom sm-margin-five-bottom xs-margin-thirteen-bottom"/>';
                                }
                                if( $brando_link ){
                                    $output .= '<a'.$brando_link.''.$brando_link_target.'>';
                                }
                                if( $brando_tab_content_left_title ){
                                    $output .= '<span class="alt-font font-weight-600 text-uppercase text-large display-block dark-gray-text margin-seven-bottom sm-margin-five-bottom'.$fontsettings_title_class.'"'.$brando_title_color.'><span class="title-separator-line bg-fast-pink"'.$brando_separator_color.'></span>'.$brando_tab_content_left_title.'</span>';
                                }
                                if( $brando_link ){
                                    $output .= '</a>';
                                }
                                if( $content ){
                                    $output .= do_shortcode( brando_remove_wpautop( $content ) );
                                }
                                if( $brando_number ){
                                    $output .= '<div class="treatments-box-number alt-font fast-pink-text font-weight-700 position-relative'.$fontsettings_number_class.'"'.$brando_number_color.'>'.$brando_number.'</div>';
                                }
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
                
            break;

            case 'tab-content4':
                if( $brando_tab_content_left_title ){
                    $output .= '<span class="text-extra-large text-uppercase alt-font display-block font-weight-700'.$fontsettings_title_class.'"'.$brando_title_color.'>'.$brando_tab_content_left_title.'</span>';
                }
                if( $brando_tab_sub_title ){
                    $output .= '<span class="text-large text-uppercase alt-font light-gray-text'.$fontsettings_subtitle_class.'"'.$brando_subtitle_color.'>'.$brando_tab_sub_title.'</span>';
                }
                if( $content ){
                    $output .= '<div class="margin-five-top table">';
                        $output .= do_shortcode( brando_remove_wpautop( $content ) );
                    $output .= '</div>';
                }
            break;
        }
        return $output;
    }
}
add_shortcode('brando_tab_content','brando_tab_content_shortcode');
?>