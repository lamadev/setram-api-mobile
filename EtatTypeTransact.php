<?php
include_once ("codes/classes/ClasseTransaction.php");

								$ModAgent=new transaction();
								$resultate=$ModAgent->fx_ConfigService($_GET["CodeTypeTrans"],$_GET["etat"]);
														
		
								header("location: ConfigTypetransact.php");
							    //while($data=$resultats->fetch()){
							
?>	