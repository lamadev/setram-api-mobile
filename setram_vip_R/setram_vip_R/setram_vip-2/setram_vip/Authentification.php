<?php
//session_start();
include_once("codes/controles/ControleAuthentification.php");

?>
<!DOCTYPE html>
<html lang="fr">
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Remy NGOY">
    <meta name="description" content="Connexion" />

    <title>
      Authentification
    </title>
    
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- <script src="../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script> -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
  <style>
    body {
      padding-top: 5px;

    }
  #TitrConn{
  color: #f90101;
  font-size: 24px;
  font-style: italic;
  text-align: center;
}
#enregistrer{
  background-color: #f90101;
  color: #fefefe;
  border-radius: 12px 0px 12px 0px;
  box-shadow: 6px 6px 6px #9a9a9a;
  font-size: 16px;
  font-weight: 700;
  padding-top: 5px;
  padding-left: 10px;
  padding-right: 10px;
  padding-bottom: 5px;
  font-style: italic;
}
#Panneau{
  border-radius: 12px 0px 12px 0px;
  box-shadow: 12px 12px 12px 12px #9a9a9a;
  padding-bottom: 60px;
}
@media{
  li{
    font-size:16px;
    font-style:italic;
    font-weight:700;
  }
}
@media{
  label{
    font-size:16px;
    font-style:italic;
    /*padding-top:10px;*/
  }
}
@media{
  #BtnEnvoyer{
    background-color: #f90101;
    color: #fefefe;
    border-radius: 12px 0px 12px 0px;
    box-shadow: 6px 6px 6px #9a9a9a;
    font-size: 16px;
    font-weight: 700;
    padding-top: 5px;
    padding-left: 10px;
    padding-right: 10px;
    padding-bottom: 5px;
    font-style: italic;
  }
}
@media{
  #BtnDeconnex{
    color: #0066ff;
    font-weight: 700;
    font-style: italic;

  }
}
@media{
  #LogoSN{
    border-style: solid;

  }
}
  
  </style>
  
  <body>
   <?php
      // include("en-tete.php");
   ?>  
    <div class="jumbotron" style="padding-top:50px; padding-bottom:50px;">
      <div class="container"> 
          <div class="row">
            <div class="col-md-12">
              <div class="pull-right">
                <h3 style="color:#0066ff; font-weight:700;"><?php //echo $_SESSION['SIGLE']; ?></h3>
              </div>
              <div class="Titre">
                <h3 id="TitrConn">Connectez-vous en toute s&eacute;curit&eacute; </h3><hr />

              </div>
              <div class="row ">
                <form method="POST">
                  <div class="col-md-12">
                    <div class="col-md-4"></div>
                    <div class="col-md-4" id="Panneau" style="padding-top:20px; background-color:#ffffff;">
                      <div align="center">
                      <img src="fichier/site/image/LogoSetram.png" width="200px" height="auto" class="img-circle" id="LogoSN" /><br />
                    </div>
                      <form method="POST" >
                        <div class="form-group <?php if (isset($message_Email)){echo 'has-error';}?>">
                        <label for="Adresse_Authentification">Login</label>
                        
                        <input type="text" class="form-control" style="border-radius:0px" name="LOGIN" id="Adresse_Authentification" placeholder="Login" <?php If (isset($_SESSION['LOGIN'])){echo 'value="'.$_SESSION['LOGIN'].'"'; }?>>
                      </div>
                      <div class="form-group <?php if (isset($message_Mdp1)){echo 'has-error';}?>">
                      <label for="Adresse_Authentification">Mot de passe</label>
                        <input type="password" class="form-control" style="border-radius:0px" id="Motdepasse_Authentification" name="password" placeholder="votre mot de passe">
                      </div>
                      
                         <?php if (isset($Sanction)){ ?>
                        <div class="alert col-lg-offset-1 col-lg-10 alert-danger">
                          <?php echo $Sanction; 
                            //unset ($_SESSION['$message_sanction']); 
                          ?>
                        </div>
                        <?php } ?>
                        <br />
                            <input type="submit" name="Envoyer" class="form-control" value="Envoyer" id="BtnEnvoyer" />
                         
                      </form>
                      <br /><br />
                      <!--<a href="index.php" class="pull-right" style="font-style:italic">Retour &agrave; l'accueil.</a>-->
                    </div>
                  </div>
                </form>
              </div>
            </div>   
          </div>
      </div>
    </div>
      

  <?php //require_once("pied_de_page.php");?>
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
  </body>

</html>