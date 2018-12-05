<?php
$hide = (isset($_COOKIE['promotion']) && $_COOKIE['promotion'] == 'hide') ? true : false;
$number_slide = (isset($lt_opt['number_post_slide']) && (int) $lt_opt['number_post_slide']) ? (int) $lt_opt['number_post_slide'] : 1;

$style_bg = (isset($lt_opt['background_area']) && $lt_opt['background_area']) ? 'background: url(\'' . $lt_opt['background_area'] . '\') center center no-repeat;' : '';

$style_bg = ($style_bg != '') ? ' style="' . esc_attr($style_bg) . '"' : '';

$style_color = (isset($lt_opt['t_promotion_color']) && $lt_opt['t_promotion_color']) ? 'color:' . $lt_opt['t_promotion_color'] : '';

$style_color = ($style_color != '') ? ' style="' . esc_attr($style_color) . '"' : '';
?>

<div class="section-element lt-promotion-news lt-hide">
    <div class="lt-wapper-promotion">
        <div class="lt-content-promotion-news <?php echo (!isset($lt_opt['enable_fullwidth']) || $lt_opt['enable_fullwidth'] == 1) ? 'lt-row fullwidth' : 'row'; ?>"<?php echo $style_bg; ?>>
            <a href="javascript:void(0);" title="<?php echo esc_attr('Close', 'altotheme'); ?>" class="lt-promotion-close lt-a-icon"><i class="pe-7s-close-circle"></i></a>

            <?php if ($content): ?>
                <div class="lt-content-promotion-custom"<?php echo $style_color;?>>
                    <table><tr><td><?php echo $content; ?></td></tr></table>
                </div>
            <?php elseif (!empty($posts)): ?>
                <div class="owl-carousel lt-post-slider lt-post-slider-<?php echo esc_attr($_id); ?>" data-show="<?php echo esc_attr($number_slide); ?>">
                    <?php foreach ($posts as $v):
                        $lt_postTitle = esc_attr($v->post_title);
                        ?>
                        <div class="lt-post-slider-item">
                            <a href="<?php echo esc_url(get_permalink($v->ID)); ?>" title="<?php echo $lt_postTitle; ?>"<?php echo $style_color;?>><?php echo $lt_postTitle; ?></a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="lt-position-relative lt-top-80"></div>
<a href="javascript:void(0);" title="<?php echo esc_attr('Show', 'altotheme'); ?>" class="lt-promotion-show<?php echo ($hide) ? ' lt-show' : ''; ?>"><i class="pe-7s-angle-down"></i></a>