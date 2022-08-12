<?php
session_start();
if (!empty($_SESSION['username'])){
	echo '<script>window.location.href = "./home.php";</script>';
}
?>
<!DOCTYPE html>
<html >
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Language" content="id-ID">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no"> -->
	<title>TOPSIS</title>
	<link rel="shortcut icon" href="./assets/img/logo.jpg" />
	<link rel="stylesheet" href="./assets/css/style.css">
	<link rel="stylesheet" href="./assets/css/owl.carousel.min.css">        
</head>
<body style="background: #6f6f6f"><!-- background-image: url(https://server.webiot.id/assets/imgs/webiot.jpg); background-repeat: no-repeat; background-size: 100% 100vh; -->
	<div id="wrap">
		<div id="regbar">
			<img src="./assets/img/logo.jpg" width="40px" style="margin-right: 10px;">
			<span class="brand">TOPSIS</span>
			<h3>
				<a href="#" id="loginform">
					<img src="./assets/img/login-white.png" alt="Login" width="25">
				</a>
			</h3>
			<div class="login">
				<div class="arrow-up"></div>
				<div class="formholder">
					<div class="randompad">
						<fieldset>
							<form action="./home.php" method="POST" data-parsley-validate>
								<label><b>Username</b></label>
								<input type="text" name="username" autofocus required/>
								<label><b>Password</b></label>
								<input type="password" name="password" required/>
								<input type="submit" name="login" value="Login" />
							</form>
						</fieldset>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section>
		<div class="left-half">
			<div style="padding: 60px 20px;">
				<p style="font-size: small;">** Try login with:</p>
				<p style="font-size: small;">Username : admin</p>
				<p style="font-size: small;">Password : admin</p>
			</div>
		</div>
		<div class="right-half">
			<div style="padding: 60px 20px;">
				<h1>TOPSIS</h1>
				<h1>(Technique For Others Reference by Similarity to Ideal Solution)</h1>
			</div>
		</div>
	</section>
	<script src="./assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script src="./assets/js/index.js"></script>
	<script src="./assets/js/owl.carousel.min.js"></script>
	<script>
		$(document).ready(function(){
			$("input").attr({
				'required':'required',
				'autocomplete':'off'
			});
		});
	</script>
</body>
</html>
