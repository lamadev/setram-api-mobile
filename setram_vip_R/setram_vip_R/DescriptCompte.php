<?php 
//include("codes/fonctions/securite.php"); 
include_once("codes/controles/ControleChang_EtatCompte.php");
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
				
			}
			#TitlPanel{
				font-size: 16px;
				font-weight: 700;
			}
			#BtnEnvoye,
			#BolkCompt{
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
		  #InfosCompte{
		  	color: #f90101;
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

  <?php 
  	require_once("entete_page.php");
  ?>
    
    
    <!--*********************Fin du jubomtron1**************************-->
    <div class="container">
    	<div class="col-md-12" style="padding-top:50px;">
    		<div class="row well" id="Paneau">
    			<form method="POST">
    				<div class="col-md-6" style="border-right:groove;padding-top:50px;">
    					<?php 
    					echo "Numéro Compte"." ".": "."<span id='InfosCompte' class='pull-right'>".$_SESSION['NumCompte']."</span><br /><br />";
    					echo "Type Compte"." ".": "."<span id='InfosCompte' class='pull-right'>".$_SESSION['LibTypeCompte']."</span><br /><br />";
    					
    					echo "Client Name"." ".": "."<span id='InfosCompte' class='pull-right'>"." "." ".$_SESSION['Nom']." "." ".$_SESSION['Postnom']."</span> <br /><br />";
    					echo "Phone"." ".": "."<span id='InfosCompte' class='pull-right'>"." "." ".$_SESSION['Phone']."</span>";

    				?>
    				</div>
    				<div class="col-md-6" style="padding-top:50px;">
    					<div class="col-md-8">
    						<?php 
	    						echo "Solde"." ".": "."<span id='InfosCompte' class='pull-right'>".$_SESSION['Libmonnaie']." "." ".$_SESSION['Solde']."</span><br /><br />";
	    						if ($_SESSION['EtatCompte']==1) {
	    							echo "Etat Compte"." ".": "."<span id='InfosCompte' class='pull-right'>".'Active'."</span><br /><br />";
	    						}else{
	    							echo "Etat Compte"." ".": "."<span id='InfosCompte' class='pull-right'>".'Bloquer'."</span><br /><br />";
	    						}
	    					?>
	    					<div class="col-md-12 " style="padding-top:70px;">
	    						<?php
	    						if ($_SESSION['EtatCompte']==1) {
	    							echo '<input type="submit" id="BolkCompt" name="compte" value="Bloquer" class="pull-right" />';
	    						}else{
	    							echo '<input type="submit" id="BolkCompt" name="compte" value="Activer" class="pull-right" />';
	    						}
	    						?>
	    						
	    					</div>
	    					
    					</div>
    					
    				</div>
    			</form>
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
