<?php
function lt_sc_carousel($atts, $content=null){
    extract(shortcode_atts( array(
        'title' => '',
        'align' => '',
        'column_number' => '1',
        'column_number_tablet' => '2',
        'column_number_small' => '1',
        'navigation' => 'true',
        'nav_type' => '',
        'bullets' => 'true',
        //'slidespeed' => '300',
        'paginationspeed' => '800',
        'autoplay' => 'false',
        //'stoponhover' => 'true',
        //'bullets_type' => '',
    ), $atts));
    
    if ($align == 'center'){
        $align = 'text-center';
    }
    
    $sliderid = rand();
    ob_start();
    
    if($title):?>
        <div class="large-12 columns">
            <div class="title-inner <?php echo esc_attr($align); ?>"> 
                <h3 class="section-title <?php echo esc_attr($align); ?>"><span><?php echo esc_attr($title); ?></span></h3>
                <div class="bery-hr medium"></div>
            </div>
        </div>
    <?php endif; ?>
    <div class="lt-sc-carousel-warper">
        <div class="lt-sc-carousel owl-carousel <?php echo esc_attr($nav_type); ?>"
            data-contruct="<?php echo esc_attr($sliderid); ?>-<?php echo esc_attr($column_number); ?>"
            id="item-slider-<?php echo esc_attr($sliderid); ?>-<?php echo esc_attr($column_number); ?>"
            data-nav="<?php echo esc_attr($navigation); ?>"
            data-dots="<?php echo esc_attr($bullets); ?>"
            data-autoplay="<?php echo esc_attr($autoplay); ?>"
            data-speed="<?php echo esc_attr($paginationspeed); ?>"
            data-itemSmall="<?php echo esc_attr($column_number_small); ?>"
            data-itemTablet="<?php echo esc_attr($column_number_tablet); ?>"
            data-items="<?php echo esc_attr($column_number); ?>">
            <?php echo do_shortcode($content); ?>
        </div>
    </div>
    
<?php
    $content = ob_get_contents();
    ob_end_clean();
    
    return $content;
}

add_shortcode("bery_slider","lt_sc_carousel");