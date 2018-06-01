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
	include_once("../classes/ClasseCompte.php");
	$Format_DateComent = 'd/m/y à H:i';
	
	if(isset($_REQUEST['NumCompte'])) $NumCompte=$_REQUEST['NumCompte'];
	else $NumCompte="inconnu";
	
	if(isset($_REQUEST['idAgent'])) $idAgent=$_REQUEST['idAgent'];
	else $idAgent="inconnu";
	
	$Formulaire_Valide = true;
	if($NumCompte==''){
		//$message_titre='* Aucun commentaire saisi';
		$Formulaire_Valide = false;
	}
	if($idAgent==''){
		//$message_titre='* Aucun commentaire saisi';
		$Formulaire_Valide = false;
	}	

	 if($Formulaire_Valide == true)
	 {
	 		if ( isset($NumCompte) ) {
				$NumCompte=filter_var( $NumCompte, FILTER_SANITIZE_STRING) ;
				$NumCompte=addslashes($NumCompte);
				
				$idAgent=filter_var( $idAgent, FILTER_SANITIZE_STRING) ;
				$idAgent=addslashes($idAgent);
				
				
			}
			
		  $LeCompte= new Compte();					
		  $resultat=$LeCompte->fx_RechecheCompte($NumCompte);
		 
		   if (!$resultat){
				echo "202";
			}else{
				
				 
						 
					   //Création du Document JSON
						$debut = true;
						$nbColonnes=18;
						
						//echo "{\"User_id\":[";
						
								 while ($row=$resultat->fetch()) {
									
									 
										if ($debut){
											echo "{\"Compteb\":[";
											echo "{";
											$debut = false;
										} else {
											echo ",{";
										}
										for($j=0;$j<$nbColonnes;$j++){
											if ($j==0)$colonne='IdCompte';
											if ($j==1)$colonne='NumCompte';
											if ($j==2)$colonne='Solde';
											if ($j==3)$colonne='CodeMonnaie';
											if ($j==4)$colonne='CodeTypeCompte';
											if ($j==5)$colonne='IdClient';
											if ($j==6)$colonne='IdAgence';
											if ($j==7)$colonne='DateHeurCree';
											if ($j==8)$colonne='EtatCompteB';
											if ($j==9)$colonne='IdClient';
											if ($j==10)$colonne='Nom';
											
											if ($j==11)$colonne='Postnom';
											if ($j==12)$colonne='Prenom';
											if ($j==13)$colonne='Sexe';
											if ($j==14)$colonne='DateNaiss';
											if ($j==15)$colonne='Phone';
											if ($j==16)$colonne='IdPiece';
											if ($j==17)$colonne='NomAgence';
											
								
											echo "\"".$colonne."\":\"". utf8_encode($row[$colonne])."\"";
											if ($j != $nbColonnes-1) echo ",";
										} // Fin de la boucle for
									echo "}";
								} // Fin de la boucle while
							 // Fin de la boucle if
							
			   }

/////////////////////////////////////
			
		}else{
			echo 200;	
		}
		

?>