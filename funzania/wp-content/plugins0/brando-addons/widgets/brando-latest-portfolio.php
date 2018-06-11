<?php
/**
 * @package Brando
 */
?>
<?php
/*******************************************************************************/
/* Start Recent Portfolio With Image Thumb  */
/*******************************************************************************/
if (!class_exists('brando_recent_portfolio_widget')) {
	class brando_recent_portfolio_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
			'brando_recent_portfolio_widget',
			esc_html__('Brando Recent Portfolio Widget', 'brando-addons'),
			array( 'description' => esc_html__( 'Your site most recent Portfolios.', 'brando-addons' ), ) // Args
			);
		}

		public function widget( $args, $instance ) {
		    
		    $brando_options = get_option( 'brando_theme_setting' );
			$brando_no_image = (isset($brando_options['brando_no_image'])) ? $brando_options['brando_no_image'] : '';
	        $postperpage =  $instance['postperpage'] ;
	        $thumbnail = $instance['thumbnail'] ;
	        $brando_portfolio_title = isset( $instance['brando_portfolio_title'] ) ? $instance['brando_portfolio_title'] : 'on' ;
	        $brando_portfolio_author = isset( $instance['brando_portfolio_author'] ) ? $instance['brando_portfolio_author'] : 'on' ;
	        $brando_portfolio_date = isset( $instance['brando_portfolio_date'] ) ? $instance['brando_portfolio_date'] : 'on' ;
	        $brando_portfolio_date_format = isset( $instance['brando_portfolio_date_format'] ) ? $instance['brando_portfolio_date_format'] : 'd F' ;
			$title = apply_filters( 'widget_title', $instance['title'] );
			echo $args['before_widget'];
			if ( ! empty( $title ) )
				echo $args['before_title'] . $title . $args['after_title'];
			
			$brando_recent_portfolio = array(
				'post_type' => 'portfolio', 
				'posts_per_page' => $postperpage
				);
			$the_query = new WP_Query( $brando_recent_portfolio );
			$img_url = '';
			
			if ( $the_query->have_posts() ) {
				echo '<div class="widget-body">';
					echo '<ul class="widget-posts">';
					while ( $the_query->have_posts() ) {
						$the_query->the_post();

						$brando_portfolio_meta_array = array();

						$url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
						if( $url ){
							$img_url = $url;
						}else{
							$img_url = $brando_no_image['url'];
						}
						echo '<li class="clearfix">';
							if($thumbnail == 'on'){
								echo '<a href="'.get_permalink().'">';
								if ( has_post_thumbnail() ) {
					                the_post_thumbnail( 'recent-posts-thumb' );
					            } elseif( !empty( $brando_no_image['url'] ) ) {

					            	$no_image_id = brando_get_attachment_id_from_url( $brando_no_image['url'] );
					            	$thumb_no_image = wp_get_attachment_image_src($no_image_id, 'full');

					                $srcset_no_image = $srcset_data_no_image = $sizes_no_image = $sizes_data_no_image = '';
					                $srcset_no_image = wp_get_attachment_image_srcset( $no_image_id, 'full' );
					                if( $srcset_no_image ){
					                    $srcset_data_no_image = ' srcset="'.esc_attr( $srcset_no_image ).'"';
					                }

					                $sizes_no_image = wp_get_attachment_image_sizes( $no_image_id, 'full' );
					                if( $sizes_no_image ){
					                    $sizes_data_no_image = ' sizes="'.esc_attr( $sizes_no_image ).'"';
					                }
					                echo '<img src="'.$thumb_no_image[0].'" width="'.$thumb_no_image[1].'" height="'.$thumb_no_image[2].'" alt="'.__( 'No Image', 'brando-addons' ).'"'.$srcset_data_no_image.$sizes_data_no_image.' />';
					            }
								echo '</a>';
							}
							echo '<div class="widget-posts-details">';
								if( $brando_portfolio_title == 'on' ) {
									echo '<a href="'.get_permalink().'">'.get_the_title().'</a>';
								}

								if( $brando_portfolio_author == 'on' ) {
									$brando_portfolio_meta_array[] = get_the_author();
								}
								if( $brando_portfolio_date == 'on' && $brando_portfolio_date_format != '' ) {
									$brando_portfolio_meta_array[] = get_the_date( $brando_portfolio_date_format, get_the_ID() );
								}

								if( !empty( $brando_portfolio_meta_array ) ) {
                                   $brando_portfolio_meta_list = implode( " - ", $brando_portfolio_meta_array );
                                   echo $brando_portfolio_meta_list;
                                }


							echo '</div>';
						echo '</li>';
					}
					wp_reset_postdata();
					echo '</ul>';
				echo '</div>';
	        }
	        echo $args['after_widget'];
		}
			
		// Widget Backend 
		public function form( $instance ) {
			$title = (isset($instance[ 'title' ])) ? $instance[ 'title' ] : '';
			$postperpage = (isset($instance[ 'postperpage' ])) ? $instance[ 'postperpage' ] : '';

			if(isset($instance['thumbnail'])){
				$thumbnail = ($instance['thumbnail'] == 'on') ? 'checked="checked"' : '';
			}else{
				$thumbnail = '';
			}

			if( isset( $instance['brando_portfolio_title'] ) ) {
				$brando_portfolio_title = ( $instance['brando_portfolio_title'] == 'on' ) ? 'checked="checked"' : '';
			} else {
				$brando_portfolio_title = 'checked="checked"';
			}

			if( isset( $instance['brando_portfolio_author'] ) ) {
				$brando_portfolio_author = ( $instance['brando_portfolio_author'] == 'on' ) ? 'checked="checked"' : '';
			} else {
				$brando_portfolio_author = 'checked="checked"';
			}

			if( isset( $instance['brando_portfolio_date'] ) ) {
				$brando_portfolio_date = ( $instance['brando_portfolio_date'] == 'on' ) ? 'checked="checked"' : '';
			} else {
				$brando_portfolio_date = 'checked="checked"';
			}

			$brando_portfolio_date_format = (isset($instance[ 'brando_portfolio_date_format' ])) ? $instance[ 'brando_portfolio_date_format' ] : 'd F';

			// Widget admin form
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'brando-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'postperpage' ); ?>"><?php esc_html_e( 'Number of posts to show:', 'brando-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'postperpage' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'postperpage' ); ?>" type="text" value="<?php echo esc_attr( $postperpage ); ?>" />
			</p>
			<p>
				<input class="checkbox" id="<?php echo $this->get_field_id( 'thumbnail' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'thumbnail' ); ?>" type="checkbox" <?php echo $thumbnail; ?> />
				<label for="<?php echo $this->get_field_id( 'thumbnail' ); ?>"><?php esc_html_e( 'Display Thumbnail?', 'brando-addons' ); ?></label> 
			</p>
			<p>
				<input class="checkbox" id="<?php echo $this->get_field_id( 'brando_portfolio_title' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'brando_portfolio_title' ); ?>" type="checkbox" <?php echo $brando_portfolio_title; ?> />
				<label for="<?php echo $this->get_field_id( 'brando_portfolio_title' ); ?>"><?php esc_html_e( 'Display Post Title?', 'brando-addons' ); ?></label> 
			</p>
			<p>
				<input class="checkbox" id="<?php echo $this->get_field_id( 'brando_portfolio_author' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'brando_portfolio_author' ); ?>" type="checkbox" <?php echo $brando_portfolio_author; ?> />
				<label for="<?php echo $this->get_field_id( 'brando_portfolio_author' ); ?>"><?php esc_html_e( 'Display Post Author?', 'brando-addons' ); ?></label> 
			</p>
			<p>
				<input class="checkbox" id="<?php echo $this->get_field_id( 'brando_portfolio_date' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'brando_portfolio_date' ); ?>" type="checkbox" <?php echo $brando_portfolio_date; ?> />
				<label for="<?php echo $this->get_field_id( 'brando_portfolio_date' ); ?>"><?php esc_html_e( 'Display Post Date?', 'brando-addons' ); ?></label> 
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'brando_portfolio_date_format' ); ?>"><?php esc_html_e( 'Date Format:', 'brando-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'brando_portfolio_date_format' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'brando_portfolio_date_format' ); ?>" type="text" value="<?php echo esc_attr( $brando_portfolio_date_format ); ?>" />
			</p>
		<?php 
		}
		
		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['postperpage'] = ( ! empty( $new_instance['postperpage'] ) ) ? strip_tags( $new_instance['postperpage'] ) : '';
			$instance['thumbnail'] = ( ! empty( $new_instance['thumbnail'] ) ) ? strip_tags( $new_instance['thumbnail'] ) : '';
			$instance['brando_portfolio_title'] = ( ! empty( $new_instance['brando_portfolio_title'] ) ) ? strip_tags( $new_instance['brando_portfolio_title'] ) : '';
			$instance['brando_portfolio_author'] = ( ! empty( $new_instance['brando_portfolio_author'] ) ) ? strip_tags( $new_instance['brando_portfolio_author'] ) : '';
			$instance['brando_portfolio_date'] = ( ! empty( $new_instance['brando_portfolio_date'] ) ) ? strip_tags( $new_instance['brando_portfolio_date'] ) : '';
			$instance['brando_portfolio_date_format'] = ( ! empty( $new_instance['brando_portfolio_date_format'] ) ) ? strip_tags( $new_instance['brando_portfolio_date_format'] ) : '';
			return $instance;
		}
	}
}
/*******************************************************************************/
/* End Recent Portfolio With Image Thumb  */
/*******************************************************************************/


// Register and load Brando custom widget
if ( ! function_exists( 'brando_recent_portfolio_post_widget' ) ) :
	function brando_recent_portfolio_post_widget() {
		register_widget( 'brando_recent_portfolio_widget' );
	}
endif;
add_action( 'widgets_init', 'brando_recent_portfolio_post_widget' );