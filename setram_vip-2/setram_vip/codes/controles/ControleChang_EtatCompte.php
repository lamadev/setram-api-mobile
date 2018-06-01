<?php
session_start();
include ("codes/classes/classeCompte.php");

if (isset($_POST['compte'])) {
	if ($_SESSION['EtatCompte']==1) {
		$recherche=new Compte();
		$Tab_Client=$recherche->fx_SuspensionCompte($_SESSION['IdCompte'],0);
		header("Location:GestionCompte.php");
	}else{
		$recherche=new Compte();
		$Tab_Client=$recherche->fx_SuspensionCompte($_SESSION['IdCompte'],1);
		header("Location:GestionCompte.php");
	}
	
}
								
?>	