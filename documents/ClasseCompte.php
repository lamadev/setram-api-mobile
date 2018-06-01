<?php
// Update du 27 avril 2018

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
				               //echo $requete;
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
				  function fx_CreerSecurite($Signature,$Empreinte,$Empreinteimg,$PIN,$IdCompte){
					  	       $this->Signature=$Signature;
					  	       $this->Empreinte=$Empreinte;
					  	       $this->PIN=$PIN;
					  	       $this->IdCompte=$IdCompte;
					  	       $requete='INSERT INTO securite (Signature, Empreinte, Empreinteimg, PIN, IdCompte) VALUES ('.$this->Signature.', "'.$Empreinte.'", '.$Empreinteimg.',"'.$this->PIN.'", "'.$this->IdCompte.'")';
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
				  function fx_RechecheCompte($NumCompte) {
							$requete = "select compteb.IdCompte,compteb.NumCompte,compteb.Solde, compteb.CodeMonnaie,compteb.CodeTypeCompte,compteb.IdClient,compteb.IdAgence, compteb.DateHeurCree, compteb.EtatCompteB, client.IdClient, client.Nom,client.Postnom,client.Prenom,client.Sexe,client.DateNaiss,client.Phone,client.IdPiece, agence.NomAgence, client.IdImage
							            from compteb,client,agence
										where NumCompte='".$NumCompte."'
										AND client.IdClient=compteb.IdClient
										AND compteb.IdAgence=agence.IdAgence";

							$conn=new connect();
							$Resultat=$conn->fx_lecture($requete);
							if (!$Resultat){
								return false;
							}
							else{
								return $Resultat;
							}
						}
					function fx_RechecheCompteID($IdCompte) {
							$requete = "select compteb.IdCompte,compteb.NumCompte,compteb.Solde, compteb.CodeMonnaie,compteb.CodeTypeCompte,compteb.IdClient,compteb.IdAgence, compteb.DateHeurCree, compteb.EtatCompteB, client.IdClient, client.Nom,client.Postnom,client.Prenom,client.Sexe,client.DateNaiss,client.Phone,client.IdPiece, agence.NomAgence, client.IdImage
							            from compteb,client,agence
										where IdCompte='".$IdCompte."'
										AND client.IdClient=compteb.IdClient
										AND compteb.IdAgence=agence.IdAgence";

							$conn=new connect();
							$Resultat=$conn->fx_lecture($requete);
							if (!$Resultat){
								return false;
							}
							else{
								return $Resultat;
							}
						}
						function fx_Profile_Compte($IdFichier) {
							$requete = "select NomFichier
							            from fichier
										where IdFichier=".$IdFichier;

							$conn=new connect();
							$Resultat=$conn->fx_lecture($requete);
							if ($Resultat){
								while ($row = $Resultat->fetch()) {
										$NomFichier=$row['NomFichier'];
										return $NomFichier;
									}
							}
							else{
								return false;
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

						/*function fx_VerifierSolde_Compte_F($NumCompte){

								$requete="select * from compteb,monnaie where compteb.NumCompte='".$NumCompte."' AND monnaie.CodeMonnaie=compteb.CodeMonnaie";
								//echo $requete;
								$conn=new connect();// preperation de la conexion
								$resultat=$conn-> fx_lecture($requete);
								if ($resultat){
									while($data=$resultat->fetch()){
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
						*/
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
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						/*Code Hornel, un peu different de notre style MVC. ces fonctions se comportent comme des controles*/
						//fx_changer_PIN_2 et fx_login_mobile font appel aux fonctions qui sont plus bas
						function fx_changer_PIN_2($old,$new,$account){

								$conn=new connect();// preperation de la conexion
								$Resultat=$conn->fx_modifier_pin($old,$new,$account);
								echo $Resultat;


							}
							function fx_login_mobile_added($accountadded,$pin){


						$query_get_info="SELECT beneficiairy.Nom AS name, beneficiairy.postnom AS lastname,beneficiairy.prenom AS firstname,beneficiairy.sexe AS sex,beneficiairy.phone AS numberphone,account.NumCompte AS accountNum, account.solde AS balance,type_monney.libmonnaie AS currency,account.IdCompte AS IdCompte,account.CodeMonnaie AS codeCurrency,security.pin as pin FROM compteb AS account JOIN securite AS security ".
							"ON account.IdCompte=security.IdCompte JOIN monnaie AS type_monney ON account.CodeMonnaie=type_monney.CodeMonnaie JOIN client AS beneficiairy ON account.IdClient=beneficiairy.IdClient WHERE security.PIN=:pin AND account.NumCompte=:idc";

								  try{
				  	//echo $old;
							$db=new PDO("mysql:host=localhost;dbname=setramvip","testsetram","tX5ErtcwAnVd7vYT", array( 1002 => 'SET NAMES utf8'));

							$query_prepare_fetch=$db->prepare($query_get_info);
							$query_prepare_fetch->execute
							(
							  array
							  (
								"pin"=>$pin,
								"idc"=>$accountadded
							  )
							);
							$arrayInfo=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);
							$account_id=$arrayInfo[0]->IdCompte;
              $query_transacts="SELECT * FROM transaction AS transacts LEFT JOIN transfert AS transferts ".
              "ON transferts.Idtransact_E=transacts.Idtransact ".
              "WHERE transacts.IdCompte=:account_id AND Sens=:sens AND CodeTypeTransact<>'Frais' ORDER BY transacts.Idtransact DESC";

              $query_prepare_fetch=$db->prepare($query_transacts);
              $query_prepare_fetch->execute
              (
                array
                (
                "account_id"=>$account_id,
                "sens"=>"S"
                )
              );
							$responseTransactsOut=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);
							$arrayHuman=array();
							for ($index=0; $index <sizeof($responseTransactsOut) ; $index++) {
								$Idtransact_out=$responseTransactsOut[$index]->IdTransact_B;
								$query_get_account="SELECT * FROM transaction transactions INNER JOIN compteb account ON ".
													"transactions.IdCompte=account.IdCompte INNER JOIN client AS client  ON client.Idclient=account.IdClient WHERE transactions.Idtransact=:idtransact";

								$query_prepare_fetch=$db->prepare($query_get_account);
								$query_prepare_fetch->execute
								(
								  array
								  (
									"idtransact"=>$Idtransact_out
								  )
								);
							  $arrayHuman=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);
							  $responseTransactsOut[$index]->beneficiairy=$arrayHuman[0];

							}

							$query_transacts="SELECT * FROM transaction AS transacts LEFT JOIN transfert AS transferts ".
							"ON transferts.Idtransact_B=transacts.Idtransact ".
							"WHERE transacts.IdCompte=:account_id AND Sens=:sens CodeTypeTransact<>'Frais' ORDER BY transacts.Idtransact DESC";

							$query_prepare_fetch=$db->prepare($query_transacts);
							$query_prepare_fetch->execute
							(
							  array
							  (
								"account_id"=>$account_id,
								"sens"=>"E"
							  )
							);
							$responseTransactsIn=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);
							for ($index=0; $index < sizeof($responseTransactsIn); $index++) {
			                  $Idtransact_in=$responseTransactsIn[$index]->IdTransact_E;
			                    $query_get_account="SELECT * FROM transaction transactions LEFT JOIN compteb account ON ".
			                                        "transactions.IdCompte=account.IdCompte INNER JOIN client AS client  ON client.Idclient=account.IdClient WHERE transactions.Idtransact=:idtransact";

			                    $query_prepare_fetch=$db->prepare($query_get_account);
			                    $query_prepare_fetch->execute
			                    (
			                      array
			                      (
			                        "idtransact"=>$Idtransact_in
			                      )
			                    );
			                  $arrayHuman=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);
			                  $responseTransactsIn[$index]->beneficiairy=$arrayHuman[0];
                }

							$query_update="UPDATE securite SET PIN=:newpin WHERE IdCompte=:idcpte AND securite.PIN=:oldpin";
							$db->beginTransaction();
							$query_prepare_update=$db->prepare($query_update);
							$query_prepare_update->execute
							(
							  array
							  (
								"newpin"=>$newer,
								"idcpte"=>$arrayInfo[0]->IdCompte,
								"oldpin"=>$old
							  )
							);
							$db->commit();
							$query_tarif="select * from plage,monnaie where plage.CodeMonnaie=monnaie.CodeMonnaie AND plage.EtatPlage=:codePlage order by plage.IdPlage";

							$query_prepare_fetch=$db->prepare($query_tarif);
							$query_prepare_fetch->execute
							(
							  array
							  (
								"codePlage"=>1
							  )
							);
							$responseTarif=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);



							$query_agency="SELECT * FROM agence WHERE EtatAgence=:status";

							$query_prepare_fetch=$db->prepare($query_agency);
							$query_prepare_fetch->execute
							(
							  array
							  (
								"status"=>1
							  )
							);
							$responseAgence=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);
							if (count($arrayInfo)>0) {
									  $response=array
										(
										  "response"=>array("status"=>200,"pin"=>$arrayInfo[0]->pin),
										  "data"=>$arrayInfo[0],
										  "transactionsOut"=>$responseTransactsOut,
										  "transactionsIn"=>$responseTransactsIn,
										  "tarif"=>$responseTarif,
										  "agencies"=>$responseAgence
										);
							}else{
								$response=array
								(
								  "response"=>array("status"=>204,"pin"=>null),
								  "data"=>array(),
								  "tarif"=>array(),
								  "agencies"=>array()
								);
							}

					if (!sizeof($transactionsIn)>1){
						$transactionsIn=[];
					}
					if (!sizeof($transactionsOut)>1){
						$transactionsOut=[];
					}
				   echo json_encode($response);
				  }catch(Exception $e){
			       //echo "Error:"+$e.getMessage();
				   echo  json_encode(array("status"=>500));
				  }





}
						function fx_login_mobile($idcompte,$pin){


						$query_get_info="SELECT beneficiairy.Nom AS name, beneficiairy.postnom AS lastname,beneficiairy.prenom AS firstname,beneficiairy.sexe AS sex,beneficiairy.phone AS numberphone,account.NumCompte AS accountNum, account.solde AS balance,type_monney.libmonnaie AS currency,account.IdCompte AS IdCompte,account.CodeMonnaie AS codeCurrency,security.pin as pin FROM compteb AS account JOIN securite AS security ".
							"ON account.IdCompte=security.IdCompte JOIN monnaie AS type_monney ON account.CodeMonnaie=type_monney.CodeMonnaie JOIN client AS beneficiairy ON account.IdClient=beneficiairy.IdClient WHERE security.PIN=:pin AND account.IdCompte=:idc";

								  try{
				  	//echo $old;
							$db=new PDO("mysql:host=localhost;dbname=setramvip","testsetram","tX5ErtcwAnVd7vYT", array( 1002 => 'SET NAMES utf8'));

							$query_prepare_fetch=$db->prepare($query_get_info);
							$query_prepare_fetch->execute
							(
							  array
							  (
								"pin"=>$pin,
								"idc"=>$idcompte
							  )
							);
							$arrayInfo=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);
							$account_id=$arrayInfo[0]->IdCompte;
              $query_transacts="SELECT * FROM transaction AS transacts LEFT JOIN transfert AS transferts ".
              "ON transferts.Idtransact_E=transacts.Idtransact ".
              "WHERE transacts.IdCompte=:account_id AND Sens=:sens AND CodeTypeTransact<>'Frais' ORDER BY transacts.Idtransact DESC";

              $query_prepare_fetch=$db->prepare($query_transacts);
              $query_prepare_fetch->execute
              (
                array
                (
                "account_id"=>$account_id,
                "sens"=>"S"
                )
              );
							$responseTransactsOut=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);
							$arrayHuman=array();
							for ($index=0; $index <sizeof($responseTransactsOut) ; $index++) {
								$Idtransact_out=$responseTransactsOut[$index]->IdTransact_B;
								$query_get_account="SELECT * FROM transaction transactions INNER JOIN compteb account ON ".
													"transactions.IdCompte=account.IdCompte INNER JOIN client AS client  ON client.Idclient=account.IdClient WHERE transactions.Idtransact=:idtransact";

								$query_prepare_fetch=$db->prepare($query_get_account);
								$query_prepare_fetch->execute
								(
								  array
								  (
									"idtransact"=>$Idtransact_out
								  )
								);
							  $arrayHuman=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);
							  $responseTransactsOut[$index]->beneficiairy=$arrayHuman[0];

							}

							$query_transacts="SELECT * FROM transaction AS transacts LEFT JOIN transfert AS transferts ".
							"ON transferts.Idtransact_B=transacts.Idtransact ".
							"WHERE transacts.IdCompte=:account_id AND Sens=:sens AND CodeTypeTransact<>'Frais' ORDER BY transacts.Idtransact DESC";

							$query_prepare_fetch=$db->prepare($query_transacts);
							$query_prepare_fetch->execute
							(
							  array
							  (
								"account_id"=>$account_id,
								"sens"=>"E"
							  )
							);
							$responseTransactsIn=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);
							for ($index=0; $index < sizeof($responseTransactsIn); $index++) {
			                  $Idtransact_in=$responseTransactsIn[$index]->IdTransact_E;
			                    $query_get_account="SELECT * FROM transaction transactions LEFT JOIN compteb account ON ".
			                                        "transactions.IdCompte=account.IdCompte INNER JOIN client AS client  ON client.Idclient=account.IdClient WHERE transactions.Idtransact=:idtransact";

			                    $query_prepare_fetch=$db->prepare($query_get_account);
			                    $query_prepare_fetch->execute
			                    (
			                      array
			                      (
			                        "idtransact"=>$Idtransact_in
			                      )
			                    );
			                  $arrayHuman=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);
			                  $responseTransactsIn[$index]->beneficiairy=$arrayHuman[0];
                }

							$query_update="UPDATE securite SET PIN=:newpin WHERE IdCompte=:idcpte AND securite.PIN=:oldpin";
							$db->beginTransaction();
							$query_prepare_update=$db->prepare($query_update);
							$query_prepare_update->execute
							(
							  array
							  (
								"newpin"=>$newer,
								"idcpte"=>$arrayInfo[0]->IdCompte,
								"oldpin"=>$old
							  )
							);
							$db->commit();
							$query_tarif="select * from plage,monnaie where plage.CodeMonnaie=monnaie.CodeMonnaie AND plage.EtatPlage=:codePlage order by plage.IdPlage";

							$query_prepare_fetch=$db->prepare($query_tarif);
							$query_prepare_fetch->execute
							(
							  array
							  (
								"codePlage"=>1
							  )
							);
							$responseTarif=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);



							$query_agency="SELECT * FROM agence WHERE EtatAgence=:status";

							$query_prepare_fetch=$db->prepare($query_agency);
							$query_prepare_fetch->execute
							(
							  array
							  (
								"status"=>1
							  )
							);
							$responseAgence=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);
							if (count($arrayInfo)>0) {
									  $response=array
										(
										  "response"=>array("status"=>200,"pin"=>$arrayInfo[0]->pin),
										  "data"=>$arrayInfo[0],
										  "transactionsOut"=>$responseTransactsOut,
										  "transactionsIn"=>$responseTransactsIn,
										  "tarif"=>$responseTarif,
										  "agencies"=>$responseAgence
										);
							}else{
								$response=array
								(
								  "response"=>array("status"=>204,"pin"=>null),
								  "data"=>array(),
								  "tarif"=>array(),
								  "agencies"=>array()
								);
							}

					if (!sizeof($transactionsIn)>1){
						$transactionsIn=[];
					}
					if (!sizeof($transactionsOut)>1){
						$transactionsOut=[];
					}
				   echo json_encode($response);
				  }catch(Exception $e){
			       //echo "Error:"+$e.getMessage();
				   echo  json_encode(array("status"=>500));
				  }


}
						//ces des fonction se deroule comme des controles ils doivent normalement être mudularisé mas je laisse comme ç pour gagner le temps
						function fx_VerifierSolde_Compte($IdCompte){

											$requete="select Solde, CodeMonnaie from compteb where compteb.IdCompte=".$IdCompte;
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
			public function fx_modifier_pin($old,$newer,$account){
				  try{
				  	//echo $old;
							$db=new PDO("mysql:host=localhost;dbname=setramvip","testsetram","tX5ErtcwAnVd7vYT", array( 1002 => 'SET NAMES utf8'));
							$query_get_info="SELECT beneficiairy.Nom AS name, beneficiairy.postnom AS lastname,beneficiairy.prenom AS firstname,beneficiairy.sexe AS sex,beneficiairy.phone AS numberphone,account.NumCompte AS accountNum, account.solde AS balance,type_monney.libmonnaie AS currency,account.IdCompte AS IdCompte,account.CodeMonnaie AS codeCurrency FROM compteb AS account JOIN securite AS security ".
							"ON account.IdCompte=security.IdCompte JOIN monnaie AS type_monney ON account.CodeMonnaie=type_monney.CodeMonnaie JOIN client AS beneficiairy ON account.IdClient=beneficiairy.IdClient WHERE security.PIN=:old AND account.NumCompte=:accountNum";

							$query_prepare_fetch=$db->prepare($query_get_info);
							$query_prepare_fetch->execute
							(
							  array
							  (
								"old"=>$old,
								"accountNum"=>$account
							  )
							);
							$arrayInfo=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);
							$account_id=$arrayInfo[0]->IdCompte;
							$query_transacts="SELECT * FROM transaction AS transacts LEFT JOIN transfert AS transferts ".
							"ON transferts.Idtransact_E=transacts.Idtransact ".
							"WHERE transacts.IdCompte=:account_id AND Sens=:sens AND CodeTypeTransact<>'Frais' ORDER BY transacts.Idtransact DESC";

							$query_prepare_fetch=$db->prepare($query_transacts);
							$query_prepare_fetch->execute
							(
							  array
							  (
								"account_id"=>$account_id,
								"sens"=>"S"
							  )
							);
							$responseTransactsOut=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);
							$arrayHuman=array();
							for ($index=0; $index <sizeof($responseTransactsOut) ; $index++) {
								$Idtransact_out=$responseTransactsOut[$index]->IdTransact_B;
								$query_get_account="SELECT * FROM transaction transactions INNER JOIN compteb account ON ".
													"transactions.IdCompte=account.IdCompte INNER JOIN client AS client  ON client.Idclient=account.IdClient WHERE transactions.Idtransact=:idtransact";

								$query_prepare_fetch=$db->prepare($query_get_account);
								$query_prepare_fetch->execute
								(
								  array
								  (
									"idtransact"=>$Idtransact_out
								  )
								);
							  $arrayHuman=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);
							  $responseTransactsOut[$index]->beneficiairy=$arrayHuman[0];

							}

							$query_transacts="SELECT * FROM transaction AS transacts LEFT JOIN transfert AS transferts ".
							"ON transferts.Idtransact_B=transacts.Idtransact ".
							"WHERE transacts.IdCompte=:account_id AND Sens=:sens AND CodeTypeTransact<>'Frais' ORDER BY transacts.Idtransact DESC";

							$query_prepare_fetch=$db->prepare($query_transacts);
							$query_prepare_fetch->execute
							(
							  array
							  (
								"account_id"=>$account_id,
								"sens"=>"E"
							  )
							);
							$responseTransactsIn=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);
							for ($index=0; $index < sizeof($responseTransactsIn); $index++) {
			                  $Idtransact_in=$responseTransactsIn[$index]->IdTransact_E;
			                    $query_get_account="SELECT * FROM transaction transactions LEFT JOIN compteb account ON ".
			                                        "transactions.IdCompte=account.IdCompte INNER JOIN client AS client  ON client.Idclient=account.IdClient WHERE transactions.Idtransact=:idtransact";

			                    $query_prepare_fetch=$db->prepare($query_get_account);
			                    $query_prepare_fetch->execute
			                    (
			                      array
			                      (
			                        "idtransact"=>$Idtransact_in
			                      )
			                    );
			                  $arrayHuman=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);
			                  $responseTransactsIn[$index]->beneficiairy=$arrayHuman[0];
                }

							$query_update="UPDATE securite SET PIN=:newpin WHERE IdCompte=:idcpte AND securite.PIN=:oldpin";
							$db->beginTransaction();
							$query_prepare_update=$db->prepare($query_update);
							$query_prepare_update->execute
							(
							  array
							  (
								"newpin"=>$newer,
								"idcpte"=>$arrayInfo[0]->IdCompte,
								"oldpin"=>$old
							  )
							);
							$db->commit();
							$query_tarif="select * from plage,monnaie where plage.CodeMonnaie=monnaie.CodeMonnaie AND plage.EtatPlage=:codePlage order by plage.IdPlage";

							$query_prepare_fetch=$db->prepare($query_tarif);
							$query_prepare_fetch->execute
							(
							  array
							  (
								"codePlage"=>1
							  )
							);
							$responseTarif=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);



							$query_agency="SELECT * FROM agence WHERE EtatAgence=:status";

							$query_prepare_fetch=$db->prepare($query_agency);
							$query_prepare_fetch->execute
							(
							  array
							  (
								"status"=>1
							  )
							);
							$responseAgence=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);
							if (count($arrayInfo)>0) {
									  $response=array
										(
										  "response"=>array("status"=>200,"pin"=>$newer),
										  "data"=>$arrayInfo[0],
										  "transactionsOut"=>$responseTransactsOut,
										  "transactionsIn"=>$responseTransactsIn,
										  "tarif"=>$responseTarif,
										  "agencies"=>$responseAgence										);
							}else{
								$response=array
								(
								  "response"=>array("status"=>204,"pin"=>$newer),
								  "data"=>array(),
								  "tarif"=>array(),
								  "agencies"=>array()
								);
							}

					if (!sizeof($transactionsIn)>1){
						$transactionsIn=[];
					}
					if (!sizeof($transactionsOut)>1){
						$transactionsOut=[];
					}
				   echo json_encode($response);
				  }catch(Exception $e){
			       //echo "Error:"+$e.getMessage();
				   echo  json_encode(array("status"=>500));
				  }




				}

				function fx_info_account($idaccount){


						$query_get_info="SELECT beneficiairy.Nom AS name, beneficiairy.postnom AS lastname,beneficiairy.prenom AS firstname,beneficiairy.sexe AS sex,beneficiairy.phone AS numberphone,account.NumCompte AS accountNum, account.solde AS balance,type_monney.libmonnaie AS currency,account.IdCompte AS IdCompte,account.CodeMonnaie AS codeCurrency,security.pin as pin FROM compteb AS account JOIN securite AS security ".
							"ON account.IdCompte=security.IdCompte JOIN monnaie AS type_monney ON account.CodeMonnaie=type_monney.CodeMonnaie JOIN client AS beneficiairy ON account.IdClient=beneficiairy.IdClient WHERE account.IdCompte=:idaccount";

								  try{
				  	//echo $old;
							$db=new PDO("mysql:host=localhost;dbname=setramvip","testsetram","tX5ErtcwAnVd7vYT", array( 1002 => 'SET NAMES utf8'));

							$query_prepare_fetch=$db->prepare($query_get_info);
							$query_prepare_fetch->execute
							(
							  array
							  (
								"idaccount"=>$idaccount,
								//"phone"=>$phone
							  )
							);
							$arrayInfo=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);
							$account_id=$arrayInfo[0]->IdCompte;
              $query_transacts="SELECT * FROM transaction AS transacts LEFT JOIN transfert AS transferts ".
              "ON transferts.Idtransact_E=transacts.Idtransact ".
              "WHERE transacts.IdCompte=:account_id AND Sens=:sens AND CodeTypeTransact<>'Frais' ORDER BY transacts.Idtransact DESC";

              $query_prepare_fetch=$db->prepare($query_transacts);
              $query_prepare_fetch->execute
              (
                array
                (
                "account_id"=>$account_id,
                "sens"=>"S"
                )
              );
							$responseTransactsOut=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);
							$arrayHuman=array();
							for ($index=0; $index <sizeof($responseTransactsOut) ; $index++) {
								$Idtransact_out=$responseTransactsOut[$index]->IdTransact_B;
								$query_get_account="SELECT * FROM transaction transactions INNER JOIN compteb account ON ".
													"transactions.IdCompte=account.IdCompte INNER JOIN client AS client  ON client.Idclient=account.IdClient WHERE transactions.Idtransact=:idtransact";

								$query_prepare_fetch=$db->prepare($query_get_account);
								$query_prepare_fetch->execute
								(
								  array
								  (
									"idtransact"=>$Idtransact_out
								  )
								);
							  $arrayHuman=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);
							  $responseTransactsOut[$index]->beneficiairy=$arrayHuman[0];

							}

							$query_transacts="SELECT * FROM transaction AS transacts LEFT JOIN transfert AS transferts ".
							"ON transferts.Idtransact_B=transacts.Idtransact ".
							"WHERE transacts.IdCompte=:account_id AND Sens=:sens AND CodeTypeTransact<>'Frais' ORDER BY transacts.Idtransact DESC";

							$query_prepare_fetch=$db->prepare($query_transacts);
							$query_prepare_fetch->execute
							(
							  array
							  (
								"account_id"=>$account_id,
								"sens"=>"E"
							  )
							);
							$responseTransactsIn=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);
							for ($index=0; $index < sizeof($responseTransactsIn); $index++) {
			                  $Idtransact_in=$responseTransactsIn[$index]->IdTransact_E;
			                    $query_get_account="SELECT * FROM transaction transactions LEFT JOIN compteb account ON ".
			                                        "transactions.IdCompte=account.IdCompte INNER JOIN client AS client  ON client.Idclient=account.IdClient WHERE transactions.Idtransact=:idtransact";

			                    $query_prepare_fetch=$db->prepare($query_get_account);
			                    $query_prepare_fetch->execute
			                    (
			                      array
			                      (
			                        "idtransact"=>$Idtransact_in
			                      )
			                    );
			                  $arrayHuman=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);
			                  $responseTransactsIn[$index]->beneficiairy=$arrayHuman[0];
                }

							$query_update="UPDATE securite SET PIN=:newpin WHERE IdCompte=:idcpte AND securite.PIN=:oldpin";
							$db->beginTransaction();
							$query_prepare_update=$db->prepare($query_update);
							$query_prepare_update->execute
							(
							  array
							  (
								"newpin"=>$newer,
								"idcpte"=>$arrayInfo[0]->IdCompte,
								"oldpin"=>$old
							  )
							);
							$db->commit();
							$query_tarif="select * from plage,monnaie where plage.CodeMonnaie=monnaie.CodeMonnaie AND plage.EtatPlage=:codePlage order by plage.IdPlage";

							$query_prepare_fetch=$db->prepare($query_tarif);
							$query_prepare_fetch->execute
							(
							  array
							  (
								"codePlage"=>1
							  )
							);
							$responseTarif=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);



							$query_agency="SELECT * FROM agence WHERE EtatAgence=:status";

							$query_prepare_fetch=$db->prepare($query_agency);
							$query_prepare_fetch->execute
							(
							  array
							  (
								"status"=>1
							  )
							);
							$responseAgence=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);
							if (count($arrayInfo)>0) {
									  $response=array
										(
										  "response"=>array("status"=>200,"pin"=>$arrayInfo[0]->pin),
										  "data"=>$arrayInfo[0],
										  "transactionsOut"=>$responseTransactsOut,
										  "transactionsIn"=>$responseTransactsIn,
										  "tarif"=>$responseTarif,
										  "agencies"=>$responseAgence
										);
							}else{
								$response=array
								(
								  "response"=>array("status"=>204,"pin"=>null),
								  "data"=>array(),
								  "tarif"=>array(),
								  "agencies"=>array()
								);
							}

					if (!sizeof($transactionsIn)>1){
						$transactionsIn=[];
					}
					if (!sizeof($transactionsOut)>1){
						$transactionsOut=[];
					}
				   echo json_encode($response);
				  }catch(Exception $e){
			       //echo "Error:"+$e.getMessage();
				   echo  json_encode(array("status"=>500));
				  }




				}

				function getIdCompteBeneficiary($numaccount){
					$db=new PDO("mysql:host=localhost;dbname=setramvip","testsetram","tX5ErtcwAnVd7vYT", array( 1002 => 'SET NAMES utf8'));
							$query_get_info="SELECT IdCompte FROM compteb AS account WHERE account.NumCompte=:numaccount";


							$query_prepare_fetch=$db->prepare($query_get_info);
							$query_prepare_fetch->execute
							(
							  array
							  (
								//"old"=>$old,
								"numaccount"=>$numaccount
							  )
							);
							$response=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);
							return $response[0]->IdCompte;
				}

				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				  function fx_ListCompte_DateCree($DateCree) {
					$requete = "select
									compteb.IdCompte,
									compteb.NumCompte,
									compteb.Solde,
									compteb.CodeMonnaie,
									compteb.CodeTypeCompte,
									compteb.IdClient,
									compteb.IdAgence,
									compteb.EtatCompteB,
									DATE(compteb.DateHeurCree) AS DateCreee,
									TIME(compteb.DateHeurCree) AS HEURES,
									client.IdClient,
									client.Nom,
									client.Postnom,
									client.Prenom,
									client.Sexe,
									client.Phone,
									agence.NomAgence
					            from compteb,client,agence
								where DATE(compteb.DateHeurCree) = '".$DateCree."'
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
				  function fx_ListCompte_Cree_TypeCompte($DateCree,$CodeTypeCompte) {
					$requete = "select
									compteb.IdCompte,
									compteb.NumCompte,
									compteb.Solde,
									compteb.CodeMonnaie,
									compteb.CodeTypeCompte,
									compteb.IdClient,
									compteb.IdAgence,
									compteb.EtatCompteB,
									DATE(compteb.DateHeurCree) AS DateCreee,
									TIME(compteb.DateHeurCree) AS HEURES,
									client.IdClient,
									client.Nom,
									client.Postnom,
									client.Prenom,
									client.Sexe,
									client.Phone,
									agence.NomAgence
					            from compteb,client,agence
								where DATE(compteb.DateHeurCree) = '".$DateCree."'
								AND compteb.CodeTypeCompte = '".$CodeTypeCompte."'
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
				  function fx_ListCompte_DateCree_Agence($DateCree,$IdAgence) {
					$requete = "select
									compteb.IdCompte,
									compteb.NumCompte,
									compteb.Solde,
									compteb.CodeMonnaie,
									compteb.CodeTypeCompte,
									compteb.IdClient,
									compteb.IdAgence,
									compteb.EtatCompteB,
									DATE(compteb.DateHeurCree) AS DateCreee,
									TIME(compteb.DateHeurCree) AS HEURES,
									client.IdClient,
									client.Nom,
									client.Postnom,
									client.Prenom,
									client.Sexe,
									client.Phone,
									agence.NomAgence
					            from compteb,client,agence
								where DATE(compteb.DateHeurCree) = '".$DateCree."'
								AND compteb.IdAgence = '".$IdAgence."'
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
				  function fx_ListCompte_DatesCree($DateDeb,$DateFin) {
					$requete = "select
									compteb.IdCompte,
									compteb.NumCompte,
									compteb.Solde,
									compteb.CodeMonnaie,
									compteb.CodeTypeCompte,
									compteb.IdClient,
									compteb.IdAgence,
									compteb.EtatCompteB,
									DATE(compteb.DateHeurCree) AS DateCreee,
									TIME(compteb.DateHeurCree) AS HEURES,
									client.IdClient,
									client.Nom,
									client.Postnom,
									client.Prenom,
									client.Sexe,
									client.Phone,
									agence.NomAgence
					            from compteb,client,agence
								where DATE(compteb.DateHeurCree) BETWEEN '".$DateDeb."' AND '".$DateFin."'
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
				  function fx_ListCompte_DatesCree_Agence($DateDeb,$DateFin,$IdAgence) {
					$requete = "select
									compteb.IdCompte,
									compteb.NumCompte,
									compteb.Solde,
									compteb.CodeMonnaie,
									compteb.CodeTypeCompte,
									compteb.IdClient,
									compteb.IdAgence,
									compteb.EtatCompteB,
									DATE(compteb.DateHeurCree) AS DateCreee,
									TIME(compteb.DateHeurCree) AS HEURES,
									client.IdClient,
									client.Nom,
									client.Postnom,
									client.Prenom,
									client.Sexe,
									client.Phone,
									agence.NomAgence
					            from compteb,client,agence
								where DATE(compteb.DateHeurCree) BETWEEN '".$DateDeb."' AND '".$DateFin."'
								AND compteb.IdAgence = '".$IdAgence."'
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
				  function fx_ListCompte_Dates_AgenceTypCompte($DateDeb,$DateFin,$IdAgence,$CodeTypeCompte) {
					$requete = "select
									compteb.IdCompte,
									compteb.NumCompte,
									compteb.Solde,
									compteb.CodeMonnaie,
									compteb.CodeTypeCompte,
									compteb.IdClient,
									compteb.IdAgence,
									compteb.EtatCompteB,
									DATE(compteb.DateHeurCree) AS DateCreee,
									TIME(compteb.DateHeurCree) AS HEURES,
									client.IdClient,
									client.Nom,
									client.Postnom,
									client.Prenom,
									client.Sexe,
									client.Phone,
									agence.NomAgence
					            from compteb,client,agence
								where DATE(compteb.DateHeurCree) BETWEEN '".$DateDeb."' AND '".$DateFin."'
								AND compteb.IdAgence = '".$IdAgence."'
								AND compteb.CodeTypeCompte = '".$CodeTypeCompte."'
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
				  function fx_Statistik_CompteDates($DateDeb,$DateFin) {
					$requete = "select
									COUNT(compteb.IdCompte) AS NbrCompte,
									compteb.NumCompte,
									SUM(compteb.Solde) AS Somme,
									compteb.CodeMonnaie,
									compteb.IdAgence,
									compteb.EtatCompteB,
									compteb.DateHeurCree,
									agence.IdAgence,
									agence.NomAgence
					            from compteb,agence
								where DATE(compteb.DateHeurCree) BETWEEN '".$DateDeb."' AND '".$DateFin."'
								AND compteb.IdAgence=agence.IdAgence group by Compteb.IdAgence, CodeMonnaie";
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
				  function fx_Statistik_CompteDates_Agence($DateDeb,$DateFin,$IdAgence) {
					$requete = "select
									COUNT(compteb.IdCompte) AS NbrCompte,
									compteb.NumCompte,
									SUM(compteb.Solde) AS Somme,
									compteb.CodeMonnaie,
									compteb.IdAgence,
									compteb.EtatCompteB,
									compteb.DateHeurCree,
									agence.IdAgence,
									agence.NomAgence
					            from compteb,agence
								where DATE(compteb.DateHeurCree) BETWEEN '".$DateDeb."' AND '".$DateFin."'
								AND compteb.IdAgence = '".$IdAgence."'
								AND compteb.IdAgence=agence.IdAgence group by Compteb.IdAgence, CodeMonnaie";
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
				  function fx_Stat_ComptDates_AgencTypCompte($DateDeb,$DateFin,$IdAgence,$CodeTypeCompte) {
					$requete = "select
									COUNT(compteb.IdCompte) AS NbrCompte,
									compteb.NumCompte,
									SUM(compteb.Solde) AS Somme,
									compteb.CodeMonnaie,
									compteb.IdAgence,
									compteb.EtatCompteB,
									compteb.DateHeurCree,
									agence.IdAgence,
									agence.NomAgence
					            from compteb,agence
								where DATE(compteb.DateHeurCree) BETWEEN '".$DateDeb."' AND '".$DateFin."'
								AND compteb.IdAgence = '".$IdAgence."'
								AND Compteb.CodeTypeCompte = '".$CodeTypeCompte."'
								AND compteb.IdAgence=agence.IdAgence group by Compteb.IdAgence, CodeMonnaie";
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
				  function fx_Statistik_CompteCree($DateCree) {
					$requete = "select
									COUNT(compteb.IdCompte) AS NbrCompte,
									compteb.NumCompte,
									SUM(compteb.Solde) AS Somme,
									compteb.CodeMonnaie,
									compteb.IdAgence,
									compteb.EtatCompteB,
									compteb.DateHeurCree,
									agence.IdAgence,
									agence.NomAgence
					            from compteb,agence
								where DATE(compteb.DateHeurCree) = '".$DateCree."'
								AND compteb.IdAgence=agence.IdAgence group by compteb.IdAgence,compteb.IdAgence order by agence.IdAgence";
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
				  function fx_Statistik_CompteCree_Agence($DateCree,$IdAgence) {
					$requete = "select
									COUNT(compteb.IdCompte) AS NbrCompte,
									compteb.NumCompte,
									SUM(compteb.Solde) AS Somme,
									compteb.CodeMonnaie,
									compteb.IdAgence,
									compteb.EtatCompteB,
									compteb.DateHeurCree,
									agence.IdAgence,
									agence.NomAgence
					            from compteb,agence
								where DATE(compteb.DateHeurCree) = '".$DateCree."'
								AND compteb.IdAgence = '".$IdAgence."'
								AND compteb.IdAgence=agence.IdAgence group by compteb.IdAgence, compteb.CodeMonnaie order by agence.IdAgence";
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
				  function fx_Statistik_CompteCree_TypeCompte($DateCree,$CodeTypeCompte) {
					$requete = "select
									COUNT(compteb.IdCompte) AS NbrCompte,
									compteb.NumCompte,
									SUM(compteb.Solde) AS Somme,
									compteb.CodeMonnaie,
									compteb.IdAgence,
									compteb.EtatCompteB,
									compteb.DateHeurCree,
									agence.IdAgence,
									agence.NomAgence
					            from compteb,agence
								where DATE(compteb.DateHeurCree) = '".$DateCree."'
								AND compteb.CodeTypeCompte = '".$CodeTypeCompte."'
								AND compteb.IdAgence=agence.IdAgence group by compteb.IdAgence, compteb.CodeMonnaie order by agence.IdAgence";
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
				  function fx_Combo_TypeCompte() {
					$requete = "select
									typecompte.CodeTypeCompte,
									typecompte.LibTypeCompte,
									typecompte.EtatTypeCompte
					            from typecompte
								where typecompte.EtatTypeCompte = 1 ";
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




}
?>
