<?php 

                                    $abd = $_SESSION['abd'];
                               $prix = $_SESSION['prix'];

  			$ID_payement_bdd = $bdd->prepare("SELECT * FROM `codegenere`  WHERE `mdp`=?");
            $ID_payement_bdd->execute(array($ID_payement));
            $userexist = $ID_payement_bdd->rowCount();// va compter le nb de colone(donné) dans la bdd

                          if($userexist == 1) {//si il trouve une coreespondance il rentre dans la condition
                            // echo "code exist bien";
                 
                                    $info2=$bdd->prepare("UPDATE `inscriptionsql` SET Code = ? , abd = ? , prix = ? WHERE id = ?");

                                           $resultat=$info2->execute(array($ID_payement,$abd,$prix,$userinfo['id']));
                                           // echo "bdd 1 OK";

                                                 $utilise = "1";
           
                                                 $info3=$bdd->prepare("UPDATE `codegenere` SET utilise = ? WHERE mdp = ?");

                                                 $resultat3=$info3->execute(array($utilise,$ID_payement));
                                                  // echo "bdd 2 OK";
                                                  
                                                 $reponse = "<p style='color: red;'>".$ID_payement."</p>";
                                                 $reponse2 = "<p style='color: red;'>".$abd."</p>";
                                                 $reponse3 = "<p style='color: red;'>".$prix."</p>";
                                                     }

                           else{include 'UtilsateurVerifBDD.php';
                                }                        
 
 ?>