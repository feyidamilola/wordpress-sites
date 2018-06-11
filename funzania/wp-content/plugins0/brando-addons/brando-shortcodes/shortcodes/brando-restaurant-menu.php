<?php
/**
 * Shortcode For Restaurant Menu
 *
 * @package Brando
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Restaurant Menu */
/*-----------------------------------------------------------------------------------*/

function brando_restaurant_menu_shortcode( $atts, $content = null ) 
{
    extract( shortcode_atts( array(
                'id' => '',
                'class' => '',
                'brando_menu_bg_image' => '',
                'brando_menuitem_bg_image' => '',
                'brando_menu_image' => '',
                'brando_title' => '',
                'brando_subtitle' => '',
                'brando_menu_sep_image' => '',
                'brando_title_color' => '',
                'brando_subtitle_color' => '',
                'brando_menu_border_color' => '',
                'brando_image_srcset' => 'full',
                'brando_menu_image_srcset' => 'full',
                'title_settings' => '',
                'subtitle_settings' => ''
            ), $atts ) );
    global $font_settings_array;
    $output = $bg_image = $menuitem_bg_image = '';
    $id = ($id) ? ' id='.$id : '';
    $class = ($class) ? ' '.$class : '';
    /* Image Alt, Title, Caption */
    $img_alt = brando_option_image_alt($brando_menu_image);
    $img_title = brando_option_image_title($brando_menu_image);
    $image_alt = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
    $image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

    /* Image Alt, Title, Caption For Separator Image */
    $img_alt_sep = brando_option_image_alt($brando_menu_sep_image);
    $img_title_sep = brando_option_image_title($brando_menu_sep_image);
    $image_alt_sep = ( isset($img_alt_sep['alt']) && !empty($img_alt_sep['alt']) ) ? ' alt="'.$img_alt_sep['alt'].'"' : ' alt=""' ; 
    $image_title_sep = ( isset($img_title_sep['title']) && !empty($img_title_sep['title']) ) ? ' title="'.$img_title_sep['title'].'"' : '';

    $brando_bg_image = ( $brando_menu_bg_image ) ? wp_get_attachment_image_src($brando_menu_bg_image, $brando_image_srcset) : '';
    $brando_menuitem_bg_image = ( $brando_menuitem_bg_image ) ? wp_get_attachment_image_src($brando_menuitem_bg_image, 'full') : '';

    $brando_menu_image_srcset = ($brando_menu_image_srcset) ? $brando_menu_image_srcset : 'full';
    $srcset_icon = $srcset_data_icon = '';
    $srcset_icon = wp_get_attachment_image_srcset( $brando_menu_image, $brando_menu_image_srcset );
    if( $srcset_icon ){
        $srcset_data_icon = ' srcset="'.esc_attr( $srcset_icon ).'"';
    }
    $sizes_icon = $sizes_data_icon = '';
    $sizes_icon = wp_get_attachment_image_sizes( $brando_menu_image, $brando_menu_image_srcset );
    if( $sizes_icon ){
        $sizes_data_icon = ' sizes="'.esc_attr( $sizes_icon ).'"';
    }
    $brando_menu_image = ( $brando_menu_image ) ? wp_get_attachment_image_src($brando_menu_image, $brando_menu_image_srcset) : '';
    
    $brando_menu_sep_image = ( $brando_menu_sep_image ) ? wp_get_attachment_image_src($brando_menu_sep_image, 'full') : '';
    $brando_title_color = ( $brando_title_color ) ? ' style="color:'.$brando_title_color.' !important;"' : '';
    $brando_subtitle_color = ( $brando_subtitle_color ) ? ' style="color:'.$brando_subtitle_color.' !important;"' : '';
    $brando_menu_border_color = ( $brando_menu_border_color ) ? ' style="border-color:'.$brando_menu_border_color.' !important;"' : '';
    $brando_image_srcset = ($brando_image_srcset) ? $brando_image_srcset : 'full';
    $srcset = $srcset_data = $classes = '';
    if( isset($brando_bg_image[0]) )
    {
        $srcset = wp_get_attachment_image_srcset( $brando_menu_bg_image, $brando_image_srcset );
        if( $srcset ){
            $srcset_data = ' data-bg-srcset="'.esc_attr( $srcset ).'"';
            $classes = ' bg-image-srcset';
        }
        $bg_image .= ' style="background-image: url('.$brando_bg_image[0].');"';
    }
    if( isset($brando_menuitem_bg_image[0]) )
    {
        $menuitem_bg_image .= ' style="background-image: url('.$brando_menuitem_bg_image[0].');"';
    }

    //Font Settings For Title
    $fontsettings_title_class = $fontsettings_title_id = $responsive_style = '';
    if( !empty( $title_settings ) ) {
        $fontsettings_title_id = uniqid('brando-font-setting-');
        $responsive_style = brando_Responsive_font_settings::generate_css( $title_settings, $fontsettings_title_id );
        $fontsettings_title_class = ' '.$fontsettings_title_id;
    }
    ( !empty( $responsive_style ) ) ? $font_settings_array[] = $responsive_style : '';

    //Font Settings For Title
    $fontsettings_subtitle_class = $fontsettings_subtitle_id = $responsive_style_subtitle = '';
    if( !empty( $subtitle_settings ) ) {
        $fontsettings_subtitle_id = uniqid('brando-font-setting-');
        $responsive_style_subtitle = brando_Responsive_font_settings::generate_css( $subtitle_settings, $fontsettings_subtitle_id );
        $fontsettings_subtitle_class = ' '.$fontsettings_subtitle_id;
    }
    ( !empty( $responsive_style_subtitle ) ) ? $font_settings_array[] = $responsive_style_subtitle : '';

        $output .= '<div'.$id.' class="restaurant-menu'.$class.'">';
            $output .= '<div class="restaurant-menu-image cover-background'.$classes.'"'.$bg_image.$srcset_data.'>';
                $output .= '<div class="restaurant-menu-item z-index-1">';
                    if( isset($brando_menu_image[0]) ){
                        $output .= '<img src="'.$brando_menu_image[0].'"'.$image_alt.$image_title.' width="'.$brando_menu_image[1].'" height="'.$brando_menu_image[2].'"'.$srcset_data_icon.$sizes_data_icon.'/>';
                    }
                    if( $brando_title ){
                        $output .= '<span class="title-small alt-font deep-yellow-text font-weight-600 text-uppercase display-block margin-three-top'.$fontsettings_title_class.'"'.$brando_title_color.'>'.$brando_title.'</span>';
                    }
                    if( $brando_subtitle ){
                        $output .= '<span class="text-small letter-spacing-1 text-uppercase'.$fontsettings_subtitle_class.'"'.$brando_subtitle_color.'>'.$brando_subtitle.'</span>';
                    }
                    if( isset($brando_menu_sep_image[0]) ){
                        $output .= '<div class="margin-three-tb"><img src="'.$brando_menu_sep_image[0].'"'.$image_alt_sep.$image_title_sep.'/></div>';
                    }
                $output .= '</div>';
                $output .= '<div class="restaurant-menu-background"><div class="restaurant-menu-border z-index-2"></div></div>';
            $output .= '</div>';

            $output .= '<div class="restaurant-menu-text"'.$brando_menu_border_color.'>';
                $output .= '<div class="restaurant-menu-text-inner padding-seven-all sm-padding-five-all"'.$menuitem_bg_image.'>';
                    $output .= do_shortcode($content);
                $output .= '</div>';
            $output .= '</div>';
        $output .= '</div>';
    return $output;
}
add_shortcode( 'brando_restaurant_menu', 'brando_restaurant_menu_shortcode' );
 
