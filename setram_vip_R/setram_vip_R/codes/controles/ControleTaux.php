<?php
include ("codes/classes/ClasseAgence.php");

		$recherche=new agence();
		$TabTaux=$recherche->fx_AfficheTauxAgence($_GET['idagence']);
		
		if($TabTaux){
			while($data=$TabTaux->fetch()){
					if($data['CodeMonnaie']=='Kz'){
						$KzTaux=$data['Taux'];
						$IdAgence=$data['IdAgence'];
					}
					if($data['CodeMonnaie']=='USD'){
						$Taux=$data['Taux'];
						$IdAgence=$data['IdAgence'];
					}
					if($data['CodeMonnaie']=='CDF'){
						$CTaux=$data['Taux'];
						$IdAgence=$data['IdAgence'];
					}
				}
		}
		if(isset($_POST['ChangeTaux'])){
			$formulaire_value=true;
			if($_POST["Kztaux"]==""){
				$formulaire_valide=false;
				$msgKz="votre champ Taux est vide";
			}
			if($_POST["taux"]==""){
				$formulaire_valide=false;
				$msgTaux="votre champ Taux est vide";
			}
			if($_POST["CDtaux"]==""){
				$formulaire_valide=false;
				$msgTaux="votre champ Taux CDF est vide";
			}
			
			if($formulaire_value==true){	
				$Resultat=$recherche->fx_ModifTaux('Kz', $_POST["Kztaux"], $_GET['idagence']);
				$Resultat=$recherche->fx_ModifTaux('USD', $_POST["taux"], $_GET['idagence']);
				$Resultat=$recherche->fx_ModifTaux('CDF', $_POST["CDtaux"], $_GET['idagence']);
									  //fx_ModifTaux($CodeDevise, $Taux, $IdAgence)
				//if($Resultat){
					header('Location: listeagence.php');
				//}
			}
		}
				
?>	