<?php
include("codes/fonctions/securite.php");
include("codes/controles/ControleAfficheTaux.php");
include("codes/controles/ControleChange.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//FR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change</title>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<style>
	body{

		padding-top: 20px;
		
	}
	
	
	#TextDescript{
		text-align:justify;
		font-family:"beautiful ES", Vani, sans-serif;
		font-size:50px;
		line-height:30px;
		padding-top:10px;
		
		
	}
	.BTD{
		padding-top:100px;
		text-align:center;
	}
	
	h1{
		text-align:center;
		font-family:Vani, "Times New Roman", Times, serif, sans-serif;
		font-size:30px;
		color:#0000FF;
		padding-top:30px;
		
	}
	
	.button{
		padding-left:450px;
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
	
</style>

</head>

<body>
		<?php require_once("entete_index.php");?>
        
	<div class=" container" style="padding-top:0px">
    	
    	<div class=" col-md-12" style="padding-top:0px" >
        	
           	<div class="row" style="background-color:#FFFFFF;padding-top:50px;">
                
                <legend><h1 style="color:#f14444;">Conversion</h1></legend>
                               <form method="POST" enctype="multipart/form-data">
                                <div class="col-md-12" style="margin-top:10px">
                               <div class="col-md-6" style="border-right:groove">
          														  
                            
                              		<div class="" style="margin-top:10px">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    
                                                    <div class="row" style="margin-top:10px">   
                                                     <div class="form-group">   
                                                        <label for="textarea" class=" col-md-12">Montant :</label>    
                                                              <div class="col-md-12"> 
                                                                     
                                                               <input type="text" class="form-control" name="Montant" id="Montant" placeholder="Entrez le montant Ici" <?php if(isset($_POST["Montant"])){ echo 'value="'.$_POST["Montant"].'"';}?>>
                                                            
                                                       </div> 
                                                       <div class="col-md-12">
                                                            <?php
                                                           if(isset($msgMontant)){
                                                            echo '<p class="help-block">* '.$msgMontant.'</p>';
                                                           } 
                                                           ?>  
                                                       </div> 
                                              </div> 
                                          </div>
                                        </div>
                                                <div class="col-md-6">
                                                    
                                                    <div class="row" style="margin-top:10px">   
                                                     <div class="form-group">   
                                                        <label for="textarea" class="col-md-12">Change :</label>    
                                                              <div class="col-md-6">        
                                                               <select name="Devise" id="Devise" class="form-control">
                                                                <option value="0">Sélectionner</option>
                                                                <option value="1" <?php if(isset($_POST["Devise"])){ if ($_POST['Devise']==1){ echo 'selected';}}?> >USD-CDF</option>
                                                                <option value="2" <?php if(isset($_POST["Devise"])){ if ($_POST['Devise']==2){ echo 'selected';}}?>>CDF-USD</option> 
                                                                <option value="3" <?php if(isset($_POST["Devise"])){ if ($_POST['Devise']==3){ echo 'selected';}}?>>Kz-USD</option> 
                                                                <option value="4" <?php if(isset($_POST["Devise"])){ if ($_POST['Devise']==4){ echo 'selected';}}?>>USD-Kz</option>        
                                                                       
                                                               </select>
                                                            
                                                       </div> 
                                                       <div class="col-md-12">
                                                        <?php
                                                           if(isset($msgDevise)){
                                                            echo '<p class="help-block">* '.$msgDevise.'</p>';
                                                           } 
                                                        ?>  
                                                       </div> 
                                                      </div> 
                                                  </div>
                                                </div>
                                            </div>
                                            
                                      </div>
                                      
                                      	  <div class="BTD">
                                          	<input type="submit" name="Changer" id="BtnEnvoye" class="btn btn-primary" value="Changer" ><br/>
                                          </div>
                                        
                                    </div>
                                      
                             <!-- Fin première partie Changer -->    
                                       
                                               
                  <div class="col-md-6">
                  
                  					<div class="row">   
                                             <div class="form-group" style="margin-top:20px">  
                                              <?php if(isset($KzTaux)){?> 
                                              <label class="col-md-12" id="Taux">Taux Actuel : <?php echo "Kz = ".$KzTaux; ?></label>
                                              <?php } ?>
                                                <?php if(isset($Taux)){?>
                                                <label class="col-md-12" id="Taux">Taux Actuel : <?php echo "USD = ".$Taux; ?></label>    									  												<?php if(isset($CTaux)){?>
                                                	<label class="col-md-12" id="Taux">Taux Actuel : <?php echo "CDF = ".$CTaux; ?></label>    											
                                                  <?php } ?>							  
                                                      <div class="col-md-10">        
                            <input type="hidden" class="form-controle" id="KzTaux" name="KzTaux" value="<?php echo $KzTaux;
?>">                
														<input type="hidden" class="form-controle" id="LTaux" name="LTaux" value="<?php echo $Taux;
?>">
														<?php if(isset($CTaux)){?>
														<input type="hidden" class="form-controle" id="CTaux" name="CTaux" value="<?php echo $CTaux;?>">
                                                        <?php } ?> 
                                                       </div>
                                                    <?php } ?> 
                                                       
                                              </div> 
                                          </div>
                                          <div class="row" style="margin-top:20px">   
                                                 <div class="form-group">   
                                                    <label for="textarea" class="col-md-12" id="Taux">Conversion :</label>    
                                                          <div class="col-md-9">        
                                                           	<span id="AffChange"></span>
                                                   		  </div> 
                                                   
                                          </div> 
                                      </div>

                                      
                  
                  				</div>
                               </div>
                                      
                          </form>
            </div>
            
            </div>
        </div>
    
    </div>
    <br /><br /><br /><br /><br /><br />
    
    <?php require_once("Pied_Page.php");?>
    
    <script src="bootstrap/js/jquery.js" ></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="codes/machine/Machine_Change.js"></script>
    <script type="text/javascript">
		$('#clic').click(function(){
			//alert('Bonjour');
			$('#condition').load('Conditionmarche.php');
		//}, function(){
		//}, function(){
			//$('#condition').hide();
		
		});
	</script>
</body>
</html>

