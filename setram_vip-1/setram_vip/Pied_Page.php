<?php 
//include_once('Dossiers_Config.php');
//include("codes/classes/ClasseProduit.php");
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
            	<li class="active"><a href="Envoi1.php">Transfert</a></li>
                <li class="active"><a href="Code_Retrait.php">Retrait</a></li>
                <li class="active"><a href="Change.php">Conversion</a></li>
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
						<li><a href="Rapport_Global.php"><i class="fa fa-fw fa-tag"></i>Global</a></li>
						<li><a href="Rapport_Global.php?Type=envoi"><i class="fa fa-fw fa-thumbs-o-up"></i>Transfert</a></li>
                        <li><a href="Rapport_Global.php?Type=retrait"><i class="fa fa-fw fa-tag"></i>Retraits</a></li>
						<li><a href="Rapport_Global.php?Type=depense"><i class="fa fa-fw fa-thumbs-o-up"></i>Depenses</a></li>
                        <li><a href="Rapport_Global.php?Type=financement"><i class="fa fa-fw fa-thumbs-o-up"></i>Financement</a></li>
                        <li><a href="Rapport_Global.php?Type=conversion"><i class="fa fa-fw fa-thumbs-o-up"></i>Conversion</a></li>
					</ul>
				</li>
                <?php /*if(isset($_SESSION['Nom'])){
							echo $_SESSION['Nom'];
							}*/
				?>
                
                 
                
                
			</ul>
            <div id="Utilisateur" class="nav navbar-nav" style="padding-left:5em;">
            	<h4><?php //if(isset($_SESSION['NomAgence'])){
							//echo "Agence : ".$_SESSION['NomAgence'];
							//}
				?></h4>
                
            </div>
			<div id="Utilisateur" class="nav navbar-nav navbar-right" style="padding-right:5em;"><?php //if (isset($_SESSION['idagent'])){?>
    
                <div class="btn-group" style="padding-top:10px;padding-bottom:10px">
                	<input type="submit" name="Envoyer" class="form-control" value="Deconnexion" id="BtnEnvoyer" />
                </div>
               </div>
		   </div>

</nav>
           

		