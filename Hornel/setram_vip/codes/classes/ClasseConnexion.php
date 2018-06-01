<?php
  class connect{
  /*private $username="userCetram";
  private $mdp="tXBY2B5nPvjdYpx9";*/
  private $username="root";
  private $mdp="root";
  private $dsn='mysql:host=localhost;dbname=setram_vip';// creation des attribis
  function fx_connexion(){
  try{
	     $this->ckx=new PDO($this->dsn,$this->username,$this->mdp, array( 1002 => 'SET NAMES utf8'));
		 $this->ckx->exec('SET NAMES utf8');
	   }
	   catch(PDOException $e){
	   die("erreur:".$e->getmessage());
	   erreur(ERR_OPERATION);
	   }
  }
  function fx_ecriture($sql){
  $this->fx_connexion();//lancement de la connexion a la basse de donnees
  $this->resultat=$this->ckx->exec($sql);
  $ID=$this->ckx->lastInsertId();
   if ($this->resultat){
   return $ID;
   }else{
   return false;
   }//pour verifier si la requete a reussi
  }
  function fx_lecture($sql){
          $this->fx_connexion();
		  $this->resultat=$this->ckx->query($sql);
	   if($this->resultat){
  return $this->resultat;
   }//pour verifier si la requete a reussi
  }
  function fx_modifier($sql){
    $this->fx_connexion();
	$this->resultat=$this->ckx->exec($sql);
	 if ($this->resultat){
   return $this->resultat;
  }
  }


  public function fx_modifier_pin($old,$newer,$account){
      try{
                $db=new PDO($this->dsn,$this->username,$this->mdp, array( 1002 => 'SET NAMES utf8'));
                $query_get_info="SELECT beneficiairy.Nom AS name, beneficiairy.postnom AS lastname,beneficiairy.prenom AS firstname,beneficiairy.sexe AS sex,beneficiairy.phone AS numberphone,account.NumCompte AS accountNum, account.solde AS balance,type_monney.libmonnaie AS currency,account.IdCompte AS IdCompte FROM compteb AS account JOIN securite AS security ".
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
                $query_transacts="SELECT * FROM transaction AS transacts INNER JOIN transfert AS transferts ".
                "ON transferts.Idtransact_E=transacts.Idtransact ". 
                "WHERE transacts.IdCompte=:account_id ORDER BY transacts.Idtransact DESC";

                $query_prepare_fetch=$db->prepare($query_transacts);
                $query_prepare_fetch->execute
                (
                  array
                  (
                    "account_id"=>$account_id
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
                "WHERE transacts.IdCompte=:account_id AND Sens=:sens ORDER BY transacts.Idtransact DESC";

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
                              "agencies"=>$responseAgence
                            );
                }else{
                    $response=array
                    (
                      "response"=>array("status"=>204,"pin"=>$newer),
                      "data"=>array(),
                      "tarif"=>array(),
                      "agencies"=>array()
                    );
                }
                
                
                
      }catch(Exception $e){

       return json_encode(array("status"=>500));
      }
      
      return json_encode($response);

     
    }

    public function fx_logger_client($query,$uid){
        $db=new PDO($this->dsn,$this->username,$this->mdp, array( 1002 => 'SET NAMES utf8'));
        $query_prepare_fetch=$db->prepare($query);
        $query_prepare_fetch->execute($uid);
        $query_response=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ);
        $account_id=$query_response[0]->IdCompte;

        $query_transacts="SELECT * FROM transaction AS transacts INNER JOIN transfert AS transferts ".
                "ON transferts.Idtransact_E=transacts.Idtransact ". 
                "WHERE transacts.IdCompte=:account_id ORDER BY transacts.Idtransact DESC";

                $query_prepare_fetch=$db->prepare($query_transacts);
                $query_prepare_fetch->execute
                (
                  array
                  (
                    "account_id"=>$account_id
                  )
                );
                $responseTransactsOut=$query_prepare_fetch->fetchAll(PDO::FETCH_OBJ); 
                $query_response[0]->transactionsOut=$responseTransactsOut;



                $query_transacts="SELECT * FROM transaction AS transacts LEFT JOIN transfert AS transferts ".
                "ON transferts.Idtransact_B=transacts.Idtransact ". 
                "WHERE transacts.IdCompte=:account_id AND Sens=:sens ORDER BY transacts.Idtransact DESC";

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
                $query_response[0]->transactionsIn=$responseTransactsIn;




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
                $query_response[0]->tarif=$responseTarif;

               return json_encode($query_response);
    }
  }//creation de class


?>