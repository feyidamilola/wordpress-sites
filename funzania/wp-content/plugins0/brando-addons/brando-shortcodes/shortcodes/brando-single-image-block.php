<?php
/**
 * Shortcode For Single Image Block
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Single Image Block */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'brando_image_block' ) ) {
    function brando_image_block( $atts, $content = null ) 
    {
        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'brando_image_block_premade_style' => '',
            'brando_image' => '',
            'brando_scroll_to_section' => '',
            'brando_section_id' => '',
            'position_relative' => '',
            'brando_container' => '',
            'brando_fullscreen' => '',
            'brando_title' => '',
            'brando_title_color' => '',
            'brando_show_separator' => '',
            'brando_sep_color' => '',
            'separator_height' => '',
            'brando_date' => '',
            'button_config' => '', 
            'brando_background_color' => '',
            'video_type' => '',
            'single_image_mp4_video' => '',
            'single_image_ogg_video' => '',
            'single_image_webm_video' => '',
            'external_video_url' => '',
            'video_fullscreen' => '',
            'width' => '',
            'height' => '',
            'enable_mute' => '',
            'brando_bg_image_srcset' => 'full',
            'brando_date_color' => '',
            'brando_date_bg_color' => '',
            'title_settings' => '',
            'date_settings' => '',
        ), $atts ) );

        global $font_settings_array;
        $output = $main_class = $style = $html_video = $content_class = $date_style = '';
        $classes = $style_array = $date_style_array = array();
        $id = ($id) ? ' id='.$id : '';
        $class = ($class) ? $classes[] = $class : ''; 
        $brando_section_id = ( $brando_section_id ) ? $brando_section_id : '';
        $position_relative = ( $position_relative ) ? $classes[] = 'position-relative' : '';
        $brando_container = ( $brando_container ) ? $classes[] = 'container' : '';
        $brando_fullscreen = ( $brando_fullscreen ) ? $classes[] = 'full-screen' : '';
        $brando_date = ( $brando_date ) ? $brando_date : '';
        $brando_title = ( $brando_title ) ? $brando_title : '';
        $brando_title_color = ( $brando_title_color ) ? ' style="color:'.$brando_title_color.' !important"' : '';
        $brando_sep_color = ( $brando_sep_color ) ? $style_array[] = 'background:'.$brando_sep_color.' !important;': '';
        $separator_height = ( $separator_height ) ? $style_array[] = 'height:'.$separator_height.' !important;': '';
        $brando_background_color = ( $brando_background_color ) ? $style_array[] = 'background:'.$brando_background_color.' !important;' : '';
        $video_fullscreen = ($video_fullscreen) ? ' class="full-screen"' : '';
        $width = ( $width ) ? ' width="'.$width.'"' : '';
        $height = ( $height ) ? ' height="'.$height.'"' : '';
        $enable_mute = ( $enable_mute == 1 ) ? ' muted' : '';
        $style_property_list = implode(" ", $style_array);
        $style = ( $style_property_list ) ? ' style="'.$style_property_list.'"' : '';

        ( $brando_date_color ) ? $date_style_array[] = 'color:'.$brando_date_color.' !important;': '';
        ( $brando_date_bg_color ) ? $date_style_array[] = 'background:'.$brando_date_bg_color.' !important;': '';
        $date_style_property_list = implode(" ", $date_style_array);
        $date_style = ( $date_style_property_list ) ? ' style="'.$date_style_property_list.'"' : '';

        /* Button */
        if ( function_exists('vc_parse_multi_attribute') ) 
        {
            //First button
            $button_parse_args = vc_parse_multi_attribute($button_config);
            $button_link     = ( isset($button_parse_args['url']) ) ? $button_parse_args['url'] : '#';
            $button_title    = ( isset($button_parse_args['title']) ) ? $button_parse_args['title'] : '';
            $button_target   = ( isset($button_parse_args['target']) ) ? trim($button_parse_args['target']) : '_self';
        }
        $class_list = implode(" ", $classes);
        $main_class = ( $class_list ) ? ' class="'.$class_list.'"' : '';
        /* Image Alt, Title, Caption */
        $img_alt = brando_option_image_alt($brando_image);
        $img_title = brando_option_image_title($brando_image);
        $image_alt = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
        $image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';
        
        $brando_image = ( $brando_image ) ? $brando_image : '';

        $brando_bg_image_srcset = ($brando_bg_image_srcset) ? $brando_bg_image_srcset : 'full';
        $custom_image = wp_get_attachment_image_src($brando_image, $brando_bg_image_srcset);
        $srcset_icon = $srcset_data_icon = '';
        $srcset_icon = wp_get_attachment_image_srcset( $brando_image, $brando_bg_image_srcset );
        if( $srcset_icon ){
            $srcset_data_icon = ' srcset="'.esc_attr( $srcset_icon ).'"';
        }

        $sizes_icon = $sizes_data_icon = '';
        $sizes_icon = wp_get_attachment_image_sizes( $brando_image, $brando_bg_image_srcset );
        if( $sizes_icon ){
            $sizes_data_icon = ' sizes="'.esc_attr( $sizes_icon ).'"';
        }
        $thumb = wp_get_attachment_image_src($brando_image, $brando_bg_image_srcset);

        //Font Settings For Title
        $fontsettings_title_class = $fontsettings_title_id = $responsive_style = '';
        if( !empty( $title_settings ) ) {
            $fontsettings_title_id = uniqid('brando-font-setting-');
            $responsive_style = brando_Responsive_font_settings::generate_css( $title_settings, $fontsettings_title_id );
            $fontsettings_title_class = ' '.$fontsettings_title_id;
        }
        ( !empty( $responsive_style ) ) ? $font_settings_array[] = $responsive_style : '';

        //Font Settings For Date
        $fontsettings_date_class = $fontsettings_date_id = $responsive_style_date = '';
        if( !empty( $date_settings ) ) {
            $fontsettings_date_id = uniqid('brando-font-setting-');
            $responsive_style_date = brando_Responsive_font_settings::generate_css( $date_settings, $fontsettings_date_id );
            $fontsettings_date_class = ' '.$fontsettings_date_id;
        }
        ( !empty( $responsive_style_date ) ) ? $font_settings_array[] = $responsive_style_date : '';

        switch ($brando_image_block_premade_style) 
        {
            case 'image-block-1':
                if( $video_type ){
                    $output .= '<div class="poster-image-none">';
                        $output .= '<div class="position-top z-index-0 video-wrapper">';
                            if($video_type == 'self'){
                                $output .= '<video class="html-video" '.$enable_mute.' autoplay loop poster="'.$thumb[0].'">';
                                if($single_image_mp4_video){
                                    $output .= '<source type="video/mp4" src="'.$single_image_mp4_video.'">';
                                }
                                if($single_image_ogg_video){
                                    $output .= '<source type="video/ogg" '.$width.$height.' src="'.$single_image_ogg_video.'">';
                                }
                                if($single_image_webm_video){
                                    $output .= '<source type="video/webm" '.$width.$height.' src="'.$single_image_webm_video.'">';
                                }
                               $output .= '</video>';
                            }else{
                                $output .= '<div class="fit-videos">';
                                    if($external_video_url){
                                        $output .= '<iframe '.$video_fullscreen.' src="'.$external_video_url.'"'.$width.$height.' allowfullscreen></iframe>';
                                    }
                                $output .= '</div>';
                            }
                        $output .= '</div>';
                        $output .= '<div'.$id.$main_class.'>';
                            $output .= '<div class="slider-typography text-center">';
                                $output .= '<div class="slider-text-middle-main">';
                                if( $thumb[0] ){
                                    $output .= '<div class="slider-text-middle slider-typography-option1 ">';
                                        $output .= '<img src="'.$thumb[0].'" class="xs-width-80"'.$image_alt.$image_title.' width="'.$thumb[1].'" height="'.$thumb[2].'"'.$srcset_data_icon.$sizes_data_icon.' />';
                                    $output .= '</div>';
                                }
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                        if( $brando_scroll_to_section == 1 )
                        {
                            $output .= '<div class="scroll-down">';
                                $output .= '<a class="section-link" href="'.$brando_section_id.'">';
                                    $output .= '<img src="'.get_template_directory_uri().'/assets/images/arrow-down.png" alt=""/>';
                                $output .= '</a>';
                            $output .= '</div>';
                        }
                    $output .= '</div>';
                }else{
                    $output .= '<div'.$id.$main_class.'>';
                        $output .= '<div class="slider-typography text-center">';
                            $output .= '<div class="slider-text-middle-main">';
                            if( $thumb[0] ){
                                $output .= '<div class="slider-text-middle slider-typography-option1 ">';
                                    $output .= '<img src="'.$thumb[0].'" class="xs-width-80"'.$image_alt.$image_title.' width="'.$thumb[1].'" height="'.$thumb[2].'"'.$srcset_data_icon.$sizes_data_icon.' />';
                                $output .= '</div>';
                            }
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                    if( $brando_scroll_to_section == 1 )
                    {
                        $output .= '<div class="scroll-down">';
                            $output .= '<a class="section-link" href="'.$brando_section_id.'">';
                                $output .= '<img src="'.get_template_directory_uri().'/assets/images/arrow-down.png" alt=""/>';
                            $output .= '</a>';
                        $output .= '</div>';
                    }
                }
            break;

            case 'image-block-2':
                if( $video_type ){
                    $output .= '<div class="poster-image-none">';
                        $output .= '<div class="position-top z-index-0 video-wrapper">';
                            if($video_type == 'self'){
                                $output .= '<video class="html-video" '.$enable_mute.' autoplay loop poster="'.$thumb[0].'">';
                                if($single_image_mp4_video){
                                    $output .= '<source type="video/mp4" src="'.$single_image_mp4_video.'">';
                                }
                                if($single_image_ogg_video){
                                    $output .= '<source type="video/ogg" '.$width.$height.' src="'.$single_image_ogg_video.'">';
                                }
                                if($single_image_webm_video){
                                    $output .= '<source type="video/webm" '.$width.$height.' src="'.$single_image_webm_video.'">';
                                }
                               $output .= '</video>';
                            }else{
                                $output .= '<div class="fit-videos">';
                                    if($external_video_url){
                                        $output .= '<iframe '.$video_fullscreen.' src="'.$external_video_url.'"'.$width.$height.' allowfullscreen></iframe>';
                                    }
                                $output .= '</div>';
                            }
                        $output .= '</div>';
                        $output .= '<div'.$id.$main_class.'>';
                            $output .= '<div class="slider-typography text-center">';
                                $output .= '<div class="slider-text-middle-main">';
                                    $output .= '<div class="slider-text-middle slider-typography-option4">';
                                    if( $brando_title ){
                                        $output .= '<span class="transparent-blue-text alt-font font-weight-600 text-uppercase sm-title-big3 xs-title-extra-large-3'.$fontsettings_title_class.'"'.$brando_title_color  .'>'.$brando_title.'</span>';
                                    }
                                    $output .= '</div>';
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                        $output .= '<div class="scroll-down">';
                            if( $content ){
                                $output .= do_shortcode( brando_remove_wpautop($content) );
                            }
                            if( $brando_show_separator == 1 )
                            {
                                $output .= '<div class="separator-line-thick-long bg-transparent-blue margin-one-top center-col no-margin-bottom"'.$style.'></div>';
                            }
                        $output .= '</div>';
                }else{
                    $output .= '<div'.$id.$main_class.'>';
                        $output .= '<div class="slider-typography text-center">';
                            $output .= '<div class="slider-text-middle-main">';
                                $output .= '<div class="slider-text-middle slider-typography-option4">';
                                if( $brando_title ){
                                    $output .= '<span class="transparent-blue-text alt-font font-weight-600 text-uppercase sm-title-big3 xs-title-extra-large-3'.$fontsettings_title_class.'"'.$brando_title_color  .'>'.$brando_title.'</span>';
                                }
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                    $output .= '<div class="scroll-down">';
                        if( $content ){
                            $output .= do_shortcode( brando_remove_wpautop($content) );
                        }
                        if( $brando_show_separator == 1 )
                        {
                            $output .= '<div class="separator-line-thick-long bg-transparent-blue margin-one-top center-col no-margin-bottom"'.$style.'></div>';
                        }
                    $output .= '</div>';
                }
            break;

            case 'image-block-3':
                if( $video_type ){
                    $output .= '<div class="poster-image-none">';
                        $output .= '<div class="position-top z-index-0 video-wrapper">';
                            if($video_type == 'self'){
                                $output .= '<video class="html-video" '.$enable_mute.' autoplay loop poster="'.$thumb[0].'">';
                                if($single_image_mp4_video){
                                    $output .= '<source type="video/mp4" src="'.$single_image_mp4_video.'">';
                                }
                                if($single_image_ogg_video){
                                    $output .= '<source type="video/ogg" '.$width.$height.' src="'.$single_image_ogg_video.'">';
                                }
                                if($single_image_webm_video){
                                    $output .= '<source type="video/webm" '.$width.$height.' src="'.$single_image_webm_video.'">';
                                }
                               $output .= '</video>';
                            }else{
                                $output .= '<div class="fit-videos">';
                                    if($external_video_url){
                                        $output .= '<iframe '.$video_fullscreen.' src="'.$external_video_url.'"'.$width.$height.' allowfullscreen></iframe>';
                                    }
                                $output .= '</div>';
                            }
                        $output .= '</div>';
                        $output .= '<div class="container position-relative full-screen">';
                            $output .= '<div'.$id.' class="slider-typography text-center '.$class_list.'">';
                                $output .= '<div class="slider-text-middle-main">';
                                    $output .= '<div class="slider-text-middle slider-typography-option6">';
                                        if( $brando_date ){
                                            $output .= '<p class="bg-deep-blue white-text display-inline-block alt-font text-uppercase margin-two-bottom xs-margin-six-bottom'.$fontsettings_date_class.'"'.$date_style.'>'.$brando_date.'</p><br>';
                                        }
                                        if( $brando_title ){
                                            $output .= '<span class="text-uppercase deep-green-text font-weight-700 alt-font'.$fontsettings_title_class.'"'.$brando_title_color.'>'.$brando_title.'</span><br>';
                                        }
                                        if( $content ){
                                            $output .= do_shortcode( brando_remove_wpautop($content) );
                                        }
                                        if( $button_title ){
                                            $output .= '<a href="'.$button_link.'" target="'.$button_target.'" class="highlight-button-white-border btn btn-medium button letter-spacing-1 inner-link margin-two-top no-margin-bottom no-margin-lr xs-margin-eleven xs-no-margin-top xs-no-margin-bottom xs-no-margin-lr">'.$button_title.'</a>';
                                        }
                                    $output .= '</div>';
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                }else{
                    $output .= '<div'.$id.' class="slider-typography text-center '.$class_list.'">';
                        $output .= '<div class="slider-text-middle-main">';
                            $output .= '<div class="slider-text-middle slider-typography-option6">';
                                if( $brando_date ){
                                    $output .= '<p class="bg-deep-blue white-text display-inline-block alt-font text-uppercase margin-two-bottom xs-margin-six-bottom"'.$date_style.'>'.$brando_date.'</p><br>';
                                }
                                if( $brando_title ){
                                    $output .= '<span class="text-uppercase deep-green-text font-weight-700 alt-font'.$fontsettings_title_class.'"'.$brando_title_color.'>'.$brando_title.'</span>';
                                }
                                if( $content ){
                                    $output .= do_shortcode( brando_remove_wpautop($content) );
                                }
                                if( $button_title ){
                                    $output .= '<a href="'.$button_link.'" target="'.$button_target.'" class="highlight-button-white-border btn btn-medium button letter-spacing-1 inner-link margin-two-top no-margin-bottom no-margin-lr xs-margin-eleven xs-no-margin-top xs-no-margin-bottom xs-no-margin-lr">'.$button_title.'</a>';
                                }
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                }
            break;

            case 'image-block-4':
                if( $video_type ){
                    $output .= '<div class="poster-image-none">';
                        $output .= '<div class="position-top z-index-0 video-wrapper">';
                            if($video_type == 'self'){
                                $output .= '<video class="html-video" '.$enable_mute.' autoplay loop poster="'.$thumb[0].'">';
                                if($single_image_mp4_video){
                                    $output .= '<source type="video/mp4" src="'.$single_image_mp4_video.'">';
                                }
                                if($single_image_ogg_video){
                                    $output .= '<source type="video/ogg" '.$width.$height.' src="'.$single_image_ogg_video.'">';
                                }
                                if($single_image_webm_video){
                                    $output .= '<source type="video/webm" '.$width.$height.' src="'.$single_image_webm_video.'">';
                                }
                               $output .= '</video>';
                            }else{
                                $output .= '<div class="fit-videos">';
                                    if($external_video_url){
                                        $output .= '<iframe '.$video_fullscreen.' src="'.$external_video_url.'"'.$width.$height.' allowfullscreen></iframe>';
                                    }
                                $output .= '</div>';
                            }
                        $output .= '</div>';
                        $output .= '<div'.$id.' class="full-screen ajax-popup-title position-relative '.$class_list.'">';
                            $output .= '<div class="slider-typography text-center">';
                                $output .= '<div class="slider-text-middle-main">';
                                    $output .= '<div class="slider-text-middle">';
                                        if( $brando_title ){
                                            $output .= '<span class="alt-font font-weight-700 white-text title-extra-large-3 text-uppercase display-block'.$fontsettings_title_class.'"'.$brando_title_color  .'>'.$brando_title.'</span>';
                                        }
                                        if( $content ){
                                            $output .= do_shortcode( brando_remove_wpautop($content) );
                                        }
                                        if( $brando_show_separator == 1 )
                                        {
                                            $output .= '<div class="separator-line-thick-long margin-four-top no-margin-bottom"'.$style.'></div>';
                                        }
                                    $output .= '</div>';
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                }else{
                    $output .= '<div'.$id.' class="full-screen ajax-popup-title position-relative '.$class_list.'">';
                        $output .= '<div class="slider-typography text-center">';
                            $output .= '<div class="slider-text-middle-main">';
                                $output .= '<div class="slider-text-middle">';
                                    if( $brando_title ){
                                        $output .= '<span class="alt-font font-weight-700 white-text title-extra-large-3 text-uppercase display-block'.$fontsettings_title_class.'"'.$brando_title_color  .'>'.$brando_title.'</span>';
                                    }
                                    if( $content ){
                                        $output .= do_shortcode( brando_remove_wpautop($content) );
                                    }
                                    if( $brando_show_separator == 1 )
                                    {
                                        $output .= '<div class="separator-line-thick-long margin-four-top no-margin-bottom"'.$style.'></div>';
                                    }
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                }
            break;

            case 'image-block-5':
                if( $video_type ){
                    $output .= '<div class="poster-image-none">';
                        $output .= '<div class="position-top z-index-0 video-wrapper">';
                            if($video_type == 'self'){
                                $output .= '<video class="html-video" '.$enable_mute.' autoplay loop poster="'.$thumb[0].'">';
                                if($single_image_mp4_video){
                                    $output .= '<source type="video/mp4" src="'.$single_image_mp4_video.'">';
                                }
                                if($single_image_ogg_video){
                                    $output .= '<source type="video/ogg" '.$width.$height.' src="'.$single_image_ogg_video.'">';
                                }
                                if($single_image_webm_video){
                                    $output .= '<source type="video/webm" '.$width.$height.' src="'.$single_image_webm_video.'">';
                                }
                               $output .= '</video>';
                            }else{
                                $output .= '<div class="fit-videos">';
                                    if($external_video_url){
                                        $output .= '<iframe '.$video_fullscreen.' src="'.$external_video_url.'"'.$width.$height.' allowfullscreen></iframe>';
                                    }
                                $output .= '</div>';
                            }
                        $output .= '</div>';
                        $output .= '<div'.$id.' class="slider-typography text-center '.$class_list.'">';
                            $output .= '<div class="slider-text-middle-main">';
                                $output .= '<div class="slider-text-middle">';
                                    if( $brando_title ){
                                        $output .= '<span class="alt-font font-weight-700 white-text title-extra-large text-uppercase ajax-popup-title-text'.$fontsettings_title_class.'"'.$style.'>'.$brando_title.'</span>';
                                    }
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                }else{
                    $output .= '<div'.$id.' class="slider-typography text-center '.$class_list.'">';
                        $output .= '<div class="slider-text-middle-main">';
                            $output .= '<div class="slider-text-middle">';
                                if( $brando_title ){
                                    $output .= '<span class="alt-font font-weight-700 white-text title-extra-large text-uppercase ajax-popup-title-text'.$fontsettings_title_class.'"'.$style.'>'.$brando_title.'</span>';
                                }
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                }
            break;

            case 'image-block-6':
                if( $content ){
                    $class_list .= 'video-wrapper';
                    $html_video .= 'class="html-video"';
                }else{
                    $html_video .= 'controls';
                }
                $output .= '<div class="position-top z-index-0 '.$class_list.'"'.$id.'>';
                    if($video_type == 'self'){
                        $output .= '<video autoplay loop '.$html_video.$enable_mute.' poster="'.$thumb[0].'">';
                        if($single_image_mp4_video){
                            $output .= '<source type="video/mp4"'.$width.$height.' src="'.$single_image_mp4_video.'">';
                        }
                        if($single_image_ogg_video){
                            $output .= '<source type="video/ogg" '.$width.$height.' src="'.$single_image_ogg_video.'">';
                        }
                        if($single_image_webm_video){
                            $output .= '<source type="video/webm" '.$width.$height.' src="'.$single_image_webm_video.'">';
                        }
                       $output .= '</video>';
                    }else{
                        $output .= '<div class="fit-videos">';
                            if($external_video_url){
                                $output .= '<iframe '.$video_fullscreen.' src="'.$external_video_url.'"'.$width.$height.' allowfullscreen></iframe>';
                            }
                        $output .= '</div>';
                    }
                $output .= '</div>';
                if( $brando_title || $content ){
                   $output .= '<div class="video-background fit-videos">';
                       $output .= '<div class="container height-100">';
                           $output .= '<div class="col-text-middle-main">';
                               $output .= '<div class="col-text-middle">';
                                   $output .= '<div class="slider-text-middle2 animated fadeInUp position-relative text-center padding-six-all">';
                                        if($brando_title){
                                            $output .= '<span class="white-text text-uppercase title-small xs-text-medium'.$fontsettings_title_class.'"'.$brando_title_color.'>'.$brando_title.'</span>';
                                        }
                                        $output .= do_shortcode( brando_remove_wpautop($content) );
                                    $output .= '</div>';
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                }
            break;

        }
        return $output;
    }
}
add_shortcode( 'brando_image_block', 'brando_image_block' );
?>