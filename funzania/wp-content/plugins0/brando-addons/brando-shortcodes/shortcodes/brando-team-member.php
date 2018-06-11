<?php
/**
 * Shortcode For Team Member
 *
 * @package Brando
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Team Member */
/*-----------------------------------------------------------------------------------*/

function brando_team_member_shortcode( $atts, $content = null ) {
    extract( shortcode_atts( array(
                'brando_team_member_style' => '',
                'team_member_image' => '',
                'brando_member_name' => '',
                'brando_member_link' => '',
                'brando_member_subtitle' => '',
                'brando_member_des' => '',
                'brando_facebook_url' => '',
                'brando_twitter_url' => '',
                'brando_gplus_url' => '',
                'brando_linkedin_url' => '',
                'brando_pinterest_url' => '',
                'brando_email_url' => '',
                'brando_behance_url' => '',
                'brando_team_member_custom_link' => '',
                'brando_show_separator' => '',
                'brando_sep_color' => '',
                'brando_seperator_height' => '',
                'brando_content_bg_color' => '',
                'brando_member_name_color' => '',
                'brando_member_des_color' => '',
                'brando_subtitle_color' => '',
                'brando_image_srcset' => 'full',
                'sub_title_settings' => '',
                'member_name_settings' => '',
                'member_designation_settings' => ''
            ), $atts ) );
    
    global $font_settings_array;
    $output = $style = $sep_style = '';
    $style_array = array();
    $brando_image_srcset = ($brando_image_srcset) ? $brando_image_srcset : 'full';
    /* Image Alt, Title, Caption */
    $img_alt = brando_option_image_alt($team_member_image);
    $img_title = brando_option_image_title($team_member_image);
    $image_alt = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
    $image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';
    
    $image_url = wp_get_attachment_url( $team_member_image,$brando_image_srcset );
    $brando_member_name = ( $brando_member_name ) ? $brando_member_name : '';
    $brando_member_link = ( $brando_member_link ) ? $brando_member_link : '';
    $brando_member_subtitle = ( $brando_member_subtitle ) ? $brando_member_subtitle : '';
    $brando_member_des = ( $brando_member_des ) ? $brando_member_des : '';
    $brando_facebook_url = ( $brando_facebook_url ) ? $brando_facebook_url : '';
    $brando_twitter_url = ( $brando_twitter_url ) ? $brando_twitter_url : '';
    $brando_gplus_url = ( $brando_gplus_url ) ? $brando_gplus_url : '';
    $brando_linkedin_url = ( $brando_linkedin_url ) ? $brando_linkedin_url : '';
    $brando_team_member_custom_link = ( $brando_team_member_custom_link ) ? $brando_team_member_custom_link : '';

    $brando_content_bg_color = ( $brando_content_bg_color ) ? ' style="background:'.$brando_content_bg_color.' !important; "' : '';
    $brando_member_name_color = ( $brando_member_name_color ) ? ' style="color:'.$brando_member_name_color.' !important; "' : '';
    $brando_member_des_color = ( $brando_member_des_color ) ? ' style="color:'.$brando_member_des_color.' !important; "' : '';
    $brando_subtitle_color = ( $brando_subtitle_color ) ? ' style="color:'.$brando_subtitle_color.' !important; "' : '';

    $brando_sep_color = ( $brando_sep_color ) ?  $style_array[] = 'background:'.$brando_sep_color.' !important; ' : ''; 
    $brando_seperator_height = ( $brando_seperator_height ) ? $style_array[] = 'height:'.$brando_seperator_height.' !important;' : ''; 
    $style_property_list = implode(" ", $style_array);
    $sep_style = ( $style_property_list ) ? ' style="'.$style_property_list.'"' : '';

    $fontsettings_subtitle_class = $fontsettings_subtitle_id = $subtitle_responsive_style = '';
    if( !empty( $sub_title_settings ) ) {
        $fontsettings_subtitle_id = uniqid('brando-font-setting-');
        $subtitle_responsive_style = brando_Responsive_font_settings::generate_css( $sub_title_settings, $fontsettings_subtitle_id );
        $fontsettings_subtitle_class = ' '.$fontsettings_subtitle_id;
    }
    ( !empty( $subtitle_responsive_style ) ) ? $font_settings_array[] = $subtitle_responsive_style : '';

    $fontsettings_member_name_class = $fontsettings_member_name_id = $member_name_responsive_style = '';
    if( !empty( $member_name_settings ) ) {
        $fontsettings_member_name_id = uniqid('brando-font-setting-');
        $member_name_responsive_style = brando_Responsive_font_settings::generate_css( $member_name_settings, $fontsettings_member_name_id );
        $fontsettings_member_name_class = ' '.$fontsettings_member_name_id;
    }
    ( !empty( $member_name_responsive_style ) ) ? $font_settings_array[] = $member_name_responsive_style : '';

    $fontsettings_member_designation_class = $fontsettings_member_designation_id = $member_designation_responsive_style = '';
    if( !empty( $member_designation_settings ) ) {
        $fontsettings_member_designation_id = uniqid('brando-font-setting-');
        $member_designation_responsive_style = brando_Responsive_font_settings::generate_css( $member_designation_settings, $fontsettings_member_designation_id );
        $fontsettings_member_designation_class = ' '.$fontsettings_member_designation_id;
    }
    ( !empty( $member_designation_responsive_style ) ) ? $font_settings_array[] = $member_designation_responsive_style : '';

    switch ($brando_team_member_style) 
    {
        case 'team-1':
            $output .= '<div class="team-style1">';
                $output .= '<div class="opacity-light bg-gray"></div>';
                if($image_url){
                    $srcset = $srcset_data = '';
                    $srcset = wp_get_attachment_image_srcset( $team_member_image, $brando_image_srcset );
                    if( $srcset ){
                        $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                    }
                    $sizes = $sizes_data = '';
                    $sizes = wp_get_attachment_image_sizes( $team_member_image, $brando_image_srcset );
                    if( $sizes ){
                        $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                    }

                    $output .= '<img src="'.$image_url.'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'/>';
                }
                if( $brando_member_subtitle ){
                    $output .= '<div class="team-mood text-center">';
                        $output .= '<span class="text-uppercase alt-font text-large bg-white md-text-small sm-text-large'.$fontsettings_subtitle_class.'"'.$brando_subtitle_color.'>'.$brando_member_subtitle.'</span>';
                    $output .= '</div>';
                }
                $output .= '<figure class="text-center padding-fifteen-all"'.$brando_content_bg_color.'>';
                    $output .= '<figcaption>';
                    if( $brando_member_name ){
                        if( $brando_member_link ){
                            $output .= '<a href="'.$brando_member_link.'" >';
                        }
                            $output .= '<span class="alt-font font-weight-600 text-uppercase text-large display-block black-text'.$fontsettings_member_name_class.'"'.$brando_member_name_color.'>'.$brando_member_name.'</span>';
                        if( $brando_member_link ){
                            $output .= '</a>';
                        }
                    }
                    if( $brando_member_des ){
                        $output .= '<span class="alt-font text-small text-uppercase black-text title-underline display-inline-block padding-seven-bottom margin-nine-bottom'.$fontsettings_member_designation_class.'"'.$brando_member_des_color.'>'.$brando_member_des.'</span>';
                    }
                    $output .= '<div class="team-social">';
                        if( $brando_facebook_url ){
                            $output .= '<a href="'.$brando_facebook_url.'" target="_blank"><i class="fa fa-facebook icon-extra-small black-text"></i></a>';
                        }
                        if( $brando_twitter_url ){
                            $output .= '<a href="'.$brando_twitter_url.'" target="_blank"><i class="fa fa-twitter icon-extra-small black-text"></i></a>';
                        }
                        if( $brando_gplus_url ){
                            $output .= '<a href="'.$brando_gplus_url.'" target="_blank"><i class="fa fa-google-plus icon-extra-small black-text"></i></a>';
                        }
                        if( $brando_linkedin_url ){
                            $output .= '<a href="'.$brando_linkedin_url.'" target="_blank"><i class="fa fa-linkedin icon-extra-small black-text"></i></a>';
                        }
                        if( $brando_pinterest_url ){
                            $output .= '<a href="'.$brando_pinterest_url.'" target="_blank"><i class="fa fa-pinterest icon-extra-small black-text"></i></a>';
                        }
                        if( $brando_email_url ){
                            $output .= '<a href="'.$brando_email_url.'" target="_blank"><i class="fa fa-envelope icon-extra-small black-text"></i></a>';
                        }
                        if( !empty( $brando_team_member_custom_link ) ) {
                            $output .= nl2br( rawurldecode( base64_decode( strip_tags( $brando_team_member_custom_link ) ) ) );
                        }
                        $output .= '</div>';
                    $output .= '</figcaption>';
                $output .= '</figure>';
            $output .= '</div>';
        break;

        case 'team-2':
            $output .= '<div class="chef-bio">';
                if($image_url){
                    $srcset = $srcset_data = '';
                    $srcset = wp_get_attachment_image_srcset( $team_member_image, $brando_image_srcset );
                    if( $srcset ){
                        $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                    }
                    $sizes = $sizes_data = '';
                    $sizes = wp_get_attachment_image_sizes( $team_member_image, $brando_image_srcset );
                    if( $sizes ){
                        $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                    }
                    $output .= '<div class="chef-img">';
                        $output .= '<img src="'.$image_url.'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'/>';
                    $output .= '</div>';
                }
                $output .= '<div class="chef-details padding-nine-tb center-col text-center bg-brown"'.$brando_content_bg_color.'>';
                    if( $brando_show_separator == 1 ){ 
                        $output .= '<div class="separator-line-thick bg-deep-yellow no-margin-top margin-eight-bottom xs-margin-four-bottom"'.$sep_style.'></div>';
                    }
                    if( $brando_member_name ){
                        if( $brando_member_link ){
                            $output .= '<a href="'.$brando_member_link.'" >';
                        }
                        $output .= '<span class="title-small alt-font deep-yellow-text text-uppercase display-block'.$fontsettings_member_name_class.'"'.$brando_member_name_color.'>'.$brando_member_name.'</span>';
                        if( $brando_member_link ){
                            $output .= '</a>';
                        }
                    }
                    if( $brando_member_des ){
                        $output .= '<span class="text-small text-uppercase alt-font light-gray-text'.$fontsettings_member_designation_class.'"'.$brando_member_des_color.'>'.$brando_member_des.'</span>';
                    }
                    $output.= do_shortcode( brando_remove_wpautop($content) );
                $output .= '</div>';
            $output .= '</div>';
        break;

        case 'team-3':
            $output .= '<div class="architecture-bio">';
                if( $image_url ){
                    $srcset = $srcset_data = '';
                    $srcset = wp_get_attachment_image_srcset( $team_member_image, $brando_image_srcset );
                    if( $srcset ){
                        $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                    }
                    $sizes = $sizes_data = '';
                    $sizes = wp_get_attachment_image_sizes( $team_member_image, $brando_image_srcset );
                    if( $sizes ){
                        $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                    }
                    $output .= '<div class="architecture-img">';
                        $output .= '<img src="'.$image_url.'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'/>';
                    $output .= '</div>';
                }
                $output .= '<div class="architecture-details text-left padding-eight-all center-col md-width-100 xs-width-90"'.$brando_content_bg_color.'>';
                    if( $brando_member_name ){
                        if( $brando_member_link ){
                            $output .= '<a href="'.$brando_member_link.'" >';
                        }
                        $output .= '<span class="text-large font-weight-600 alt-font white-text text-uppercase display-block'.$fontsettings_member_name_class.'"'.$brando_member_name_color.'>'.$brando_member_name.'</span>';
                        if( $brando_member_link ){
                            $output .= '</a>';
                        }
                    }
                    if( $brando_member_des ){
                        $output .= '<span class="text-small text-uppercase alt-font white-text'.$fontsettings_member_designation_class.'"'.$brando_member_des_color.'>'.$brando_member_des.'</span>';
                    }
                    if( $content ){
                        $output.= do_shortcode( brando_remove_wpautop($content) );
                    }
                    $output .= '<span class="text-uppercase alt-font text-small black-text team-member-social">';
                        if( $brando_facebook_url ){
                            $output .= '<a href="'.$brando_facebook_url.'" target="_blank" class="black-text display-inline-block">'.__('Facebook','brando-addons').'</a>';
                        }
                        if( $brando_twitter_url ){
                            $output .= '<a href="'.$brando_twitter_url.'" target="_blank" class="black-text display-inline-block">'.__('Twitter','brando-addons').'</a>';
                        }
                        if( $brando_gplus_url ){
                            $output .= '<a href="'.$brando_gplus_url.'" target="_blank" class="black-text display-inline-block">'.__('Google +','brando-addons').'</a>';
                        }
                        if( $brando_linkedin_url ){
                            $output .= '<a href="'.$brando_linkedin_url.'" target="_blank" class="black-text display-inline-block">'.__('Linkedin','brando-addons').'</a>';
                        }
                        if( $brando_pinterest_url ){
                            $output .= '<a href="'.$brando_pinterest_url.'" target="_blank" class="black-text display-inline-block">'.__('Pinterest','brando-addons').'</a>';
                        }
                        if( $brando_behance_url ){
                            $output .= '<a href="'.$brando_behance_url.'" target="_blank" class="black-text display-inline-block">'.__('Behance','brando-addons').'</a>';
                        }
                        if( $brando_email_url ){
                            $output .= '<a href="'.$brando_email_url.'" target="_blank"><i class="fa fa-envelope icon-extra-small black-text"></i></a>';
                        }
                        if( !empty( $brando_team_member_custom_link ) ) :
                            $output .= nl2br( rawurldecode( base64_decode( strip_tags( $brando_team_member_custom_link ) ) ) );
                        endif;
                    $output .= '</span>';
               $output .= '</div>';
            $output .= '</div>';
        break;

        case 'team-4':
            $output .= '<div class="team-style2">';
                if( $image_url ){
                    $srcset = $srcset_data = '';
                    $srcset = wp_get_attachment_image_srcset( $team_member_image, $brando_image_srcset );
                    if( $srcset ){
                        $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                    }
                    $sizes = $sizes_data = '';
                    $sizes = wp_get_attachment_image_sizes( $team_member_image, $brando_image_srcset );
                    if( $sizes ){
                        $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                    }
                    $output .= '<div class="position-relative margin-ten-bottom team-image">';
                        $output .= '<img src="'.$image_url.'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'/>';
                        $output .= '<div class="img-border-medium border-transperent-white"></div>';
                    $output .= '</div>';
                }
                $output .= '<div class="team-social">';
                    if( $brando_facebook_url ){
                        $output .= '<a href="'.$brando_facebook_url.'" target="_blank"><i class="fa fa-facebook icon-extra-small black-text"></i></a>';
                    }
                    if( $brando_twitter_url ){
                        $output .= '<a href="'.$brando_twitter_url.'" target="_blank"><i class="fa fa-twitter icon-extra-small black-text"></i></a>';
                    }
                    if( $brando_gplus_url ){
                        $output .= '<a href="'.$brando_gplus_url.'" target="_blank"><i class="fa fa-google-plus icon-extra-small black-text"></i></a>';
                    }
                    if( $brando_linkedin_url ){
                        $output .= '<a href="'.$brando_linkedin_url.'" target="_blank"><i class="fa fa-linkedin icon-extra-small black-text"></i></a>';
                    }
                    if( $brando_pinterest_url ){
                        $output .= '<a href="'.$brando_pinterest_url.'" target="_blank"><i class="fa fa-pinterest icon-extra-small black-text"></i></a>';
                    }
                    if( $brando_behance_url ){
                        $output .= '<a href="'.$brando_behance_url.'" target="_blank"><i class="fa fa-behance icon-extra-small black-text"></i></a>';
                    }
                    if( $brando_email_url ){
                        $output .= '<a href="'.$brando_email_url.'" target="_blank"><i class="fa fa-envelope icon-extra-small black-text"></i></a>';
                    }
                    if( !empty( $brando_team_member_custom_link ) ) :
                        $output .= nl2br( rawurldecode( base64_decode( strip_tags( $brando_team_member_custom_link ) ) ) );
                    endif;
                $output .= '</div>';
                if( $brando_member_name ){ 
                    if( $brando_member_link ){
                        $output .= '<a href="'.$brando_member_link.'" >';
                    }
                    $output .= '<span class="alt-font font-weight-600 text-uppercase black-text display-block margin-six-top'.$fontsettings_member_name_class.'"'.$brando_member_name_color.'>'.$brando_member_name.'</span>';
                    if( $brando_member_link ){
                        $output .= '</a>';
                    }
                }
                if( $brando_member_des ){
                    $output .= '<span class="alt-font text-small text-uppercase'.$fontsettings_member_designation_class.'"'.$brando_member_des_color.'>'.$brando_member_des.'</span>';
                }
            $output .= '</div>';
        break;
    }

    return $output;
}
add_shortcode( 'brando_team_member', 'brando_team_member_shortcode' );

/*-----------------------------------------------------------------------------------*/
/* Team Member */
/*-----------------------------------------------------------------------------------*/