<?php 
//session_start();
//include_once('Dossiers_Config.php');
//include("codes/classes/ClasseProduit.php");
include_once("codes/controles/ControleDeconnexion.php");
$Format_Dateforum = 'd/m/y à H:i';

?>
<link rel="stylesheet" type="text/css" media="screen" title="MEN" href="codes/styles/barre_menu.css" />

<nav class="navbar navbar-findcond navbar-fixed-top">

		<div class="navbar-header" style="padding-right:7em;">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">Setram VIP</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar">
			<ul class="nav navbar-nav">
            	<li class="active"><a href="index.php">Accueil</a></li>
                <!--<li class="active"><a href="Code_Retrait.php">Retrait</a></li>-->
                <li class="active"><a href="Change.php">Conversion</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Opération<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<?php if(($_SESSION['niveau']=='Superviseur')or($_SESSION['niveau']=='Gerant')){ ?>
						<li><a href="Financement.php"><i class="fa fa-fw fa-thumbs-o-up"></i>Financer une agence</a></li>
						<?php } ?>
                        <li><a href="Financement.php"><i class="fa fa-fw fa-thumbs-o-up"></i>Changer PIN Client</a></li>
                        <li><a href="Depense.php"><i class="fa fa-fw fa-thumbs-o-up"></i>Depense</a></li>
					</ul>
				</li>
                <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Rapport<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<?php if(($_SESSION['niveau']=='Superviseur')or($_SESSION['niveau']=='Gerant')){ ?>
							<li><a href="RapportGlob.php?Type='GlobSup'"><i class="fa fa-fw fa-tag"></i>Global</a></li>
						<?php }elseif ($_SESSION['niveau']=='Operateur') { ?>
							<li><a href="Rapport_Glob_Operat.php?Type='GlobOperat'"><i class="fa fa-fw fa-tag"></i>Global</a></li>
						<?php } ?>
						<li><a href="RapportDepot.php?Type=depot"><i class="fa fa-fw fa-thumbs-o-up"></i>Depots</a></li>
                        <li><a href="RapportRetrait.php?Type=retrait"><i class="fa fa-fw fa-tag"></i>Retraits</a></li>
                        <li><a href="RapportTransfert.php?Type=transfert"><i class="fa fa-fw fa-thumbs-o-up"></i>Transferts</a></li>
						<li><a href="RapportDepense.php?Type=depense"><i class="fa fa-fw fa-thumbs-o-up"></i>Depenses</a></li>
						<?php if(($_SESSION['niveau']=='Superviseur')or($_SESSION['niveau']=='Gerant')){ ?>
						<li><a href="RapportFinancement.php?Type=financement"><i class="fa fa-fw fa-thumbs-o-up"></i>Financement</a></li>
						<?php } ?>
                        <li><a href="Rapport_Global.php?"><i class="fa fa-fw fa-thumbs-o-up"></i>Conversion</a></li>
					</ul>
				</li>

			</ul>
            <div id="Utilisateur" class="nav navbar-nav" style="padding-left:5em;color:#ffffff;">
            	<h4><?php if(isset($_SESSION['NomAgence'])){
							echo "Agence : ".$_SESSION['NomAgence'];
							}
				?></h4>
                
            </div>
			<div id="Utilisateur" class="nav navbar-nav navbar-right" style="padding-right:5em;"><?php //if (isset($_SESSION['idagent'])){?>
				<span style="color:#ffffff;font-weight:bold;padding-right:25px;font-size:16px;">
    				<?php if(isset($_SESSION['NomAg'])){
							echo $_SESSION['NomAg']." ".":"." ".$_SESSION['niveau'];
							}
				?></span>
    			<form action="" method="post">
    				<form method="POST">
		                <div class="btn-group" style="padding-top:10px;padding-bottom:10px">
		                	<input type="submit" name="Deconnexion" class="form-control" value="Deconnexion" id="BtnEnvoyer" />
		                </div>
	            	</form>
            	</form>
               </div>
		   </div>

</nav>
           

		