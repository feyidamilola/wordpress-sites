<?php
/**
 * Shortcode For Video & Sound
 *
 * @package Brando
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Video & Sound */
/*-----------------------------------------------------------------------------------*/
 
if ( ! function_exists( 'brando_video_sound' ) ) {
    function brando_video_sound( $atts, $content = null ) {
        extract( shortcode_atts( array(
        	'brando_video_type' => '',
            'brando_vimeo_id' => '',
            'brando_youtube_url' => '',
            'brando_track_id' =>'',
            'mp4_video' => '',
            'ogg_video' => '',
            'webm_video' => '',
            'video_autoplay' => '1',
            'video_muted' => '1',
            'video_loop' => '1',
            'video_controls' => '1',
            'width' => '',
            'height' => '',
        ), $atts ) );
        $output = '';
        $width = ( $width ) ? ' width="'.$width.'"' : '';
        $height = ( $height ) ? ' height="'.$height.'"' : '';
        $mp4_video = ( $mp4_video ) ? $mp4_video : '';
        $ogg_video = ( $ogg_video ) ? $ogg_video : '';
        $webm_video = ( $webm_video ) ? $webm_video : '';
        $autoplay = ( $video_autoplay == 1 ) ? ' autoplay' : '';
        $muted = ( $video_muted == 1 ) ? ' muted' : '';
        $loop = ( $video_loop == 1 ) ? ' loop' : '';
        $controls = ( $video_controls == 1 ) ? ' controls' : '';
        switch ($brando_video_type) 
        {
        	case 'vimeo':
                if($brando_vimeo_id){
                    $output .= '<div class="fit-videos">';
            		  $output .='<iframe src="https://player.vimeo.com/video/'.$brando_vimeo_id.'?color=bb9b44&amp;title=0&amp;byline=0&amp;portrait=0" webkitAllowFullScreen mozallowfullscreen allowFullScreen'.$width.$height.'></iframe>';
                    $output .= '</div>';
                }
        	break;

        	case 'youtube':
                if($brando_youtube_url){
                    $output .= '<div class="fit-videos">';
            		  $output .='<iframe'.$width.$height.' src="'.$brando_youtube_url.'" allowFullScreen></iframe>';
                    $output .= '</div>';
                }
        	break;

        	case 'sound-cloud':
                if($brando_track_id){
        		    $output .='<div class="sound"><iframe'.$width.$height.' src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/'.$brando_track_id.'&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe></div>';
                }
        	break;

            case 'html5':
                $output .= '<video'.$autoplay.$muted.$loop.$controls.'>';
                    if( $mp4_video ){
                        $output .= '<source type="video/mp4" src="'.$mp4_video.'">';
                    }if( $ogg_video ){
                        $output .= '<source type="video/ogg" src="'.$ogg_video.'">';
                    }if( $webm_video ){
                        $output .= '<source type="video/webm" src="'.$webm_video.'">';
                    }
                $output .= '</video>';
            break;
        }
        return $output;
    }
}
add_shortcode( 'brando_video_sound', 'brando_video_sound' );
?>