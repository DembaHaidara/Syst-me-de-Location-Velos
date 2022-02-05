<?php 
session_start();

if(isset($_SESSION["connecter3"]) == true){ //Sesion de la page ConnexionCodeProvisoirMdpPerduTraitement.php (obligé de passer par cette page)
} 
else{$_SESSION['erreurs'] = "Vous n'avez pas droit d'etre ici";
 header("Location:ErreurMdpPerdu.php");
die();};

if(isset($_SESSION["id"])){ 
} 
else{$_SESSION['erreurs'] = "Vous n'avez pas droit d'etre ici";
 header("Location:ErreurMdpPerdu.php");
die();};


if ($_SESSION['id']  == "0") {//Si Sesion ID  = 0 alors je bloque
 $_SESSION['erreurs'] = "Vous n'avez pas droit d'etre ici";
 header("Location:ErreurMdpPerdu.php");
die();
}
else{};


$_SESSION["connecte"] = true;
try {
	 

$bdd = new PDO('mysql:host=127.0.0.1;dbname=haidara', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs.

    if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);//je convertir l ID en Nombre
   $requser = $bdd->prepare('SELECT * FROM inscriptionsql WHERE id = ?');//Verification de l ID dans ma bdd
   $requser->execute(array($getid));//Comparaiso de l ID recus et celle de la BDD
   $userinfo = $requser->fetch();//Les donné de l id concerné je le met dans $userinfo
}
    else{$_SESSION['erreurs'] = "Vous n'avez pas droit d'etre ici";
        header("Location:ErreurMdpPerdu.php");
       die();};

   if ($_SESSION['id'] == $userinfo['id']) { 
      }
		// Si l id de la bdd n'est pas la meme que celle de la sesion id alors je bloque
  else{
  	$_SESSION['erreurs'] = "Vous n'avez pas droit d'etre ici";
		 header("Location:ErreurMdpPerdu.php");
		die();
	  };
	  $_SESSION['id'] = $userinfo['id'];

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
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178"   method="POST" action="EditerProfilTraitementMDP.php" id="form">
					<span class="login100-form-title">
						Rénitialisez votre de passe
					<h4><a href="index.html">Page d'Accueil</a></h4>

					</span>

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
						<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Cliquez ici pour Confirmer le Changement
						</button>
					</div>
                    <div id="return">

                    </div>
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