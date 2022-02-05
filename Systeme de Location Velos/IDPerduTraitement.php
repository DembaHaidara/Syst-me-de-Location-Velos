<?php

function Securisation($donnees)//Function qui me protege des inserction de code
{
      $donnees = trim($donnees);// trim(str) : va supprimer certain caracetere et les espace en trop et des retour a ligne non desire 
      $donnees =stripcslashes($donnees);//   stripslashes — Supprime que les antislashsc(\) d'une chaîne ; 
      $donnees =strip_tags($donnees);// strip_tags(str)  supprimer les caracetere html et plus interpreter
      return $donnees;
}

$Userid = Securisation($_POST['input100']);

if (!empty($Userid))  {
  
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
      $req->execute(array($Userid));//Comparaison avec la bdd
      $userexist = $req->rowCount();// va compter le nb de colone(donné) dans la bdd 

      if($userexist == 1) {//si il trouve une coreespondance il rentre dans la condition

          $userinfo = $req->fetch();

         $Usermail = $Userid;
         $donnees = $userinfo['Username'];
$mail = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1' />

  <title>Velouer</title>
</head>
<body>

 <center><h3>Idntifiant Oublié</h3></center>
 <section id='main' class='main'>       
          
 <p>Cher Client</p>

 <p>Vous avez fait une demande d oublie de votre identifant</p>
 <p>Voci votre ID :".$donnees."</p>
 
 <p>Si le bouton ci-dessus ne fonctionne pas, copiez l'adresse ci-dessous,puis collez-la dans une nouvelle fenetre du navigateur</p>
<br>
<p>https://velouer.000webhostapp.com/ConnexionCodeProvisoirMdpPerdu.php</p>




 <h5>Si vous n'avez pas demandé la demande d oublie de votre identifant,veuillez nous contacter<a href='mailto:velouerfrance@gmail.com'><button>Contact</button></a></h5>

</section>

<footer id='footer'>
            <ul class='icons'>
              
              <li><a href='mailto:velouerfrance@gmail.com' class='icon fa-envelope'>velouerfrance@gmail.com<span class='label'></span></a></li>
            </ul>

    </footer>

</body>
</html>
";


         

//Envoie un mail automatiquement rappeler son id
        $sujet2 = "VeLouer";
        $monmail = "velouerfrance@gmail.com"; 
          $info1 = $Usermail;
         $header="MIME-Version: 1.0\r\n";
         $header .='From:"VeLouer"<velouerfrance@gmail.com>'."\n";
         $header.='Content-Type:text/html; charset="uft-8"'."\n";
        $header.='Content-Transfer-Encoding: 8bit';

        $contenu_message2 = $mail;




         mail($info1,$sujet2,$contenu_message2,$header);

         echo "<br><h3 style='color:red'>Un mail d'oublie de votre identifant vous a ete envoyé par mail</h3>";


                         

         }
     else{ echo "<br><h3 style='color:red'>Ce mail n'est pas enregistrez chez nous</h3>";
          
         }



//Mail qui va recevoir : 



}

catch(PDOException $e)
{
    echo "Echec de la connexion : ".$e->getMessage();

}

?>