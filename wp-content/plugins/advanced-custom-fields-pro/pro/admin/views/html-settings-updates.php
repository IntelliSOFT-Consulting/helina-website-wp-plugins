<?php

// vars
$active   = $license ? true : false;
$nonce    = $active ? 'deactivate_pro_licence' : 'activate_pro_licence';
$button   = $active ? __( 'Deactivate License', 'acf' ) : __( 'Activate License', 'acf' );
$readonly = $active ? 1 : 0;

?>

<style type="text/css">
	#acf_pro_licence {
		width: 75%;
	}
	
	#acf-update-information td h4 {
		display: none;
	}
</style>