function brando_restaurant_menu_content_shortcode( $atts, $content = null) 
{
	global $brando_slider_parent_type, $font_settings_array;
    extract( shortcode_atts( array(
                'brando_menuitem_image' => '',
                'brando_menuitem_title' => '',
                'brando_menuitem_title_color' => '',
                'title_settings' => '',
            ), $atts ) );
    $output = '';
    /* Image Alt, Title, Caption */
    $img_alt = brando_option_image_alt($brando_menuitem_image);
    $img_title = brando_option_image_title($brando_menuitem_image);
    $image_alt = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
    $image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';
    
    $brando_menuitem_image = ( $brando_menuitem_image ) ? wp_get_attachment_image_src($brando_menuitem_image, 'full') : '';
    $brando_menuitem_title = ( $brando_menuitem_title ) ? $brando_menuitem_title : '';
    $brando_menuitem_title_color = ( $brando_menuitem_title_color ) ? ' style="color:'.$brando_menuitem_title_color.' !important;"' : '';

    //Font Settings For Title
    $fontsettings_title_class = $fontsettings_title_id = $responsive_style = '';
    if( !empty( $title_settings ) ) {
        $fontsettings_title_id = uniqid('brando-font-setting-');
        $responsive_style = brando_Responsive_font_settings::generate_css( $title_settings, $fontsettings_title_id );
        $fontsettings_title_class = ' '.$fontsettings_title_id;
    }
    ( !empty( $responsive_style ) ) ? $font_settings_array[] = $responsive_style : '';

        $output .= '<div class="menu-item">';
        if( isset($brando_menuitem_image[0]) )
        {
            $output .= '<div class="col-md-3 col-sm-2 col-xs-3 menu-img sm-display-block">';
                $output .= '<img src="'.$brando_menuitem_image[0].'"'.$image_alt.$image_title.' class="round-border"/>';
            $output .= '</div>';
        }
            $output .= '<div class="col-md-8 col-sm-8 col-xs-7 col-xs-8 menu-text sm-width-80 xs-width-70">';
                $output .= '<div class="menu-text-sub">';
                    if( $brando_menuitem_title ){
                        $output .= '<span class="text-uppercase brown-text letter-spacing-1 display-block font-weight-600 md-padding-one-top'.$fontsettings_title_class.'"'.$brando_menuitem_title_color.'>'.$brando_menuitem_title.'</span>';
                    }
                    if( $content ){
                        $output .= do_shortcode( brando_remove_wpautop($content) );
                    }
                $output .= '</div>';
            $output .= '</div>';
        $output .= '</div>';
    return $output;
}
add_shortcode( 'brando_restaurant_menu_content', 'brando_restaurant_menu_content_shortcode' );
?>