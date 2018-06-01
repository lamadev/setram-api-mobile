<?php
include_once ("codes/classes/ClasseAgent.php");

								$ModAgent=new Agent();
								$resultate=$ModAgent->fx_Changer_EtatAgent($_GET["idAgt"],$_GET["etat"]);
														
		
								header("location: ListeAgent.php");
							    //while($data=$resultats->fetch()){
							
?>	