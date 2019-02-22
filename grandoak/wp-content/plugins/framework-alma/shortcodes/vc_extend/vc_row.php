<?php
vc_map( array(
	'name' => __( 'Row', 'js_composer' ),
	'base' => 'vc_row',
	'is_container' => true,
	'icon' => 'icon-wpb-row',
	'show_settings_on_create' => false,
	'category' => __( 'Content', 'js_composer' ),
	'description' => __( 'Place content elements inside the row', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => __( 'Row stretch', 'js_composer' ),
			'param_name' => 'full_width',
			'value' => array(
				__( 'Default', 'js_composer' ) => '',
				__( 'Stretch row', 'js_composer' ) => 'stretch_row',
				__( 'Stretch row and content', 'js_composer' ) => 'stretch_row_content',
				__( 'Stretch row and content (no paddings)', 'js_composer' ) => 'stretch_row_content_no_spaces',
			),
			'description' => __( 'Select stretching options for row and content (Note: stretched may not work properly if parent container has "overflow: hidden" CSS property).', 'js_composer' )
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Full height row?', 'js_composer' ),
			'param_name' => 'full_height',
			'description' => __( 'If checked row will be set to full height.', 'js_composer' ),
			'value' => array( __( 'Yes', 'js_composer' ) => 'yes' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Content position', 'js_composer' ),
			'param_name' => 'content_placement',
			'value' => array(
				__( 'Middle', 'js_composer' ) => 'middle',
				__( 'Top', 'js_composer' ) => 'top',
			),
			'description' => __( 'Select content position within row.', 'js_composer' ),
			'dependency' => array(
				'element' => 'full_height',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'checkbox',
			'heading' => __( 'Use video background?', 'js_composer' ),
			'param_name' => 'video_bg',
			'description' => __( 'If checked, video will be used as row background.', 'js_composer' ),
			'value' => array( __( 'Yes', 'js_composer' ) => 'yes' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'YouTube link', 'js_composer' ),
			'param_name' => 'video_bg_url',
			'description' => __( 'Add YouTube link.', 'js_composer' ),
			'dependency' => array(
				'element' => 'video_bg',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Parallax', 'js_composer' ),
			'param_name' => 'video_bg_parallax',
			'value' => array(
				__( 'None', 'js_composer' ) => '',
				__( 'Simple', 'js_composer' ) => 'content-moving',
				__( 'With fade', 'js_composer' ) => 'content-moving-fade',
			),
			'description' => __( 'Add parallax type background for row.', 'js_composer' ),
			'dependency' => array(
				'element' => 'video_bg',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Parallax', 'js_composer' ),
			'param_name' => 'parallax',
			'value' => array(
				__( 'None', 'js_composer' ) => '',
				__( 'Simple', 'js_composer' ) => 'content-moving',
				__( 'With fade', 'js_composer' ) => 'content-moving-fade',
			),
			'description' => __( 'Add parallax type background for row (Note: If no image is specified, parallax will use background image from Design Options).', 'js_composer' ),
			'dependency' => array(
				'element' => 'video_bg',
				'is_empty' => true,
			),
		),
		array(
			'type' => 'attach_image',
			'heading' => __( 'Image', 'js_composer' ),
			'param_name' => 'parallax_image',
			'value' => '',
			'description' => __( 'Select image from media library.', 'js_composer' ),
			'dependency' => array(
				'element' => 'parallax',
				'not_empty' => true,
			),
		),

		array(
			'type' => 'el_id',
			'heading' => __( 'Row ID', 'js_composer' ),
			'param_name' => 'el_id',
			'description' => sprintf( __( 'Enter row ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'js_composer' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
		),


			$pt_css_animation,
			$pt_css_delay,
			$pt_hidden_viewport,
			array(
				"type" => "checkbox",
				"heading" => __("Tablet Layout", "js_composer"),
				"param_name" => "tablet_layout",
				"value" => array ("Yes" => "tablet-layout"),
				"description" => "Tablet layout sets columns to 50% or 100%, so content look more tablet friendly. Try it out."
			),


		
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
		),
		array(
			'type' => 'css_editor',
			'heading' => __( 'CSS box', 'js_composer' ),
			'param_name' => 'css',
			// 'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
			'group' => __( 'Design Options', 'js_composer' )
		),
	),
	'js_view' => 'VcRowView'
) );










// vc_map( array(
// 	"name" => __("Row", "js_composer"),
// 	"base" => "vc_row",
// 	"is_container" => true,
// 	"icon" => "icon-wpb-row",
// 	"show_settings_on_create" => false,
// 	"category" => __('Content', 'js_composer'),
// 	"params" => array(
// 		array(
// 			"type" => "textfield",
// 			"param_name" => "pt_vc_dummy_textfield", // don't touch
// 			"value"=> "vc_row", // class name
// 			"description" => "Dummy textfield Pixelthrone. Just change the value to the desired class"
// 		),
// 		array(
// 			"type" => "textfield",
// 			"heading" => __("Padding Top", "js_composer"),
// 			"param_name" => "pt_vc_padding_top",
// 			"description" => __("Only numbers. Value in pixels", "js_composer")
// 		),
// 		array(
// 			"type" => "textfield",
// 			"heading" => __("Padding Bottom", "js_composer"),
// 			"param_name" => "pt_vc_padding_bottom",
// 			"description" => __("Only numbers. Value in pixels", "js_composer")
// 		),
// 		array(
// 			"type" => "attach_image",
// 			"heading" => __("Select Background Image", "js_composer"),
// 			"param_name" => "pt_vc_bg_image",
// 		),
// 		array(
// 			"type" => "dropdown",
// 			"heading" => __("Enable Parallax", "js_composer"),
// 			"param_name" => "pt_vc_parallax",
// 			"value" => array('No', 'Yes'),
// 			"description" => __("You need to select an image", "js_composer")
// 		),
// 		array(
// 			"type" => "colorpicker",
// 			"heading" => __("Background Color", "js_composer"),
// 			"param_name" => "pt_vc_bg_color",
// 			"value" => '', //Default color
// 		),
// 		array(
// 			"type" => "dropdown",
// 			"heading" => __("Full Width", "js_composer"),
// 			"param_name" => "pt_vc_full_width",
// 			"value" => array('No', 'Yes'),
// 			"description" => __("Set this row to be full width", "js_composer")
// 		),
// 		array(
// 			"type" => "colorpicker",
// 			"heading" => __("Text Color", "js_composer"),
// 			"param_name" => "pt_vc_text_color",
// 			"value" => '', //Default color
// 		),
// 		$pt_css_animation,
// 		$pt_css_delay,
// 		$pt_hidden_viewport,
// 		array(
// 			"type" => "checkbox",
// 			"heading" => __("Tablet Layout", "js_composer"),
// 			"param_name" => "tablet_layout",
// 			"value" => array ("Yes" => "tablet-layout"),
// 			"description" => "Tablet layout sets columns to 50% or 100%, so content look more tablet friendly. Try it out."
// 		),
// 		array(
// 			"type" => "textfield",
// 			"heading" => __("Extra class name", "js_composer"),
// 			"param_name" => "el_class",
// 			"description" => __("you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
// 		)
// 	),
// 	"js_view" => 'VcRowView'
// ) );