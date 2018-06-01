<?php
	include_once '../../classes/ClasseCompte.php';
    	if (isset($_GET['idcompte']) && isset($_GET['pin'])) {
    		$login=new Compte();
    		//echo "Phone: ".$_POST['phone'];
    		//echo "Pin:".$_GET['pin'];
    		echo $login->fx_login_mobile($_GET['idcompte'],$_GET['pin']);
    	}else if(isset($_GET['numcompte']) && isset($_GET['pin'])){
    		$login=new Compte();
    		echo $login->fx_login_mobile_added($_GET['numcompte'],$_GET['pin']);
    	}else{
    		echo "Params not found";

    	}
?>
