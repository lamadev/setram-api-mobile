
<?php
//include("codes/fonctions/securite.php");
include_once("codes/classes/ClasseMouvement.php");
include_once("codes/classes/ClasseTransaction.php");
//include("codes/fonctions/fx_upload.php");

$Combo=new transaction();
$TabDevise=$Combo->fx_rechercheDevise();

if(isset($_POST["envoie"])){
$formulaire_value=true;
	
	if($_POST["Motif"]==""){
	$formulaire_valide=false;
	$msgMotif="votre champ Motif est vide";
	}elseif ($_POST["Montant"]==""){
	$formulaire_valide=false;
	$msgMontant="votre champ Montant est vide";
	}elseif ($_POST["Devise"]=="0"){
	$formulaire_valide=false;
	$msgDevise="votre champ Dévise n'est pas Selectionné";
	}else{
		// echo ("Bonjourrrrrrrrrrrrrr");
	  $inscript=new Mouvement();
	  $resultat=$inscript->fx_EnregistrerMouvement($_POST['Montant'],$_POST['Devise'],"Depense","S",$_SESSION['IdAgence'],$_SESSION['idagent'],"","");
	  if($resultat){
	  $resultats=$inscript->fx_CreerDepense($_POST['Motif'],$resultat,"");
	  if ($resultats) {
	  	$_SESSION['messageconfirm']="Depense effectuée avec succès";
	  	header("location:Validation.php");
	  }else{
	  	/////////////////////////
	  }
	  //$_SESSION['messageconfirm']="Vous venez d'effectuer une Dépense de "."<strong>".$_POST["Devise"]." ".$_POST["Montant"]." "."dont le motif est"." "."<strong>".$_POST["Motif"]."</strong>";
	  
	  }else{
	    echo "Information non enrefistrée dans la fenetre, veuillez bien saisir vos champs";
	  }
	}

	
	}

?>