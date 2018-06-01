<?php 
include("codes/fonctions/securite.php"); 
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
  				padding-bottom: 350px;
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
	                <h2 style="text-align:center">  Liste générale des agences </h2>
	                <span style="padding-left:10px;"><a href="Agence.php" class="badge bg-primary" style="background-color: #ffffff; color:#f14444;">Ajouter</a></span>
	                <span style="padding-left:10px;"><a href="veille.php?pretat=veille" class=" badge bg-primary" style="background-color: #ffffff; color:#f14444;">Verrouiller les agences</a></span>
                	<span style="padding-left:10px;"><a href="veille.php?pretat=reveille" class=" badge bg-primary" style="background-color: #ffffff; color:#f14444;">Déverrouiller les agences</a></span>
	            </div>
	            <div class="panel panel-primary">
                                         
                                         <div class="panel-body">
                                           <table class="table table-condensed">
                                           <thead>
                                          
                                               <tr>
                                                  <th>Numero </th>
                                                  <th>Nom</th>
                                                  <th>Téléphone</th>
                                                  <th>Adresse</th>
                                                  <th>Etat</th>
                                                  <th>Changer Etat</th>
                                                  <th>Taux</th>
                                              	</tr>
                                              </thead>
                                              <tbody>
                                               <?php
											$serveAc="";
                                           while($data=$resultat->fetch()){
										  		 //if ($data['EtatAgence']=="1"){
											   ?>
                                               
                                                <tr>
                                                <td>	<?php
												
														 echo $data['IdAgence'];
														 
														?>
												  </td>
                                                  <td>
                                                   <?php
												   
                                                      echo $data['NomAgence']; 
                                                      ?> 
                                                  </td>
                                                  <td>	<?php
												
														echo $data['PhoneAgence'];
														?>
												  </td>
                                                  <td>
                                                   <?php
												
														echo $data['AdresseAgence'];
												 	?>
                                                  </td>
                                                  <td>
                                                   <?php
												    if ($data['EtatAgence']=="1"){
													?> 
														 <?php echo "Active"?>                                                    
													<?php															 
													 }else{
													?>
														<?php echo "Desactive"?>
													<?php	
													 }
												 ?>
                                                  </td>

                                                  <td>
                                                  
                                                   <?php
												    if ($data['EtatAgence']=="1"){
													?>
														
                                                         <?php 
															//echo "Activer";
															echo'<a href="EtatAgence.php?idAgt='.$data['IdAgence'].'&etat=0" class=" badge bg-primary">Desactiver</a>';
														?>
                                                         
                                                                                                                 
													<?php															 
													 }elseif($data['EtatAgence']==2) {
													 	echo "Vérouillée";
													 }else{
													?>
                                                     	
														<?php 
															//echo "Activer";
															echo'<a href="EtatAgence.php?idAgt='.$data['IdAgence'].'&etat=1" class=" badge bg-primary">Activer</a>';
														?>
														 
                                                         </a>
													<?php	
													 }
												
												 
												 ?>
                                                  </td>
                                                   <td>
                                                    <?php 
                              //echo "Activer";
                            echo'<a href="Taux.php?idagence='.$data['IdAgence'].'" class=" badge bg-primary">Fixer taux</a>';
                          ?>
                                                  
                                                  </td>
                                                  <td>
                                                   	<?php 
															//echo "Activer";
														echo'<a href="#?idagence='.$data['IdAgence'].'&Noms='.$data['NomAgence']." ".$data['PhoneAgence']." ".$data['AdresseAgence'].'" class=" badge bg-primary">Ajouter Compte</a>';
													?>
                                                  
                                                  </td>
                                                  
                                                   <td>
                                                   	<?php 
															//echo "Activer";
														echo'<a href="#?idagence='.$data['IdAgence'].'&Noms='.$data['NomAgence']." ".$data['PhoneAgence']." ".$data['AdresseAgence'].'" class=" badge bg-primary">Modifier</a>';
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
