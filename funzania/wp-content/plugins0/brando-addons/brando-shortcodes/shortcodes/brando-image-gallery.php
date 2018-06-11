<?php
/**
 * Shortcode For Image gallery
 *
 * @package Brando
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Image gallery */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'brando_image_gallery_shortcode' ) ) {
	function brando_image_gallery_shortcode( $atts, $content = null ) { 
		extract( shortcode_atts( array(
	        	'image_gallery_type' => '',
	        	'simple_image_type' => '',
	        	'column' => '',
	        	'image_gallery' => '',
	        	'brando_column_animation_style' => '',
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
		        'id' => '',
		        'class' => '',
		        'brando_image_srcset' => 'full',
		        'brando_token_class' => '',
	    ), $atts ) );

		global $tz_featured_array, $tz_featured_ipad_array, $tz_featured_mobile_array;
		$classes = array();
		$explode_image = explode(",",$image_gallery);
		$brando_image_srcset = ($brando_image_srcset) ? $brando_image_srcset : 'full';
		$image_url = wp_get_attachment_image_src($image_gallery, $brando_image_srcset);
		$output = $classes_masonry = $padding = $padding_style = $margin = $margin_style = $style_attr = $style ='';  
		$brando_column_animation_style = ($brando_column_animation_style) ? 'class="wow '.$brando_column_animation_style.'"' : '';
		$popup_id = ( $id ) ? $id : 'default';
		$id = ( $id ) ? 'id="'.$id.'"' : '';
		$class_main = ( $class ) ? ' '.$class : ''; 

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
        $gallery_class = ( $class_list ) ? ' '.$class_list : '';

	    $classes_masonry .= ' work-'.$column.'col';

		switch ($image_gallery_type) 
		{
		    case 'lightbox-gallery':

		     	if($explode_image){

					$output .='<div '.$id.' class="gutter grid-gallery'.$classes_masonry.$class_main.' overflow-hidden '.$gallery_class.'">';
						$output .='<ul class="grid masonry-item lightbox-gallery">';
							foreach ($explode_image as $key => $value) 
							{
								/* Image Alt, Title, Caption */
								$img_alt = brando_option_image_alt($value);
								$img_title = brando_option_image_title($value);
								$img_lightbox_caption = brando_option_image_caption($value);
								$img_lightbox_title = brando_option_lightbox_image_title($value);
								$image_alt = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
								$image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';
								$image_lightbox_caption = ( isset($img_lightbox_caption['caption']) && !empty($img_lightbox_caption['caption']) ) ? ' lightbox_caption="'.$img_lightbox_caption['caption'].'"' : '' ;
								$image_lightbox_title = ( isset($img_lightbox_title['title']) && !empty($img_lightbox_title['title']) ) ? ' title="'.$img_lightbox_title['title'].'"' : '' ;
								$srcset = $srcset_data = '';
							    $srcset = wp_get_attachment_image_srcset( $value, $brando_image_srcset );
							    if( $srcset ){
							        $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
							    }

							    $sizes = $sizes_data = '';
							    $sizes = wp_get_attachment_image_sizes( $value, $brando_image_srcset );
							    if( $sizes ){
							        $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
							    }

								$image_url = wp_get_attachment_image_src($value, $brando_image_srcset);
								$full_image_url = wp_get_attachment_image_src($value, 'full');

									$output .='<li '.$brando_column_animation_style.'>';
									   $output .= '<figure class="overflow-hidden">';
					                    $output .='<a class="lightboxgalleryitem" data-group="'.$popup_id.'" href="'.$full_image_url[0].'"'.$image_lightbox_title.$image_lightbox_caption.'>';
					                    	$output .='<img src="'.$image_url[0].'"'.$image_alt.$image_title.$srcset_data.$sizes_data.' width="'.$image_url[1].'" height="'.$image_url[2].'" />';
					                    $output .='</a>';
					                   $output .= '</figure>'; 
					                $output .='</li>';
						    }
				        $output .='</ul>';
					$output .='</div>';
					
				}

			break;

            case 'simple-image-lightbox':

                if($explode_image){
					$output .='<div '.$id.' class="gutter grid-gallery'.$classes_masonry.$class_main.' overflow-hidden '.$gallery_class.'">';
						$output .='<ul class="grid">';
							foreach ($explode_image as $key => $value) 
							{
								/* Image Alt, Title, Caption */
								$img_alt = brando_option_image_alt($value);
								$img_title = brando_option_image_title($value);
								$img_lightbox_caption = brando_option_image_caption($value);
								$img_lightbox_title = brando_option_lightbox_image_title($value);
								$image_alt = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
								$image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';
								$image_lightbox_caption = ( isset($img_lightbox_caption['caption']) && !empty($img_lightbox_caption['caption']) ) ? ' lightbox_caption="'.$img_lightbox_caption['caption'].'"' : '' ;
								$image_lightbox_title = ( isset($img_lightbox_title['title']) && !empty($img_lightbox_title['title']) ) ? ' title="'.$img_lightbox_title['title'].'"' : '' ;

								$srcset = $srcset_data = '';
							    $srcset = wp_get_attachment_image_srcset( $value, $brando_image_srcset );
							    if( $srcset ){
							        $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
							    }

							    $sizes = $sizes_data = '';
							    $sizes = wp_get_attachment_image_sizes( $value, $brando_image_srcset );
							    if( $sizes ){
							        $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
							    }

							    $image_url = wp_get_attachment_image_src($value, $brando_image_srcset);
							    $full_image_url = wp_get_attachment_image_src($value, 'full');

								$output .='<li '.$brando_column_animation_style.'>';
									$output .= '<figure class="overflow-hidden">';
				                        $output .='<a class="single-image-lightbox" href="'.$full_image_url[0].'"'.$image_lightbox_title.$image_lightbox_caption.'>';
				                            $output .='<img src="'.$image_url[0].'"'.$image_alt.$image_title.$srcset_data.$sizes_data.' width="'.$image_url[1].'" height="'.$image_url[2].'" />';
				                        $output .='</a>';
				                    $output .= '</figure>'; 
				                $output .='</li>';
						    }
					    $output .='</ul>';
				    $output .='</div>';

				}

		    break;

		    case 'zoom-gallery':

                if($explode_image){

					$output .='<div '.$id.' class="gutter grid-gallery zoom-gallery'.$classes_masonry.$class_main.' overflow-hidden '.$gallery_class.'">';
						$output .='<ul class="grid">';
							foreach ($explode_image as $key => $value) 
							{
								/* Image Alt, Title, Caption */
								$img_alt = brando_option_image_alt($value);
								$img_title = brando_option_image_title($value);
								$img_lightbox_caption = brando_option_image_caption($value);
								$img_lightbox_title = brando_option_lightbox_image_title($value);
								$image_alt = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
								$image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';
								$image_lightbox_caption = ( isset($img_lightbox_caption['caption']) && !empty($img_lightbox_caption['caption']) ) ? ' lightbox_caption="'.$img_lightbox_caption['caption'].'"' : '' ;
								$image_lightbox_title = ( isset($img_lightbox_title['title']) && !empty($img_lightbox_title['title']) ) ? ' title="'.$img_lightbox_title['title'].'"' : '' ;

								$srcset = $srcset_data = '';
							    $srcset = wp_get_attachment_image_srcset( $value, $brando_image_srcset );
							    if( $srcset ){
							        $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
							    }

							    $sizes = $sizes_data = '';
							    $sizes = wp_get_attachment_image_sizes( $value, $brando_image_srcset );
							    if( $sizes ){
							        $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
							    }

								$image_url = wp_get_attachment_image_src($value, $brando_image_srcset);
								$full_image_url = wp_get_attachment_image_src($value, 'full');

								$output .='<li '.$brando_column_animation_style.'>';
									$output .= '<figure class="overflow-hidden">';
					                    $output .='<a class="lightboxzoomgalleryitem" data-group="'.$popup_id.'" href="'.$full_image_url[0].'"'.$image_lightbox_title.$image_lightbox_caption.'>';
					                        $output .='<img src="'.$image_url[0].'"'.$image_alt.$image_title.$srcset_data.$sizes_data.' width="'.$image_url[1].'" height="'.$image_url[2].'" />';
					                    $output .='</a>';
					                $output .= '</figure>'; 
					            $output .='</li>';
						    }
					    $output .='</ul>';
				    $output .='</div>';

				}

		    break;
        } 
		return $output;   
	}
}
add_shortcode( 'brando_image_gallery', 'brando_image_gallery_shortcode' );