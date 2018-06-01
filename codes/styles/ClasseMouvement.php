<?php
include_once ("codes/classes/ClasseConnexion.php");
class Mouvement{
                  private $idmouv;
				  private $datemouv;
				  private $montant;
				  private $etatmouv;
				  private $type;
				  private $sens;
				  private $codedevise;
				  private $idcommission;
				  private $idagence;
				  private $idagent;
				 
				 
				  //creation de la fonction Créer Categorie
				  
				  function fx_EnregistrerMouvement($montant,$etatmouv,$type,$sens,$codedevise,$idagence,$idagent){   

					  $this->Montant=$montant;
					  $this->EtatMouv=$etatmouv;
					  $this->Type=$type;
					  $this->Sens=$sens;
					  $this->CodeDevise=$codedevise;
					  //$this->IdCommission=$idcommission;
					  $this->IdAgence=$idagence;
					  $this->IdAgent=$idagent;
					  
					  
					  //Création de la Requete 
					  $requete='insert into mouvement(datemouv,montant,etatmouv,type,sens,codedevise,idagence,idagent) values(CURRENT_TIMESTAMP,"'. $this->Montant.'","'. $this->EtatMouv.'","'. $this->Type.'","'. $this->Sens.'","'. $this->CodeDevise.'","'. $this->IdAgence.'","'. $this->IdAgent.'")';
	
					//echo "#".$requete."#"; 
					   //insertion des information dans la base de donnees ou preparation de la requete
					 $conn=new connect();// preperation de la conexion
					 $resultat=$conn -> fx_ecriture($requete);// execution de la requete
					 if ($resultat){
									return $resultat;
					 }
					 else{
							return false;
					 }
						  
				 }
				 
				 //Création de la fonction Modifier Mouvement
					  function fx_ModifierMouvement($idmouv,$datemouv,$montant,$etatmouv,$type,$sens,$codedevise,$idcommission,$idagence){
						  $this->IdMouv=$idmouv;
						  $this->Montant=$montant;
						  $this->EtatMouv=$etatmouv;
						  $this->Type=$type;
						  $this->Sens=$sens;
						  $this->CodeDevise=$codedevise;
						  $this->IdCommission=$idcommission;
						  $this->IdAgence=$idagence;
					 
					 
					  $requete="update mouvement set idmouv='".$this->IdMouv."',datemouv=CURRENT_TIMESTAMP,montant='".$this->Montant."',etatmouv='".$this->EtatMouv."',type='".$this->Type."',sens='".$this->Sens."',codedevise='".$this->CodeDevise."',idcommission='".$this->IdCommission."',idagence='".$this->IdAgence."' where idmouv='".$this->IdMouv."' limit 1";
					  $conn=new connect();// preperation de la conexion
					  $resultat=$conn-> fx_modifier($requete);
					  }
				  
				  
					 function fx_ListeGenMouvement(){
								  $requete="select mouvement.montant,
												   mouvement.idmouv,
												   mouvement.datemouv,
												   mouvement.etatmouv,
												   mouvement.type,
												   mouvement.idagence,
												   mouvement.codedevise,
												   mouvement.idagent,
												   agence.idagence,
												   agence.nomagence,
												   agent.idagent,
												   agent.nom,
												   agent.prenom
												   
											from   mouvement,agence,agent
											where  agence.idagence = mouvement.idagence
											AND	   agent.idagent = mouvement.idagent";
											echo $requete;
											$conn=new connect();// preperation de la conexion
											  $resultat=$conn-> fx_lecture($requete);
											 if ($resultat){
											 
															return $resultat;
															
											} else{
											
												 return false;
										}
										}
								
