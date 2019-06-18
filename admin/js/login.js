$(document).ready(function () {
	
	$("#frm_testimonials").validate({
        rules: {
            username: {required: true,
					   email:true
					   },
			password :{required: true}
        },
        highlight: function (element) {
		    $(element).closest('.frm_testimonials').removeClass('success').addClass('error');
        },
		messages: {			
			username: {
						accept: "Please enter your Email Address.",
						email:"Please enter valid Email Address."		
					  },
		    password:{
					   accept:"Please enter Password."
				     }
				}
    });
	
});