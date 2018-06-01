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
				  function fx_creertransaction($MontantTransact,$CodeMonnaie,$Sens,$MoyenTransact,$CodeTypeTransact,$IdCompte,$DateTransact,$EtatTransact){   
					  $this->Montant=$MontantTransact;
					  $this->Codemonnaie=$CodeMonnaie;
					  $this->SensT=$Sens;
					  $this->MoyenT=$MoyenTransact;
					  $this->CodetypeT=$CodeTypeTransact; 
					  $this->IDCOMPTE=$IdCompte;
					  					  
					  //insertion trnasaction
					  $requete='insert into transaction(MontantTransact,CodeMonnaie,Sens,MoyenTransact,CodeTypeTransact,IdCompte,DateTransact,EtatTransact) values("'. $this->Montant.'","'. $this->Codemonnaie.'","'. $this->SensT.'","'. $this->MoyenT.'","'. $this->CodetypeT.'","'. $this->IDCOMPTE.'",CURRENT_TIMESTAMP,1)';
					 //echo $requete;
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
							//echo $requete; 
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
						function fx_creertransfert($IdTransact_E, $IdTransact_B,$IdPlage,$EtatTransfert){
										 $this->IdTransExp=$IdTransact_E;
										 $this->IdTransBen=$IdTransact_B;
										 $this->Plage=$IdPlage;
										 $this->etatTransf=$EtatTransfert;
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
						    function fx_ListeGenTransfert($Cdate){

						    	$reqt="select 
						    				transfert.Idtransfert, 
						    				transfert.IdTransact_E, 
						    				transfert.IdTransact_B, 
						    				transaction.MontantTransact, 
						    				transaction.DateHeurEdit 
										from transfert, effectuer, transaction
										where DATE(transaction.DateHeurEdit)='".$Cdate."'
										AND transaction.IdTransact=transfert.IdTransact_E
										AND transaction.IdTransact=transfert.IdTransact_B
										AND transfert.EtatTransfert=1";
								//echo $reqt;
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
												where compteb.NumCompte='".$NumCompte."'
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
						    function fx_ListeGenDepot_Date($Cdate,$TypeTransact){

						    	$reqt="select 
						    				typetransaction.CodeTypetransact,
						    				typetransaction.LibTypeTransact,
						    				transaction.CodeTypetransact, 	
						    				transaction.MontantTransact,
						    				transaction.CodeMonnaie,
						    				transaction.MoyenTransact,
						    				transaction.IdCompte, 
						    				transaction.DateTransact,
						    				transaction.EtatTransact,
						    				monnaie.CodeMonnaie,
						    				monnaie.Libmonnaie,
						    				compteb.IdCompte,
						    				compteb.NumCompte,
						    				effectuer.IdAgence,
						    				effectuer.IdTransact,
						    				agence.IdAgence,
						    				agence.NomAgence
										from transaction,typetransaction, monnaie, compteb, effectuer, agence
										where DATE(transaction.DateTransact)='".$Cdate."'
										AND transaction.CodeTypeTransact='".$TypeTransact."'
										AND transaction.IdTransact=effectuer.IdTransact
										AND agence.IdAgence=effectuer.IdAgence
										AND typetransaction.CodeTypeTransact=transaction.CodeTypeTransact
										AND monnaie.CodeMonnaie=transaction.CodeMonnaie
										AND compteb.IdCompte=transaction.IdCompte
										AND transaction.EtatTransact=1";
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
						    function fx_DepotAgenc_Date($IdAgence,$Cdate,$TypeTransact){

						    	$reqt="select 
						    				typetransaction.CodeTypetransact,
						    				typetransaction.LibTypeTransact,
						    				transaction.CodeTypetransact, 	
						    				transaction.MontantTransact,
						    				transaction.CodeMonnaie,
						    				transaction.MoyenTransact,
						    				transaction.IdCompte, 
						    				transaction.DateTransact,
						    				transaction.EtatTransact,
						    				monnaie.CodeMonnaie,
						    				monnaie.Libmonnaie,
						    				compteb.IdCompte,
						    				compteb.NumCompte
										from transaction,typetransaction, monnaie, compteb
										where transaction.IdAgence='".$IdAgence."'
										AND DATE(transaction.DateHeurEdit)='".$Cdate."'
										AND transaction.CodeTypeTransact='".$TypeTransact."'
										AND typetransaction.CodeTypeTransact=transaction.CodeTypeTransact
										AND monnaie.CodeMonnaie=transaction.CodeMonnaie
										AND compteb.IdCompte=transaction.IdCompte
										AND transaction.EtatTransact=1";
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
						    function fx_AffichageTransfert_Mensuel($Cmois,$Cannee,$TypeTransact){

						    	$reqt="select 
						    				typetransaction.CodeTypetransact,
						    				typetransaction.LibTypeTransact,
						    				transaction.CodeTypetransact, 	
						    				transaction.MontantTransact,
						    				transaction.CodeMonnaie,
						    				transaction.MoyenTransact,
						    				transaction.IdCompte, 
						    				transaction.DateTransact,
						    				transaction.EtatTransact,
						    				monnaie.CodeMonnaie,
						    				monnaie.Libmonnaie,
						    				compteb.IdCompte,
						    				compteb.NumCompte,
						    				effectuer.IdAgence,
						    				effectuer.IdTransact,
						    				agence.IdAgence,
						    				agence.NomAgence
										from transaction,typetransaction, monnaie, compteb, effectuer, agence
										where MONTH(transaction.DateTransact)='".$Cmois."'
										AND YEAR(transaction.DateTransact)='".$Cannee."'
										AND transaction.CodeTypeTransact='".$TypeTransact."'
										AND transaction.IdTransact=effectuer.IdTransact
										AND agence.IdAgence=effectuer.IdAgence
										AND typetransaction.CodeTypeTransact=transaction.CodeTypeTransact
										AND monnaie.CodeMonnaie=transaction.CodeMonnaie
										AND compteb.IdCompte=transaction.IdCompte
										AND transaction.EtatTransact=1
										order by transaction.DateTransact";
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
						    function fx_AffichageTransfertAgence_Mensuel($IdAgence,$Cmois,$Cannee,$TypeTransact){

						    	$reqt="select 
						    				typetransaction.CodeTypetransact,
						    				typetransaction.LibTypeTransact,
						    				transaction.CodeTypetransact, 	
						    				transaction.MontantTransact,
						    				transaction.CodeMonnaie,
						    				transaction.MoyenTransact,
						    				transaction.IdCompte, 
						    				transaction.DateTransact,
						    				transaction.EtatTransact,
						    				monnaie.CodeMonnaie,
						    				monnaie.Libmonnaie,
						    				compteb.IdCompte,
						    				compteb.NumCompte,
						    				effectuer.IdAgence,
						    				effectuer.IdTransact,
						    				agence.IdAgence,
						    				agence.NomAgence
										from transaction,typetransaction, monnaie, compteb, effectuer, agence
										where effectuer.IdAgence='".$IdAgence."'
										AND MONTH(transaction.DateTransact)='".$Cmois."'
										AND YEAR(transaction.DateTransact)='".$Cannee."'
										AND transaction.CodeTypeTransact='".$TypeTransact."'
										AND transaction.IdTransact=effectuer.IdTransact
										AND agence.IdAgence=effectuer.IdAgence
										AND typetransaction.CodeTypeTransact=transaction.CodeTypeTransact
										AND monnaie.CodeMonnaie=transaction.CodeMonnaie
										AND compteb.IdCompte=transaction.IdCompte
										AND transaction.EtatTransact=1";
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

							///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
						
						    

			} // end transaction
			
			
?>