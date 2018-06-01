<?php 
include("codes/fonctions/securite.php"); 
include("codes/controles/ControlRapportGlob.php");
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
                padding-bottom: 1px;
                padding-top: 1px;
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
      }
        
            
    </style>

    <!--<link rel="stylesheet" type="text/css" media="screen" href="UniCodes/Styles/Liste_Actu.css" />-->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="PickDate/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
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
                    <h3 style="text-align:center">Rapport Transfert</h3>
                    
                </div>
                <br />
                <form method="POST" >
                  <div class="col-md-8">
                     <table class="table">
                        <thead>
                          <tr>
                            <th>Du :
                              <div class="control-group">
                                <div class="controls input-append date form_date" data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
                                    <input size="16" type="text" value="" readonly>
                                    <span class="add-on"><i class="icon-remove"></i></span>
                                    <span class="add-on"><i class="icon-th"></i></span>
                                </div>
                                <input type="hidden" id="dtp_input1" name="Cdatee" value="" />
                              </div>
                            </th>
                            <th>au :
                              <div class="control-group">
                                <div class="controls input-append date form_date" data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                    <input size="16" type="text" value="" readonly>
                                    <span class="add-on"><i class="icon-remove"></i></span>
                                    <span class="add-on"><i class="icon-th"></i></span>
                                </div>
                                <input type="hidden" id="dtp_input2" name="Cdate" value="" />
                              </div>
                            </th>
                            <th>Agence :
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
                            </th>
                            <th style="padding-left:30px;">
                              <input type="submit" name="Envoyer" class="form-control" value="Valider" id="BtnEnvoye" />
                              
                            </th>
                          </tr>
                        </thead>
                      </table>
               </div>
                </form>
                <div class="row" >
                  <div class="col-md-8" style="padding-left:20px;">
                <table class="table table-bordered table-streped table-condensed">
                  <caption >
                    <h3 style="text-align:center;color:#f14444;font-weight:700;">
                      <?php
                        echo $DateAff;
                      ?>
                    </h3>
                    
                  </caption>
                  <thead>
                    <tr>
                      <th>
                        Agence
                      </th>
                      <th>
                        Operation
                      </th>
                      <th style="text-align:right">
                        Montant 
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      while($data=$Tab_Mouv->fetch()){
                    ?>
                    <tr>
                      <td>    
                        <?php
                                                
                         echo $data['NomAgence'];
                         
                        ?>
                      </td>
                      <td>
                       <?php
                       
                          echo $data['CodeTypeTransact']; 
                          ?> 
                      </td>                         
                      <td style="text-align:right">
                       <?php
                          echo $data['CodeMonnaie']." "." ".$data['Total']; 
                       ?>
                      </td>
                    </tr>
                    <?php
                     }
                    ?>
                  </tbody>
                </table>
                  </div>
                  <div class="col-md-4 " style="padding-top:75px">
                    <table class="table table-condensed" border="1">
                           <thead>
                          
                                <tr>
                                  <th>Transferts</th>
                                  <th style="text-align:right">Montant</th>
                                  <th style="text-align:right">Nombre</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                while($data=$Tab_Rubrik->fetch()){
                              ?>

                                <tr>
                                    <td style="color:#f14444;">  
                                      <?php
                                        echo $data['CodeMonnaie'];
                                      ?>
                                    </td>
                                    <td style="text-align:right">
                                      <?php
                                          echo $data['Total'];
                                      ?>
                                    </td>
                                    <td style="text-align:right">
                                      <?php
                                          echo $data['Nbre'];
                                      ?>
                                    </td>    
                                <tr>
                                
                                 
                                <?php
                                  }
                                ?>
                             </tbody>
                            </table>
                      <table class="table table-condensed" border="1">
                           <thead>
                          
                                <tr>
                                  <th>Commissions</th>
                                  <th style="text-align:right">Montant</th>
                                  <th style="text-align:right">Nombre</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                while($data=$Tab_Commis->fetch()){
                              ?>

                                <tr>
                                    <td style="color:#f14444;">  
                                      <?php
                                        echo $data['CodeMonnaie'];
                                      ?>
                                    </td>
                                    <td style="text-align:right">
                                      <?php
                                          echo $data['TotComis'];
                                      ?>
                                    </td>
                                    <td style="text-align:right">
                                      <?php
                                          echo $data['Nbre'];
                                      ?>
                                    </td>    
                                <tr>
                                
                                 
                                <?php
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
    <script type="text/javascript" src="PickDate/js\bootstrap-datetimepicker.js" charset="UTF-8"></script>
  <script type="text/javascript" src="PickDate/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
  <script>
    $('.form_datetime').datetimepicker({
      //language:  'fr',
      weekStart: 1,
      todayBtn:  1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      forceParse: 0,
      showMeridian: 1
    });
    $('.form_date').datetimepicker({
      language:  'fr',
      weekStart: 1,
      todayBtn:  1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      minView: 2,
      forceParse: 0
    });
    $('.form_time').datetimepicker({
      language:  'fr',
      weekStart: 1,
      todayBtn:  1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 1,
      minView: 0,
      maxView: 1,
      forceParse: 0
    });
    
    $('.Tabu').click(function (e) {  e.preventDefault();
     $(this).tab('show'); });

  </script>
  </body>

</html>