								function fx_ListeMouvement($Cdate,$idagence){
								  $requete="select mouvement.montant,
												   mouvement.idmouv,
												   mouvement.datemouv,
												   mouvement.etatmouv,
												   mouvement.type,
												   mouvement.idagence,
												   mouvement.codedevise,
												   mouvement.idagent,
												   mouvement.sens,
												   agence.idagence,
												   agence.nomagence,
												   agent.idagent,
												   agent.nom,
												   agent.prenom
												   
											from mouvement,agence,agent
											where agence.idagence = mouvement.idagence
											AND	agent.idagent = mouvement.idagent
											AND mouvement.idagence=".$idagence."
											AND DATE(mouvement.datemouv)='".$Cdate."'
											order by mouvement.datemouv";
											//echo $requete;
											$conn=new connect();// preperation de la conexion
											  $resultat=$conn-> fx_lecture($requete);
											 if ($resultat){
											 
															return $resultat;
															
											} else{
											
												 return false;
										}
									}
								function fx_RapportMouvement($Cdate,$idagence){
								  $requete="select sum(mouvement.montant) as total, mouvement.type, mouvement.sens, codedevise
											from mouvement,agence
											where agence.idagence = mouvement.idagence
											AND mouvement.idagence=".$idagence."
											AND DATE(mouvement.datemouv)='".$Cdate."'
											AND mouvement.etatmouv=1
                                            group by mouvement.type, mouvement.sens, mouvement.codedevise";
											//echo $requete;
											$conn=new connect();// preperation de la conexion
											  $resultat=$conn-> fx_lecture($requete);
											 if ($resultat){
											 
															return $resultat;
															
											} else{
											
												 return false;
										}
									}
									function fx_RapportMouvementJGlobal($Cdate){
									  $requete="select sum(mouvement.montant) as total, mouvement.type, mouvement.sens, codedevise
												from mouvement,agence
												where agence.idagence = mouvement.idagence
												AND DATE(mouvement.datemouv)='".$Cdate."'
												AND mouvement.etatmouv=1
												group by mouvement.type, mouvement.sens, mouvement.codedevise";
												//echo $requete;
												$conn=new connect();// preperation de la conexion
												  $resultat=$conn-> fx_lecture($requete);
												 if ($resultat){
												 
																return $resultat;
																
												} else{
												
													 return false;
											}
										}
								function fx_RapportMouvementMensuel($CMois,$CAnnee,$idagence){
								  $requete="select sum(mouvement.montant) as total, mouvement.type, mouvement.sens, codedevise
											from mouvement,agence
											where agence.idagence = mouvement.idagence
											AND mouvement.idagence=".$idagence."
											AND MONTH(mouvement.datemouv)='".$CMois."'
											AND YEAR(mouvement.datemouv)='".$CAnnee."'
											AND mouvement.etatmouv=1
                                            group by mouvement.type, mouvement.sens, mouvement.codedevise";
											//echo $requete;
											$conn=new connect();// preperation de la conexion
											  $resultat=$conn-> fx_lecture($requete);
											 if ($resultat){
											 
															return $resultat;
															
											} else{
											
												 return false;
										}
									}
									function fx_RapportMouvementMensuelGlobal($CMois,$CAnnee){
								  $requete="select sum(mouvement.montant) as total, mouvement.type, mouvement.sens, codedevise
											from mouvement,agence
											where agence.idagence = mouvement.idagence
											AND MONTH(mouvement.datemouv)='".$CMois."'
											AND YEAR(mouvement.datemouv)='".$CAnnee."'
											AND mouvement.etatmouv=1
                                            group by mouvement.type, mouvement.sens, mouvement.codedevise";
											//echo $requete;
											$conn=new connect();// preperation de la conexion
											  $resultat=$conn-> fx_lecture($requete);
											 if ($resultat){
											 
															return $resultat;
															
											} else{
											
												 return false;
										}
									}
								function fx_ListeMouvement_Type($Cdate,$idagence,$Type){
								  $requete="select mouvement.montant,
												   mouvement.idmouv,
												   mouvement.datemouv,
												   mouvement.etatmouv,
												   mouvement.type,
												   mouvement.idagence,
												   mouvement.codedevise,
												   mouvement.idagent,
												   mouvement.sens,
												   agence.idagence,
												   agence.nomagence,
												   agent.idagent,
												   agent.nom,
												   agent.prenom
												   
											from mouvement,agence,agent
											where agence.idagence = mouvement.idagence
											AND	agent.idagent = mouvement.idagent
											AND mouvement.idagence =".$idagence."
											AND mouvement.type ='".$Type."'
											AND DATE(mouvement.datemouv)='".$Cdate."'
											order by mouvement.datemouv";
											//echo $requete;
											$conn=new connect();// preperation de la conexion
											  $resultat=$conn-> fx_lecture($requete);
											 if ($resultat){
											 
															return $resultat;
															
											} else{
											
												 return false;
										}
									}
									function fx_ListeRetrait($Cdate,$idagence){
											
									     $requete="select retrait.idretrait,
												   retrait.idtransfert,
												   retrait.idmouv,
												   retrait.EtatRetrait,
												   mouvement.datemouv,
												   mouvement.montant,
												   mouvement.codedevise,
												   mouvement.type,
												   transfert.codetrans,
												   transfert.idtransfert,
												   transfert.idbeneficiaire,
												   transfert.idexpedit,
												   transfert.IdAgenceExp,
												   transfert.IdAgenceDst,
												   beneficiaire.idbeneficiaire,
												   beneficiaire.nom AS NomBen,
												   beneficiaire.postnom AS PostNBen,
												   beneficiaire.prenom AS PrenBen,
												   expeditaire.idexpedit,
												   expeditaire.nom AS Expediteur,
												   agent.nom,
												   agent.prenom,
												   agence.idagence,
												   AgExp.idagence,
												   agence.nomagence,
												   AgExp.nomagence AS AgenceEmetrice
												   
												from   retrait, mouvement, transfert, beneficiaire, expeditaire, agent, agence, agence AS AgExp
												where  retrait.idmouv = mouvement.idmouv
												AND	   retrait.idtransfert = transfert.idtransfert
												AND    transfert.idbeneficiaire = beneficiaire.idbeneficiaire
												AND    transfert.idexpedit = expeditaire.idexpedit
												AND    mouvement.idagent = agent.idagent
												AND    transfert.IdAgenceExp = AgExp.idagence
												AND    transfert.IdAgenceDst = agence.idagence
												AND    transfert.IdAgenceDst = ".$idagence."
												AND DATE(mouvement.datemouv)='".$Cdate."'
												order by mouvement.datemouv";
												//echo $requete;
												$conn=new connect();// preperation de la conexion
												  $resultat=$conn-> fx_lecture($requete);
												 if ($resultat){
												 
																return $resultat;
																
												} else{
												
													 return false;
											}
										}
									function fx_ListeRetrait_Mens($CMois,$CAnnee,$idagence){
											
									     $requete="select retrait.idretrait,
												   retrait.idtransfert,
												   retrait.idmouv,
												   retrait.EtatRetrait,
												   mouvement.datemouv,
												   mouvement.montant,
												   mouvement.codedevise,
												   mouvement.type,
												   transfert.codetrans,
												   transfert.idtransfert,
												   transfert.idbeneficiaire,
												   transfert.idexpedit,
												   transfert.IdAgenceExp,
												   transfert.IdAgenceDst,
												   beneficiaire.idbeneficiaire,
												   beneficiaire.nom AS NomBen,
												   beneficiaire.postnom AS PostNBen,
												   beneficiaire.prenom AS PrenBen,
												   expeditaire.idexpedit,
												   expeditaire.nom AS Expediteur,
												   agent.nom,
												   agent.prenom,
												   agence.idagence,
												   AgExp.idagence,
												   agence.nomagence,
												   AgExp.nomagence AS AgenceEmetrice
												   
												from   retrait, mouvement, transfert, beneficiaire, expeditaire, agent, agence, agence AS AgExp
												where  retrait.idmouv = mouvement.idmouv
												AND	   retrait.idtransfert = transfert.idtransfert
												AND    transfert.idbeneficiaire = beneficiaire.idbeneficiaire
												AND    transfert.idexpedit = expeditaire.idexpedit
												AND    mouvement.idagent = agent.idagent
												AND    transfert.IdAgenceExp = AgExp.idagence
												AND    transfert.IdAgenceDst = agence.idagence
												AND    transfert.IdAgenceDst = ".$idagence."
												AND MONTH(mouvement.datemouv)='".$CMois."'
												AND YEAR(mouvement.datemouv)='".$CAnnee."'
												order by mouvement.datemouv";
												//echo $requete;
												$conn=new connect();// preperation de la conexion
												  $resultat=$conn-> fx_lecture($requete);
												 if ($resultat){
												 
																return $resultat;
																
												} else{
												
													 return false;
											}
										}
									function fx_ListeRetrait_An($CAnnee,$idagence){
											
									     $requete="select retrait.idretrait,
												   retrait.idtransfert,
												   retrait.idmouv,
												   retrait.EtatRetrait,
												   mouvement.datemouv,
												   mouvement.montant,
												   mouvement.codedevise,
												   mouvement.type,
												   transfert.codetrans,
												   transfert.idtransfert,
												   transfert.idbeneficiaire,
												   transfert.idexpedit,
												   transfert.IdAgenceExp,
												   transfert.IdAgenceDst,
												   beneficiaire.idbeneficiaire,
												   beneficiaire.nom AS NomBen,
												   beneficiaire.postnom AS PostNBen,
												   beneficiaire.prenom AS PrenBen,
												   expeditaire.idexpedit,
												   expeditaire.nom AS Expediteur,
												   agent.nom,
												   agent.prenom,
												   agence.idagence,
												   AgExp.idagence,
												   agence.nomagence,
												   AgExp.nomagence AS AgenceEmetrice
												   
												from   retrait, mouvement, transfert, beneficiaire, expeditaire, agent, agence, agence AS AgExp
												where  retrait.idmouv = mouvement.idmouv
												AND	   retrait.idtransfert = transfert.idtransfert
												AND    transfert.idbeneficiaire = beneficiaire.idbeneficiaire
												AND    transfert.idexpedit = expeditaire.idexpedit
												AND    mouvement.idagent = agent.idagent
												AND    transfert.IdAgenceExp = AgExp.idagence
												AND    transfert.IdAgenceDst = agence.idagence
												AND    transfert.IdAgenceDst = ".$idagence."
												AND YEAR(mouvement.datemouv)='".$CAnnee."'
												order by mouvement.datemouv";
												//echo $requete;
												$conn=new connect();// preperation de la conexion
												  $resultat=$conn-> fx_lecture($requete);
												 if ($resultat){
												 
																return $resultat;
																
												} else{
												
													 return false;
											}
										}
									function fx_ListeFinance($Cdate,$idagence){
										  $requete="select financement.idFinancement,
														   financement.motif,
														   financement.EtatFinancement,
														   financement.idmouv,
														   mouvement.idmouv,
														   mouvement.montant,
														   mouvement.datemouv,
														   mouvement.codedevise,
														   mouvement.idagence,
														   mouvement.type,
														   agence.idagence,
														   agence.nomagence,
														   agent.idagent,
														   agent.nom,
														   agent.prenom,
														   agenceprov.idagence as idAgtProv,
														   agenceprov.nomagence as NomAgtProv
														   
													from financement,mouvement,agence,agent,agence as agenceprov
													where financement.idmouv = mouvement.idmouv
													AND	  agence.idagence = mouvement.idagence
													AND	  agent.idagent = mouvement.idagent
													AND financement.IdAgenceProv=agenceprov.idagence
													AND mouvement.idagence=".$idagence."
													AND DATE(mouvement.datemouv)='".$Cdate."'
													order by mouvement.datemouv
													
													";
													//echo $requete;
													 // echo $requete; 
										  $conn=new connect();// preperation de la conexion
										  $resultat=$conn-> fx_lecture($requete);
										 if ($resultat){
														
														return $resultat;
														
										} else{
										
											 return false;
									}
									}
								function fx_ListeFinanceMensuel($CMois,$CAnnee,$idagence){
										  $requete="select financement.idFinancement,
														   financement.motif,
														   financement.EtatFinancement,
														   financement.idmouv,
														   mouvement.idmouv,
														   mouvement.montant,
														   mouvement.datemouv,
														   mouvement.codedevise,
														   mouvement.idagence,
														   mouvement.type,
														   agence.idagence,
														   agence.nomagence,
														   agent.idagent,
														   agent.nom,
														   agent.prenom,
														   agenceprov.idagence as idAgtProv,
														   agenceprov.nomagence as NomAgtProv
														   
													from financement,mouvement,agence,agent,agence as agenceprov
													where financement.idmouv = mouvement.idmouv
													AND	  agence.idagence = mouvement.idagence
													AND	  agent.idagent = mouvement.idagent
													AND financement.IdAgenceProv=agenceprov.idagence
													AND mouvement.idagence=".$idagence."
													AND MONTH(mouvement.datemouv)='".$CMois."'
													AND YEAR(mouvement.datemouv)='".$CAnnee."'
													order by mouvement.datemouv
													
													";
													//echo $requete;
													 // echo $requete; 
										  $conn=new connect();// preperation de la conexion
										  $resultat=$conn-> fx_lecture($requete);
										 if ($resultat){
														
														return $resultat;
														
										} else{
										
											 return false;
									}
									}
								function fx_ListeFinanceAnnuel($CAnnee,$idagence){
										  $requete="select financement.idFinancement,
														   financement.motif,
														   financement.EtatFinancement,
														   financement.idmouv,
														   mouvement.idmouv,
														   mouvement.montant,
														   mouvement.datemouv,
														   mouvement.codedevise,
														   mouvement.idagence,
														   mouvement.type,
														   agence.idagence,
														   agence.nomagence,
														   agent.idagent,
														   agent.nom,
														   agent.prenom,
														   agenceprov.idagence as idAgtProv,
														   agenceprov.nomagence as NomAgtProv
														   
													from financement,mouvement,agence,agent,agence as agenceprov
													where financement.idmouv = mouvement.idmouv
													AND	  agence.idagence = mouvement.idagence
													AND	  agent.idagent = mouvement.idagent
													AND financement.IdAgenceProv=agenceprov.idagence
													AND mouvement.idagence=".$idagence."
													AND YEAR(mouvement.datemouv)='".$CAnnee."'
													order by mouvement.datemouv
													
													";
													//echo $requete;
													 // echo $requete; 
										  $conn=new connect();// preperation de la conexion
										  $resultat=$conn-> fx_lecture($requete);
										 if ($resultat){
														
														return $resultat;
														
										} else{
										
											 return false;
									}
									}
									
