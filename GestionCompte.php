<?php 
include("codes/fonctions/securite.php"); 
include("codes/controles/ControleEtatCompte.php");
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
      #BtnEnvoye,
      #bloquer,
      #debloquer{
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
                  <h2 style="text-align:center">Gestion compte client </h2>
              </div><br /><br />
              <form method="POST" enctype="multipart/form-data" class="form-horizontal">
                                <div class="col-md-12" style="margin-top:10px">
                               <div class="col-md-6" style="border-right:groove">
          
                                
                                     <div class="form-group">   
                                        <label for="textarea" class="control-label col-md-4">Compte : </label>    
                                              <div class="col-md-8">      
                                               <?php
                                               if(isset($_SESSION['NumCompte'])){
                                                echo "<span id='InfosCompte' class='pull-right'>".$_SESSION['NumCompte']."</span>";
                                               }
                                               ?>     
                                              
                                               </div>  
                                      </div>
                                      <div class="form-group">   
                                        <label for="textarea" class="control-label col-md-4">Type compte : </label>    
                                              <div class="col-md-8">      
                                               <?php
                                               if(isset($_SESSION['LibTypeCompte'])){
                                                echo "<span id='InfosCompte' class='pull-right'>".$_SESSION['LibTypeCompte']." "." /"." ".$_SESSION['CodeMonnaie']."</span>";
                                               }
                                               ?>     
                                              
                                               </div>  
                                      </div>
                               
                                 
                                     <div class="form-group">   
                                        <label for="textarea" class="control-label col-md-4">Nom client :</label>    
                                              <div class="col-md-8">        
                                                <?php
                                                 if(isset($_SESSION['Nom'])){
                                                  echo "<span id='InfosCompte' class='pull-right'>".$_SESSION['Nom']." "." ".$_SESSION['Postnom']."</span>";
                                               }
                                               ?>  
                                              </div>  
                                      </div> 
                                  
                                        
                                     <div class="form-group">   
                                        <label for="textarea" class="control-label col-md-4">Phone :</label>    
                                              <div class="col-md-8">        
                                               <?php
                                               if(isset($_SESSION['Phone'])){
                                                echo "<span id='InfosCompte' class='pull-right'>".$_SESSION['Phone']."</span>";
                                               }
                                               ?>
                                              
                                               </div>  
                                      </div> 
                                      
                                   
                                     <div class="form-group">   
                                        <label for="textarea" class="control-label col-md-4">Etat compte :</label> 
                                        <input type="hidden" name="IdCompte" class="form-control" value="<?php echo $_SESSION['IdCompte'];?>" id="IdCompte" /> 
                                        <input type="hidden" name="etatcompte" class="form-control" value="<?php echo $_SESSION['EtatCompte'];?>" id="etatcompte" />  
                                          <div class="col-md-8">        
                                            <?php
                                               if(isset($_SESSION['EtatCompte'])){
                                                if ($_SESSION['EtatCompte']=="1") {
                                                  $Etat="Actif";
                                                  echo "<span id='InfosCompte' class='pull-right'>".$Etat."</span>";
                                                }elseif ($_SESSION['EtatCompte']=="0") {
                                                  $Etat="Bloquer";
                                                  echo "<span id='InfosCompte' class='pull-right'>".$Etat."</span>";
                                                }
                                              }
                                               ?>
                                           </div>  
                                      </div> 
                                   
                                    
                                       
                                  </div>     
                                       
                                               
                  <div class="col-md-4">
                                            
                                            
                 <div class="row"> 
                   <div class="form-group"> 
                      <label for="textarea" class="control-label col-md-4">Solde : </label>   
                       <div class="col-md-8">  
                          <?php
                           if(isset($_SESSION['Solde'])){
                            echo "<span id='InfosCompte' style='color:#f14444;font-weight:700;' class='pull-right'>".$_SESSION['Solde']."</span>";
                           }
                           ?>
                       </div>   
                   </div>             
                  <br/><br/>
                </div>
                <div class="btn-group pull-right" style="padding-top:90px;padding-bottom:10px;padding-right:50px">
                  <div class="row">
                    <div class="col-md-6">
                      <input type="submit" name="bloquer" class="form-control" value="Bloquer" id="bloquer" />
                    </div>
                    <div class="col-md-6">
                      <input type="submit" name="debloquer" class="form-control" value="Debloquer" id="debloquer" />
                    </div>
                  </div>
                </div>

                                    
                </div>
                <br/><br/><br/>

                               
                          </form>
        </div>
      </div>
   </div>
   
    <!-- //////////////////////////////////////////////////////////////////////////////////////// -->
    <?php //require_once("Pied_Page.php");?>
   
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="codes/machine/Machine_Commentaire.js"></script>
    
  </body>

</html>
