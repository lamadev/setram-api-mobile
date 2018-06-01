
<?php
//echo ("Bonjour!!!!!!!!!!!!!!!!!!");
//session_start();
include_once("codes/classes/ClasseMouvement.php");
//include("codes/fonctions/fx_upload.php");

/*$recherche=new Operation();
$TabTaux=$recherche->fx_AfficheTaux('USD');
if($TabTaux){
	while($data=$TabTaux->fetch()){
			$Taux=0;
			$Taux=$data['taux'];
		}
}*/

					
if(isset($_POST["Changer"])){
	//echo "tokoti";
$formulaire_value=true;
	
	if($_POST["Montant"]==""){
		$formulaire_valide=false;
		$msgMontant="votre champ Montant est vide";
	}
	
	if($_POST["Devise"]==0){
		$formulaire_valide=false;
		$msgDevise="votre champ Dévise n'est pas Selectionne";
	}
	/*if($_POST["ConverUSD"]=""){
	$formulaire_valide=false;
	$msgDevise="votre champ Dévise n'est pas Selectionne";
	}
	if($_POST["ConverCDF"]=""){
	$formulaire_valide=false;
	$msgDevise="votre champ Dévise n'est pas Selectionne";
	}*/
	
	
	if($formulaire_value==true){
		 //if($_POST['Devise']==1) {
			 
		 	  $Montant=0;
			  $MontantUSD=0;
			  $MontantCDF=0;
			  $inscript=new Mouvement();
			  if($_POST["Devise"]==1){
					 $Tau=$Taux;
				  }else{
					 $Tau=$CTaux;
					  }
			  if($_POST["Devise"]==1){
				  	$Montant=$_POST["Montant"];
					$MontantUSD=$Montant;
					$MontantCDF=$MontantUSD*$Tau;
					$resultat1=$inscript->fx_EnregistrerMouvement($MontantUSD,"USD","conversion","E",$_SESSION['IdAgence'],$_SESSION['idagent'],"",1);
					$resultat2=$inscript->fx_EnregistrerMouvement($MontantCDF,"CDF","conversion","S",$_SESSION['IdAgence'],$_SESSION['idagent'],"",1);
					$sense="USD-CDF";
				}elseif($_POST["Devise"]==2){
					$Montant=$_POST["Montant"];
					$MontantCDF=$Montant;
					$MontantUSD=$MontantCDF/$Tau;
					$resultat1=$inscript->fx_EnregistrerMouvement($MontantUSD,"USD","conversion","S",$_SESSION['IdAgence'],$_SESSION['idagent'],"",1);
					$resultat2=$inscript->fx_EnregistrerMouvement($MontantCDF,"CDF","conversion","E",$_SESSION['IdAgence'],$_SESSION['idagent'],"",1);
					$sense="CDF-USD";
				}elseif ($_POST["Devise"]==3) {
					$Montant=$_POST["Montant"];
					$MontantKz=$Montant;
					$MontantUSD=$MontantKz/$Tau;
					$resultat1=$inscript->fx_EnregistrerMouvement($MontantKz,"Kz","conversion","E",$_SESSION['IdAgence'],$_SESSION['idagent'],"",1);
					$resultat2=$inscript->fx_EnregistrerMouvement($MontantUSD,"USD","conversion","S",$_SESSION['IdAgence'],$_SESSION['idagent'],"",1);
					$sense="Kz-USD";
				}elseif ($_POST["Devise"]==4) {
					$Montant=$_POST["Montant"];
					$MontantUSD=$Montant;
					$MontantKz=$MontantUSD*$Tau;
					$resultat1=$inscript->fx_EnregistrerMouvement($MontantUSD,"USD","conversion","E",$_SESSION['IdAgence'],$_SESSION['idagent'],"",1);
					$resultat2=$inscript->fx_EnregistrerMouvement($MontantKz,"Kz","conversion","S",$_SESSION['IdAgence'],$_SESSION['idagent'],"",1);
					$sense="USD-Kz";
				}

			  
			  $resultat3=$inscript->fx_EnregistrerConversion($sense,1);
			  
			  if($resultat1){
				  /*$inscript=new Mouvement();
				  $resultat2=$inscript->fx_EnregistrerMouvement($_POST['ConverUSD'],1,"conversion","S","CDF",0,1,1);*/
				 if($_POST["Devise"]==1){
					 $Tau=$Taux;
				  }else{
					 $Tau=$CTaux;
					  }
				 
				  	$resultat4=$inscript->fx_EnregistrerConcerner($resultat1,$resultat3,$Tau);
				  	$resultat4=$inscript->fx_EnregistrerConcerner($resultat2,$resultat3,$Tau);

			  	  $_SESSION['messageconfirm']="Opération effectuée.";
				//echo "reussi F";
				  header("location:Validation.php");
			  }else{
			  
			  }

	   
		//header("location:ListeProduit.php");	
	  /*}else if($_POST['Devise']==2){
	     echo $_POST["ConverCDF"];
		 echo $_POST["ConverUSD"];
	
			  $inscript=new Mouvement();
			  $resultat1=$inscript->fx_EnregistrerMouvement($_POST['Montant'],1,"conversion","E","CDF",0,1,1);
			  $inscripts=new Operation();
			  $resultat3=$inscripts->fx_EnregistrerConversion("CDF-USD",1);
			  if($resultat1){
				  //echo "Information non enrefistrée dans la fenetre, veuillez bien saisir vos champs";
				  $inscript=new Mouvement();
				  $resultat2=$inscript->fx_EnregistrerMouvement($_POST['ConverCDF'],1,"conversion","S","USD",0,1,1);
				  
				  $inscripts=new Operation();
				  $resultat4=$inscripts->fx_EnregistrerConcerner($resultat1,$resultat3);
				  
				  $resultat4=$inscripts->fx_EnregistrerConcerner($resultat2,$resultat3);
				  echo ("reussi all");
			  }else{
			  
			  
			  }
	  }*/
		}

	}

?>