								function fx_ListeMouvement_Depense($Cdate,$idagence,$Type){
								  $requete="select mouvement.montant,
												   mouvement.idmouv,
												   mouvement.datemouv,
												   mouvement.etatmouv,
												   depense.motif as type,
												   mouvement.idagence,
												   mouvement.codedevise,
												   mouvement.idagent,
												   mouvement.sens,
												   agence.idagence,
												   agence.nomagence,
												   agent.idagent,
												   agent.nom,
												   agent.prenom
												   
											from mouvement,agence,agent,depense
											where agence.idagence = mouvement.idagence
											AND	agent.idagent = mouvement.idagent
											AND mouvement.idagence =".$idagence."
											AND mouvement.type ='".$Type."'
											AND DATE(mouvement.datemouv)='".$Cdate."'
											AND mouvement.idmouv =depense.idmouv 
											order by mouvement.datemouv";
											//echo $requete;
											$conn=new connect();// preperation de la conexion
											  $resultat=$conn-> fx_lecture($requete);
											 if ($resultat){
											 
															return $resultat;
															
											} else{
											
												 return false;
										}
									}
									
								function fx_ListeMouvement_Depense_Mensuel($CMois,$CAnnee,$idagence,$Type){
								  $requete="select mouvement.montant,
												   mouvement.idmouv,
												   mouvement.datemouv,
												   mouvement.etatmouv,
												   depense.motif as type,
												   mouvement.idagence,
												   mouvement.codedevise,
												   mouvement.idagent,
												   mouvement.sens,
												   agence.idagence,
												   agence.nomagence,
												   agent.idagent,
												   agent.nom,
												   agent.prenom
												   
											from mouvement,agence,agent,depense
											where agence.idagence = mouvement.idagence
											AND	agent.idagent = mouvement.idagent
											AND mouvement.idagence =".$idagence."
											AND mouvement.type ='".$Type."'
											AND MONTH(mouvement.datemouv)='".$CMois."'
											AND YEAR(mouvement.datemouv)='".$CAnnee."'
											AND mouvement.idmouv =depense.idmouv 
											order by mouvement.datemouv";
											//echo $requete;
											$conn=new connect();// preperation de la conexion
											  $resultat=$conn-> fx_lecture($requete);
											 if ($resultat){
											 
															return $resultat;
															
											} else{
											
												 return false;
										}
									}
								function fx_ListeMouvement_Depense_Annuel($CAnnee,$idagence,$Type){
								  $requete="select mouvement.montant,
												   mouvement.idmouv,
												   mouvement.datemouv,
												   mouvement.etatmouv,
												   depense.motif as type,
												   mouvement.idagence,
												   mouvement.codedevise,
												   mouvement.idagent,
												   mouvement.sens,
												   agence.idagence,
												   agence.nomagence,
												   agent.idagent,
												   agent.nom,
												   agent.prenom
												   
											from mouvement,agence,agent,depense
											where agence.idagence = mouvement.idagence
											AND	agent.idagent = mouvement.idagent
											AND mouvement.idagence =".$idagence."
											AND mouvement.type ='".$Type."'
											AND YEAR(mouvement.datemouv)='".$CAnnee."'
											AND mouvement.idmouv =depense.idmouv 
											order by mouvement.datemouv";
											//echo $requete;
											$conn=new connect();// preperation de la conexion
											  $resultat=$conn-> fx_lecture($requete);
											 if ($resultat){
											 
															return $resultat;
															
											} else{
											
												 return false;
										}
									}
								function fx_ListeMouvement_Env($Cdate,$idagence){
								  $requete="select mouvement.montant,
												   mouvement.idmouv,
												   mouvement.datemouv,
												   mouvement.etatmouv,
												   mouvement.type,
												   mouvement.idagence,
												   mouvement.codedevise,
												   mouvement.idagent,
												   mouvement.sens,
												   agence.idagence,
												   agence.nomagence,
												   agent.idagent,
												   agent.nom,
												   agent.prenom,
												   transfert.codetrans,
												   expeditaire.nom as ExNom,
												   expeditaire.postnom AS ExPostnom,
												   mouvcommission.montant as commission,
												   mouvcommission.codedevise as Devcommission
												   
											from mouvement,agence,agent,commission,transfert,expeditaire,mouvement as mouvcommission
											where agence.idagence = mouvement.idagence
											AND	agent.idagent = mouvement.idagent
											AND mouvement.idagence =".$idagence."
											AND mouvement.etatmouv=1
											AND mouvement.type ='envoi'
											AND DATE(mouvement.datemouv)='".$Cdate."'
											AND mouvement.idmouv =transfert.idmouv
                                            AND commission.idtransfert=transfert.idtransfert
                                            AND commission.idmouv=mouvcommission.idmouv
											AND transfert.idexpedit = expeditaire.idexpedit
											order by mouvement.datemouv";
											//echo $requete;
											$conn=new connect();// preperation de la conexion
											  $resultat=$conn-> fx_lecture($requete);
											 if ($resultat){
											 
															return $resultat;
															
											} else{
											
												 return false;
										}
									}
								
