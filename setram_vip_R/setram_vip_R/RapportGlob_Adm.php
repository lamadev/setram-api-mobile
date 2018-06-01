<?php 
include("codes/fonctions/securite.php"); 
include("codes/controles/ControleRap_Glob.php");
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
  <?php 
          $finance=0.0;
          $depot=0.0;
          $comission=0.0;
          $transfert=0.0;
          $conversion=0.0;
          $retrait=0.0;
          $depense=0.0;
          $Conv_Entre=0.0;
          $Conv_Sortie=0.0;
          $RM=0.0;
          $Virement=0.0;
          $Versement=0.0;
          
          $financeUS=0.0;
          $depotUS=0.0;
          $transfertUS=0.0;
          $comissionUS=0.0;
          $conversionUS=0.0;
          $retraitUS=0.0;
          $depenseUS=0.0;
          $Conv_EntreUS=0.0;
          $Conv_SortieUS=0.0;
          $RMUS=0.0;
          $VirementUS=0.0;
          $VersementUS=0.0;

          $financeKz=0.0;
          $depotKz=0.0;
          $transfertKz=0.0;
          $comissionKz=0.0;
          $conversionKz=0.0;
          $retraitKz=0.0;
          $depenseKz=0.0;
          $Conv_EntreKz=0.0;
          $Conv_SortieKz=0.0;
          $RMKz=0.0;
          $VirementKz=0.0;
          $VersementKz=0.0;
          
          $TotUSD=0.0;
          $TotCDF=0.0;
          $NbrUSD=0;
          $NbrCDF=0;
          $MontConvUSD=0.0;
          $MontConvCDF=0.0;
          
          $CommissionUSD=0.0;
          $CommissionCDF=0.0;


          while($data=$Tab_Depot->fetch()){
            if ($data['CodeMonnaie']=="USD") {
              $depotUS=$data['Total'];
            }elseif ($data['CodeMonnaie']=="CDF") {
              $depot=$data['Total'];
            }elseif ($data['CodeMonnaie']=="Kz") {
              $depotKz=$data['Total'];
            }
            
          }

          while($data=$Tab_Retrait->fetch()){
            if ($data['CodeMonnaie']=="USD") {
              $retraitUS=$data['Total'];
            }elseif ($data['CodeMonnaie']=="CDF") {
              $retrait=$data['Total'];
            }elseif ($data['CodeMonnaie']=="Kz") {
              $retraitKz=$data['Total'];
            }
            
          }

         while($data=$Tab_Commiss->fetch()){
          if ($data['CodeMonnaie']=="USD") {
            $comissionUS=$data['Total'];
          }elseif ($data['CodeMonnaie']=="CDF") {
            $comission=$data['Total'];
          }elseif ($data['CodeMonnaie']=="Kz") {
            $comissionKz=$data['Total'];
          }
            
          }

        while($data=$Tab_Finance->fetch()){
          if ($data['CodeMonnaie']=="USD") {
            $financeUS=$data['Total'];
          }elseif ($data['CodeMonnaie']=="CDF") {
            $finance=$data['Total'];
          }elseif ($data['CodeMonnaie']=="Kz") {
            $financeKz=$data['Total'];
          }
            
          }

        while($data=$Tab_Virement->fetch()){
          if ($data['CodeMonnaie']=="USD") {
            $VirementUS=$data['Total'];
          }elseif ($data['CodeMonnaie']=="CDF") {
            $Virement=$data['Total'];
          }elseif ($data['CodeMonnaie']=="Kz") {
            $VirementKz=$data['Total'];
          }
            
          }
        while($data=$Tab_Depense->fetch()){
          if ($data['CodeMonnaie']=="USD") {
            $depenseUS=$data['Total'];
          }elseif ($data['CodeMonnaie']=="CDF") {
            $depense=$data['Total'];
          }elseif ($data['CodeMonnaie']=="Kz") {
            $depenseKz=$data['Total'];
          }
            
          }
        while($data=$Tab_Convers_E->fetch()){
          if ($data['CodeMonnaie']=="USD") {
            $Conv_EntreUS=$data['Total'];
          }elseif ($data['CodeMonnaie']=="CDF") {
            $Conv_Entre=$data['Total'];
          }elseif ($data['CodeMonnaie']=="Kz") {
            $Conv_EntreKz=$data['Total'];
          }
            
          }
        while($data=$Tab_Convers_S->fetch()){
          if ($data['CodeMonnaie']=="USD") {
            $Conv_SortieUS=$data['Total'];
          }elseif ($data['CodeMonnaie']=="CDF") {
            $Conv_Sortie=$data['Total'];
          }elseif ($data['CodeMonnaie']=="Kz") {
            $Conv_SortieKz=$data['Total'];
          }
            
          }

        
                    

    ?>
    
    
    <!--*********************Fin du jubomtron1**************************-->
    <div class="container">
        <div class="col-md-12" style="padding-top:50px;">
            <div class="row well" id="Paneau">
                <div id="agences" >
                    <h3 style="text-align:center">  Rapport Global </h3>
                    
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
                  <div class="col-md-12" style="padding-left:20px;">
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
                        Rubriques
                      </th>
                      <th>
                        Montant USD
                      </th>
                      <th>
                        Montant CDF
                      </th>
                      <th>
                        Montant Kz
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <tr>
                      <td>
                        Depot
                      </td>
                      <td>
                       <?php
                          echo $depotUS; 
                          ?> 
                      </td>
                      <td>
                       <?php
                          echo $depot; 
                          ?> 
                      </td>
                      <td>
                       <?php
                          echo $depotKz; 
                          ?> 
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Retrait
                      </td>
                      <td>
                       <?php
                          echo $retraitUS; 
                          ?> 
                      </td>
                      <td>
                       <?php
                          echo $retrait; 
                       ?> 
                      </td>
                      <td>
                       <?php
                          echo $retraitKz; 
                       ?> 
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Commission 
                      </td>
                      <td>
                       <?php
                          echo round($comissionUS); 
                          ?> 
                      </td>
                      <td>
                       <?php
                        echo round($comission); 
                        ?> 
                      </td>
                      <td>
                       <?php
                        echo round($comissionKz); 
                        ?> 
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Financement
                      </td>
                      <td>
                       <?php
                          echo $financeUS; 
                          ?> 
                      </td>
                      <td>
                       <?php
                          echo $finance; 
                          ?> 
                      </td>
                      <td>
                       <?php
                          echo $financeKz; 
                          ?> 
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Virement
                      </td>
                      <td>
                       <?php
                        echo $VirementUS; 
                      ?> 
                      </td>
                      <td>
                       <?php
                        echo $Virement; 
                        ?> 
                      </td>
                      <td>
                       <?php
                        echo $VirementKz; 
                        ?> 
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Depense
                      </td>
                      <td>
                       <?php
                          echo $depenseUS; 
                          ?> 
                      </td>
                      <td>
                       <?php
                          echo $depense; 
                          ?> 
                      </td>
                      <td>
                       <?php
                          echo $depenseKz; 
                          ?> 
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Conversion +
                      </td>
                      <td>
                       <?php
                          echo $Conv_EntreUS; 
                          ?> 
                      </td>
                      <td>
                       <?php
                          echo $Conv_Entre; 
                          ?> 
                      </td>
                      <td>
                       <?php
                          echo $Conv_EntreKz; 
                          ?> 
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Conversion -
                      </td>
                      <td>
                       <?php
                          echo $Conv_SortieUS; 
                          ?> 
                      </td>
                      <td>
                       <?php
                          echo $Conv_Sortie; 
                          ?> 
                      </td>
                      <td>
                       <?php
                          echo $Conv_SortieKz; 
                          ?> 
                      </td>
                    </tr>
                    <tr>
                      <td>
                        RM
                      </td>
                      <td>
                       <?php
                        $RMUS=$financeUS-$VirementUS+$depotUS+$comissionUS+$Conv_EntreUS-$Conv_SortieUS-$retraitUS-$depenseUS;
                        echo round($RMUS); 
                      ?> 
                      </td>
                      <td>
                       <?php
                        $RM=$finance-$Virement+$depot+$comission+$Conv_Entre-$Conv_Sortie-$retrait-$depense;
                        echo round($RM);
                      ?> 
                      </td>
                      <td>
                       <?php
                        $RMKz=$financeKz-$VirementKz+$depotKz+$comissionKz+$Conv_EntreKz-$Conv_SortieKz-$retraitKz-$depenseKz;
                        echo round($RMKz);
                      ?> 
                      </td>
                    </tr>
                      
                    <?php
                     //}
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
