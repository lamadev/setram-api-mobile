<?php 
include("codes/fonctions/securite.php"); 
//include("codes/controles/ControleAgence.php");
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

  <?php 
  	require_once("entete_page.php");
  ?>
    
    
    <!--*********************Fin du jubomtron1**************************-->
    <div class="container">
    	<div class="col-md-12" style="padding-top:50px;">
    		<div class="row well" id="Paneau">
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
													<a href="Envoi1.php">Depot</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="Code_Retrait.php">Retrait</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="Change.php">Conversion</a>
													
												</td>
											</tr>

										</table>
									</div>
								</div>
							</div>
									 
									 
									 
							<div class="panel panel-default">
								<div class="panel-heading" >
									<h4 class="panel-title" >
										<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-th">
										</span> Opération</a>
									</h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse">
									<div class="panel-body">
										<table class="table">
											<tr>
												<!-- Operation.php-->
												<td>
													<a href="#">Depense</a>
													
												</td>
											</tr>
											<tr>
												<td>
													<a href="Financement.php">Financement</a>
												</td>
											</tr>
											
										</table>
									</div>
								</div>
							</div>

							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon   glyphicon-list">
										</span> Rapports</a>
									</h4>
								</div>
								<div id="collapseThree" class="panel-collapse collapse">
									<div class="panel-body">
										<table class="table">
											<tr>
												<td>
													<a href="Rapport_Global.php">Global</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="Rapport_Global.php?Type=envoi">Envoies</a> 
												</td>
											</tr>
											<tr>
												<td>
													<a href="ListeRetrait.php">Retrait</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="Rapport_Global.php?Type=conversion" >Conversion</a>
												</td>
											</tr>
                                            
                                            <tr>
												<td>
													<a href="Rapport_Global.php?Type=depense">Depenses</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="Rapport_Global.php?Type=financement" >Financements</a>
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
                            <?php 
								/*if($_SESSION['niveau']=='Admin'){
									echo '<a href="admini.php" >Administration</a>';
								}*/
                        	?>
                        
                     </div>
    			</div>
    			<div class="col-md-4" style="padding-top:100px;">
    				<img src="fichier/site/image/LogoSetram.png" class="img-responsive" width="450" />
    			</div>
    			<div class="col-md-4" style="padding-top:50px;">
    				<div class="panel panel-default" >
    					<table class="table table-striped table-condensed">
    						<div class="panel-heading" id="agences">
	    						<h5 class="panel-title" id="TitlPanel">Les Menus</h5>
    						</div>
    						<tbody>
    							<tr>
    								<td>
    									<a href="ListeAgence.php" style="color:#000000"><li class="list-group-item list-group-item-warning">Gérer Agences</li></a>
    								</td>
    							</tr>
    							<tr>
    								<td>
    									<a href="ListeAgent.php" style="color:#000000"><li class="list-group-item list-group-item-warning">Gérer Agents</li></a>
    								</td>
    							</tr>
    							<tr>
    								<td>
    									<a href="ListeTransfert.php" style="color:#000000"><li class="list-group-item list-group-item-warning">Gérer Transferts</li></a>
    								</td>
    							</tr>
    							<tr>
    								<td>
    									<a href="ListeDepot.php" style="color:#000000"><li class="list-group-item list-group-item-warning">Gérer Depots</li></a>
    								</td>
    							</tr>
    							<tr>
    								<td>
    									<a href="ListeRetrait.php" style="color:#000000"><li class="list-group-item list-group-item-warning">Gérer Retraits</li></a>
    								</td>
    							</tr>
    							<tr>
    								<td>
    									<a href="GestionCompte.php" style="color:#000000"><li class="list-group-item list-group-item-warning">Gérer Comptes Clients</li></a>
    								</td>
    							</tr>
    							<tr>
    								<td>
    									<a href="#" style="color:#000000"><li class="list-group-item list-group-item-warning">Gérer Financements</li></a>
    								</td>
    							</tr>
    							<tr>
    								<td>
    									<a href="#" style="color:#000000"><li class="list-group-item list-group-item-warning">Gérer Depenses</li></a>
    								</td>
    							</tr>
    							<tr>
    								<td>
    									<a href="#" style="color:#000000"><li class="list-group-item list-group-item-warning">Gérer Conversions</li></a>
    								</td>
    							</tr>
    							<tr>
    								<td>
    									<a href="#" style="color:#000000"><li class="list-group-item list-group-item-warning">Situation d'une Agence</li></a>
    								</td>
    							</tr>
    							<tr>
    								<td>
    									<a href="ConfigTypeTransact.php" style="color:#000000"><li class="list-group-item list-group-item-warning">Configuration Type Transaction</li></a>
    								</td>
    							</tr>
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