								function fx_ListeMouvement_transfert($Cdate,$idagence){
								  $requete="select mouvement.montant,
												   mouvement.idmouv,
												   mouvement.datemouv,
												   mouvement.etatmouv,
												   mouvement.type,
												   mouvement.idagence,
												   mouvement.codedevise,
												   mouvement.idagent,
												   mouvement.sens,
												   agence.idagence,
												   agence.nomagence,
												   agent.idagent,
												   agent.nom,
												   agent.prenom,
												   transfert.codetrans,
												   expeditaire.nom as ExNom,
												   expeditaire.postnom AS ExPostnom,
                                                   mouvcommission.montant as commission,
												   mouvcommission.codedevise as Devcommission
												   
											from mouvement,agence,agent,commission,transfert,expeditaire,mouvement as mouvcommission
											where agence.idagence = mouvement.idagence
											AND	agent.idagent = mouvement.idagent
											AND mouvement.idagence =".$idagence."
											AND mouvement.etatmouv=1
											AND mouvement.type ='envoi'
                                            AND mouvement.idmouv =transfert.idmouv
                                            AND commission.idtransfert=transfert.idtransfert
                                            AND commission.idmouv=mouvcommission.idmouv
											AND DATE(mouvement.datemouv)='".$Cdate."'
											AND transfert.idexpedit = expeditaire.idexpedit
											order by mouvement.datemouv";
											//echo $requete;
											$conn=new connect();// preperation de la conexion
											  $resultat=$conn-> fx_lecture($requete);
											 if ($resultat){
											 
															return $resultat;
															
											} else{
											
												 return false;
										}
									}
								
								
								function fx_conversion_Jour($Cdate,$idagence){
								  $requete="select mouvement.montant,
												   mouvement.idmouv,
												   mouvement.datemouv,
												   mouvement.etatmouv,
												   mouvement.type,
												   mouvement.idagence,
												   mouvement.codedevise,
												   mouvement.idagent,
												   mouvement.sens,
												   agence.idagence,
												   agence.nomagence,
												   agent.idagent,
												   agent.nom,
												   agent.prenom,
												   concerner.TauxChange
												   
											from mouvement,agence,agent,concerner
											where agence.idagence = mouvement.idagence
											AND	agent.idagent = mouvement.idagent
											AND	concerner.idmouv = mouvement.idmouv
											AND mouvement.sens='E'
											AND mouvement.idagence =".$idagence."
											AND mouvement.type ='conversion'
											AND DATE(mouvement.datemouv)='".$Cdate."'
											order by mouvement.datemouv";
											//echo $requete;
											$conn=new connect();// preperation de la conexion
											  $resultat=$conn-> fx_lecture($requete);
											 if ($resultat){
											 
															return $resultat;
															
											} else{
											
												 return false;
										}
									}
								
								
								
								
								function fx_ListeMouvement_Mensuel($CMois,$CAnnee,$idagence){
								  $requete="select sum(mouvement.montant) as total, mouvement.type, mouvement.sens, codedevise
											from mouvement,agence
											where agence.idagence = mouvement.idagence
											AND mouvement.idagence=".$idagence."
											AND MONTH(mouvement.datemouv)='".$CMois."'
											AND YEAR(mouvement.datemouv)='".$CAnnee."'
                                            group by mouvement.type, mouvement.sens, mouvement.codedevise";
											//echo $requete;
											$conn=new connect();// preperation de la conexion
											  $resultat=$conn-> fx_lecture($requete);
											 if ($resultat){
											 
															return $resultat;
															
											} else{
											
												 return false;
										}
									}
								function fx_ListeMouvement_Annuel($CAnnee,$idagence){
								  $requete="select sum(mouvement.montant) as total, mouvement.type, mouvement.sens, codedevise
											from mouvement,agence
											where agence.idagence = mouvement.idagence
											AND mouvement.idagence=".$idagence."
											AND YEAR(mouvement.datemouv)='".$CAnnee."'
                                            group by mouvement.type, mouvement.sens, mouvement.codedevise";
											//echo $requete;
											$conn=new connect();// preperation de la conexion
											  $resultat=$conn-> fx_lecture($requete);
											 if ($resultat){
											 
															return $resultat;
															
											} else{
											
												 return false;
										}
									}
								function fx_ListeMouvement_Mensuel_Envoi($CMois,$CAnnee,$idagence){
								  $requete="select mouvement.montant,
												   mouvement.idmouv,
												   mouvement.datemouv,
												   mouvement.etatmouv,
												   mouvement.type,
												   mouvement.idagence,
												   mouvement.codedevise,
												   mouvement.idagent,
												   mouvement.sens,
												   agence.idagence,
												   agence.nomagence,
												   agent.idagent,
												   agent.nom,
												   agent.prenom,
												   expeditaire.nom as ExNom,
												   expeditaire.postnom AS ExPostnom,
												   transfert.codetrans,
												   mouvcommission.montant as commission,
												   mouvcommission.codedevise as Devcommission
												   
											from mouvement,agence,agent,commission,transfert,expeditaire,mouvement as mouvcommission
											where agence.idagence = mouvement.idagence
											AND	agent.idagent = mouvement.idagent
											AND mouvement.idagence=".$idagence."
											AND mouvement.etatmouv=1
											AND MONTH(mouvement.datemouv)='".$CMois."'
											AND YEAR(mouvement.datemouv)='".$CAnnee."'
											AND mouvement.type='envoi'
											AND mouvement.idmouv =transfert.idmouv
                                            AND commission.idtransfert=transfert.idtransfert
                                            AND commission.idmouv=mouvcommission.idmouv
											AND transfert.idexpedit = expeditaire.idexpedit
											order by mouvement.datemouv";
											//echo $requete;
											$conn=new connect();// preperation de la conexion
											  $resultat=$conn-> fx_lecture($requete);
											 if ($resultat){
											 
															return $resultat;
															
											} else{
											
												 return false;
										}
									}
								function fx_ListeMouvement_Annuel_Envoi($CAnnee,$idagence){
								  $requete="select mouvement.montant,
												   mouvement.idmouv,
												   mouvement.datemouv,
												   mouvement.etatmouv,
												   mouvement.type,
												   mouvement.idagence,
												   mouvement.codedevise,
												   mouvement.idagent,
												   mouvement.sens,
												   agence.idagence,
												   agence.nomagence,
												   agent.idagent,
												   agent.nom,
												   agent.prenom,
												   expeditaire.nom as ExNom,
												   expeditaire.postnom AS ExPostnom,
												   transfert.codetrans,
												   mouvcommission.montant as commission,
												   mouvcommission.codedevise as Devcommission
												   
											from mouvement,agence,agent,commission,transfert,expeditaire,mouvement as mouvcommission
											where agence.idagence = mouvement.idagence
											AND	agent.idagent = mouvement.idagent
											AND mouvement.idagence=".$idagence."
											AND mouvement.etatmouv=1
											AND YEAR(mouvement.datemouv)='".$CAnnee."'
											AND mouvement.type='envoi'
											AND mouvement.idmouv =transfert.idmouv
                                            AND commission.idtransfert=transfert.idtransfert
                                            AND commission.idmouv=mouvcommission.idmouv
											AND transfert.idexpedit = expeditaire.idexpedit
											order by mouvement.datemouv";
											//echo $requete;
											$conn=new connect();// preperation de la conexion
											  $resultat=$conn-> fx_lecture($requete);
											 if ($resultat){
											 
															return $resultat;
															
											} else{
											
												 return false;
										}
									}
								function fx_ListeMouvement_Mensuel_Type($CMois,$CAnnee,$idagence,$Type){
								  $requete="select mouvement.montant,
												   mouvement.idmouv,
												   mouvement.datemouv,
												   mouvement.etatmouv,
												   mouvement.type,
												   mouvement.idagence,
												   mouvement.codedevise,
												   mouvement.idagent,
												   mouvement.sens,
												   agence.idagence,
												   agence.nomagence,
												   agent.idagent,
												   agent.nom,
												   agent.prenom
												   
											from mouvement,agence,agent
											where agence.idagence = mouvement.idagence
											AND	agent.idagent = mouvement.idagent
											AND mouvement.idagence=".$idagence."
											AND MONTH(mouvement.datemouv)='".$CMois."'
											AND YEAR(mouvement.datemouv)='".$CAnnee."'
											AND mouvement.type='".$Type."'
											order by mouvement.datemouv";
											//echo $requete;
											$conn=new connect();// preperation de la conexion
											  $resultat=$conn-> fx_lecture($requete);
											 if ($resultat){
											 
															return $resultat;
															
											} else{
											
												 return false;
										}
									}
								function fx_ListeMouvement_Annuel_Type($CAnnee,$idagence,$Type){
								  $requete="select mouvement.montant,
												   mouvement.idmouv,
												   mouvement.datemouv,
												   mouvement.etatmouv,
												   mouvement.type,
												   mouvement.idagence,
												   mouvement.codedevise,
												   mouvement.idagent,
												   mouvement.sens,
												   agence.idagence,
												   agence.nomagence,
												   agent.idagent,
												   agent.nom,
												   agent.prenom
												   
											from mouvement,agence,agent
											where agence.idagence = mouvement.idagence
											AND	agent.idagent = mouvement.idagent
											AND mouvement.idagence=".$idagence."
											AND YEAR(mouvement.datemouv)='".$CAnnee."'
											AND mouvement.type='".$Type."'
											order by mouvement.datemouv";
											//echo $requete;
											$conn=new connect();// preperation de la conexion
											  $resultat=$conn-> fx_lecture($requete);
											 if ($resultat){
											 
															return $resultat;
															
											} else{
											
												 return false;
										}
									}
								function fx_ListeConversion_Mensuel($CMois,$CAnnee,$idagence){
								  $requete="select mouvement.montant,
												   mouvement.idmouv,
												   mouvement.datemouv,
												   mouvement.etatmouv,
												   mouvement.type,
												   mouvement.idagence,
												   mouvement.codedevise,
												   mouvement.idagent,
												   mouvement.sens,
												   agence.idagence,
												   agence.nomagence,
												   agent.idagent,
												   agent.nom,
												   agent.prenom,
												   concerner.TauxChange
												   
											from mouvement,agence,agent,concerner
											where agence.idagence = mouvement.idagence
											AND	concerner.idmouv = mouvement.idmouv
											AND mouvement.sens='E'
											AND	agent.idagent = mouvement.idagent
											AND mouvement.idagence=".$idagence."
											AND MONTH(mouvement.datemouv)='".$CMois."'
											AND YEAR(mouvement.datemouv)='".$CAnnee."'
											AND mouvement.type='conversion'
											order by mouvement.datemouv";
											//echo $requete;
											$conn=new connect();// preperation de la conexion
											  $resultat=$conn-> fx_lecture($requete);
											 if ($resultat){
											 
															return $resultat;
															
											} else{
											
												 return false;
										}
									}	
								function fx_ListeConversion_Annuel($CAnnee,$idagence){
								  $requete="select mouvement.montant,
												   mouvement.idmouv,
												   mouvement.datemouv,
												   mouvement.etatmouv,
												   mouvement.type,
												   mouvement.idagence,
												   mouvement.codedevise,
												   mouvement.idagent,
												   mouvement.sens,
												   agence.idagence,
												   agence.nomagence,
												   agent.idagent,
												   agent.nom,
												   agent.prenom,
												   concerner.TauxChange
												   
											from mouvement,agence,agent,concerner
											where agence.idagence = mouvement.idagence
											AND	concerner.idmouv = mouvement.idmouv
											AND mouvement.sens='E'
											AND	agent.idagent = mouvement.idagent
											AND mouvement.idagence=".$idagence."
											AND YEAR(mouvement.datemouv)='".$CAnnee."'
											AND mouvement.type='conversion'
											order by mouvement.datemouv";
											//echo $requete;
											$conn=new connect();// preperation de la conexion
											  $resultat=$conn-> fx_lecture($requete);
											 if ($resultat){
											 
															return $resultat;
															
											} else{
											
												 return false;
										}
									}
									
