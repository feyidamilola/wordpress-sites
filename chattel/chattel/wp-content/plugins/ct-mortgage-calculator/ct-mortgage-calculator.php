<?php
/*
Plugin Name: Contempo Mortgage Calculator Widget
Plugin URI: http://makeaccessible.com
Description: A simple mortgage calculator widget
Version: 1.2.0
Author: Make Accessible
Author URI: http://makeaccessible.com
*/

/*-----------------------------------------------------------------------------------*/
/* Add meta links in Plugins table */
/*-----------------------------------------------------------------------------------*/
 
add_filter( 'plugin_row_meta', 'ct_mort_plugin_meta_links', 10, 2 );
function ct_mort_plugin_meta_links( $links, $file ) {

	$plugin = plugin_basename(__FILE__);
	
	// Create Link
	if ( $file == $plugin ) {
		return array_merge(
			$links,
			array( '<a href="http://twitter.com/contempoinc">Follow on Twitter</a>' )
		);
	}
	return $links;
}

/*-----------------------------------------------------------------------------------*/
/* Include CSS */
/*-----------------------------------------------------------------------------------*/
 
function ct_mortgage_calc_css() {		
	wp_enqueue_style( 'ct_mortgage_calc', plugins_url( 'assets/style.css', __FILE__ ), false, '1.0' );
}
add_action( 'wp_print_styles', 'ct_mortgage_calc_css' );

/*-----------------------------------------------------------------------------------*/
/* Include JS */
/*-----------------------------------------------------------------------------------*/

