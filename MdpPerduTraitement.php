<?php

function Securisation($donnees)//Function qui me protege des inserction de code
{
      $donnees = trim($donnees);// trim(str) : va supprimer certain caracetere et les espace en trop et des retour a ligne non desire 
      $donnees =stripcslashes($donnees);//   stripslashes — Supprime que les antislashsc(\) d'une chaîne ; 
      $donnees =strip_tags($donnees);// strip_tags(str)  supprimer les caracetere html et plus interpreter
      return $donnees;
}

$Usermail = Securisation($_POST['input100']);

if (!empty($Usermail))  {
  
}
else{ echo "veuillez completez le champs"; 
      die();//arret le programe
    }

$login = "root";
$pass = "";

 try
{
    $bdd = new PDO('mysql:host=localhost;dbname=haidara',$login,$pass);//Connexion a ma BDD
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs.


      $req = $bdd->prepare("SELECT * FROM inscriptionsql WHERE email = ?");
      $req->execute(array($Usermail));//Comparaison avec la bdd
      $userexist = $req->rowCount();// va compter le nb de colone(donné) dans la bdd 

      if($userexist == 1) {//si il trouve une coreespondance il rentre dans la condition

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
            $userinfo = $req->fetch();


            $MdpProvisoire = Genere_Password(10);

          $info2=$bdd->prepare("UPDATE `inscriptionsql` SET  MdpProvisoire = ?  WHERE id = ?");

         $resultat=$info2->execute(array($MdpProvisoire,$userinfo['id']));





//Envoie un mail automatiquement pour change le mdp au client
        $sujet2 = "VeLouer";
        $monmail = "velouerfrance@gmail.com"; 
          $info1 = $Usermail ;
         $header="MIME-Version: 1.0\r\n";
         $header .='From:"VeLouer"<velouerfrance@gmail.com>'."\n";
         $header.='Content-Type:text/html; charset="uft-8"'."\n";
        $header.='Content-Transfer-Encoding: 8bit';

//Dans EnvoiMailMDP.html , sa sera le mail que les utilisateur vont recvoir
            
       $contenu_mail = "
       <!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <link rel='stylesheet' href='assets/css/main.css' />

  <title>Velouer</title>
</head>
<body>

 <center><h3>Rénitialisez votre de passe</h3></center>
 <section id='main' class='main'>       
          
 <p>Cher Client</p>

 <p>Vous avez fait une demande de Mot de passe perdu</p>
 <p>Vocie le code provisor :<h3 style='color:red'>".$MdpProvisoire."</h3> a entrée dans le lien ci dessous</p>
 <p>Veuillez Cliquez sur le bouton ci-dessous pour reinitialiser votre mot de passe</p>
 <a href='https://velouer.000webhostapp.com/ConnexionCodeProvisoirMdpPerdu.php'><button>Rénitialisez Le MDP</button></a></br></br>
 <p>Si le bouton ci-dessus ne fonctionne pas, copiez l'adresse ci-dessous,puis collez-la dans une nouvelle fenetre du navigateur</p>
<br>
<p>https://velouer.000webhostapp.com/ConnexionCodeProvisoirMdpPerdu.php</p>
>


 <h5>Si vous n'avez pas demandé la réinitialisation de votre mot de passe,ignorez cet-email</h5>

</section>

<footer id='footer'>
            <ul class='icons'>
              
              <li><a href='velouerfrance@gmail.com' class='icon fa-envelope'>velouerfrance@gmail.com<span class='label'></span></a></li>
            </ul>
</footer>

 

</body>
</html>
       ";



        $contenu_message2 = $contenu_mail;


         mail($info1,$sujet2,$contenu_message2,$header);

         echo "<br><h3 style='color:red'>Un mail de réinitialisation de votre mot de passe vous a été envoyé</h3>";


                         

         }
     else{ echo "<br><h3 style='color:red'>Ce mail n'est pas enregistrez chez nous</h3>";
          
         }
}
catch(PDOException $e)
{
    echo "Echec de la connexion : ".$e->getMessage();

}

?>