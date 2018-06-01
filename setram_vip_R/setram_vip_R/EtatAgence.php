<?php
include_once ("codes/classes/ClasseAgence.php");

								$ModAgent=new Agence();
								$resultate=$ModAgent->fx_ChangerEtatAgence($_GET["idAgt"],$_GET["etat"]);
														
		
								header("location: ListeAgence.php");
							    //while($data=$resultats->fetch()){
							
?>	