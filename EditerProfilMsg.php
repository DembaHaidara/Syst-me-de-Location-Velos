<?php  //Pag erreur
session_start();

if(isset($_SESSION["connecte"]) == true){ 
} 
else{$_SESSION['erreurs'] = "Vous n'avez pas droit d'etre ici";
 header("Location:Erreur.php");
}
$_SESSION["connecter"] = true;
 

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
<?php echo "<meta http-equiv='refresh' content='5; URL=Espace_client.php?id=".$_SESSION['id']."'>";?>





</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form validate-form p-l-55 p-r-55 p-t-178">
					<span class="login100-form-title">
						VéLouer
						<h4><a href="index.html">Page d'Accueil</a></h4>
					</span>
				</br></br>
                    <center>
					<?php echo "<h3 style=' color:red;'>".$_SESSION["erreurs"]."</h3>"; ?>
						
						<br><br><h5>Redirection en cour... <br>
				     <?php echo "<a href='Espace_client.php?id=".$_SESSION['id']."'>Cliquez ICI pour revenir</a>";?>

					 </h5>
					</center>


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

