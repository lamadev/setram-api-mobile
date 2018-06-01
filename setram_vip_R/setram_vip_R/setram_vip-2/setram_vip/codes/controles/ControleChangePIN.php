
<?php
//include("codes/fonctions/securite.php");
include("codes/classes/ClasseClient.php");
include("codes/classes/ClasseTransaction.php");
//include("codes/fonctions/fx_upload.php");


if(isset($_POST["envoie"])){
$formulaire_value=true;
	
	if($_POST["anc_pin"]==""){
	$formulaire_valide=false;
	$msgMotif="votre champ ancien pin est vide";
	}elseif ($_POST["new_pin"]==""){
	$formulaire_valide=false;
	$msgMontant="votre champ nouveau pin est vide";
	}elseif ($_POST["new_pin1"]==""){
	$formulaire_valide=false;
	$msgDevise="votre champ répété pin est vide";
	}elseif ($_POST["new_pin"]!= $_POST["new_pin"]"0"){
	$formulaire_valide=false;
	$msgDevise="Les deux PIN ne sont pas égaux";
	}else{
	  $inscript=new Client();
	  $resultat=$inscript->fx_ChangePIN($IdCompte,$_POST["anc_pin"],$_POST["new_pin"]);
	  if($resultat){
	  	header("location:Validation.php");
	  //$_SESSION['messageconfirm']="Vous venez d'effectuer une Dépense de "."<strong>".$_POST["Devise"]." ".$_POST["Montant"]." "."dont le motif est"." "."<strong>".$_POST["Motif"]."</strong>";
	  
	  }else{
	    echo "Information non enrefistrée dans la fenetre, veuillez bien saisir vos champs";
	  }
	}

	
	}

?>