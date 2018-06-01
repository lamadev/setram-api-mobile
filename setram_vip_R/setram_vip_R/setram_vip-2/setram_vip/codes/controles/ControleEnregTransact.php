<?php
//session_start();
					
include_once("codes/classes/ClasseCompte.php");
include_once("codes/classes/ClasseTransaction.php");
if (isset($_POST["Envoyer"])){
            echo $_POST["Mount"];
             $formulaire_valude=true;
				  if ($_POST["Mount"]==""){
					   $formulaire_valude=false;
					   $msgMontDepot="saisir le montant à deposer";
				  }
			if ($formulaire_valude==true){
				$inscript= new Compte();
		        $resultat=$inscript->fx_RechecheCompte($_SESSION['NumCompte']);
					if ($resultat){
					  	while ($data = $resultat->fetch()) {
							$Solde=$data['Solde'];
						}
					}
						  $inscript=new transaction();
			              $resultat=$inscript->fx_creertransaction($_POST['Mount'],$_SESSION['CodeMonnaie'],"E","web","Depot",$_SESSION['IdCompte'],"","");

			              $Result_Effect=$inscript->fx_InsererEffectuer($_SESSION['idagent'],$resultat,$_SESSION['IdAgence']);
						  if ($Result_Effect){
							  $sommes=$Solde+$_POST["Mount"];
							  $inscript=new Compte();
			                  $resultat=$inscript->fx_ModiferSolde_Compte($_SESSION['NumCompte'],$sommes,$_SESSION['CodeMonnaie']);
			                  $_SESSION['messageconfirm']="Depot effectué avec succès";
								header("location:Validation.php");
								
						      }else{
								echo"non reussi";
						 	  }
					
					
			}


				  
				  

}

?>
