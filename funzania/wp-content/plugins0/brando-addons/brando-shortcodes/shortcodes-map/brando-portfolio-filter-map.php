<?php
/**
 * Map For Portfolio
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Portfolio */
/*-----------------------------------------------------------------------------------*/

$portfolio_filter_class = 'brando_portfolio_filter_'.time() . '-2-' . rand( 0, 100 );
vc_map( array(
  'name' => __('Portfolio Filter', 'brando-addons'),
  'description' => __( 'Place portfolio filter list', 'brando-addons' ),
  'icon' => 'fa fa-briefcase brando-shortcode-icon',
  'base' => 'brando_portfolio_filter',
  'category' => 'Brando',
  'params' => array(
      array(
        'type' => 'hidden',
        'heading' => __('Text', 'brando-addons' ),
        'param_name' => 'brando_token_class',
        'value' => $portfolio_filter_class,
      ),
      array(
          'type' => 'dropdown',
          'heading' => __('Filter Style', 'brando-addons'),
          'param_name' => 'brando_portfolio_filter_style',
          'value' => array(__('Select Column Type', 'brando-addons') => '',
                           __('Filter Style 1', 'brando-addons') => 'filter-style-1',
                           __('Filter Style 2', 'brando-addons') => 'filter-style-2',
                           __('Filter Style 3', 'brando-addons') => 'filter-style-3',
                           __('Filter Style 4', 'brando-addons') => 'filter-style-4',
                           __('Filter Style 5', 'brando-addons') => 'filter-style-5',
                           __('Filter Style 6', 'brando-addons') => 'filter-style-6',
          ),
      ),
      array(
          'type' => 'brando_preview_image',
          'heading' => __('Select pre-made style', 'brando-addons'),
          'param_name' => 'slider_filter_preview_image',
          'admin_label' => true,
          'value' => array(__('Filter Type', 'brando-addons') => '',
                            __('Filter Style 1', 'brando-addons') => 'filter-style-1',
                            __('Filter Style 2', 'brando-addons') => 'filter-style-2',
                            __('Filter Style 3', 'brando-addons') => 'filter-style-3',
                            __('Filter Style 4', 'brando-addons') => 'filter-style-4',
                            __('Filter Style 5', 'brando-addons') => 'filter-style-5',
                            __('Filter Style 6', 'brando-addons') => 'filter-style-6',
                          ),
      ),
      array(
          'type' => 'brando_multiple_portfolio_categories',
          'heading' => __('Select Categories', 'brando-addons'),
          'param_name' => 'brando_categories_list',
          'dependency' => array( 'element' => 'brando_portfolio_filter_style', 'value' => array('filter-style-1','filter-style-2','filter-style-3','filter-style-4','filter-style-5','filter-style-6') ),
      ),
      array(
            'type' => 'brando_custom_switch_option',
            'heading' => __('Show All Categories Filter', 'brando-addons'),
            'param_name' => 'brando_show_all_categories_filter',
            'value' => array(__('No', 'brando-addons') => '0', 
                             __('Yes', 'brando-addons') => '1'
                            ),
            'std' => '1',
            'description' => __( 'Select YES to show filter above portfolio', 'brando-addons' ),
            'group' => 'Settings',
      ),
      array(
          'type' => 'brando_multiple_portfolio_categories',
          'heading' => __('Select Default Category Selected', 'brando-addons'),
          'param_name' => 'brando_default_category_selected',    
          'multiple' => false,
          'group' => 'Settings',
      ),
      array(
          'type' => 'dropdown',
          'holder' => 'div',
          'class' => '',
          'heading' => __('Categories Order By', 'brando-addons'),
          'param_name' => 'brando_portfolio_categories_orderby',
          'value' => array(__('Select Order By', 'brando-addons') => '',
                           __('Name', 'brando-addons') => 'name',
                           __('Slug', 'brando-addons') => 'slug',
                           __('Id', 'brando-addons') => 'id',
                           __('Count', 'brando-addons') => 'count',
          ),
          'std' => 'id',
          'group' => 'Settings',
      ),
      array(
          'type' => 'dropdown',
          'holder' => 'div',
          'class' => '',
          'heading' => __('Categories Order', 'brando-addons'),
          'param_name' => 'brando_portfolio_categories_order',
          'value' => array(__('Select Order', 'brando-addons') => '',
                           __('Ascending', 'brando-addons') => 'ASC',
                           __('Descending', 'brando-addons') => 'DESC',
          ),
          'std' => 'ASC',
          'group' => 'Settings',
      ),
      array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => __( 'Custom Filter Color', 'brando-addons' ),
        'param_name' => 'brando_filter_custom_color',
        'dependency' => array( 'element' => 'brando_portfolio_filter_style', 'value' => array('filter-style-1','filter-style-2','filter-style-3','filter-style-4','filter-style-5','filter-style-6') ),
        'group' => 'Filter Style',
      ),
      array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => __( 'Custom Filter Hover Color', 'brando-addons' ),
        'param_name' => 'brando_filter_hover_color',
        'dependency' => array( 'element' => 'brando_portfolio_filter_style', 'value' => array('filter-style-1','filter-style-2','filter-style-4','filter-style-5','filter-style-6') ),
        'group' => 'Filter Style',
      ),
      array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => __( 'Custom Filter BG Color', 'brando-addons' ),
        'param_name' => 'brando_filter_custom_hover_color',
        'dependency' => array( 'element' => 'brando_portfolio_filter_style', 'value' => array('filter-style-1','filter-style-6') ),
        'group' => 'Filter Style',
      ),
      array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => __( 'Border Color', 'brando-addons' ),
        'param_name' => 'brando_filter_border_color',
        'dependency' => array( 'element' => 'brando_portfolio_filter_style', 'value' => array('filter-style-2','filter-style-4') ),
        'group' => 'Filter Style',
      ),      
      $brando_vc_extra_id,
      $brando_vc_extra_class,
  )
) );