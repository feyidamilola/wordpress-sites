<?php

//global $pt_theme_options;

$pt_theme_options = get_option('pt_theme_options');

if ($pt_theme_options['vc_gallery'] != 1 ) 				vc_remove_element("vc_gallery");
if ($pt_theme_options['vc_single_image'] != 1 ) 		vc_remove_element("vc_single_image");
if ($pt_theme_options['vc_button'] != 1 ) 				vc_remove_element("vc_button");
if ($pt_theme_options['vc_column_text'] != 1 ) 			vc_remove_element("vc_column_text");
if ($pt_theme_options['vc_gmaps'] != 1 ) 				vc_remove_element("vc_gmaps");
if ($pt_theme_options['vc_progress_bar'] != 1 ) 		vc_remove_element("vc_progress_bar");

if ($pt_theme_options['vc_wp_rss'] != 1 ) 				vc_remove_element("vc_wp_rss");
if ($pt_theme_options['vc_wp_archives'] != 1 ) 			vc_remove_element("vc_wp_archives");
if ($pt_theme_options['vc_wp_search'] != 1 ) 			vc_remove_element("vc_wp_search");
if ($pt_theme_options['vc_wp_meta'] != 1 ) 				vc_remove_element("vc_wp_meta");
if ($pt_theme_options['vc_wp_recentcomments'] != 1 ) 	vc_remove_element("vc_wp_recentcomments");
if ($pt_theme_options['vc_wp_calendar'] != 1 ) 			vc_remove_element("vc_wp_calendar");
if ($pt_theme_options['vc_wp_pages'] != 1 ) 			vc_remove_element("vc_wp_pages");
if ($pt_theme_options['vc_wp_tagcloud'] != 1 ) 			vc_remove_element("vc_wp_tagcloud");
if ($pt_theme_options['vc_wp_custommenu'] != 1 ) 		vc_remove_element("vc_wp_custommenu");
if ($pt_theme_options['vc_wp_text'] != 1 ) 				vc_remove_element("vc_wp_text");
if ($pt_theme_options['vc_wp_posts'] != 1 ) 			vc_remove_element("vc_wp_posts");
if ($pt_theme_options['vc_wp_links'] != 1 ) 			vc_remove_element("vc_wp_links");
if ($pt_theme_options['vc_wp_categories'] != 1 ) 		vc_remove_element("vc_wp_categories");

if ($pt_theme_options['vc_pie'] != 1 ) 					vc_remove_element("vc_pie");
if ($pt_theme_options['vc_flickr'] != 1 ) 				vc_remove_element("vc_flickr");
if ($pt_theme_options['vc_widget_sidebar'] != 1 ) 		vc_remove_element("vc_widget_sidebar");
if ($pt_theme_options['vc_posts_slider'] != 1 ) 		vc_remove_element("vc_posts_slider");
if ($pt_theme_options['vc_teaser_grid'] != 1 ) 			vc_remove_element("vc_teaser_grid");
if ($pt_theme_options['vc_text_separator'] != 1 ) 		vc_remove_element("vc_text_separator");
if ($pt_theme_options['vc_separator'] != 1 ) 			vc_remove_element("vc_separator");
if ($pt_theme_options['vc_pinterest'] != 1 ) 			vc_remove_element("vc_pinterest");
if ($pt_theme_options['vc_cta_button'] != 1 ) 			vc_remove_element("vc_cta_button");

if ($pt_theme_options['vc_images_carousel'] != 1 ) 		vc_remove_element("vc_images_carousel");
if ($pt_theme_options['vc_carousel'] != 1 ) 			vc_remove_element("vc_carousel");
if ($pt_theme_options['vc_posts_grid'] != 1 ) 			vc_remove_element("vc_posts_grid");
if ($pt_theme_options['vc_message'] != 1 ) 				vc_remove_element("vc_message");


/* Remove content element from Visual Composer */

// vc_remove_element("vc_accordion");
// vc_remove_element("vc_video");
// vc_remove_element("vc_raw_html");
// vc_remove_element("vc_raw_js");
// vc_remove_element("vc_twitter");
// vc_remove_element("vc_facebook");
// vc_remove_element("vc_tweetmeme");
// vc_remove_element("vc_googleplus");
// vc_remove_element("vc_tab");
// vc_remove_element("vc_tabs");
// vc_remove_element("vc_toggle");
// vc_remove_element("vc_tour");
