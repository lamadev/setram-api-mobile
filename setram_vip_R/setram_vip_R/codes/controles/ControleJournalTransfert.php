<?php
session_start();
// controle de l'interface de la recherch
include_once("codes/classes/ClasseTransaction.php");
    //echo $_SESSION['NumCompte'];
	$RecheEtab= new transaction();					
	$ResTransf=$RecheEtab->fx_JournalTransfert_Compte($_SESSION['IdCompte']);
	
					

?>