								function fx_RM_Journalier($Cdate,$idagence,$sens,$devise){
									//echo $idagence;
								  $requete="select sum(montant) as total
											from mouvement
											where  mouvement.idagence=".$idagence." 
											AND DATE(datemouv)<'".$Cdate."' 
											AND sens='".$sens."'
											AND codedevise='".$devise."'
											AND mouvement.etatmouv=1
											order by datemouv";
											//echo $requete;
											$conn=new connect();// preperation de la conexion
											  $resultat=$conn-> fx_lecture($requete);
											 if ($resultat){
											 
															return $resultat;
															
											} else{
											
												 return false;
										}
									}
									function fx_RM_JournalierGlobal($Cdate,$sens,$devise){
									//echo $idagence;
									  $requete="select sum(montant) as total
												from mouvement
												where DATE(datemouv)<'".$Cdate."' 
												AND sens='".$sens."'
												AND codedevise='".$devise."'
												AND mouvement.etatmouv=1
												order by datemouv";
												//echo $requete;
												$conn=new connect();// preperation de la conexion
												  $resultat=$conn-> fx_lecture($requete);
												 if ($resultat){
												 
																return $resultat;
																
												} else{
												
													 return false;
											}
										}	
									function fx_RM_Mensuelle($CMois,$CYear,$idagence,$sens,$devise){
									//echo $idagence;
									  $requete="select sum(montant) as total
												from mouvement
												where  mouvement.idagence=".$idagence." 
												AND ((DATE(datemouv)<'".$CMois."' AND YEAR(datemouv)='".$CYear."')OR(YEAR(datemouv)<'".$CYear."'))
												AND sens='".$sens."'
												AND codedevise='".$devise."'
												AND mouvement.etatmouv=1
												order by datemouv";
												//echo $requete;
												$conn=new connect();// preperation de la conexion
												  $resultat=$conn-> fx_lecture($requete);
												 if ($resultat){
												 
																return $resultat;
																
												} else{
												
													 return false;
											}
										}	
									function fx_RM_Annuel($CYear,$idagence,$sens,$devise){
									//echo $idagence;
									  $requete="select sum(montant) as total
												from mouvement
												where  mouvement.idagence=".$idagence." 
												AND YEAR(datemouv)<'".$CYear."'
												AND sens='".$sens."'
												AND codedevise='".$devise."'
												AND mouvement.etatmouv=1
												order by datemouv";
												//echo $requete;
												$conn=new connect();// preperation de la conexion
												  $resultat=$conn-> fx_lecture($requete);
												 if ($resultat){
												 
																return $resultat;
																
												} else{
												
													 return false;
											}
										}
									function fx_RM_MensuelleGlobal($CMois,$CYear,$sens,$devise){
									//echo $idagence;
									  $requete="select sum(montant) as total
												from mouvement
												where ((DATE(datemouv)<'".$CMois."' AND YEAR(datemouv)='".$CYear."')OR(YEAR(datemouv)<'".$CYear."'))
												AND sens='".$sens."'
												AND codedevise='".$devise."'
												AND mouvement.etatmouv=1
												order by datemouv";
												//echo $requete;
												$conn=new connect();// preperation de la conexion
												  $resultat=$conn-> fx_lecture($requete);
												 if ($resultat){
												 
																return $resultat;
																
												} else{
												
													 return false;
											}
										}
								
