<?php
include ("ClasseConnexion.php");
class Client {
                  private $IdClient;
				  private $nom;
				  private $Postnom;
				  private $Prenom;
				  private $Sexe;
				  private $DateNaiss;
				  private $Phone;
				  private $Adresse;
				  private $IdTypePiece;
				  //creation des attributs
				  function fx_creerClient($Nom,$Postnom,$Prenom,$Sexe,$DateNaiss,$Phone,$Adresse,$IdTypePiece){
							  $this->nom=$Nom;
							  $this->Postnom=$Postnom;
							  $this->Prenom=$Prenom;
							  $this->Sexe=$Sexe;
							  $this->Datanaiss=$Datenaiss;
							  $this->Phone=$Phone;
							  $this->Adresse=$Adresse;
							  $this->IdTypePiece=$IdTypePiece;
							    $requete="insert into client(Nom,Postnom,Prenom,Sexe,Datenaiss,Phone,Adresse,IdTypePiece) values(".$this->nom."','".$this->Postnom."','".$this->Prenom."','".$this->Sexe."','".$this->Datanaiss."','".$this->Phone."','".$this->Adresse."','".$this->IdTypePiece."')";
								//echo $requete;
								   //insertion des information dans la base de donnees ou preparation de la requete
								$conn=new connect();// preperation de la conexion
		                        $resultat=$conn->fx_ecriture($requete);// execution de la requete
		                        if ($resultat){
		                        return $resultat;
		                         }
		                        else{
		                        return false;
		                        }
		                        //teste de la conexion

				  }
				////////////////////////////////////////////////////////////////////////////////////////////////////////////
				  function fx_CreerType_Piece($LibTypePiece,$NumPiece,$CapturePiece,$DatExpir){
							  
							    $requete="insert into typepiece(LibTypePiece,NumPiece,CapturePiece,DatExpir) values('".$LibTypePiece."','".$NumPiece."','".$CapturePiece."','".$DatExpir."')";
								//echo $requete;
								   //insertion des information dans la base de donnees ou preparation de la requete
								$conn=new connect();// preperation de la conexion
		                        $resultat=$conn->fx_ecriture($requete);// execution de la requete
		                        if ($resultat){
		                        return $resultat;
		                         }
		                        else{
		                        return false;
		                        }
		                        //teste de la conexion

				  }
				////////////////////////////////////////////////////////////////////////////////////////////////////////////
				  function fx_ModiferClient($IdClient,$Nom,$Postnom,$Prenom,$Sexe,$DateNaiss,$Phone,$Adresse,$IdTypePiece){
                              $this->IdClient=$IdClient;
							  $this->nom=$Nom;
							  $this->Postnom=$Postnom;
							  $this->Prenom=$Prenom;
							  $this->Sexe=$Sexe;
							  $this->Datanaiss=$Datenaiss;
							  $this->Phone=$Phone;
							  $this->Adresse=$Adresse;
							  $this->IdTypePiece=$IdTypePiece;
							  $requete="update client set Nom='".$this->nom."',Postnom='".$this->Postnom."',Prenom='".$this->Prenom."',Sexe='".$this->Sexe."',DateNaiss='". $this->Datanaiss."',Phone='".$this->Phone."',Adresse='".$this->Adresse."',IdTypePiece='".$this->IdTypePiece."' where IdClient='".$this->IdClient."' limit 1";
				              //echo $requete;
				              $conn=new connect();// preperation de la conexion (extentier)
		                      $resultat=$conn-> fx_modifier($requete);
				  }

				 //////////////////////////////////////////////////////////////////////////////////////////////////////////
				  function fx_ModiferPhone($IdClient,$Phone){
                              $this->Phone=$Phone;
                              $requete="update client set Phone='".$this->Phone."' where IdClient='".$this->IdClient."' limit 1";
                              //echo $requete;
				              $conn=new connect();// preperation de la conexion (extentier)
		                      $resultat=$conn-> fx_modifier($requete);
				  }
                
				//////////////////////////////////////////////////////////////////////////////////////////////////////////
				  function fx_ChangePIN($IdCompte,$OldPIN,$PIN){
                              $this->idcompte=$IdCompte;
                              $this->oldpin=$OldPIN;
                              $this->pin=$PIN;
                              $requete="update securite set PIN='".$this->pin."' where PIN='".$this->oldpin."' AND IdCompte='".$this->idcompte."' limit 1";
                              //echo $requete;
				              $conn=new connect();// preperation de la conexion (extentier)
		                      $resultat=$conn-> fx_modifier($requete);
				  }
		



	
}
?>