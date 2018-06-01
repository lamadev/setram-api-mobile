<?php
include_once("Dossiers_Config.php");
include_once($Dossier_Classes."/ClasseConnexion.php");

class plages{
			private $IdPlage;
			private $BorneInf;
			private $BornSuper;
			private $TypePlage;
			private $MonntantPlage;
			private $CodeMonnaie;
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						function fx_AjouterPlage($BorneInf,$BornSuper,$TypePlage,$MonntantPlage,$CodeMonnaie,$EtatPlage){
										 $this->BorneInf=$BorneInf;
										 $this->BornSuper=$BornSuper;
										 $this->TypePlage=$TypePlage;
										 $this->MonntantPlage=$MonntantPlage;
										 $this->CodeMonnaie=$CodeMonnaie;
										 $this->etatplage=$EtatPlage;
										 //insertion transfert
										 $requete='insert into plage(BorneInf,BornSuper,TypePlage,MonntantPlage,CodeMonnaie,EtatPlage) values("'.$this->BorneInf.'","'.$this->BornSuper.'","'.$this->TypePlage.'","'.$this->MonntantPlage.'","'.$this->CodeMonnaie.'","'.$this->etatplage.'")';
										 
										$conn=new connect();
										$resultat=$conn-> fx_ecriture($requete);
										if($resultat){
										  return $resultat;
										}else{
										return false;
										}
																								  
								 }
	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
						function fx_AfficheTarification(){

				            		$requete="select * from plage,monnaie where plage.CodeMonnaie=monnaie.CodeMonnaie AND plage.EtatPlage=1 order by plage.IdPlage";
										$conn=new connect();
										$resultat=$conn-> fx_lecture($requete);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
						} 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        function fx_ModifierPlage($IdPlage,$BorneInf,$BornSuper,$TypePlage,$MonntantPlage,$CodeMonnaie){

			$reqt="UPDATE plage SET BorneInf='".$BorneInf."', BornSuper='".$BornSuper."', TypePlage='".$TypePlage."', MonntantPlage='".$MonntantPlage."', CodeMonnaie='".$CodeMonnaie."' where IdPlage='".$IdPlage."'";
					echo $reqt;
					$conn=new Connect();
					$resultat=$conn->fx_modifier($reqt);
			}
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function fx_ChangeEtatPlage($IdPlage, $EtatPlage){
			
			$reqt="UPDATE plage SET EtatPlage='".$EtatPlage."' where IdPlage='".$IdPlage."'";
			echo $reqt;
			$conn=new Connect();
			$resultat=$conn->fx_modifier($reqt);
			if($resultat){
				return true;
			}else{
				return false;
				}
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function fx_trouve_plage($Montant,$CodeMonnaie){
			$requete="SELECT * FROM plage WHERE  ((plage.BorneInf<='".$Montant."' And plage.BornSuper>='".$Montant."')or(plage.BorneInf<='".$Montant."' And plage.BornSuper=0)) And plage.CodeMonnaie='".$CodeMonnaie."' And plage.EtatPlage=1";
			//echo $requete;	
			$conn=new connect();// preperation de la conexion
			$Resultat=$conn -> fx_lecture($requete);// execution de la requete
			if ($Resultat){
				return $Resultat;
			}else{
				return false;
			}
		}
	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function fx_Trouve_plage_Id($IdPlage){
					
		$requete="SELECT * FROM plage WHERE plage.IdPlage ='".$IdPlage."' AND plage.EtatPlage=1";
			//echo $requete;	
			//echo $requete;	
		$conn=new connect();// preperation de la conexion
		$Resultat=$conn -> fx_lecture($requete);// execution de la requete
		if ($Resultat){
			return $Resultat;
		}else{
			return false;
		}
	}
}

?>