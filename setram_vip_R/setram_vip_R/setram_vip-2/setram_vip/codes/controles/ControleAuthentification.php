<?php
session_start();
include("codes/classes/ClasseAgent.php");

			  	   
if(isset($_POST["Envoyer"])) {
	
	
	$formulaire_value=true;
	
		  if($_POST["LOGIN"]==""){
		        $formulaire_value=false;
                $msgeMail="le champ e-mail vide";
			}
		if($_POST["password"]==""){
			     $formulaire_value=false;
			     $msgmotdepasse="le champ mot de passe est  vide";
			}	
			
			
			if  ($formulaire_value==true){

						  $inscript=new Agent();
						  $resultat=$inscript->fx_Authentification($_POST["LOGIN"],$_POST["password"]);
						  //echo $_POST["LOGIN"];
						  if($resultat){
							  
						  		while($data=$resultat->fetch()){
						       
											 $_SESSION['NomAg']=$data['NomAg'];
											 $_SESSION['postnomAg']=$data['PostnomAg'];
											 $_SESSION['prenomAg']=$data['PrenomAg'];
											 $_SESSION['niveau']=$data['CodeTypeAgent'];
											 $_SESSION['idagent']=$data['IdAgent'];
											 $_SESSION['Login']=$data['Login'];
							
											 $_SESSION['adresseIP']=$_SERVER['REMOTE_ADDR'];
											 echo $_SESSION['niveau'];
											//exit();
								   }
								   
							   if(($_SESSION['niveau']=='Superviseur')or($_SESSION['niveau']=='Operateur')or($_SESSION['niveau']=='Gerant')){  
									   $resAgence=$inscript->fx_ListGenAgent_Agence($_SESSION['idagent']);
									  
									   if($resAgence){
											while($data=$resAgence->fetch()){
												$_SESSION['IdAgence']=$data['IdAgence'];
												$_SESSION['NomAgence']=$data['NomAgence']; 
											}
											
											header("location:index.php");
									   }else{
												unset($_SESSION['idagent']);
												unset($_SESSION['niveau']);
												unset($_SESSION['adresseIP']);
												
												unset($_SESSION['Nom']);
												unset($_SESSION['postnom']);
												unset($_SESSION['prenom']);
												$Sanction="Agence hors service";
											//header("Location: Authentification.php");
										   }
									}elseif($_SESSION['niveau']=='Admin'){
										$resAgence=$inscript->fx_ListGenAgent_Agence($_SESSION['idagent']);
										//$resAgence=$inscript->fx_Agence_de_Agent($data['IdAgent']);
									  //exit();
									   if($resAgence){
											while($data=$resAgence->fetch()){
												$_SESSION['IdAgence']=$data['IdAgence'];
												$_SESSION['NomAgence']=$data['NomAgence']; 
											}
											echo $_SESSION['idagent'];
											header("location:admin.php");
									   }else{
												unset($_SESSION['idagent']);
												unset($_SESSION['niveau']);
												unset($_SESSION['adresseIP']);
												
												unset($_SESSION['NomAg']);
												unset($_SESSION['postnomAg']);
												unset($_SESSION['prenomAg']);
												$Sanction="Agence hors service";
											//header("Location: Authentification.php");
										   }
										   
										  }
								  }else{
								  
									  $Sanction="Compte ou Mot de passe incorrect";
									  echo "Kani";
								  }
						  
				}else{
									  
				  echo "Vde";
			  }
}
//prenD=time();

//echo $_SESSION['idagent'];

?>
