<?php
/*
  Template name: My Account
  This templates add My account to the sidebar.
 */

$wishlist_active = false;
$lt_pageName = get_the_title();
$current_url = get_permalink();
$wishlist_page_id = yith_wcwl_object_id(get_option('yith_wcwl_wishlist_page_id'));
if($wishlist_page_id && (int) $wishlist_page_id == (int) $post->ID){
    $wp->query_vars["wishlist-action"] = true;
}

$wishlist_url = '/';
if (defined('YITH_WCWL')) {
    global $yith_wcwl;
    $wishlist_url = $yith_wcwl->get_wishlist_url('');

    if (isset($wp->query_vars["wishlist-action"])) {
        $lt_pageName = esc_html__('Wishlist', 'altotheme');
        $wishlist_active = true;
    }
}

if (isset($wp->query_vars['view-order']) && (int) $wp->query_vars['view-order']) :
    $wp->query_vars['orders'] = true;
endif;

$myaccount_page_id = get_option('woocommerce_myaccount_page_id');
$myaccount_page = get_permalink($myaccount_page_id);

get_header();
if (has_excerpt()) { ?>
    <div class="page-header">
        <?php the_excerpt(); ?>
    </div>
<?php } ?>
<?php lt_get_breadcrumb(); ?>
<div class="page-wrapper my-account">
    <div class="row">
        <div id="content" class="large-12 columns" role="main">

            <?php if (is_user_logged_in()) : ?>
                <div class="row collapse vertical-tabs">
                    <div class="large-3 columns">
                        <div class="account-user hide-for-small">
                            <?php
                            $current_user = wp_get_current_user();
                            $user_id = $current_user->ID;
                            echo get_avatar($user_id, 60);
                            ?>
                            <span class="user-name"><?php echo esc_attr($current_user->display_name); ?></span>
                            <span class="logout-link"><a href="<?php echo wp_logout_url(); ?>"><?php esc_html_e('Logout', 'altotheme'); ?></a></span>
                            <br />
                        </div>
                        <div class="account-nav">
                            <div class="menu-my-account-container">
                                <ul class="tabs-nav">
                                    <?php
                                    $lt_wc_acc_items = wc_get_account_menu_items();
                                    $custom_class = $wishlist_active ? ' no-active' : '';
                                    if ($lt_wc_acc_items) :
                                        foreach ($lt_wc_acc_items as $endpoint => $label) :

                                            if (isset($wp->query_vars[$endpoint])) :
                                                $lt_pageName = $label;
                                            endif;
                                            
                                            if ($endpoint == 'orders' && $wishlist_url != '/') :
                                                ?>
                                                <li class="woo-wishlist<?php echo $wishlist_active ? ' is-active' : ''; ?>">
                                                    <a href="<?php echo esc_url($wishlist_url); ?>"><?php echo esc_html__('Wishlist', 'altotheme'); ?></a>
                                                </li>
            <?php endif; ?>

                                            <li class="<?php echo wc_get_account_menu_item_classes($endpoint) . $custom_class; ?>">
                                                <a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>"><?php echo esc_html($label); ?></a>
                                            </li>
                                        <?php endforeach;
                                    endif;
                                    ?>
                                </ul>
                            </div>

                        </div><!-- .account-nav -->
                    </div><!-- .large-3 -->

                    <div class="large-9 columns">
                        <div class="tabs-inner active lt-my-acc-content">
                            <h4 class="heading-title"><span><?php echo esc_html($lt_pageName); ?></span></h4>
                            <div class="bery-hr medium"></div>
                            <?php echo (!$wishlist_active && shortcode_exists('woocommerce_my_account')) ? do_shortcode('[woocommerce_my_account]') : ''; ?>
                            <?php echo ($wishlist_active && shortcode_exists('yith_wcwl_wishlist')) ? do_shortcode('[yith_wcwl_wishlist]') : ''; ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <?php the_content(); ?>
                            <?php endwhile; // end of the loop.  ?>
                        </div><!-- .tabs-inner -->
                    </div><!-- .large-9 -->
                </div><!-- .row .vertical-tabs -->

            <?php else : ?>
                <h1 class="margin-top-20"><?php echo esc_html__('Login or Register', 'altotheme'); ?></h1>
                <?php echo shortcode_exists('woocommerce_my_account') ? do_shortcode('[woocommerce_my_account]') : ''; ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; // end of the loop.  ?>
            <?php endif; ?>

        </div><!-- end #content large-12 -->
    </div><!-- end row -->
</div><!-- end page-right-sidebar container -->
<?php /*if ($wishlist_active) : ?>
    <span id="lt-wishlist-reload" class="hidden-tag"></span>
<?php
endif;*/

get_footer();