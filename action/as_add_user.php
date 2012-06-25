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

$query = "INSERT INTO users
                        (email,
                        phone,
                        name,
                        surname,
                        code,
                        status,
                        activ)
                        VALUES
                        ($email,
                        $phone,
                        $name,
                        $surname,
                        $code,
                        1,
                        1)";

mysql_query($query);

$out = array();

$out['ok']=NULL;

if(mysql_insert_id()){
    $out['ok']=mysql_insert_id();
}
$out['user'] = $_POST;

echo json_encode($out);

mysql_close();
?>
