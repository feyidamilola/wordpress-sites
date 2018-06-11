<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * @property mixed data
 */
if (!class_exists ( 'brando_responsive_font_settings' )) 
{
	class brando_responsive_font_settings 
  	{
		/**
		 * @var array
		 */
		protected $settings = array();
		/**
		 * @var string
		 */
		protected $value = '';

		protected $std = '';
		/**
		 * @var array
		 */
		protected $size_types = array(	

			'lg' => 'Large',
			'md' => 'Medium',
			'sm' => 'Small',
			'xs' => 'Extrasmall',

		);
		/**
		 * @var $param Vc_Column_Offset
		 * @var $sizes Vc_Column_Offset::$size_types
		 */
		protected $layouts = array(
			'xs' => 'portrait-smartphones',
			'sm' => 'portrait-tablets',
			'md' => 'landscape-tablets',
			'lg' => 'default',
		);
		protected $devices_name = array(
			'xs' => 'Mobile',
			'sm' => 'Tablet',
			'md' => 'Mini desktop',
			'lg' => 'Desktop',
		);
		/**
		 * @var array
		 */
		protected $text_tranform = array();
		/**
		 * @var array
		 */
		protected $text_align = array();
		/**
		 * @param $settings
		 * @param $value
		 */
		public function __construct( $settings, $value ) {

			$this->settings = $settings;
			$this->value = $value;

			$this->text_tranform = array(
				esc_html__( 'Capitalize', 'brando-addons' )   => 'capitalize',
				esc_html__( 'Lowercase', 'brando-addons' )  => 'lowercase',
				esc_html__( 'Uppercase', 'brando-addons' ) => 'uppercase',
			);
			$this->text_align = array(
				esc_html__( 'Center', 'brando-addons' )   => 'center',
				esc_html__( 'Left', 'brando-addons' )  => 'left',
				esc_html__( 'Right', 'brando-addons' ) => 'right',
			);
		}
		/**
		 * @return string
		 */
		public function brando_font_settings() 
			{

				ob_start(); 
				$settings = $this->settings;
				$value = $this->value;
				$values = $this->brando_resposive_values( $value );
				$sizes = $this->size_types;
				$layouts = $this->layouts;
				$devices_name=$this->devices_name;

				?>
				<div class="vc_column-offset" data-column-offset="true">
					<div class="brando-font-settings-container button-container">
						<input name="<?php echo esc_attr( $settings['param_name'] ) ?>"
						       class="wpb_vc_param_value <?php echo esc_attr( $settings['param_name'] ) ?>
						<?php echo esc_attr( $settings['type'] ) ?> '_field" type="hidden" value="<?php echo esc_attr( $value ) ?>"/>
						<div class="tab">
							<?php 
							foreach ( $sizes as $key => $size ) : 
								$active = ( $i == 0 ) ? ' active' : '';
							?>
								<h3  class="font-setting-button <?php echo $size.$active;?>"  data-device="<?php echo $size?>-device" title="<?php echo $devices_name[ $key ];?>"><i class="vc-composer-icon vc-c-icon-layout_<?php echo isset( $layouts[ $key ] ) ? $layouts[ $key ] : $key ?>"></i>
								</h3>
							<?php 
								$i++; 
							endforeach 
							?>
						</div>
							<?php 
							foreach ( $sizes as $key => $size ) : 
								$active1 = ( $j == 0 ) ? ' active' : ''; 
								$hide_font_settings_element = $settings['hide_font_settings_element_'.$key];
							?>
								<div  class="<?php echo $size.'-device'.$active1;?> font-setting-content tab-content">
									<div class="brando-font-setting-wrapper">
									<?php 
									if( !in_array( 'text-align', $hide_font_settings_element ) ) {
										echo $this->brando_text_align( $key ,$values );
									}
									if( !in_array( 'font-size', $hide_font_settings_element ) ) {
										echo $this->brando_font_size( $key,$values );
									}
									if( !in_array( 'line-height', $hide_font_settings_element ) ) {
										echo $this->brando_font_height( $key,$values  );
									}
									if( !in_array( 'letter-spacing', $hide_font_settings_element ) ) {
										echo $this->brando_font_letterspacing( $key,$values  );
									}
									if( !in_array( 'font-transform', $hide_font_settings_element ) ) {
										echo $this->brando_font_transform( $key ,$values );
									}
									?>
									</div>
								</div>
							<?php  
								$j++; 
							endforeach; 
							?>
					</div>
				</div>
				<?php
				return ob_get_clean();
			}
		/**
		 * @param $size
		 * @param $values array
		 *
		 * @return string
		 */
		public function brando_font_transform( $size ,$values = array() ) 
			{
				$prefix = 'text-' . $size . '-';
				$field='align_'.$size;
				$empty_label = ( 'xs' === $size ) ? esc_html__( 'No offset', 'brando-addons' ) : esc_html__( 'Inherit from smaller', 'brando-addons' );
				$output .= '<div class=" vc_col-md-6 vc_col-sm-6 vc_col-xs-12"><div class="wpb_element_label">'.esc_html__( 'Text transform', 'brando-addons' ).'</div><select name="vc_' . $size . '_responsive_alignment" class="vc_column_offset_field" data-type="transform-' . $size . '"><option value="">Default</option>';
				foreach ( $this->text_tranform as $label => $index ) {
					$value = $prefix . $index;
					$output .= '<option value="' . $value . '"' . ( in_array( $value,$values ) ? ' selected="true"' : '' ) . '>' . $label . '</option>';
				}
				$output .= '</select></div>';
				return $output;
			}
		/**
		 * @param $size
		 * @param $values array
		 *
		 * @return string
		 */
		public function brando_text_align( $size ,$values = array() ) 
			{
				$prefix = 'text-' . $size . '-';
				$field='align_'.$size;
				$empty_label = ( 'xs' === $size ) ? esc_html__( 'No offset', 'brando-addons' ) : esc_html__( 'Inherit from smaller', 'brando-addons' );
				$output .= '<div class=" vc_col-md-12 vc_col-sm-12 vc_col-xs-12"><div class="wpb_element_label">'.esc_html__( 'Text alignment', 'brando-addons' ).'</div><select name="vc_' . $size . '_responsive_alignment" class="vc_column_offset_field" data-type="alignment-' . $size . '"><option value="">Default</option>';
				foreach ( $this->text_align as $label => $index ) {
					$value = $prefix . $index;
					$output .= '<option value="' . $value . '"' . ( in_array( $value,$values ) ? ' selected="true"' : '' ) . '>' . $label . '</option>';
				}
				$output .= '</select></div>';
				return $output;
			}
		/**
		 * @param $size
		 * @param $values array
		 *
		 * @return string
		 */
		public function brando_font_size( $size, $values = array() ) 
			{	

				$prefix = 'font_' . $size ;
				$title = str_replace('lg', 'Large desktop', $prefix);
				$empty_label = ( 'xs' === $size ) ? esc_html__( 'No offset', 'brando-addons' ) : esc_html__( 'Inherit from smaller', 'brando-addons' );
				
				$output .= '<div class=" vc_col-md-6 vc_col-sm-6 vc_col-xs-12"><div class="wpb_element_label">'.esc_html__( 'Font size','brando-addons').'<small> ('.esc_html__( 'in px','brando-addons').')</small></div><input type="text" data-type="font-' . $size . '" value="'.$values[$prefix].'"/></div>';
				return $output;
			}
		/**
		 * @param $size
		 * @param $values array
		 *
		 * @return string
		 */
		public function brando_font_height( $size, $values = array()  ) 
			{
				$prefix = 'line_' . $size;
				$empty_label = ( 'xs' === $size ) ? esc_html__( 'No offset', 'brando-addons' ) : esc_html__( 'Inherit from smaller', 'brando-addons' );
				$output = '<div class=" vc_col-md-6 vc_col-sm-6 vc_col-xs-12"><div class="wpb_element_label">'.esc_html__( 'Line Height','brando-addons').'<small> ('.esc_html__( 'in px','brando-addons').')</small></div><input type="text" data-type="line-' . $size . '" value="'.$values[$prefix].'" /></div>';
				return $output;
			}
		/**
		 * @param $size
		 * @param $values array
		 *
		 * @return string
		 */
		public function brando_font_letterspacing( $size, $values = array()  ) 
			{
				$prefix = 'letter_' . $size;
				$empty_label = ( 'xs' === $size ) ? esc_html__( 'No offset', 'brando-addons' ) : esc_html__( 'Inherit from smaller', 'brando-addons' );
				$output = '<div class=" vc_col-md-6 vc_col-sm-6 vc_col-xs-12"><div class="wpb_element_label">'.esc_html__( 'Letter Spacing','brando-addons').'<small> ('.esc_html__( 'in px','brando-addons').')</small></div><input type="text" data-type="letter-' . $size . '" value="'.$values[$prefix].'" /></div>';
				return $output;
			}
		/**
		 * @param $value
		 *
		 * @return array
		 */
		public static function brando_resposive_values( $value ) 
			{
	            $responsive_settings = array( 'font_lg' => '', 'font_md' => '','font_sm' => '', 'font_xs' => '' ,'line_lg' =>'' , 'line_md' =>'' ,'line_sm' =>'','line_xs' =>'' , 'transform_lg'=>'' ,'transform_md'=>'','transform_sm'=>'','transform_sm'=>'','letter_lg'=>'','letter_md'=>'','letter_sm'=>'','letter_xs'=>'','align_lg'=>'','align_md'=>'','align_sm'=>'','align_xs'=>'');
	           return vc_parse_multi_attribute( $value, $responsive_settings );
	        }

	    /**
		 * @param $value
		 * @param $id
		 *
		 * @return string
		 */
		public static function generate_css( $value, $id = '' ) 
			{
	            
	            if( empty( $value ) ){
	                return;
	            }
	            
	            $values = brando_responsive_font_settings::brando_resposive_values( $value );
	            $media_query = array(
	                'desktop' => '',
	                'mini'    => '@media (max-width: 1199px)',
	                'tablet'  => '@media (max-width: 991px)',
	                'mobile'  => '@media (max-width: 767px)',
	            );
	            
	            $res_css = '';
	            $res_style = array( 'desktop' => '','mini'=>'', 'tablet' => '', 'mobile' => '' );

	            // font-size
	            if( isset( $values['font_lg'] ) && $values['font_lg'] != '' ) {
	                $res_style['desktop'] .= 'font-size: '.$values['font_lg'].' !important; ';
	            }
	            if( isset( $values['font_md'] ) && $values['font_md'] != '' ) {
	                $res_style['mini'] .= 'font-size: '.$values['font_md'].' !important; ';
	            }
	            if( isset( $values['font_sm'] )&& $values['font_sm'] != '' ) {
	                $res_style['tablet'] .= 'font-size: '.$values['font_sm'].' !important; ';
	            }
	            if( isset( $values['font_xs'] ) && $values['font_xs'] != '' ) {
	                $res_style['mobile'] .= 'font-size: '.$values['font_xs'].' !important; ';
	            }
	            // text-alignment
	            if( isset( $values['align_lg'] ) && $values['align_lg'] != '' ) {
	            	$align = str_replace('text-lg-','',$values['align_lg']);
	                $res_style['desktop'] .= 'text-align: '.$align.' !important; ';
	            }
	            if( isset( $values['align_md'] ) && $values['align_md'] != '' ) {
	            	$align = str_replace('text-md-','',$values['align_md']);
	                $res_style['mini'] .= 'text-align: '.$align.' !important; ';
	            }
	            if( isset( $values['align_sm'] )&& $values['align_sm'] != '' ) {
	            	$align = str_replace('text-sm-','',$values['align_sm']);
	                $res_style['tablet'] .= 'text-align: '.$align.' !important; ';
	            }
	            if( isset( $values['align_xs'] ) && $values['align_xs'] != '' ) {
	            	$align = str_replace('text-xs-','',$values['align_xs']);
	                $res_style['mobile'] .= 'text-align: '.$align.' !important; ';
	            }
	            // line-height
	            if( isset( $values['line_lg']) && $values['line_lg'] != '' ) {
	                $res_style['desktop'] .= 'line-height: '.$values['line_lg'].' !important; ';
	            }
	            if( isset( $values['line_md'] ) && $values['line_md'] != '' ) {
	                $res_style['mini'] .= 'line-height: '.$values['line_md'].' !important; ';
	            }
	            if( isset( $values['line_sm'] ) && $values['line_sm'] != '' ) {
	                $res_style['tablet'] .= 'line-height: '.$values['line_sm'].' !important; ';
	            }
	            if( isset( $values['line_xs'] ) && $values['line_xs'] != '' ) {
	                $res_style['mobile'] .= 'line-height: '.$values['line_xs'].' !important; ';
	            }
	            // text-transform
	            if( isset( $values['transform_lg'] ) && $values['transform_lg'] != '' ) {
	            	$trans = str_replace('text-lg-','',$values['transform_lg']);
	                $res_style['desktop'] .= 'text-transform: '.$trans.' !important; ';
	            }
	            if( isset( $values['transform_md'] )&& $values['transform_md'] != '' ) {
	            	$trans = str_replace('text-md-','',$values['transform_md']);
	                $res_style['mini'] .= 'text-transform: '.$trans.' !important; ';
	            }
	            if( isset( $values['transform_sm'] )&& $values['transform_sm'] != '' ) {
	            	$trans = str_replace('text-sm-','',$values['transform_sm']);
	                $res_style['tablet'] .= 'text-transform: '.$trans.' !important; ';
	            }
	            if( isset( $values['transform_xs'] )&& $values['transform_xs'] != '' ) {
	            	$trans = str_replace('text-xs-','',$values['transform_xs']);
	                $res_style['mobile'] .= 'text-transform: '.$trans.' !important; ';
	            }
	            //letter-spacing
	            if( isset( $values['letter_lg']) && $values['letter_lg'] != '' ) {
	                $res_style['desktop'] .= 'letter-spacing: '.$values['letter_lg'].' !important; ';
	            }
	            if( isset( $values['letter_md'] ) && $values['letter_md'] != '' ) {
	                $res_style['mini'] .= 'letter-spacing: '.$values['letter_md'].' !important; ';
	            }
	            if( isset( $values['letter_sm'] ) && $values['letter_sm'] != '' ) {
	                $res_style['tablet'] .= 'letter-spacing: '.$values['letter_sm'].' !important; ';
	            }
	            if( isset( $values['letter_xs'] ) && $values['letter_xs'] != '' ) {
	                $res_style['mobile'] .= 'letter-spacing: '.$values['letter_xs'].' !important; ';
	            }

	            //generate dynamic responsive css
	            if( isset( $res_style['desktop'] ) && $res_style['desktop'] !== '' ) {
	                $res_css .= $media_query['desktop'] . '  '. '.' . $id . ' {' . $res_style['desktop'] . ' }   ';
	            }
	            if( isset( $res_style['mini'] ) && $res_style['mini'] !== '' ) {
	                $res_css .= $media_query['mini'] . ' { '. '.' . $id . ' {' . $res_style['mini'] . ' }  } ';
	            }
	            if( isset( $res_style['tablet'] ) && $res_style['tablet'] !== '' ) {
	                $res_css .= $media_query['tablet'] . ' { '. '.' . $id . ' {' . $res_style['tablet'] . ' }  } ';
	            }
	            if( isset( $res_style['mobile'] ) && $res_style['mobile'] !== '' ) {
	                $res_css .= $media_query['mobile'] . ' { '. '.' . $id . ' {' . $res_style['mobile'] . ' }  } ';
	            }
	            return $res_css;        
	        }
	}
}
/**
 * @param $settings
 * @param $value
 *
 * @return string
 */
if (!function_exists('brando_responsive_font_form_field')) {
	function brando_responsive_font_form_field( $settings, $value ) {
	$responsive_alignment = new brando_responsive_font_settings( $settings, $value );
	return $responsive_alignment->brando_font_settings();
 	}
}

if (function_exists('vc_add_shortcode_param')) {
	vc_add_shortcode_param(	'responsive_font_settings', 'brando_responsive_font_form_field', BRANDO_ADDONS_ROOT_DIR . '/brando-shortcodes/js/font-settings.js');
}