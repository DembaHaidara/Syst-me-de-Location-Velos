<?php
session_start();

if(isset($_SESSION["connecte"]) == true){
    // echo "ok";

} 
else{ $_SESSION['erreurs'] = "Vous n'avez pas droit d'etre ici";
      header("Location:ErreurInscription.php");//Redirection vers la page erreur 
      die();//arret le programe
};



function get_ip() {

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

$adresse_ip = get_ip();

function Securisation($donnees)
{
$donnees = trim($donnees);// trim(str) : va supprimer certain caracetere et les espace en trop et des retour a ligne non desire 
$donnees =stripcslashes($donnees);//   stripslashes — Supprime que les antislashsc(\) d'une chaîne ; 
$donnees =strip_tags($donnees);// strip_tags(str)  supprimer les caracetere html et plus interpreter

return $donnees;
};

if (!empty($_POST['user'])  OR !empty($_POST['pass']) OR !empty($_POST['pass2']) OR !empty($_POST['email'])) {
  echo"ok";
}
else{  $_SESSION['erreurs']  = "veuillez completez tout les champs"; 
      header("Location:ErreurInscription.php");//Redirection vers la page erreur 
      die();//arret le programe
    };

$info = Securisation($_POST['user']);
$info= Securisation($_POST['user']);
$info= Securisation($_POST['user']);

$info1= Securisation($_POST['pass']);
$info1= Securisation($_POST['pass']);
$info1= Securisation($_POST['pass']);

$info2= Securisation($_POST['pass2']);
$info2= Securisation($_POST['pass2']);
$info2= Securisation($_POST['pass2']);

$info3= Securisation($_POST['email']);
$info3= Securisation($_POST['email']);
$info3= Securisation($_POST['email']);


if ($info1 == $info2 ) {
    
}
else{  $_SESSION['erreurs'] = "Les 2 mots de passe ne sont pas identique";
      header("Location:ErreurInscription.php");//Redirection vers la page erreur 
      die();//arret le programe
    };


$login = "root";
 $pass = "";

//$login = "root";
//$pass = "";
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=haidara',$login,$pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs.

// echo "conecte BDD ";

$req="INSERT INTO `inscriptionsql` (`id`, `Username`, `Password`, `date`, `email`, `IP`, `Code`, `abd`, `prix`) VALUES (NULL, '$info', '$info2',NOW(), '$info3','$adresse_ip','','','')";

$resultat =$bdd->exec($req);

 $req2 = $bdd->prepare("SELECT * FROM inscriptionsql WHERE Username = ? AND Password = ?");
$req2->execute(array($info, $info2));
      $userexist = $req2->rowCount();// va compter le nb de colone(donné) dans la bdd
if($userexist == 1) {//si il trouve une coreespondance il rentre dans la condition

$userinfo = $req2->fetch();




$_SESSION['id'] = $userinfo['id'];
$_SESSION['blaze'] = $_POST['user'];
$_SESSION['mail'] = $_POST['email'];
$_SESSION["code"] = 0;
$_SESSION["connecter"] = true;


           header("Location:Espace_client.php?id=".$_SESSION['id']."");
         echo "sesion : ".$_SESSION['id'];
// echo "enregister : ".$info." ".$info1." ".$info3." ".$adresse_ip." ".$Code;

}
else{ $_SESSION['erreurs'] = "Erreur lors de l'inscription";
      header("Location:ErreurInscription.php");//Redirection vers la page erreur 
      die();//arret le programe
    }

}
catch(PDOException $e)
{
    echo "Echec de la connexion : ".$e->getMessage();

}

?>
