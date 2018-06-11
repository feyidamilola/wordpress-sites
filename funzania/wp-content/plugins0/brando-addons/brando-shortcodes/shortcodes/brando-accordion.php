<?php
/**
 * Shortcode For Accordian
 *
 * @package Brando
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Accordian */
/*-----------------------------------------------------------------------------------*/

$global_accordian_id = $i = $pre_define_style =''; 
function brando_accordian_shortcode( $atts, $content = null ) {
    extract( shortcode_atts( array(
                'accordian_pre_define_style' => '',
                'accordian_id' => '',
                'without_border' => '',
            ), $atts ) );
    global $global_accordian_id,$i,$pre_define_style;
    $output = '';

    $accordian_id = ($accordian_id) ? $accordian_id : '';
    $global_accordian_id = $accordian_id;
    $ac_id = ($accordian_pre_define_style == 'accordion-style3' || $accordian_pre_define_style == 'accordion-style2' || $accordian_pre_define_style == 'accordion-style1') ? 'id="'.$accordian_id.'"' : '';
    $without_border = ($without_border == 1) ? ' no-border' : '';
    $extra_class_style3 = ( $accordian_pre_define_style == 'accordion-style3' ) ? ' about-tab-right' : '';

    switch ($accordian_pre_define_style) {
        case 'accordion-style1':
            $pre_define_style = 'accordion-style3';
        break;
        case 'accordion-style2':
            $pre_define_style = 'accordion-style2';
        break;
        case 'accordion-style3':
            $pre_define_style = 'accordion-style1';
        break;
        case 'toggles-style1':
            $pre_define_style = $accordian_pre_define_style;
        break;
        case 'toggles-style2':
            $pre_define_style = $accordian_pre_define_style;
        break;
        
    }
    $i .= 1;
    $output .='<div class="panel-group '.$pre_define_style.$without_border.$extra_class_style3.'" '.$ac_id.' >';
        $output .= do_shortcode( $content );
    $output .='</div>';

    return $output;
}
add_shortcode( 'brando_accordian', 'brando_accordian_shortcode' );


