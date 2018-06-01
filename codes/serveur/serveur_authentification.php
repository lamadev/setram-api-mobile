<?php session_start();?>
<?php 
	//indique que le type de la réponse renvoyée sera du texte
	header("Content-Type: text/plain ; charset=utf-8");
	// Anticache pour HTTP/1.1
	header("Cache-Control: no-cache , private");
	// Anticache pour HTTP/1.0
	header("Pragma: no-cache");
	//simulation du temps d'attente du serveur (2 secondes)
	//sleep(2);
	
	//include_once('../Classes/ClassesPublication.php');
	include_once("../classes/ClasseAgent.php");
	$Format_DateComent = 'd/m/y à H:i';
	
	if(isset($_REQUEST['login'])) $login=$_REQUEST['login'];
	else $login="inconnu";
	
	if(isset($_REQUEST['mdp'])) $mdp=$_REQUEST['mdp'];
	else $mdp="inconnu";
	
	$Formulaire_Valide = true;
	if($login==''){
		//$message_titre='* Aucun commentaire saisi';
		$Formulaire_Valide = false;
	}
	if($mdp==''){
		//$message_titre='* Aucun commentaire saisi';
		$Formulaire_Valide = false;
	}	

	//si le formulaire est correct on enregistre la publication
	 if($Formulaire_Valide == true)
	 {
	 		if ( isset($login) ) {
				$login=filter_var( $login, FILTER_SANITIZE_STRING) ;
				$login=addslashes($login);
				
				$mdp=filter_var( $mdp, FILTER_SANITIZE_STRING) ;
				$mdp=addslashes($mdp);
				
				
			}
			
		  $Authentif= new Agent();					
		  $resultat=$Authentif->fx_Authentification($login,$mdp);
		 
		   if (!$resultat){
				echo "202";
			}else{
				
				 
						 
					   //Création du Document JSON
						$debut = true;
						$nbColonnes=10;
						
						//echo "{\"User_id\":[";
						while ($data= $resultat->fetch()) {
							$map=0;
							$Agc=$Authentif->fx_Agence_de_Agent($data['IdAgent']);
							 if (!$resultat){
								 echo "203";
							}else{
								 while ($row= $Agc->fetch()) {
									 $_SESSION['IdAgence']=$row['IdAgence'];
									 $_SESSION['NomAgence']=$row['NomAgence'];
									
									 //$debut = false;
									//création des sessions de connection
									 $_SESSION['Nom']=$data['NomAg'];
									 $_SESSION['postnom']=$data['PostnomAg'];
									 $_SESSION['prenom']=$data['PrenomAg'];
									 $_SESSION['Niveau']=$data['Niveau'];
									 $_SESSION['IdAgent']=$data['IdAgent'];
									 $_SESSION['Login']=$data['Login'];
						
									 $_SESSION['adresseIP']=$_SERVER['REMOTE_ADDR'];
									 
										if ($debut){
											echo "{\"User_id\":[";
											echo "{";
											$debut = false;
										} else {
											echo ",{";
										}
										echo "\"IdAgence\":\"".$_SESSION['IdAgence']."\",\"NomAgence\":\"".$_SESSION['NomAgence']."\",";
										for($j=0;$j<$nbColonnes;$j++){
											if ($j==0)$colonne='IdAgent';
											if ($j==1)$colonne='NomAg';
											if ($j==2)$colonne='PostnomAg';
											if ($j==3)$colonne='PrenomAg';
											if ($j==4)$colonne='SexeAg';
											if ($j==5)$colonne='PhoneAg';
											if ($j==6)$colonne='Login';
											if ($j==7)$colonne='Mdp';
											if ($j==8)$colonne='Niveau';
											if ($j==9)$colonne='EtatAg';
											
						
											/*$_SESSION['adresseIP']=$_SERVER['REMOTE_ADDR'];*/
								
											echo "\"".$colonne."\":\"". utf8_encode($data[$colonne])."\"";
											if ($j != $nbColonnes-1) echo ",";
										} // Fin de la boucle for
									echo "}";
									$map++;
								} // Fin de la boucle while
							 // Fin de la boucle if
							 if($map==0){
								 echo "203";
							 }else{
								echo "]}"; 
							 }
								
						}
			   }
			}
/////////////////////////////////////
			
		}else{
			echo 200;	
		}
		

?>