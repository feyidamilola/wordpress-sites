<?php
/**
 * Shortcode For Portfolio
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Portfolio */
/*-----------------------------------------------------------------------------------*/
$brando_all_categories_filter = '';
$brando_portfolio_filter_unique_id = 1;
if ( ! function_exists( 'brando_portfolio_filter_shortcode' ) ) {
    function brando_portfolio_filter_shortcode( $atts, $content = null ) {

        global $brando_portfolio_filter_unique_id;
        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'brando_portfolio_filter_style' => '',
            'brando_categories_list' => '',
            'brando_filter_custom_color' => '',
            'brando_show_all_categories_filter' => '1',
            'brando_default_category_selected' => '',
            'brando_portfolio_categories_orderby' => 'id',
            'brando_portfolio_categories_order' => 'ASC',
            'brando_token_class' => '',
            'brando_filter_custom_hover_color' => '',
            'brando_filter_border_color' => '',
            'brando_filter_hover_color' => '',
        ), $atts ) );

        global $tz_featured_array, $brando_all_categories_filter;
        $output = $classes = $filter_style = $portfolio_id = $portfolio_filter = '';
        $portfolio_id = $id;
        $classes = $style_array = array();
        $brando_token_class = $brando_token_class.$id;
        $id = ( $id ) ? ' id="'.$id.'"' : '';
        $class = ( $class ) ? $classes[] = $class : '';

        // Check if portfolio id and class
        $brando_portfolio_filter_unique_id  = !empty( $brando_portfolio_filter_unique_id ) ? $brando_portfolio_filter_unique_id : 1;
        $brando_portfolio_id  = 'brando-portfolio-' . $brando_portfolio_filter_unique_id;
        $brando_portfolio_filter_unique_id++;

        $classes[] = $brando_portfolio_id;

        $brando_filter_custom_color = ( $brando_filter_custom_color ) ? ' style="color:'.$brando_filter_custom_color.';"' : '';
        $brando_portfolio_categories_orderby = !empty( $brando_portfolio_categories_orderby ) ? $brando_portfolio_categories_orderby : 'id';
        $brando_portfolio_categories_order = !empty( $brando_portfolio_categories_order ) ? $brando_portfolio_categories_order : 'ASC';
        $brando_all_categories_filter = $brando_show_all_categories_filter;
        // Custom css
        ( $brando_filter_hover_color ) ? $tz_featured_array[] = '.'.$brando_token_class.' li a:hover, .'.$brando_token_class.' li:active, .'.$brando_token_class.' li.active a{ color:'.$brando_filter_hover_color.' !important;}' : '';
        ( $brando_filter_custom_hover_color ) ? $tz_featured_array[] = '.'.$brando_token_class.' li a:hover, .'.$brando_token_class.' li:active, .'.$brando_token_class.' li.active a{ background-color:'.$brando_filter_custom_hover_color.' !important;}' : '';
        if( $brando_portfolio_filter_style == 'filter-style-2' ){
            ( $brando_filter_border_color ) ? $tz_featured_array[] = '.'.$brando_token_class.' li a:hover, .'.$brando_token_class.' li.active a { border-color:'.$brando_filter_border_color.' !important;}' : '';
        }elseif( $brando_portfolio_filter_style == 'filter-style-4' ){
            ( $brando_filter_border_color ) ? $tz_featured_array[] = '.'.$brando_token_class.' li.active a::before { border-color:'.$brando_filter_border_color.' !important;}' : '';
        }

        // Class List
        $class_list = implode(" ", $classes);
        $column_class = ( $class_list ) ? ' '.$class_list : '';
        
        $categories_to_display_ids = explode(",",$brando_categories_list);
        if ( is_array( $categories_to_display_ids ) && $categories_to_display_ids[0] == '0' ) {
            unset( $categories_to_display_ids[0] );
            $categories_to_display_ids = array_values( $categories_to_display_ids );
        }
        // If no categories are chosen or "All categories", we need to load all available categories
        if ( ! is_array( $categories_to_display_ids ) || count( $categories_to_display_ids ) == 0 ) {
            $terms = get_terms( 'portfolio-category' );
            
            if ( ! is_array( $categories_to_display_ids ) ) {
                $categories_to_display_ids = array();
            }
            foreach ( $terms as $term ) {
                $categories_to_display_ids[] = $term->slug;
            }
        }
        
        $taxonomy = 'portfolio-category';
        $args = array(
            'orderby' => $brando_portfolio_categories_orderby,
            'order' => $brando_portfolio_categories_order,
            'hide_empty'        => 0, 
            'slug'           => $categories_to_display_ids,
        );
        $tax_terms = get_terms($taxonomy, $args);
        switch ($brando_portfolio_filter_style) {
            case 'filter-style-1':
                $output .='<ul'.$id.' class="portfolio-filter nav nav-tabs no-border portfolio-filter-tab alt-font text-uppercase'.$column_class.' '.$brando_token_class.'">';
                    if($brando_show_all_categories_filter == 1):
                        $active_class = empty( $brando_default_category_selected ) ? ' active' : '';
                        $output .='<li class="nav xs-display-inline'.$active_class.'"><a href="#" data-uniqueid="'.$brando_portfolio_id.'" data-filter="*" data-id="'.$portfolio_id.'" class="xs-display-inline"'.$brando_filter_custom_color.'>'.__('All','brando-addons').'</a></li>';
                    endif;
                    foreach ($tax_terms as $tax_term) {
                        if( $portfolio_id ){
                            $portfolio_filter = '.portfolio-filter-'.$tax_term->term_id.'-'.$portfolio_id;
                        }else{
                            $portfolio_filter = ".portfolio-filter-".$tax_term->term_id;
                        }
                        $active_class = ( $brando_default_category_selected == $tax_term->slug ) ? ' active' : '';
                        $output .='<li class="nav xs-display-inline'.$active_class.'"><a href="#" data-uniqueid="'.$brando_portfolio_id.'" data-filter="'.$portfolio_filter.'" data-id="'.$portfolio_id.'" class="xs-display-inline"'.$brando_filter_custom_color.'>'.$tax_term->name.'</a></li>';
                    }
                $output .='</ul>';
            break;
            
            case 'filter-style-2':
                $output .='<ul'.$id.' class="portfolio-filter nav nav-tabs portfolio-filter-tab-style-2 alt-font text-uppercase xs-width-100'.$column_class.' '.$brando_token_class.'">';
                    if($brando_show_all_categories_filter == 1):
                        $active_class = empty( $brando_default_category_selected ) ? ' active' : '';
                        $output .='<li class="nav xs-display-inline'.$active_class.'"><a href="#" data-uniqueid="'.$brando_portfolio_id.'" data-id="'.$portfolio_id.'" data-filter="*" class="xs-display-inline"'.$brando_filter_custom_color.'>'.__('All','brando-addons').'</a></li>';
                    endif;
                    foreach ($tax_terms as $tax_term) {
                        if( $portfolio_id ){
                            $portfolio_filter = '.portfolio-filter-'.$tax_term->term_id.'-'.$portfolio_id;
                        }else{
                            $portfolio_filter = ".portfolio-filter-".$tax_term->term_id;
                        }
                        $active_class = ( $brando_default_category_selected == $tax_term->slug ) ? ' active' : '';
                        $output .='<li class="nav xs-display-inline'.$active_class.'"><a href="#" data-uniqueid="'.$brando_portfolio_id.'" data-id="'.$portfolio_id.'" data-filter="'.$portfolio_filter.'"'.$brando_filter_custom_color.'>'.$tax_term->name.'</a></li>';
                    }
                $output .='</ul>';
            break;

            case 'filter-style-3':
                $output .='<ul'.$id.' class="portfolio-filter nav nav-tabs no-border portfolio-filter-tab-style-4 alt-font text-large text-uppercase'.$column_class.'">';
                    if($brando_show_all_categories_filter == 1):
                        $active_class = empty( $brando_default_category_selected ) ? ' active' : '';
                        $output .='<li class="nav xs-display-inline'.$active_class.'"><a href="#" data-uniqueid="'.$brando_portfolio_id.'" data-id="'.$portfolio_id.'" data-filter="*" class="position-relative xs-display-inline"'.$brando_filter_custom_color.'>'.__('All','brando-addons').'</a></li>';
                    endif;
                    foreach ($tax_terms as $tax_term) {
                        if( $portfolio_id ){
                            $portfolio_filter = '.portfolio-filter-'.$tax_term->term_id.'-'.$portfolio_id;
                        }else{
                            $portfolio_filter = ".portfolio-filter-".$tax_term->term_id;
                        }
                        $active_class = ( $brando_default_category_selected == $tax_term->slug ) ? ' active' : '';
                        $output .='<li class="nav xs-display-inline'.$active_class.'"><a href="#" data-uniqueid="'.$brando_portfolio_id.'" data-id="'.$portfolio_id.'" data-filter="'.$portfolio_filter.'" class="position-relative xs-display-inline"'.$brando_filter_custom_color.'>'.$tax_term->name.'</a></li>';
                    }
                $output .='</ul>';
            break;

            case 'filter-style-4':
                $output .='<ul'.$id.' class="portfolio-filter sm-text-small nav nav-tabs no-border portfolio-filter-tab-style-5 alt-font text-uppercase text-large'.$column_class.' '.$brando_token_class.'">';
                    if($brando_show_all_categories_filter == 1):
                        $active_class = empty( $brando_default_category_selected ) ? ' active' : '';
                        $output .='<li class="nav xs-display-inline xs-width-100 xs-text-center'.$active_class.'"><a href="#" data-uniqueid="'.$brando_portfolio_id.'" data-id="'.$portfolio_id.'" data-filter="*" class="position-relative xs-display-inline"'.$brando_filter_custom_color.'>'.__('All','brando-addons').'</a></li>';
                    endif;
                    foreach ($tax_terms as $tax_term) {
                        if( $portfolio_id ){
                            $portfolio_filter = '.portfolio-filter-'.$tax_term->term_id.'-'.$portfolio_id;
                        }else{
                            $portfolio_filter = ".portfolio-filter-".$tax_term->term_id;
                        }
                        $active_class = ( $brando_default_category_selected == $tax_term->slug ) ? ' active' : '';
                        $output .='<li class="nav xs-display-inline xs-width-100 xs-text-center'.$active_class.'"><a href="#" data-uniqueid="'.$brando_portfolio_id.'" data-id="'.$portfolio_id.'" data-filter="'.$portfolio_filter.'" class="position-relative xs-display-inline"'.$brando_filter_custom_color.'>'.$tax_term->name.'</a></li>';
                    }
                $output .='</ul>';
            break;

            case 'filter-style-5':
                $output .='<div class="col-lg-6 col-md-8 col-sm-10 col-xs-10 text-right pull-right margin-six-bottom sm-margin-ten-bottom">';
                    $output .='<ul'.$id.' class="portfolio-filter nav nav-tabs no-border portfolio-filter-tab-style-6 alt-font font-weight-600 text-large text-uppercase'.$column_class.' '.$brando_token_class.'">';
                        if($brando_show_all_categories_filter == 1):
                            $active_class = empty( $brando_default_category_selected ) ? ' active' : '';
                            $output .='<li class="nav xs-display-inline xs-width-100 xs-padding-four-tb'.$active_class.'"><a href="#" data-uniqueid="'.$brando_portfolio_id.'" data-id="'.$portfolio_id.'" data-filter="*" class="position-relative xs-display-inline"'.$brando_filter_custom_color.'>'.__('All','brando-addons').'</a></li>';
                        endif;
                        foreach ($tax_terms as $tax_term) {
                            if( $portfolio_id ){
                                $portfolio_filter = '.portfolio-filter-'.$tax_term->term_id.'-'.$portfolio_id;
                            }else{
                                $portfolio_filter = ".portfolio-filter-".$tax_term->term_id;
                            }
                            $active_class = ( $brando_default_category_selected == $tax_term->slug ) ? ' active' : '';
                            $output .='<li class="nav xs-display-inline xs-width-100 xs-padding-four-tb'.$active_class.'"><a href="#" data-uniqueid="'.$brando_portfolio_id.'" data-id="'.$portfolio_id.'" data-filter="'.$portfolio_filter.'" class="position-relative xs-display-inline"'.$brando_filter_custom_color.'>'.$tax_term->name.'</a></li>';
                        }
                    $output .='</ul>';
                $output .='</div>';
            break;

            case 'filter-style-6':
                $output .='<ul'.$id.' class="portfolio-filter nav nav-tabs no-border portfolio-filter-tab-style-3 alt-font font-weight-600 text-uppercase'.$column_class.' '.$brando_token_class.'">';
                    if($brando_show_all_categories_filter == 1):
                        $active_class = empty( $brando_default_category_selected ) ? ' active' : '';
                        $output .='<li class="nav active xs-display-inline'.$active_class.'"><a href="#" data-uniqueid="'.$brando_portfolio_id.'" data-id="'.$portfolio_id.'" data-filter="*" class="xs-display-inline"'.$brando_filter_custom_color.'>'.__('All','brando-addons').'</a></li>';
                    endif;
                    foreach ($tax_terms as $tax_term) {
                        if( $portfolio_id ){
                            $portfolio_filter = '.portfolio-filter-'.$tax_term->term_id.'-'.$portfolio_id;
                        }else{
                            $portfolio_filter = ".portfolio-filter-".$tax_term->term_id;
                        }
                        $active_class = ( $brando_default_category_selected == $tax_term->slug ) ? ' active' : '';
                        $output .='<li class="nav xs-display-inline'.$active_class.'"><a href="#" data-uniqueid="'.$brando_portfolio_id.'" data-id="'.$portfolio_id.'" data-filter="'.$portfolio_filter.'" class="xs-display-inline"'.$brando_filter_custom_color.'>'.$tax_term->name.'</a></li>';
                    }
                $output .='</ul>';
            break;
        }

        return $output;
    }
}
add_shortcode( 'brando_portfolio_filter', 'brando_portfolio_filter_shortcode' );