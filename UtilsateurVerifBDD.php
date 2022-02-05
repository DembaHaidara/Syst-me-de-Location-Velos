<?php
$userinfo5 = $_SESSION['userinfo5'];
													 		if ($userinfo5['Code'] == "") {
													 		   // echo "code false";
											$reponse ="<p style='color: red;'>Aucun code deverroullage</p>";
										   $reponse2 ="<p style='color: red;'>Aucun Abonnement Soucrie</p>";
										   $reponse3= "<p style='color: red;'>0€</p>";
								                                                         }
								                                                      
								                            else { 
								                             // echo "code bon ".$userinfo5['abd']."/".$userinfo5['prix']."/".$userinfo5['Code'];

								                                $reponse =  "<p style='color: red;'>".$userinfo5['Code']."</p>"; 
								                            	$reponse2 = "<p style='color: red;'>".$userinfo5['abd']."</p>";
								                            	$reponse3 = "<p style='color: red;'>".$userinfo5['prix']."</p>";
								                            	}                                                      	
							                                   	                               					                                 
                           ?>