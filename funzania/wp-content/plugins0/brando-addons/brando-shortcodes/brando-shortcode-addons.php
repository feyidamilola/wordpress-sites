<?php
/**
 * The main template file For Brando Theme Addons.
 *
 * @package Brando
 */
?>
<?php
/**
 * Defind Class 
 */
defined('BRANDO_SHORTCODE_ADDONS_URI') or define('BRANDO_SHORTCODE_ADDONS_URI', BRANDO_ADDONS_ROOT.'/brando-shortcodes');
defined('BRANDO_SHORTCODE_ADDONS_EXTEND_COMPOSER') or define('BRANDO_SHORTCODE_ADDONS_EXTEND_COMPOSER', BRANDO_SHORTCODE_ADDONS_URI.'/extend-composer');
defined('BRANDO_SHORTCODE_ADDONS_SHORTCODE_URI') or define('BRANDO_SHORTCODE_ADDONS_SHORTCODE_URI', BRANDO_SHORTCODE_ADDONS_URI.'/shortcodes');
defined('BRANDO_SHORTCODE_ADDONS_MAP_URI') or define('BRANDO_SHORTCODE_ADDONS_MAP_URI', BRANDO_SHORTCODE_ADDONS_URI.'/shortcodes-map');
defined('BRANDO_SHORTCODE_ADDONS_PREVIEW_IMAGE') or define('BRANDO_SHORTCODE_ADDONS_PREVIEW_IMAGE', BRANDO_ADDONS_ROOT_DIR.'/brando-shortcodes/images/preview-image');
if(!class_exists('Brando_Shortcodes_Addons'))
{
  class Brando_Shortcodes_Addons
  {
    // Construct
    public function __construct()
    {
      // Load Required Style For Addons.
      add_action('init', array($this, 'init'));
    }
    public function init(){

      require_once( BRANDO_ADDONS_ROOT.'/brando-shortcodes/brando-shortcode-addons-share.php' );
      require_once( BRANDO_ADDONS_ROOT.'/brando-shortcodes/brando-shortcode-addons-post-like.php' );
      
      // Load Required Style For Addons.
      add_action( 'admin_enqueue_scripts', array($this,'load_custom_wp_admin_style') );
      add_action( 'admin_print_scripts-post.php',   array($this, 'load_custom_wp_admin_style'), 99);
      add_action( 'admin_print_scripts-post-new.php', array($this, 'load_custom_wp_admin_style'), 99);
      if(class_exists('Vc_Manager')){
        // Action For Add Brando Maps And Shortcode In VC.
        add_action('init', array($this,'brando_addons_init'),40);
      }
    }

    public function load_custom_wp_admin_style() {
      // Enqueue Custom JS For WP Admin.*/
      wp_enqueue_script( 'brando-custom-script',   BRANDO_ADDONS_ROOT_DIR . '/brando-shortcodes/js/custom.js' , array('jquery'), '1.0', true );
    }
    
    public function brando_addons_init() {
        // Load Custom Maps.php For VC.
        $this->brando_addons_vc_set_default_post_type();
        // Load Shortcode For Brando Theme.
        $this->brando_addons_vc_load_shortcodes();
        // Load Custom Maps.php For VC.
        $this->brando_addons_vc_integration();
    }

    public function brando_addons_vc_set_default_post_type() {
        global $vc_manager;
          
        $list = array( 'page', 'post', 'portfolio');
        $brando_vc_default_set = $vc_manager->editorPostTypes();
        $brando_vc_default_get = get_option( 'brando_set_default_vc_post_type' );
        if( ( $brando_vc_default_get != 'yes' ) && ( count($brando_vc_default_set) == 1 )  && ( $brando_vc_default_set[0] == 'page') ) {
            $finalArray = array_unique( array_merge( $brando_vc_default_set, $list ) );
            sleep(1);
            $vc_manager->setEditorPostTypes( $finalArray );
            add_option( 'brando_set_default_vc_post_type', 'yes' );
        }
    }

    public function brando_addons_vc_load_shortcodes()
    {
      require_once( BRANDO_SHORTCODE_ADDONS_URI . '/shortcodes.php' );
    }

    public function brando_addons_vc_integration()
    {
      require_once( BRANDO_SHORTCODE_ADDONS_URI . '/maps.php' );
      
    }
  
} // end of class
$Brando_Shortcodes_Addons = new Brando_Shortcodes_Addons();
} // end of class_exists
?>