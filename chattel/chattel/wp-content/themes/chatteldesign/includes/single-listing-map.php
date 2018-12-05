<?php
/**
 * Single Listing Map
 *
 * @package WP Pro Real Estate 7
 * @subpackage Include
 */

do_action('before_single_listing_map');
            
echo '<!-- Map -->';
echo '<div id="location">';
    echo '<h4 class="border-bottom marB18">' . __('Location', 'contempo') . '</h4>';
    ct_listing_map();
echo '</div>';
echo '<!-- //Map -->';

?>