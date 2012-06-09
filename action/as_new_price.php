<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include '../query/connect.php';

$active = intval($_POST[activ]);

$query = "INSERT INTO price (activ) VALUES ($active)";

$result = mysql_query($query) or die($query);

$id = mysql_insert_id();

if($id != 0){
    $price['new']=1;
}else{
    $price['new']=NULL;
}

$price['query'] = $query;

echo json_encode($price);

mysql_close();
?>
