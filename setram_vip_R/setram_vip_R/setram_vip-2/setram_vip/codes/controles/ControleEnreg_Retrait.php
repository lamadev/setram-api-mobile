<?php
//session_start();
// controle de l'interface de la recherch
//$Combo=new Operation();
					
//$TabAgence=$Combo->fx_rechercheAgence();
include_once("codes/classes/ClasseCompte.php");
include_once("codes/classes/ClasseTransaction.php");

if (isset($_POST["Valider"])){

             $formulaire_valude=true;
				  if ($_POST["Mount"]==""){
					   $formulaire_valude=false;
					   $msgMontRetrait="saisir le montant à retirer";
				  }
				  if ($formulaire_valude==true){
				   $inscript= new Compte();
		           $resultat=$inscript->fx_RechecheCompte($_SESSION['NumCompte']);
					  if ($resultat){
					  	 while ($data = $resultat->fetch()) {
							$Solde=$data['Solde'];
							$Minim=$data['Minim'];
						}
                   }
                 

                  $Monfin=$Solde-$Minim;
                          
				  if ($Monfin >= $_POST["Mount"]){
	                $inscript=new transaction();
		            $resultat=$inscript->fx_creertransaction($_POST['Mount'],$_SESSION['CodeMonnaie'],"S","web","Retrait",$_SESSION['IdCompte'],"","");

		            $Result_Effect=$inscript->fx_InsererEffectuer($_SESSION['idagent'],$resultat,$_SESSION['IdAgence']);
				  	if ($Result_Effect){
					  $sommes=$Solde-$_POST["Mount"];
					  //echo $sommes;
					  $inscript=new Compte();
	                  $resultat=$inscript->fx_ModiferSolde_Compte($_SESSION['NumCompte'],$sommes,$_SESSION['CodeMonnaie']);
	                  	$_SESSION['messageconfirm']="Retrait effectué avec succès";
						header("location:Validation.php");	
						//echo"reussi";
						
				      }else{
						echo"non reussi";
				 	  }

			}else{
				//echo "Montant restant insuffissant";
				$_SESSION['messageconfirm']="Votre solde est insuffisant pour cette opération";
				header("location:infosRetrait.php");
			}
		}
}

?>