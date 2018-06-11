<?php
/**
 * Shortcode For Icon
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Icons */
/*-----------------------------------------------------------------------------------*/
add_shortcode('brando_font_icons','brando_font_icons_shortcode');
if ( ! function_exists( 'brando_font_icons_shortcode' ) ) {
    function brando_font_icons_shortcode( $atts, $content = null ) {
    	extract( shortcode_atts( array(
            	'id' => '',
            	'class' => '',
            	'brando_font_icon_type' => '',
                'brando_et_icon_premade_style' => '',
                'brando_font_icon_premade_style' => '',
            	'brando_font_awesome_icon_list' => '',
            	'brando_et_line_icon_list' => '',
            	'brando_font_icon_size' => '',
            	'show_border' => '',
            	'show_border_rounded' => '',
            	'brando_icon_box_size' => '',
            	'brando_icon_box_decoration' => '',
            	'brando_icon_box_background_color' => '',
            	// et icons
            	'brando_et_icon_box_size' => '',
            	'et_show_border' => '',
            	'show_et_border_rounded' => '',
            	'et_plain' => '',
            	'circled' => '',
            	'brando_et_icon_box_decoration' => '',
            	'brando_et_icon_box_background_color' => '',
                'font_awesome_custom_icon' => '',
                'font_awesome_custom_icon_image' => '',
                'etline_custom_icon' => '',
                'etline_custom_icon_image' => '',
                'brando_custom_image_srcset' => 'full',
                'brando_custom_etline_image_srcset' => 'full',
            ), $atts ) );
    	$output = $icon_common_class = '';
        $classes = $style_array = array();
        $id = ( $id ) ? ' id="'.$id.'"' : '';
        $class = ( $class ) ? $classes[] = $class : '';
      
        $brando_font_icon_type = ( $brando_font_icon_type ) ? $brando_font_icon_type : '';
    	$brando_font_awesome_icon_list = ( $brando_font_awesome_icon_list ) ?  $classes[] = $brando_font_awesome_icon_list : '';
    	$brando_font_icon_size = ( $brando_font_icon_size ) ? $classes[] = $brando_font_icon_size : '';
        $et_line = ($brando_et_icon_premade_style) ? 'icon-box' : '';
    	$show_border = ( $show_border ) ? $classes[] = 'i-bordered' : '';
    	$show_border_rounded = ( $show_border_rounded ) ? $classes[] = 'i-rounded' : '';
    	$brando_icon_box_size = ( $brando_icon_box_size ) ? $classes[] = $brando_icon_box_size : '';
    	$brando_icon_box_decoration = ( $brando_icon_box_decoration ) ? $classes[] = $brando_icon_box_decoration : '';
    	$brando_icon_box_background = ( $brando_icon_box_background_color ) ?  $classes[] = $brando_icon_box_background_color : '';
    	// Et Line icons
    	$brando_et_line_icon_list = ( $brando_et_line_icon_list ) ? $classes[] = $brando_et_line_icon_list : '';
    	$brando_et_icon_box_size = ( $brando_et_icon_box_size ) ? $classes[] = $brando_et_icon_box_size : '';
    	$et_show_border = ( $et_show_border ) ? $classes[] = 'i-bordered' : '';
    	$show_et_border_rounded = ( $show_et_border_rounded ) ? $classes[] ='i-rounded' : '';
    	$et_plain = ( $et_plain ) ? $classes[] = 'i-plain' : '';
    	$circled = ( $circled ) ? $classes[] = 'i-circled' : '';
    	$brando_et_icon_box_decoration = ( $brando_et_icon_box_decoration ) ? $classes[] = $brando_et_icon_box_decoration : '';
    	$brando_et_icon_box_background_color = ( $brando_et_icon_box_background_color ) ? $classes[] = $brando_et_icon_box_background_color : '';

        // custom icon image
        $brando_custom_etline_image_srcset = ($brando_custom_etline_image_srcset) ? $brando_custom_etline_image_srcset : 'full';
        $custom_etline_image = wp_get_attachment_image_src( $etline_custom_icon_image, $brando_custom_etline_image_srcset );
        $srcset_icon_etline = $srcset_data_icon_etline = '';
        $srcset_icon_etline = wp_get_attachment_image_srcset( $etline_custom_icon_image, $brando_custom_etline_image_srcset );
        if( $srcset_icon_etline ){
            $srcset_data_icon_etline = ' srcset="'.esc_attr( $srcset_icon_etline ).'"';
        }

        $sizes_icon_etline = $sizes_data_icon_etline = '';
        $sizes_icon_etline = wp_get_attachment_image_sizes( $etline_custom_icon_image, $brando_custom_etline_image_srcset );
        if( $sizes_icon_etline ){
            $sizes_data_icon_etline = ' sizes="'.esc_attr( $sizes_icon_etline ).'"';
        }

        $img_alt_etline = brando_option_image_alt($etline_custom_icon_image);
        $img_title_etline = brando_option_image_title($etline_custom_icon_image);
        $image_alt_etline = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ;
        $image_title_etline = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

        // custom icon image
        $brando_custom_image_srcset = ($brando_custom_image_srcset) ? $brando_custom_image_srcset : 'full';
        $custom_image = wp_get_attachment_image_src($font_awesome_custom_icon_image, $brando_custom_image_srcset);
        $srcset_icon = $srcset_data_icon = '';
        $srcset_icon = wp_get_attachment_image_srcset( $font_awesome_custom_icon_image, $brando_custom_image_srcset );
        if( $srcset_icon ){
            $srcset_data_icon = ' srcset="'.esc_attr( $srcset_icon ).'"';
        }

        $sizes_icon = $sizes_data_icon = '';
        $sizes_icon = wp_get_attachment_image_sizes( $font_awesome_custom_icon_image, $brando_custom_image_srcset );
        if( $sizes_icon ){
            $sizes_data_icon = ' sizes="'.esc_attr( $sizes_icon ).'"';
        }

        $img_alt_font_awesome = brando_option_image_alt($font_awesome_custom_icon_image);
        $img_title_font_awesome = brando_option_image_title($font_awesome_custom_icon_image);
        $image_alt_font_awesome = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ;
        $image_title_font_awesome = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';
        // ET-Line
        switch ($brando_et_icon_premade_style){
          
            case 'et-line-icons-1':
            case 'et-line-icons-2':
            case 'et-line-icons-3':
            case 'et-line-icons-4':
            case 'et-line-icons-5':
                $classes[]  = '';
            break;
            case 'et-line-icons-6':
                $classes[]  = 'i-background-box ';
            break;
            case 'et-line-icons-7':
            case 'et-line-icons-8':
            case 'et-line-icons-9':
            case 'et-line-icons-10':
            case 'et-line-icons-11':
                $classes[] = '';
            break;
            case 'et-line-icons-12':
                $classes[] = 'i-background-box ';
            break;
        }
        // Font-Awesome
        switch ($brando_font_icon_premade_style){
            case 'font-awesome-icons-1':
            case 'font-awesome-icons-2':
            case 'font-awesome-icons-3':
            case 'font-awesome-icons-4':
                $classes[] = '';
            break;
            case 'font-awesome-icons-5':
                $classes[] = 'i-background-box ';
            break;
        }
        // Check For Font Type
        $class_li = implode(" ", $classes);
        $class_list = ( $class_li ) ? ' class="'.$class_li.'"' : '';
        

    	switch ($brando_font_icon_type) 
        {
    		case 'brando_font_awesome_icons':
                if( $font_awesome_custom_icon == 1 && !empty( $custom_image ) ){
                        $output .= '<img src="'.$custom_image[0].'"'.$image_alt_font_awesome.$image_title_font_awesome.' class="icon-image '.$class_li.'" width="'.$custom_image[1].'" height="'.$custom_image[2].'"'.$srcset_data_icon.$sizes_data_icon.' '.$id.'/>';
                }elseif( $class_list ){
                    $output .= '<i'.$id.$class_list.'></i>';
                }
    		break;
    		case 'brando_et_line_icons':
                if( $etline_custom_icon == 1 && !empty( $etline_custom_icon_image ) ) {
                    $output .= '<img src="'.$custom_etline_image[0].'"'.$image_alt_etline.$image_title_etline.' class="icon-image '.$class_li.'" width="'.$custom_etline_image[1].'" height="'.$custom_etline_image[2].'"'.$srcset_data_icon_etline.$sizes_data_icon_etline.' '.$id.' />';
                }elseif( $class_list ){
                    $output .= '<i'.$id.$class_list.'></i>';
                }
    		break;
    	}
        return $output;
    }
}
?>