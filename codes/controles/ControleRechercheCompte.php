<?php
session_start();
include ("codes/classes/classeCompte.php");

if (isset($_POST['Envoyer'])) {
	$formulaire_valide=true;
	if ($_POST['NumCompte']=="") {
		$formulaire_valide=false;
		$msgMontant="Numéro compte est vide";
	}
	$recherche=new Compte();
	$Tab_Compte=$recherche->fx_RechercheCompte_Num($_POST['NumCompte']);
	if ($Tab_Compte) {
	 while ($data = $Tab_Compte->fetch()) {
		$_SESSION['IdCompte']=$data['IdCompte'];
		$_SESSION['NumCompte']=$data['NumCompte'];
		$_SESSION['EtatCompte']=$data['EtatCompteB'];
		$_SESSION['Solde']=$data['Solde'];
		$_SESSION['CodeMonnaie']=$data['CodeMonnaie'];
		$_SESSION['Libmonnaie']=$data['Libmonnaie'];
		$_SESSION['LibTypeCompte']=$data['LibTypeCompte'];
		$_SESSION['Nom']=$data['Nom'];
		$_SESSION['Postnom']=$data['Postnom'];
		$_SESSION['	Prenom']=$data['Prenom'];
		$_SESSION['Phone']=$data['Phone'];
		$_SESSION['IdAgence']=$data['IdAgence'];
							
		header("location:DescriptCompte.php");
	}
}
	
}



						      
								
?>	