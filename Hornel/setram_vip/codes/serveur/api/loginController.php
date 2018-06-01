<?php
	include_once '../../classes/ClasseCompte.php';
    if ($_SERVER['REQUEST_METHOD']=='POST') {
    	if (isset($_POST['phone']) && isset($_POST['pin'])) {
    		$login=new Compte();
    		//echo "Phone: ".$_POST['phone'];
    		echo $login->fx_login_mobile($_POST['phone'],$_POST['pin']);
    	}else{
    		echo "Params not found";
    	}
}else {
	
	echo json_encode(array('status'=>500));
}
?>
