<?php
include_once ("ClasseConnexion.php");
class transaction{
                  private $IdTransact;
				  private $MontantTransact;
				  private $CodeMonnaie;
				  private $Sens;
				  private $MoyenTransact;
				  private $CodeTypeTransact;
				  private $IdCompte;
				  private $DateTransact;
				  private $EtatTranasct;

				  private $Idtransfert;
				  private $IdTransact_E;
				  private $IdTransact_B;
				  private $IdPlage;
				  private $EtatTransfert;
				 
			
				 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				  function fx_creertransaction($MontantTransact,$CodeMonnaie,$Sens,$MoyenTransact,$CodeTypeTransact,$IdCompte){   
					  $this->Montant=$MontantTransact;
					  $this->Codemonnaie=$CodeMonnaie;
					  $this->SensT=$Sens;
					  $this->MoyenT=$MoyenTransact;
					  $this->CodetypeT=$CodeTypeTransact; 
					  $this->IDCOMPTE=$IdCompte;
					  //$this->EtatT=$EtatTranasct;
					  					  
					  //insertion trnasaction
					  $requete='insert into transaction(MontantTransact,CodeMonnaie,Sens,MoyenTransact,CodeTypeTransact,IdCompte,DateTransact,EtatTransact) values("'. $this->Montant.'","'. $this->Codemonnaie.'","'. $this->SensT.'","'. $this->MoyenT.'","'. $this->CodetypeT.'","'. $this->IDCOMPTE.'",CURRENT_TIMESTAMP,1)';
					 $conn=new connect();
					 $resultat=$conn -> fx_ecriture($requete);
					 if ($resultat){
									return $resultat;
					 }
					 else{
							return false;
					 }
						  
				 }
				 function fx_opererTransfert($MontantTransact,$CodeMonnaie,$MoyenTransact,$IdCompteE,$IdCompteB){   
					  $this->Montant=$MontantTransact;
					  $this->Codemonnaie=$CodeMonnaie;
					 // $this->SensT=$Sens;
					  $this->MoyenT=$MoyenTransact;
					  //$this->CodetypeT=$CodeTypeTransact; 
					  //$this->EtatT=$EtatTranasct;
					  					  
					  //insertion trnasaction
					  $requete='insert into transaction
					  (IdTransact,MontantTransact,CodeMonnaie,Sens,MoyenTransact,CodeTypeTransact,IdCompte,DateTransact,EtatTransact) 
					  values
					  (null,"'. $this->Montant.'","'. $this->Codemonnaie.'","S","'. $this->MoyenT.'","Transfert","'. $IdCompteE.'",CURRENT_TIMESTAMP,1),
					  (null,"'. $this->Montant.'","'. $this->Codemonnaie.'","E","'. $this->MoyenT.'","Transfert","'. $IdCompteB.'",CURRENT_TIMESTAMP,1)';
					 $conn=new connect();
					 //echo $requete;
					 $resultat=$conn -> fx_ecriture($requete);
					 if ($resultat){
									return $resultat;
					 }
					 else{
							return false;
					 }
						  
				 }
				 function fx_FraisLies($CodeTypeTransact){
					 	$requete="select *
						from  frais
						where CodeTypeTransact = '".$CodeTypeTransact."' 
						AND   EtatFrais=1";
						$conn=new connect();
						$resultat=$conn-> fx_lecture($requete);
						if ($resultat){
							
							return $resultat;
											
							} else{
							
								 return false;
						}
					 }
				 function fx_concerner($IdTransact, $IdTransactS, $IdTransactE,$IdFrais, $Montant, $CodeMonnaie){   
					  			  
					  //insertion trnasaction
					  $requete="INSERT INTO concerner (IdConcerner, IdTransact, IdTransactS, IdTransactE, IdFrais, Montant, CodeMonnaie) VALUES (NULL, '".$IdTransact."', '".$IdTransactS."','".$IdTransactE."', '".$IdFrais."','".$Montant."', '".$CodeMonnaie."');";
					 $conn=new connect();
					 $resultat=$conn -> fx_ecriture($requete);
					 if ($resultat){
									return $resultat;
					 }
					 else{
							return false;
					 }
						  
				 }
				 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					  function fx_ModifierTransaction($IdTransact,$MoyenTransact,$IdCompte){
						  $this->idT=$IdTransact;
						  $this->Montant=$MontantTransact;
						  $this->codeM=$CodeMonnaie;
						  $this->sensT=$Sens;
						  $this->MoyenT=$MoyenTransact;
						  $this->codetypeT=$CodeTypeTransact;
						  $this->IDCOMPTE=$IdCompte;
						//modification  transaction
					  $requete="update transaction set MoyenTransact='".$this->MoyenT."',IdCompte='".$this->IDCOMPTE."' where IdTransact='".$this->idT."' limit 1";
					  $conn=new connect();
					  $resultat=$conn-> fx_modifier($requete);
					  }
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
					  function fx_Change_EtatTransaction($IdTransact,$EtatTranasct){
							$this->idT=$IdTransact;
							$this->EtatT=$EtatTranasct;
							//modification etat transaction
							$requete="update transaction set EtatTransact='".$this->EtatT."' where IdTransact='".$this->idT."'";
							echo $requete; 
							$conn=new connect();
							$resultat=$conn-> fx_modifier($requete);
							
							if($resultat){
								return $resultat;
							}else{
								return false;
							}
						}
				 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
							 function fx_TransactionAgence($IdAgence){ 
							$this->idagence=$IdAgence;
							$requete="select *
										from  transaction, monnaie, typetransaction, compteb, agence, effectuer
										where compteb.IdAgence = ".$idagence." 
										AND   transaction.IdTransact=effectuer.IdTransact
										AND   agence.IdAgence=effectuer.IdAgence 
										AND	  transaction.CodeTypeTransact = typetransaction.CodeTypeTransact
										AND	  transaction.IdCompte = compteb.IdCompte
										AND	  transaction.CodeMonnaie=monnaie.CodeMonnaie";
										$conn=new connect();
										$resultat=$conn-> fx_lecture($requete);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
										}
				//////////////////////////////////////////////////////////////////////////////////////////////////////////
						function fx_TransactionCompte($NumCompte){ 

							$requete="select transaction.IdTransact,
										transaction.MontantTransact,                    
										transaction.Sens,
										transaction.DateHeurEdit,
										transaction.MoyenTransact,
										monnaie.Libmonnaie,
										typetransaction.LibTypeTransact,
										compteb.NumCompte
										from  transaction, monnaie, typetransaction, compteb
										where compteb.NumCompte = '".$NumCompte."'  
										AND	  transaction.CodeTypeTransact = typetransaction.CodeTypeTransact
										AND	  transaction.CodeMonnaie=monnaie.CodeMonnaie
										AND   transaction.IdCompte=compteb.IdCompte
										order by transaction.DateHeurEdit";
										$conn=new connect();
										$resultat=$conn-> fx_lecture($requete);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
										}
				////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						function fx_creertransfert($IdTransact_E, $IdTransact_B,$IdPlage){
										 $this->IdTransExp=$IdTransact_E;
										 $this->IdTransBen=$IdTransact_B;
										 $this->Plage=$IdPlage;
										 //insertion transfert
										 $requete='insert into transfert(IdTransact_E, IdTransact_B,IdPlage,EtatTransfert) values("'.$this->IdTransExp.'","'.$this->IdTransBen.'","'.$this->Plage.'",1)';
										 
