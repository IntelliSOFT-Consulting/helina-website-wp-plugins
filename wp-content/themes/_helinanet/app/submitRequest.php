<?php
ob_start();

define('AJAX_REQUEST', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
if(!AJAX_REQUEST) {die('Sorry pal you can not be here');}
require('../../../../wp-load.php');
// These files need to be included as dependencies when on the front end.
require_once( ABSPATH . 'wp-admin/includes/image.php' );
require_once( ABSPATH . 'wp-admin/includes/file.php' );
require_once( ABSPATH . 'wp-admin/includes/media.php' );
//print_r($_REQUEST);exit;
//$date=clean_value($_REQUEST['date']);
//error_reporting(0);
date_default_timezone_set("Africa/Nairobi");
$association=clean_value($_REQUEST['association']);
$country=clean_value($_REQUEST['country']);
$member_name=clean_value($_REQUEST['member_name']);
$designation=clean_value($_REQUEST['designation']);
$email=clean_value($_REQUEST['email']);
$phone_number=clean_value($_REQUEST['phone_number']);
$application_appeal=clean_value($_REQUEST['application_appeal']);
$working_group=clean_value($_REQUEST['working_group']);
$now = date("Y-m-d H:i:s");




$response=array();

if(empty($association)){
	$response['status']=0;
	$response['field']='#association';
	$response['message']='<strong>Error!</strong> Please enter the name of your association.';
	echo json_encode($response); exit;
}

if(empty($country)){
	$response['status']=0;
	$response['field']='#country';
	$response['message']='<strong>Error!</strong> Country where association is based in.';
	echo json_encode($response); exit;
}

if(empty($member_name)){
	$response['status']=0;
	$response['field']='#member_name';
	$response['message']='<strong>Error!</strong> Please enter your full name.';
	echo json_encode($response); exit;
}

if(empty($designation)){
	$response['status']=0;
	$response['field']='#designation';
	$response['message']='<strong>Error!</strong> Please enter your designation.';
	echo json_encode($response); exit;
}

if(!is_email($email)){
	$response['status']=0;
	$response['field']='#email';
	$response['message']='<strong>Error!</strong> Enter a valid email address';
	echo json_encode($response); exit;
}

if(!is_phone($phone_number)){
	$response['status']=0;
	$response['field']='#phone_number';
	$response['message']='<strong>Error!</strong> Enter a valid mobile number';
	echo json_encode($response); exit;
}

if(empty($application_appeal)){
	$response['status']=0;
	$response['field']='#application_appeal';
	$response['message']='<strong>Error!</strong> Please enter an appeal to back your application.';
	echo json_encode($response); exit;
}

if(empty($response)) {
	$response['status']=1;
	$response['field']='#orderid';
	$response['message']='Thank your for your submission. We will get back to you soon';
	//$response['postid']=$newupload;
	echo json_encode($response);
	$mailfrom = 'peter.koech@gmail.com';
	//$headers  = "MIME-Version: 1.0" . "\n";
	$headers = array('Content-Type: text/html; charset=UTF-8');
	$headers[] = 'From: '.$member_name.' <'.$email.'>';
	$headers[] = 'Cc: HELINA.Org <peter.koech@gmail.com>';
	$headers[] = 'Return-Path: '.$member_name.' <'.$email.'>';
	$headers[] = 'Return-Path: '.$member_name.' <'.$email.'>';

	$to = $mailfrom;
	$subject = 'Membership to Join - '. $working_group;
	$message = '
	<html>
	<body>
	Thank you '.$member_name.' for showing interest and reaching out to us. We are grateful. We will be in touch with you soon. 
	<br /><br />
			<b>Summary:</b><br />
			Name: <i>'.$member_name.'</i><br />
			Phone Number: <i>'.$phone_number.'</i><br />
			Email address: <i>'.$email.'</i><br />
			Designation: <i>'.$designation.'</i><br />
			Country: <i>'.$country.'</i><br /><br />
			
			<b>Kids365.org</b>	
			<br /><br />
	
	
	</body>
	</html>';
	global $wpdb;
	$wpdb->insert( 
	'helina_membership', 
		array( 
			'association' => $association,
			'country' => $country, 
			'member_name' => $member_name,
			'designation' => $designation,
			'email' => $email,
			'phone_number' => $phone_number,
			'application_appeal' => $application_appeal,
			'working_group' => $working_group,
				
		), 
		array('%s','%s','%s','%s','%s','%s','%s','%s')
	);
	wp_mail( $to, $subject, $message , $headers);	
	exit;
	
} else { 
	$response['status']=0;
	$response['field']='#orderid';
	//$response['message']=$newupload;
	echo json_encode($response); exit;
}


	
?>