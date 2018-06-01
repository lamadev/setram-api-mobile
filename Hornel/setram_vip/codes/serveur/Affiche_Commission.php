<?php session_start();?>
<?php
//indique que le type de la réponse renvoyée sera du texte
	header("Content-Type: text/plain ; charset=utf-8");
	// Anticache pour HTTP/1.1
	header("Cache-Control: no-cache , private");
	// Anticache pour HTTP/1.0
	header("Pragma: no-cache");
	//simulation du temps d’attente du serveur (2 secondes)
	//sleep(2);
	
	include_once('Dossiers_Config.php');
	include_once('../classes/ClasseAgence.php');
	//$Format_DateComent = 'd/m/y à H:i';
	
	if(isset($_REQUEST['IdAgence'])) $IdAgence=$_REQUEST['IdAgence'];
	else $IdAgence="inconnu";
	
	if(isset($_REQUEST['Montant'])) $Montant=$_REQUEST['Montant'];
	else $Montant="inconnu";
	
	if(isset($_REQUEST['devise'])) $devise=$_REQUEST['devise'];
	else $devise="inconnu";
	
	if(isset($_REQUEST['IdAgenceDest'])) $IdAgenceDest=$_REQUEST['IdAgenceDest'];
	else $IdAgenceDest="inconnu";
	
	if(isset($_REQUEST['IdGroupeProv'])) $IdGroupeProv=$_REQUEST['IdGroupeProv'];
	else $IdGroupeProv="inconnu";
	
	if(isset($_REQUEST['Type'])) $Type=$_REQUEST['Type'];
	else $Type=0;
	
	$Agence=new agences();
	//$TabCom=$Agence->fx_agences_par_id($IdAgence);
	if($Type=='pv'){
		$TabCom=$Agence->fx_trouve_plage($IdAgence,$Montant,$devise);
	}elseif($Type=='dt'){
		$GroupeDest=$Agence->fx_trouve_groupe_agence($IdAgenceDest);
		$TabCom=$Agence->fx_trouve_plage_Groupe_Aff($IdGroupeProv,$GroupeDest,$Montant,$devise);
		}
	$reponseSQL = $TabCom;
//$enregistrement=mysql_fetch_array($reponseSQL);

if (!$TabCom){
	echo 0;
}else{
	
//Création du Document JSON
$debut = true;
$nbColonnes=1;

/*while ($row = $TabCom->fetch()) {
	
		echo $row['commission'];
	}*/
//////////////////////////////////////////////
$debut = true;
$nbColonnes=4;

echo "{\"coment\":[";
	while ($row = $TabCom->fetch()) {
		if ($debut){
				echo "{";
				$debut = false;
			} else {
				echo ",{";
			}
			for($j=0;$j<$nbColonnes;$j++){
			if ($j==0)$colonne='IdPlage';
			if ($j==1)$colonne='Pourcentage';
			if ($j==2)$colonne='TypePlage';
			if ($j==3)$colonne='CodedeviseCommiss';

			echo "\"".$colonne."\":\"". utf8_encode($row[$colonne])."\"";
			if ($j != $nbColonnes-1) echo ",";
		} // Fin de la boucle for
		echo "}";
	} // Fin de la boucle while
 // Fin de la boucle if
echo "]}";
//
}

/*}else{
	echo 0;
}*/




?>
