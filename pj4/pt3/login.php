<!DOCTYPE html>
<html lang="en">

<head>
	<title>Mini Blog PT4</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" href="assets/css/Basic-Header.css">
	<style>

		.wrap-login100 {
  width: 600;
  background: #fff;
  border-radius: 30px;
  overflow: hidden;

  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  padding: 105px 130px 33px 95px;
  margin-top: -125px;
  
}

body{

	overflow:hidden;
}

</style>

</head>

<body>

	<header>
		<div>
			<nav class="navbar navbar-default navigation-clean-button">
				<div class="container">
					<div class="navbar-header"><a class="navbar-brand" href="">Projet n°4 Noé - Login</a>

					</div>

					<p class="navbar-text navbar-right actions">
						<a class="btn btn-default action-button" role="button" href="article.php">Accueil</a></p>

				</div>
			</nav>
		</div>
	</header>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="acceslogin.php" method="post">
					<span class="login100-form-title">
						Membre
					</span>

					<div class="wrap-input100 validate-input" data-validate="L'ID est nécessaire">
						<input class="input100" type="text" name="LOGIN_ID" maxlength="15" placeholder="ID" autofocus>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Le mot de passe est nécessaire">
						<input class="input100" type="password" name="LOGIN_MDP" maxlength="15" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="btnSubmit">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
						<?php

						$conf = isset($_GET['verif']) ? $_GET['verif'] : null;

						if ($conf == true)
						{
							echo '<p class="text-center"> ID ou MDP erroné </p>';
						}

						?>
					</div>


				</form>

			</div>

		</div>

	</div>




	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>



</body>

</html>