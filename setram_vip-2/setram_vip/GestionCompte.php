<?php 
include("codes/fonctions/securite.php"); 
include("codes/controles/ControleGestionCompte.php");
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
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <title>
      Setram VIP
    </title>
   
  </head>
  

  <body>

  <?php require_once("entete_page.php");
  ?>
    
    
    <!--*********************Fin du jubomtron1**************************-->
    <div class="container">
    	<div class="col-md-12" style="padding-top:50px;">
    		<div class="row well" id="Paneau">
    			<div id="agences" >
	                <h2 style="text-align:center">  Liste générale des comptes clients </h2>
	                <span style="padding-left:10px;"><a href="RechercheCompte.php" class="badge bg-primary" style="background-color: #ffffff; color:#f14444;">Bloquer/ Debloquer compte</a></span>
	            </div>
	            <div class="panel panel-primary">
                                         
                                         <div class="panel-body">
                                           <table class="table table-condensed">
                                           <thead>
                                          
                                               <tr>
                                                  <th>Numero compte </th>
                                                  <th>Monnaie</th>
                                                  <th>Type compte</th>
                                                  <th>Client </th>
                                                  <th>Sexe</th>
                                                  <th>Date cr&eacute;ation compte</th>
                                                  <th>Etat compte</th>
                                              
                                              	</tr>
                                              </thead>
                                              <tbody>
                                               <?php
											$serveAc="";
                                           while($data=$Tab_Client->fetch()){
										  		 //if ($data['EtatAg']=="1"){
											   ?>
                                               
                                                <tr>
                                                <td>	<?php
												
														 echo $data['NumCompte'];
														 
														?>
												  </td>
                                                  <td>
                                                   <?php
												   
                                                      echo $data['Libmonnaie']; 
                                                      ?> 
                                                  </td>
                                                  <td>
                                                   <?php
												   
                                                      echo $data['LibTypeCompte']; 
                                                      ?> 
                                                  </td>
                                                  <td>	<?php
												
														echo $data['Prenom']." "." ".$data['Nom']." "." ".$data['Postnom'];
														?>
												  </td>
                                                  <td>
                                                   <?php
												
														echo $data['Sexe'];
												 	?>
                                                  </td>
                                                  <td>
                                                   <?php
														echo $data['DateHeurCree'];
												 	?>
                                                    
                                                  </td>

                                                  <td>
                                                  
                                                   <?php
												    if ($data['EtatCompteB']=="1"){
													?>

														<?php 
															//echo "Activer";
															echo'<a href="#?idCompt='.$data['IdCompte'].'&etat=0" class=" badge bg-primary">Actif</a>';
														?>
                                                                                                                 
													<?php															 
													 }else{
													?>
														<?php 
															//echo "Activer";
															echo'<a href="#?idCompt='.$data['IdCompte'].'&etat=1" class=" badge bg-primary">Bloquer</a>';
														?>

													<?php	
													 }
												
												 
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
    <?php require_once("Pied_Page.php");?>
   
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
