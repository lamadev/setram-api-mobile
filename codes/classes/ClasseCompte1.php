<?php
include ("classeConnexion.php");
class Compte {
                  private $IdCompte;
				  private $NumCompte;
				  private $Solde;
				  private $CodeMonnaie;
				  private $CodeTypeCompte;
				  private $IdClient;
				  private $IdAgence;
				  private $DateHeurCree;
				  private $EtatCompteB;
				  //creation des attributs
				  function fx_creerCompte($NumCompte,$Solde,$CodeMonnaie,$CodeTypeCompte,$IdClient,$IdAgence,$DateHeurCree,$EtatCompteB){
				  	       $this->NumCompte=$NumCompte;
				  	       $this->Solde=$Solde;
				  	       $this->CodeMonnaie=$CodeMonnaie;
				  	       $this->codetypecompte=$CodeTypeCompte;
				  	       $this->IdClient=$IdClient;
				  	       $this->IdAgence=$IdAgence;
				  	       $this->DateHeurCree=$DateHeurCree;
				  	       $this->EtatCompteB=$EtatCompteB;
				  	       //affectation
					          $requete='INSERT INTO compteb (NumCompte,Solde,CodeMonnaie,CodeTypeCompte,IdClient,IdAgence,DateHeurCree,EtatCompteB) VALUES ("'.$this->NumCompte.'", "'.$this->Solde.'", "'.$this->CodeMonnaie.'","'.$this->codetypecompte.'" , "'.$this->IdClient.'", "'.$this->IdAgence.'",CURRENT_TIMESTAMP,1)';
	
								 $conn=new connect();// preperation de la conexion
								 $resultat=$conn -> fx_ecriture($requete);// execution de la requete
								

				  }
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

				  function fx_ModiferCompte($IdCompte,$CodeTypeCompte){
                               
					  	       $this->idcompte=$IdCompte;
					  	       $this->EtatCompteB=$EtatCompteB;
				  	           $requete="update compteb set CodeTypeCompte='".$this->CodeTypeCompte."' where compteb.IdCompte='".$this->idcompte."' limit 1";
				               echo $requete;
				               $conn=new connect();// preperation de la conexion (extentier)
		                       $resultat=$conn-> fx_modifier($requete);

				  }
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				  
				  function fx_Changer_Etat_Compte($IdCompte, $EtatCompteB){
					            $this->EtatCompte=$EtatCompteB;
								$requete="UPDATE compteb SET EtatCompteB='".$this->EtatCompte."' WHERE compteb.IdCompte ='".$IdCompte."' LIMIT 1";
								//echo $requete;
								
								$conn=new connect();// preperation de la conexion
								$Resultat=$conn-> fx_modifier($requete);
			}
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				  
				  function fx_SuspensionCompte($IdCompte, $EtatCompteB){
					            $this->EtatCompte=$EtatCompteB;
								$requete="UPDATE compteb SET EtatCompteB='".$this->EtatCompte."' WHERE compteb.IdCompte ='".$IdCompte."' LIMIT 1";
								//echo $requete;
								
								$conn=new connect();// preperation de la conexion
								$Resultat=$conn-> fx_modifier($requete);
			}
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				  function fx_CreerSecurite($Signature,$Photo,$Empreinte,$PIN,$IdCompte){
					  	       $this->Signature=$Signature;
					  	       $this->Photo=$Photo;
					  	       $this->Empreinte=$Empreinte;
					  	       $this->PIN=$PIN;
					  	       $this->IdCompte=$IdCompte;
					  	       $requete='INSERT INTO securite (Signature, Photo, Empreinte, PIN, IdCompte) VALUES ("'.$this->Signature.'", "'.$this->Photo.'", "'.$this->Empreinte.'","'.$this->PIN.'", "'.$this->IdCompte.'")';
								 $conn=new connect();// preperation de la conexion
								 $resultat=$conn -> fx_ecriture($requete);// execution de la requete

				  }
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				  function fx_RechecheCompte($NumCompte,$EtatCompteB) {
							$requete = "select * from compteb,typecompte,monnaie where NumCompte='".$NumCompte."' AND monnaie.CodeMonnaie=compteb.CodeMonnaie AND compteb.CodeTypeCompte=typecompte.CodeTypeCompte AND EtatCompteB=1";
							$requete=sprintf($requete,$Login);
							$conn=new connect();
							$Resultat=$conn->fx_lecture($requete);
							if (!$Resultat){
								return false;
							}
							else{
									while ($row = $Resultat->fetch()) {
										$MdpInterne=$row['Mdp'];
										return $MdpInterne;
									}
							}
						}
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				  function fx_Rechech_Securite($NumCompte) {
							$requete = "select * from securite,compteb,monnaie where compteb.NumCompte='".$NumCompte."' AND monnaie.CodeMonnaie=compteb.CodeMonnaie AND securite.IdCompte=compteb.IdCompte";
							$requete=sprintf($requete,$Login);
							$conn=new connect();
							$Resultat=$conn->fx_lecture($requete);
							if (!$Resultat){
								return false;
							}
							else{
									while ($row = $Resultat->fetch()) {
										$MdpInterne=$row['Mdp'];
										return $MdpInterne;
									}
							}
						}
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						function fx_changer_PIN($IdSecurite,$PIN){
								$this->pin=$PIN;
								$PINcrip=crypt($PIN);//cryptage du mot de passe
								$requete="UPDATE securite set PIN='".$this->pin."' where securite.IdSecurite ='".$IdSecurite."' LIMIT 1";
								$requete=sprintf($requete,$PINcrip,$IdSecurite);
								
								$conn=new connect();// preperation de la conexion
								$Resultat=$conn-> fx_modifier($requete);
							}
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

						function fx_VerifierSolde_Compte($IdCompte){

								$requete="select Solde, CodeMonnaie from compteb where compteb.IdCompte='".$IdCompte;
								//echo $requete; 
								$conn=new connect();// preperation de la conexion
								$resultat=$conn-> fx_lecture($requete);
								if ($resultat){
									while($data=$resultat->fetch()){
										$Solde=$data['Solde'];
										$CodeMonnaie=$data['CodeMonnaie'];
										}
									return $Solde;
								}
								 else{
									 return false;
									}
								}



	
}
?>