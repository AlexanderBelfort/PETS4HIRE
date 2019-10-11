<!doctype html>
<html lang="en">
  <head>

    <!-- Bootstrap CSS -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
   	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    	<script>
			function validateRequired(field, errorMessageField, alerttext) {
				if (!field.value) {
					//alert(alerttext);
					$(field).css("background-color", "salmon");
					$(errorMessageField).html(alerttext);
					return false;
				}
				$(field).css("background-color", "#ffffff");
				$(errorMessageField).html("");
				return true;
			}

			function validateEmail(field, errorMessageField, alerttext){
				if (!validateRequired(field, errorMessageField, alerttext)){
					return false;
				}
				let apos=field.value.indexOf("@");
				let dotpos=field.value.lastIndexOf(".");
				if (apos<1||dotpos-apos<2 || dotpos == (field.value.length-1)
					 || apos != field.value.lastIndexOf("@")) {
					// alert(alerttext);
					$(field).css("background-color", "salmon");
					$(errorMessageField).html(alerttext);
					return false;
				}
				$(field).css("background-color", "#ffffff");
				$(errorMessageField).html("");
				return true;
				
			}

			function validateForm(){
				let validName = validateRequired(document.forms["contactForm"]["name"], "#nameError", "Please provide a name!");
				let validEmail = validateEmail(document.forms["contactForm"]["email"], "#emailError", "Please provide a valid email!");
					
				if (validName && validEmail){
					return true;
				} else {
					// use jQuery append method to add an alert component to the DOM, if there is not one there already.  It will be removed from the DOM when it is dismissed
					let warning = document.getElementById("formWarningAlert");
					if (!warning) {
						$("body").append('<div class="alert alert-danger fixed-bottom alert-dismissible fade show" role="alert" id="formWarningAlert">NAME FIELD AND EMAIL FIELD ARE REQUIRED<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>"');
					}
					return false;
				}
			}
			
			 
			
			$(document).ready(function(){
				$(function(){
					$('[data-toggle="popover"]').popover();
				});
			});
		</script>
		
		

      
    <title>PETS4HIRE</title>
  </head>
  <body>
    
        <div class="container">
			<div class ="row">
				<div class="col-12">
				    <?php include "header.php"; ?>
				
				</div>
			</div>

			<div class="content">
				<div class="row">
					<div class="col-sm-12">
						<h1 class="contactclass" style="text-align: center;">Contact us!</h1>
							<form onsubmit="return validateForm();" action="post.php" method="post" id="contactForm">
								<fieldset>
								<legend>Personal Details:</legend>
								<div class="form-group row">
									<div class="col-3">
										<label for="name">Name:</label>
								</div>
								<div class="col-8">
									<input type="text" class="col form-control " name="name" id="name" placeholder="Name">
									 <div id="nameError"  class="error-message"></div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-3">
									<label for="email">Email address:</label>
								</div>
								<div class="col-8">
									<input type="email" class="form-control" name="email" id="email" placeholder="Email address">
									<div id="emailError" class="error-message"></div>
								</div>
							</div>
							<h1>Pick a pet for rent:</h1>
							<br>
							<div class="radioContainer">
								<input type="radio" name="foo" checked="checked"> Dragon
								<input type="radio" name="foo"> Eagle
								<input type="radio" name="foo"> Elephant
								<input type="radio" name="foo"> Crocodile
								<input type="radio" name="foo"> Dog
								<input type="radio" name="foo"> Sloth
							</div>
								</fieldset>
								<br>
								<h1 class="commentclass" style="text-align: center;">Leave us a comment!</h1>
								<fieldset>
									<legend>Comment:</legend>
									<textarea rows="6" cols="50" name="message"> I would like to rent..</textarea>
									<br>
								</fieldset>
								<br>
								<input type="submit" style="font-size: 30px;">
								<input type="reset" style="font-size: 30px;">
								<input type="hidden" name="username" value="us01ats17">
								<input type="hidden" name="webmasteremail" value="jojonas@mail.bg">
								<input type="hidden" name="homepage" value="post.php">
							</form>
					</div>
				</div>
			</div>

			
  <?php include "footer.php"; ?>
			
		</div>
		 
    
  </body>
</html>