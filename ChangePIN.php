<?php
include("codes/fonctions/securite.php");
include("codes/controles/ControleDepense.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//FR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Depense</title>
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
    padding-top:50px;
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
  #agences{
        background-color: #f14444;
        color: #ffffff;
        
      }
  
</style>

</head>

<body>
    <?php require_once("entete_index.php");?>
        
  <div class=" container" style="padding-top:0px">
      
      <div class=" col-md-12" style="padding-top:40px" >
          
            <div class="row" style="background-color:#FFFFFF">
                
                <legend><h1>Changement PIN</h1></legend>
                               <form method="POST" enctype="multipart/form-data">
                                <div class="col-md-12" style="margin-top:10px">
                               <div class="col-md-6" style="border-right:groove">
          
                              
                                        <div class="row">   
                                             <div class="form-group" style="margin-top:20px">   
                                                <label for="textarea" class="col-md-12">Ancien PIN : </label>    
                                                      <div class="col-md-8">        
                                                       <input type="password" class=" form-control" name="anc_pin" placeholder="Ancien PIN"  <?php if(isset($_POST["Motif"])){ echo 'value="'.$_POST["Motif"].'"';}?>>
                                                         
                                                      
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

                                          <div class="row">   
                                             <div class="form-group" style="margin-top:20px">   
                                                <label for="textarea" class="col-md-12">Nouveau PIN : </label>    
                                                      <div class="col-md-8">        
                                                       <input type="password" class=" form-control" name="new_pin" placeholder="Nouveau PIN"  <?php if(isset($_POST["Motif"])){ echo 'value="'.$_POST["Motif"].'"';}?>>
                                                         
                                                      
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

                                          <div class="row">   
                                             <div class="form-group" style="margin-top:20px">   
                                                <label for="textarea" class="col-md-12">R&eacute;p&eacute;t&eacute; nouveau PIN : </label>    
                                                      <div class="col-md-8">        
                                                       <input type="password" class=" form-control" name="new_pin1" placeholder="Nouveau PIN"  <?php if(isset($_POST["Motif"])){ echo 'value="'.$_POST["Motif"].'"';}?>>
                                                         
                                                      
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
                                          
                                          
                                        <div class="btn-group pull-right" style="padding-top:50px;padding-bottom:10px;padding-right:30px">
                                          <input type="submit" name="envoie" id="BtnEnvoyer" class="btn btn-primary " value="Changer" >
                                        </div>

                                    </div>
                                      
                             <!-- Fin première partie  -->    
                                       
                                               
                  <div class="col-md-6">
                    
                    <div class="col-md-10 pull-right" style="padding-top:50px;">
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
                                      <a href="Reatrait_Mount.php">Retrait</a>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <a href="Change.php">Transfert</a>
                                      
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
                                      <a href="#">Journal Transfert</a>
                                    </td>
                                  </tr>
                                  <!--<tr>
                                    <td>
                                      <a href="ChangePIN.php">Changer PIN</a>
                                    </td>
                                  </tr>-->
                                  
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

                  </div>
                                          
                                          <br />
             
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

