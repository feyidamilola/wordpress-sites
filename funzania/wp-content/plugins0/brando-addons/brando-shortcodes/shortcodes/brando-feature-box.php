<?php
/**
 * Shortcode For Feature Box
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Feature Box */
/*-----------------------------------------------------------------------------------*/
$breadcrumb_text = NULL;
if ( ! function_exists( 'brando_feature_box_shortcode' ) ) {
    function brando_feature_box_shortcode( $atts, $content = null ) {
        global $post;
        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'brando_feature_type' => '',
            'brando_et_line_icon_list' =>'',
            'brando_feature_title' => '',
            'brando_feature_subtitle' => '',
            'brando_price' => '',
            'brando_feature_image' => '',
            'brando_posts_list' => '',
            'brando_number' => '',
            'counter_icon_size' => '',
            'brando_border_transperent' =>'',
            'brando_show_border'=>'',
            'brando_title_color' => '',
            'brando_hover_title_color' => '',
            'brando_event_date' => '',
            'brando_event_time' => '',
            'brando_back_hover_color' => '',
            'brando_icon_color' => '',
            'brando_feature_icon' => '',
            'brando_border_color' =>'',
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
            'brando_enable_seperator' => '1',
            'brando_team_member_title' => '',
            'brando_team_member_designation' => '',
            'brando_team_member_fb' => '',
            'brando_team_member_fb_url' => '',
            'brando_team_member_tw' => '',
            'brando_team_member_tw_url' => '',
            'brando_team_member_googleplus' => '',
            'brando_team_member_googleplus_url' => '',
            'brando_designation_color' => '',
            'brando_image_pos' => '',
            'brando_price_color' => '',
            'brando_price_bg_color' => '',
            'brando_title_bg_color' => '',
            'brando_button_text' => '',
            'brando_post_date_color' => '',
            'brando_author_color' => '',
            'with_gray_border' => '',
            'brando_sep_color' => '',
            'brando_seperator_height' => '',
            'etline_custom_icon' => '',
            'etline_custom_icon_image' => '',
            'brando_show_post_title' => '',
            'brando_show_excerpt' => '1',
            'brando_excerpt_length' => '15',
            'brando_show_post_author' => '1',
            'brando_show_post_date' => '1',
            'brando_show_post_category' => '1',
            'brando_date_format' => '',
            'brando_number_color' => '',
            'brando_subtitle_color' => '',
            'brando_token_class' => '',
            'brando_hover_border_color' => '',
            'brando_hover_bg_color' => '',
            'brando_meta_color' => '',
            'brando_post_icon_color' => '',
            'brando_link' => '',
            'brando_link_target' => '',
            'brando_image_srcset' => 'full',
            'brando_custom_image_srcset' => 'full',
            'title_settings' => '',
            'subtitle_settings' => '',
            'postmeta_settings' => '',
            'number_settings' => '',
            'price_settings' => '',
            'category_settings' => '',
        ), $atts ) );

        global $tz_featured_array, $tz_featured_ipad_array, $tz_featured_mobile_array,$font_settings_array;
        $output = $btn_class = $sep_style = '';
        $classes = array();
        $brando_token_class = $brando_token_class.$id;
        $id = ($id) ? ' id="'.$id.'"' : '';
        $class = ( $class ) ? ' class="'.$class.'"' : '';
        if ( function_exists('vc_parse_multi_attribute') ) {
            //First button
            $button_parse_args = vc_parse_multi_attribute($brando_button_text);
            $button_link     = ( isset($button_parse_args['url']) ) ? $button_parse_args['url'] : '#';
            $button_title    = ( isset($button_parse_args['title']) ) ? $button_parse_args['title'] : '';
            $button_target   = ( isset($button_parse_args['target']) ) ? trim($button_parse_args['target']) : '_self';
        }

        ( $brando_title_color ) ? $tz_featured_array[] = '.'.$brando_token_class.' .brando-title-color{ color:'.$brando_title_color.';}' : '';
        ( $brando_hover_title_color ) ? $tz_featured_array[] = '.'.$brando_token_class.':hover .brando-title-color{ color:'.$brando_hover_title_color.';}' : '';

        $brando_image_srcset = ($brando_image_srcset) ? $brando_image_srcset : 'full';
        $brando_date_format = ( $brando_date_format ) ? $brando_date_format : '';
        $brando_image_position = ( $brando_image_pos == 1 ) ? 'pull-left' : 'pull-right';
        $content_pos = ( $brando_image_pos == 1 ) ? 'position-right' : 'position-left';
        $icon_size = ( $counter_icon_size ) ? ' '.$counter_icon_size : ' medium-icon';
        $brando_title_color = ( $brando_title_color ) ?  ' style="color:'.$brando_title_color.' !important;"' : '';
        $brando_number_color = ( $brando_number_color ) ?  ' style="color:'.$brando_number_color.' !important;"' : '';
        $brando_subtitle_color = ( $brando_subtitle_color ) ?  ' style="color:'.$brando_subtitle_color.' !important;"' : '';
        $brando_designation_color = ( $brando_designation_color ) ? ' style="color: '.$brando_designation_color.' !important;"' : '';
        $thumb = wp_get_attachment_image_src($brando_feature_image, $brando_image_srcset);
        $brando_link = ( $brando_link ) ? ' href="'.$brando_link.'"' : '';       
        $brando_link_target = ( $brando_link_target ) ? ' target="'.$brando_link_target.'"' : '';
        
        /* Image Alt, Title, Caption */
        $img_alt = brando_option_image_alt($brando_feature_image);
        $img_title = brando_option_image_title($brando_feature_image);
        $image_alt = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? 'alt="'.$img_alt['alt'].'"' : 'alt=""' ;
        $image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

        // custom icon image
        $brando_custom_image_srcset = ($brando_custom_image_srcset) ? $brando_custom_image_srcset : 'full';
        $custom_image = wp_get_attachment_image_src($etline_custom_icon_image, $brando_custom_image_srcset);
        $srcset_icon = $srcset_data_icon = '';
        $srcset_icon = wp_get_attachment_image_srcset( $etline_custom_icon_image, $brando_custom_image_srcset );
        if( $srcset_icon ){
            $srcset_data_icon = ' srcset="'.esc_attr( $srcset_icon ).'"';
        }

        $sizes_icon = $sizes_data_icon = '';
        $sizes_icon = wp_get_attachment_image_sizes( $etline_custom_icon_image, $brando_custom_image_srcset );
        if( $sizes_icon ){
            $sizes_data_icon = ' sizes="'.esc_attr( $sizes_icon ).'"';
        }

        $img_alt_etline = brando_option_image_alt($etline_custom_icon_image);
        $img_title_etline = brando_option_image_title($etline_custom_icon_image);
        $image_alt_etline = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ;
        $image_title_etline = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';        

        // custom color
        ( $brando_hover_border_color ) ? $tz_featured_array[] = '.'.$brando_token_class.':hover{ border-color:'.$brando_hover_border_color.';}' : '';
        ( $brando_hover_bg_color ) ? $tz_featured_array[] = '.'.$brando_token_class.':hover{ background:'.$brando_hover_bg_color.';}' : '';
        ( $brando_post_icon_color ) ? $tz_featured_array[] = '.'.$brando_token_class.' .post-title::before{ color:'.$brando_post_icon_color.';}' : '';
         
        $brando_icon_color = ( $brando_icon_color ) ? ' style="color:'.$brando_icon_color.';"' : '';
        $brando_price_color = ( $brando_price_color ) ? ' style="color:'.$brando_price_color.' !important;"' : '';
        $brando_price_bg_color = ( $brando_price_bg_color ) ? ' style="background:'.$brando_price_bg_color.' !important;"' : '';
        $brando_title_bg_color = ( $brando_title_bg_color ) ? ' style="background:'.$brando_title_bg_color.' !important;"' : '';

        $brando_post_date_color = ( $brando_post_date_color ) ? ' style="color:'.$brando_post_date_color.' !important;"' : '';
        $brando_author_color = ( $brando_author_color ) ? ' style="color:'.$brando_author_color.' !important;"' : '';
        $brando_meta_color = ( $brando_meta_color ) ? ' style="color:'.$brando_meta_color.' !important;"' : '';

        $brando_sep_color = ( $brando_sep_color ) ? 'background:'.$brando_sep_color.';' : '';
        $brando_seperator_height = ( $brando_seperator_height ) ? 'height:'.$brando_seperator_height.';' : '';

        if( $brando_sep_color || $brando_seperator_height ){
            $sep_style .= ' style="'.$brando_sep_color.$brando_seperator_height.'"';
        }

        $brando_et_line_icon_list = ( $brando_et_line_icon_list ) ? $brando_et_line_icon_list : '';
        $brando_feature_title = ( $brando_feature_title ) ? $brando_feature_title : '';
        $brando_feature_price = ( $brando_feature_title ) ? $brando_feature_title : '';
        $brando_price = ( $brando_price ) ? $brando_price : '';
        $with_gray_border = ( $with_gray_border == 1 ) ? 'features-box-style2-sub': 'service-sub';

        $brando_feature_subtitle = ( $brando_feature_subtitle ) ? $brando_feature_subtitle : '';
        $brando_transperent = ( $brando_border_transperent ) ? $brando_border_transperent : '';
        $brando_excerpt_length = ($brando_excerpt_length) ? $brando_excerpt_length : '15';
        $brando_team_member_title = ( $brando_team_member_title ) ? $brando_team_member_title : '';
        $brando_team_member_designation = ( $brando_team_member_designation ) ? $brando_team_member_designation : '';
        $brando_team_member_fb = ( $brando_team_member_fb ) ? $brando_team_member_fb : '';
        $brando_team_member_fb_url = ( $brando_team_member_fb_url ) ? $brando_team_member_fb_url : '#';
        $brando_team_member_tw = ( $brando_team_member_tw ) ? $brando_team_member_tw : '';
        $brando_team_member_tw_url = ( $brando_team_member_tw_url ) ? $brando_team_member_tw_url : '#';
        $brando_team_member_googleplus = ( $brando_team_member_googleplus ) ? $brando_team_member_googleplus : '';
        $brando_team_member_googleplus_url = ( $brando_team_member_googleplus_url ) ? $brando_team_member_googleplus_url : '#';
        $target = 'target="_BLANK"';
        /* Event date and time */
        $brando_event_date = ( $brando_event_date ) ? $brando_event_date : '';
        $brando_event_time = ( $brando_event_time ) ? $brando_event_time : '';
        
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
        $feature_box_class = ( $class_list ) ? ' '.$class_list : '';

        if($brando_border_transperent == 'custom'){
            $brando_border_color = ( $brando_border_color ) ? ' style ="color: '.$brando_border_color.' !important; border:5px solid"' : '' ;
        }else{
            $brando_border_transperent = ( $brando_border_transperent ) ? ' '.$brando_border_transperent : '';
        }

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

            // 'title_settings' => '',
            // 'subtitle_settings' => '',
            // 'postmeta_settings' => '',
            // 'number_settings' => '',
            // 'price_settings' => '',
            // 'category_settings' => '',

        //Font Settings For Title
        $fontsettings_title_class = $fontsettings_title_id = $responsive_style_title = $fontsettings_subtitle_id = $responsive_style_subtitle = $fontsettings_subtitle_class = $fontsettings_postmeta_id = $responsive_style_postmeta = $fontsettings_postmeta_class = $fontsettings_number_id = $responsive_style_number = $fontsettings_number_class = $fontsettings_price_id = $responsive_style_price = $fontsettings_price_class = $fontsettings_category_id = $responsive_style_category = $fontsettings_category_class = '';
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
        //Font Settings For Post Meta
        if( !empty( $postmeta_settings ) ) {
            $fontsettings_postmeta_id = uniqid('brando-font-setting-');
            $responsive_style_postmeta = brando_Responsive_font_settings::generate_css( $postmeta_settings, $fontsettings_postmeta_id );
            $fontsettings_postmeta_class = ' '.$fontsettings_postmeta_id;
        }
        ( !empty( $responsive_style_postmeta ) ) ? $font_settings_array[] = $responsive_style_postmeta : '';
        //Font Settings For Number
        if( !empty( $number_settings ) ) {
            $fontsettings_number_id = uniqid('brando-font-setting-');
            $responsive_style_number = brando_Responsive_font_settings::generate_css( $number_settings, $fontsettings_number_id );
            $fontsettings_number_class = ' '.$fontsettings_number_id;
        }
        ( !empty( $responsive_style_number ) ) ? $font_settings_array[] = $responsive_style_number : '';
        //Font Settings For Price
        if( !empty( $price_settings ) ) {
            $fontsettings_price_id = uniqid('brando-font-setting-');
            $responsive_style_price = brando_Responsive_font_settings::generate_css( $price_settings, $fontsettings_price_id );
            $fontsettings_price_class = ' '.$fontsettings_price_id;
        }
        ( !empty( $responsive_style_price ) ) ? $font_settings_array[] = $responsive_style_price : '';
        //Font Settings For category
        if( !empty( $category_settings ) ) {
            $fontsettings_category_id = uniqid('brando-font-setting-');
            $responsive_style_category = brando_Responsive_font_settings::generate_css( $category_settings, $fontsettings_category_id );
            $fontsettings_category_class = ' '.$fontsettings_category_id;
        }
        ( !empty( $responsive_style_category ) ) ? $font_settings_array[] = $responsive_style_category : '';

        switch ($brando_feature_type) {
            case 'featurebox1':
                if( $id || $class ):
                    $output .= '<div'.$id.$class.'>';
                endif;
                    if($brando_number || $brando_feature_title){
                        $output .='<span class="text-uppercase text-large alt-font font-weight-600 deep-gray-text margin-six-bottom display-inline-block'.$fontsettings_title_class.'"'.$brando_title_color.'>';
                        if($brando_number){
                            $output .='<span class="crimson-red-text'.$fontsettings_number_class.'"'.$brando_number_color.'>'.$brando_number.'. &nbsp;</span>';
                        }
                        if( $brando_link ){
                            $output .= '<a'.$brando_link.''.$brando_link_target.''.$brando_title_color.'>';
                        }
                            $output .= $brando_feature_title;
                        if( $brando_link ){
                            $output .= '</a>';
                        }
                        $output .= '</span>';
                        
                    }
                    if($thumb[0]){
                        if( $brando_link ){
                            $output .= '<a'.$brando_link.''.$brando_link_target.'>';
                        }
                            $output .='<img src="'.$thumb[0].'" width="'.$thumb[1].'" height="'.$thumb[2].'" '.$image_alt.$image_title.$srcset_data.$sizes_data.' class="'.$feature_box_class.' '.$brando_token_class.'"/>';

                        if( $brando_link ){
                            $output .= '</a>';
                        }
                    }
                    if( $content ){
                        $output .= do_shortcode( brando_remove_wpautop( $content ) );
                    }
                    if($brando_enable_seperator == 1)
                    {       
                       $output .='<div class="separator-line-thick bg-crimson-red margin-ten-all no-margin-lr no-margin-bottom"'.$sep_style.'></div> ';
                    }
                if( $id || $class ):
                    $output .= '</div>';
                endif;
            break; 

            case 'featurebox2':
                if( $id || $class ):
                    $output .= '<div'.$id.$class.'>';
                endif;
                $output .= '<div class="'.$with_gray_border.$feature_box_class.' '.$brando_token_class.'">';
                    if( $etline_custom_icon == 1 && !empty( $custom_image ) ) {
                        $output .= '<img src="'.$custom_image[0].'"'.$image_alt_etline.$image_title_etline.' class="icon-image margin-four-bottom" width="'.$custom_image[1].'" height="'.$custom_image[2].'"'.$srcset_data_icon.$sizes_data_icon.' />';
                    }elseif($brando_et_line_icon_list){
                       $output .= '<i class="margin-four-bottom '.$brando_et_line_icon_list.$icon_size.'"'.$brando_icon_color.'></i>';
                    }
                    if($brando_feature_title){
                       $output .= '<span class="text-medium font-weight-600 text-uppercase margin-two-bottom display-block brando-title-color alt-font'.$fontsettings_title_class.'">';
                            if( $brando_link ){
                                $output .= '<a'.$brando_link.''.$brando_link_target.'>';
                            }
                                $output .= $brando_feature_title;

                            if( $brando_link ){
                                $output .= '</a>';
                            }
                       $output .= '</span>';
                    }
                    if($brando_enable_seperator == 1)
                    {       
                       $output .='<div class="separator-line-thick margin-tb-15px bg-deep-blue center-col no-margin-lr"'.$sep_style.'></div> ';
                    }
                    if($content){
                       $output .= do_shortcode( brando_remove_wpautop( $content ) );
                    }
                $output .= '</div>';
                if( $id || $class ):
                    $output .= '</div>';
                endif;
            break;

            case 'featurebox3':
                $brando_feature = str_replace("||", "<br >", $brando_feature_title);
                if( $id || $class ):
                    $output .= '<div'.$id.$class.'>';
                endif;
                $output .='<div class="features-box-style1 center-col">';
                    $output .='<div class="features-box-style1-sub">';
                        if( $etline_custom_icon == 1 && !empty( $custom_image ) ) {
                            $output .= '<img src="'.$custom_image[0].'"'.$image_alt_etline.$image_title_etline.' class="icon-image" width="'.$custom_image[1].'" height="'.$custom_image[2].'"'.$srcset_data_icon.$sizes_data_icon.' />';
                        }elseif($brando_et_line_icon_list){
                            $output .='<i class="'.$brando_et_line_icon_list.$icon_size.'"'.$brando_icon_color.'></i>';
                        }
                        if($brando_feature_title){
                            $output .='<h5 class="text-large text-uppercase alt-font no-margin'.$fontsettings_title_class.'"'.$brando_title_color.'>';
                                if( $brando_link ){
                                    $output .= '<a'.$brando_link.''.$brando_link_target.''.$brando_title_color.'>';
                                }
                                    $output .= $brando_feature;

                                if( $brando_link ){
                                    $output .= '</a>';
                                }
                            $output .= '</h5>';
                        }
                    $output .='</div>';
	            $output .='</div>';
                if( $id || $class ):
                    $output .= '</div>';
                endif;
			break;

            case 'featurebox4':
                if( $id || $class ):
                    $output .= '<div'.$id.$class.'>';
                endif;
                $output .= '<div class="testimonial-style1">';
    		        if($thumb[0]){
    		           $output .= '<img '.$image_alt.$image_title.' width="'.$thumb[1].'" height="'.$thumb[2].'" src="'.$thumb[0].'">';
                    }
    		        if($content){
    		           $output .= brando_remove_wpautop( $content );
                    }
    		        if($brando_feature_title){
    		           $output .= '<span class="name'.$fontsettings_title_class.'"'.$brando_title_color.'>'.$brando_feature_title.'</span>';
                    }
                    if($brando_feature_icon == 1 ){
    		          $output .= '<i class="fa fa-quote-left isplay-block margin-eight-top xs-margin-two-top'.$icon_size.'"'.$brando_icon_color.'></i>';
                    }
	            $output .= '</div>';
                if( $id || $class ):
                    $output .= '</div>';
                endif;
            break;
            
            case 'featurebox5':
                if( $id || $class ):
                    $output .= '<div'.$id.$class.'>';
                endif;
                if( $etline_custom_icon == 1 && !empty( $custom_image ) ) {
                    $output .= '<img src="'.$custom_image[0].'"'.$image_alt_etline.$image_title_etline.' class="icon-image margin-five-bottom xs-margin-two-bottom" width="'.$custom_image[1].'" height="'.$custom_image[2].'"'.$srcset_data_icon.$sizes_data_icon.' />';
                }elseif( $brando_et_line_icon_list ){
                    $output .= '<i class="'.$brando_et_line_icon_list.$icon_size.' margin-five-bottom xs-margin-two-bottom"'.$brando_icon_color.'></i>';
                }
                if($brando_feature_title){
                    $output .= '<span class="font-weight-700 text-uppercase display-block alt-font margin-three-bottom'.$fontsettings_title_class.'"'.$brando_title_color.'>';
                        if( $brando_link ){
                            $output .= '<a'.$brando_link.''.$brando_link_target.''.$brando_title_color.'>';
                        }
                            $output .= $brando_feature_title;

                        if( $brando_link ){
                            $output .= '</a>';
                        }
                    $output .= '</span>';
                }
                if($brando_enable_seperator == 1){
                    $output .= '<div class="separator-line bg-yellow no-margin-lr margin-ten xs-center-col"'.$sep_style.'></div>';
                }
                if($content){
                   $output .= brando_remove_wpautop( $content );
                }
                if( $id || $class ):
                    $output .= '</div>';
                endif;
            break;
            
            case 'featurebox6':
                if( $id || $class ):
                    $output .= '<div'.$id.$class.'>';
                endif;
                $output .= '<div class="text-center pricing-box">';
                    if( $brando_price ){
                        $output .= '<div class="pricing-price bg-deep-blue"'.$brando_price_bg_color.'>';
                            $output .= '<h3 class="title-extra-large-2 white-text alt-font no-margin'.$fontsettings_price_class.'"'.$brando_price_color.'>'.$brando_price.'</h3>';
                        $output .= '</div>';
                    }
                    if( $brando_feature_title ){
                        $output .= '<div class="pricing-title bg-deep-blue-dark"'.$brando_title_bg_color.'>';
                            $output .= '<span class="white-text text-large text-uppercase alt-font font-weight-600'.$fontsettings_title_class.'"'.$brando_title_color.'>'.$brando_feature_title.'</span>';
                        $output .= '</div>';
                    }
                    if( $content ){
                        $output .= '<div class="pricing-features">';
                            $output .= brando_remove_wpautop( $content );
                        $output .= '</div>';
                    }
                    if( !empty($button_title) ){
                        $output .= '<div class="pricing-action">';
                            $output .= '<a href="'.$button_link.'" target="'.$button_target.'" class="highlight-button-dark btn btn-small button no-margin inner-link">'.$button_title.'</a>';
                        $output .= '</div>';
                    }
                $output .= '</div>';
                if( $id || $class ):
                    $output .= '</div>';
                endif;
            break;

            case 'featurebox7':
                if( $id || $class ):
                    $output .= '<div'.$id.$class.'>';
                endif;
                    $output .= '<div class="col-lg-2 col-md-3 col-sm-2 col-xs-3 no-padding">';
                        if( $etline_custom_icon == 1 && !empty( $custom_image ) ) {
                            $output .= '<img src="'.$custom_image[0].'"'.$image_alt_etline.$image_title_etline.' class="icon-image" width="'.$custom_image[1].'" height="'.$custom_image[2].'"'.$srcset_data_icon.$sizes_data_icon.' />';
                        }elseif($brando_et_line_icon_list){
                           $output .= '<i class="'.$brando_et_line_icon_list.$icon_size.'"'.$brando_icon_color.'></i>';
                        }
                        $output .= '</div>';
                        $output .='<div class="col-lg-10 col-md-9 col-sm-10 col-xs-9 no-padding">';
                        if($brando_feature_title){
                            $output .= '<span class="display-block alt-font font-weight-700 text-uppercase black-text margin-two-bottom'.$fontsettings_title_class.'"'.$brando_title_color.'>';

                            if( $brando_link ){
                                $output .= '<a'.$brando_link.''.$brando_link_target.''.$brando_title_color.'>';
                            }
                                $output .= $brando_feature_title;

                            if( $brando_link ){
                                $output .= '</a>';
                            }
                            $output .= '</span>';                           
                        }
                        if($content){
                            $output .= brando_remove_wpautop( $content );
                        }
                    $output .= '</div>';
                if( $id || $class ):
                    $output .= '</div>';
                endif;
            break;

            case 'featurebox8':
                if( $id || $class ):
                    $output .= '<div'.$id.$class.'>';
                endif;
                $output .= '<div class="special-dishes '.$brando_token_class.'">';
                    if($thumb[0]){                        
                        if( $brando_link ){
                            $output .= '<a'.$brando_link.''.$brando_link_target.'>';
                        }
                            $output .= '<img src="'.$thumb[0].'" width="'.$thumb[1].'" height="'.$thumb[2].'" '.$image_alt.$image_title.$srcset_data.$sizes_data.'/>';

                        if( $brando_link ){
                            $output .= '</a>';
                        }

                    }
                    if($brando_feature_title){
                       $output .= '<div class="text-uppercase alt-font text-extra-large sm-text-large margin-eight-top xs-margin-four-top'.$fontsettings_title_class.'"'.$brando_title_color.'>';
                            if( $brando_link ){
                                $output .= '<a'.$brando_link.''.$brando_link_target.''.$brando_title_color.'>';
                            }
                                $output .= $brando_feature_title;

                            if( $brando_link ){
                                $output .= '</a>';
                            }
                       $output .= '</div>';
                    }
                    if($brando_feature_subtitle){
                       $output .= '<div class="text-uppercase text-small light-gray-text alt-font font-weight-600 margin-one-tb sm-padding-two-all'.$fontsettings_subtitle_class.'"'.$brando_subtitle_color.'>'.$brando_feature_subtitle.'</div>';
                    }
                    if($brando_price){
                       $output .= '<div class="bg-deep-red round-border special-dishes-price text-center text-uppercase alt-font white-text position-absolute"'.$brando_price_bg_color.'><span class="text-small"'.$brando_price_color.'>'.__('Only','brando-addons').'</span><br><span class="text-extra-large line-height-unset'.$fontsettings_price_class.'"'.$brando_price_color.'>'.$brando_price.'</span></div>';
                    }
                $output .= '</div>';
                if( $id || $class ):
                    $output .= '</div>';
                endif;
            break;

            case 'featurebox9':
                if( $id || $class ):
                    $output .= '<div'.$id.$class.'>';
                endif;
                $output .= '<div class="wedding-event-box padding-fifteen-all sm-padding-eight-all">';
                    if( $etline_custom_icon == 1 && !empty( $custom_image ) ) {
                                $output .= '<img src="'.$custom_image[0].'"'.$image_alt_etline.$image_title_etline.' class="icon-image margin-five-bottom xs-margin-six-bottom" width="'.$custom_image[1].'" height="'.$custom_image[2].'"'.$srcset_data_icon.$sizes_data_icon.' />';
                    }elseif( $brando_et_line_icon_list ){
                        $output .= '<i class="'.$brando_et_line_icon_list.$icon_size.' turquoise-blue-text margin-five-bottom xs-margin-six-bottom"'.$brando_icon_color.'></i>';
                    }
                    if( $brando_feature_title ){
                        $output .= '<span class="text-uppercase alt-font text-large display-block font-weight-600 margin-nine-bottom'.$fontsettings_title_class.'"'.$brando_title_color.'>';
                        if( $brando_link ){
                            $output .= '<a'.$brando_link.''.$brando_link_target.''.$brando_title_color.'>';
                        }
                            $output .= $brando_feature_title;

                        if( $brando_link ){
                            $output .= '</a>';
                        }
                        $output .= '</span>'; 
                       
                    }
                    if( $brando_enable_seperator == 1 ){
                        $output .= '<div class="divider-line margin-nine-bottom"'.$sep_style.'></div>';
                    }
                    if( $content ){
                        $output .= do_shortcode( brando_remove_wpautop($content) );
                    }
                $output .= '</div>';
                if( $id || $class ):
                    $output .= '</div>';
                endif;
            break;

            case 'featurebox10':
                if( $id || $class ):
                    $output .= '<div'.$id.$class.'>';
                endif;
                $args = array('post_type' => 'post',
                            'name' => $brando_posts_list,
                        );
                $query = new WP_Query( $args );
                $brando_post_classes = '';
                ob_start();
                    post_class();
                    $brando_post_classes .= ob_get_contents();
                ob_end_clean();
                $output .= '<div '.$brando_post_classes.'>';
                    $output .= '<div class="blog-post-style7">';
                        while ( $query->have_posts() ) : $query->the_post();
                        $brando_post_classes = '';
                        ob_start();
                            post_class();
                            $brando_post_classes .= ob_get_contents();
                        ob_end_clean();
                        /* Image Alt, Title, Caption */
                        $img_alt = brando_option_image_alt(get_post_thumbnail_id());
                        $img_title = brando_option_image_title(get_post_thumbnail_id());
                        $image_alt = ( isset($img_alt['alt']) ) ? $img_alt['alt'] : '' ; 
                        $image_title = ( isset($img_title['title']) ) ? $img_title['title'] : '';
                        $brando_show_date = ( $brando_show_post_date == 1 ) ? '<span class="published"><a href="'.get_permalink().'" class="light-gray-text"'.$brando_meta_color.'>'.get_the_date( $brando_date_format, get_the_ID()).'</a></span><time class="updated display-none" datetime="'.esc_attr( get_the_modified_date( 'c' ) ).'">'.get_the_modified_date( $brando_date_format ).'</time>' : '';
                        $brando_show_author = ( $brando_show_post_author == 1 ) ? esc_html__(' / Posted by','brando-addons').' <span class="author vcard"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'" class="light-gray-text url fn n"'.$brando_meta_color.'>'.get_the_author().'</a></span>' : '';

                        $img_attr = array(
                            'title' => $image_title,
                            'alt' => $image_alt,
                        );
                            $post_cat = array();
                            $categories = get_the_category();
                            foreach ($categories as $k => $cat) {
                                $cat_link = get_category_link($cat->cat_ID);
                                $post_cat[]='<span class="text-extra-small post-categories text-uppercase alt-font bg-black display-inline-block margin-four-bottom'.$fontsettings_category_class.'"><a href="'.$cat_link.'" class="white-text">'.$cat->name.'</a></span>';
                            }
                            $post_category=implode(" ",$post_cat);
                            $post_format = get_post_format( get_the_ID() );
                            $show_excerpt = ( $brando_show_excerpt == 1 ) ? brando_get_the_excerpt_theme($brando_excerpt_length) : brando_get_the_excerpt_theme(55);
                                $output .='<div class="post-thumbnail overflow-hidden">';
                                    if($post_format == 'image'){
                                        ob_start();
                                            include BRANDO_ADDONS_ROOT . '/loop/loop-image.php';
                                            $output .= ob_get_contents();  
                                        ob_end_clean();  
                                    }elseif($post_format == 'gallery'){
                                        ob_start();
                                            include BRANDO_ADDONS_ROOT . '/loop/loop-gallery.php';
                                            $output .= ob_get_contents();  
                                        ob_end_clean();  
                                    }elseif($post_format == 'video'){
                                        ob_start();
                                            include BRANDO_ADDONS_ROOT . '/loop/loop-video.php';
                                            $output .= ob_get_contents();  
                                        ob_end_clean();  
                                    }elseif($post_format == 'quote'){
                                        ob_start();
                                            include BRANDO_ADDONS_ROOT . '/loop/loop-quote.php';
                                            $output .= ob_get_contents();  
                                        ob_end_clean();  
                                    }else{
                                        $output .=  '<div class="blog-image"><a href="'.get_permalink().'">';
                                            if ( has_post_thumbnail() ) {
                                                $output .= get_the_post_thumbnail( get_the_ID(), $brando_image_srcset,$img_attr );
                                            }
                                        $output .=  '</a></div>';
                                    }
                                $output .='</div>';
                                $output .='<div class="post-details margin-eight-top">';
                                    if( $brando_show_post_category == 1 ){
                                        $output .= $post_category;
                                    }
                                    $output .='<span class="text-large text-uppercase display-block alt-font margin-four-bottom sm-text-medium xs-text-medium alt-font font-weight-600'.$fontsettings_title_class.'">';
                                        $output .='<a href="'.get_permalink().'" class="dark-gray-text entry-title"'.$brando_title_color.'>'.get_the_title().'</a>';
                                        $output .='</span>';
                                    if( $brando_show_excerpt == 1 ){
                                        $output .= '<p class="margin-seven-bottom xs-margin-five-bottom entry-content">'.$show_excerpt.'</p>';
                                    }

                                    if( $brando_enable_seperator == 1 ){
                                        $output .='<div class="separator-line-full bg-mid-gray3 margin-seven-bottom xs-margin-five-bottom"'.$sep_style.'></div>';
                                    }
                                    if( $brando_show_post_date == 1 || $brando_show_post_author == 1 ){
                                        $output .='<span class="text-small text-uppercase alt-font light-gray-text'.$fontsettings_postmeta_class.'"'.$brando_meta_color.'>';
                                            $output .= $brando_show_date.$brando_show_author;
                                        $output .='</span>';
                                    }
                                $output .='</div>';
                        endwhile;
                    $output .= '</div>';
                    wp_reset_postdata();
                    $output .= '</div>';
                if( $id || $class ):
                    $output .= '</div>';
                endif;
            break;

            case 'featurebox11':
                if( $id || $class ):
                    $output .= '<div'.$id.$class.'>';
                endif;
                $args = array('post_type' => 'post',
                            'name' => $brando_posts_list,
                        );
                $query = new WP_Query( $args );
                $brando_post_classes = '';
                ob_start();
                    post_class();
                    $brando_post_classes .= ob_get_contents();
                ob_end_clean();
                $output .= '<div '.$brando_post_classes.'>';
                    while ( $query->have_posts() ) : $query->the_post();
                    $post_author = get_post_field( 'post_author', get_the_ID() );

                    $brando_show_date = ( $brando_show_post_date == 1 ) ? '<span class="published">'.get_the_date( $brando_date_format, get_the_ID()).'</span><time class="updated display-none" datetime="'.esc_attr( get_the_modified_date( 'c' ) ).'">'.get_the_modified_date( $brando_date_format ).'</time>' : '';
                    $brando_show_author = ( $brando_show_post_author == 1 ) ? esc_html__('Posted by','brando-addons').' <span class="author vcard"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'" class="black-text url fn n">'.get_the_author().'</a></span>' : '';

                        $output .='<div class="blog-post-style5 '.$brando_token_class.'">';
                            $output .='<div class="post-details alt-font">';
                                if(get_the_title()){
                                    $output .='<span class="text-extra-large font-weight-600 z-index-1 position-relative text-uppercase post-title display-block width-90 entry-title'.$fontsettings_title_class.'"><a href="'.get_permalink().'"'.$brando_title_color.'>'.get_the_title().'</a></span>';
                                }
                                if( $brando_show_post_date == 1 ){
                                    $output .=' <span class="post-date display-block text-uppercase z-index-1 position-relative font-weight-600'.$fontsettings_postmeta_class.'"'.$brando_post_date_color.'>'.$brando_show_date.'</span>';
                                }
                                if( $brando_show_post_author == 1 ){
                                    $output .=' <span class="post-name text-small text-uppercase z-index-1 position-relative'.$fontsettings_postmeta_class.'"'.$brando_author_color.'>'.$brando_show_author.'</span>';
                                }
                                    if($brando_show_border == 1 ){
                                        $output .= '<div class="img-border-medium '.$brando_transperent.' z-index-0"'.$brando_border_color.'></div>';
                                    }
                            $output .=' </div>';
                        $output .=' </div>';
                    endwhile;
                $output .= '</div>';
                wp_reset_postdata();
                if( $id || $class ):
                    $output .= '</div>';
                endif;
            break;

            case 'featurebox12':
                if( $id || $class ):
                    $output .= '<div'.$id.$class.'>';
                endif;
                $args = array('post_type' => 'post',
                            'name' => $brando_posts_list,
                        );
                $query = new WP_Query( $args );
                $brando_post_classes = '';
                ob_start();
                    post_class();
                    $brando_post_classes .= ob_get_contents();
                ob_end_clean();
                $output .= '<div '.$brando_post_classes.'>';
                    while ( $query->have_posts() ) : $query->the_post();
                    /* Image Alt, Title, Caption */
                    $img_alt = brando_option_image_alt(get_post_thumbnail_id());
                    $img_title = brando_option_image_title(get_post_thumbnail_id());
                    $image_alt = ( isset($img_alt['alt']) ) ? $img_alt['alt'] : '' ; 
                    $image_title = ( isset($img_title['title']) ) ? $img_title['title'] : '';

                    $img_attr = array(
                        'title' => $image_title,
                        'alt' => $image_alt,
                    );

                    $brando_show_date = ( $brando_show_post_date == 1 ) ? '<span class="published'.$fontsettings_postmeta_class.'"><a href="'.get_permalink().'" class="light-gray-text"'.$brando_post_date_color.'>'.get_the_date( $brando_date_format, get_the_ID()).'</a></span><time class="updated display-none" datetime="'.esc_attr( get_the_modified_date( 'c' ) ).'">'.get_the_modified_date( $brando_date_format ).'</time>' : '';

                    $post_format = get_post_format( get_the_ID() );
                        $output .= '<div class="blog-post-style6">';
                            $output .='<article class="col-md-12 col-sm-12 col-xs-12 no-padding">';                                
                                $output .='<div class="col-md-6 col-sm-6 col-xs-6 no-padding post-thumbnail overflow-hidden '.$brando_image_position.'">';
                                    if($post_format == 'image'){
                                        ob_start();
                                            include BRANDO_ADDONS_ROOT . '/loop/loop-image.php';
                                            $output .= ob_get_contents();  
                                        ob_end_clean();  
                                    }elseif($post_format == 'gallery'){
                                        ob_start();
                                            include BRANDO_ADDONS_ROOT . '/loop/loop-gallery.php';
                                            $output .= ob_get_contents();  
                                        ob_end_clean();  
                                    }elseif($post_format == 'video'){
                                        ob_start();
                                            include BRANDO_ADDONS_ROOT . '/loop/loop-video.php';
                                            $output .= ob_get_contents();  
                                        ob_end_clean();  
                                    }elseif($post_format == 'quote'){
                                        ob_start();
                                            include BRANDO_ADDONS_ROOT . '/loop/loop-quote.php';
                                            $output .= ob_get_contents();  
                                        ob_end_clean();  
                                    }else{
                                        $output .=  '<div class="blog-image"><a href="'.get_permalink().'">';
                                            if ( has_post_thumbnail() ) {
                                                $output .= get_the_post_thumbnail( get_the_ID(), $brando_image_srcset,$img_attr );
                                            }
                                        $output .=  '</a></div>';
                                    }
                                $output .='</div>';
                                $output .='<div class="col-md-6 col-sm-6 col-xs-6 no-padding post-details-arrow '.$content_pos.'">';
                                    $output .='<div class="post-details">';
                                    if( $brando_show_post_date == 1 ){
                                        $output .='<span class="text-small text-uppercase alt-font light-gray-text">'.$brando_show_date.'</span>';
                                    }
                                        $output .='<span class="text-large text-uppercase display-block alt-font font-weight-600 margin-seven-tb sm-text-medium xs-text-medium'.$fontsettings_title_class.'">';
                                            $output .='<a href="'.get_permalink().'" class="xs-display-inline-block xs-text-small entry-title"'.$brando_title_color.'>'.get_the_title().'</a>';
                                        $output .='</span>';
                                    if( $brando_enable_seperator == 1 ){
                                        $output .='<div class="separator-line-thick bg-crimson-red margin-twelve-top no-margin-bottom no-margin-lr"'.$sep_style.'></div>';
                                    }
                                    $output .='</div>';
                                $output .='</div>';
                            $output .='</article>';                        
                        $output .='</div>';
                    endwhile;
                $output .= '</div>';
                wp_reset_postdata();
                if( $id || $class ):
                    $output .= '</div>';
                endif;
            break;
        }
        return $output;        
    }
}
add_shortcode( 'brando_feature_box', 'brando_feature_box_shortcode' );