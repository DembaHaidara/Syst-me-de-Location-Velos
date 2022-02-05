<?php
session_start();

if(isset($_SESSION["connecter"]) == true){ //Sesion de la page connexionPHP ou InscriptionPHP(obligé de passer par une de c'est page)
} 
else{$_SESSION['erreurs'] = "Vous n'avez pas droit d'etre ici";
 header("Location:Erreur.php");
die();};

if ($_SESSION['id'] == 0) {//Si Sesion ID  = 0 alors je bloque
	$_SESSION['erreurs'] = "Vous n'avez pas droit d'etre ici";
 header("Location:Erreur.php");
die();
 
}
else{};



try // M'affiche les erreur
{

$login = "root";
$pass = "";
    $bdd = new PDO('mysql:host=localhost;dbname=haidara',$login,$pass);//Connexion a ma BDD
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs.


if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);//je convertir l ID en Nombre
   $requser = $bdd->prepare('SELECT * FROM inscriptionsql WHERE id = ?');//Verification de l ID dans ma bdd
   $requser->execute(array($getid));//Comparaiso de l ID recus et celle de la BDD
   $userinfo = $requser->fetch();//Les donné de l id concerné je le met dans $userinfo
}
    else{$_SESSION['erreurs'] = "Vous n'avez pas droit d'etre ici";
 header("Location:Erreur.php");
die();};

if ($_SESSION['id'] == $userinfo['id']) { //Si jammais le client s'amuse a change l'id dans l url

}
// Si l id de la bdd n'est pas la meme que celle de la sesion id alors je bloque
else{$_SESSION['erreurs'] = "Vous n'avez pas droit d'etre ici";
 header("Location:Erreur.php");
die();};
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V8</title>
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
				<div class="login100-form validate-form p-l-55 p-r-55 p-t-178">
					<span class="login100-form-title">
						<h2>Bienvenue <?php  echo $userinfo['Username'];?></h2>
						<p><a href="index.html">Page d'Accueil</a> </p>
	
					</span>

<article>
	
						

	<div class=" contenue" style="
		margin-left: 10px;margin-right: 10px;
width: 540;
border: 1px solid #ebebeb; 
height: 250px;
 border-radius: 20px;
  box-shadow:26px 26px 26px #ebebeb;
  text-align: center;
  padding: 20px;

	" >
							    <h3>Ton Profil :</h3> 
							    <!-- Affiche les info de l'utilisateur concerné :  -->
								<p>Ton Pseudo est <?php echo $userinfo['Username'];?></p>
								<p>Ton mail est <?php echo $userinfo['email'];?></p>
								<p>Date d'inscription <?php echo $userinfo['date'];?></p>
<?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
          {//verifie que c est bien l'utilisateur avant de changer les info ou se deconnecter
?>
         <br />
        <div id="Deco"><a href="deconnexion.php">Se déconnecter</a></div> 
        <br>
         <div id="Deco"><a href="EditerProfil.php">Editer Profil</a></div> 
<?php
         }
?>


	</div>


	<div class="formulaire" style="position: relative;
 margin-top: 20px;margin-bottom: 10px;

">		
				<div class="abd1" style="
		margin-top: 10%;
              	margin-left: 10px;margin-right: 10px;  text-align: center;

width: 540;
border: 1px solid #ebebeb; 
width: 100%;
height: 250px;
 border-radius: 20px;
  box-shadow:26px 26px 26px #ebebeb;
padding: 50px;



				">
					<h3>0,01 €</h3>
					<h4>Abonnement VéLouer<br> 1 mois</h4>
						<br>
						<!-- Systeme de payement Securise Par Paypal -->
					   <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
							<input type="hidden" name="cmd" value="_s-xclick">
							<input type="hidden" name="hosted_button_id" value="89ENHWEVQ5TFU">
							<input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
							<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
						</form>

				
				
				</div>

               <div class="abd2" style="margin-top: 10%;
              	margin-left: 10px;margin-right: 10px;
              	  text-align: center;

width: 540;
border: 1px solid #ebebeb; 
width: 100%;
height: 250px;
 border-radius: 20px;
  box-shadow:26px 26px 26px #ebebeb;
