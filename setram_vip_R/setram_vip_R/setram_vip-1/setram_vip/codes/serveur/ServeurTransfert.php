<?php 
	//indique que le type de la réponse renvoyée sera du texte
	header("Content-Type: text/plain ; charset=utf-8");
	// Anticache pour HTTP/1.1
	header("Cache-Control: no-cache , private");
	// Anticache pour HTTP/1.0
	header("Pragma: no-cache");
	//simulation du temps d'attente du serveur (2 secondes)
	//sleep(2);
	
	include("Dossiers_Config.php");
	include_once($Dossier_Classes.'ClasseTransaction.php');
	include_once($Dossier_Classes.'ClasseCompte.php');

	$Format_DateComent = 'd/m/y à H:i';

	if(isset($_REQUEST['PIN'])) $PIN=$_REQUEST['PIN'];
	else $PIN="";

	if(isset($_REQUEST['IdCompte_E'])) $IdCompte_E=$_REQUEST['IdCompte_E'];
	else $IdCompte_E="";

	if(isset($_REQUEST['IdCompte_B'])) $IdCompte_B=$_REQUEST['IdCompte_B'];
	else $IdCompte_B="";
	
	if(isset($_REQUEST['MontantTransact'])) $MontantTransact=$_REQUEST['MontantTransact'];
	else $MontantTransact="";

	if(isset($_REQUEST['CodeMonnaie'])) $CodeMonnaie=$_REQUEST['CodeMonnaie'];
	else $CodeMonnaie="";

	if(isset($_REQUEST['Sens'])) $Sens=$_REQUEST['Sens'];
	else $Sens="inconnu";

	if(isset($_REQUEST['MoyenTransact'])) $MoyenTransact=$_REQUEST['MoyenTransact'];
	else $MoyenTransact="inconnu";

	if(isset($_REQUEST['CodeTypeTransact'])) $CodeTypeTransact=$_REQUEST['CodeTypeTransact'];
	else $CodeTypeTransact="";

	if(isset($_REQUEST['IdCompte'])) $IdCompte_Setram=$_REQUEST['IdCompte'];
	else $IdCompte_Setram="";

	if(isset($_REQUEST['IdPlage'])) $IdPlage=$_REQUEST['IdPlage'];
	else $IdPlage="";
	
	$Formulaire_Valide = true;
	if($PIN==''){
		$Formulaire_Valide = false;
	}

	if($IdCompte_E==''){
		$Formulaire_Valide = false;
	}
	if($IdCompte_B==''){
		$Formulaire_Valide = false;
	}
	if($MontantTransact==''){
		$Formulaire_Valide = false;
	}
	if($CodeMonnaie==''){
		$Formulaire_Valide = false;
	}
	if($Sens==''){
		$Formulaire_Valide = false;
	}
	if($MoyenTransact==''){
		$Formulaire_Valide = false;
	}
	if($CodeTypeTransact==''){
		$Formulaire_Valide = false;
	}
	if($IdCompte_Setram==''){
		$Formulaire_Valide = false;
	}
	if($IdPlage==''){
		$Formulaire_Valide = false;
	}
	
	 if($Formulaire_Valide == true)
	 {
	 		
		  $RecheEtab= new transaction();					
		  $resultat_E=$RecheEtab->fx_creertransaction($MontantTransact,$CodeMonnaie,"S",$MoyenTransact,$CodeTypeTransact,$IdCompte_E,"",1);
		  /*Modification Solde du compte Expéditaire*/
		  $RecheCompte= new Compte();
		  $Result_Compte=$RecheCompte->fx_ModiferSolde_Compte($IdCompte_E,$Solde);
		 
		   if (!$resultat_E){
				echo 0;
			}else{
				$RecheEtabs= new transaction();
		   		$resultat_B=$RecheEtabs->fx_creertransaction($MontantTransact,$CodeMonnaie,"E",$MoyenTransact,$CodeTypeTransact,$IdCompte_B,"",1);
		   		/*Modification Solde du compte Bénéficiaire*/
		   		$RecheCompte= new Compte();
		  		$Result_Compte=$RecheCompte->fx_ModiferSolde_Compte($IdCompte_B,$Solde);
		   		if (!$resultat_B) {
		   			echo 0;
		   		}else{
		   			$RecheTrans= new transaction();
		   			$resultat=$RecheTrans->fx_creertransfert($resultat_E,$resultat_B,$IdPlage,1);
		   			if (!$resultat) {
		   				echo 0;
		   			}else{
		   				$RechFrais= new transaction();
		   				$ResultFrais=$RechFrais->fx_Ajouter_FraisTransact($resultat_E,$IdFrais,$Montant,$CodeMonnaie);
		   				$ResultFrais=$RechFrais->fx_Ajouter_FraisSMS($resultat_B,$IdFrais,$Montant,$CodeMonnaie);
		   				$resultat_E=$RechFrais->fx_InsererEffectuer($IdAgent,$resultat_E,$IdAgence);
		   				/*Modification Solde du compte Setram*/
		   				$RecheCompte= new Compte();
		  				$Result_Compte=$RecheCompte->fx_ModiferSolde_Compte($IdCompte_Setram,$Solde);
		   				
		   				//Création du Document JSON
						$debut = true;
						$nbColonnes=2;

						echo "{\"groupeAll\":[";
							while ($row = $resultat->fetch()) {
								if ($debut){
										echo "{";
										$debut = false;
									} else {
										echo ",{";
									}
									for($j=0;$j<$nbColonnes;$j++){
									if ($j==0)$colonne='Transfert effectué avec succès';
									
									echo "\"".$colonne."\":\"".$row[$colonne]."\"";
									
									if ($j != $nbColonnes-1) echo ",";
								} // Fin de la boucle for
								echo "}";
							} // Fin de la boucle while
						 // Fin de la boucle if
		   			}
		   		}

		   }
/////////////////////////////////////
			
		}else{
			echo 9;	
		}
		

?>