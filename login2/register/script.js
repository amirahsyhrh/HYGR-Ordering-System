
$(document).ready(function() {

		// form autocomplete off		
		$(":input").attr('autocomplete', 'off');

		// remove box shadow from all text input
		$(":input").css('box-shadow', 'none');



		// save button click function
		$("#savebtn").click(function() {

			// calling validate function
			var response =  validateForm();

			// if form validation fails			
			if(response == 0) {
				return;
			}


			// getting all form data
			var cust_email     =   $("#cust_email").val();
			var cust_name      =   $("#cust_name").val();
			var cust_password  =   $("#cust_password").val();


			// sending ajax request
			$.ajax({

				url: './process.php',
				type: 'post',
				data: {
						 'cust_name' : cust_name, 
					     'cust_email': cust_email,
					     'cust_password' : cust_password,
					     'save' : 1
					},

				// before ajax request
				beforeSend: function() {
					$("#result").html("<p class='text-success'> Please wait.. </p>");
				},	

				// on success response
				success:function(response) {
					$("#result").html(response);

					// reset form fields
					$("#regForm")[0].reset();
				},

				// error response
				error:function(e) {
					$("#result").html("Some error encountered.");
				}

			});
		});




	// ------------- form validation -----------------

		function validateForm() {

			// removing span text before message
			$("#error").remove();


			// validating input if empty
			if($("#cust_name").val() == "") {
				$("#cust_name").after("<span id='error' class='text-danger'> Enter your name </span>");
				return 0;
			}

			if($("#cust_email").val() == "") {
				$("#cust_email").after("<span id='error' class='text-danger'> Enter your email </span>");
				return 0;
			}

			if($("#cust_password").val() == "") {
				$("#cust_password").after("<span id='error' class='text-danger'> Enter your password </span>");
				return 0;
			}

			if($("#c_password").val() == "") {
				$("#c_password").after("<span id='error' class='text-danger'> Re-enter your password </span>");
				return 0;
			}

			if($("#cust_password").val() !== $("#c_password").val()) {
				$("#c_password").after("<span id='error' class='text-danger'> Password not match </span>");
				return 0;
			}

			return 1;

		}


	// ------------------- [ Email blur function ] -----------------

		$("#cust_email").blur(function() {

			var cust_email  		= 		$('#cust_email').val();

			// if email is empty then return
			if(cust_email == "") {
				return;
			}


			// send ajax request if email is not empty
			$.ajax({
					url: 'process.php',
					type: 'post',
					data: {
						'cust_email':cust_email,
						'email_check':1,
				},

				success:function(response) {	

					// clear span before error message
					$("#email_error").remove();

					// adding span after email textbox with error message
					$("#cust_email").after("<span id='email_error' class='text-danger'>"+response+"</span>");
				},

				error:function(e) {
					$("#result").html("Something went wrong");
				}

			});
		});


	// -----------[ Clear span after clicking on inputs] -----------

	$("#cust_name").keyup(function() {
		$("#error").remove();
	});
	

	$("#cust_email").keyup(function() {
		$("#error").remove();
		$("span").remove();
	});

	$("#cust_password").keyup(function() {
		$("#error").remove();
	});

	$("#c_password").keyup(function() {
		$("#error").remove();
	});

});