<?php
/**
 * Map For Tabs
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Tabs */
/*-----------------------------------------------------------------------------------*/

$tab_id_1 = time() . '-1-' . rand( 0, 100 );
$tab_id_2 = time() . '-2-' . rand( 0, 100 );
$tabs_class = 'brando_tabs_'.time() . '-2-' . rand( 0, 100 );
vc_map( array(
  'name' => __( 'Tabs', 'brando-addons' ),
  'base' => 'vc_tabs',
  'category' => 'Brando',
  'show_settings_on_create' => false,
  'is_container' => true,
  'icon' => 'icon-wpb-ui-tab-content',
  'description' => __( 'Place Tabbed Content', 'brando-addons' ),
  'params' => array(
    array(
      'type' => 'hidden',
      'heading' => __('Text', 'brando-addons' ),
      'param_name' => 'brando_token_class',
      'value' => $tabs_class,
    ),
    array(
      'type' => 'dropdown',
      'heading' => __('Tabs Style', 'brando-addons'),
      'param_name' => 'tabs_style',
      'admin_label' => true,
      'class' => 'brando_select_preview_image',
      'value' => array(__('Select Tabs Style', 'brando-addons') => '',
                       __('Tab Style1', 'brando-addons') => 'tab-style1',
                       __('Tab Style2', 'brando-addons') => 'tab-style2', 
                       __('Tab Style3', 'brando-addons') => 'tab-style3', 
                       __('Tab Style4', 'brando-addons') => 'tab-style4',
                       __('Tab Style5', 'brando-addons') => 'tab-style5',
                       __('Tab Style6', 'brando-addons') => 'tab-style6',
                       __('Tab Style7', 'brando-addons') => 'tab-style7',
                       __('Tab Style8', 'brando-addons') => 'tab-style8',
                       __('Tab Style9', 'brando-addons') => 'tab-style9',
                      ),
    ),
    array(
      'type' => 'brando_preview_image',
      'heading' => esc_html__('Select pre-made style for tab', 'brando-addons'),
      'param_name' => 'tab_preview_image',
      'admin_label' => true,
      'value' => array(__('Tab image',  'brando-addons') => '',
                       __('Tab Style1', 'brando-addons') => 'tab-style1',
                       __('Tab Style2', 'brando-addons') => 'tab-style2', 
                       __('Tab Style3', 'brando-addons') => 'tab-style3', 
                       __('Tab Style4', 'brando-addons') => 'tab-style4',
                       __('Tab Style5', 'brando-addons') => 'tab-style5',
                       __('Tab Style6', 'brando-addons') => 'tab-style6',
                       __('Tab Style7', 'brando-addons') => 'tab-style7',
                       __('Tab Style8', 'brando-addons') => 'tab-style8',
                       __('Tab Style9', 'brando-addons') => 'tab-style9',
                      ),
    ),
    array(
      'type' => 'textfield',
      'heading' => __( 'Active Tab', 'brando-addons' ),
      'param_name' => 'active_tab',
      'value' => '1',
      'group' => 'Tab Style',
    ),
    array(
      'type' => 'dropdown',
      'param_name' => 'tabs_alignment',
      'heading' => __('Tabs Alignment', 'brando-addons' ),
      'value' => array(__('No Align', 'brando-addons') => '',
                       __('Left Align', 'brando-addons') => 'text-left',
                       __('Right Align', 'brando-addons') => 'text-right',
                       __('Center Align', 'brando-addons') => 'text-center',
                      ),
      'description' => __( 'Alignment', 'brando-addons' ),
      'group' => 'Tab Style',
    ),
    array(
      'type' => 'colorpicker',
      'class' => '',
      'heading' => __( 'Title Color', 'brando-addons' ),
      'param_name' => 'brando_title_color',
      'dependency' => array( 'element' => 'tab_preview_image', 'value' => array('tab-style1','tab-style2','tab-style3','tab-style4','tab-style5','tab-style6','tab-style7','tab-style8','tab-style9') ),
      'group' => 'Color',
    ),
    array(
      'type' => 'colorpicker',
      'class' => '',
      'heading' => __( 'Border Color', 'brando-addons' ),
      'param_name' => 'brando_border_color',
      'dependency' => array( 'element' => 'tab_preview_image', 'value' => array('tab-style1','tab-style7') ),
      'group' => 'Color',
    ),
    array(
	    'type'        => 'responsive_font_settings',
	    'param_name'  => 'title_settings',
	    'heading'     => esc_html__( 'Font Settings For Tab Title', 'hcode-addons' ),
	    'dependency' => array( 'element' => 'tab_preview_image', 'value' => array('tab-style1','tab-style2','tab-style3','tab-style4','tab-style5','tab-style6','tab-style7','tab-style8','tab-style9') ),
	    'group' => 'Font Settings',
    ),
    $brando_vc_extra_id,
    $brando_vc_extra_class,
  ),
  'custom_markup' => '<div class="wpb_tabs_holder wpb_holder vc_container_for_children">
                      <ul class="tabs_controls">
                      </ul>
                      %content%
                      </div>',
  'default_content' => '[vc_tab title="' . __( 'Tab 1', 'brando-addons' ) . '" tab_id="' . $tab_id_1 . '"][/vc_tab]
                        [vc_tab title="' . __( 'Tab 2', 'brando-addons' ) . '" tab_id="' . $tab_id_2 . '"][/vc_tab]',
  'js_view' => 'VcTabsView'
) );

