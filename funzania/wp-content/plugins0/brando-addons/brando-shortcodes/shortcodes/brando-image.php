<?php
/**
 * Shortcode For Simple Image
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Simple Image */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'brando_simple_image_shortcode' ) ) {
    function brando_simple_image_shortcode( $atts, $content = null ) {
    	extract( shortcode_atts( array(
            	'id' => '',
            	'class' => '',
            	'brando_image' => '',
                'brando_mobile_full_image' => '',
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
                'brando_url' => '',
                'brando_target_blank' => '',
                'brando_show_image_caption' => '',
                'brando_image_caption_position' => '',
                'brando_image_caption_text_alignment' => '',
                'brando_image_srcset' => 'full',
                'brando_token_class' => '',
            ), $atts ) );

        global $tz_featured_array, $tz_featured_ipad_array, $tz_featured_mobile_array;
    	$output = $padding = $margin = $padding_style = $margin_style = $style_attr = $style = '';
        $id = ( $id ) ? ' id="'.$id.'"' : '';
        $classes = $style_array = array();
        $class = ( $class ) ? $classes[] = $class : '';
        $brando_mobile_full_image = ($brando_mobile_full_image == 1) ? $classes[] = 'xs-img-full' : '';
        $brando_url = ( $brando_url ) ? $brando_url : '';
        $brando_target_blank = ( $brando_target_blank == 1 ) ? ' target="_blank"': '';

        /* Add image caption */
        $brando_show_image_caption = ( $brando_show_image_caption ) ? $brando_show_image_caption : '';
        $brando_image_caption_position = ( $brando_image_caption_position ) ? $brando_image_caption_position : 'image-caption-bottom';
        $brando_image_caption_text_alignment = ( $brando_image_caption_text_alignment ) ? ' '.$brando_image_caption_text_alignment : ' text-left';
        
        $classes[] = $brando_token_class;

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
        $class_attr = ( $class_list ) ? ' class="'.$class_list.'"' : '';

        $style_property_list = implode(" ", $style_array);
        $style_atrr = ( $style_property_list ) ? ' style="'.$style_property_list.'"' : '';
 
        $brando_image = ( $brando_image ) ? $brando_image : '';
        if(wp_attachment_is_image($brando_image)){
            $attachment = get_post( $brando_image );
            $img_caption = array(
                'caption' => $attachment->post_excerpt,
            );
        }
        $img_caption = ( isset($img_caption['caption']) && !empty($img_caption['caption']) ) ? $img_caption['caption'] : '' ;

        /* Image Alt, Title, Caption */
        $img_alt = brando_option_image_alt($brando_image);
        $img_title = brando_option_image_title($brando_image);
        $image_alt = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? 'alt="'.$img_alt['alt'].'"' : 'alt=""' ; 
        $image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

        // custom image
        $brando_image_srcset = ($brando_image_srcset) ? $brando_image_srcset : 'full';
        $thumb = wp_get_attachment_image_src($brando_image, $brando_image_srcset);
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

        if( $brando_show_image_caption == 1 ) {
            $output .= '<figure class="brando-image-caption" id="attachment_'.$brando_image.'">';
            if( $img_caption && $brando_image_caption_position == 'image-caption-top' ) {
                $output .= '<figcaption class="wp-caption-text'.$brando_image_caption_text_alignment.'">'.$img_caption.'</figcaption>';
            }
        }
        if( $brando_url ){
            $output .= '<a href="'.$brando_url.'"'.$brando_target_blank.'>';
        }
        if ( $thumb[0] ){
            $output .= '<img src="'.$thumb[0].'" width="'.$thumb[1].'" height="'.$thumb[2].'"'.$class_attr.$style_atrr.$id.' '.$image_alt.$image_title.' '.$srcset_data.$sizes_data.'/>';
        }
        if( $brando_url ){
            $output .= '</a>';
        }
        if( $brando_show_image_caption == 1 ) {
            if( $img_caption && $brando_image_caption_position == 'image-caption-bottom' ) {
                $output .= '<figcaption class="brando-image-caption'.$brando_image_caption_text_alignment.'">'.$img_caption.'</figcaption>';
            }
            $output .= '</figure>';
        }
      
        return $output;
    }
}
add_shortcode('brando_simple_image','brando_simple_image_shortcode');
?>