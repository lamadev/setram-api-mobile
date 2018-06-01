<?php
/*include("codes/fonctions/securite.php");
include("codes/fonctions/securiteAdmin.php");
include("codes/fonctions/securiteAdminPure.php");*/
include("codes/controles/ControleTaux.php");
//include("codes/controles/ControleChange.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//FR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Setram : Taux</title>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<style>
	body{

		padding-top: 40px;
		
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
		<?php require_once("entete_page.php");?>
        
	<div class=" container" style="padding-top:0px">
    	
    	<div class=" col-md-12" style="padding-top:0px" >
        	
           	<div class="row" style="background-color:#FFFFFF; padding-top:50px;">
                
                <legend><h2 style="color:#f14444;">Changement de taux de conversion</h2></legend>
                               <form method="POST" enctype="multipart/form-data">
                                <div class="col-md-12" style="margin-top:10px">
                               <div class="col-md-6" style="border-right:groove">
          														  
                            
                              		<div class="" style="margin-top:10px">
                                    		 
                                            <div class="row">
                                                <div class="col-md-6">

                                                <div class="row" style="margin-top:10px">   
                                                 <div class="form-group">   
                                                    <label for="textarea" class=" col-md-12">Nouveau Kz :</label>    
                                                    <div class="col-md-12"> 
                                                                 
                                                           <input type="text" class="form-control" name="Kztaux" id="taux" placeholder="Entrez le taux" <?php if(isset($_POST["Kztaux"])){ echo 'value="'.$_POST["Kztaux"].'"';}?>>
                                                        
                                                   </div> 
                                                   <div class="col-md-12">
                                                        <?php
                                                       if(isset($msgKz)){
                                                        echo '<p class="help-block">* '.$msgKz.'</p>';
                                                       } 
                                                       ?>  
                                                   </div> 
                                                 </div> 
                                              </div>
                                                    
                                                <div class="row" style="margin-top:10px">   
                                                 <div class="form-group">   
                                                    <label for="textarea" class=" col-md-12">Nouveau USD :</label>    
                                                    <div class="col-md-12"> 
                                                                 
                                                           <input type="text" class="form-control" name="taux" id="taux" placeholder="Entrez le taux" <?php if(isset($_POST["taux"])){ echo 'value="'.$_POST["taux"].'"';}?>>
                                                        
                                                   </div> 
                                                   <div class="col-md-12">
                                                        <?php
                                                       if(isset($msgTaux)){
                                                        echo '<p class="help-block">* '.$msgTaux.'</p>';
                                                       } 
                                                       ?>  
                                                   </div> 
                                                 </div> 
                                              </div>
                                               <div class="row" style="margin-top:10px">   
                                                 <div class="form-group">   
                                                    <label for="textarea" class=" col-md-12">Nouveau CDF :</label>    
                                                    <div class="col-md-12"> 
                                                                 
                                                           <input type="text" class="form-control" name="CDtaux" id="CDtaux" placeholder="Entrez le taux" <?php if(isset($_POST["CDtaux"])){ echo 'value="'.$_POST["CDtaux"].'"';}?>>
                                                        
                                                   </div> 
                                                   <div class="col-md-12">
                                                        <?php
                                                       if(isset($msgTaux)){
                                                        echo '<p class="help-block">* '.$msgTaux.'</p>';
                                                       } 
                                                       ?>  
                                                   </div> 
                                                 </div> 
                                              </div>
                                        </div>
                                                <div class="col-md-6">

                                                    
                                                </div>
                                            </div>
                                            
                                      </div>
                                      
                                      	  <div class="BTD">
                                          	<input type="submit" name="ChangeTaux" id="BtnEnvoye" class="btn btn-primary" value="Changer le taux" ><br/>
                                          </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group" style="margin-top:20px">
                                            <?php if(isset($KzTaux)){?>
                                              <label class="col-md-12" id="Taux">Taux Actuel : <?php echo "Kz = ".$KzTaux; ?></label>
                                              <?php } ?>
                                             <?php if(isset($Taux)){?>
                                                <label class="col-md-12" id="Taux">Taux Actuel : <?php echo "USD = ".$Taux; ?></label>                                                
                                                <?php if(isset($CTaux)){?>
                                                  <label class="col-md-12" id="Taux">Taux Actuel : <?php echo "CDF = ".$CTaux; ?></label>                         
                                                <?php } ?>  

                                                      <div class="col-md-10">        
                                                       
                            <input type="hidden" class="form-controle" id="LTaux" name="LTaux" value="<?php echo $Taux;
?>">
                            <?php if(isset($CTaux)){?>
                            <input type="hidden" class="form-controle" id="CTaux" name="CTaux" value="<?php echo $CTaux;?>">
                                                        <?php } ?> 
                                                       </div>
                                                    <?php } ?> 
                                                       
                                              </div>
                                    </div>
                                      
                             <!-- Fin première partie ChangeTaux  -->    
                                       
                                               
                  
                                      
                          </form>
            </div>
            
            </div>
        </div>
    
    </div>
    
    <?php //require_once("Pied_Page.php");?>
    
    <script src="bootstrap/js/jquery.js" ></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    
</body>
</html>

