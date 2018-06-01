<?php 
//include("codes/fonctions/securite.php"); 
include("codes/controles/Controle_JournalRetrait.php");
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
  				padding-bottom: 10px;
				padding-top: 5px;
			}
			#TitlPanel{
				font-size: 16px;
				font-weight: 700;
			}
		}
		
			
    </style>

    <!--<link rel="stylesheet" type="text/css" media="screen" href="UniCodes/Styles/Liste_Actu.css" />-->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>
      Setram VIP
    </title>
   
  </head>
  

  <body>

  <?php 
  	require_once("entete_index.php");
  ?>
    
    
    <!--*********************Fin du jubomtron1**************************-->
    <div class="container">
    	<div class="col-md-12" style="padding-top:50px;">
    		<div class="row well" id="Paneau">
    			<div id="agences" >
	                <h2 style="text-align:center">  Journal retraits </h2>
	                <span style="padding-left:10px;"><a href="Reatrait_Mount.php" class="badge bg-primary" style="background-color: #ffffff; color:#f14444;">Retour</a></span>
	            </div>
	            <div class="panel panel-primary">
                                         
                                         <div class="panel-body">
                                           <table class="table table-condensed">
                                           <thead>
                                          
                                               <tr>
                                                  <th>Numero </th>
                                                  <th>Date </th>
                                                  <th>Operation</th>
                                                  <th >Montant</th>
                                                  <th>Moyen utilis&eacute;</th>
                                              
                                              	</tr>
                                              </thead>
                                              <tbody>
                                               <?php
											$serveAc="";
                                           while($data=$ResDepot->fetch()){
										  		 //if ($data['EtatAg']=="1"){
											   ?>
                                               
                                                <tr>
                                                	<td>	
                                                	<?php
												
														echo $data['IdTransact'];
														 
													?>
												  </td>
                                                <td>	
                                                	<?php
												
														echo $data['DateTransact'];
														 
													?>
												  </td>
												  <td>	
                                                	<?php
												
														echo $data['CodeTypeTransact'];
														 
													?>
												  </td>
                                                  <td>
                                                   <?php
												   
                                                      echo $data['CodeMonnaie']." ".$data['MontantTransact']; 
                                                      ?> 
                                                  </td>
                                                  <td>
                                                   <?php
												   
                                                      echo $data['MoyenTransact']; 
                                                      ?> 
                                                  </td>
                                                  
                                                </tr>
                                             <?php
											 	//}
											 }
											  ?>
                                             
                                              </tbody>
                                           
                                           </table>
                                         
                                         </div>
                                   </div>
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
