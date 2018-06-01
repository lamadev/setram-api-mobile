<?php
include ("codes/classes/ClasseAgence.php");
include ("codes/classes/ClassePlage.php");

	$recherche=new agence();
	$resultat=$recherche->fx_ListeAgences();

	$rechercheTarif=new plages();
	$Result_Tarif=$rechercheTarif->fx_AfficheTarification();
								
						      
								
?>	