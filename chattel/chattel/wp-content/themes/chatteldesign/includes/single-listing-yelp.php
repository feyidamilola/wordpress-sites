<?php
/**
 * Single Listing Yelp
 *
 * @package WP Pro Real Estate 7
 * @subpackage Include
 */

global $ct_options;

$ct_enable_yelp_nearby = isset( $ct_options['ct_enable_yelp_nearby'] ) ? esc_html( $ct_options['ct_enable_yelp_nearby'] ) : '';
$ct_yelp_consumer_key = isset( $ct_options['ct_yelp_consumer_key'] ) ? esc_html( $ct_options['ct_yelp_consumer_key'] ) : '';
$ct_yelp_consumer_secret_key = isset( $ct_options['ct_yelp_consumer_secret_key'] ) ? esc_html( $ct_options['ct_yelp_consumer_secret_key'] ) : '';
$ct_yelp_token_key = isset( $ct_options['ct_yelp_token_key'] ) ? esc_html( $ct_options['ct_yelp_token_key'] ) : '';
$ct_yelp_token_secret_key = isset( $ct_options['ct_yelp_token_secret_key'] ) ? esc_html( $ct_options['ct_yelp_token_secret_key'] ) : '';

do_action('before_single_listing_yelp');
            
echo '<!-- Nearby -->';
if($ct_yelp_consumer_key != '' && $ct_yelp_consumer_secret_key != '' && $ct_yelp_token_key != '' && $ct_yelp_token_secret_key != '' && class_exists('OAuthToken')) {

    $ct_yelp_amenities = isset( $ct_options['ct_yelp_amenities']['enabled'] ) ? $ct_options['ct_yelp_amenities']['enabled'] : '';

    echo '<div class="listing-nearby" id="listing-nearby">';
        echo '<div class="right yelp-powered-by"><small class="muted left">' . __('powered by ', 'contempo') . '</small><img class="right yelp-logo" src="' . ct_theme_directory_uri() . '/images/yelp-logo-small.png" srcset="' . ct_theme_directory_uri() . '/images/yelp-logo-small@2x.png 2x" height="25" width="50" /></div>';
        echo '<h4 class="border-bottom marB20">' . __('What\'s Nearby?', 'contempo') . '</h4>';
        
        $ct_listing_street_address = get_the_title();
        $ct_listing_city = strip_tags( get_the_term_list( $wp_query->post->ID, 'city', '', ', ', '' ) );
        $ct_listing_state = strip_tags( get_the_term_list( $wp_query->post->ID, 'state', '', ', ', '' ) );
        $ct_listing_zip = strip_tags( get_the_term_list( $wp_query->post->ID, 'zipcode', '', ', ', '' ) );

        $ct_listing_address = $ct_listing_street_address . ', ' . $ct_listing_city . ', ' . $ct_listing_state . ', ' . $ct_listing_zip;

        if ($ct_yelp_amenities) :

        foreach ($ct_yelp_amenities as $field=>$value) {
        
            switch($field) {
                
                // Restaurant            
                case 'restaurant' :

                    echo '<h5><i class="fa fa-cutlery"></i> ' . __('Restaurants', 'contempo') . '</h5>';

                    ct_query_yelp_api('restaurant', $ct_listing_address, '');
                    
                break;

                // Coffee Shops            
                case 'coffee_shops' :

                    echo '<h5><i class="fa fa-coffee"></i> ' . __('Coffee Shops', 'contempo') . '</h5>';

                    ct_query_yelp_api('coffee shop', $ct_listing_address, 'fa-coffee');
                    
                break;

                // Coffee Shops            
                case 'grocery' :

                    echo '<h5><i class="fa fa-shopping-basket"></i> ' . __('Grocery', 'contempo') . '</h5>';

                    ct_query_yelp_api('grocery', $ct_listing_address, 'fa-shopping-basket');
                    
                break;

                // Schools           
                case 'schools' :

                    echo '<h5><i class="fa fa-mortar-board"></i> ' . __('Education', 'contempo') . '</h5>';

                    ct_query_yelp_api('schools', $ct_listing_address, 'fa-mortar-board');
                    
                break;

                // Banks           
                case 'banks' :

                    ct_query_yelp_api('banks', $ct_listing_address, 'fa-bank');
                    
                break;

                // Bars           
                case 'bars' :

                    ct_query_yelp_api('bars', $ct_listing_address, 'fa-beer');
                    
                break;

                // Bars           
                case 'hospitals' :

                    ct_query_yelp_api('hospitals', $ct_listing_address, 'fa-hospital-o');
                    
                break;

                // Bars           
                case 'gas_station' :

                    ct_query_yelp_api('gas stations', $ct_listing_address, 'fa-car');
                    
                break;

            }

        } endif;

    echo '</div>';
}
echo '<!-- // Nearby -->';

?>