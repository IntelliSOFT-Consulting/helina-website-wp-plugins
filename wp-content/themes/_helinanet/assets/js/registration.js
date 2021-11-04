/* Registration Ajax */
jQuery('#register-me').on('click',function(){
	
	var action = 'register_action';	
	
	var username = jQuery("#st-email").val();
	var mail_id = jQuery("#st-email").val();
	var firname = jQuery("#st-fname").val();
	var lasname = jQuery("#st-lname").val();
	var passwrd = jQuery("#st-psw").val();
	
	var ajaxdata = {
			action: 'register_action',
			username: username,
			mail_id: mail_id,
			firname: firname,
			lasname: lasname,
			passwrd: passwrd,			 
	};

	jQuery.post( ajaxurl, ajaxdata, function(res){ // ajaxurl must be defined previously
		jQuery("#error-message").html(res);
		const success =  res.includes("Successful");
		if (success) {
			//alert("T");
			$("#registrationContainer").hide();
			$("#successMsg").show();
			$("#loginContainer").show();			
			$(".login-pagey__heading").html("Signin to HELINA");
		}
	 });
	 
});


