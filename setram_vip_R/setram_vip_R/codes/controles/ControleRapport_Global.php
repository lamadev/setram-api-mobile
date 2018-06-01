<?php
include ("codes/classes/ClasseMouvement.php");

	$Format_Date = 'd/m/Y à H:i';
	$Format_Affiche = 'd/m/Y';
	$Format_Envoie = 'Y/m/d';
	$Aj=date($Format_Envoie,time());
	
	$SoldeUSD=0;
	$SoldeCDF=0;
	$Resi='';
	
	if(!isset($_GET['Type'])){
		$Type="Global";
	}else{
		$Type=$_GET['Type'];
	}
	$Etat=0;
	
	$recherche=new Mouvement();
	$ResVersema=$recherche->fx_Recher_DernierVersement("Versement",$_SESSION['IdAgence']);
	if ($ResVersema) {
		while($data=$ResVersema->fetch()){
			$DateMouve=$data['DateMouv'];
		}
		echo $DateMouve;

	//$Cdate="2015-11-20";
	$Cdate=$DateMouve;
	
	$Posit=0;
	//$DateLimite="2017-01-16";
	$DateLimite=$DateMouve;
	$DateLM=strtotime($DateLimite);
	$Version=time()-$DateLM;
	if($Version>=0){
		$Posit=1;
	}else{
		$Posit=0;
		}
	
	
	if (isset($_POST['RechercheJ'])){
		if (isset($_POST['Cdate'])){
				$Cdate=$_POST['Cdate'];
				$Etat=1;
		}
		
		$laDate=strtotime($Cdate);
		$Version=$laDate-$DateLM;
		if($Version>=0){
			$Posit=1;
		}else{
			$Posit=0;
			}
			
		if ($Etat==1){
				$DateAff=date($Format_Affiche,strtotime($Cdate));
				if($Type=="Global"){
					$Res1=$recherche->fx_RapportMouvement($Cdate, $_SESSION['IdAgence']);
					$Resi=$recherche->fx_Rapport_transf($Cdate, $_SESSION['IdAgence']);
				}elseif($Type=="conversion"){
					$Res1=$recherche->fx_conversion_Jour($Cdate, $_SESSION['IdAgence']);
				}elseif($Type=="envoi"){
					$Res1=$recherche->fx_ListeMouvement_transfert($Cdate, $_SESSION['IdAgence']);
				}elseif($Type=="depense"){
					$Res1=$recherche->fx_ListeMouvement_Depense($Cdate, $_SESSION['IdAgence'],$Type);
				}elseif($Type=="financement"){
					$Res1=$recherche-> fx_ListeFinance($Cdate, $_SESSION['IdAgence']);
				}elseif($Type=="retrait"){
					$Res1=$recherche->fx_ListeRetrait($Cdate, $_SESSION['IdAgence']);
				}else{
					$Res1=$recherche->fx_ListeMouvement_Type($Cdate, $_SESSION['IdAgence'],$Type);
				}
				
				if($Posit==0){
					$TabUSD=$recherche->fx_RM_Journalier($Cdate,$_SESSION['IdAgence'],'E','USD');
					while($data=$TabUSD->fetch()){
							$E_USD=$data['total'];
						}
					$TabUSD=$recherche->fx_RM_Journalier($Cdate,$_SESSION['IdAgence'],'S','USD');
					while($data=$TabUSD->fetch()){
							$S_USD=$data['total'];
						}
					$SoldeUSD=$E_USD-$S_USD;
					$TabCDF=$recherche->fx_RM_Journalier($Cdate,$_SESSION['IdAgence'],'E','CDF');
					while($data=$TabCDF->fetch()){
							$E_CDF=$data['total'];
						}
					$TabCDF=$recherche->fx_RM_Journalier($Cdate,$_SESSION['IdAgence'],'S','CDF');
					while($data=$TabCDF->fetch()){
							$S_CDF=$data['total'];
						}
				}elseif($Posit==1){
					//$TabUSD=$recherche->fx_RM_Journalier_Limite($Cdate,$_SESSION['IdAgence'],'E','USD',$DateLimite);
					$TabUSD=$recherche->fx_RM_Journalier_Limite_test($Cdate,$_SESSION['IdAgence'],'E','USD',$DateLimite);
					while($data=$TabUSD->fetch()){
							$E_USD=$data['total'];
						}
					$TabTransfUSD=$recherche->fx_total_transf_limite($Cdate,$_SESSION['IdAgence'],'USD',$DateLimite);
					while($data=$TabTransfUSD->fetch()){
							$E_Tranf_USD=$data['total'];
						}
					$E_USD=$E_USD+$E_Tranf_USD;
					
					$TabUSD=$recherche->fx_RM_Journalier_Limite($Cdate,$_SESSION['IdAgence'],'S','USD',$DateLimite);
					while($data=$TabUSD->fetch()){
							$S_USD=$data['total'];
						}
					$SoldeUSD=$E_USD-$S_USD;
					$TabCDF=$recherche->fx_RM_Journalier_Limite_test($Cdate,$_SESSION['IdAgence'],'E','CDF',$DateLimite);
					while($data=$TabCDF->fetch()){
							$E_CDF=$data['total'];
						}
					$TabTransfCDF=$recherche->fx_total_transf_limite($Cdate,$_SESSION['IdAgence'],'CDF',$DateLimite);
					while($data=$TabTransfCDF->fetch()){
							$E_Tranf_CDF=$data['total'];
						}
					$E_CDF=$E_CDF+$E_Tranf_CDF;
					
					$TabCDF=$recherche->fx_RM_Journalier_Limite($Cdate,$_SESSION['IdAgence'],'S','CDF',$DateLimite);
					while($data=$TabCDF->fetch()){
							$S_CDF=$data['total'];
						}
					}
				$SoldeCDF=$E_CDF-$S_CDF;
				$SoldeUSD=$E_USD-$S_USD;
		}
	}
	
	if (isset($_POST['RechercheM'])){
		//$Etat=0;
		if (isset($_POST['mois'])){
			if (isset($_POST['annee'])){
				$Etat=2;
			}
		}
		
		$Mois=$_POST['mois'];
		$Annee=$_POST['annee'];
		//$Agc=$_POST['agenceExp'];
		
		$mois_Lim=date("m",$DateLM);
		$annee_Lim=date("Y",$DateLM);
		if((($mois_Lim<=$Mois)&&($annee_Lim==$Annee))or($annee_Lim<$Annee)){
			$Posit=1;
		}else{
			$Posit=0;
			}
				
		if($Etat==2){
			$DateAff="Mois : ".$_POST['mois']."/".$_POST['annee'];
			$Cdate=$Aj;
			if($Type=="Global"){
				$Res1=$recherche->fx_ListeMouvement_Mensuel($_POST['mois'],$_POST['annee'],$_SESSION['IdAgence']);
				$Resi=$recherche->fx_Rapport_transf_Mensuel($_POST['mois'],$_POST['annee'],$_SESSION['IdAgence']);
			}elseif($Type=="conversion"){
				$Res1=$recherche->fx_ListeConversion_Mensuel($_POST['mois'],$_POST['annee'],$_SESSION['IdAgence']);
			}elseif($Type=="envoi"){
				$Res1=$recherche->fx_ListeMouvement_Mensuel_Envoi($_POST['mois'],$_POST['annee'],$_SESSION['IdAgence']);
			}elseif($Type=="depense"){
					$Res1=$recherche->fx_ListeMouvement_Depense_Mensuel($_POST['mois'],$_POST['annee'],$_SESSION['IdAgence'],$Type);
			}elseif($Type=="financement"){
					$Res1=$recherche-> fx_ListeFinanceMensuel($_POST['mois'],$_POST['annee'],$_SESSION['IdAgence']);
			}elseif($Type=="retrait"){
					$Res1=$recherche-> fx_ListeRetrait_Mens($_POST['mois'],$_POST['annee'],$_SESSION['IdAgence']);
			}else{
				$Res1=$recherche->fx_ListeMouvement_Mensuel_Type($_POST['mois'],$_POST['annee'],$_SESSION['IdAgence'],$Type);
				}
			$Mois=$_POST['mois'];
			$Annee=$_POST['annee'];
			if($Posit==0){
				$TabUSD=$recherche->fx_RM_Mensuelle($Mois,$Annee,$_SESSION['IdAgence'],'E','USD');
				while($data=$TabUSD->fetch()){
						$E_USD=$data['total'];
					}
				$TabUSD=$recherche->fx_RM_Mensuelle($Mois,$Annee,$_SESSION['IdAgence'],'S','USD');
				while($data=$TabUSD->fetch()){
						$S_USD=$data['total'];
					}
				$SoldeUSD=$E_USD-$S_USD;
				$TabCDF=$recherche->fx_RM_Mensuelle($Mois,$Annee,$_SESSION['IdAgence'],'E','CDF');
				while($data=$TabCDF->fetch()){
						$E_CDF=$data['total'];
					}
				$TabCDF=$recherche->fx_RM_Mensuelle($Mois,$Annee,$_SESSION['IdAgence'],'S','CDF');
				while($data=$TabCDF->fetch()){
						$S_CDF=$data['total'];
					}
			}elseif($Posit==1){
				$TabUSD=$recherche->fx_RM_Mensuelle_Limite($Mois,$Annee,$_SESSION['IdAgence'],'E','USD',$DateLimite);
				while($data=$TabUSD->fetch()){
						$E_USD=$data['total'];
					}
				$TabUSD=$recherche->fx_RM_Mensuelle_Limite($Mois,$Annee,$_SESSION['IdAgence'],'S','USD',$DateLimite);
				while($data=$TabUSD->fetch()){
						$S_USD=$data['total'];
					}
				$SoldeUSD=$E_USD-$S_USD;
				$TabCDF=$recherche->fx_RM_Mensuelle_Limite($Mois,$Annee,$_SESSION['IdAgence'],'E','CDF',$DateLimite);
				while($data=$TabCDF->fetch()){
						$E_CDF=$data['total'];
					}
				$TabCDF=$recherche->fx_RM_Mensuelle_Limite($Mois,$Annee,$_SESSION['IdAgence'],'S','CDF',$DateLimite);
				while($data=$TabCDF->fetch()){
						$S_CDF=$data['total'];
					}
				}
			$SoldeCDF=$E_CDF-$S_CDF;
			$SoldeUSD=$E_USD-$S_USD;
		}
		
		/**/
			
		}
	if (isset($_POST['RechercheA'])){
		//$Etat=0;
			if (isset($_POST['anneeU'])){
				$Etat=3;
			}
	
				
		if($Etat==3){
			$DateAff="Année : ".$_POST['anneeU'];
			$Cdate=$Aj;
			if($Type=="Global"){
				$Res1=$recherche->fx_ListeMouvement_Annuel($_POST['anneeU'],$_SESSION['IdAgence']);
				$Resi=$recherche->fx_Rapport_transf_Annuel($_POST['anneeU'],$_SESSION['IdAgence']);
			}elseif($Type=="conversion"){
				$Res1=$recherche->fx_ListeConversion_Annuel($_POST['anneeU'],$_SESSION['IdAgence']);
			}elseif($Type=="envoi"){
				$Res1=$recherche->fx_ListeMouvement_Annuel_Envoi($_POST['anneeU'],$_SESSION['IdAgence']);
			}elseif($Type=="depense"){
					$Res1=$recherche->fx_ListeMouvement_Depense_Annuel($_POST['anneeU'],$_SESSION['IdAgence'],$Type);
			}elseif($Type=="financement"){
					$Res1=$recherche-> fx_ListeFinanceAnnuel($_POST['anneeU'],$_SESSION['IdAgence']);
			}elseif($Type=="retrait"){
					$Res1=$recherche-> fx_ListeRetrait_An($_POST['anneeU'],$_SESSION['IdAgence']);
			}else{
				$Res1=$recherche->fx_ListeMouvement_Annuel_Type($_POST['anneeU'],$_SESSION['IdAgence'],$Type);
				}

			$Annee=$_POST['anneeU'];
			$TabUSD=$recherche->fx_RM_Annuel($Annee,$_SESSION['IdAgence'],'E','USD');
			while($data=$TabUSD->fetch()){
					$E_USD=$data['total'];
				}
			$TabUSD=$recherche->fx_RM_Annuel($Annee,$_SESSION['IdAgence'],'S','USD');
			while($data=$TabUSD->fetch()){
					$S_USD=$data['total'];
				}
			$SoldeUSD=$E_USD-$S_USD;
			$TabCDF=$recherche->fx_RM_Annuel($Annee,$_SESSION['IdAgence'],'E','CDF');
			while($data=$TabCDF->fetch()){
					$E_CDF=$data['total'];
				}
			$TabCDF=$recherche->fx_RM_Annuel($Annee,$_SESSION['IdAgence'],'S','CDF');
			while($data=$TabCDF->fetch()){
					$S_CDF=$data['total'];
				}
			$SoldeCDF=$E_CDF-$S_CDF;
			$SoldeUSD=$E_USD-$S_USD;
		}
		
		/**/
			
		}
		
	if($Etat==0){
			$Cdate=$Aj;
			//echo "cdfghjk".$Cdate;
			$laDate=strtotime($Cdate);
			$Version=$laDate-$DateLM;
			if($Version>=0){
				$Posit=1;
			}else{
				$Posit=0;
				}
			//echo "<br/><br/><br/><br/>".$Posit;
			$DateAff=date($Format_Affiche,strtotime($Cdate));
			if($Type=="Global"){
					$Res1=$recherche->fx_RapportMouvement($Cdate, $_SESSION['IdAgence']);
					$Resi=$recherche->fx_Rapport_transf($Cdate, $_SESSION['IdAgence']);
				}elseif($Type=="conversion"){
					$Res1=$recherche->fx_conversion_Jour($Cdate, $_SESSION['IdAgence']);
				}elseif($Type=="envoi"){
					$Res1=$recherche->fx_ListeMouvement_Env($Cdate, $_SESSION['IdAgence']);
				}elseif($Type=="depense"){
					$Res1=$recherche->fx_ListeMouvement_Depense($Cdate, $_SESSION['IdAgence'],$Type);
				}elseif($Type=="financement"){
					$Res1=$recherche-> fx_ListeFinance($Cdate, $_SESSION['IdAgence']);
				}else{
					$Res1=$recherche->fx_ListeMouvement_Type($Cdate, $_SESSION['IdAgence'],$Type);
				}
				if($Posit==0){
					$TabUSD=$recherche->fx_RM_Journalier($Cdate,$_SESSION['IdAgence'],'E','USD');
					while($data=$TabUSD->fetch()){
							$E_USD=$data['total'];
						}
					$TabUSD=$recherche->fx_RM_Journalier($Cdate,$_SESSION['IdAgence'],'S','USD');
					while($data=$TabUSD->fetch()){
							$S_USD=$data['total'];
						}
					$SoldeUSD=$E_USD-$S_USD;
					$TabCDF=$recherche->fx_RM_Journalier($Cdate,$_SESSION['IdAgence'],'E','CDF');
					while($data=$TabCDF->fetch()){
							$E_CDF=$data['total'];
						}
					$TabCDF=$recherche->fx_RM_Journalier($Cdate,$_SESSION['IdAgence'],'S','CDF');
					while($data=$TabCDF->fetch()){
							$S_CDF=$data['total'];
						}
					$SoldeCDF=$E_CDF-$S_CDF;
					$SoldeUSD=$E_USD-$S_USD;
				}elseif($Posit==1){
					/*
					$TabUSD=$recherche->fx_RM_Journalier_Limite($Cdate,$_SESSION['IdAgence'],'E','USD',$DateLimite);
					while($data=$TabUSD->fetch()){
							$E_USD=$data['total'];
							//echo "<br/><br/><br/><br/>".$E_USD;
						}
					$TabUSD=$recherche->fx_RM_Journalier_Limite($Cdate,$_SESSION['IdAgence'],'S','USD',$DateLimite);
					while($data=$TabUSD->fetch()){
							$S_USD=$data['total'];
							//echo "<br/><br/><br/><br/>".$S_USD;
						}
					$SoldeUSD=$E_USD-$S_USD;
					$TabCDF=$recherche->fx_RM_Journalier_Limite($Cdate,$_SESSION['IdAgence'],'E','CDF',$DateLimite);
					while($data=$TabCDF->fetch()){
							$E_CDF=$data['total'];
							//echo "<br/><br/><br/><br/>".$E_CDF;
						}
					$TabCDF=$recherche->fx_RM_Journalier_Limite($Cdate,$_SESSION['IdAgence'],'S','CDF',$DateLimite);
					while($data=$TabCDF->fetch()){
							$S_CDF=$data['total'];
							//echo "<br/><br/><br/><br/>".$S_CDF;
						}
					*/
					////////////////////////////////////////
					$TabUSD=$recherche->fx_RM_Journalier_Limite_test($Cdate,$_SESSION['IdAgence'],'E','USD',$DateLimite);
					while($data=$TabUSD->fetch()){
							$E_USD=$data['total'];
						}
					$TabTransfUSD=$recherche->fx_total_transf_limite($Cdate,$_SESSION['IdAgence'],'USD',$DateLimite);
					while($data=$TabTransfUSD->fetch()){
							$E_Tranf_USD=$data['total'];
						}
					$E_USD=$E_USD+$E_Tranf_USD;
					
					$TabUSD=$recherche->fx_RM_Journalier_Limite($Cdate,$_SESSION['IdAgence'],'S','USD',$DateLimite);
					while($data=$TabUSD->fetch()){
							$S_USD=$data['total'];
						}
					$SoldeUSD=$E_USD-$S_USD;
					$TabCDF=$recherche->fx_RM_Journalier_Limite_test($Cdate,$_SESSION['IdAgence'],'E','CDF',$DateLimite);
					while($data=$TabCDF->fetch()){
							$E_CDF=$data['total'];
						}
					$TabTransfCDF=$recherche->fx_total_transf_limite($Cdate,$_SESSION['IdAgence'],'CDF',$DateLimite);
					while($data=$TabTransfCDF->fetch()){
							$E_Tranf_CDF=$data['total'];
						}
					$E_CDF=$E_CDF+$E_Tranf_CDF;
					
					$TabCDF=$recherche->fx_RM_Journalier_Limite($Cdate,$_SESSION['IdAgence'],'S','CDF',$DateLimite);
					while($data=$TabCDF->fetch()){
							$S_CDF=$data['total'];
						}
					
					$SoldeCDF=$E_CDF-$S_CDF;
					$SoldeUSD=$E_USD-$S_USD;
					}
				
			}
//function Affiche_par_Date($Cdate)	

	}else{
		////////////////////////////////
	}

	
?>