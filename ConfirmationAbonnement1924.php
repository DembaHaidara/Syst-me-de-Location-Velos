<?php
session_start();
if(isset($_SESSION["passeParLa"])){	
	$_SESSION['erreurs'] = "Vous n'avez pas droit d'etre ici";
      header("Location:Erreur.php");//Redirection vers la page erreur 
      die();//arret le programe
}

function Genere_Password($size)//Function Generation de mot passe
{$password ="";
    // Initialisation des caractères utilisables
    $characters = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");

    for($i=0;$i<$size;$i++)
    {
        $password .= ($i%2) ? strtoupper($characters[array_rand($characters)]) : $characters[array_rand($characters)];
    }
        
    return $password;
}

$mon_mot_de_passe = Genere_Password(10);
$_SESSION["code"] = $mon_mot_de_passe;

function get_ip() { //Fuction prend les adresse ip des clien qui vienne sur mon site (securité)

	if (isset($_SERVER['HTTP_CLIENT_IP'])) {
		return $_SERVER['HTTP_CLIENT_IP'];
	}

	elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		return $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else {
		return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
	}
}

$IP = get_ip();
// Page abonement 1 Semaine
$abd= "1 Semaine";
$prix = "0,01 €";
$_SESSION['abd'] = $abd;
$_SESSION['prix'] = $prix;
$utilise = 0;

$login = "root";
 $pass = "";

try
{ 

    $bdd = new PDO('mysql:host=localhost;dbname=haidara',$login,$pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs.


// J insere le code Genere dans cette bdd pour etre sur que l utilsateur a bien eu un code generé
$req="INSERT INTO `codegenere`(`id`, `mdp`, `abd`, `prix`, `dates`, `IP`, `utilise`) VALUES (NULL,'$mon_mot_de_passe','$abd','$prix',NOW(),'$IP','$utilise')";

$resultat =$bdd->exec($req);

}
catch(PDOException $e)
{
    echo "Echec de la connexion : ".$e->getMessage();

}


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
						VéLouer
						<h4><a href="index.html">Page d'Accueil</a></h4>
					</span>
					<center>
						<h1>Achat effectué</h1>
						<br>
						<h3>Abonement valable  <?php echo $abd ?></h3>
						<br>
						<h4 style="color: red;"><?php echo "Code pour Debloquez le velos : ".$mon_mot_de_passe."<br>Veuillez vous connecter";?>
						</h4>
						</center>
						<br>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Veuillez rentre votre identifiants">
						<input class="input100" type="text" name="user" id="user" placeholder="identifiants">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Veuillez rentre votre Mot de passe">
						<input class="input100" type="password" name="pass" id="pass" placeholder="Mot de passe">
						<span class="focus-input100"></span>
					</div>
                    
					<div class="text-right p-t-13 p-b-23">
						<span class="txt1">
							Oublié
						</span>

						<a href="#" class="txt2">
							Identifiant / Mot-de-passe ?
						</a>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Connnexion
						</button>
							<center>

					</div>
					<div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							Avez vous un compte VéLouer ?
						</span>

						<a href="Inscription.html" class="txt3">
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

