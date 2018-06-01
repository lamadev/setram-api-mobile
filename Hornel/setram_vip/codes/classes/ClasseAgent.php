<?php
include ("ClasseConnexion.php");
class Agent {
                  private $IdAgent;
				  private $NomAg;
				  private $PostnomAg;
				  private $PrenomAg;
				  private $SexeAg;
				  private $PhoneAg;
				  private $Login;
				  private $Mdp;
				  private $CodeTypeAgent;
				  private $EtatAg;
				  //creation des attributs
				  function fx_creerAgent($NomAg,$PostnomAg,$PrenomAg,$SexeAg,$PhoneAg,$Login,$Mdp,$CodeTypeAgent,$EtatAg){
						  	  $this->Nom=$NomAg;
							  $this->Postnom=$PostnomAg; 
							  $this->Prenom=$PrenomAg;
							  $this->Sexe=$SexeAg;
							  $this->Phone=$PhoneAg; 
							  $this->login=$Login;
							  $this->mdp=$Mdp; 
							  $this->CodeTypeAg=$CodeTypeAgent;
                              $this->etatAg=$EtatAg;
                              //affectation
					          $requete='INSERT INTO agent (NomAg, PostnomAg, PrenomAg, SexeAg, PhoneAg, Login, Mdp, CodeTypeAgent, EtatAg) VALUES ("'.$this->Nom.'", "'.$this->Postnom.'", "'.$this->Prenom.'", "'.$this->Sexe.'", "'.$this->Phone.'", "'.$this->login.'","'.$this->mdp.'","'.$this->CodeTypeAg.'", "'.$this->etatAg.'")';
								 $conn=new connect();// preperation de la conexion
								 $resultat=$conn -> fx_ecriture($requete);// execution de la requete
						  }
				////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

