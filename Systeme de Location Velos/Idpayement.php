<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<!-- Page si l'utilisateur rentre son code manuelement -->

<?php
session_start();
$_SESSION['connecte'] = true; //Pour le retour sur sa page client si il bien passer par la 
if(isset($_SESSION["connecter3"]) == true){
   // echo "ok";
} 
 else{ //Si il est bien venue de son compte 
  $_SESSION['erreurs'] = "Vous n'avez pas droit d'etre ici";
 header("Location:Erreur.php");
die();};



 if(!empty($_POST['ID_payements'])) {//Verifie si le champs a été saisie

$ID_payements = $_POST['ID_payements']; 

}
 else{  $_SESSION['erreurs'] = "Veuillez remplir le champs";
 header("Location:IdpayementInfo.php");
die(); };


$login = "root";
$pass = "";


    $bdd = new PDO('mysql:host=localhost;dbname=haidara',$login,$pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs.
 
	if (!empty($_SESSION['userinfo'])) {// si la sesion a bien un id    

		}  	
  	    else{  $_SESSION['erreurs'] = "Vous n'avez pas droit d'etre ici";
 				header("Location:Erreur.php");
		die();
			};

  try {

  	$userinfo = $_SESSION['userinfo'];

  	   $ID_payement5 = $bdd->prepare("SELECT * FROM `inscriptionsql`  WHERE `id`=?");
      $ID_payement5->execute(array($userinfo));//Va comparer l id sesion et bdd
      $userexist5 = $ID_payement5->rowCount();// va compter le nb de colone(donné) dans la bdd
      $userinfo5 = $ID_payement5->fetch();						

        if($userexist5 == 1) {  //echo "ok";
                             } 
       else{ $_SESSION['erreurs'] = "Vous n'avez pas droit d'etre ici";
 				header("Location:Erreur.php");
		die();};



 $ID_payement_bdd = $bdd->prepare("SELECT * FROM `codegenere`  WHERE `mdp`=?");
      $ID_payement_bdd->execute(array($ID_payements));
      $userexist = $ID_payement_bdd->rowCount();// va compter le nb de colone(donné) dans la bdd
        $userinfo10 = $ID_payement_bdd->fetch();

        if($userexist == 1) {//si il trouve une coreespondance il rentre dans la condition
 
                 
       $info2=$bdd->prepare("UPDATE `inscriptionsql` SET Code = ? , abd = ? , prix = ? WHERE id = ?");

    $resultat=$info2->execute(array($ID_payements,$userinfo10['abd'],$userinfo10['prix'],$userinfo));

        

$utilise = 1;
           $info3=$bdd->prepare("UPDATE `codegenere` SET utilise = ? WHERE id = ?");

        $resultat3=$info3->execute(array($utilise,$userinfo));

                  $_SESSION['id'] = $userinfo;
                  



 $_SESSION['erreurs'] = "Code Validé";
 header("Location:IdpayementInfo.php");

}

        else{ $_SESSION['erreurs'] = "Code Faux";
 header("Location:IdpayementInfo.php");
$_SESSION['id'] = $userinfo;
 }
   

} 

catch (Exception $e) {
        	
        }      


?>
</body>
</html>


