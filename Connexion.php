
<?php
 session_start();

$_SESSION["connecte"] = true;
$_SESSION["code"] = "0";



?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Espace Clients</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
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
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="post" action="connexionPHP.php" >
					<span class="login100-form-title">
						Connexion
						<h4><a href="index.html">Page d'Accueil</a></h4>
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Veuillez rentre votre identifiants">
						<input class="input100" type="text" name="user" id="user" placeholder="identifiants">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Veuillez rentre votre Mot de passe">
						<input class="input100" type="password" name="pass" id="pass" placeholder="Mot de passe">
						<span class="focus-input100"></span>
					</div>
					<!-- <?php // include 'connexionPHP.php'; echo $message; ?> -->
                    
					<div class="text-right p-t-13 p-b-23">
						<span class="txt1">
							Oublié
						</span>

						<a href="IDPerdu.php" class="txt2">Identifiant 
							/<a href="MdpPerdu.php" class="txt2"> Mot-de-passe ?
						</a>
					</a>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Connnexion
						</button>
					</div>
					<div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							Avez vous un compte VéLouer ?
						</span>

						<a href="Inscription.php" class="txt3">
							Inscription
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
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
	<script src="js/main.js"></script>

</body>
</html>
<?
session_destroy(); //Je detruit tout les sesion
?>

