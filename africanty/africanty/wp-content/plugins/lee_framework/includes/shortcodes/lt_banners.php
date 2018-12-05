<?php
add_shortcode('berybanner', 'lt_sc_banners');
function lt_sc_banners($atts, $content) {
    global $lt_opt;
    
    $dfAttr = array(
        'align'  => 'left',
        'valign'  => 'top',
        'move_x' => '',
        'link'  => '',
        'hover'  => '',
        'content'  => '',  
        'font_style'  => '',  
        'banner_style'  => '',  
        'img' => '',
        'img_src' => '',
        'height' => '',
        'text_color' => 'light',
        'text-align' => '',
        'content-width' => '', 
        'effect_text' => '',
        'data_delay' => '0ms',
        'seam_icon' => '',
        'el_class' => '',
        'is_ajax' => 'yes',
        'min_height' => 'auto'
    );
    $a = shortcode_atts($dfAttr, $atts);
    
    // Optimized speed
    if (!isset($lt_opt['enable_optimized_speed']) || $lt_opt['enable_optimized_speed'] == 1) {
        $atts['is_ajax'] = !isset($atts['is_ajax']) ? $a['is_ajax'] : $atts['is_ajax'];
        if (isset($atts['is_ajax']) && $atts['is_ajax'] == 'yes' &&
            (!isset($_POST['lt_load_ajax']) || $_POST['lt_load_ajax'] != '1')) {
            
            return lt_shortcode_text('berybanner', $atts, $content);
        }

        // Load ajax
        elseif($atts['is_ajax'] == 'yes' && $_POST['lt_load_ajax'] == '1') {
            $a = shortcode_atts($dfAttr, lt_shortcode_vars($atts));
            $content = str_replace(array('\\"', "\\'"), array('"', "'"), $content);
        }
    }

    $seam_icon = ($a['seam_icon'] != '') ? '<div class="seam_icon '.$a['seam_icon'].'"><span class="pe7-icon pe-7s-play"></span></div>' : '';
    
    $move_x = '';
    if ($a['move_x'] != ''){
        if ($a['align'] == 'left'){
            $move_x = ' left: '.$a['move_x'].';';
        }elseif($a['align'] == 'right'){
            $move_x = ' right: '.$a['move_x'].';';
        }
    }
    
    $a_class = '';
    $a_class .= ($a['align'] != '') ? ' align-'.$a['align'] : '';
    $a_class .= ($a['valign'] != '') ? ' valign-'.$a['valign'] : '';

    $onclick = '';
    if($a['link'] != '') {
        $a_class .= ' cursor-pointer';
        $onclick = ' onclick="window.location=\''.$a['link'].'\'"';
    }

    $src = ''; $image = '';
    if($a['img_src'] != '') {
        $image = wp_get_attachment_image_src($a['img_src'],'full');
        $src = $image[0];
    }
    
    $height         = ($a['height'] != '')          ? 'height: '.$a['height'].';'       : 'height: 200px;';
    $text_color     = ($a['text_color'] != '')      ? ' ' . $a['text_color']            : '';
    $text_align     = ($a['text-align'] != '')      ? ' ' . $a['text-align']            : '';
    $hover_effect   = ($a['hover'] != '')           ? ' hover-' . $a['hover']           : '';
    $content_width  = ($a['content-width'] != '')   ? 'width: '.$a['content-width'].';' : '';
    $effect_text    = ($a['effect_text'] != '')     ? $a['effect_text']                 : 'fadeIn';
    $data_delay     = ($a['data_delay'] != '')      ? $a['data_delay']                  : '';
    $el_class       = ($a['el_class'] != '')        ? ' ' . $a['el_class']              : '';
    
    $content = trim($content) ? 
    '<div class="row banner-content-warper"><div class="banner-content' . $a_class . $text_color . $text_align.'" style="' . $content_width . $move_x . '">
        <div class="banner-inner wow ' . $effect_text . '" data-animation="' . $effect_text . '">
            '.lt_fixShortcode($content).'
        </div>
    </div></div>' : '';
    
    $banner_bg = 'background-image: url('.$src.');';
    $banner_bg .= ($a['hover'] != 'carousel') ? ' background-position: center center;' : '';
    
    $bg_lax = '';
    if($a['hover'] == 'lax' || $a['hover'] == 'carousel'){
        $bg_lax = ' ' . $banner_bg;
        $banner_bg = '';
    }
    
    $fontstyle = $a['font_style'] ? ' banner-font-' . $a['font_style'] : '';
    
    return $seam_icon .
        '<div class="banner bery_banner' . $fontstyle . $hover_effect . $el_class.'" data-wow-delay="' . $data_delay . '"' . $onclick . ' style="' . $height . $bg_lax . '">' .
            '' .
            '<div class="banner-image" style="' . $banner_bg . '" data-height="' . $a['height'] . '"></div>' . $content .
        '</div>';
}