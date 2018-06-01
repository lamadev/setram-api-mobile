<?php
  class connect{
  /*private $username="userCetram";
  private $mdp="tXBY2B5nPvjdYpx9";*/
  private $username="root";
  private $mdp="root";
  private $dsn='mysql:host=localhost;dbname=setram_lastest';// creation des attribis
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
  }//creation de class
?>