<?php 
session_start();

if(isset($_SESSION["connecter3"]) == true){ //Sesion de la page connexionPHP ou InscriptionPHP(obligé de passer par une de c'est page)
} 
else{$_SESSION['erreurs'] = "Vous n'avez pas droit d'etre ici";
 header("Location:Erreur.php");
die();};
$_SESSION["connecte"] = true;
try {
	 
$bdd = new PDO('mysql:host=127.0.0.1;dbname=haidara', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs.

 
	if(isset($_SESSION['id'])) {} 

	else{ 
	   $_SESSION['erreurs']  = "Vous n'avez pas droit d'etre ici"; 
      header("Location:Erreur.php");//Redirection vers la page erreur 
      die();//arret le programe
       };

   $requser = $bdd->prepare("SELECT * FROM inscriptionsql WHERE id = ?");
   $requser->execute(array($_SESSION['id']));
   $user = $requser->fetch();

   if ($_SESSION['id'] == $user['id']) { 
      }
		// Si l id de la bdd n'est pas la meme que celle de la sesion id alors je bloque
  else{
  	$_SESSION['erreurs'] = "Vous n'avez pas droit d'etre ici";
		 header("Location:Erreur.php");
		die();
	  };

?>
<!DOCTYPE html>
<html>
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
				<script src="Jquery.js"></script>	

<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178"   method="POST" action="EditerProfilTraitement.php" id="form">
					<span class="login100-form-title">
						Editer Profil
					<h4><a href="index.html">Page d'Accueil</a></h4>

					</span>
									<!-- Partie identifiant -->
					<div class="wrap-input100 validate-input m-b-16" data-validate="Veuillez rentrer votre Identifiant">
						<input class="input100" type="text" name="user" class="user" id="user" placeholder="Identifiant">
						<span class="focus-input100"></span>
					</div>
					<br/>

																<!-- Partie MDP-->
					<div class="wrap-input100 validate-input" data-validate = "Veuillez rentrer votre mot de passe ">
						<input class="input100" type="password" name="pass" class="pass" id="pass" placeholder="mot de passe">
						<span class="focus-input100"></span>
					</div>
					<br/><br/>


						<div class="wrap-input100 validate-input" data-validate = "Veuillez rentrer votre mot de passe encore">
						<input class="input100" type="password" name="pass2" class="pass2" id="pass2" placeholder="Confirmer votre mot de passe">
						<span class="focus-input100"></span>
					</div>
					<br/><br/>
																<!-- Partie EMAIL-->

						<div class="wrap-input100 validate-input" data-validate = "Veuillez rentrer votre mail">
						<input class="input100" type="Email" id="email" class="email" name="email" placeholder="Email" required="">
						<span class="focus-input100"></span>
					</div>
					<br/><br/>
						<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Cliquez ici pour Confirmer le Changement
						</button>
					</div>
                    <div id="return">

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
<?php 
}
catch (Exception $e) {
	
}
?>