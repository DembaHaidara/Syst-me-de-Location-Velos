<?php  //Pag erreur
session_start();
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
	<script src="Jquery.js"></script>	


</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form validate-form p-l-55 p-r-55 p-t-178">
				<form class="form" name="form" method="post" action="">
					<span class="login100-form-title">
						VéLouer Mot de Passe Oublier
						<h4><a href="index.html">Page d'Accueil</a></h4>
					</span>
					<br><br>
						
						<div class="wrap-input100 validate-input" data-validate = "Veuillez rentrer votre Mail associer au compte ">
						<input class="input100" type="Email" id="email"name="email" placeholder="Veuillez rentrer votre Mail associer au compte" required="">
						<span class="focus-input100"></span>
					</div>
					<br><br>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							OK
						</button>
					</div>
					<div class="return"></div>
	<script type="text/javascript">
					$(document).ready(function () {

										//////////////////RECUPERATION DES DONNEE//////////////////


											$('.form').submit(function () {
												//si le formulaire est soumis je recupere le champ de la calss pseudo et message
												var mail = $(".input100").val();
												

													//Je test si je recupere les valeur :   
												//alert(nom + message); 
										// j'envoi les donne en PHP (URL,enPHP(postNOM) : enJS(var NOM) )
										// le " : " signifie que en attribut le post a la variable JS
											var send =	$.post('MdpPerduTraitement.php',{input100:mail},function(donnees) {

													$(".return").html(donnees).slideDown();
													//Pour remetre le formulaire vide dans les 2 champs:
												    $(".email").val('');
																													});

										return false;
																		});

});







	</script>				


					<div class="flex-col-c p-t-170 p-b-40">

						<span class="txt1 p-b-9">
							Avez vous un compte VéLouer ?
						</span>
						<a href="Connexion.php" class="txt3">
							Se Connecter
						</a>

						<a href="Inscription.php" class="txt3">
							Inscription
						</a>
					</div>
				</form>
				</div>
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
<?php 
session_destroy(); //Je detruit tout les sesion
?>
