<?php 
include("codes/fonctions/securite.php"); 
include_once("codes/controles/ControleEnregTransact.php");
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
    					echo "Type Compte"." ".": "."<span id='InfosCompte' class='pull-right'>".$_SESSION['LibTypeCompte']." "." ".$_SESSION['CodeMonnaie']."</span><br /><br />";
    					//echo "Solde"." ".": "."<span id='InfosCompte' class='pull-right'>".$_SESSION['Libmonnaie']." "." ".$_SESSION['Solde']."</span><br /><br />";
    					echo "Client Name"." ".": "."<span id='InfosCompte' class='pull-right'>"." "." ".$_SESSION['Nom']." "." ".$_SESSION['Postnom']."</span> <br /><br />";
    					echo "Phone"." ".": "."<span id='InfosCompte' class='pull-right'>"." "." ".$_SESSION['Phone']."</span>";

    				?>
    			</div>
    			<div class="col-md-5" style="padding-top:50px;">
    				<form action="" method="POST">
    					<div class="row" style="padding-top:100px;">
							<div class="form-group">
								<label for="text" class="col-md-4">Montant Depot</label>
							<div class="col-md-7">
								<input name="Mount" type="text" class="form-control" id="text" placeholder="Montant à d&eacute;poser" />
								<?php
                                    if(isset($msgMontDepot)){
                                        echo '<p class="help-block">* '.$msgMontDepot.'</p>';
                                    } 
                                ?>  
							</div>
							</div>
						</div>
						<br /><br />
						<div class="btn-group pull-right" style="padding-top:10px;padding-bottom:10px;padding-right:50px">
		                	<input type="submit" name="Envoyer" class="form-control" value="Valider" id="BtnEnvoye" />
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
													<a href="Reatrait_Mount.php">Retrait</a>
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
													<a href="JournalDepot.php">Journal depot</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="ChangePIN.php">Changer PIN</a>
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
