<?php
/**
 * Shortcode For Slider
 *
 * @package Brando
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Slider */
/*-----------------------------------------------------------------------------------*/

$brando_slider_parent_type = $brando_title_font_size = $brando_title_line_height = $brando_video_autoplay = '';
function brando_slider_shortcode( $atts, $content = null ) {
    extract( shortcode_atts( array(
                'slider_premade_style' => '',
                'show_pagination' => '',
                'show_pagination_style' => '',
                'show_navigation' => '',
                'show_navigation_style' => '',
                'show_cursor_color_style' => '',
                'transition_style' => '',
                'show_pagination_color_style' => '',
                'autoplay' => '',
                'stoponhover' => '',
                'slidespeed' => '',
                'addclassactive' => '',
                'title_color' => '',
                'brando_slider_id' => '',
                'brando_slider_class' => '',
                'brando_image' => '',
                'background_slide_title' => '',
                'background_slide_subtitle' => '',
                'brando_title_color' => '',
                'brando_subtitle_color' => '',
                'title_font_size' => '',
                'title_line_height' => '',
                'brando_designation' => '',
                'brando_image_srcset' => 'full',
                'enable_opacity_bg_slider' => '1',
                'brando_opacity_color_bg_slider' => '',
                'brando_opacity_bg_slider' => '0.7',
                'brando_designation_color' => '',
                'brando_designation_bg_color' => '',
                'title_settings' => '',
                'subtitle_settings' => '',
                'designation_settings' => '',
            ), $atts ) );

    $output  = $slider_config = $slider_id = $slider_class = '';
    global $brando_title_font_size,$brando_title_line_height,$brando_slider_parent_type,$brando_video_autoplay,$brando_srcset,$font_settings_array;
    $opacity_style = $designation_style = array();
    $slider_premade_style = ( $slider_premade_style ) ? $slider_premade_style : '';
    $transition_style = ( $transition_style ) ? $transition_style : '';
    /* Replace || to br in title */
    $background_slide_title = ( $background_slide_title ) ? str_replace('||', '<br />',$background_slide_title) : '';
    $background_slide_subtitle = ( $background_slide_subtitle ) ? $background_slide_subtitle : '';
    $brando_opacity_color_bg_slider = ( $brando_opacity_color_bg_slider ) ? $opacity_style[] = 'background-color:'.$brando_opacity_color_bg_slider.';': ''; 
    $brando_opacity_bg_slider = ( $brando_opacity_bg_slider ) ? $opacity_style[] = 'opacity:'.$brando_opacity_bg_slider.';': '';

    $style_property_opacity = implode(" ", $opacity_style);
    $style_opacity = ( $style_property_opacity ) ? ' style="'.$style_property_opacity.'"' : '';

    $brando_designation_bg_color = ( $brando_designation_bg_color ) ? $designation_style[] = 'background-color:'.$brando_designation_bg_color.';': ''; 
    $brando_designation_color = ( $brando_designation_color ) ? $designation_style[] = 'color:'.$brando_designation_color.';': '';

    $style_property_designation = implode(" ", $designation_style);
    $style_designation = ( $style_property_designation ) ? ' style="'.$style_property_designation.'"' : '';

    $title_font_size = ( $title_font_size ) ? 'font-size: '.$title_font_size.' !important;': '';
    $title_line_height = ( $title_line_height ) ? 'line-height: '.$title_line_height.' !important;' : '';

    $brando_title_font_size = $title_font_size;
    $brando_title_line_height = $title_line_height;
    /* Image Alt, Title, Caption */
    $img_alt = brando_option_image_alt($brando_image);
    $img_title = brando_option_image_title($brando_image);
    $image_alt = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
    $image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

    $brando_srcset = ($brando_image_srcset) ? $brando_image_srcset : 'full';
    
    $thumb = wp_get_attachment_image_src($brando_image, $brando_srcset );

    $srcset = $srcset_data = '';
    $srcset = wp_get_attachment_image_srcset( $brando_image, $brando_srcset );
    if( $srcset ){
        $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
    }

    $sizes = $sizes_data = '';
    $sizes = wp_get_attachment_image_sizes( $brando_image, $brando_srcset );
    if( $sizes ){
        $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
    }

    $brando_title_color = ( $brando_title_color ) ? ' style="color: '.$brando_title_color.' !important";' : '';
    $brando_subtitle_color = ( $brando_subtitle_color ) ? ' style="color: '.$brando_subtitle_color.' !important";' : '';

    $brando_slider_parent_type = $slider_premade_style;

    $pagination = ($show_pagination_style) ? brando_owl_pagination_slider_classes($show_pagination_style) : brando_owl_pagination_slider_classes('default');
    $pagination_style = ($show_pagination_color_style) ? brando_owl_pagination_color_classes($show_pagination_color_style) : brando_owl_pagination_color_classes('default');

    $navigation = ( $show_navigation_style ) ? brando_owl_navigation_slider_classes( $show_navigation_style) : brando_owl_navigation_slider_classes('default') ;
    $show_cursor_color_style = ( $show_cursor_color_style ) ? ' '.$show_cursor_color_style : ' cursor-black';

    // Check if slider id and class
    $brando_slider_id = ( $brando_slider_id ) ? $brando_slider_id : $slider_premade_style;
    $brando_slider_class = ( $brando_slider_class ) ? $slider_class = ' '.$brando_slider_class : '';

    //Font Settings For Title
    $fontsettings_title_class = $fontsettings_title_id = $responsive_style = '';
    if( !empty( $title_settings ) ) {
        $fontsettings_title_id = uniqid('brando-font-setting-');
        $responsive_style = brando_Responsive_font_settings::generate_css( $title_settings, $fontsettings_title_id );
        $fontsettings_title_class = ' '.$fontsettings_title_id;
    }
    ( !empty( $responsive_style ) ) ? $font_settings_array[] = $responsive_style : '';

    //Font Settings For Sub Title
    $fontsettings_subtitle_class = $fontsettings_subtitle_id = $responsive_style_subtitle = '';
    if( !empty( $subtitle_settings ) ) {
        $fontsettings_subtitle_id = uniqid('brando-font-setting-');
        $responsive_style_subtitle = brando_Responsive_font_settings::generate_css( $subtitle_settings, $fontsettings_subtitle_id );
        $fontsettings_subtitle_class = ' '.$fontsettings_subtitle_id;
    }
    ( !empty( $responsive_style_subtitle ) ) ? $font_settings_array[] = $responsive_style_subtitle : '';

    //Font Settings For Designation
    $fontsettings_designation_class = $fontsettings_designation_id = $responsive_style_designation = '';
    if( !empty( $designation_settings ) ) {
        $fontsettings_designation_id = uniqid('brando-font-setting-');
        $responsive_style_designation = brando_Responsive_font_settings::generate_css( $designation_settings, $fontsettings_designation_id );
        $fontsettings_designation_class = ' '.$fontsettings_designation_id;
    }
    ( !empty( $responsive_style_designation ) ) ? $font_settings_array[] = $responsive_style_designation : '';

    switch ($slider_premade_style) {
        case 'brando-owl-slider1':
            $output .= '<div id="'.$brando_slider_id.'" class="owl-carousel owl-theme '.$brando_slider_id.$slider_class.$pagination.$pagination_style.$navigation.$show_cursor_color_style.' main-slider">';
                $output .= do_shortcode($content);
            $output .= '</div>';
        break;
        case 'brando-owl-slider2':
            $output .= '<div id="'.$brando_slider_id.'" class="owl-carousel owl-theme '.$brando_slider_id.$slider_class.$pagination.$pagination_style.$navigation.$show_cursor_color_style.' main-slider">';
                $output .= do_shortcode($content);
            $output .= '</div>';
        break;
        case 'brando-owl-slider3':
            $output .= '<div id="'.$brando_slider_id.'" class="owl-carousel owl-theme '.$brando_slider_id.$slider_class.$pagination.$pagination_style.$navigation.$show_cursor_color_style.' main-slider">';
                $output .= do_shortcode($content);
            $output .= '</div>';
        break;
        case 'brando-owl-slider4':
            $output .= '<div id="'.$brando_slider_id.'" class="owl-carousel owl-theme '.$brando_slider_id.$slider_class.$pagination.$pagination_style.$navigation.$show_cursor_color_style.' main-slider">';
                $output .= do_shortcode($content);
            $output .= '</div>';
        break;
        case 'brando-owl-slider5':
            $output .= '<div id="'.$brando_slider_id.'" class="owl-carousel owl-theme '.$brando_slider_id.$slider_class.$pagination.$pagination_style.$navigation.$show_cursor_color_style.' main-slider">';
                $output .= do_shortcode($content);
            $output .= '</div>';
        break;
        case 'brando-owl-slider6':
            if( $enable_opacity_bg_slider == 1 ){
                $output .= '<div class="opacity-medium bg-dark-gray wedding-slider"'.$style_opacity.'></div>';
            }
            $output .= '<div class="background-slider-text">';
                $output .= '<div class="container full-screen position-relative wedding-slider">';
                    $output .= '<div class="slider-typography text-center">';
                        $output .= '<div class="slider-text-middle-main">';
                            $output .= '<div class="slider-text-middle">';
                                if( $thumb[0] ){
                                    $output .= '<div class="wedding-slider-line">';
                                        $output .= '<img class="padding-thirteen-bottom"'.$image_alt.$image_title.' src="'.$thumb[0].'" width="'.$thumb[1].'" height="'.$thumb[2].'"'.$srcset_data.$sizes_data.'>';
                                    $output .= '</div>';
                                }
                                $output .= '<div class="clearfix clear-both">';
                                    if( $background_slide_title ){
                                        $output .= '<span class="text-extra-large alt-font white-text text-uppercase display-block margin-three-top'.$fontsettings_title_class.'"'.$brando_title_color.'>'.$background_slide_title.'</span>';
                                    }
                                    if( $background_slide_subtitle ){
                                        $output .= '<span class="alt-font title-medium turquoise-blue-text text-uppercase font-weight-700'.$fontsettings_subtitle_class.'"'.$brando_subtitle_color.'>'.$background_slide_subtitle.'</span>';
                                    }
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            $output .= '</div>';
            $output .= '<div id="'.$brando_slider_id.'" class="owl-carousel owl-theme '.$brando_slider_id.$slider_class.$pagination.$pagination_style.$navigation.$show_cursor_color_style.' main-slider">';
                $output .= do_shortcode($content);
            $output .= '</div>';
        break;
        case 'brando-owl-slider7':
            $output .= '<div class="container full-screen personal-slider-content">';
                $output .= '<div class="slider-typography text-left">';
                    $output .= '<div class="slider-text-middle-main xs-padding-eleven">';
                        $output .= '<div class="slider-text-middle md-text-center">';
                            if( $background_slide_title ){ 
                                $output .= '<span class="text-uppercase position-relative title-extra-large alt-font white-text'.$fontsettings_title_class.'"'.$brando_title_color.'>'.$background_slide_title.'</span>';
                            }
                            if( $background_slide_subtitle ){
                                $output .= '<span class="text-uppercase position-relative title-extra-large-3 alt-font white-text font-weight-700'.$fontsettings_subtitle_class.'"'.$brando_subtitle_color.'>'.$background_slide_subtitle.'</span>';
                            }
                            if( $brando_designation ){
                                $output .= '<span class="skills text-uppercase position-relative fast-pink-text-dark bg-black alt-font margin-two-tb'.$fontsettings_designation_class.'"'.$style_designation.'>'.$brando_designation.'</span>';
                            }
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            $output .= '</div>';
            $output .= '<div id="'.$brando_slider_id.'" class="full-screen owl-carousel owl-theme '.$brando_slider_id.$slider_class.$pagination.$pagination_style.$navigation.$show_cursor_color_style.' main-slider">';
                $output .= do_shortcode($content);
            $output .= '</div>';
            
        break;
        
    }
    /* Add custom script Start*/
    $slidespeed = ( $slidespeed ) ? $slidespeed : '3000';
    ( $show_navigation == 1 ) ? $slider_config .= 'navigation: true,' : $slider_config .= 'navigation: false,';
    ( $show_pagination == 1 ) ? $slider_config .= 'pagination: true,' : $slider_config .= 'pagination: false,';
    ( $transition_style && $transition_style != 'slide') ? $slider_config .= 'transitionStyle: "'.$transition_style .'",' : '';
    ( $autoplay == 1 ) ? $slider_config .= 'autoPlay: '.$slidespeed.',' : $slider_config .= 'autoPlay: false,';
    ( $stoponhover == 1) ? $slider_config .= 'stopOnHover: true, ' : $slider_config .= 'stopOnHover: false, ';
    $slider_config .= 'singleItem: true,';
    $slider_config .= 'paginationSpeed: 400,';
    $slider_config .= 'navigationText: ["<i class=\'fa fa-angle-left\'></i>", "<i class=\'fa fa-angle-right\'></i>"],';
    if( $brando_video_autoplay ){
        $slider_config .= 'afterInit: function(current) { 
                jQuery( current.find("video") ).each(function( index ) {
                    jQuery(this).get(0).play();
                    jQuery(this).parent().attr("style", "z-index: -9999 !important;");
                });
                jQuery( current.find("iframe") ).each(function( index ) {
                    jQuery(this).parent().attr("style", "z-index: -9999 !important;");
                });
            }';
    }else{
        $slider_config .= 'afterInit: function(current) { 
                jQuery( current.find("video") ).each(function( index ) {
                    jQuery(this).parent().attr("style", "z-index: -9999 !important;");
                });
                jQuery( current.find("iframe") ).each(function( index ) {
                    jQuery(this).parent().attr("style", "z-index: -9999 !important;");
                });
            }';
    }
    ob_start();?>
    <script type="text/javascript">jQuery(document).ready(function () { jQuery("#<?php echo $brando_slider_id ?>").owlCarousel({ <?php echo $slider_config;?> }); });</script>
    <?php 
    $script = ob_get_contents();
    ob_end_clean();
    $output .= $script;
    /* Add custom script End*/
    return $output;
}
add_shortcode( 'brando_slider', 'brando_slider_shortcode' );
 