function brando_accordian_content_shortcode( $atts, $content = null ) {
    extract( shortcode_atts( array(
                'accordian_active' => '',
                'accordian_title_icon' => '',
                'accordian_title' => '',
                'accordian_bg_image' => '',
                'brando_icon_color' => '',
                'brando_title_color' => '',
                'etline_custom_icon' => '',
                'etline_custom_icon_image' => '',
                'brando_image_srcset' => 'full',
                'brando_custom_image_srcset' => 'full',
                'title_settings' => ''
            ), $atts,'brando_accordian' ) );
    global $global_accordian_id,$i,$pre_define_style,$font_settings_array;

    $output = $active = $icon_class = $class = $fontsettings_title_class = $fontsettings_title_id = $responsive_style = '';
    $brando_image_srcset = ($brando_image_srcset) ? $brando_image_srcset : 'full';
    $thumb = wp_get_attachment_image_src($accordian_bg_image, $brando_image_srcset);

    //Font Settings For Title
    if( !empty( $title_settings ) ) {
        $fontsettings_title_id = uniqid('brando-font-setting-');
        $responsive_style = brando_Responsive_font_settings::generate_css( $title_settings, $fontsettings_title_id );
        $fontsettings_title_class = ' '.$fontsettings_title_id;
    }
    ( !empty( $responsive_style ) ) ? $font_settings_array[] = $responsive_style : '';

    // custom icon image
    $brando_custom_image_srcset = ($brando_custom_image_srcset) ? $brando_custom_image_srcset : 'full';
    $custom_icon_image = wp_get_attachment_image_src($etline_custom_icon_image, $brando_custom_image_srcset);
    $srcset_icon = $srcset_data_icon = $sizes_icon = $sizes_data_icon = '';
    $srcset_icon = wp_get_attachment_image_srcset( $etline_custom_icon_image, $brando_custom_image_srcset );
    if( $srcset_icon ){
        $srcset_data_icon = ' srcset="'.esc_attr( $srcset_icon ).'"';
    }

    $sizes_icon = wp_get_attachment_image_sizes( get_post_thumbnail_id(get_the_ID()), $brando_image_srcset );
    if( $sizes_icon ){
        $sizes_data_icon = ' sizes="'.esc_attr( $sizes_icon ).'"';
    }

    $brando_icon_color = ( $brando_icon_color ) ? ' style="color:'.$brando_icon_color.' !important"' : '';
    $brando_title_color = ( $brando_title_color ) ? ' style="color:'.$brando_title_color.' !important"' : '';
    if( $etline_custom_icon == 1 && !empty( $etline_custom_icon_image ) ) {
        $accordian_icon = '<img src="'.$custom_icon_image[0].'" alt="" class="icon-image vertical-align-middle" width="'.$custom_icon_image[1].'" height="'.$custom_icon_image[2].'"'.$srcset_data_icon.$sizes_data_icon.'/>';
    }else{
        $accordian_icon = ( $accordian_title_icon ) ? '<i class="'.$accordian_title_icon.' icon-small vertical-align-middle"'.$brando_icon_color.'></i> ' : '';
    }
    /* Image Alt, Title, Caption */
    $img_alt = brando_option_image_alt($accordian_bg_image);
    $img_title = brando_option_image_title($accordian_bg_image);
    $image_alt = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
    $image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';
    
    switch ($pre_define_style) {
        case 'accordion-style3':
            if($accordian_active=='1'){
                $active="active-accordion";
                $class="in";
                $icon_class="fa-minus";
            }
            else{
                $active=$class='';
                $icon_class="fa-plus";
            }
        break;

        case 'accordion-style1':
            if($accordian_active=='1'){
                $active="active-accordion";
                $class="in";
                $icon_class="fa-minus";
            }
            else{
                $active=$class='';
                $icon_class="fa-plus";
            }
        break;

        case 'accordion-style2':
             if($accordian_active=='1'){
                $active="active-accordion";
                $class="in";
                $icon_class="fa-angle-up";
            }
            else{
                $active=$class='';
                $icon_class="fa-angle-down";
            }
        break;

        case 'toggles-style1':
             if($accordian_active=='1'){
                $active="active-accordion";
                $class="in";
                $icon_class="fa-minus";
            }
            else{
                $active=$class='';
                $icon_class="fa-plus";
            }
        break;

        case 'toggles-style2':
             if($accordian_active=='1'){
                $active="active-accordion";
                $class="in";
                $icon_class="fa-angle-up";
            }
            else{
                $active=$class='';
                $icon_class="fa-angle-down";
            }
        break;

        case 'toggles-style3':
             if($accordian_active=='1'){
                $active="active-accordion";
                $class="in";
                $icon_class="fa-minus";
            }
            else{
                $active=$class='';
                $icon_class="fa-plus";
            }
        break;
    } 
    
    $srcset = $srcset_data = $sizes = $sizes_data = '';
    $srcset = wp_get_attachment_image_srcset( $accordian_bg_image, $brando_image_srcset );
    if( $srcset ){
        $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
    }

    $sizes = wp_get_attachment_image_sizes( get_post_thumbnail_id(get_the_ID()), $brando_image_srcset );
    if( $sizes ){
        $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
    }

    $output .='<div class="panel panel-default no-margin">';
        $output .='<div class="panel-heading '.$active.'">';
            $output .='<a data-toggle="collapse" data-parent="#'.$global_accordian_id.'" href="#accordion-one-link-'.$i.'">';
                $output .='<h4 class="panel-title'.$fontsettings_title_class.'"'.$brando_title_color.'>';
                    $output .= $accordian_icon.$accordian_title;
                    $output .='<span class="pull-right">';
                         $output .='<i class="fa '.$icon_class.'"></i>';
                    $output .='</span>';
                $output .='</h4>';
            $output .='</a>';
        $output .='</div>';
        $output .='<div id="accordion-one-link-'.$i.'" class="panel-collapse collapse '.$class.'">';
            $output .='<div class="panel-body no-border margin-four-tb padding-two-all no-padding-lr md-margin-one-tb">';
                if($thumb[0]):
                    $output .='<div class="col-md-3 col-sm-3 col-xs-5 travel-about-img xs-text-center xs-margin-five-bottom">';
                         $output .='<img src="'.$thumb[0].'"'.$image_alt.$image_title.' class="round-border" width="'.$thumb[1].'" height="'.$thumb[2].'"'.$srcset_data.$sizes_data.'/>';
                    $output .='</div>';
                    $output .='<div class="col-md-9 col-sm-9 col-xs-12">';
                        if( $content ):
                            $output .= do_shortcode( brando_remove_wpautop($content) );
                        endif;
                    $output .='</div>';
                else:
                    $output .= do_shortcode( $content );
                endif;
            $output .='</div>';
        $output .='</div>';
    $output .='</div>';
    $i++;
    
    return $output;
}
add_shortcode('brando_accordian_content', 'brando_accordian_content_shortcode');
?>
