<?php
ob_start();

define('AJAX_REQUEST', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
if(!AJAX_REQUEST) {die('Sorry pal you can not be here');}
require('../../../../../wp-load.php');
/*
 * Newsletter Subscriber Script
 * Author: Webisir
 * Author URI: http://themeforest.net/user/webisir
 */


/* ========================== SETTINGS - Edit ONLY this section ========================== */


/* Mailchimp Settings */
$mailchimp          = true;            // Set to TRUE to use Mailchimp
$mailchimpApiKey    = '284876098b37857e78e7ba7498c5cf90-us5';               // Your Mailchimp Api Key
$mailchimpIDList    = '26b308e9f0';               // Your Mailchimp ID list
$double_optin       = false;            // Set to TRUE to conrol whether a double opt-in confirmation message is sent
$send_welcome       = true;            // Set to TRUE to send a welcome message when the subscription is successful. NOTE: $double_optin must be set to FALSE

/* File Storage Setting */
$csv = true;                            // Set to TRUE to save emails in a csv file. Otherwise in a txt file.


/* ======================================================================================= */


if ( isset( $_POST['newsletter'] ) ) {

    $email = $_POST['newsletter'];
	$name = $_POST['user_name'];
	
	$response=array();
	if(!is_email($email)){
		$response['status']=0;
		$response['field']='#email';
		$response['message']='Enter a valid email address';
		echo json_encode($response); exit;		
	}

    if ( $mailchimp ) {

        require_once 'MailChimp.class.php';

        $MailChimpObj = new MailChimp( $mailchimpApiKey );

        $result = $MailChimpObj->call( 'lists/subscribe', array(
                'id'                => $mailchimpIDList,
                'email'             => array('email' => $email),
				'merge_vars'      => array('FNAME' => $name),
                'double_optin'      => $double_optin,
                'send_welcome'      => $send_welcome,
            ));

        if ( array_key_exists( 'status', $result ) ) {

            if ( $result['code'] == 214 ) {
               // echo 'duplicate';
			   $response['status']=0;
				$response['field']='#orderid';
				$response['message']='That is a duplicate entry. It appears the email address provided exists in our database';
				echo json_encode($response);exit;
            } else {
                //echo 'fail';
				$response['status']=0;
				$response['field']='#orderid';
				$response['message']='Opps! There has been a problem adding your details to our mailing system. Please contact <strong>cio.co.ke</strong> via <strong><a href="mail:info@cio.co.ke">info@cio.co.ke</a></strong>.';
				echo json_encode($response);exit;
            }

        } else {

            //echo 'success';
			$response['status']=1;
			$response['field']='#orderid';
			$response['message']='Thank you for subscribing to HELINA mailing list';
			echo json_encode($response);exit;
        }

    } else {

        $double = false;

        if ( $csv ) {

            $file = fopen( 'list.csv', 'a+' );

            while ( $row = fgetcsv( $file ) ) {
                if ( $row[0] == $email ) {
                    $double = true;
                    break;
                }
            }

        } else {

            $file = fopen( 'list.txt', 'a+' );
            
            while ( ( $buffer = fgets( $file, 4096 ) ) !== false ) {
                if ( $buffer == $email . "\n" ) {
                    $double = true;
                    break;
                }
            }

        }

        if ( ! $double ) {

            if ( $csv ) {
                fputcsv( $file, array($email) ); 
            } else {
                fwrite( $file, $email . "\n" );
            }

            //echo 'success';
			$response['status']=1;
			$response['field']='#orderid';
			$response['message']='Thank you for subscribing to HELINA mailing list';
			//$response['postid']=$newupload;
			echo json_encode($response);exit;
			

        } else {

            //echo 'duplicate';
			$response['status']=0;
			$response['field']='#orderid';
			$response['message']='That is a duplicate entry. It appears the email address provided exists in our database';
			echo json_encode($response);exit;
        }

        fclose( $file );

    }   

}