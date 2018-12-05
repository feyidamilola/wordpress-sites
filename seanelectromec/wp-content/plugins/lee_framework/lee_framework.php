<?php
/**
 * Plugin Name: LEE Framework
 * Plugin URI: http://leetheme.com
 * Description: Framework
 * Version: 1.1
 * Author: Derry Vu
 * Author URI: derryvu@gmail.com
 * License: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: lee_framework
 * Domain Path: /languages
 */
//echo 'lee_framework.php';
define('LEE_FRAMEWORK_ACTIVED', true, true);
define('LEE_FRAMEWORK_PLUGIN_PATH', plugin_dir_path( __FILE__ ));
define('LEE_FRAMEWORK_PLUGIN_URL',  plugin_dir_url( __FILE__ ));

define('LEE_VISUAL_COMPOSER_ACTIVED', class_exists('Vc_Manager'));

// Back-end
if(is_admin()){
    foreach (glob(LEE_FRAMEWORK_PLUGIN_PATH . '/admin/*.php') as $file) {
        include_once $file;
    }
}

// Includes
foreach (glob(LEE_FRAMEWORK_PLUGIN_PATH . '/includes/*.php') as $file) {
    include_once $file;
}

// Include post-type
foreach (glob(LEE_FRAMEWORK_PLUGIN_PATH . '/post-type/*.php') as $file) {
    include_once $file;
}

add_action('plugins_loaded', 'lee_framework_load_textdomain');
function lee_framework_load_textdomain() {
    $locale = apply_filters('plugin_locale', get_locale(), 'lee_framework');
    load_textdomain('lee_framework', LEE_FRAMEWORK_PLUGIN_PATH . 'languages/lee_framework-' . $locale . '.mo');
    load_plugin_textdomain('lee_framework', false, LEE_FRAMEWORK_PLUGIN_PATH . '/languages/');
}