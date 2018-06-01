<?php
include("codes/fonctions/securite.php");
include("codes/controles/Controle_Enreg_Financement.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//FR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Financement</title>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<style>
  body{
    background-image:url(fichier/site/image/fond2.jpg);
    background-repeat:no-repeat;
    background-attachment:fixed;
    
    padding-top: 20px;
  }
  
  
  #TextDescript{
    text-align:justify;
    font-size:50px;
    line-height:30px;
    padding-top:10px;
    
    
  }
  .BTD{
    padding-top:120px;
    text-align:center;
  }
  
  h1{
    text-align:center;
    font-size:30px;
    color:#f14444;
    padding-top:30px;
    
  }
  .col-md-12{
    font-size:14px;
  }
  
</style>

</head>

<body>
    <?php require_once("entete_page.php");?>
        
  <div class=" container" style="padding-top:0px">
      
      <div class=" col-md-12" style="padding-top:40px" >
          
            <div class="row" style="background-color:#FFFFFF">
                
                <legend><h1>Financement</h1></legend>
                               <form method="POST" enctype="multipart/form-data">
                                <div class="col-md-12" style="margin-top:10px">
                               <div class="col-md-6" style="border-right:groove">
          
                              
                                        <div class="row">   
                                             <div class="form-group" style="margin-top:20px">   
                                                <label for="textarea" class="col-md-12">Motif : </label>    
                                                      <div class="col-md-8">        
                                                       <input type="text" class=" form-control" name="Motif" placeholder="Entrer le motif Ici"  <?php if(isset($_POST["Motif"])){ echo 'value="'.$_POST["Motif"].'"';}?>>
                                                         
                                                      
                                                       </div>
                                                       <div class="col-md-4">
                                                           <?php
                                                       if(isset($msgMotif)){
                                                        echo '<p style="color:#fe2b01" class="help-block">* '.$msgMotif.'</p>';
                                                       }
                                                       ?>  
                                                       </div>  
                                              </div> 
                                          </div>
                                          
                                          <div class="row" style="margin-top:20px">   
                                                 <div class="form-group">   
                                                    <label for="textarea" class="col-md-12">Agence à financer :</label>    
                                                          <div class="col-md-8">        
                                                           <select name="AgProv" class="form-control">
                                                                <option value="0">Sélectionner</option>
                                                                <?php
                                                            
                                                                  while($data=$Tab_Agence->fetch()){
                                                                  ?>  
                                                                    
                                                                   <option value=" <?php  echo $data['IdAgence']; ?>"><?php echo $data['NomAgence'];?>
                                                                   </option>        
                                                              <?php  } ?>       
                                                                       
                                                                       
                                                           </select>
                                                        
                                                  
                                                   </div> 
                                                   <div class="col-md-4">
                                                    <?php
                                                       if(isset($msgAgBen)){
                                                        echo '<p style="color:#fe2b01" class="help-block">* '.$msgAgBen.'</p>';
                                                       } 
                                                    ?>  
                                                   </div> 
                                          </div> 
                                      </div>
                                      
                                          
                                      
                                      
                                    </div>
                                      
                             <!-- Fin première partie  -->    
                                       
                                               
                  <div class="col-md-6">
                  
                      <div class="" style="margin-top:10px">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    
                                                    <div class="row" style="margin-top:10px">   
                                                     <div class="form-group">   
                                                        <label for="textarea" class=" col-md-12">Montant :</label>    
                                                              <div class="col-md-12"> 
                                                                     
                                                               <input type="text" class="form-control" name="Montant" placeholder="Entrer le montant Ici" <?php if(isset($_POST["Montant"])){ echo 'value="'.$_POST["Montant"].'"';}?>>
                                                               
                                                             
                                                      
                                                       </div> 
                                                       <div class="col-md-12">
                                                            <?php
                                                           if(isset($msgMontant)){
                                                            echo '<p style="color:#fe2b01" class="help-block">* '.$msgMontant.'</p>';
                                                           } 
                                                           ?>  
                                                       </div> 
                                              </div> 
                                          </div>
                                        </div>
                                                <div class="col-md-6">
                                                    
                                                    <div class="row" style="margin-top:10px">   
                                                     <div class="form-group">   
                                                        <label for="textarea" class="col-md-12">Devise :</label>    
                                                              <div class="col-md-6">        
                                                               <select name="Devise" class="form-control">
                                                                <option value="0">Sélectionner</option>
                                                                
                                                                <?php
                                                            
                                                                  while($data=$TabDevise->fetch()){
                                                                  ?>  
                                                                    
                                                                   <option value="<?php  echo $data['CodeMonnaie']; ?>"><?php echo $data['Libmonnaie'];?>
                                                                   </option>        
                                                              <?php  } ?>         
                                                               </select>
                                                            
                                                      
                                                       </div> 
                                                       <div class="col-md-12">
                                                        <?php
                                                           if(isset($msgDevise)){
                                                            echo '<p style="color:#fe2b01" class="help-block">* '.$msgDevise.'</p>';
                                                           } 
                                                        ?>  
                                                       </div> 
                                                      </div> 
                                                  </div>
                                                </div>
                                            </div>
                                      </div>
                                      
                  </div>
                    <div class="btn-group pull-right" style="padding-top:50px;padding-bottom:10px">
                        <input type="submit" name="envoie" id="BtnEnvoyer" class="btn btn-primary " value="Enregistrer" >
                    </div>
                                       
             
                                      </div>
                                      
                          </form>
            </div>
            
            </div>
        </div>
    
    </div>
    
      
    
    <script src="bootstrap/js/jquery.js" ></script>
    <script src="bootstrap/js/bootstrap.js"></script>
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

