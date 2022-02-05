<?php
session_start();//Obliger de demarrer la sesion pour utiliser les sesion
$_SESSION["passeParLa"]='dejavenu';// Me permet de l'empecher de revenir dans la page genere PHP

//Verification si il est passer par la page Genere un code apres sont payement ou ils c est connecté a Connexion.php
if(isset($_SESSION["connecte"]) == true){
      // echo "ok";
} 
else{ $_SESSION['erreurs'] = "Vous n'avez pas droit d'etre ici";
      header("Location:Erreur.php");//Redirection vers la page erreur 
      die();//arret le programe
};
if (!empty($_POST['user'])  OR !empty($_POST['pass'])) {//Verifie si l id et le mdp ont eté saisie
  
}
else{  $_SESSION['erreurs']  = "veuillez completez tout les champs"; 
      header("Location:Erreur.php");//Redirection vers la page erreur 
      die();//arret le programe
    }


function Securisation($donnees)//Function qui me protege des inserction de code
{
      $donnees = trim($donnees);// trim(str) : va supprimer certain caracetere et les espace en trop et des retour a ligne non desire 
      $donnees =stripcslashes($donnees);//   stripslashes — Supprime que les antislashsc(\) d'une chaîne ; 
      $donnees =strip_tags($donnees);// strip_tags(str)  supprimer les caracetere html et plus interpreter
      return $donnees;
}
$Userconnect = Securisation($_POST['user']);
$mdpconnect = Securisation($_POST['pass']);


$login = "root";
$pass = "";

 try
{
    $bdd = new PDO('mysql:host=localhost;dbname=haidara',$login,$pass);//Connexion a ma BDD
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs.


      $req = $bdd->prepare("SELECT * FROM inscriptionsql WHERE Username = ? AND Password = ?");
      //Verification de l id et mdp dans ma bdd
      $req->execute(array($Userconnect, $mdpconnect));//Comparaison avec la bdd
      $userexist = $req->rowCount();// va compter le nb de colone(donné) dans la bdd 

      if($userexist == 1) {//si il trouve une coreespondance il rentre dans la condition

          $userinfo = $req->fetch();////Les donné de l'utilisateur concerné je le met dans $userinfo

          // Je vais stocké dans les sesion les info de l'utlisateur

          $_SESSION['id'] = $userinfo['id'];
          $_SESSION['pseudo'] = $userinfo['Username'];

          $_SESSION["connecter"] = true; //Permet de dire a ma Clien qu'il est bien passer par ici

          //Pour la page Genere Code , Le code genere va etre enregister dans son compte
          if (isset($_SESSION["code"]) == "0") { //Si le code genere est = 0 , alors je met seseion code a 0 pour etre bien sur
            $_SESSION["code"] = "0"; 

             }
         else{ //Si le code n estpas egal a 0 alors le code , es prix et l abonement(abd) seront stocké dans son compte
                $_SESSION["code"];
                $_SESSION['abd'];
                $_SESSION['prix'];
             }

           header("Location:Espace_client.php?id=".$_SESSION['id']."");//Redirection vers sa page clien
         }
     else{ 
           $_SESSION["erreurs"]  = "Mauvais identifiant ou Mot de passe !"; 
            header("Location:Erreur.php");
           die();
         }
}
catch(PDOException $e)
{
    echo "Echec de la connexion : ".$e->getMessage();

}
?>