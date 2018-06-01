<?php
include_once '../../classes/ClasseCompte.php';
    if(isset($_GET['old']) && isset($_GET['new']) && isset($_GET['account'])){
        $account=new Compte();
        $response= $account->fx_modifier_pin($_GET['old'],$_GET['new'],$_GET['account']);
      	echo $reponse;
    }else{
        echo "not found parameters";
    }
?>