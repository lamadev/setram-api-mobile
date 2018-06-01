<?php
include_once("codes/classes/ClasseAgent.php");
include_once("codes/classes/ClasseAgence.php");
//include("codes/fonctions/fx_upload.php");

$reche_Agent=new Agent();
$Tab_Agent=$reche_Agent->fx_List_Gen_Agent();

$Tab_TypeAgent=$reche_Agent->fx_TypeAgent();

$reche_Agence=new agence();
$Tab_Agence=$reche_Agence->fx_ListeAgences();
					  

if(isset($_POST["Enregistrer"])) {
	$formulaire_value=true;
	
	
		if($_POST["nom"]==""){
			$formulaire_value=false;
			$msgNom="le champs Nom est vide";
		}  
		  if($_POST["postnom"]==""){
				$formulaire_value=false;
				$msgpostnom="le champ Post-Nom est vide";
			}
		if($_POST["prenom"]==""){
			     $formulaire_value=false;
			     $msgPrenom="le champ Prenom est  vide";
			}	

					
			$BtnRaadio="0";
			if(!isset($_POST["sexe"])) {
	          $formulaire_value=false;
			  $msgsexe="le champ Matricule est vide";
			  $BtnRaadio="1";
			}
			
			if($_POST["Telephone"]==""){
			     $formulaire_value=false;
			     $msgTelephon="le champ Telephone est vide";
			}
			
			
			if($_POST["Agence"]=="0"){
			     $formulaire_value=false;
			     $msgNombreAgence="Selectionnez une agence";
			}
			
			if($_POST["Compte"]==""){
			     $formulaire_value=false;
			     $msgNombreCompte="le champ Compte est vide";
			}
			
			if($_POST["Mdp"]==""){
			     $formulaire_value=false;
			     $msgMdp="le champ Mot de passe est vide";
			}
			
			if($_POST["TypeAgt"]=="0"){
			     $formulaire_value=false;
			     $msgNombreType="Selectionnez un Type agent";
			}
			if($_POST["TypeAgt"]=="Admin"){
			     $formulaire_value=false;
			     $msgNombreType="Selectionnez un Type agent";
			}
					   
		 if  ($formulaire_value==true){
						 
						  $Agent=new Agent();
						  $resultat=$Agent->fx_creerAgent($_POST["nom"],$_POST["postnom"],$_POST["prenom"],$_POST["sexe"],$_POST["Telephone"],$_POST["Compte"],$_POST["Mdp"],$_POST["TypeAgt"],1);	
						  				  
						  if($resultat){
							  
							  $Res1=$Agent->fx_AffecterAgent($_POST["Agence"],$resultat,"",1);
								  header("location:ListeAgent.php");
								 
								  echo "reussi";
							  }else{
							  
							  echo "Information non enregistrée dans la fenetre, veuillez bien saisir vos champs";
							  
							  }
							  
						  
						  }
				
				
		
	}




?>
