<?php
session_start();
$_SESSION = array();
$_SESSION["connecter"] = 0;
$_SESSION["connecte"] = 0;
session_destroy();
header("Location:Connexion.php");
?>