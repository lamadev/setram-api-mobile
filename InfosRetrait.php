<?php 
  include("codes/fonctions/securite.php"); 
  //include("codes/controles/ControlAnnule_Financement.php");
  //include("codes/controles/Controle_Enreg_Financement.php");
?>

<!DOCTYPE html>
<html lang="fr">
  
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Remy NGOY">
    
    <link rel= "image_src" href= "fichiers/site/image/logoabba1.jpg"/>;
    <link rel="shortcut icon" href="/images/mafavicon.png">
    <style>
      body {
      padding-top: 20px;
    }
    #imgproduits{
      float:left;
    }
  
      
    </style>

    <!--<link rel="stylesheet" type="text/css" media="screen" href="UniCodes/Styles/Liste_Actu.css" />-->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <title>
      Setram.net
    </title>
   
  </head>
  

  <body>
    <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
  <?php require_once("Entete.php");?>
   
    
    <!--*********************Fin du jubomtron1**************************-->
    <div class="container">
              <div class=" col-md-9" style="text-align:justify;">
                    <div class="row">
                          <h2 style="color:#FFF;">Information</h2>
                        </div>
            <div class="row well">
                            <div class="col-sm-8 col-lg-8" style="color:#000000">
                                <?php
                                if(isset($_SESSION['messageconfirm'])){
                                         echo $_SESSION['messageconfirm'];
                                        //unset($_SESSION['messageconfirm']);
                                }else{
                                    header('Location: index.php');
                                }?>
                                <div class="row" style="padding-top:100px;">
                                  <form method="POST" enctype="multipart/form-data">
                                    <div class="col-md-4">
                                        <!--<button class="btn btn-primary" name="annule" style="font-size:14ppx;">
                                        Retour
                                        <span class="" style="padding-left:10px;"></span>
                                      </button>-->
                                    </div>
                                    <!--<div class="col-md-4">
                                      <button class="btn btn-primary" name="annule">
                                        Annuler
                                      </button>
                                    </div>-->
                                  </form>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-4">
                                <img src="fichier/site/image/icone_infos.png" alt="Confirmation" width="200" height="178" class="img-rounded" />
                            </div>
                       </div>
                </div>
                
                
                <div class=" col-md-3">
                  x
                </div>
   
   </div>
   
    <!-- //////////////////////////////////////////////////////////////////////////////////////// -->
    <?php //require_once("Pied_Page.php");?>
   
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
  /*  // When the DOM is ready, run this function
  $(document).ready(function() {
    //Set the carousel options
    $('#quote-carousel').carousel({
    pause: true,
    interval: 7000,
    });
  });*/
  </script>
  </body>

</html>























