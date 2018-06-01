<?php 
//include("codes/fonctions/securite.php"); 
include("codes/controles/ControleAgent.php");
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
		
	
	
	
		/*.jumbotron{background-image:url(UniFichiers/Site/Img/Fondju.jpg);}
		#Pied{background-image:url(UniFichiers/Site/Img/Fondju.jpg);}
		.starter-template {
		  padding: 40px 15px;
		}
		.jumbotron{
			margin-bottom:2px;
		}
		.img-responsive,
		.thumbnail > img,
		.thumbnail a > img,
		.carousel-inner > .item > img,
		.carousel-inner > .item > a > img {
		  display: block;
		  width: 100%;
		  height: auto;
		  min-width:250px;

		}

		 ------------------- Carousel Styling -------------------
		
		.carousel-inner {
		  border-radius: 10px;
		}
		
		.carousel-caption  {
		  background-color: rgba(0,0,0,.5);
		  position: absolute;
		  left: 0;
		  right: 0;
		  bottom: 0;
		  z-index: 10;
		  padding: 0 0 10px 20px;
		  color: #fff;
		  text-align: left;
		}
		.carousel-caption a{
			color: #fff;
		} 
		#Les_Indicateur_carousel {
		  position: absolute;
		  bottom: 0;
		  right: 0;
		  left: 0;
		  width: 100%;
		  z-index: 15;
		  margin: 0;
		  padding: 0 25px 25px 0;
		  text-align: right;
		}
		
		.carousel-control.left,
		.carousel-control.right {
		  background-image: none;
		}
		
		
		 ------------------- Section Styling - Not needed for carousel styling ------------------- 

		
		@media screen and (min-width: 768px) {
		
		  .section-white {
			 padding: 1.5em 0;
		  }
		
		}
		
		@media screen and (min-width: 992px) {
		
		  #container_carousel {
			max-width: 100%;
			max-height: 500px;
			min-width:300px;
		  }
		
		}

		.glyphicon { margin-right:5px;}
			.section-box h2 { margin-top:0px;}
			.section-box h2 a { font-size:15px; }
			.glyphicon-heart { color:#e74c3c;}
			.glyphicon-comment { color:#27ae60;}
			.separator { padding-right:5px;padding-left:5px; }
			.section-box hr {margin-top: 0;margin-bottom: 5px;border: 0;border-top: 1px solid rgb(199, 199, 199);}
			*/
		/*#tes{background-image:url(UniFichiers/Site/Img/Fondju.jpg);}*/
			
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
	                <h2 style="text-align:center">Enregistrement Agent </h2>
	            </div><br /><br />
	            <form method="POST" enctype="multipart/form-data" class="form-horizontal">
                                <div class="col-md-12" style="margin-top:10px">
                               <div class="col-md-6" style="border-right:groove">
          
                                
                                     <div class="form-group">   
                                        <label for="textarea" class="control-label col-md-4">Nom : </label>    
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
                                        <label for="textarea" class="control-label col-md-4">Postnom:</label>    
                                              <div class="col-md-8">        
                                               <input type="text" class="form-control" name="postnom" <?php if(isset($_POST["postnom"])){ echo 'value="'.$_POST["postnom"].'"';}?>>
                                            <?php
                                           if(isset($msgpostnom)){
                                            echo '<p class="help-block">* '.$msgpostnom.'</p>';
                                           } 
                                           ?>  
                                              
                                               </div>  
                                      </div> 
                                  
                                        
                                     <div class="form-group">   
                                        <label for="textarea" class="control-label col-md-4">Prenom:</label>    
                                              <div class="col-md-8">        
                                               <input type="text" class="form-control" name="prenom" <?php if(isset($_POST["prenom"])){ echo 'value="'.$_POST["prenom"].'"';}?>>
                                            <?php
                                           if(isset($msgPrenom)){
                                            echo '<p class="help-block">* '.$msgPrenom.'</p>';
                                           } 
                                           ?>  
                                              
                                               </div>  
                                      </div> 
                                      
                                      <div class="form-group" >     
                                          <label for="textarea" class="control-label col-md-4"></label>  
                                                  <div class="col-md-8">
                                                    <label for="Femme" class="radio-inline" >
                                                         <input type="radio"  value="F"  name="sexe" <?php if(isset($_POST["sexe"])){ 
                                                                                                        if($_POST["sexe"]=="F") {
                                                                                                          echo "checked"; 
                                                                                                          }
                                                                                                          }
                                                                                            ?>>   Femme
                                                                                             
                                                       </label>
                                                      	<label for="Homme" class="radio-inline">
                                                                                          
                                                          <input type="radio"  value="M"  name="sexe" <?php if(isset($_POST["sexe"])){ 
                                                                                                        if($_POST["sexe"]=="M") {
                                                                                                          echo "checked"; 
                                                                                                          }
                                                                                                          }
                                                                                            ?>>   Homme
                                                           </label>
                                                                                            <?php
                                                           if(isset($msgsexe)){
                                                            echo '<p class="help-block">* '.$msgsexe.'</p>';
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
                                   <label for="textarea" class="control-label col-md-4">Agence : </label>   
                                       <div class="col-md-8">  
                                      <select name="Agence" class="form-control" >
                                      		<option value="0">Sélectionner un agence</option>        
                                               <?php
                                              while($data=$Tab_Agence->fetch()){
                                              ?>       
                                               <option value="<?php echo $data['IdAgence']; ?>"><?php  echo $data['NomAgence'];?>
                                               </option> 
                                                      
                                               <?php  } ?>          
                                               </select>  
                                       </div>   
                                   </div>  
                                    
                                       
                                  </div>     
                                       
                                               
                  <div class="col-md-6">
                                            
                                            
                 <div class="row"> 

                                   <div class="form-group"> 
                                   	  <label for="textarea" class="control-label col-md-4">Type Agent : </label>   
                                       <div class="col-md-8">  
                                      <select name="TypeAgt" class="form-control" >
                                      		   <option value="0">Sélectionnez un type</option>   
                                               <?php
                                              while($data=$Tab_TypeAgent->fetch()){
                                              ?>       
                                               <option value="<?php echo $data['CodetypeAgent']; ?>"><?php  echo $data['LibTypeAgent'];?>
                                               </option> 
                                                      
                                               <?php  } ?>           
                                       </select>  
                                       </div>   
                                   </div>
                                  
                                   <div class="form-group">
                                   <label for="textarea" class="control-label col-md-4">Compte : </label>
                                       <div class="col-lg-8">        
                                       <input type="text" class="form-control" name="Compte" <?php if(isset($_POST["Compte"])){ echo 'value="'.$_POST["Compte"].'"';}?>>
                                               <?php
                                               if(isset($msgCompte)){
                                                echo '<p class="help-block">* '.$msgCompte.'</p>';
                                               }
                                               ?>
                                      </div>  
                                  </div>
                               
                                   <div class="form-group">
                                   <label for="textarea" class="control-label col-md-4">Mot de passe : </label>
                                       <div class="col-lg-8">        
                                       <input type="password" class="form-control" name="Mdp" <?php if(isset($_POST["Mdp"])){ echo 'value="'.$_POST["Mdp"].'"';}?>>
                                               <?php
                                               if(isset($msgMdp)){
                                                echo '<p class="help-block">* '.$msgMdp.'</p>';
                                               }
                                               ?>
                                      </div>  
                                  </div>
    <br/><br/>
                                          </div>
                                          <div class="btn-group pull-right" style="padding-top:10px;padding-bottom:10px;padding-right:50px">
						                		<input type="submit" name="Enregistrer" class="form-control" value="Enregistrer" id="BtnEnvoye" />
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
