<?php
/**
 * Shortcode For Blog
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Blog */
/*-----------------------------------------------------------------------------------*/
$brando_srcset = '';
if ( ! function_exists( 'brando_blog_shortcode' ) ) {
    function brando_blog_shortcode( $atts, $content = null ) {
    	global $post;
        extract( shortcode_atts( array(
        	'id' => '',
            'class' => '',
            'brando_blog_premade_style' => '',
            'blog_column' => '',
            'brando_categories_list' => '',
            'brando_post_per_page' => '15',
            'brando_show_post_number' => '',
            'brando_show_post_title' => '',
            'brando_show_post_thumbnail' => '',
            'brando_show_separator' => '',
            'brando_sep_color' => '',
            'brando_seperator_height' => '2px',
            'brando_show_post_date' => '1',
            'brando_show_post_author' => '1',
            'brando_date_format' => 'd m Y',
            'brando_day_format' => 'd m Y',
            'brando_show_like' => '',
            'brando_show_comment' => '',
            'brando_show_post_pagination' => '1',
            'brando_show_button' => '',
            'brando_button_text' => '',
            'brando_show_excerpt' => '1',
            'brando_show_content' => '1',
            'brando_excerpt_length' => '15',
            'brando_show_icon' => '',
            'brando_show_facebook' => '',
            'brando_show_twitter' => '',
            'brando_show_gplus' => '',
            'brando_show_linkedin' => '',
            'brando_blog_custom_link' => '',
            'orderby' => 'date',
            'order' => 'DESC',
            'brando_title_hover_color' => '',
            'brando_token_class' => '',
            'brando_image_srcset' => 'full',
            'brando_show_post_feature_image' => '',
            'brando_title_color' => '',
            'brando_post_meta_color' => '',
            'brando_post_meta_hover_color' => '',
            'brando_number_bg_color' => '',
            'brando_number_color' => '',
            'brando_number_hover_color' => '',
            'brando_day_color' => '',
            'brando_date_color' => '',
            'brando_border_color' => '',
            'title_settings' => '',
            'number_settings' => '',
            'postmeta_font_settings' => ''
        ), $atts ) );

        global $tz_featured_array, $brando_srcset,$font_settings_array; 
        $output = $sep_style = $class_column = '';
        $style_array = array();
        $brando_token_class = $brando_token_class.$id;
        $id = ($id) ? ' id="'.$id.'"' : '';
        $class = ( $class ) ? ' class="'.$class.'"' : '';
        $brando_categories_list = ($brando_categories_list) ? $brando_categories_list : '';
        $brando_post_per_page = ($brando_post_per_page) ? $brando_post_per_page : '';
        $brando_excerpt_length = ($brando_excerpt_length) ? $brando_excerpt_length : '';
        $brando_show_post_number = ($brando_show_post_number) ? $brando_show_post_number : '';
        $brando_show_post_title = ($brando_show_post_title) ? $brando_show_post_title : '';
        $brando_show_post_thumbnail = ($brando_show_post_thumbnail) ? $brando_show_post_thumbnail : '';
        //$brando_show_post_meta = ($brando_show_post_meta) ? $brando_show_post_meta : '';
        $brando_date_format = ($brando_date_format) ? $brando_date_format : '';
        $brando_day_format = ($brando_day_format) ? $brando_day_format : '';
        $brando_show_like = ($brando_show_like) ? $brando_show_like : '';
        $brando_blog_style = ( $brando_blog_premade_style ) ? $brando_blog_premade_style : '';

        $brando_show_facebook = ($brando_show_facebook) ? $brando_show_facebook : '';
        $brando_show_twitter = ($brando_show_twitter) ? $brando_show_twitter : '';
        $brando_show_gplus = ($brando_show_gplus) ? $brando_show_gplus : '';
        $brando_show_linkedin = ($brando_show_linkedin) ? $brando_show_linkedin : '';
        $brando_blog_custom_link = ($brando_blog_custom_link) ? $brando_blog_custom_link : '';

        $brando_show_post_feature_image = ($brando_show_post_feature_image) ? $brando_show_post_feature_image : '0';

        $brando_show_comment = ($brando_show_comment) ? $brando_show_comment : '';
        $brando_show_post_pagination = ($brando_show_post_pagination) ? $brando_show_post_pagination : '';
        $brando_sep_color = ( $brando_sep_color ) ? $style_array[] = 'background:'.$brando_sep_color.' !important;' : '';
        $brando_seperator_height = ( $brando_seperator_height ) ? $style_array[] = 'height:'.$brando_seperator_height.' !important;' : '';
        $brando_button_text = ( $brando_button_text ) ? $brando_button_text : 'Continue Reading';
        $blog_column_type = ( $blog_column ) ? ' class="blog-'.$blog_column.'-col"': '';
        $brando_image_srcset = ($brando_image_srcset) ? $brando_image_srcset : 'full';
        $brando_srcset = $brando_image_srcset;

        $style_property_list = implode(" ", $style_array);
		$sep_style = ( $style_property_list ) ? ' style="'.$style_property_list.'"' : '';

		switch ($blog_column) {
        	case '2':
        		$class_column .= ' col-md-6 col-sm-6 col-xs-12 margin-four-bottom xs-margin-seven-bottom';
        	break;
        	case '3':
        		$class_column .= ' col-md-4 col-sm-6 col-xs-12 margin-four-bottom xs-margin-seven-bottom';
        	break;
        	case '4':
        		$class_column .= ' col-md-3 col-sm-6 col-xs-12 margin-four-bottom xs-margin-seven-bottom';
        	break;
        }
    	$blog_layout = ' class="blog-'.$blog_column.'-column"';
    	if( $brando_blog_style == 'blog-style-5'){
    		$output .= '<div'.$blog_layout.'>';
    	}
        /* WP_query For Blog Categories*/
        if( $id || $class ):
            $output .= '<div'.$id.$class.'>';
        endif;

        //Font Settings For Title
        $fontsettings_title_id = $fontsettings_title_class = $fontsettings_postmeta_id = $fontsettings_postmeta_class = $fontsettings_number_id =$fontsettings_number_class = '';
        if( !empty( $title_settings ) ) {
            $fontsettings_title_id = uniqid('brando-font-setting-');
            $responsive_style_title = brando_Responsive_font_settings::generate_css( $title_settings, $fontsettings_title_id );
            $fontsettings_title_class = ' '.$fontsettings_title_id;
        }
        ( !empty( $responsive_style_title ) ) ? $font_settings_array[] = $responsive_style_title : '';
        //Font Settings For Number
        if( !empty( $number_settings ) ) {
            $fontsettings_number_id = uniqid('brando-font-setting-');
            $responsive_style_number = brando_Responsive_font_settings::generate_css( $number_settings, $fontsettings_number_id );
            $fontsettings_number_class = ' '.$fontsettings_number_id;
        }
        ( !empty( $responsive_style_number ) ) ? $font_settings_array[] = $responsive_style_number : '';
        //Font Settings For postmeta
        if( !empty( $postmeta_font_settings ) ) {
            $fontsettings_postmeta_id = uniqid('brando-font-setting-');
            if ($brando_blog_style=='blog-style-1') {
                $responsive_style_postmeta = brando_Responsive_font_settings::generate_css( $postmeta_font_settings, $fontsettings_postmeta_id.', .'.$fontsettings_postmeta_id.' a' );
            }
            else{
                $responsive_style_postmeta = brando_Responsive_font_settings::generate_css( $postmeta_font_settings, $fontsettings_postmeta_id);
            }
            $fontsettings_postmeta_class = ' '.$fontsettings_postmeta_id;
        }
        ( !empty( $responsive_style_postmeta ) ) ? $font_settings_array[] = $responsive_style_postmeta : '';
        // Title Color
        ( $brando_title_color ) ? $tz_featured_array[] = '.'.$brando_token_class.' .entry-title a, .'.$brando_token_class.' .entry-title{ color:'.$brando_title_color.';}' : '';

        // Title Hover Color
        ( $brando_title_hover_color ) ? $tz_featured_array[] = '.'.$brando_token_class.' .entry-title a:hover, .'.$brando_token_class.' .entry-title:hover, .'.$brando_token_class.' article:hover h5 a{ color:'.$brando_title_hover_color.';}' : '';

        // Post Meta Color
        ( $brando_post_meta_color ) ? $tz_featured_array[] = '.'.$brando_token_class.' .brando-post-meta, .'.$brando_token_class.' .brando-post-meta a, .'.$brando_token_class.' article .brando-post-meta i, .'.$brando_token_class.' .blog-sharing a i { color:'.$brando_post_meta_color.';}' : '';

        // Post Meta Hover Color
        ( $brando_post_meta_hover_color ) ? $tz_featured_array[] = '.'.$brando_token_class.' a.brando-post-meta:hover, .'.$brando_token_class.' .brando-post-meta a:hover, .'.$brando_token_class.'.blog-post-style1 article:hover span, .'.$brando_token_class.'.blog-post-style1 article:hover a, .'.$brando_token_class.' article:hover .brando-post-meta i, .'.$brando_token_class.' .blog-sharing a:hover i { color:'.$brando_post_meta_hover_color.';}' : '';

        // Number Background Color
        ( $brando_number_bg_color ) ? $tz_featured_array[] = '.'.$brando_token_class.' .blog-post-number, .'.$brando_token_class.'.blog-listing .post-date { background:'.$brando_number_bg_color.';}' : '';

        // Number Color
        ( $brando_number_color ) ? $tz_featured_array[] = '.'.$brando_token_class.' .post-details .blog-post-number{ color:'.$brando_number_color.';}' : '';

        // Number Hover Color
        ( $brando_number_hover_color ) ? $tz_featured_array[] = '.'.$brando_token_class.' article:hover .blog-post-number{ color:'.$brando_number_hover_color.';}' : '';

        // Day Color
        ( $brando_day_color ) ? $tz_featured_array[] = '.'.$brando_token_class.' .post-date{ color:'.$brando_day_color.';}' : '';

        // Date Color
        ( $brando_date_color ) ? $tz_featured_array[] = '.'.$brando_token_class.' .post-date-month, .'.$brando_token_class.' .brando-date-month{ color:'.$brando_date_color.';}' : '';

        // Border Color
        ( $brando_border_color ) ? $tz_featured_array[] = '.'.$brando_token_class.' .post-date-month:after{ border-bottom-color:'.$brando_border_color.';}' : '';

        $i = 1;
        if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }
		$args = array('post_type' => 'post',
    		'posts_per_page' => $brando_post_per_page,
            'category_name' => $brando_categories_list,
            'orderby' => $orderby,
            'order' => $order,
            'paged' => $paged,
	     );
		$query = new WP_Query( $args );
		while( $query->have_posts() ) : $query->the_post();

			$brando_post_classes = '';
            ob_start();
                post_class();
                $brando_post_classes .= ob_get_contents();
            ob_end_clean();

			/* Image Alt, Title, Caption */
	        $img_alt = brando_option_image_alt(get_post_thumbnail_id());
	        $img_title = brando_option_image_title(get_post_thumbnail_id());
	        $image_alt = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? $img_alt['alt'] : '' ; 
	        $image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? $img_title['title'] : '';

	        $img_attr = array(
	            'title' => $image_title,
	            'alt' => $image_alt,
	        );
	        $popup_id = 'blog-'.get_the_ID();
			$post_cat = array();
	        $categories = get_the_category();
	        foreach ($categories as $k => $cat) {
	            $cat_link = get_category_link($cat->cat_ID);
	            $post_cat[]='<a href="'.$cat_link.'" class="text-small dark-gray-text text-uppercase font-weight-600 alt-font" rel="category tag">'.$cat->name.'</a>';
	        }
	        $post_category=implode(" ",$post_cat);
	        $post_format = get_post_format( get_the_ID() );
			if($i < 10){
	            $i = '0'.$i;
	        }
	        switch ($brando_blog_style) {
	        	case 'blog-style-1':
	        		$brando_show_date = ( $brando_show_post_date == 1 ) ? '<span class="published">'.get_the_date( $brando_date_format, get_the_ID()).'</span><time class="updated display-none" datetime="'.esc_attr( get_the_modified_date( 'c' ) ).'">'.get_the_modified_date( $brando_date_format ).'</time>' : '';
	        		$brando_show_author = ( $brando_show_post_author == 1 ) ? esc_html__('Posted by','brando-addons').' <span class="author vcard"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'" class="url fn n">'.get_the_author().'</a></span> | ' : '';
	        		
	        		$output .= '<div '.$brando_post_classes.'>';
		        		$output .= '<div class="blog-post blog-post-style1 '.$brando_token_class.'">';
			        		$output .= '<article>';
				        		if( $brando_show_post_thumbnail == 1 ){
				        			$output .= '<div class="post-thumbnail">';
					                    if($post_format == 'image' && $brando_show_post_feature_image != 1 ){
				                            ob_start();
				                            	include BRANDO_ADDONS_ROOT . '/loop/loop-image.php';
				                                $output .= ob_get_contents();  
				                            ob_end_clean();  
				                        }elseif($post_format == 'gallery' && $brando_show_post_feature_image != 1 ){
				                            ob_start();
				                            	include BRANDO_ADDONS_ROOT . '/loop/loop-gallery.php';
				                                $output .= ob_get_contents();  
				                            ob_end_clean();  
				                        }elseif($post_format == 'video' && $brando_show_post_feature_image != 1 ){
				                            ob_start();
				                            	include BRANDO_ADDONS_ROOT . '/loop/loop-video.php';
				                                $output .= ob_get_contents();  
				                            ob_end_clean();  
				                        }elseif($post_format == 'quote' && $brando_show_post_feature_image != 1 ){
				                            ob_start();
				                            	include BRANDO_ADDONS_ROOT . '/loop/loop-quote.php';
				                                $output .= ob_get_contents();  
				                            ob_end_clean();   
				                        }else{
					                    	$output .=  '<div class="blog-image"><a href="'.get_permalink().'">';
											    if ( has_post_thumbnail() ) {
											        $output .= get_the_post_thumbnail( get_the_ID(), $brando_image_srcset, $img_attr );
											    }
											$output .=  '</a></div>';
					                    }
					                $output .= '<div class="opacity-full bg-dark-gray"></div>';
				                    $output .= '</div>';
				                }
			                    $output .= '<div class="container post-details">';
			                        $output .= '<div class="row margin-seven-tb xs-margin-ten-tb">';
			                            $output .= '<div class="col-md-1 col-sm-2 col-xs-3">';
			                            if( $brando_show_post_number == 1 ){
			                                $output .= '<span class="alt-font title-large blog-post-number bg-fast-yellow'.$fontsettings_number_class.'">'.$i.'</span>';
			                            }
			                            $output .= '</div>';
			                            $output .= '<div class="col-md-10 col-sm-10 col-xs-12 md-margin-one-left sm-no-margin">';
			                            if( $brando_show_post_author == 1 || $brando_show_post_date == 1 ){
			                                $output .= '<span class="text-small text-uppercase alt-font brando-post-meta'.$fontsettings_postmeta_class.'">'.$brando_show_author.$brando_show_date.'</span>';
			                            }
			                            if( $brando_show_post_title == 1 ){
			                                $output .= '<h5 class="alt-font margin-tb-15px entry-title '.$fontsettings_title_class.'"><a href="'.get_permalink().'">'.get_the_title().'</a></h5>';
			                            }
			                                $output .= '<div class="brando-post-meta '.$fontsettings_postmeta_class.'">';
			                                	if( $brando_show_like == 1 ){
			                                		$output .= brando_get_simple_likes_button( get_the_ID() );
			                                	}
				                                if( $brando_show_comment == 1 && (comments_open() || get_comments_number())){
				                                    ob_start();
				                                        comments_popup_link( __( '<i class="fa fa-comment-o"></i>Leave a comment', 'brando-addons' ), __( '<i class="fa fa-comment-o"></i>1 Comment', 'brando-addons' ), __( '<i class="fa fa-comment-o"></i>% Comment(s)', 'brando-addons' ), 'comment' );
				                                        $output .= ob_get_contents();  
				                                    ob_end_clean();
				                                }
				                            $output .= '</div>';
			                            $output .= '</div>';
			                        $output .= '</div>';
			                    $output .= '</div>';
			                $output .= '</article>';
			            $output .= '</div>';
			        $output .= '</div>';
	        	break;

				case 'blog-style-2':
					$brando_show_date = ( $brando_show_post_date == 1 ) ? '<span class="published">'.get_the_date( $brando_date_format, get_the_ID()).'</span><time class="updated display-none" datetime="'.esc_attr( get_the_modified_date( 'c' ) ).'">'.get_the_modified_date( $brando_date_format ).'</time>' : '';

					$output .= '<div '.$brando_post_classes.'>';
						$output .= '<div class="blog-post-style2 '.$brando_token_class.'">';
							$output .= '<article class="col-md-6 col-sm-6 col-xs-12 margin-three-bottom">';
			                    $output .= '<div class="col-md-12 col-sm-12 col-xs-12 no-padding bg-white">';
			                    	if( $brando_show_post_thumbnail == 1 ){
				                        $output .= '<div class="col-md-6 col-sm-6 col-xs-6 no-padding post-thumbnail overflow-hidden">';
				                            if($post_format == 'image' && $brando_show_post_feature_image != 1 ){
					                            ob_start();
					                            	include BRANDO_ADDONS_ROOT . '/loop/loop-image.php';
					                                $output .= ob_get_contents();  
					                            ob_end_clean();  
					                        }elseif($post_format == 'gallery' && $brando_show_post_feature_image != 1 ){
					                            ob_start();
					                            	include BRANDO_ADDONS_ROOT . '/loop/loop-gallery.php';
					                                $output .= ob_get_contents();  
					                            ob_end_clean();  
					                        }elseif($post_format == 'video' && $brando_show_post_feature_image != 1 ){
					                            ob_start();
					                            	include BRANDO_ADDONS_ROOT . '/loop/loop-video.php';
					                                $output .= ob_get_contents();  
					                            ob_end_clean();  
					                        }elseif($post_format == 'quote' && $brando_show_post_feature_image != 1 ){
					                            ob_start();
					                            	include BRANDO_ADDONS_ROOT . '/loop/loop-quote.php';
					                                $output .= ob_get_contents();  
					                            ob_end_clean(); 
					                        }else{
						                    	$output .=  '<div class="blog-image"><a href="'.get_permalink().'">';
												    if ( has_post_thumbnail() ) {
												        $output .= get_the_post_thumbnail( get_the_ID(), $brando_image_srcset, $img_attr );
												    }
												$output .=  '</a></div>';
						                    }
				                        $output .= '</div>';
				                    }
			                        $output .= '<div class="col-md-6 col-sm-6 col-xs-6 no-padding post-details-arrow">';
			                            $output .= '<div class="post-details">';
			                            if( $brando_show_post_date == 1 ){
			                                $output .= '<span class="text-small text-uppercase alt-font light-gray-text brando-post-meta'.$fontsettings_postmeta_class.'">'.$brando_show_date.'</span>';
			                            }
			                            if( $brando_show_post_title == 1 ){
			                                $output .= '<span class="text-extra-large text-uppercase display-block alt-font margin-seven-tb sm-text-medium xs-text-small entry-title'.$fontsettings_title_class.'"><a href="'.get_the_permalink().'">'.get_the_title().'</a></span>';
			                            }
			                            if( $brando_show_separator == 1 ){
			                                $output .= '<div class="separator-line bg-deep-yellow margin-nine-all no-margin-bottom margin-lr-auto"'.$sep_style.'></div>';
			                            }
			                            $output .= '</div>';
			                        $output .= '</div>';
			                    $output .= '</div>';
			                $output .= '</article>';
			            $output .= '</div>';
			        $output .='</div>';
	        	break;

	        	case 'blog-style-3':
	        		$brando_show_date = ( $brando_show_post_date == 1 ) ? '<span class="published">'.get_the_date( $brando_date_format, get_the_ID()).'</span><time class="updated display-none" datetime="'.esc_attr( get_the_modified_date( 'c' ) ).'">'.get_the_modified_date( $brando_date_format ).'</time>' : '';
	        		$brando_show_author = ( $brando_show_post_author == 1 ) ? esc_html__('Posted by','brando-addons').' <span class="author vcard"><a class="url fn n" href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'" class="white-text">'.get_the_author().'</a></span>' : '';
	        		$output .= '<div '.$brando_post_classes.'>';
			        	$output .= '<div class="blog-post-style4 '.$brando_token_class.'">';
			        		$output .= '<article>';
			        			if( $brando_show_post_thumbnail == 1 ){
				                    $output .= '<div class="post-thumbnail">';
				                       	if($post_format == 'image' && $brando_show_post_feature_image != 1 ){
				                            ob_start();
				                            	include BRANDO_ADDONS_ROOT . '/loop/loop-image.php';
				                                $output .= ob_get_contents();  
				                            ob_end_clean();  
				                        }elseif($post_format == 'gallery' && $brando_show_post_feature_image != 1 ){
				                            ob_start();
				                            	include BRANDO_ADDONS_ROOT . '/loop/loop-gallery.php';
				                                $output .= ob_get_contents();  
				                            ob_end_clean();  
				                        }elseif($post_format == 'video' && $brando_show_post_feature_image != 1 ){
				                            ob_start();
				                            	include BRANDO_ADDONS_ROOT . '/loop/loop-video.php';
				                                $output .= ob_get_contents();  
				                            ob_end_clean();  
				                        }elseif($post_format == 'quote' && $brando_show_post_feature_image != 1 ){
				                            ob_start();
				                            	include BRANDO_ADDONS_ROOT . '/loop/loop-quote.php';
				                                $output .= ob_get_contents();  
				                            ob_end_clean(); 
				                        }else{
					                    	$output .=  '<div class="blog-image"><a href="'.get_permalink().'">';
											    if ( has_post_thumbnail() ) {
											        $output .= get_the_post_thumbnail( get_the_ID(), $brando_image_srcset,$img_attr );
											    }
											$output .=  '</a></div>';
					                    }
				                    $output .= '</div>';
				                }
			                    $output .= '<div class="container post-details">';
			                        $output .= '<div class="row margin-seven-tb no-margin-lr">';
			                        if( $brando_show_post_date == 1 ){
			                            $output .= '<div class="col-md-6 col-sm-6 col-xs-12">';
			                                $output .= '<div class="col-md-2 col-sm-5 col-xs-12 no-padding"><span class="post-date alt-font fast-green-text xs-title-extra-large-3">'.get_the_date( $brando_day_format, get_the_ID()).'</span></div>';
			                                $output .= '<div class="col-md-9 col-sm-7 no-padding post-date-month-main"><span class="post-date-month font-weight-600 alt-font white-text text-uppercase">'.$brando_show_date.'</span></div>';
			                            $output .= '</div>';
			                        }
			                        if( $brando_show_post_title == 1 || $brando_show_post_author == 1 ){
			                            $output .= '<div class="col-md-5 col-sm-6 col-xs-12">';
			                            	if( $brando_show_post_title == 1 ){
			                                	$output .= '<h6 class="font-weight-600 alt-font margin-four-bottom position-relative top6 xs-text-medium entry-title'.$fontsettings_title_class.'"><a href="'.get_permalink().'">'.get_the_title().'</a></h6>';
			                            	}
			                                if( $brando_show_post_author == 1 ){
			                                	$output .= '<span class="text-small text-uppercase alt-font white-text brando-post-meta'.$fontsettings_postmeta_class.'">'.$brando_show_author.'</span>';
			                                }
			                            $output .= '</div>';
			                        }
			                        $output .= '</div>';
			                    $output .= '</div>';
			                $output .= '</article>';
			            $output .= '</div>';
			        $output .='</div>';
	        	break;

	        	case 'blog-style-4':
	        		$brando_show_date = ( $brando_show_post_date == 1 ) ? get_the_date( $brando_date_format, get_the_ID()) : '';
	        		$output .= '<div '.$brando_post_classes.'>';
		        		$output .= '<article class="blog-listing '.$brando_token_class.'">';
			        		if( $brando_show_post_date == 1 ){
			                    $output .= '<div class="col-md-2 col-sm-2 col-xs-12 text-center alt-font overflow-hidden no-padding-left sm-no-padding md-no-padding">';
			                        $output .= '<div class="post-date xs-margin-lr-auto xs-no-margin-top fast-yellow-text published"><span>'.get_the_date($brando_day_format).'</span><div class="brando-date-month">'.$brando_show_date.'</div></div><time class="updated display-none" datetime="'.esc_attr( get_the_modified_date( 'c' ) ).'">'.get_the_modified_date( $brando_date_format ).'</time>';
			                    $output .= '</div>';
			                }
		                    $output .= '<div class="col-md-10 col-sm-10 col-xs-12 post-details no-padding-right xs-no-padding-left margin-twelve-bottom xs-margin-eighteen-bottom">';
		                    if( $brando_show_post_title == 1 ){
		                        $output .= '<span class="alt-font display-block title-small xs-text-extra-large font-weight-600 sm-text-medium xs-text-center margin-four-bottom entry-title'.$fontsettings_title_class.'"><a href="'.get_permalink().'">'.get_the_title().'</a></span>';
		                    }
		                    if( $brando_show_post_thumbnail == 1 ){
			            		if($post_format == 'image' && $brando_show_post_feature_image != 1 ){
		                            ob_start();
		                            	include BRANDO_ADDONS_ROOT . '/loop/loop-image.php';
		                                $output .= ob_get_contents();  
		                            ob_end_clean();  
		                        }elseif($post_format == 'gallery' && $brando_show_post_feature_image != 1 ){
		                            ob_start();
		                            	include BRANDO_ADDONS_ROOT . '/loop/loop-gallery.php';
		                                $output .= ob_get_contents();  
		                            ob_end_clean();  
		                        }elseif($post_format == 'video' && $brando_show_post_feature_image != 1 ){
		                            ob_start();
		                            	include BRANDO_ADDONS_ROOT . '/loop/loop-video.php';
		                                $output .= ob_get_contents();  
		                            ob_end_clean();  
		                        }elseif($post_format == 'quote' && $brando_show_post_feature_image != 1 ){
		                            ob_start();
		                            	include BRANDO_ADDONS_ROOT . '/loop/loop-quote.php';
		                                $output .= ob_get_contents();  
		                            ob_end_clean(); 
			                    }else{
			                    	$output .=  '<div class="blog-image"><a href="'.get_permalink().'">';
									    if ( has_post_thumbnail() ) {
									        $output .= get_the_post_thumbnail( get_the_ID(), $brando_image_srcset,$img_attr );
									    }
									$output .=  '</a></div>';
			                    }
		                	}
		                    if( $brando_show_excerpt == 1 ){
		                    	$show_excerpt = ( $brando_show_excerpt == 1 ) ? wpautop(brando_get_the_excerpt_theme($brando_excerpt_length)) : wpautop(brando_get_the_excerpt_theme(15));
		                    	$output .= '<div class="margin-five-tb xs-margin-three-tb entry-content">'.$show_excerpt.'</div>';
		                    }elseif($brando_show_content == 1){
	                            $show_content = apply_filters( 'the_content', $post->post_content );
	                            $output .='<div class="margin-five-tb xs-margin-three-tb entry-content">'.$show_content.'</div>';
	                        }
		                    $output .= '<div class="col-md-8 col-sm-12 col-xs-12 no-padding blog-listing-link xs-text-center sm-margin-three-bottom brando-post-meta '.$fontsettings_postmeta_class.'">';
		                        $output .= $post_category;
		                        if( $brando_show_comment == 1 && (comments_open() || get_comments_number())){
		                            ob_start();
		                                comments_popup_link( __( 'Leave a comment', 'brando-addons' ), __( '1 Comment', 'brando-addons' ), __( '% Comments', 'brando-addons' ), 'comment' );
		                                $output .= ob_get_contents();  
		                            ob_end_clean();
		                        }
		                    $output .= '</div>';
		                    $post_title = rawurlencode(get_the_title());
		                    if( $brando_show_icon == 1 ){
		                        $output .= '<div class="col-md-4 col-sm-12 col-xs-12 no-padding text-right sm-text-left xs-text-center">';
		                            $output .= '<div class="blog-sharing sm-no-margin-tb">';
		                            ob_start();
		                            if( $brando_show_facebook == 1 ){
		                            	?>
		                            	<a href="http://www.facebook.com/sharer.php?u=<?php echo esc_url(get_permalink()); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="<?php echo esc_attr($post_title); ?>"><i class="fa fa-facebook"></i></a>
		                            	<?php
		                            }
		                            if( $brando_show_twitter == 1 ){
		                            	?>
		                            	<a href="https://twitter.com/share?url=<?php echo esc_url(get_permalink()); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="<?php echo esc_attr($post_title); ?>"><i class="fa fa-twitter"></i></a>
		                            	<?php
		                            }
		                            if( $brando_show_gplus == 1 ){
		                            	?>
		                            	<a href="//plus.google.com/share?url=<?php echo esc_url(get_permalink()); ?>" target="_blank" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" title="<?php echo esc_attr($post_title); ?>"><i class="fa fa-google-plus"></i></a>
		                            	<?php
		                            }
		                            if( $brando_show_linkedin == 1 ){
		                            	?>
		                            	<a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php echo esc_url(get_permalink()); ?>&amp;title=<?php echo esc_attr($post_title); ?>" target="_blank" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" title="<?php echo $post_title; ?>"><i class="fa fa-linkedin"></i></a>
		                            	<?php
		                            }
		                            if( !empty( $brando_blog_custom_link ) ) {
			                            $output .= nl2br( rawurldecode( base64_decode( strip_tags( $brando_blog_custom_link ) ) ) );
		                            }
		                            $output .= ob_get_contents();  
		                            ob_end_clean();
		                            $output .= '</div>';
		                        $output .= '</div>';
		                    }
		                    if( $brando_show_button == 1 ){
		                        $output .= '<div class="col-md-12 col-sm-12 col-xs-12 no-padding sm-text-left xs-text-center margin-four-tb">';
		                            $output .= '<a href="'.get_permalink().'" class="btn-black btn btn-very-small no-margin">'.$brando_button_text.'</a>';
		                        $output .= '</div>';
		                    }
		                    if( $brando_show_separator == 1 ){
		                        $output .= '<div class="col-md-12 col-sm-12 col-xs-12 no-padding">';
		                            $output .= '<div class="bg-fast-yellow separator-line-thick no-margin-lr margin-three-all no-margin-bottom xs-margin-lr-auto"'.$sep_style.'></div>';
		                        $output .= '</div>';
		                    }
		                    $output .= '</div>';
		                $output .= '</article>';
		            $output .='</div>';
	        	break;

	        	case 'blog-style-5':
	        		$brando_show_date = ( $brando_show_post_date == 1 ) ? '<span class="published">'.get_the_date( $brando_date_format, get_the_ID()).'</span><time class="updated display-none" datetime="'.esc_attr( get_the_modified_date( 'c' ) ).'">'.get_the_modified_date( $brando_date_format ).'</time>' : '';
	        		$brando_show_author = ( $brando_show_post_author == 1 ) ? esc_html__(' / Posted by','brando-addons').' <span class="author vcard"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'" class="light-gray-text url fn n">'.get_the_author().'</a></span>' : '';
	        		$output .= '<div '.$brando_post_classes.'>';
		        		$output .= '<div class="blog-post-style7'.$class_column.' margin-seven-bottom '.$brando_token_class.'">';
		        			if( $brando_show_post_thumbnail == 1 ){
				                $output .='<div class="post-thumbnail overflow-hidden">';
				                    if($post_format == 'image' && $brando_show_post_feature_image != 1 ){
			                            ob_start();
			                            	include BRANDO_ADDONS_ROOT . '/loop/loop-image.php';
			                                $output .= ob_get_contents();  
			                            ob_end_clean();  
			                        }elseif($post_format == 'gallery' && $brando_show_post_feature_image != 1 ){
			                            ob_start();
			                            	include BRANDO_ADDONS_ROOT . '/loop/loop-gallery.php';
			                                $output .= ob_get_contents();  
			                            ob_end_clean();  
			                        }elseif($post_format == 'video' && $brando_show_post_feature_image != 1 ){
			                            ob_start();
			                            	include BRANDO_ADDONS_ROOT . '/loop/loop-video.php';
			                                $output .= ob_get_contents();  
			                            ob_end_clean();  
			                        }elseif($post_format == 'quote' && $brando_show_post_feature_image != 1 ){
			                            ob_start();
			                            	include BRANDO_ADDONS_ROOT . '/loop/loop-quote.php';
			                                $output .= ob_get_contents();  
			                            ob_end_clean();   
				                    }else{
				                        $output .=  '<div class="blog-image"><a href="'.get_permalink().'">';
				                            if ( has_post_thumbnail() ) {
				                                $output .= get_the_post_thumbnail( get_the_ID(), $brando_image_srcset,$img_attr );
				                            }
				                        $output .=  '</a></div>';
				                    }
				                $output .='</div>';
				            }
			                $output .='<div class="post-details margin-eight-top">';
			                	if( $brando_show_post_title == 1 ){
			                    	$output .='<span class="text-large text-uppercase display-block alt-font margin-four-bottom sm-text-medium xs-text-medium alt-font font-weight-700 '.$fontsettings_title_class.'">';
			                        	$output .='<a href="'.get_permalink().'" class="dark-gray-text entry-title">'.get_the_title().'</a>';
			                        $output .='</span>';
			                    }
			                    if( $brando_show_excerpt == 1 ){
			                    	$show_excerpt_grid = ( $brando_show_excerpt == 1 ) ? brando_get_the_excerpt_theme($brando_excerpt_length) : brando_get_the_excerpt_theme(15);
			                    	$output .= '<p class="margin-seven-bottom xs-margin-five-bottom entry-content">'.$show_excerpt_grid.'</p>';
			                	}elseif($brando_show_content == 1){
		                            $show_content = apply_filters( 'the_content', $post->post_content );
		                            $output .='<p class="margin-seven-bottom xs-margin-five-bottom entry-content">'.$show_content.'</p>';
		                        }
			                    if( $brando_show_separator == 1 ){
			                        $output .='<div class="separator-line-full bg-mid-gray3 margin-seven-bottom xs-margin-five-bottom"'.$sep_style.'></div>';
			                    }
			                    if( $brando_show_post_date == 1 || $brando_show_post_author == 1 ){
				                    $output .='<span class="text-small text-uppercase alt-font light-gray-text brando-post-meta'.$fontsettings_postmeta_class.'">';
				                        $output .= $brando_show_date.$brando_show_author;
				                    $output .='</span>';
			                	}
			                $output .='</div>';
			            $output .='</div>';
			        $output .='</div>';
	        	break;
	        }
	        $i++;
        endwhile;
        if( $brando_blog_style == 'blog-style-5'){
    		$output .= '</div>';
    	}
        wp_reset_postdata();
        if( $query->max_num_pages > 1 && $brando_show_post_pagination == 1 ){
        	$query->query_vars['paged'] > 1 ? $current = $query->query_vars['paged'] : $current = 1;
            $output .= '<div class="col-md-12 col-sm-12 col-xs-12 pagination text-center">';
                $output .= paginate_links( array(
                    'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
                    'format'       => '',
                    'add_args'     => '',
                    'current'      => $current,
                    'total'        => $query->max_num_pages,
                    'prev_text'    => '<i class="fa fa-angle-left"></i>',
                    'next_text'    => '<i class="fa fa-angle-right"></i>',
                    'type'         => 'plain',
                    'end_size'     => 3,
                    'mid_size'     => 3
                ) );
            $output .= '</div>';
        }
        if( $id || $class ):
            $output .= '</div>';
        endif;
        return $output;
    }
}
add_shortcode("brando_blog","brando_blog_shortcode");