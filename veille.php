<?php
//include("codes/classes/Classeconnexion.php");
include_once("codes/classes/ClasseAgence.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<?php
if (isset($_GET["pretat"])){
					
					$recup=$_GET["pretat"];
					 $util= new agence();
					 echo $recup;
					if($recup=="veille"){ 
						 $resultat=$util->fx_mettreAgenceEnVeille();
					}if($recup=="reveille"){
						 $resultat=$util->fx_ReveilAgence();
					}
					
				    if ($resultat){
						header("Location:ListeAgence.php"); 					
						 
					 }else{
					   header("Location:ListeAgence.php"); 
					  }
				        
		                
						 			 					 
									
							
						
			}
						

?>
</body>
</html>
