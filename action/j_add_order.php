<?php

/*
 * 5/6/2012
 */
include '../query/connect.php';

include 'quotesmart.php';



$email = quote_smart($_POST[email]);

$id = intval($_POST[user_id]);

$shipment = quote_smart($_POST[shipment]);

$phone = quote_smart($_POST[phone]);

$comment = quote_smart($_POST[comment]);

//$cart = $_POST[cart];

$query = "INSERT INTO orders (customer, email, phone,shipment,comment) VALUES ($id,$email,$phone,$shipment,$comment)";

//$response['q1'] = $query;

$response = array('ok'=>$query);

mysql_query($query) or die($query);

$order = mysql_insert_id();

$n = 1;

//foreach ($cart as $value) {
//    $n++;
//    
//    $hsb = "$value[h],$value[s]%,$value[b]%";
//    
//    $query = "INSERT INTO orders_items (order, customer, artikul, price_id, amount,discount,name,price,hsb)
//        VALUES ($order,$id, '$value[artikul]', $value[price_id], $value[amount],0,$value[name],$value[price],'$hsb')";
//    
//    $result = mysql_query($query);
//    
//    $response["q$n"] = $query;
//    
//    if($result){
//        $query = "DELETE FROM cart WHERE customer = $id AND artikul = $value[artikul]";
//        
//        $response["del$n"] = $query;
//        
//        mysql_query($query);
//    }
//    
//}



echo json_encode($response);

mysql_close();
?>
