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
   $requser = $bdd->prepare('SELECT * FROM inscriptionsql');//Verification de l ID dans ma bdd
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

$_SESSION['id'];
include 'detectmobilebrowser.php';//dectect si c un mobille
?>

<!DOCTYPE html>
<html>
<head>
	<script src="Jquery.js"></script>	
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="PageUtilisateur.css">

	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Espace Client</title>
</head>
<body>



<article>
	<div class="banner">
						<h2>Bienvenue <?php  echo $userinfo['Username'];?></h2>
						<p><a href="index.html">Page d'Accueil</a> </p>
	</div>

	<div class=" contenue" >
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

<section>
		<div class="formulaire">		
				<div class="abd1">
					<h3>0,01 €</h3>
					<h4>Abonnement VéLouer 1 mois</h4>
						<br>
						<!-- Systeme de payement Securise Par Paypal -->
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="89ENHWEVQ5TFU">
<input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
</form>


				
				
				</div>

               <div class="abd2">
               	
               		<h3>0,01 €</h3>
					<h4>Abonnement VéLouer 1 Semaine</h4>

						<br>
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="XGQ4M2FW4KC8L">
<input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
</form>


               </div>
               <div class="abd3">
               	                      
               		<h3>0,01 €</h3>

					<h4>Abonnement VéLouer 1 Jour</h4>

						<br>
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="GYN82QJXSA4RQ">
<input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
</form>
			  </div>
		</div>
</section>


<footer>
		<div class="Locate" >
							<h1>Emplacement des Velos <a href="ConfirmationAbonnement1024.php">TEST</a></h1>
 								<form method="post" action="ppp">
 								<input type="text" name="text" placeholder="ID du Velos">
								<button>Recherché</button>
 								</form>
 							<br><!-- Google Maps Pour afficher les emplacement Libre des velos et la position du Velos   -->
								<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2623.4015377805054!2d2.540715380973072!3d48.888684270813336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1585504046610!5m2!1sfr!2sfr" width="400" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		</div>
<?php 
//Pour la verif lors du formulaire a Idpayement.php
//Si il rentre un code de deveroullage manuelment
								$_SESSION['connecter3'] = true; //permet d'acceder a cette page
								$_SESSION['userinfo'] = $userinfo['id']; //permet d'acceder a cette page avec son id
?>
		<div class="info2">
	 							<h2>Code Recus lors du paiment</h2>
									<form  method="post" action="Idpayement.php">
 									<p><input type="text" name="ID_payements"   placeholder="numero de paiement">
    								<button>OK</button></p>
 									</form>
<?php
                                // Je Verifie si , il la un code de deverouillage et un abonement
								include 'PageUtilisateurBlibli.php';//Voir Code :PageUtilisateurBlibli.php
					 
	            
 ?>                          <!--   Apres Verification j 'affiche les info :   -->
							<h4>Code Deverouillage du Velo :<?php  echo $reponse; ?></h4>
							<h4>ID du Velo prits : ...</h4>

		</div>

		<div class="info" style="">
							<h3>Abonement Soucrie<?php echo $reponse2;?></h3>
							<h4>Durée de l'abonement : </h4>
    						<h4>Prix : <?php echo $reponse3;?></h4>


    				    <A HREF="https://www.paypal.com/cgi-bin/webscr?cmd=_subscr-find&alias=8PF35QE57V4A4">
						<IMG SRC="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_unsubscribe_LG.gif" BORDER="0"></IMG></A>
						<br>
		</div>
</footer>
</article>
</body>
</html>
<?php
      session_destroy();
  }//Fermeture du Try{}

catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


 ?>

