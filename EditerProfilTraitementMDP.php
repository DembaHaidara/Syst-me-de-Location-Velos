<?php 
session_start();
if(isset($_SESSION["connecte"]) == true){ //Sesion de la page connexionPHP ou InscriptionPHP(obligé de passer par une de c'est page)
} 
else{$_SESSION['erreurs'] = "Vous n'avez pas droit d'etre ici";
 header("Location:ErreurMdpPerdu.php");
die();};
 
 try {
 	
$bdd = new PDO('mysql:host=127.0.0.1;dbname=haidara', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs.

 
	if(isset($_SESSION['id'])) {} 

	else{ 
	   $_SESSION['erreurs']  = "Vous n'avez pas droit d'etre ici"; 
      header("Location:ErreurMdpPerdu.php");//Redirection vers la page erreur 
      die();//arret le programe
       };
      
      
      $req = $bdd->prepare("SELECT * FROM inscriptionsql WHERE id = ?");
      $req->execute(array($_SESSION['id']));//Comparaison avec la bdd
      $userinfo = $req->fetch(); 

      if($_SESSION['id'] == $userinfo['id']) {//si il trouve une coreespondance il rentre dans la condition


                      }
      else{$_SESSION['erreurs']  = "Vous n'avez pas droit d'etre ici"; 
      header("Location:ErreurMdpPerdu.php");//Redirection vers la page erreur 
      die();};




   if(!empty($_POST['pass']) OR !empty($_POST['pass2'])) {
   }
   else{ $_SESSION['erreurs'] = "Veuillez completer tout les champs"; 
         header("Location:ErreurMdpPerdu.php");
      die();//arret le programe
       };

   if ($_POST['pass'] == $_POST['pass2']) {
          	
          }   
   else{ $_SESSION['erreurs'] = "Vos deux mdp ne correspondent pas !" ;
         header("Location:ErreurMdpPerdu.php");
   die();};  
    
    function Securisation($donnees)
    {
    $donnees = trim($donnees);// trim(str) : va supprimer certain caracetere et les espace en trop et des retour a ligne non desire 
    $donnees =stripcslashes($donnees);//   stripslashes — Supprime que les antislashsc(\) d'une chaîne ; 
    $donnees =strip_tags($donnees);// strip_tags(str)  supprimer les caracetere html et plus interpreter

    return $donnees;
    };
    
	$info1= Securisation($_POST['pass']);
	$info1= Securisation($_POST['pass']);
	$info1= Securisation($_POST['pass']);

	$info2= Securisation($_POST['pass2']);
	$info2= Securisation($_POST['pass2']);
	$info2= Securisation($_POST['pass2']);



     
      $insert = $bdd->prepare("UPDATE inscriptionsql SET Password = ?  WHERE id = ?");
      $insert->execute(array($info2,$_SESSION['id']));
      $userexist2 = $insert->rowCount();// va compter le nb de colone(donné) dans la bdd 

      if($userexist2 == 1) {//si il trouve une coreespondance il rentre dans la condition
     
         $_SESSION['erreurs'] = "Changement effectué";
           $_SESSION["connecte"] = true; 
     $_SESSION['id']; 
         header('Location:EditerProfilMsg.php');


                      }
                      else{$_SESSION['erreurs']  = "Une erreurs inattendue c'est produite"; 
      header("Location:ErreurMdpPerdu.php");//Redirection vers la page erreur 
      die();};
    










}
catch (Exception $e) {
        
}

?>