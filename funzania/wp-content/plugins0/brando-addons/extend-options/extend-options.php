<?php
/**
 * Extend Theme Option
 */
if ( ! function_exists( 'brando_option' ) ) :
    function brando_option( $brando_option )
    {
        global $brando_theme_settings, $post;
        $brando_single = false;
        if(is_singular()){
            $brando_value = get_post_meta( $post->ID, $brando_option.'_single', true);
            $brando_single = true;
        }

        if($brando_single == true){
            if (is_string($brando_value) && (strlen($brando_value) > 0 || is_array($brando_value)) && $brando_value != 'default') {
                return $brando_value;
            }
        }
        if(isset($brando_theme_settings[$brando_option]) && $brando_theme_settings[$brando_option] != ''){
            $brando_option_value = $brando_theme_settings[$brando_option];
            return $brando_option_value;
        }
        return false;
    }
endif;

if ( ! function_exists( 'brando_under_construction_theme_option' ) ) :
    function brando_under_construction_theme_option() {
    	$brando_under_construction = array(
            'id'       => 'enable_under_construction',
            'type'     => 'switch',
            'title'    => esc_html__('Enable Under Construction', 'brando-addons' ),
            'default'  => false,
            'desc' => esc_html__('Select on to put the site under construction. Only administrator will be able to see frontend site. Please logout to check under construction mode is enabled or not.', 'brando-addons'),
        );

        return ( $brando_under_construction );
    }
endif;

if ( ! function_exists( 'brando_under_construction_template_start_theme_option' ) ) :
    function brando_under_construction_template_start_theme_option() {
    	$brando_under_construction_template = array(
            'id'        => 'opt-accordion-begin-under-construction',
            'type'      => 'accordion',
            'title'     => esc_html__('Under Construction Page', 'brando-addons'),
            'subtitle'  => esc_html__('Select page to display when site is in under construction mode', 'brando-addons'),
            'position'  => 'start',
        );
        return ( $brando_under_construction_template );
    }
endif;

if ( ! function_exists( 'brando_under_construction_template_page_theme_option' ) ) :
    function brando_under_construction_template_page_theme_option() {
    	$brando_under_construction_template = 
        array(
            'id'=>'under_construction_page',
            'type' => 'select',
            'title' => esc_html__('Under Construction Page', 'brando-addons'),
            'data' => 'pages'
        );
        return ( $brando_under_construction_template );
    }
endif;

if ( ! function_exists( 'brando_under_construction_template_end_theme_option' ) ) :
    function brando_under_construction_template_end_theme_option() {
    	$brando_under_construction_template = array(
            'id'        => 'opt-accordion-end-under-construction',
            'type'      => 'accordion',
            'position'  => 'end'
        );
        return ( $brando_under_construction_template );
    }
endif;

/**
 * Force All Page To Under Construction If "enable-under-construction" is enable
 */
