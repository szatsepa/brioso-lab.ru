<?php

/*
 * 29/5/2012
 */
include '../query/connect.php';

$id = intval($_POST[user_id]);

$item = intval($_POST[item]);

$price_id = intval($_POST[price_id]);

$discount = 0;

if(!isset($_POST[discount]))$discount = intval($_POST[discount]);

$volume = intval($_POST[vl]);

$b = intval($_POST[b]);

$s = intval($_POST[s]);

$h = intval($_POST[h]);



            
$query   = "UPDATE cart 
                        SET amount   = (amount + $volume),
                            discount = $discount,
                            time         = now()
                        WHERE artikul    = '$_POST[artikul]'
                         AND  customer    = $id";            



$query_try = mysql_query($query) or die($query);


	
	// Таких записей нет, делаем простой INSERT
if (mysql_affected_rows() == 0) {

$query = "INSERT INTO cart (
                        amount,
                        artikul,
                        price_id,
                        h,
                        s,
                        b,
                        customer,
                        time)
                        VALUES
                        (
                        $volume,
                        '$_POST[artikul]',
                        $price_id,
                        $h,
                        $s,
                        $b,
                        $id,
                        now())";

$result = mysql_query($query) or die($query);

}

$query = "UPDATE pricelist 
	  SET amount = (`amount` - $volume) 
	  WHERE artikul = '$_POST[artikul]' AND code2 <> 'X'";

mysql_query($query) or die($query);

 $query = "UPDATE cart SET time = now()  
	   WHERE customer  = id 
           AND price_id = $price_id";
 
 mysql_query($query) or die($query);
 
 // Пропишем в корзине id заказа, из которого создан данный заказ
$parent_order = intval($_POST[parent_order]);

if (isset($parent_order) and $parent_order > 0) {


    $query = "UPDATE cart SET parent_order = $parent_order  
                            WHERE customer  = $id
                            AND price_id = $price_id";
   
    mysql_query($query) or die($query);
}

// если в корзине колич товаров равно нулю то удаляем сей артикул из корзины

mysql_query("DELETE FROM cart WHERE amount = 0");

$query = "SELECT  SUM(b.amount) AS summ_amount,
                   SUM(a.price*b.amount) AS summ_cost
             FROM pricelist a, cart b
             WHERE a.artikul = b.artikul
               AND a.pricelist = b.price_id
               AND b.customer=$id";

$result = mysql_query($query) or die($query);

$row = mysql_fetch_assoc($result);

//array_push($data_array, $row);

echo json_encode($row);

mysql_close();
?>
