<?php

/**
 *
 * Override this template by copying it to yourtheme/woocommerce/content-widget-product.php
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.5.0
 */

global $product, $post, $lt_opt;
$class = ' wow fadeInUp '.$lt_opt['animated_products'];

if(!isset($delay)){
    global $delay;
    $_delay_item = (isset($lt_opt['delay_overlay']) && (int) $lt_opt['delay_overlay']) ? (int) $lt_opt['delay_overlay'] : 100;
    $delay = !$delay ? 0 : $delay;
    $delay += $_delay_item;
}

$rating_html = LEE_WOO_LATEST ? wc_get_rating_html($product->get_average_rating()) : $product->get_rating_html();

$tag_wapper = (isset($wapper) && $wapper == 'div') ? '' : '<li class="li_wapper">';
echo $tag_wapper;
?>
<div class="row item-product-widget clearfix<?php echo esc_attr($class); ?>" data-wow-duration="1s" data-wow-delay="<?php echo (int)$delay; ?>ms">
    <div class="large-4 medium-6 small-4 columns images">
        <a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
            <?php echo $product->get_image('shop_thumbnail'); ?>
            <div class="overlay"></div>
        </a>
    </div>
    <div class="large-8 medium-6 small-8 columns product-meta">
        <div class="product-title separator">
            <a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
                <?php echo esc_attr($product->get_title()); ?>
            </a>
        </div>
        <?php if ( $rating_html ) { ?>
            <?php echo $rating_html; ?>
        <?php } else { ?>
            <div class="star-rating"></div>
        <?php } ?>
        <div class="price separator">
            <?php echo wc_price($product->get_price()); ?>
        </div>
        <div class="quick-view tip-top" data-prod="<?php echo esc_attr($post->ID); ?>" data-tip="<?php esc_html_e('Quick View', 'altotheme'); ?>">
            <div class="btn-link">
                <div class="quick-view-icon">
                    <span class="pe-icon pe-7s-search"></span>
                </div>
            </div>
        </div>
        <div class="btn-wishlist tip-top" data-prod="<?php echo $post->ID; ?>" data-tip="Wishlist">
            <div class="btn-link ">
                <div class="wishlist-icon">
                    <span class="pe-icon pe-7s-like"></span>
                </div>
            </div>
        </div>
        <?php echo defined('YITH_WCWL') ? do_shortcode('[yith_wcwl_add_to_wishlist]') : ''; ?>
    </div>
</div>
<?php
echo $tag_wapper;