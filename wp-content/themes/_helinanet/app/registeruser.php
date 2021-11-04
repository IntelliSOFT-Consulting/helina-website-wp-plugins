<?php
ob_start();

define('AJAX_REQUEST', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
if(!AJAX_REQUEST) {die('Sorry pal you can not be here');}
require('../../../../wp-load.php');
function st_handle_registration(){

if( $_POST['action'] == 'register_action' ) {

$error = '';

$uname = trim( $_POST['username'] );
 $email = trim( $_POST['mail_id'] );
 $fname = trim( $_POST['firname'] );
 $lname = trim( $_POST['lasname'] );
 $pswrd = $_POST['passwrd'];

if( empty( $_POST['username'] ) )
 $error .= '<p class="alert alert-danger">Enter Username</p>';

if( empty( $_POST['mail_id'] ) )
 $error .= '<p class="alert alert-danger">Enter Email Id</p>';
 elseif( !filter_var($email, FILTER_VALIDATE_EMAIL) )
 $error .= '<p class="alert alert-danger">Enter Valid Email</p>';

if( empty( $_POST['passwrd'] ) )
 $error .= '<p class="alert alert-danger">Password should not be blank</p>';

/*if( empty( $_POST['firname'] ) )
 $error .= '<p class="error">Enter First Name</p>';
 elseif( !preg_match("/^[a-zA-Z'-]+$/",$fname) )
 $error .= '<p class="error">Enter Valid First Name</p>';

if( empty( $_POST['lasname'] ) )
 $error .= '<p class="error">Enter Last Name</p>';
 elseif( !preg_match("/^[a-zA-Z'-]+$/",$lname) )
 $error .= '<p class="error">Enter Valid Last Name</p>';*/

if( empty( $error ) ){

$status = wp_create_user( $uname, $pswrd ,$email );

if( is_wp_error($status) ){
$msg = '';

 foreach( $status->errors as $key=>$val ){

 foreach( $val as $k=>$v ){
 	$msg = '<p class="alert alert-danger">'.$v.'</p>';
	}
 }

echo $msg;
}else{
	$msg = '<p class="success  alert alert-success">Registration Successful</p>';
	echo $msg;
}

} else {
	echo $error;
} die(1);
 }
}
add_action( 'wp_ajax_register_action', 'st_handle_registration' );
add_action( 'wp_ajax_nopriv_register_action', 'st_handle_registration' );


function user_metadata( $user_id ){
	
	if( !empty( $_POST['firname'] ) && !empty( $_POST['lasname'] ) ){
		update_user_meta( $user_id, 'first_name', trim($_POST['firname']) );
		update_user_meta( $user_id, 'last_name', trim($_POST['lasname']) );
	 }
		update_user_meta( $user_id, 'show_admin_bar_front', false );
	}
add_action( 'user_register', 'user_metadata' );
add_action( 'profile_update', 'user_metadata' );

?>