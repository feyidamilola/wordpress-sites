/**
 * Base
 *
 * @package WP Pro Real Estate 7
 * @subpackage JavaScript
 */

jQuery.noConflict();

(function($) {

	"use strict";
	
	var $sections = $('.form-section');

	function navigateTo(index) {
		// Mark the current section with the class 'current'
		$sections
		  .removeClass('current')
		  .eq(index)
		    .addClass('current');
		// Show only the navigation buttons that make sense for the current section:
		$('.form-navigation .previous').toggle(index > 0);
		var atTheEnd = index >= $sections.length - 1;
		$('.form-navigation .next').toggle(!atTheEnd);
		$('.form-navigation [type=submit]').toggle(atTheEnd);
	}

	function curIndex() {
		// Return the current index by looking at which section has the class 'current'
		return $sections.index($sections.filter('.current'));
	}

	// Previous button is easy, just go back
	$('.form-navigation .previous').click(function() {
		navigateTo(curIndex() - 1);
	});

	// Next button goes forward iff current block validates
	$('.form-navigation .next').click(function() {
		if ($('.demo-form').parsley().validate('block-' + curIndex()))
		  navigateTo(curIndex() + 1);
	});

	// Prepare sections by setting the `data-parsley-group` attribute to 'block-0', 'block-1', etc.
	$sections.each(function(index, section) {
		$(section).find(':input').attr('data-parsley-group', 'block-' + index);
		});
	navigateTo(0); // Start at the beginning
	
})(jQuery);

/*-----------------------------------------------------------------------------------*/
/* Social Popups */
/*-----------------------------------------------------------------------------------*/
	
function popup(pageURL,title,w,h) {
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}