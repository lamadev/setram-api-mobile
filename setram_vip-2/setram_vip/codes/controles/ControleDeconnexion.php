<?php
//session_start();
//echo $_SESSION['idagent'];
// Redirige l'utilisateur s'il n'est pas identifié
if(isset($_POST['Deconnexion'])){
     // Suppression des sessions
     		unset($_SESSION['idagent']);
			unset($_SESSION['niveau']);
			unset($_SESSION['adresseIP']);
			
			unset($_SESSION['NomAg']);
			unset($_SESSION['postnomAg']);
			unset($_SESSION['prenomAg']);
			
			unset($_SESSION['IdAgence']);
			unset($_SESSION['NomAgence']);

			
     header("Location:Authentification.php");
     
}

?>

