<?php
include_once ("ClasseConnexion.php");
class agence{
			private $NomAgence;
			private $AdresseAgence;
			private $PhoneAgence;
			private $EtatAgence;
		
	function fx_CreerAgence($NomAgence,$AdresseAgence,$PhoneAgence,$EtatAgence){
			$this->NOM=$NomAgence;
			$this->ADRESSE=$AdresseAgence;
			$this->PHONE=$PhoneAgence;
			$this->ETAT=$EtatAgence;
		
		$reqt="insert into agence(NomAgence, AdresseAgence, PhoneAgence, EtatAgence) values('".$this->NOM."','".$this->ADRESSE."','".$this->PHONE."',1)";
		//echo $reqt;
		$conn=new Connect();
		$resultat=$conn->fx_ecriture($reqt);
		if($resultat){
			return $resultat;
		}
		else{
			return false;
		}
	
	}


	function fx_modifieragence($IdAgence,$NomAgence, $AdresseAgence, $TelephoneAgence){
			$this->idagence=$IdAgence;
			$this->NOM=$NomAgence;
			$this->ADRESSE=$AdresseAgence;
			$this->PHONE=$TelephoneAgence;
			$rqt="UPDATE agence SET NomAgence='".$this->NOM."', AdresseAgence='".$this->ADRESSE."', PhoneAgence='".$this->PHONE."' where IdAgence='".$this->idagence."'";
			$conn=new Connect();
			$resultat=$conn->fx_modifier($rqt);
	}

	
		function fx_ChangerEtatAgence($IdAgence, $EtatAgence){
				$reqt="update agence set EtatAgence='".$EtatAgence."' where IdAgence='".$IdAgence."'";
				echo $reqt;
				$conn=new Connect();
				$resultat=$conn->fx_modifier($reqt);
		}


		function fx_ComboAgences(){
			$requete="SELECT IdAgence,NomAgence,PhoneAgence,AdresseAgence,EtatAgence FROM agence WHERE EtatAgence=1";
			$conn=new connect();
			$Resultat=$conn -> fx_lecture($requete);
			if ($Resultat){
				return $Resultat;
			}else{
				return false;
			}
		}


		function fx_ListeAgences(){
			$requete="SELECT IdAgence,NomAgence,PhoneAgence,AdresseAgence,EtatAgence FROM agence";
			$conn=new connect();
			$Resultat=$conn -> fx_lecture($requete);
			if ($Resultat){
				return $Resultat;
			}else{
				return false;
			}
		}

		function fx_mettreAgenceEnVeille(){
			$reqt="update agence set EtatAgence=2 where EtatAgence=1";
			echo $reqt;
			$conn=new Connect();
			$resultat=$conn->fx_modifier($reqt);
		}

	function fx_ReveilAgence(){
			$reqt="update agence set EtatAgence=1 where EtatAgence=2";
			echo $reqt;
			$conn=new Connect();
			$resultat=$conn->fx_modifier($reqt);
	}
	
	function fx_AfficheTauxAgence($IdAgence){
				  $requete='select *
				  			from taux
							where taux.IdAgence="'.$IdAgence.'"';
				  $conn=new connect();// preperation de la conexion
				  $resultat=$conn-> fx_lecture($requete);
				 if ($resultat){		
					 return $resultat;	
				} else{
					 return false;
				}
			}
		
		function fx_NouveauTaux($Taux,$CodeMonnaie,$IdAgence){
			$reqt="INSERT INTO taux (Taux, CodeMonnaie, IdAgence) VALUES ('".$Taux."', '".$CodeMonnaie."', '".$IdAgence."')";
			echo $reqt;
			$conn=new Connect();
			$resultat=$conn->fx_ecriture($reqt);
			if($resultat){
				return $resultat;
			}
			else{
				return false;
			}
		}

		function fx_ModifTaux($CodeMonnaie, $Taux, $IdAgence){
				/*$this->Idagence=$Idagence;
				$this->commission=$pourc;*/
				$requete="update taux set Taux='".$Taux."' where IdAgence='".$IdAgence."' AND CodeMonnaie='".$CodeMonnaie."'";
				
				//echo $requete;
				$conn=new connect();// preperation de la conexion
				$resultat=$conn-> fx_modifier($requete);
			}
		
} //End class agence






?>
