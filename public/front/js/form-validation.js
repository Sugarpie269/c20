$(document).ready(function(){

	$.validator.addMethod("usernameRegex", function(value, element) {
		return this.optional(element) || /^[a-zA-Z0-9 ]*$/i.test(value);
	}, "Username must contain only letters, numbers");

	$.validator.addMethod("emailRegex", function(value,element){
		return this.optional(element) || /[a-z0-9]+@[a-z0-9]+\.[a-z]{2,3}/i.test(value);
	}, "Please enter valid email address");

	$.validator.addMethod("ageRegex", function(value,element){
		return this.optional(element) || /^[0-9]*$/i.test(value);
	}, "Age must be in numbers");

	$.validator.addMethod("selectCountry", function(value, element){
		return value != 0;
	}, "Please select country");

	$.validator.addMethod("selectState", function(value,element){
		return value != 0;
	}, "Please select state");

	$.validator.addMethod("selectGender", function(value,element){
		return   value != 0;
	}, "Please select gender");

	$.validator.addMethod("selectNominate", function(value, element){
		return value != 0;
	}, "Please select Nominator");

	$.validator.addMethod("selectNominee", function(value,element){
		return value != 0;
	}, "Please select Nominee");


	$.validator.addMethod("nomineeRegex", function(value, element) {
		return this.optional(element) || /^[a-zA-Z0-9 ]*$/i.test(value);
	}, "Username must contain only letters, numbers");


	$.validator.addMethod("urlRegex", function(value,element){
		return this.optional(element) || /(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g.test(value);
	}, "Please enter valid url");


	$.validator.addMethod("writeStory_wordCount", function(value, element, writeStory_wordCount) {
		console.log(value.trim().split(/\s+/).length);
        return (value.trim().split(/\s+/).length > writeStory_wordCount)?false:true;
    }, 'Story must be less than 500 words');


	
	$(".next").click(function(){
		var form = $("#msform");
		form.validate({
			errorElement: 'span',
			errorClass: 'help-block',
			highlight: function(element, errorClass, validClass) {
				$(element).closest('.form-group').addClass("has-error");
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).closest('.form-group').removeClass("has-error");
			},
			errorPlacement: function (error, element) {
				if($(element).parent() == "label"){
					error.insertAfter(element.closest('label'));   
				}
				else{
					error.insertAfter(element.closest('div'));  
				}               
                                 
            },
			rules:{
				name:{
					required:true,
					usernameRegex:true
				},
				email:{
					required:true,
					emailRegex:true

				},
				country:{
					required:true,
					selectCountry:true
				},
				state:{
					required:true,
					selectState:true
				},
				age:{
					// required:true,
					ageRegex:true
				},
				gender:{
					// required:true,
					// selectGender:true
				},
				nomination_type:{
					required:true,
					selectNominate:true
				},
				nominee_relation:{
					required:true,
					selectNominee:true
				},
				naminee_name:{
					required:true,
					nomineeRegex:true
				},
				naminee_gender:{
					required:true,
					selectGender:true
				},
				naminee_email:{
					required:function(element){
						return ($('input[name=forEmail]:checked').val() =="Yes")?true:false;
					},
					emailRegex:true					
				},
				naminee_country:{
					required:true,
					selectCountry:true
				},
				naminee_state:{
					required:true,
					selectState:true					
				},
				story:{
					required:true,
					writeStory_wordCount: function () {
						return  500
					},
				},
				// concent_1:{
				// 	required:true,					
				// },
				// concent_2:{
				// 	required:true,					
				// },
				// concent_3:{
				// 	required:true,					
				// },
				/*info_url:{
					required:true,
					urlRegex:true
				},*/
				email_nominee:{
					required:true,
					emailRegex:true						
				}
			},
			messages: {				
				username: {
					required: "Username required",
				},
				email:{
					required:"Email required",

				},
				country:{
					required:"Country required",
				},
				state:{
					required:"State required",
				},
				age:{
					required:"Age required"
				},
				gender:{
					required:"Gender required"
				},
				concent_1:{
					required:"We need your concent on this",					
				},
				concent_2:{
					required:"We need your concent on this",					
				},
				concent_3:{
					required:"We need your concent on this",					
				},
			}




		});
			if (form.valid() === true){
				if ($('#nomination-form1').is(":visible")){
					current_fs1 = $('#nomination-form1');
					next_fs1 = $('#nomination-form2');
				}
				else if($('#nomination-form2').is(":visible")){
					current_fs1 = $('#nomination-form2');
					next_fs1 = $('#nomination-form3');
				}
				
				next_fs1.show(); 
				current_fs1.hide();
			}
		});

		$('.previous').click(function(){
			if($('#nomination-form2').is(":visible")){
				current_fs2 = $('#nomination-form2');
				next_fs2 = $('#nomination-form1');
			}else if ($('#nomination-form3').is(":visible")){
				current_fs2 = $('#nomination-form3');
				next_fs2 = $('#nomination-form2');
			}
			next_fs2.show(); 
			current_fs2.hide();
		});



		// $(".submit-btn").click(function(){
		// 		var checkFields = $("input[name='concent']").serializeArray();
		// 	    if (checkFields.length === 0) 
		// 	    { 
		// 	        alert('consent required'); 
		// 	        return false;
		// 	    } 
		// 	    else 
		// 	    { 
		// 	        alert(checkFields.length + " items selected"); 
		// 	    } 
		// });

		

		
			


	// })

})