										$conn=new connect();
										$resultat=$conn-> fx_ecriture($requete);
										if($resultat){
										  return $resultat;
										}else{
										return false;
										}
																								  
								 }
				
				/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
							function fx_modifieTransfert($Idtransfert,$IdTransact_E, $IdTransact_B,$IdPlage){
										$this->IDTRANSFERT=$Idtransfert;
										$this->IdTransExp=$IdTransact_E;
										$this->IdTransBen=$IdTransact_B;
										//modification transfert
										$requete="update transfert set IdTransact_E='". $this->IdTransExp."',IdTransact_B='". $this->IdTransExp."',IdPlage='". $this->Plage."'  where idtransfert='".$this->IDTRANSFERT."'  limit 1";
										$conn=new connect();
										$resultat=$conn-> fx_modifier($requete);
								
								}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

							function fx_SupprimerTransfert($Idtransfert,$EtatTransfert){
									$this->IDTRANSFERT=$idtransfert;
									$this->etatTransf=$EtatTransfert;
									//modification etat transfert
									$requete="update transfert set EtatTransfert='".$this->etatTransf."' where idtransfert='".$this->IDTRANSFERT."'";
									$conn=new connect();
									$resultat=$conn-> fx_modifier($requete);
						}
				/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

							function fx_TransfertCompte($NumCompte){
								$this->NumCompt=$NumCompte;
								$requete="select transfert.Idtransfert, 
											transfert.IdTransact_E, 
											transfert.IdTransact_B, 
											transfert.EtatTransfert, 
											compteb.NumCompte, 
											transaction.MontantTransact,
											transaction.DateHeurEdit,
											concerner.Montant,
											concerner.CodeMonnaie
											from transfert, compteb, transaction, concerner, frais
											where compteb.NumCompte = '".$this->NumCompt."'
											AND   transaction.IdCompte=compteb.IdCompte
											AND   concerner.IdFrais=frais.IdFrais
											AND   concerner.IdTransact=transaction.IdTransact
											AND   transaction.EtatTranasct=1";

											$conn=new connect();
										$resultat=$conn-> fx_lecture($requete);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
							}
				/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

							function fx_TransfertCompte_Date($NumCompte,$DatSelect){
								$this->NumCompt=$NumCompte;
								$requete="select transfert.Idtransfert, 
											transfert.IdTransact_E, 
											transfert.IdTransact_B, 
											transfert.EtatTransfert, 
											compteb.NumCompte, 
											transaction.MontantTransact,
											transaction.DateHeurEdit,
											concerner.Montant,
											concerner.CodeMonnaie
											from transfert, compteb, transaction, concerner, frais
											where compteb.NumCompte = '".$this->NumCompt."'
											AND   DATE(transaction.DateHeurEdit)='".$DatSelect."'
											AND   transaction.IdCompte=compteb.IdCompte
											AND   concerner.IdFrais=frais.IdFrais
											AND   concerner.IdTransact=transaction.IdTransact
											AND   transaction.EtatTranasct=1";

											$conn=new connect();
										$resultat=$conn-> fx_lecture($requete);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
							}
				////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						    function fx_TransfertAgenc_Date($IdAgence,$Cdate){

						    	$reqt="select transfert.Idtransfert, transfert.IdTransact_E, transfert.IdTransact_B, transaction.MontantTransact, transaction.DateHeurEdit, plage.TypePlage, plage.MonntantPlage, agence.NomAgence
										from transfert, effectuer, transaction, plage, agence
										where effectuer.IdAgence='".$IdAgence."'
										AND DATE(transaction.DateHeurEdit)='".$Cdate."'
										AND transfert.IdPlage=plage.IdPlage
										AND transfert.EtatTransfert=1
										group by transaction.Sens, transaction.CodeTypeTransact, transaction.CodeMonnaie";

										$conn=new connect();
										$resultat=$conn-> fx_lecture($reqt);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
							}
				////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				            function fx_TransactionDate($madate){
				            		$this->dateT=$madate;
							$requete="select transaction.IdTransact,
										transaction.MontantTransact,                    
										transaction.Sens,
										transaction.DateHeurEdit,
										transaction.MoyenTransact,
										monnaie.Libmonnaie,
										typetransaction.LibTypeTransact,
										compteb.NumCompte
										
										from  transaction, monnaie, typetransaction, compteb
										where DATE(transaction.DateHeurEdit) = '".$this->dateT."' 
										AND transaction.IdCompte=compteb.IdCompte 
										AND	transaction.CodeTypeTransact = typetransaction.CodeTypeTransact
										AND	transaction.CodeMonnaie=monnaie.CodeMonnaie
										order by transaction.DateHeurEdit ASC";
																							
										$conn=new connect();
										$resultat=$conn-> fx_lecture($requete);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
							}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				           function fx_AnnulerTransfert($Idtransfert,$EtatTransfert){
				            	$this->IDTRANSFERT=$idtransfert;
									$this->etatTransf=$EtatTransfert;
									//annuler transfert
									$requete="update transfert set EtatTransfert=0
						            where idtransfert='".$this->IDTRANSFERT."'";
									$conn=new connect();
									$resultat=$conn-> fx_modifier($requete);
									
							}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				           function fx_AnnulerTransaction($Idtransfert,$EtatTransfert){
				            	$this->idT=$IdTransact;
								$this->EtatT=$EtatTranasct;
								//modification etat transaction
								$requete="update transaction set EtatTransact='".$this->EtatT."' where IdTransact='".$this->idT."'";
								echo $requete; 
								$conn=new connect();
								$resultat=$conn-> fx_modifier($requete);
								
								if($resultat){
									return $resultat;
								}else{
									return false;
								}
									
							}
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

				function fx_DernierTransactionTransfert($NumCompte){

				            		$requete="select transaction.DateHeurEdit, 
				            					transaction.MontantTransact, 
				            					monnaie.LibMonnaie,
				            					transaction.MoyenTransact,
												compteb.NumCompte
												from transaction, compteb, monnaie, transfert
												where compteb.NumCompte='".$NumCompte."'4589632
												AND transfert.IdTransact_B=transaction.IdTransact
												AND transaction.CodeMonnaie=monnaie.CodeMonnaie
												AND transaction.EtatTransact=1
												order by transaction.IdTransact DESC LIMIT 1";
												
										$conn=new connect();
										$resultat=$conn-> fx_lecture($requete);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
						} 
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////
						function fx_DernierTransaction($IdTransact,$NumCompte){

				            		$requete="select transaction.DateHeurEdit, 
				            					transaction.MontantTransact, 
				            					monnaie.LibMonnaie,
				            					transaction.MoyenTransact,
												compteb.NumCompte, 
												typetransaction.LibTypeTransact 
												from transaction, compteb,typetransaction, monnaie
												where compteb.NumCompte='".$NumCompte."'
												AND transaction.CodeMonnaie=monnaie.CodeMonnaie
												AND transaction.CodeTypeTransact=typetransaction.CodeTypeTransact
												AND transaction.EtatTransact=1
												order by IdTransact DESC LIMIT 1";
												
										$conn=new connect();
										$resultat=$conn-> fx_lecture($requete);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
						} 
				
				////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						function fx_Ajouter_FraisTransact($IdTransact,$IdFrais,$Montant,$CodeMonnaie){
										 $this->IdTrans=$IdTransact;
										 $this->idfrais=$IdFrais;
										 $this->montant=$Montant;
										 $this->codemonnaie=$CodeMonnaie;
										 //insertion transfert
										 $requete='insert into concerner(IdTransact,IdFrais,Montant,CodeMonnaie) values("'.$this->IdTrans.'","'.$this->idfrais.'","'.$this->montant.'","'.$this->codemonnaie.'")';
										 
										$conn=new connect();
										$resultat=$conn-> fx_ecriture($requete);
										if($resultat){
										  return $resultat;
										}else{
										return false;
										}
																								  
								 }
				////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						function fx_Ajouter_FraisSMS($IdTransact,$IdFrais,$Montant,$CodeMonnaie){
										 $this->IdTrans=$IdTransact;
										 $this->idfrais=$IdFrais;
										 $this->montant=$Montant;
										 $this->codemonnaie=$CodeMonnaie;
										 //insertion transfert
										 $requete='insert into concerner(IdTransact,IdFrais,Montant,CodeMonnaie) values("'.$this->IdTrans.'","'.$this->idfrais.'","'.$this->montant.'","'.$this->codemonnaie.'")';
										 
										$conn=new connect();
										$resultat=$conn-> fx_ecriture($requete);
										if($resultat){
										  return $resultat;
										}else{
										return false;
										}
																								  
								 }
				////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						function fx_InsererEffectuer($IdAgent,$IdTransact,$IdAgence){
										 $this->idagent=$IdAgent;
										 $this->IdTrans=$IdTransact;
										 $this->idagence=$IdAgence;
										 //insertion transfert
										 $requete='insert into effectuer(IdAgent,IdTransact,IdAgence) values("'.$this->idagent.'","'.$this->IdTrans.'","'.$this->idagence.'")';
										 
										$conn=new connect();
										$resultat=$conn-> fx_ecriture($requete);
										if($resultat){
										  return $resultat;
										}else{
										return false;
										}
																								  
								 }
						 

				////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						    function fx_DepotAgenc_Date($IdAgence,$DatDeb,$DateFin){

						    	$reqt="select 
						    				transaction.IdTransact,
						    				transaction.CodeTypeTransact, 	
						    				transaction.MontantTransact AS Total,
						    				transaction.CodeMonnaie,
						    				transaction.MoyenTransact,
						    				transaction.IdCompte, 
						    				transaction.DateTransact,
						    				transaction.EtatTransact,
						    				compteb.IdCompte,
						    				compteb.NumCompte,
						    				effectuer.IdAgence,
						    				agent.NomAg,
						    				agent.PrenomAg,
						    				agence.NomAgence
										from transaction,compteb,effectuer,agent,agence
										where effectuer.IdAgence='".$IdAgence."'
										AND DATE(transaction.DateTransact) BETWEEN '".$DatDeb."' AND '".$DateFin."'
										AND transaction.CodeTypeTransact='Depot'
										AND effectuer.IdAgence=agence.IdAgence
										AND effectuer.IdAgent = agent.IdAgent
										AND effectuer.IdTransact=transaction.IdTransact
										AND compteb.IdCompte=transaction.IdCompte
										AND transaction.EtatTransact=1
										order by transaction.DateTransact DESC";
								//echo $reqt;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($reqt);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
							}
				////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						    function fx_DepotAgences_Date($DatDeb,$DateFin){

						    	$reqt="select 
						    				transaction.IdTransact,
						    				transaction.CodeTypeTransact, 	
						    				transaction.MontantTransact AS Total,
						    				transaction.CodeMonnaie,
						    				transaction.MoyenTransact,
						    				transaction.IdCompte, 
						    				transaction.DateTransact,
						    				transaction.EtatTransact,
						    				effectuer.IdAgence
										from transaction,effectuer
										where DATE(transaction.DateTransact) BETWEEN '".$DatDeb."' AND '".$DateFin."'
										AND transaction.CodeTypeTransact='Depot'
										AND effectuer.IdTransact=transaction.IdTransact
										AND transaction.EtatTransact=1
										group by transaction.IdTransact
										order by transaction.DateTransact DESC";
								//echo $reqt;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($reqt);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
							}
				////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						    function fx_DepotAgencDate_SUM($IdAgence,$DatDeb,$DateFin){

						    	$reqt="select 
						    				COUNT(transaction.IdTransact) AS Nbre,
						    				transaction.CodeTypeTransact, 	
						    				SUM(transaction.MontantTransact) AS Total,
						    				transaction.CodeMonnaie,
						    				transaction.MoyenTransact,
						    				transaction.IdCompte, 
						    				transaction.DateTransact,
						    				transaction.EtatTransact,
						    				compteb.IdCompte,
						    				compteb.NumCompte,
						    				effectuer.IdAgence
										from transaction,compteb,effectuer
										where effectuer.IdAgence='".$IdAgence."'
										AND DATE(transaction.DateTransact) BETWEEN '".$DatDeb."' AND '".$DateFin."'
										AND transaction.CodeTypeTransact='Depot'
										AND effectuer.IdTransact=transaction.IdTransact
										AND compteb.IdCompte=transaction.IdCompte
										AND transaction.EtatTransact=1
										group by transaction.CodeMonnaie
										order by transaction.CodeMonnaie";
								//echo $reqt;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($reqt);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
							}
					////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						    function fx_DepotAgencesDate_SUM($DatDeb,$DateFin){

						    	$reqt="select 
						    				COUNT(transaction.IdTransact) AS Nbre,
						    				transaction.CodeTypeTransact, 	
						    				SUM(transaction.MontantTransact) AS Total,
						    				transaction.CodeMonnaie,
						    				transaction.MoyenTransact,
						    				transaction.IdCompte, 
						    				transaction.DateTransact,
						    				transaction.EtatTransact
										from transaction
										where DATE(transaction.DateTransact) BETWEEN '".$DatDeb."' AND '".$DateFin."'
										AND transaction.CodeTypeTransact='Depot'
										AND transaction.EtatTransact=1
										group by transaction.CodeMonnaie
										order by transaction.CodeMonnaie";
								//echo $reqt;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($reqt);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
							}
					////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						    function fx_DepotAgencDate_SUMJr($IdAgence,$Cdate){

						    	$reqt="select 
						    				COUNT(transaction.IdTransact) AS Nbre,
						    				transaction.CodeTypeTransact, 	
						    				SUM(transaction.MontantTransact) AS Total,
						    				transaction.CodeMonnaie,
						    				transaction.MoyenTransact,
						    				transaction.IdCompte, 
						    				transaction.DateTransact,
						    				transaction.EtatTransact,
						    				compteb.IdCompte,
						    				compteb.NumCompte,
						    				effectuer.IdAgence
										from transaction,compteb,effectuer
										where effectuer.IdAgence='".$IdAgence."'
										AND DATE(transaction.DateTransact) = '".$Cdate."'
										AND transaction.CodeTypeTransact='Depot'
										AND effectuer.IdTransact=transaction.IdTransact
										AND compteb.IdCompte=transaction.IdCompte
										AND transaction.EtatTransact=1
										group by transaction.CodeMonnaie
										order by transaction.CodeMonnaie";
								//echo $reqt;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($reqt);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
							}
					////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						    function fx_Rapport_TransactAgc_Jr($IdAgence,$Cdate,$Type,$Sens){

						    	$reqt="select 	
						    				SUM(transaction.MontantTransact) AS Total,
						    				transaction.CodeMonnaie
										from transaction,effectuer
										where effectuer.IdAgence='".$IdAgence."'
										AND DATE(transaction.DateTransact)='".$Cdate."'
										AND transaction.CodeTypeTransact='".$Type."'
										AND transaction.Sens='".$Sens."'
										AND effectuer.IdTransact=transaction.IdTransact
										AND transaction.EtatTransact=1
										group by transaction.CodeMonnaie
										order by transaction.CodeMonnaie";
								//echo $reqt;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($reqt);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
							}
					////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						    function fx_Rapport_TransactAgc_OperatJr($IdAgence,$IdAgent,$Cdate,$Type,$Sens){

						    	$reqt="select 	
						    				SUM(transaction.MontantTransact) AS Total,
						    				transaction.CodeMonnaie
										from transaction,effectuer
										where effectuer.IdAgence='".$IdAgence."'
										AND effectuer.IdAgent='".$IdAgent."'
										AND DATE(transaction.DateTransact)='".$Cdate."'
										AND transaction.CodeTypeTransact='".$Type."'
										AND transaction.Sens='".$Sens."'
										AND effectuer.IdTransact=transaction.IdTransact
										AND transaction.EtatTransact=1
										group by transaction.CodeMonnaie
										order by transaction.CodeMonnaie";
								//echo $reqt;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($reqt);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
							}
					////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						    function fx_RapportGlob_Transact_Jr($Cdate,$Type,$Sens){

						    	$reqt="select 	
						    				SUM(transaction.MontantTransact) AS Total,
						    				transaction.CodeMonnaie
										from transaction
										where DATE(transaction.DateTransact)='".$Cdate."'
										AND transaction.CodeTypeTransact='".$Type."'
										AND transaction.Sens='".$Sens."'
										AND transaction.EtatTransact=1
										group by transaction.CodeMonnaie
										order by transaction.CodeMonnaie";
								//echo $reqt;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($reqt);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
							}
					////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						    function fx_RapportGlob_Transact_Date($DatDeb,$DateFin,$Type,$Sens){

						    	$reqt="select 	
						    				SUM(transaction.MontantTransact) AS Total,
						    				transaction.CodeMonnaie
										from transaction
										where DATE(transaction.DateTransact) BETWEEN '".$DatDeb."' AND '".$DateFin."'
										AND transaction.CodeTypeTransact='".$Type."'
										AND transaction.Sens='".$Sens."'
										AND transaction.EtatTransact=1
										group by transaction.CodeMonnaie
										order by transaction.CodeMonnaie";
								//echo $reqt;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($reqt);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
							}
					////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						    function fx_Rapport_TransactAgc_Date($IdAgence,$DatDeb,$DateFin,$Type,$Sens){

						    	$reqt="select 
						    				transaction.CodeTypeTransact, 	
						    				SUM(transaction.MontantTransact) AS Total,
						    				transaction.CodeMonnaie
										from transaction,compteb,effectuer
										where effectuer.IdAgence='".$IdAgence."'
										AND DATE(transaction.DateTransact) BETWEEN '".$DatDeb."' AND '".$DateFin."'
										AND transaction.CodeTypeTransact='".$Type."'
										AND transaction.Sens='".$Sens."'
										AND effectuer.IdTransact=transaction.IdTransact
										AND compteb.IdCompte=transaction.IdCompte
										AND transaction.EtatTransact=1
										group by transaction.CodeMonnaie
										order by transaction.CodeMonnaie";
								//echo $reqt;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($reqt);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
							}
					////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						    function fx_Rapport_TransactAgc_OperatDate($IdAgence,$IdAgent,$DatDeb,$DateFin,$Type,$Sens){

						    	$reqt="select 
						    				transaction.CodeTypeTransact, 	
						    				SUM(transaction.MontantTransact) AS Total,
						    				transaction.CodeMonnaie
										from transaction,compteb,effectuer
										where effectuer.IdAgence='".$IdAgence."'
										AND effectuer.IdAgent='".$IdAgent."'
										AND DATE(transaction.DateTransact) BETWEEN '".$DatDeb."' AND '".$DateFin."'
										AND transaction.CodeTypeTransact='".$Type."'
										AND transaction.Sens='".$Sens."'
										AND effectuer.IdTransact=transaction.IdTransact
										AND compteb.IdCompte=transaction.IdCompte
										AND transaction.EtatTransact=1
										group by transaction.CodeMonnaie
										order by transaction.CodeMonnaie";
								//echo $reqt;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($reqt);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
							}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
					 function fx_RapportCommis_AgcJour($IdAgence,$Cdate){ 
					$requete="select 
								COUNT(concerner.IdTransact) AS Nbre,
			    				SUM(concerner.Montant) AS Total,
			    				concerner.CodeMonnaie
							  from transaction,effectuer,transaction AS TransactS, transaction AS TransactE, concerner 
							  where effectuer.IdAgence='".$IdAgence."'
							  AND DATE(transaction.DateTransact) = '".$Cdate."'
							  AND effectuer.IdTransact=transaction.IdTransact
							  AND transaction.CodeTypeTransact='Transfert'
							  AND transaction.Sens='S'
							  AND concerner.IdTransact=transaction.IdTransact
							  AND concerner.IdTransactS=TransactS.IdTransact
							  AND concerner.IdTransactE=TransactE.IdTransact
							  group by concerner.IdTransact
							  AND transaction.EtatTransact=1
							  order by transaction.IdTransact";
						//echo $requete;
								$conn=new connect();
								$resultat=$conn-> fx_lecture($requete);
								if ($resultat){
									
									return $resultat;
													
									} else{
									
										 return false;
								}
					}

					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
					 function fx_RapportCommis_GlobJour($Cdate){ 
					$requete="select 
								COUNT(concerner.IdTransact) AS Nbre,
			    				SUM(concerner.Montant) AS Total,
			    				concerner.CodeMonnaie
							  from transaction,transaction AS TransactS, transaction AS TransactE, concerner 
							  where DATE(transaction.DateTransact) = '".$Cdate."'
							  AND transaction.CodeTypeTransact='Transfert'
							  AND transaction.Sens='S'
							  AND concerner.IdTransact=transaction.IdTransact
							  AND concerner.IdTransactS=TransactS.IdTransact
							  AND concerner.IdTransactE=TransactE.IdTransact
							  group by concerner.IdTransact
							  AND transaction.EtatTransact=1
							  order by transaction.IdTransact";
						//echo $requete;
								$conn=new connect();
								$resultat=$conn-> fx_lecture($requete);
								if ($resultat){
									
									return $resultat;
													
									} else{
									
										 return false;
								}
					}

					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
					 function fx_RapportCommis_GlobDate($DatDeb,$DateFin){ 
					$requete="select 
								COUNT(concerner.IdTransact) AS Nbre,
			    				SUM(concerner.Montant) AS Total,
			    				concerner.CodeMonnaie
							  from transaction,transaction AS TransactS, transaction AS TransactE, concerner 
							  where DATE(transaction.DateTransact) BETWEEN '".$DatDeb."' AND '".$DateFin."'
							  AND transaction.CodeTypeTransact='Transfert'
							  AND transaction.Sens='S'
							  AND concerner.IdTransact=transaction.IdTransact
							  AND concerner.IdTransactS=TransactS.IdTransact
							  AND concerner.IdTransactE=TransactE.IdTransact
							  group by concerner.IdTransact
							  AND transaction.EtatTransact=1
							  order by transaction.IdTransact";
						//echo $requete;
								$conn=new connect();
								$resultat=$conn-> fx_lecture($requete);
								if ($resultat){
									
									return $resultat;
													
									} else{
									
										 return false;
								}
					}

					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
					 function fx_RapportCommisAgc_OperatJour($IdAgence,$IdAgent,$Cdate){ 
					$requete="select 
								COUNT(concerner.IdTransact) AS Nbre,
			    				SUM(concerner.Montant) AS Total,
			    				concerner.CodeMonnaie
							  from transaction,effectuer,transaction AS TransactS, transaction AS TransactE, concerner 
							  where effectuer.IdAgence='".$IdAgence."'
							  AND effectuer.IdAgent='".$IdAgent."'
							  AND DATE(transaction.DateTransact) = '".$Cdate."'
							  AND effectuer.IdTransact=transaction.IdTransact
							  AND transaction.CodeTypeTransact='Transfert'
							  AND transaction.Sens='S'
							  AND concerner.IdTransact=transaction.IdTransact
							  AND concerner.IdTransactS=TransactS.IdTransact
							  AND concerner.IdTransactE=TransactE.IdTransact
							  group by concerner.IdTransact
							  AND transaction.EtatTransact=1
							  order by transaction.IdTransact";
						//echo $requete;
								$conn=new connect();
								$resultat=$conn-> fx_lecture($requete);
								if ($resultat){
									
									return $resultat;
													
									} else{
									
										 return false;
								}
					}
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
					 function fx_RapportCommis_AgcDate($IdAgence,$DatDeb,$DateFin){ 
					$requete="select 
								COUNT(concerner.IdTransact) AS Nbre,
			    				SUM(concerner.Montant) AS Total,
			    				concerner.CodeMonnaie
							  from transaction,effectuer,transaction AS TransactS, transaction AS TransactE, concerner 
							  where effectuer.IdAgence='".$IdAgence."'
							  AND DATE(transaction.DateTransact) BETWEEN '".$DatDeb."' AND '".$DateFin."'
							  AND effectuer.IdTransact=transaction.IdTransact
							  AND transaction.CodeTypeTransact='Transfert'
							  AND transaction.Sens='S'
							  AND concerner.IdTransact=transaction.IdTransact
							  AND concerner.IdTransactS=TransactS.IdTransact
							  AND concerner.IdTransactE=TransactE.IdTransact
							  group by concerner.IdTransact
							  AND transaction.EtatTransact=1
							  order by transaction.IdTransact";
						//echo $requete;
								$conn=new connect();
								$resultat=$conn-> fx_lecture($requete);
								if ($resultat){
									
									return $resultat;
													
									} else{
									
										 return false;
								}
					}

					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
					 function fx_RapportCommisAgc_OperatDate($IdAgence,$IdAgent,$DatDeb,$DateFin){ 
					$requete="select 
								COUNT(concerner.IdTransact) AS Nbre,
			    				SUM(concerner.Montant) AS Total,
			    				concerner.CodeMonnaie
							  from transaction,effectuer,transaction AS TransactS, transaction AS TransactE, concerner 
							  where effectuer.IdAgence='".$IdAgence."'
							  AND effectuer.IdAgent='".$IdAgent."'
							  AND DATE(transaction.DateTransact) BETWEEN '".$DatDeb."' AND '".$DateFin."'
							  AND effectuer.IdTransact=transaction.IdTransact
							  AND transaction.CodeTypeTransact='Transfert'
							  AND transaction.Sens='S'
							  AND concerner.IdTransact=transaction.IdTransact
							  AND concerner.IdTransactS=TransactS.IdTransact
							  AND concerner.IdTransactE=TransactE.IdTransact
							  group by concerner.IdTransact
							  AND transaction.EtatTransact=1
							  order by transaction.IdTransact";
						//echo $requete;
								$conn=new connect();
								$resultat=$conn-> fx_lecture($requete);
								if ($resultat){
									
									return $resultat;
													
									} else{
									
										 return false;
								}
					}

					////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						    function fx_DepotAgencesDate_SUMJr($Cdate){

						    	$reqt="select 
						    				COUNT(transaction.IdTransact) AS Nbre,
						    				transaction.CodeTypeTransact, 	
						    				SUM(transaction.MontantTransact) AS Total,
						    				transaction.CodeMonnaie,
						    				transaction.MoyenTransact,
						    				transaction.IdCompte, 
						    				transaction.DateTransact,
						    				transaction.EtatTransact
										from transaction
										where DATE(transaction.DateTransact) = '".$Cdate."'
										AND transaction.CodeTypeTransact='Depot'
										AND transaction.EtatTransact=1
										group by transaction.CodeMonnaie
										order by transaction.CodeMonnaie";
								//echo $reqt;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($reqt);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
							}
					////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						    function fx_DepotAgencDate_Jour($IdAgence,$Cdate){

						    	$reqt="select 
						    				transaction.IdTransact,
						    				transaction.CodeTypeTransact, 	
						    				transaction.MontantTransact AS Total,
						    				transaction.CodeMonnaie,
						    				transaction.MoyenTransact,
						    				transaction.IdCompte, 
						    				transaction.DateTransact,
						    				transaction.EtatTransact,
						    				compteb.IdCompte,
						    				compteb.NumCompte,
						    				effectuer.IdTransact,
						    				agent.NomAg,
						    				agent.PrenomAg
										from transaction,compteb,effectuer,agent
										where effectuer.IdAgence='".$IdAgence."'
										AND DATE(transaction.DateTransact) = '".$Cdate."'
										AND effectuer.IdTransact=transaction.IdTransact
										AND transaction.CodeTypeTransact='Depot'
										AND effectuer.IdAgent = agent.IdAgent
										AND compteb.IdCompte=transaction.IdCompte
										AND transaction.EtatTransact=1
										order by transaction.DateTransact DESC";
								//echo $reqt;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($reqt);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
							}
							////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						    function fx_ListeDepot_Jour($IdAgence,$Cdate){

						    	$reqt="select 
						    				transaction.IdTransact,
						    				transaction.CodeTypeTransact, 	
						    				transaction.MontantTransact AS Total,
						    				transaction.CodeMonnaie,
						    				transaction.MoyenTransact,
						    				transaction.IdCompte, 
						    				transaction.DateTransact,
						    				transaction.EtatTransact,
						    				compteb.IdCompte,
						    				compteb.NumCompte,
						    				effectuer.IdTransact,
						    				agent.NomAg,
						    				agent.PrenomAg,
						    				agence.NomAgence
										from transaction,compteb,effectuer,agent,agence
										where effectuer.IdAgence='".$IdAgence."'
										AND DATE(transaction.DateTransact) = '".$Cdate."'
										AND effectuer.IdTransact=transaction.IdTransact
										AND effectuer.IdAgence=agence.IdAgence
										AND transaction.CodeTypeTransact='Depot'
										AND effectuer.IdAgent = agent.IdAgent
										AND compteb.IdCompte=transaction.IdCompte
										order by transaction.DateTransact DESC";
								//echo $reqt;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($reqt);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
							}
						////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						    function fx_ListeDepot_Date($IdAgence,$DatDeb,$DateFin){

						    	$reqt="select 
						    				transaction.IdTransact,
						    				transaction.CodeTypeTransact, 	
						    				transaction.MontantTransact AS Total,
						    				transaction.CodeMonnaie,
						    				transaction.MoyenTransact,
						    				transaction.IdCompte, 
						    				transaction.DateTransact,
						    				transaction.EtatTransact,
						    				compteb.IdCompte,
						    				compteb.NumCompte,
						    				effectuer.IdTransact,
						    				agent.NomAg,
						    				agent.PrenomAg,
						    				agence.NomAgence
										from transaction,compteb,effectuer,agent,agence
										where effectuer.IdAgence='".$IdAgence."'
										AND DATE(transaction.DateTransact) BETWEEN '".$DatDeb."' AND '".$DateFin."' 
										AND effectuer.IdTransact=transaction.IdTransact
										AND effectuer.IdAgence=agence.IdAgence
										AND transaction.CodeTypeTransact='Depot'
										AND effectuer.IdAgent = agent.IdAgent
										AND compteb.IdCompte=transaction.IdCompte
										order by transaction.DateTransact DESC";
								//echo $reqt;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($reqt);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
							}
							////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						    function fx_DepotAgencesDate_Jour($Cdate){

						    	$reqt="select 
						    				transaction.IdTransact,
						    				transaction.CodeTypeTransact, 	
						    				SUM(transaction.MontantTransact) AS Total,
						    				transaction.CodeMonnaie,
						    				transaction.MoyenTransact,
						    				transaction.IdCompte, 
						    				transaction.DateTransact,
						    				transaction.EtatTransact,
						    				compteb.IdCompte,
						    				compteb.NumCompte,
						    				effectuer.IdTransact,
						    				agence.NomAgence
										from transaction,compteb,effectuer,agence
										where DATE(transaction.DateTransact) = '".$Cdate."'
										AND effectuer.IdTransact=transaction.IdTransact
										AND transaction.CodeTypeTransact='Depot'
										AND effectuer.IdAgence = agence.IdAgence
										AND compteb.IdCompte=transaction.IdCompte
										AND transaction.EtatTransact=1
										group by transaction.CodeMonnaie
										order by transaction.DateTransact DESC";
								//echo $reqt;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($reqt);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
							}

							////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						    function fx_RetraitAgenc_Date($IdAgence,$DatDeb,$DateFin){

						    	$reqt="select 
						    				transaction.IdTransact,
						    				transaction.CodeTypeTransact, 	
						    				transaction.MontantTransact AS Total,
						    				transaction.CodeMonnaie,
						    				transaction.MoyenTransact,
						    				transaction.IdCompte, 
						    				transaction.DateTransact,
						    				transaction.EtatTransact,
						    				compteb.IdCompte,
						    				compteb.NumCompte,
						    				effectuer.IdAgence,
						    				agent.NomAg,
						    				agent.PrenomAg
										from transaction,compteb,effectuer,agent
										where effectuer.IdAgence='".$IdAgence."'
										AND DATE(transaction.DateTransact) BETWEEN '".$DatDeb."' AND '".$DateFin."'
										AND transaction.CodeTypeTransact='Retrait'
										AND effectuer.IdAgent = agent.IdAgent
										AND effectuer.IdTransact=transaction.IdTransact
										AND compteb.IdCompte=transaction.IdCompte
										AND transaction.EtatTransact=1
										order by transaction.DateTransact DESC";
								//echo $reqt;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($reqt);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
							}
						////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						    function fx_RetraitAgences_Date($DatDeb,$DateFin){

						    	$reqt="select 
						    				transaction.IdTransact,
						    				transaction.CodeTypeTransact, 	
						    				SUM(transaction.MontantTransact) AS Total,
						    				transaction.CodeMonnaie,
						    				transaction.MoyenTransact,
						    				transaction.IdCompte, 
						    				transaction.DateTransact,
						    				transaction.EtatTransact,
						    				effectuer.IdAgence,
						    				agence.NomAgence
										from transaction,effectuer,agence
										where DATE(transaction.DateTransact) BETWEEN '".$DatDeb."' AND '".$DateFin."'
										AND transaction.CodeTypeTransact='Retrait'
										AND effectuer.IdAgence = agence.IdAgence
										AND effectuer.IdTransact=transaction.IdTransact
										AND transaction.EtatTransact=1
										group by transaction.CodeMonnaie
										order by transaction.DateTransact DESC";
								//echo $reqt;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($reqt);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
							}
					////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						    function fx_RetraitAgencDate_SUM($IdAgence,$DatDeb,$DateFin){

						    	$reqt="select 
						    				COUNT(transaction.IdTransact) AS Nbre,
						    				transaction.CodeTypeTransact, 	
						    				SUM(transaction.MontantTransact) AS Total,
						    				transaction.CodeMonnaie,
						    				transaction.MoyenTransact,
						    				transaction.IdCompte, 
						    				transaction.DateTransact,
						    				transaction.EtatTransact,
						    				compteb.IdCompte,
						    				compteb.NumCompte,
						    				effectuer.IdAgence
										from transaction,compteb,effectuer
										where effectuer.IdAgence='".$IdAgence."'
										AND DATE(transaction.DateTransact) BETWEEN '".$DatDeb."' AND '".$DateFin."'
										AND transaction.CodeTypeTransact='Retrait'
										AND effectuer.IdTransact=transaction.IdTransact
										AND compteb.IdCompte=transaction.IdCompte
										AND transaction.EtatTransact=1
										group by transaction.CodeMonnaie
										order by transaction.CodeMonnaie";
								//echo $reqt;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($reqt);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
							}
					////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						    function fx_RetraitAgencesDate_SUM($DatDeb,$DateFin){

						    	$reqt="select 
						    				COUNT(transaction.IdTransact) AS Nbre,
						    				transaction.CodeTypeTransact, 	
						    				SUM(transaction.MontantTransact) AS Total,
						    				transaction.CodeMonnaie,
						    				transaction.MoyenTransact,
						    				transaction.IdCompte, 
						    				transaction.DateTransact,
						    				transaction.EtatTransact
										from transaction
										where DATE(transaction.DateTransact) BETWEEN '".$DatDeb."' AND '".$DateFin."'
										AND transaction.CodeTypeTransact='Retrait'
										AND transaction.EtatTransact=1
										group by transaction.CodeMonnaie
										order by transaction.CodeMonnaie";
								//echo $reqt;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($reqt);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
							}
					////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						    function fx_RetraitAgencDate_SUMJr($IdAgence,$Cdate){

						    	$reqt="select 
						    				COUNT(transaction.IdTransact) AS Nbre,
						    				transaction.CodeTypeTransact, 	
						    				SUM(transaction.MontantTransact) AS Total,
						    				transaction.CodeMonnaie,
						    				transaction.MoyenTransact,
						    				transaction.IdCompte, 
						    				transaction.DateTransact,
						    				transaction.EtatTransact,
						    				compteb.IdCompte,
						    				compteb.NumCompte,
						    				effectuer.IdAgence
										from transaction,compteb,effectuer
										where effectuer.IdAgence='".$IdAgence."'
										AND DATE(transaction.DateTransact) = '".$Cdate."'
										AND transaction.CodeTypeTransact='Retrait'
										AND effectuer.IdTransact=transaction.IdTransact
										AND compteb.IdCompte=transaction.IdCompte
										AND transaction.EtatTransact=1
										group by transaction.CodeMonnaie
										order by transaction.CodeMonnaie";
								//echo $reqt;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($reqt);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
							}
					////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						    function fx_RetraitAgencesDate_SUMJr($Cdate){

						    	$reqt="select 
						    				COUNT(transaction.IdTransact) AS Nbre,
						    				transaction.CodeTypeTransact, 	
						    				SUM(transaction.MontantTransact) AS Total,
						    				transaction.CodeMonnaie,
						    				transaction.MoyenTransact,
						    				transaction.IdCompte, 
						    				transaction.DateTransact,
						    				transaction.EtatTransact
										from transaction
										where DATE(transaction.DateTransact) = '".$Cdate."'
										AND transaction.CodeTypeTransact='Retrait'
										AND transaction.EtatTransact=1
										group by transaction.CodeMonnaie
										order by transaction.CodeMonnaie";
								//echo $reqt;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($reqt);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
							}
					////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						    function fx_RetraitAgencDate_Jour($IdAgence,$Cdate){

						    	$reqt="select 
						    				transaction.IdTransact,
						    				transaction.CodeTypeTransact, 	
						    				transaction.MontantTransact AS Total,
						    				transaction.CodeMonnaie,
						    				transaction.MoyenTransact,
						    				transaction.IdCompte, 
						    				transaction.DateTransact,
						    				transaction.EtatTransact,
						    				compteb.IdCompte,
						    				compteb.NumCompte,
						    				effectuer.IdTransact,
						    				agent.NomAg,
						    				agent.PrenomAg
										from transaction,compteb,effectuer,agent
										where effectuer.IdAgence='".$IdAgence."'
										AND DATE(transaction.DateTransact) = '".$Cdate."'
										AND effectuer.IdTransact=transaction.IdTransact
										AND effectuer.IdAgent = agent.IdAgent
										AND transaction.CodeTypeTransact='Retrait'
										AND compteb.IdCompte=transaction.IdCompte
										AND transaction.EtatTransact=1
										order by transaction.DateTransact DESC";
								//echo $reqt;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($reqt);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
							}
					////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						    function fx_RetraitAgencesDate_Jour($Cdate){

						    	$reqt="select 
						    				transaction.IdTransact,
						    				transaction.CodeTypeTransact, 	
						    				SUM(transaction.MontantTransact) AS Total,
						    				transaction.CodeMonnaie,
						    				transaction.MoyenTransact,
						    				transaction.IdCompte, 
						    				transaction.DateTransact,
						    				transaction.EtatTransact,
						    				effectuer.IdTransact,
						    				agence.NomAgence
										from transaction,effectuer,agence
										where DATE(transaction.DateTransact) = '".$Cdate."'
										AND effectuer.IdTransact=transaction.IdTransact
										AND effectuer.IdAgence = agence.IdAgence
										AND transaction.CodeTypeTransact='Retrait'
										AND transaction.EtatTransact=1
										group by transaction.CodeMonnaie
										order by transaction.DateTransact DESC";
								//echo $reqt;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($reqt);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
									
							}
					
				
							 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
							 function fx_rechercheDevise(){ 
							$requete="select * from monnaie where EtatMonnaie=1";
										$conn=new connect();
										$resultat=$conn-> fx_lecture($requete);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
							}
						///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
							 function fx_RechercheTyp_Transaction($CodeTypetransact){ 
							$requete="select * from typetransaction where Configuration=1 AND CodeTypetransact='".$CodeTypetransact."'";
										$conn=new connect();
										$resultat=$conn-> fx_lecture($requete);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
							}
						///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
							 function fx_Recherchefrais($Description,$CodeMonnaie){ 
							$requete="select * from frais,typecompte where frais.Destination=typecompte.LibTypeCompte AND frais.EtatFrais=1 AND frais.Description='".$Description."' AND frais.CodeMonnaie='".$CodeMonnaie."'";
							//echo $requete;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($requete);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
							}
						///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
							 function fx_Frais_Transfert($CodeTypeTransact,$CodeMonnaie){ 
							$requete="select * from frais,typetransaction where frais.CodeTypeTransact=typetransaction.CodeTypetransact AND frais.EtatFrais=1 AND frais.CodeTypeTransact='".$CodeTypeTransact."' AND frais.CodeMonnaie='".$CodeMonnaie."' AND frais.Description <> 'Transfert' AND typetransaction.Configuration='1' order by Description";
							//echo $requete;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($requete);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
							}

						///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
							 function fx_Somme_Frais($CodeTypeTransact,$CodeMonnaie){ 
							$requete="select 
										sum(frais.Montant) AS SOMME, 
										frais.CodeTypetransact, 
										typetransaction.CodeTypetransact, 
										typetransaction.Configuration,
										frais.EtatFrais from frais,
										typetransaction 
									  where frais.CodeTypeTransact=typetransaction.CodeTypetransact 
									  		AND frais.EtatFrais=1 
									  		AND frais.CodeTypeTransact='".$CodeTypeTransact."' 
									  		AND frais.CodeMonnaie='".$CodeMonnaie."' 
									  		AND frais.Description <> 'Transfert' 
									  		AND typetransaction.Configuration='1' 
									  		order by Description";
							//echo $requete;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($requete);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
							}
						///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
							 function fx_JournalTransaction_Depot($CodeTypetransact,$NumCompte){ 
							$requete="select * 
									  from transaction,typetransaction, monnaie, compteb 
									  where transaction.CodeTypeTransact=typetransaction.CodeTypetransact
									  AND transaction.CodeMonnaie=monnaie.CodeMonnaie
									  AND transaction.IdCompte=compteb.IdCompte 
									  AND typetransaction.CodeTypetransact='".$CodeTypetransact."'
									  AND compteb.NumCompte='".$NumCompte."' 
									  AND transaction.EtatTransact=1
									  order by transaction.DateTransact DESC";
							//echo $requete;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($requete);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
							}

						///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
							 function fx_ListeTypeCompte(){ 
							$requete="select * from typetransaction order by CodeTypetransact";
							//echo $requete;
										$conn=new connect();
										$resultat=$conn-> fx_lecture($requete);
										if ($resultat){
											
											return $resultat;
															
											} else{
											
												 return false;
										}
							}

				           function fx_ConfigService($CodeTypetransact,$Configuration){
								//modification etat transaction
								$requete="update typetransaction set Configuration='".$Configuration."' where CodeTypetransact='".$CodeTypetransact."'";
								echo $requete; 
								$conn=new connect();
								$resultat=$conn-> fx_modifier($requete);
								
								if($resultat){
									return $resultat;
								}else{
									return false;
								}
									
							}

			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
				 function fx_JournalTransfert_Compte($IdCompte){ 
				$requete="select * 
						  from transaction,transfert,compteb, transaction as TransactB, client
						  where transaction.IdCompte='".$IdCompte."'
						  AND transaction.CodeTypeTransact='Transfert'
						  AND transaction.IdCompte=compteb.IdCompte
						  AND transaction.IdTransact=transfert.IdTransact_E
						  AND TransactB.IdTransact = transfert.IdTransact_B
						  AND compteb.IdClient = client.IdClient
						  AND transaction.EtatTransact=1
						  AND transfert.EtatTransfert=1
						  order by transaction.DateTransact DESC";
				//echo $requete;
							$conn=new connect();
							$resultat=$conn-> fx_lecture($requete);
							if ($resultat){
								
								return $resultat;
												
								} else{
								
									 return false;
							}
				}				
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
				 function fx_TransfertAgc_Jour($IdAgence,$Cdate){ 
				$requete="select 
							transaction.IdTransact,
		    				transaction.CodeTypeTransact, 	
		    				transaction.MontantTransact AS Total,
		    				transaction.CodeMonnaie,
		    				transaction.MoyenTransact,
		    				transaction.IdCompte, 
		    				transaction.DateTransact,
		    				transaction.EtatTransact,
		    				effectuer.IdTransact,
		    				compteb.NumCompte,
		    				agence.NomAgence
						  from transaction,compteb,effectuer,agence
						  where effectuer.IdAgence='".$IdAgence."'
						  AND DATE(transaction.DateTransact) = '".$Cdate."'
						  AND effectuer.IdTransact=transaction.IdTransact
						  AND effectuer.IdAgence=agence.IdAgence
						  AND transaction.CodeTypeTransact='Transfert'
						  AND transaction.Sens='S'
						  AND transaction.IdCompte=compteb.IdCompte
						  AND transaction.EtatTransact=1
						  order by transaction.IdTransact";
				//echo $requete;
							$conn=new connect();
							$resultat=$conn-> fx_lecture($requete);
							if ($resultat){
								
								return $resultat;
												
								} else{
								
									 return false;
							}
				}	
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
				 function fx_TransfertAgces_Jour($Cdate){ 
				$requete="select 
							transaction.IdTransact,
		    				transaction.CodeTypeTransact, 	
		    				SUM(transaction.MontantTransact) AS Total,
		    				transaction.CodeMonnaie,
		    				transaction.MoyenTransact,
		    				transaction.IdCompte, 
		    				transaction.DateTransact,
		    				transaction.EtatTransact,
		    				effectuer.IdTransact,
		    				agence.NomAgence
						  from transaction,effectuer,agence
						  where DATE(transaction.DateTransact) = '".$Cdate."'
						  AND effectuer.IdTransact=transaction.IdTransact
						  AND effectuer.IdAgence=agence.IdAgence
						  AND transaction.CodeTypeTransact='Transfert'
						  AND transaction.Sens='S'
						  AND transaction.EtatTransact=1
						  group by effectuer.IdAgence
						  order by transaction.IdTransact";
				//echo $requete;
							$conn=new connect();
							$resultat=$conn-> fx_lecture($requete);
							if ($resultat){
								
								return $resultat;
												
								} else{
								
									 return false;
							}
				}	

				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
				 function fx_TransfertAgc_Date($IdAgence,$DatDeb,$DateFin){ 
				$requete="select 
							transaction.IdTransact,
		    				transaction.CodeTypeTransact, 	
		    				transaction.MontantTransact AS Total,
		    				transaction.CodeMonnaie,
		    				transaction.MoyenTransact,
		    				transaction.IdCompte, 
		    				transaction.DateTransact,
		    				transaction.EtatTransact,
		    				effectuer.IdTransact,
		    				agence.NomAgence,
		    				compteb.NumCompte
						  from transaction,compteb,effectuer,agence
						  where effectuer.IdAgence='".$IdAgence."'
						  AND DATE(transaction.DateTransact) BETWEEN '".$DatDeb."' AND '".$DateFin."'
						  AND effectuer.IdAgence=agence.IdAgence
						  AND effectuer.IdTransact=transaction.IdTransact
						  AND transaction.CodeTypeTransact='Transfert'
						  AND transaction.Sens='S'
						  AND transaction.IdCompte=compteb.IdCompte
						  AND transaction.EtatTransact=1
						  order by transaction.IdTransact";
				//echo $requete;
							$conn=new connect();
							$resultat=$conn-> fx_lecture($requete);
							if ($resultat){
								
								return $resultat;
												
								} else{
								
									 return false;
							}
				}

			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
				 function fx_TransfertAgces_Date($DatDeb,$DateFin){ 
				$requete="select 
							transaction.IdTransact,
		    				transaction.CodeTypeTransact, 	
		    				SUM(transaction.MontantTransact) AS Total,
		    				transaction.CodeMonnaie,
		    				transaction.MoyenTransact,
		    				transaction.IdCompte, 
		    				transaction.DateTransact,
		    				transaction.EtatTransact,
		    				agence.NomAgence
						  from transaction,effectuer,agence
						  where DATE(transaction.DateTransact) BETWEEN '".$DatDeb."' AND '".$DateFin."'
						  AND effectuer.IdTransact=transaction.IdTransact
						  AND effectuer.IdAgence=agence.IdAgence
						  AND transaction.CodeTypeTransact='Transfert'
						  AND transaction.Sens='S'
						  AND transaction.EtatTransact=1
						  group by effectuer.IdAgence
						  order by transaction.IdTransact";
				//echo $requete;
							$conn=new connect();
							$resultat=$conn-> fx_lecture($requete);
							if ($resultat){
								
								return $resultat;
												
								} else{
								
									 return false;
							}
				}	

			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
				 function fx_TransfertAgc_SUMJour($IdAgence,$Cdate){ 
				$requete="select 
							COUNT(transaction.IdTransact) AS Nbre,
		    				transaction.CodeTypeTransact, 	
		    				SUM(transaction.MontantTransact) AS Total,
		    				transaction.CodeMonnaie,
		    				transaction.MoyenTransact,
		    				transaction.IdCompte, 
		    				transaction.DateTransact,
		    				transaction.EtatTransact,
		    				effectuer.IdTransact
						  from transaction,effectuer 
						  where effectuer.IdAgence='".$IdAgence."'
						  AND DATE(transaction.DateTransact) = '".$Cdate."'
						  AND effectuer.IdTransact=transaction.IdTransact
						  AND transaction.CodeTypeTransact='Transfert'
						  AND transaction.Sens='S'
						  group by transaction.IdTransact
						  AND transaction.EtatTransact=1
						  order by transaction.IdTransact";
					//echo $requete;
							$conn=new connect();
							$resultat=$conn-> fx_lecture($requete);
							if ($resultat){
								
								return $resultat;
												
								} else{
								
									 return false;
							}
				}

			


			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
				 function fx_TransfertAgces_CommisJour($Cdate){ 
				$requete="select 
							COUNT(concerner.IdTransact) AS Nbre,
		    				SUM(concerner.Montant) AS TotComis,
		    				concerner.CodeMonnaie
						  from transaction,transaction AS TransactS, transaction AS TransactE, concerner 
						  where DATE(transaction.DateTransact) = '".$Cdate."'
						  AND transaction.CodeTypeTransact='Transfert'
						  AND transaction.Sens='S'
						  AND concerner.IdTransact=transaction.IdTransact
						  AND concerner.IdTransactS=TransactS.IdTransact
						  AND concerner.IdTransactE=TransactE.IdTransact
						  group by concerner.IdTransact
						  AND transaction.EtatTransact=1
						  order by transaction.IdTransact";
					//echo $requete;
							$conn=new connect();
							$resultat=$conn-> fx_lecture($requete);
							if ($resultat){
								
								return $resultat;
												
								} else{
								
									 return false;
							}
				}
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
				 function fx_TransfertAgc_CommisDate($IdAgence,$DatDeb,$DateFin){ 
				$requete="select 
							COUNT(concerner.IdTransact) AS Nbre,
		    				SUM(concerner.Montant) AS TotComis,
		    				concerner.CodeMonnaie
						  from transaction,effectuer,transaction AS TransactS, transaction AS TransactE, concerner 
						  where effectuer.IdAgence='".$IdAgence."'
						  AND DATE(transaction.DateTransact) BETWEEN '".$DatDeb."' AND '".$DateFin."'
						  AND effectuer.IdTransact=transaction.IdTransact
						  AND transaction.CodeTypeTransact='Transfert'
						  AND transaction.Sens='S'
						  AND concerner.IdTransact=transaction.IdTransact
						  AND concerner.IdTransactS=TransactS.IdTransact
						  AND concerner.IdTransactE=TransactE.IdTransact
						  group by concerner.IdTransact
						  AND transaction.EtatTransact=1
						  order by transaction.IdTransact";
					//echo $requete;
							$conn=new connect();
							$resultat=$conn-> fx_lecture($requete);
							if ($resultat){
								
								return $resultat;
												
								} else{
								
									 return false;
							}
				}
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
				 function fx_TransfertAgc_CommisJour($IdAgence,$DatDeb){ 
				$requete="select 
							COUNT(concerner.IdTransact) AS Nbre,
		    				SUM(concerner.Montant) AS TotComis,
		    				concerner.CodeMonnaie
						  from transaction,effectuer,transaction AS TransactS, transaction AS TransactE, concerner 
						  where effectuer.IdAgence='".$IdAgence."'
						  AND DATE(transaction.DateTransact) = '".$DatDeb."'
						  AND effectuer.IdTransact=transaction.IdTransact
						  AND transaction.CodeTypeTransact='Transfert'
						  AND transaction.Sens='S'
						  AND concerner.IdTransact=transaction.IdTransact
						  AND concerner.IdTransactS=TransactS.IdTransact
						  AND concerner.IdTransactE=TransactE.IdTransact
						  group by concerner.IdTransact
						  AND transaction.EtatTransact=1
						  order by transaction.IdTransact";
					//echo $requete;
							$conn=new connect();
							$resultat=$conn-> fx_lecture($requete);
							if ($resultat){
								
								return $resultat;
												
								} else{
								
									 return false;
							}
				}
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
				 function fx_TransfertAgces_CommisDate($DatDeb,$DateFin){ 
				$requete="select 
							COUNT(concerner.IdTransact) AS Nbre,
		    				SUM(concerner.Montant) AS TotComis,
		    				concerner.CodeMonnaie
						  from transaction,effectuer,transaction AS TransactS, transaction AS TransactE, concerner 
						  where DATE(transaction.DateTransact) BETWEEN '".$DatDeb."' AND '".$DateFin."'
						  AND effectuer.IdTransact=transaction.IdTransact
						  AND transaction.CodeTypeTransact='Transfert'
						  AND transaction.Sens='S'
						  AND concerner.IdTransact=transaction.IdTransact
						  AND concerner.IdTransactS=TransactS.IdTransact
						  AND concerner.IdTransactE=TransactE.IdTransact
						  group by concerner.IdTransact
						  AND transaction.EtatTransact=1
						  order by transaction.IdTransact";
					//echo $requete;
							$conn=new connect();
							$resultat=$conn-> fx_lecture($requete);
							if ($resultat){
								
								return $resultat;
												
								} else{
								
									 return false;
							}
				}
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
				 function fx_TransfertAgces_SUMJour($Cdate){ 
				$requete="select 
							COUNT(transaction.IdTransact) AS Nbre,
		    				transaction.CodeTypeTransact, 	
		    				SUM(transaction.MontantTransact) AS Total,
		    				transaction.CodeMonnaie,
		    				transaction.MoyenTransact,
		    				transaction.IdCompte, 
		    				transaction.DateTransact,
		    				transaction.EtatTransact
						  from transaction,effectuer
						  where DATE(transaction.DateTransact) = '".$Cdate."'
						  AND effectuer.IdTransact=transaction.IdTransact
						  AND transaction.CodeTypeTransact='Transfert'
						  AND transaction.Sens='S'
						  AND transaction.EtatTransact=1
						  group by transaction.CodeMonnaie
						  order by transaction.IdTransact";
				//echo $requete;
							$conn=new connect();
							$resultat=$conn-> fx_lecture($requete);
							if ($resultat){
								
								return $resultat;
												
								} else{
								
									 return false;
							}
				}

			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
				 function fx_TransfertAgc_SUMDate($IdAgence,$DatDeb,$DateFin){ 
				$requete="select 
							COUNT(transaction.IdTransact) AS Nbre,
		    				transaction.CodeTypeTransact, 	
		    				SUM(transaction.MontantTransact) AS Total,
		    				transaction.CodeMonnaie,
		    				transaction.MoyenTransact,
		    				transaction.IdCompte, 
		    				transaction.DateTransact,
		    				transaction.EtatTransact,
		    				effectuer.IdTransact
						  from transaction,effectuer
						  where effectuer.IdAgence='".$IdAgence."'
						  AND DATE(transaction.DateTransact) BETWEEN '".$DatDeb."' AND '".$DateFin."'
						  AND transaction.Sens='S'
						  AND transaction.CodeTypeTransact='Transfert'
						  AND transaction.IdTransact=effectuer.IdTransact
						  AND transaction.EtatTransact=1
						  group by transaction.CodeMonnaie
						  order by transaction.CodeMonnaie";
				//echo $requete;
							$conn=new connect();
							$resultat=$conn-> fx_lecture($requete);
							if ($resultat){
								
								return $resultat;
												
								} else{
								
									 return false;
							}
				}				

			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
				 function fx_TransfertAgces_SUMDate($DatDeb,$DateFin){ 
				$requete="select 
							COUNT(transaction.IdTransact) AS Nbre,
		    				transaction.CodeTypeTransact, 	
		    				SUM(transaction.MontantTransact) AS Total,
		    				transaction.CodeMonnaie,
		    				transaction.MoyenTransact,
		    				transaction.IdCompte, 
		    				transaction.DateTransact,
		    				transaction.EtatTransact
						  from transaction,effectuer
						  where DATE(transaction.DateTransact) BETWEEN '".$DatDeb."' AND '".$DateFin."'
						  AND effectuer.IdTransact=transaction.IdTransact
						  AND transaction.CodeTypeTransact='Transfert'
						  AND transaction.Sens='S'
						  AND transaction.EtatTransact=1
						  group by transaction.CodeMonnaie
						  order by transaction.IdTransact";
				//echo $requete;
							$conn=new connect();
							$resultat=$conn-> fx_lecture($requete);
							if ($resultat){
								
								return $resultat;
												
								} else{
								
									 return false;
							}
				}				


			} // end transaction
			
			
?>