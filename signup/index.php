<!DOCTYPE html>
<html lang="en">
<head>
	<title>Signup</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================	
	<link rel="icon" type="image/png" href="https://netgigs.co.in/images/favicon_icon.ico/">-->
<!-- =============================================================================================== -->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #999999;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('images/bg-01.jpg');">
				<!-- <a href="https://netgigs.co.in" class="fixed-top"><img  class="img-flex"src="https://netgigs.co.in/images/icon.png" style="position: absolute; width: 4%;margin-top: 1%; margin-left: 5%" /></a>
				<p class="text-wrap" style="position: absolute; margin-left:15%;margin-top: 15%"> Text comes up!! </p> -->

			</div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form class="login100-form validate-form" method="post" action="" id="signup">
					<span class="login100-form-title p-b-59">
						Sign Up
					</span>
					<!--
					<p>You are selecting the following Plan</p>
	                 <p><input type="radio" value="BASIC " name="role" checked>  Basic</input>
	                    <input type="radio" value="PRO " name="role">  Pro</input>
	                    <input type="radio" value="PREMIUM " name="role">  Premium</input>
	                </p>
					-->
					<p>
						<select id='products' onchange="productsfun()" required="true" name="products" class="input100" style="height: unset;">
							<option>       </option>
							<option>Smart Start</option>
							<option>Smart OFFload</option>
							<option>Smart Health</option>
							<option>Web Development</option>
                            <option>Web Design</option>
							<option>Web Hosting</option>
							<option>Logo Design</option>
							<option>App Development</option>
							<option>Career Guidance</option>
							<option>Online Training</option>
						</select>	
					</p>
					<p>
						
					<select id='sst' style='display: none;height: unset;' class="input100">
							<option value='Premium++Premium+++++'>SST-1</option>
						</select>
					<select id='she' style='display: none;height: unset;' class="input100">
							<option value='she+++++++'>SHE-1</option>
						</select>
					<select id='sof' style='display: none;height: unset;' class="input100">
							<option value='++Premium+Premium++++'>SOF-1</option>
						</select>
					<select id='wdr' style='display: none;height: unset;' class="input100">
							<option value='Basic+++++++'>Basic</option>
							<option value='Pro+++++++'>Pro</option>
							<option value='Premium+++++++'>Premium</option>						
						</select>							
					<select id='wds' style='display: none;height: unset;' class="input100">
							<option value='+Basic++++++'>Basic</option>
							<option value='+Pro++++++'>Pro</option>
							<option value='+Premium++++++'>Premium</option>
						</select>
                    <select id='whr' style='display: none;height: unset;' class="input100">
							<option value='++Basic+++++'>Basic</option>
							<option value='++Pro+++++'>Pro</option>
							<option value='++Premium+++++'>Premium</option>
						</select>
					<select id='ldr' style='display: none;height: unset;' class="input100">
							<option value='+++Basic++++'>Basic</option>
							<option value='+++Pro++++'>Pro</option>
							<option value='+++Premium++++'>Premium</option>
						</select> 
					<select id='apd' style='display: none;height: unset;' class="input100">
							<option value='++++Basic+++'>Basic</option>
							<option value='++++Pro+++'>Pro</option>
							<option value='++++Premium+++'>Premium</option>
						</select>
					<select id='cgr' style='display: none;height: unset;' class="input100">
							<option value='+++++Basic++'>Basic</option>
							<option value='+++++Pro++'>Pro</option>
							<option value='+++++Premium++'>Premium</option>
						</select>					
					<select id='otr' style='display: none;height: unset;' class="input100">
							<option value='++++++Basic+'>Basic</option>
							<option value='++++++Pro+'>Pro</option>
							<option value='++++++Premium+'>Premium</option>
						</select>					
											
						
					<div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100">Full Name</span>
						<input class="input100" type="text" required="" placeholder="Name" name="name" id="name">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" required="" placeholder="Email" name="email" id="email">
						<span class="focus-input100"></span>
					</div>

					<!--<div class="wrap-input100 validate-input" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" placeholder="Min 8 char & No special symbols" required="" name="username" id="username" pattern="[a-zA-Z][a-zA-Z0-9]{7,20}">
						<span class="focus-input100"></span>
					</div> -->

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" required="" placeholder="Password" name="password" id="password">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Repeat Password is required">
						<span class="label-input100">Repeat Password</span>
						<input class="input100" type="password" placeholder="Confirm Password" required="" name="confirm_password" id="confirm_password">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input">
						<span class="label-input100">Address</span>
						<input class="input100" type="text" required="" placeholder="Address"name="address" id="address">
						<span class="focus-input100"></span>
					</div>

					<!--<div class="flex-m w-full p-b-33">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								<span class="txt1">
									I agree to the
									<a href="#" class="txt2 hov1">
										Terms of User
									</a>
								</span>
							</label>
						</div>

						
					</div> -->
