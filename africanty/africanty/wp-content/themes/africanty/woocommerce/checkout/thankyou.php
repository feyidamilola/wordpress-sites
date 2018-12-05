<?php
/**
 * Thankyou page
 * 
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author 	WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

defined('ABSPATH') or exit;

if ($order) : ?>
<div class="row lt-order-received">
    <div class="large-5 columns lt-order-received-left">
        <div class="lt-warper-order">
            <?php if ($order->has_status('failed')) : ?>
                <p class="woocommerce-thankyou-order-failed"><?php esc_html_e('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'altotheme'); ?></p>

                <p class="woocommerce-thankyou-order-failed-actions">
                    <a href="<?php echo esc_url($order->get_checkout_payment_url()); ?>" class="button pay"><?php esc_html_e('Pay', 'altotheme') ?></a>
                    <?php if (is_user_logged_in()) : ?>
                        <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="button pay"><?php esc_html_e('My Account', 'altotheme'); ?></a>
                    <?php endif; ?>
                </p>

            <?php else : ?>

                <p class="woocommerce-thankyou-order-received"><?php echo apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thank you. Your order has been received.', 'altotheme'), $order); ?></p>
                <ul class="woocommerce-thankyou-order-details order_details">
                    <li class="order">
                        <?php esc_html_e('Order Number:', 'altotheme'); ?>
                        <strong><?php echo (int) $order->get_order_number(); ?></strong>
                    </li>
                    <li class="date">
                        <?php esc_html_e('Date:', 'altotheme'); ?>
                        <strong><?php echo wc_format_datetime($order->get_date_created()); ?></strong>
                    </li>
                    <li class="total">
                        <?php esc_html_e('Total:', 'altotheme'); ?>
                        <strong><?php echo $order->get_formatted_order_total(); ?></strong>
                    </li>
                    <?php if ($order->get_payment_method_title()) : ?>
                        <li class="method">
                            <?php esc_html_e('Payment Method:', 'altotheme'); ?>
                            <strong><?php echo wp_kses_post($order->get_payment_method_title()); ?></strong>
                        </li>
                    <?php endif; ?>
                </ul>
                <div class="clear"></div>

            <?php endif; ?>
        </div>
    </div>
    <div class="large-7 columns lt-order-received-right">
        <div class="lt-warper-order">
            <?php do_action('woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id()); ?>
            <?php do_action('woocommerce_thankyou', $order->get_id()); ?>
        </div>
    </div>
</div>
<?php else : ?>
    <p class="woocommerce-thankyou-order-received"><?php echo apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thank you. Your order has been received.', 'altotheme'), null); ?></p>
<?php endif;