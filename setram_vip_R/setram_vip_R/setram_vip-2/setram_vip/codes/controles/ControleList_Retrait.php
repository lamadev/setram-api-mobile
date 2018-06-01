<?php
include_once ("codes/classes/ClasseTransaction.php");
include ("codes/classes/ClasseAgence.php");

$recherche=new agence();
$Tab_Agence=$recherche->fx_ListeAgences();

$Etat="G";
$Periode="";

if(isset($_POST['RechercheJ'])){
	//echo "tosssa  ";
	if($_POST['agenceExp']!= 0 && $_POST['Cdate']!= "" ){
		$Cdate=$_POST['Cdate'];
		
		//echo $Cdate;
		$Periode=" du ".date('d/m/Y',strtotime($Cdate));
		
	    $reche_Agences=new transaction();
		$resultat=$reche_Agences->fx_DepotAgenc_Date($_POST['agenceExp'],$Cdate,"Retrait");
		
	}elseif($_POST['agenceExp']== 0 && $_POST['Cdate']!= ""){
	
		//echo 'ensemble';
		$ladate=strtotime($_POST['Cdate']);
		$Periode=" du ".date('d/m/Y',$ladate);	
		$recherche=new transaction();
		$resultat=$recherche->fx_ListeGenDepot_Date($_POST['Cdate'],"Retrait");
	}
$Etat=1;	
	
}else{
		$recherche=new transaction();
		//$resultat=$recherche->fx_ListeGenTransfert();
		$Format_Envoie = 'Y/m/d';
		$Cdates=date($Format_Envoie,time());
		$Periode=" du ".$Cdate=date('d/m/Y',time());
		$resultat=$recherche->fx_ListeGenDepot_Date($Cdates,"Retrait");
}

if(isset($_POST['RechercheM'])){
	
		if($_POST['agenceExp']!= 0 && $_POST['mois']!= 0 && $_POST['annee']!= 0){
					$Cmois=$_POST['mois'];
					$Cannee=$_POST['annee'];
						$reche_Agences=new transaction();
						$resultat=$reche_Agences->fx_AffichageTransfertAgence_Mensuel($_POST['agenceExp'],$_POST['mois'],$_POST['annee'],"Retrait");
					$Etat=2;
					$Periode=" de ".$Cmois."/".$Cannee;	
			}elseif($_POST['agenceExp']== 0 && $_POST['mois']!= 0 && $_POST['annee']!= 0){
					$Periode=" de ".$_POST['mois']."/".$_POST['annee'];	
					$recherche=new transaction();
					$resultat=$recherche->fx_AffichageTransfert_Mensuel($_POST['mois'],$_POST['annee'],"Retrait");
					
			}
	}else{
	//echo "YYYYYYYYYYYYYYYYY";
	
	}
								
						      
								
?>	