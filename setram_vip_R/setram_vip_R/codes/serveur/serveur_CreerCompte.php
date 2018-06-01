<?php session_start();?>
<?php 
	//indique que le type de la réponse renvoyée sera du texte
	header('Content-Type: application/json');
	header("Content-Type: text/plain ; charset=utf-8");
	//header('Content-Type:text/html; charset=utf-8'); 
	// Anticache pour HTTP/1.1
	header("Cache-Control: no-cache , private");
	// Anticache pour HTTP/1.0
	header("Pragma: no-cache");
	//simulation du temps d'attente du serveur (2 secondes)
	//sleep(2);
	
	//include_once('../Classes/ClassesPublication.php');
	include_once("../classes/ClasseClient.php");
	include_once("../classes/ClasseCompte.php");
	
	$source="B";
	
	if(isset($_REQUEST['NomCl'])) $NomCl=$_REQUEST['NomCl'];
	else $NomCl="0";
	if(isset($_REQUEST['PostNomCl'])) $PostNomCl=$_REQUEST['PostNomCl'];
	
	if(isset($_REQUEST['PrenomCl'])) $PrenomCl=$_REQUEST['PrenomCl'];
	if(isset($_REQUEST['SexeCl'])) $SexeCl=$_REQUEST['SexeCl'];
	if(isset($_REQUEST['DateNaissCl'])) $DateNaissCl=$_REQUEST['DateNaissCl'];

	if(isset($_REQUEST['PaysAdresseCl'])) $PaysAdresseCl=$_REQUEST['PaysAdresseCl'];
	if(isset($_REQUEST['ProvinceCl'])) $ProvinceCl=$_REQUEST['ProvinceCl'];

	if(isset($_REQUEST['NomProv'])) $NomProv=$_REQUEST['NomProv'];
	
	if(isset($_REQUEST['VilleCl'])) $VilleCl=$_REQUEST['VilleCl'];
	if(isset($_REQUEST['AvenuCl'])) $AvenuCl=$_REQUEST['AvenuCl'];
	if(isset($_REQUEST['NumParcCl'])) $NumParcCl=$_REQUEST['NumParcCl'];
	if(isset($_REQUEST['CommuneCl'])) $CommuneCl=$_REQUEST['CommuneCl'];
	
	if(isset($_REQUEST['PhoneCl'])) $PhoneCl=$_REQUEST['PhoneCl'];
	
	if(isset($_REQUEST['TypeCompte'])) $TypeCompte=$_REQUEST['TypeCompte'];
	if(isset($_REQUEST['Monnaie'])) $Monnaie=$_REQUEST['Monnaie'];
	if(isset($_REQUEST['idUser'])) $idUser=$_REQUEST['idUser'];
	if(isset($_REQUEST['idAgence'])) $idAgence=$_REQUEST['idAgence'];
	
	if(isset($_REQUEST['idPays'])) $idPays=$_REQUEST['idPays'];
	if(isset($_REQUEST['IdTypePieceCl'])) $IdTypePiece=$_REQUEST['IdTypePieceCl'];
	
	//$Format_Date= 'Y/m/d';
	//$txt  = '1934-10-11';
	$date = DateTime::createFromFormat('d/m/Y', $DateNaissCl);
	$DateNaissCl=$date->format('Y-m-d');
	//$DateNaissCl=date($Format_Date,$DateNaissCl);
	
	if($NomCl!="0"){
			$source="A";
		}
	//else $source="A";
	
	//echo $source;
	if ($source=="A"){
		
		
		$IdClient=0;
		$Enreg= new Client();
		$Resu=$Enreg->fx_creerClient($NomCl,$PostNomCl,$PrenomCl,$SexeCl,$DateNaissCl,$PhoneCl,$IdTypePiece);
	    if($Resu){ 
		    $Ddate=date('ym',time());
			if($idPays<100){
				$Ajt="0";
			}elseif($idPays<10){
				$Ajt="00";
				}
		    $NumCompte=$Ajt.$idPays.$idAgence.$Ddate.$Resu;
			$Resu=$Enreg->fx_creerAdresse($AvenuCl, $NumParcCl, $CommuneCl,$VilleCl,$Resu,$ProvinceCl,$NomProv,$PaysAdresseCl);
			
			$CrCompte= new Compte();
			$Res=$CrCompte->fx_creerCompte($Monnaie,$TypeCompte,$Resu,$idAgence,$NumCompte);
			if($Res){
				echo $Res;
			}else{
				echo 202;
				}
		}else{
			echo 201;
		}
		
	}else{
		echo 200;
		}
/////////////////////////////////////////			

?>