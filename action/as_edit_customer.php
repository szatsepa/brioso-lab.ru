<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include '../query/connect.php';

include 'quotesmart.php';

$surname = quote_smart($_POST[surname]);

$name = quote_smart($_POST[name]);

$email = quote_smart($_POST[email]);

$phone = quote_smart($_POST[phone]);

$code = quote_smart($_POST[code]);

$id = intval($_POST[uid]);

$who = $_POST[who];

if($who == 'customer'){
    $query = "UPDATE customers SET surname=$surname, name=$name, email=$email, phone=$phone, code=$code WHERE id = $id";
}else{
    $query = "UPDATE users SET surname=$surname, name=$name, email=$email, phone=$phone, code=$code WHERE id = $id";
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
