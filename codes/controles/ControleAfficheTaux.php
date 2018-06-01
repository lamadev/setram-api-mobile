<?php
include ("codes/classes/ClasseAgence.php");

		$recherche=new agence();
		$TabTaux=$recherche->fx_AfficheTauxAgence($_SESSION['IdAgence']);
		
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
				
?>	