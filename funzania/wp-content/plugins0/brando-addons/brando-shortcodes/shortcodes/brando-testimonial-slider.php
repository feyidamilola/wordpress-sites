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

$brando_slider_parent_type = '';
function brando_testimonial_slider_shortcode( $atts, $content = null ) {
    extract( shortcode_atts( array(
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
                'brando_slider_id' => '',
                'brando_slider_class' => '',
                'brando_single_item' => '1',
                'brando_image_carousel_itemsdesktop' => '3',
                'brando_image_carousel_desktop_mini' => '3',
                'brando_image_carousel_itemstablet' => '3',
                'brando_image_carousel_itemsmobile' => '1',
                'brando_image_srcset' => 'full',
            ), $atts ) );

    $output  = $slider_config = $slider_class ='';
    global $brando_srcset;
    $brando_srcset = ($brando_image_srcset) ? $brando_image_srcset : 'full';
    $transition_style = ( $transition_style ) ? $transition_style : '';
    $pagination = ($show_pagination_style) ? brando_owl_pagination_slider_classes($show_pagination_style) : brando_owl_pagination_slider_classes('default');
	$pagination_style = ($show_pagination_color_style) ? brando_owl_pagination_color_classes($show_pagination_color_style) : brando_owl_pagination_color_classes('default');
    $navigation = ( $show_navigation_style ) ? brando_owl_navigation_slider_classes( $show_navigation_style) : brando_owl_navigation_slider_classes('default') ;
    $show_cursor_color_style = ( $show_cursor_color_style ) ? ' '.$show_cursor_color_style : ' cursor-black';

    // Check if slider id and class
    $brando_slider_id = ( $brando_slider_id ) ? $brando_slider_id : 'testimonial-slider';
    $brando_slider_class = ( $brando_slider_class ) ? $slider_class = ' '.$brando_slider_class : $slider_class = '';
    $brando_extra_class = ( $brando_single_item != 1 ) ? ' testimonial-slider-main' : '';
	$output .= '<div id="'.$brando_slider_id.'" class="owl-carousel owl-theme bottom-pagination '.$brando_slider_id.$slider_class.$pagination.$pagination_style.$navigation.$show_cursor_color_style.$brando_slider_class.$brando_extra_class.'">';
    	$output .= do_shortcode($content);
    $output .= '</div>';
        
    /* Add custom script Start*/
    $slidespeed = ( $slidespeed ) ? $slidespeed : '3000';
    ( $show_navigation == 1 ) ? $slider_config .= 'navigation: true,' : $slider_config .= 'navigation: false,';
	( $show_pagination == 1 ) ? $slider_config .= 'pagination: true,' : $slider_config .= 'pagination: false,';
	( $transition_style && $transition_style != 'slide') ? $slider_config .= 'transitionStyle: "'.$transition_style .'",' : '';
	( $autoplay == 1 ) ? $slider_config .= 'autoPlay: '.$slidespeed.',' : $slider_config .= 'autoPlay: false,';
	( $stoponhover == 1) ? $slider_config .= 'stopOnHover: true, ' : $slider_config .= 'stopOnHover: false, ';
    ( $brando_image_carousel_itemsdesktop ) ? $slider_config .= 'items: '.$brando_image_carousel_itemsdesktop.',' : $slider_config .= 'items: 3,';
    ( $brando_image_carousel_itemsdesktop ) ? $slider_config .= 'itemsDesktop: [1200,'.$brando_image_carousel_itemsdesktop.'],' : $slider_config .= 'itemsDesktop: [1200, 3],';
    ( $brando_image_carousel_desktop_mini ) ? $slider_config .= 'itemsDesktopSmall: [1199,'.$brando_image_carousel_desktop_mini.'],' : $slider_config .= 'itemsDesktopSmall: [1199, 3],';
    ( $brando_image_carousel_itemstablet ) ? $slider_config .= 'itemsTablet: [991,'.$brando_image_carousel_itemstablet.'],' : $slider_config .= 'itemsTablet: [991, 2],';
    ( $brando_image_carousel_itemsmobile ) ? $slider_config .= 'itemsMobile: [767,'.$brando_image_carousel_itemsmobile.'],' : $slider_config .= 'itemsMobile: [767, 1],';
    
	$slider_config .= ( $brando_single_item == 1 ) ? 'singleItem: true,' : '';
	$slider_config .= 'paginationSpeed: 400,';
	$slider_config .= 'navigationText: ["<i class=\'fa fa-angle-left\'></i>", "<i class=\'fa fa-angle-right\'></i>"]';
	ob_start();?>
    <script type="text/javascript">jQuery(document).ready(function () { jQuery("#<?php echo $brando_slider_id ?>").owlCarousel({ <?php echo $slider_config;?> }); });</script>
	<?php 
	$script = ob_get_contents();
	ob_end_clean();

	$output .= $script;
	/* Add custom script End*/
    return $output;
}
add_shortcode( 'brando_testimonial_slider', 'brando_testimonial_slider_shortcode' );
 
