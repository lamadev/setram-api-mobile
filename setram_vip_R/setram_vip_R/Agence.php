<?php 
//include("codes/fonctions/securite.php"); 
include("codes/controles/ControleAgence.php");
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
    @media all{
      #Paneau{
        border-radius: 12px 0px 12px 0px;
          box-shadow: 6px 3px 6px 3px #9a9a9a;
          padding-bottom: 150px;
      }
      #agences{
        background-color: #f14444;
        color: #ffffff;
        border-radius: 12px 12px 12px 12px;
          box-shadow: 6px 3px 6px 3px #9a9a9a;
          padding-bottom: 5px;
        padding-top: 5px;
        
      }
      #TitlPanel{
        font-size: 16px;
        font-weight: 700;
      }
      #BtnEnvoye{
          background-color: #fefefe;
          color: #f90101;
          border-radius: 12px 0px 12px 0px;
          box-shadow: 2px 2px 2px #9a9a9a;
          font-size: 16px;
          font-weight: 700;
          padding-top: 5px;
          padding-left: 20px;
          padding-right: 20px;
          padding-bottom: 5px;
          font-style: italic;
      }
    }
      
    </style>

    <!--<link rel="stylesheet" type="text/css" media="screen" href="UniCodes/Styles/Liste_Actu.css" />-->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <title>
      Setram VIP
    </title>
   
  </head>
  

  <body>

  <?php 
    require_once("entete_page.php");
  ?>
    
    
    <!--*********************Fin du jubomtron1**************************-->
    <div class="container">
      <div class="col-md-12" style="padding-top:50px;">
        <div class="row well" id="Paneau"><br />
          <div id="agences" >
                  <h2 style="text-align:center">Enregistrement Agence </h2>
              </div><br /><br />
              <form method="POST" enctype="multipart/form-data" class="form-horizontal">
                                <div class="col-md-12" style="margin-top:10px">
                               <div class="col-md-6" style="border-right:groove">
          
                                
                                     <div class="form-group">   
                                        <label for="textarea" class="control-label col-md-4">Nom agence : </label>    
                                              <div class="col-md-8">        
                                               <input type="text" class="form-control" name="nom"  <?php if(isset($_POST["nom"])){ echo 'value="'.$_POST["nom"].'"';}?>>
                                               <?php
                                               if(isset($msgNom)){
                                                echo '<p class="help-block">* '.$msgNom.'</p>';
                                               }
                                               ?>     
                                              
                                               </div>  
                                      </div>
                                     <div class="form-group">   
                                        <label for="textarea" class="control-label col-md-4">Téléphone :</label>    
                                              <div class="col-md-8">        
                                               <input type="text" class="form-control" name="Telephone" <?php if(isset($_POST["Telephone"])){ echo 'value="'.$_POST["Telephone"].'"';}?>>
                                            <?php
                                           if(isset($msgtelephone)){
                                            echo '<p class="help-block">* '.$msgtelephone.'</p>';
                                           } 
                                           ?>  
                                              
                                               </div>  
                                      </div>  
                                      <div class="form-group">
                                       <label for="textarea" class="control-label col-md-4">Adresse : </label>
                                           <div class="col-lg-8">        
                                           <input type="text" class="form-control" name="adresse" <?php if(isset($_POST["adresse"])){ echo 'value="'.$_POST["adresse"].'"';}?>>
                                                   <?php
                                                   if(isset($msgadresse)){
                                                    echo '<p class="help-block">* '.$msgadresse.'</p>';
                                                   }
                                                   ?>
                                          </div>  
                                      </div> 
                                      <br /><br /><br />
                                      <div class="btn-group pull-right" style="padding-top:10px;padding-bottom:10px;padding-right:50px">
                                            <input type="submit" name="Enregistrer" class="form-control" value="Enregistrer" id="BtnEnvoye" />
                                          </div>
                                  </div>     
                                       
                                               
                  <div class="col-md-6">
                                            
                                            
                 <div class="row"> 
                      

                                  
                                   
    <br/><br/>
                                          </div>
                                          

                                    
                                      </div>
                                      <br/><br/><br/>

                               
                          </form>
        </div>
      </div>
   </div>

    <?php //require_once("Pied_Page.php");?>
   
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    
  </body>

</html>
