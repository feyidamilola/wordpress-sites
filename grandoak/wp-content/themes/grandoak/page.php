<?php
/**
 * Page for one page Layouts
 **/

get_header();
global $pt_theme_options;
$pages = get_pages( array(
	                    'sort_order'  => 'ASC',
	                    'sort_column' => 'menu_order'
                    ) );


global $post, $post_custom_css;

$post_custom_css = '';

	if ( $pages ) {
		$pages_list    = $pages;
		$direct_access = false;
		$page_html     = '';

		//$footer_page = pt_get_page_by_template('template-footer.php');
		$portfolio_page = pt_get_page_by_template( 'template-portfolio.php' );

		if ( ! is_front_page() ) {
			if ( have_posts() ) :
				$direct_access = true;
				$page_key      = pt_get_key_by_value( $pages, 'ID', get_the_id() );
				if ( $page_key ) :
					$pages_list = array( $pages[ $page_key ] );
				else :
					$pages_list   = array();
					$pages_list[] = $post;
				endif;

			else:
				_e( "It seems we can't find what you're looking for...", 'pt_framework' );
			endif;
		}

		if ( vc_mode() != 'page_editable' && $direct_access === false ):

			$external_link = false;
			if ( isset( $pt_theme_options['website_navigatio_type'] ) && $pt_theme_options['website_navigatio_type'] == 2 ) {
				$external_link = true;
			}

			if ( ! $external_link ) {

				$args = array(
					'post_type'      => 'page',
					'post_status'    => 'publish',
					'posts_per_page' => - 1
				);

				query_posts( $args );
			}


		endif;

		echo '<div class="pages-holder">';

			while( have_posts() ) : the_post();

			$page = pt_get_page_options( $post->ID );

			if ( isset( $page['show_page'] ) ) {
				$show_page = $page['show_page'];
			} else {
				$show_page = true;
			}

			if ( ( $direct_access === false && $show_page !== false ) || $direct_access === true ) {

				$has_bg_slider = ( isset( $page['raw']['bg_images'] ) && count( $page['raw']['bg_images'] ) > 1 ? true : false );

				$classes = '';

				if ( isset( $page['raw'] ) ) {
					$classes .= ( ( $page['raw']['bg_type'] == 'image' && $has_bg_slider ) ? ' has-bg-slider ' : '' );
					$classes .= ( ( $page['raw']['bg_type'] == 'video' && $page['raw']['video_file_mp4'] ) ? ' has-bg-video ' : '' );
				}

				if ( $portfolio_page ) {

					foreach ( $portfolio_page as $key => $value ) {

						if ( $post->ID === $portfolio_page[ $key ]->ID ) {

							$is_include        = true;
							$portfolio_page_id = $portfolio_page[ $key ]->ID;

							include( 'template-portfolio.php' );
						}
					}
				}

				$templates_denied = array(
					'template-blank.php',
					'template-footer.php',
					'template-blog.php',
					'template-portfolio.php'
				);

				if ( ! in_array( $page['template'], $templates_denied ) ) {


					if( !post_password_required($post->ID) ) {

							echo '<section id="' . $page['post_name'] . '" class="' . $page['class'] . $classes . '" style="' . $page['style'] . '" ' . $page['attr'] . '>';

							if ( get_edit_post_link( $post->ID ) ) {
								echo '<a href="' . get_edit_post_link( $post->ID ) . '" class="QuickEdit" target="_blank"><i class="ion-edit"></i></a>';
							}

							echo '<div class="' . $page['pattern_class'] . '" style="' . $page['pattern_style'] . '"></div>';

							if ( isset( $page['raw']['has_shadow'] ) && $page['raw']['has_shadow'] ) {
								echo '<div class="section-shadow"></div>';
							}

							if ( isset( $page['raw'] ) && $page['raw']['bg_type'] == 'image' && $has_bg_slider ) {
								echo '<div class="slider-pt">';
								foreach ( $page['raw']['bg_images'] as $row ) {
									echo '<div class="pt-slider-cover slide" style="background-image: url(' . $row['url'] . ');"></div>';
								}
								echo '</div>';
							}

							if ( isset( $page['raw'] ) && $page['raw']['bg_type'] == 'video' && $page['raw']['video_file_mp4'] ) {
								echo '<video id="video_' . $page['raw']['video_file_mp4']['id'] . '" class="video-bg" autoplay="autoplay" preload="auto" loop volume="' . (int) $page['raw']['video_volume'] . '" ' . ( $page['raw']['video_img_fallback'] ? 'poster="' . $page['raw']['video_img_fallback']['url'] . '"' : '' ) . '>
								<source src="' . $page['raw']['video_file_mp4']['url'] . '" type="video/mp4">
								' . ( $page['raw']['video_file_webm'] ? '<source src="' . $page['raw']['video_file_webm']['url'] . '" type="video/webm">' : '' ) . '
								</video>';
							}

							echo '<div class="content" style="' . $page['content_style'] . '">';

							echo '<div class="container master-container" role="main">';

							$title_type = "style_1";
							if ( isset( $page['raw']['page_title'] ) ) {
								$title_type = $page['raw']['page_title'];
							}

							if ( $page['page_title'] ) {
								if ( $title_type == "style_1" ) {
									echo '<h1 class="page-title ' . $title_type . '"><span>' . $page['page_title'] . '</span></h1>';
								}
							} else {
								if ( $direct_access === true ) {
									echo '<div class="direct-access"></div>';
								}
							}

							echo $page['page_content'];

							echo '</div>';
							echo '</div>';

							echo '</section>';

					} else {
						if ( $direct_access ) {

							$_adminURL = get_option( 'siteurl' );
							$__        = array(
								'text'  => esc_html__( "This content is password protected.", 'pt_framework' ),
								'text1' => esc_html__( "To view it please enter your password below:", 'pt_framework' )
							);
							echo
<<<HTML
							<section id="{$page['post_name']}" class="{$page['class']} $classes" style="{$page['style']}" {$page['attr']}>
								<div class="password-page-required">
									<h3>{$__['text']}</h3>
									<p>{$__['text1']}</p>
								
									<form action="{$_adminURL}/wp-login.php?action=postpass" class="post-password-form" method="post">
										<label for="pwbox-2077">Password: <input name="post_password" id="pwbox-2077" type="password" size="20"></label>
										
										<input type="submit" name="Submit" value="Enter">
									</form>
								</div>

							</section>
HTML;


						}

					}


					# Add footer shortcodes css to dom
					$post_custom_css .= get_post_meta( $post->ID, '_wpb_shortcodes_custom_css', true );

				}
				//}

			}

		endwhile;

		echo '</div>';
	}


get_footer();