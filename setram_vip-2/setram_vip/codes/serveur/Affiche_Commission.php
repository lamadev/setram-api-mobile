<?php //session_start();?>
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
	include_once('../classes/ClassePlage.php');
	//$Format_DateComent = 'd/m/y à H:i';
	
		
	if(isset($_REQUEST['Montant'])) $Montant=$_REQUEST['Montant'];
	else $Montant="inconnu";
	
	if(isset($_REQUEST['devise'])) $devise=$_REQUEST['devise'];
	else $devise="inconnu";
	
	$Plage=new plages();
	$TabCom=$Plage->fx_trouve_plage($Montant,$devise);
	
	$reponseSQL = $TabCom;
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
$nbColonnes=5;

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
			if ($j==1)$colonne='MonntantPlage';
			if ($j==2)$colonne='TypePlage';
			if ($j==3)$colonne='Libmonnaie';
			if ($j==4)$colonne='IdFrais';

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
