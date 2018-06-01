<?php

include("codes/classes/ClasseTransfert.php");
include("codes/classes/ClasseMouvement.php");
include("codes/classes/ClasseAgence.php");
include("codes/fonctions/Generate_Code.php");
//include("codes/fonctions/fx_upload.php");

$reche_Agence=new agences();
$Tab_Agence=$reche_Agence->fx_Liste_agences_Connect($_SESSION['IdAgence']);

$Code=fx_generateur_Code();

if(isset($_POST["Enregistrer"])){
			$formulaire_valide=true;
			
			if($_POST["nom"]==""){
				$formulaire_valide=false;
				$msgnom="votre champ nom est vide";
			}
			
			if($_POST["postnom"]==""){
				$formulaire_valide=false;
				$msgpostnom="votre champ post nom  est vide";
			}
			
			
			if($_POST["nom1"]==""){
				$formulaire_valide=false;
				$msgnom="votre champ nom est vide";
			}
			
			if($_POST["postnom1"]==""){
				$formulaire_valide=false;
				$msgpostnom1="votre champ postnom  est vide";
			}
			
			if($_POST["telephone1"]==""){
				$formulaire_valide=false;
				$msgtel1="votre champ est vide";
			}
			
			if($_POST["montant"]==""){
				$formulaire_valide=false;
				$msgmontant="votre champ montant est vide";
			}
			if($_POST["devise"]=="0"){
				$formulaire_valide=false;
				$msgdevise="Selectionnez une devise";
			}
			/*if($_POST["agenceexp"]==""){
				$formulaire_valide=false;
				$msgtel="votre champ est vide";
			}*/
			
			if($_POST["agenceDst"]=="0"){
				$formulaire_valide=false;
				$msgagenceDst="* Selectionnez une agence de destination";
			}
			
			if($_POST["comm"]=="0"){
				$formulaire_valide=false;
				$msgagenceDst="* Aucune commission";
			}
			
	 if($formulaire_valide==true){
			  $inscript=new transfert();
			  $resultat=$inscript->fx_enregistrementexpedit($_POST["nom"],$_POST["postnom"],"","","");
			  if($resultat){
				  $Res2=$resultat;
					
			  }else{
					echo "Information non enrefistrée dans la fenetre, veuillez bien saisir vos champs";
			  }
			 
			  $inscript=new transfert();
			  $resultat=$inscript->fx_enregistrementbenef($_POST["nom1"],$_POST["postnom1"],"",$_POST["telephone1"],"");
			  if($resultat){
				  $Res1=$resultat;
					//echo "reussi";
			  }else{
				echo "Information non enrefistrée dans la fenetre, veuillez bien saisir vos champs";
			  }
			  if($_POST["comm"]==""){
					$formulaire_value=false;
					$msgcomm="le champ Marque est vide";
				}
					
			 
			  ////////////////////////////////////////////////////////////////////////////////////////////////////
			  
			
			  $Mouvema=new Mouvement();
			  $resultat=$Mouvema-> fx_EnregistrerMouvement($_POST["montant"],1,"envoi","E",$_POST["devise"],$_SESSION['IdAgence'],$_SESSION['idagent']);
			  if($resultat){
				  $Res3=$resultat;
				   echo "reussi";
			  }else{
					echo "Information non enrefistrée dans la fenetre, veuillez bien saisir vos champs";
			  }
		//Enregistrer commission
		$Agence=new agences();
		$TabCom=$Agence->fx_trouve_plage($_SESSION['IdAgence'],$_POST["montant"],$_POST["devise"]);
		
		$commiss=0;
		$deviseComm="";
		if ($TabCom){
			while ($row = $TabCom->fetch()) {
				$IdPlage=$row['IdPlage'];
				$Pourcentage=$row['Pourcentage'];
				$TypePlage=$row['TypePlage'];
				$CodedeviseCommiss=$row['CodedeviseCommiss'];
				if($TypePlage=="F"){
								$commiss=$Pourcentage;
								$deviseComm=$CodedeviseCommiss;
							}
				if($TypePlage=="P"){
						$commiss = 0;
						$Com=0;
						$Montant = 0;
						$Montant=$_POST["montant"];
						$Com = $Pourcentage;
						
						$commiss=($Montant*$Com)/100;
						$deviseComm=$CodedeviseCommiss;
					}	
			}
		}
		
			  //$resultat=$Mouvema->fx_EnregistrerMouvement($_POST["comm"],1,"commission","E",$_POST["Monnaiecomm"],$_SESSION['IdAgence'],$_SESSION['idagent']);
			  $resultat=$Mouvema->fx_EnregistrerMouvement($commiss,1,"commission","E",$deviseComm,$_SESSION['IdAgence'],$_SESSION['idagent']);
			  if($resultat){
				  $Res6=$resultat;
				   echo "reussi";
			  }else{
				echo "Information non enrefistrée dans la fenetre, veuillez bien saisir vos champs";
			  }
			  
			  
			  
			  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			 $Long=strlen($Res3);
			 $Annees=substr(date("Y"),3,1);
			 if($Long>=2){
			 	$Position=$Long-2;
				$MoitierCode=substr($Res3,$Position,2);
				$Trouv=0;
				$Mot=0;
				$Mot=$MoitierCode;
				if($Mot>$Annees){
					$Trouv=$MoitierCode-$Annees;
				}else{
					$Annees=substr(date("Y"),2,2);
					$Trouv=$MoitierCode+$Annees;
					//$_SESSION['IdAgence']
					}
				
				$MoitierCode=$Trouv.$_SESSION['IdAgence'];
			 }else{
				$Ajout=3-$Long;
				$MoitierCode="";
				while($Ajout<2){
					$MoitierCode.="0";
					$Ajout++;
					}
				 $MoitierCode.=$Res3.$_SESSION['IdAgence'];
				 }
			 $veri=0;
			 $Transf=new transfert();
			 while($veri==0){
				 $verif=$Transf->fx_verifier_Transfert_Code($Code.$MoitierCode);
				 if($verif==1){
					 $Code=fx_generateur_Code();
					 //$veri=2;	
					}else{
					 $veri=2;
						}
			 }
			 
			  $resultat=$Transf->fx_transfert($Res1,$Res2,$Res3,$_SESSION['IdAgence'],$_POST["agenceDst"],1,$Code.$MoitierCode);
			  
			  if($resultat){
				  $Res5=$resultat;
					
					 $resulcom=$Transf->fx_enregistrementcommission($_POST["comm"],1,$Res6,$Res5);
					
					if($resulcom){
						
						$_SESSION['messageconfirm']="Opération réussie. <br/> le code d'envoi est : <h4>".$Code.$MoitierCode."</h4> Beneficiaire :<h4>".
						 $_POST["nom1"]." ". $_POST["postnom1"]." ".$_POST["prenom1"];
						echo "reussi F";
						header("location:Confirmation.php");
					}
			  }else{
					echo "Information non enrefistrée dans la fenetre, veuillez bien saisir vos champs";
			  }
			   ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				   
				 
			 /* $inscript=new transfert();
			  $resultat=$inscript->fx_enregistrementEffectuer($Res2,$Res1,$Res5);
			  if($resultat){
				//echo "reussi";
			  }else{
				echo "Information non enrefistrée dans la fenetre, veuillez bien saisir vos champs";
			  }*/
	  
	  
	 }
	
}



?>