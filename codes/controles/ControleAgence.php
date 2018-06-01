<?php
include ("codes/classes/ClasseAgence.php");
include ("codes/classes/ClassePlage.php");

	$recherche=new agence();
	$resultat=$recherche->fx_ListeAgences();

	$rechercheTarif=new plages();
	$Result_Tarif=$rechercheTarif->fx_AfficheTarification();
	
	if(isset($_POST["Enregistrer"])) {
	$formulaire_value=true;
	
	
		if($_POST["nom"]==""){
			$formulaire_value=false;
			$msgNom="le champs Nom est vide";
		}  
			
			if($_POST["Telephone"]==""){
			     $formulaire_value=false;
			     $msgTelephon="le champ Telephone est vide";
			}
			
			
			if($_POST["adresse"]==""){
			     $formulaire_value=false;
			     $msgadresse="Selectionnez un Type agent";
			}
					   
		 if  ($formulaire_value==true){
						  $Agent=new agence();
						  $resultat=$Agent->fx_CreerAgence($_POST["nom"],$_POST["adresse"],$_POST["Telephone"],"");			  
						  if($resultat){
						  	$ResUSD=$Agent->fx_NouveauTaux(0,"USD",$resultat);
						  	$ResCDF=$Agent->fx_NouveauTaux(0,"CDF",$resultat);
						  	$ResKz=$Agent->fx_NouveauTaux(0,"Kz",$resultat);	
							header("location:ListeAgence.php");
								 
								  //echo "reussi";
							  }else{
							  
							  echo "Information non enregistrée dans la fenetre, veuillez bien saisir vos champs";
							  
							  }
							  
						  
						  }
				
				
		
	}			
						      
								
?>	