<?php
include_once ("ClasseConnexion.php");
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
				  function fx_creerCompte($CodeMonnaie,$CodeTypeCompte,$IdClient,$IdAgence,$NumCompte){
				  	       
				  	       $this->CodeMonnaie=$CodeMonnaie;
				  	       $this->codetypecompte=$CodeTypeCompte;
				  	       $this->IdClient=$IdClient;
				  	       $this->IdAgence=$IdAgence;
				  	       //affectation
					          $requete='INSERT INTO compteb (NumCompte, Solde, CodeMonnaie ,CodeTypeCompte, IdClient,IdAgence, DateHeurCree, EtatCompteB) VALUES ("'.$NumCompte.'","0", "'.$this->CodeMonnaie.'","'.$this->codetypecompte.'" , "'.$this->IdClient.'", "'.$this->IdAgence.'",CURRENT_TIMESTAMP,1)';
								//echo $requete;
							  $conn=new connect();// preperation de la conexion
		                        $resultat=$conn->fx_ecriture($requete);// execution de la requete
		                        if ($resultat){
		                        return $resultat;
		                         }
		                        else{
		                        return false;
		                        }
								

				  }
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

				  function fx_ModiferCompte($IdCompte,$CodeTypeCompte){
                               
					  	       $this->idcompte=$IdCompte;
					  	       $this->CodeTypeCompte=$CodeTypeCompte;
				  	           $requete="update compteb set CodeTypeCompte='".$this->CodeTypeCompte."' where compteb.IdCompte='".$this->idcompte."' limit 1";
				               echo $requete;
				               $conn=new connect();// preperation de la conexion (extentier)
		                       $resultat=$conn-> fx_modifier($requete);

				  }
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

				  function fx_ModiferSolde_Compte($IdCompte,$Montant,$Sens){
                               
					  	       $this->idcompte=$IdCompte;
							   if($Sens=="E"){
								   $signe="+";
							    }elseif($Sens=="S"){
									$signe="-";
									}
				  	           $requete="update compteb set Solde=Solde".$signe.$Montant." where compteb.IdCompte=".$this->idcompte." limit 1";
				               //echo $requete;
				               $conn=new connect();// preperation de la conexion (extentier)
		                       $resultat=$conn-> fx_modifier($requete);

				  }
				  function fx_Check_Solde($IdCompte){
                               
					  	       $this->idcompte=$IdCompte;
							   $Solde=0;
				  	           $requete="Select Solde from compteb where compteb.IdCompte=".$this->idcompte;
				               //echo $requete;
				               $conn=new connect();
							   $Resultat=$conn->fx_lecture($requete);
								if ($Resultat){
									while ($row= $Resultat->fetch()) {
										$Solde=$row['Solde'];
										}
										return $Solde;
								}
								else{
									return false;
								}

				  }
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				  
				  function fx_Changer_Etat_Compte($IdCompte, $EtatCompteB){
					            $this->EtatCompte=$EtatCompteB;
								$requete="UPDATE compteb SET EtatCompteB='".$this->EtatCompte."' WHERE compteb.IdCompte ='".$IdCompte."' LIMIT 1";
								//echo $requete;
								$conn=new connect();// preperation de la conexion
		                        $resultat=$conn->fx_ecriture($requete);// execution de la requete
		                        if ($resultat){
		                        return $resultat;
		                         }
		                        else{
		                        return false;
		                        }
			}
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				  
				  function fx_SuspensionCompte($IdCompte, $EtatCompteB){
					            $this->EtatCompte=$EtatCompteB;
								$requete="UPDATE compteb SET EtatCompteB='".$this->EtatCompte."' WHERE compteb.IdCompte ='".$IdCompte."' LIMIT 1";
								echo $requete;
								
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
		                        $resultat=$conn->fx_ecriture($requete);// execution de la requete
		                        if ($resultat){
		                        return $resultat;
		                         }
		                        else{
		                        return false;
		                        }

				  }
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				  function fx_RechecheCompteCli($NumCompte) {
							$requete = "select compteb.IdCompte,monnaie.Minim,compteb.NumCompte,compteb.Solde, compteb.CodeMonnaie,compteb.CodeTypeCompte,compteb.IdClient,compteb.IdAgence, compteb.DateHeurCree, compteb.EtatCompteB, client.IdClient, client.Nom,client.Postnom,client.Prenom,client.Sexe,client.DateNaiss,client.Phone,client.IdPiece, agence.NomAgence
							            from compteb,client,agence,monnaie 
										where NumCompte='".$NumCompte."' 
										AND client.IdClient=compteb.IdClient 
										AND compteb.IdAgence=agence.IdAgence";
							//echo $requete;
							$conn=new connect();
							$Resultat=$conn->fx_lecture($requete);
							if (!$Resultat){
								return false;
							}
							else{
								return $Resultat;
							}
						}
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				  function fx_RechecheCompte($NumCompte) {
							$requete = "select compteb.IdCompte,monnaie.Minim,compteb.NumCompte,compteb.Solde, compteb.CodeMonnaie,compteb.CodeTypeCompte,compteb.IdClient,compteb.IdAgence, compteb.DateHeurCree, compteb.EtatCompteB, client.IdClient, client.Nom,client.Postnom,client.Prenom,client.Sexe,client.DateNaiss,client.Phone,client.IdPiece, agence.NomAgence
							            from compteb,client,agence,monnaie 
										where NumCompte='".$NumCompte."' 
										AND client.IdClient=compteb.IdClient 
										AND compteb.IdAgence=agence.IdAgence
										AND EtatCompteB=1";
							//echo $requete;
							$conn=new connect();
							$Resultat=$conn->fx_lecture($requete);
							if (!$Resultat){
								return false;
							}
							else{
								return $Resultat;
							}
						}
				function fx_RechecheCompte_Setram($CodeMonnaie,$CodeTypeCompte) {
							$requete = "select * from compteb where compteb.CodeMonnaie='".$CodeMonnaie."' AND compteb.CodeTypeCompte='".$CodeTypeCompte."' AND EtatCompteB=1";
							//echo $requete;
							$conn=new connect();
							$Resultat=$conn->fx_lecture($requete);
							if (!$Resultat){
								return false;
							}
							else{
								return $Resultat;
							}
						}
			
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
						function fx_changer_PIN($IdCompte,$PIN){
								$this->pin=$PIN;
								$PINcrip=crypt($PIN);//cryptage du mot de passe
								$requete="UPDATE securite set PIN='".$this->pin."' where securite.IdCompte ='".$IdCompte."' LIMIT 1";
								$requete=sprintf($requete,$PINcrip,$IdSecurite);
								
								$conn=new connect();// preperation de la conexion
								$Resultat=$conn-> fx_modifier($requete);
							}
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

						function fx_VerifierSolde_Compte($NumCompte){

								$requete="select * from compteb,monnaie where compteb.NumCompte='".$NumCompte."' AND monnaie.CodeMonnaie=compteb.CodeMonnaie";
								echo $requete; 
								$conn=new connect();// preperation de la conexion
								$resultat=$conn-> fx_lecture($requete);
								if ($resultat){
									while($data=$ResultTransf->fetch()){
										$Retirer=$data['Retirer'];
										}
									if($Retirer==0){
										return 0;
										}
									else{
										return 1;
										}
								}
								 else{
									 return false;
									}
								}

			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

						function fx_Gestion_Compte(){

								$requete="select * from compteb,monnaie where  monnaie.CodeMonnaie=compteb.CodeMonnaie";
								echo $requete; 
								$conn=new connect();// preperation de la conexion
								$resultat=$conn-> fx_lecture($requete);
								if ($resultat){
									while($data=$ResultTransf->fetch()){
										$Retirer=$data['Retirer'];
										}
									if($Retirer==0){
										return 0;
										}
									else{
										return 1;
										}
								}
								 else{
									 return false;
									}
								}



	
}
?>