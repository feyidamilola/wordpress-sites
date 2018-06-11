<?php
if ( ! defined( 'ABSPATH' ) ) exit;
global $wpdb;
$_POST = stripslashes_deep($_POST);
$_GET = stripslashes_deep($_GET);
$xyz_em_campId = intval($_GET['id']);
$xyz_em_pageno = intval($_GET['pageno']);
if (
		! isset( $_REQUEST['_wpnonce'] )
		|| ! wp_verify_nonce( $_REQUEST['_wpnonce'], 'trash-campaign_'.$xyz_em_campId )
) {

	wp_nonce_ays( 'trash-campaign_'.$xyz_em_campId );

	exit();

}
if($xyz_em_campId=="" || !is_numeric($xyz_em_campId)){
	header("Location:".admin_url('admin.php?page=newsletter-manager-manage-campaigns'));
	exit();

}
$campCount = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."xyz_em_email_campaign WHERE id= %d",$xyz_em_campId) ) ;

if(count($campCount)==0){
	header("Location:".admin_url('admin.php?page=newsletter-manager-manage-campaigns'));
	exit();
}else{
	
	$attachDetails = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."xyz_em_attachment WHERE campaigns_id= %d",$xyz_em_campId) ) ;
	
	if($attachDetails){
		foreach ($attachDetails as $details){

			$existingAttachmentName =  $details->id."_".$details->name;
			$dir = realpath(dirname(__FILE__) . '/../../../')."/uploads/xyz_em/attachments/";
			unlink ($dir.$existingAttachmentName);

		}
	}
	
	$wpdb->query( $wpdb->prepare( "DELETE FROM ".$wpdb->prefix."xyz_em_attachment WHERE campaigns_id= %d",$xyz_em_campId) ) ;
	
	$wpdb->query( $wpdb->prepare( "DELETE FROM ".$wpdb->prefix."xyz_em_email_campaign WHERE id= %d",$xyz_em_campId) ) ;
	
	
	header("Location:".admin_url('admin.php?page=newsletter-manager-manage-campaigns&campmsg=3&pagenum='.$xyz_em_pageno));
	exit();
}

?>