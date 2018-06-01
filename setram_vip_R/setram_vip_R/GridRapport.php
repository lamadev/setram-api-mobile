
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
					
					$financeUS=0.0;
					$envoiUS=0.0;
					$comissionUS=0.0;
					$conversionUS=0.0;
					$retraitUS=0.0;
					$depenseUS=0.0;
					$Conv_EntreUS=0.0;
					$Conv_SortieUS=0.0;
					$RMUS=0.0;
					$TotUSD=0.0;
					$TotCDF=0.0;
					$NbrUSD=0;
					$NbrCDF=0;
					$MontConvUSD=0.0;
					$MontConvCDF=0.0;
					
					$CommissionUSD=0.0;
					$CommissionCDF=0.0;
				 ?>
             <div class=" col-md-8">
                <div class="panel panel-default">
                     <div class="panel-heading" >
                     <?php if($Type=='envoi'){ ?>
 							 <h3><?php echo 'Transferts_'.$DateAff; ?></h3>
                     <?php }else{?>
                     		<h3><?php echo $DateAff; ?></h3>
                     <?php }?>
                     </div>
                     <div class="panel-body">
                       <table class="table table-condensed" border="1">
                       <thead>
                      
                            <tr>
                              <th>Date</th>
                              
                              <?php if($Type=='envoi'){ ?>
                              	  <th>Code</th>
                                  <th>Expéditeur</th>
                                  <th style="text-align:right">Montant Trans.</th>
                                  <th style="text-align:right">Commission</th>
                              <?php }elseif($Type=='retrait'){ ?>
                              	  
                                  <th>Code</th>
                              	  <th>Bénéficiaire</th>
                                  <th style="text-align:right">Montant</th>
                              	  <th>Provenance</th>
                              <?php }elseif($Type=='financement'){ ?>
                              	  
                                  <th>Numéro</th>
                              	  <th>Operation</th>
                              	  <th>Provenance</th>
                                  <th style="text-align:right">Montant</th>
                              <?php }else{ ?>
                              		
                                  <th>Numéro</th>
                              	  <th>Operation</th>
                              	  <th style="text-align:right">Montant CDF</th>
                                  <th style="text-align:right">Montant USD</th>
                              <?php } ?>
                              <th>Operateur</th>
                             
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $serveAc="";
                       while($data=$TabMouv->fetch()){
                      		if(($data['type']=='conversion')and($Type=='conversion')){
								if($data['codedevise']=='CDF'){
									$MontConvUSD=$data['montant']/$data['TauxChange'];
									//echo $MontConvUSD."US";
								}
								if($data['codedevise']=='USD'){
									$MontConvCDF=$data['montant']*$data['TauxChange'];
									//echo $MontConvCDF."FC";
								}
							}
                           ?>
                           
                            <tr>
                            <td>	<?php
                            
                                     $DatOP=date($Format_Date,strtotime($data['datemouv']));
                                     echo $DatOP; 
                                    ?>
                              </td>
                              
                              
                              <?php if(($data['type']=='envoi')and($Type=='envoi')){ ?>
                                  <td>	<?php
                                                echo $data['codetrans'];	
                                        ?>
                                  </td>
                                  <td style="text-align:left;">	<?php
												echo $data['ExNom']." ".$data['ExPostnom'];	
										?>
								  </td>
                                  <td style="text-align:right;">
                                   <?php
                                        echo $data['montant']." ".$data['codedevise'];
                                     ?>
                                  </td>
                                  <td style="text-align:right;">
								   <?php
                                        echo $data['commission']." ".$data['Devcommission'];
                                     ?>
                                  </td>
                              <?php }elseif(($data['type']=='retrait')and($Type=='retrait')){ ?>
                                  <td>	<?php
                                                echo $data['codetrans'];	
                                        ?>
                                  </td>
                                  <td style="text-align:left;">	<?php
												echo $data['NomBen']." ".$data['PostNBen']." ".$data['PrenBen'];	
										?>
								  </td>
                                  <td style="text-align:right;">
                                   <?php
                                        echo $data['montant']." ".$data['codedevise'];
                                     ?>
                                  </td>
                                  <td>
								   <?php
                                        echo $data['AgenceEmetrice'];
                                     ?>
                                  </td>
                              <?php }elseif(($data['type']=='Financement')and($Type=='financement')){ ?>
                              		<td>
									   <?php
                                       
                                          echo $data['idmouv'];
                                          ?> 
                                     </td>
                                     <td>	<?php
													echo $data['type'];	
											?>
									  </td>
                                  <td>
                                   <?php
                                        echo $data['NomAgtProv'];
                                     ?>
                                  </td>
                                  <td style="text-align:right;">
                                     <?php
                                        echo $data['montant']." ".$data['codedevise'];
                                     ?>
                                  </td>
                              <?php } else{?>
                              		<td>
									   <?php
                                       
                                          echo $data['idmouv'];
                                          ?> 
                                      </td>
                                      <td>	<?php
													echo $data['type'];	
											?>
									  </td>
                              		<td style="text-align:right;">
									   <?php
                                            if($data['codedevise']=='CDF'){
                                                echo $data['montant'];
                                            }else{
                                                if($data['type']=='conversion'){
                                                 echo "- ".$MontConvCDF;
                                                }else{
                                                    echo "-";
                                                    }
                                                
                                            }
                                         ?>
                                      </td>
                                      <td style="text-align:right;">
									   <?php
                                            if($data['codedevise']=='USD'){
                                                echo $data['montant'];
                                            }else{
                                                if($data['type']=='conversion'){
                                                  echo "- ".$MontConvUSD;
                                                }else{
                                                    echo "-";
                                                    }
                                            }
                                         ?>
                                      </td>
                              <?php }?>
                              
                              
                               
                              <td>
                               <?php
                               
                                  echo $data['nom']." ".$data['prenom']; 
                                  ?> 
                              </td>
                             
                              
                            </tr>
                         <?php
                        if($data['codedevise']=='CDF'){
						 	if($data['type']=='envoi'){
									$envoi=$envoi+$data['montant'];
									/////////////////
									 if($data['Devcommission']=='USD'){
												$MontConvUSD=$MontConvUSD+$data['commission'];
												//$TotCDF=$TotCDF+$data['montant'];
									  }elseif($data['Devcommission']=='CDF'){
												$MontConvCDF=$MontConvCDF+$data['commission'];
												//$TotCDF=$TotCDF+$data['montant']+$data['commission'];
									   }
									//////////////////////
								}
						 	
							if($data['type']=='retrait'){
									$retrait=$retrait+$data['montant'];
								}
						 	if($data['type']=='conversion'){
									$conversion=$conversion+$data['montant'];
								}
							/*
									$retrait=$retrait+$data['montant'];
								}*/
						 	if($data['type']=='Depense'){
									$depense=$depense+$data['montant'];
								}
							if($data['type']=='Financement'){
									$finance=$finance+$data['montant'];
								}
							//if(($data['type']!='envoi')and($Type!='envoi')){	
								$TotCDF=$TotCDF+$data['montant'];
							//}
							/*if(($data['type']=='envoi')and($Type=='envoi')){
								$MontConvCDF=$MontConvCDF+$data['commission'];
							}*/
							
						 	if($data['type']=='conversion'){
								if($data['sens']=='E'){
									$Conv_Entre=$Conv_Entre+$data['montant'];
								}
								if($data['sens']=='S'){
									$Conv_Sortie=$Conv_Sortie+$data['montant'];
								}
							}
							$NbrCDF++;
						}elseif($data['codedevise']=='USD'){
								$NbrUSD++;
								$TotUSD=$TotUSD+$data['montant'];
								if(($data['type']=='envoi')and($Type=='envoi')){
									//$MontConvUSD=$MontConvUSD+$data['commission'];
									/////////////////
									 if($data['Devcommission']=='USD'){
												$MontConvUSD=$MontConvUSD+$data['commission'];
												//$TotCDF=$TotCDF+$data['montant'];
									  }elseif($data['Devcommission']=='CDF'){
												$MontConvCDF=$MontConvCDF+$data['commission'];
												//$TotCDF=$TotCDF+$data['montant']+$data['commission'];
									   }
									//////////////////////
								}
								if($data['type']=='envoi'){
										$envoiUS=$envoiUS+$data['montant'];
									}
								
								if($data['type']=='retrait'){
										$retraitUS=$retraitUS+$data['montant'];
									}
								if($data['type']=='conversion'){
										$conversionUS=$conversionUS+$data['montant'];
									}
							
								if($data['type']=='Depense'){
										$depenseUS=$depenseUS+$data['montant'];
									}
								if($data['type']=='Financement'){
										$financeUS=$financeUS+$data['montant'];
									}
	
								if($data['type']=='conversion'){
									if($data['sens']=='E'){
										$Conv_EntreUS=$Conv_EntreUS+$data['montant'];
									}
									if($data['sens']=='S'){
										$Conv_SortieUS=$Conv_SortieUS+$data['montant'];
									}
								}
								
							 }
							 
								
							}
					
                          ?>
                         
                          </tbody>
                       
                       </table>
                     
                     </div>
                     
               </div>
           </div>  
           <div class=" col-md-4">   
            	<div class="well" style="text-align:left;">
                     	 <div class="row">
                    <?php if($Type=="Global"){ ?>
                    <h4>Synthèse</h4>
                            
                     <table class="table table-condensed" border="1">
                       <thead>
                      
                            <tr>
                              <th>Rrubriques</th>
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
                                <?php echo $SoldeUSD;?>
                              	</td>
                                <td>	
                                <?php echo $SoldeCDF;?>
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
                                Expedition 
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
                                	<?php echo $comissionUS;?>
                              	</td>
                                <td>	
                                	<?php echo $comission;?>
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
                                RM
                              	</td>
                                <td>	
                                <?php
                                	$RMUS=$financeUS+$envoiUS+$comissionUS+$Conv_EntreUS-$Conv_SortieUS-$retraitUS-$depenseUS;
                                	 echo $RMUS;
                                   
                                   ?>
                              	</td>
                                <td>	
								<?php 
									$RM=$finance+$envoi+$comission+$Conv_Entre-$Conv_Sortie-$retrait-$depense;
									echo $RM;
								?>
                              	</td>
                             <tr>
                           </tbody>
                           </table> 
                           
                         <?php }else{ ?>  
                         <table class="table table-condensed" border="1">
                           <thead>
                          
                                <tr>
                                  <th>Rrubriques</th>
                                  <th style="text-align:right">USD</th>
                                  <th style="text-align:right">CDF</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>	
                                    Montant Total
                                    </td>
                                    <td style="text-align:right">	
                                    <?php echo $TotUSD;?>
                                    </td>
                                    <td style="text-align:right">	
                                    <?php echo $TotCDF;?>
                                    </td>
                                <tr>
                                <?php if($Type=='envoi'){ ?>
                                    <tr>
                                        <td>	
                                        Total commission
                                        </td>
                                        <td style="text-align:right">	
                                        <?php echo $MontConvUSD;?>
                                        </td>
                                        <td style="text-align:right">	
                                        <?php echo $MontConvCDF;?>
                                        </td>
                                    <tr>
                                 <?php }?>
                                 <tr>
                                    <td>	
                                    Nombre
                                    </td>
                                    <td style="text-align:right">	
                                    <?php echo $NbrUSD;?>
                                    </td>
                                    <td style="text-align:right">	
                                    <?php echo $NbrCDF;?>
                                    </td>
                                <tr>
                             </tbody>
                            </table>
                         <?php }?>  
                     </div>
           </div>  
        </div>