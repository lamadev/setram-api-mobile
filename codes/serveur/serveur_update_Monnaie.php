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
		  $TypeCompte=$RecheContact->fx_ListMonnaie(); 
			
		   if (!$TypeCompte){
				echo "200";
			}else{
				   //Création du Document JSON
					$debut = true;
					$nbColonnes=2;
					echo "{\"Monnaie\":[";
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
							if ($j==0)$colonne='CodeMonnaie';
							if ($j==1)$colonne='Libmonnaie';
							
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