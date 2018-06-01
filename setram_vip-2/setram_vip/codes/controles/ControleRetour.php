<?php
//session_start();
//echo $_SESSION['idagent'];
// Redirige l'utilisateur s'il n'est pas identifié
if(isset($_POST['retour'])){
     // Suppression des sessions
     		unset($_SESSION['IdCompte']);
			unset($_SESSION['NumCompte']);
			unset($_SESSION['LibTypeCompte']);
			
			unset($_SESSION['Solde']);
			unset($_SESSION['Libmonnaie']);
			unset($_SESSION['Postnom']);
			
			unset($_SESSION['Nom']);
			unset($_SESSION['Phone']);

			
     header("Location:index.php");
     
}

?>