if ( ! function_exists( 'brando_get_address' ) ) {
    function brando_get_address() {
        // return the full address
        return brando_get_protocol().'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    } // end function brando_get_address
}

if ( ! function_exists( 'brando_get_protocol' ) ) {
    function brando_get_protocol() {
        // Set the base protocol to http
        $brando_protocol = 'http';
        // check for https
        if ( isset( $_SERVER["HTTPS"] ) && strtolower( $_SERVER["HTTPS"] ) == "on" ) {
            $brando_protocol .= "s";
        }
        
        return $brando_protocol;
    } // end function brando_get_protocol
}
        
add_action( 'init', 'brando_force_under_construction', 1 );
if ( ! function_exists( 'brando_force_under_construction' ) ) {
    function brando_force_under_construction() {

        // this is what the user asked for (strip out home portion, case insensitive)
        $brando_userrequest = str_ireplace(home_url('/'),'',brando_get_address());
        $brando_userrequest = rtrim($brando_userrequest,'');

        if (brando_option('enable_under_construction') == 1 && !current_user_can('level_10') && brando_option('under_construction_page') != '' ) { 
            $brando_do_redirect = '';
            if( get_option('permalink_structure') ){
                $frontpage_id = get_option( 'page_on_front' );
                $post = get_post($frontpage_id); 
                $slug = $post->post_name;
                if( $slug == brando_option( 'under_construction_page' ) ) {
                    $brando_do_redirect = '/';
                }else{
                    $brando_do_redirect = '/'.brando_option( 'under_construction_page' );
                }
            }else{
                $brando_getpost = get_page_by_path( brando_option( 'under_construction_page' ) );
                if ($brando_getpost) {
                    $brando_do_redirect = '/?page_id='.$brando_getpost->ID;
                }
            }

            if( strpos($brando_userrequest, '/contact-form-7/v1') !== false ) {
                return;
            }

            if ( strpos($brando_userrequest, 'wp-login') !== 0 && strpos($brando_userrequest, 'wp-admin') !== 0 ) {
                // Make sure it gets all the proper decoding and rtrim action
                $brando_userrequest = str_replace('*','(.*)',$brando_userrequest);
                $brando_pattern = '/^' . str_replace( '/', '\/', rtrim( $brando_userrequest, '/' ) ) . '/';
                $brando_do_redirect = str_replace('*','$1',$brando_do_redirect);
                if( get_option('permalink_structure') ){
                    $output = preg_replace($brando_pattern, $brando_do_redirect, $brando_userrequest);
                }else{
                    $output = $brando_do_redirect;
                }
                if ($output !== $brando_userrequest) {
                    // pattern matched, perform redirect
                    $brando_do_redirect = $output;
                }
            }else{
                // simple comparison redirect
                $brando_do_redirect = $brando_userrequest;
            }

            if ($brando_do_redirect !== '' && trim($brando_do_redirect,'/') !== trim($brando_userrequest,'/')) {
                // check if destination needs the domain prepended

                if (strpos($brando_do_redirect,'/') === 0){
                    $brando_do_redirect = home_url('/').$brando_do_redirect;
                }

                header ('Location: ' . $brando_do_redirect);
                exit();
                
            }
        }
    } // end funcion redirect
}

/**
 * To Add Under Construction Notice To Adminbar For All Logged User
 */
if ( ! function_exists( 'brando_admin_bar_under_construction_notice' ) ) {
    function brando_admin_bar_under_construction_notice() {
        global $wp_admin_bar;
        
        if (brando_option('enable_under_construction') == 1) {
            $wp_admin_bar->add_menu( array(
                'id' => 'admin-bar-under-construction-notice',
                'parent' => 'top-secondary',
                'href' => esc_url(home_url('/')).'wp-admin/themes.php?page=brando_theme_settings',
                'title' => '<span style="color: #FF0000;">'.esc_html__( 'Under Construction', 'brando-addons' ).'</span>'
            ) );
        }
    }
}
add_action( 'admin_bar_menu', 'brando_admin_bar_under_construction_notice' );

/* Generate custom css base on theme settings */
if( ! function_exists( 'brando_generate_custom_css' ) ) {
    function brando_generate_custom_css() {
        global $tz_featured_array, $tz_featured_mini_desktop_array, $tz_featured_ipad_array, $tz_featured_mobile_array;
        $output_css = '';
        if( !empty($tz_featured_array) || !empty($tz_featured_mini_desktop_array) || !empty($tz_featured_ipad_array) || !empty($tz_featured_mobile_array)){
            ob_start();
                echo '<style id="brando-custom-css" type="text/css">';
                    if( !empty($tz_featured_array) ){
                        foreach ($tz_featured_array as $key => $value) {
                            echo $value;
                        }
                    }
                    if( !empty( $tz_featured_mini_desktop_array) ){
                        echo '@media (max-width: 1199px) {';
                            foreach ($tz_featured_mini_desktop_array as $key => $value) {
                                echo $value;
                            }
                        echo '}';
                    }
                    if( !empty($tz_featured_ipad_array) ){
                        echo '@media (max-width: 991px) {';
                            foreach ($tz_featured_ipad_array as $key => $value) {
                                echo $value;
                            }
                        echo '}';
                    }
                    if( !empty($tz_featured_mobile_array) ){
                        echo '@media (max-width: 767px) {';
                            foreach ($tz_featured_mobile_array as $key => $value) {
                                echo $value;
                            }
                        echo '}';
                    }
                echo '</style>';
            $output_css = ob_get_contents();
            ob_end_clean();

            // 1. Remove comments.
            // 2. Remove whitespace.
            // 3. Remove starting whitespace.
            $output_css = preg_replace( '#/\*.*?\*/#s', '', $output_css );
            $output_css = preg_replace( '/\s*([{}|:;,])\s+/', '$1', $output_css );
            $output_css = preg_replace( '/\s\s+(.*)/', '$1', $output_css );

            print $output_css;
        }
    }
}
add_action( 'wp_footer', 'brando_generate_custom_css', 998 );

if( ! function_exists( 'brando_get_intermediate_image_sizes' ) ) :
    function brando_get_intermediate_image_sizes() {
        global $wp_version;
        $image_sizes = array('full', 'thumbnail', 'medium', 'medium_large', 'large'); // Standard sizes
        if( $wp_version >= '4.7.0'){
            $_wp_additional_image_sizes = wp_get_additional_image_sizes();
            if ( ! empty( $_wp_additional_image_sizes ) ) {
                $image_sizes = array_merge( $image_sizes, array_keys( $_wp_additional_image_sizes ) );
            }
            return apply_filters( 'intermediate_image_sizes', $image_sizes );
        }else{
            return $image_sizes;
        }
    }
endif;

if( ! function_exists( 'brando_get_image_sizes' ) ) :
    function brando_get_image_sizes() {
        global $_wp_additional_image_sizes;

        $sizes = array();

        foreach ( get_intermediate_image_sizes() as $_size ) {
            if ( in_array( $_size, array('full', 'thumbnail', 'medium', 'medium_large', 'large') ) ) {
                $sizes[ $_size ]['width']  = get_option( "{$_size}_size_w" );
                $sizes[ $_size ]['height'] = get_option( "{$_size}_size_h" );
                $sizes[ $_size ]['crop']   = (bool) get_option( "{$_size}_crop" );
            } elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
                $sizes[ $_size ] = array(
                    'width'  => $_wp_additional_image_sizes[ $_size ]['width'],
                    'height' => $_wp_additional_image_sizes[ $_size ]['height'],
                    'crop'   => $_wp_additional_image_sizes[ $_size ]['crop'],
                );
            }
        }
        return $sizes;
    }
