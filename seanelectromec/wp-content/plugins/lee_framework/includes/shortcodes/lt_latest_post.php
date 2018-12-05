<?php
add_shortcode("recent_post", "lt_sc_posts");
function lt_sc_posts($atts, $content = null) {
    global $lt_opt;
    
    $dfAttr = array(
        "title" => '',
        "align" => '',
        'show_type' => '0',
        "posts" => '8',
        "category" => '',
        'columns_number' => '2',
        'columns_number_small' => '1',
        'columns_number_tablet' => '2',
        'is_ajax' => 'yes',
        'min_height' => 'auto'
    );
    extract(shortcode_atts($dfAttr, $atts));
    
    // Optimized speed
    if (!isset($lt_opt['enable_optimized_speed']) || $lt_opt['enable_optimized_speed'] == 1) {
        $atts['is_ajax'] = !isset($atts['is_ajax']) ? $is_ajax : $atts['is_ajax'];
        if (isset($atts['is_ajax']) && $atts['is_ajax'] == 'yes' &&
            (!isset($_POST['lt_load_ajax']) || $_POST['lt_load_ajax'] != '1')) {
            
            return lt_shortcode_text('recent_post', $atts);
        }

        // Load ajax
        elseif($atts['is_ajax'] == 'yes' && $_POST['lt_load_ajax'] == '1') {
            extract(shortcode_atts($dfAttr, lt_shortcode_vars($atts)));
        }
    }
    
    ob_start();
	
    if ($align == 'center') $align = 'text-center'; ?>

    <?php if($title != ''){?> 
        <div class="row">
            <div class="large-12 columns <?php echo esc_attr($align); ?>">
                <h3 class="section-title"><span><?php echo esc_attr($title); ?></span></h3>
                <div class="bery-hr medium"></div>
            </div>
        </div>
    <?php } ?>
    <?php
    $args = array(
        'post_status' => 'publish',
        'post_type' => 'post',
        'category_name' => $category,
        'posts_per_page' => $posts
    );

    $recentPosts = new WP_Query( $args );

    if ( $recentPosts->have_posts() ) {
        if($show_type == 1) include LEE_FRAMEWORK_PLUGIN_PATH. '/includes/blogs/latestblog_grid.php';
        else include LEE_FRAMEWORK_PLUGIN_PATH . '/includes/blogs/latestblog_carousel.php';
    }
    
    wp_reset_postdata();
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}

if(!function_exists('lt_limit_words')){
    function lt_limit_words($string, $word_limit) {
        $words = explode(' ', $string, ($word_limit + 1));
        if(count($words) <= $word_limit){
            return $string;
        }
        array_pop($words);
        return implode(' ', $words) . ' ...';
    }
}