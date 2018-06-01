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
	include_once($Dossier_Classes."ClassePlage.php");
	include_once($Dossier_Fonctions.'transferer.php');
	

	$Format_DateComent = 'd/m/y à H:i';

	if(isset($_REQUEST['PIN'])) $PIN=$_REQUEST['PIN'];
	else $PIN="inconnu";

	if(isset($_REQUEST['IdCompteE'])) $IdCompteE=$_REQUEST['IdCompteE'];
	else $IdCompteE="inconnu";

	if(isset($_REQUEST['IdCompteB'])) $IdCompteB=$_REQUEST['IdCompteB'];
	else $IdCompteB="inconnu";
	
	if(isset($_REQUEST['MontantTransfert'])) $MontantTransfert=$_REQUEST['MontantTransfert'];
	else $MontantTransfert="inconnu";

	if(isset($_REQUEST['CodeMonnaietrans'])) $CodeMonnaietrans=$_REQUEST['CodeMonnaietrans'];
	else $CodeMonnaietrans="inconnu";

	if(isset($_REQUEST['Moyen'])) $Moyen=$_REQUEST['Moyen'];
	else $Moyen="inconnu";

	if(isset($_REQUEST['idagent'])) $idagent=$_REQUEST['idagent'];
	else $idagent="inconnu";

	if(isset($_REQUEST['IdAgence'])) $IdAgence=$_REQUEST['IdAgence'];
	else $IdAgence="inconnu";

	$Formulaire_Valide = true;
	/*if($PIN==''){
		$Formulaire_Valide = false;
	}*/

	if($IdCompteE=='inconnu'){
		$Formulaire_Valide = false;
		echo "1";
	}
	if($IdCompteB=='inconnu'){
		$Formulaire_Valide = false;
		echo "2";
	}
	if($MontantTransfert=='inconnu'){
		$Formulaire_Valide = false;
		echo "3";
	}
	if($CodeMonnaietrans=='inconnu'){
		$Formulaire_Valide = false;
		echo "4";
	}

	if($Moyen=='inconnu'){
		$Formulaire_Valide = false;
		echo "5";
	}
	if($idagent=='inconnu'){
		$Formulaire_Valide = false;
		echo "6";
	}
	if($IdAgence=='inconnu'){
		$Formulaire_Valide = false;
		echo "7";
	}
	
	 if($Formulaire_Valide == true)
	 {
		//$IdAgence=$_SESSION['IdAgence'];
		
		$Resultat=Transferer($MontantTransfert, $IdCompteB, $IdCompteE, $CodeMonnaietrans, $Moyen, $idagent, $IdAgence);
		if($Resultat==1)
	 	{
			echo '1';
		}
	 }else{
		echo 9;	
     }
		

?>