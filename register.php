<html>
	<head>
		<title>REGISTER|OAP</title>
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

		<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="css/form.css" rel="stylesheet">
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery-2.1.0.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.validate.min.js"></script>
		
	</head>
	<body>
		<div class="main">
		<div class="formMain">
			<div class="regFormElements">
				<div class="card-header">
					Registration Form
					<hr>
				</div>
				<form method="post" class="regForm" id="validateIt" action="regParse.php">
				<div class="row">
					  <div class="form-group col-md-6">
						<label for="name" class="labelElements">Enter Your Name</label>
						<input type="text" name="name" data-rule-required="true" data-msg-required="Please Enter Your Name" class="form-control" id="name" placeholder="Enter Name">
					  </div>
					  <div class="form-group col-md-6">
						<label for="cno" class="labelElements">Enter Your Contact Number</label>
						<input type="text" name="cno" data-rule-minlength="10" data-rule-maxlength="10" data-rule-numbersonly="true" data-msg-numbersonly="Contact number do not expects any alphabet" data-rule-required="true" data-msg-required="Please Enter Your Contact Number" class="form-control" id="cno" placeholder="Enter Contact Number">
					  </div>
				  </div>
				  <div class="row">
					  <div class="form-group col-md-6">
						<label for="address" class="labelElements">Enter Your Address</label>
						<input type="text" name="address" data-rule-required="true" data-msg-required="Please Enter Your Address" class="form-control" id="address" placeholder="Enter Address">
					  </div>
					  <div class="form-group col-md-6">
					    <label class="labelElements" for="dob">DOB</label>
					    <input type="date" name="dob" id="dob" max="2001-04-31" min="1990-01-01" value="2000-04-01" class="form-control" data-rule-required="true" data-msg-required="Please select the date of birth">
					  </div>
				  </div>
				  <div class="row">
					  <div class="form-group col-md-6">
						<label for="password" class="labelElements">Enter Your Password</label>
						<input type="password" name="password" data-rule-password="true" data-msg-password="Enter combination of numbers and letters of minimum 8 characters" data-rule-required="true" data-msg-required="Please Enter Your Password" class="form-control" id="password" placeholder="Password">
					  </div>
					  <div class="form-group col-md-6">
						<label for="cnfpass" class="labelElements">Confirm Your Password</label>
						<input type="password" name="cnfpass" data-rule-password="true" data-msg-password="Enter combination of numbers and letters of minimum 8 characters" data-rule-required="true" data-msg-required="Please Confirm Your Password" class="form-control" id="cnfpass" placeholder="Confirm Password">
					  </div>
				  </div> 
				  <div class="row">
					<button type="submit" class="btn sub2 col-md-4">Register</button>
					<a href="login.php" style="text-decoration:none;margin-top:55px;margin-left:150px;">Already have an account?</a>
				  </div>
				  <div id="cnfmsg">Success</div>
				  <div id="passmsg">Passwords do not matched</div>
				  <div id="errormsg">Something went wrong...Please try again</div> 
				</form>
			</div>
		</div>
	</div>
	<script>
		jQuery.validator.addMethod("numbersonly", function(value, element) {
			return this.optional(element) || /^[0-9]+$/i.test(value);
		}, "Enter Number");
	</script>
		
	<script>
		jQuery.validator.addMethod("password", function(value, element) {
			return this.optional(element) || /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/i.test(value);
		}, "Enter combination of numbers and alphabets");
	</script>
	
	<script>
		$('#validateIt').validate();
	</script>
		
	<script>
			$(document).ready(function() {
				$('.regForm').submit(function() {	
					var datastr=$(".regForm").serialize();
					$.ajax({
						type: "POST",
						url: "regParse.php",
						data: datastr,
						dataType: "json",
						encoded: "true",
						success: function(msg) {
							if (msg == 'error') {
								$("#cnfmsg").removeClass("show");
								$("#passmsg").removeClass("show");
								$("#errormsg").addClass("show");	
								setTimeout(function () {
									location.reload(true); 
								}, 1000);
							}
							else if (msg == 'passError'){
								$("#cnfmsg").removeClass("show");
								$("#passmsg").addClass("show");
								$("#errormsg").removeClass("show");
							}
							else {
								$("#cnfmsg").addClass("show");
								$("#passmsg").removeClass("show");
								$("#errormsg").removeClass("show");
								alert("Your User ID is: "+msg+" .It will be used for login so please remember it");
								setTimeout(function () {
									location.href="login.php"; 
								}, 1000);
							}
						}
					});
					return false;
				
				});
			});
	</script>	
	</body>
</html>