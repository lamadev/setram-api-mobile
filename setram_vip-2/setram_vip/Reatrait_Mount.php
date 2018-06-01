<?php 
include("codes/fonctions/securite.php"); 
include_once("codes/controles/ControleEnreg_Retrait.php");
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
  				padding-bottom: 250px;
			}
			#agences{
				background-color: #f14444;
				color: #ffffff;
				
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
		  #InfosCompte{
		  	color: #f90101;
		  	font-weight: 700;
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
  	require_once("entete_index.php");
  ?>
    
    
    <!--*********************Fin du jubomtron1**************************-->
    <div class="container">
    	<div class="col-md-12" style="padding-top:50px;">
    		<div class="row well" id="Paneau">
    			<div class="col-md-3" style="padding-top:50px;">
    				<?php 
    					echo "Numéro Compte"." ".": "."<span id='InfosCompte' class='pull-right'>".$_SESSION['NumCompte']."</span><br /><br />";
    					echo "Type Compte"." ".": "."<span id='InfosCompte' class='pull-right'>".$_SESSION['LibTypeCompte']."</span><br /><br />";
    					//echo "Solde"." ".": "."<span id='InfosCompte' class='pull-right'>".$_SESSION['Libmonnaie']." "." ".$_SESSION['Solde']."</span><br /><br />";
    					echo "Client Name"." ".": "."<span id='InfosCompte' class='pull-right'>"." "." ".$_SESSION['Nom']." "." ".$_SESSION['Postnom']."</span> <br /><br />";
    					echo "Phone"." ".": "."<span id='InfosCompte' class='pull-right'>"." "." ".$_SESSION['Phone']."</span>";

    				?>
    			</div>
    			<div class="col-md-5" style="padding-top:50px;">
    				<form action="" method="POST">
    					<div class="row" style="padding-top:100px;">
							<div class="form-group">
								<label for="text" class="col-md-4">Montant retir&eacute;</label>
							<div class="col-md-7">
								<input name="Mount" type="text" class="form-control" id="Mount" placeholder="Montant à retirer" />
								<?php
                                    if(isset($msgMontRetrait)){
                                        echo '<p class="help-block">* '.$msgMontRetrait.'</p>';
                                    } 
                                ?> 
							</div>
							</div>
						</div>
						<br /><br />
						<div class="btn-group pull-right" style="padding-top:10px;padding-bottom:10px;padding-right:50px">
		                	<input type="submit" name="Valider" class="form-control" value="Valider" id="BtnEnvoye" />
		                </div>
    				</form>
    			</div>
    			<div class="col-md-4" style="padding-top:50px;">
    				<div class="panel-group" id="accordion">
							<div class="panel panel-default">
								<div class="panel-heading" id="agences">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" >Gestion Transaction</a>
									</h4>
								</div>
								
							   
								<div id="collapseOne" class="panel-collapse collapse in">
									<div class="panel-body">
										<table class="table">
											
											<tr>
												<td>
													<a href="Depot_Mount.php">Depot</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="Tranfert.php">Transfert</a>
													
												</td>
											</tr>
											<tr>
												<td>
													<?php
														echo '<a href="SoldeCompte.php?compte='.$_SESSION['NumCompte'].'">V&eacute;rification solde</a>';
													?>
												</td>
											</tr>
											

										</table>
									</div>
								</div>
							</div>
									 
									 
									 
							<div class="panel panel-default">
								<div class="panel-heading" id="agences">
									<h4 class="panel-title" >
										<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
											<!--<span class="glyphicon glyphicon-th">-->
										</span> Opération</a>
									</h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse">
									<div class="panel-body">
										<table class="table">
											<tr>
												<td>
													<a href="JournalRetrait.php">Journal Retrait</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="Financement.php">Changer PIN</a>
												</td>
											</tr>
											
										</table>
									</div>
								</div>
							</div>
							<br /><br /><br />
							<!--<div class="pull-right">
								<span style="padding-left:10px;">
			    					<a href="QuitterCompte.php" class=" badge bg-primary" style="background-color: #f14444; color:#ffffff; font-size:14px;">
			    						Quitter
			    					</a>
			    				</span>
							</div>-->

                            <?php 
								/*if($_SESSION['niveau']=='Admin'){
									echo '<a href="admini.php" >Administration</a>';
								}*/
                        	?>
                        
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
