<?php
/**
 * PixelThrone — Alma — Custom Notices
 */

if (!defined('ABSPATH')) die('-1');
if (!class_exists('pt_notices')) {

	class pt_notices{

	    public function __construct() {
	    }

		public static function custom_error_notice_vcomposer_already_instaled(){
			global $current_screen;
			echo '<div class="error custom_error_notice_file_not_writable">
				<h1>Warning</h1>
				<p>Please install / activate the recommended plugin <b><a href="/wp-admin/themes.php?page=tgmpa-install-plugins">WPBakery Visual Composer</a></b>.
				</div>';
		}
	}

}

