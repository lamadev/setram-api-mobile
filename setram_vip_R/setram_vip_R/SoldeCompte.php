<?php
session_start();
// controle de l'interface de la recherch
include("codes/classes/ClasseCompte.php");
            
             $formulaire_valude=true;
				  if ($_GET["compte"]==""){
					   $formulaire_valude=false;
					   $MsgNumCompte="* saisissez le numero de Compte";
				  }else{
				  	$inscript= new Compte();
		           $resultat=$inscript->fx_RechecheCompte($_GET["compte"]);
					  if ($resultat){
					  	 while ($data = $resultat->fetch()) {
							$_SESSION['IdCompte']=$data['IdCompte'];
							$_SESSION['NumCompte']=$data['NumCompte'];
							$_SESSION['Solde']=$data['Solde'];
							$_SESSION['CodeMonnaie']=$data['CodeMonnaie'];
							$_SESSION['Libmonnaie']=$data['Libmonnaie'];
							$_SESSION['LibTypeCompte']=$data['CodeTypeCompte'];
							$_SESSION['Nom']=$data['Nom'];
							$_SESSION['Postnom']=$data['Postnom'];
							$_SESSION['	Prenom']=$data['Prenom'];
							$_SESSION['Phone']=$data['Phone'];
							$_SESSION['IdAgence']=$data['IdAgence'];

							$_SESSION['messagesolde']="Le solde de votre compte est de"." "." "."<span style='color:#f14444; font-weight:700;'>".$_SESSION['CodeMonnaie']." ".$_SESSION['Solde'].'</span>';
							header("location:VerifierSolde.php");
						}
						//header("location:Depot_Mount.php");	
						echo"reussi";
						
				      }else{
						echo"non reussi";
				 	  }

				  }

				   
				

?>
