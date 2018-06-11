<?php
/**
 * Shortcode For Content Block
 *
 * @package Brando
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Special Content Block */
/*-----------------------------------------------------------------------------------*/

function brando_content_block_shortcode( $atts, $content = null ) {
    extract( shortcode_atts( array(
                'id' => '',
                'class' => '',
                'brando_block_premade_style' => '',
                'brando_image' => '',
                'brando_title' => '',
                'brando_subtitle' => '',
                'brando_font_awesome' => '',
                'enable_separator' => '',
                'content_position' => '',
                'icon_size' => '',
                'brando_title_color' => '',
                'brando_subtitle_color' => '',
                'brando_icon_color' => '',
                'brando_phno' => '',
                'brando_phno_icon' => '',
                'brando_email' => '',
                'brando_email_icon' => '',
                'brando_number1' => '',
                'brando_text1' => '',
                'brando_number2' => '',
                'brando_text2' => '',
                'brando_number3' => '',
                'brando_text3' => '',
                'brando_number4' => '',
                'brando_text4' => '',
                'brando_number_color' => '',
                'brando_text_color' => '',
                'brando_dis_text' => '',
                'brando_link' => '',
                'brando_link_target' => '',
                'brando_icon' => '',
                'brando_sep_image' => '',
                'brando_scroll_to_section' => '',
                'brando_section_id' => '',
                'brando_border_color' => '',
                'brando_enable_border' => '',
                'image_position' => '',
                'contact_forms_shortcode' => '',
                'button_config' => '',
                'second_button_config' => '',
                'brando_sep_color' => '',
                'brando_seperator_height' => '2px',
                'brando_detailbox_color' => '',
                'brando_subtitle_bg_color' => '',
                'brando_number' => '',
                'brando_year_text' => '',
                'brando_small_title' => '',
                'brando_discount_text_bg_color' => '',
                'brando_discount_text_color' => '',
                'custom_icon' => '',
                'custom_icon_image' => '',
                'etline_custom_icon' => '',
                'etline_custom_icon_image' => '',
                'phone_etline_custom_icon' => '',
                'phone_etline_custom_icon_image' => '',
                'email_etline_custom_icon' => '',
                'email_etline_custom_icon_image' => '',
                'brando_token_class' => '',
                'brando_separator_color' => '',
                'brando_block_hover_border_color' => '',
                'brando_block_border_color' => '',
                'brando_block_year_color' => '',
                'brando_block_year_bg_color' => '',
                'brando_block_button_bg_color' => '',
                'brando_block_button_text_color' => '',
                'brando_block_button_border_color' => '',
                'brando_tattoo_border_color' => '',
                'brando_image_srcset' => 'full',
                'text_transform' => 'text-uppercase',
                'brando_enable_strike_throught' => '1',
                'title_settings' => '',
                'subtitle_settings' => '',
                'year_settings' => '',
                'number_settings' => '',
                'email_settings' => '',
                'discount_settings' => '',
                'smalltitle_settings'=>'',
            ), $atts ) );
    
    global $tz_featured_array,$font_settings_array;
    $output = $style = $sep_style = $subtitle_style = $discount_style = '';
    $classes = $style_array = array();
    $brando_token_class = $brando_token_class.$id;
    $id = ($id) ? ' id="'.$id.'"' : '';
    $class = ( $class ) ? ' class="'.$class.'"' : '';
    $brando_title = ( $brando_title ) ? str_replace('||', '<br />',$brando_title) : '';
    $brando_font_awesome = ( $brando_font_awesome ) ? $brando_font_awesome : '';
    $brando_dis_text = ( $brando_dis_text ) ? $brando_dis_text : '';
    $brando_year_text = ( $brando_year_text ) ? $brando_year_text : '';
    $brando_link = ( $brando_link ) ? ' href="'.$brando_link.'"' : '';
    $brando_link_target = ( $brando_link_target ) ? ' target="'.$brando_link_target.'"' : '';   
    $brando_title_color = ( $brando_title_color ) ? ' style="color:'.$brando_title_color.' !important;"' : '';
    $brando_subtitle_attr_color = ( $brando_subtitle_color ) ? 'color:'.$brando_subtitle_color.' !important;' : '';
    $icon_size = ( $icon_size ) ? ' '.$icon_size : ' icon-medium';
    $brando_icon_color = ( $brando_icon_color ) ? ' style="color:'.$brando_icon_color.' !important;"' : '';
    $border_color = ( $brando_enable_border == 1 ) ? ' style="border: 7px solid '.$brando_border_color.' !important;"' : '';
    $brando_border_color = ( $brando_border_color ) ? ' style="border-color:'.$brando_border_color.' !important;"' : '';
    $brando_discount_text_bg_color = ( $brando_discount_text_bg_color ) ? 'background:'.$brando_discount_text_bg_color.' !important;' : '';
    $brando_discount_text_color = ( $brando_discount_text_color ) ? 'color:'.$brando_discount_text_color.' !important;' : '';
    if( $brando_discount_text_bg_color || $brando_discount_text_color ){
        $discount_style .= ' style="'.$brando_discount_text_bg_color.$brando_discount_text_color.'"';
    }
    $brando_image_srcset = ($brando_image_srcset) ? $brando_image_srcset : 'full';
    $srcset = $srcset_data = '';
    $srcset = wp_get_attachment_image_srcset( $brando_image, $brando_image_srcset );
    if( $srcset ){
        $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
    }

    $sizes = $sizes_data = '';
    $sizes = wp_get_attachment_image_sizes( $brando_image, $brando_image_srcset );
    if( $sizes ){
        $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
    }
    /* Image Alt, Title, Caption */
    $img_alt = brando_option_image_alt($brando_image);
    $img_title = brando_option_image_title($brando_image);
    $image_alt = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
    $image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

    $img_alt_sep = brando_option_image_alt($brando_sep_image);
    $img_title_sep = brando_option_image_title($brando_sep_image);
    $image_alt_sep = ( isset($img_alt_sep['alt']) && !empty($img_alt_sep['alt']) ) ? ' alt="'.$img_alt_sep['alt'].'"' : ' alt=""' ; 
    $image_title_sep = ( isset($img_title_sep['title']) && !empty($img_title_sep['title']) ) ? ' title="'.$img_title_sep['title'].'"' : '';

    $img_alt_custom = brando_option_image_alt($custom_icon_image);
    $img_title_custom = brando_option_image_title($custom_icon_image);
    $image_alt_custom = ( isset($img_alt_sep['alt']) && !empty($img_alt_sep['alt']) ) ? ' alt="'.$img_alt_sep['alt'].'"' : ' alt=""' ; 
    $image_title_custom = ( isset($img_title_sep['title']) && !empty($img_title_sep['title']) ) ? ' title="'.$img_title_sep['title'].'"' : '';

    $img_alt_etline = brando_option_image_alt($etline_custom_icon_image);
    $img_title_etline = brando_option_image_title($etline_custom_icon_image);
    $image_alt_etline = ( isset($img_alt_sep['alt']) && !empty($img_alt_sep['alt']) ) ? ' alt="'.$img_alt_sep['alt'].'"' : ' alt=""' ; 
    $image_title_etline = ( isset($img_title_sep['title']) && !empty($img_title_sep['title']) ) ? ' title="'.$img_title_sep['title'].'"' : '';

    $img_alt_phone = brando_option_image_alt($phone_etline_custom_icon_image);
    $img_title_phone = brando_option_image_title($phone_etline_custom_icon_image);
    $image_alt_phone = ( isset($img_alt_sep['alt']) && !empty($img_alt_sep['alt']) ) ? ' alt="'.$img_alt_sep['alt'].'"' : ' alt=""' ; 
    $image_title_phone = ( isset($img_title_sep['title']) && !empty($img_title_sep['title']) ) ? ' title="'.$img_title_sep['title'].'"' : '';

    $img_alt_email = brando_option_image_alt($email_etline_custom_icon_image);
    $img_title_email = brando_option_image_title($email_etline_custom_icon_image);
    $image_alt_email = ( isset($img_alt_sep['alt']) && !empty($img_alt_sep['alt']) ) ? ' alt="'.$img_alt_sep['alt'].'"' : ' alt=""' ; 
    $image_title_email = ( isset($img_title_sep['title']) && !empty($img_title_sep['title']) ) ? ' title="'.$img_title_sep['title'].'"' : '';

    $brando_image = ( $brando_image ) ? wp_get_attachment_image_src($brando_image, $brando_image_srcset) : '';
    $brando_sep_image = ( $brando_sep_image ) ? wp_get_attachment_image_src($brando_sep_image, 'full') : '';
    $content_position = ( $content_position == 1 ) ? 'overflow-hidden adventure-details-main-bottom' : 'overflow-hidden adventure-details-main'; 
    $brando_icon = ( $brando_icon ) ? $brando_icon : '';
    $brando_number = ( $brando_number ) ? $brando_number : ''; 
    $brando_section_id = ( $brando_section_id ) ? $brando_section_id : '';
    $image_position = ( $image_position == 1 ) ? 'pull-left' : 'pull-right';
    $brando_sep_color = ( $brando_sep_color ) ? 'background:'.$brando_sep_color.' !important; ' : ''; 
    $brando_seperator_height = ( $brando_seperator_height ) ? 'height:'.$brando_seperator_height.' !important;' : ''; 
    if( $brando_sep_color || $brando_seperator_height){
        $sep_style .= ' style="'.$brando_sep_color.$brando_seperator_height.'"';
    }
    $brando_detailbox_color = ( $brando_detailbox_color ) ? ' style="background:'.$brando_detailbox_color.' !important;"' : '';
    $brando_subtitle_bg_color = ( $brando_subtitle_bg_color ) ? 'background:'.$brando_subtitle_bg_color.' !important;' : '';
    if( $brando_subtitle_bg_color || $brando_subtitle_attr_color ){
        $subtitle_style .= ' style="'.$brando_subtitle_bg_color.$brando_subtitle_attr_color.'"';
    }
    $brando_small_title = ( $brando_small_title ) ? $brando_small_title : '';
    // For custom color
    
    ( $brando_enable_strike_throught == 0 ) ? $tz_featured_array[] = '.'.$brando_token_class.' .line-link:before{ background: none; }' : '';
    ( $brando_separator_color ) ? $tz_featured_array[] = '.'.$brando_token_class.' .hover-box-text .title-medium::before{ background:'.$brando_separator_color.';}' : '';
    ( $brando_block_hover_border_color ) ? $tz_featured_array[] = '.'.$brando_token_class.' .hover-border-color{ border-color:'.$brando_block_hover_border_color.' !important;}' : '';
    ( $brando_block_border_color ) ? $tz_featured_array[] = '.'.$brando_token_class.'::after{ border-color:'.$brando_block_border_color.';}' : '';
    ( $brando_block_year_color ) ? $tz_featured_array[] = '.'.$brando_token_class.'{ color:'.$brando_block_year_color.';}' : '';
    ( $brando_block_year_bg_color ) ? $tz_featured_array[] = '.'.$brando_token_class.'{ background:'.$brando_block_year_bg_color.';}' : '';
    ( $brando_block_button_bg_color ) ? $tz_featured_array[] = '.tattoo-art-box .'.$brando_token_class.', .'.$brando_token_class.' .hover-box-more{ background:'.$brando_block_button_bg_color.';}' : '';
    ( $brando_block_button_text_color ) ? $tz_featured_array[] = '.tattoo-art-box .'.$brando_token_class.', .'.$brando_token_class.' .hover-box-more a, .'.$brando_token_class.' .line-link, .'.$brando_token_class.' .line-link:hover { color:'.$brando_block_button_text_color.';}' : '';
    ( $brando_block_button_border_color ) ? $tz_featured_array[] = '.tattoo-art-box .'.$brando_token_class.'{ border-color:'.$brando_block_button_border_color.';}' : '';
    ( $brando_tattoo_border_color ) ? $tz_featured_array[] = '.'.$brando_token_class.'{ border-color:'.$brando_tattoo_border_color.' !important;}' : '';

    $class_list = implode(" ", $classes);
    $style_property_list = implode(" ", $style_array);
    $style_property = ( $style_property_list ) ? ' style="'.$style_property_list.'"' : '';

    if ( function_exists('vc_parse_multi_attribute') ) {
        //First button
        $button_parse_args = vc_parse_multi_attribute($button_config);
        $button_link     = ( isset($button_parse_args['url']) ) ? $button_parse_args['url'] : '#';
        $button_title    = ( isset($button_parse_args['title']) ) ? $button_parse_args['title'] : '';
        $button_target   = ( isset($button_parse_args['target']) ) ? trim($button_parse_args['target']) : '_self';
    }

    if ( function_exists('vc_parse_multi_attribute') ) {
        //First button
        $second_button_parse_args = vc_parse_multi_attribute($second_button_config);
        $second_button_link     = ( isset($second_button_parse_args['url']) ) ? $second_button_parse_args['url'] : '#';
        $second_button_title    = ( isset($second_button_parse_args['title']) ) ? $second_button_parse_args['title'] : '';
        $second_button_target   = ( isset($second_button_parse_args['target']) ) ? trim($second_button_parse_args['target']) : '_self';
    }

    $brando_text1 = ( $brando_text1 ) ? $brando_text1 : '';
    $brando_text2 = ( $brando_text2 ) ? $brando_text2 : '';
    $brando_text3 = ( $brando_text3 ) ? $brando_text3 : '';
    $brando_text4 = ( $brando_text4 ) ? $brando_text4 : '';

    $brando_number1 = ( $brando_number1 ) ? $brando_number1 : '';
    $brando_number2 = ( $brando_number2 ) ? $brando_number2 : '';
    $brando_number3 = ( $brando_number3 ) ? $brando_number3 : '';
    $brando_number4 = ( $brando_number4 ) ? $brando_number4 : '';

    $brando_number_color = ( $brando_number_color ) ? ' style="color:'.$brando_number_color.' !important;"' : '';
    $brando_text_color = ( $brando_text_color ) ? ' style="color:'.$brando_text_color.' !important;"' : '';

    $style = ' style="color:'.$brando_title_color.';"';

    //Font Settings For Title
    $fontsettings_title_id = $responsive_style_title = $fontsettings_title_class = $fontsettings_subtitle_id = $responsive_style_subtitle =$fontsettings_subtitle_class = $fontsettings_year_id = $responsive_style_year = $fontsettings_year_class = $fontsettings_number_id = $responsive_style_number = $fontsettings_number_class = $fontsettings_email_id = $responsive_style_email = $fontsettings_email_class =  $fontsettings_dis_id = $responsive_style_dis = $fontsettings_dis_class = $fontsettings_smalltitle_id = $responsive_style_stitle = $fontsettings_smalltitle_class = '';
    if( !empty( $title_settings ) ) {
        $fontsettings_title_id = uniqid('brando-font-setting-');
        $responsive_style_title = brando_Responsive_font_settings::generate_css( $title_settings, $fontsettings_title_id );
        $fontsettings_title_class = ' '.$fontsettings_title_id;
    }
    ( !empty( $responsive_style_title ) ) ? $font_settings_array[] = $responsive_style_title : '';
    //Font Settings For Sub Title
    if( !empty( $subtitle_settings ) ) {
        $fontsettings_subtitle_id = uniqid('brando-font-setting-');
        $responsive_style_subtitle = brando_Responsive_font_settings::generate_css( $subtitle_settings, $fontsettings_subtitle_id );
        $fontsettings_subtitle_class = ' '.$fontsettings_subtitle_id;
    }
    ( !empty( $responsive_style_subtitle ) ) ? $font_settings_array[] = $responsive_style_subtitle : '';
    //Font Settings For Year
    if( !empty( $year_settings ) ) {
        $fontsettings_year_id = uniqid('brando-font-setting-');
        $responsive_style_year = brando_Responsive_font_settings::generate_css( $year_settings, $fontsettings_year_id );
        $fontsettings_year_class = ' '.$fontsettings_year_id;
    }
    ( !empty( $responsive_style_year ) ) ? $font_settings_array[] = $responsive_style_year : '';
    //Font Settings For Number
    if( !empty( $number_settings ) ) {
        $fontsettings_number_id = uniqid('brando-font-setting-');
        $responsive_style_number = brando_Responsive_font_settings::generate_css( $number_settings, $fontsettings_number_id );
        $fontsettings_number_class = ' '.$fontsettings_number_id;
    }
    ( !empty( $responsive_style_number ) ) ? $font_settings_array[] = $responsive_style_number : '';
    //Font Settings For Email 
    if( !empty( $email_settings ) ) {
        $fontsettings_email_id = uniqid('brando-font-setting-');
        $responsive_style_email = brando_Responsive_font_settings::generate_css( $email_settings, $fontsettings_email_id );
        $fontsettings_email_class = ' '.$fontsettings_email_id;
    }
    ( !empty( $responsive_style_email ) ) ? $font_settings_array[] = $responsive_style_email : '';
    //Font Settings For Discount Text
    if( !empty( $discount_settings ) ) {
        $fontsettings_dis_id = uniqid('brando-font-setting-');
        $responsive_style_dis = brando_Responsive_font_settings::generate_css( $discount_settings, $fontsettings_dis_id );
        $fontsettings_dis_class = ' '.$fontsettings_dis_id;
    }
    ( !empty( $responsive_style_dis ) ) ? $font_settings_array[] = $responsive_style_dis : '';
    //Font Settings For Small Title
    if( !empty( $smalltitle_settings ) ) {
        $fontsettings_smalltitle_id = uniqid('brando-font-setting-');
        $responsive_style_stitle = brando_Responsive_font_settings::generate_css( $smalltitle_settings, $fontsettings_smalltitle_id );
        $fontsettings_smalltitle_class = ' '.$fontsettings_smalltitle_id;
    }
    ( !empty( $responsive_style_stitle ) ) ? $font_settings_array[] = $responsive_style_stitle : '';
    

    switch ($brando_block_premade_style) {
        case 'block-1':
            if( $id || $class ):
                $output .= '<div'.$id.$class.'>';
            endif;
            if( $brando_title ){
                $output .= '<span class="text-extra-large margin-six-bottom display-inline-block alt-font black-text'.$fontsettings_title_class.'"'.$brando_title_color.'>'.$brando_title.'</span>';
            }
            if( $content ){
                $output .= do_shortcode( brando_remove_wpautop($content) );
            }
            if( $id || $class ):
                $output .= '</div>';
            endif;
        break;

        case 'block-2':
            if( $id || $class ):
                $output .= '<div'.$id.$class.'>';
            endif;
            if( $brando_link ){
                $output .= '<a'.$brando_link.''.$brando_link_target.'>';
            }
            if( $custom_icon == 1 && !empty( $custom_icon_image ) ) :
                $output .= '<img src="'.wp_get_attachment_url( $custom_icon_image ).'"'.$image_alt_custom.$image_title_custom.' class="icon-image" />';
            elseif( $brando_font_awesome ):
                $output .= '<i class="fa '.$brando_font_awesome.$icon_size.' fast-yellow-text"'.$brando_icon_color.'></i>';
            endif;

            if( $brando_link ){
                $output .= '</a>';
            }
            if( $brando_title ){
                $output .= '<span class="text-uppercase text-small display-block letter-spacing-2 black-text margin-seven-top xs-margin-two-top'.$fontsettings_title_class.'"'.$brando_title_color.'>';
                    if( $brando_link ){
                        $output .= '<a'.$brando_link.''.$brando_link_target.''.$brando_title_color.'>';
                    }
                        $output .= $brando_title;
                    if( $brando_link ){
                        $output .= '</a>';
                    }
                $output .= '</span>'; 
            }
            if( $id || $class ):
                $output .= '</div>';
            endif;
        break;

        case 'block-3':
            if( $id || $class ):
                $output .= '<div'.$id.$class.'>';
            endif;
            $output .= '<span class="title-small black-text alt-font display-block xs-text-center call-us">';
                if( $phone_etline_custom_icon == 1 && !empty( $phone_etline_custom_icon_image ) ) {
                    $output .= '<img src="'.wp_get_attachment_url( $phone_etline_custom_icon_image ).'"'.$image_alt_phone.$image_title_phone.' class="icon-image vertical-align-top xs-vertical-align-middle" /><span class="'.$fontsettings_number_class.'">'.$brando_phno.'</span>';
                }elseif( $brando_phno || $brando_phno_icon ){
                    $output .= '<i class="'.$brando_phno_icon.' icon-small vertical-align-top xs-vertical-align-middle'.$fontsettings_number_class.'"></i> <span class="'.$fontsettings_number_class.'">'.$brando_phno.'</span>';
                }
                if( $email_etline_custom_icon == 1 && !empty( $email_etline_custom_icon_image ) ) {
                    $output .= '<span class="margin-two-lr xs-display-none"> | </span>';
                    $output .= '<a href="mailto:'.$brando_email.'" class="black-text xs-display-inline-block xs-margin-five-all'.$fontsettings_email_class.'">';
                        $output .= '<img src="'.wp_get_attachment_url( $email_etline_custom_icon_image ).'"'.$image_alt_email.$image_title_email.' class="icon-image vertical-align-top" />'.$brando_email;
                    $output .= '</a>';
                }elseif( $brando_email || $brando_email_icon ){
                    $output .= '<span class="margin-two-lr xs-display-none"> | </span>';
                    $output .= '<a href="mailto:'.$brando_email.'" class="black-text xs-display-inline-block xs-margin-five-all'.$fontsettings_email_class.'">';
                        $output .= '<i class="'.$brando_email_icon.' icon-small vertical-align-top'.$fontsettings_email_class.'"></i> '.$brando_email.'';
                    $output .= '</a>';
                }
            $output .= '</span>';
            if( $id || $class ):
                $output .= '</div>';
            endif;
        break;

        case 'block-4':
            if( $id || $class ):
                $output .= '<div'.$id.$class.'>';
            endif;
                $output .= '<div class="'.$content_position.'">';
                if( isset( $brando_image[0] ) ){
                    $output .= '<img src="'.$brando_image[0].'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'/>';
                }
                    $output .= '<div class="adventure-details"'.$brando_detailbox_color.'>';
                        $output .= '<div class="adventure-details-sub padding-sixteen-all md-padding-thirteen-all sm-padding-fifteen-all xs-padding-ten-all">';
                          
                        if( $brando_title ){
                            $output .= '<span class="text-large text-uppercase display-block alt-font font-weight-600 light-gray-text margin-eight-bottom xs-text-medium'.$fontsettings_title_class.'"'.$brando_title_color.'>';
                                if( $brando_link ){
                                    $output .= '<a'.$brando_link.''.$brando_link_target.''.$brando_title_color.'>';
                                }
                                    $output .= $brando_title;
                                if( $brando_link ){
                                    $output .= '</a>';
                                }
                            $output .= '</span>'; 
                        }
                        
                        if( $content ){
                            $output .= do_shortcode( brando_remove_wpautop($content) );
                        }
                        if( $enable_separator == 1 ){
                            $output .= '<div class="bg-deep-orange separator-line-thick no-margin-lr margin-thirteen-all md-margin-eight-all md-no-margin-lr no-margin-bottom xs-display-none"'.$sep_style.'></div>';
                        }
                        $output .= '</div>';
                        if( $brando_subtitle ){ 
                            $output .= '<div class="adventure-details-destinations bg-deep-orange text-center alt-font text-small white-text text-uppercase xs-text-extra-small'.$fontsettings_subtitle_class.'"'.$subtitle_style.'>'.$brando_subtitle.'</div>';
                        }
                    $output .= '</div>';
                $output .= '</div>';
            if( $id || $class ):
                $output .= '</div>';
            endif;
        break;

        case 'block-5':
            if( $id || $class ):
                $output .= '<div'.$id.$class.'>';
            endif;
            $output .= '<div class="travel-how-to-work xs-text-center">';
                if( $brando_text1 || $brando_number1 ){
                    $output .= '<div class="col-md-12 col-sm-12 padding-twelve-tb no-padding-lr border-bottom-transperent-white xs-padding-five-tb">';
                    if( $brando_number1 ){
                        $output .= '<div class="col-md-3 col-sm-3"><span class="title-extra-large deep-orange-text alt-font margin-eleven-top xs-margin-five-all display-block'.$fontsettings_number_class.'"'.$brando_number_color.'>'.$brando_number1.'</span></div>';
                    }
                    if( $brando_text1 ){
                        $output .= '<div class="col-md-9 col-sm-9">';
                            $output .= '<span class="text-large alt-font light-gray-text text-uppercase'.$fontsettings_title_class.'"'.$brando_text_color.'>'.$brando_text1.'</span>';
                        $output .= '</div>';
                    }
                    $output .= '</div>';
                }
                if( $brando_text2 || $brando_number2 ){
                    $output .= '<div class="col-md-12 col-sm-12 padding-twelve-tb no-padding-lr border-bottom-transperent-white xs-padding-five-tb">';
                    if( $brando_number2 ){
                        $output .= '<div class="col-md-3 col-sm-3"><span class="title-extra-large deep-orange-text alt-font display-block margin-eleven-top xs-margin-five-all'.$fontsettings_number_class.'"'.$brando_number_color.'>'.$brando_number2.'</span></div>';
                    }
                    if( $brando_text2 ){
                        $output .= '<div class="col-md-9 col-sm-9">';
                            $output .= '<span class="text-large alt-font light-gray-text text-uppercase'.$fontsettings_title_class.'"'.$brando_text_color.'>'.$brando_text2.'</span>';
                        $output .= '</div>';
                    }
                    $output .= '</div>';
                }
                if( $brando_text3 || $brando_number3 ){
                    $output .= '<div class="col-md-12 col-sm-12 padding-twelve-tb no-padding-lr border-bottom-transperent-white xs-padding-five-tb">';
                    if( $brando_number3 ){
                        $output .= '<div class="col-md-3 col-sm-3"><span class="title-extra-large deep-orange-text alt-font display-block margin-eleven-top xs-margin-five-all'.$fontsettings_number_class.'"'.$brando_number_color.'>'.$brando_number3.'</span></div>';
                    }
                    if( $brando_text3 ){
                        $output .= '<div class="col-md-9 col-sm-9">';
                            $output .= '<span class="text-large alt-font light-gray-text text-uppercase'.$fontsettings_title_class.'"'.$brando_text_color.'>'.$brando_text3.'</span>';
                        $output .= '</div>';
                    }
                    $output .= '</div>';
                }
                if( $brando_text4 || $brando_number4 ){
                    $output .= '<div class="col-md-12 col-sm-12 padding-twelve-tb no-padding-lr xs-padding-five-tb">';
                    if( $brando_number4 ){
                        $output .= '<div class="col-md-3 col-sm-3"><span class="title-extra-large deep-orange-text alt-font display-block margin-eleven-top xs-margin-five-all'.$fontsettings_number_class.'"'.$brando_number_color.'>'.$brando_number4.'</span></div>';
                    }
                    if( $brando_text4 ){
                        $output .= '<div class="col-md-9 col-sm-9">';
                            $output .= '<span class="text-large alt-font light-gray-text text-uppercase'.$fontsettings_title_class.'"'.$brando_text_color.'>'.$brando_text4.'</span>';
                        $output .= '</div>';
                    }
                    $output .= '</div>';
                }
            $output .= '</div>';
            if( $id || $class ):
                $output .= '</div>';
            endif;
        break;

        case 'block-6':
            if( $id || $class ):
                $output .= '<div'.$id.$class.'>';
            endif;
            $output .= '<div class="blog-post-style2">';
                $output .= '<article class="col-md-12 col-sm-12 col-xs-12 no-padding bg-white">';
                    if( isset( $brando_image[0] ) ){
                        $output .= '<div class="col-md-6 col-sm-6 col-xs-6 no-padding post-thumbnail overflow-hidden">';                            
                            if( $brando_link ){
                                $output .= '<a'.$brando_link.''.$brando_link_target.'>';
                            }   
                                $output .= '<img src="'.$brando_image[0].'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'/>';

                            if( $brando_link ){
                                $output .= '</a>';
                            }

                        $output .= '</div>';
                    }
                    $output .= '<div class="col-md-6 col-sm-6 col-xs-6 no-padding post-details-arrow">';
                        $output .= '<div class="post-details">';
                            if( $brando_title ){
                                $output .= '<span class="text-extra-large text-uppercase display-block alt-font margin-six-tb sm-text-small xs-text-small'.$fontsettings_title_class.'">';
                                    if( $brando_link ){
                                        $output .= '<a'.$brando_link.''.$brando_link_target.''.$brando_title_color.'>'.$brando_title.'</a>';
                                    } else{
                                        $output .= '<a'.$brando_link.''.$brando_title_color.'>'.$brando_title.'</a>';
                                    }
                                $output .= '</span>';
                            }
                            if( $brando_subtitle ){
                                $output .= '<span class="text-medium text-uppercase alt-font light-gray-text sm-text-extra-small'.$fontsettings_subtitle_class.'"'.$subtitle_style.'>'.$brando_subtitle.'</span>';
                            }
                            if( $enable_separator == 1 ){
                                $output .= '<div class="separator-line-thick bg-dark-blue margin-eight-top"'.$sep_style.'></div>';
                            }
                            if( $brando_dis_text ){
                                $output .= '<div class="travel-special-off bg-deep-orange position-absolute alt-font white-text sm-text-extra-small'.$fontsettings_dis_class.'"'.$discount_style.'>'.$brando_dis_text.'</div>';
                            }
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</article>';
            $output .= '</div>';
            if( $id || $class ):
                $output .= '</div>';
            endif;
        break;

        case 'block-7':
            if( $id || $class ):
                $output .= '<div'.$id.$class.'>';
            endif;
            $output .= '<div class="'.$class_list.' text-center">';
                if( $etline_custom_icon == 1 && !empty( $etline_custom_icon_image ) ) {
                    $output .= '<img src="'.wp_get_attachment_url( $etline_custom_icon_image ).'"'.$image_alt_etline.$image_title_etline.' class="icon-image" />';
                }elseif( $brando_icon ){
                    $output .= '<i class="'.$brando_icon.$icon_size.' medium-gray-text"'.$brando_icon_color.'></i>';
                }
                if( $brando_title ){
                    $output .= '<span class="display-block alt-font medium-gray-text line-height-normal'.$fontsettings_title_class.' '.$text_transform.'"'.$brando_title_color.'>'.$brando_title.'</span>';
                }
                if( $content ){
                    $output .= do_shortcode( brando_remove_wpautop($content) );
                }
            $output .= '</div>';
            if( $id || $class ):
                $output .= '</div>';
            endif;
        break;

        case 'block-8':
            if( $id || $class ):
                $output .= '<div'.$id.$class.'>';
            endif;
            $output .= '<div class="full-screen position-relative xs-restaurant-full-screen-auto">';
                $output .= '<div class="slider-typography text-center">';
                    $output .= '<div class="slider-text-middle-main">';
                        $output .= '<div class="slider-text-middle">';
                            $output .= '<div class="restaurant-dishes bg-white '.$image_position.' position-relative sm-margin-lr-auto sm-float-none position-relative padding-seven-all">';
                            if( isset( $brando_image[0] ) ){
                                $output .= '<div class="margin-four-tb sm-margin-eight-tb xs-no-margin-top">';
                                    $output .= '<img src="'.$brando_image[0].'"'.$image_alt.$image_title.'/>';
                                $output .= '</div>';
                            }
                            if( $brando_link ){
                                $output .= '<a'.$brando_link.''.$brando_link_target.'>';
                            }
                            if( $brando_title ){
                                $output .= '<span class="title-large alt-font text-uppercase brown-text font-weight-600 display-block'.$fontsettings_title_class.'"'.$brando_title_color.'>'.$brando_title.'</span>';
                            }
                            if( $brando_link ){
                                $output .= '</a>';
                            }
                            if( $brando_subtitle ){
                                $output .= '<span class="text-small letter-spacing-1 text-uppercase'.$fontsettings_subtitle_class.'"'.$subtitle_style.'>'.$brando_subtitle.'</span>';
                            }
                            if( isset( $brando_sep_image[0] ) ){
                                $output .= '<div class="margin-eight-tb"><img src="'.$brando_sep_image[0].'"'.$image_alt_sep.$image_title_sep.'/></div>';
                            }
                            if( $content ){
                                $output .= do_shortcode( brando_remove_wpautop($content) );
                            }
                            if( $brando_scroll_to_section == 1){
                                $output .= '<div class="margin-nine-tb">';
                                    $output .= '<a class="inner-link" href="'.$brando_section_id.'"><img src="'.get_template_directory_uri().'/assets/images/arrow-down.png" alt=""/></a>';
                                $output .= '</div>';
                            }
                            if( $brando_enable_border == 1 ){
                                $output .= '<div class="img-border border-deep-yellow z-index-minus2"'.$brando_border_color.'></div>';
                            }
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            $output .= '</div>';
            if( $id || $class ):
                $output .= '</div>';
            endif;
        break;

        case 'block-9':
            if( $id || $class ):
                $output .= '<div'.$id.$class.'>';
            endif;
            if( $brando_subtitle ){
                $output .= '<span class="text-large text-uppercase display-block font-weight-600 margin-three-tb alt-font'.$fontsettings_subtitle_class.'"'.$subtitle_style.'>'.$brando_subtitle.'</span>';
            }             
            if( $brando_title ){
                $output .= '<span class="title-extra-large text-uppercase alt-font font-weight-700 light-gray-text display-block xs-title-medium'.$fontsettings_title_class.'"'.$brando_title_color.'>';
                    if( $brando_link ){
                        $output .= '<a'.$brando_link.''.$brando_link_target.''.$brando_title_color.'>';
                    }
                        $output .= $brando_title;
                    if( $brando_link ){
                        $output .= '</a>';
                    }
                $output .= '</span>'; 
            }           
            if( $enable_separator == 1 ){
                $output .= '<div class="separator-line-thick bg-deep-yellow no-margin-lr sm-margin-four-tb sm-margin-lr-auto"'.$sep_style.'></div>';
            }
            if( $content ){
                $output .= do_shortcode( brando_remove_wpautop($content) );
            }
            if( $id || $class ):
                $output .= '</div>';
            endif;
        break;

        case 'block-10':
            if( $id || $class ):
                $output .= '<div'.$id.$class.'>';
            endif;
            if( $brando_number ){
                    $output .= '<div class="col-md-3 col-lg-2 col-sm-1 col-xs-12 no-padding">';
                        $output .= '<span class="black-text sm-white-text font-weight-700 alt-font title-extra-large-2'.$fontsettings_number_class.'"'.$brando_number_color.'>'.$brando_number.'</span>';
                    $output .= '</div>';
                }
                if( $content ){
                    $output .= '<div class="col-md-9 col-lg-10 col-sm-11 col-xs-12 no-padding counter-style1">';
                            $output .= do_shortcode( brando_remove_wpautop($content) );
                    $output .= '</div>';
                }
            if( $id || $class ):
                $output .= '</div>';
            endif;
        break;

        case 'block-11':
            if( $id || $class ):
                $output .= '<div'.$id.$class.'>';
            endif;
            $output .= '<div class="attending-main">';
                $output .= '<div class="z-index-2">';
                    if( $brando_title ){
                        $output .= '<span class="alt-font title-medium xs-title-small text-uppercase display-block center-col width-100 font-weight-700'.$fontsettings_title_class.'"'.$brando_title_color.'>'.$brando_title.'</span>';
                    }
                    if( $contact_forms_shortcode ){
                        $output .='<div class="padding-twenty no-padding-bottom sm-padding-twenty-three sm-no-padding-bottom">';
                            $output .= do_shortcode('[contact-form-7 id='.$contact_forms_shortcode.']');
                        $output .= '</div>';
                    }
                $output .= '</div>';
            $output .= '</div>';
            if( $id || $class ):
                $output .= '</div>';
            endif;
        break;

        case 'block-12':
            if( $id || $class ):
                $output .= '<div'.$id.$class.'>';
            endif;
            $output .= '<div class="hover-box '.$brando_token_class.'">';
                if( isset( $brando_image[0] ) ){
                    $output .= '<img src="'.$brando_image[0].'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'/>';
                    $output .= '<div class="opacity-light bg-dark-gray"></div>';
                }
                if( $brando_title ){
                    $output .= '<div class="col-md-5 pull-right position-absolute hover-box-text bg-white z-index-1">';
                        $output .= '<span class="text-uppercase title-medium alt-font font-weight-600 md-text-extra-large sm-text-large xs-text-extra-large'.$fontsettings_title_class.'"'.$brando_title_color.'>'.$brando_title.'</span>';
                    $output .= '</div>';
                }
                if( $button_title ){
                    $output .= '<div class="hover-box-more bg-fast-pink position-absolute z-index-1">';
                        $output .= '<a href="'.$button_link.'" target="'.$button_target.'" class="white-text alt-font text-uppercase inner-link">'.$button_title.'</a>';
                    $output .= '</div>';
                }
            $output .= '</div>';
            if( $id || $class ):
                $output .= '</div>';
            endif;
        break;

        case 'block-13':
            if( $id || $class ):
                $output .= '<div'.$id.$class.'>';
            endif;
            $output .= '<div class="hover-box-image '.$brando_token_class.'">';
                $output .= '<figure>';
                if( isset( $brando_image[0] ) ){
                    $output .= '<img src="'.$brando_image[0].'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'/>';
                }
                    $output .= '<figcaption>';
                        if( $brando_title ){
                            $output .= '<h3 class="alt-font text-uppercase vertical-middle white-text z-index-1 md-title-medium sm-title-extra-large xs-title-large no-margin'.$fontsettings_title_class.'"'.$brando_title_color.'>'.$brando_title.'</h3>';
                        }
                        if( $button_title ){
                            $output .= '<div class="hover-box-image-link position-absolute z-index-1">';
                                $output .= '<a href="'.$button_link.'" target="'.$button_target.'" class="line-link alt-font text-uppercase black-text position-relative inner-link">'.$button_title.'</a>';
                            $output .= '</div>';
                        }
                        $output .= '<div class="grid-style1-border border-transperent-white hover-border-color"></div>';
                    $output .= '</figcaption>';
                $output .= '</figure>';
            $output .= '</div>';
            if( $id || $class ):
                $output .= '</div>';
            endif;
        break;

        case 'block-14':
            if( $id || $class ):
                $output .= '<div'.$id.$class.'>';
            endif;
                if( $etline_custom_icon == 1 && !empty( $etline_custom_icon_image ) ) {
                    $output .= '<div class="col-md-2 col-sm-1">';
                        $output .= '<img src="'.wp_get_attachment_url( $etline_custom_icon_image ).'"'.$image_alt_etline.$image_title_etline.' class="icon-image" />';
                    $output .= '</div>';
                }elseif( $brando_icon ){
                    $output .= '<div class="col-md-2 col-sm-1">';
                                    $output .= '<i class="'.$brando_icon.$icon_size.' margin-one-half sm-icon-small no-margin-lr"'.$brando_icon_color.'></i>';
                    $output .= '</div>';
                }
                $output .= '<div class="col-md-10 col-sm-10">';
                    if( $brando_title ){
                        $output .= '<span class="text-uppercase alt-font black-text text-large font-weight-700'.$fontsettings_title_class.'"'.$brando_title_color.'>'.$brando_title.'</span>';
                    }
                    if( $content ){
                        $output .= do_shortcode( brando_remove_wpautop($content) );
                    }
                $output .= '</div>';
            if( $id || $class ):
                $output .= '</div>';
            endif;
        break;

        case 'block-15':
            if( $id || $class ):
                $output .= '<div'.$id.$class.'>';
            endif;
                if( $brando_number ){
                    $output .= '<div class="col-lg-2 col-md-2 col-sm-1 col-xs-2 no-padding">';
                        $output .= '<span class="alt-font title-large light-gray-text'.$fontsettings_number_class.'"'.$brando_number_color.'>'.$brando_number.'</span>';
                    $output .= '</div>';
                }
                $output .= '<div class="col-md-9 col-lg-9 col-sm-10 col-xs-10 no-padding-right padding-three-left counter-style1">';                    
                    if( $brando_title ){
                        $output .= '<span class="alt-font display-block font-weight-600 text-uppercase black-text margin-three-bottom'.$fontsettings_title_class.'"'.$brando_title_color.'>';
                            if( $brando_link ){
                            $output .= '<a'.$brando_link.''.$brando_link_target.''.$brando_title_color.'>';
                            }
                                $output .= $brando_title;

                            if( $brando_link ){
                                $output .= '</a>';
                            }
                        $output .= '</span>'; 
                    }                    
                    if( $content ){
                        $output .= do_shortcode( brando_remove_wpautop($content) );
                    }
                $output .= '</div>';
            if( $id || $class ):
                $output .= '</div>';
            endif;
        break;

        case 'block-16':
            if( $id || $class ):
                $output .= '<div'.$id.$class.'>';
            endif;
            $output .= '<div class="overflow-hidden width-100">';            
                if( $brando_title ){
                    $output .= '<span class="alt-font black-text font-weight-600 text-uppercase  display-block'.$fontsettings_title_class.'"'.$brando_title_color.'>';

                    if( $brando_link ){
                            $output .= '<a'.$brando_link.''.$brando_link_target.''.$brando_title_color.'>';
                        }
                            $output .= $brando_title;
                        if( $brando_link ){
                            $output .= '</a>';
                        }
                    $output .= '</span>'; 

                }            
                if( $brando_subtitle ){
                    $output .= '<span class="alt-font text-uppercase medium-gray-text position-relative top-minus5 display-block'.$fontsettings_subtitle_class.'"'.$subtitle_style.'>'.$brando_subtitle.'</span>';
                }
                if( $brando_year_text ){
                    $output .= '<span class="employment-year white-text bg-black text-uppercase alt-font '.$brando_token_class.''.$fontsettings_year_class.'">'.$brando_year_text.'</span>';
                }
                $output .= do_shortcode( brando_remove_wpautop($content) );
            $output .= '</div>';
            if( $id || $class ):
                $output .= '</div>';
            endif;
        break;

        case 'block-17':
            if( $id || $class ):
                $output .= '<div'.$id.$class.'>';
            endif;
            $output .= '<div class="xs-margin-ten-bottom">';                
                if( $brando_title ){
                    $output .= '<span class="text-uppercase text-large alt-font font-weight-700 black-text display-block margin-two-bottom'.$fontsettings_title_class.'"'.$brando_title_color.'>';
                    if( $brando_link ){
                        $output .= '<a'.$brando_link.''.$brando_link_target.''.$brando_title_color.'>';
                    }
                        $output .= $brando_title;
                    if( $brando_link ){
                        $output .= '</a>';
                    }
                $output .= '</span>'; 

                }                
                if( $content ){
                    $output .= do_shortcode( brando_remove_wpautop($content) );
                }
                if( $enable_separator == 1 ){
                    $output .= '<div class="separator-line-thick margin-eight-all no-margin-lr xs-margin-ten-all xs-no-margin-bottom xs-margin-lr-auto"'.$sep_style.'></div>';
                }
            $output .= '</div>';
            if( $id || $class ):
                $output .= '</div>';
            endif;
        break;

        case 'block-18':
            if( $id || $class ):
                $output .= '<div'.$id.$class.'>';
            endif;
            $output .= '<div class="tattoo-art-box padding-eleven-all md-padding-seven-all xs-padding-five-all">';
                $output .= '<div class="padding-six-all xs-margin-seven-bottom xs-text-center"'.$border_color.'>';
                    if( $brando_small_title ){
                        $output .= '<span class="text-large alt-font white-text text-uppercase'.$fontsettings_smalltitle_class.'">'.$brando_small_title.'</span>';
                    }
                    if( $brando_title ){
                        $output .= '<span class="title-extra alt-font font-weight-700 white-text text-uppercase display-block margin-two-top'.$fontsettings_title_class.'"'.$brando_title_color.'>'.$brando_title.'</span>';
                    }
                $output .= '</div>';
                $output .= '<div class="tattoo-art-box padding-ten-all xs-no-padding xs-text-center">';
                    if( $brando_subtitle ){
                        $output .= '<span class="text-extra-large text-uppercase text-extra-large alt-font white-text display-block margin-eight-bottom xs-margin-five-bottom'.$fontsettings_subtitle_class.'"'.$subtitle_style.'>'.$brando_subtitle.'</span>';
                    }
                    if( $content ){
                        $output .= do_shortcode( brando_remove_wpautop($content) );
                    }
                    if( $button_title ){
                        $output .= '<a class="highlight-button-green btn button no-margin inner-link text-medium '.$brando_token_class.'" href="'.$button_link.'" target="'.$button_target.'">'.$button_title.'<i class="fa fa-long-arrow-right text-extra-large padding-six-left"></i></a>';
                    }
                $output .= '</div>';
            $output .= '</div>';
            if( $id || $class ):
                $output .= '</div>';
            endif;
        break;

        case 'block-19':
            if( $id || $class ):
                $output .= '<div'.$id.$class.'>';
            endif;
            $output .= '<div class="position-relative our-artist">';
                if( isset( $brando_image[0] ) ){
                    $output .= '<img src="'.$brando_image[0].'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'/>';
                }
                $output .= '<div class="img-border border-transperent-green '.$brando_token_class.'">';
                    $output .= '<div class="artist-info xs-padding-five-all">';
                        if( $brando_title ){
                            $output .= '<span class="alt-font text-uppercase title-small black-text font-weight-600 display-block margin-two-bottom'.$fontsettings_title_class.'"'.$brando_title_color.'>'.$brando_title.'</span>';
                        }
                        if( $brando_subtitle ){
                            $output .= '<span class="alt-font text-small text-uppercase black-text display-block margin-seven-bottom'.$fontsettings_subtitle_class.'"'.$subtitle_style.'>'.$brando_subtitle.'</span>';
                        }
                        $output .= do_shortcode( brando_remove_wpautop($content) );
                        if( $brando_email ){
                            $output .= '<span class="text-medium alt-font black-text margin-eight-bottom display-block'.$fontsettings_email_class.'"><i class="black-text fa fa-envelope-o padding-two-right"></i>'.__('Email me: ','brando-addons').'<a href="mailto:'.$brando_email.'" class="black-text">'.$brando_email.'</a></span>';
                        }
                        $output .= '<div class="artist-info-btn">';
                            if( $button_title ){
                                $output .= '<a class="highlight-button-dark btn btn-small button letter-spacing-1 inner-link margin-two-right" target="'.$button_target.'" href="'.$button_link.'">'.$button_title.'</a>';
                            }
                            if( $second_button_title ){
                                $output .= '<a class="highlight-button-dark btn btn-small button letter-spacing-1 inner-link no-margin" target="'.$second_button_target.'" href="'.$second_button_link.'">'.$second_button_title.'</a>';
                            }
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
                $output .= '<div class="artist-title">';
                    $output .= '<a class="alt-font black-text text-extra-large text-uppercase inner-link'.$fontsettings_title_class.'" href="'.$button_link.'">'.$brando_title.'</a>';
                $output .= '</div>';
            $output .= '</div>';
            if( $id || $class ):
                $output .= '</div>';
            endif;
        break;

        case 'block-20':
            if( $id || $class ):
                $output .= '<div'.$id.$class.'>';
            endif;
            $output .= '<div class="itinerary ajax-popup-content"><p class="'.$fontsettings_title_class.'">';
                $output .= '<span class="'.$fontsettings_title_class.'">'.$brando_title.'</span>';
                $output .= $brando_subtitle;
            $output .= '</p></div>';
            if( $id || $class ):
                $output .= '</div>';
            endif;
        break;

        case 'block-21':
            if( $id || $class ):
                $output .= '<div'.$id.$class.'>';
            endif;
                if( $brando_number ){
                    $output .= '<div class="col-md-3 col-sm-2 col-xs-2 no-padding sm-display-none">';
                        $output .= '<span class="title-extra-large-2 crimson-red-text alt-font'.$fontsettings_number_class.'"'.$brando_number_color.'>'.$brando_number.'</span>';
                    $output .= '</div>';
                }
                $output .= '<div class="col-md-9 col-sm-9 col-xs-12 no-padding text-left">';                    
                    if( $brando_title ){
                        $output .= '<span class="alt-font text-medium alt-font text-uppercase black-text'.$fontsettings_title_class.'"'.$brando_title_color.'>';
                            if( $brando_link ){
                                $output .= '<a'.$brando_link.''.$brando_link_target.''.$brando_title_color.'>';
                            }
                                $output .= $brando_title;

                            if( $brando_link ){
                                $output .= '</a>';
                            }
                        $output .= '</span>'; 
                    }                   
                    if( $enable_separator == 1 ){
                        $output .= '<div class="separator-line-thick bg-mid-gray no-margin-lr xs-margin-three-all xs-no-margin-lr"'.$sep_style.'></div>';
                    }
                    if( $content ){
                        $output .= do_shortcode( brando_remove_wpautop($content) );
                    }
                $output .= '</div>';
            if( $id || $class ):
                $output .= '</div>';
            endif;
        break;

        case 'block-22':
            if( $id || $class ):
                $output .= '<div'.$id.$class.'>';
            endif;
                if( isset( $brando_image[0] ) ){
                    $output .= '<div class="col-md-2 col-sm-2 col-xs-3 no-padding-left margin-one-tb">';
                        $output .= '<img src="'.$brando_image[0].'"'.$image_alt.$image_title.'/>';
                    $output .= '</div>';
                }
                $output .= '<div class="col-md-9 col-sm-9 col-xs-9 no-padding-right">';                    
                    if( $brando_title ){
                        $output .= '<span class="text-medium alt-font font-weight-600 text-uppercase margin-three-bottom display-block'.$fontsettings_title_class.'"'.$brando_title_color.'>';
                        if( $brando_link ){
                            $output .= '<a'.$brando_link.''.$brando_link_target.''.$brando_title_color.'>';
                        }
                            $output .= $brando_title;
                        if( $brando_link ){
                            $output .= '</a>';
                        }
                        $output .= '</span>'; 
                    }                   
                    if( $content ){
                        $output .= do_shortcode( brando_remove_wpautop($content) );
                    }
                $output .= '</div>';
            if( $id || $class ):
                $output .= '</div>';
            endif;
        break;
    }
    return $output;
}
add_shortcode( 'brando_content_block', 'brando_content_block_shortcode' );

/*-----------------------------------------------------------------------------------*/
/* Special Content Block */
/*-----------------------------------------------------------------------------------*/
?>
