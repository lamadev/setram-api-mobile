
<div class="row">    
				<?php 
					$finance=0.0;
					$envoi=0.0;
					$comission=0.0;
					$conversion=0.0;
					$retrait=0.0;
					$depense=0.0;
					$Conv_Entre=0.0;
					$Conv_Sortie=0.0;
					$RM=0.0;
					$Virement=0.0;
					$Versement=0.0;
					
					$financeUS=0.0;
					$envoiUS=0.0;
					$comissionUS=0.0;
					$conversionUS=0.0;
					$retraitUS=0.0;
					$depenseUS=0.0;
					$Conv_EntreUS=0.0;
					$Conv_SortieUS=0.0;
					$RMUS=0.0;
					$VirementUS=0.0;
					$VersementUS=0.0;
					
					$TotUSD=0.0;
					$TotCDF=0.0;
					$NbrUSD=0;
					$NbrCDF=0;
					$MontConvUSD=0.0;
					$MontConvCDF=0.0;
					
					$CommissionUSD=0.0;
					$CommissionCDF=0.0;

           // while($data=$TabMouv->fetch()){
						 /**************************************************/
						 if($data['codedevise']=='CDF'){
						 	/*if($data['type']=='envoi'){
									$envoi=$data['total'];
								}*/
						 	if($data['type']=='commission'){
									
									$comission=$data['total'];
								}
							if($data['type']=='retrait'){
									$retrait=$data['total'];
								}
						 	
						 	if($data['type']=='Depense'){
									$depense=$data['total'];
								}
							if($data['type']=='Financement'){
									$finance=$finance+$data['total'];
								}
							if($data['type']=='Virement'){
									$Virement=$Virement+$data['total'];
								}
							if($data['type']=='Versement'){
									$Versement=$Versement+$data['total'];
								}
								
							//$TotCDF=$TotCDF+$data['montant'];
							/*if(($data['type']=='envoi')and($Type=='envoi')){
								$MontConvCDF=$MontConvCDF+$data['commission'];
							}*/
							
						 	if($data['type']=='conversion'){
								if($data['sens']=='E'){
									$Conv_Entre=$data['total'];
								}
								if($data['sens']=='S'){
									$Conv_Sortie=$data['total'];
								}
							}
							//$NbrCDF++;
						}elseif($data['codedevise']=='USD'){
								//$NbrUSD++;
								//$TotUSD=$TotUSD+$data['montant'];
								/*if(($data['type']=='envoi')and($Type=='envoi')){
									$MontConvUSD=$MontConvUSD+$data['commission'];
								}
								if($data['type']=='envoi'){
										$envoiUS=$data['total'];
									}*/
								if($data['type']=='commission'){
										$comissionUS=$data['total'];
									}
								if($data['type']=='retrait'){
										$retraitUS=$data['total'];
									}
								/*if($data['type']=='conversion'){
										$conversionUS=$data['total'];
									}*/
							
								if($data['type']=='Depense'){
										$depenseUS=$data['total'];
									}
								if($data['type']=='Financement'){
										$financeUS=$data['total'];
									}
								if($data['type']=='Virement'){
									$VirementUS=$VirementUS+$data['total'];
								}
								if($data['type']=='Versement'){
									$VersementUS=$VersementUS+$data['total'];
								}
	
								if($data['type']=='conversion'){
									if($data['sens']=='E'){
										$Conv_EntreUS=$data['total'];
									}
									if($data['sens']=='S'){
										$Conv_SortieUS=$data['total'];
									}
								}
							 }elseif ($data['codedevise']=='Kz') {
                 if($data['type']=='commission'){
                  
                  $comission=$data['total'];
                }
              if($data['type']=='retrait'){
                  $retrait=$data['total'];
                }
              
              if($data['type']=='Depense'){
                  $depense=$data['total'];
                }
              if($data['type']=='Financement'){
                  $finance=$finance+$data['total'];
                }
              if($data['type']=='Virement'){
                  $Virement=$Virement+$data['total'];
                }
              if($data['type']=='Versement'){
                  $Versement=$Versement+$data['total'];
                }
                
              //$TotCDF=$TotCDF+$data['montant'];
              /*if(($data['type']=='envoi')and($Type=='envoi')){
                $MontConvCDF=$MontConvCDF+$data['commission'];
              }*/
              
              if($data['type']=='conversion'){
                if($data['sens']=='E'){
                  $Conv_Entre=$data['total'];
                }
                if($data['sens']=='S'){
                  $Conv_Sortie=$data['total'];
                }
              }
            }
							
						 /**************************************************/
						 }
						 
						 if($Resi){
							 while($data=$Resi->fetch()){
									 if($data['codedevise']=='USD'){
										 $envoiUS=$data['total'];
										 }
									  elseif($data['codedevise']=='CDF'){
										  $envoi=$data['total'];
										  }elseif($data['codedevise']=='Kz'){
                      $envoi=$data['total'];
                      }
								 }
						 }
				 ?>
             
           <div class=" col-md-12">   
            	<div class="well" style="text-align:left;">
                     	 <div class="row">
                         
                     <div class="panel panel-default">
                         <div class="panel-heading" >
                                 <h3><?php echo $DateAff; ?></h3>
                         </div>
                         <div class="panel-body">
                    <?php if($Type=="Global"){ ?>
                    <h4>Synthèse</h4>
                            
                     <table class="table table-condensed" border="1">
                       <thead>
                      
                            <tr>
                              <th>Rubriques</th>
                              <th style="text-align:right">Montant USD</th>
                              <th style="text-align:right">Montant CDF</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                        	<tr>
                                <td>	
                                RM Passé
                              	</td>
                                <td>	
                                <?php echo round($SoldeUSD);?>
                              	</td>
                                <td>	
                                <?php echo round($SoldeCDF);?>
                              	</td>
                             <tr>
                            <tr>
                                <td>	
                                Financement 
                              	</td>
                                <td>	
                                <?php echo $financeUS;?>
                              	</td>
                                <td>	
                                <?php echo $finance;?>
                              	</td>
                             <tr>
                             <tr>
                                <td>	
                                Virement 
                              	</td>
                                <td>	
                                <?php  echo $VirementUS;?>
                              	</td>
                                <td>	
                                <?php  echo $Virement;?>
                              	</td>
                             <tr>
                             <tr>
                                <td>	
                                Envoie
                              	</td>
                                <td>	
                                <?php echo $envoiUS;?>
                              	</td>
                                <td>	
                                <?php echo $envoi;?>
                              	</td>
                             <tr>
                             
                             <tr>
                                <td>	
                                Commission 
                              	</td>
                                <td>	
                                	<?php echo round($comissionUS);?>
                              	</td>
                                <td>	
                                	<?php echo round($comission);?>
                              	</td>
                             <tr>
                             
                             <tr>
                                <td>	
                                Conversion +
                              	</td>
                                <td>	
                                	<?php echo $Conv_EntreUS;?>
                              	</td>
                                <td>	
                                	<?php echo $Conv_Entre;?>
                              	</td>
                             <tr>
                             <tr>
                                <td>	
                                Conversion -
                              	</td>
                                <td>	
                                	<?php echo $Conv_SortieUS;?>
                              	</td>
                                <td>	
                                	<?php echo $Conv_Sortie;?>
                              	</td>
                             <tr>
                             <tr>
                                <td>	
                                Retrait
                              	</td>
                                <td>	
                                	<?php echo $retraitUS;?>
                              	</td>
                                <td>	
                                	<?php echo $retrait;?>
                              	</td>
                             <tr>
                             <tr>
                                <td>	
                                Depense
                              	</td>
                                <td>	
                                	<?php echo $depenseUS;?>
                              	</td>
                                <td>	
                                	<?php echo $depense;?>
                              	</td>
                             <tr>
                             <tr>
                                <td>	
                                Versement
                              	</td>
                                <td>	
                                	<?php echo $VersementUS;?>
                              	</td>
                                <td>	
                                	<?php echo $Versement;?>
                              	</td>
                             <tr>
                             <tr>
                                <td>	
                                RM
                              	</td>
                                <td>	
                                <?php
                                	//$RMUS=$SoldeUSD+$financeUS-$VirementUS+$envoiUS+$comissionUS+$Conv_EntreUS-$Conv_SortieUS-$retraitUS-$depenseUS-$VersementUS;
								$RMUS=$SoldeUSD+$financeUS-$VirementUS+$envoiUS+$comissionUS+$Conv_EntreUS-$Conv_SortieUS-$retraitUS-$depenseUS-$VersementUS;
									//$RMUS=$RMUS+$retraitUS+$retraitUS;
									//echo $RMUS;
                                	 echo round($RMUS);
									?>
                              	</td>
                                <td>	
								<?php 
									$RM=$SoldeCDF+$finance-$Virement+$envoi+$comission+$Conv_Entre-$Conv_Sortie-$retrait-$depense-$Versement;
									
										//$RM=$RM+$retrait+$retrait;
										//echo $RM;
										echo round($RM);
								?>
                              	</td>
                             <tr>
                           </tbody>
                           </table> 

                           <h4>Controle</h4>
                           
                    <table class="table table-condensed" border="1">
                       <thead>
                      
                            <tr>
                              <th>*</th>
                              <th>Seuil</th>
                              <th>Mouvement</th>
                              <!--<th style="text-align:right">
                                <?php 
                                 // if (empty($DEVISE)) {
                                   // echo "Montant";
                                  //}else{
                                   // echo "Montant/".$DEVISE;
                                  //}
                                ?>
                              </th>-->
                              
                            </tr>
                        </thead>
                        <tbody>
                          <?php while($data=$TabControle->fetch()){ ?>
                          <tr>
                                <td> 
                                  <?php 
                                    if (empty($data['Devise'])) {
                                      echo "0";
                                    }else{
                                      echo "Montant/".$data['Devise'];
                                    }
                                    
                                  ?>
                                </td>  
                                <td>
                                  <?php
                                  if (empty($data['Seuil'])) {
                                      echo "0";
                                    }else{
                                      echo $data['Seuil'];
                                    }
                                    
                                  ?>
                                </td>
                                <td>  
                                <?php 
                                  
                                  if (empty($data['Montant_USD'])) {
                                    echo "0";
                                  }else{
                                    echo $data['Montant_USD'];
                                    //echo round($SEUIL);
                                  }
                                ?>
                                
                                </td>
                          </tr>
                          <?php } ?>
                      </tbody> 
                    </table>
                         <?php }?>  
                     </div>
                   </div>  
        		</div>
           </div>  
        </div>
</div>