								 function fx_ListeMouvementAgence($idagent){
									$this->IdAgent=$idagent;
								  $requete="select mouvement.montant,
												   mouvement.idmouv,
												   mouvement.datemouv,
												   mouvement.etatmouv,
												   mouvement.type,
												   mouvement.idagence,
												   mouvement.codedevise,
												   mouvement.idagent,
												   agence.idagence,
												   agence.nom,
												   agent.idagent,
												   agent.nomag,
												   agent.prenom
												   
											from   mouvement,agence,agent
											where  mouvement.idagence = '".$this->IdAgent."'
											AND	   agence.idagence = mouvement.idagence
											AND	   agent.idagent = mouvement.idagent
											AND mouvement.etatmouv=1";
												
											$conn=new connect();// preperation de la conexion
											  $resultat=$conn-> fx_lecture($requete);
											 if ($resultat){
											 
															return $resultat;
															
											} else{
											
												 return false;
										}
										}
										
								//Creéation de la fonction Recherche IdMouv pour Modification
								 function fx_RechercheIdMouv($idmouv){
									$this->IdMouv=$idmouv;
								  $requete="select mouvement.montant,
												   mouvement.idmouv,
												   mouvement.datemouv,
												   mouvement.etatmouv,
												   mouvement.type,
												   agence.idagence,
												   agence.nom,
												   devise.codeddevise,
												   devise.monnaie,
												   agent.nomag,
												   agent.postnom,
												   agent.prenom
												  
											from mouvement,
												 agence,
												 devise,
												 agent
												 
											where mouvement.idmouv='".$this->IdMouv."' 
											AND   mouvement.idagence=agence.idagence
											AND	  mouvement.codedevise=devise.codeddevise
											AND	  mouvement.idagent=agent.idagent";
											
											$conn=new connect();// preperation de la conexion
											  $resultat=$conn-> fx_lecture($requete);
											 if ($resultat){
											 
															return $resultat;
															
											} else{
											
												 return false;
										}
										}
										
										
					 //Création de la fonction Changement Etat Mouvement
					   function fx_ChangementEtatMouvement($idmouv,$etatmouv){
							$this->IdMouv=$idmouv;
							$this->EtatMouv=$etatmouv;
							$requete="update mouvement set etatmouv=".$this->EtatMouv." where idmouv=".$this->IdMouv;
							echo $requete; 
							$conn=new connect();// preperation de la conexion
							$resultat=$conn-> fx_modifier($requete);
							
							if($resultat){
								return $resultat;
							}else{
								return false;
							}
						}
				