vc_map( array(
  'name' => __( 'Tab', 'brando-addons' ),
  'base' => 'vc_tab',
  'category' => 'Brando',
  'allowed_container_element' => 'vc_row',
  'is_container' => true,
  'content_element' => false,
  'params' => array(
    array(
      'type' => 'tab_id',
      'heading' => __( 'Tab ID', 'brando-addons' ),
      'param_name' => 'tab_id'
    ),
    array(
      'type' => 'textfield',
      'heading' => __( 'Tab Title', 'brando-addons' ),
      'param_name' => 'title',
      'value' => '',
    ),
    array(
      'type' => 'brando_custom_switch_option',
      'heading' => __('Custom Icon', 'brando-addons'),
      'param_name' => 'custom_icon',
      'value' => array(__('NO', 'brando-addons') => '0',
                       __('YES', 'brando-addons') => '1'
                      ),
    ),
    array(
      'type' => 'attach_image',
      'heading' => __('Custom Icon Image', 'brando-addons'),
      'param_name' => 'custom_icon_image',
      'dependency' => array( 'element' => 'custom_icon', 'value' => '1' ),
      'description' => __( 'Recommended size: Extra Large - 60px X 60px, Large - 50px X 50px, Medium - 40px X 40px, Small - 25px X 25px, Extra Small - 18px X 18px', 'brando-addons' ),
    ),
    array(
      'type' => 'brando_icon',
      'heading' => __('Select Tab Icon', 'brando-addons'),
      'param_name' => 'tab_icon',
      'admin_label' => true,
      'dependency' => array( 'element' => 'custom_icon', 'value' => '0' ),
    ),
    array(
      'type' => 'brando_custom_switch_option',
      'heading' => __('Show Tab Title', 'brando-addons'),
      'param_name' => 'show_title',
      'value' => array(__('No', 'brando-addons') => '0',
                       __('Yes', 'brando-addons') => '1'
                      ),
    ),
    array(
      'type' => 'brando_custom_switch_option',
      'heading' => __('Show Tab Icon', 'brando-addons'),
      'param_name' => 'show_icon',
      'value' => array(__('No', 'brando-addons') => '0',
                       __('Yes', 'brando-addons') => '1'
                      ),
    ),
    array(
        'type' => 'dropdown',
        'heading' => __('Custom Image Size', 'brando-addons'),
        'param_name' => 'brando_custom_image_srcset',
        'value' => brando_image_size(),
        'std' => 'full',
        'dependency' => array( 'element' => 'custom_icon', 'value' => '1' ),
        'group' => 'Image',
    ),
  ),
  'js_view' => 'VcTabView'
) );