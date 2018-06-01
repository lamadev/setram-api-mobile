<?php
include_once ("classeConnexion.php");
class reporting{
	
      		function fx_ListMonnaie(){
							  $requete="SELECT * FROM monnaie where EtatMonnaie=1";
							  //echo $requete; 
							  $conn=new connect();// preperation de la conexion
							  $resultat=$conn-> fx_lecture($requete);
									if ($resultat){
													
										return $resultat;
									}
								   else{
										 return false;
									}
					 
				  
					}
			function fx_ListTypeCompte(){
							  $requete="SELECT * FROM typecompte where EtatTypeCompte=1";
							  //echo $requete; 
							  $conn=new connect();// preperation de la conexion
							  $resultat=$conn-> fx_lecture($requete);
									if ($resultat){
													
										return $resultat;
									}
								   else{
										 return false;
									}
					 
				  
					}
			function fx_ListTypePiece(){
							  $requete="SELECT * FROM typepieceid";
							  //echo $requete; 
							  $conn=new connect();// preperation de la conexion
							  $resultat=$conn-> fx_lecture($requete);
									if ($resultat){
													
										return $resultat;
									}
								   else{
										 return false;
									}
					 
				  
					}
			function fx_ListPays(){
							  $requete="SELECT * FROM pays";
							  //echo $requete; 
							  $conn=new connect();// preperation de la conexion
							  $resultat=$conn-> fx_lecture($requete);
									if ($resultat){
													
										return $resultat;
									}
								   else{
										 return false;
									}
					 
				  
					}
					
			function fx_ListProvince(){
							  $requete="SELECT * FROM province";
							  //echo $requete; 
							  $conn=new connect();// preperation de la conexion
							  $resultat=$conn-> fx_lecture($requete);
									if ($resultat){
										return $resultat;
									}
								   else{
										 return false;
									}
					 
				  
					}

			
			function fx_ListFrais(){
							  $requete="SELECT * FROM frais where EtatFrais=1";
							  //echo $requete; 
							  $conn=new connect();// preperation de la conexion
							  $resultat=$conn-> fx_lecture($requete);
									if ($resultat){
										return $resultat;
									}
								   else{
										 return false;
									}
					 
				  
					}
			function fx_ListPlage(){
							  $requete="SELECT * FROM plage where EtatPlage=1";
							  //echo $requete; 
							  $conn=new connect();// preperation de la conexion
							  $resultat=$conn-> fx_lecture($requete);
									if ($resultat){
										return $resultat;
									}
								   else{
										 return false;
									}
					 
				  
					}

			} 
			
			
?>