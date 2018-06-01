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
	include_once('../classes/ClasseCompte.php');
	//$Format_DateComent = 'd/m/y à H:i';
	
		
	if(isset($_REQUEST['CompteBenef'])) $CompteBenef=$_REQUEST['CompteBenef'];
	else $CompteBenef="inconnu";
	
	
	$Compte=new Compte();
	$TabCom=$Compte->fx_RechecheCompte($CompteBenef);
	
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
$nbColonnes=6;

echo "{\"coment\":[";
	while ($row = $TabCom->fetch()) {
		if ($debut){
				echo "{";
				$debut = false;
			} else {
				echo ",{";
			}
			for($j=0;$j<$nbColonnes;$j++){
			if ($j==0)$colonne='IdCompte';
			if ($j==1)$colonne='NumCompte';
			if ($j==2)$colonne='Nom';
			if ($j==3)$colonne='Postnom';
			if ($j==4)$colonne='Prenom';
			if ($j==5)$colonne='Solde';

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