function ct_mortgage_calc_scripts() {
	wp_enqueue_script( 'calc', plugins_url( 'assets/calc.js', __FILE__ ), array('jquery'), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'ct_mortgage_calc_scripts' );

/*-----------------------------------------------------------------------------------*/
/* Register Widget */
/*-----------------------------------------------------------------------------------*/

class ct_MortgageCalculator extends WP_Widget {

	function ct_MortgageCalculator() {
	   $widget_ops = array('description' => 'Display a mortgage calculator.' );
	   parent::__construct(false, __('CT Mortgage Calculator', 'contempo'),$widget_ops);      
	}

	function widget($args, $instance) {  
		
		extract( $args );
		
		$title = $instance['title'];
		$currency = $instance['currency'];
		
	?>
		<?php echo $before_widget; ?>
		<?php if ($title) { echo $before_title . $title . $after_title; }
			global $ct_options; ?>

			<?php echo '<div class="widget-inner">'; ?>
       

<?php

	$lbjs = plugins_url('assets/lightbox.js',__FILE__);
	$lbcss = plugins_url('assets/lightbox.css',__FILE__);
	$cthelp = plugins_url('assets/mortgage-resources.php',__FILE__);


?>
 
<link rel="stylesheet" href="<?php echo $lbcss;?>" >

	            <form id="loanCalc">
	                <fieldset>
	                  <input type="text" name="mcPrice" id="mcPrice" class="text-input" placeholder="<?php _e('Sale price (no separators)', 'contempo'); ?> (<?php echo $currency; ?>)" /><label for='mcPrice' style='display:none'>Sale Price</label>
	                  <input type="text" name="mcRate" id="mcRate" class="text-input" placeholder="<?php _e('Interest Rate (%)', 'contempo'); ?>"/><label for='mcRate' style='display:none'>Interest Rate</label>
	                  <input type="text" name="mcTerm" id="mcTerm" class="text-input" placeholder="<?php _e('Term (years)', 'contempo'); ?>" /><label for='mcTerm' style='display:none'>Term in Years</label>
	                  <input type="text" name="mcDown" id="mcDown" class="text-input" placeholder="<?php _e('Down payment (no separators)', 'contempo'); ?> (<?php echo $currency; ?>)" /><label for='mcDown' style='display:none'>Down Payment</label>
	                  
	                  <input class="btn marB10" type="submit" id="mortgageCalc" value="<?php _e('Calculate', 'contempo'); ?>" onclick="return false"><label style='display:none' for='mortgageCalc'>Submit</label>
	                  <p class="muted monthly-payment"><?php _e('Monthly Payment:', 'contempo'); ?> <strong><?php echo $currency; ?><span id="mcPayment"></span> <span style='font-size:8px;line-height:1em;vertical-align:top'>[<a lightbox='iframe' style='font-size:8px;line-height:1em;vertical-align:top' href='<?php echo $cthelp; ?>'>?</a>]</span></span></strong></p>
 
	                </fieldset>
	            </form>
<script src="<?php echo $lbjs; ?>"></script>


 <script>
[].forEach.call(document.querySelectorAll('[lightbox]'), function(el) {
  el.lightbox = new Lightbox(el);
});
        </script>

            <?php echo '</div>'; ?>
		
		<?php echo $after_widget; ?>   
    <?php
   }

   function update($new_instance, $old_instance) {                
	   return $new_instance;
   }

   function form($instance) {
   
			$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
			$currency = isset( $instance['currency'] ) ? esc_attr( $instance['currency'] ) : '';

		?>
		<p>
		   <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
		   <label for="<?php echo $this->get_field_id('currency'); ?>"><?php _e('Currency:','contempo'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('currency'); ?>"  value="<?php echo $currency; ?>" class="widefat" id="<?php echo $this->get_field_id('currency'); ?>" />
		</p>
		<?php
	}
} 

add_action( 'widgets_init', create_function( '', 'register_widget("ct_MortgageCalculator");' ) );

/*-----------------------------------------------------------------------------------*/
/* Register Shortcode */
/*-----------------------------------------------------------------------------------*/

function ct_mortgage_calc_shortcode($atts) { ?>
 
<?php
	$lbjs = plugins_url('assets/lightbox.js',__FILE__);
	$lbcss = plugins_url('assets/lightbox.css',__FILE__);
	$cthelp = plugins_url('assets/mortgage-resources.php',__FILE__);
?>>

<link rel="stylesheet" href="<?php echo $lbcss; ?>">

        <div class="clear"></div>
	<form id="loanCalc">
		<fieldset>
		  <input type="text" name="mcPrice" id="mcPrice" class="text-input" value="<?php _e('Sale price ($)', 'contempo'); ?>" onfocus="if(this.value=='<?php _e('Sale price ($)', 'contempo'); ?>')this.value = '';" onblur="if(this.value=='')this.value = '<?php _e('Sale price ($)', 'contempo'); ?>';" /><label style='display:none' for='mcPrice'>Sale Price</label>
		  <input type="text" name="mcRate" id="mcRate" class="text-input" value="<?php _e('Interest Rate (%)', 'contempo'); ?>" onfocus="if(this.value=='<?php _e('Interest Rate (%)', 'contempo'); ?>')this.value = '';" onblur="if(this.value=='')this.value = '<?php _e('Interest Rate (%)', 'contempo'); ?>';" /><label style='display:none' for='mcRate'>Interest Rate</label>
		  <input type="text" name="mcTerm" id="mcTerm" class="text-input" value="<?php _e('Term (years)', 'contempo'); ?>" onfocus="if(this.value=='<?php _e('Term (years)', 'contempo'); ?>')this.value = '';" onblur="if(this.value=='')this.value = '<?php _e('Term (years)', 'contempo'); ?>';" /><label style='display:none' for='mcTerm'>Term in Years</label>
		  <input type="text" name="mcDown" id="mcDown" class="text-input" value="<?php _e('Down payment ($)', 'contempo'); ?>" onfocus="if(this.value=='<?php _e('Down payment ($)', 'contempo'); ?>')this.value = '';" onblur="if(this.value=='')this.value = '<?php _e('Down payment ($)', 'contempo'); ?>';" /><label style='display:none' for='mcDown'>Down Payment</label>
		  
		  <input class="btn marB10" type="submit" id="mortgageCalc" value="<?php _e('Calculate', 'contempo'); ?>" onclick="return false"><label for='mortgageCalc' style='display:none'>Calculate</label>
		  <input class="btn reset" type="button" value="Reset" id='mcReset' onClick="this.form.reset()" /><label for='mcReset' style='display:none'>Reset Form</label>
		  <input type="text" name="mcPayment" id="mcPayment" class="text-input" value="<?php _e('Your Monthly Payment', 'contempo'); ?>" /><label style='display:none' for='mcPayment'>Your Monthly Payment [<a href='<?php echo $cthelp; ?>' lightbox='iframe'>?</a>]</label>
		</fieldset>
	</form>

<script src="<?php echo $lbjs; ?>"></script>
 <script>
[].forEach.call(document.querySelectorAll('[lightbox]'), function(el) {
  el.lightbox = new Lightbox(el);
});
        </script>
        <div class="clear"></div>
<?php }
add_shortcode('mortgage_calc', 'ct_mortgage_calc_shortcode');

?>
