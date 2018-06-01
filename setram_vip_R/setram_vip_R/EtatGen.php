<?php
include_once ("codes/classes/ClasseTransaction.php");

	$ModAgent=new transaction();
	if ($_GET['Type']=='depot') {
		$resultate=$ModAgent->fx_Change_EtatTransaction($_GET["idTrans"],$_GET["etat"]);

		$Result_Compte=$RecheCompte->fx_ModiferSolde_Compte($IdCompteB,$MontantTransfert,"S");				
		header("location: ListeDepot.php");
	}
	
							
?>	