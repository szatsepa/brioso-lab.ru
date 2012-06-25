<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include '../query/connect.php';

$id = intval($_POST[uid]);

//$who = $_POST[who];

if($_POST[who] == 'customer'){
    $query = "UPDATE customers SET activ = 0 WHERE id = $id";
}else{
    $query = "UPDATE users SET activ = 0 WHERE id = $id";
}

mysql_query($query);


$out = array();

$out['ok'] = NULL;

if(mysql_affected_rows()){
    $out['ok'] = mysql_affected_rows();
}

echo json_encode($out);

mysql_close();
?>
