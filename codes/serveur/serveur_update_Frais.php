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
	
	include_once("../classes/ClasseReporting.php");
	$Format_DateComent = 'd/m/y à H:i';
	
	/*if(isset($_REQUEST['CodeOp'])) $CodeOp=$_REQUEST['CodeOp'];
	else $CodeOp="";*/

		  $RecheContact= new reporting();
		  $TypeCompte=$RecheContact->fx_ListFrais(); 
			
		   if (!$TypeCompte){
				echo "200";
			}else{
				   //Création du Document JSON
					$debut = true;
					$nbColonnes=8;
					echo "{\"UpFrais\":[";
					//echo "{\"User_id\":[";
					//echo "";
					while ($row = $TypeCompte->fetch()) {
						
						///////////////////////////////////////////////
						if ($debut){
								echo "{";
								$debut = false;
							} else {
								echo ",{";
							}
							for($j=0;$j<$nbColonnes;$j++){
							if ($j==0)$colonne='IdFrais';
							if ($j==1)$colonne='Montant';
							if ($j==2)$colonne='CodeMonnaie';
							if ($j==3)$colonne='Description';
							if ($j==4)$colonne='EtatFrais';
							if ($j==5)$colonne='Destination';
							if ($j==6)$colonne='CodeTypeTransact';
							if ($j==7)$colonne='TypeFrais';
							/*$_SESSION['adresseIP']=$_SERVER['REMOTE_ADDR'];*/
				
							echo "\"".$colonne."\":\"". $row[$colonne]."\"";
							if ($j != $nbColonnes-1) echo ",";
						} // Fin de la boucle for
						echo "}";
					} // Fin de la boucle while
				 // Fin de la boucle if
				echo "]}";	
			
		   }
/////////////////////////////////////	

?>