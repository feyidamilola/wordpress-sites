<?php
/**
 * Single Listing Features
 *
 * @package WP Pro Real Estate 7
 * @subpackage Include
 */

global $ct_options;

$ct_rentals_booking = isset( $ct_options['ct_rentals_booking'] ) ? esc_attr( $ct_options['ct_rentals_booking'] ) : '';

do_action('before_single_listing_rental_info');

if($ct_rentals_booking == 'yes') {
    echo '<!-- Rental Info -->';

    echo '<h4 id="listing-rental-info" class="border-bottom marB20">' . __('Rental Information', 'contempo') . '</h4>';

    $checkin = get_post_meta($post->ID, "_ct_rental_checkin", true);
    $checkout = get_post_meta($post->ID, "_ct_rental_checkout", true);

    if( !empty($checkin) || !empty($checkout) ) {
        echo '<!-- Info -->';
        echo '<ul class="propinfo marB0 pad0">';
            ct_rental_info();
        echo '</ul>';
        echo '<!-- //Info -->';
    }

    $extra_people = get_post_meta($post->ID, "_ct_rental_extra_people", true);
    $cleaning = get_post_meta($post->ID, "_ct_rental_cleaning", true);
    $cancellation = get_post_meta($post->ID, "_ct_rental_cancellation", true);
    $deposit = get_post_meta($post->ID, "_ct_rental_deposit", true);

    if( !empty($extra_people) || !empty($cleaning) || !empty($cancellation) || !empty($deposit) ) {
        echo '<!-- Costs & Fees -->';
        echo '<h5 class="marT20">' . __('Prices', 'contempo') . '</h5>';
        echo '<ul class="propinfo marB0 pad0">';
            ct_rental_costs();
        echo '</ul>';
        echo '<!-- //Costs & Fees -->';
    }

    echo '<!-- //Rental Info -->';
}

?>