padding: 50px;

               ">
               	
               		<h3>0,01 €</h3>
					<h4>Abonnement VéLouer <br>1 Semaine</h4>

						<br>
					<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="hosted_button_id" value="XGQ4M2FW4KC8L">
						<input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
						<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
				   </form>	

               </div>
               <div class="abd3" style="
               	margin-top: 10%;
              	margin-left: 10px;margin-right: 10px;
              	  text-align: center;

width: 540;
border: 1px solid #ebebeb; 
width: 100%;
height: 250px;
 border-radius: 20px;
  box-shadow:26px 26px 26px #ebebeb;
  padding: 50px;
               ">
               	                      
               		<h3>0,01 €</h3>
					<h4>Abonnement VéLouer <br>1 Jour</h4>

						<br>
				  <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="GYN82QJXSA4RQ">
					<input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
					<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
				  </form>
			  </div>
		</div>
<div class="wrap-input100 validate-input m-b-16" style="margin-top: 10%;
              	margin-left: 5px;margin-right: 5px;
              	  text-align: center;

border: 1px solid #ebebeb; 
width: 100%;
height: 100%;
 border-radius: 20px;
  box-shadow:26px 26px 26px #ebebeb;
  padding: 50px;



" >
							<h1 style="font-size: 25px">Emplacement des Velos </h1>
							<br>
 								<form method="post" action="ppp">
 								<input style="border: 2px solid #ebebeb;" type="text" name="text" placeholder="ID du Velos">
								<button style="border: 1px solid #ebebeb;">Recherché</button>
 								
 							<br><br><!-- Google Maps Pour afficher les emplacement Libre des velos et la position du Velos   -->
								<div><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2623.4015377805054!2d2.540715380973072!3d48.888684270813336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1585504046610!5m2!1sfr!2sfr" style="width: 100%;height:100%"   frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" ></iframe></div></form>
		</div>
<?php 
//Pour la verif lors du formulaire a Idpayement.php
//Si il rentre un code de deveroullage manuelment
								$_SESSION['connecter3'] = true; //permet d'acceder a cette page
								$_SESSION['userinfo'] = $userinfo['id']; //permet d'acceder a cette page avec son id
?>
		<div class="wrap-input100 validate-input m-b-16" style="margin-top: 10%;
              	margin-left: 10px;margin-right: 10px;
              	  text-align: center;

border: 1px solid #ebebeb; 
width: 100%;
height: 100%;
 border-radius: 20px;
  box-shadow:26px 26px 26px #ebebeb;
  padding: 50px;




		">
	 							<h2>Code Recus lors du paiment</h2><br>
									<form  method="post" action="Idpayement.php">
 									<p><input style="border: 2px solid #ebebeb;" type="text" name="ID_payements"   placeholder="numero de paiement">
    								<button style="border: 1px solid #ebebeb;">OK</button></p>
 									</form>
<?php
                                // Je Verifie si , il la un code de deverouillage et un abonement
								include 'PageUtilisateurBlibli.php';//Voir Code :PageUtilisateurBlibli.php
					 
	            
 ?>                          <!--   Apres Verification j 'affiche les info :   --><br>
							<h4>Code Deverouillage du Velo :<?php  echo $reponse; ?></h4><br>
							<h4>ID du Velo prits : ...</h4>

		</div>

		<div class="wrap-input100 validate-input m-b-16" style="
		margin-top: 10%;
              	margin-left: 10px;margin-right: 10px;
              	  text-align: center;

border: 1px solid #ebebeb; 
width: 100%;
height: 100%;
 border-radius: 20px;
  box-shadow:26px 26px 26px #ebebeb;
  padding: 50px;
  margin-bottom: 150px">
							<h3>Abonement Soucrie<?php echo $reponse2;?></h3><br>
							<h4>Durée de l'abonement : </h4><br>
    						<h4>Prix : <?php echo $reponse3;?></h4><br>


    				    <A HREF="https://www.paypal.com/cgi-bin/webscr?cmd=_subscr-find&alias=8PF35QE57V4A4">
						<IMG SRC="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_unsubscribe_LG.gif" BORDER="0"></IMG></A>
						<br>
	



				</div>	

	<footer><span class="login100-form-title" style=" margin-top: 20px; bottom:0px; top: 100%; height: 100%;">
						<h2>VelouerFrance</h2>
						<p><a href="mailto:velouerfrance@gmail.com">Nous Contacté</a> </p>
	
					</span>
</footer>
	
					
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
       
  }//Fermeture du Try{}

catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


 ?>

