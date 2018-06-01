<?php
session_start();
// controle de l'interface de la recherch
include_once("codes/classes/ClasseTransaction.php");
    //echo $_SESSION['NumCompte'];
	$RecheEtab= new transaction();					
	$ResDepot=$RecheEtab->fx_JournalTransaction_Depot("Retrait",$_SESSION['NumCompte']);
	
					

?>
