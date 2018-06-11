<?php
/**
 * Shortcode For Portfolio
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Portfolio */
/*-----------------------------------------------------------------------------------*/
$brando_all_categories_filter = '';
$brando_portfolio_unique_id = 1;
if ( ! function_exists( 'brando_portfolio_shortcode' ) ) {
    function brando_portfolio_shortcode( $atts, $content = null ) {

        global $brando_portfolio_unique_id;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'brando_portfolio_style' => '',
            'brando_portfolio_columns' =>'',
            'brando_post_per_page' => '15',
            'orderby' => 'date',
            'order' => 'ASC',
            'brando_categories_list' => '',
            'brando_enable_lightbox' => '',
            'brando_show_separator' => '',
            'brando_sep_color' => '',
            'separator_height' => '',
            'brando_animation_style' => '',
            'padding_setting' => '',
            'desktop_padding' => '',
            'custom_desktop_padding' => '',
            'desktop_mini_padding' => '',
            'custom_mini_desktop_padding' => '',
            'ipad_padding' => '',
            'custom_ipad_padding' => '',
            'mobile_padding' => '',
            'custom_mobile_padding' => '',
            'margin_setting' => '',
            'desktop_margin' => '',
            'custom_desktop_margin' => '',
            'desktop_mini_margin' => '',
            'custom_mini_desktop_margin' => '',
            'ipad_margin' => '',
            'custom_ipad_margin' => '',
            'mobile_margin' => '',
            'custom_mobile_margin' => '',
            'brando_show_button' => '',
            'button_text' => '',
            'brando_title_color' => '',
            'brando_subtitle_color' => '',
            'brando_border_color' => '',
            'brando_hover_background_color' => '',
            'brando_show_title' => '',
            'brando_show_subtitle' => '',
            'brando_portfolio_type' => '',
            'brando_token_class' => '',
            'brando_button_bg_color' => '',
            'brando_button_text_color' => '',
            'brando_separator_color' => '',
            'brando_portfolio_separator_color' => '',
            'brando_image_srcset' => 'full',
            'brando_show_load_more_button' => '',
            'load_more_button_text' => 'Load More',
            'brando_padding_token_class' => '',
            'brando_opacity' => '',
        ), $atts ) );

        global $tz_featured_array, $tz_featured_mini_desktop_array, $tz_featured_ipad_array, $tz_featured_mobile_array, $brando_all_categories_filter; 
        $icon = $output = $container_class = $no_padding = $style_attr = $style = $classes = $separator = $portfolio_columns = $filter_style = $portfolio_classes = $portfolio_id = $hcode_portfolio_classes_infinite_scroll = '';
        $classes = array();
        $portfolio_id = $id;
        $brando_token_class = $brando_token_class.$id;
        $id = ( $id ) ? ' id="'.$id.'"' : '';
        $class = ( $class ) ? ' '.$class : '';

        // Check if portfolio id and class
        $brando_portfolio_unique_id  = !empty( $brando_portfolio_unique_id ) ? $brando_portfolio_unique_id : 1;
        $brando_portfolio_id  = 'brando-portfolio-' . $brando_portfolio_unique_id;
        $brando_portfolio_unique_id++;

        $classes[] = $brando_padding_token_class;
        $brando_post_per_page = ($brando_post_per_page) ? $brando_post_per_page : '-1';
        $orderby = ($orderby) ? $orderby : '"date"';
        $order = ($order) ? $order : 'ASC';
        $enable_lightbox = ($brando_enable_lightbox == 1) ? 'lightbox-gallery' : '';
        $brando_animation_style = ( $brando_animation_style ) ? $classes[] = 'wow '.$brando_animation_style : '';
        $button_text = ($button_text) ? $button_text : '';
        $brando_portfolio_columns = ($brando_portfolio_columns) ? $brando_portfolio_columns : '';
        $brando_title_color = ($brando_title_color) ? ' style="color:'.$brando_title_color.' !important;"' : '';
        $brando_subtitle_color = ($brando_subtitle_color) ? ' style="color:'.$brando_subtitle_color.' !important;"' : '';
        $brando_border_color = ($brando_border_color) ? ' style="border-color:'.$brando_border_color.' !important;"' : '';
        $brando_show_title = ( $brando_show_title ) ? $brando_show_title : '';
        $brando_show_subtitle = ( $brando_show_subtitle ) ? $brando_show_subtitle : '';
        
        $brando_image_srcset = ($brando_image_srcset) ? $brando_image_srcset : 'full';
        $load_more_button_text = ( $load_more_button_text ) ? $load_more_button_text : '';
        // no image
        $brando_options = get_option( 'brando_theme_setting' );
        $brando_no_image = (isset($brando_options['brando_no_image']) && !empty($brando_options['brando_no_image'])) ? $brando_options['brando_no_image'] : '';

        // Custom colors
        $tz_featured_array[] = ( $brando_button_bg_color ) ? '.'.$brando_token_class.' .explore-now{ background:'.$brando_button_bg_color.';}' : '';
        $tz_featured_array[] = ( $brando_button_text_color ) ? '.grid-style3 .'.$brando_token_class.' .explore-now a{ color:'.$brando_button_text_color.';}' : '';
        $tz_featured_array[] = ( $brando_separator_color ) ? '.grid-style4 .'.$brando_token_class.' h3::after{ border-color:'.$brando_separator_color.';}' : '';
        $tz_featured_array[] = ( $brando_portfolio_separator_color ) ? '.grid-style6 .'.$brando_token_class.' h3::after{ border-color:'.$brando_portfolio_separator_color.';}' : '';
        $tz_featured_array[] = ( $brando_hover_background_color ) ? '.portfolio-style-2 .'.$brando_token_class.' figure:hover .gallery-img, .portfolio-style-3 .'.$brando_token_class.' figure:hover .gallery-img, .portfolio-style-4 .'.$brando_token_class.' figure:hover .gallery-img, .portfolio-style-6 .'.$brando_token_class.' figure:hover .gallery-img, .portfolio-style-7 .'.$brando_token_class.' figure:hover .gallery-img{ background:'.$brando_hover_background_color.';}' : '';
        $tz_featured_array[] = ( $brando_opacity ) ? '.'.$brando_token_class.' figure:hover .gallery-img img { opacity:'.$brando_opacity.';}' : '';

        $filter_class = $filter_class_style = '';

        $brando_sep_color = ( $brando_sep_color ) ? 'background:'.$brando_sep_color.' !important;': '';
        $separator_height = ( $separator_height ) ? 'height:'.$separator_height.' !important;': '';
        if($brando_sep_color || $separator_height){
            $separator = ' style="'.$brando_sep_color.$separator_height.'"';
        }

        $brando_portfolio_type = ( $brando_portfolio_type ) ? $classes[] = $brando_portfolio_type : '';

        // Section Padding Settings
        $padding_setting = ( $padding_setting ) ? $padding_setting : '';
        if( $padding_setting ){
            $desktop_padding_setting = ( $desktop_padding && $desktop_padding != 'custom-desktop-padding' ) ?  $classes[] = $desktop_padding : '';
            $desktop_mini_padding_setting = ( $desktop_mini_padding && $desktop_mini_padding != 'custom-mini-desktop-padding' ) ?  $classes[] = $desktop_mini_padding : '';
            $ipad_padding_setting = ( $ipad_padding && $ipad_padding != 'custom-ipad-padding' ) ? $classes[] = $ipad_padding : '';
            $mobile_padding_setting = ( $mobile_padding && $mobile_padding != 'custom-mobile-padding' ) ? $classes[] = $mobile_padding : '';
            $custom_desktop_padding = ( $custom_desktop_padding ) ? $custom_desktop_padding : '';
            $custom_ipad_padding = ( $custom_ipad_padding ) ? $custom_ipad_padding : '';
            $custom_mobile_padding = ( $custom_mobile_padding ) ? $custom_mobile_padding : '';
            $custom_mini_desktop_padding = ( $custom_mini_desktop_padding ) ? $custom_mini_desktop_padding : '';

            $tz_featured_array[] = ( $custom_desktop_padding && $desktop_padding == 'custom-desktop-padding' ) ? '.'.$brando_padding_token_class.'{ padding:'.$custom_desktop_padding.' !important; }' : '';
            ( $custom_mini_desktop_padding && $desktop_mini_padding == 'custom-mini-desktop-padding' ) ? $tz_featured_mini_desktop_array[] =  '.'.$brando_padding_token_class.'{ padding:'.$custom_mini_desktop_padding.' !important; }' : '';
            ( $custom_ipad_padding && $ipad_padding == 'custom-ipad-padding' ) ? $tz_featured_ipad_array[] = '.'.$brando_padding_token_class.'{ padding:'.$custom_ipad_padding.' !important;}' : '';
            ( $custom_mobile_padding && $mobile_padding == 'custom-mobile-padding' ) ? $tz_featured_mobile_array[] = '.'.$brando_padding_token_class.'{ padding:'.$custom_mobile_padding.' !important;}' : '';
        }

        // Section Margin Settings
        $margin_setting = ( $margin_setting ) ? $margin_setting : '';
        if( $margin_setting ){
            $desktop_margin_setting = ( $desktop_margin && $desktop_margin != 'custom-desktop-margin' ) ? $classes[] = $desktop_margin : '';
            $desktop_mini_margin_setting = ( $desktop_mini_margin && $desktop_mini_margin != 'custom-desktop-margin' ) ? $classes[] = $desktop_mini_margin : '';
            $ipad_margin_setting = ( $ipad_margin && $ipad_margin != 'custom-ipad-margin' ) ? $classes[] = $ipad_margin : '';
            $mobile_margin_setting = ( $mobile_margin && $mobile_margin != 'custom-mobile-margin' ) ? $classes[] = $mobile_margin : '';
            $custom_desktop_margin = ( $custom_desktop_margin ) ? $custom_desktop_margin : '';
            $custom_ipad_margin = ( $custom_ipad_margin ) ? $custom_ipad_margin : '';
            $custom_mobile_margin = ( $custom_mobile_margin ) ? $custom_mobile_margin : '';
            $custom_mini_desktop_margin = ( $custom_mini_desktop_margin ) ? $custom_mini_desktop_margin : '';

            $tz_featured_array[] = ( $custom_desktop_margin && $desktop_margin == 'custom-desktop-margin' ) ? '.'.$brando_padding_token_class.'{ margin:'.$custom_desktop_margin.' !important; }' : '';
            ( $custom_mini_desktop_margin && $desktop_mini_margin == 'custom-mini-desktop-margin' ) ? $tz_featured_mini_desktop_array[] =  '.'.$brando_padding_token_class.'{ margin:'.$custom_mini_desktop_margin.' !important; }' : '';
            ( $custom_ipad_margin && $ipad_margin == 'custom-ipad-margin' ) ? $tz_featured_ipad_array[] = '.'.$brando_padding_token_class.'{ margin:'.$custom_ipad_margin.' !important;}' : '';
            ( $custom_mobile_margin && $mobile_margin == 'custom-mobile-margin' ) ? $tz_featured_mobile_array[] = '.'.$brando_padding_token_class.'{ margin:'.$custom_mobile_margin.' !important;}' : '';
        }
        $classes[] = $brando_portfolio_style;
        if( $brando_show_load_more_button == 1 ) {
            $classes[] = ' infinite-scroll-pagination';
            $hcode_portfolio_classes_infinite_scroll = ' portfolio-single-post';
        }
        // Class List
        $class_list = implode(" ", $classes);
        $column_class = ( $class_list ) ? ' class="'.$class_list.'"' : '';
        
        $categories_to_display_ids = explode(",",$brando_categories_list);
        if ( is_array( $categories_to_display_ids ) && $categories_to_display_ids[0] == '0' ) {
            unset( $categories_to_display_ids[0] );
            $categories_to_display_ids = array_values( $categories_to_display_ids );
        }
        // If no categories are chosen or "All categories", we need to load all available categories
        if ( ! is_array( $categories_to_display_ids ) || count( $categories_to_display_ids ) == 0 ) {
            $terms = get_terms( 'portfolio-category' );
            
            if ( ! is_array( $categories_to_display_ids ) ) {
                $categories_to_display_ids = array();
            }
            foreach ( $terms as $term ) {
                $categories_to_display_ids[] = $term->slug;
            }
        }
        switch ($brando_portfolio_style) {
            case 'portfolio-style-2':
                $portfolio_classes .= ' work-with-title gutter transparent-figcaption';
            break;
        }
        $portfolio_columns = ( $brando_portfolio_columns ) ? 'work-'.$brando_portfolio_columns.'col' : '';
        if($brando_portfolio_columns || $id || $class):
            $output .='<div '.$id.' class="'.$portfolio_columns.$portfolio_classes.$class.'">';
        endif;
        if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }
        $args = array(
            'post_type' => 'portfolio',
            'posts_per_page' => $brando_post_per_page,
            'tax_query' => array(
                array(
                    'taxonomy' => 'portfolio-category',
                    'field' => 'slug',
                    'terms' => $categories_to_display_ids
               ),
            ),
            'paged' => $paged,  
            'orderby' => $orderby,
            'order' => $order,
        );
        $portfolio_posts = new WP_Query( $args );

        switch ($brando_portfolio_style) {
            case 'portfolio-style-1':
                $output .='<div class="grid-gallery grid-style1 overflow-hidden '.$class_list.'">';
                    $output .='<div class="tab-content">';
                        $output .='<ul class="masonry-items grid '.$enable_lightbox.' '.$brando_token_class.' '.$portfolio_id.' '.$brando_portfolio_id.'" data-portfolio="'.$portfolio_id.'" data-uniqueid="'.$brando_portfolio_id.'">';
                            
                            while ( $portfolio_posts->have_posts() ) : $portfolio_posts->the_post();
                            /* Image Alt, Title, Caption */
                            $img_alt = brando_option_image_alt(get_post_thumbnail_id());
                            $img_title = brando_option_image_title(get_post_thumbnail_id());
                            $image_alt = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                            $image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

                            $img_lightbox_title_gallery = brando_option_lightbox_image_title(get_post_thumbnail_id());
                            $img_lightbox_caption_gallery = brando_option_image_caption(get_post_thumbnail_id());
                            $image_lightbox_title = ( isset($img_lightbox_title_gallery['title']) && !empty($img_lightbox_title_gallery['title']) ) ? ' title="'.get_the_title().'"' : '' ;
                            $image_lightbox_caption = ( isset($img_lightbox_caption_gallery['caption']) && !empty($img_lightbox_caption_gallery['caption']) ) ? ' lightbox_caption="'.$img_lightbox_caption_gallery['caption'].'"' : '' ;

                                $cat_slug = '';
                                $cat = get_the_terms( get_the_ID(), 'portfolio-category' );
                                foreach ($cat as $key => $c) {
                                    if( $portfolio_id ){
                                        $cat_slug .= 'portfolio-filter-'.$c->term_id.'-'.$portfolio_id." ";
                                    }else{
                                        $cat_slug .= 'portfolio-filter-'.$c->term_id." ";
                                    }
                                }
                                $output .='<li class="'.$cat_slug.$hcode_portfolio_classes_infinite_scroll.'">';
                                    $output .='<figure>';
                                        $ajax_popup_class = '';
                                        $portfolio_subtitle = brando_post_meta('brando_subtitle');
                                        $portfolio_external_url = brando_post_meta('brando_external_url');
                                        $link_type = brando_post_meta('brando_enable_ajax_popup');
                                        if( $link_type == 1 ){
                                            $ajax_popup_class .= ' class="simple-ajax-popup-align-top"';
                                        }
                                        $full_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
                                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $brando_image_srcset );
                                        $url = $thumb['0'];
                                        $srcset = $srcset_data = '';
                                        $srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id(get_the_ID()), $brando_image_srcset );
                                        if( $srcset ){
                                            $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                                        }
                                        $sizes = $sizes_data = '';
                                        $sizes = wp_get_attachment_image_sizes( get_post_thumbnail_id(get_the_ID()), $brando_image_srcset );
                                        if( $sizes ){
                                            $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                                        }
                                        if($url):
                                            $output .= '<div class="gallery-img">';
                                                if($enable_lightbox == 'lightbox-gallery'):
                                                    $output .= '<a href="'.$full_url[0].'" '.$image_lightbox_title.$image_lightbox_caption.' class="lightboxgalleryitem" data-group="general">';
                                                elseif( $portfolio_external_url != '' ):
                                                    $output .= '<a href="'.$portfolio_external_url.'" title="'.get_the_title().'"'.$ajax_popup_class.'>';
                                                else:
                                                    $output .= '<a href="'.get_permalink().'"'.$ajax_popup_class.'>';
                                                endif;
                                                    $output .= '<img src="'.$url.'" width="'.$thumb[1].'" height="'.$thumb[2].'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'>';
                                                $output .= '</a>';
                                            $output .= '</div>';
                                        else : 
                                            if( isset($brando_no_image['url']) && !empty($brando_no_image['url']) ){
                                                $output .= '<div class="gallery-img">';
                                                    if($enable_lightbox == 'lightbox-gallery'):
                                                        $output .= '<a href="' . $brando_no_image['url'] . '" width="'.$brando_no_image['width'] .'" height="'.$brando_no_image['height'].'" class="lightboxgalleryitem" data-group="general">';
                                                    elseif( $portfolio_external_url != '' ):
                                                        $output .= '<a href="'.$portfolio_external_url.'" title="'.get_the_title().'"'.$ajax_popup_class.'>';
                                                    else:
                                                        $output .= '<a href="'.get_permalink().'"'.$ajax_popup_class.'>';
                                                    endif;
                                                        $output .= '<img src="' . $brando_no_image['url'] . '" width="'.$brando_no_image['width'] .'" height="'.$brando_no_image['height'].'" alt=""/>';
                                                    $output .= '</a>';
                                                $output .= '</div>';
                                            }
                                        endif;

                                        $output .='<figcaption>';
                                        if($brando_show_title == 1):
                                            if($enable_lightbox == 'lightbox-gallery'):
                                                $output .= '<h3 class="alt-font text-uppercase xs-no-padding-lr"><a href="javascript:void(0)" '.$image_lightbox_title.$image_lightbox_caption.' class="titlelightboxgallery" data-group="general"'.$brando_title_color.'>'.get_the_title().'</a></h3>';
                                            elseif( $portfolio_external_url != '' ):
                                                $output .= '<h3 class="alt-font text-uppercase xs-no-padding-lr"><a href="'.$portfolio_external_url.'"'.$ajax_popup_class.$brando_title_color.'>'.get_the_title().'</a></h3>';
                                            else:
                                                $output .= '<h3 class="alt-font text-uppercase xs-no-padding-lr"'.$brando_title_color.'><a href="'.get_permalink().'"'.$ajax_popup_class.$brando_title_color.'>'.get_the_title().'</a></h3>';
                                            endif;
                                        endif;
                                            $output .='<div class="grid-style1-border"'.$brando_border_color.'></div>';
                                        if( $brando_show_subtitle == 1 ):
                                            $output .= '<p'.$brando_subtitle_color.'>'.$portfolio_subtitle.'</p>';
                                        endif;
                                        $output .='</figcaption>';
                                                
                                    $output .='</figure>';
                                $output .='</li>';
                            endwhile;
                            wp_reset_postdata();
                        $output .='</ul>';
                        if( $portfolio_posts->max_num_pages > 1 && $brando_show_load_more_button == 1 && ( $brando_all_categories_filter == 1 || $brando_all_categories_filter == '')) {
                             $output .='<div class="pagination brando-infinite-scroll display-none" data-pagination="'.$portfolio_posts->max_num_pages.'">';
                                ob_start();
                                    if( get_next_posts_link( '', $portfolio_posts->max_num_pages ) ) :
                                        next_posts_link( '<span class="old-post">'.esc_html__( 'Older Post', 'brando-addons' ).'</span><i class="fa fa-long-arrow-right"></i>', $portfolio_posts->max_num_pages );
                                    endif;
                                $output .= ob_get_contents();  
                                ob_end_clean();  
                            $output .='</div>';
                         
                         $output .='<div class="post-listing text-center" id="hide-post-button"><button class="post-load margin-two-top highlight-button btn-small  button btn alt-font margin-top-55px xs-margin-top-30px" data-text="'.esc_html__( 'View More','brando-addons' ).'"><span>'.$load_more_button_text.'</span></button></div>';
                         }
                    $output .='</div>';
                $output .='</div>';
            break;

            case 'portfolio-style-2':
                $output .='<div class="grid-gallery grid-style3 overflow-hidden '.$class_list.'">';
                    $output .='<div class="tab-content">';
                        $output .='<ul class="masonry-items grid '.$enable_lightbox.' '.$brando_token_class.' '.$portfolio_id.' '.$brando_portfolio_id.'" data-portfolio="'.$portfolio_id.'" data-uniqueid="'.$brando_portfolio_id.'">';
                            
                            while ( $portfolio_posts->have_posts() ) : $portfolio_posts->the_post();
                            /* Image Alt, Title, Caption */
                            $img_alt = brando_option_image_alt(get_post_thumbnail_id());
                            $img_title = brando_option_image_title(get_post_thumbnail_id());
                            $image_alt = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                            $image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

                            $img_lightbox_title_gallery = brando_option_lightbox_image_title(get_post_thumbnail_id());
                            $img_lightbox_caption_gallery = brando_option_image_caption(get_post_thumbnail_id());
                            $image_lightbox_title = ( isset($img_lightbox_title_gallery['title']) && !empty($img_lightbox_title_gallery['title']) ) ? ' title="'.get_the_title().'"' : '' ;
                            $image_lightbox_caption = ( isset($img_lightbox_caption_gallery['caption']) && !empty($img_lightbox_caption_gallery['caption']) ) ? ' lightbox_caption="'.$img_lightbox_caption_gallery['caption'].'"' : '' ;

                                $cat_slug = '';
                                $cat = get_the_terms( get_the_ID(), 'portfolio-category' );
                                foreach ($cat as $key => $c) {
                                    if( $portfolio_id ){
                                        $cat_slug .= 'portfolio-filter-'.$c->term_id.'-'.$portfolio_id." ";
                                    }else{
                                        $cat_slug .= 'portfolio-filter-'.$c->term_id." ";
                                    }
                                }
                                $output .='<li class="'.$cat_slug.$hcode_portfolio_classes_infinite_scroll.'">';
                                    $output .='<figure>';
                                        $portfolio_subtitle = brando_post_meta('brando_subtitle');
                                        $portfolio_external_url = brando_post_meta('brando_external_url');
                                        $ajax_popup_class = '';
                                        $link_type = brando_post_meta('brando_enable_ajax_popup');
                                        if( $link_type == 1 ){
                                            $ajax_popup_class .= ' class="simple-ajax-popup-align-top"';
                                        }
                                        $full_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
                                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $brando_image_srcset );
                                        $url = $thumb['0'];
                                        $srcset = $srcset_data = '';
                                        $srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id(get_the_ID()), $brando_image_srcset );
                                        if( $srcset ){
                                            $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                                        }
                                        $sizes = $sizes_data = '';
                                        $sizes = wp_get_attachment_image_sizes( get_post_thumbnail_id(get_the_ID()), $brando_image_srcset );
                                        if( $sizes ){
                                            $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                                        }
                                        if($url):
                                            $output .= '<div class="gallery-img">';
                                                if($enable_lightbox == 'lightbox-gallery'):
                                                    $output .= '<a href="'.$full_url[0].'" '.$image_lightbox_title.$image_lightbox_caption.' class="lightboxgalleryitem" data-group="general">';
                                                elseif( $portfolio_external_url != '' ):
                                                        $output .= '<a href="'.$portfolio_external_url.'" title="'.get_the_title().'"'.$ajax_popup_class.'>';
                                                else:
                                                    $output .= '<a href="'.get_permalink().'"'.$ajax_popup_class.'>';
                                                endif;
                                                    $output .= '<img src="'.$url.'" width="'.$thumb[1].'" height="'.$thumb[2].'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'>';
                                                $output .= '</a>';
                                            $output .= '</div>';
                                        else : 
                                            if( isset($brando_no_image['url']) && !empty($brando_no_image['url']) ){
                                                $output .= '<div class="gallery-img">';
                                                    if($enable_lightbox == 'lightbox-gallery'):
                                                        $output .= '<a href="' . $brando_no_image['url'] . '" width="'.$brando_no_image['width'] .'" height="'.$brando_no_image['height'].'" class="lightboxgalleryitem" data-group="general">';
                                                    elseif( $portfolio_external_url != '' ):
                                                        $output .= '<a href="'.$portfolio_external_url.'" title="'.get_the_title().'"'.$ajax_popup_class.'>';
                                                    else:
                                                        $output .= '<a href="'.get_permalink().'"'.$ajax_popup_class.'>';
                                                    endif;
                                                        $output .= '<img src="' . $brando_no_image['url'] . '" width="'.$brando_no_image['width'] .'" height="'.$brando_no_image['height'].'" alt=""/>';
                                                    $output .= '</a>';
                                                $output .= '</div>';
                                            }
                                        endif;

                                        $output .='<figcaption>';
                                            if( $brando_show_title == 1 ):
                                                if($enable_lightbox == 'lightbox-gallery'){ 
                                                    $output .= '<a href="javascript:void(0)" '.$image_lightbox_title.$image_lightbox_caption.' class="titlelightboxgallery" data-group="general"><h3 class="text-large alt-font text-uppercase"'.$brando_title_color.'>'.get_the_title().'</h3></a>';
                                                }elseif ( $portfolio_external_url != '' ) {
                                                    $output .= '<a href="'.$portfolio_external_url.'" '.$ajax_popup_class.'><h3 class="text-large alt-font text-uppercase"'.$brando_title_color.'>'.get_the_title().'</h3></a>';
                                                }else{
                                                    $output .= '<a href="'.get_permalink().'" '.$ajax_popup_class.'><h3 class="text-large alt-font text-uppercase"'.$brando_title_color.'>'.get_the_title().'</h3></a>';
                                                }
                                            endif;
                                            if( $brando_show_subtitle == 1 ):
                                                $output .='<span class="text-small alt-font text-uppercase display-block light-gray-text"'.$brando_subtitle_color.'>'.$portfolio_subtitle.'</span>';
                                            endif;
                                            if($brando_show_button == 1):
                                                if($enable_lightbox == 'lightbox-gallery'){ 
                                                    $output .= '<div class="explore-now bg-deep-orange text-uppercase alt-font"><a href="javascript:void(0)" '.$image_lightbox_title.$image_lightbox_caption.' class="titlelightboxgallery" data-group="general">'.$button_text.'</a></div>';
                                                }elseif ( $portfolio_external_url != '' ) {
                                                    $output .= '<div class="explore-now bg-deep-orange text-uppercase alt-font"><a href="'.$portfolio_external_url.'" '.$ajax_popup_class.'>'.$button_text.'</a></div>';
                                                }else{
                                                    $output .= '<div class="explore-now bg-deep-orange text-uppercase alt-font"><a href="'.get_permalink().'" '.$ajax_popup_class.'>'.$button_text.'</a></div>';
                                                }
                                            endif;
                                        $output .='</figcaption>';
                                    $output .='</figure>';
                                $output .='</li>';
                            endwhile;
                            wp_reset_postdata();
                        $output .='</ul>';
                        if( $portfolio_posts->max_num_pages > 1 && $brando_show_load_more_button == 1 && ( $brando_all_categories_filter == 1 || $brando_all_categories_filter == '')) {
                             $output .='<div class="pagination brando-infinite-scroll display-none" data-pagination="'.$portfolio_posts->max_num_pages.'">';
                                ob_start();
                                    if( get_next_posts_link( '', $portfolio_posts->max_num_pages ) ) :
                                        next_posts_link( '<span class="old-post">'.esc_html__( 'Older Post', 'brando-addons' ).'</span><i class="fa fa-long-arrow-right"></i>', $portfolio_posts->max_num_pages );
                                    endif;
                                $output .= ob_get_contents();  
                                ob_end_clean();  
                            $output .='</div>';
                         
                         $output .='<div class="post-listing text-center" id="hide-post-button"><button class="post-load margin-two-top highlight-button btn-small  button btn alt-font margin-top-55px xs-margin-top-30px" data-text="'.esc_html__( 'View More','brando-addons' ).'"><span>'.$load_more_button_text.'</span></button></div>';
                        }
                    $output .='</div>';
                $output .='</div>';
            break;

            case 'portfolio-style-3':
                $output .='<div class="grid-gallery grid-style2 overflow-hidden '.$class_list.'">';
                    $output .='<div class="tab-content">';
                        $output .='<ul class="masonry-items grid '.$enable_lightbox.' '.$brando_token_class.' '.$portfolio_id.' '.$brando_portfolio_id.'" data-portfolio="'.$portfolio_id.'" data-uniqueid="'.$brando_portfolio_id.'">';
                            
                            while ( $portfolio_posts->have_posts() ) : $portfolio_posts->the_post();
                                /* Image Alt, Title, Caption */
                                $img_alt = brando_option_image_alt(get_post_thumbnail_id());
                                $img_title = brando_option_image_title(get_post_thumbnail_id());
                                $image_alt = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                                $image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

                                $img_lightbox_title_gallery = brando_option_lightbox_image_title(get_post_thumbnail_id());
                                $img_lightbox_caption_gallery = brando_option_image_caption(get_post_thumbnail_id());
                                $image_lightbox_title = ( isset($img_lightbox_title_gallery['title']) && !empty($img_lightbox_title_gallery['title']) ) ? ' title="'.get_the_title().'"' : '' ;
                                $image_lightbox_caption = ( isset($img_lightbox_caption_gallery['caption']) && !empty($img_lightbox_caption_gallery['caption']) ) ? ' lightbox_caption="'.$img_lightbox_caption_gallery['caption'].'"' : '' ;
                                
                                $cat_slug = '';
                                $cat = get_the_terms( get_the_ID(), 'portfolio-category' );
                                foreach ($cat as $key => $c) {
                                    if( $portfolio_id ){
                                        $cat_slug .= 'portfolio-filter-'.$c->term_id.'-'.$portfolio_id." ";
                                    }else{
                                        $cat_slug .= 'portfolio-filter-'.$c->term_id." ";
                                    }
                                }
                                $output .='<li class="'.$cat_slug.$hcode_portfolio_classes_infinite_scroll.'">';
                                    $output .='<figure>';
                                        $portfolio_subtitle = brando_post_meta('brando_subtitle');
                                        $portfolio_external_url = brando_post_meta('brando_external_url');
                                        $ajax_popup_class = '';
                                        $link_type = brando_post_meta('brando_enable_ajax_popup');
                                        if( $link_type == 1 ){
                                            $ajax_popup_class .= ' class="simple-ajax-popup-align-top"';
                                        }
                                        $full_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
                                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $brando_image_srcset );
                                        $url = $thumb['0'];
                                        $srcset = $srcset_data = '';
                                        $srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id(get_the_ID()), $brando_image_srcset );
                                        if( $srcset ){
                                            $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                                        }
                                        $sizes = $sizes_data = '';
                                        $sizes = wp_get_attachment_image_sizes( get_post_thumbnail_id(get_the_ID()), $brando_image_srcset );
                                        if( $sizes ){
                                            $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                                        }
                                        if($url):
                                            $output .= '<div class="gallery-img">';
                                                if($enable_lightbox == 'lightbox-gallery'):
                                                    $output .= '<a href="'.$full_url[0].'" '.$image_lightbox_title.$image_lightbox_caption.' class="lightboxgalleryitem" data-group="general">';
                                                elseif( $portfolio_external_url != '' ):
                                                    $output .= '<a href="'.$portfolio_external_url.'" title="'.get_the_title().'"'.$ajax_popup_class.'>';
                                                else:
                                                    $output .= '<a href="'.get_permalink().'"'.$ajax_popup_class.'>';
                                                endif;
                                                    $output .= '<img src="'.$url.'" width="'.$thumb[1].'" height="'.$thumb[2].'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'>';
                                                $output .= '</a>';
                                            $output .= '</div>';
                                        else : 
                                            if( isset($brando_no_image['url']) && !empty($brando_no_image['url']) ){
                                                $output .= '<div class="gallery-img">';
                                                    if($enable_lightbox == 'lightbox-gallery'):
                                                        $output .= '<a href="' . $brando_no_image['url'] . '" width="'.$brando_no_image['width'] .'" height="'.$brando_no_image['height'].'" class="lightboxgalleryitem" data-group="general">';
                                                    elseif( $portfolio_external_url != '' ):
                                                        $output .= '<a href="'.$portfolio_external_url.'" title="'.get_the_title().'"'.$ajax_popup_class.'>';
                                                    else:
                                                        $output .= '<a href="'.get_permalink().'"'.$ajax_popup_class.'>';
                                                    endif;
                                                        $output .= '<img src="' . $brando_no_image['url'] . '" width="'.$brando_no_image['width'] .'" height="'.$brando_no_image['height'].'" alt=""/>';
                                                    $output .= '</a>';
                                                $output .= '</div>';
                                            }
                                        endif;

                                        $output .='<figcaption>';
                                            if( $brando_show_title == 1 ):
                                                if($enable_lightbox == 'lightbox-gallery'):
                                                    $output .= '<h3 class="text-large alt-font font-weight-600 text-uppercase"><a href="javascript:void(0)" '.$image_lightbox_title.$image_lightbox_caption.' class="titlelightboxgallery text-large alt-font font-weight-600 text-uppercase black-text" data-group="general"'.$brando_title_color.'>'.get_the_title().'</a></h3>';
                                                elseif( $portfolio_external_url != '' ):
                                                    $output .= '<h3 class="text-large alt-font font-weight-600 text-uppercase"'.$brando_title_color.'><a href="'.$portfolio_external_url.'"'.$ajax_popup_class.''.$brando_title_color.'>'.get_the_title().'</a></h3>';
                                                else:
                                                    $output .= '<h3 class="text-large alt-font font-weight-600 text-uppercase"'.$brando_title_color.'><a href="'.get_permalink().'"'.$ajax_popup_class.''.$brando_title_color.'>'.get_the_title().'</a></h3>';
                                                endif;
                                            endif;
                                            if( $brando_show_subtitle == 1 ):
                                                $output .='<span class="text-small alt-font text-uppercase"'.$brando_subtitle_color.'>'.$portfolio_subtitle.'</span>';
                                            endif;
                                        $output .='</figcaption>';
                                    $output .='</figure>';
                                $output .='</li>';
                            endwhile;
                            wp_reset_postdata();
                        $output .='</ul>';
                        if( $portfolio_posts->max_num_pages > 1 && $brando_show_load_more_button == 1 && ( $brando_all_categories_filter == 1 || $brando_all_categories_filter == '')) {
                             $output .='<div class="pagination brando-infinite-scroll display-none" data-pagination="'.$portfolio_posts->max_num_pages.'">';
                                ob_start();
                                    if( get_next_posts_link( '', $portfolio_posts->max_num_pages ) ) :
                                        next_posts_link( '<span class="old-post">'.esc_html__( 'Older Post', 'brando-addons' ).'</span><i class="fa fa-long-arrow-right"></i>', $portfolio_posts->max_num_pages );
                                    endif;
                                $output .= ob_get_contents();  
                                ob_end_clean();  
                            $output .='</div>';
                         
                         $output .='<div class="post-listing text-center" id="hide-post-button"><button class="post-load margin-two-top highlight-button btn-small  button btn alt-font margin-top-55px xs-margin-top-30px" data-text="'.esc_html__( 'View More','brando-addons' ).'"><span>'.$load_more_button_text.'</span></button></div>';
                         }
                    $output .='</div>';
                $output .='</div>';
            break;

            case 'portfolio-style-4':
                $output .='<div class="grid-gallery grid-style4 overflow-hidden '.$class_list.'">';
                    $output .='<div class="tab-content">';
                        $output .='<ul class="masonry-items grid '.$enable_lightbox.' '.$brando_token_class.' '.$portfolio_id.' '.$brando_portfolio_id.'" data-portfolio="'.$portfolio_id.'" data-uniqueid="'.$brando_portfolio_id.'">';
                            
                            while ( $portfolio_posts->have_posts() ) : $portfolio_posts->the_post();
                                /* Image Alt, Title, Caption */
                                $img_alt = brando_option_image_alt(get_post_thumbnail_id());
                                $img_title = brando_option_image_title(get_post_thumbnail_id());
                                $image_alt = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                                $image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

                                $img_lightbox_title_gallery = brando_option_lightbox_image_title(get_post_thumbnail_id());
                                $img_lightbox_caption_gallery = brando_option_image_caption(get_post_thumbnail_id());
                                $image_lightbox_title = ( isset($img_lightbox_title_gallery['title']) && !empty($img_lightbox_title_gallery['title']) ) ? ' title="'.get_the_title().'"' : '' ;
                                $image_lightbox_caption = ( isset($img_lightbox_caption_gallery['caption']) && !empty($img_lightbox_caption_gallery['caption']) ) ? ' lightbox_caption="'.$img_lightbox_caption_gallery['caption'].'"' : '' ;
                                $cat_slug = '';
                                $cat = get_the_terms( get_the_ID(), 'portfolio-category' );
                                foreach ($cat as $key => $c) {
                                    if( $portfolio_id ){
                                        $cat_slug .= 'portfolio-filter-'.$c->term_id.'-'.$portfolio_id." ";
                                    }else{
                                        $cat_slug .= 'portfolio-filter-'.$c->term_id." ";
                                    }
                                }
                                $output .='<li class="'.$cat_slug.$hcode_portfolio_classes_infinite_scroll.'">';
                                    $output .='<figure class="overflow-hidden">';
                                        $portfolio_subtitle = brando_post_meta('brando_subtitle');
                                        $portfolio_external_url = brando_post_meta('brando_external_url');
                                        $ajax_popup_class = '';
                                        $link_type = brando_post_meta('brando_enable_ajax_popup');
                                        if( $link_type == 1 ){
                                            $ajax_popup_class .= ' class="simple-ajax-popup-align-top"';
                                        }
                                        $full_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
                                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $brando_image_srcset );
                                        $url = $thumb['0'];
                                        $srcset = $srcset_data = '';
                                        $srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id(get_the_ID()), $brando_image_srcset );
                                        if( $srcset ){
                                            $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                                        }
                                        $sizes = $sizes_data = '';
                                        $sizes = wp_get_attachment_image_sizes( get_post_thumbnail_id(get_the_ID()), $brando_image_srcset );
                                        if( $sizes ){
                                            $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                                        }
                                        if($url):
                                            $output .= '<div class="gallery-img bg-fast-blue-green-gradiant">';
                                                if($enable_lightbox == 'lightbox-gallery'):
                                                    $output .= '<a href="'.$full_url[0].'" '.$image_lightbox_title.$image_lightbox_caption.' class="lightboxgalleryitem" data-group="general">';
                                                elseif( $portfolio_external_url != '' ):
                                                    $output .= '<a href="'.$portfolio_external_url.'" title="'.get_the_title().'"'.$ajax_popup_class.'>';
                                                else:
                                                    $output .= '<a href="'.get_permalink().'"'.$ajax_popup_class.'>';
                                                endif;
                                                    $output .= '<img src="'.$url.'" width="'.$thumb[1].'" height="'.$thumb[2].'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'>';
                                                $output .= '</a>';
                                            $output .= '</div>';
                                        else : 
                                            if( isset($brando_no_image['url']) && !empty($brando_no_image['url']) ){
                                                $output .= '<div class="gallery-img">';
                                                    if($enable_lightbox == 'lightbox-gallery'):
                                                        $output .= '<a href="' . $brando_no_image['url'] . '" width="'.$brando_no_image['width'] .'" height="'.$brando_no_image['height'].'" class="lightboxgalleryitem" data-group="general">';
                                                    elseif( $portfolio_external_url != '' ):
                                                        $output .= '<a href="'.$portfolio_external_url.'" title="'.get_the_title().'"'.$ajax_popup_class.'>';
                                                    else:
                                                        $output .= '<a href="'.get_permalink().'"'.$ajax_popup_class.'>';
                                                    endif;
                                                        $output .= '<img src="' . $brando_no_image['url'] . '" width="'.$brando_no_image['width'] .'" height="'.$brando_no_image['height'].'" alt=""/>';
                                                    $output .= '</a>';
                                                $output .= '</div>';
                                            }
                                        endif;

                                         $output .='<figcaption>';
                                            if( $brando_show_title == 1 ):
                                                if($enable_lightbox == 'lightbox-gallery'):
                                                    $output .= '<a href="javascript:void(0)" '.$image_lightbox_title.$image_lightbox_caption.' class="titlelightboxgallery" data-group="general"><h3 class="alt-font text-uppercase"'.$brando_title_color.'>'.get_the_title().'</h3></a>';
                                                elseif( $portfolio_external_url != '' ):
                                                    $output .= '<a href="'.$portfolio_external_url.'"'.$ajax_popup_class.'><h3 class="alt-font text-uppercase"'.$brando_title_color.'>'.get_the_title().'</h3></a>';
                                                else:
                                                    $output .= '<a href="'.get_permalink().'"'.$ajax_popup_class.'><h3 class="alt-font text-uppercase"'.$brando_title_color.'>'.get_the_title().'</h3></a>';
                                                endif;
                                            endif;
                                            if( $brando_show_subtitle == 1 ):
                                                $output .='<p'.$brando_subtitle_color.'>'.$portfolio_subtitle.'</p>';
                                            endif;
                                        $output .='</figcaption>';      
                                    $output .='</figure>';
                                $output .='</li>';
                            endwhile;
                            wp_reset_postdata();
                        $output .='</ul>';
                        if( $portfolio_posts->max_num_pages > 1 && $brando_show_load_more_button == 1 && ( $brando_all_categories_filter == 1 || $brando_all_categories_filter == '')) {
                             $output .='<div class="pagination brando-infinite-scroll display-none" data-pagination="'.$portfolio_posts->max_num_pages.'">';
                                ob_start();
                                    if( get_next_posts_link( '', $portfolio_posts->max_num_pages ) ) :
                                        next_posts_link( '<span class="old-post">'.esc_html__( 'Older Post', 'brando-addons' ).'</span><i class="fa fa-long-arrow-right"></i>', $portfolio_posts->max_num_pages );
                                    endif;
                                $output .= ob_get_contents();  
                                ob_end_clean();  
                            $output .='</div>';
                        
                         $output .='<div class="post-listing text-center" id="hide-post-button"><button class="post-load margin-two-top highlight-button btn-small  button btn alt-font margin-top-55px xs-margin-top-30px" data-text="'.esc_html__( 'View More','brando-addons' ).'"><span>'.$load_more_button_text.'</span></button></div>';
                          }
                    $output .='</div>';
                $output .='</div>';
            break;

            case 'portfolio-style-5':
                $output .='<div class="'.$class_list.'">';
                    $output .='<div class="grid-gallery grid-style1 overflow-hidden">';
                        $output .='<div class="tab-content">';
                            $output .='<ul class="masonry-items grid '.$enable_lightbox.' '.$brando_token_class.' '.$portfolio_id.' '.$brando_portfolio_id.'" data-portfolio="'.$portfolio_id.'" data-uniqueid="'.$brando_portfolio_id.'">';
                                
                                while ( $portfolio_posts->have_posts() ) : $portfolio_posts->the_post();
                                    /* Image Alt, Title, Caption */
                                    $img_alt = brando_option_image_alt(get_post_thumbnail_id());
                                    $img_title = brando_option_image_title(get_post_thumbnail_id());
                                    $image_alt = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""'; 
                                    $image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

                                    $img_lightbox_title_gallery = brando_option_lightbox_image_title(get_post_thumbnail_id());
                                    $img_lightbox_caption_gallery = brando_option_image_caption(get_post_thumbnail_id());
                                    $image_lightbox_title = ( isset($img_lightbox_title_gallery['title']) && !empty($img_lightbox_title_gallery['title']) ) ? ' title="'.get_the_title().'"' : '' ;
                                    $image_lightbox_caption = ( isset($img_lightbox_caption_gallery['caption']) && !empty($img_lightbox_caption_gallery['caption']) ) ? ' lightbox_caption="'.$img_lightbox_caption_gallery['caption'].'"' : '' ;
                                    $cat_slug = '';
                                    $cat = get_the_terms( get_the_ID(), 'portfolio-category' );
                                    foreach ($cat as $key => $c) {
                                        if( $portfolio_id ){
                                            $cat_slug .= 'portfolio-filter-'.$c->term_id.'-'.$portfolio_id." ";
                                        }else{
                                            $cat_slug .= 'portfolio-filter-'.$c->term_id." ";
                                        }
                                    }
                                    $output .='<li class="'.$cat_slug.$hcode_portfolio_classes_infinite_scroll.'">';
                                        $output .='<figure>';
                                            $portfolio_subtitle = brando_post_meta('brando_subtitle');
                                            $portfolio_external_url = brando_post_meta('brando_external_url');
                                            $ajax_popup_class = '';
                                            $link_type = brando_post_meta('brando_enable_ajax_popup');
                                            if( $link_type == 1 ){
                                                $ajax_popup_class .= ' class="simple-ajax-popup-align-top"';
                                            }
                                            $full_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
                                            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $brando_image_srcset );
                                            $url = $thumb['0'];
                                            $srcset = $srcset_data = '';
                                            $srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id(get_the_ID()), $brando_image_srcset );
                                            if( $srcset ){
                                                $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                                            }
                                            $sizes = $sizes_data = '';
                                            $sizes = wp_get_attachment_image_sizes( get_post_thumbnail_id(get_the_ID()), $brando_image_srcset );
                                            if( $sizes ){
                                                $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                                            }
                                            if($url):
                                                $output .= '<div class="gallery-img">';
                                                    if($enable_lightbox == 'lightbox-gallery'):
                                                        $output .= '<a href="'.$full_url[0].'" '.$image_lightbox_title.$image_lightbox_caption.' class="lightboxgalleryitem" data-group="general">';
                                                    elseif( $portfolio_external_url != '' ):
                                                        $output .= '<a href="'.$portfolio_external_url.'" title="'.get_the_title().'"'.$ajax_popup_class.'>';
                                                    else:
                                                        $output .= '<a href="'.get_permalink().'"'.$ajax_popup_class.'>';
                                                    endif;
                                                        $output .= '<img src="'.$url.'" width="'.$thumb[1].'" height="'.$thumb[2].'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'>';
                                                    $output .= '</a>';
                                                $output .= '</div>';
                                            else : 
                                                if( isset($brando_no_image['url']) && !empty($brando_no_image['url']) ){
                                                    $output .= '<div class="gallery-img">';
                                                        if($enable_lightbox == 'lightbox-gallery'):
                                                            $output .= '<a href="' . $brando_no_image['url'] . '" width="'.$brando_no_image['width'] .'" height="'.$brando_no_image['height'].'" class="lightboxgalleryitem" data-group="general">';
                                                        elseif( $portfolio_external_url != '' ):
                                                            $output .= '<a href="'.$portfolio_external_url.'" title="'.get_the_title().'"'.$ajax_popup_class.'>';
                                                        else:
                                                            $output .= '<a href="'.get_permalink().'"'.$ajax_popup_class.'>';
                                                        endif;
                                                            $output .= '<img src="' . $brando_no_image['url'] . '" width="'.$brando_no_image['width'] .'" height="'.$brando_no_image['height'].'" alt=""/>';
                                                        $output .= '</a>';
                                                    $output .= '</div>';
                                                }
                                            endif;

                                            $output .='<figcaption>';
                                                if( $brando_show_title == 1 || $brando_show_subtitle == 1):
                                                    if($enable_lightbox == 'lightbox-gallery'):
                                                        $output .= '<h3 class="text-large alt-font xs-margin-two xs-no-margin-lr text-uppercase md-no-padding sm-no-padding"'.$brando_title_color.'><a href="javascript:void(0)" '.$image_lightbox_title.$image_lightbox_caption.' class="titlelightboxgallery" data-group="general">'.get_the_title().'</a>';
                                                    elseif( $portfolio_external_url != '' ):
                                                        $output .= '<h3 class="text-large alt-font xs-margin-two xs-no-margin-lr text-uppercase md-no-padding sm-no-padding"'.$brando_title_color.'><a href="'.$portfolio_external_url.'"'.$ajax_popup_class.'>'.get_the_title().'</a>';
                                                    else:
                                                        $output .= '<h3 class="text-large alt-font xs-margin-two xs-no-margin-lr text-uppercase md-no-padding sm-no-padding"'.$brando_title_color.'><a href="'.get_permalink().'"'.$ajax_popup_class.'>'.get_the_title().'</a>';
                                                    endif;
                                                    if( $brando_show_subtitle == 1 ):
                                                        $output .= '<span class="text-small gray-text alt-font text-uppercase display-block"'.$brando_subtitle_color.'>'.$portfolio_subtitle.'</span>';
                                                    endif;
                                                $output .= '</h3>';
                                                endif;
                                            $output .='</figcaption>'; 
                                        $output .='</figure>';
                                    $output .='</li>';
                                endwhile;
                                wp_reset_postdata();
                            $output .='</ul>';
                            if( $portfolio_posts->max_num_pages > 1 && $brando_show_load_more_button == 1 && ( $brando_all_categories_filter == 1 || $brando_all_categories_filter == '')) {
                             $output .='<div class="pagination brando-infinite-scroll display-none" data-pagination="'.$portfolio_posts->max_num_pages.'">';
                                ob_start();
                                    if( get_next_posts_link( '', $portfolio_posts->max_num_pages ) ) :
                                        next_posts_link( '<span class="old-post">'.esc_html__( 'Older Post', 'brando-addons' ).'</span><i class="fa fa-long-arrow-right"></i>', $portfolio_posts->max_num_pages );
                                    endif;
                                $output .= ob_get_contents();  
                                ob_end_clean();  
                            $output .='</div>';
                         
                         $output .='<div class="post-listing text-center" id="hide-post-button"><button class="post-load margin-two-top highlight-button btn-small  button btn alt-font margin-top-55px xs-margin-top-30px" data-text="'.esc_html__( 'View More','brando-addons' ).'"><span>'.$load_more_button_text.'</span></button></div>';
                         }
                        $output .='</div>';
                    $output .='</div>';
                $output .='</div>';
            break;

            case 'portfolio-style-6':
                $output .='<div class="grid-gallery grid-style5 overflow-hidden '.$class_list.'">';
                    $output .='<div class="tab-content">';
                        $output .='<ul class="masonry-items grid '.$enable_lightbox.' '.$brando_token_class.' '.$portfolio_id.' '.$brando_portfolio_id.'" data-portfolio="'.$portfolio_id.'" data-uniqueid="'.$brando_portfolio_id.'">';
                            
                            while ( $portfolio_posts->have_posts() ) : $portfolio_posts->the_post();
                                /* Image Alt, Title, Caption */
                                $img_alt = brando_option_image_alt(get_post_thumbnail_id());
                                $img_title = brando_option_image_title(get_post_thumbnail_id());
                                $image_alt = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                                $image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

                                $img_lightbox_title_gallery = brando_option_lightbox_image_title(get_post_thumbnail_id());
                                $img_lightbox_caption_gallery = brando_option_image_caption(get_post_thumbnail_id());
                                $image_lightbox_title = ( isset($img_lightbox_title_gallery['title']) && !empty($img_lightbox_title_gallery['title']) ) ? ' title="'.get_the_title().'"' : '' ;
                                $image_lightbox_caption = ( isset($img_lightbox_caption_gallery['caption']) && !empty($img_lightbox_caption_gallery['caption']) ) ? ' lightbox_caption="'.$img_lightbox_caption_gallery['caption'].'"' : '' ;
                                $cat_slug = '';
                                $cat = get_the_terms( get_the_ID(), 'portfolio-category' );
                                foreach ($cat as $key => $c) {
                                    if( $portfolio_id ){
                                        $cat_slug .= 'portfolio-filter-'.$c->term_id.'-'.$portfolio_id." ";
                                    }else{
                                        $cat_slug .= 'portfolio-filter-'.$c->term_id." ";
                                    }
                                }
                                $output .='<li class="'.$cat_slug.$hcode_portfolio_classes_infinite_scroll.'">';
                                    $output .='<figure>';
                                        $portfolio_subtitle = brando_post_meta('brando_subtitle');
                                        $portfolio_external_url = brando_post_meta('brando_external_url');
                                        $ajax_popup_class = '';
                                        $link_type = brando_post_meta('brando_enable_ajax_popup');
                                        if( $link_type == 1 ){
                                            $ajax_popup_class .= ' class="simple-ajax-popup-align-top"';
                                        }
                                        $full_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
                                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $brando_image_srcset );
                                        $url = $thumb['0'];
                                        $srcset = $srcset_data = '';
                                        $srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id(get_the_ID()), $brando_image_srcset );
                                        if( $srcset ){
                                            $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                                        }
                                        $sizes = $sizes_data = '';
                                        $sizes = wp_get_attachment_image_sizes( get_post_thumbnail_id(get_the_ID()), $brando_image_srcset );
                                        if( $sizes ){
                                            $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                                        }
                                        if($url):
                                            $output .= '<div class="gallery-img">';
                                                if($enable_lightbox == 'lightbox-gallery'):
                                                    $output .= '<a href="'.$full_url[0].'" '.$image_lightbox_title.$image_lightbox_caption.' class="lightboxgalleryitem" data-group="general">';
                                                elseif( $portfolio_external_url != '' ):
                                                        $output .= '<a href="'.$portfolio_external_url.'" title="'.get_the_title().'"'.$ajax_popup_class.'>';
                                                else:
                                                    $output .= '<a href="'.get_permalink().'"'.$ajax_popup_class.'>';
                                                endif;
                                                    $output .= '<img src="'.$url.'" width="'.$thumb[1].'" height="'.$thumb[2].'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'>';
                                                $output .= '</a>';
                                            $output .= '</div>';
                                        else : 
                                            if( isset($brando_no_image['url']) && !empty($brando_no_image['url']) ){
                                                $output .= '<div class="gallery-img">';
                                                    if($enable_lightbox == 'lightbox-gallery'):
                                                        $output .= '<a href="' . $brando_no_image['url'] . '" width="'.$brando_no_image['width'] .'" height="'.$brando_no_image['height'].'" class="lightboxgalleryitem" data-group="general">';
                                                    elseif( $portfolio_external_url != '' ):
                                                        $output .= '<a href="'.$portfolio_external_url.'" title="'.get_the_title().'"'.$ajax_popup_class.'>';
                                                    else:
                                                        $output .= '<a href="'.get_permalink().'"'.$ajax_popup_class.'>';
                                                    endif;
                                                        $output .= '<img src="' . $brando_no_image['url'] . '" width="'.$brando_no_image['width'] .'" height="'.$brando_no_image['height'].'" alt=""/>';
                                                    $output .= '</a>';
                                                $output .= '</div>';
                                            }
                                        endif;

                                        $output .='<figcaption>';
                                            if( $brando_show_separator == 1 ){
                                                $output .='<div class="separator-line-thick margin-lr-auto bg-crimson-red no-margin-bottom"'.$separator.'></div>';
                                            }
                                            if( $brando_show_title == 1 ){
                                                if($enable_lightbox == 'lightbox-gallery'):
                                                    $output .= '<a href="javascript:void(0)" '.$image_lightbox_title.$image_lightbox_caption.' class="titlelightboxgallery" data-group="general"><h3 class="alt-font font-weight-600 text-uppercase white-text"'.$brando_title_color.'>'.get_the_title().'</h3></a>';
                                                elseif( $portfolio_external_url != '' ):
                                                    $output .= '<a href="'.$portfolio_external_url.'"'.$ajax_popup_class.'><h3 class="alt-font font-weight-600 text-uppercase white-text"'.$brando_title_color.'>'.get_the_title().'</h3></a>';
                                                else:
                                                    $output .= '<a href="'.get_permalink().'"'.$ajax_popup_class.'><h3 class="alt-font font-weight-600 text-uppercase white-text"'.$brando_title_color.'>'.get_the_title().'</h3></a>';
                                                endif;
                                            }
                                            if( $brando_show_subtitle == 1 ){
                                                $output .='<span class="text-small alt-font text-uppercase light-gray-text"'.$brando_subtitle_color.'>'.$portfolio_subtitle.'</span>';
                                            }
                                        $output .='</figcaption>';
                                    $output .='</figure>';
                                $output .='</li>';
                            endwhile;
                            wp_reset_postdata();
                        $output .='</ul>';
                        if( $portfolio_posts->max_num_pages > 1 && $brando_show_load_more_button == 1 && ( $brando_all_categories_filter == 1 || $brando_all_categories_filter == '')) {
                             $output .='<div class="pagination brando-infinite-scroll display-none" data-pagination="'.$portfolio_posts->max_num_pages.'">';
                                ob_start();
                                    if( get_next_posts_link( '', $portfolio_posts->max_num_pages ) ) :
                                        next_posts_link( '<span class="old-post">'.esc_html__( 'Older Post', 'brando-addons' ).'</span><i class="fa fa-long-arrow-right"></i>', $portfolio_posts->max_num_pages );
                                    endif;
                                $output .= ob_get_contents();  
                                ob_end_clean();  
                            $output .='</div>';
                        
                         $output .='<div class="post-listing text-center" id="hide-post-button"><button class="post-load margin-two-top highlight-button btn-small  button btn alt-font margin-top-55px xs-margin-top-30px" data-text="'.esc_html__( 'View More','brando-addons' ).'"><span>'.$load_more_button_text.'</span></button></div>';
                          }
                    $output .='</div>';
                $output .='</div>';
            break;

            case 'portfolio-style-7':
                $output .='<div class="grid-gallery grid-style6 overflow-hidden '.$class_list.'">';
                    $output .='<div class="tab-content">';
                        $output .='<ul class="masonry-items grid '.$enable_lightbox.' '.$brando_token_class.' '.$portfolio_id.' '.$brando_portfolio_id.'" data-portfolio="'.$portfolio_id.'" data-uniqueid="'.$brando_portfolio_id.'">';
                            
                            while ( $portfolio_posts->have_posts() ) : $portfolio_posts->the_post();
                                /* Image Alt, Title, Caption */
                                $img_alt = brando_option_image_alt(get_post_thumbnail_id());
                                $img_title = brando_option_image_title(get_post_thumbnail_id());
                                $image_alt = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ;
                                $image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

                                $img_lightbox_title_gallery = brando_option_lightbox_image_title(get_post_thumbnail_id());
                                $img_lightbox_caption_gallery = brando_option_image_caption(get_post_thumbnail_id());
                                $image_lightbox_title = ( isset($img_lightbox_title_gallery['title']) && !empty($img_lightbox_title_gallery['title']) ) ? ' title="'.get_the_title().'"' : '' ;
                                $image_lightbox_caption = ( isset($img_lightbox_caption_gallery['caption']) && !empty($img_lightbox_caption_gallery['caption']) ) ? ' lightbox_caption="'.$img_lightbox_caption_gallery['caption'].'"' : '' ;
                                $cat_slug = '';
                                $cat = get_the_terms( get_the_ID(), 'portfolio-category' );
                                foreach ($cat as $key => $c) {
                                    if( $portfolio_id ){
                                        $cat_slug .= 'portfolio-filter-'.$c->term_id.'-'.$portfolio_id." ";
                                    }else{
                                        $cat_slug .= 'portfolio-filter-'.$c->term_id." ";
                                    }
                                }
                                $output .='<li class="'.$cat_slug.$hcode_portfolio_classes_infinite_scroll.'">';
                                    $output .='<figure class="overflow-hidden">';
                                        $portfolio_subtitle = brando_post_meta('brando_subtitle');
                                        $portfolio_external_url = brando_post_meta('brando_external_url');
                                        $ajax_popup_class = '';
                                        $link_type = brando_post_meta('brando_enable_ajax_popup');
                                        if( $link_type == 1 ){
                                            $ajax_popup_class .= ' class="simple-ajax-popup-align-top"';
                                        }
                                        $full_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
                                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $brando_image_srcset );
                                        $url = $thumb['0'];
                                        $srcset = $srcset_data = '';
                                        $srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id(get_the_ID()), $brando_image_srcset );
                                        if( $srcset ){
                                            $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                                        }
                                        $sizes = $sizes_data = '';
                                        $sizes = wp_get_attachment_image_sizes( get_post_thumbnail_id(get_the_ID()), $brando_image_srcset );
                                        if( $sizes ){
                                            $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                                        }
                                        if($url):
                                            $output .= '<div class="gallery-img bg-dark-gray">';
                                                if($enable_lightbox == 'lightbox-gallery'):
                                                    $output .= '<a href="'.$full_url[0].'" '.$image_lightbox_title.$image_lightbox_caption.' class="lightboxgalleryitem" data-group="general">';
                                                elseif( $portfolio_external_url != '' ):
                                                        $output .= '<a href="'.$portfolio_external_url.'" title="'.get_the_title().'"'.$ajax_popup_class.'>';
                                                else:
                                                    $output .= '<a href="'.get_permalink().'"'.$ajax_popup_class.'>';
                                                endif;
                                                    $output .= '<img src="'.$url.'" width="'.$thumb[1].'" height="'.$thumb[2].'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'>';
                                                $output .= '</a>';
                                            $output .= '</div>';
                                        else : 
                                            if( isset($brando_no_image['url']) && !empty($brando_no_image['url']) ){
                                                $output .= '<div class="gallery-img bg-dark-gray">';
                                                    if($enable_lightbox == 'lightbox-gallery'):
                                                        $output .= '<a href="' . $brando_no_image['url'] . '" width="'.$brando_no_image['width'] .'" height="'.$brando_no_image['height'].'" class="lightboxgalleryitem" data-group="general">';
                                                    elseif( $portfolio_external_url != '' ):
                                                        $output .= '<a href="'.$portfolio_external_url.'" title="'.get_the_title().'"'.$ajax_popup_class.'>';
                                                    else:
                                                        $output .= '<a href="'.get_permalink().'"'.$ajax_popup_class.'>';
                                                    endif;
                                                        $output .= '<img src="' . $brando_no_image['url'] . '" width="'.$brando_no_image['width'] .'" height="'.$brando_no_image['height'].'" alt=""/>';
                                                    $output .= '</a>';
                                                $output .= '</div>';
                                            }
                                        endif;

                                        $output .='<figcaption>';
                                            if( $brando_show_title == 1 ){
                                                if($enable_lightbox == 'lightbox-gallery'):
                                                    $output .= '<a href="javascript:void(0)" '.$image_lightbox_title.$image_lightbox_caption.' class="titlelightboxgallery" data-group="general"><h3 class="alt-font text-uppercase width-80 margin-lr-auto"'.$brando_title_color.'>'.get_the_title().'</h3></a>';
                                                elseif( $portfolio_external_url != '' ):
                                                    $output .= '<a href="'.$portfolio_external_url.'"'.$ajax_popup_class.'><h3 class="alt-font text-uppercase width-80 margin-lr-auto"'.$brando_title_color.'>'.get_the_title().'</h3></a>';
                                                else:
                                                    $output .= '<a href="'.get_permalink().'"'.$ajax_popup_class.'><h3 class="alt-font text-uppercase width-80 margin-lr-auto"'.$brando_title_color.'>'.get_the_title().'</h3></a>';
                                                endif;
                                            }
                                        $output .='</figcaption>';
                                    $output .='</figure>';
                                $output .='</li>';
                            endwhile;
                            wp_reset_postdata();
                        $output .='</ul>';
                        if( $portfolio_posts->max_num_pages > 1 && $brando_show_load_more_button == 1 && ( $brando_all_categories_filter == 1 || $brando_all_categories_filter == '')) {
                             $output .='<div class="pagination brando-infinite-scroll display-none" data-pagination="'.$portfolio_posts->max_num_pages.'">';
                                ob_start();
                                    if( get_next_posts_link( '', $portfolio_posts->max_num_pages ) ) :
                                        next_posts_link( '<span class="old-post">'.esc_html__( 'Older Post', 'brando-addons' ).'</span><i class="fa fa-long-arrow-right"></i>', $portfolio_posts->max_num_pages );
                                    endif;
                                $output .= ob_get_contents();  
                                ob_end_clean();  
                            $output .='</div>';
                        
                         $output .='<div class="post-listing text-center" id="hide-post-button"><button class="post-load margin-two-top highlight-button btn-small  button btn alt-font margin-top-55px xs-margin-top-30px" data-text="'.esc_html__( 'View More','brando-addons' ).'"><span>'.$load_more_button_text.'</span></button></div>';
                        }
                    $output .='</div>';
                $output .='</div>';
            break;
        }
        if($brando_portfolio_columns || $id || $class):
            $output .='</div>';
        endif;
                                
        return $output;
    }
}
add_shortcode( 'brando_portfolio', 'brando_portfolio_shortcode' );