function brando_testimonial_slider_content_shortcode( $atts, $content = null) {
	global $brando_slider_parent_type;
    extract( shortcode_atts( array(
                'id' => '',
                'class' => '',
                'brando_image' => '',
                'brando_title' => '',
                'brando_title_color' => '',
                'show_separator' => '',
                'separator_color' => '',
                'separator_height' => '',
                'show_stars' => '',
                'no_of_stars' => '',
                'star_color' => '',
                'brando_icon_size' => '',
                'brando_token_class' => '',
                'brando_quote_icon_color' => '',
                'title_settings' => ''
            ), $atts ) );

    global $tz_featured_array, $brando_srcset, $font_settings_array;
    $output = $sep_style = $stars = $fontsettings_title_class = $fontsettings_title_id = $responsive_style ='';
    $style_array = array();
    $brando_token_class = $brando_token_class.$id;
    $id = ($id) ? ' id="'.$id.'"' : '';
    $class = ( $class ) ? ' class="'.$class.'"' : '';
    $brando_title = ( $brando_title ) ? $brando_title : '';
    /* Image Alt, Title, Caption */
    $img_alt = brando_option_image_alt($brando_image);
    $img_title = brando_option_image_title($brando_image);
    $image_alt = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
    $image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

    // Custom css
    ( $brando_quote_icon_color ) ? $tz_featured_array[] = '.'.$brando_token_class.' > div::after{ color:'.$brando_quote_icon_color.';}' : '';
    
    $thumb = wp_get_attachment_image_src($brando_image, $brando_srcset);
    $srcset_icon = $srcset_data_icon = '';
    $srcset_icon = wp_get_attachment_image_srcset( $brando_image, $brando_srcset );
    if( $srcset_icon ){
        $srcset_data_icon = ' srcset="'.esc_attr( $srcset_icon ).'"';
    }

    $sizes_icon = $sizes_data_icon = '';
    $sizes_icon = wp_get_attachment_image_sizes( $brando_image, $brando_srcset );
    if( $sizes_icon ){
        $sizes_data_icon = ' sizes="'.esc_attr( $sizes_icon ).'"';
    }

    $brando_icon_size = ( $brando_icon_size ) ? ' '.$brando_icon_size : '';
    $separator_color = ( $separator_color ) ? $style_array[] = 'background:'.$separator_color.' !important;': '';
    $separator_height = ( $separator_height ) ? $style_array[] = 'height:'.$separator_height.' !important;': '';
    $style_property_list = implode(" ", $style_array);
    $sep_style = ( $style_property_list ) ? ' style="'.$style_property_list.'"' : '';
    $brando_title_color = ( $brando_title_color ) ? ' style="color:'.$brando_title_color.' !important;"' : '';
    $star_color = ( $star_color ) ? ' style="color:'.$star_color.' !important;"' : '';

    //Font Settings For Title
    
    if( !empty( $title_settings ) ) {
        $fontsettings_title_id = uniqid('brando-font-setting-');
        $responsive_style = brando_Responsive_font_settings::generate_css( $title_settings, $fontsettings_title_id );
        $fontsettings_title_class = ' '.$fontsettings_title_id;
    }
    ( !empty( $responsive_style ) ) ? $font_settings_array[] = $responsive_style : '';
    
    $output .= '<div class="item">';
        if( $id || $class ):
            $output .= '<div'.$id.$class.'>';
        endif;
            $output .= '<div class="col-lg-9 col-md-11 col-sm-9 col-xs-10 center-col margin-lr-auto testimonial-style2">';
                if( $thumb[0] ){
                    $output .= '<div class="col-md-5 col-sm-12 col-xs-12 testimonial-style2-img sm-text-center sm-margin-three-bottom '.$brando_token_class.'">';
                        $output .= '<div><img src="'.$thumb[0].'"'.$image_alt.$image_title.' width="'.$thumb[1].'" height="'.$thumb[2].'"'.$srcset_data_icon.$sizes_data_icon.'/></div>';
                    $output .= '</div>';
                }
                $output .= '<div class="col-md-7 col-sm-12 col-xs-12 sm-text-center xs-no-padding-lr">';
                    if($show_stars == 1)
                    {
                        for($i=1; $i <= $no_of_stars; $i++)
                        {
                            $stars.='<i class="fa fa-star'.$brando_icon_size.'"'.$star_color.'></i>';
                        }
                        if($stars):
                            $output .= '<div>';
                                $output .= $stars;
                            $output .='</div>';
                        endif;
                    }
                    if( $brando_title ){
                        $output .= '<span class="margin-four-tb name alt-font font-weight-600'.$fontsettings_title_class.'"'.$brando_title_color.'>'.$brando_title.'</span>';
                    }
                    if( $content ){
                        $output .= do_shortcode( brando_remove_wpautop($content) );
                    }
                    if( $show_separator == 1 ){
                        $output .= '<div class="separator-line-thick bg-deep-yellow no-margin-lr sm-margin-lr-auto"'.$sep_style.'></div>';
                    }
                $output .= '</div>';
            $output .= '</div>';
        if( $id || $class ):
            $output .= '</div>';
        endif;
    $output .= '</div>';

    return $output;
}
add_shortcode( 'brando_testimonial_slider_content', 'brando_testimonial_slider_content_shortcode' );
?>