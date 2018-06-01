<?php
    if(isset($_POST['from_account']) && isset($_POST['to_account']) && isset($_POST['amount'])){
        $id_query_transact=array
        (
        	'from_account'=>$_POST['from_account'],
        	'to_account'=>$_POST['to_account'],
        	'amount'=>$_POST['amount']
        );
        var_dump($id_query_transact);
    }else{
    	echo json_encode(array("status"=>404));
    }
?>