function brando_slider_content_shortcode( $atts, $content = null) {
    global $brando_slider_parent_type,$brando_title_font_size,$brando_title_line_height,$brando_srcset, $font_settings_array;
    extract( shortcode_atts( array(
                'title' => '',
                'subtitle' => '',
                'image' => '',
                'right_image' => '',
                'brando_third_image' => '',
                'title_color' => '',
                'enable_separator' => '',
                'sep_color' => '',
                'separator_height' => '',
                'button_config' => '',
                'enable_opacity' => '1',
                'video_type' => '',
                'single_image_mp4_video' => '',
                'single_image_ogg_video' => '',
                'single_image_webm_video' => '',
                'external_video_url' => '',
                'video_fullscreen' => '1',
                'video_autoplay' => '1',
                'video_muted' => '1',
                'video_loop' => '1',
                'poster_image' => '',
                'brando_slider_type' => '',
                'brando_right_image_srcset' => 'full',
                'brando_third_image_srcset' => 'full',
                'brando_opacity_color' => '',
                'brando_opacity' => '0.7',
                'slide_title_settings' => '',
            ), $atts ) );

    $output = $urltarget = $background_image = $sep_style = $style = $background_right_image = $button_link = $button_title = $button_target = $background_poster_image = $background_poster_image_class = $srcset = $srcset_data = $srcset_classes = '';
    /* Replace || to br in title */
    $title = ( $title ) ? str_replace('||', '<br />',$title) : '';
    $thumb = wp_get_attachment_image_src($image, $brando_srcset);
    $srcset = wp_get_attachment_image_srcset( $image, $brando_srcset );
    if( $srcset ){
        $srcset_data = ' data-bg-srcset="'.esc_attr( $srcset ).'"';
        $srcset_classes = ' bg-image-srcset';
    }

    $poster_image = wp_get_attachment_image_src($poster_image, 'full');

    $brando_opacity_color = ( $brando_opacity_color ) ? $opacity_style[] = 'background-color:'.$brando_opacity_color.';': ''; 
    $brando_opacity = ( $brando_opacity ) ? $opacity_style[] = 'opacity:'.$brando_opacity.';': '';

    $style_property_opacity = implode(" ", $opacity_style);
    $style_opacity = ( $style_property_opacity ) ? ' style="'.$style_property_opacity.'"' : '';
    $brando_third_image_srcset = ($brando_third_image_srcset) ? $brando_third_image_srcset : 'full';
    $brando_third_image = wp_get_attachment_image_src($brando_third_image, $brando_third_image_srcset);
    $srcset_icon = $srcset_data_icon = '';
    $srcset_icon = wp_get_attachment_image_srcset( $brando_third_image, $brando_third_image_srcset );
    if( $srcset_icon ){
        $srcset_data_icon = ' srcset="'.esc_attr( $srcset_icon ).'"';
    }

    $sizes_icon = $sizes_data_icon = '';
    $sizes_icon = wp_get_attachment_image_sizes( $brando_third_image, $brando_third_image_srcset );
    if( $sizes_icon ){
        $sizes_data_icon = ' sizes="'.esc_attr( $sizes_icon ).'"';
    }

    $sep_color = ( $sep_color ) ? 'background:'.$sep_color.' !important;': '';
    $separator_height = ( $separator_height ) ? 'height:'.$separator_height.';': '';
    $brando_slider_type = ( $brando_slider_type ) ? $brando_slider_type : '';
    $video_type = ( $video_type ) ? $video_type : '';
    $single_image_mp4_video = ( $single_image_mp4_video ) ? $single_image_mp4_video : '';
    $single_image_ogg_video = ( $single_image_ogg_video ) ? $single_image_ogg_video : '';
    $single_image_webm_video = ( $single_image_webm_video ) ? $single_image_webm_video : '';
    $external_video_url = ( $external_video_url ) ? $external_video_url : '';
    $video_fullscreen = ( $video_fullscreen == 1 ) ? ' full-screen' : '';
    $autoplay = ( $video_autoplay == 1 ) ? ' autoplay' : '';
    $muted = ( $video_muted == 1 ) ? ' muted' : '';
    $loop = ( $video_loop == 1 ) ? ' loop' : '';
    if( $video_autoplay == 1 && $video_type == 'self' ){
        global $brando_video_autoplay;
        $brando_video_autoplay = $autoplay;
    }
    /* Slide button */
    if ( function_exists('vc_parse_multi_attribute') ) {
        //First button
        $button_parse_args = vc_parse_multi_attribute($button_config);
        $button_link     = ( isset($button_parse_args['url']) ) ? $button_parse_args['url'] : '#';
        $button_title    = ( isset($button_parse_args['title']) ) ? $button_parse_args['title'] : '';
        $button_target   = ( isset($button_parse_args['target']) ) ? trim($button_parse_args['target']) : '_self';
    }
    if( $sep_color || $separator_height ){
        $sep_style = ' style="'.$sep_color.$separator_height.'"';
    }
    if($thumb[0]){
        $background_image = ' style="background-image:url('.$thumb[0].')"';
    }

    if( $single_image_mp4_video || $single_image_ogg_video || $single_image_webm_video || $external_video_url ){
        $background_poster_image_class .= ' poster-image-none';
    }

    if($poster_image[0]){
        $background_poster_image = ' style="background-image:url('.$poster_image[0].')"';
    }
    /* Image Alt, Title, Caption */
    $img_alt = brando_option_image_alt($right_image);
    $img_title = brando_option_image_title($right_image);
    $image_alt = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
    $image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';
    
    $srcset_right_thumb = $srcset_data_right_thumb = $srcset_classes_right_thumb = '';
    $right_thumb = wp_get_attachment_image_src($right_image, $brando_right_image_srcset);
    $brando_right_image_srcset = ($brando_right_image_srcset) ? $brando_right_image_srcset : 'full';
    $srcset_right_thumb = wp_get_attachment_image_srcset( $right_image, $brando_right_image_srcset );
    if( $srcset_right_thumb ){
        $srcset_data_right_thumb = ' data-bg-srcset="'.esc_attr( $srcset_right_thumb ).'"';
        $srcset_classes_right_thumb = ' bg-image-srcset';
    }

    $srcset_icon_right = $srcset_data_icon_right = '';
    $srcset_icon_right = wp_get_attachment_image_srcset( $right_image, $brando_right_image_srcset );
    if( $srcset_icon_right ){
        $srcset_data_icon_right = ' srcset="'.esc_attr( $srcset_icon_right ).'"';
    }

    $sizes_icon_right = $sizes_data_icon_right = '';
    $sizes_icon_right = wp_get_attachment_image_sizes( $right_image, $brando_right_image_srcset );
    if( $sizes_icon_right ){
        $sizes_data_icon_right = ' sizes="'.esc_attr( $sizes_icon_right ).'"';
    }

    if($right_thumb[0]){
        $background_right_image = ' style="background-image:url('.$right_thumb[0].')"';
    }

    $slide_title_color = ( $title_color ) ? 'color:'.$title_color.' !important;': '';
    if( $slide_title_color || $brando_title_font_size || $brando_title_line_height ){
        $style .= ' style="'.$slide_title_color.$brando_title_font_size.$brando_title_line_height.'"';
    }

    //Font Settings For Title
    $fontsettings_title_class = $fontsettings_title_id = $responsive_style = '';
    if( !empty( $slide_title_settings ) ) {
        $fontsettings_title_id = uniqid('brando-font-setting-');
        $responsive_style = brando_Responsive_font_settings::generate_css( $slide_title_settings, $fontsettings_title_id );
        $fontsettings_title_class = ' '.$fontsettings_title_id;
    }
    ( !empty( $responsive_style ) ) ? $font_settings_array[] = $responsive_style : '';

    switch($brando_slider_parent_type){
        case 'brando-owl-slider1':
            if( $background_image ){
                $output .= '<div class="item owl-bg-img'.$srcset_classes.'"'.$background_image.$srcset_data.'>';
                    if( $enable_opacity == 1 ){
                        $output .= '<div class="opacity-full bg-dark-gray"'.$style_opacity.'></div>';
                    }
                    $output .= '<div class="container full-screen position-relative">';
                        $output .= '<div class="slider-typography text-left">';
                            $output .= '<div class="slider-text-middle-main xs-padding-ten-top xs-padding-three-left">';
                                $output .= '<div class="slider-text-middle slider-typography-option1">';
                                    $output .= '<div class="col-md-12 col-sm-12 col-xs-12">';
                                        if( $title ){
                                            $output .= '<span class="white-text font-weight-700 alt-font text-uppercase'.$fontsettings_title_class.'"'.$style.'>'.$title.'</span><br>';
                                        }
                                        if( $enable_separator == 1 ){
                                            $output .= '<div class="bg-fast-yellow separator-line-extra-thick  no-margin-lr margin-seven-all md-no-margin-lr md-margin-four-all"'.$sep_style.'></div>';
                                        }
                                        if($content){
                                            $output .= do_shortcode( brando_remove_wpautop( $content ) );
                                        }
                                    $output .= '</div>';    
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            }if( $brando_slider_type == 'video'){
                if( $video_type == 'external' ){
                    $output .= '<div class="item owl-bg-img'.$background_poster_image_class.'"'.$background_poster_image.'>';
                }else{
                    $output .= '<div class="item owl-bg-img'.$background_poster_image_class.'"'.$background_poster_image.'>';
                }
                    if( $video_type == 'external' ){
                        $output .= '<div class="iframe-fit-videos fit-videos width-100">';
                            $output .= '<iframe width="560" height="315" src="'.$external_video_url.'" frameborder="0" allowfullscreen></iframe>';
                        $output .= '</div>';
                    }
                    if( $enable_opacity == 1 ){
                        $output .= '<div class="opacity-full bg-dark-gray"'.$style_opacity.'></div>';
                    }
                    $output .= '<div class="container-fuild position-relative-without-z-index'.$video_fullscreen.'">';
                        $output .= '<div class="slider-typography-without-z-index text-left">';
                            $output .= '<div class="slider-text-middle-main">';
                            if( $video_type == 'external' ){
                                if( $title || $enable_separator == 1 || $content ){
                                    $output .= '<div class="video-background slider-typography-option1">';
                                        $output .= '<div class="slider-typography text-left">';
                                            $output .= '<div class="container no-padding-lr height-100">';
                                                $output .= '<div class="col-text-middle-main xs-padding-ten-top xs-padding-three-left">';
                                                    $output .= '<div class="col-text-middle">';
                                                        $output .= '<div class="col-md-12 col-sm-12 col-xs-12">';
                                                            if( $title ){
                                                                $output .= '<span class="white-text font-weight-700 alt-font text-uppercase'.$fontsettings_title_class.'"'.$style.'>'.$title.'</span><br>';
                                                            }
                                                            if( $enable_separator == 1 ){
                                                                $output .= '<div class="bg-fast-yellow separator-line-extra-thick  no-margin-lr margin-seven-all md-no-margin-lr md-margin-four-all"'.$sep_style.'></div>';
                                                            }
                                                            if($content){
                                                                $output .= do_shortcode( brando_remove_wpautop( $content ) );
                                                            }
                                                        $output .= '</div>';
                                                    $output .= '</div>';
                                                $output .= '</div>';
                                            $output .= '</div>';
                                        $output .= '</div>';
                                    $output .= '</div>';
                                }
                            }else if( $video_type == 'self' ){
                                $output .= '<div class="slider-text-middle slider-typography-option1 video-wrapper full-screen-width">';
                                    $output .= '<div class="position-top z-index-0 video-wrapper">';
                                    if( $single_image_mp4_video || $single_image_ogg_video || $single_image_webm_video ){
                                        $output .= '<video'.$autoplay.$muted.$loop.' class="html-video" poster="'.$poster_image[0].'">';
                                            if( $single_image_mp4_video ){
                                                $output .= '<source type="video/mp4" src="'.$single_image_mp4_video.'">';
                                            }if( $single_image_ogg_video ){
                                                $output .= '<source type="video/ogg" src="'.$single_image_ogg_video.'">';
                                            }if( $single_image_webm_video ){
                                                $output .= '<source type="video/webm" src="'.$single_image_webm_video.'">';
                                            }
                                        $output .= '</video>';
                                    }
                                    $output .= '</div>';
                                    if( $title || $enable_separator == 1 || $content ){
                                        $output .= '<div class="video-background">';
                                            $output .= '<div class="slider-typography text-left z-index-9">';
                                                $output .= '<div class="container no-padding-lr height-100">';
                                                    $output .= '<div class="col-text-middle-main xs-padding-ten-top xs-padding-three-left">';
                                                        $output .= '<div class="col-text-middle">';
                                                            $output .= '<div class="col-md-12 col-sm-12 col-xs-12">';
                                                                if( $title ){
                                                                    $output .= '<span class="white-text font-weight-700 alt-font text-uppercase'.$fontsettings_title_class.'"'.$style.'>'.$title.'</span><br>';
                                                                }
                                                                if( $enable_separator == 1 ){
                                                                    $output .= '<div class="bg-fast-yellow separator-line-extra-thick  no-margin-lr margin-seven-all md-no-margin-lr md-margin-four-all"'.$sep_style.'></div>';
                                                                }
                                                                if($content){
                                                                    $output .= do_shortcode( brando_remove_wpautop( $content ) );
                                                                }
                                                            $output .= '</div>';
                                                        $output .= '</div>';
                                                    $output .= '</div>';
                                                $output .= '</div>';
                                            $output .= '</div>';
                                        $output .= '</div>';
                                    }
                                $output .= '</div>';
                            }
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            }


        break;
        case 'brando-owl-slider2':
            if( $video_type == 'external' ){
                $output .= '<div class="item owl-bg-img'.$background_poster_image_class.'">';
            }else{
                $output .= '<div class="item owl-bg-img'.$background_poster_image_class.'"'.$background_poster_image.'>';
            }
                if( $enable_opacity == 1 ){
                    $output .= '<div class="opacity-full bg-dark-gray"'.$style_opacity.'></div>';
                }
                $output .= '<div class="position-relative">';
                    if( $background_image ){
                        $output .= '<div class="col-md-6 col-sm-6 no-padding travel-slider cover-background'.$srcset_classes.'"'.$background_image.$srcset_data.'></div>';
                    }if( $video_type == 'external' ){
                        
                        $output .= '<div class="col-md-6 col-sm-6 no-padding travel-slider cover-background"'.$background_poster_image.'>';
                            $output .= '<div class="slider-typography text-left">';
                                $output .= '<div class="height-100">';
                                    $output .= '<div class="col-text-middle-main">';
                                        $output .= '<div class="slider-text-middle slider-typography-option1 fit-videos width-100">';
                                            $output .= '<iframe width="560" height="315" src="'.$external_video_url.'" frameborder="0" allowfullscreen></iframe>';
                                        $output .= '</div>';
                                    $output .= '</div>';
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    }else if( $video_type == 'self' ){
                        $output .= '<div class="col-md-6 col-sm-6 no-padding travel-slider cover-background">';
                        if( $single_image_mp4_video || $single_image_ogg_video || $single_image_webm_video ){
                            $output .= '<video'.$autoplay.$muted.$loop.' class="html-video" poster="'.$poster_image[0].'">';
                                if( $single_image_mp4_video ){
                                    $output .= '<source type="video/mp4" src="'.$single_image_mp4_video.'">';
                                }if( $single_image_ogg_video ){
                                    $output .= '<source type="video/ogg" src="'.$single_image_ogg_video.'">';
                                }if( $single_image_webm_video ){
                                    $output .= '<source type="video/webm" src="'.$single_image_webm_video.'">';
                                }
                            $output .= '</video>';
                        }
                        $output .= '</div>';
                    }
                    $output .= '<div class="col-md-6 col-sm-6 no-padding travel-slider cover-background'.$srcset_classes_right_thumb.'"'.$background_right_image.$srcset_data_right_thumb.'>';
                        $output .= '<div class="slider-typography text-left padding-fourteen-all xs-padding-seven-all">';
                            $output .= '<div class="slider-text-middle-main">';
                                $output .= '<div class="slider-text-middle slider-typography-option2 xs-display-block">';
                                    if( $title ){
                                        $output .= '<span class="white-text font-weight-700 alt-font text-uppercase'.$fontsettings_title_class.'"'.$style.'>'.$title.'</span><br>';
                                    }
                                    if( $enable_separator == 1){
                                        $output .= '<div class="separator-line-extra-thick no-margin-lr margin-eleven-all xs-margin-seven-all xs-no-margin-lr xs-width-20"'.$sep_style.'></div>';
                                    }
                                    if($content){
                                        $output .= do_shortcode( brando_remove_wpautop( $content ) );
                                    }
                                    if( $button_title || $button_link ){
                                        $output .= '<a class="highlight-button-transparent-border btn btn-medium margin-seven-top inner-link" target="'.$button_target.'" href="'.$button_link.'">'.$button_title.'</a>';
                                    }
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            $output .= '</div>';
            
        break;

        case 'brando-owl-slider3':
            if( $background_image ){
                $output .= '<div class="item owl-bg-img'.$srcset_classes.'"'.$background_image.$srcset_data.'>';
                    if( $enable_opacity == 1 ){
                        $output .= '<div class="opacity-medium bg-dark-gray"'.$style_opacity.'></div>';
                    }
                    $output .= '<div class="container full-screen position-relative">';
                        $output .= '<div class="col-md-12 slider-typography text-left">';
                            $output .= '<div class="slider-text-middle-main">';
                                $output .= '<div class="slider-text-middle slider-typography-option3">';
                                    if( $enable_separator == 1){
                                        $output .= '<div class="col-md-1 no-padding">';
                                            $output .= '<div class="bg-crimson-red separator-line-medium-thick xs-margin-seven-tb"'.$sep_style.'></div>';
                                        $output .= '</div>';
                                    }
                                    $output .= '<div class="col-md-11 no-padding">';
                                        if( $content ){
                                            $output .= do_shortcode( brando_remove_wpautop( $content ) );
                                        }
                                        if( $title ){
                                            $output .= '<span class="white-text font-weight-700 alt-font text-uppercase'.$fontsettings_title_class.'"'.$style.'>'.$title.'</span>';
                                        }
                                    $output .= '</div>';
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            }if( $brando_slider_type == 'video'){
                if( $video_type == 'external' ){
                    $output .= '<div class="item owl-bg-img'.$background_poster_image_class.'"'.$background_poster_image.'>';
                }else{
                    $output .= '<div class="item owl-bg-img'.$background_poster_image_class.'"'.$background_poster_image.'>';
                }
                    if( $video_type == 'external' ){
                        $output .= '<div class="iframe-fit-videos fit-videos width-100">';
                            $output .= '<iframe width="560" height="315" src="'.$external_video_url.'" frameborder="0" allowfullscreen></iframe>';
                        $output .= '</div>';
                    }
                    if( $enable_opacity == 1 ){
                        $output .= '<div class="opacity-medium bg-dark-gray"'.$style_opacity.'></div>';
                    }
                    $output .= '<div class="container-fuild position-relative-without-z-index'.$video_fullscreen.'">';
                        $output .= '<div class="slider-typography-without-z-index text-left">';
                            $output .= '<div class="slider-text-middle-main">';
                            if( $video_type == 'external' ){
                                if( $title || $enable_separator == 1 || $content ){
                                    $output .= '<div class="video-background slider-typography-option3">';
                                        $output .= '<div class="slider-typography text-left">';
                                            $output .= '<div class="container no-padding-lr height-100">';
                                                $output .= '<div class="col-md-12 col-text-middle-main">';
                                                    $output .= '<div class="col-text-middle">';
                                                        $output .= '<div class="slider-typography-option3">';
                                                        if( $enable_separator == 1){
                                                            $output .= '<div class="col-md-1 no-padding">';
                                                                $output .= '<div class="bg-crimson-red separator-line-medium-thick xs-margin-seven-tb"'.$sep_style.'></div>';
                                                            $output .= '</div>';
                                                        }
                                                        $output .= '<div class="col-md-11 no-padding">';
                                                            if( $content ){
                                                                $output .= do_shortcode( brando_remove_wpautop( $content ) );
                                                            }
                                                            if( $title ){
                                                                $output .= '<span class="white-text font-weight-700 alt-font text-uppercase'.$fontsettings_title_class.'"'.$style.'>'.$title.'</span>';
                                                            }
                                                        $output .= '</div>';
                                                    $output .= '</div>';
                                                    $output .= '</div>';
                                                $output .= '</div>';
                                            $output .= '</div>';
                                        $output .= '</div>';
                                    $output .= '</div>';
                                }
                            }else if( $video_type == 'self' ){
                                $output .= '<div class="slider-text-middle slider-typography-option1 video-wrapper full-screen-width">';
                                    $output .= '<div class="position-top z-index-0 video-wrapper">';
                                    if( $single_image_mp4_video || $single_image_ogg_video || $single_image_webm_video ){
                                        $output .= '<video'.$autoplay.$muted.$loop.' class="html-video" poster="'.$poster_image[0].'">';
                                            if( $single_image_mp4_video ){
                                                $output .= '<source type="video/mp4" src="'.$single_image_mp4_video.'">';
                                            }if( $single_image_ogg_video ){
                                                $output .= '<source type="video/ogg" src="'.$single_image_ogg_video.'">';
                                            }if( $single_image_webm_video ){
                                                $output .= '<source type="video/webm" src="'.$single_image_webm_video.'">';
                                            }
                                        $output .= '</video>';
                                    }
                                    $output .= '</div>';
                                    if( $title || $enable_separator == 1 || $content ){
                                        $output .= '<div class="video-background">';
                                            $output .= '<div class="slider-typography text-left z-index-9">';
                                                $output .= '<div class="container no-padding-lr height-100">';
                                                    $output .= '<div class="col-md-12 col-text-middle-main">';
                                                        $output .= '<div class="col-text-middle">';
                                                            $output .= '<div class="slider-typography-option3">';
                                                            if( $enable_separator == 1){
                                                                $output .= '<div class="col-md-1 no-padding">';
                                                                    $output .= '<div class="bg-crimson-red separator-line-medium-thick xs-margin-seven-tb"'.$sep_style.'></div>';
                                                                $output .= '</div>';
                                                            }
                                                            $output .= '<div class="col-md-11 no-padding">';
                                                                if( $content ){
                                                                    $output .= do_shortcode( brando_remove_wpautop( $content ) );
                                                                }
                                                                if( $title ){
                                                                    $output .= '<span class="white-text font-weight-700 alt-font text-uppercase'.$fontsettings_title_class.'"'.$style.'>'.$title.'</span>';
                                                                }
                                                            $output .= '</div>';
                                                        $output .= '</div>';
                                                        $output .= '</div>';
                                                    $output .= '</div>';
                                                $output .= '</div>';
                                            $output .= '</div>';
                                        $output .= '</div>';
                                    }
                                $output .= '</div>';
                            }
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            }

        break;

        case 'brando-owl-slider4':
            if( $background_image ){
                $output .= '<div class="item owl-bg-img'.$srcset_classes.'"'.$background_image.$srcset_data.'>';
                    if( $enable_opacity == 1 ){
                        $output .= '<div class="opacity-medium bg-dark-gray"'.$style_opacity.'></div>';
                    }
                    $output .= '<div class="container full-screen position-relative">';
                        $output .= '<div class="col-md-12 slider-typography text-center">';
                            $output .= '<div class="slider-text-middle-main">';
                                $output .= '<div class="slider-text-middle">';
                                    if( $right_thumb[0] ){
                                        $output .= '<img class="margin-six-bottom xs-width-100" src="'.$right_thumb[0].'"'.$image_alt.$image_title.' width="'.$right_thumb[1].'" height="'.$right_thumb[2].'"'.$srcset_data_icon_right.$sizes_data_icon_right.'/>';
                                    }
                                    if( $content ){
                                        $output .= do_shortcode( brando_remove_wpautop( $content ) );
                                    }
                                    if( $brando_third_image[0] ){
                                        $output .= '<img src="'.$brando_third_image[0].'" class="display-none-minwidth" alt="" width="'.$brando_third_image[1].'" height="'.$brando_third_image[2].'"'.$srcset_data_icon.$sizes_data_icon.' />';
                                    }
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            }if( $brando_slider_type == 'video'){
                if( $video_type == 'external' ){
                    $output .= '<div class="item owl-bg-img'.$background_poster_image_class.'"'.$background_poster_image.'>';
                }else{
                    $output .= '<div class="item owl-bg-img'.$background_poster_image_class.'"'.$background_poster_image.'>';
                }
                    if( $video_type == 'external' ){
                        $output .= '<div class="iframe-fit-videos fit-videos width-100">';
                            $output .= '<iframe width="560" height="315" src="'.$external_video_url.'" frameborder="0" allowfullscreen></iframe>';
                        $output .= '</div>';
                    }
                    if( $enable_opacity == 1 ){
                        $output .= '<div class="opacity-medium bg-dark-gray"'.$style_opacity.'></div>';
                    }
                    $output .= '<div class="container-fuild position-relative-without-z-index'.$video_fullscreen.'">';
                        $output .= '<div class="slider-typography-without-z-index text-left">';
                            $output .= '<div class="slider-text-middle-main">';
                            if( $video_type == 'external' ){
                                if( $title || $enable_separator == 1 || $content ){
                                    $output .= '<div class="video-background slider-typography-option3">';
                                        $output .= '<div class="col-md-12 slider-typography text-center">';
                                            $output .= '<div class="slider-text-middle-main">';
                                                $output .= '<div class="slider-text-middle">';
                                                    if( $right_thumb[0] ){
                                                        $output .= '<img class="margin-six-bottom xs-width-100" src="'.$right_thumb[0].'"'.$image_alt.$image_title.' width="'.$right_thumb[1].'" height="'.$right_thumb[2].'"'.$srcset_data_icon_right.$sizes_data_icon_right.'/>';
                                                    }
                                                    if( $content ){
                                                        $output .= do_shortcode( brando_remove_wpautop( $content ) );
                                                    }
                                                    if( $brando_third_image[0] ){
                                                        $output .= '<img src="'.$brando_third_image[0].'" class="display-none-minwidth" alt="" width="'.$brando_third_image[1].'" height="'.$brando_third_image[2].'"'.$srcset_data_icon.$sizes_data_icon.' />';
                                                    }
                                                $output .= '</div>';
                                            $output .= '</div>';
                                        $output .= '</div>';
                                    $output .= '</div>';
                                }
                            }else if( $video_type == 'self' ){
                                $output .= '<div class="slider-text-middle slider-typography-option1 video-wrapper full-screen-width">';
                                    $output .= '<div class="position-top z-index-0 video-wrapper">';
                                    if( $single_image_mp4_video || $single_image_ogg_video || $single_image_webm_video ){
                                        $output .= '<video'.$autoplay.$muted.$loop.' class="html-video" poster="'.$poster_image[0].'">';
                                            if( $single_image_mp4_video ){
                                                $output .= '<source type="video/mp4" src="'.$single_image_mp4_video.'">';
                                            }if( $single_image_ogg_video ){
                                                $output .= '<source type="video/ogg" src="'.$single_image_ogg_video.'">';
                                            }if( $single_image_webm_video ){
                                                $output .= '<source type="video/webm" src="'.$single_image_webm_video.'">';
                                            }
                                        $output .= '</video>';
                                    }
                                    $output .= '</div>';
                                    if( $title || $enable_separator == 1 || $content ){
                                        $output .= '<div class="video-background">';
                                            $output .= '<div class="col-md-12 slider-typography text-center">';
                                                $output .= '<div class="slider-text-middle-main">';
                                                    $output .= '<div class="slider-text-middle">';
                                                        if( $right_thumb[0] ){
                                                            $output .= '<img class="margin-six-bottom xs-width-100" src="'.$right_thumb[0].'"'.$image_alt.$image_title.' width="'.$right_thumb[1].'" height="'.$right_thumb[2].'"'.$srcset_data_icon_right.$sizes_data_icon_right.' />';
                                                        }
                                                        if( $content ){
                                                            $output .= do_shortcode( brando_remove_wpautop( $content ) );
                                                        }
                                                        if( $brando_third_image[0] ){
                                                            $output .= '<img src="'.$brando_third_image[0].'" class="display-none-minwidth" alt="" width="'.$brando_third_image[1].'" height="'.$brando_third_image[2].'"'.$srcset_data_icon.$sizes_data_icon.' />';
                                                        }
                                                    $output .= '</div>';
                                                $output .= '</div>';
                                            $output .= '</div>';
                                        $output .= '</div>';
                                    }
                                $output .= '</div>';
                            }
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            }

        break;

        case 'brando-owl-slider5':
            if( $background_image ){
                $output .= '<div class="item padding-thirteen no-padding-lr sm-padding-twenty-nine sm-no-padding-lr xs-padding-seven xs-no-padding-lr half-project-bg owl-bg-img'.$srcset_classes.'" '.$background_image.$srcset_data.'>';
                    if( $enable_opacity == 1 ){
                        $output .= '<div class="opacity-full bg-dark-gray"'.$style_opacity.'></div>';
                    }
                    $output .= '<div class="container height-100 position-relative">';
                        $output .= '<div class="row">';
                        $output .= '<div class="slider-typography text-center">';
                                $output .= '<div class="slider-text-middle-main">';
                                    $output .= '<div class="slider-text-bottom sm-slider-text-middle slider-typographi-text">';
                                        $output .= '<div class="col-md-12 text-center z-index-1 margin-six-bottom md-margin-thirteen-bottom sm-no-margin-bottom">';
                                            $output .= '<div class="slider-typographi-text">';
                                                if( $content ){
                                                    $output .= do_shortcode( brando_remove_wpautop( $content ) );
                                                }
                                                if( $title ){
                                                    $output .= '<span class="alt-font font-weight-700 white-text title-extra-large text-uppercase display-block xs-title-medium'.$fontsettings_title_class.'"'.$style.'>'.$title.'</span>';
                                                }
                                                if( $enable_separator == 1 ){
                                                    $output .= '<div class="bg-fast-yellow separator-line-thick-long margin-lr-auto margin-four-tb xs-margin-six-tb"'.$sep_style.'></div>';
                                                }
                                            $output .= '</div>';
                                        $output .= '</div>';
                                    $output .= '</div>';
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            }if( $brando_slider_type == 'video'){
                if( $video_type == 'external' ){
                    $output .= '<div class="item owl-bg-img padding-thirteen no-padding-lr sm-padding-twenty-nine sm-no-padding-lr xs-padding-seven xs-no-padding-lr half-project-bg'.$background_poster_image_class.'"'.$background_poster_image.'>';
                }else{
                    $output .= '<div class="item owl-bg-img padding-thirteen no-padding-lr sm-padding-twenty-nine sm-no-padding-lr xs-padding-seven xs-no-padding-lr half-project-bg">';
                }
                    if( $video_type == 'external' ){
                        $output .= '<div class="iframe-fit-videos fit-videos width-100">';
                            $output .= '<iframe width="560" height="315" src="'.$external_video_url.'" frameborder="0" allowfullscreen></iframe>';
                        $output .= '</div>';
                    }
                    if( $enable_opacity == 1 ){
                        $output .= '<div class="opacity-full bg-dark-gray"'.$style_opacity.'></div>';
                    }
                    $output .= '<div class="container-fluid height-100 position-relative-without-z-index">';
                        $output .= '<div class="slider-typography-without-z-index">';
                            if( $video_type == 'external' ){
                                if( $title || $enable_separator == 1 || $content ){
                                        $output .= '<div class="container no-padding-lr height-100 position-relative">';
                                            $output .= '<div class="video-background">';
                                                $output .= '<div class="slider-typography text-center z-index-9">';
                                                    $output .= '<div class="slider-text-middle-main">';
                                                        $output .= '<div class="slider-text-bottom sm-slider-text-middle slider-typographi-text">';
                                                            $output .= '<div class="col-md-12 text-center z-index-1 margin-six-bottom md-margin-thirteen-bottom sm-no-margin-bottom">';
                                                                $output .= '<div class="slider-typographi-text">';
                                                                    if( $content ){
                                                                        $output .= do_shortcode( brando_remove_wpautop( $content ) );
                                                                    }
                                                                    if( $title ){
                                                                        $output .= '<span class="alt-font font-weight-700 white-text title-extra-large text-uppercase display-block xs-title-medium'.$fontsettings_title_class.'"'.$style.'>'.$title.'</span>';
                                                                    }
                                                                    if( $enable_separator == 1 ){
                                                                        $output .= '<div class="bg-fast-yellow separator-line-thick-long margin-lr-auto margin-four-tb xs-margin-six-tb"'.$sep_style.'></div>';
                                                                    }
                                                                $output .= '</div>';
                                                            $output .= '</div>';
                                                        $output .= '</div>';
                                                    $output .= '</div>';
                                                $output .= '</div>';
                                            $output .= '</div>';
                                        $output .= '</div>';
                                }
                            }else if( $video_type == 'self' ){
                                $output .= '<div class="video-wrapper full-screen-width">';
                                    $output .= '<div class="position-top z-index-0 video-wrapper">';
                                    if( $single_image_mp4_video || $single_image_ogg_video || $single_image_webm_video ){
                                        $output .= '<video'.$autoplay.$muted.$loop.' class="html-video" poster="'.$poster_image[0].'">';
                                            if( $single_image_mp4_video ){
                                                $output .= '<source type="video/mp4" src="'.$single_image_mp4_video.'">';
                                            }if( $single_image_ogg_video ){
                                                $output .= '<source type="video/ogg" src="'.$single_image_ogg_video.'">';
                                            }if( $single_image_webm_video ){
                                                $output .= '<source type="video/webm" src="'.$single_image_webm_video.'">';
                                            }
                                        $output .= '</video>';
                                    }
                                    $output .= '</div>';
                                    if( $title || $enable_separator == 1 || $content ){
                                        $output .= '<div class="container no-padding-lr height-100 position-relative">';
                                            $output .= '<div class="video-background aa">';
                                                $output .= '<div class="slider-typography text-center">';
                                                    $output .= '<div class="slider-text-middle-main">';
                                                        $output .= '<div class="slider-text-bottom sm-slider-text-middle slider-typographi-text">';
                                                            $output .= '<div class="col-md-12 text-center z-index-1 margin-six-bottom md-margin-thirteen-bottom sm-no-margin-bottom">';
                                                                $output .= '<div class="slider-typographi-text">';
                                                                    if( $content ){
                                                                        $output .= do_shortcode( brando_remove_wpautop( $content ) );
                                                                    }
                                                                    if( $title ){
                                                                        $output .= '<span class="alt-font font-weight-700 white-text title-extra-large text-uppercase display-block xs-title-medium'.$fontsettings_title_class.'"'.$style.'>'.$title.'</span>';
                                                                    }
                                                                    if( $enable_separator == 1 ){
                                                                        $output .= '<div class="bg-fast-yellow separator-line-thick-long margin-lr-auto margin-four-tb xs-margin-six-tb"'.$sep_style.'></div>';
                                                                    }
                                                                $output .= '</div>';
                                                            $output .= '</div>';
                                                        $output .= '</div>';
                                                    $output .= '</div>';
                                                $output .= '</div>';
                                            $output .= '</div>';
                                        $output .= '</div>';
                                    }
                                $output .= '</div>';
                            }
                        $output .= '</div>';        
                    $output .= '</div>';
                $output .= '</div>';
            }
        break;

        case 'brando-owl-slider6':
            if( $background_image ){
                $output .= '<div class="item owl-bg-img full-screen wedding-slider'.$srcset_classes.'"'.$background_image.$srcset_data.'></div>';
            }if( $brando_slider_type == 'video'){
                if( $video_type == 'external' ){
                    $output .= '<div class="item owl-bg-img wedding-slider'.$background_poster_image_class.'"'.$background_poster_image.'>';
                }else{
                    $output .= '<div class="item owl-bg-img wedding-slider">';
                }
                    $output .= '<div class="container-fuild position-relative-without-z-index'.$video_fullscreen.'">';
                        $output .= '<div class="slider-typography-without-z-index text-left">';
                            $output .= '<div class="slider-text-middle-main">';
                            if( $video_type == 'external' ){
                                $output .= '<div class="slider-text-middle slider-typography-option1 fit-videos width-100">';
                                    $output .= '<iframe width="560" height="315" src="'.$external_video_url.'" frameborder="0" allowfullscreen></iframe>';
                                $output .= '</div>';
                            }else if( $video_type == 'self' ){
                                $output .= '<div class="slider-text-middle slider-typography-option1 video-wrapper full-screen-width">';
                                    $output .= '<div class="position-top z-index-0 video-wrapper">';
                                    if( $single_image_mp4_video || $single_image_ogg_video || $single_image_webm_video ){
                                        $output .= '<video'.$autoplay.$muted.$loop.' class="html-video" poster="'.$poster_image[0].'">';
                                            if( $single_image_mp4_video ){
                                                $output .= '<source type="video/mp4" src="'.$single_image_mp4_video.'">';
                                            }if( $single_image_ogg_video ){
                                                $output .= '<source type="video/ogg" src="'.$single_image_ogg_video.'">';
                                            }if( $single_image_webm_video ){
                                                $output .= '<source type="video/webm" src="'.$single_image_webm_video.'">';
                                            }
                                        $output .= '</video>';
                                    }
                                    $output .= '</div>';
                                $output .= '</div>';
                            }
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            }
        break;

        case 'brando-owl-slider7':
            if( $background_image ){
                $output .= '<div class="item owl-bg-img full-screen'.$srcset_classes.'"'.$background_image.$srcset_data.'></div>';
            }if( $brando_slider_type == 'video'){
                if( $video_type == 'external' ){
                    $output .= '<div class="item owl-bg-img wedding-slider'.$background_poster_image_class.'"'.$background_poster_image.'>';
                }else{
                    $output .= '<div class="item owl-bg-img wedding-slider">';
                }
                    $output .= '<div class="container-fuild position-relative-without-z-index'.$video_fullscreen.'">';
                        $output .= '<div class="slider-typography-without-z-index text-left">';
                            $output .= '<div class="slider-text-middle-main">';
                            if( $video_type == 'external' ){
                                $output .= '<div class="slider-text-middle slider-typography-option1 fit-videos width-100">';
                                    $output .= '<iframe width="560" height="315" src="'.$external_video_url.'" frameborder="0" allowfullscreen></iframe>';
                                $output .= '</div>';
                            }else if( $video_type == 'self' ){
                                $output .= '<div class="slider-text-middle slider-typography-option1 video-wrapper full-screen-width">';
                                    $output .= '<div class="position-top z-index-0 video-wrapper">';
                                    if( $single_image_mp4_video || $single_image_ogg_video || $single_image_webm_video ){
                                        $output .= '<video'.$autoplay.$muted.$loop.' class="html-video" poster="'.$poster_image[0].'">';
                                            if( $single_image_mp4_video ){
                                                $output .= '<source type="video/mp4" src="'.$single_image_mp4_video.'">';
                                            }if( $single_image_ogg_video ){
                                                $output .= '<source type="video/ogg" src="'.$single_image_ogg_video.'">';
                                            }if( $single_image_webm_video ){
                                                $output .= '<source type="video/webm" src="'.$single_image_webm_video.'">';
                                            }
                                        $output .= '</video>';
                                    }
                                    $output .= '</div>';
                                $output .= '</div>';
                            }
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            }
        break;
    }
    
    return $output;
}
add_shortcode( 'brando_slide_content', 'brando_slider_content_shortcode' );
?>