<?php
session_start();//Obliger de demarrer la sesion pour utiliser les sesion


//Verification si il est passer par la page Genere un code apres sont payement ou ils c est connecté a Connexion.php
if(isset($_SESSION["connect"]) == true){
      // echo "ok";
} 
else{ $_SESSION['erreurs'] = "Vous n'avez pas droit d'etre iciL";
      header("Location:ErreurMdpPerdu.php");//Redirection vers la page erreur 
      die();//arret le programe
};
if (!empty($_POST['user'])  OR !empty($_POST['pass'])) {//Verifie si l id et le mdp ont eté saisie
  
}
else{  $_SESSION['erreurs']  = "veuillez completez tout les champs"; 
      header("Location:ErreurMdpPerdu.php");//Redirection vers la page erreur 
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
$MdpProvisoire = Securisation($_POST['pass']);


$login = "root";
$pass = "";

 try
{
    $bdd = new PDO('mysql:host=localhost;dbname=haidara',$login,$pass);//Connexion a ma BDD
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs.


      $req = $bdd->prepare("SELECT * FROM inscriptionsql WHERE Username = ? AND MdpProvisoire = ?");
      //Verification de l id et mdp dans ma bdd
      $req->execute(array($Userconnect, $MdpProvisoire));//Comparaison avec la bdd
      $userexist = $req->rowCount();// va compter le nb de colone(donné) dans la bdd 

      if($userexist == 1) {//si il trouve une coreespondance il rentre dans la condition
         

          $userinfo = $req->fetch();////Les donné de l'utilisateur concerné je le met dans $userinfo

          $MdpProvisoireUpdate = "";

          $info2=$bdd->prepare("UPDATE `inscriptionsql` SET  MdpProvisoire = ?  WHERE id = ?");

         $resultat=$info2->execute(array($MdpProvisoireUpdate,$userinfo['id']));

          // Je vais stocké dans les sesion les info de l'utlisateur

          $_SESSION['id'] = $userinfo['id'];
          $_SESSION['pseudo'] = $userinfo['Username'];

          $_SESSION["connecter3"] = true; //Permet de dire a ma Clien qu'il est bien passer par ici
          

           header("Location:EditerProfilMdpPerdu.php?id=".$_SESSION['id']."");//Redirection vers la âge changement MDP
         }
     else{ 
           $_SESSION["erreurs"]  = "Mauvais identifiant ou Mot de passe !"; 
            header("Location:ErreurMdpPerdu.php");
           die();
         }
}
catch(PDOException $e)
{
    echo "Echec de la connexion : ".$e->getMessage();

}
?>