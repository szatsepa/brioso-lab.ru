<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include '../query/connect.php';

$pid = intval($_POST[pid]);

$code2 = intval($_POST[code2]);

$query = "UPDATE pricelist SET code2 = $code2, name = '$_POST[name]', state = '$_POST[state]', volume = '$_POST[volume]', price = '$_POST[price]', amount = '$_POST[amount]' WHERE artikul = '$_POST[artikul]' AND pricelist = $pid";

mysql_query($query);

$cnt = mysql_affected_rows();

$out = array('ok'=>NULL);

if($cnt > 0){
    
    $out = $_POST;
    
    $out['ok'] = 1;
}

echo json_encode($out);

mysql_close();
?>
