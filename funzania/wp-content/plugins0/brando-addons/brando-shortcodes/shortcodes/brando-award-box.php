<?php
/**
 * Shortcode For Award Box
 *
 * @package Brando
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Award Box */
/*-----------------------------------------------------------------------------------*/

function brando_award_box_shortcode( $atts, $content = null ) {
    extract( shortcode_atts( array(
               'brando_year' => '',
               'brando_year_color' => '',
            ), $atts ) );

    $output  = '';
    $classes = array();
    
    $brando_year = ( $brando_year ) ? $brando_year : '';
    $brando_year_color = ( $brando_year_color ) ? ' style="color:'.$brando_year_color.' !important;"': '';

    $class_list = implode(" ", $classes);

    $output  .= '<span class="alt-font title-small text-right display-block awards-year margin-ten-bottom"'.$brando_year_color.'>'.esc_html__('/ ').$brando_year.'</span>';
    $output  .= '<div class="col-md-12 col-sm-12 col-xs-12 no-padding">';
        $output .= do_shortcode($content);
    $output  .= '</div>';

    return $output;
}
add_shortcode( 'brando_award_box', 'brando_award_box_shortcode' );
 
function brando_award_box_content_shortcode( $atts, $content = null) {
	global $brando_slider_parent_type;
    extract( shortcode_atts( array(
                'brando_image' => '',
                'brando_title' => '',
                'brando_title_color' => '',
                'show_separator' => '',
                'separator_color' => '',
                'separator_height' => '',
                'brando_image_srcset' => 'full',
                'title_settings' => ''
            ), $atts ) );
    $output = $sep_style = $fontsettings_title_class = $fontsettings_title_id = '';
    global $font_settings_array;
    $style_array = array();
    $brando_image_srcset = ($brando_image_srcset) ? $brando_image_srcset : 'full';
    $thumb = wp_get_attachment_image_src($brando_image, $brando_image_srcset);
    $brando_title = ( $brando_title ) ? $brando_title : '';
    $brando_title_color = ( $brando_title_color ) ? ' style="color:'.$brando_title_color.' !important;"' : '';

    $separator_color = ( $separator_color ) ? $style_array[] = 'background:'.$separator_color.' !important;': '';
    $separator_height = ( $separator_height ) ? $style_array[] = 'height:'.$separator_height.' !important;': '';

    $style_property_list = implode(" ", $style_array);
    $sep_style = ( $style_property_list ) ? ' style="'.$style_property_list.'"' : '';
    
    //Font Settings For Title
    if( !empty( $title_settings ) ) {
        $fontsettings_title_id = uniqid('brando-font-setting-');
        $responsive_style = brando_Responsive_font_settings::generate_css( $title_settings, $fontsettings_title_id );
        $fontsettings_title_class = ' '.$fontsettings_title_id;
    }
    ( !empty( $responsive_style ) ) ? $font_settings_array[] = $responsive_style : '';

    /* Image Alt, Title, Caption */
    $img_alt = brando_option_image_alt($brando_image);
    $img_title = brando_option_image_title($brando_image);
    $image_alt = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
    $image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';
    $srcset = $srcset_data = '';
    $srcset = wp_get_attachment_image_srcset( $brando_image, $brando_image_srcset );
    if( $srcset ){
        $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
    }

    $sizes_icon = $sizes_data_icon = '';
    $sizes_icon = wp_get_attachment_image_sizes( $brando_image, $brando_image_srcset );
    if( $sizes_icon ){
        $sizes_data_icon = ' sizes="'.esc_attr( $sizes_icon ).'"';
    }

    $output .= '<div class="col-md-6 col-sm-12 col-xs-12 clearfix margin-five-bottom">';
        $output .= '<div class="col-md-4 col-sm-3 col-xs-4 no-padding-left">';
        if( $thumb[0] ){
            $output .= '<img src="'.$thumb[0].'"'.$image_alt.$image_title.$srcset_data.$sizes_data_icon.'/>';
        }
        $output .= '</div>';
        $output .= '<div class="col-md-8 col-sm-9 col-xs-8 position-relative top-minus4 no-padding">';
            if( $brando_title ){
                $output .= '<span class="text-uppercase alt-font display-block'.$fontsettings_title_class.'"'.$brando_title_color.'>'.$brando_title.'</span>';
            }
            $output .= do_shortcode( brando_remove_wpautop($content) );
            if( $show_separator == 1 ){
                $output .= '<div class="separator-line bg-mid-gray2 no-margin-left sm-no-margin-bottom sm-margin-four-all sm-no-margin-lr"'.$sep_style.'></div>';
            }
        $output .= '</div>';
    $output .= '</div>';

    return $output;
}
add_shortcode( 'brando_award_box_content', 'brando_award_box_content_shortcode' );