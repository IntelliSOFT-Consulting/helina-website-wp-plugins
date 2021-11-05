//popup
$("#have-questions-call").click(function(event) {
   if (!$(event.target).closest('.arrow-box-content').length) {
  $('.arrow-box-content').toggleClass('expanded');
   }
});
$(document).on('click', function(event) {
    if (!$(event.target).closest('#have-questions-call').length) {
      $('.arrow-box-content').removeClass('expanded');
    }
}); 
setTimeout(function(){
   $('.arrow-box-content').toggleClass('expanded1');
setTimeout(function(){
   $('.arrow-box-content').toggleClass('expanded');
},5000);
},500000);
//Contact Us
function contactUs() {
        var spinner = $('#loader');
		const contactURLC = 'https://script.google.com/macros/s/AKfycbyneTVI4My4HuZ99dO3AgXXrbCvLygF9xxvV8T8TXvhw7WM3YRJeN8JsC5oyeFm-T0qEg/exec'
        const contactForm = document.forms['contact-us'];
            spinner.show();
            fetch(contactURLC, {
                    method: 'POST',
                    body: new FormData(contactForm)
                })
                .then(res => {
                    console.log(res);
                    spinner.hide();

                    if (res['status'] == 200) {
                        $("#contact_feedback_success").show();
						$("#contactForm")[0].reset();
						$("#fieldArea").hide();
						var btn=$('#btn_contactus');
						btn.val('Contact Us').removeAttr('onClick');
						
                        return true;

                    } else {
                        $("#contact_feedback_err").show();

                    }
                    document.getElementById('submitForm').classList.remove('loading');
                })
                .catch(error => {

                    //alert("Something went wrong!", "Please try after some time", "error");
					$("#contact_feedback_err").show();
                    // todo enable submit button

                })
}

//Webcomment
function submitWebComment() {
        var spinner = $('#loader');
		const scriptURLC = 'https://script.google.com/macros/s/AKfycbxFBVW4f4xdjJKnI4pvSde_9ek3osGODRNmNak9wtLyAXpuXPnWaL7RFanJOVkYvqEu/exec'
        const serverlessForm = document.forms['serverless-form'];
            spinner.show();
            fetch(scriptURLC, {
                    method: 'POST',
                    body: new FormData(serverlessForm)
                })
                .then(res => {

                    console.log(res);
                    spinner.hide();

                    if ( (res['status'] == 200) && ($("#websiteReviewMessage").val().trim().length > 1) ) {
						$("#feedback_success").show();
						$("#websiteReviewMessage").val("");
						$("#fieldArea").hide();
                        return true;

                    } else {
						$("#feedback_err").show();

                    }
                    document.getElementById('submitForm').classList.remove('loading');
                })
                .catch(error => {

                    alert("Something went wrong!", "Please try after some time", "error");
                    // todo enable submit button

                })
} 

///Partnershi
function becomeHelinaPartner() {
        var spinner = $('#loader');
		const scriptURLC = 'https://script.google.com/macros/s/AKfycbwA3DeosU2S-TNx4AkfMB_X42Kiyr2poCS19aup2A998tOvocdnphUy8AGeV-EP8Eb8/exec'
        const serverlessForm = document.forms['become-a-partner-form'];
            spinner.show();
            fetch(scriptURLC, {
                    method: 'POST',
                    body: new FormData(serverlessForm)
                })
                .then(res => {

                    console.log(res);
                    spinner.hide();

                    if ( (res['status'] == 200) ) {
						$("#partner_feedback_success").show();
						$("#submitPartnershipRequest")[0].reset();
						$("#fieldArea").hide();
						var btn=$('#btn_becomepartner');
						btn.val('Submit Partnership Appeal').removeAttr('onClick');
                        return true;

                    } else {
						$("#partner_feedback_err").show();
						btn.val(oldtext).attr('onClick','becomeHelinaPartner()');

                    }
                    document.getElementById('submitForm').classList.remove('loading');
                })
                .catch(error => {

                    $("#partner_feedback_err").show();
					btn.val(oldtext).attr('onClick','becomeHelinaPartner()');
                    // todo enable submit button

                })
} 

//Become Helina Member
function becomeHelinaMember() {
		var btn=$('#btn_becomemember');
		var oldtext = btn.val();
        var spinner = $('#loader');
		const scriptURLC = 'https://script.google.com/macros/s/AKfycbzsZplfrM1-D56hnNyQfXd_47cM1ykrkD8peNfzhXvXKZeq7-9HsJY5SHSS8D5pTOYc/exec'
        const serverlessForm = document.forms['become-a-member-form'];
            spinner.show();
            fetch(scriptURLC, {
                    method: 'POST',
                    body: new FormData(serverlessForm)
                })
                .then(res => {

                    console.log(res);
                    spinner.hide();

                    if ( (res['status'] == 200) ) {
						$("#member_feedback_success").show();
						$("#submitMembershipRequest")[0].reset();
						$("#fieldArea").hide();
						btn.val('Submit Membership Appeal').removeAttr('onClick');
                        return true;

                    } else {
						$("#member_feedback_err").show();
						btn.val(oldtext).attr('onClick','becomeHelinaMember()');

                    }
                })
                .catch(error => {

                    //alert("Something went wrong!", "Please try after some time", "error");
					$("#member_feedback_err").show();
					btn.val(oldtext).attr('onClick','becomeHelinaMember()');
                    // todo enable submit button

                })
} 

//Validations
//submitMembershipRequest
$(function() {
    var content = $('#submitMembershipRequest textarea').val();
    $('#submitMembershipRequest textarea').keyup(function() {
        if ($('#submitMembershipRequest textarea').val() != content) {
            content = $('#submitMembershipRequest textarea').val();
			$('#btn_becomemember').prop('disabled', false); 
        }
    });
});


//submitPartnershipRequest
$(function() {
    var content = $('#submitPartnershipRequest textarea').val();
    $('#submitPartnershipRequest textarea').keyup(function() {
        if ($('#submitPartnershipRequest textarea').val() != content) {
            content = $('#submitPartnershipRequest textarea').val();
			$('#btn_becomepartner').prop('disabled', false); 
        }
    });
});

//webChat
$(function() {
    var content = $('#shareComment textarea').val();
    $('#shareComment textarea').keyup(function() {
        if ($('#shareComment textarea').val() != content) {
            content = $('#shareComment textarea').val();
			$('#btn_submitchat').prop('disabled', false); 
        }
    });
});

//contactUs
$(function() {
    var content = $('#contactForm textarea').val();
    $('#contactForm textarea').keyup(function() {
        if ($('#contactForm textarea').val() != content) {
            content = $('#contactForm textarea').val();
			$('#btn_contactus').prop('disabled', false); 
        }
    });
});