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
	include_once($Dossier_Classes.'ClasseCompte.php');

	$Format_DateComent = 'd/m/y à H:i';

	if(isset($_REQUEST['PIN'])) $PIN=$_REQUEST['PIN'];
	else $PIN="";

	if(isset($_REQUEST['IdCompte'])) $IdCompte=$_REQUEST['IdCompte'];
	else $IdCompte="";
	
	$Formulaire_Valide = true;
	if($PIN==''){
		$Formulaire_Valide = false;
	}

	if($IdCompte==''){
		$Formulaire_Valide = false;
	}
	
	 if($Formulaire_Valide == true)
	 {
	 		
		  $RecheCompte= new Compte();					
		  $resultat_E=$RecheEtab->fx_changer_PIN($IdCompte,$PIN);
		   if (!$resultat_E){
				echo 0;
			}else{
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
									if ($j==0)$colonne='PIN modifie';
									
									echo "\"".$colonne."\":\"".$row[$colonne]."\"";
									
									if ($j != $nbColonnes-1) echo ",";
								} // Fin de la boucle for
								echo "}";
							} // Fin de la boucle while
						 // Fin de la boucle if
		   			
		   		

		   }
/////////////////////////////////////
			
		}else{
			echo 9;	
		}
		

?>