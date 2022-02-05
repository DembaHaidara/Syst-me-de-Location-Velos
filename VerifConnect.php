<?php

if (!isset($_SESSION['connecte'])) {


echo "connecte";

}

else{ 

$message =  utf8_decode("<p style='color: red'>Vous n'avez pas les droit d'accéder a cette page</p>");

header('Location:Connexion.php');

exit();
die(); 

}

?>