				  function fx_Trouver_Mdp($Login) {
							$this->Login=$Login;
							$requete = "select * from agent where Login='".$this->Login."' AND EtatAg=1";
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

		    	  function fx_Authentification($Login, $Mdp) {
								$this->Login=$Login;
								$this->Mdp=$Mdp; 
								if (empty($Login)) {
								return FALSE ;} // Pas de mot de passe vide
								$interne = $this->fx_Trouver_Mdp($Login) ; // On récupère l'ancien
								if ($interne){//si l'on a trouvé le mdp cherché
								$crypt = crypt($mdp, $interne) ; // On crypte le nouveau
								if ($interne == $crypt){
								$requete = "select * from agent where Login='".$this->Login."' AND EtatAg=1";
								$requete=sprintf($requete,$Login);
								echo $requete;
								$conn=new connect();
								$Resultat=$conn->fx_lecture($requete);
								if ($Resultat){
									//echo "Trouve ici";
									return $Resultat;
									
								}
								else{
									//echo "Trouve Pas";
									return false;
									}
								}	
							
							}else{
								
								return false;
							} 
			  
			         }
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			       /*
			       function fx_changer_mdp($IdAgent,$Mdp){
			       	            
								$Motdepasse=crypt($Mdp);//cryptage du mot de passe
								$requete="UPDATE agent set Mdp='".$Mdp."' where agent.IdAgent =".$IdAgent." LIMIT 1";
								$requete=sprintf($requete,$Motdepasse,$IdAgent);
								
								$conn=new connect();// preperation de la conexion
								$Resultat=$conn-> fx_modifier($requete);
								
								if ($Resultat){
									if ($Resultat>0){
										return true;
									}else{return false;}
								}else{
										echo 'sa cal';
										return false;
								}
							}*/

			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

				  function fx_ModiferAgent($IdAgent,$NomAg,$PostnomAg,$PrenomAg,$SexeAg,$PhoneAg,$Login,$CodeTypeAgent,$EtatAg){
				  	          $this->idagent=$IdAgent;
				  	          $this->Nom=$NomAg;
							  $this->Postnom=$PostnomAg; 
							  $this->Prenom=$PrenomAg;
							  $this->Sexe=$SexeAg;
							  $this->Phone=$PhoneAg; 
							  $this->login=$Login;
							  $this->CodeTypeAg=$CodeTypeAgent;
                              $this->etatAg=$EtatAg;

                              $requete="update agent set NomAg='".$this->Nom."',PostnomAg='".$this->Postnom."',PrenomAg='".$this->Prenom."',SexeAg='".$this->Sexe."',PhoneAg='".$this->Phone."',Login='".$this->login."',CodeTypeAgent='".$this->CodeTypeAg."',EtatAg='".$this->etatAg."' where IdAgent='".$this->idagent."' limit 1";
							  echo $requete;
							  $conn=new connect();// preperation de la conexion
					 		  $resultat=$conn-> fx_modifier($requete);
				  }
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			      function fx_Changer_Etat_Agent($IdAgent, $EtatAg){
					            $this->EtatAg=$EtatAg;
								$requete="UPDATE agent SET EtatAg='".$this->EtatAg."' WHERE agent.IdAgent ='".$IdAgent."' LIMIT 1";
								echo $requete;
								
								$conn=new connect();// preperation de la conexion
								$Resultat=$conn-> fx_modifier($requete);
							
			     }
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

					function fx_AffecterAgent($IdAgence,$IdAgent,$DateHeur_Save,$EtatAffecter){
                                 $this->idagence=$IdAgence;
                                 $this->idagent=$IdAgent;
                                 $this->DateHeur_Save=$DateHeur_Save;
                                 $this->Etat=$EtatAffecter;
								 $requete='INSERT INTO affecter (IdAgence,IdAgent, DateHeur_Save, EtatAffecter) VALUES ("'.$this->idagence.'", "'.$this->idagent.'",CURRENT_TIMESTAMP,1)';
								 //echo $requete;
								 $conn=new connect();// preperation de la conexion
						         $resultat=$conn -> fx_ecriture($requete);// execution de la requete
								 
				 }		
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
				 
				    function fx_Changer_EtatAffecter($IdAffecter,$EtatAffecter){
				                $this->IdAffecter=$IdAffecter;
				                $this->Etat=$EtatAffecter;
						        $requete="UPDATE affecter SET EtatAffecter='".$this->Etat."' WHERE affecter.IdAffecter = '".$this->IdAffecter."' LIMIT 1";
								//echo $requete;
								$conn=new connect();// preperation de la conexion
								$Resultat=$conn-> fx_modifier($requete);
				
				
			     }
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				  function fx_List_Gen_Agent(){

							$requete="select * from affecter,agent,agence where affecter.IdAgence=agence.IdAgence AND affecter.IdAgent=agent.IdAgent AND affecter.EtatAffecter=1";
			  
								  $conn=new connect();// preperation de la conexion
								  $resultat=$conn-> fx_lecture($requete);
							if ($resultat){		
								return $resultat;
							}else{
								 return false;
							}

				  }
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                  function fx_ListGenAgent_Agence($IdAgence){
				            $requete="select affecter.IdAgent,
				            				 affecter.IdAgence,
				            				 agence.IdAgence,
				            				 agence.NomAgence,
				            				 agent.NomAg, 
				            				 agent.PostnomAg, 
				            				 agent.PrenomAg, 
				            				 agent.SexeAg, 
				            				 agent.PhoneAg,
				            				 agent.CodeTypeAgent, 
				            				 agent.EtatAg,
				            				 typeagent.CodetypeAgent,
				            				 typeagent.LibTypeAgent
				  			from affecter,agence,agent, typeagent
							where agence.IdAgence='".$IdAgence."'
							AND affecter.IdAgence=agence.IdAgence
							AND affecter.IdAgent=agent.IdAgent
							AND agent.CodeTypeAgent=typeagent.CodetypeAgent
							AND affecter.EtatAffecter=1
							AND agence.EtatAgence=1
							order by agent.IdAgent";
  
							  //echo $requete; 
							  $conn=new connect();// preperation de la conexion
							  $resultat=$conn-> fx_lecture($requete);
									if ($resultat){
													
										return $resultat;
									}else{
										 return false;
									}
					}

           


	
}
?>