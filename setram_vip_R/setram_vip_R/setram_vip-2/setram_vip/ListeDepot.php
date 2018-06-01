<?php 
include("codes/fonctions/securite.php"); 
include("codes/controles/ControleList_Depot.php");
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
    <link href="PickDate/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
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
  				padding-bottom: 60px;
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

  <?php 
  	require_once("entete_page.php");
  ?>
    
    
    <!--*********************Fin du jubomtron1**************************-->
    <div class="container">
    	<div class="col-md-12" style="padding-top:50px;">
    		<div class="row well" id="Paneau">
    			<div id="agences" >
	                <h2 style="text-align:center">  Liste des Depots <?php echo $Periode; ?></h2>
	                <form method="POST" style="padding-top:15px;">
                                                   <div class="col-md-2" >
                                                    <div class="row">
                                                        
                                                        <div class="col-md-10">
                                                            <select id="agenceExp" name="agenceExp" class="form-control">
                                                                <option value="0">Toutes les Agences </option>
                                                             <?php
                                                             while($data=$Tab_Agence->fetch()){
                                                             ?> 
                                                                  <option value="<?php echo $data['IdAgence'];?>" <?php if(isset($_POST['agenceExp'])){if($_POST['agenceExp']==$data['IdAgence'])echo "selected";};?>>
                                                                   <?php echo $data['NomAgence'];?>
                                                                   </option> 
                                                                    <?php 
                                                                    } ?> 
                                                              </select>
                                                        </div>
                                                    </div>
                                                    
                                                   </div>
                                                   <div class="col-md-4">
                                                        
                                                         <div class="input-group col-lg-10">   
                                                                
                                                                <div class="controls input-append date form_date" data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                                                    <input size="16" class="form-control" type="text" value="" placeholder="Choisissez une date" readonly>
                                                                    <span class="add-on"><i class="icon-remove"></i></span>
                                                                    <span class="add-on"><i class="icon-th"></i></span>
                                                                    <input type="hidden" id="dtp_input2" name="Cdate" value="" />
                                                                </div>
                                                             <span class="input-group-btn">
                                                                <button class="btn btn-primary" type="submit" name="RechercheJ" id="Recherche">Recherche</button>  
                                                                
                                                             </span> 
                                                         </div>
        
                                                   </div>
                                                   <div class="col-md-6" >
                                                        
                                                          <div class="form-group col-lg-10">    
                                                            <div class="input-group">      
                                                                <span class="input-group-addon">        
                                                                    <select id="select"  name="mois" >
                                                                         <option value="0">Mois</option>
                                                                             <option value="1" <?php if(isset($_POST["mois"])){ if($_POST["mois"]==1){ echo "selected"; }}?> >Janvier</option>
                                                                             <option value="2" <?php if(isset($_POST["mois"])){ if($_POST["mois"]==2){ echo "selected"; }}?> >Février</option>
                                                                             <option value="3" <?php if(isset($_POST["mois"])){ if($_POST["mois"]==3){ echo "selected"; }}?>>Mars</option>
                                                                             <option value="4" <?php if(isset($_POST["mois"])){ if($_POST["mois"]==4){ echo "selected"; }}?>>Avril</option>
                                                                             <option value="5" <?php if(isset($_POST["mois"])){ if($_POST["mois"]==5){ echo "selected"; }}?>>Mai</option>
                                                                             <option value="6" <?php if(isset($_POST["mois"])){ if($_POST["mois"]==6){ echo "selected"; }}?>>Juin</option>
                                                                             <option value="7" <?php if(isset($_POST["mois"])){ if($_POST["mois"]==7){ echo "selected"; }}?>>Juillet</option>
                                                                             <option value="8" <?php if(isset($_POST["mois"])){ if($_POST["mois"]==8){ echo "selected"; }}?>>Août</option>
                                                                             <option value="9" <?php if(isset($_POST["mois"])){ if($_POST["mois"]==9){ echo "selected"; }}?>>Septembre</option>
                                                                             <option value="10" <?php if(isset($_POST["mois"])){ if($_POST["mois"]==10){ echo "selected"; }}?>>Octobre</option>
                                                                             <option value="11" <?php if(isset($_POST["mois"])){ if($_POST["mois"]==11){ echo "selected"; }}?>>Novembre</option>
                                                                             <option value="12" <?php if(isset($_POST["mois"])){ if($_POST["mois"]==12){ echo "selected"; }}?>>Decembre</option>
                                                                         </select>     
                                                                 </span>      
                                                                 <select id="select" name="annee" class="form-control">
                                                          
                                                                     <?php 
                                                                     //$i=2015;
                                                                     $annee=2016;
                                                                     $a=$annee+4;
                                                                     while($annee <= $a){ ?>
                                                                     <option <?php if(isset($_POST["annee"])){ if($_POST["annee"]==$annee){ echo "selected"; }}?>><?php echo $annee;?> </option>
                                                                     <?php $annee++;} ?>
                                                                </select>   
                                                                <span class="input-group-btn"> 
                                                                    <input type="submit" name="RechercheM" id="Recherche" class="btn btn-primary" value="Recherche" > 
                                                                </span> 
                                                             </div>  
                                                          </div> 
                                                          
                                                   </div>
                                                   </form>
	            </div>
	            <div class="panel panel-primary">
                                         
                                         <div class="panel-body">
                                           <table class="table table-condensed">
                                           <thead>
                                          
                                               <tr>
                                                  <th>Date </th>
                                                  <th>Montant</th>
                                                  <th>Moyen op&eacute;r&eacute;</th>
                                                  <th>Compte bancaire</th>
                                                  <th>Agence</th>
                                              
                                              	</tr>
                                              </thead>
                                              <tbody>
                                               <?php
											$serveAc="";
                                          	 while($data=$resultat->fetch()){
										  		 if ($data['EtatTransact']=="1"){
											   ?>
                                               
                                                <tr>
                                                <td>	<?php
												
														 echo $data['DateTransact'];
														 
														?>
												  </td>
                                                  <td>
                                                   <?php
												   
                                                      echo $data['MontantTransact']." "." ".$data['Libmonnaie']; 
                                                      ?> 
                                                  </td>
                                                  <td>	<?php
												
														echo $data['MoyenTransact'];
														?>
												  </td>
                                                  <td>
                                                   <?php
												
														echo $data['NumCompte'];
												 	?>
                                                  </td>
                                                  <td>
                                                   <?php
												    echo $data['NomAgence'];
													?> 
														 
                                                  </td>

                                                  <td>
                                                  
                                                   <?php
												    //if ($data['EtatAgence']=="1"){
													?>
														
                                                         <?php 
															//echo "Activer";
															//echo'<a href="EtatAgence.php?idAgt='.$data['IdAgence'].'&etat=0" class=" badge bg-primary">Desactiver</a>';
														?>
                                                         
                                                                                                                 
													<?php															 
													// }elseif($data['EtatAgence']==2) {
													 	//echo "Vérouillée";
													 //}else{
													?>
                                                     	
														<?php 
															//echo "Activer";
															//echo'<a href="EtatAgence.php?idAgt='.$data['IdAgence'].'&etat=1" class=" badge bg-primary">Activer</a>';
														?>
														 
                                                         </a>
													<?php	
													 //}
												
												 
												 ?>
                                                  </td>
                                                  
                                                  
                                                   <td>
                                                   	<?php 
															//echo "Activer";
														//echo'<a href="#?idagence='.$data['IdAgence'].'&Noms='.$data['NomAgence']." ".$data['PhoneAgence']." ".$data['AdresseAgence'].'" class=" badge bg-primary">Modifier</a>';
													?>
                                                  
                                                  </td>
                                                  
                                                </tr>
                                             <?php
											 	}
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
   <script type="text/javascript" src="PickDate/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="PickDate/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>

  </body>

</html>
