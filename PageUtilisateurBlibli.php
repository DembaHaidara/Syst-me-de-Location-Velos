<?php
$ID_payement5 = $bdd->prepare("SELECT * FROM `inscriptionsql`  WHERE `id`=?");
      $ID_payement5->execute(array($userinfo['id']));
      $userexist5 = $ID_payement5->rowCount();// va compter le nb de colone(donné) dans la bdd
      $userinfo5 = $ID_payement5->fetch();						

        if($userexist5 == 1) { 
        	$ID_payement  =  $_SESSION["code"];  

			                                if ( $ID_payement == "0") { 
			                                	// echo "id ID_payement = ".$ID_payement."<br>";
			                           $_SESSION['userinfo5'] =  $userinfo5;
										   include 'UtilsateurVerifBDD.php'; //echo "if userexist<br>";

			                              }    

    										else{ //echo "id payment a une sesion <br>"; 
    										include 'UtilsateurVerifSesionBDD.php'; 
    											};
              


        	
 			
        		

    } 

         	
        