					///////fx_function_suppression_clien_com//////////////
					
					function fx_suppression_com($idtransfert){
						$this->idtransfert=$idtransfert;
						$requete="update commission set etatcommis=0
								  where idtransfert='".$this->idtransfert."'";
								
			  
					  echo $requete; 
					  $conn=new connect();// preperation de la conexion
					  $resultat=$conn-> fx_lecture($requete);
							if ($resultat){
											
								return $resultat;
							}
						   else{
								 return false;
							}
					}
					
					function fx_RechercheIdMouvComm($idtransfert){
									$this->idtransfert=$idtransfert;
								  $requete="select  commission.idmouv  
											from commission	 
											where commission.idtransfert='".$this->idtransfert."'";
											//echo $requete;
											$conn=new connect();// preperation de la conexion
											  $resultat=$conn-> fx_lecture($requete);
											 if ($resultat){
											 
															return $resultat;
															
											} else{
											
												 return false;
										}
							}
					
					
					function fx_SituationTranferts(){
						  $requete="select sum(mouvement.montant) as Total,transfert.Retirer,mouvement.codedevise
									from mouvement,transfert 
									where transfert.idmouv = mouvement.idmouv 
									AND mouvement.type='envoi' 
									AND transfert.EtatTransfert=1
									AND mouvement.etatmouv=1
									group by transfert.Retirer, mouvement.codedevise";
									//echo $requete;
									$conn=new connect();// preperation de la conexion
									  $resultat=$conn-> fx_lecture($requete);
									 if ($resultat){
										return $resultat;
									} else{
										 return false;
									}
						}
					
			}
			
			
?>