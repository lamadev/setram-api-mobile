<?php
//session_start();
// controle de l'interface de la recherch
include_once("codes/classes/ClasseTransaction.php");
include_once("codes/classes/ClasseCompte.php");
include_once("codes/classes/ClassePlage.php");
include_once("codes/fonctions/transferer.php");

$Transact= new transaction();
$ResFrai_Transf=$Transact->fx_Frais_Transfert("Transfert",$_SESSION['CodeMonnaie']);
$SommeFrai_Transf=$Transact->fx_Somme_Frais("Transfert",$_SESSION['CodeMonnaie']);

if (isset($_POST["Envoyer"])){
        //echo "bonjour x";
		$MontantTransfert=$_POST["Montant"];
		$IdCompteB=$_POST["IdCompteB"];
		$IdCompteE=$_SESSION['IdCompte'];
		$CodeMonnaietrans=$_SESSION['CodeMonnaie'];
		$Moyen="web";
		$IdPlage=$_POST["IdPlage"];
		$idagent=$_SESSION['idagent'];
		$IdAgence=$_SESSION['IdAgence'];
		
	$Resultat=Transferer($MontantTransfert, $IdCompteB, $IdCompteE, $CodeMonnaietrans, $Moyen, $idagent, $IdAgence);
	
	
				
				  

}

?>
