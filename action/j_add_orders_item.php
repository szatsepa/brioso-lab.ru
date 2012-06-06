<?php

/*
 * 6/6/2012
 */
include '../query/connect.php';

include 'quotesmart.php';

$cart = $_POST[cart];

$order = intval($_POST[order]);

$customer = intval($_POST[customer]);

$n = 0;

$str = '';

foreach ($cart as $value) {
    $str = "INSERT INTO orders_items (order, customer,artikul,price_id,amount,discount,name,price)
        VALUES ($order,$customer,'$value[artikul]',$value[price_id],$value[amount],0,'$value[name]',$value[price])";
    
    $result = mysql_query($str);
    
    if($result){
        $query = "DELETE FROM cart WHERE artikul='$value[artikul]' AND customer = $customer";
        $n++;
    }
}

$response = array('out'=>$n,'str'=>$str);

echo json_encode($response);

mysql_close();
?>
