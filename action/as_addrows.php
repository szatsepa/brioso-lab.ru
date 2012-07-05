<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include '../query/connect.php';

$artikul = $_POST[artikul];

$barcode = $_POST[barcode];

$name = $_POST[name];

$state = $_POST[state];

$volume = $_POST[volume];

$price = $_POST[price];

$amount = $_POST[amount];

$pid = intval($_POST[pid]);

$query = "INSERT INTO pricelist 
                        (artikul,
                        barcode,
                        name,
                        state,
                        volume,
                        price,
                        amount,
                        pricelist)
                        VALUES
                        ('$artikul',
                        '$barcode','$name','$state','$volume','$price','$amount',$pid)";

mysql_query($query);

$row_id = mysql_insert_id();

$_POST['row_id'] = $row_id;

$_POST['code2'] = 1;

echo json_encode($_POST);

mysql_close();
?>