endif;

if( ! function_exists( 'brando_get_image_size' ) ) :
        function brando_get_image_size( $size ) {
            $sizes = brando_get_image_sizes();

            if ( isset( $sizes[ $size ] ) ) {
                return $sizes[ $size ];
            }

            return false;
        }
    endif;

if( ! function_exists( 'brando_image_size' ) ) :
    function brando_image_size() {

        $thumbnail_image_sizes = array();

        // Hackily add in the data link parameter.
        $brando_srcset = brando_get_intermediate_image_sizes();

        if(!empty($brando_srcset)) {
            foreach ( $brando_srcset as $value => $label ){
                
                $key = esc_attr( $label );

                $brando_srcset_image_data = brando_get_image_size( $label );
                $width = ( $brando_srcset_image_data['width'] == 0 ) ? esc_html( 'Auto', 'brando' ) : $brando_srcset_image_data['width'].'px';
                $height = ( $brando_srcset_image_data['height'] == 0 ) ? esc_html( 'Auto', 'brando' ) : $brando_srcset_image_data['height'].'px';
                if( $label == 'full' ) {
                    $data = esc_html__( 'Original Full Size', 'brando' );
                } else {
                    $data = ucwords( str_replace( '_', ' ', str_replace( '-', ' ', esc_attr( $label ) ) ) ).' ('.esc_attr( $width ).' X '.esc_attr( $height ).')';
                }

                $thumbnail_image_sizes[$data] = $key;
            }
        }

        return $thumbnail_image_sizes;
    }
endif;

if( ! function_exists( 'brando_addons_text_align_css' ) ) {
    function brando_addons_text_align_css() {
        global $font_settings_array;

        $output_css = '';
        if( !empty($font_settings_array)) {
            ob_start();
                echo '<style id="brando-addon-custom-css" type="text/css">';
                    foreach ($font_settings_array as $key => $value) {
                        echo $value;
                    }    
                echo '</style>';
            $output_css = ob_get_contents();
            ob_end_clean();

            // 1. Remove comments.
            // 2. Remove whitespace.
            // 3. Remove starting whitespace.
            $output_css = preg_replace( '#/\*.*?\*/#s', '', $output_css );
            $output_css = preg_replace( '/\s*([{}|:;,])\s+/', '$1', $output_css );
            $output_css = preg_replace( '/\s\s+(.*)/', '$1', $output_css );

            ?>
                <script type="text/javascript"> (function($) { $('head').append('<?php print $output_css; ?>'); })(jQuery); </script>
            <?php   
        }
    }
}
add_action( 'wp_footer', 'brando_addons_text_align_css', 998 );

if( ! function_exists( 'brando_portfolio_dropdown_categories' ) ) {
    function brando_portfolio_dropdown_categories( $args = array() ) {
        global $wp_query;

        $args = wp_parse_args( $args, array(
            'pad_counts'         => 1,
            'show_count'         => 1,
            'hierarchical'       => 1,
            'hide_empty'         => 1,
            'show_uncategorized' => 1,
            'orderby'            => 'name',
            'selected'           => isset( $wp_query->query_vars['portfolio_cat'] ) ? $wp_query->query_vars['portfolio_cat']: '',
            'menu_order'         => false,
            'show_option_none'   => __( 'Select a category', 'woocommerce' ),
            'option_none_value'  => '',
            'value_field'        => 'slug',
            'taxonomy'           => 'portfolio-category',
            'name'               => 'portfolio_cat',
            'class'              => 'portfolio_categories',
        ) );

        if ( 'order' === $args['orderby'] ) {
            $args['menu_order'] = 'asc';
            $args['orderby']    = 'name';
        }

        wp_dropdown_categories( $args );
    }
}