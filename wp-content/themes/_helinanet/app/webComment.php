<?php
ob_start();
define('AJAX_REQUEST', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
if(!AJAX_REQUEST) {die('Sorry pal you can not be here');}
require('../../../../wp-load.php');
//error_reporting(0);
date_default_timezone_set("Africa/Nairobi");
$websiteReviewMessage=clean_value($_REQUEST['websiteReviewMessage']);


$response=array();

if(empty($websiteReviewMessage)){
	$response['status']=0;
	$response['field']='#websiteReviewMessage';
	$response['message']='<strong>Error!</strong> Please share your comment! The comment box cannot be empty';
	echo json_encode($response); exit;
}


if(empty($response)) {
	$response['status']=1;
	$response['field']='#orderid';
	$response['message']='Thank your for your submission. We will get back to you soon';
	//$response['postid']=$newupload;
	echo json_encode($response);
	exit;
	
} else { 
	$response['status']=0;
	$response['field']='#orderid';
	//$response['message']=$newupload;
	echo json_encode($response); exit;
}


	
?>