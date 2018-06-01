
<?php
include("codes/classes/ClasseTransaction.php");
include("codes/classes/ClasseMouvement.php");
include("codes/classes/ClasseAgence.php");


$reche_Agence=new agence();
$Tab_Agence=$reche_Agence->fx_ComboAgences();

$Combo=new transaction();
$TabDevise=$Combo->fx_rechercheDevise();

if(isset($_POST["envoie"])){
$formulaire_value=true;
	
	if($_POST["Motif"]==""){
		$formulaire_valide=false;
		$msgMotif="votre champ Motif est vide";
	}elseif ($_POST["AgProv"]=="0"){
		$formulaire_valide=false;
		$msgAgBen="votre champ Agence bénéficiaire n'est pas sélectionner";
	}elseif ($_POST["Montant"]==""){
		$formulaire_valide=false;
		$msgMontant="votre champ Montant est vide";
	}elseif ($_POST["Devise"]=="0"){
		$formulaire_valide=false;
		$msgDevise="votre champ Dévise n'est pas Selectionné";
	}else{

		$inscript=new Mouvement();
		$ResMouv=$inscript->fx_EnregistrerMouvement($_POST["Montant"],$_POST["Devise"],"Financement","E",$_POST["AgProv"],$_SESSION['idagent'],"","");
		if ($ResMouv) {
			echo "errerer";
			$resulFin=$inscript->fx_CreerFinancement($_POST["Motif"],$ResMouv,"",$_SESSION['IdAgence'],"");
			if($resulFin){
				$ResMouve=$inscript->fx_EnregistrerMouvement($_POST["Montant"],$_POST["Devise"],"Virement","S",$_SESSION['IdAgence'],$_SESSION['idagent'],"","");
				$resultat=$inscript->fx_CreerVirement($ResMouve,$resulFin,"");
				 if ($resultat) {
				 	$_SESSION['messageconfirm']="Financement effectué avec succès";
				 	header("location:Validation.php");
				 }else{

				 }
						
			}else{
				///////////////////////////
			}
		}
		
			
		
		}

	
}
	
	

?>