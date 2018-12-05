<?php

/**
 * Custom Product image
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.2
 */


global $post, $product, $woocommerce, $lt_opt;
$data_rel = '';
$image_title = esc_attr( get_the_title( get_post_thumbnail_id() ) );
$image_link  = wp_get_attachment_url( get_post_thumbnail_id() );
$image       = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
    'title' => $image_title
) );
$attachment_ids = LEE_WOO_LATEST ? $product->get_gallery_image_ids() : $product->get_gallery_attachment_ids();
$attachment_count = count( $attachment_ids );

if ( $attachment_count > 0 ) {
    $gallery = '[product-gallery]';
} else {
    $gallery = '';
}
?>
<div class="images">
    <div class="product-images-slider images-popups-gallery">
        <div class="main-images owl-carousel">
            <?php if ( has_post_thumbnail() ) { ?>
                <div class="easyzoom first">
                    <?php echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image product-image" data-o_href="%s" title="%s">%s</a>', $image_link, $image_link, $image_title, $image ), $post->ID ); ?>
                </div>
            <?php } else { ?>
                <div class="easyzoom">
                    <?php echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image product-image" data-o_href="%s"><img src="%s" /></a>', wc_placeholder_img_src(), wc_placeholder_img_src(), wc_placeholder_img_src() ), $post->ID ); ?>
                </div>
            <?php } ?>
            <?php
                $_i = 0;
                if($attachment_count > 0) {
                    foreach($attachment_ids as $id) {
                        $_i++;
                        ?>
                        <div class="easyzoom">
                            <?php 
                            $image_title = esc_attr( get_the_title( $id ) );
                            $image_link  = wp_get_attachment_url( $id );
                            $image = wp_get_attachment_image_src($id, 'shop_single');
                            echo sprintf( '<a href="%s" itemprop="image" class="woocommerce-additional-image product-image" title="%s"><img alt="%s" src="%s" class="lazyOwl"/></a>', $image_link, $image_title, $image_title, $image[0] );  
                            ?>
                        </div>
                        <?php 
                    }
                }
            ?>
        </div>
        <div class="product-image-btn">
            <a class="product-lightbox-btn tip-top" data-tip="<?php esc_html_e('Zoom','altotheme'); ?>" href="<?php echo esc_url_raw($image_link); ?>"></a>
            <?php do_action('product_video_btn'); ?>
        </div>
    </div>
    <?php do_action( 'woocommerce_product_thumbnails' ); ?>
</div>