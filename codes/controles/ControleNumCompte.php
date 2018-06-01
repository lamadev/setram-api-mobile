<?php
session_start();
// controle de l'interface de la recherch
include("codes/classes/ClasseCompte.php");
if (isset($_POST["Envoyer"])){
        echo "bonjour x";
            
             $formulaire_valude=true;
				  if ($_POST["NumCompte"]==""){
					   $formulaire_valude=false;
					    
					   $MsgNumCompte="saisissez le numero de Compte";
				  }

				if ($formulaire_valude==true){
				   $inscript= new Compte();
		           $resultat=$inscript->fx_RechecheCompte($_POST["NumCompte"]);
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
							
							header("location:Depot_Mount.php");
						}
						$MsgNumCompte="Ce numero de compte est bloqué";	
						echo"reussi";
						
				      }else{
						echo"non reussi";
				 	  }
				}
				
				  

}

?>
