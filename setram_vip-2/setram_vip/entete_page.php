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
            	<li class="active"><a href="admin.php">Accueil</a></li>
                <!--<li class="active"><a href="Code_Retrait.php">Retrait</a></li>
                <li class="active"><a href="Change.php">Conversion</a></li>-->
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Opération<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li>
							<?php
								//echo '<a href=Verificat_TypAgence.php?idagc='.$_SESSION['IdAgence'].'><i class="fa fa-fw fa-tag"></i>Depense</a>';
							?>
						</li>
                        <li><a href="Financement.php"><i class="fa fa-fw fa-thumbs-o-up"></i>Financer une agence</a></li>
                        <li>
                        	<?php
								//echo '<a href=Ravit_Groupe.php?idagc='.$_SESSION['IdAgence'].'><i class="fa fa-fw fa-thumbs-o-up"></i>Financer un groupe</a>';
							?>
                        </li>
					</ul>
				</li>
                <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Rapport<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#"><i class="fa fa-fw fa-tag"></i>Global</a></li>
						<li><a href="#?Type=envoi"><i class="fa fa-fw fa-thumbs-o-up"></i>Transfert</a></li>
                        <li><a href="#?Type=retrait"><i class="fa fa-fw fa-tag"></i>Retraits</a></li>
						<li><a href="#?Type=depense"><i class="fa fa-fw fa-thumbs-o-up"></i>Depenses</a></li>
                        <li><a href="#?Type=financement"><i class="fa fa-fw fa-thumbs-o-up"></i>Financement</a></li>
                        <li><a href="#?Type=conversion"><i class="fa fa-fw fa-thumbs-o-up"></i>Conversion</a></li>
					</ul>
				</li>
                
                
                 
                
                
			</ul>
            <div id="Utilisateur" class="nav navbar-nav" style="padding-left:5em; ">
            	<h4 style="color:#ffffff;"><?php if(isset($_SESSION['NomAgence'])){
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
				<form method="POST">
	                <div class="btn-group" style="padding-top:10px;padding-bottom:10px">
	                	<input type="submit" name="Deconnexion" class="form-control" value="Deconnexion" id="BtnEnvoyer" />
	                </div>
            	</form>
               </div>
		   </div>

</nav>
           

		