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
		$resultat=$reche_Agences->fx_TransfertAgenc_Date($_POST['agenceExp'],$Cdate);
		
	}elseif($_POST['agenceExp']== 0 && $_POST['Cdate']!= ""){
	
		//echo 'ensemble';
		$ladate=strtotime($_POST['Cdate']);
		$Periode=" du ".date('d/m/Y',$ladate);	
		$recherche=new transaction();
		$resultat=$recherche->fx_ListeGenTransfert($_POST['Cdate']);
	}
$Etat=1;	
	
}else{
		$recherche=new transaction();
		//$resultat=$recherche->fx_ListeGenTransfert();
		$Format_Envoie = 'Y/m/d';
		$Cdates=date($Format_Envoie,time());
		echo $Cdates;
		$Periode=" du ".$Cdate=date('d/m/Y',time());
		$resultat=$recherche->fx_ListeGenTransfert($Cdates);
}
								
						      
								
?>	