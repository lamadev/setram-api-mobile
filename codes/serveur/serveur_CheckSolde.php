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
	
	if(isset($_REQUEST['idCompte'])) $idCompte=$_REQUEST['idCompte'];
	else $idCompte="inconnu";
	
	if(isset($_REQUEST['idAgent'])) $idAgent=$_REQUEST['idAgent'];
	else $idAgent="inconnu";
	
	$Formulaire_Valide = true;
	if($idCompte==''){
		//$message_titre='* Aucun commentaire saisi';
		$Formulaire_Valide = false;
	}
	if($idAgent==''){
		//$message_titre='* Aucun commentaire saisi';
		$Formulaire_Valide = false;
	}	

	 if($Formulaire_Valide == true)
	 {
	 		if ( isset($idCompte) ) {
				$idCompte=filter_var( $idCompte, FILTER_SANITIZE_STRING) ;
				$idCompte=addslashes($idCompte);
				
				$idAgent=filter_var( $idAgent, FILTER_SANITIZE_STRING) ;
				$idAgent=addslashes($idAgent);
				
				
			}
			
		  $LeCompte= new Compte();					
		  $resultat=$LeCompte->fx_VerifierSolde_Compte_F($idCompte);
		 
		   if (!$resultat){
				echo "A";
			}else{
				
				 echo $resultat;
/////////////////////////////////////
			}
		}else{
			echo "B";	
		}
		

?>