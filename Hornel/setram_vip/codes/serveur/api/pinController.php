<?php
include_once '../../classes/ClasseCompte.php';
    if(isset($_GET['old']) && isset($_GET['new']) && isset($_GET['account'])){
        $account=new Compte();
        $account->fx_changer_PIN_2($_GET['old'],$_GET['new'],$_GET['account']);
       
    }
?>