<div id="result" style="color:red;font-family:Verdana;"></div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Sign Up
							</button>
						</div>

						<a href="/login/" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Sign in
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
		function productsfun(){
		var products=document.getElementById("products").value;
		if(products=='Smart OFFload'){
			var cgr=document.getElementById("cgr").style.display="none";
			var cgn=document.getElementById("cgr").name="role1";
			var otr=document.getElementById("otr").style.display="none";
			var otn=document.getElementById("otr").name="role1";
			var whr=document.getElementById("whr").style.display="none";
			var whn=document.getElementById("whr").name="role1";
			var wdr=document.getElementById("wdr").style.display="none";
			var wdn=document.getElementById("wdr").name="role1";
	        var wds=document.getElementById("wds").style.display="none";
			var wdn=document.getElementById("wds").name="role1";
		    var apd=document.getElementById("apd").style.display="none";
			var apd=document.getElementById("apd").name="role1";
		    var ldr=document.getElementById("ldr").style.display="none";
			var ldn=document.getElementById("ldr").name="role1";
			var sof=document.getElementById('sof').style.display="block";
			var sof=document.getElementById("sof").name="role";
			var she=document.getElementById('she').style.display="none";
			var she=document.getElementById("she").name="role1";
			var sst=document.getElementById('sst').style.display="none";
			var sst=document.getElementById("sst").name="role1";
			
		}
		else if(products=='Smart Health'){
			var cgr=document.getElementById("cgr").style.display="none";
			var cgn=document.getElementById("cgr").name="role1";
			var otr=document.getElementById("otr").style.display="none";
			var otn=document.getElementById("otr").name="role1";
			var whr=document.getElementById("whr").style.display="none";
			var whn=document.getElementById("whr").name="role1";
			var wdr=document.getElementById("wdr").style.display="none";
			var wdn=document.getElementById("wdr").name="role1";
	        var wds=document.getElementById("wds").style.display="none";
			var wdn=document.getElementById("wds").name="role1";
		    var apd=document.getElementById("apd").style.display="none";
			var apd=document.getElementById("apd").name="role1";
		    var ldr=document.getElementById("ldr").style.display="none";
			var ldn=document.getElementById("ldr").name="role1";
			var sof=document.getElementById('sof').style.display="none";
			var sof=document.getElementById("sof").name="role1";
			var she=document.getElementById('she').style.display="block";
			var she=document.getElementById("she").name="role";
			var sst=document.getElementById('sst').style.display="none";
			var sst=document.getElementById("sst").name="role1";
			
		}
		else if(products=='Smart Start'){
			var cgr=document.getElementById("cgr").style.display="none";
			var cgn=document.getElementById("cgr").name="role1";
			var otr=document.getElementById("otr").style.display="none";
			var otn=document.getElementById("otr").name="role1";
			var whr=document.getElementById("whr").style.display="none";
			var whn=document.getElementById("whr").name="role1";
			var wdr=document.getElementById("wdr").style.display="none";
			var wdn=document.getElementById("wdr").name="role1";
	        var wds=document.getElementById("wds").style.display="none";
			var wdn=document.getElementById("wds").name="role1";
		    var apd=document.getElementById("apd").style.display="none";
			var apd=document.getElementById("apd").name="role1";
		    var ldr=document.getElementById("ldr").style.display="none";
			var ldn=document.getElementById("ldr").name="role1";
			var sof=document.getElementById('sof').style.display="none";
			var sof=document.getElementById("sof").name="role1";
			var she=document.getElementById('she').style.display="none";
			var she=document.getElementById("she").name="role1";
			var sst=document.getElementById('sst').style.display="block";
			var sst=document.getElementById("sst").name="role";
			
		}
		else if(products=='Career Guidance'){
			var cgr=document.getElementById("cgr").style.display="block";
			var cgn=document.getElementById("cgr").name="role";
			var otr=document.getElementById("otr").style.display="none";
			var otn=document.getElementById("otr").name="role1";
			var whr=document.getElementById("whr").style.display="none";
			var whn=document.getElementById("whr").name="role1";
			var wdr=document.getElementById("wdr").style.display="none";
			var wdn=document.getElementById("wdr").name="role1";
	        var wds=document.getElementById("wds").style.display="none";
			var wdn=document.getElementById("wds").name="role1";
		    var apd=document.getElementById("apd").style.display="none";
			var apd=document.getElementById("apd").name="role1";
		    var ldr=document.getElementById("ldr").style.display="none";
			var ldn=document.getElementById("ldr").name="role1";
			var sof=document.getElementById('sof').style.display="none";
			var sof=document.getElementById("sof").name="role1";
			var she=document.getElementById('she').style.display="none";
			var she=document.getElementById("she").name="role1";
			var sst=document.getElementById('sst').style.display="none";
			var sst=document.getElementById("sst").name="role1";
			
		}
		else if(products=='Online Training'){
			var cgr=document.getElementById("cgr").style.display="none";
			var cgn=document.getElementById("cgr").name="role1";
			var otr=document.getElementById("otr").style.display="block";
			var otn=document.getElementById("otr").name="role";
			var whr=document.getElementById("whr").style.display="none";
			var whn=document.getElementById("whr").name="role1";
			var wdr=document.getElementById("wdr").style.display="none";
			var wdn=document.getElementById("wdr").name="role1";
			var wds=document.getElementById("wds").style.display="none";
			var wdn=document.getElementById("wds").name="role1";
		    var apd=document.getElementById("apd").style.display="none";
			var apd=document.getElementById("apd").name="role1";
		    var ldr=document.getElementById("ldr").style.display="none";
			var ldn=document.getElementById("ldr").name="role1";
			var sof=document.getElementById('sof').style.display="none";
			var sof=document.getElementById("sof").name="role1";
			var she=document.getElementById('she').style.display="none";
			var she=document.getElementById("she").name="role1";
			var sst=document.getElementById('sst').style.display="none";
			var sst=document.getElementById("sst").name="role1";
			
		}
		else if(products=='Web Hosting'){
			var cgr=document.getElementById("cgr").style.display="none";
			var cgn=document.getElementById("cgr").name="role1";
			var otr=document.getElementById("otr").style.display="none";
			var otn=document.getElementById("otr").name="role1";
			var whr=document.getElementById("whr").style.display="block";
			var whn=document.getElementById("whr").name="role";
			var wdr=document.getElementById("wdr").style.display="none";
			var wdn=document.getElementById("wdr").name="role1";
			var wds=document.getElementById("wds").style.display="none";
			var wdn=document.getElementById("wds").name="role1";
		    var apd=document.getElementById("apd").style.display="none";
			var apd=document.getElementById("apd").name="role1";
		    var ldr=document.getElementById("ldr").style.display="none";
			var ldn=document.getElementById("ldr").name="role1";
			var sof=document.getElementById('sof').style.display="none";
			var sof=document.getElementById("sof").name="role1";
			var she=document.getElementById('she').style.display="none";
			var she=document.getElementById("she").name="role1";
			var sst=document.getElementById('sst').style.display="none";
			var sst=document.getElementById("sst").name="role1";
			
		}
		else if(products=='Web Development'){
			var cgr=document.getElementById("cgr").style.display="none";
			var cgn=document.getElementById("cgr").name="role1";
			var otr=document.getElementById("otr").style.display="none";
			var otn=document.getElementById("otr").name="role1";
			var whr=document.getElementById("whr").style.display="none";
			var whn=document.getElementById("whr").name="role1";
			var wdr=document.getElementById("wdr").style.display="block";
			var wdn=document.getElementById("wdr").name="role";
			var wds=document.getElementById("wds").style.display="none";
			var wdn=document.getElementById("wds").name="role1";
		    var apd=document.getElementById("apd").style.display="none";
			var apd=document.getElementById("apd").name="role1";
		    var ldr=document.getElementById("ldr").style.display="none";
			var ldn=document.getElementById("ldr").name="role1";
			var sof=document.getElementById('sof').style.display="none";
			var sof=document.getElementById("sof").name="role1";
			var she=document.getElementById('she').style.display="none";
			var she=document.getElementById("she").name="role1";
			var sst=document.getElementById('sst').style.display="none";
			var sst=document.getElementById("sst").name="role1";
		}
		else if(products=='Web Design'){
			var cgr=document.getElementById("cgr").style.display="none";
			var cgn=document.getElementById("cgr").name="role1";
			var otr=document.getElementById("otr").style.display="none";
			var otn=document.getElementById("otr").name="role1";
			var whr=document.getElementById("whr").style.display="none";
			var whn=document.getElementById("whr").name="role1";
			var wdr=document.getElementById("wdr").style.display="none";
			var wdn=document.getElementById("wdr").name="role1";
			var wds=document.getElementById("wds").style.display="block";
			var wdn=document.getElementById("wds").name="role";
		    var apd=document.getElementById("apd").style.display="none";
			var apd=document.getElementById("apd").name="role1";
		    var ldr=document.getElementById("ldr").style.display="none";
			var ldn=document.getElementById("ldr").name="role1";
			var sof=document.getElementById('sof').style.display="none";
			var sof=document.getElementById("sof").name="role1";
			var she=document.getElementById('she').style.display="none";
			var she=document.getElementById("she").name="role1";
			var sst=document.getElementById('sst').style.display="none";
			var sst=document.getElementById("sst").name="role1";
			
		}
		else if(products=='Logo Design'){
			var cgr=document.getElementById("cgr").style.display="none";
			var cgn=document.getElementById("cgr").name="role1";
			var otr=document.getElementById("otr").style.display="none";
			var otn=document.getElementById("otr").name="role1";
			var whr=document.getElementById("whr").style.display="none";
			var whn=document.getElementById("whr").name="role1";
			var wdr=document.getElementById("wdr").style.display="none";
			var wdn=document.getElementById("wdr").name="role1";
			var wds=document.getElementById("wds").style.display="none";
			var wdn=document.getElementById("wds").name="role1";
		    var apd=document.getElementById("apd").style.display="none";
			var apd=document.getElementById("apd").name="role1";
		    var ldr=document.getElementById("ldr").style.display="block";
			var ldn=document.getElementById("ldr").name="role";
			var sof=document.getElementById('sof').style.display="none";
			var sof=document.getElementById("sof").name="role1";
			var she=document.getElementById('she').style.display="none";
			var she=document.getElementById("she").name="role1";
			var sst=document.getElementById('sst').style.display="none";
			var sst=document.getElementById("sst").name="role1";
		}
			else if(products=='App Development'){
			var cgr=document.getElementById("cgr").style.display="none";
			var cgn=document.getElementById("cgr").name="role1";
			var otr=document.getElementById("otr").style.display="none";
			var otn=document.getElementById("otr").name="role1";
			var whr=document.getElementById("whr").style.display="none";
			var whn=document.getElementById("whr").name="role1";
			var wdr=document.getElementById("wdr").style.display="none";
			var wdn=document.getElementById("wdr").name="role1";
			var wds=document.getElementById("wds").style.display="none";
			var wdn=document.getElementById("wds").name="role1";
		    var apd=document.getElementById("apd").style.display="block";
			var apd=document.getElementById("apd").name="role";
		    var ldr=document.getElementById("ldr").style.display="none";
			var ldn=document.getElementById("ldr").name="role1";
			var sof=document.getElementById('sof').style.display="none";
			var sof=document.getElementById("sof").name="role1";
			var she=document.getElementById('she').style.display="none";
			var she=document.getElementById("she").name="role1";
			var sst=document.getElementById('sst').style.display="none";
			var sst=document.getElementById("sst").name="role1";
			
		}

		else{
			
			alert("Please select Product");
			var sof=document.getElementById('sof').style.display="none";
			var she=document.getElementById('she').style.display="none";
			var sst=document.getElementById('sst').style.display="none";
			var cgr=document.getElementById("cgr").style.display="none";
			var otr=document.getElementById("otr").style.display="none";
			var whr=document.getElementById("whr").style.display="none";
			var wdr=document.getElementById("wdr").style.display="none";
			var wds=document.getElementById("wds").style.display="none";
			var ldr=document.getElementById("ldr").style.display="none";
			var apd=document.getElementById("apd").style.display="none";
		}
		}
	</script>	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script type="text/javascript">
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
       <script type="text/javascript">
    $(document).ready(function(){
           $("#signup").on('submit', function(e){
	    e.preventDefault();
            var formData = $(this).serialize();
               $.ajax({
                type: 'POST',
                url: 'signup.php',
                data: formData,
                success: function(response) {
                   // alert(response)
                    $("#result").text(response);

                }
            });
   });
  });

   if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</div>

</body>
</html>