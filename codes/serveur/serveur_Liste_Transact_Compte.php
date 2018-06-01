<?php session_start();?>
<?php 
	//indique que le type de la réponse renvoyée sera du texte
	header("Content-Type: text/html ; charset=utf-8");
	// Anticache pour HTTP/1.1
	header("Cache-Control: no-cache , private");
	// Anticache pour HTTP/1.0
	header("Pragma: no-cache");
	//simulation du temps d'attente du serveur (2 secondes)
	//sleep(2);
	
	include_once("../classes/ClasseTransaction.php");
	$Format_DateComent = 'd/m/y à H:i';
	
	if(isset($_REQUEST['IdCompte'])) $IdCompte=$_REQUEST['IdCompte'];
	else $IdCompte="";
	if($IdCompte!=""){
		  $RecheTransact= new transaction();
		  $ListeTransact=$RecheTransact->fx_Transaction_Compte($IdCompte); 
			
		   if (!$ListeTransact){
				echo "200";
			}else{
				   //Création du Document JSON
					$debut = true;
					$nbColonnes=9;
					echo "{\"Transac\":[";
					//echo "{\"User_id\":[";
					//echo "";
					while ($row = $ListeTransact->fetch()) {
						
						///////////////////////////////////////////////
						if ($debut){
								echo "{";
								$debut = false;
							} else {
								echo ",{";
							}
							for($j=0;$j<$nbColonnes;$j++){
							if ($j==0)$colonne='IdTransact';
							if ($j==1)$colonne='MontantTransact';
							if ($j==2)$colonne='CodeMonnaie';
							if ($j==3)$colonne='Sens';
							if ($j==4)$colonne='MoyenTransact';
							if ($j==5)$colonne='CodeTypeTransact';
							if ($j==6)$colonne='IdCompte';
							if ($j==7)$colonne='DateTransact';
							if ($j==8)$colonne='EtatTransact';
							/*$_SESSION['adresseIP']=$_SERVER['REMOTE_ADDR'];*/
				
							echo "\"".$colonne."\":\"". $row[$colonne]."\"";
							if ($j != $nbColonnes-1) echo ",";
						} // Fin de la boucle for
						echo "}";
					} // Fin de la boucle while
				 // Fin de la boucle if
				echo "]}";	
			
		   }
	}else{
		echo '200';
		}
/////////////////////////////////////	

?>