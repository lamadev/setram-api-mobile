<?php
include_once ("codes/classes/ClasseCompte.php");

	$ModCompt=new Compte();
	if (isset($_POST['bloquer'])) {

		$Resultat=$ModCompt->fx_Changer_Etat_Compte($_POST["IdCompte"],"0");
		header("location: admin.php");

	}elseif (isset($_POST['debloquer'])) {
		$Resultat=$ModCompt->fx_Changer_Etat_Compte($_POST["IdCompte"],"1");
		header("location: admin.php");
	}
	
							
?>	